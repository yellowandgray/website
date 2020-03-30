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
    $record = array();
    if ($table == 'question') {
        $record = $com->selectRow('*', $table, $where);
    }
    $data = $com->deleteRecordWithWhere($table, $where);
    if ($data > 0) {
        if ($table == 'question') {
            $com->updateRecord('question_no = (question_no - 1)', 'question', 'topic_id = \'' . $record['topic_id'] . '\' AND question_no >= ' . $record['question_no']);
        }
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
    date_default_timezone_set('Asia/Kolkata');
    $obj = new Common();
    $record = $obj->selectRow('*', 'student_register', 'user_name=\'' . $data['user_name'] . '\'');
    if (count($record) > 0) {
        if ($data['password'] == $record['password']) {
            $res['error'] = false;
            $obj->insertRecord(array('student_register_id' => $record['student_register_id'], 'login_at' => date('Y-m-d H:i:s'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')), 'student_register_login');
            $_SESSION['student_register_id'] = $record['student_register_id'];
            $res['message'] = 'Welcome ' . $record['student_name'];
            $res['data'] = $record;
        } else {
            $res['message'] = 'Username or Password mismatch';
        }
    }
    echoRespnse(201, $res);
});

$app->post('/store_answer', function() use ($app) {
    $res = array('error' => true, 'message' => 'Invalid login details');
    $data = $app->request->post();
    $obj = new Common();
    $record = $obj->selectRow('*', 'question', 'question_id=' . $data['question_id']);
    if (count($record) > 0) {
        $res['error'] = false;
        $res['message'] = 'Answer inserted successfully';
        $obj->insertRecord(array('question_id' => $record['question_id'], 'student_log_id' => $data['student_log_id'], 'name' => $record['name'], 'image_path' => $record['image_path'], 'direction' => $record['direction'], 'a' => $record['a'], 'b' => $record['b'], 'c' => $record['c'], 'd' => $record['d'], 'answer' => $record['answer'], 'explanation' => $record['explanation'], 'image_path_explanation' => $record['image_path_explanation'], 'explanation_img_direction' => $record['explanation_img_direction'], 'question_no' => $record['question_no'], 'student_answer' => $data['answer'], 'created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d'), 'difficult_id' => $record['difficult_id']), 'student_log_detail');
    } else {
        $res['message'] = 'Unable to insert this answer';
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
    $exist = $com->selectRow('*', 'student_register', 'user_name=\'' . $data['user_name'] . '\'');
    if (count($exist) == 0) {
        if (!isset($data['profile_picture'])) {
            $data['profile_image'] = '';
        }
        $record = $com->insertRecord(array('user_name' => $data['user_name'], 'student_name' => $data['student_name'], 'profile_image' => $data['profile_picture'], 'gender' => $data['gender'], 'parent_name' => $data['parent_name'], 'mobile' => $data['mobile'], 'city' => $data['city'], 'pin' => $data['pin'], 'school_name' => $data['school_name'], 'standard' => $data['standard'], 'email' => $data['email'], 'password' => $data['password'], 'confirm_password' => $data['confirm_password']), 'student_register');
        if ($record > 0) {
            $res['error'] = false;
            $res['message'] = 'Record inserted successfully';
        }
    } else {
        $res['error'] = true;
        $res['message'] = 'User already exist';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_subject', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name' => $data['name'], 'description' => $data['description'], 'image_path' => $data['subject_image'], 'status' => $data['status']), 'subject');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/insert_standard', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name' => $data['name'], 'description' => $data['description'], 'status' => $data['status'],'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),'created_by'=>1,'updated_by'=>1), 'standard');
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
//    $question_no = $com->updateRecordWithWhere(array('question_no = +1', 'question', 'subject_id'));
    $record = $com->insertRecord(array('difficult_id' => $data['difficult_id'], 'topic_id' => $data['topic_id'], 'name' => $data['name'], 'question_no' => $data['question_no'], 'direction' => $data['direction'], 'explanation' => $data['explanation'], 'explanation_img_direction' => $data['explanation_img_direction'], 'data_dictionary' => $data['data_dictionary'], 'image_path' => $data['image_path'], 'image_path_explanation' => $data['image_path_explanation'], 'a' => $data['a'], 'b' => $data['b'], 'c' => $data['c'], 'd' => $data['d'], 'answer' => $data['answer'], 'book_id' => $data['book_id'], 'page_no' => $data['page_no'], 'notes' => $data['notes']), 'question');
    if ($record > 0) {
        $com->updateRecord('question_no = (question_no + 1)', 'question', 'topic_id = \'' . $data['topic_id'] . '\' AND question_id != ' . $record . ' AND question_no >= ' . $data['question_no']);
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

$app->post('/insert_feedback', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name' => $data['name'], 'feedback_type' => $data['feedback_type'], 'option_1' => $data['option_1'], 'option_2' => $data['option_2'], 'option_3' => $data['option_3']), 'feedback');
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

$app->get('/get_standard', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'standard', 'standard_id > 0');
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

$app->get('/get_student/:srt', function($str) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $order = 'DESC';
    if ($str == 'student_name') {
        $order = 'ASC';
    }
    $data = $com->selectAll('*', 'student_register', 'student_register_id > 0 ORDER BY ' . $str . ' ' . $order);
    if (count($data) > 0) {
        foreach ($data as $key => $row) {
            if ($row['login_at']=='0000-00-00 00:00:00') {
                $data[$key]['login_at'] = 'Student Not login';
            }
            else{
            $data[$key]['login_at'] = date('d/m/Y h:iA', strtotime($row['login_at']));
            }
        }
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
        $res['total'] = count($data);
    }
    echoRespnse(201, $res);
});

$app->get('/get_student_result/:sid', function($sid) {
    $res = array('error' => true, 'message' => 'No records found');
    $obj = new Common();
    $student_logs = $obj->selectAll('*', 'student_log', 'student_register_id = ' . $sid . ' ORDER BY student_log_id DESC');
    if (count($student_logs) > 0) {
        foreach ($student_logs as $key => $log) {
            $detail = $obj->selectRow('COUNT(student_log_detail_id) AS attended, IFNULL((SELECT COUNT(student_log_detail_id) FROM student_log_detail WHERE student_log_id=' . $log['student_log_id'] . ' AND UPPER(answer) = UPPER(student_answer)), 0) AS correct_answers', 'student_log_detail', 'student_log_id=' . $log['student_log_id']);
            $student_logs[$key]['attended'] = $detail['attended'];
            $student_logs[$key]['correct_answers'] = $detail['correct_answers'];
        }
        $res['error'] = false;
        $res['message'] = 'Result found';
        $res['data'] = $student_logs;
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

$app->get('/get_question_by_topic/:tid/:cid/:searchtxt/:searchqno/:lvl', function($tid, $cid, $stxt, $sqno, $lvl) {
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
    if ($lvl != 0) {
        $search_qry = $search_qry . ' AND q.difficult_id = ' . $lvl;
    }
    if ($tid != 0) {
        $topic_fltr = ' AND topic_id = ' . $tid;
    } else {
        $topic_fltr = ' AND topic_id IN (SELECT topic_id FROM topic WHERE chapter_id = ' . $cid . ')';
    }
    $data = $com->selectAll('q.*, d.name AS difficult', 'question AS q LEFT JOIN difficult AS d ON d.difficult_id = q.difficult_id', 'question_id > 0' . $topic_fltr . $search_qry . ' ORDER BY question_no ASC');
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
                $book = $obj->selectRow('*', 'book', 'book_name = \'' . $row[13] . '\'');
                if (count($book) == 0) {
                    $book_id = $obj->insertRecord(array('book_name' => trim($row[13]), 'created_by' => 1, 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')), 'book');
                } else {
                    $book_id = $book['book_id'];
                }
                $data = array('topic_id' => $topic_id, 'question_no' => $row[3], 'name' => trim($row[5]), 'a' => $row[6], 'b' => $row[7], 'c' => $row[8], 'd' => $row[9], 'answer' => $row[10], 'explanation' => $row[11], 'data_dictionary' => $row[12], 'book_id' => $book_id, 'page_no' => $row[14], 'notes' => $row[15], 'created_by' => 1, 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'image_path' => '', 'direction' => 'top', 'difficult_id' => $difficult_id);
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
        $res['message'] = 'Unable to Reset Password';
    }
    echoRespnse(201, $res);
});

$app->get('/get_result_detail/:lid', function($lid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'student_log_detail', 'student_log_id = ' . $lid);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
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

$app->get('/get_feedback', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'feedback', 'feedback_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});
