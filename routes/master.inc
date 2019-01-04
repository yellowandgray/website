<?php

//banner
$app->post('/events', function() use ($app) {
    $data = $app->request->post();
    $obj = new master();
    $res = $obj->add_Banner($data, $_FILES['eventimage']);
    echoRespnse(201, $res);
});

$app->get('/events', function() {
    $db = new master();
    $res = $db->getAllBanner();
    echoRespnse(201, $res);
});

$app->delete('/events/:id', function($id) {
    $db = new master();
    $res = $db->deleteBanner($id);
    if ($res['error'] === false) {
        $response['error'] = false;
        $response['message'] = $res['message'];
    } else {
        $response = array('error' => true, 'message' => $res['message']);
    }
    echoRespnse(201, $response);
});

//$app->get('/type:/id', 'authenticate', function($id) {
$app->get('/events/:id', function($id) {
    $db = new master();
    $res = $db->getBannerById($id);
    if ($res['error'] === false) {
        $response['error'] = false;
        $response['data'] = $res['data'];
        $response['message'] = $res['message'];
    } else {
        $response = array('error' => true, 'message' => $res['message']);
    }
    echoRespnse(201, $response);
});

//$app->put('/type', 'authenticate', function() use ($app) {
$app->put('/events', function() use($app) {
    $data = $app->request->put();
    $db = new master();
    $res = $db->updateBanner($data, $_FILES['homebanner']);
    echoRespnse(201, $res);
});
