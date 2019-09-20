<?php

$app->post('/register', function() use ($app) {
    $data = $app->request->post();
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to register!!');
    $exist = $obj->selectRowWithWhere('users', 'email = \'' . $data['email'] . '\' OR mobile = \'' . $data['mobile'] . '\'');
    if (count($exist) == 0) {
        $db = new DbHandler();
        $data['code'] = uniqid();
        $data['otp'] = rand(100000, 999999);
        $insert = $obj->insertRecord($data, 'users');
        if ($insert > 0) {
            $res['error'] = false;
            $res['message'] = 'Register success';
            $res['data'] = $obj->selectRowWithWhere('users', 'ID=' . $insert);
            $db->addNotification($data, $insert, 'register');
        }
    } else {
        $res['message'] = 'Email or mobile already exist';
    }
    echoRespnse(201, $res);
});

$app->get('/resend_otp/:code', function($code) {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to send OTP!!');
    $exist = $obj->selectRowWithWhere('users', 'code = \'' . $code . '\'');
    if (count($exist) > 0) {
        $res['error'] = false;
        $res['message'] = 'OTP sent successfully';
        $tpry = new Thirdparty();
        $sms_user = $obj->selectRowWithWhere('templates', 'name=\'register\' AND type=\'sms\' AND target=\'user\'');
        $sms_user_body = $obj->getReplacedString($sms_user['body_web'], $exist);
        $tpry->sendSMS($exist['mobile'], $sms_user_body);
    }
    echoRespnse(201, $res);
});

$app->post('/login', function() use ($app) {
    $data = $app->request->post();
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to login!!');
    $exist = $obj->selectRowWithWhere('admins', 'email = \'' . $data['email'] . '\' AND password = \'' . $data['password'] . '\'');
    if (count($exist) > 0) {
        $res['error'] = false;
        $res['message'] = 'Welcome ' . $exist['name'];
        $res['data'] = $exist;
    } else {
        $res['message'] = 'Invalid login details';
    }
    echoRespnse(201, $res);
});

$app->get('/adminlogin/:email/:password', function($email, $password) {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to login!!');
    $exist = $obj->selectRowWithWhere('admins', 'email = \'' . $email . '\' AND password = \'' . $password . '\'');
    if (count($exist) > 0) {
        $res['error'] = false;
        $res['message'] = 'Welcome ' . $exist['name'];
        $res['data'] = $exist;
    } else {
        $res['message'] = 'Invalid login details';
    }
    echoRespnse(201, $res);
});

$app->get('/forgotpassword/:email', function($email) {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to send your password!!');
    $data = $obj->selectRowWithWhere('admins', 'email = \'' . $email . '\'');
    if (count($data) > 0) {
        $db = new DbHandler();
        $res['error'] = false;
        $res['message'] = 'Password sent to your email id';
        $db->addNotification($data, 1, 'forgot_password');
        $res['data'] = $data;
    } else {
        $res['message'] = 'No user found in this email id';
    }
    echoRespnse(201, $res);
});

$app->get('/forgotpasswordadmin/:email', function($email) {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to send your password!!');
    $data = $obj->selectRowWithWhere('admins', 'email = \'' . $email . '\'');
    if (count($data) > 0) {
        $db = new DbHandler();
        $res['error'] = false;
        $res['message'] = 'Password sent to your email id';
        $db->addNotification($data, 1, 'forgot_password');
        $res['data'] = $data;
    } else {
        $res['message'] = 'No user found in this email id';
    }
    echoRespnse(201, $res);
});

