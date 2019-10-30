<?php

session_start();

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
    $record = $com->insertRecord(array('type' => $data['type'], 'category_id' => $data['category_id'], 'name' => $data['name'], 'cover_image' => $data['cover_image'], 'logo' => $data['logo'], 'state_id' => $data['state'], 'city' => $data['city'], 'zipcode' => $data['zip'], 'landmark' => $data['landmark'], 'address' => $data['address'], 'leader_name' => $data['club_leader_name'], 'no_of_member' => $data['no_of_member'], 'email' => $data['email'], 'phone' => $data['mobile'], 'about' => $data['about'], 'facebook_link' => $data['facebook_link'], 'youtube_link' => $data['youtube_link'], 'twitter_link' => $data['twitter_link'], 'instagram_link' => $data['instagram_link'], 'rank' => $data['rank'], 'club_video' => $data['club_video'], 'published' => $data['published'], 'source' => $data['source']), 'club');
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
    $array = array('media_type' => $data['media_type'], 'type' => $data['type'], 'title' => $data['title'], 'media_path' => $data['media_path'], 'description' => $data['description']);
    if (isset($data['thumb_path'])) {
        $array['thumb_path'] = $data['thumb_path'];
    }
    $record = $com->insertRecord($array, 'gallery');
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
    $record = $com->insertRecord(array('type' => $data['type'], 'category_id' => $data['category_id'], 'club_id' => $data['club_id'], 'cover_image' => $data['cover_image'], 'title' => $data['title'], 'media_id' => $data['media_id'], 'author_name' => $data['author_name'], 'news_date' => $data['date'], 'thumb_image' => $data['thumb_image'], 'banner_1' => $data['banner_image_1'], 'banner_2' => $data['banner_image_2'], 'moto_text' => $data['moto_text'], 'description_1' => $data['description'], 'description_2' => $data['description_1'], 'youtube_id' => $data['youtube_id'], 'sponsor' => $data['sponsor']), 'news');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_media', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name' => $data['name']), 'media');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_asset', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('title' => $data['title'], 'image_path' => $data['image']), 'asset');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_press_release', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('type' => $data['type'], 'cover_image' => $data['cover_image'], 'title' => $data['title'], 'media_id' => $data['media_id'], 'author_name' => $data['author_name'], 'press_release_date' => $data['date'], 'thumb_image' => $data['thumb_image'], 'banner_1' => $data['banner_image_1'], 'banner_2' => $data['banner_image_2'], 'description_1' => $data['description'], 'description_2' => $data['description_1'], 'youtube_id' => $data['youtube_id']), 'press_release');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_announcement', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('club_id' => $data['club_id'], 'title' => $data['title'], 'announcement_date' => $data['announcement_date'], 'thumb_image' => $data['thumb_image'], 'description' => $data['description']), 'announcement');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_news_gallery', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    if (isset($_FILES) && isset($_FILES['file'])) {
        $path = $com->saveFile($_FILES['file'], 'uploads');
    }
    $record = $com->insertRecord(array('news_id' => $data['news_id'], 'media_path' => $path), 'news_gallery');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_club_gallery', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    if (isset($_FILES) && isset($_FILES['file'])) {
        $path = $com->saveFile($_FILES['file'], 'uploads');
    }
    $record = $com->insertRecord(array('club_id' => $data['club_id'], 'media_path' => $path), 'club_gallery');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_event', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('type' => $data['type'], 'category_id' => $data['category_id'], 'club_id' => $data['club_id'], 'cover_image' => $data['cover_image'], 'title' => $data['title'], 'thumb_image' => $data['thumb_image'], 'event_date' => $data['event_date'], 'location' => $data['location'], 'description' => $data['description'], 'sponsor' => $data['sponsor']), 'event');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/check_member_exist', function() use ($app) {
    $res = array('error' => true, 'message' => 'Not exist');
    $data = $app->request->post();
    $com = new Common();
    $exist = $com->selectRow('*', 'member', 'email = \'' . $data['email'] . '\'');
    if (count($exist) == 0) {
        $res['error'] = false;
        $res['message'] = 'User not found';
    } else {
        $res['message'] = 'Email id already exist';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_member', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $admin_created = false;
    $exist = $com->selectRow('*', 'member', 'email = \'' . $data['email'] . '\'');
    if (count($exist) == 0) {
        if (!isset($data['password']) || $data['password'] == '') {
            $admin_created = true;
            $data['password'] = $com->randomStringGenerator(8);
        }
        $state = $com->selectRow('*', 'state', 'state_id = ' . $data['state_id']);
        $data['state'] = $state['name'];
        if (!isset($data['profile_picture'])) {
            $data['profile_picture'] = '';
        }
        $record = $com->insertRecord(array('type' => $data['type'], 'first_name' => $data['first_name'], 'last_name' => $data['last_name'], 'profile_picture' => $data['profile_picture'], 'gender' => $data['gender'], 'age' => $data['age'], 'ic_passport' => $data['ic_passport'], 'dob_date' => $data['dob_date'], 'dob_month' => $data['dob_month'], 'dob_year' => $data['dob_year'], 'contact_number' => $data['contact_number'], 'address' => $data['address'], 'country' => $data['country'], 'state_id' => $data['state_id'], 'referral_member_id' => $data['referral_member_id'], 'referral_club_id' => $data['referral_club_id'], 'marital_status' => $data['marital_status'], 'zip_code' => $data['zip_code'], 'email' => $data['email'], 'email_id' => $data['email_id'], 'password' => $com->encryptPassword($data['password']), 'club_id' => $data['club_id'], 'payment_type' => $data['payment_type'], 'paypal_response' => $data['paypal_response'], 'activated' => $data['activated'], 'paypal_transaction_id' => $data['paypal_transaction_id'], 'fund_transfer_file' => $data['fund_transfer_file'], 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')), 'member');
        if ($record > 0) {
            $res['error'] = false;
            $member_id = 'TW' . strtoupper(substr($data['gender'], 0, 1)) . strtoupper(substr($data['ic_passport'], 0, 3)) . strtoupper(substr($data['state'], 0, 2));
            $update_arr = array('membership_id' => $member_id);
            if (isset($data['activated_by'])) {
                $update_arr['activated_by'] = $data['activated_by'];
            }
            if (isset($data['activated_at'])) {
                $update_arr['activated_at'] = $data['activated_at'];
            }
            $com->updateRecordWithWhere($update_arr, 'member', 'member_id = ' . $record);
            $res['message'] = 'Record inserted successfully';
            $res['data'] = $member_id;
            if (filter_var($data['email_id'], FILTER_VALIDATE_EMAIL)) {
                $tpy = new Thirdparty();
                $data['membership_id'] = $member_id;
                if ($data['activated'] == 1) {
                    if ($admin_created == false) {
                        $data['password'] = 'Your password';
                    }
                    $data['link'] = LOGIN_PATH;
                    $template = $com->selectRow('*', 'templates', 'name=\'new_member_register_activated\' AND type=\'email\' AND target=\'user\'');
                }
                if ($data['activated'] == 0) {
                    $template = $com->selectRow('*', 'templates', 'name=\'new_member_register_pending\' AND type=\'email\' AND target=\'user\'');
                }
                $template_admin = $com->selectRow('*', 'templates', 'name=\'new_member_register\' AND type=\'email\' AND target=\'admin\'');
                $body = $com->getReplacedString($template['body_web'], $data);
                $body_admin = $com->getReplacedString($template_admin['body_web'], $data);
                $tpy->sendMail($template_admin['mail'], $template_admin['mail_name'], $body_admin, $body_admin, $template_admin['subject'], $data['email_id'], $data['first_name'] . ' ' . $data['last_name'], '', '', $template_admin['cc'], $template_admin['cc_name']);
                $tpy->sendMail($data['email_id'], $data['first_name'] . ' ' . $data['last_name'], $body, $body, $template['subject'], $template['mail'], $template['mail_name'], '', '', $template['cc'], $template['cc_name']);
            }
        }
    } else {
        $res['message'] = 'User name already exist';
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

$app->post('/insert_users', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $exist = $com->selectRow('*', 'member', 'email = \'' . $data['email'] . '\'');
    if (count($exist) == 0) {
        $data['password'] = $com->randomStringGenerator(8);
        $data['link'] = LOGIN_ADMIN_PATH;
        $array = array('name' => $data['name'], 'email' => $data['email'], 'contact' => $data['contact'], 'password' => $com->encryptPassword($data['password']), 'media_path' => $data['file_name'], 'role' => $data['role'], 'gender' => $data['gender']);
        $record = $com->insertRecord($array, 'users');
        if ($record > 0) {
            $tpy = new Thirdparty();
            $res['error'] = false;
            $res['message'] = 'Record inserted successfully';
            $template = $com->selectRow('*', 'templates', 'name=\'new_user_register\' AND type=\'email\' AND target=\'user\'');
            $body = $com->getReplacedString($template['body_web'], $data);
            $tpy->sendMail($data['email'], $data['name'], $body, $body, $template['subject'], $template['mail'], $template['mail_name'], '', '', $template['cc'], $template['cc_name']);
        }
    } else {
        $res['message'] = 'Email id already exist';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_workshop', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $array = array('name' => $data['name'], 'type' => $data['type'], 'email' => $data['email'], 'mobile' => $data['mobile'], 'incharge' => $data['incharge'], 'image_path' => $data['image_path'], 'description' => $data['description']);
    $record = $com->insertRecord($array, 'workshop');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
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
    $data = $com->selectAll('name, value, display_name, field_type, config_id', 'config', 'name IN (\'home_banner_video\', \'home_card_ad1\', \'home_card_ad2\', \'home_banner_ad\', \'home_banner_video_four_wheel\', \'two_wheel_photos\', \'two_wheel_videos\', \'four_wheel_photos\', \'four_wheel_videos\')');
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

$app->get('/get_news_gallery_by_news/:nid', function($nid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'news_gallery', 'news_id = ' . $nid);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_club_gallery_by_club/:cid', function($cid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'club_gallery', 'club_id = ' . $cid);
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

$app->get('/get_newsletter', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'newsletter', 'newsletter_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_two_wheel_member', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('m.*, c.name AS club, s.name AS state, u.name AS activated_user, us.name AS blocked_user', 'member AS m LEFT JOIN club AS c ON c.club_id = m.club_id LEFT JOIN users AS u ON u.users_id = m.activated_by LEFT JOIN users AS us ON us.users_id = m.blocked_by LEFT JOIN state AS s ON s.state_id = m.state_id', 'm.member_id > 0 AND m.type = \'two_wheel\'');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_four_wheel_member', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('m.*, c.name AS club, s.name AS state, u.name AS activated_user, us.name AS blocked_user', 'member AS m LEFT JOIN club AS c ON c.club_id = m.club_id LEFT JOIN users AS u ON u.users_id = m.activated_by LEFT JOIN users AS us ON us.users_id = m.blocked_by LEFT JOIN state AS s ON s.state_id = m.state_id', 'm.member_id > 0 AND m.type = \'four_wheel\'');
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
    $data = $com->selectAll('c.*, ca.name AS category', 'club AS c LEFT JOIN category AS ca ON c.category_id = ca.category_id', 'c.club_id > 0 AND c.category_id = ' . $cid . ' AND c.published = 1');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_club_by_type/:type', function($type) {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('c.*, ca.name AS category', 'club AS c LEFT JOIN category AS ca ON c.category_id = ca.category_id', 'c.club_id > 0 AND c.type = \'' . $type . '\' AND c.published = 1');
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
    $data = $com->selectAll('*', 'gallery', 'gallery_id > 0 AND type = \'two_wheel\'');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_gallery_four_wheel', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'gallery', 'gallery_id > 0 AND type = \'four_wheel\'');
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

$app->get('/get_press_release', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'press_release', 'press_release_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_news_by_category/:cid/:type', function($cid, $type) {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $category = '';
    if ($cid != 0) {
        $category = ' AND n.category_id = ' . $cid;
    }
    $data = $com->selectAll('n.*, m.name AS media, c.name AS club, ca.name AS category', 'news AS n LEFT JOIN media AS m ON m.media_id = n.media_id LEFT JOIN club AS c ON c.club_id = n.club_id LEFT JOIN category AS ca ON ca.category_id = n.category_id AND ca.category_id = c.category_id', 'n.news_id > 0 AND n.type = \'' . $type . '\'' . $category);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_announcement/:cid', function($cid) {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'announcement', 'announcement_id > 0 AND club_id = ' . $cid);
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
    $data = $com->selectAll('e.*, c.name AS club, ca.name AS category', 'event AS e LEFT JOIN club AS c ON c.club_id = e.club_id LEFT JOIN category AS ca ON ca.category_id = e.category_id AND ca.category_id = c.category_id', 'e.event_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/delete_record/:table/:where', function($table, $where) {
    $res = array('error' => true, 'message' => 'Unable to delete');
    $com = new Common();
    $data = $com->deleteRecordWithWhere($table, $where);
    if ($data > 0) {
        $res['error'] = false;
        $res['message'] = 'Record deleted successfully';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->post('/update_record/:table/:where', function($table, $where) use ($app) {
    $res = array('error' => true, 'message' => 'Unable to update');
    $data = $app->request->post();
    $com = new Common();
    if (isset($data['password'])) {
        $data['password'] = $com->encryptPassword($data['password']);
    }
    $record = $com->updateRecordWithWhere($data, $table, $where);
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record updated successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/update_user_status/:table/:where', function($table, $where) use ($app) {
    $res = array('error' => true, 'message' => 'Unable to update');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->updateRecordWithWhere($data, $table, $where);
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record updated successfully';
        $tpy = new Thirdparty();
        $data = $com->selectRow('*', $table, $where);
        $data['link'] = LOGIN_PATH;
        if ($data['activated'] == 1) {
            $template = $com->selectRow('*', 'templates', 'name=\'member_activated\' AND type=\'email\' AND target=\'user\'');
        }
        if ($data['activated'] == 0) {
            $template = $com->selectRow('*', 'templates', 'name=\'member_blocked\' AND type=\'email\' AND target=\'user\'');
        }
        $data['password'] = 'Your password';
        $body = $com->getReplacedString($template['body_web'], $data);
        $tpy->sendMail($data['email_id'], $data['first_name'] . ' ' . $data['last_name'], $body, $body, $template['subject'], $template['mail'], $template['mail_name'], '', '', $template['cc'], $template['cc_name']);
    }
    echoRespnse(201, $res);
});

$app->post('/update_tshirt_status/:table/:where', function($table, $where) use ($app) {
    $res = array('error' => true, 'message' => 'Unable to update');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->updateRecordWithWhere($data, $table, $where);
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record updated successfully';
        $tpy = new Thirdparty();
        $data = $com->selectRow('*', $table, $where);
        if ($data['t_shirt_status'] == 2) {
            $template = $com->selectRow('*', 'templates', 'name=\'tshirt_shipped\' AND type=\'email\' AND target=\'user\'');
        }
        if ($data['t_shirt_status'] == 3) {
            $template = $com->selectRow('*', 'templates', 'name=\'tshirt_delivered\' AND type=\'email\' AND target=\'user\'');
        }
        $body = $com->getReplacedString($template['body_web'], $data);
        $tpy->sendMail($data['email_id'], $data['first_name'] . ' ' . $data['last_name'], $body, $body, $template['subject'], $template['mail'], $template['mail_name'], '', '', $template['cc'], $template['cc_name']);
    }
    echoRespnse(201, $res);
});

$app->post('/loginmember', function() use ($app) {
    $res = array('error' => true, 'message' => 'Invalid login details');
    $data = $app->request->post();
    $obj = new Common();
    $record = $obj->selectRow('*', 'member', 'email=\'' . $data['email'] . '\'');
    if (count($record) > 0) {
        if ($record['activated'] == 1) {
            $pass_matchs = $obj->decryptPassword($data['password'], $record['password']);
            if ($pass_matchs == true) {
                $res['error'] = false;
                $res['message'] = 'Welcome ' . $record['first_name'];
                $_SESSION['member_id'] = $record['member_id'];
            }
        } else {
            $res['message'] = 'Your account was not activated! Kindly contact admin team';
        }
    }
    echoRespnse(201, $res);
});

$app->post('/loginadmin', function() use ($app) {
    $res = array('error' => true, 'message' => 'Invalid login details');
    $data = $app->request->post();
    $obj = new Common();
    $record = $obj->selectRow('*', 'users', 'email=\'' . $data['email'] . '\'');
    if (count($record) > 0) {
        $pass_matchs = $obj->decryptPassword($data['password'], $record['password']);
        if ($pass_matchs == true) {
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $obj->updateRecordWithWhere(array('last_login' => date('Y-m-d H:i:s')), 'users', 'users_id=' . $record['users_id']);
            $res['error'] = false;
            $res['message'] = 'Welcome ' . $record['name'];
            $res['data'] = $record;
        } else {
            $res['message'] = 'Username or Password mismatch';
        }
    }
    echoRespnse(201, $res);
});

$app->post('/subscribe_news_letter', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to subscribe');
    $data = $app->request->post();
    $com = new Common();
    $exist = $com->selectRow('*', 'newsletter', 'email=\'' . $data['email'] . '\'');
    if (count($exist) > 0) {
        $res['message'] = 'This email have already subscribed';
    } else {
        $record = $com->insertRecord(array('email' => $data['email']), 'newsletter');
        if ($record > 0) {
            $res['error'] = false;
            $res['message'] = 'Record inserted successfully';
        }
    }
    echoRespnse(201, $res);
});


$app->get('/get_users', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'users', 'users_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_two_wheel_workshop', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'workshop', 'workshop_id > 0 AND type = \'two_wheel\'');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_four_wheel_workshop', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'workshop', 'workshop_id > 0 AND type = \'four_wheel\'');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_asset', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'asset', 'asset_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->post('/forgotpassword', function() use ($app) {
    $data = $app->request->post();
    $obj = new Common();
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $res = array('error' => true, 'message' => 'No user found in this email id');
    $user = $obj->selectRow('*', 'member', 'email_id = \'' . $data['email'] . '\'');
    if (count($user) > 0) {
        $res['error'] = false;
        $expires = array('value' => 5); //$obj->selectRow('*', 'configs', 'name=\'reset_link_expires\'');
        $code = uniqid();
        $expired = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' + ' . $expires['value'] . ' minute'));
        $update = $obj->updateRecordWithWhere(array('reset_code' => $code, 'reset_initiated_at' => date('Y-m-d H:i:s'), 'reset_expired_at' => $expired), 'member', 'member_id=\'' . $user['member_id'] . '\'');
        if ($update > 0) {
            $res['message'] = 'Reset link sent to your email ID';
            $template = $obj->selectRow('*', 'templates', 'name=\'forgot_password_link\' AND type=\'email\' AND target=\'user\'');
            $user['link'] = FILES_PATH . 'change_password.php?auth=' . $code;
            $user['reset_expired_at'] = date('d-m-Y H:i:s', strtotime($expired));
            $body = $obj->getReplacedString($template['body_web'], $user);
            $tpty = new Thirdparty();
            $tpty->sendMail($user['email_id'], $user['first_name'] . ' ' . $user['last_name'], $body, $body, $template['subject'], $template['mail'], $template['mail_name'], '', '', $template['cc'], $template['cc_name']);
        }
    }
    echoRespnse(201, $res);
});

$app->post('/reset_password', function() use ($app) {
    $data = $app->request->post();
    $obj = new Common();
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $res = array('error' => true, 'message' => 'Unable to update your password');
    $user = $obj->selectRow('*', 'member', 'reset_code = \'' . $data['auth'] . '\'');
    if (count($user) > 0) {
        $update = $obj->updateRecordWithWhere(array('password' => $obj->encryptPassword($data['password'])), 'member', 'reset_code=\'' . $data['auth'] . '\'');
        if ($update > 0) {
            $res['error'] = false;
            $res['message'] = 'Password updated successfully';
            $template = $obj->selectRow('*', 'templates', 'name=\'password_update_success\' AND type=\'email\' AND target=\'user\'');
            $body = $obj->getReplacedString($template['body_web'], $user);
            $tpty = new Thirdparty();
            $tpty->sendMail($user['email_id'], $user['first_name'] . ' ' . $user['last_name'], $body, $body, $template['subject'], $template['mail'], $template['mail_name'], '', '', $template['cc'], $template['cc_name']);
        }
    } else {
        $res['message'] = 'Authentication failed';
    }
    echoRespnse(201, $res);
});

$app->post('/reset_user_password', function() use ($app) {
    $data = $app->request->post();
    $obj = new Common();
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $res = array('error' => true, 'message' => 'Unable to update your password');
    $user = $obj->selectRow('*', 'users', 'reset_code = \'' . $data['auth'] . '\'');
    if (count($user) > 0) {
        $update = $obj->updateRecordWithWhere(array('password' => $obj->encryptPassword($data['password'])), 'users', 'reset_code=\'' . $data['auth'] . '\'');
        if ($update > 0) {
            $res['error'] = false;
            $res['message'] = 'Password updated successfully';
            $template = $obj->selectRow('*', 'templates', 'name=\'password_update_success\' AND type=\'email\' AND target=\'user\'');
            $user['first_name'] = $user['name'];
            $user['last_name'] = '';
            $body = $obj->getReplacedString($template['body_web'], $user);
            $tpty = new Thirdparty();
            $tpty->sendMail($user['email'], $user['name'], $body, $body, $template['subject'], $template['mail'], $template['mail_name'], '', '', $template['cc'], $template['cc_name']);
        }
    } else {
        $res['message'] = 'Authentication failed';
    }
    echoRespnse(201, $res);
});

$app->post('/change_password', function() use ($app) {
    $data = $app->request->post();
    $data['member'] = $_SESSION['member_id'];
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to change password');
    $exist = $obj->selectRow('*', 'member', 'member_id = ' . $data['member']);
    if (count($exist) > 0) {
        $pass_matchs = $obj->decryptPassword($data['old_password'], $exist['password']);
        if ($pass_matchs == true) {
            $res['error'] = false;
            $res['message'] = 'Password updated successfully';
            $obj->updateRecordWithWhere(array('password' => $obj->encryptPassword($data['new_password'])), 'member', 'member_id=' . $data['member']);
            $template = $obj->selectRow('*', 'templates', 'name=\'password_update_success\' AND type=\'email\' AND target=\'user\'');
            $body = $obj->getReplacedString($template['body_web'], $exist);
            $tpty = new Thirdparty();
            $tpty->sendMail($exist['email_id'], $exist['first_name'] . ' ' . $exist['last_name'], $body, $body, $template['subject'], $template['mail'], $template['mail_name'], '', '', $template['cc'], $template['cc_name']);
        } else {
            $res['message'] = 'Current password mismatch';
        }
    } else {
        $res['message'] = 'No user found';
    }
    echoRespnse(201, $res);
});

$app->post('/change_password_user', function() use ($app) {
    $data = $app->request->post();
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to change password');
    $exist = $obj->selectRow('*', 'users', 'users_id = ' . $data['user']);
    if (count($exist) > 0) {
        $pass_matchs = $obj->decryptPassword($data['old_password'], $exist['password']);
        if ($pass_matchs == true) {
            $res['error'] = false;
            $res['message'] = 'Password updated successfully';
            $obj->updateRecordWithWhere(array('password' => $obj->encryptPassword($data['new_password'])), 'users', 'users_id=' . $data['user']);
            $template = $obj->selectRow('*', 'templates', 'name=\'password_update_success\' AND type=\'email\' AND target=\'admin\'');
            $exist['first_name'] = $exist['name'];
            $exist['last_name'] = '';
            $body = $obj->getReplacedString($template['body_web'], $exist);
            $tpty = new Thirdparty();
            $tpty->sendMail($exist['email'], $exist['name'], $body, $body, $template['subject'], $template['mail'], $template['mail_name'], '', '', $template['cc'], $template['cc_name']);
        } else {
            $res['message'] = 'Current password mismatch';
        }
    } else {
        $res['message'] = 'No user found';
    }
    echoRespnse(201, $res);
});

$app->post('/forgotpassword_user', function() use ($app) {
    $data = $app->request->post();
    $obj = new Common();
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $res = array('error' => true, 'message' => 'No user found in this email id');
    $user = $obj->selectRow('*', 'users', 'email = \'' . $data['email'] . '\'');
    if (count($user) > 0) {
        $res['error'] = false;
        $expires = array('value' => 5); //$obj->selectRow('*', 'configs', 'name=\'reset_link_expires\'');
        $code = uniqid();
        $expired = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' + ' . $expires['value'] . ' minute'));
        $update = $obj->updateRecordWithWhere(array('reset_code' => $code, 'reset_initiated_at' => date('Y-m-d H:i:s'), 'reset_expired_at' => $expired), 'users', 'users_id=\'' . $user['users_id'] . '\'');
        if ($update > 0) {
            $res['message'] = 'Reset link sent to your email ID';
            $template = $obj->selectRow('*', 'templates', 'name=\'forgot_password_link_user\' AND type=\'email\' AND target=\'user\'');
            $user['link'] = FILES_PATH . 'user_change_password.php?auth=' . $code;
            $user['reset_expired_at'] = date('d-m-Y H:i:s', strtotime($expired));
            $body = $obj->getReplacedString($template['body_web'], $user);
            $tpty = new Thirdparty();
            $tpty->sendMail($user['email'], $user['name'], $body, $body, $template['subject'], $template['mail'], $template['mail_name'], '', '', $template['cc'], $template['cc_name']);
        }
    }
    echoRespnse(201, $res);
});

$app->post('/logout_user', function() use ($app) {
    $res = array('error' => false, 'message' => 'No user found in this email id');
    session_destroy();
    echoRespnse(201, $res);
});
