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

$app->post('/upload_files', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to upload image');
    $obj = new Common();
    $data = 0;
    if (isset($_FILES) && isset($_FILES['file'])) {
        $len = count($_FILES['file']['name']);
        for ($i = 0; $i < $len; $i++) {
            $data = $data + 1;
            $file = $_FILES['file'];
            $name = $file['name'][$i];
            $temp_name = $file['tmp_name'][$i];
            $extension = strtolower($obj->getExtension($name));
            $key = md5(uniqid());
            $temp_file_name = $key . '.' . $extension;
            $dir = 'uploads';
            if (!file_exists($dir)) {
                mkdir($dir);
            }
            $temp_file_path = 'uploads/' . $temp_file_name;
            move_uploaded_file($temp_name, $temp_file_path);
            $obj->insertRecord(array('image_path' => $temp_file_path, 'application_id' => $app->request->post('application_id')), 'application_gallery');
        }
    }
    if ($data > 0) {
        $res['error'] = false;
        $res['message'] = 'Image uploaded successfully';
        $res['data'] = $obj->selectAll('*', 'application_gallery', 'application_id=' . $app->request->post('application_id'));
    }
    echoRespnse(201, $res);
});

$app->get('/application_gallery/:aid', function($aid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'application_gallery', 'application_id=' . $aid);
    if ($data > 0) {
        $res['error'] = false;
        $res['message'] = 'Records successfully';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->post('/insert_product', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('product_price' => $data['product_price'], 'delivery_fee' => $data['delivery_fee'], 'product_name' => $data['product_name'], 'description' => $data['description'], 'image_path' => $data['product_image']), 'product');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_sub_product', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('product_id' => $data['product_id'], 'delivery_fee' => $data['delivery_fee'], 'product_price' => $data['product_price'], 'product_name' => $data['product_name'], 'description' => $data['description'], 'image_path' => $data['product_image'], 'status' => $data['status']), 'sub_product');
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

$app->post('/insert_application', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to subscribe');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('title' => $data['title'], 'image_path_thumb' => $data['application_thumb_image']), 'application');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_application_youtube', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to subscribe');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('image_path' => $data['youtube_id'], 'application_id' => $data['application_id'], 'type' => 'youtube'), 'application_gallery');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
        $res['data'] = $com->selectAll('*', 'application_gallery', 'application_id=' . $data['application_id']);
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
        foreach ($data as $key => $val) {
            $items = $com->selectAll('*', 'order_item', 'order_id = ' . $val['orders_id']);
            $data[$key]['items'] = $items;
        }
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

$app->get('/get_parent_product', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'product', 'product_id > 3');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_sub_product', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('s.*, p.product_name AS parent_product', 'sub_product AS s LEFT JOIN product AS p ON p.product_id = s.product_id', 's.sub_product_id > 0');
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
    $items = $data['items'];
    unset($data['items']);
    $com = new Common();
    $insertion = $com->insertRecord($data, 'orders');
    if ($insertion > 0) {
        $tpy = new Thirdparty();
        $res['error'] = false;
        $res['message'] = 'Order placed successfully order reference number is #' . $insertion;
        $data['orders_id'] = $insertion;
        $table = '<table border="1" style="width: 100%; max-width: 600px; margin: 0 auto;">';
        $table = $table . '<tr><th>Item</th><th>Qty</th><th>Price</th><th>Total</th></tr>';
        if ($insertion > 0) {
            foreach ($items as $item) {
                $table = $table . '<tr><td>' . $item['name'] . '</td><td>' . $item['count'] . '</td><td>Rs.' . $item['price'] . '</td><td>Rs.' . ($item['count'] * $item['price']) . '</td></tr>';
                $com->insertRecord(array('order_id' => $insertion, 'product_name' => $item['name'], 'product_qty' => $item['count'], 'price' => $item['price'], 'total' => ($item['price'] * $item['count']), 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1, 'updated_at' => date('Y-m-d H:i:s'), 'updated_by' => 1), 'order_item');
            }
        }
        $table = $table . '<tr><td colspan="3">Total</td><td>' . $data['sub_total'] . '</td></tr>';
        $table = $table . '<tr><td colspan="3">Delivery Fee</td><td>' . $data['delivery_fee'] . '</td></tr>';
        $table = $table . '<tr><td colspan="3">Tax</td><td>' . $data['tax_amt'] . '</td></tr>';
        $table = $table . '<tr><td colspan="3">Discount</td><td>' . $data['discount_amt'] . '</td></tr>';
        $table = $table . '<tr><td colspan="3">Grand Total</td><td>' . $data['grand_total'] . '</td></tr>';
        $table = $table . '</table>';
        $data['table'] = $table;
        $_SESSION['orders_id'] = $insertion;
        $template = $com->selectRow('*', 'templates', 'name=\'order_recived\' AND type=\'email\' AND target=\'user\'');
        $body = $com->getReplacedString($template['body_web'], $data);
        $tpy->sendMail($data['email'], $data['fname'], $body, $body, $template['subject'], $template['mail'], $template['mail_name'], '', '', $template['cc'], $template['cc_name']);
    } else {
        $res['message'] = 'Sorry unable to create order kindly contact our support team your transaction id is ' . $data['transaction_id'];
    }
    echoRespnse(201, $res);
});


$app->get('/get_application', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'application', 'application_id > 0');
    if (count($data) > 0) {
        foreach ($data as $key => $row) {
            $gallery = $com->selectAll('*', 'application_gallery', 'application_id = ' . $row['application_id']);
            $data[$key]['gallery'] = $gallery;
        }
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/update_sales_mode/:fid/:bid', function($fid, $bid) {
    $res = array('error' => true, 'message' => 'Unable to Update');
    $com = new Common();
    $record = $com->updateRecordWithWhere(array('sales_mode' => $bid), 'sales_mode', 'sales_mode_id =' . $fid);
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Update inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->get('/get_sales_mode', function() {
    $res = array('error' => true, 'message' => 'Unable to get records');
    $com = new Common();
    $data = $com->selectAll('*', 'sales_mode', 'sales_mode_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});
