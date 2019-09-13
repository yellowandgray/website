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
        $data['password'] = $obj->encryptPassword($data['password']);
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
    $exist = $obj->selectRowWithWhere('users', 'email = \'' . $data['email'] . '\'');
    if (count($exist) > 0) {
        if ($obj->decryptPassword($data['password'], $exist['password'])) {
            $res = array('error' => false, 'message' => 'Welcome ' . $exist['name'], 'data' => $exist);
            if ($exist['verified_mobile'] == 0) {
                $tpry = new Thirdparty();
                $sms_user = $obj->selectRowWithWhere('templates', 'name=\'register\' AND type=\'sms\' AND target=\'user\'');
                $sms_user_body = $obj->getReplacedString($sms_user['body_web'], $exist);
                $tpry->sendSMS(array($exist['mobile']), $sms_user_body);
            }
        } else {
            $res['message'] = 'Invalid login details';
        }
    } else {
        $res['message'] = 'No user found';
    }
    echoRespnse(201, $res);
});

$app->post('/login_mobile', function() use ($app) {
    $data = $app->request->post();
    $obj = new Common();
    $res = array('error' => false, 'message' => 'Unable to login!!');
    $exist = $obj->selectRowWithWhere('users', 'mobile = \'' . $data['mobile'] . '\'');
    $otp = rand(100000, 999999);
    $tpry = new Thirdparty();
    $sms_user = $obj->selectRowWithWhere('templates', 'name=\'register\' AND type=\'sms\' AND target=\'user\'');
    $sms_user_body = $obj->getReplacedString($sms_user['body_web'], array('otp' => $otp));
    $tpry->sendSMS(array($data['mobile']), $sms_user_body);
    if (count($exist) > 0) {
        $id = $exist['ID'];
        $res['message'] = 'Welcome ' . $exist['name'];
        $obj->updateRecordWithWhere(array('otp' => $otp, 'verified_mobile' => 0), 'users', 'ID=' . $exist['ID']);
    } else {
        $id = $obj->insertRecord(array('otp' => $otp, 'code' => uniqid(), 'mobile' => $data['mobile'], 'name' => 'Guest'), 'users');
        $res['message'] = 'Mobile number registered successfully';
    }
    $res['data'] = $obj->selectRowWithWhere('users', 'ID=' . $id);
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
    $data = $obj->selectRowWithWhere('users', 'email = \'' . $email . '\'');
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

$app->post('/forgotpassword', function() use ($app) {
    $data = $app->request->post();
    $obj = new Common();
    date_default_timezone_set('Asia/Kolkata');
    $res = array('error' => true, 'message' => 'No user found in this email id');
    $user = $obj->selectRowWithWhere('users', 'email = \'' . $data['email'] . '\'');
    if (count($user) > 0) {
        $res['error'] = false;
        $expires = $obj->selectRowWithWhere('configs', 'name=\'reset_link_expires\'');
        $code = uniqid();
        $expired = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' + ' . $expires['value'] . ' minute'));
        $update = $obj->updateRecordWithWhere(array('reset_code' => $code, 'reset_initiated_at' => date('Y-m-d H:i:s'), 'reset_expired_at' => $expired), 'users', 'ID=\'' . $user['ID'] . '\'');
        if ($update > 0) {
            $res['message'] = 'Reset link sent to your email id';
            $template = $obj->selectRowWithWhere('templates', 'name=\'forgot_password_link\' AND type=\'email\' AND target=\'user\'');
            $body = $obj->getReplacedString($template['body_web'], array('name' => $user['name'], 'link' => FILES_PATH . 'resetpassword.php?auth=' . $code, 'expired_at' => date('d/M/Y H:i', strtotime($expired))));
            $tpty = new thirdparty();
            $tpty->sendMail($user['email'], $user['email'], $body, $body, $template['subject'], $template['mail'], $template['mail_name'], '', '', $template['cc'], $template['cc_name']);
        }
    }
    echoRespnse(201, $res);
});

