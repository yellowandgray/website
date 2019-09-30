<?php

$app->post('/update_config', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to update');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->updateRecordWithWhere(array('value' => $data['value'], 'display_name' => $data['display_name']), 'config', 'config_id = ' . $data['config_id']);
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record updated successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_advertisement', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('title' => $data['title'], 'type' => $data['type'], 'image' => $data['image'], 'url' => $data['url']), 'advertisement');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_category', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name' => $data['name'], 'type' => $data['type']), 'category');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_club', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('type' => $data['type'], 'category_id' => $data['category_id'], 'name' => $data['name'], 'cover_image' => $data['cover_image'], 'logo' => $data['logo'], 'state_id' => $data['state'], 'city_id' => $data['city'], 'zipcode' => $data['zip'], 'landmark' => $data['landmark'], 'address' => $data['address'], 'leader_name' => $data['club_leader_name'], 'no_of_member' => $data['no_of_member'], 'email' => $data['email'], 'phone' => $data['mobile'], 'about' => $data['about']), 'club');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_gallery', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('media_type' => $data['media_type'], 'title' => $data['title'], 'media_path' => $data['media_path']), 'gallery');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_news', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('type' => $data['type'], 'category_id' => $data['category_id'], 'club_id' => $data['club_id'], 'cover_image' => $data['cover_image'], 'title' => $data['title'], 'media_id' => $data['media_id'], 'author_name' => $data['author_name'], 'news_date' => date('Y-m-d', strtotime($data['date'])), 'thumb_image' => $data['thumb_image'], 'banner_1' => $data['banner_image_1'], 'banner_2' => $data['banner_image_2'], 'moto_text' => $data['moto_text'], 'description_1' => $data['description'], 'description_2' => $data['description_1']), 'news');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_clubevent', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('type' => $data['type, category_id, club_name_id, banner, title, date, location, address'], 'display_name' => $data['display_name']), 'category');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
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
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('name, value, display_name, field_type, config_id', 'config', 'name IN (\'landing_twowheel_image\', \'landing_fourwheel_image\', \'landing_description\', \'landing_about_us_image\', \'landing_news_updates_image\', \'landing_join_club_image\', \'landing_shop_now_image\', \'landing_banner_ad\')');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_home_configs', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('name, value, display_name, field_type, config_id', 'config', 'name IN (\'home_banner_video\', \'home_card_ad1\', \'home_card_ad2\', \'home_banner_ad\')');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_advertisment', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'advertisement', 'advertisement_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_banner_advertisment', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'advertisement', 'advertisement_id > 0 AND type = \'banner\'');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_card_advertisment', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'advertisement', 'advertisement_id > 0 AND type = \'card\'');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_two_wheel_category', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'category', 'category_id > 0 AND type = \'two_wheel\'');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_states', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'state', 'state_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_city_by_state/:sid', function($sid) {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'city', 'city_id > 0 AND state_id = ' . $sid);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_four_wheel_category', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'category', 'category_id > 0 AND type = \'four_wheel\'');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_two_wheel_club', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('c.*, ca.name AS category', 'club AS c LEFT JOIN category AS ca ON c.category_id = ca.category_id', 'c.club_id > 0 AND c.type = \'two_wheel\'');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_four_wheel_club', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('c.*, ca.name AS category', 'club AS c LEFT JOIN category AS ca ON c.category_id = ca.category_id', 'c.club_id > 0 AND c.type = \'four_wheel\'');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_club_by_category/:cid', function($cid) {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('c.*, ca.name AS category', 'club AS c LEFT JOIN category AS ca ON c.category_id = ca.category_id', 'c.club_id > 0 AND c.category_id = ' . $cid);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_medias', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'media', 'media_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_gallery', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'gallery', 'gallery_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_news', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('n.*, m.name AS media, c.name AS club, ca.name AS category', 'news AS n LEFT JOIN media AS m ON m.media_id = n.media_id LEFT JOIN club AS c ON c.club_id = n.club_id LEFT JOIN category AS ca ON ca.category_id = n.category_id AND ca.category_id = c.category_id', 'n.news_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_event', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'event', 'event_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_clubevent', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('type, category_id, club_name_id, banner, title, date, location, address', 'category_id < 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});
