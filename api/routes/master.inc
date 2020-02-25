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
    $record = $com->insertRecord(array('product_price' => $data['product_price'], 'product_name' => $data['product_name'], 'description' => $data['description'], 'image_path' => $data['product_image']), 'product');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
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
    }
    echoRespnse(201, $res);
});

$app->post('/insert_testimonial', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name' => $data['name'], 'company' => $data['company'], 'description' => $data['description']), 'testimonial');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_member', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('fname' => $data['fname'], 'lname' => $data['lname'], 'email' => $data['email'], 'password' => $data['password'], 'confirm_password' => $data['confirm_password'], 'mobile' => $data['mobile'], 'address' => $data['address'], 'state_id' => $data['state_id'], 'city' => $data['city'], 'pincode' => $data['pincode']), 'member');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_front_member', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('fname' => $data['fname'], 'lname' => $data['lname'], 'email' => $data['email'], 'mobile' => $data['mobile'], 'address' => $data['address'], 'state_id' => $data['state'], 'city' => $data['city'], 'pincode' => $data['pincode']), 'member');
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
    $record = $com->insertRecord(array('title' => $data['title'], 'image_path' => $data['banner_image']), 'banner');
    $res['message'] = 'Record inserted successfully';
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_coupon', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('coupon_name' => $data['coupon_name'], 'reduce_amt' => $data['reduce_amt'], 'status' => $data['status']), 'coupon');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
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
        $record = $com->insertRecord(array('email' => $data['email'], 'name' => $data['name']), 'newsletter');
        if ($record > 0) {
            $res['error'] = false;
            $res['message'] = 'Record inserted successfully';
        }
    }
    echoRespnse(201, $res);
});

$app->get('/get_testimonial', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'testimonial', 'testimonial_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_order', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('o.*, s.name AS state', 'orders AS o LEFT JOIN state AS s ON s.state_id = o.state_id', 'o.orders_id > 0 order by o.orders_id DESC');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_product', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'product', 'product_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_member', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'member', 'member_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_banner', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'banner', 'banner_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_newsletter', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'newsletter', 'newsletter_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_state', function() {
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

$app->get('/get_coupon', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'coupon', 'coupon_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->post('/new_order', function() use ($app) {
    date_default_timezone_set('Asia/Kolkata');
    $res = array('error' => true, 'message' => 'Unable to subscribe');
    $data = $app->request->post();
    $data['created_at'] = date('Y-m-d H:i:s');
    $data['updated_at'] = date('Y-m-d H:i:s');
    $data['created_by'] = 1;
    $data['updated_by'] = 1;
    $com = new Common();
    $insertion = $com->insertRecord($data, 'orders');
    if ($insertion > 0) {
        $tpy = new Thirdparty();
        $res['error'] = false;
        $res['message'] = 'Order placed successfully order reference number is #' . $insertion;
        $data['orders_id'] = $insertion;
        $_SESSION['orders_id'] = $insertion;
        $template = $com->selectRow('*', 'templates', 'name=\'order_recived\' AND type=\'email\' AND target=\'user\'');
        $body = $com->getReplacedString($template['body_web'], $data);
        $tpy->sendMail($data['email'], $data['fname'], $body, $body, $template['subject'], $template['mail'], $template['mail_name'], '', '', $template['cc'], $template['cc_name']);
    } else {
        $res['message'] = 'Sorry unable to create order kindly contact our support team your transaction id is ' . $data['transaction_id'];
    }
    echoRespnse(201, $res);
});