$app->post('/reset_password', function() use ($app) {
    $data = $app->request->post();
    $obj = new Common();
    date_default_timezone_set('Asia/Kolkata');
    $res = array('error' => true, 'message' => 'Unable to update your password');
    $user = $obj->selectRowWithWhere('users', 'reset_code = \'' . $data['auth'] . '\'');
    if (count($user) > 0) {
        $update = $obj->updateRecordWithWhere(array('password' => $obj->encryptPassword($data['password'])), 'users', 'reset_code=\'' . $data['auth'] . '\'');
        if ($update > 0) {
            $res['error'] = false;
            $res['message'] = 'Password updated successfully';
        }
    } else {
        $res['message'] = 'Authentication failed';
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
        $affected = $obj->insertRecord($fields, $table);
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

$app->get('/get_all_failed_transaction', function() {
    $obj = new Common();
    $db = new DbHandler();
    $res = array('error' => true, 'message' => 'No failed transactions');
    $data = $obj->selectAllCustomFieldsWithWhere('ft.ID, ft.amt, ft.reason, ft.transaction_id, ft.created_at, u.name AS user', 'transaction_failed AS ft LEFT JOIN users AS u ON u.ID = ft.user_id', 'ft.ID > 0 ORDER BY ft.ID DESC');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        $res['data'] = $data;
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

$app->get('/get_buses/:from/:to/:date/:from_name/:to_name/:uid/:pid', function($from, $to, $date, $from_name, $to_name, $uid, $pid) {
    date_default_timezone_set('Asia/Kolkata');
    $res = array('error' => true, 'message' => 'No buses found');
    $obj = new Common();
    $obj->insertRecord(array('from_name' => $from_name, 'to_name' => $to_name, 'user_id' => $uid), 'user_search');
    $from_station = $obj->selectRowCustomFieldsWithWhere('provider_station_code', 'provider_stations', 'status=1 AND master_station_code = \'' . $from . '\' AND api_provider_id = ' . $pid);
    $to_station = $obj->selectRowCustomFieldsWithWhere('provider_station_code', 'provider_stations', 'status=1 AND master_station_code = \'' . $to . '\' AND api_provider_id = ' . $pid);
    if (count($from_station) > 0 && count($to_station) > 0) {
        $data = $obj->selectRowCustomFieldsWithWhere('p.base_url, p.name, p.api_key, p.merchent_id, p.user_id, p.password, p.date_format, s.*', 'api_providers AS p LEFT JOIN api_search AS s ON s.api_provider_id = p.ID', 'p.status=1 AND p.ID = ' . $pid);
        $url = $obj->getReplacedString($data['endpoint'], array('api_key' => $data['api_key'], 'user_id' => $data['user_id'], 'password' => $data['password'], 'from' => $from_station['provider_station_code'], 'to' => $to_station['provider_station_code'], 'date' => $obj->getTravelDate($date, $data['date_format']))); //Replacing search url values
        if ($data['type'] == 'json') {
            $response = $obj->getSearchJSONResponse($data, $url, $from_name, $to_name, array('from' => $from_station['provider_station_code'], 'to' => $to_station['provider_station_code'], 'date' => $obj->getTravelDate($date, $data['date_format']))); //the final array
            if (count($response) > 0) {
                $res = array('error' => false, 'data' => $response, 'message' => 'Buses found');
            }
        }
        if ($data['type'] == 'soap') {
            $response = $obj->getSearchSOAPResponse($data, $url, $from_name, $to_name, array('from' => $from_station['provider_station_code'], 'to' => $to_station['provider_station_code'], 'date' => $obj->getTravelDate($date, $data['date_format']))); //the final array
            if (count($response) > 0) {
                $res = array('error' => false, 'data' => $response, 'message' => 'Buses found');
            }
        }
    }
    echoRespnse(201, $res);
});

$app->get('/get_seats/:pid/:from/:to/:date/:trip/:stage', function($pid, $from, $to, $date, $trip, $stage) {
    $res = array('error' => true, 'message' => 'No seats found');
    $obj = new Common();
    $from_station = $obj->selectRowCustomFieldsWithWhere('provider_station_code', 'provider_stations', 'status=1 AND master_station_code = \'' . $from . '\' AND api_provider_id = ' . $pid);
    $to_station = $obj->selectRowCustomFieldsWithWhere('provider_station_code', 'provider_stations', 'status=1 AND master_station_code = \'' . $to . '\' AND api_provider_id = ' . $pid);
    $data = $obj->selectRowCustomFieldsWithWhere('p.base_url, p.name, p.api_key, p.merchent_id, p.user_id, p.password, p.date_format, b.*', 'api_providers AS p LEFT JOIN api_busmap AS b ON b.api_provider_id = p.ID', 'p.status=1 AND p.ID = ' . $pid);
    $url = $obj->getReplacedString($data['endpoint'], array('api_key' => $data['api_key'], 'user_id' => $data['user_id'], 'password' => $data['password'], 'from' => $from_station['provider_station_code'], 'to' => $to_station['provider_station_code'], 'date' => $obj->getTravelDate($date, $data['date_format']), 'trip' => $trip, 'stage' => $stage)); //Replacing bus url values
    if ($data['type'] == 'json') {
        $response = $obj->getBusJSONResponse($data, $url, array('user_id' => $data['user_id'], 'password' => $data['password'], 'from' => $from_station['provider_station_code'], 'to' => $to_station['provider_station_code'], 'date' => $obj->getTravelDate($date, $data['date_format']), 'trip' => $trip)); //the final array
        if (count($response) > 0) {
            $res = array('error' => false, 'data' => $response, 'message' => 'Buses found');
        }
    }
    if ($data['type'] == 'soap') {
        $response = $obj->getBusSOAPResponse($data, $url, array('user_id' => $data['user_id'], 'password' => $data['password'], 'from' => $from_station['provider_station_code'], 'to' => $to_station['provider_station_code'], 'date' => $obj->getTravelDate($date, $data['date_format']), 'trip' => $trip, 'stage' => $stage)); //the final array
        if (count($response) > 0) {
            $res = array('error' => false, 'data' => $response, 'message' => 'Buses found');
        }
    }
    echoRespnse(201, $res);
});

$app->get('/get_key', function() {
    $res = array('error' => true, 'message' => 'No keys found');
    $obj = new Common();
    $data = $obj->selectRowCustomFieldsWithWhere('p.base_url, p.merchent_id, p.user_id, p.password', 'api_providers AS p', 'p.status=1');
    if (count($data) > 0) {
        $client = new SoapClient(
                null, array(
            'location' => $data['base_url'] . '/Login',
            'uri' => $data['base_url'] . '?wsdl',
            'trace' => 1
                )
        );
        $result = $client->__doRequest('<TES><MERCHANTID>' . $data['merchent_id'] . '</MERCHANTID><USERID>' . $data['user_id'] . '</USERID><PASSWORD>' . $data['password'] . '</PASSWORD></TES>', $data['base_url'] . '/Login', $data['base_url'] . '?wsdl', 1);
        print $result;
        exit;
    }
    echoRespnse(201, $res);
});

$app->post('/block_seat', function() use ($app) {
    $fields = $app->request->post();
    $fields['agent_pnr'] = uniqid();
    $res = array('error' => true, 'message' => 'Unable to insert record');
    $obj = new Common();
    $from_station = $obj->selectRowCustomFieldsWithWhere('provider_station_code', 'provider_stations', 'status=1 AND master_station_code = \'' . $fields['from_station'] . '\' AND api_provider_id = ' . $fields['provider']);
    $to_station = $obj->selectRowCustomFieldsWithWhere('provider_station_code', 'provider_stations', 'status=1 AND master_station_code = \'' . $fields['to_station'] . '\' AND api_provider_id = ' . $fields['provider']);
    $fields['from_station'] = $from_station['provider_station_code'];
    $fields['to_station'] = $to_station['provider_station_code'];
    $data = $obj->selectRowCustomFieldsWithWhere('p.base_url, p.name, p.api_key, p.merchent_id, p.user_id, p.password, p.date_format, b.*', 'api_providers AS p LEFT JOIN api_blockseat AS b ON b.api_provider_id = p.ID', 'p.status=1 AND p.ID = ' . $fields['provider']);
    $url = $obj->getReplacedString($data['endpoint'], array('api_key' => $data['api_key'], 'user_id' => $data['user_id'], 'password' => $data['password'], 'trip_code' => $fields['trip_code'])); //Replacing bus url values
    if ($data['type'] == 'json') {
        $res = $obj->blockSeatJSONResponse($data, $url, $fields); //the final array
    }
    echoRespnse(201, $res);
});

$app->get('/book_seat/:code/:pnr', function($code, $pnr) {
    $res = array('error' => true, 'message' => 'Unable to book seat');
    $obj = new Common();
    $data = $obj->selectAllCustomFieldsWithWhere('p.base_url, s.endpoint', 'api_providers AS p LEFT JOIN api_bookseat AS s ON s.api_provider_id = p.ID', 'p.status=1');
    if (count($data) > 0) {
        $url = '';
        foreach ($data as $provider) {
            $url = $obj->getReplacedString($provider['endpoint'], array('ticket_code' => $code, 'pnr' => $pnr));
            if ($url != '') {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $provider['base_url'] . $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                $response = curl_exec($ch);
                curl_close($ch);
                $result = json_decode($response);
                if ($result->status == 1) {
                    $res['error'] = false;
                    $res['message'] = 'Seats booked';
                    $res['data'] = $result->data;
                }
            }
        }
    }
    echoRespnse(201, $res);
});

$app->get('/get_user_search', function() {
    $res = array('error' => true, 'message' => 'No data found');
    $obj = new Common();
    $data = $obj->selectAllCustomFieldsWithWhere('s.from_name, s.to_name, u.name, s.created_at', 'user_search AS s LEFT JOIN users AS u ON u.ID = s.user_id', 'u.status=1');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/apply_coupon/:uid/:code', function($uid, $code) {
    $res = array('error' => false, 'message' => 'Invalid coupon code');
    date_default_timezone_set('Asia/Kolkata');
    $obj = new Common();
    $today = date('Y-m-d');
    $data = $obj->selectRowWithWhere('coupons', 'code=\'' . $code . '\' AND \'' . $today . '\' BETWEEN start_date AND end_date');
    if (count($data) > 0) {
        if ($data['max_usage'] > 0) {
            $usage = $obj->selectRowCustomFieldsWithWhere('COUNT(ID) AS count', 'bookings', 'coupon_code=\'' . $code . '\'');
            if ($usage['count'] > $data['max_usage']) {
                $res['message'] = 'Coupon reached maximum usage';
                $res['error'] = true;
            }
        }
        if ($data['usage_user'] > 0) {
            $user = $obj->selectRowCustomFieldsWithWhere('COUNT(ID) AS count', 'bookings', 'coupon_code=\'' . $code . '\' AND user_id=' . $uid);
            if ($user['count'] > $data['usage_user']) {
                $res['message'] = 'Coupon reached maximum usage';
                $res['error'] = true;
            }
        }
        if ($res['error'] == false) {
            $res['message'] = 'Coupon applied successfully';
            $res['data'] = $data;
        }
    } else {
        $res['error'] = true;
    }
    echoRespnse(201, $res);
});

$app->post('/make_payment', function() use ($app) {
    $fields = $app->request->post();
    date_default_timezone_set('Asia/Kolkata');
    $fields['order_id'] = uniqid();
    $res = array('error' => true, 'message' => 'Unable to create hash key');
    $obj = new Common();
    $insert = $obj->insertRecord(array('created_at' => date('Y-m-d H:i:s'), 'detail' => $fields['booking_detail'], 'cancel_term' => $fields['cancellation_term']), 'booking_detail');
    if ($insert > 0) {
        $fields['udf5'] = $insert;
        $data = $obj->selectAllCustomFieldsWithWhere('name, value', 'configs', 'name IN (\'fss_api_key\', \'fss_salt_key\', \'fss_api_key_card\', \'fss_salt_key_card\', \'payment_return_url\', \'payment_mode\')');
        if (count($data) > 0) {
            $res['error'] = false;
            $res['message'] = 'Hash key created';
            $salt = '';
            $hash_columns = ['address_line_1', 'address_line_2', 'amount', 'fss_api_key', 'city', 'country', 'currency', 'description', 'email', 'payment_mode', 'name', 'order_id', 'phone', 'payment_return_url', 'state', 'udf1', 'udf2', 'udf3', 'udf4', 'udf5', 'zip_code'];
            /* if (isset($fields['udf1']) && $fields['udf1'] != '') {
              foreach ($data as $val) {
              if ($val['name'] != 'fss_salt_key' && $val['name'] != 'fss_api_key') {
              if ($val['name'] == 'fss_salt_key_card') {
              $salt = $val['value'];
              } else if ($val['name'] == 'fss_api_key_card') {
              $fields['fss_api_key'] = $val['value'];
              } else {
              $fields[$val['name']] = $val['value'];
              }
              }
              }
              } else { */
            foreach ($data as $val) {
                if ($val['name'] == 'fss_salt_key') {
                    $salt = $val['value'];
                } else {
                    $fields[$val['name']] = $val['value'];
                }
            }
            //}
            foreach ($hash_columns as $column) {
                if (isset($fields[$column])) {
                    if (strlen($fields[$column]) > 0) {
                        $salt .= '|' . trim($fields[$column]);
                    }
                }
            }
            $hash = strtoupper(hash("sha512", $salt));
            $res['data'] = array('hash' => $hash, 'api_key' => $fields['fss_api_key'], 'return_url' => $fields['payment_return_url'], 'mode' => $fields['payment_mode'], 'order_id' => $fields['order_id'], 'udf5' => $insert);
        }
    } else {
        $res['message'] = 'Unable to insert booking details';
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

$app->post('/create_booking', function() use ($app) {
    date_default_timezone_set('Asia/Kolkata');
    $res = array('error' => true);
    $obj = new Common();
    $data = $app->request->post();
    $booking_detail_row = $obj->selectRowWithWhere('booking_detail', 'ID=' . $data['udf5']);
    $booking_detail = json_decode($booking_detail_row['detail']);
    if ($data['response_code'] != 0) {
        $res['message'] = $data['error_desc'];
        $obj->insertRecord(array('transaction_id' => $data['transaction_id'], 'request_data' => json_encode($data), 'user_id' => $data['udf3'], 'reason' => $data['error_desc'], 'response_data' => json_encode($data), 'amt' => $data['amount'], 'created_at' => date('Y-m-d H:i:s')), 'transaction_failed');
    } else {
        $provider = $obj->selectRowWithWhere('api_providers', 'ID=' . $booking_detail->provider);
        $data_provider = $obj->selectRowCustomFieldsWithWhere('p.base_url, \'' . $data['udf4'] . '\' AS udf4, p.name, p.api_key, p.merchent_id, p.user_id, p.password, p.date_format, b.*', 'api_providers AS p LEFT JOIN api_bookseat AS b ON b.api_provider_id = p.ID', 'p.status=1 AND p.ID = ' . $provider['ID']);
        $url = $obj->getReplacedString($data_provider['endpoint'], array('api_key' => $data_provider['api_key'], 'user_id' => $data_provider['user_id'], 'password' => $data_provider['password'], 'ticket_code' => $data['udf4'])); //Replacing bus url values
        if ($data_provider['type'] == 'json') {
            $res = $obj->bookTicketJSONResponse($data_provider, $url, $booking_detail); //the final array
        }
        if ($res['error'] == false) {
            $id = $obj->insertRecord(array('provider_id' => $provider['ID'], 'provider_name' => $provider['name'], 'travels_name' => $booking_detail->selected_travels, 'grand_total' => $data['amount'], 'fare' => $data['udf2'], 'coupon_code' => $data['udf1'], 'credit_amt' => $res['credit_amount'], 'transaction_amt' => $res['transaction_amt'], 'debit_amt' => $res['debit_amt'], 'user_id' => $data['udf3'], 'boarding_name' => $booking_detail->selected_boarding_name, 'dropping_name' => $booking_detail->selected_dropping_name, 'travel_date' => $booking_detail->selected_date, 'no_of_passengers' => count(json_decode($booking_detail->selected_ticket_passengers)), 'transaction_id' => $data['transaction_id'], 'order_code' => $data['udf4'], 'pnr' => $booking_detail->selected_ticket_pnr, 'pnr_agent' => $booking_detail->selected_ticket_pnr, 'pnr_operator' => $res['operator_pnr'], 'bus_type' => $booking_detail->selected_bus_type, 'payment_data' => json_encode($data['transaction_detail']), 'booking_data' => json_encode($booking_detail), 'order_data' => $res['data'], 'status' => 1, 'provider_customer_care' => $provider['customer_care_no'], 'boarding_customer_care' => $booking_detail->selected_boarding_number, 'dropping_customer_care' => $booking_detail->selected_dropping_number, 'coupon_discount_type' => $booking_detail->selected_coupon_type, 'coupon_discount_amt' => $booking_detail->selected_coupon_amt, 'taxes' => $booking_detail->selected_tax, 'notification_email' => $booking_detail->notification_email, 'notification_mobile' => $booking_detail->notification_mobile, 'cancel_term' => $booking_detail_row['cancel_term'], 'created_at' => date('Y-m-d H:i:s')), 'bookings');
            if ($id > 0) {
                $db = new DbHandler();
                $db->addNotification($data, $id, 'create_booking');
                $res['error'] = false;
                $res['message'] = 'Ticket booked successfully order code ' . $data['udf4'];
            } else {
                $res['message'] = 'There was an error with creating your order please contact admin with transaction id ' . $data['transaction_id'];
            }
        } else {
            $res['message'] = $res['message'];
            $obj->insertRecord(array('transaction_id' => $data['transaction_id'], 'request_data' => json_encode($data_provider), 'user_id' => $data['udf3'], 'reason' => $res['message'], 'response_data' => $res['data'], 'amt' => $data['amount'], 'created_at' => date('Y-m-d H:i:s')), 'transaction_failed');
        }
    }
    echoRespnse(201, $res);
});

$app->post('/cancel_ticket', function() use ($app) {
    $res = array('error' => true);
    $obj = new Common();
    $data = $app->request->post();
    $booking = $obj->selectRowWithWhere('bookings', 'order_code=\'' . $data['order_code'] . '\'');
    $data_provider = $obj->selectAllCustomFieldsWithWhere('p.base_url, s.endpoint, s.endpoint_confirm', 'api_providers AS p LEFT JOIN api_cancel AS s ON s.api_provider_id = p.ID', 'p.status=1');
    if (count($data_provider) > 0) {
        $url = '';
        foreach ($data_provider as $row) {
            $url = $obj->getReplacedString($row['endpoint'], array('ticket_code' => $booking['order_code'], 'pnr' => $booking['pnr_agent']));
            $passengers = array();
            $booking_data = json_decode($booking['booking_data']);
            foreach (json_decode($booking_data->selected_ticket_passengers) as $val) {
                array_push($passengers, $val->code);
            }
            $url2 = $obj->getReplacedString($row['endpoint_confirm'], array('ticket_code' => $booking['order_code'], 'pnr' => $booking['pnr_agent'], 'seats' => implode(",", $passengers)));
            if ($url != '') {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $row['base_url'] . $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array('referenceTicketNumber' => $booking['pnr_agent'])));
                $response = curl_exec($ch);
                curl_close($ch);
                $result = json_decode($response);
                if ($result->status == 1) {
                    $cancel_amt = 0;
                    $cancel_fee = 0;
                    $salt = '';
                    foreach ($result->data->ticketDetails as $cancel_row) {
                        $cancel_amt = $cancel_amt + $cancel_row->refundAmount;
                        $cancel_fee = $cancel_fee + $cancel_row->cancellationCharges;
                    }
                    $update_cancel = $obj->updateRecordWithWhere(array('refund_amt' => $cancel_amt, 'cancellation_fee' => $cancel_fee, 'cancel_reason' => $data['reason'], 'cancel_term' => json_encode($result)), 'bookings', 'ID=' . $booking['ID']);
                    if ($update_cancel > 0) {
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $row['base_url'] . $url2);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
                        curl_setopt($ch, CURLOPT_POST, TRUE);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array('referenceTicketNumber' => $booking['pnr_agent'])));
                        $response = curl_exec($ch);
                        curl_close($ch);
                        $result = json_decode($response);
                        if ($result->status == 1) {
                            $obj->updateRecordWithWhere(array('is_cancelled' => 1, 'cancel_response' => json_encode($result)), 'bookings', 'ID=' . $booking['ID']);
                            $payment = $obj->selectAllCustomFieldsWithWhere('name, value', 'configs', 'name IN (\'fss_api_key\', \'fss_salt_key\', \'fss_api_key_card\', \'fss_salt_key_card\', \'payment_return_url\', \'payment_mode\')');
                            $fields = array('reason' => $data['reason'], 'transaction_id' => $booking['transaction_id'], 'amount' => $cancel_amt);
                            if ($booking['coupon_discount_amt'] > 0) {
                                foreach ($payment as $val) {
                                    if ($val['name'] != 'fss_salt_key' && $val['name'] != 'fss_api_key') {
                                        if ($val['name'] == 'fss_salt_key_card') {
                                            $salt = $val['value'];
                                        } else if ($val['name'] == 'fss_api_key_card') {
                                            $fields['fss_api_key'] = $val['value'];
                                        } else {
                                            $fields[$val['name']] = $val['value'];
                                        }
                                    }
                                }
                                if ($booking['coupon_discount_type'] == 'percentage') {
                                    $discount_amt = $cancel_amt * $booking['coupon_discount_amt'] / 100;
                                    $fields['amount'] = $cancel_amt - $discount_amt;
                                } else {
                                    $fields['amount'] = $cancel_amt - $booking['coupon_discount_amt'];
                                }
                            } else {
                                foreach ($payment as $val) {
                                    if ($val['name'] == 'fss_salt_key') {
                                        $salt = $val['value'];
                                    } else {
                                        $fields[$val['name']] = $val['value'];
                                    }
                                }
                            }
                            $hash_columns = ['amount', 'fss_api_key', 'reason', 'transaction_id'];
                            foreach ($hash_columns as $column) {
                                if (isset($fields[$column])) {
                                    if (strlen($fields[$column]) > 0) {
                                        $salt .= '|' . trim($fields[$column]);
                                    }
                                }
                            }
                            $hash = strtoupper(hash("sha512", $salt));
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, 'https://merchant.fsspay.com/v2/refundrequest');
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
                            curl_setopt($ch, CURLOPT_POST, TRUE);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array('amount' => $fields['amount'], 'api_key' => $fields['fss_api_key'], 'description' => $data['reason'], 'transaction_id' => $booking['transaction_id'], 'hash' => $hash)));
                            $response_gateway = curl_exec($ch);
                            curl_close($ch);
                            $result_gateway = json_decode($response_gateway);
                            if (isset($result_gateway->data)) {
                                $update_cancel = $obj->updateRecordWithWhere(array('cancellation_transaction_id' => $result_gateway->data->transaction_id, 'cancellation_transaction_response' => json_encode($result_gateway)), 'bookings', 'ID=' . $booking['ID']);
                                $db = new DbHandler();
                                $db->addNotification($data, $booking['ID'], 'cancel_booking');
                                $res['error'] = false;
                                $res['message'] = 'Ticket cancelled successfully order code ' . $booking['order_code'];
                            } else {
                                $res['message'] = 'Error while cancel your ticket reason ' . $result_gateway->error->message;
                            }
                        } else {
                            $res['message'] = 'Unable to cancel your order reason ' . $result->errorDesc;
                        }
                    } else {
                        $res['message'] = 'Unable to cancel your order';
                    }
                } else {
                    $res['message'] = $result->errorDesc;
                }
            }
        }
    }
    echoRespnse(201, $res);
});

