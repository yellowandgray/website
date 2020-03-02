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

$app->post('/update_members', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to update');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->updateRecordWithWhere(array('imageurl' => $data['imageurl'], 'password' => $data['password'], 'address' => $data['address'], 'pincode' => $data['pincode']), 'user', 'phone_no=\'' . $data['phone_no'] . '\'');

    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record updated successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_memberscheck', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $exist = $com->selectRow('*', 'user', 'phone_no= \'' . $data['phone_no'] . '\'');
    if (count($exist) == 0) {
        $array = array('name' => $data['name'], 'imageurl' => $data['imageurl'], 'phone_no' => $data['phone_no'], 'address' => $data['address'], 'password' => $data['password'], 'pincode' => $data['pincode']);
        $record = $com->insertRecord($array, 'user');
        if ($record > 0) {
            $res['error'] = false;
            $res['message'] = 'Record inserted successfully';
        }
    } else {
        $res['error'] = true;
        $res['message'] = 'Username already exist';
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

$app->post('/loginprocess', function() use ($app) {
    $res = array('error' => false, 'message' => 'Invalid login details');
    $data = $app->request->post();
    $obj = new Common();
    $record = $obj->selectRow('*', 'user', 'phone_no=\'' . $data['phone_no'] . '\'');
    if (count($record) > 0) {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $res['error'] = false;
        $res['message'] = 'Welcome ' . $record['name'];
        $res['data'] = $record;
    } else {
        $insert = $obj->insertRecord(array('phone_no' => $data['phone_no']), 'user');
        $res['message'] = 'Registered successfully';
        $res['data'] = array('user_id' => $insert);
    }
    echoRespnse(201, $res);
});

$app->post('/validateaddress', function() use ($app) {
    $res = array('error' => true, 'message' => 'Delivery not available to this area');
    $data = $app->request->post();
    $obj = new Common();
    $record = $obj->selectRow('*', 'delivery_pincode', 'pincode=\'' . $data['pincode'] . '\'');
    if (count($record) > 0) {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $update = $obj->updateRecordWithWhere(array('name' => $data['name'], 'address' => $data['address'], 'pincode' => $data['pincode']), 'user', 'user_id=' . $data['user_id']);
        if ($update > 0) {
            $res['error'] = false;
            $res['message'] = 'Delivery available';
        } else {
            $res['message'] = 'Unable to update address';
        }
    }
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

$app->post('/insert_snacks', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name' => $data['name'], 'amount' => $data['amount'], 'imageurl' => $data['product_image'], 'unit_id' => $data['unit_id'], 'unit_no' => $data['unit_no'], 'status' => $data['status']), 'fooditems');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_drinks', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name' => $data['name'], 'amount' => $data['amount'], 'imageurl' => $data['product_image'], 'drink_size' => $data['drink_size'], 'status' => $data['status']), 'cooldrink');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_banner', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('title' => $data['title'], 'sub_title' => $data['sub_title'], 'image_path' => $data['banner_image']), 'banner');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_unit', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name' => $data['name'], 'status' => $data['status']), 'unit');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_user', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name' => $data['name'], 'phone_no' => $data['phone_no'], 'password' => $data['password'], 'address' => $data['address'], 'pincode' => $data['pincode'], 'imageurl' => $data['user_image']), 'user');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/forgotprocess', function() use ($app) {
    $res = array('error' => true, 'message' => 'Invalid mobile number');
    $data = $app->request->post();
    $obj = new Common();
    $record = $obj->selectRow('*', 'staff', 'phone_no=\'' . $data['phone_no'] . '\'');
    if (count($record) > 0) {
        if ($data['phone_no'] == $record['phone_no']) {
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $res['error'] = false;
            $res['message'] = 'Welcome ' . $record['name'];
            $res['data'] = $record;
        } else {
            $res['message'] = 'Mobile number not valid';
        }
    }
    echoRespnse(201, $res);
});

$app->post('/insert_delivery_boy', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('first_name' => $data['first_name'], 'last_name' => $data['last_name'], 'user_name' => $data['user_name'], 'phone' => $data['phone'], 'password' => $data['password'], 'imageurl' => $data['profile_image']), 'delivery_boy');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->get('/get_foods', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('f.*, u.name AS unit', 'fooditems AS f LEFT JOIN unit AS u ON u.unit_id = f.unit_id', 'id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_drinks', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'cooldrink', 'cooldrink_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_user', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'user', 'id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_unit', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'unit', 'unit_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_banner', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'banner', 'banner_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_foodsorders', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'fooditems', 'id > 10');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_delivery_boy', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'delivery_boy', 'delivery_boy_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_food_list', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('fi.*, u.name AS unit', 'fooditem AS fi LEFT JOIN unit AS u ON u.unit_id = fi.unit_id', 'fi.status = 1');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});
