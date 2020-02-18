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

$app->post('/insert_product', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name' => $data['name'], 'floor_id' => $data['floor_id'], 'manufacturing' => $data['manufacturing'], 'name_plate_date' => $data['name_plate_date'], 'image_path' => $data['product_image']), 'electromech_product');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_train', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name' => $data['name']), 'electromech_train');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_floor', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name' => $data['name']), 'electromech_floor');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_staff', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name' => $data['name'], 'mobile' => $data['mobile'], 'imageurl' => $data['staff_image'], 'username' => $data['username'], 'password' => $data['password'], 'role' => $data['role']), 'electromech_staff');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_product_code', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('code' => $data['code'], 'electromech_product_id' => $data['electromech_product_id'], 'electromech_train_id' => $data['electromech_train_id']), 'electromech_product_code');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_command', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('enquiry_list' => $data['enquiry_list'], 'electromech_product_id' => $data['electromech_product_id'], 'electromech_schedule_id' => $data['electromech_schedule_id']), 'electromech_product_enquiry_list');
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
    $record = $com->insertRecord(array('name' => $data['name'], 'electromech_product_id' => $data['electromech_product_id']), 'electromech_category');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->get('/get_product', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'electromech_product', 'electromech_product_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->post('/loginprocess', function() use ($app) {
    $res = array('error' => true, 'message' => 'Invalid login details');
    $data = $app->request->post();
    $obj = new Common();
    $record = $obj->selectRow('*', 'electromech_staff', 'username=\'' . $data['username'] . '\' AND password=\'' . $data['password'] . '\'');
    if (count($record) > 0) {
        if ($data['password'] == $record['password']) {
            date_default_timezone_set('Asia/Singapore');
            $res['error'] = false;
            $res['message'] = 'Welcome ' . $record['name'];
            $res['data'] = $record;
        } else {
            $res['message'] = 'Username or Password mismatch';
        }
    }
    echoRespnse(201, $res);
});

$app->post('/checklists_for_inspect', function() use ($app) {
    $res = array('error' => true, 'message' => 'No checklist found');
    date_default_timezone_set('Asia/Singapore');
    $data = $app->request->post();
    $obj = new Common();
    $insert = $obj->insertRecord(array('electromech_train_id' => $data['electromech_train_id'], 'electromech_floor_id' => $data['electromech_floor_id'], 'electromech_schedule_id' => $data['electromech_schedule_id'], 'electromech_staff_id' => $data['electromech_staff_id'], 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')), 'electromech_staff_login');
    if ($insert > 0) {
        $products = $obj->selectAll('p.name, p.electromech_product_id, p.image_path, p.manufacturing, pc.code', 'electromech_product AS p LEFT JOIN electromech_product_code AS pc ON pc.electromech_product_id = p.electromech_product_id AND pc.electromech_train_id = ' . $data['electromech_train_id'], 'p.floor_id=' . $data['electromech_floor_id']);
        foreach ($products as $key => $row) {
            $categries = array();
            $logs = $obj->selectAll('pel.enquiry_list, pel.electromech_category_id, pel.electromech_product_enquiry_list_id, ec.name AS category', 'electromech_product_enquiry_list AS pel LEFT JOIN electromech_category AS ec ON ec.electromech_category_id = pel.electromech_category_id', 'pel.electromech_product_id = ' . $row['electromech_product_id'] . ' AND pel.electromech_schedule_id = ' . $data['electromech_schedule_id']);
            foreach ($logs as $log) {
                if (isset($log['electromech_category_id']) && $log['electromech_category_id'] != 0) {
                    $categries[$log['electromech_category_id']]['name'] = $log['category'];
                    $categries[$log['electromech_category_id']]['category_id'] = $log['electromech_category_id'];
                    $categries[$log['electromech_category_id']]['checklist'][] = $log;
                }
            }
            $products[$key]['category'] = $categries;
            $products[$key]['checklist'] = $logs;
        }
        $res['error'] = false;
        $res['message'] = 'Products found';
        $res['data'] = $products;
    } else {
        $res['message'] = 'Username or Password mismatch';
    }
    echoRespnse(201, $res);
});

$app->get('/get_checklist_options', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $train = $com->selectAll('name, electromech_train_id', 'electromech_train', 'electromech_train_id > 0 ORDER BY name ASC');
    $floor = $com->selectAll('name, electromech_floor_id', 'electromech_floor', 'electromech_floor_id > 0 ORDER BY name ASC');
    $schedule = $com->selectAll('name, electromech_schedule_id', 'electromech_schedule', 'electromech_schedule_id > 0');
    if (count($train) > 0 || count($floor) > 0 || count($schedule) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = array('train' => $train, 'floor' => $floor, 'schedule' => $schedule);
    }
    echoRespnse(201, $res);
});

$app->get('/get_train', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'electromech_train', 'electromech_train_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_trainifactive', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'train', 'status=\'' . 'active' . '\'');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_floor', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'electromech_floor', 'electromech_floor_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_staff', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'electromech_staff', 'electromech_staff_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_command_by_schedule/:sid', function($sid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('c.*, p.name AS electromech_product', 'electromech_product_enquiry_list AS c LEFT JOIN electromech_product AS p ON p.electromech_product_id = c.electromech_product_id', 'electromech_schedule_id = ' . $sid);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_schedule', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'electromech_schedule', 'electromech_schedule_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_category', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'electromech_category', 'electromech_category_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_product_code/:pid', function($pid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('pc.*, t.name AS electromech_train', 'electromech_product_code AS pc LEFT JOIN electromech_train AS t ON t.electromech_train_id = pc.electromech_train_id', 'electromech_product_id = ' . $pid);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->post('/get_trainfloor', function() use ($app) {
    $res = array('error' => true, 'message' => 'Floors Not Found');
    $data = $app->request->post();
    $obj = new Common();
    $record = $obj->selectAll('*', 'electromech_floor', 'train_id=\'' . $data['train_id'] . '\'');
    if (count($record) > 0) {
        if ($data['train_id'] == $data['train_id']) {
            $res['error'] = false;
            $res['data'] = $record;
        } else {
            $res['message'] = 'Floor mismatch--->' . $data['train_id'];
        }
    }
    echoRespnse(201, $res);
});