$app->post('/change_password', function() use ($app) {
    $data = $app->request->post();
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to change password');
    $exist = $obj->selectRowWithWhere('users', 'ID = ' . $data['ID']);
    if (count($exist) > 0) {
        if ($exist['password'] == $data['old_password']) {
            $res['error'] = false;
            $res['message'] = 'Password updated successfully';
            $obj->updateRecordWithWhere(array('password' => $data['new_password']), 'users', 'ID=' . $data['ID']);
        } else {
            $res['message'] = 'Current password mismatch';
        }
    } else {
        $res['message'] = 'No user found';
    }
    echoRespnse(201, $res);
});

$app->get('/get_bookings', function() {
    $res = array('error' => true, 'message' => 'No data found');
    $obj = new Common();
    $data = $obj->selectAllCustomFieldsWithWhere('b.*, u.name, u.mobile', 'bookings AS b LEFT JOIN users AS u ON u.ID = b.user_id', 'b.status=1 ORDER BY b.ID DESC');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_ticket/:id', function($id) {
    $res = array('error' => true, 'message' => 'No data found');
    $obj = new DbHandler();
    $data = $obj->addNotification(array(), $id, 'create_booking');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_booking_report/:start/:end/:page', function($start, $end, $page) {
    $res = array('error' => true, 'message' => 'No data found');
    $com = new Common();
    $limit = 10;
    $from = ($page * $limit) - $limit;
    $data = $com->selectAllCustomFieldsWithWhere('b.provider_name, b.travels_name, b.bus_type, b.grand_total, b.fare, b.credit_amt, b.transaction_amt, b.debit_amt, u.name, b.boarding_name, b.dropping_name, b.travel_date, b.no_of_passengers, b.transaction_id, b.order_code, b.pnr, b.pnr_agent, b.created_at', 'bookings AS b LEFT JOIN users AS u ON u.ID = b.user_id', 'b.created_at BETWEEN \'' . $start . '\' AND \'' . $end . '\' LIMIT ' . $from . ',' . $limit);
    if (count($data) > 0) {
        $count = $com->selectRowCustomFieldsWithWhere('COUNT(ID) AS count', 'bookings', 'created_at BETWEEN \'' . $start . '\' AND \'' . $end . '\'');
        $res['error'] = false;
        $res['message'] = 'Data found';
        $res['data'] = $data;
        $res['count'] = $count['count'];
    }
    echoRespnse(201, $res);
});

