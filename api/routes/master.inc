<?php

$app->post('/space_rent', function() use ($app) {
    try {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $data = $app->request->post();
        $obj = new Common();
        $res = array('code' => 201, 'message' => 'Unable to book space');
        $insertion = $obj->insertRecord(array('name' => $data['name'], 'email' => $data['email'], 'mobile' => $data['mobile'], 'notes' => $data['notes'], 'created_at' => date('Y-m-d H:i:s')), 'space_rent');
        if ($insertion > 0) {
            $res['code'] = 200;
            $res['message'] = 'Space booked successfully';
            $tpy = new Thirdparty();
            foreach ($data['dates'] as $date) {
                $obj->insertRecord(array('rent_date' => date('Y-m-d', strtotime($date['date'])), 'from_time' => date('H:i:00', strtotime($date['from_time'])), 'to_time' => date('H:i:00', strtotime($date['to_time'])), 'space_rent_id' => $insertion, 'created_at' => date('Y-m-d H:i:s')), 'space_rent_date');
            }
            $tpy->sendMail($data['email'], $data['name'], 'Thanks to register with us. We\'ll get it touch soon', 'Thanks to register with us. We\'ll get it touch soon', 'Welcome mail', 'mushaqdeen@gmail.com', 'Mushaqdeen', '', '', '', '');
        }
    } catch (Exception $ex) {
        $res = array('message' => $ex->getMessage(), 'code' => $ex->getCode());
    }
    echoRespnse($res['code'], $res);
});

$app->post('/pnd_coaching', function() use ($app) {
    try {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $data = $app->request->post();
        $obj = new Common();
        $res = array('code' => 201, 'message' => 'Unable to add coach');
        $insertion = $obj->insertRecord(array('title' => $data['title'], 'coaching_date' => $data['coaching_date'], 'start_time' => $data['start_time'], 'end_time' => $data['end_time'], 'coacher_name' => $data['coacher_name'], 'coacher_profile' => $data['coacher_profile'], 'remark' => $data['remark'], 'created_at' => date('Y-m-d H:i:s')), 'space_rent');
        if ($insertion > 0) {
            $res['code'] = 200;
            $res['message'] = 'Coach added successfully';
        }
    } catch (Exception $ex) {
        $res = array('message' => $ex->getMessage(), 'code' => $ex->getCode());
    }
    echoRespnse($res['code'], $res);
});

$app->get('/space_rent', function() {
    try {
        $obj = new Common();
        $res = array('code' => 201, 'message' => 'Unable to get data');
        $data = $obj->selectAll('', $table, $where);
        if (count($data) > 0) {
            $res['code'] = 200;
            $res['message'] = 'Space booked successfully';
            $tpy = new Thirdparty();
            foreach ($data['dates'] as $date) {
                $obj->insertRecord(array('rent_date' => date('Y-m-d', strtotime($date['date'])), 'from_time' => date('H:i:00', strtotime($date['from_time'])), 'to_time' => date('H:i:00', strtotime($date['to_time'])), 'space_rent_id' => $insertion, 'created_at' => date('Y-m-d H:i:s')), 'space_rent_date');
            }
            $tpy->sendMail($data['email'], $data['name'], 'Thanks to register with us. We\'ll get it touch soon', 'Thanks to register with us. We\'ll get it touch soon', 'Welcome mail', 'mushaqdeen@gmail.com', 'Mushaqdeen', '', '', '', '');
        }
    } catch (Exception $ex) {
        $res = array('message' => $ex->getMessage(), 'code' => $ex->getCode());
    }
    echoRespnse($res['code'], $res);
});
