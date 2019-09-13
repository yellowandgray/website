<?php

$app->post('/update_config', function() {
    $res = array('error' => true, 'message' => 'Unable to export');
    $com = new Common();
    $data = $com->selectAllCustomFieldsWithWhere('b.provider_name, b.travels_name, b.bus_type, b.grand_total, b.fare, b.credit_amt, b.transaction_amt, b.debit_amt, u.name, b.boarding_name, b.dropping_name, b.travel_date, b.no_of_passengers, b.transaction_id, b.order_code, b.pnr, b.pnr_agent, b.created_at', 'bookings AS b LEFT JOIN users AS u ON u.ID = b.user_id', 'b.created_at BETWEEN \'' . $start . '\' AND \'' . $end . '\'');
    if (count($data) > 0) {
        
    }
    echoRespnse(201, $res);
});
