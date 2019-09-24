<?php

$app->post('/update_config', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to update');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->updateRecordWithWhere(array('value' => $data['value']), 'config', 'config_id = ' . $data['config_id']);
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record updated successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/upload_file', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to upload image');
    $obj = new Common();
    $data = '';
    if (isset($_FILES) && isset($_FILES['file'])) {
        $data = $obj->saveFile($_FILES['file'], 'uploads');
    }
    if ($data != '') {
        $res['error'] = false;
        $res['message'] = 'Image uploaded successfully';
        $res['data'] = $data;
        $res['extension'] = $obj->getExtension($data);
    }
    echoRespnse(201, $res);
});

$app->get('/get_landing_configs', function() {
    $res = array('error' => true, 'message' => 'Unable to export');
    $com = new Common();
    $data = $com->selectAll('name, value, display_name, field_type, config_id', 'config', 'name IN (\'landing_twowheel_image\', \'landing_fourwheel_image\', \'landing_description\', \'landing_about_us_image\', \'landing_news_updates_image\', \'landing_join_club_image\', \'landing_shop_now_image\', \'landing_banner_ad\')');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});