$app->get('/export_booking_report/:start/:end/:format', function($start, $end, $format) {
    $res = array('error' => true, 'message' => 'Unable to export');
    $com = new Common();
    $data = $com->selectAllCustomFieldsWithWhere('b.provider_name, b.travels_name, b.bus_type, b.grand_total, b.fare, b.credit_amt, b.transaction_amt, b.debit_amt, u.name, b.boarding_name, b.dropping_name, b.travel_date, b.no_of_passengers, b.transaction_id, b.order_code, b.pnr, b.pnr_agent, b.created_at', 'bookings AS b LEFT JOIN users AS u ON u.ID = b.user_id', 'b.created_at BETWEEN \'' . $start . '\' AND \'' . $end . '\'');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        $header = array('Provider', 'Travels', 'Bus Type', 'User', 'Boarding', 'Dropping', 'Travel Date', 'No. of Passengers', 'Transaction ID', 'Order Code', 'PNR', 'Fare', 'Grand Total', 'Credit Amt', 'Transaction Amt', 'Debit Amt', 'Booking Date');
        $keys = array('provider_name', 'travels_name', 'bus_type', 'name', 'boarding_name', 'dropping_name', 'travel_date', 'no_of_passengers', 'transaction_id', 'order_code', 'pnr', 'fare', 'grand_total', 'credit_amt', 'transaction_amt', 'debit_amt', 'created_at');
        $com->exportExcel($header, $data, $keys, 'bookings', 'bookings');
        $res['data'] = IMG_BASE_URL . 'bookings.xlsx';
    }
    echoRespnse(201, $res);
});
