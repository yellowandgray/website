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
    $record = $com->insertRecord(array('name' => $data['name'], 'electromech_floor_id' => $data['floor_id'], 'manufacturing' => $data['manufacturing'], 'electromech_category_id' => $data['category_id'], 'image_path' => $data['product_image'], 'name_plate_date' => $data['name_plate_date']), 'electromech_product');
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
    $record = $com->insertRecord(array('name' => $data['name']), 'electromech_category');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->get('/get_product', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('e.*, f.name AS floor, c.name AS category', 'electromech_product AS e LEFT JOIN electromech_floor AS f ON f.electromech_floor_id = e.electromech_floor_id LEFT JOIN electromech_category AS c ON c.electromech_category_id = e.electromech_category_id', 'e.electromech_product_id > 0');
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
    $insert = $obj->insertRecord(array('electromech_train_id' => $data['electromech_train_id'], 'electromech_category_id' => $data['electromech_category_id'], 'electromech_schedule_id' => $data['electromech_schedule_id'], 'electromech_staff_id' => $data['electromech_staff_id'], 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')), 'electromech_staff_login');
    if ($insert > 0) {
        $products = $obj->selectAll('p.name, p.electromech_product_id, p.image_path, p.manufacturing, p.name_plate_date, pc.code', 'electromech_product AS p LEFT JOIN electromech_product_code AS pc ON pc.electromech_product_id = p.electromech_product_id AND pc.electromech_train_id = ' . $data['electromech_train_id'], 'p.electromech_category_id=' . $data['electromech_category_id']);
        foreach ($products as $key => $row) {
            $categries = null;
            $logs = $obj->selectAll('pel.enquiry_list, pel.electromech_schedule_id, pel.electromech_category_id, pel.electromech_product_enquiry_list_id, ec.name AS category', 'electromech_product_enquiry_list AS pel LEFT JOIN electromech_category AS ec ON ec.electromech_category_id = pel.electromech_category_id', 'pel.electromech_product_id = ' . $row['electromech_product_id'] . ' AND pel.electromech_schedule_id = ' . $data['electromech_schedule_id']);
            foreach ($logs as $log) {
                if (isset($log['electromech_schedule_id']) && $log['electromech_schedule_id'] != 1) {
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
        $res['message'] = 'Unable to fetch checklist';
    }
    echoRespnse(201, $res);
});

$app->post('/checklists_for_inspect_logs/:uid/:tid/:fid/:sid', function($uid, $tid, $fid, $sid) use ($app) {
    $res = array('error' => true, 'message' => 'No checklist found');
    date_default_timezone_set('Asia/Singapore');
    $data = $app->request->post();
    $obj = new Common();
    $user = $obj->selectRow('*', 'electromech_staff', 'electromech_staff_id=' . $uid);
    $train = $obj->selectRow('*', 'electromech_train', 'electromech_train_id=' . $tid);
    $floor = $obj->selectRow('*', 'electromech_floor', 'electromech_floor_id=' . $fid);
    $schedule = $obj->selectRow('*', 'electromech_schedule', 'electromech_schedule_id=' . $sid);
    $insert = $obj->insertRecord(array('electromech_staff_name' => $user['name'], 'electromech_staff_id' => $uid, 'electromech_floor_id' => $fid, 'electromech_floor_name' => $floor['name'], 'electromech_schedule_id' => $sid, 'electromech_train_id' => $tid, 'electromech_schedule_name' => $schedule['name'], 'electromech_train_name' => $train['name'], 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'created_by' => $uid, 'updated_by' => $uid), 'electromech_product_enquiry_log');
    if ($insert > 0) {
        foreach ($data as $row) {
            $checklist = array('electromech_product_id' => $row['electromech_product_id'], 'electromech_product_name' => $row['name'], 'electromech_product_code' => $row['code'], 'image_path' => $row['image_path'], 'electromech_product_enquiry_list_id' => '', 'electromech_product_enquiry_log_id' => $insert, 'enquiry_list' => '', 'electromech_category_id' => 0, 'electromech_category_name' => '', 'enquiry_status' => 0, 'enquiry_failure_comment' => '', 'general_comment' => $row['general_comment'], 'created_at' => date('Y-m-d H:i:s'), 'created_by' => $uid, 'updated_at' => date('Y-m-d H:i:s'), 'updated_by' => $uid);
            if ($row['category'] != null && $row['category'] != 'null') {
                foreach ($row['category'] as $key => $category) {
                    foreach ($category['checklist'] as $check) {
                        $checklist['electromech_product_enquiry_list_id'] = $check['electromech_product_enquiry_list_id'];
                        $checklist['enquiry_list'] = $check['enquiry_list'];
                        $checklist['electromech_category_id'] = $check['electromech_category_id'];
                        $checklist['electromech_category_name'] = $check['category'];
                        $checklist['enquiry_status'] = $check['enquiry_status'];
                        $checklist['enquiry_failure_comment'] = $check['enquiry_failure_comment'];
                        $obj->insertRecord($checklist, 'electromech_product_enquiry_log_detail');
                    }
                }
            } else {
                foreach ($row['checklist'] as $check) {
                    $checklist['electromech_product_enquiry_list_id'] = $check['electromech_product_enquiry_list_id'];
                    $checklist['enquiry_list'] = $check['enquiry_list'];
                    $checklist['enquiry_status'] = $check['enquiry_status'];
                    $checklist['enquiry_failure_comment'] = $check['enquiry_failure_comment'];
                    $obj->insertRecord($checklist, 'electromech_product_enquiry_log_detail');
                }
            }
        }
        $res['error'] = false;
        $res['message'] = 'Checklist added successfully';
    } else {
        $res['message'] = 'Unable to add checklist';
    }
    echoRespnse(201, $res);
});

$app->get('/get_checklist_options', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $train = $com->selectAll('name, electromech_train_id', 'electromech_train', 'electromech_train_id > 0 ORDER BY name ASC');
    $category = $com->selectAll('name, electromech_category_id', 'electromech_category', 'electromech_category_id > 0 ORDER BY name ASC');
    $schedule = $com->selectAll('name, electromech_schedule_id', 'electromech_schedule', 'electromech_schedule_id > 0');
    if (count($train) > 0 || count($category) > 0 || count($schedule) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = array('train' => $train, 'category' => $category, 'schedule' => $schedule);
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

$app->get('/get_subpart', function() use ($app) {
    $res = array('error' => true, 'message' => 'No records found');
    $data = $app->request->post();
    $obj = new Common();
    $record = $obj->selectAll('s.*, p.name AS product', 'electromech_subpart AS s LEFT JOIN electromech_product AS p ON p.electromech_product_id = s.electromech_product_id', 'electromech_subpart_id > 0');
    if (count($record) > 0) {
        $data = null;
        foreach ($record as $row) {
            $data[$row['product']][] = $row;
        }
        $res['error'] = false;
        $res['data'] = $data;
        $res['message'] = 'Records found';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_subpart', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name' => $data['name'], 'electromech_product_id' => $data['product_id'], 'image_path' => $data['subpart_image']), 'electromech_subpart');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});