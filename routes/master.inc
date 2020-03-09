<?php

$app->post('/add_row/:table/:slug', function($table, $slug) use ($app) {
    $fields = $app->request->post();
    $res = array('error' => true, 'message' => 'Unable to insert record');
    $obj = new Common();
    $affected = 0;
    if (isset($fields['$$hashKey'])) {
        unset($fields['$$hashKey']);
    }
    if (isset($fields['ID']) && $fields['ID'] > 0) {
        $affected = $obj->updateRecordWithWhere($fields, $table, 'ID=' . $fields['ID']);
        if ($affected > 0) {
            $db = new DbHandler();
            $res['error'] = false;
            $res['message'] = $slug . ' updated successfully';
        } else {
            $res['message'] = 'Unable to updated ' . $slug;
        }
    } else {
        $affected = $obj->insertRecord($fields, $table);
        if ($affected > 0) {
            $db = new DbHandler();
            $res['error'] = false;
            $res['message'] = $slug . ' added successfully';
        } else {
            $res['message'] = 'Unable to add ' . $slug;
        }
    }
    echoRespnse(201, $res);
});

$app->get('/get_all/:table/:slug', function($table, $slug) {
    $obj = new Common ( );
    $res = array('error' => true, 'message' => 'Unable to get ' . $slug);
    $data = $obj->selectAllWithoutWhere($table);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found in ' . $slug;
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/getcount/:table/:slug/:condition', function($table, $slug, $condition) {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to get ' . $slug);
    if ($condition === 'all') {
        $data = $obj->getallcount($table);
    } else {
        $data = $obj->getallcountwithWhere($table, $condition);
    }
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found in ' . $slug;
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_row/:table/:slug/:condition', function($table, $slug, $condition) {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to get ' . $slug);
    $data = $obj->selectRowWithWhere($table, $condition);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found in ' . $slug;
        $res ['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_all_where/:table/:slug/:condition', function($table, $slug, $condition) {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to get ' . $slug);
    $data = $obj->selectAllWithWhere($table, $condition);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found in ' . $slug;
        $res ['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_specific/:table/:slug/:condition', function ( $table, $slug, $condition) {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to get ' . $slug);
    if ($table == 'configs') {
        $data = $obj->selectAllWithWhere($table, 'name=\'' . $condition . '\'');
    }
    if ($table == 'notification_individual') {
        $data = $obj->selectAllWithWhere($table, 'name=\'' . $condition . '\'');
    }
    if ($table == 'notification_global') {
        $data = $obj->selectAllWithWhere($table, 'class_section_id=\'' . $condition . '\'');
    }
    if ($table == 'students') {
        $data = $obj->selectAllCustomWithoutWhere(array('`st`.*', '`c`.`name` AS `class_name`', '`s`.`name` AS `section_name`'), 'students AS `st` JOIN `class_sections` AS `cs` ON `cs`.`ID` = `st`.`class_section_id` JOIN `classes` AS `c` ON `c`.`ID` = `cs`.`class_id` JOIN `sections` AS `s` ON `s`.`ID` = `cs`.`section_id` WHERE `st`.`mobile` = \'' . $condition . '\'');
    }
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found in ' . $slug;
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->delete('/delete/:table/:id/:slug', function($table, $id, $slug) {
    $obj = new Common ( );
    $res = array('error' => true, 'message' => 'Unable to get delete ' . $slug);
    $data = $obj->deleteRecordWithWhere($table, 'ID=' . $id);
    if ($data > 0) {
        $res['error'] = false;
        $res['message'] = $slug . ' removed successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/import_teachers', function() use($app) {
    $file = $_FILES;
    $res = array('error' => true, 'message' => 'Unable to upload');
    $handle = fopen($file['file']['tmp_name'], "r");
    if (in_array($file['file']['type'], array('application/vnd.ms-excel', 'text/plain', 'text/csv', 'text/tsv', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'))) {
        $first = true;
        $count = 0;
        $obj = new Common();
        $db = new DbHandler();
        while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
            if (!$first) {
                $type = 0;
                if ($row[5] == 'Technicial' || $row[5] == 'technicial') {
                    $type = 1;
                }
                $country = $obj->selectRowWithWhere('countries', 'name=\'' . trim($row[10]) . '\'');
                $state = $obj->selectRowWithWhere('states', 'name=\'' . trim($row[11]) . '\'');
                $district = $obj->selectRowWithWhere('cities', 'name=\'' . trim($row[12]) . '\'');
                $gender = $obj->selectRowWithWhere('gender', 'name=\'' . trim($row[2]) . '\'');
                $roles = array('Super Admin' => 1, 'Admin' => 2);
                $data = array('name' => $row[0], 'image' => $row[15], 'qualification' => $row[3], 'emp_id' => $row[1], 'type' => $type, 'designation' => $row[4], 'gender_id' => $gender['ID'], 'mobile' => $row[6], 'email' => $row[7], 'password' => $row[14], 'address_line1' => $row[8], 'address_line2' => $row[9], 'country_id' => $country['ID'], 'state_id' => $state['ID'], 'city_id' => $district['ID'], 'pincode' => $row[13], 'role_id' => $roles[$row[16]]);
                $insert = $obj->insertRecord($data, 'teachers');
                if ($insert > 0) {
                    $data['table'] = 'teachers';
                    $count = $count + 1;
                    $db->checkForAlertNotification($data, $res);
                }
            } else {
                $first = false;
            }
        }
        if ($count > 0) {
            $res = array('error' => false, 'message' => $count . ' records uploaded');
        }
    } else {
        $res['message'] = 'File format mismatch';
    }
    echoRespnse(201, $res);
});

$app->post('/verifycode', function ( ) use ($app) {
    $res = array('error' => true, 'message' => 'Invalid verification code');
    $data = $app->request->post();
    $obj = new Common();
    $verify = $obj->selectRowWithWhere('students', 'mobile=\'' . $data['mobile'] . '\' AND otp=\'' . $data['otp'] . '\'');
    $obj->updateRecordWithWhere(array('device_token' => $data['device_token']), 'students', 'mobile=\'' . $data['mobile'] . '\'');
    if (count($verify) > 0) {
        $res = array('error' => false, 'message' => 'Verified successfully');
    }
    echoRespnse(201, $res);
});

$app->post('/resendcode', function() use ($app ) {
    $res = array('error' => true, 'message' => 'Unable to send verification code');
    $data = $app->request->post();
    $data['table'] = 'otp';
    $obj = new Common();
    $result = $obj->selectRowWithWhere('students', 'mobile=\'' . $data['mobile'] . '\'');
    if (count($result) > 0) {
        $data['mobile'] = $result['mobile'];
        $data['otp'] = $result['otp'];
        $db = new DbHandler();
        $res = array('error' => false, 'message' => 'Code sent again to your mobile number');
        $db->checkForAlertNotification($data, $res);
    }
    echoRespnse(201, $res);
    return $res;
});

$app->post('/login', function() use($app) {
    $res = array('error' => true, 'message' => 'Mobile number not found');
    $data = $app->request->post();
    $data['table'] = 'otp';
    $obj = new Common();
    $result = $obj->selectRowWithWhere('students', 'mobile=\'' . $data['mobile'] . '\'');
    if (count($result) > 0) {
        $db = new DbHandler();
        $otp = $db->getOTP();
        $obj->updateRecordWithWhere(array('device_token' => $data['device_token'], 'otp' => $otp), 'students', 'mobile=\'' . $data['mobile'] . '\'');
        $data['otp'] = $otp;
        $db->checkForAlertNotification($data, $res);
        $res = array('error' => false, 'message' => 'Mobile number found');
    }
    echoRespnse(201, $res);
    return $res;
});

$app->get('/adminlogin/:uname/:pass', function($uname, $pass) {
    $db = new DbHandler();
    $res = $db->login($uname, $pass);
    echoRespnse(201, $res);
});

$app->get('/adminlogout/:session_id/:teacher_id', function($session_id, $teacher_id) {
    $db = new Common();
    $res = array('error' => true, 'message' => 'Unable to logout');
    $update = $db->updateRecordWithWhere(array('end_at' => date('Y-m-d H:m:i')), 'logins', 'teacher_id=' . $teacher_id . ' AND session_id=\'' . $session_id . '\'');
    if ($update > 0) {
        $res['error'] = false;
        $res['message'] = 'Logout successfully';
    }
    echoRespnse(201, $res);
});

$app->get('/get_balance_fees_to_pay/:fees/:student/:academic', function($fees, $student, $academic) {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Not available');
    $record = $obj->selectRowWithWhere('class_feeses', 'ID=\'' . $fees . '\'');
    if (count($record) > 0) {
        $res['data'] = $record['amount'];
        $res ['error'] = false;
        $res['message'] = 'Records found';
        $data = $obj->selectRowCustomWithWhere(array('fpt.*'), 'fees_paid_terms AS fpt LEFT JOIN fees_paids AS fp ON fp.ID=fpt.fees_paid_id AND fp.student_id = ' . $student . ' AND academic_id=' . $academic, 'fpt.class_fees_id=' . $fees . ' ORDER BY fpt.ID DESC LIMIT 1');
        if (count($data) > 0) {
            if ($data['balance'] > 0) {
                $res['data'] = $data['balance'];
            } else {
                $res['error'] = true;
                $res['message'] = 'Seems student paid this fees';
            }
        }
    }
    echoRespnse(201, $res);
});

$app->post('/add_fees', function() use($app) {
    $data = $app->request->post();
    $obj = new Common();
    $res = array('error' => false, 'message' => 'Unable to add fees');
    $fees = $obj->insertRecord(array('class_name' => $data['class_name'], 'section_name' => $data['section_name'], 'remarks' => $data['remarks'], 'student_id' => $data['student_id'], 'acade mic_id' => $data['academic_id'], 'payment' => $data['payment']), 'fees_paids');
    if ($fees > 0) {
        $res['error'] = false;
        $res['message'] = 'Fees added successfully';
        foreach (json_decode($data['fees_terms']) as $val) {
            $obj->insertRecord(array('fees_paid_id' => $fees, 'class_fees_id' => $val->class_fees_id, 'fees_name' => $val->fees_name, 'fees_amount' => $val->fees_amount, 'amount' => $val->amount, 'discount' => $val->discount, 'term_id' => $val->term_id, 'balance' => ($val->balance - $val->amount)), 'fees_paid_terms');
        }
        $db = new DbHandler();
        $data['fees_paid_id'] = $fees;
        $res['receipt'] = $db->getPaidReceipt($data);
    }
    echoRespnse(201, $res);
});

$app->post('/add_event_images', function() use ($app) {
    $data = $app->request->post();
    $obj = new DbHandler();
    $res = $obj->addEventImage($_FILES['eventimages'], $data);
    echoRespnse(201, $res);
});

$app->get('/get_all_feeses', function() {
    $db = new DbHandler ( );
    $res = $db->getAllFeeses();
    echoRespnse(201, $res);
});

$app->get('/get_gallery', function() {
    $db = new DbHandler();
    $res = $db->getAllEventwithImages();
    echoRespnse(201, $res);
});

$app->get('/get_all_absent/:table/:session', function($table, $session) {
    $obj = new Common();
    $date = date('Y-m-d');
    $where = '`session` = \'' . $session . '\' && `date` =\'' . $date . '\'';
    $exist = $obj->getallcountwithWhere($table, $where);
    echoRespnse(201, $exist);
});

$app->get('/get_all_feeses_by_student/:sid', function($sid) {
    $db = new DbHandler();
    $data = $db->selectAllPaidFeesesByStudent($sid);
    echoRespnse(201, $data);
});

$app->post('/attendance', function() {
    $res = array('error' => true, 'message' => 'No updates found in quantities');
    $data = json_decode(file_get_contents('php://input'), true);
    $obj = new Common ();
    $exist = $obj->selectRowWithWhere('students', 'ID' . '=\'' . $data['student_id'] . '\'');
    $data['date'] = date('Y-m-d');
    if (count($exist) != 0) {
        $result = $obj->insertRecord($data, 'student_attendance');
        if ($result > 0) {
            $res = array('error' => false, 'message' => 'Absent marked for ' . $exist['name'], 'data' => $result);
        }
    }
    echoRespnse(201, $res);
});

$app->get('/get_all_class_details', function() {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'No classes found');
    $classes = $obj->executeSelectAllWithoutWhere('`cs`.`ID` AS `class_section_id`, `c`.`name` AS `class_name`, `s`.`name` AS `section_name`, `cs`.`class_id`, `cs`.`section_id`', '`class_sections` AS `cs` LEFT JOIN `classes` AS `c` ON `c`.`ID` = `cs`.`class_id` LEFT JOIN `sections` AS `s` ON `s`.`ID` = `cs`.`section_id` ORDER BY `c`.`order`, `s`.`order` ASC');
    if (count($classes) > 0) {
        $data = array();
        $res['error'] = false;
        $res['message'] = 'Data found';
        foreach ($classes as $val) {
            $students = $obj->selectAllWithWhere('students', 'class_section_id=' . $val['class_section_id']);
            $timetable = $obj->selectAllWithWhere('time_table', 'class_section_id=' . $val['class_section_id']);
            $subjects = $obj->selectAllWithWhere('class_section_subjects', 'class_section_id=' . $val['class_section_id']);
            $data[$val['class_name']][$val['section_name']]['students'] = $students;
            $data[$val['class_name']][$val['section_name']]['timetable'] = $timetable;
            $data[$val['class_name']][$val['section_name']]['subjects'] = $subjects;
            $data[$val['class_name']][$val['section_name']]['class_section_id'] = $val['class_section_id'];
        }
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_students_by_class_section/:cid/:sid/:page/:qry', function($cid, $sid, $page, $qry) {
    $obj = new Common();
    $limit = 10;
    $from = ($page * $limit) - $limit;
    $to = $limit;
    $search = '';
    if (isset($qry) && $qry != 'null') {
        $search = ' AND `s`.`name` LIKE \'%' . $qry . '%\'';
    }
    $res = array('error' => true, 'message' => 'Unable to get students');
    $data = $obj->executeSelectAllWithWhere('`s`.*', '`students` AS `s`', '`s`.`class_id` = ' . $cid . ' AND `s`.`section_id`=' . $sid . $search . ' LIMIT ' . $from . ', ' . $to);
    $records = $obj->executeSelectRowWithWhere('COUNT(`s`.`ID`) AS count', '`students` AS `s`', '`s`.`class_id` = ' . $cid . $search . ' AND `s`.`section_id`=' . $sid);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Students fetched successfully';
        $res['data'] = $data;
        $res['records'] = $records['count'];
    }
    echoRespnse(201, $res);
});

$app->get('/get_tc_issued_students/:page/:qry', function($page, $qry) {
    $obj = new Common();
    $limit = 10;
    $from = ($page * $limit) - $limit;
    $to = $limit;
    $search = '';
    if (isset($qry) && $qry != 'null') {
        $search = ' AND `s`.`name` LIKE \'%' . $qry . '%\'';
    }
    $res = array('error' => true, 'message' => 'Unable to get students');
    $data = $obj->executeSelectAllWithWhere('`s`.*', '`students` AS `s`', '`s`.`tc_issued` = 1' . $search . ' LIMIT ' . $from . ', ' . $to);
    $records = $obj->executeSelectRowWithWhere('COUNT(`s`.`ID`) AS count', '`students` AS `s`', '`s`.`tc_issued` = 1' . $search);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Students fetched successfully';
        $res['data'] = $data;
        $res['records'] = $records['count'];
    }
    echoRespnse(201, $res);
});

$app->get('/get_staffs/:did/:page/:qry', function($did, $page, $qry) {
    $obj = new Common();
    $limit = 10;
    $from = ($page * $limit) - $limit;
    $to = $limit;
    $search = '';
    if (isset($qry) && $qry != 'null') {
        $search = ' AND `s`.`name` LIKE \'%' . $qry . '%\'';
    }
    $res = array('error' => true, 'message' => 'Unable to get students');
    $data = $obj->executeSelectAllWithWhere('`s`.*', '`staffs` AS `s`', '`s`.`designition_id` = ' . $did . $search . ' LIMIT ' . $from . ', ' . $to);
    $records = $obj->executeSelectRowWithWhere('COUNT(`s`.`ID`) AS count', '`staffs` AS `s`', '`s`.`designition_id` = ' . $did . $search);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Staffs fetched successfully';
        $res['data'] = $data;
        $res['records'] = $records['count'];
    }
    echoRespnse(201, $res);
});

$app->get('/get_student_by_id_for_tc/:sid', function($sid) {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to get students');
    $data = $obj->executeSelectRowWithWhere('`s`.*, `g`.`name` AS `gender`, `c`.`name` AS `cast`, `cl`.`name` AS `class`, `cl`.`tc_format` AS `format`, `se`.`name` AS `section`, `r`.`name` AS `religion`, `gr`.`name` AS `group`', '`students` AS `s` LEFT JOIN `genders` AS `g` ON `g`.`ID` = `s`.`gender_id` LEFT JOIN `casts` AS `c` ON `c`.`ID` = `s`.`cast_id` LEFT JOIN `classes` AS `cl` ON `cl`.`ID` = `s`.`class_id` LEFT JOIN `sections` AS `se` ON `se`.`ID` = `s`.`section_id` LEFT JOIN `religions` AS `r` ON `r`.`ID` = `s`.`religion_id` LEFT JOIN `groups` AS `gr` ON `gr`.`ID` = `s`.`group_id`', '`s`.`ID` = ' . $sid);
    if (count($data) > 0) {
        $data['school_no'] = '';
        $data['school_reg_no'] = '';
        $data['emis1'] = '';
        $data['emis2'] = '';
        $data['emis3'] = '';
        $data['emis4'] = '';
        $data['emis5'] = '';
        $data['emis6'] = '';
        $data['emis7'] = '';
        $data['emis8'] = '';
        $data['emis9'] = '';
        $data['emis10'] = '';
        $data['emis11'] = '';
        $data['emis12'] = '';
        $data['emis13'] = '';
        $data['emis14'] = '';
        $data['emis15'] = '';
        $data['emis16'] = '';
        $data['emis17'] = '';
        $data['emis18'] = '';
        $data['aadhar1'] = '';
        $data['aadhar2'] = '';
        $data['aadhar3'] = '';
        $data['aadhar4'] = '';
        $data['aadhar5'] = '';
        $data['aadhar6'] = '';
        $data['aadhar7'] = '';
        $data['aadhar8'] = '';
        $data['aadhar9'] = '';
        $data['aadhar10'] = '';
        $data['aadhar11'] = '';
        $data['aadhar12'] = '';
        $data['sl_no'] = '';
        $data['name_tamil'] = '';
        $data['mother_name'] = '';
        $data['BC'] = '-';
        $data['MBC'] = '-';
        $data['SC'] = '-';
        $data['dob_figures'] = '';
        $data['personal_mark1'] = '';
        $data['personal_mark2'] = '';
        $data['class_words'] = '';
        $data['qualified_higher'] = '';
        $data['scholoarship'] = '';
        $data['medical_inspection'] = '';
        $data['left_date'] = '';
        $data['conduct'] = '';
        $data['due_paid'] = '';
        $data['academic_year'] = '';
        $data['first_language'] = 'English';
        $data['second_language'] = 'English';
        $data['academic_year_row2'] = '';
        $data['class_row2'] = '';
        $data['first_language_row2'] = '';
        $data['second_language_row2'] = '';
        $data['academic_year_row3'] = '';
        $data['class_row3'] = '';
        $data['first_language_row3'] = '';
        $data['second_language_row3'] = '';
        $data['school_tmr_no'] = '';
        $data['general_education'] = '';
        $data['h_s_class'] = '';
        $data['vocational_education'] = '';
        $data['language_offered'] = '';
        $data['doj_words'] = '';
        $data['medium_study'] = '';
        if (isset($data['doj'])) {
            $data['doj'] = date('d-m-Y', strtotime($data['doj']));
        }
        if (isset($data['dob'])) {
            $data['dob'] = date('d-m-Y', strtotime($data['dob']));
        }
        if ($data['cast'] == 'SC' || $data['cast'] == 'ST') {
            $data['SC'] = $data['cast'];
        }
        if ($data['cast'] == 'BC' || $data['cast'] == 'BCM') {
            $data['BC'] = $data['cast'];
        }
        if ($data['cast'] == 'MBC') {
            $data['MBC'] = $data['cast'];
        }
        $res['error'] = false;
        $res['message'] = 'Students fetched successfully';
        $data['left_date'] = date('d-m-Y');
        $data['tc_made'] = date('d-m-Y');
        $data['tc_made2'] = date('d-m-Y');
        $data['date'] = date('d-m-Y');
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_sections_by_class/:cid', function($cid) {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to get sections');
    $data = $obj->executeSelectAllWithWhere('`cs`.`ID`, `cs`.`section_id`, `cs`.`class_id`, `s`.`name`', '`class_section` AS `cs` LEFT JOIN `sections` AS `s` ON `s`.`ID` = `cs`.`section_id`', '`cs`.`class_id` = ' . $cid . ' ORDER BY `s`.`name` ASC');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Sections fetched successfully';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_exam_details', function() {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'No classes found');
    $classes = $obj->selectAllCustomWithoutWhere(array('name', 'ID'), 'classes');
    if (count($classes) > 0) {
        $data = array();
        $res['error'] = false;
        $res['message'] = 'Data found';
        foreach ($classes as $val) {
            $data[$val['name']]['class_id'] = $val['ID'];
            $data[$val['name']]['exams'] = [];
            $exams = $obj->selectAllWithWhere('exams', 'class_id=' . $val['ID']);
            if (count($exams) > 0) {
                foreach ($exams as $key => $exam) {
                    $dates = $obj->selectAllWithWhere('exam_dates', 'exam_id=' . $exam['ID'] . ' ORDER BY schedule_date ASC');
                    $exams[$key]['dates'] = $dates;
                }
                $data[$val['name']]['exams'] = $exams;
            }
        }
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->post('/add_exam_dates', function() use($app) {
    $res = array('error' => true, 'message' => 'Technical error');
    $data = $app->request->post();
    $obj = new Common();
    $inserted = 0;
    foreach (json_decode($data['exams']) as $val) {
        $dateformated = $val->schedule_date;
        $newdate = date('Y-m-d H:i:s', strtotime($dateformated));
        $insert = $obj->insertRecord(array('exam_id' => $data['exam_id'], 'name' => $val->name, 'schedule_date' => $newdate, 'start_time' => $val->start_time, 'end_time' => $val->end_time), 'exam_dates');
        if ($insert > 0) {
            $inserted = $inserted + 1;
        }
    }
    if ($inserted > 0) {
        $res['error'] = false;
        $res['message'] = $inserted . ' dates added successfully';
    }
    echoRespnse(201, $res);
    return $res;
});

$app->post('/add_student_marks', function() use($app) {
    $res = array('error' => true, 'message' => 'Mobile number not found');
    $data = $app->request->post();
    $obj = new Common();
    $inserted = 0;
    foreach (json_decode($data['students']) as $val) {
        $insert = $obj->insertRecord(array('exam_id' => $data['exam_id'], 'subject' => $data['subject'], 'mark' => $val->mark, 'outof' => $data['outof'], 'student_id' => $val->ID, 'subject_teacher_name' => $data['subject_teacher_name'], 'conducted_on' => $data['conducted_on'], 'start_time' => $data['start_time'], 'end_time' => $data['end_time'], 'exam_name' => $data['exam_name'], 'class' => $data['class'], 'section' => $data['section'], 'class_section_id' => $data['class_section_id']), 'student_marks');
        if ($insert > 0) {
            $inserted = $inserted + 1;
        }
    }
    if ($inserted > 0) {
        $res['error'] = false;
        $res['message'] = $inserted . ' datas added successfully';
    }
    echoRespnse(201, $res);
    return $res;
});

$app->get('/get_individual_attendances/:table/:sid', function($table, $sid) {
    $obj = new Common();
    $where = 'student_id = ' . $sid;
    $data = $obj->selectAllWithWhere($table, $where);
    echoRespnse(201, $data);
});

$app->get('/get_student_exam_details/:student', function($student) {
    $response = array('error' => true, 'message' => 'No data found');
    $obj = new Common();
    $data = $obj->executeSelectRowWithWhere('`s`.`name`, `s`.`father_name`, `s`.`mother_name`, `s`.`ID`, `s`.`gaurdian_name`, `s`.`mobile`, `s`.`class_section_id`, `c`.`name` AS `class_name`, `se`.`name` AS `section_name`, `t`.`name` AS `teacher_name`', '`students` AS `s` LEFT JOIN `class_sections` AS `cs` ON `cs`.`ID` = `s`.`class_section_id` LEFT JOIN `classes` AS `c` ON `c`.`ID` = `cs`.`class_id` LEFT JOIN `sections` AS `se` ON `se`.`ID` = `cs`.`section_id` LEFT JOIN `teachers` AS `t` ON `t`.`ID` = `cs`.`class_teacher_id`', '`s`.`ID`=' . $student);
    if (count($data) > 0) {
        $response['error'] = false;
        $response['message'] = 'Data found';
        $response['data'] = $data;
        $response['data']['exams'] = null;
        $exam_data = array();
        $exams = $obj->executeSelectAllWithWhere('`sm`.*, `mg`.`remark`, `mg`.`grade_name`', '`student_marks` AS `sm` LEFT JOIN `student_mark_grade` AS `mg` ON `mg`.`exam_id` = `sm`.`exam_id` AND `mg`.`student_id` = `sm`.`student_id`', '`sm`.`class_section_id`=' . $data['class_section_id'] . ' AND `sm`.`student_id`=' . $data['ID']);
        if (count($exams) > 0) {
            foreach ($exams as $exam) {
                $exam_data[$exam['exam_name']][] = $exam;
            }
            $response['data']['exams'] = $exam_data;
        }
    }
    echoRespnse(201, $response);
});

$app->post('/student_exam_remark', function() use($app) {
    $res = array('error' => true, 'message' => 'Unable to update remark');
    $data = $app->request->post();
    $obj = new Common();
    $exist = $obj->selectRowWithWhere('student_mark_grade', '`exam_id`=' . $data['exam_id'] . ' AND `student_id`=' . $data['student_id'] . ' AND `class_section_id`=' . $data['class_section_id']);
    if (count($exist) > 0) {
        $updated = $obj->updateRecordWithWhere(array('remark' => $data['remark']), 'student_mark_grade', '`exam_id`=' . $data['exam_id'] . ' AND `student_id`=' . $data['student_id'] . ' AND `class_section_id`=' . $data['class_section_id']);
        if ($updated > 0) {
            $res['error'] = false;
            $res['message'] = 'Updated successfully';
        }
    } else {
        $updated = $obj->insertRecord(array('remark' => $data['remark'], 'exam_id' => $data['exam_id'], 'student_id' => $data['student_id'], 'class_section_id' => $data['class_section_id']), 'student_mark_grade');
        if ($updated > 0) {
            $res['error'] = false;
            $res['message'] = 'Updated successfully';
        }
    }
    echoRespnse(201, $res);
    return $res;
});

$app->post('/student_exam_grade', function() use($app) {
    $res = array('error' => true, 'message' => 'Unable to update grade');
    $data = $app->request->post();
    $obj = new Common();
    $exist = $obj->selectRowWithWhere('student_mark_grade', '`exam_id`=' . $data['exam_id'] . ' AND `student_id`=' . $data['student_id'] . ' AND `class_section_id`=' . $data['class_section_id']);
    $avg = $obj->executeSelectRowWithWhere('SUM(`mark`)/COUNT(DISTINCT ID) AS avg', 'student_marks', '`exam_id`=' . $data['exam_id'] . ' AND `student_id`=' . $data['student_id'] . ' AND `class_section_id`=' . $data['class_section_id']);
    $average = $avg['avg'];
    $grade = $obj->selectRowWithWhere('grads', $average . ' BETWEEN `min_mark` AND `max_mark`');
    $grade_name = $grade['name'];
    $grade_id = $grade['ID'];
    if (count($exist) > 0) {
        $updated = $obj->updateRecordWithWhere(array('grade_name' => $grade_name, 'grade_id' => $grade_id), 'student_mark_grade', '`exam_id`=' . $data['exam_id'] . ' AND `student_id`=' . $data['student_id'] . ' AND `class_section_id`=' . $data['class_section_id']);
        if ($updated > 0) {
            $res['error'] = false;
            $res['message'] = 'Updated successfully';
        }
    } else {
        $updated = $obj->insertRecord(array('grade_name' => $grade_name, 'grade_id' => $grade_id, 'exam_id' => $data['exam_id'], 'student_id' => $data['student_id'], 'class_section_id' => $data['class_section_id'], 'class' => $data['class'], 'section' => $data['section'], 'class_teacher' => $data['class_teacher']), 'student_mark_grade');
        if ($updated > 0) {
            $res['error'] = false;
            $res['message'] = 'Updated successfully';
        }
    }
    echoRespnse(201, $res);
    return $res;
});

$app->get('/get_individual_notification/:student_id/:class_section_id', function($student_id, $class_section_id) {
    $db = new DbHandler();
    $res = $db->getAllNotifications($student_id, $class_section_id);
    echoRespnse(201, $res);
});

$app->get('/get_sections_by_classsection/:csid', function($csid) {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'No classes found');
    $classes = $obj->executeSelectAllWithWhere('`cs`.`ID` AS `class_section_id`, `c`.`name` AS `class_name`, `s`.`name` AS `section_name`, `cs`.`class_id`, `cs`.`section_id`', '`class_sections` AS `cs` LEFT JOIN `classes` AS `c` ON `c`.`ID` = `cs`.`class_id` LEFT JOIN `sections` AS `s` ON `s`.`ID` = `cs`.`section_id`', '`cs`.`ID` != ' . $csid);
    if (count($classes) > 0) {
        $res['error'] = false;
        $res['message'] = 'Data found';
        $res['data'] = $classes;
    }
    echoRespnse(201, $res);
});

$app->post('/change_student_section', function() use ($app) {
    $obj = new Common();
    $data = $app->request->post();
    $res = array('error' => true, 'message' => 'Unable to update teacher');
    $update = $obj->updateRecordWithWhere(array('class_section_id' => $data['class_section_id']), 'students', 'ID IN(' . $data['students'] . ')');
    if ($update > 0) {
        $db = new DbHandler();
        $db->checkForAlertNotification(array('ID' => $data['students'], 'table' => 'change_class', 'class_name' => $data['class_name'], 'section_name' => $data['section_name']), $res);
        $res['error'] = false;
        $res['message'] = 'Class updated successfully';
    }
    echoRespnse(201, $res);
});

$app->get('/export_exam_marks/:csid', function($csid) {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to export marks');
    $marks = $obj->executeSelectAllWithWhere('`sm`.*, `smg`.`grade_name`, `smg`.`remark`, `s`.`name` AS `student_name`', '`student_marks` AS `sm` LEFT JOIN `student_mark_grade` AS `smg` ON `smg`.`exam_id` = `sm`.`exam_id` AND `smg`.`student_id` = `sm`.`student_id` LEFT JOIN `students` AS `s` ON `s`.`ID` = `sm`.`student_id`', '`sm`.`class_section_id` = ' . $csid);
    if (count($marks) > 0) {
        $res['error'] = false;
        $student_index = 0;
        $data = array();
        $subjects = array();
        foreach ($marks as $row) {
            if (isset($subjects[$row['exam_name']])) {
                if (!in_array($row['subject'], $subjects[$row['exam_name']])) {
                    $subjects[$row['exam_name']][] = $row['subject'];
                }
            } else {
                $subjects[$row['exam_name']][] = $row['subject'];
            }
            if (isset($data[$row['exam_name']])) {
                if (!in_array($row['student_name'], $data[$row['exam_name']]['students'])) {
                    $data[$row['exam_name']]['students'][] = $row['student_name'];
                }
            } else {
                $data[$row['exam_name']]['students'][] = $row['student_name'];
            }
            $data[$row['exam_name']][$row['student_name']][$row['subject']] = $row;
        }
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        require_once '../include/PHPExcel.php';
        $objPHPExcel = new PHPExcel();
        $range = range('A', 'Z');
        $objPHPExcel->getProperties()->setCreator("4BLOCKS Inc.")->setLastModifiedBy("4BLOCKS Inc.")->setTitle("Report")->setSubject("Report")->setDescription("Report")->setKeywords("Report")->setCategory("Report");
        $active_index = 0;
        foreach ($subjects as $key => $val) {
            $objPHPExcel->createSheet();
            $objPHPExcel->setActiveSheetIndex($active_index)->setCellValue('A1', 'SL. No.')->setCellValue('B1', 'Name');
            foreach ($val as $index => $sub) {
                $objPHPExcel->setActiveSheetIndex($active_index)->setCellValue($range[$index + 2] . '1', $sub);
            }
            $objPHPExcel->setActiveSheetIndex($active_index)->setCellValue($range[count($val) + 2] . '1', 'Grade');
            $objPHPExcel->setActiveSheetIndex($active_index)->setCellValue($range[count($val) + 3] . '1', 'Remark');
            foreach ($data[$key]['students'] as $ind => $student) {
                $objPHPExcel->setActiveSheetIndex($active_index)->setCellValue($range[0] . ($ind + 2), ($ind + 1))->setCellValue($range[1] . ($ind + 2), $student);
                $grade = '';
                $remark = '';
                foreach ($val as $index => $sub) {
                    if (isset($data[$key][$student][$sub])) {
                        $grade = $data[$key][$student][$sub]['grade_name'];
                        $remark = $data[$key][$student][$sub]['remark'];
                        $objPHPExcel->setActiveSheetIndex($active_index)->setCellValue($range[$index + 2] . ($student_index + 2), $data[$key][$student][$sub]['mark']);
                    } else {
                        $objPHPExcel->setActiveSheetIndex($active_index)->setCellValue($range[$index + 2] . ($student_index + 2), 'N/A');
                    }
                }
                $objPHPExcel->setActiveSheetIndex($active_index)->setCellValue($range[count($val) + 2] . ($student_index + 2), $grade);
                $objPHPExcel->setActiveSheetIndex($active_index)->setCellValue($range[count($val) + 3] . ($student_index + 2), $remark);
                $student_index = $student_index + 1;
            }
            $objPHPExcel->getActiveSheet()->setTitle($key);
            $active_index = $active_index + 1;
        }
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="markdetails.xlsx"');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('markdetails.xlsx');
        $res['data'] = IMG_BASE_URL . 'markdetails.xlsx';
        $res['message'] = 'Data exported successfully';
    } else {
        $res['message'] = 'No exames found';
    }
    echoRespnse(201, $res);
});

$app->get('/students_report/:class/:category', function($cls, $cat) {
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to get students');
    $where = 'ID > 0';
    if ($cls != 0) {
        $where = $where . ' AND class_section_id IN (' . implode(',', $cls) . ')';
    }
    if ($cat != 0) {
        $where = $where . ' AND type IN (' . implode(',', $cat) . ')';
    }
    $records = $obj->executeSelectAllWithWhere('`name`, `image`, `dob`', 'students', $where);
    if (count($records) > 0) {
        $res['error'] = false;
        $res['data'] = $records;
        $res['message'] = 'Data fetch successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/generate_payroll', function() use ($app) {
    $data = $app->request->post();
    $upload = $_FILES;
    $db = new DbHandler();
    $res = $db->generatePayroll($upload, $data);
    echoRespnse(201, $res);
});

$app->get('/get_designation_configs/:id', function($id) {
    $com = new Common();
    $res = array('error' => false, 'message' => 'Unablet to get data', 'data' => array('max_intime' => '', 'working_days' => [], 'allowable_leave' => ''));
    $other = $com->executeSelectRowWithWhere('pc.leave_allowable, pc.in_time', 'payroll_configs AS pc', 'pc.designition_id=' . $id);
    $working = $com->executeSelectAllWithWhere('wd.ID, wd.working_days, y.name AS year_name, m.name AS month_name', 'working_days AS wd LEFT JOIN months AS m ON m.ID = wd.month_id LEFT JOIN years AS y ON y.ID = wd.year_id', 'wd.designition_id=' . $id);
    if (count($other) > 0) {
        $res['data']['max_intime'] = $other['in_time'];
        $res['data']['allowable_leave'] = $other['leave_allowable'];
    }
    if (count($working) > 0) {
        $res['data']['working_days'] = $working;
    }
    echoRespnse(201, $res);
});

$app->get('/get_payroll_history/:yid/:mid', function($yid, $mid) {
    $com = new Common();
    $res = array('error' => true, 'message' => 'Unablet to get data');
    $data = $com->executeSelectAllWithWhere('*', 'payroll_history', 'year_id = ' . $yid . ' AND month_id = ' . $mid);
    if (count($data) > 0) {
        $addons = array();
        foreach ($data as $key => $row) {
            $addons = $com->executeSelectAllWithWhere('*', 'payroll_history_addons', 'payroll_history_id = ' . $row['ID']);
            $data[$key]['addons'] = $addons;
        }
        $res['error'] = false;
        $res['message'] = 'Data fetched successfully';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->post('/save_payroll', function() use ($app) {
    $fields = json_decode($app->request->post('data'));
    $res = array('error' => true, 'message' => 'Unable to insert record');
    $obj = new Common();
    $affected = 0;
    $month = $fields[0]->month_id;
    $year = $fields[0]->year_id;
    $obj->deleteRecordWithWhere('payroll_history', 'month_id=' . $month . ' AND year_id=' . $year);
    foreach ($fields as $row) {
        $history = array('name' => $row->name, 'designition' => $row->designition, 'emp_code' => $row->emp_code, 'total_working_days' => $row->working_days, 'max_in_time' => $row->in_time, 'absents' => $row->absent, 'presents' => $row->present, 'total' => $row->monthly_salary, 'lop' => $row->lop, 'leave_allowable' => $row->leave_allowable, 'late' => $row->late, 'payable' => $row->grand_total, 'month_id' => $row->month_id, 'year_id' => $row->year_id, 'month_name' => $row->month_name, 'year_name' => $row->year_name);
        $affected = $obj->insertRecord($history, 'payroll_history');
        $adds = $row->addons;
        if ($affected > 0 && count($adds) > 0) {
            foreach ($adds as $r) {
                $history_addons = array('payroll_history_id' => $affected, 'type' => $r->type, 'reason' => $r->reason, 'amt' => $r->amt);
                $obj->insertRecord($history_addons, 'payroll_history_addons');
            }
        }
    }
    if ($affected > 0) {
        $res['error'] = false;
        $res['message'] = 'Payroll saved successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/import_students', function() use ($app) {
    $upload = $_FILES;
    $db = new DbHandler();
    $res = $db->importStudents($upload);
    echoRespnse(201, $res);
});

$app->post('/issue_tc', function() use ($app) {
    $fields = $app->request->post();
    $res = array('error' => true, 'message' => 'Unable to generate TC');
    $obj = new DbHandler();
    $tc = $obj->issueTcToStudent($fields);
    if ($tc['error'] == false) {
        $res['error'] = false;
        $res['message'] = 'TC issued successfully';
        $res['data'] = $tc['data'];
    }
    echoRespnse(201, $res);
});

$app->post('/add_history_addon', function() use($app) {
    $data = $app->request->post();
    $res = array('error' => true, 'message' => 'Unable to add addon');
    $com = new Common();
    $insert = $com->insertRecord($data, 'payroll_history_addons');
    if ($insert > 0) {
        $total = 0;
        $history = $com->selectRowWithWhere('payroll_history', 'ID=' . $data['payroll_history_id']);
        if ($data['type'] == 'debit') {
            $total = $history['payable'] - $data['amt'];
        }
        if ($data['type'] == 'credit') {
            $total = $history['payable'] + $data['amt'];
        }
        $com->updateRecordWithWhere(array('payable' => $total), 'payroll_history', 'ID=' . $data['payroll_history_id']);
        $res['error'] = false;
        $res['message'] = 'Adjustment added successfully';
        $res['data'] = $com->selectRowWithWhere('payroll_history_addons', 'ID=' . $insert);
    }
    echoRespnse(201, $res);
});

$app->delete('/add_history_addon/:id', function($id) {
    $obj = new Common ( );
    $res = array('error' => true, 'message' => 'Unable to get delete addon');
    $record = $obj->selectRowWithWhere('payroll_history_addons', 'ID=' . $id);
    $delete = $obj->deleteRecordWithWhere('payroll_history_addons', 'ID=' . $id);
    if ($delete > 0) {
        $total = 0;
        $history = $obj->selectRowWithWhere('payroll_history', 'ID=' . $record['payroll_history_id']);
        if ($record['type'] == 'debit') {
            $total = $history['payable'] + $record['amt'];
        }
        if ($record['type'] == 'credit') {
            $total = $history['payable'] - $record['amt'];
        }
        $obj->updateRecordWithWhere(array('payable' => $total), 'payroll_history', 'ID=' . $record['payroll_history_id']);
        $res['error'] = false;
        $res['message'] = 'Adjustment removed successfully';
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
