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

$app->post('/upload_fileimage', function() use ($app) {

    $image = $_POST['image'];
    $name = $_POST['name'];

    $realImage = base64_decode($image);

    file_put_contents('uploads/' . $name, $realImage);



    echo "Image Uploaded Successfully.";
});




$app->post('/insert_members', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name_student' => $data['name_student'], 'name_father' => $data['name_father'], 'name_mother' => $data['name_mother'],
        'occupation' => $data['occupation'], 'gender' => $data['gender'], 'date_of_birth' => $data['date_of_birth'],
        'admission' => $data['admission'], 'wfrom' => $data['from'], 'address' => $data['address'], 'contact_no' => $data['contact_no']), 'inquiry_form');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_memberscheck', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $exist = $com->selectRow('*', 'inquiry_form', 'name_student= \'' . $data['name_student'] . '\'');
    if (count($exist) == 0) {
        $array = array('name_student' => $data['name_student'], 'name_father' => $data['name_father'], 'name_mother' => $data['name_mother'],
            'occupation' => $data['occupation'], 'gender' => $data['gender'], 'date_of_birth' => $data['date_of_birth'],
            'admission' => $data['admission'], 'wfrom' => $data['from'], 'address' => $data['address'], 'contact_no' => $data['contact_no'], 'why_mekana' => $data['why_mekana'], 'type_day' => $data['type_day'], 'came_know_mekana' => $data['came_know_mekana'], 'expect_school' => $data['expect_school'], 'student_van' => $data['student_van'], 'father_smart_phone' => $data['father_smart_phone'], 'father_net_connection' => $data['father_net_connection'], 'mother_smart_phone' => $data['mother_smart_phone'], 'mother_net_connection' => $data['mother_net_connection'], 'stuent_cell_phone' => $data['stuent_cell_phone'], 'what_purpose' => $data['what_purpose'], 'year_id' => $data['year_id'], 'date' => $data['date'], 'class_id' => $data['class_id']);
        $record = $com->insertRecord($array, 'inquiry_form');
        if ($record > 0) {
            $com->insertRecord(array('year_id' => $data['year_id'], 'date' => $data['date'], 'class_id' => $data['class_id'], 'count' => 1), 'enquiry_count');
            $res['error'] = false;
            $res['message'] = 'Record inserted successfully';
        }
    } else {
        $res['error'] = true;
        $res['message'] = 'Username already exist';
    }
    echoRespnse(201, $res);
});


$app->post('/insert_enquiry_count', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('year_id' => $data['year_id'], 'date' => $data['date'], 'date' => $data['date'], 'class_id' => $data['class_id'], 'count' => $data['count']), 'enquiry_count');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_year1', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name' => $data['name'], 'status' => $data['status']), 'year');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});


$app->get('/get_forms', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'inquiry_form', 'id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_notice', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'notice', 'id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_inquiry', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'inquiry_form', 'id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_class', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'class', 'class_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_year1', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'year', 'year_id  > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_enquiry_count_by_year/:yid', function($yid) {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $classes = $com->selectAll('*', 'class', 'class_id > 0');
    $data = $com->selectAll('IFNULL(SUM(ec.count), 0) AS enquiry, ec.date, c.name AS class', 'class AS c LEFT JOIN enquiry_count AS ec ON ec.class_id = c.class_id AND ec.year_id = ' . $yid, ' c.class_id > 0 GROUP BY ec.date, c.class_id ORDER BY ec.date DESC, c.class_id ASC');
    if (count($data) > 0) {
        $records = array();
        foreach ($data as $row) {
            if (isset($row['date']) && $row['date'] != '' && $row['date'] != null && strtolower($row['date']) != 'null') {
                if (!isset($records[$row['date']]['total'])) {
                    $records[$row['date']]['total'] = 0;
                }
                $records[$row['date']][$row['class']] = $row['enquiry'];
                $records[$row['date']]['total'] = $records[$row['date']]['total'] + $row['enquiry'];
            }
        }
        $res['message'] = 'Records found';
        $res['data'] = $records;
        if (count($records) > 0) {
            $res['error'] = false;
        }
    }
    $res['classes'] = $classes;
    echoRespnse(201, $res);
});

$app->get('/get_enquiry_count_by_year_class/:year/:class/:date', function($year, $class, $date) {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $classes = $com->selectAll('*', 'class', 'class_id > 0');
    $data = $com->selectAll('IFNULL(SUM(ec.count), 0) AS enquiry, ec.date, c.name AS class', 'class AS c LEFT JOIN enquiry_count AS ec ON ec.class_id = c.class_id AND ec.year_id IN (' . $year . ')', 'c.class_id = ' . $class . ' AND ec.date < \'' . $date . '\' GROUP BY ec.date, c.class_id ORDER BY ec.date DESC, c.class_id ASC');
    if (count($data) > 0) {
        $records = array();
        foreach ($data as $row) {
            if (isset($row['date']) && $row['date'] != '' && $row['date'] != null && strtolower($row['date']) != 'null') {
                if (!isset($records[$row['date']]['total'])) {
                    $records[$row['date']]['total'] = 0;
                }
                $records[$row['date']][$row['class']] = $row['enquiry'];
                $records[$row['date']]['total'] = $records[$row['date']]['total'] + $row['enquiry'];
            }
        }
        $res['message'] = 'Records found';
        $res['data'] = $records;
        if (count($records) > 0) {
            $res['error'] = false;
        }
    }
    $res['classes'] = $classes;
    echoRespnse(201, $res);
});

$app->post('/loginadmin', function() use ($app) {
    $res = array('error' => true, 'message' => 'Invalid login details');
    $data = $app->request->post();
    $obj = new Common();
    $record = $obj->selectRow('*', 'admin_login', 'user_name=\'' . $data['user_name'] . '\'');
    if (count($record) > 0) {
        if ($data['password'] == $record['password']) {
            $res['error'] = false;
            $res['message'] = 'Welcome ' . $record['name'];
            $res['data'] = $record;
        } else {
            $res['message'] = 'Username or Password mismatch';
        }
    }
    echoRespnse(201, $res);
});


