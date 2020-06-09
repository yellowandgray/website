<?php
session_start();
ini_set('date.timezone', 'Asia/Kolkata');

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
//            $com->updateRecord('question_no = (question_no - 1)', 'question', 'topic_id = \'' . $record['topic_id'] . '\' AND question_no >= ' . $record['question_no']);
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
    $record = $com->insertRecord(array('student_name' => $data['student_name'], 'user_name' => $data['user_name'], 'password' => $data['password'], 'confirm_password' => $data['confirm_password'], 'mobile' => $data['mobile'], 'email' => $data['email'], 'profile_image' => $data['profile_picture'], 'gender' => $data['gender'], 'city' => $data['city'], 'pin' => $data['pin'], 'graduation' => $data['graduation'], 'street' => $data['street'], 'district' => $data['district'], 'nearcity' => $data['nearcity'], 'created_at'=>date('Y-m-d H:i:S')), 'student_register');
    
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

$app->post('/insert_contact', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name' => $data['name'], 'email' => $data['email'], 'subject' => $data['subject'], 'description' => $data['description']), 'contact');
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
    $record = $com->insertRecord(array('year_id' => $data['year_id'], 'topic_id' => $data['topic_id'], 'name' => $data['question'], 'question_no' => $data['question_no'], 'direction' => $data['direction'], 'image_path' => $data['question_image'], 'a' => $data['a'], 'b' => $data['b'], 'c' => $data['c'], 'd' => $data['d'], 'answer' => $data['answer'], 'explanation' => $data['explanation'], 'image_path_explanation' => $data['explanation_image'], 'explanation_img_direction' => $data['explanation_img_direction'], 'data_dictionary' => $data['data_dictionary'], 'book_id' => $data['book_id'], 'page_no' => $data['page_no'], 'notes' => $data['notes']), 'question');
    if ($record > 0) {
//        $com->updateRecord('question_no = (question_no + 1)', 'question', 'topic_id = \'' . $data['topic_id'] . '\' AND question_id != ' . $record . ' AND question_no >= ' . $data['question_no']);
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

$app->get('/get_topic_details/:tid', function($tid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectRow('*', 'topic', 'topic_id = '.$tid);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
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

$app->get('/get_subject_by_language_n_year/:lid/:yid', function($lid, $yid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('s.*', 'subject AS s LEFT JOIN topic AS t ON t.subject_id = s.subject_id LEFT JOIN question AS q ON q.topic_id = t.topic_id', 's.language_id = ' . $lid . ' AND q.year_id = ' . $yid . ' GROUP BY s.subject_id');
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

$app->get('/get_topic_by_subject_n_year/:sid/:yid', function($sid, $yid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('t.*', 'topic AS t LEFT JOIN question AS q ON q.topic_id = t.topic_id', 'q.year_id = ' . $yid . ' AND t.subject_id ='.$sid.' GROUP BY t.topic_id');
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
    $data = $com->selectAll('*', 'question', 'question_id > 0 AND topic_id = ' . $tid . ' ORDER BY question_no ASC');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});


$app->get('/get_question_by_year_n_lang/:lid/:yid', function($lid,$yid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    
    
    $topic_ids = [];
    
    $data_topic = $com->selectAll('t.*, s.name AS subject', 'topic AS t LEFT JOIN subject AS s ON s.subject_id = t.subject_id', 's.language_id = ' . $lid . ' GROUP BY t.topic_id');
    if (count($data_topic) > 0) {
        foreach($data_topic as $topic){ 
            $topic_ids[] = $topic['topic_id'];
        }    
    }
    
    if (count($data_topic) > 0) {
         $topic = implode(',',$topic_ids);
         $data = $com->selectAll('*', 'question', 'question_id > 0 AND year_id='.$yid.' AND topic_id IN ('.$topic.') ORDER BY question_no ASC');
        if (count($data) > 0) {
            $res['error'] = false;
            $res['message'] = 'Records found';
            $res['data'] = $data;
        }
        
    }   
    echoRespnse(201, $res);
});


$app->get('/get_question_by_year_n_otherlang/:lid/:yid', function($lid,$yid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    
    
    $topic_ids = [];
    
    $data_topic = $com->selectAll('t.*, s.name AS subject', 'topic AS t LEFT JOIN subject AS s ON s.subject_id = t.subject_id', 's.language_id <> ' . $lid . ' GROUP BY t.topic_id');
    if (count($data_topic) > 0) {
        foreach($data_topic as $topic){ 
            $topic_ids[] = $topic['topic_id'];
        }    
    }
    
    if (count($data_topic) > 0) {
         $topic = implode(',',$topic_ids);
         $data = $com->selectAll('*', 'question', 'question_id > 0 AND year_id='.$yid.' AND topic_id IN ('.$topic.') ORDER BY question_no ASC');
        if (count($data) > 0) {
            $res['error'] = false;
            $res['message'] = 'Records found';
            $res['data'] = $data;
        }
        
    }   
    echoRespnse(201, $res);
});


$app->get('/get_question_by_year_n_lang_n_subj/:lid/:yid/:sid', function($lid,$yid,$sid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    
    
    $topic_ids = [];
    
    $data_topic = $com->selectAll('t.*', 'topic AS t', 't.subject_id = ' . $sid . ' GROUP BY t.topic_id');
    if (count($data_topic) > 0) {
        foreach($data_topic as $topic){ 
            $topic_ids[] = $topic['topic_id'];
        }    
    }
    
    if (count($data_topic) > 0) {
         $topic = implode(',',$topic_ids);
         $data = $com->selectAll('*', 'question', 'question_id > 0 AND year_id='.$yid.' AND topic_id IN ('.$topic.') ORDER BY question_no ASC');
        if (count($data) > 0) {
            $res['error'] = false;
            $res['message'] = 'Records found';
            $res['data'] = $data;
        }
        
    }   
    echoRespnse(201, $res);
});


$app->get('/get_question_by_topic_and_year/:tid/:yid', function($tid,$yid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'question', 'question_id > 0 AND topic_id = ' . $tid . ' AND year_id='.$yid.' ORDER BY question_no ASC');
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

$app->get('/get_year_by_question/:qid', function($qid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'year', 'question_id = ' . $qid);
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
    $data = $com->selectAll('y.year, y.year_id', 'subject AS s LEFT JOIN topic AS t ON t.subject_id = s.subject_id LEFT JOIN question AS q ON q.topic_id = t.topic_id LEFT JOIN year AS y ON y.year_id = q.year_id', 's.language_id = ' . $lid . ' AND q.year_id GROUP BY y.year_id');
    if (count($data) > 0) {
        foreach($data as $dai=>$dat){
            if($dat['year_id'] == null) {
                unset($data[$dai]);
            }
        }
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



$app->post('/free_user_store_answer', function() use ($app) {
    $res = array('error' => true, 'message' => 'Invalid login details');
    $data = $app->request->post();
    $obj = new Common();
    $record = $obj->selectRow('*', 'question', 'question_id=' . $data['question_id']);
    if (count($record) > 0) {
        $res['error'] = false;
        $res['message'] = 'Answer inserted successfully';

                
        $record_log_detail = $obj->selectRow('*', 'free_user_log_detail', 'question_id=' . $data['question_id'] .' AND student_log_id='.$data['student_log_id']);
        if (count($record_log_detail) == 0) {
        
             $obj->insertRecord(array('question_id' => $record['question_id'], 'student_log_id' => $data['student_log_id'],                
                'student_answer' => $data['answer'], 'created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')), 'free_user_log_detail');
            
            /*
            $obj->insertRecord(array('question_id' => $record['question_id'], 'student_log_id' => $data['student_log_id'],
                'name' => $record['name'], 'image_path' => $record['image_path'], 'direction' => $record['direction'],
                'a' => $record['a'], 'b' => $record['b'], 'c' => $record['c'], 'd' => $record['d'], 'answer' => $record['answer'],
                'explanation' => $record['explanation'], 'image_path_explanation' => $record['image_path_explanation'],
                'explanation_img_direction' => $record['explanation_img_direction'], 'question_no' => $record['question_no'],
                'student_answer' => $data['answer'], 'created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')), 'student_log_detail');
             * */

        }else {
            
            $obj->updateRecordWithWhere(array('student_answer' => $data['answer'],  'updated_at' => date('Y-m-d')), 'free_user_log_detail','question_id=' . $data['question_id'] .' AND student_log_id='.$data['student_log_id']);
            /*
             $obj->updateRecordWithWhere(array('name' => $record['name'], 'image_path' => $record['image_path'], 'direction' => $record['direction'],
                'a' => $record['a'], 'b' => $record['b'], 'c' => $record['c'], 'd' => $record['d'], 'answer' => $record['answer'],
                'explanation' => $record['explanation'], 'image_path_explanation' => $record['image_path_explanation'],
                'explanation_img_direction' => $record['explanation_img_direction'], 'question_no' => $record['question_no'],
                'student_answer' => $data['answer'],  'updated_at' => date('Y-m-d')), 'student_log_detail','question_id=' . $data['question_id'] .' AND student_log_id='.$data['student_log_id']);
            */
        }     
        // exit;
    } else {
        $res['message'] = 'Unable to insert this answer';
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

                
        $record_log_detail = $obj->selectRow('*', 'student_log_detail', 'question_id=' . $data['question_id'] .' AND student_log_id='.$data['student_log_id']);
        if (count($record_log_detail) == 0) {
        
             $obj->insertRecord(array('question_id' => $record['question_id'], 'student_log_id' => $data['student_log_id'],                
                'student_answer' => $data['answer'], 'created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')), 'student_log_detail');
            
            /*
            $obj->insertRecord(array('question_id' => $record['question_id'], 'student_log_id' => $data['student_log_id'],
                'name' => $record['name'], 'image_path' => $record['image_path'], 'direction' => $record['direction'],
                'a' => $record['a'], 'b' => $record['b'], 'c' => $record['c'], 'd' => $record['d'], 'answer' => $record['answer'],
                'explanation' => $record['explanation'], 'image_path_explanation' => $record['image_path_explanation'],
                'explanation_img_direction' => $record['explanation_img_direction'], 'question_no' => $record['question_no'],
                'student_answer' => $data['answer'], 'created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')), 'student_log_detail');
             * */

        }else {
            
            $obj->updateRecordWithWhere(array('student_answer' => $data['answer'],  'updated_at' => date('Y-m-d')), 'student_log_detail','question_id=' . $data['question_id'] .' AND student_log_id='.$data['student_log_id']);
            /*
             $obj->updateRecordWithWhere(array('name' => $record['name'], 'image_path' => $record['image_path'], 'direction' => $record['direction'],
                'a' => $record['a'], 'b' => $record['b'], 'c' => $record['c'], 'd' => $record['d'], 'answer' => $record['answer'],
                'explanation' => $record['explanation'], 'image_path_explanation' => $record['image_path_explanation'],
                'explanation_img_direction' => $record['explanation_img_direction'], 'question_no' => $record['question_no'],
                'student_answer' => $data['answer'],  'updated_at' => date('Y-m-d')), 'student_log_detail','question_id=' . $data['question_id'] .' AND student_log_id='.$data['student_log_id']);
            */
        }     
        // exit;
    } else {
        $res['message'] = 'Unable to insert this answer';
    }
    echoRespnse(201, $res);
});


$app->post('/store_notsure_answer', function() use ($app) {
    $res = array('error' => true, 'message' => 'Invalid login details');
    $data = $app->request->post();
    $obj = new Common();
    $record = $obj->selectRow('*', 'question', 'question_id=' . $data['question_id']);
    if (count($record) > 0) {
        $res['error'] = false;
        $res['message'] = 'Answer inserted successfully';

                
        $record_log_detail = $obj->selectRow('*', 'student_log_detail', 'question_id=' . $data['question_id'] .' AND student_log_id='.$data['student_log_id']);
        if (count($record_log_detail) == 0) {
            $obj->insertRecord(array('question_id' => $record['question_id'], 'student_log_id' => $data['student_log_id'],
                 'student_answer' => $data['answer'],'student_notsure_answer' => $data['notsure_answer'], 'created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')), 'student_log_detail');
            /*
            $obj->insertRecord(array('question_id' => $record['question_id'], 'student_log_id' => $data['student_log_id'],
                'name' => $record['name'], 'image_path' => $record['image_path'], 'direction' => $record['direction'],
                'a' => $record['a'], 'b' => $record['b'], 'c' => $record['c'], 'd' => $record['d'], 'answer' => $record['answer'],
                'explanation' => $record['explanation'], 'image_path_explanation' => $record['image_path_explanation'],
                'explanation_img_direction' => $record['explanation_img_direction'], 'question_no' => $record['question_no'],
               'student_answer' => $data['answer'],'student_notsure_answer' => $data['notsure_answer'], 'created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')), 'student_log_detail');
             */
            
        }else {
            /*
             $obj->updateRecordWithWhere(array('name' => $record['name'], 'image_path' => $record['image_path'], 'direction' => $record['direction'],
                'a' => $record['a'], 'b' => $record['b'], 'c' => $record['c'], 'd' => $record['d'], 'answer' => $record['answer'],
                'explanation' => $record['explanation'], 'image_path_explanation' => $record['image_path_explanation'],
                'explanation_img_direction' => $record['explanation_img_direction'], 'question_no' => $record['question_no'],
                'student_answer' => $data['answer'],'student_notsure_answer' => $data['notsure_answer'],  'updated_at' => date('Y-m-d')), 'student_log_detail','question_id=' . $data['question_id'] .' AND student_log_id='.$data['student_log_id']);
             * 
             */
            $obj->updateRecordWithWhere(array('student_answer' => $data['answer'],'student_notsure_answer' => $data['notsure_answer'],  'updated_at' => date('Y-m-d')), 'student_log_detail','question_id=' . $data['question_id'] .' AND student_log_id='.$data['student_log_id']);
        }     
        // exit;
    } else {
        $res['message'] = 'Unable to insert this answer';
    }
    echoRespnse(201, $res);
});


$app->get('/free_user_get_result_detail/:lid', function($lid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    //$data = $com->selectAll('*', 'student_log_detail', 'student_log_id = ' . $lid);
    $data = $com->selectAll('sld.*,q.*', 'free_user_log_detail As sld INNER JOIN question As q ON sld.question_id=q.question_id', 'student_log_id = ' . $lid);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});


$app->get('/free_user_get_result_detail_by_topic/:lid/:tid', function($lid,$tid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    //$data = $com->selectAll('sld.*', 'student_log_detail As sld LEFT JOIN question As q ON sld.question_id=q.question_id', 'student_log_id = ' . $lid.' AND topic_id='.$tid);
    $data = $com->selectAll('sld.*,q.*', 'free_user_log_detail As sld LEFT JOIN question As q ON sld.question_id=q.question_id', 'student_log_id = ' . $lid.' AND topic_id='.$tid);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});



$app->get('/get_result_detail/:lid', function($lid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    //$data = $com->selectAll('*', 'student_log_detail', 'student_log_id = ' . $lid);
    $data = $com->selectAll('sld.*,q.*', 'student_log_detail As sld INNER JOIN question As q ON sld.question_id=q.question_id', 'student_log_id = ' . $lid);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});


$app->get('/get_result_detail_by_topic/:lid/:tid', function($lid,$tid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    //$data = $com->selectAll('sld.*', 'student_log_detail As sld LEFT JOIN question As q ON sld.question_id=q.question_id', 'student_log_id = ' . $lid.' AND topic_id='.$tid);
    $data = $com->selectAll('sld.*,q.*', 'student_log_detail As sld LEFT JOIN question As q ON sld.question_id=q.question_id', 'student_log_id = ' . $lid.' AND topic_id='.$tid);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

/*
$app->get('/get_student_result_count_by_topic/:lid', function($lid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'student_log_detail', 'student_log_id = ' . $lid);
    
    
    
    
    
    $student_log_year  = $com->selectAll('sly.*,y.year As year','student_log AS sl LEFT JOIN student_log_year As sly ON sl.student_log_id=sly.student_log_id LEFT JOIN year As y ON y.year_id=sly.year_id',' sl.student_log_id='.$lid);
  
   
    $stud_all_sel_year      =  Array();
    $stud_all_sel_topic     =  Array();
    
    
    $ans_log_year      = array();    
    if(count($student_log_year)>0) {
        foreach($student_log_year as $student_log_year_v) {
            $ans_log_year[$student_log_year_v['student_log_id']][] = $student_log_year_v['year'];
			if($student_log_year_v['year_id']!=''){
				if(!in_array($student_log_year_v['year_id'], $stud_all_sel_year)) {
					$stud_all_sel_year[] = $student_log_year_v['year_id'];
				}
			}	
        }
    }
  
     
    $student_log_topic = $com->selectAll('slt.*,t.name As topic_name,subject.subject_id As subject_id,subject.name As subject_name','student_log As sl'
            . ' LEFT JOIN student_log_topic slt ON sl.student_log_id=slt.student_log_id LEFT JOIN topic As t ON slt.topic_id=t.topic_id LEFT JOIN subject ON '
            . 't.subject_id=subject.subject_id','sl.student_log_id = '.$lid.' ORDER BY student_log_id,subject.subject_id,t.topic_id ASC');
    

    $stud_log_topic_by_log = array();
    if(count($student_log_topic)>0) {
        foreach ($student_log_topic as $student_log_topic) {
            if($student_log_topic['student_log_id']!=''){
                $stud_log_topic_by_log[$student_log_topic['student_log_id']][$student_log_topic['subject_name']][$student_log_topic['topic_id']] =  $student_log_topic['topic_name'];
                 if(!in_array($student_log_topic['topic_id'], $stud_all_sel_topic)) {
                        $stud_all_sel_topic[] = $student_log_topic['topic_id'];
                 }
            }        
        }
    }
    
    
    $stud_all_sel_year_id_val  = '';
    $stud_all_sel_topic_id_val = '';
    
    $ques_topic_cnt      = array();
    $ques_cor_ans_cnt   = array();
    
    if(count($stud_all_sel_year)>0) {
        $stud_all_sel_year_id_val = implode(',',$stud_all_sel_year);
    }
    
     if(count($stud_all_sel_topic)>0) {
        $stud_all_sel_topic_id_val = implode(',',$stud_all_sel_topic);
    }
	
	    
    $data = array();
    if($stud_all_sel_year_id_val != '' && $stud_all_sel_topic_id_val!='') {
        //total questions year , topic 
        $student_log_question  = $com->selectAll('q.*,year.year,subject.name As subject_name,t.name As topic_name',' question As q LEFT JOIN year ON q.year_id=year.year_id '
            . 'LEFT JOIN topic As t ON q.topic_id=t.topic_id LEFT JOIN subject ON t.subject_id=subject.subject_id',' q.year_id IN ('.$stud_all_sel_year_id_val.') AND q.topic_id IN ('.$stud_all_sel_topic_id_val.')'); 
    
        
        if(count($student_log_question)>0) {
            foreach($student_log_question as $student_log_question_val) {
                if(!isset($ques_topic_cnt[$student_log_question_val['topic_id']]['count'])){
                    $ques_topic_cnt[$student_log_question_val['topic_id']]['count'] = 0;
                }
                $ques_topic_cnt[$student_log_question_val['topic_id']]['count']              =  $ques_topic_cnt[$student_log_question_val['topic_id']]['count'] + 1;
                $ques_topic_cnt[$student_log_question_val['topic_id']]['topic_name']         =  $student_log_question_val['topic_name'];
                $ques_topic_cnt[$student_log_question_val['topic_id']]['subject_name']       =  $student_log_question_val['subject_name'];
         
            }   
        }		
		
        
        //answered,correct answer count year,topic
        
       // $student_log_answer = $com->selectAll('student_log_detail.*,year.year,question.topic_id',' student_log LEFT JOIN student_log_detail ON student_log.student_log_id=student_log_detail.student_log_id '
                . 'LEFT JOIN question ON student_log_detail.question_id=question.question_id LEFT JOIN year ON question.year_id=year.year_id','student_log_detail.student_log_id='.$lid.' ORDER BY student_log_id,student_log_detail_id ASC');
        
        
        $student_log_answer = $com->selectAll('student_log_detail.*,question.answer,year.year,question.topic_id',' student_log LEFT JOIN student_log_detail ON student_log.student_log_id=student_log_detail.student_log_id '
                . 'LEFT JOIN question ON student_log_detail.question_id=question.question_id LEFT JOIN year ON question.year_id=year.year_id','student_log_detail.student_log_id='.$lid.' ORDER BY student_log_id,student_log_detail_id ASC');
       
        
        $tmp_stud_log_queston_id = array(); //rmv mul question  in student log details
        foreach($student_log_answer as $student_log_answer_val) {
            if($student_log_answer_val['student_log_id']!='') {
                if(!isset($tmp_stud_log_queston_id[$student_log_answer_val['student_log_id']]) || !in_array($student_log_answer_val['question_id'], $tmp_stud_log_queston_id[$student_log_answer_val['student_log_id']]))
                {        
                    $tmp_stud_log_queston_id[$student_log_answer_val['student_log_id']][] = $student_log_answer_val['question_id'];
                    if(!isset($ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['correct_cnt']))
                    { 
                        $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['correct_cnt'] = 0;
                    }       

                    if(!isset($ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['answerd_cnt']))
                    { 
                        $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['answerd_cnt'] = 0;
                    }

                    
                    if($student_log_answer_val['student_answer']!=''){                        
                 
                        $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['answerd_cnt'] = $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['answerd_cnt']+1;
                       
                    } 

                    if($student_log_answer_val['answer']==$student_log_answer_val['student_answer']){
                        $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['correct_cnt'] = $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['correct_cnt']+1;
                    }

                    } 
            } 
        }
        
        
        
         foreach($stud_log_topic_by_log[$lid] as $student_log_subj_subj=>$student_log_subj)
         {    
            //topic
            {
                 foreach($student_log_subj as $student_log_subj_topic_id=>$student_log_subj_topic)
                 {
                     $data[$student_log_subj_topic_id]['topic_id']      = $student_log_subj_topic_id;
                     $data[$student_log_subj_topic_id]['subject_name']  = $student_log_subj_subj;
                     $data[$student_log_subj_topic_id]['topic_name']    = $student_log_subj_topic;
                     
                     
                     $tot_topic_question = 0;
                     if(isset($ques_topic_cnt[$student_log_subj_topic_id]['count'])) {
                            $tot_topic_question = $ques_topic_cnt[$student_log_subj_topic_id]['count'];
                     }                     
                     $data[$student_log_subj_topic_id]['totalcnt'] = $tot_topic_question;                     
                     
                     
                    $answerd_topic_question = 0;
                    if(isset($ques_cor_ans_cnt[$lid][$student_log_subj_topic_id]['answerd_cnt'])) {
                        $answerd_topic_question = $ques_cor_ans_cnt[$lid][$student_log_subj_topic_id]['answerd_cnt'];
                    }
                    $data[$student_log_subj_topic_id]['answerdcnt'] = $answerd_topic_question;
                    
                    
                    $correct_topic_question = 0;
                    if(isset($ques_cor_ans_cnt[$lid][$student_log_subj_topic_id]['correct_cnt'])) {
                        $correct_topic_question = $ques_cor_ans_cnt[$lid][$student_log_subj_topic_id]['correct_cnt'];
                    }
                    $data[$student_log_subj_topic_id]['correctcnt'] = $correct_topic_question;           
                    
                    $data[$student_log_subj_topic_id]['wrongcnt'] =  $data[$student_log_subj_topic_id]['answerdcnt'] - $data[$student_log_subj_topic_id]['correctcnt'];
                     
                 }
            }
         }
         
         
         
         
    }  
    
    
    
    
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
    

});
*/


$app->get('/free_user_get_student_result_count_by_topic/:lid', function($lid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'free_user_log_detail', 'student_log_id = ' . $lid);
    
    
    
    
    
    $student_log_year  = $com->selectAll('sly.*,y.year As year','free_user_log AS sl LEFT JOIN free_user_log_year As sly ON sl.student_log_id=sly.student_log_id LEFT JOIN year As y ON y.year_id=sly.year_id',' sl.student_log_id='.$lid);
  
   
    //$stud_all_sel_year      =  Array();
    $stud_all_sel_topic     =  Array();
    
    
    /*
    $ans_log_year      = array();    
    if(count($student_log_year)>0) {
        foreach($student_log_year as $student_log_year_v) {
            $ans_log_year[$student_log_year_v['student_log_id']][] = $student_log_year_v['year'];
			if($student_log_year_v['year_id']!=''){
				if(!in_array($student_log_year_v['year_id'], $stud_all_sel_year)) {
					$stud_all_sel_year[] = $student_log_year_v['year_id'];
				}
			}	
        }
    }
    */
    
     
    $student_log_topic = $com->selectAll('slt.*,t.name As topic_name,subject.subject_id As subject_id,subject.name As subject_name','free_user_log As sl'
            . ' LEFT JOIN free_user_log_topic slt ON sl.student_log_id=slt.student_log_id LEFT JOIN topic As t ON slt.topic_id=t.topic_id LEFT JOIN subject ON '
            . 't.subject_id=subject.subject_id','sl.student_log_id = '.$lid.' ORDER BY student_log_id,subject.subject_id,t.topic_id ASC');
    

    $stud_log_topic_by_log = array();
    if(count($student_log_topic)>0) {
        foreach ($student_log_topic as $student_log_topic) {
            if($student_log_topic['student_log_id']!=''){
                $stud_log_topic_by_log[$student_log_topic['student_log_id']][$student_log_topic['subject_name']][$student_log_topic['topic_id']] =  $student_log_topic['topic_name'];
                 if(!in_array($student_log_topic['topic_id'], $stud_all_sel_topic)) {
                        $stud_all_sel_topic[] = $student_log_topic['topic_id'];
                 }
            }        
        }
    }
    
 
    //$stud_all_sel_year_id_val  = '';
    $stud_all_sel_topic_id_val = '';
    
    $ques_topic_cnt      = array();
    $ques_cor_ans_cnt   = array();
    
    /*
    if(count($stud_all_sel_year)>0) {
        $stud_all_sel_year_id_val = implode(',',$stud_all_sel_year);
    }
    */
    
     if(count($stud_all_sel_topic)>0) {
        $stud_all_sel_topic_id_val = implode(',',$stud_all_sel_topic);
    }
	
	    
    $data = array();
    //if($stud_all_sel_year_id_val != '' && $stud_all_sel_topic_id_val!='') {
   if($stud_all_sel_topic_id_val!='') {
        //total questions year , topic 
       /* 
       $student_log_question  = $com->selectAll('q.*,year.year,subject.name As subject_name,t.name As topic_name',' question As q LEFT JOIN year ON q.year_id=year.year_id '
            . 'LEFT JOIN topic As t ON q.topic_id=t.topic_id LEFT JOIN subject ON t.subject_id=subject.subject_id',' q.year_id IN ('.$stud_all_sel_year_id_val.') AND q.topic_id IN ('.$stud_all_sel_topic_id_val.')'); 
        */
       
                       $yid = array();
    $years = $com->selectAll('y.*', 'year As y', 'status = 1 ORDER BY y.year ASC LIMIT 3');
       
       foreach($years as $y) {
            $yid[] = $y['year_id'];
    }
    if(count($yid)>0) {
       $yids =  implode(',',$yid);
    }
       
		
       //total questions  topic 
       $student_log_question  = $com->selectAll('q.*,year.year,subject.name As subject_name,t.name As topic_name',' question As q LEFT JOIN year ON q.year_id=year.year_id '
            . 'LEFT JOIN topic As t ON q.topic_id=t.topic_id LEFT JOIN subject ON t.subject_id=subject.subject_id',' q.topic_id IN ('.$stud_all_sel_topic_id_val.') AND q.year_id IN (' .$yids. ')'); 
        
        if(count($student_log_question)>0) {
            foreach($student_log_question as $student_log_question_val) {
                if(!isset($ques_topic_cnt[$student_log_question_val['topic_id']]['count'])){
                    $ques_topic_cnt[$student_log_question_val['topic_id']]['count'] = 0;
                }
                $ques_topic_cnt[$student_log_question_val['topic_id']]['count']              =  $ques_topic_cnt[$student_log_question_val['topic_id']]['count'] + 1;
                $ques_topic_cnt[$student_log_question_val['topic_id']]['topic_name']         =  $student_log_question_val['topic_name'];
                $ques_topic_cnt[$student_log_question_val['topic_id']]['subject_name']       =  $student_log_question_val['subject_name'];
         
            }   
        }		
		
        
        //answered,correct answer count year,topic
        /*
        $student_log_answer = $com->selectAll('student_log_detail.*,year.year,question.topic_id',' student_log LEFT JOIN student_log_detail ON student_log.student_log_id=student_log_detail.student_log_id '
                . 'LEFT JOIN question ON student_log_detail.question_id=question.question_id LEFT JOIN year ON question.year_id=year.year_id','student_log_detail.student_log_id='.$lid.' ORDER BY student_log_id,student_log_detail_id ASC');
        */
        $student_log_answer = $com->selectAll('free_user_log_detail.*,question.answer,year.year,question.topic_id',' free_user_log LEFT JOIN free_user_log_detail ON free_user_log.student_log_id=free_user_log_detail.student_log_id '
                . 'LEFT JOIN question ON free_user_log_detail.question_id=question.question_id LEFT JOIN year ON question.year_id=year.year_id','free_user_log_detail.student_log_id='.$lid.' ORDER BY student_log_id,student_log_detail_id ASC');
       
        
        $tmp_stud_log_queston_id = array(); //rmv mul question  in student log details
        foreach($student_log_answer as $student_log_answer_val) {
            if($student_log_answer_val['student_log_id']!='') {
                if(!isset($tmp_stud_log_queston_id[$student_log_answer_val['student_log_id']]) || !in_array($student_log_answer_val['question_id'], $tmp_stud_log_queston_id[$student_log_answer_val['student_log_id']]))
                {        
                    $tmp_stud_log_queston_id[$student_log_answer_val['student_log_id']][] = $student_log_answer_val['question_id'];
                    if(!isset($ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['correct_cnt']))
                    { 
                        $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['correct_cnt'] = 0;
                    }       

                    if(!isset($ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['answerd_cnt']))
                    { 
                        $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['answerd_cnt'] = 0;
                    }

                    
                    if($student_log_answer_val['student_answer']!=''){                        
                 
                        $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['answerd_cnt'] = $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['answerd_cnt']+1;
                       
                    } 

                    if($student_log_answer_val['answer']==$student_log_answer_val['student_answer']){
                        $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['correct_cnt'] = $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['correct_cnt']+1;
                    }

                    } 
            } 
        }
        
        
        
         foreach($stud_log_topic_by_log[$lid] as $student_log_subj_subj=>$student_log_subj)
         {    
            //topic
            {
                 foreach($student_log_subj as $student_log_subj_topic_id=>$student_log_subj_topic)
                 {
                     $data[$student_log_subj_topic_id]['topic_id']      = $student_log_subj_topic_id;
                     $data[$student_log_subj_topic_id]['subject_name']  = $student_log_subj_subj;
                     $data[$student_log_subj_topic_id]['topic_name']    = $student_log_subj_topic;
                     
                     
                     $tot_topic_question = 0;
                     if(isset($ques_topic_cnt[$student_log_subj_topic_id]['count'])) {
                            $tot_topic_question = $ques_topic_cnt[$student_log_subj_topic_id]['count'];
                     }                     
                     $data[$student_log_subj_topic_id]['totalcnt'] = $tot_topic_question;                     
                     
                     
                    $answerd_topic_question = 0;
                    if(isset($ques_cor_ans_cnt[$lid][$student_log_subj_topic_id]['answerd_cnt'])) {
                        $answerd_topic_question = $ques_cor_ans_cnt[$lid][$student_log_subj_topic_id]['answerd_cnt'];
                    }
                    $data[$student_log_subj_topic_id]['answerdcnt'] = $answerd_topic_question;
                    
                    
                    $correct_topic_question = 0;
                    if(isset($ques_cor_ans_cnt[$lid][$student_log_subj_topic_id]['correct_cnt'])) {
                        $correct_topic_question = $ques_cor_ans_cnt[$lid][$student_log_subj_topic_id]['correct_cnt'];
                    }
                    $data[$student_log_subj_topic_id]['correctcnt'] = $correct_topic_question;           
                    
                    $data[$student_log_subj_topic_id]['wrongcnt'] =  $data[$student_log_subj_topic_id]['answerdcnt'] - $data[$student_log_subj_topic_id]['correctcnt'];
                     
                 }
            }
         }
   }
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
    

});






$app->get('/get_student_result_count_by_topic/:lid', function($lid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'student_log_detail', 'student_log_id = ' . $lid);
    
    
    
    
    
    $student_log_year  = $com->selectAll('sly.*,y.year As year','student_log AS sl LEFT JOIN student_log_year As sly ON sl.student_log_id=sly.student_log_id LEFT JOIN year As y ON y.year_id=sly.year_id',' sl.student_log_id='.$lid);
  
   
    //$stud_all_sel_year      =  Array();
    $stud_all_sel_topic     =  Array();
    
    
    /*
    $ans_log_year      = array();    
    if(count($student_log_year)>0) {
        foreach($student_log_year as $student_log_year_v) {
            $ans_log_year[$student_log_year_v['student_log_id']][] = $student_log_year_v['year'];
			if($student_log_year_v['year_id']!=''){
				if(!in_array($student_log_year_v['year_id'], $stud_all_sel_year)) {
					$stud_all_sel_year[] = $student_log_year_v['year_id'];
				}
			}	
        }
    }
    */
    
     
    $student_log_topic = $com->selectAll('slt.*,t.name As topic_name,subject.subject_id As subject_id,subject.name As subject_name','student_log As sl'
            . ' LEFT JOIN student_log_topic slt ON sl.student_log_id=slt.student_log_id LEFT JOIN topic As t ON slt.topic_id=t.topic_id LEFT JOIN subject ON '
            . 't.subject_id=subject.subject_id','sl.student_log_id = '.$lid.' ORDER BY student_log_id,subject.subject_id,t.topic_id ASC');
    

    $stud_log_topic_by_log = array();
    if(count($student_log_topic)>0) {
        foreach ($student_log_topic as $student_log_topic) {
            if($student_log_topic['student_log_id']!=''){
                $stud_log_topic_by_log[$student_log_topic['student_log_id']][$student_log_topic['subject_name']][$student_log_topic['topic_id']] =  $student_log_topic['topic_name'];
                 if(!in_array($student_log_topic['topic_id'], $stud_all_sel_topic)) {
                        $stud_all_sel_topic[] = $student_log_topic['topic_id'];
                 }
            }        
        }
    }
    
 
    //$stud_all_sel_year_id_val  = '';
    $stud_all_sel_topic_id_val = '';
    
    $ques_topic_cnt      = array();
    $ques_cor_ans_cnt   = array();
    
    /*
    if(count($stud_all_sel_year)>0) {
        $stud_all_sel_year_id_val = implode(',',$stud_all_sel_year);
    }
    */
    
     if(count($stud_all_sel_topic)>0) {
        $stud_all_sel_topic_id_val = implode(',',$stud_all_sel_topic);
    }
	
	    
    $data = array();
    //if($stud_all_sel_year_id_val != '' && $stud_all_sel_topic_id_val!='') {
   if($stud_all_sel_topic_id_val!='') {
        //total questions year , topic 
       /* 
       $student_log_question  = $com->selectAll('q.*,year.year,subject.name As subject_name,t.name As topic_name',' question As q LEFT JOIN year ON q.year_id=year.year_id '
            . 'LEFT JOIN topic As t ON q.topic_id=t.topic_id LEFT JOIN subject ON t.subject_id=subject.subject_id',' q.year_id IN ('.$stud_all_sel_year_id_val.') AND q.topic_id IN ('.$stud_all_sel_topic_id_val.')'); 
        */
		
       //total questions  topic 
       $student_log_question  = $com->selectAll('q.*,year.year,subject.name As subject_name,t.name As topic_name',' question As q LEFT JOIN year ON q.year_id=year.year_id '
            . 'LEFT JOIN topic As t ON q.topic_id=t.topic_id LEFT JOIN subject ON t.subject_id=subject.subject_id',' q.topic_id IN ('.$stud_all_sel_topic_id_val.')'); 
        
        if(count($student_log_question)>0) {
            foreach($student_log_question as $student_log_question_val) {
                if(!isset($ques_topic_cnt[$student_log_question_val['topic_id']]['count'])){
                    $ques_topic_cnt[$student_log_question_val['topic_id']]['count'] = 0;
                }
                $ques_topic_cnt[$student_log_question_val['topic_id']]['count']              =  $ques_topic_cnt[$student_log_question_val['topic_id']]['count'] + 1;
                $ques_topic_cnt[$student_log_question_val['topic_id']]['topic_name']         =  $student_log_question_val['topic_name'];
                $ques_topic_cnt[$student_log_question_val['topic_id']]['subject_name']       =  $student_log_question_val['subject_name'];
         
            }   
        }		
		
        
        //answered,correct answer count year,topic
        /*
        $student_log_answer = $com->selectAll('student_log_detail.*,year.year,question.topic_id',' student_log LEFT JOIN student_log_detail ON student_log.student_log_id=student_log_detail.student_log_id '
                . 'LEFT JOIN question ON student_log_detail.question_id=question.question_id LEFT JOIN year ON question.year_id=year.year_id','student_log_detail.student_log_id='.$lid.' ORDER BY student_log_id,student_log_detail_id ASC');
        */
        $student_log_answer = $com->selectAll('student_log_detail.*,question.answer,year.year,question.topic_id',' student_log LEFT JOIN student_log_detail ON student_log.student_log_id=student_log_detail.student_log_id '
                . 'LEFT JOIN question ON student_log_detail.question_id=question.question_id LEFT JOIN year ON question.year_id=year.year_id','student_log_detail.student_log_id='.$lid.' ORDER BY student_log_id,student_log_detail_id ASC');
       
        
        $tmp_stud_log_queston_id = array(); //rmv mul question  in student log details
        foreach($student_log_answer as $student_log_answer_val) {
            if($student_log_answer_val['student_log_id']!='') {
                if(!isset($tmp_stud_log_queston_id[$student_log_answer_val['student_log_id']]) || !in_array($student_log_answer_val['question_id'], $tmp_stud_log_queston_id[$student_log_answer_val['student_log_id']]))
                {        
                    $tmp_stud_log_queston_id[$student_log_answer_val['student_log_id']][] = $student_log_answer_val['question_id'];
                    if(!isset($ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['correct_cnt']))
                    { 
                        $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['correct_cnt'] = 0;
                    }       

                    if(!isset($ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['answerd_cnt']))
                    { 
                        $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['answerd_cnt'] = 0;
                    }

                    
                    if($student_log_answer_val['student_answer']!=''){                        
                 
                        $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['answerd_cnt'] = $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['answerd_cnt']+1;
                       
                    } 

                    if($student_log_answer_val['answer']==$student_log_answer_val['student_answer']){
                        $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['correct_cnt'] = $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['correct_cnt']+1;
                    }

                    } 
            } 
        }
        
        
        
         foreach($stud_log_topic_by_log[$lid] as $student_log_subj_subj=>$student_log_subj)
         {    
            //topic
            {
                 foreach($student_log_subj as $student_log_subj_topic_id=>$student_log_subj_topic)
                 {
                     $data[$student_log_subj_topic_id]['topic_id']      = $student_log_subj_topic_id;
                     $data[$student_log_subj_topic_id]['subject_name']  = $student_log_subj_subj;
                     $data[$student_log_subj_topic_id]['topic_name']    = $student_log_subj_topic;
                     
                     
                     $tot_topic_question = 0;
                     if(isset($ques_topic_cnt[$student_log_subj_topic_id]['count'])) {
                            $tot_topic_question = $ques_topic_cnt[$student_log_subj_topic_id]['count'];
                     }                     
                     $data[$student_log_subj_topic_id]['totalcnt'] = $tot_topic_question;                     
                     
                     
                    $answerd_topic_question = 0;
                    if(isset($ques_cor_ans_cnt[$lid][$student_log_subj_topic_id]['answerd_cnt'])) {
                        $answerd_topic_question = $ques_cor_ans_cnt[$lid][$student_log_subj_topic_id]['answerd_cnt'];
                    }
                    $data[$student_log_subj_topic_id]['answerdcnt'] = $answerd_topic_question;
                    
                    
                    $correct_topic_question = 0;
                    if(isset($ques_cor_ans_cnt[$lid][$student_log_subj_topic_id]['correct_cnt'])) {
                        $correct_topic_question = $ques_cor_ans_cnt[$lid][$student_log_subj_topic_id]['correct_cnt'];
                    }
                    $data[$student_log_subj_topic_id]['correctcnt'] = $correct_topic_question;           
                    
                    $data[$student_log_subj_topic_id]['wrongcnt'] =  $data[$student_log_subj_topic_id]['answerdcnt'] - $data[$student_log_subj_topic_id]['correctcnt'];
                     
                 }
            }
         }
   }
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
    

});

$app->get('/get_question_answer/:qid', function($qid) {
    $res = array('error' => true, 'message' => 'No records found');
    $obj = new Common();
    $question_ans = $obj->selectRow('*', 'question', 'question_id = ' . $qid);
    if (count($question_ans) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $question_ans['answer'];
    }
    echoRespnse(201, $res);
});


$app->get('/free_user_get_student_answer/:qid/:logid', function($qid,$log_id) {
    $res = array('error' => true, 'message' => 'No records found');
    $obj = new Common();
    $question_ans = $obj->selectRow('*', 'free_user_log_detail', 'question_id = ' . $qid.' AND student_log_id='.$log_id);
    if (count($question_ans) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $question_ans['student_answer'];
    }
    echoRespnse(201, $res);
});


$app->get('/get_student_answer/:qid/:logid', function($qid,$log_id) {
    $res = array('error' => true, 'message' => 'No records found');
    $obj = new Common();
    $question_ans = $obj->selectRow('*', 'student_log_detail', 'question_id = ' . $qid.' AND student_log_id='.$log_id);
    if (count($question_ans) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $question_ans['student_answer'];
    }
    echoRespnse(201, $res);
});

$app->get('/get_student_notsure_answer/:qid/:logid', function($qid,$log_id) {
    $res = array('error' => true, 'message' => 'No records found');
    $obj = new Common();
    $question_ans = $obj->selectRow('*', 'student_log_detail', 'question_id = ' . $qid.' AND student_log_id='.$log_id);
    if (count($question_ans) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $question_ans['student_answer'];
        $res['data_notsure'] = $question_ans['student_notsure_answer'];
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


$app->post('/free_user_store_duration_question', function() use ($app) {
    $res = array('error' => true, 'message' => 'Invalid login details');
    $data = $app->request->post();
    $obj = new Common();
    $record = $obj->selectRow('*', 'free_user_log', 'student_log_id=' . $data['student_log']);
    if (count($record) > 0) {
        $res['error'] = false;
        $res['message'] = 'studnet log updated successfully';
         
        
        //get answered count from student_answer table
        $question_ans = $obj->selectAll('*', 'free_user_log_detail', 'student_log_id='.$data['student_log']);
        $cnt_question_ans = count($question_ans);
        //update
        $obj->updateRecordWithWhere(array('no_ques_duration' => $cnt_question_ans), 'free_user_log','student_log_id=' . $data['student_log']);
        
        // exit;
    } else {
        $res['message'] = 'Unable to update studnet log';
    }
    echoRespnse(201, $res);
});


$app->post('/store_duration_question', function() use ($app) {
    $res = array('error' => true, 'message' => 'Invalid login details');
    $data = $app->request->post();
    $obj = new Common();
    $record = $obj->selectRow('*', 'student_log', 'student_log_id=' . $data['student_log']);
    if (count($record) > 0) {
        $res['error'] = false;
        $res['message'] = 'studnet log updated successfully';
         
        
        //get answered count from student_answer table
        $question_ans = $obj->selectAll('*', 'student_log_detail', 'student_log_id='.$data['student_log']);
        $cnt_question_ans = count($question_ans);
        //update
        $obj->updateRecordWithWhere(array('no_ques_duration' => $cnt_question_ans), 'student_log','student_log_id=' . $data['student_log']);
        
        // exit;
    } else {
        $res['message'] = 'Unable to update studnet log';
    }
    echoRespnse(201, $res);
});

$app->post('/store_stud_duration', function() use ($app) {
    $res = array('error' => true, 'message' => 'Invalid login details');
    $data = $app->request->post();
    $obj = new Common();
    $record = $obj->selectRow('*', 'student_log', 'student_log_id=' . $data['student_log']);
    if (count($record) > 0) {
        $res['error'] = false;
        $res['message'] = 'studnet log updated successfully';
     
         //update
        $obj->updateRecordWithWhere(array('stud_time_taken_sec' => $data['stud_duration']), 'student_log','student_log_id=' . $data['student_log']);
        
        // exit;
    } else {
        $res['message'] = 'Unable to update studnet log';
    }
    echoRespnse(201, $res);
});



$app->post('/free_user_store_stud_duration', function() use ($app) {
    $res = array('error' => true, 'message' => 'Invalid login details');
    $data = $app->request->post();
    $obj = new Common();
    $record = $obj->selectRow('*', 'free_user_log', 'student_log_id=' . $data['student_log']);
    if (count($record) > 0) {
        $res['error'] = false;
        $res['message'] = 'studnet log updated successfully';
     
         //update
        $obj->updateRecordWithWhere(array('stud_time_taken_sec' => $data['stud_duration']), 'free_user_log','student_log_id=' . $data['student_log']);
        
        // exit;
    } else {
        $res['message'] = 'Unable to update studnet log';
    }
    echoRespnse(201, $res);
});




$app->get('/get_student_log_time_info/:logid', function($log_id) {
    $res = array('error' => true, 'message' => 'No records found');
    $obj = new Common();
    $question_ans = $obj->selectRow('*', 'student_log', 'student_log_id = ' . $log_id);
    if (count($question_ans) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['ques_answered'] =  $question_ans['no_ques_duration'];
        $res['ques_duration'] =  $question_ans['stud_time_taken_sec'];
    }
    echoRespnse(201, $res);
});


$app->get('/free_user_get_student_log_time_info/:logid', function($log_id) {
    $res = array('error' => true, 'message' => 'No records found');
    $obj = new Common();
    $question_ans = $obj->selectRow('*', 'free_user_log', 'student_log_id = ' . $log_id);
    if (count($question_ans) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['ques_answered'] =  $question_ans['no_ques_duration'];
        $res['ques_duration'] =  $question_ans['stud_time_taken_sec'];
    }
    echoRespnse(201, $res);
});



$app->post('/samplelogin', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('name' => $data['name'], 'phone' => $data['phone'], 'email' => $data['email'],'created_at'=>date('Y-m-d H:i:s')), 'free_user_login');
    if ($record > 0) {
        $_SESSION['free_user_id'] = $record;
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

$app->post('/get_start', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->insertRecord(array('email' => $data['email']), 'subscription');
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record inserted successfully';
    }
    echoRespnse(201, $res);
});

//$app->post('/buy_user_register', function() use ($app) {
//    $res = array('error' => true, 'message' => 'Unable to insert');
//    $data = $app->request->post();
//    $com = new Common();
//    $record = $com->insertRecord(array('firstname' => $data['firstname'], 'lastname' => $data['lastname'], 'gender' => $data['gender'], 'phone' => $data['phone'], 'email' => $data['email'], 'address' => $data['address']), 'buy_user_register');
//    if ($record > 0) {
//        $res['error'] = false;
//        $res['message'] = 'Record inserted successfully';
//    }
//    echoRespnse(201, $res);
//});

$app->post('/buy_user_register', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $exist = $com->selectRow('*', 'buy_user_register', 'firstname=\'' . $data['firstname'] . '\'');
    if (count($exist) == 0) {
        $record = $com->insertRecord(array('firstname' => $data['firstname'], 'lastname' => $data['lastname'], 'gender' => $data['gender'], 'phone' => $data['phone'], 'email' => $data['email'], 'address' => $data['address']), 'buy_user_register');
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



$app->post('/store_student_pause', function() use ($app) {
    $res = array('error' => true, 'message' => 'Invalid login details');
    $data = $app->request->post();
    $obj = new Common();
    $record = $obj->selectRow('*', 'student_log_pause', 'student_id=' . $data['student']);
    if (count($record) == 0) {
        $res['error'] = false;
        $res['message'] = 'Pause inserted successfully';      
            /*
             echo "<pre>";
             print_r($data);
             exit;
             * 
             */
             $obj->insertRecord(array('student_id' => $data['student'], 'student_log_id' => $data['log'],'pause_question' => $data['ques'], 'pause_date' => date('Y-m-d H:i:s')), 'student_log_pause');
            
         
        }else {
           $res['error'] = false;
           $res['message'] = 'Pause inserted successfully';      
           $obj->updateRecordWithWhere(array('student_id' => $data['student'],  'student_log_id' => $data['log'], 'pause_question'=>$data['ques'],'pause_date'=>date('Y-m-d H:i:s')), 'student_log_pause','student_id='. $data['student']);
           
        }     
        // exit;
       echoRespnse(201, $res);
});



$app->get('/get_result_detail_ans_cnt/:lid', function($lid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    //$data = $com->selectAll('*', 'student_log_detail', 'student_log_id = ' . $lid);
    $data = $com->selectRow('count(sld.student_log_detail_id) As ans_cnt', 'student_log_detail As sld INNER JOIN question As q ON sld.question_id=q.question_id', 'student_log_id = ' . $lid);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['ans_cnt'] = $data['ans_cnt'];
    }
    echoRespnse(201, $res);
});


$app->get('/free_user_get_result_detail_ans_cnt/:lid', function($lid) {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    //$data = $com->selectAll('*', 'student_log_detail', 'student_log_id = ' . $lid);
    $data = $com->selectRow('count(sld.student_log_detail_id) As ans_cnt', 'free_user_log_detail As sld INNER JOIN question As q ON sld.question_id=q.question_id', 'student_log_id = ' . $lid);
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['ans_cnt'] = $data['ans_cnt'];
    }
    echoRespnse(201, $res);
});