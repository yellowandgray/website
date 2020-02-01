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
    $record = $com->insertRecord(array('name' => $data['name'], 'subject_id' => $data['subject_id']), 'chapter');
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
    $record = $com->insertRecord(array('name' => $data['name'], 'chapter_id' => $data['chapter_id']), 'topic');
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
    $record = $com->insertRecord(array('name' => $data['name']), 'difficult');
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
    $data = $obj->selectAll('*', 'topic', 'chapter_id = ' . $cid . ' ORDER BY name ASC');
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
    $data = $com->selectAll('*', 'question', 'question_id > 0 AND topic_id = ' . $tid . ' ORDER BY question_id ASC');
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
    $data = $com->selectAll('*', 'chapter', 'subject_id = ' . $sid . ' ORDER BY name ASC');
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
        $difficult = $obj->selectAll('*', 'difficult', 'difficult_id > 0');
        while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
            if (!$first) {
                $subject_id = 0;
                $chapter_id = 0;
                $topic_id = 0;
                $subject = $obj->selectRow('*', 'subject', 'name = \'' . $row[0] . '\'');
                if (count($subject) == 0) {
                    $subject_id = $obj->insertRecord(array('name' => trim($row[0]), 'description' => '', 'created_by' => 1, 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'image_path' => ''), 'subject');
                } else {
                    $subject_id = $subject['subject_id'];
                }
                $chapter = $obj->selectRow('*', 'chapter', 'name = \'' . $obj->escapeString($row[1]) . '\' AND subject_id = ' . $subject_id);
                if (count($chapter) == 0) {
                    $chapter_id = $obj->insertRecord(array('name' => trim($row[1]), 'description' => '', 'status' => 1, 'created_by' => 1, 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'subject_id' => $subject_id), 'chapter');
                } else {
                    $chapter_id = $chapter['chapter_id'];
                }
                $topic = $obj->selectRow('*', 'topic', 'name = \'' . $obj->escapeString($row[2]) . '\' AND chapter_id = ' . $chapter_id);
                if (count($topic) == 0) {
                    $topic_id = $obj->insertRecord(array('name' => trim($row[2]), 'description' => '', 'created_by' => 1, 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'chapter_id' => $chapter_id), 'topic');
                } else {
                    $topic_id = $topic['topic_id'];
                }
                $difficult_id = 0;
                foreach ($difficult as $dif) {
                    if ($dif['name'] == trim($row[4])) {
                        $difficult_id = $dif['difficult_id'];
                        break;
                    }
                }
                $data = array('topic_id' => $topic_id, 'name' => trim($row[5]), 'a' => $row[6], 'b' => $row[7], 'c' => $row[8], 'd' => $row[9], 'answer' => $row[10], 'question_no' => $row[3], 'created_by' => 1, 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'image_path' => '', 'direction' => 'top', 'difficult_id' => $difficult_id);
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