$app->get('/get_all/:table/:slug', function($table, $slug) {
    $res = array('error' => true, 'message' => 'No records found in ' . $slug);
    $obj = new Common();
    $data = $obj->selectAllWithoutWhere($table);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found in ' . $slug;
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_all_where/:table/:slug/:where', function($table, $slug, $where) {
    $res = array('error' => true, 'message' => 'No records found in ' . $slug);
    $obj = new Common();
    $data = $obj->selectAllWithWhere($table, $where);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found in ' . $slug;
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_row_where/:table/:slug/:where', function($table, $slug, $where) {
    $res = array('error' => true, 'message' => 'No records found in ' . $slug);
    $obj = new Common();
    $data = $obj->selectRowWithWhere($table, $where);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found in ' . $slug;
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->post('/add_row/:table/:slug', function($table, $slug) use ($app) {
    $fields = $app->request->post();
    $res = array('error' => true, 'message' => 'Unable to insert record');
    $obj = new Common();
    if (isset($_FILES) && isset($_FILES['p_h_image']) && $_FILES['p_h_image']['name'] != '' && $table == 'users') {
        $fields['p_h_image'] = $obj->saveFile($_FILES['p_h_image'], 'users');
    }
    if (isset($_FILES) && isset($_FILES['p_h_document1']) && $_FILES['p_h_document1']['name'] != '' && $table == 'users') {
        $fields['p_h_document1'] = $obj->saveFile($_FILES['p_h_document1'], 'documents');
    }
    if (isset($_FILES) && isset($_FILES['p_h_document2']) && $_FILES['p_h_document2']['name'] != '' && $table == 'users') {
        $fields['p_h_document2'] = $obj->saveFile($_FILES['p_h_document2'], 'documents');
    }
    if (isset($_FILES) && isset($_FILES['image']) && $_FILES['image']['name'] != '' && $table == 'users') {
        $fields['image'] = $obj->saveFile($_FILES['image'], 'users');
    }
    if (isset($_FILES) && isset($_FILES['file']) && ($table == 'user_images' || $table == 'user_videos')) {
        $fields['path'] = $obj->saveFile($_FILES['file'], $table);
    }
    $affected = 0;
    $count_exceed = false;
    if (isset($fields['$$hashKey'])) {
        unset($fields['$$hashKey']);
    }
    if (isset($fields['ID']) && $fields['ID'] > 0) {
        $affected = $obj->updateRecordWithWhere($fields, $table, 'ID=' . $fields['ID']);
        if ($affected > 0) {
            $res['error'] = false;
            $res['message'] = $slug . ' updated successfully';
            $res['data'] = $obj->selectRowWithWhere($table, 'ID=' . $fields['ID']);
        } else {
            $res['message'] = 'Unable to updated ' . $slug;
        }
    } else {
        if ($table == 'user_videos' || $table == 'user_images') {
            $conf_name = 'max_videos';
            if ($table == 'user_images') {
                $conf_name = 'max_images';
            }
            $count = $obj->selectFieldsRowCustomWithWhere('COUNT(ID) AS count', $table, 'user_id = ' . $fields['user_id']);
            $max = $obj->selectFieldsRowCustomWithWhere('value', 'configs', 'name = \'' . $conf_name . '\'');
            if ($count['count'] < $max['value']) {
                $affected = $obj->insertRecord($fields, $table);
            } else {
                $count_exceed = true;
            }
        } else {
            $affected = $obj->insertRecord($fields, $table);
        }
        if ($affected > 0) {
            $res['error'] = false;
            $res['message'] = $slug . ' added successfully';
            $res['data'] = $obj->selectRowWithWhere($table, 'ID=' . $affected);
        } else {
            if ($count_exceed == true) {
                $res['message'] = 'Sorry unable to add ' . $slug . ' you were out of limit';
            } else {
                $res['message'] = 'Unable to add ' . $slug;
            }
        }
    }
    echoRespnse(201, $res);
});

$app->delete('/delete/:table/:id/:slug', function($table, $id, $slug) {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to get delete ' . $slug);
    if ($table == 'user_videos') {
        $row = $obj->selectRowWithWhereNoFullImgPath($table, 'ID=' . $id);
        if (strpos($row['path'], "http") === false) {
            unlink($row['path']);
        }
    }
    if ($table == 'user_images') {
        $row = $obj->selectRowWithWhereNoFullImgPath($table, 'ID=' . $id);
        unlink($row['path']);
    }
    $data = $obj->deleteRecordWithWhere($table, 'ID=' . $id);
    if ($data > 0) {
        $res['error'] = false;
        $res['message'] = ucfirst($slug) . ' removed successfully';
    }
    echoRespnse(201, $res);
});

$app->get('/reset_password_notification/:email', function($email) {
    $obj = new Common();
    $db = new DbHandler();
    $res = array('error' => true, 'message' => 'Unable to send notification!!');
    $data = $obj->selectRowWithWhere('users', 'email = \'' . $email . '\'');
    if (count($data) > 0) {
        $db->addNotification($data, $data['ID'], 'reset_password');
        $res['error'] = false;
        $res['message'] = 'Notification sent successfully';
        $res['data'] = $data;
    } else {
        $res['message'] = 'No user found in this email id';
    }
    echoRespnse(201, $res);
});

$app->get('/payment_made_notification/:email', function($email) {
    $obj = new Common();
    $db = new DbHandler();
    $res = array('error' => true, 'message' => 'Unable to send notification!!');
    $data = $obj->selectRowWithWhere('users', 'email = \'' . $email . '\'');
    if (count($data) > 0) {
        $db->addNotification($data, $data['ID'], 'payment_made');
        $res['error'] = false;
        $res['message'] = 'Notification sent successfully';
        $res['data'] = $obj->selectRowWithWhere('users', 'email = \'' . $email . '\'');
    } else {
        $res['message'] = 'No user found in this email id';
    }
    echoRespnse(201, $res);
});

$app->get('/get_profile_strength/:id', function($id) {
    $db = new DbHandler();
    $res['error'] = false;
    $res['message'] = 'Strength found successfully';
    $res['data'] = $db->calculateProfileStrength($id);
    echoRespnse(201, $res);
});

$app->get('/verify_email/:code', function($code) {
    $res = array('error' => true, 'message' => 'Unable to verify email address');
    $obj = new Common();
    $update = $obj->updateRecordWithWhere(array('verified_email' => 1), 'users', 'code=\'' . $code . '\'');
    if ($update > 0) {
        $res['error'] = false;
        $res['message'] = 'Email verified successfully';
    }
    echoRespnse(201, $res);
});

$app->get('/get_technicians_for_producer_home', function() {
    $res = array('error' => true, 'message' => 'No technician found');
    $obj = new Common();
    $data = $obj->selectAllWithWhere('users', 'type=\'technician\'');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Technicians found';
        $roles = array();
        foreach ($data as $val) {
            if ($val['intrest_roles'] != '') {
                foreach (explode(',', $val['intrest_roles']) as $arr) {
                    if (!in_array($arr, $roles)) {
                        $roles[] = $arr;
                    }
                }
            }
        }
        $res['data'] = $data;
        $res['roles'] = $roles;
    }
    echoRespnse(201, $res);
});

$app->post('/upload_image', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to upload image');
    $obj = new Common();
    $data = '';
    if (isset($_FILES) && isset($_FILES['file'])) {
        $data = $obj->saveFile($_FILES['file'], 'uploads');
    }
    if ($data != '') {
        $res['error'] = false;
        $res['message'] = 'File uploaded successfully';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->post('/submit_join_team', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to submit form');
    $data = $app->request->post();
    $tpry = new Thirdparty();
    $tpry->sendMail('mushaqdeen@gmail.com', 'Mushaqdeen', 'New join team form', 'New join team form', 'New join team form', $data['email'], $data['name'], $data['cv'], 'cv.pdf', '', '');
    if ($data != '') {
        $res['error'] = false;
        $res['message'] = 'File uploaded successfully';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});
