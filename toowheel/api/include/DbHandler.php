<?php

require_once 'thirdparty.php';
require_once 'common.php';
require_once 'tcpdf/tcpdf.php';

class DbHandler {

    private $conn;

    function __construct() {
        require_once dirname(__FILE__) . '/DbConnect.php';
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

    public function sendNotifications() {
        $tpry = new thirdparty();
        $com = new Common();
        $data = $com->selectAllWithWhere('notifications', 'status=0');
        if (count($data) > 0) {
            foreach ($data as $val) {
                switch ($val['type']) {
                    case 'sms':
                        $tpry->sendSMS(array($val['to_email']), $val['body']);
                        break;
                    case 'email':
                        $tpry->sendMail($val['to_email'], $val['to_name'], $val['body'], $val['body'], $val['subject'], $val['from_email'], $val['from_name'], $val['attachment_url'], $val['attachment_name'], $val['cc_email'], $val['cc_name']);
                        break;
                    default;
                        break;
                }
                $com->updateRecordWithWhere(array('status' => 1), 'notifications', 'ID=' . $val['ID']);
            }
        }
    }

    public function addNotification($data, $id, $type) {
        date_default_timezone_set('Asia/Kolkata');
        $com = new Common();
        switch ($type) {
            case 'register':
                $tpry = new Thirdparty();
                $email_user = $com->selectRowWithWhere('templates', 'name=\'register\' AND type=\'email\' AND target=\'user\'');
                $email_admin = $com->selectRowWithWhere('templates', 'name=\'register\' AND type=\'email\' AND target=\'admin\'');
                $sms_user = $com->selectRowWithWhere('templates', 'name=\'register\' AND type=\'sms\' AND target=\'user\'');
                $email_user_body = $com->getReplacedString($email_user['body_web'], $data);
                $email_admin_body = $com->getReplacedString($email_admin['body_web'], $data);
                $sms_user_body = $com->getReplacedString($sms_user['body_web'], $data);
                $com->insertRecord(array('subject' => $email_user['subject'], 'body' => $email_user_body, 'type' => 'email', 'to_email' => $data['email'], 'attachment_url' => '', 'attachment_name' => '', 'from_email' => $email_user['mail'], 'from_name' => $email_user['mail_name'], 'to_name' => $data['name'], 'cc_email' => $email_user['cc'], 'cc_name' => $email_user['cc_name'], 'created_at' => date('Y-m-d H:i:s')), 'notifications');
                $com->insertRecord(array('subject' => $email_admin['subject'], 'body' => $email_admin_body, 'type' => 'email', 'to_email' => $email_admin['mail'], 'attachment_url' => '', 'attachment_name' => '', 'from_email' => $data['email'], 'from_name' => $data['name'], 'to_name' => $email_admin['mail_name'], 'cc_email' => $email_admin['cc'], 'cc_name' => $email_admin['cc_name'], 'created_at' => date('Y-m-d H:i:s')), 'notifications');
                $tpry->sendSMS(array($data['mobile']), $sms_user_body);
                break;
            case 'forgot_password':
                $tpry = new Thirdparty();
                $email_user = $com->selectRowWithWhere('templates', 'name=\'forgot_password\' AND type=\'email\' AND target=\'user\'');
                $email_user_body = $com->getReplacedString($email_user['body_web'], $data);
                $com->insertRecord(array('subject' => $email_user['subject'], 'body' => $email_user_body, 'type' => 'email', 'to_email' => $data['email'], 'attachment_url' => '', 'attachment_name' => '', 'from_email' => $email_user['mail'], 'from_name' => $email_user['mail_name'], 'to_name' => $data['name'], 'cc_email' => $email_user['cc'], 'cc_name' => $email_user['cc_name'], 'created_at' => date('Y-m-d H:i:s')), 'notifications');
                break;
            case 'create_booking':
                $tpry = new Thirdparty();
                $email_user = $com->selectRowWithWhere('templates', 'name=\'order_booking\' AND type=\'email\' AND target=\'user\'');
                $sms_user = $com->selectRowWithWhere('templates', 'name=\'order_booking\' AND type=\'sms\' AND target=\'user\'');
                $logo = $com->selectFieldsRowCustomWithWhere('value', 'configs', 'name=\'logo\'');
                $order = $com->selectFieldsRowCustomWithWhere('b.*, u.name, u.mobile, u.email', 'bookings AS b LEFT JOIN users AS u ON u.ID = b.user_id', 'b.ID=' . $id);
                $booking_data = json_decode($order['booking_data']);
                $passenger_detail = json_decode($booking_data->selected_ticket_passengers);
                $passengers = '<table style="width: 100%; border-collapse: collapse;"><tbody><tr><th style="text-align: center; font-weight: bold;">Name</th><th style="text-align: center; font-weight: bold;">Age</th><th style="text-align: center; font-weight: bold;">Gender</th><th style="text-align: center; font-weight: bold;">Seat No.</th><th style="text-align: center; font-weight: bold;">Status</th></tr>';
                $seats = [];
                foreach ($passenger_detail as $row) {
                    array_push($seats, $row->name);
                    $order['name'] = $row->passenger;
                    $gender = 'Male';
                    if ($row->gender == 'F' || $row->gender == 'f') {
                        $gender = 'Female';
                    }
                    $passengers = $passengers . '<tr><td style="word-wrap:break-word; text-align: center;"> ' . $row->passenger . ' </td><td style="text-align: center;">' . $row->age . '</td><td style="text-align: center;">' . $gender . '</td><td style="text-align: center;">' . $row->name . '</td><td style="text-align: center;">Booked</td></tr>';
                }
                $passengers = $passengers . '</tbody></table>';
                $order['passengers'] = $passengers;
                $order['seat'] = implode(', ', $seats);
                $order['logo'] = IMG_BASE_URL . $logo['value'];
                $order['discount_row'] = '';
                $order['tax_row'] = '';
                $order['travel_date'] = date('l dS M Y', strtotime($order['travel_date']));
                //$order['reporting_time'] = date('h:iA', strtotime($booking_data->selected_boarding_datetime - (15 * 60)));
                $order['reporting_time'] = date('h:iA', strtotime($booking_data->selected_boarding_datetime));
                $order['boarding_date'] = date('d M Y', strtotime($booking_data->selected_boarding_datetime));
                $order['boarding_time'] = date('h:iA', strtotime($booking_data->selected_boarding_datetime));
                if (isset($booking_data->departure)) {
                    $order['departure_time'] = date('h:iA', strtotime($booking_data->departure));
                } else {
                    $order['departure_time'] = date('h:iA', strtotime($booking_data->selected_boarding_datetime));
                }
                $order['boarding_station'] = $booking_data->selected_boarding_name;
                $order['boarding_address'] = $booking_data->selected_boarding_address;
                $order['boarding_landmark'] = $booking_data->selected_boarding_landmark;
                $order['dropping_time'] = date('h:iA', strtotime($booking_data->selected_dropping_datetime));
                $order['dropping_date'] = date('d M Y', strtotime($booking_data->selected_dropping_datetime));
                $order['dropping_address'] = $booking_data->selected_dropping_address;
                if ($order['coupon_discount_amt'] > 0) {
                    $discount = $order['coupon_discount_amt'];
                    if ($order['coupon_discount_amt'] == 'percentage') {
                        $discount = $order['fare'] * $order['coupon_discount_amt'] / 100;
                    }
                    $order['discount_row'] = '<tr><td style="text-align: right;">Discount</td><td style="text-align: right;">' . $discount . '</td><td>&nbsp;</td></tr>';
                }
                if ($order['taxes'] != '{}' && $order['taxes'] != '[]') {
                    $tax = json_decode($order['taxes']);
                    if (json_encode($tax->c_gst) != '{}') {
                        if ($tax->c_gst > 0) {
                            $tax_amt = $order['fare'] * $tax->c_gst / 100;
                            $order['tax_row'] = $order['tax_row'] . '<tr><td style="text-align: right;">CGST</td><td style="text-align: right;">' . $tax_amt . '</td><td>&nbsp;</td></tr>';
                        }
                    }
                    if (json_encode($tax->s_gst) != '{}') {
                        if ($tax->s_gst > 0) {
                            $tax_amt = $order['fare'] * $tax->s_gst / 100;
                            $order['tax_row'] = $order['tax_row'] . '<tr><td style="text-align: right;">SGST</td><td style="text-align: right;">' . $tax_amt . '</td><td>&nbsp;</td></tr>';
                        }
                    }
                    if (json_encode($tax->u_gst) != '{}') {
                        if ($tax->u_gst > 0) {
                            $tax_amt = $order['fare'] * $tax->u_gst / 100;
                            $order['tax_row'] = $order['tax_row'] . '<tr><td style="text-align: right;">UGST</td><td style="text-align: right;">' . $tax_amt . '</td><td>&nbsp;</td></tr>';
                        }
                    }
                }
                $email_user_body = $com->getReplacedString($email_user['body_web'], $order);
                $sms_user_body = $com->getReplacedString($sms_user['body_web'], $order);
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('Vaganan');
                $pdf->SetTitle('eTicket');
                $pdf->SetSubject('Booking Confirmation');
                $pdf->SetKeywords('vaganan, mushaqdeen');
                $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
                $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
                if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
                    require_once(dirname(__FILE__) . '/lang/eng.php');
                    $pdf->setLanguageArray($l);
                }
                $pdf->SetFont('dejavusans', '', 10);
                $pdf->SetPrintHeader(false);
                $pdf->AddPage('P', 'A4');
                $pdf->writeHTML($email_user_body, true, false, false, false, '');
                $pdf->Output('/home/g3affpfv4f1h/public_html/v1/booking_tickets/' . $order['order_code'] . '.pdf', 'F');
                $com->updateRecordWithWhere(array('booking_ticket' => 'booking_tickets/' . $order['order_code'] . '.pdf'), 'bookings', 'ID=' . $order['ID']);
                $com->insertRecord(array('subject' => $email_user['subject'], 'body' => $email_user_body, 'type' => 'email', 'to_email' => $order['notification_email'], 'attachment_url' => '/home/g3affpfv4f1h/public_html/v1/booking_tickets/' . $order['order_code'] . '.pdf', 'attachment_name' => $order['order_code'] . '.pdf', 'from_email' => $email_user['mail'], 'from_name' => $email_user['mail_name'], 'to_name' => $order['name'], 'cc_email' => $email_user['cc'], 'cc_name' => $email_user['cc_name'], 'created_at' => date('Y-m-d H:i:s')), 'notifications');
                $com->insertRecord(array('subject' => $sms_user['subject'], 'body' => $sms_user_body, 'type' => 'sms', 'to_email' => $order['notification_mobile'], 'attachment_url' => '', 'attachment_name' => '', 'from_email' => $sms_user['mail'], 'from_name' => $sms_user['mail_name'], 'to_name' => $order['name'], 'cc_email' => $sms_user['cc'], 'cc_name' => $sms_user['cc_name'], 'created_at' => date('Y-m-d H:i:s')), 'notifications');
                break;
            case 'cancel_booking':
                $tpry = new Thirdparty();
                $email_user = $com->selectRowWithWhere('templates', 'name=\'order_cancel\' AND type=\'email\' AND target=\'user\'');
                $sms_user = $com->selectRowWithWhere('templates', 'name=\'order_cancel\' AND type=\'sms\' AND target=\'user\'');
                $sms_user_refund = $com->selectRowWithWhere('templates', 'name=\'order_cancel_refund\' AND type=\'sms\' AND target=\'user\'');
                $logo = $com->selectFieldsRowCustomWithWhere('value', 'configs', 'name=\'logo\'');
                $order = $com->selectFieldsRowCustomWithWhere('b.*, u.name, u.mobile, u.email', 'bookings AS b LEFT JOIN users AS u ON u.ID = b.user_id', 'b.ID=' . $id);
                $booking_data = json_decode($order['booking_data']);
                $order['boarding_date'] = date('d M Y', strtotime($booking_data->selected_boarding_datetime));
                $order['boarding_time'] = date('h:iA', strtotime($booking_data->selected_boarding_datetime));
                if (isset($booking_data->departure)) {
                    $order['departure_time'] = date('h:iA', strtotime($booking_data->departure));
                } else {
                    $order['departure_time'] = date('h:iA', strtotime($booking_data->selected_boarding_datetime));
                }
                $order['dropping_time'] = date('h:iA', strtotime($booking_data->selected_dropping_datetime));
                $order['dropping_date'] = date('d M Y', strtotime($booking_data->selected_dropping_datetime));
                $passenger_detail = json_decode($booking_data->selected_ticket_passengers);
                $passengers = '<table style="width: 100%; border-collapse: collapse;"><tbody><tr><th style="text-align: center; font-weight: bold;">Name</th><th style="text-align: center; font-weight: bold;">Age</th><th style="text-align: center; font-weight: bold;">Gender</th><th style="text-align: center; font-weight: bold;">Seat No.</th><th style="text-align: center; font-weight: bold;">Status</th></tr>';
                $seats = [];
                foreach ($passenger_detail as $row) {
                    $order['name'] = $row->passenger;
                    array_push($seats, $row->name);
                    $gender = 'Male';
                    if ($row->gender == 'F' || $row->gender == 'f') {
                        $gender = 'Female';
                    }
                    $passengers = $passengers . '<tr><td style="word-wrap:break-word; text-align: center;"> ' . $row->passenger . ' </td><td style="text-align: center;">' . $row->age . '</td><td style="text-align: center;">' . $gender . '</td><td style="text-align: center;">' . $row->name . '</td><td style="text-align: center;">Cancelled</td></tr>';
                }
                $passengers = $passengers . '</tbody></table>';
                $order['passengers'] = $passengers;
                $order['logo'] = IMG_BASE_URL . $logo['value'];
                if ($order['coupon_discount_amt'] > 0) {
                    if ($order['coupon_discount_type'] == 'percentage') {
                        $discount_amt_cancel_fee = $order['cancellation_fee'] * $order['coupon_discount_amt'] / 100;
                        $discount_amt = $order['refund_amt'] * $order['coupon_discount_amt'] / 100;
                        $order['refund_amt'] = $order['refund_amt'] - $discount_amt;
                        $order['cancellation_fee'] = $order['cancellation_fee'] + $discount_amt;
                    } else {
                        $order['refund_amt'] = $order['refund_amt'] - $order['coupon_discount_amt'];
                        $order['cancellation_fee'] = $order['cancellation_fee'] + $order['coupon_discount_amt'];
                    }
                }
                $email_user_body = $com->getReplacedString($email_user['body_web'], $order);
                $sms_user_body = $com->getReplacedString($sms_user['body_web'], $order);
                $sms_user_refund_body = $com->getReplacedString($sms_user_refund['body_web'], $order);
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('Vaganan');
                $pdf->SetTitle('eTicket');
                $pdf->SetSubject('Booking Confirmation');
                $pdf->SetKeywords('vaganan, mushaqdeen');
                $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
                $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
                if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
                    require_once(dirname(__FILE__) . '/lang/eng.php');
                    $pdf->setLanguageArray($l);
                }
                $pdf->SetFont('dejavusans', '', 10);
                $pdf->SetPrintHeader(false);
                $pdf->AddPage('P', 'A4');
                $pdf->writeHTML($email_user_body, true, false, false, false, '');
                $pdf->Output('/home/g3affpfv4f1h/public_html/v1/cancel_tickets/' . $order['order_code'] . '.pdf', 'F');
                $com->updateRecordWithWhere(array('cancel_ticket' => 'cancel_tickets/' . $order['order_code'] . '.pdf'), 'bookings', 'ID=' . $order['ID']);
                $com->insertRecord(array('subject' => $email_user['subject'], 'body' => $email_user_body, 'type' => 'email', 'to_email' => $order['notification_email'], 'attachment_url' => '/home/g3affpfv4f1h/public_html/v1/cancel_tickets/' . $order['order_code'] . '.pdf', 'attachment_name' => $order['order_code'] . '.pdf', 'from_email' => $email_user['mail'], 'from_name' => $email_user['mail_name'], 'to_name' => $order['name'], 'cc_email' => $email_user['cc'], 'cc_name' => $email_user['cc_name'], 'created_at' => date('Y-m-d H:i:s')), 'notifications');
                $com->insertRecord(array('subject' => $sms_user['subject'], 'body' => $sms_user_body, 'type' => 'sms', 'to_email' => $order['notification_mobile'], 'attachment_url' => '', 'attachment_name' => '', 'from_email' => $sms_user['mail'], 'from_name' => $sms_user['mail_name'], 'to_name' => $order['name'], 'cc_email' => $sms_user['cc'], 'cc_name' => $sms_user['cc_name'], 'created_at' => date('Y-m-d H:i:s')), 'notifications');
                $com->insertRecord(array('subject' => $sms_user_refund['subject'], 'body' => $sms_user_refund_body, 'type' => 'sms', 'to_email' => $order['notification_mobile'], 'attachment_url' => '', 'attachment_name' => '', 'from_email' => $sms_user_refund['mail'], 'from_name' => $sms_user_refund['mail_name'], 'to_name' => $order['name'], 'cc_email' => $sms_user_refund['cc'], 'cc_name' => $sms_user_refund['cc_name'], 'created_at' => date('Y-m-d H:i:s')), 'notifications');
                break;
            case 'before_4_hrs_alert':
                $tpry = new Thirdparty();
                $sms_user = $com->selectRowWithWhere('templates', 'name=\'before_4_hrs_alert\' AND type=\'sms\' AND target=\'user\'');
                $booking_data = json_decode($data['booking_data']);
                $seats = [];
                $passenger_detail = json_decode($booking_data->selected_ticket_passengers);
                foreach ($passenger_detail as $row) {
                    array_push($seats, $row->name);
                }
                $array = array('name' => $data['name'], 'time' => date('h:i A', strtotime($booking_data->selected_boarding_datetime)), 'customer_care' => $booking_data->selected_boarding_number, 'boarding_name' => $booking_data->selected_boarding_name, 'travels_name' => $data['travels_name'], 'seates' => implode(', ', $seats), 'pnr' => $data['pnr']);
                $sms_user_body = $com->getReplacedString($sms_user['body_web'], $array);
                $com->insertRecord(array('subject' => $sms_user['subject'], 'body' => $sms_user_body, 'type' => 'sms', 'to_email' => $data['notification_mobile'], 'attachment_url' => '', 'attachment_name' => '', 'from_email' => $sms_user['mail'], 'from_name' => $sms_user['mail_name'], 'to_name' => $data['name'], 'cc_email' => $sms_user['cc'], 'cc_name' => $sms_user['cc_name'], 'created_at' => date('Y-m-d H:i:s')), 'notifications');
                break;
            case 'before_2_hrs_alert':
                $tpry = new Thirdparty();
                $sms_user = $com->selectRowWithWhere('templates', 'name=\'before_2_hrs_alert\' AND type=\'sms\' AND target=\'user\'');
                $booking_data = json_decode($data['booking_data']);
                $array = array('name' => $data['name'], 'time' => date('h:i A', strtotime($booking_data->selected_boarding_datetime)), 'customer_care' => $booking_data->selected_boarding_number, 'boarding_name' => $booking_data->selected_boarding_name, 'travels_name' => $data['travels_name'], 'seates' => implode(', ', $seats), 'pnr' => $data['pnr']);
                $sms_user_body = $com->getReplacedString($sms_user['body_web'], $array);
                $com->insertRecord(array('subject' => $sms_user['subject'], 'body' => $sms_user_body, 'type' => 'sms', 'to_email' => $data['notification_mobile'], 'attachment_url' => '', 'attachment_name' => '', 'from_email' => $sms_user['mail'], 'from_name' => $sms_user['mail_name'], 'to_name' => $data['name'], 'cc_email' => $sms_user['cc'], 'cc_name' => $sms_user['cc_name'], 'created_at' => date('Y-m-d H:i:s')), 'notifications');
                break;
            default:
                break;
        }
    }

    public function stationsInsert() {
        $obj = new Common();
        $res = array('error' => true, 'message' => 'No stations found');
        $data = "http://staging.busticketagent.com/orbitservices/api/1.0/json/orbit/development/85838253575G949485249W1A10YH813/station";
        if (count($data) > 0) {
            $res['error'] = false;
            $res['message'] = 'Sations found';
            $res['datas'] = json_decode(file_get_contents($data), true);
            foreach ($res['datas']['data'] as $station) {
                $result = $obj->insertRecord($station, 'stations');
                if ($result) {
                    //echo "Inserted Sucessfully";
                }
            }
        }
        return $res;
    }

    public function stationsAutocomplete() {
        $res = array('error' => true, 'message' => 'No stations found');
        $data = "http://staging.busticketagent.com/orbitservices/api/1.0/json/orbit/development/85838253575G949485249W1A10YH813/station";
        if (count($data) > 0) {
            $res['error'] = false;
            $res['message'] = 'Sations found';
            $res['datas'] = json_decode(file_get_contents($data), true);
        }
        return $res;
    }

    public function sendBeforeAlerts() {
        date_default_timezone_set('Asia/Kolkata');
        $com = new Common();
        $_4_hrs = $com->selectAllCustomFieldsWithWhere('b.ID, b.notification_mobile, b.booking_data, b.travels_name, b.pnr, u.name, u.mobile', 'bookings AS b LEFT JOIN users AS u ON u.ID = b.user_id', 'b.sent_4_hrs_message = 0 AND is_cancelled = 0');
        if (count($_4_hrs) > 0) {
            foreach ($_4_hrs as $row) {
                $booking_data = json_decode($row['booking_data']);
                $travel_date = strtotime($booking_data->selected_boarding_datetime);
                $now = strtotime(date('Y-m-d H:i:s'));
                $remain = (($travel_date - $now) / 60);
                if ($remain > 0) {
                    if ($remain <= 240) {
                        $this->addNotification($row, $row['ID'], 'before_4_hrs_alert');
                        $com->updateRecordWithWhere(array('sent_4_hrs_message' => 1), 'bookings', 'ID=' . $row['ID']);
                    }
                } else {
                    $com->updateRecordWithWhere(array('sent_4_hrs_message' => 1, 'sent_2_hrs_message' => 1), 'bookings', 'ID=' . $row['ID']);
                }
            }
        }
        $_2_hrs = $com->selectAllCustomFieldsWithWhere('b.ID, b.notification_mobile, b.booking_data, b.travels_name, b.pnr, u.name, u.mobile', 'bookings AS b LEFT JOIN users AS u ON u.ID = b.user_id', 'b.sent_2_hrs_message = 0 AND is_cancelled = 0');
        if (count($_2_hrs) > 0) {
            foreach ($_2_hrs as $row) {
                $booking_data = json_decode($row['booking_data']);
                $travel_date = strtotime($booking_data->selected_boarding_datetime);
                $now = strtotime(date('Y-m-d H:i:s'));
                $remain = (($travel_date - $now) / 60);
                if ($remain > 0) {
                    if ($remain <= 120) {
                        $this->addNotification($row, $row['ID'], 'before_2_hrs_alert');
                        $com->updateRecordWithWhere(array('sent_2_hrs_message' => 1), 'bookings', 'ID=' . $row['ID']);
                    }
                } else {
                    $com->updateRecordWithWhere(array('sent_4_hrs_message' => 1, 'sent_2_hrs_message' => 1), 'bookings', 'ID=' . $row['ID']);
                }
            }
        }
    }

    public function syncTopRoutes() {
        $com = new Common();
        $com->deleteRecordWithWhere('top_routes', 'ID > 0');
        $operators = $com->selectAllCustomFieldsWithWhere('p.base_url, p.api_key, p.merchent_id, p.user_id, p.password, p.date_format, r.*', 'api_providers AS p LEFT JOIN api_routes AS r ON r.api_provider_id = p.ID', 'p.status = 1');
        if (count($operators) > 0) {
            foreach ($operators as $record) {
                if ($record['type'] == 'json') {
                    if ($record['method'] == 'get') {
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $record['base_url'] . $record['endpoint']);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
                        $response = curl_exec($ch);
                        curl_close($ch);
                        $result = $response;
                        $status = $com->getDecodeExplodeValue($record['success_param'], $result);
                        if ($status == $record['success_value']) {
                            $array_data = $com->getDecodeExplodeValue($record['data_param'], $result);
                            $this->updateTopRoutes($record['format_type'], $array_data, $record['api_provider_id']);
                        }
                    }
                }
            }
        }
    }

    public function updateTopRoutes($format, $arr, $pid) {
        $com = new Common();
        switch ($format) {
            case 1:
            case '1':
                foreach ($arr as $key => $val) {
                    $from = $com->selectRowCustomFieldsWithWhere('s.name, s.code', 'provider_stations AS ps LEFT JOIN stations AS s ON s.code = ps.master_station_code', 'ps.provider_station_code = \'' . $key . '\' AND ps.api_provider_id = ' . $pid);
                    foreach ($val as $v) {
                        if ($from['name'] != null && $from['name'] != '') {
                            $qry = 'INSERT INTO top_routes (from_name, to_name, from_code, to_code) SELECT \'' . $from['name'] . '\', s.name, \'' . $from['code'] . '\', s.code FROM provider_stations AS ps LEFT JOIN stations AS s ON s.code = ps.master_station_code WHERE ps.provider_station_code = \'' . $v . '\' AND ps.api_provider_id = ' . $pid;
                            $insert = $com->insertRecordWithQry($qry);
                        }
                    }
                }
                break;
            default:
                break;
        }
    }

    public function syncProviderStations() {
        $com = new Common();
        $operators = $com->selectAllCustomFieldsWithWhere('p.base_url, p.api_key, p.merchent_id, p.user_id, p.password, p.date_format, s.*', 'api_providers AS p LEFT JOIN api_stations AS s ON s.api_provider_id = p.ID', 'p.status = 1');
        if (count($operators) > 0) {
            foreach ($operators as $record) {
                if ($record['type'] == 'json') {
                    if ($record['method'] == 'get') {
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $record['base_url'] . $record['endpoint']);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
                        $response = curl_exec($ch);
                        curl_close($ch);
                        $result = $response;
                        $status = $com->getDecodeExplodeValue($record['success_param'], $result);
                        if ($status == $record['success_value']) {
                            $array_data = $com->getDecodeExplodeValue($record['data_param'], $result);
                            $this->updateStations($record['format_type'], $array_data, $record['api_provider_id']);
                        }
                    }
                }
            }
            $stations = array();
            $stations_arr = $com->selectAllCustomWithWhere(array('master_station_code'), 'provider_stations', 'ID > 0 GROUP BY master_station_code');
            if (count($stations_arr) > 0) {
                foreach ($stations_arr as $row) {
                    array_push($stations, $row['master_station_code']);
                }
            }
            if (count($stations) > 0) {
                $com->deleteRecordWithWhere('stations', 'code NOT IN (' . implode(',', $stations) . ')');
            }
        }
    }

    public function updateStations($format, $arr, $pid) {
        $com = new Common();
        switch ($format) {
            case 1:
            case '1':
                $stations = array();
                foreach ($arr as $val) {
                    array_push($stations, $val->code);
                    $station = $com->selectRowCustomFieldsWithWhere('s.name, s.code', 'provider_stations AS ps LEFT JOIN stations AS s ON s.code = ps.master_station_code', 'ps.provider_station_code = \'' . $val->code . '\' AND ps.api_provider_id = ' . $pid);
                    if (count($station) > 0) {
                        if ($station['name'] == null || $station['name'] == '') {
                            $com->insertRecord(array('name' => $val->name, 'code' => strtolower($val->name)), 'stations');
                        }
                    } else {
                        $provider_station = $com->insertRecord(array('master_station_code' => strtolower($val->name), 'provider_station_code' => $val->code, 'api_provider_id' => $pid), 'provider_stations');
                        $station_new = $com->selectRowCustomFieldsWithWhere('s.name, s.code', 'provider_stations AS ps LEFT JOIN stations AS s ON s.code = ps.master_station_code', 'ps.provider_station_code = \'' . $val->code . '\' AND ps.api_provider_id = ' . $pid);
                        if (count($station_new) > 0) {
                            if ($station_new['name'] == null || $station_new['name'] == '') {
                                $com->insertRecord(array('name' => $val->name, 'code' => strtolower($val->name)), 'stations');
                            } else {
                                $com->updateRecordWithWhere(array('master_station_code' => $station_new['code']), 'provider_stations', 'ID=' . $provider_station);
                            }
                        }
                    }
                }
                $com->deleteRecordWithWhere('provider_stations', 'provider_stations NOT IN (' . implode(',', $stations) . ') AND api_provider_id = ' . $pid);
                break;
            default:
                break;
        }
    }

}
