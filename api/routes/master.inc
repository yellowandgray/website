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

$app->post('/loginstudent', function() use ($app) {
    $res = array('error' => true, 'message' => 'Invalid login details');
    $data = $app->request->post();
    $obj = new Common();
    $record = $obj->selectRow('*', 'student_register', 'user_name=\'' . $data['user_name'] . '\'');
    if (count($record) > 0) {
        if ($data['password'] == $record['password']) {
            $res['error'] = false;
            $_SESSION['student_register_id'] = $record['student_register_id'];
            $res['message'] = 'Welcome ' . $record['student_name'];
            $res['data'] = $record;
        } else {
            $res['message'] = 'Username or Password mismatch';
        }
    }
    echoRespnse(201, $res);
});

$app->post('/logout_student', function() use ($app) {
    $res = array('error' => false, 'message' => 'No user found in this email id');
    session_destroy();
    echoRespnse(201, $res);
});

$app->post('/insert_student', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    if (!isset($data['profile_picture'])) {
        $data['profile_image'] = '';
    }
    $record = $com->insertRecord(array('user_name' => $data['user_name'], 'student_name' => $data['student_name'], 'profile_image' => $data['profile_picture'], 'gender' => $data['gender'], 'parent_name' => $data['parent_name'], 'mobile' => $data['mobile'], 'city' => $data['city'], 'pin' => $data['pin'], 'school_name' => $data['school_name'], 'standard' => $data['standard'], 'email' => $data['email'], 'password' => $data['password'], 'confirm_password' => $data['confirm_password']), 'student_register');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_subject', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name' => $data['name'], 'description' => $data['description'], 'image_path' => $data['subject_image']), 'subject');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_chapter', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name' => $data['name'], 'subject_id' => $data['subject_id'], 'description' => $data['description']), 'chapter');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_topic', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name' => $data['name'], 'chapter_id' => $data['chapter_id'], 'description' => $data['description']), 'topic');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_question', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('difficult_id' => $data['difficult_id'], 'topic_id' => $data['topic_id'], 'name' => $data['name'], 'question_no' => $data['question_no'], 'direction' => $data['direction'], 'image_path' => $data['image_path'], 'a' => $data['a'], 'b' => $data['b'], 'c' => $data['c'], 'd' => $data['d'], 'answer' => $data['answer']), 'question');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_difficult', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name' => $data['title'], 'description' => $data['description']), 'difficult');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});


$app->get('/get_subject', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'subject', 'subject_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_topic', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'topic', 'topic_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_topic_by_chapter/:cid', function($cid) {
    $res = array('error' => true, 'message' => 'No records found');
    $obj = new Common();
    $data = $obj->selectAll('*', 'topic', 'chapter_id = ' . $cid);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_student', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'student_register', 'student_register_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_question', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'question', 'question_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_question_by_topic/:tid', function($tid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'question', 'question_id > 0 AND topic_id = ' . $tid .' ORDER BY question_id ASC LIMIT 10');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_year', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'year', 'year_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_chapter_by_subject/:sid', function($sid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'chapter', 'subject_id = ' . $sid);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_difficult', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'difficult', 'difficult_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});


$app->post('/import_question', function() use($app) {
    $file = $_FILES;
    $res = array('error' => true, 'message' => 'Unable to upload');
    $handle = fopen($file['file']['tmp_name'], "r");
    if (in_array($file['file']['type'], array('application/vnd.ms-excel', 'text/plain', 'text/csv', 'text/tsv', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'))) {
        $first = true;
        $count = 0;
        $obj = new Common();
        while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
            if (!$first) {
                $language = $obj->selectRow('*', 'language', 'name=\'' . trim($row[0]) . '\'');
                if (count($language) == 0) {
                    $lid = $obj->insertRecord(array('name' => trim($row[0]), 'status' => 1, 'created_by' => 1, 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')), 'language');
                } else {
                    $lid = $language['language_id'];
                }
                $year = $obj->selectRow('*', 'year', 'year=\'' . trim($row[1]) . '\'');
                if (count($year) == 0) {
                    $yid = $obj->insertRecord(array('year' => trim($row[1]), 'status' => 1, 'created_by' => 1, 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')), 'year');
                } else {
                    $yid = $year['year_id'];
                }
                $topic = $obj->selectRow('*', 'topic', 'name=\'' . trim($row[2]) . '\' AND language_id = ' . $lid . ' AND year_id = ' . $yid);
                if (count($topic) == 0) {
                    $tid = $obj->insertRecord(array('name' => trim($row[2]), 'language_id' => $lid, 'year_id' => $yid, 'created_by' => 1, 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')), 'topic');
                } else {
                    $tid = $topic['topic_id'];
                }
                $qnoqry = $obj->selectRow('IFNULL(MAX(question_no), 0) AS max_no', 'question', 'topic_id=' . $tid);
                $qno = $qnoqry['max_no'];
                $data = array('topic_id' => $tid, 'name' => $row[3], 'a' => $row[4], 'b' => $row[5], 'c' => $row[6], 'd' => $row[6], 'answer' => $row[7], 'question_no' => ($qno + 1), 'created_by' => 1, 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'));
                $insert = $obj->insertRecord($data, 'question');
                if ($insert > 0) {
                    $count++;
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
        $res['imageUrl'] = $data;
        $res['extension'] = $obj->getExtension($data);
    }
    return $res;
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

