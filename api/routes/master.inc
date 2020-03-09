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
    $record = $com->insertRecord(array('name' => $data['name'], 'language_id' => $data['language_id'], 'description' => $data['description'], 'image_path' => $data['subject_image']), 'subject');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_year', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('year' => $data['year'], 'status' => $data['status']), 'year');
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
    $record = $com->insertRecord(array('name' => $data['name'], 'subject_id' => $data['subject_id']), 'topic');
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
    $record = $com->insertRecord(array('year_id' => $data['year_id'], 'topic_id' => $data['topic_id'], 'name' => $data['question'], 'question_no' => $data['question_no'], 'direction' => $data['direction'], 'image_path' => $data['question_image'], 'a' => $data['a'], 'b' => $data['b'], 'c' => $data['c'], 'd' => $data['d'], 'answer' => $data['answer'], 'explanation' => $data['explanation'], 'data_dictionary' => $data['data_dictionary'], 'book_id' => $data['book_id'], 'page_no' => $data['page_no'], 'notes' => $data['notes']), 'question');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_book', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('book_name' => $data['book_name'], 'book_name_id' => $data['book_name_id']), 'book');
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

$app->get('/get_subject_by_language/:lid', function($lid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'subject', 'language_id = ' . $lid);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_topic_by_subject/:sid', function($sid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'topic', 'subject_id = ' . $sid);
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

$app->get('/get_topic_by_lng_year/:lng/:yr', function($lng, $yr) {
    $res = array('error' => true, 'message' => 'No records found');
    $obj = new Common();
    $data = $obj->selectAll('t.*, s.name AS subject', 'topic AS t LEFT JOIN subject AS s ON s.subject_id = t.subject_id', 's.language_id = ' . $lng . ' GROUP BY t.topic_id');
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
        $res['total'] = count($data);
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

$app->get('/get_question_by_topic_n_year/:tid', function($tid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'question', 'question_id > 0 AND topic_id = ' . $tid);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_question_by_topic/:tid/:sid/:searchtxt/:searchqno', function($tid, $sid, $stxt, $sqno) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $topic_fltr = '';
    $search_qry = '';
    if ($stxt != null && $stxt != 'null') {
        $search_qry = ' AND q.name LIKE \'%' . $stxt . '%\'';
    }
    if ($sqno != null && $sqno != 'null') {
        $search_qry = $search_qry . ' AND q.question_no = ' . $sqno;
    }
    if ($tid != 0) {
        $topic_fltr = ' AND topic_id = ' . $tid;
    } else {
        $topic_fltr = ' AND topic_id IN (SELECT topic_id FROM topic WHERE chapter_id = ' . $cid . ')';
    }
    $data = $com->selectAll('*', 'question', 'question_id > 0' . $topic_fltr . $search_qry . ' ORDER BY question_no ASC');
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

$app->get('/get_year_by_language/:lid', function($lid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('y.year, y.year_id', 'topic AS t LEFT JOIN year AS y ON y.year_id = t.year_id', 't.language_id = ' . $lid . ' GROUP BY y.year_id');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->get('/get_language', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'language', 'language_id > 0');
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
                $subject_id = 0;
                $topic_id = 0;
                $year_id = 0;
                $language_id = 0;
                $book_id = 0;
                $language = $obj->selectRow('*', 'language', 'name = \'' . trim($row[0]) . '\'');
                if (count($language) == 0) {
                    $language_id = $obj->insertRecord(array('name' => trim($row[0]), 'status' => 1, 'created_by' => 1, 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')), 'language');
                } else {
                    $language_id = $language['language_id'];
                }
                $year = $obj->selectRow('*', 'year', 'year = \'' . trim($row[1]) . '\'');
                if (count($year) == 0) {
                    $year_id = $obj->insertRecord(array('year' => trim($row[1]), 'status' => 1, 'created_by' => 1, 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')), 'year');
                } else {
                    $year_id = $year['year_id'];
                }
                $subject = $obj->selectRow('*', 'subject', 'name = \'' . $row[2] . '\' AND language_id=' . $language_id);
                if (count($subject) == 0) {
                    $subject_id = $obj->insertRecord(array('name' => trim($row[2]), 'language_id' => $language_id, 'description' => '', 'created_by' => 1, 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'image_path' => ''), 'subject');
                } else {
                    $subject_id = $subject['subject_id'];
                }
                $topic = $obj->selectRow('*', 'topic', 'name = \'' . $obj->escapeString($row[3]) . '\' AND subject_id = ' . $subject_id);
                if (count($topic) == 0) {
                    $topic_id = $obj->insertRecord(array('name' => $obj->escapeString(trim($row[3])), 'created_by' => 1, 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'subject_id' => $subject_id), 'topic');
                } else {
                    $topic_id = $topic['topic_id'];
                }
                $book = $obj->selectRow('*', 'book', 'book_name = \'' . $obj->escapeString($row[13]) . '\'');
                if (count($book) == 0) {
                    $book_id = $obj->insertRecord(array('book_name' => $obj->escapeString(trim($row[13])), 'created_by' => 1, 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'book_name_id' => ''), 'book');
                } else {
                    $book_id = $book['book_id'];
                }
                $data = array('year_id' => $year_id, 'topic_id' => $topic_id, 'name' => trim($row[5]), 'a' => $row[6], 'b' => $row[7], 'c' => $row[8], 'd' => $row[9], 'answer' => $row[10], 'question_no' => $row[4], 'explanation' => $obj->escapeString($row[11]), 'data_dictionary' => $obj->escapeString($row[12]), 'book_id' => $book_id, 'page_no' => $row[14], 'notes' => $row[15], 'created_by' => 1, 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'image_path' => '', 'direction' => 'top');
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

$app->post('/reset_password', function() use ($app) {
    $data = $app->request->post();
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to update your password');
    $user = $obj->selectRow('*', 'student_register', 'user_name=\'' . $data['user_name'] . '\'');
    if (count($user) > 0) {
        $update = $obj->updateRecordWithWhere(array('password' => $data['password'], 'confirm_password' => $data['confirm_password']), 'student_register', 'user_name=\'' . $data['user_name'] . '\'');
        if ($update > 0) {
            $res['error'] = false;
            $res['message'] = 'Password updated successfully';
        }
    } else {
        $res['message'] = 'User Name Incorrect';
    }
    echoRespnse(201, $res);
});

$app->get('/get_book', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'book', 'book_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});
