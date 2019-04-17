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
        $res['data']['type'] = 'admin';
    } else {
        $franchise = $obj->selectRowWithWhere('franchise', 'user_name = \'' . $data['email'] . '\' AND password = \'' . $data['password'] . '\' AND ipaddress = \'' . $data['ipaddress'] . '\'');
        if (count($franchise) > 0) {
            $res['error'] = false;
            $res['message'] = 'Welcome ' . $franchise['name'];
            $res['data'] = $franchise;
            $res['data']['type'] = 'franchise';
        } else {
            $res['message'] = 'Invalid login details';
        }
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

$app->get('/get_calendar/:where', function($where) {
    $res = array('error' => true, 'message' => 'No records found');
    $obj = new Common();
    $data = $obj->selectAllCustomFieldsWithWhere('c.start AS startsAt, c.end AS endsAt, c.title, c.ID, lo.name AS level_one_name', 'calendar AS c LEFT JOIN level_one AS lo ON lo.ID = c.level_one_id', $where);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found in Calendar';
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
    $affected = 0;
    if (isset($fields['$$hashKey'])) {
        unset($fields['$$hashKey']);
    }
    if (isset($fields['ID']) && $fields['ID'] > 0) {
        $affected = $obj->updateRecordWithWhere($fields, $table, 'ID=' . $fields['ID']);
        if ($affected > 0) {
            $res['error'] = false;
            //$res['message'] = $slug . ' updated successfully';
            $res['message'] = 'Great! Updated successfully';
            $res['data'] = $obj->selectRowWithWhere($table, 'ID=' . $fields['ID']);
        } else {
            $res['message'] = 'Unable to updated ' . $slug;
        }
    } else {
        if ($table == 'level_four_mapping_additional') {
            $row = $obj->selectRowWithWhere('level_four_mapping', 'ID=' . $fields['level_four_mapping_id']);
            $lfid = $fields['level_four_id'];
            $createdby = $fields['created_by'];
            $createdat = $fields['created_at'];
            $fields = array('level_three_mapping_id' => $row['level_three_mapping_id'], 'level_two_mapping_id' => $row['level_two_mapping_id'], 'level_one_id' => $row['level_one_id'], 'level_two_id' => $row['level_two_id'], 'level_three_id' => $row['level_three_id'], 'level_four_id' => $lfid, 'curriculam' => 0, 'created_by' => $createdby, 'created_at' => $createdat);
            $table = 'level_four_mapping';
        }
        if ($table == 'level_four_mapping_additional_guideline') {
            $row = $obj->selectRowWithWhere('level_four_mapping_guideline', 'ID=' . $fields['level_four_mapping_guideline_id']);
            $lfid = $fields['level_four_guideline_id'];
            $createdby = $fields['created_by'];
            $createdat = $fields['created_at'];
            $fields = array('level_three_mapping_guideline_id' => $row['level_three_mapping_guideline_id'], 'level_two_mapping_guideline_id' => $row['level_two_mapping_guideline_id'], 'level_one_guideline_id' => $row['level_one_guideline_id'], 'level_two_guideline_id' => $row['level_two_guideline_id'], 'level_three_guideline_id' => $row['level_three_guideline_id'], 'level_four_guideline_id' => $lfid, 'curriculam' => 0, 'created_by' => $createdby, 'created_at' => $createdat);
            $table = 'level_four_mapping_guideline';
        }
        $affected = $obj->insertRecord($fields, $table);
        if ($affected > 0) {
            $res['error'] = false;
            //$res['message'] = $slug . ' added successfully';
            $res['message'] = 'Great! Added successfully';
            if ($table == 'level_one') {
                $obj->insertRecord(array('level_two_mapping_guideline_id' => 0, 'level_one_guideline_id' => $affected, 'level_two_guideline_id' => 0, 'level_three_guideline_id' => 0, 'created_by' => $fields['created_by']), 'level_three_mapping_guideline');
            }
            $res['data'] = $obj->selectRowWithWhere($table, 'ID=' . $affected);
        } else {
            $res['message'] = 'Unable to add ' . $slug;
        }
    }
    echoRespnse(201, $res);
});

$app->delete('/delete/:table/:id/:slug', function($table, $id, $slug) {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to delete ' . $slug);
    if ($table == 'level_one' || $table == 'level_two' || $table == 'level_three' || $table == 'level_four' || $table == 'guideline_level_two' || $table == 'guideline_level_three') {
        $row = $obj->selectRowWithWhereNoFullImgPath($table, 'ID=' . $id);
        if (file_exists($row['image'])) {
            unlink($row['image']);
        }
    }
    if ($table == 'level_one') {
        $obj->deleteRecordWithWhere('level_two_mapping', 'level_one_id=' . $id);
        $obj->deleteRecordWithWhere('level_three_mapping', 'level_one_id=' . $id);
        $obj->deleteRecordWithWhere('program_content_mapping', 'ID IN (SELECT ID FROM level_four_mapping WHERE level_one_id=' . $id . ')');
        $obj->deleteRecordWithWhere('level_four_mapping', 'level_one_id=' . $id);
        $obj->deleteRecordWithWhere('franchise_programs', 'level_one_id=' . $id);
        $obj->deleteRecordWithWhere('level_three_mapping_guideline', 'level_one_guideline_id=' . $id);
        $obj->deleteRecordWithWhere('notifications', 'level_one_id=' . $id);
        $obj->deleteRecordWithWhere('calendar', 'level_one_id=' . $id);
    }
    if ($table == 'level_two') {
        $obj->deleteRecordWithWhere('level_two_mapping', 'level_two_id=' . $id);
        $obj->deleteRecordWithWhere('level_three_mapping', 'level_two_id=' . $id);
        $obj->deleteRecordWithWhere('program_content_mapping', 'ID IN (SELECT ID FROM level_four_mapping WHERE level_two_id=' . $id . ')');
        $obj->deleteRecordWithWhere('level_four_mapping', 'level_two_id=' . $id);
        $obj->deleteRecordWithWhere('franchise_programs', 'level_two_id=' . $id);
        $obj->deleteRecordWithWhere('notifications', 'level_two_id=' . $id);
    }
    if ($table == 'level_three') {
        $obj->deleteRecordWithWhere('level_three_mapping', 'level_three_id=' . $id);
        $obj->deleteRecordWithWhere('program_content_mapping', 'ID IN (SELECT ID FROM level_four_mapping WHERE level_three_id=' . $id . ')');
        $obj->deleteRecordWithWhere('level_four_mapping', 'level_three_id=' . $id);
        $obj->deleteRecordWithWhere('franchise_programs', 'level_three_id=' . $id);
        $obj->deleteRecordWithWhere('notifications', 'level_three_id=' . $id);
    }
    if ($table == 'level_four') {
        $obj->deleteRecordWithWhere('program_content_mapping', 'ID IN (SELECT ID FROM level_four_mapping WHERE level_four_id=' . $id . ')');
        $obj->deleteLevelFourChilds($id);
    }
    if ($table == 'guideline_level_two') {
        $obj->deleteRecordWithWhere('level_two_mapping_guideline', 'level_two_guideline_id=' . $id);
        $obj->deleteRecordWithWhere('level_three_mapping_guideline', 'level_two_guideline_id=' . $id);
    }
    if ($table == 'guideline_level_three') {
        $obj->deleteRecordWithWhere('level_three_mapping_guideline', 'level_three_guideline_id=' . $id);
    }
    if ($table == 'contents') {
        $obj->updateRecordWithWhere(array('content_id' => 0), 'level_three_mapping_guideline', 'content_id=' . $id);
        $obj->updateRecordWithWhere(array('curriculam' => 0), 'level_four_mapping', 'curriculam=' . $id);
        $obj->deleteRecordWithWhere('program_content_mapping', 'content_id=' . $id);
        $obj->deleteRecordWithWhere('contents', 'template_parent=' . $id);
    }
    if ($table == 'franchise_programs') {
        $record = $obj->selectRowCustomFieldsWithWhere('fp.*, lo.name AS level_one_name, lt.name AS level_two_name, lh.name AS level_three_name', 'franchise_programs AS fp LEFT JOIN level_one AS lo ON lo.ID = fp.level_one_id LEFT JOIN level_two AS lt ON lt.ID = fp.level_two_id LEFT JOIN level_three AS lh ON lh.ID = fp.level_three_id', 'fp.ID=' . $id);
        $obj->insertRecord(array('franchise_id' => $record['franchise_id'], 'level_one_id' => $record['level_one_id'], 'level_two_id' => $record['level_two_id'], 'level_three_id' => $record['level_three_id'], 'level_one_name' => $record['level_one_name'], 'level_two_name' => $record['level_two_name'], 'level_three_name' => $record['level_three_name'], 'start_date' => $record['start_date'], 'end_date' => $record['end_date']), 'franchise_programs_history');
    }
    $data = $obj->deleteRecordWithWhere($table, 'ID=' . $id);
    if ($data > 0) {
        $res['error'] = false;
        //$res['message'] = ucfirst($slug) . ' removed successfully';
        $res['message'] = 'Its Lost! Deleted Successfully!';
    }
    echoRespnse(201, $res);
});

$app->delete('/delete_multi/:table/:id/:slug', function($table, $id, $slug) {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to delete ' . $slug);
    if ($table == 'level_one' || $table == 'level_two' || $table == 'level_three' || $table == 'level_four' || $table == 'guideline_level_two' || $table == 'guideline_level_three') {
        $row = $obj->selectRowWithWhereNoFullImgPath($table, 'ID IN (' . $id . ')');
        if (file_exists($row['image'])) {
            unlink($row['image']);
        }
    }
    if ($table == 'level_one') {
        $obj->deleteRecordWithWhere('level_two_mapping', 'level_one_id IN (' . $id . ')');
        $obj->deleteRecordWithWhere('level_three_mapping', 'level_one_id IN (' . $id . ')');
        $obj->deleteRecordWithWhere('program_content_mapping', 'ID IN (SELECT ID FROM level_four_mapping WHERE level_one_id IN (' . $id . '))');
        $obj->deleteRecordWithWhere('level_four_mapping', 'level_one_id IN (' . $id, ')');
        $obj->deleteRecordWithWhere('franchise_programs', 'level_one_id IN (' . $id . ')');
        $obj->deleteRecordWithWhere('level_three_mapping_guideline', 'level_one_guideline_id IN (' . $id . ')');
        $obj->deleteRecordWithWhere('notifications', 'level_one_id IN (' . $id . ')');
        $obj->deleteRecordWithWhere('calendar', 'level_one_id IN (' . $id . ')');
    }
    if ($table == 'level_two') {
        $obj->deleteRecordWithWhere('level_two_mapping', 'level_two_id IN (' . $id . ')');
        $obj->deleteRecordWithWhere('level_three_mapping', 'level_two_id IN (' . $id . ')');
        $obj->deleteRecordWithWhere('program_content_mapping', 'ID IN (SELECT ID FROM level_four_mapping WHERE level_two_id IN (' . $id . '))');
        $obj->deleteRecordWithWhere('level_four_mapping', 'level_two_id IN (' . $id . ')');
        $obj->deleteRecordWithWhere('franchise_programs', 'level_two_id IN (' . $id . ')');
        $obj->deleteRecordWithWhere('notifications', 'level_two_id IN (' . $id . ')');
    }
    if ($table == 'level_three') {
        $obj->deleteRecordWithWhere('level_three_mapping', 'level_three_id IN (' . $id . ')');
        $obj->deleteRecordWithWhere('program_content_mapping', 'ID IN (SELECT ID FROM level_four_mapping WHERE level_three_id IN (' . $id . '))');
        $obj->deleteRecordWithWhere('level_four_mapping', 'level_three_id IN (' . $id . ')');
        $obj->deleteRecordWithWhere('franchise_programs', 'level_three_id IN (' . $id . ')');
        $obj->deleteRecordWithWhere('notifications', 'level_three_id IN (' . $id . ')');
    }
    if ($table == 'level_four') {
        $obj->deleteRecordWithWhere('program_content_mapping', 'ID IN (SELECT ID FROM level_four_mapping WHERE level_four_id IN (' . $id . '))');
        $obj->deleteLevelFourChilds($id);
    }
    if ($table == 'guideline_level_two') {
        $obj->deleteRecordWithWhere('level_two_mapping_guideline', 'level_two_guideline_id IN (' . $id . ')');
        $obj->deleteRecordWithWhere('level_three_mapping_guideline', 'level_two_guideline_id IN (' . $id . ')');
    }
    if ($table == 'guideline_level_three') {
        $obj->deleteRecordWithWhere('level_three_mapping_guideline', 'level_three_guideline_id IN (' . $id . ')');
    }
    if ($table == 'contents') {
        $obj->updateRecordWithWhere(array('content_id' => 0), 'level_three_mapping_guideline', 'content_id IN (' . $id . ')');
        $obj->updateRecordWithWhere(array('curriculam' => 0), 'level_four_mapping', 'curriculam IN (' . $id . ')');
        $obj->deleteRecordWithWhere('program_content_mapping', 'content_id IN (' . $id . ')');
        $obj->deleteRecordWithWhere('contents', 'template_parent IN (' . $id . ')');
    }
    if ($table == 'franchise_programs') {
        foreach (explode(',', $id) as $key) {
            $record = $obj->selectRowCustomFieldsWithWhere('fp.*, lo.name AS level_one_name, lt.name AS level_two_name, lh.name AS level_three_name', 'franchise_programs AS fp LEFT JOIN level_one AS lo ON lo.ID = fp.level_one_id LEFT JOIN level_two AS lt ON lt.ID = fp.level_two_id LEFT JOIN level_three AS lh ON lh.ID = fp.level_three_id', 'fp.ID=' . $key);
            $obj->insertRecord(array('franchise_id' => $record['franchise_id'], 'level_one_id' => $record['level_one_id'], 'level_two_id' => $record['level_two_id'], 'level_three_id' => $record['level_three_id'], 'level_one_name' => $record['level_one_name'], 'level_two_name' => $record['level_two_name'], 'level_three_name' => $record['level_three_name'], 'start_date' => $record['start_date'], 'end_date' => $record['end_date']), 'franchise_programs_history');
        }
    }
    $data = $obj->deleteRecordWithWhere($table, 'ID IN (' . $id . ')');
    if ($data > 0) {
        $res['error'] = false;
        //$res['message'] = ucfirst($slug) . ' removed successfully';
        $res['message'] = 'Its Lost! Deleted Successfully!';
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

$app->post('/upload_image', function() use ($app) {
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

$app->get('/get_level_one_for_level_two_mapping', function() {
    $res = array('error' => true, 'message' => 'No programs found');
    $obj = new Common();
    $data = $obj->selectAllCustomFieldsWithWhere('ID, name, image', 'level_one', 'ID NOT IN (SELECT DISTINCT level_one_id FROM level_four_mapping WHERE level_two_id = 0 AND level_three_id = 0)');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_level_one_for_level_two_mapping_guideline', function() {
    $res = array('error' => true, 'message' => 'No programs found');
    $obj = new Common();
    $data = $obj->selectAllCustomFieldsWithWhere('ID, name, image', 'level_one', 'ID NOT IN (SELECT DISTINCT level_one_guideline_id FROM level_four_mapping_guideline WHERE level_two_guideline_id = 0 AND level_three_guideline_id = 0)');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_level_mapped_records_program/:type', function($type) {
    $res = array('error' => true, 'message' => 'No programs found');
    $obj = new Common();
    $data = array();
    if ($type == 'level_two') {
        $data = $obj->selectAllCustomFieldsWithWhere('ltm.ID, lo.name AS level_one, lt.name AS level_two', 'level_two_mapping AS ltm LEFT JOIN level_one AS lo ON lo.ID = ltm.level_one_id LEFT JOIN level_two AS lt ON lt.ID = ltm.level_two_id', 'ltm.ID NOT IN (SELECT DISTINCT level_two_mapping_id FROM level_three_mapping) AND ltm.ID NOT IN (SELECT DISTINCT level_two_mapping_id FROM level_four_mapping)');
    }
    if ($type == 'level_three') {
        $data = $obj->selectAllCustomFieldsWithWhere('ltm.ID, lo.name AS level_one, lt.name AS level_two, lr.name AS level_three', 'level_three_mapping AS ltm LEFT JOIN level_one AS lo ON lo.ID = ltm.level_one_id LEFT JOIN level_two AS lt ON lt.ID = ltm.level_two_id LEFT JOIN level_three AS lr ON lr.ID = ltm.level_three_id', 'ltm.ID NOT IN (SELECT DISTINCT level_three_mapping_id FROM level_four_mapping)');
    }
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_level_mapped_records_guideline/:type', function($type) {
    $res = array('error' => true, 'message' => 'No programs found');
    $obj = new Common();
    $data = array();
    if ($type == 'level_two') {
        $data = $obj->selectAllCustomFieldsWithWhere('ltm.ID, lo.name AS level_one, lt.name AS level_two', 'level_two_mapping_guideline AS ltm LEFT JOIN level_one AS lo ON lo.ID = ltm.level_one_guideline_id LEFT JOIN guideline_level_two AS lt ON lt.ID = ltm.level_two_guideline_id', 'ltm.ID NOT IN (SELECT DISTINCT level_two_mapping_guideline_id FROM level_three_mapping_guideline) AND ltm.ID NOT IN (SELECT DISTINCT level_two_mapping_guideline_id FROM level_four_mapping_guideline)');
    }
    if ($type == 'level_three') {
        $data = $obj->selectAllCustomFieldsWithWhere('ltm.ID, lo.name AS level_one, lt.name AS level_two, lr.name AS level_three', 'level_three_mapping_guideline AS ltm LEFT JOIN level_one AS lo ON lo.ID = ltm.level_one_guideline_id LEFT JOIN guideline_level_two AS lt ON lt.ID = ltm.level_two_guideline_id LEFT JOIN guideline_level_three AS lr ON lr.ID = ltm.level_three_guideline_id', 'ltm.ID NOT IN (SELECT DISTINCT level_three_mapping_guideline_id FROM level_four_mapping_guideline)');
    }
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_level_two_mapping_for_level_three_mapping', function() {
    $res = array('error' => true, 'message' => 'No data found');
    $obj = new Common();
    //$data = $obj->selectAllCustomFieldsWithWhere('ltm.ID, lo.ID AS level_one_id, lo.name AS level_one_name, lo.image AS level_one_image, lt.ID AS level_two_id, lt.name AS level_two_name', 'level_two_mapping AS ltm LEFT JOIN level_one AS lo ON lo.ID = ltm.level_one_id LEFT JOIN level_two AS lt ON lt.ID = ltm.level_two_id', 'ltm.ID NOT IN (SELECT DISTINCT level_two_mapping_id FROM level_four_mapping)');
    $data = $obj->selectAllCustomFieldsWithWhere('ltm.ID, lo.ID AS level_one_id, lo.name AS level_one_name, lo.image AS level_one_image, lt.ID AS level_two_id, lt.name AS level_two_name', 'level_two_mapping AS ltm LEFT JOIN level_one AS lo ON lo.ID = ltm.level_one_id LEFT JOIN level_two AS lt ON lt.ID = ltm.level_two_id', 'ltm.ID > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_level_two_mapping_for_level_three_mapping_guideline', function() {
    $res = array('error' => true, 'message' => 'No data found');
    $obj = new Common();
    //$data = $obj->selectAllCustomFieldsWithWhere('ltm.ID, lo.ID AS level_one_id, lo.name AS level_one_name, lo.image AS level_one_image, lt.ID AS level_two_id, lt.name AS level_two_name', 'level_two_mapping_guideline AS ltm LEFT JOIN level_one AS lo ON lo.ID = ltm.level_one_guideline_id LEFT JOIN guideline_level_two AS lt ON lt.ID = ltm.level_two_guideline_id', 'ltm.ID NOT IN (SELECT DISTINCT level_two_mapping_guideline_id FROM level_four_mapping_guideline)');
    $data = $obj->selectAllCustomFieldsWithWhere('ltm.ID, lo.ID AS level_one_id, lo.name AS level_one_name, lo.image AS level_one_image, lt.ID AS level_two_id, lt.name AS level_two_name', 'level_two_mapping_guideline AS ltm LEFT JOIN level_one AS lo ON lo.ID = ltm.level_one_guideline_id LEFT JOIN guideline_level_two AS lt ON lt.ID = ltm.level_two_guideline_id', 'ltm.ID > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_level_three_mapping_for_level_four_mapping', function() {
    $res = array('error' => true, 'message' => 'No data found', 'data' => []);
    $obj = new Common();
    $data = $obj->selectAllCustomFieldsWithWhere('ltm.ID, ltm.level_two_mapping_id, lo.ID AS level_one_id, lo.name AS level_one_name, lo.image AS level_one_image, lt.ID AS level_two_id, lt.name AS level_two_name, lr.ID AS level_three_id, lr.name AS level_three_name', 'level_three_mapping AS ltm LEFT JOIN level_one AS lo ON lo.ID = ltm.level_one_id LEFT JOIN level_two AS lt ON lt.ID = ltm.level_two_id LEFT JOIN level_three AS lr ON lr.ID = ltm.level_three_id', 'ltm.ID NOT IN (SELECT DISTINCT level_three_mapping_id FROM level_four_mapping)');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        $res['data'] = $data;
    }
    $level_two_mapping = $obj->selectAllCustomFieldsWithWhere('0 AS ID, ltm.ID AS level_two_mapping_id, lo.ID AS level_one_id, lo.name AS level_one_name, lo.image AS level_one_image, lt.ID AS level_two_id, lt.name AS level_two_name, 0 AS level_three_id', 'level_two_mapping AS ltm LEFT JOIN level_one AS lo ON lo.ID = ltm.level_one_id LEFT JOIN level_two AS lt ON lt.ID = ltm.level_two_id', 'ltm.ID NOT IN (SELECT DISTINCT level_two_mapping_id FROM level_three_mapping) AND ltm.ID NOT IN (SELECT DISTINCT level_two_mapping_id FROM level_four_mapping)');
    if (count($level_two_mapping) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        foreach ($level_two_mapping as $value) {
            array_push($res['data'], $value);
        }
    }
    $level_one = $obj->selectAllCustomFieldsWithWhere('0 AS ID, 0 AS level_two_mapping_id, ID AS level_one_id, name AS level_one_name, image AS level_one_image, 0 AS level_two_id, 0 AS level_three_id', 'level_one', 'ID NOT IN (SELECT DISTINCT level_one_id FROM level_two_mapping) AND ID NOT IN (SELECT DISTINCT level_one_id FROM level_four_mapping)');
    if (count($level_one) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        foreach ($level_one as $value) {
            array_push($res['data'], $value);
        }
    }
    echoRespnse(201, $res);
});

$app->get('/get_level_three_mapping_for_level_four_mapping_guideline', function() {
    $res = array('error' => true, 'message' => 'No data found', 'data' => []);
    $obj = new Common();
    $data = $obj->selectAllCustomFieldsWithWhere('ltm.ID, ltm.level_two_mapping_guideline_id AS level_two_mapping_id, lo.ID AS level_one_id, lo.name AS level_one_name, lo.image AS level_one_image, lt.ID AS level_two_id, lt.name AS level_two_name, lr.ID AS level_three_id, lr.name AS level_three_name', 'level_three_mapping_guideline AS ltm LEFT JOIN level_one AS lo ON lo.ID = ltm.level_one_guideline_id LEFT JOIN guideline_level_two AS lt ON lt.ID = ltm.level_two_guideline_id LEFT JOIN guideline_level_three AS lr ON lr.ID = ltm.level_three_guideline_id', 'ltm.ID NOT IN (SELECT DISTINCT level_three_mapping_guideline_id FROM level_four_mapping_guideline)');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        $res['data'] = $data;
    }
    $level_two_mapping = $obj->selectAllCustomFieldsWithWhere('0 AS ID, ltm.ID AS level_two_mapping_id, lo.ID AS level_one_id, lo.name AS level_one_name, lo.image AS level_one_image, lt.ID AS level_two_id, lt.name AS level_two_name, 0 AS level_three_id', 'level_two_mapping_guideline AS ltm LEFT JOIN level_one AS lo ON lo.ID = ltm.level_one_guideline_id LEFT JOIN guideline_level_two AS lt ON lt.ID = ltm.level_two_guideline_id', 'ltm.ID NOT IN (SELECT DISTINCT level_two_mapping_guideline_id FROM level_three_mapping_guideline) AND ltm.ID NOT IN (SELECT DISTINCT level_two_mapping_guideline_id FROM level_four_mapping_guideline)');
    if (count($level_two_mapping) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        foreach ($level_two_mapping as $value) {
            array_push($res['data'], $value);
        }
    }
    $level_one = $obj->selectAllCustomFieldsWithWhere('0 AS ID, 0 AS level_two_mapping_id, ID AS level_one_id, name AS level_one_name, image AS level_one_image, 0 AS level_two_id, 0 AS level_three_id', 'level_one', 'ID NOT IN (SELECT DISTINCT level_one_guideline_id FROM level_two_mapping_guideline) AND ID NOT IN (SELECT DISTINCT level_one_guideline_id FROM level_four_mapping_guideline)');
    if (count($level_one) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        foreach ($level_one as $value) {
            array_push($res['data'], $value);
        }
    }
    echoRespnse(201, $res);
});

$app->get('/program_mapped_data', function() {
    $res = array('error' => true, 'message' => 'No data found');
    $obj = new Common();
    $data = $obj->selectAllCustomFieldsWithWhere('lfm.*,(SELECT file FROM contents WHERE ID = lfm.curriculam) AS curriculum_path, lo.name AS level_one_name, lw.name AS level_two_name, lt.name AS level_three_name, lf.name AS level_four_name, lo.image AS level_one_image, lw.image AS level_two_image, lt.image AS level_three_image, lf.image AS level_four_image', 'level_four_mapping AS lfm LEFT JOIN level_one AS lo ON lo.ID = lfm.level_one_id LEFT JOIN level_two AS lw ON lw.ID = lfm.level_two_id LEFT JOIN level_three AS lt ON lt.ID = lfm.level_three_id LEFT JOIN level_four AS lf ON lf.ID = lfm.level_four_id', 'lfm.ID > 0 ORDER BY lo.ID, lw.ID, lt.ID ASC');
    if (count($data) > 0) {
        $result = array();
        $res['error'] = false;
        $res['message'] = 'Data found';
        foreach ($data as $row) {
            if ($row['level_two_name'] != null && $row['level_three_name'] != null) {
                $result[$row['level_one_name'] . ',' . $row['level_one_image']][$row['level_two_name'] . ',' . $row['level_two_image']][$row['level_three_name'] . ',' . $row['level_three_image']][$row['level_four_name']][] = $row;
            }
            if ($row['level_two_name'] == null && $row['level_three_name'] == null) {
                $result[$row['level_one_name'] . ',' . $row['level_one_image']][$row['level_four_name']][] = $row;
            }
            if ($row['level_two_name'] != null && $row['level_three_name'] == null) {
                $result[$row['level_one_name'] . ',' . $row['level_one_image']][$row['level_two_name'] . ',' . $row['level_two_image']][$row['level_four_name']][] = $row;
            }
        }
        $res['data'] = $result;
    }
    echoRespnse(201, $res);
});

$app->get('/program_mapped_data_franchise/:fid/:pid', function($fid, $pid) {
    $res = array('error' => true, 'message' => 'No data found');
    $obj = new Common();
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d');
    $data = $obj->selectAllCustomFieldsWithWhere('lfm.*,(SELECT file FROM contents WHERE ID = lfm.curriculam) AS curriculum_path, lo.name AS level_one_name, lw.name AS level_two_name, lt.name AS level_three_name, lf.name AS level_four_name, lo.image AS level_one_image, lw.image AS level_two_image, lt.image AS level_three_image, lf.image AS level_four_image', 'level_four_mapping AS lfm LEFT JOIN franchise_programs AS fp ON fp.level_one_id = lfm.level_one_id AND fp.level_two_id = lfm.level_two_id AND fp.level_three_id = lfm.level_three_id LEFT JOIN level_one AS lo ON lo.ID = lfm.level_one_id LEFT JOIN level_two AS lw ON lw.ID = lfm.level_two_id LEFT JOIN level_three AS lt ON lt.ID = lfm.level_three_id LEFT JOIN level_four AS lf ON lf.ID = lfm.level_four_id', 'fp.franchise_id = ' . $fid . ' AND fp.level_one_id = ' . $pid . ' AND (\'' . $date . '\' BETWEEN fp.start_date AND fp.end_date) AND lfm.ID > 0 ORDER BY lo.ID, lw.ID, lt.ID ASC');
    if (count($data) > 0) {
        $result = array();
        $res['error'] = false;
        $res['message'] = 'Data found';
        foreach ($data as $row) {
            if ($row['level_two_name'] != null && $row['level_three_name'] != null) {
                $result[$row['level_one_name'] . ',' . $row['level_one_image']][$row['level_two_name'] . ',' . $row['level_two_image']][$row['level_three_name'] . ',' . $row['level_three_image']][$row['level_four_name']][] = $row;
            }
            if ($row['level_two_name'] == null && $row['level_three_name'] == null) {
                $result[$row['level_one_name'] . ',' . $row['level_one_image']][$row['level_four_name']][] = $row;
            }
            if ($row['level_two_name'] != null && $row['level_three_name'] == null) {
                $result[$row['level_one_name'] . ',' . $row['level_one_image']][$row['level_two_name'] . ',' . $row['level_two_image']][$row['level_four_name']][] = $row;
            }
        }
        $res['data'] = $result;
    }
    echoRespnse(201, $res);
});

$app->get('/program_mapped_data_franchise_sitemap/:fid', function($fid) {
    $res = array('error' => true, 'message' => 'No data found');
    $obj = new Common();
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d');
    $data = $obj->selectAllCustomFieldsWithWhere('lfm.*,(SELECT file FROM contents WHERE ID = lfm.curriculam) AS curriculum_path, lo.name AS level_one_name, lw.name AS level_two_name, lt.name AS level_three_name, lf.name AS level_four_name, lo.image AS level_one_image, lw.image AS level_two_image, lt.image AS level_three_image, lf.image AS level_four_image', 'level_four_mapping AS lfm LEFT JOIN franchise_programs AS fp ON fp.level_one_id = lfm.level_one_id AND fp.level_two_id = lfm.level_two_id AND fp.level_three_id = lfm.level_three_id LEFT JOIN level_one AS lo ON lo.ID = lfm.level_one_id LEFT JOIN level_two AS lw ON lw.ID = lfm.level_two_id LEFT JOIN level_three AS lt ON lt.ID = lfm.level_three_id LEFT JOIN level_four AS lf ON lf.ID = lfm.level_four_id', 'fp.franchise_id = ' . $fid . ' AND (\'' . $date . '\' BETWEEN fp.start_date AND fp.end_date) AND lfm.ID > 0 ORDER BY lo.ID, lw.ID, lt.ID ASC');
    if (count($data) > 0) {
        $result = array();
        $res['error'] = false;
        $res['message'] = 'Data found';
        foreach ($data as $row) {
            if ($row['level_two_name'] != null && $row['level_three_name'] != null) {
                $result[$row['level_one_name'] . ',' . $row['level_one_image']][$row['level_two_name'] . ',' . $row['level_two_image']][$row['level_three_name'] . ',' . $row['level_three_image']][$row['level_four_name']][] = $row;
            }
            if ($row['level_two_name'] == null && $row['level_three_name'] == null) {
                $result[$row['level_one_name'] . ',' . $row['level_one_image']][$row['level_four_name']][] = $row;
            }
            if ($row['level_two_name'] != null && $row['level_three_name'] == null) {
                $result[$row['level_one_name'] . ',' . $row['level_one_image']][$row['level_two_name'] . ',' . $row['level_two_image']][$row['level_four_name']][] = $row;
            }
        }
        $res['data'] = $result;
    }
    echoRespnse(201, $res);
});

$app->get('/content_mapped_data/:id', function($id) {
    $res = array('error' => true, 'message' => 'No data found');
    $obj = new Common();
    $data = $obj->selectAllCustomFieldsWithWhere('pcm.*, c.name, c.file, c.extension, c.is_downloadable, c.template_type, c.is_printable', 'program_content_mapping AS pcm LEFT JOIN contents AS c ON c.ID = pcm.content_id', 'pcm.level_four_mapping_id = ' . $id);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/content_mapped_data_guideline/:id', function($id) {
    $res = array('error' => true, 'message' => 'No data found');
    $obj = new Common();
    $data = $obj->selectAllCustomFieldsWithWhere('pcm.*, c.name, c.file, c.extension, c.is_downloadable, c.template_type, c.is_printable', 'program_content_mapping_guideline AS pcm LEFT JOIN contents AS c ON c.ID = pcm.content_id', 'pcm.level_four_mapping_guideline_id = ' . $id);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_content_for_program_mapping/:id/:cid', function($id, $cid) {
    $res = array('error' => true, 'message' => 'No data found');
    $obj = new Common();
    $data = $obj->selectAllCustomFieldsWithWhere('*', 'contents', 'mapping_type = \'program\' AND template_type != 2 AND category = ' . $cid . ' AND ID NOT IN (SELECT content_id FROM program_content_mapping WHERE level_four_mapping_id = ' . $id . ')');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_content_for_guideline_mapping/:id/:cid', function($id, $cid) {
    $res = array('error' => true, 'message' => 'No data found');
    $obj = new Common();
    $data = $obj->selectAllCustomFieldsWithWhere('*', 'contents', 'mapping_type = \'guideline\' AND template_type != 2 AND category = ' . $cid . ' AND ID NOT IN (SELECT content_id FROM program_content_mapping_guideline WHERE level_four_mapping_guideline_id = ' . $id . ')');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->delete('/delete_program_mapping/:type/:lone/:ltwo/:lthree/:lfour/:slug', function($type, $lone, $ltwo, $lthree, $lfour, $slug) {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to delete ' . $slug);
    if ($type == 'one') {
        $obj->deleteRecordWithWhere('level_four_mapping', 'level_one_id=(SELECT ID FROM level_one WHERE name = \'' . $lone . '\')');
        $obj->deleteRecordWithWhere('level_three_mapping', 'level_one_id=(SELECT ID FROM level_one WHERE name = \'' . $lone . '\')');
        $obj->deleteRecordWithWhere('level_two_mapping', 'level_one_id=(SELECT ID FROM level_one WHERE name = \'' . $lone . '\')');
        $obj->deleteRecordWithWhere('franchise_programs', 'level_one_id=(SELECT ID FROM level_one WHERE name = \'' . $lone . '\')');
    }
    if ($type == 'two') {
        $obj->deleteRecordWithWhere('level_four_mapping', 'level_two_id=(SELECT ID FROM level_two WHERE name = \'' . $ltwo . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_two WHERE name = \'' . $ltwo . '\')) AND level_one_id = (SELECT ID FROM level_one WHERE name = \'' . $lone . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_one WHERE name = \'' . $lone . '\'))');
        $obj->deleteRecordWithWhere('level_three_mapping', 'level_two_id=(SELECT ID FROM level_two WHERE name = \'' . $ltwo . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_two WHERE name = \'' . $ltwo . '\')) AND level_one_id = (SELECT ID FROM level_one WHERE name = \'' . $lone . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_one WHERE name = \'' . $lone . '\'))');
        $obj->deleteRecordWithWhere('level_two_mapping', 'level_two_id=(SELECT ID FROM level_two WHERE name = \'' . $ltwo . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_two WHERE name = \'' . $ltwo . '\')) AND level_one_id = (SELECT ID FROM level_one WHERE name = \'' . $lone . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_one WHERE name = \'' . $lone . '\'))');
        $obj->deleteRecordWithWhere('franchise_programs', 'level_two_id=(SELECT ID FROM level_two WHERE name = \'' . $ltwo . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_two WHERE name = \'' . $ltwo . '\')) AND level_one_id = (SELECT ID FROM level_one WHERE name = \'' . $lone . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_one WHERE name = \'' . $lone . '\'))');
    }
    if ($type == 'three') {
        $obj->deleteRecordWithWhere('level_four_mapping', 'level_three_id=(SELECT ID FROM level_three WHERE name = \'' . $lthree . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_three WHERE name = \'' . $lthree . '\')) AND level_two_id = (SELECT ID FROM level_two WHERE name = \'' . $ltwo . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_two WHERE name = \'' . $ltwo . '\')) AND level_one_id = (SELECT ID FROM level_one WHERE name = \'' . $lone . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_one WHERE name = \'' . $lone . '\'))');
        $obj->deleteRecordWithWhere('level_three_mapping', 'level_three_id=(SELECT ID FROM level_three WHERE name = \'' . $lthree . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_three WHERE name = \'' . $lthree . '\')) AND level_two_id = (SELECT ID FROM level_two WHERE name = \'' . $ltwo . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_two WHERE name = \'' . $ltwo . '\')) AND level_one_id = (SELECT ID FROM level_one WHERE name = \'' . $lone . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_one WHERE name = \'' . $lone . '\'))');
        $obj->deleteRecordWithWhere('franchise_programs', 'level_three_id=(SELECT ID FROM level_three WHERE name = \'' . $lthree . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_three WHERE name = \'' . $lthree . '\')) AND level_two_id = (SELECT ID FROM level_two WHERE name = \'' . $ltwo . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_two WHERE name = \'' . $ltwo . '\')) AND level_one_id = (SELECT ID FROM level_one WHERE name = \'' . $lone . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_one WHERE name = \'' . $lone . '\'))');
    }
    if ($type == 'four') {
        $obj->deleteRecordWithWhere('level_four_mapping', 'level_four_id=(SELECT ID FROM level_four WHERE name = \'' . $lfour . '\') AND level_three_id = (SELECT ID FROM level_three WHERE name = \'' . $lthree . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_three WHERE name = \'' . $lthree . '\')) AND level_two_id = (SELECT ID FROM level_two WHERE name = \'' . $ltwo . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_two WHERE name = \'' . $ltwo . '\')) AND level_one_id = (SELECT ID FROM level_one WHERE name = \'' . $lone . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_one WHERE name = \'' . $lone . '\'))');
    }
    $res['error'] = false;
    //$res['message'] = ucfirst($slug) . ' removed successfully';
    $res['message'] = 'Its Lost! Deleted Successfully!';
    echoRespnse(201, $res);
});

$app->delete('/delete_guideline_mapping/:type/:lone/:ltwo/:lthree/:lfour/:slug', function($type, $lone, $ltwo, $lthree, $lfour, $slug) {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to delete ' . $slug);
    if ($type == 'one') {
        $obj->deleteRecordWithWhere('level_four_mapping_guideline', 'level_one_guideline_id=(SELECT ID FROM level_one WHERE name = \'' . $lone . '\')');
        $obj->deleteRecordWithWhere('level_three_mapping_guideline', 'level_one_guideline_id=(SELECT ID FROM level_one WHERE name = \'' . $lone . '\')');
        $obj->deleteRecordWithWhere('level_two_mapping_guideline', 'level_one_guideline_id=(SELECT ID FROM level_one WHERE name = \'' . $lone . '\')');
    }
    if ($type == 'two') {
        $obj->deleteRecordWithWhere('level_four_mapping_guideline', 'level_two_guideline_id=(SELECT ID FROM guideline_level_two WHERE name = \'' . $ltwo . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM guideline_level_two WHERE name = \'' . $ltwo . '\')) AND level_one_guideline_id = (SELECT ID FROM level_one WHERE name = \'' . $lone . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_one WHERE name = \'' . $lone . '\'))');
        $obj->deleteRecordWithWhere('level_three_mapping_guideline', 'level_two_guideline_id=(SELECT ID FROM guideline_level_two WHERE name = \'' . $ltwo . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM guideline_level_two WHERE name = \'' . $ltwo . '\')) AND level_one_guideline_id = (SELECT ID FROM level_one WHERE name = \'' . $lone . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_one WHERE name = \'' . $lone . '\'))');
        $obj->deleteRecordWithWhere('level_two_mapping_guideline', 'level_two_guideline_id=(SELECT ID FROM guideline_level_two WHERE name = \'' . $ltwo . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM guideline_level_two WHERE name = \'' . $ltwo . '\')) AND level_one_guideline_id = (SELECT ID FROM level_one WHERE name = \'' . $lone . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_one WHERE name = \'' . $lone . '\'))');
    }
    if ($type == 'three') {
        $obj->deleteRecordWithWhere('level_four_mapping_guideline', 'level_three_guideline_id=(SELECT ID FROM guideline_level_three WHERE name = \'' . $lthree . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM guideline_level_three WHERE name = \'' . $lthree . '\')) AND level_two_guideline_id = (SELECT ID FROM guideline_level_two WHERE name = \'' . $ltwo . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM guideline_level_two WHERE name = \'' . $ltwo . '\')) AND level_one_guideline_id = (SELECT ID FROM level_one WHERE name = \'' . $lone . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_one WHERE name = \'' . $lone . '\'))');
        $obj->deleteRecordWithWhere('level_three_mapping_guideline', 'level_three_guideline_id=(SELECT ID FROM guideline_level_three WHERE name = \'' . $lthree . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM guideline_level_three WHERE name = \'' . $lthree . '\')) AND level_two_guideline_id = (SELECT ID FROM guideline_level_two WHERE name = \'' . $ltwo . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM guideline_level_two WHERE name = \'' . $ltwo . '\')) AND level_one_guideline_id = (SELECT ID FROM level_one WHERE name = \'' . $lone . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_one WHERE name = \'' . $lone . '\'))');
    }
    if ($type == 'four') {
        $obj->deleteRecordWithWhere('level_four_mapping_guideline', 'level_four_guideline_id=(SELECT ID FROM guideline_level_four WHERE name = \'' . $lfour . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM guideline_level_four WHERE name = \'' . $lfour . '\')) AND level_three_guideline_id = (SELECT ID FROM guideline_level_three WHERE name = \'' . $lthree . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM guideline_level_three WHERE name = \'' . $lthree . '\')) AND level_two_guideline_id = (SELECT ID FROM guideline_level_two WHERE name = \'' . $ltwo . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM guideline_level_two WHERE name = \'' . $ltwo . '\')) AND level_one_guideline_id = (SELECT ID FROM level_one WHERE name = \'' . $lone . '\' UNION ALL SELECT 0 FROM (SELECT 0) T1 WHERE NOT EXISTS (SELECT ID FROM level_one WHERE name = \'' . $lone . '\'))');
    }
    $res['error'] = false;
    //$res['message'] = ucfirst($slug) . ' removed successfully';
    $res['message'] = 'Its Lost! Deleted Successfully!';
    echoRespnse(201, $res);
});

$app->post('/map_program_main_curriculam', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to add');
    $data = $app->request->post();
    $obj = new Common();
    $rec = $obj->selectRowWithWhere('level_four_mapping', 'ID=' . $data['level_four_mapping_id']);
    $rows = $obj->updateRecordWithWhere(array('curriculam' => $data['curriculam']), 'level_four_mapping', 'level_three_mapping_id = ' . $rec['level_three_mapping_id'] . ' AND level_two_mapping_id = ' . $rec['level_two_mapping_id'] . ' AND level_one_id = ' . $rec['level_one_id'] . ' AND level_two_id = ' . $rec['level_two_id'] . ' AND level_three_id = ' . $rec['level_three_id']);
    if ($rows > 0) {
        $res['error'] = false;
        $res['message'] = 'Great! Updated successfully';
        $res['data'] = $rows;
    }
    echoRespnse(201, $res);
});

$app->post('/map_program_main_curriculam_guideline', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to add');
    $data = $app->request->post();
    $obj = new Common();
    $rec = $obj->selectRowWithWhere('level_four_mapping_guideline', 'ID=' . $data['level_four_mapping_guideline_id']);
    $rows = $obj->updateRecordWithWhere(array('curriculam' => $data['curriculam']), 'level_four_mapping_guideline', 'level_three_mapping_guideline_id = ' . $rec['level_three_mapping_guideline_id'] . ' AND level_two_mapping_guideline_id = ' . $rec['level_two_mapping_guideline_id'] . ' AND level_one_guideline_id = ' . $rec['level_one_guideline_id'] . ' AND level_two_guideline_id = ' . $rec['level_two_guideline_id'] . ' AND level_three_guideline_id = ' . $rec['level_three_guideline_id']);
    if ($rows > 0) {
        $res['error'] = false;
        $res['message'] = 'Great! Updated successfully';
        $res['data'] = $rows;
    }
    echoRespnse(201, $res);
});

$app->get('/get_level_two_mapping_guideline_for_level_three_mapping_guideline', function() {
    $res = array('error' => true, 'message' => 'No data found', 'data' => []);
    $obj = new Common();
    $data = $obj->selectAllCustomFieldsWithWhere('0 AS level_two_mapping_guideline_id, ID AS level_one_guideline_id, 0 AS level_two_guideline_id, name AS level_one_guideline_name', 'level_one', 'ID > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        foreach ($data as $value) {
            $value['ID'] = count($res['data']) + 1;
            array_push($res['data'], $value);
        }
    }
    $level_two_mapping = $obj->selectAllCustomFieldsWithWhere('ltmg.ID AS level_two_mapping_guideline_id, ltmg.level_one_guideline_id, ltmg.level_two_guideline_id, lo.name AS level_one_guideline_name, lt.name AS level_two_guideline_name', 'level_two_mapping_guideline AS ltmg LEFT JOIN level_one AS lo ON lo.ID = ltmg.level_one_guideline_id LEFT JOIN guideline_level_two AS lt ON lt.ID = ltmg.level_two_guideline_id', 'ltmg.ID > 0');
    if (count($level_two_mapping) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        foreach ($level_two_mapping as $value) {
            $value['ID'] = count($res['data']) + 1;
            array_push($res['data'], $value);
        }
    }
    echoRespnse(201, $res);
});

$app->get('/guideline_mapped_data', function() {
    $res = array('error' => true, 'message' => 'No data found');
    $obj = new Common();
    $data = $obj->selectAllCustomFieldsWithWhere('lfm.*,(SELECT file FROM contents WHERE ID = lfm.curriculam) AS curriculum_path, lo.name AS level_one_name, lw.name AS level_two_name, lt.name AS level_three_name, lf.name AS level_four_name, lo.image AS level_one_image, lw.image AS level_two_image, lt.image AS level_three_image, lf.image AS level_four_image', 'level_four_mapping_guideline AS lfm LEFT JOIN level_one AS lo ON lo.ID = lfm.level_one_guideline_id LEFT JOIN guideline_level_two AS lw ON lw.ID = lfm.level_two_guideline_id LEFT JOIN guideline_level_three AS lt ON lt.ID = lfm.level_three_guideline_id LEFT JOIN guideline_level_four AS lf ON lf.ID = lfm.level_four_guideline_id', 'lfm.ID > 0 ORDER BY lo.ID, lw.ID, lt.ID ASC');
    if (count($data) > 0) {
        $result = array();
        $res['error'] = false;
        $res['message'] = 'Data found';
        foreach ($data as $row) {
            if ($row['level_two_name'] != null && $row['level_three_name'] != null) {
                $result[$row['level_one_name'] . ',' . $row['level_one_image']][$row['level_two_name'] . ',' . $row['level_two_image']][$row['level_three_name'] . ',' . $row['level_three_image']][$row['level_four_name']][] = $row;
            }
            if ($row['level_two_name'] == null && $row['level_three_name'] == null) {
                $result[$row['level_one_name'] . ',' . $row['level_one_image']][$row['level_four_name']][] = $row;
            }
            if ($row['level_two_name'] != null && $row['level_three_name'] == null) {
                $result[$row['level_one_name'] . ',' . $row['level_one_image']][$row['level_two_name'] . ',' . $row['level_two_image']][$row['level_four_name']][] = $row;
            }
        }
        $res['data'] = $result;
    }
    echoRespnse(201, $res);
});

$app->get('/guideline_mapped_data_for_franchise/:fid', function($fid) {
    $res = array('error' => true, 'message' => 'No data found');
    $obj = new Common();
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d');
    $data = $obj->selectAllCustomFieldsWithWhere('lfm.*,(SELECT file FROM contents WHERE ID = lfm.curriculam) AS curriculum_path, lo.name AS level_one_name, lw.name AS level_two_name, lt.name AS level_three_name, lf.name AS level_four_name, lo.image AS level_one_image, lw.image AS level_two_image, lt.image AS level_three_image, lf.image AS level_four_image', 'level_four_mapping_guideline AS lfm LEFT JOIN franchise_programs AS fp ON fp.level_one_id = lfm.level_one_guideline_id LEFT JOIN level_one AS lo ON lo.ID = lfm.level_one_guideline_id LEFT JOIN guideline_level_two AS lw ON lw.ID = lfm.level_two_guideline_id LEFT JOIN guideline_level_three AS lt ON lt.ID = lfm.level_three_guideline_id LEFT JOIN guideline_level_four AS lf ON lf.ID = lfm.level_four_guideline_id', 'fp.franchise_id = ' . $fid . ' AND (\'' . $date . '\' BETWEEN fp.start_date AND fp.end_date) AND lfm.ID > 0 GROUP BY lfm.ID ORDER BY lo.ID, lw.ID, lt.ID ASC');
    if (count($data) > 0) {
        $result = array();
        $res['error'] = false;
        $res['message'] = 'Data found';
        foreach ($data as $row) {
            if ($row['level_two_name'] != null && $row['level_three_name'] != null) {
                $result[$row['level_one_name'] . ',' . $row['level_one_image']][$row['level_two_name'] . ',' . $row['level_two_image']][$row['level_three_name'] . ',' . $row['level_three_image']][$row['level_four_name']][] = $row;
            }
            if ($row['level_two_name'] == null && $row['level_three_name'] == null) {
                $result[$row['level_one_name'] . ',' . $row['level_one_image']][$row['level_four_name']][] = $row;
            }
            if ($row['level_two_name'] != null && $row['level_three_name'] == null) {
                $result[$row['level_one_name'] . ',' . $row['level_one_image']][$row['level_two_name'] . ',' . $row['level_two_image']][$row['level_four_name']][] = $row;
            }
        }
        $res['data'] = $result;
    }
    echoRespnse(201, $res);
});

$app->get('/get_franchise_reports/:id', function($id) {
    $res = array('error' => true, 'message' => 'No data found');
    $obj = new Common();
    $exist = $obj->selectAllCustomFieldsWithWhere('fr.ID, r.name', 'franchise_reports AS fr LEFT JOIN reports AS r ON r.ID = fr.report_id', 'fr.franchise_id=' . $id);
    $avail = $obj->selectAllCustomFieldsWithWhere('name, ID', 'reports', 'ID NOT IN (SELECT report_id FROM franchise_reports WHERE franchise_id = ' . $id . ')');
    if (count($exist) > 0 || count($avail) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        $res['data']['avail'] = $avail;
        $res['data']['exist'] = $exist;
    }
    echoRespnse(201, $res);
});

$app->get('/get_franchise_programs/:id', function($id) {
    $res = array('error' => true, 'message' => 'No data found');
    $obj = new Common();
    $exist = $obj->selectAllCustomFieldsWithWhere('lo.name AS level_one_name, fp.level_one_id, fp.start_date, fp.end_date, fp.ID, fp.level_two_id, fp.level_three_id, lt.name AS level_two_name, lr.name AS level_three_name, fp.ID', 'franchise_programs AS fp LEFT JOIN level_one AS lo ON fp.level_one_id = lo.ID LEFT JOIN level_two AS lt ON fp.level_two_id = lt.ID LEFT JOIN level_three AS lr ON fp.level_three_id = lr.ID', 'fp.franchise_id=' . $id);
    $avail = $obj->selectAllCustomFieldsWithWhere('lo.name AS level_one_name, lt.name AS level_two_name, lr.name AS level_three_name, lfm.level_one_id, lfm.level_two_id, lfm.level_three_id', 'level_four_mapping AS lfm LEFT JOIN level_one AS lo ON lo.ID = lfm.level_one_id LEFT JOIN level_two AS lt ON lt.ID = lfm.level_two_id LEFT JOIN level_three AS lr ON lr.ID = lfm.level_three_id', 'lfm.ID > 0 GROUP BY lfm.level_three_id, lfm.level_two_id, lfm.level_one_id');
    if (count($exist) > 0 || count($avail) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        $avails = array();
        if (count($avail) > 0 && count($exist) > 0) {
            foreach ($avail as $r) {
                $found = false;
                foreach ($exist as $row) {
                    if ($r['level_one_id'] == $row['level_one_id'] && $r['level_two_id'] == $row['level_two_id'] && $r['level_three_id'] == $row['level_three_id']) {
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    array_push($avails, $r);
                }
            }
        } else {
            $avails = $avail;
        }
        $res['data']['avail'] = $avails;
        $res['data']['exist'] = $exist;
    }
    echoRespnse(201, $res);
});

$app->get('/get_notifications/:l1/:l2/:l3', function($l1, $l2, $l3) {
    $res = array('error' => true, 'message' => 'No data found');
    $obj = new Common();
    $leval_one = $l1;
    $leval_two = 0;
    $leval_three = 0;
    if ($l2 != 'empty') {
        $l2_row = $obj->selectRowWithWhere('level_two', 'name=\'' . $l2 . '\'');
        $leval_two = $l2_row['ID'];
    }
    if ($l3 != 'empty') {
        $l3_row = $obj->selectRowWithWhere('level_three', 'name=\'' . $l3 . '\'');
        $leval_three = $l3_row['ID'];
    }
    $l1_row = $obj->selectRowWithWhere('level_one', 'name=\'' . $leval_one . '\'');
    $leval_one = $l1_row['ID'];
    $data = $obj->selectAllWithWhere('notifications', 'level_one_id = ' . $leval_one . ' AND level_two_id = ' . $leval_two . ' AND level_three_id = ' . $leval_three);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->post('/add_notification', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to add notification');
    $data = $app->request->post();
    $obj = new Common();
    $leval_one = $data['level_one'];
    $leval_two = 0;
    $leval_three = 0;
    if ($data['level_two'] != '') {
        $l2_row = $obj->selectRowWithWhere('level_two', 'name=\'' . $data['level_two'] . '\'');
        $leval_two = $l2_row['ID'];
    }
    if ($data['level_three'] != '') {
        $l3_row = $obj->selectRowWithWhere('level_three', 'name=\'' . $data['level_three'] . '\'');
        $leval_three = $l3_row['ID'];
    }
    $l1_row = $obj->selectRowWithWhere('level_one', 'name=\'' . $leval_one . '\'');
    $leval_one = $l1_row['ID'];
    $insert = $obj->insertRecord(array('level_one_id' => $leval_one, 'level_two_id' => $leval_two, 'level_three_id' => $leval_three, 'message' => $data['message']), 'notifications');
    if ($insert > 0) {
        $res['error'] = false;
        $res['message'] = 'Notification added successfully';
    }
    echoRespnse(201, $res);
});

$app->get('/franchise_dashboard/:id', function($id) {
    $res = array('error' => true, 'message' => 'No data found');
    $obj = new Common();
    $programs = $obj->selectAllWithWhere('level_one', 'status = 1');
    $mapped = $obj->selectAllWithWhere('franchise_programs', 'franchise_id = ' . $id . ' AND status = 1 GROUP BY level_one_id');
    $notifications = $obj->selectAllCustomFieldsWithWhere('n.message, n.created_at', 'notifications AS `n` LEFT JOIN `franchise_programs` AS `fp` ON `fp`.`level_one_id` = `n`.`level_one_id` AND `fp`.`level_two_id` = `n`.`level_two_id` AND `fp`.`level_three_id` = `n`.`level_three_id`', '`fp`.`franchise_id` = ' . $id);
    if (count($programs) > 0 || count($mapped) > 0 && count($notifications) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        $res['data']['programs'] = $programs;
        $res['data']['mapped'] = $mapped;
        $res['data']['notifications'] = $notifications;
    }
    echoRespnse(201, $res);
});

$app->get('/get_franchise_calendar/:id', function($id) {
    $res = array('error' => true, 'message' => 'No data found');
    $obj = new Common();
    $notifications = $obj->selectAllCustomFieldsWithWhere('n.title, n.start AS startsAt, n.end AS endsAt, p.name AS level_one_name', 'calendar AS `n` LEFT JOIN `level_one` AS p ON `p`.`ID` = `n`.`level_one_id`', '`n`.`type` = \'calendar\' AND `n`.`level_one_id` IN (SELECT DISTINCT level_one_id FROM `franchise_programs` WHERE `franchise_id` = ' . $id . ')');
    if (count($notifications) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        $res['data'] = $notifications;
    }
    echoRespnse(201, $res);
});

$app->get('/get_franchise_events/:id', function($id) {
    $res = array('error' => true, 'message' => 'No data found');
    $obj = new Common();
    $notifications = $obj->selectAllCustomFieldsWithWhere('n.title, n.start AS startsAt, n.end AS endsAt, p.name AS level_one_name', 'calendar AS `n` LEFT JOIN `level_one` AS p ON `p`.`ID` = `n`.`level_one_id`', '`n`.`type` = \'event\' AND `n`.`level_one_id` IN (SELECT DISTINCT level_one_id FROM `franchise_programs` WHERE `franchise_id` = ' . $id . ')');
    if (count($notifications) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        $res['data'] = $notifications;
    }
    echoRespnse(201, $res);
});

$app->delete('/delete_program_curriculam/:lfourid/:slug', function($lfourid, $slug) {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to delete ' . $slug);
    $data = $obj->selectRowWithWhere('level_four_mapping', 'ID=' . $lfourid);
    $update = $obj->updateRecordWithWhere(array('curriculam' => 0), 'level_four_mapping', 'level_one_id=' . $data['level_one_id'] . ' AND level_two_id=' . $data['level_two_id'] . ' AND level_three_id=' . $data['level_three_id']);
    if ($update > 0) {
        $res['error'] = false;
        //$res['message'] = ucfirst($slug) . ' removed successfully ';
        $res['message'] = 'Its Lost! Deleted Successfully!';
    }
    echoRespnse(201, $res);
});

$app->delete('/delete_document/:lfourid/:slug', function($id, $slug) {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to delete ' . $slug);
    $data = $obj->deleteRecordWithWhere('program_content_mapping', 'ID=' . $id);
    if ($data > 0) {
        $res['error'] = false;
        //$res['message'] = ucfirst($slug) . ' removed successfully ';
        $res['message'] = 'Its Lost! Deleted Successfully!';
    }
    echoRespnse(201, $res);
});

$app->delete('/delete_document_guideline/:lfourid/:slug', function($id, $slug) {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to delete ' . $slug);
    $data = $obj->deleteRecordWithWhere('program_content_mapping_guideline', 'ID=' . $id);
    if ($data > 0) {
        $res['error'] = false;
        //$res['message'] = ucfirst($slug) . ' removed successfully ';
        $res['message'] = 'Its Lost! Deleted Successfully!';
    }
    echoRespnse(201, $res);
});

$app->delete('/delete_guideline_curriculam/:lfourid/:slug', function($lfourid, $slug) {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to delete ' . $slug);
    $data = $obj->selectRowWithWhere('level_four_mapping_guideline', 'ID=' . $lfourid);
    $update = $obj->updateRecordWithWhere(array('curriculam' => 0), 'level_four_mapping_guideline', 'level_one_guideline_id=' . $data['level_one_guideline_id'] . ' AND level_two_guideline_id=' . $data['level_two_guideline_id'] . ' AND level_three_guideline_id=' . $data['level_three_guideline_id']);
    if ($update > 0) {
        $res['error'] = false;
        //$res['message'] = ucfirst($slug) . ' removed successfully ';
        $res['message'] = 'Its Lost! Deleted Successfully!';
    }
    echoRespnse(201, $res);
});

$app->get('/franchise_mapped_reports/:id', function($id) {
    $res = array('error' => true, 'message' => 'No data found');
    $obj = new Common();
    $data = $obj->selectAllCustomFieldsWithWhere('fr.ID, fr.report_id, r.name, r.form_name', 'franchise_reports AS `fr` LEFT JOIN `reports` AS r ON `fr`.`report_id` = `r`.`ID`', '`fr`.`franchise_id`=' . $id);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/vaccant_level_four_for_mapped_level_four/:lfid', function($lfid) {
    $res = array('error' => true, 'message' => 'No data found');
    $obj = new Common();
    $row = $obj->selectRowWithWhere('level_four_mapping', 'ID=' . $lfid);
    $data = $obj->selectAllCustomFieldsWithWhere('ID, name', 'level_four', 'ID NOT IN (SELECT DISTINCT level_four_id FROM level_four_mapping WHERE level_three_mapping_id = ' . $row['level_three_mapping_id'] . ' AND level_two_mapping_id = ' . $row['level_two_mapping_id'] . ' AND level_one_id = ' . $row['level_one_id'] . ' AND level_two_id = ' . $row['level_two_id'] . ' AND level_three_id = ' . $row['level_three_id'] . ')');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/vaccant_level_four_for_mapped_level_four_guideline/:lfid', function($lfid) {
    $res = array('error' => true, 'message' => 'No data found');
    $obj = new Common();
    $row = $obj->selectRowWithWhere('level_four_mapping_guideline', 'ID=' . $lfid);
    $data = $obj->selectAllCustomFieldsWithWhere('ID, name', 'guideline_level_four', 'ID NOT IN (SELECT DISTINCT level_four_guideline_id FROM level_four_mapping_guideline WHERE level_three_mapping_guideline_id = ' . $row['level_three_mapping_guideline_id'] . ' AND level_two_mapping_guideline_id = ' . $row['level_two_mapping_guideline_id'] . ' AND level_one_guideline_id = ' . $row['level_one_guideline_id'] . ' AND level_two_guideline_id = ' . $row['level_two_guideline_id'] . ' AND level_three_guideline_id = ' . $row['level_three_guideline_id'] . ')');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->post('/change_password', function() use ($app) {
    $data = $app->request->post();
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to change password');
    if ($data['type'] == 'franchise') {
        $table = 'franchise';
        $exist = $obj->selectRowWithWhere('franchise', 'ID = ' . $data['ID']);
    } else {
        $table = 'admins';
        $exist = $obj->selectRowWithWhere('admins', 'ID = ' . $data['ID']);
    }
    if (count($exist) > 0) {
        if ($exist['password'] == $data['old_password']) {
            $res['error'] = false;
            $res['message'] = 'Password updated successfully';
            $obj->updateRecordWithWhere(array('password' => $data['new_password']), $table, 'ID=' . $data['ID']);
        } else {
            $res['message'] = 'Current password mismatch';
        }
    } else {
        $res['message'] = 'No user found';
    }
    echoRespnse(201, $res);
});

$app->get('/get_franchise_history/:from/:to/:franchise', function($from, $to, $franchise) {
    $res = array('error' => true, 'message' => 'No data found');
    $obj = new Common();
    $franchise_qry = '';
    $date = '';
    if ($franchise != 'all') {
        $franchise_qry = 'u.franchise_id=' . $franchise;
    } else {
        $franchise_qry = 'u.franchise_id > 0';
    }
    if (trim($from) != 'null' && trim($to) != 'null' && trim($from) != null && trim($to) != null) {
        $date = $date . ' AND DATE(u.start_date) BETWEEN \'' . $from . '\' AND \'' . $to . '\' OR DATE(u.end_date) BETWEEN \'' . $from . '\' AND \'' . $to . '\'';
    }
    $data = $obj->selectFranchiseReport('SELECT * FROM
(SELECT fph.franchise_id, fph.level_one_name, fph.level_two_name, fph.level_three_name, fph.start_date, fph.end_date, f.name AS franchise FROM `franchise_programs_history` AS fph LEFT JOIN `franchise` AS f ON f.ID = fph.franchise_id UNION ALL SELECT fp.franchise_id, lo.name AS level_one_name, lt.name AS level_two_name, lh.name AS level_three_name, fp.start_date, fp.end_date, f.name AS franchise FROM `franchise_programs` AS fp LEFT JOIN `franchise` AS f ON f.ID = fp.franchise_id LEFT JOIN level_one AS lo ON lo.ID = fp.level_one_id LEFT JOIN level_two AS lt ON lt.ID = fp.level_two_id LEFT JOIN level_three AS lh ON lh.ID = fp.level_three_id) AS u
WHERE ' . $franchise_qry . $date);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});
