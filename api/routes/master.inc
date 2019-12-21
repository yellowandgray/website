<?php

session_start();
$app->post('/update_record/:table/:where', function($table, $where) use ($app) {
    $res = array('error' => true, 'message' => 'Unable to update');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->updateRecordWithWhere($data, $table, $where);
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record updated successfully';
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

$app->post('/loginstudent', function() use ($app) {
    $res = array('error' => true, 'message' => 'Invalid login details');
    $data = $app->request->post();
    $obj = new Common();
    $record = $obj->selectRow('*', 'student_register', 'user_name=\'' . $data['user_name'] . '\'');
    if (count($record) > 0) {        
        if ($data['password'] == $record['password']) {       
            $res['error'] = false;
            $res['message'] = 'Welcome ' . $record['student_name'];
            $res['data'] = $record;
        } else {
            $res['message'] = 'Username or Password mismatch';
        }
    }
    echoRespnse(201, $res);
});

$app->post('/insert_student', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('user_name' => $data['user_name'], 'student_name' => $data['student_name'], 'parent_name' => $data['parent_name'], 'mobile' => $data['mobile'], 'city' => $data['city'], 'pin' => $data['pin'], 'school_name' => $data['school_name'], 'standard' => $data['select_standard'], 'email' => $data['email'], 'password' => $data['password'], 'confirm_password' => $data['confirm_password']), 'student_register');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_subject', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name' => $data['name']), 'subject');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_topic', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name' => $data['name'], 'subject_id' => $data['subject_id']), 'topic');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->get('/get_subject', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'subject', 'subject_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_topic', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'topic', 'topic_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_student', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'student_register', 'student_register_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});
