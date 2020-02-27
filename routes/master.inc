<?php

//Login app user start

$app->post('/login', function() use ($app) {
    $res = array('error' => true, 'message' => 'Invalid login details');
    $data = $app->request->post();
    $obj = new Common();
    date_default_timezone_set('Asia/Singapore');
    $record = $obj->selectRow('*', 'admin', 'BINARY username=\'' . $data['username'] . '\' AND BINARY password=\'' . $data['password'] . '\'');
    if (count($record) > 0) {
        $res['error'] = false;
        $res['message'] = 'Welcome, ' . $record['name'];
        $record['role'] = 'admin';
        $res['data'] = $record;
    } else {
        $user = $obj->selectRow('*', 'user', 'BINARY username=\'' . $data['username'] . '\' AND BINARY password=\'' . $data['password'] . '\'');
        if (count($user) > 0) {
            $res['error'] = false;
            $user['role'] = 'user';
            $res['message'] = 'Welcome, ' . $user['name'];
            $res['data'] = $user;
        }
    }
    echoRespnse(201, $res);
});

//Login app user end
//
//
// Get user list start

$app->get('/get_users', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'user', 'user_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

// Get user list end
//
//
// Add user start

$app->post('/add_user/:id', function($id) use ($app) {
    $data = $app->request->post();
    $res = array('error' => true);
    $com = new Common();
    date_default_timezone_set('Asia/Singapore');
    if ($id > 0) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $record = $com->updateRecordWithWhere($data, 'user', 'user_id = ' . $id);
        if ($record > 0) {
            $res['message'] = 'User updated successfully';
            $res['false'] = false;
        } else {
            $res['message'] = 'No updates found';
        }
    } else {
        $nri_exist = $com->selectRow('*', 'user', 'nri_no=\'' . $data['nri_no'] . '\'');
        if (count($nri_exist) == 0) {
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $record = $com->insertRecord($data, 'user');
            if ($record > 0) {
                $res['message'] = 'User added successfully';
                $res['false'] = false;
            } else {
                $res['message'] = 'Unable to add user';
            }
        } else {
            $res['message'] = 'User already exist';
        }
    }
    echoRespnse(201, $res);
});

// Add user end
//
//
// Add user log in start

$app->post('/add_user_visit/:uid', function($uid) use ($app) {
    $data = $app->request->post();
    $res = array('error' => true);
    $com = new Common();
    date_default_timezone_set('Asia/Singapore');
    if ($uid > 0) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['user_id'] = $uid;
        $record = $com->insertRecord($data, 'user_visit');
        if ($record > 0) {
            $res['message'] = 'In time added successfully';
            $res['false'] = false;
        } else {
            $res['message'] = 'Unable to add in time';
        }
    } else {
        $res['message'] = 'No user found';
    }
    echoRespnse(201, $res);
});

// Add user log in end
//
//
// Add user log out start

$app->post('/add_user_visit_out/:lid', function($lid) use ($app) {
    $data = $app->request->post();
    $res = array('error' => true);
    $com = new Common();
    date_default_timezone_set('Asia/Singapore');
    if ($lid > 0) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $record = $com->updateRecordWithWhere($data, 'user_visit', 'user_visit_id=' . $lid);
        if ($record > 0) {
            $res['message'] = 'Out time added successfully';
            $res['false'] = false;
        } else {
            $res['message'] = 'Unable to add out time';
        }
    } else {
        $res['message'] = 'No user found';
    }
    echoRespnse(201, $res);
});

// Add user log out end
//
//
// Get user visits start

$app->get('/get_users_visit/:uid', function($uid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'user_visit', 'user_id = ' . $uid);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

// Get user visits end
//
//
// Get visits by date start

$app->get('/get_visit_by_date/:date', function($date) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('uv.in_datetime, uv.out_datetime, uv.in_temperature, uv.out_temperature, u.name, u.nri_no, u.phone_no, u.company_name, u.image_path', 'user_visit AS uv LEFT JOIN user AS u ON u.user_id = uv.user_id', 'DATE(uv.created_at) = \'' . $date . '\'');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

// Get visits by date end
//
//
// Get visits report by date range start

$app->get('/get_visit_report/:from/:to', function($from, $to) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('uv.in_datetime, uv.out_datetime, uv.in_temperature, uv.out_temperature, u.name, u.nri_no, u.phone_no, u.company_name, u.image_path', 'user_visit AS uv LEFT JOIN user AS u ON u.user_id = uv.user_id', 'DATE(uv.created_at) BETWEEN \'' . $from . '\' AND \'' . $to . '\'');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

// Get visits report by date range end