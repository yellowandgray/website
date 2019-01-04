<?php

//$app->post('/login', 'authenticate', function() use ($app) {
$app->post('/login', function() use ($app) {
    $data = array('login_email' => $app->request->post('login_email'), 'login_password' => $app->request->post('login_password'));
    $db = new user();
    $res = $db->login($data);
    echoRespnse(201, $res);
});

//$app->post('/register', 'authenticate', function() use ($app) {
$app->post('/register', function() use ($app) {
    $data = $app->request->post('data');
    $obj = new User();
    $res = $obj->register($data);
    echoRespnse(201, $res);
});

$app->post('/user', function() use ($app) {
    $data = $app->request->post();
    $obj = new user();
    $res = $obj->create($data);
    echoRespnse(201, $res);
});

$app->post('/makepayment', function() use ($app) {
    $data = $app->request->post();
    $obj = new user();
    //session_start();
    $data['user_ID'] = $_SESSION['ID'];
    $res = $obj->makePayment($data);
    echoRespnse(201, $res);
});

$app->get('/bookings', function() {
    $db = new user();
    $res = $db->getAllBookings();
    echoRespnse(201, $res);
});

$app->post('/generatereport', function() use ($app) {
    //$data = array('start_date' => $app->request->post('start_date'), 'end_date' => $app->request->post('end_date'));
    $db = new user();
    $report_start_date = $app->request->post('report_start_date');
    $report_end_date = $app->request->post('report_end_date');
    $res = $db->getAllBookingsreport($report_start_date, $report_end_date);
    echoRespnse(201, $res);
});

$app->get('/users', function() {
    $db = new user();
    $res = $db->getAll();
    echoRespnse(201, $res);
});

$app->delete('/users/:id', function($id) {
    $db = new user();
    $res = $db->delete($id);
    if ($res['error'] === false) {
        $response['error'] = false;
        $response['message'] = $res['message'];
    } else {
        $response = array('error' => true, 'message' => $res['message']);
    }
    echoRespnse(201, $response);
});
