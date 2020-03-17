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
    $data = $com->selectAll('*', 'user', 'user_id > 0 ORDER BY name ASC');
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
// Get user list by role start

$app->get('/get_users_by_role/:role/:uid', function($role, $uid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = null;
    if ($role == 'supervisor') {
        $data = $com->selectAll('*', 'user', 'user_id =' . $uid . ' Or supervisor_id = ' . $uid);
    } else {
        $records = $com->selectAll('u.*, IFNULL(sr.name, \'Other\') AS supervisor', 'user AS u LEFT JOIN user AS sr ON sr.user_id = u.supervisor_id', 'u.user_id > 0 AND u.role != \'supervisor\'');
        if (count($records) > 0) {
            foreach ($records as $row) {
                $data[$row['supervisor']][] = $row;
            }
        }
    }
    if ($data != null) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

// Get user list by role end
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
    $data = $com->selectAll('uv.in_datetime, uv.user_remarksin, uv.user_remarksout, uv.out_datetime, uv.in_temperature, uv.out_temperature, u.name, u.nri_no, u.phone_no, u.company_name, u.image_path', 'user_visit AS uv LEFT JOIN user AS u ON u.user_id = uv.user_id', 'DATE(uv.in_datetime) = \'' . $date . '\'');
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
    $data = $com->selectAll('uv.in_datetime, uv.user_remarksin, uv.user_remarksout, uv.out_datetime, uv.in_temperature, uv.out_temperature, u.name, u.nri_no, u.phone_no, u.company_name, u.image_path', 'user_visit AS uv LEFT JOIN user AS u ON u.user_id = uv.user_id', 'DATE(uv.in_datetime) BETWEEN \'' . $from . '\' AND \'' . $to . '\'');
    if (count($data) > 0) {
        $random = uniqid();
        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Electromech Technologies Pte Ltd');
        $pdf->SetTitle('StaffReport');
        $pdf->SetSubject('Electromech Technologies Pte Ltd');
        $pdf->SetKeywords('Electromech Technologies Pte Ltd');
// set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));
// set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

// ---------------------------------------------------------
// set default font subsetting mode
        $pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
        $pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
        $pdf->AddPage();

// set text shadow effect
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

// Set some content to print
        $html = '<table style="width: 100%; font-size: 12px;" cellspacing="5">'
                . '<tr>'
                . '<th color="#FF0000">Sl. No.</th>'
                . '<th color="#FF0000">Name</th>'
                . '<th color="#FF0000">NRIC No.</th>'
                . '<th color="#FF0000">Phone</th>'
                . '<th color="#FF0000">Company</th>'
                . '<th color="#FF0000">In-Time Temperature</th>'
                . '<th color="#FF0000">In Remark</th>'
                . '<th color="#FF0000">Out-Time Temperature</th>'
                . '<th color="#FF0000">Out Remark</th>'
                . '</tr>';
        foreach ($data as $index => $row) {
            $path = '1.jpg';
            if ($row['image_path'] != '') {
                $path = $row['image_path'];
            }
            if ($row['out_temperature'] == '' || $row['out_temperature'] == null) {
                $html = $html . '<tr>'
                        . '<td>' . ($index + 1) . '</td>'
                        . '<td>' . $row['name'] . '</td>'
                        . '<th>' . $row['nri_no'] . '</th>'
                        . '<td>' . $row['phone_no'] . '</td>'
                        . '<td>' . $row['company_name'] . '</td>'
                        . '<td>' . "<b>" . $row['in_temperature'] . "℃" . "</b>" . "<br/>" . date('d-M-Y H:i:s', strtotime($row['in_datetime'])) . '</td>'
                        . '<td>' . $row['user_remarksin'] . '</td>'
                        . '<td>' . "<b>" . " " . "</b>" . "<br/>" . " " . '</td>'
                        . '<td>' . $row['user_remarksout'] . '</td>'
                        . '</tr>';
            } else {
                $html = $html . '<tr>'
                        . '<td>' . ($index + 1) . '</td>'
                        . '<td>' . $row['name'] . '</td>'
                        . '<th>' . $row['nri_no'] . '</th>'
                        . '<td>' . $row['phone_no'] . '</td>'
                        . '<td>' . $row['company_name'] . '</td>'
                        . '<td>' . "<b>" . $row['in_temperature'] . "℃" . "</b>" . "<br/>" . date('d-M-Y H:i:s', strtotime($row['in_datetime'])) . '</td>'
                        . '<td>' . $row['user_remarksin'] . '</td>'
                        . '<td>' . "<b>" . $row['out_temperature'] . "℃" . "</b>" . "<br/>" . date('d-M-Y H:i:s', strtotime($row['out_datetime'])) . '</td>'
                        . '<td>' . $row['user_remarksout'] . '</td>'
                        . '</tr>';
            }
        }
        $html = $html . '</table>';
// Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
        $pdf->Output('/home/a2dot37r/public_html/corona/v1/uploads/' . $random . '.pdf', 'F');

//============================================================+
// END OF FILE
//============================================================+
        $res['data'] = BASE_URL . 'uploads/' . $random . '.pdf';
        $res['error'] = false;
        $res['message'] = 'Records found';
    }
    echoRespnse(201, $res);
});

// Get visits report by date range end
////////////delete
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

//
//
// Get visits report by date range start

$app->get('/get_unvisit_report/:date', function($date) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('name, nri_no, phone_no, company_name, image_path', 'user', 'user_id NOT IN (SELECT user_id FROM user_visit WHERE DATE(in_datetime) = \'' . $date . '\')');
    if ($data > 0) {
        $res['error'] = false;
        $res['message'] = 'Record deleted successfully';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});
