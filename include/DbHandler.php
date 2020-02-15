<?php

require_once 'common.php';

class DbHandler {

    private $conn;

    function __construct() {
        require_once dirname(__FILE__) . '/DbConnect.php';
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

    function buySeriesTicket($sid, $data) {
        $res = array('error' => true, 'message' => 'Unable to buy tickets');
        $data['lotto_series_id'] = $sid;
        $tickets = json_decode($data['tickets']);
        $ticket_detail = json_decode($data['ticket_detail']);
        $com = new Common();
        $user = $com->selectRow('*', 'lotto_user', 'lotto_user_id = ' . $data['lotto_user_id']);
        if ($user['balance_amt'] >= (count($tickets) * $ticket_detail->mrp_amt) && $user['status'] == 1) {
            $numbers = array();
            foreach ($tickets as $row) {
                array_push($numbers, $row->digit);
            }
            $sales_limit = $com->selectRow('smd.sales_limit, smd.sales_commission, smd.sales_bonus, sm.retain', 'lotto_scheme_mapping AS sm INNER JOIN lotto_scheme_mapping_detail AS smd ON smd.lotto_digit_id = ' . $data['lotto_digit_id'] . ' AND smd.lotto_scheme_mapping_id = sm.lotto_scheme_mapping_id', 'sm.lotto_name_id = ' . $data['lotto_name_id'] . ' AND sm.lotto_user_id = ' . $user['super_stockz_id'] . ' AND sm.lotto_scheme_name_id = ' . $ticket_detail->lotto_scheme_name_id . ' AND sm.status = 1');
            $total_sales = $com->selectAll('IFNULL(SUM(td.quantity), 0) AS total_tickets, td.ticket_number', 'lotto_ticket_detail AS td LEFT JOIN lotto_ticket AS t ON t.lotto_ticket_id = td.lotto_ticket_id', 't.lotto_user_id IN (SELECT lotto_user_id FROM lotto_user WHERE super_stockz_id = ' . $user['super_stockz_id'] . ') AND lotto_schedule_id = ' . $data['lotto_schedule_id'] . ' AND t.status = 1 AND t.lotto_digit_id = ' . $data['lotto_digit_id'] . ' AND DATE(t.created_at) = \'' . date('Y-m-d') . '\' AND td.ticket_number IN (' . implode(',', $numbers) . ') GROUP BY td.ticket_number');
            $limit_exceed = false;
            foreach ($tickets as $r) {
                foreach ($total_sales as $row) {
                    if ($row['ticket_number'] == $r->digit) {
                        if ($row['total_tickets'] >= $sales_limit['sales_limit']) {
                            $limit_exceed = true;
                            $res['message'] = 'Ticket limit exceed for number ' . $row['ticket_number'];
                            break;
                        } else if (($sales_limit['sales_limit'] - $row['total_tickets']) < $r->qty) {
                            $limit_exceed = true;
                            $res['message'] = 'Ticket limit left ' . ($sales_limit['sales_limit'] - $row['total_tickets'] . ' for number ' . $r->digit);
                            break;
                        }
                    }
                }
                if ($limit_exceed == true) {
                    break;
                } else {
                    if ($sales_limit['sales_limit'] < $r->qty) {
                        $limit_exceed = true;
                        $res['message'] = 'Ticket limit left ' . ($sales_limit['sales_limit'] . ' for number ' . $r->digit);
                        break;
                    }
                }
            }
            if (!$limit_exceed) {
                $schedule = $com->selectRow('*', 'lotto_schedule', 'lotto_schedule_id = ' . $data['lotto_schedule_id']);
                $commission = $com->selectRow('smd.sales_commission, smd.sales_bonus', 'lotto_scheme_mapping AS sm INNER JOIN lotto_scheme_mapping_detail AS smd ON smd.lotto_digit_id = ' . $data['lotto_digit_id'] . ' AND smd.lotto_scheme_mapping_id = sm.lotto_scheme_mapping_id', 'sm.lotto_name_id = ' . $data['lotto_name_id'] . ' AND sm.lotto_user_id = ' . $data['lotto_user_id'] . ' AND sm.lotto_scheme_name_id = ' . $ticket_detail->lotto_scheme_name_id . ' AND sm.status = 1');
                $commission_stockz = $com->selectRow('smd.sales_commission, smd.sales_bonus', 'lotto_scheme_mapping AS sm INNER JOIN lotto_scheme_mapping_detail AS smd ON smd.lotto_digit_id = ' . $data['lotto_digit_id'] . ' AND smd.lotto_scheme_mapping_id = sm.lotto_scheme_mapping_id', 'sm.lotto_name_id = ' . $data['lotto_name_id'] . ' AND sm.lotto_user_id = ' . $user['stockz_id'] . ' AND sm.lotto_scheme_name_id = ' . $ticket_detail->lotto_scheme_name_id . ' AND sm.status = 1');
                if (count($commission_stockz) > 0) {
                    $ticket = $com->insertRecord(array('mrp_amt' => $ticket_detail->mrp_amt, 'lotto_scheme_name_id' => $ticket_detail->lotto_scheme_name_id, 'lotto_name_id' => $data['lotto_name_id'], 'lotto_series_id' => $data['lotto_series_id'], 'lotto_schedule_id' => $data['lotto_schedule_id'], 'filter_type' => $data['filter'], 'lotto_scheme_id' => $ticket_detail->lotto_scheme_id, 'lotto_digit_id' => $data['lotto_digit_id'], 'lotto_user_id' => $data['lotto_user_id'], 'lotto_scheme_name' => $ticket_detail->name, 'first_prize_amt' => $ticket_detail->first_prize_amt, 'second_prize_amt' => $ticket_detail->second_prize_amt, 'third_prize_amt' => $ticket_detail->third_prize_amt, 'sales_commission' => $commission['sales_commission'], 'sales_bonus' => $commission['sales_bonus'], 'result_time' => $schedule['result_time'], 'total_amt' => $data['total'], 'total_tickets' => $data['quantity'], 'super_stockz_id' => $user['super_stockz_id'], 'stockz_id' => $user['stockz_id'], 'ss_sales_commission' => $sales_limit['sales_commission'], 'ss_sales_bonus' => $sales_limit['sales_bonus'], 'ss_sales_limit' => $sales_limit['sales_limit'], 's_sales_commission' => $commission_stockz['sales_commission'], 's_sales_bonus' => $commission_stockz['sales_bonus'], 'ss_retain' => $sales_limit['retain'], 'status' => 1, 'created_by' => $data['created_by'], 'created_at' => $data['created_at'], 'updated_by' => $data['created_by'], 'updated_at' => $data['created_at']), 'lotto_ticket');
                    if ($ticket > 0) {
                        foreach ($tickets as $row) {
                            $com->insertRecord(array('lotto_ticket_id' => $ticket, 'ticket_number' => $row->digit, 'quantity' => $row->qty, 'status' => 1, 'created_by' => $data['created_by'], 'created_at' => $data['created_at'], 'updated_by' => $data['created_by'], 'updated_at' => $data['created_at']), 'lotto_ticket_detail');
                        }
                        $com->insertRecord(array('from_lotto_user_id' => $data['created_by'], 'to_lotto_user_id' => $data['lotto_user_id'], 'trans_type' => 'debit', 'amount' => $data['total'], 'remark' => 'Ticket purchase #' . $ticket, 'status' => 1, 'created_by' => $data['created_by'], 'created_at' => $data['created_at'], 'updated_by' => $data['created_by'], 'updated_at' => $data['created_at']), 'lotto_amount_transfer');
                        $res['error'] = false;
                        $res['message'] = 'Ticket added successfully';
                    } else {
                        $res['message'] = 'Unable to insert ticket';
                    }
                } else {
                    $res['message'] = 'Unable to buy ticket. Stockist commmission not found or stockist scheme disabled';
                }
            }
        } else {
            if ($user['status'] == 0) {
                $res['message'] = 'This user account was inactive';
            } else {
                $res['message'] = 'Insufficient balance';
            }
        }
        return $res;
    }

}
