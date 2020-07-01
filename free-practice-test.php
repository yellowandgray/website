<?php
session_start();
include('free-register-check.php');
require_once 'api/include/common.php';
$questions = array();
$obj = new Common();
$type = '';
$testmode = 0;
ini_set('date.timezone', 'Asia/Kolkata');

if (isset($_SESSION['testmode'])) {
    $testmode = $_SESSION['testmode'];
}


if (isset($_SESSION['free_user_id'])) {
    $student_register_id = $_SESSION['free_user_id'];
}


$quiz_from_page = '';
if (isset($_GET['from-page']) && ($_GET['from-page'] == 'quiz')) {

    $quiz_from_page = 'quiz';
    $attended_questions = 0;
    
    $student_log = $obj->selectRow('sl.*,l.name As language_name', 'free_user_log sl LEFT JOIN language l ON sl.language_id=l.language_id', 'student_register_id=' . $student_register_id . ' ORDER BY student_log_id DESC LIMIT 1');


    if (count($student_log) > 0) {


        $student_log_order = $obj->selectRow('slo.*', 'free_user_log AS sl LEFT JOIN free_user_log_order As slo  ON sl.student_log_id=slo.student_log_id', ' sl.student_register_id=' . $student_register_id . ' AND sl.student_log_id=' . $student_log['student_log_id']);


        if (count($student_log_order) > 0) {

            if ($student_log_order['student_log_order'] == 1) {

                $student_log_year = $obj->selectAll('sly.*,y.year As year', 'free_user_log AS sl LEFT JOIN free_user_log_year As sly ON sl.student_log_id=sly.student_log_id LEFT JOIN year As y ON y.year_id=sly.year_id', ' sl.student_register_id=' . $student_register_id);

                $ans_log_year = array();
                if (count($student_log_year) > 0) {
                    foreach ($student_log_year as $student_log_year_v) {
                        $ans_log_year[$student_log_year_v['student_log_id']][] = $student_log_year_v['year'];
                    }
                }
            } else if ($student_log_order['student_log_order'] == 2) {

                $student_log_topic = $obj->selectAll('slt.*,t.name As topic_name,subject.subject_id As subject_id,subject.name As subject_name', 'free_user_log As sl'
                        . ' LEFT JOIN free_user_log_topic slt ON sl.student_log_id=slt.student_log_id LEFT JOIN topic As t ON slt.topic_id=t.topic_id LEFT JOIN subject ON '
                        . 't.subject_id=subject.subject_id', 'sl.student_register_id = ' . $student_register_id . ' AND sl.student_log_id=' . $student_log['student_log_id'] . ' AND sl.student_log_id IS NOT NULL AND sl.student_log_id<>\'\' ORDER BY student_log_id,subject.subject_id,t.topic_id ASC');




                $stud_all_sel_topic = Array();
                $stud_log_topic_by_log = array();
                if (count($student_log_topic) > 0) {
                    foreach ($student_log_topic as $student_log_topic) {
                        if ($student_log_topic['student_log_id'] != '') {
                            $stud_log_topic_by_log[$student_log_topic['student_log_id']][$student_log_topic['subject_name']][$student_log_topic['topic_id']] = $student_log_topic['topic_name'];
                            if (!in_array($student_log_topic['topic_id'], $stud_all_sel_topic)) {
                                $stud_all_sel_topic[] = $student_log_topic['topic_id'];
                            }
                        }
                    }
                }



                $stud_all_sel_topic_id_val = '';

                $ques_year_cnt = array();
                $ques_cor_ans_cnt = array();



                if (count($stud_all_sel_topic) > 0) {
                    $stud_all_sel_topic_id_val = implode(',', $stud_all_sel_topic);
                }



                //total questions count in topic
                if ($stud_all_sel_topic_id_val != '') {



                    $yid = array();
                    $years = $obj->selectAll('y.*', 'year As y', 'status = 1 ORDER BY y.year ASC LIMIT 3');
                   
                    foreach ($years as $y) {
                        $yid[] = $y['year_id'];
                    }
                    if (count($yid) > 0) {
                        $yids = implode(',', $yid);
                    }






                    //total questions year , topic 
                    $student_log_question = $obj->selectAll('q.*,year.year,subject.name As subject_name,t.name As topic_name', ' question As q LEFT JOIN year ON q.year_id=year.year_id '
                            . 'LEFT JOIN topic As t ON q.topic_id=t.topic_id LEFT JOIN subject ON t.subject_id=subject.subject_id', ' q.topic_id IN (' . $stud_all_sel_topic_id_val . ') AND q.year_id IN (' . $yids . ')');



                    if (count($student_log_question) > 0) {
                        foreach ($student_log_question as $student_log_question_val) {
                            if (!isset($ques_year_cnt[$student_log_question_val['topic_id']]['count'])) {
                                $ques_year_cnt[$student_log_question_val['topic_id']]['count'] = 0;
                            }
                            $ques_year_cnt[$student_log_question_val['topic_id']]['count'] = $ques_year_cnt[$student_log_question_val['topic_id']]['count'] + 1;
                            $ques_year_cnt[$student_log_question_val['topic_id']]['topic_name'] = $student_log_question_val['topic_name'];
                            $ques_year_cnt[$student_log_question_val['topic_id']]['subject_name'] = $student_log_question_val['subject_name'];
                        }
                    }



                    $student_log_answer = $obj->selectAll('free_user_log_detail.*,year.year,question.answer,question.topic_id', ' free_user_log LEFT JOIN free_user_log_detail ON free_user_log.student_log_id=free_user_log_detail.student_log_id '
                            . 'LEFT JOIN question ON free_user_log_detail.question_id=question.question_id LEFT JOIN year ON question.year_id=year.year_id', 'free_user_log.student_register_id=' . $student_register_id . ' AND free_user_log.student_log_id=' . $student_log['student_log_id'] . ' ORDER BY student_log_id DESC,student_log_detail_id DESC');



                    $stud_topic_order = array();
                    $stud_topic_logs = array();


                    $tmp_stud_log_queston_id = array(); //rmv mul question  in student log details
                    foreach ($student_log_answer as $student_log_answer_val) {
                        if ($student_log_answer_val['student_log_id'] != '') {
                            if (!isset($tmp_stud_log_queston_id[$student_log_answer_val['student_log_id']]) || !in_array($student_log_answer_val['question_id'], $tmp_stud_log_queston_id[$student_log_answer_val['student_log_id']])) {

                                $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['date'] = date('d/m/Y', strtotime($student_log_answer_val['created_at']));

                                if (!in_array($student_log_answer_val['topic_id'], $stud_topic_order)) {
                                    $stud_topic_order[] = $student_log_answer_val['topic_id'];
                                }

                                if (!isset($stud_topic_logs[$student_log_answer_val['topic_id']]) || !in_array($student_log_answer_val['student_log_id'], $stud_topic_logs[$student_log_answer_val['topic_id']])) {
                                    $stud_topic_logs[$student_log_answer_val['topic_id']][] = $student_log_answer_val['student_log_id'];
                                }

                                $tmp_stud_log_queston_id[$student_log_answer_val['student_log_id']][] = $student_log_answer_val['question_id'];
                                if (!isset($ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['correct_cnt'])) {
                                    $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['correct_cnt'] = 0;
                                }


                                if (!isset($ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['answerd_cnt'])) {
                                    $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['answerd_cnt'] = 0;
                                }


                                if ($student_log_answer_val['student_answer'] != '') {

                                    $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['answerd_cnt'] = $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['answerd_cnt'] + 1;
                                }

                                if ($student_log_answer_val['answer'] == $student_log_answer_val['student_answer']) {
                                    $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['correct_cnt'] = $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['correct_cnt'] + 1;
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    if ($student_register_id != 0) {
        $student = $obj->selectRow('*', 'free_user_login', 'free_user_login_id = ' . $student_register_id);
    }



   
} else {

    if (!isset($_SESSION['student_selected_type'])) {
        header('Location: free-select-language');
    }


    $other_language = $obj->selectRow('*', 'language', 'language_id <> ' . $_SESSION['student_selected_language_id']);
    $attended_questions = 0;
    if ($_SESSION['student_selected_type'] == 'order') {
        if (isset($_SESSION['student_selected_topics_id'])) {
            unset($_SESSION['student_selected_topics_id']);
        }
        if (isset($_SESSION['student_selected_years_id'])) {
            unset($_SESSION['student_selected_years_id']);
        }

        if (!isset($_GET['year'])) {
            header('Location: qorder-years');
        }

        $type = 'Year Order';
        $selyear = $obj->selectRow('*', 'year', 'year=\'' . $_GET['year'] . '\'');
        $_SESSION['student_selected_year_id'] = $selyear['year_id'];

        $questions = $obj->selectAll('name,year_id, a, b, c, d, UPPER(answer) AS answer, image_path, direction,question_id,explanation,image_path_explanation,explanation_img_direction,question_no', 'question', 'topic_id IN (SELECT t.topic_id FROM topic AS t LEFT JOIN subject AS s ON s.subject_id = t.subject_id WHERE s.language_id = ' . $_SESSION['student_selected_language_id'] . ') AND year_id = ' . $_SESSION['student_selected_year_id'] . ' ORDER BY question_no ASC,year_id ASC, topic_id ASC');
        //if($testmode==1){
        $other_lang_questions = $obj->selectAll('name,year_id, a, b, c, d, UPPER(answer) AS answer, image_path, direction,question_id,explanation,image_path_explanation,explanation_img_direction,question_no', 'question', 'topic_id IN (SELECT t.topic_id FROM topic AS t LEFT JOIN subject AS s ON s.subject_id = t.subject_id WHERE s.language_id = ' . $other_language['language_id'] . ') AND year_id = ' . $_SESSION['student_selected_year_id'] . ' ORDER BY question_no ASC,year_id ASC, topic_id ASC');
        //}
        //resume log
        $student_log_v = '';
        if (isset($_REQUEST['from_log']) && ($_REQUEST['from_log'] != '') && ($student_register_id != 0)) {
            $check_log = $obj->selectRow('*', 'student_log', 'student_log_id=' . $_REQUEST['from_log'] . ' AND student_register_id=' . $student_register_id);
            if (count($check_log) < 1) {
                header('Location: qorder-years');
            } else {
                $student_log_v = $_REQUEST['from_log'];
            }
        }

        if ($student_log_v == '') {
            $student_log = $obj->insertRecord(array('language_id' => $_SESSION['student_selected_language_id'], 'student_register_id' => $student_register_id, 'total_questions' => count($questions), 'created_at' => date('Y-m-d H:i:s'), 'created_by' => $student_register_id, 'updated_at' => date('Y-m-d H:i:s'), 'updated_by' => $student_register_id), 'free_user_log');
            $student_log_order = $obj->insertRecord(array('student_log_id' => $student_log, 'student_log_order' => 1), 'free_user_log_order');

            $student_log_year = $obj->insertRecord(array('student_log_id' => $student_log, 'year_id' => $_SESSION['student_selected_year_id']), 'free_user_log_year');
        } else {
            //update log
            $student_log = $student_log_v;
            $student_log_update = $obj->updateRecordWithWhere(array('updated_at' => date('Y-m-d H:i:s'), 'student_register_id' => $student_register_id), 'free_user_log', ' student_log_id=' . $student_log);
            $log_details = $obj->selectRow('COUNT(student_log_detail_id) AS attended, IFNULL((SELECT COUNT(student_log_detail_id) FROM free_user_log_detail '
                    . '  WHERE student_log_id=' . $student_log . ' AND UPPER(answer) = UPPER(student_answer)), 0) AS correct_answers',
                    'free_user_log_detail', 'student_log_id=' . $student_log);

            if (count($log_details) > 0) {
                $attended_questions = $log_details['attended'];
            }
        }
    }
    if ($_SESSION['student_selected_type'] == 'subject') {
        if (isset($_SESSION['student_selected_year_id'])) {
            unset($_SESSION['student_selected_year_id']);
        }
       

        if (!isset($_GET['topics'])) {
            header('Location: subject');
        }
        $_SESSION['student_selected_topics_id'] = $_GET['topics'];


        $yid = array();
        $years = $obj->selectAll('y.*', 'year As y', 'status = 1 ORDER BY y.year ASC LIMIT 3');
        
        foreach ($years as $y) {
            $yid[] = $y['year_id'];
        }
        if (count($yid) > 0) {
            $yids = implode(',', $yid);
        }


        $type = 'Subject Order';
        //$_SESSION['student_selected_years_id'] = $_GET['years'];
        $questions = $obj->selectAll('question.year_id,year.year,question.name As name, a, b, c, d, UPPER(answer) AS answer, image_path, direction,question_id,explanation,image_path_explanation,explanation_img_direction,question_no', 'question LEFT JOIN topic ON question.topic_id=topic.topic_id LEFT JOIN year ON question.year_id=year.year_id', 'question.topic_id IN (SELECT t.topic_id FROM topic AS t LEFT JOIN subject AS s ON s.subject_id = t.subject_id WHERE s.language_id = ' . $_SESSION['student_selected_language_id'] . ' AND t.topic_id IN (' . $_SESSION['student_selected_topics_id'] . ') ORDER BY t.subject_id ASC) AND question.year_id IN (' . $yids . ') ORDER BY subject_id ASC,question.topic_id ASC,year.year DESC,question_no ASC');

        $qu_cond = array();
        if (count($questions) > 0) {
            foreach ($questions as $qu) {
                $qu_cond[] = '(year_id=' . $qu['year_id'] . ' AND question_no=' . $qu['question_no'] . ')';
            }
        }

        $qu_conds = '';
        if (count($qu_cond) > 0) {
            $qu_conds = ' AND (' . implode(' OR ', $qu_cond) . ')';
        }

        
        $other_lang_questions = $obj->selectAll('question.name As name, a, b, c, d, UPPER(answer) AS answer, image_path, direction,question_id,explanation,image_path_explanation,explanation_img_direction,question_no,year_id', 'question LEFT JOIN topic ON question.topic_id=topic.topic_id', 'question.topic_id IN (SELECT t.topic_id FROM topic AS t LEFT JOIN subject AS s ON s.subject_id = t.subject_id WHERE s.language_id = ' . $other_language['language_id'] . ') ' . $qu_conds . '  ORDER BY question_no ASC,subject_id ASC,question.topic_id ASC,year_id ASC');

        //}
        $student_log = $obj->insertRecord(array('language_id' => $_SESSION['student_selected_language_id'],
            'student_register_id' => $student_register_id, 'total_questions' => count($questions),
            'created_at' => date('Y-m-d H:i:s'), 'created_by' => $student_register_id, 'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $student_register_id), 'free_user_log');

        $student_log_order = $obj->insertRecord(array('student_log_id' => $student_log, 'student_log_order' => 2), 'free_user_log_order');


        if (isset($_SESSION['student_selected_years_id']) && ($_SESSION['student_selected_years_id'] != '')) {
            $student_selected_years_id_arr = explode(',', $_SESSION['student_selected_years_id']);
            foreach ($student_selected_years_id_arr as $student_selected_years_id_val) {
                $student_log_year = $obj->insertRecord(array('student_log_id' => $student_log, 'year_id' => $student_selected_years_id_val), 'free_user_log_year');
            }
        }

        if (isset($_SESSION['student_selected_topics_id']) && ($_SESSION['student_selected_topics_id'] != '')) {
            $student_selected_topics_id_arr = explode(',', $_SESSION['student_selected_topics_id']);
            foreach ($student_selected_topics_id_arr as $student_selected_topics_id_val) {
                $student_log_topic = $obj->insertRecord(array('student_log_id' => $student_log, 'topic_id' => $student_selected_topics_id_val), 'free_user_log_topic');
            }
        }
    }

   

    if ($student_register_id != 0) {
        $student = $obj->selectRow('*', 'free_user_login', 'free_user_login_id = ' . $student_register_id);
    }
    
    $language = $obj->selectRow('*', 'language', 'language_id = ' . $_SESSION['student_selected_language_id']);

    $questions_list = array();
    if (count($questions) > 0) {
        foreach ($questions as $q) {
            $options = array();
            $showimg = false;
            $show_img = false;

            array_push($options, array('text' => $q['a'], 'correct' => ($q['answer'] == 'A' ? true : false)));
            array_push($options, array('text' => $q['b'], 'correct' => ($q['answer'] == 'B' ? true : false)));
            if (isset($q['c'])) {
                array_push($options, array('text' => $q['c'], 'correct' => ($q['answer'] == 'C' ? true : false)));
            }
            if (isset($q['d'])) {
                array_push($options, array('text' => $q['d'], 'correct' => ($q['answer'] == 'D' ? true : false)));
            }
            if ($q['image_path'] != '') {
                $showimg = true;
            }
            if ($q['image_path_explanation'] != '') {
                $show_img = true;
            }
            

            $qyear = '';
            if (isset($q['year'])) {
                $qyear = $q['year'];
            }
            array_push($questions_list, array(
                'text' => $q['name'],
                'direction' => $q['direction'],
                'image_path' => $q['image_path'],
                'show_image' => $showimg,
                'show_image_explanation' => $show_img,
                'question_id' => $q['question_id'],
                'responses' => $options,
                'answer' => $q['answer'],
                'explanation' => $q['explanation'],
                'image_path_explanation' => $q['image_path_explanation'],
                'explanation_img_direction' => $q['explanation_img_direction'],
                'question_no' => $q['question_no'],
                'year_id' => $q['year_id'],
                'year' => $qyear
            ));

            
        }
    }


//if($testmode==1){ 
    $otherlang_questions_list = array();
    if (count($other_lang_questions) > 0) {
        foreach ($other_lang_questions as $oq) {
            $options = array();
            $showimg = false;
            $show_img = false;

            array_push($options, array('text' => $oq['a'], 'correct' => ($oq['answer'] == 'A' ? true : false)));
            array_push($options, array('text' => $oq['b'], 'correct' => ($oq['answer'] == 'B' ? true : false)));
            if (isset($oq['c'])) {
                array_push($options, array('text' => $oq['c'], 'correct' => ($oq['answer'] == 'C' ? true : false)));
            }
            if (isset($oq['d'])) {
                array_push($options, array('text' => $oq['d'], 'correct' => ($oq['answer'] == 'D' ? true : false)));
            }
            if ($oq['image_path'] != '') {
                $showimg = true;
            }
            if ($oq['image_path_explanation'] != '') {
                $show_img = true;
            }


            array_push($otherlang_questions_list, array(
                'text' => $oq['name'],
                'direction' => $oq['direction'],
                'image_path' => $oq['image_path'],
                'show_image' => $showimg,
                'show_image_explanation' => $show_img,
                'question_id' => $oq['question_id'],
                'responses' => $options,
                'answer' => $oq['answer'],
                'explanation' => $oq['explanation'],
                'image_path_explanation' => $oq['image_path_explanation'],
                'explanation_img_direction' => $oq['explanation_img_direction'],
                'question_no' => $oq['question_no'],
                'year_id' => $oq['year_id']
            ));
        }
    }
//}


    if (isset($_SESSION['student_selected_topics_id']) && ($_SESSION['student_selected_topics_id'] != '')) {
        $subj_topic = $obj->selectAll('t.*,s.name As subject', ' topic AS t LEFT JOIN subject AS s ON s.subject_id = t.subject_id', ' t.topic_id IN (' . $_SESSION['student_selected_topics_id'] . ')  ORDER BY subject_id, topic_id ASC');
        $sub_topic_val = '';
        if (count($subj_topic) > 0) {
            $sub_topic_arr = array();
            foreach ($subj_topic as $val) {
                $sub_topic_arr[$val['subject']][] = $val['name'];
            }

            foreach ($sub_topic_arr as $stak => $stav) {
                if ($sub_topic_val != '') {
                    $sub_topic_val .= ', ';
                }
                $sub_topic_val .= $stak;
                $sub_topic_val .= ' (' . implode(', ', $stav) . ') ';
            }
        }
    }




    $sel_year_val = '';
    if (isset($_SESSION['student_selected_years_id']) && ($_SESSION['student_selected_years_id'] != '')) {
        $yearres = $obj->selectAll('year', 'year', ' year_id IN (' . $_SESSION['student_selected_years_id'] . ')');
        if (count($yearres) > 0) {
            $selyearr = array();
            foreach ($yearres as $yval) {
                $selyearr[] = $yval['year'];
            }
            $sel_year_val = implode(', ', $selyearr);
        }
    } else if (isset($_SESSION['student_selected_year_id']) && ($_SESSION['student_selected_year_id'] != '')) {
        $yearres = $obj->selectRow('year', 'year', ' year_id = ' . $_SESSION['student_selected_year_id']);
        $sel_year_val = $yearres['year'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php
    $page = 'about';
    include 'head.php';
    ?>
    <body class="goto-here">
        <!--container-->
        <?php include 'menu.php'; ?>
        <div class="quiz-section" <?php
        if ($quiz_from_page != 'quiz') {
            echo 'style="display:none;"';
        }
        ?>>
            <section class="container">
                <div class="row">
                    <div class="span12" id="app">

                        <?php if ($quiz_from_page != 'quiz') { ?>
                            <div class="quiz-question-section" v-if="questionIndex < quiz.questions.length">

                                <a  onclick="goBack();"  v-if="!showqap"><i class = 'font-icon-arrow-simple-left'></i></a>
                                <a  @click="showqus()"  v-if="showqap"><i class = 'font-icon-arrow-simple-left'></i></a>


                                <h4 id="mySigninModalLabel" class="text-center quiz-heading-width">
                                    <table class="table-title">
                                        <tr>
                                            <td valign="top">Selected Language</td>
                                            <td valign="top" class="w-5">:</td>
                                            <th valign="top"><?php echo $language['name']; ?></th>
                                        </tr>
                                        <tr>
                                            <td valign="top">Selected Order</td>
                                            <td valign="top" class="w-5">:</td>
                                            <th valign="top"><?php echo $type; ?></th>
                                        </tr>
                                        <?php if (isset($_SESSION['student_selected_topics_id']) && ($_SESSION['student_selected_topics_id'] != '')) { ?>
                                            <tr>
                                                <td valign="top">Selected Subject and Topics</td>
                                                <td valign="top" class="w-5">:</td>
                                                <th valign="top"><?php echo $sub_topic_val; ?></th>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($type == 'Year Order') { ?>   
                                            <tr>
                                                <td valign="top">Selected Year</td>
                                                <td valign="top" class="w-5">:</td>
                                                <th valign="top"><?php echo $sel_year_val; ?></th>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </h4>
                                <?php if (["student_register_id > 0"] == '') { ?>
                                <a class="home_link" href="member-select-language">
                                        <i class="icon-home"></i>
                                    </a>
                                <?php } else { ?>
                                    <a class="home_link" href="free-select-language">
                                        <i class="icon-home"></i>
                                    </a>
                                <?php } ?>


                            </div>

                            <!--question Box-->
                            <?php /*
                              <div class="questionBox" id="app">
                             * 
                             */ ?>
                            <!--question Box-->
                            <div class="questionBox">
                                <!--qusetionContainer-->
                                <div class="questionContainer" v-if="questionIndex<quiz.questions.length" v-bind:key="questionIndex">
                                    <div class="question-header" id="header-hidden">
                                        <!--progress-->
                                        <div class="progressContainer">


                                            <div class="quiz-div">
                                                <?php if ($type == 'Year Order' || $type == 'Subject Order') { ?>  
                                                    <div class="quiz-pause">
                                                        <div class="show-ans-sec">
                                                            <input id="show-immediately" type="checkbox" value="show_answer_immediately" @change="immChange" v-model="showimmediate"> <span class="span-position">Show Answer</span>
                                                        </div> 
                                                        <div class="show-ans-sec">
                                                            <input id="show-olq" type="checkbox" value="show_olq" @change="showolqChange" v-model="olqshow"> <span class="span-position">Show Question in <?php echo $other_language['name']; ?></span>
                                                        </div> 
                                                    </div>    
                                                <?php } ?>
                                                <?php if ($type == 'Year Order') { ?>
                                                    <div class="quiz-timer">
                                                        <span id="minutes">{{minuteslabel}}</span> : <span id="seconds">{{secondslabel}}</span>                             
                                                        <i class="icon-pause" v-if="!isTimerPaused" @click="pauseTimer()"></i>
                                                        <i class="icon-play" v-if="isTimerPaused" @click="playTimer()"></i>
                                                    </div>
                                                <?php } ?>
                                            </div>




                                            <!-- show question admin panel -->
                                            <?php if ($type == 'Year Order') { ?>  
                                                <div class="quiz-review">
                                                    <div class="float-left" style="padding: 20px 0;">
                                                        <!--a href="#" onclick="showqno();" class="btn logout-btn">Question Admin Panel</a  -->
                                                        <a  @click="showQuesPanel();" class="btn logout-btn">Question Admin Panel</a>
                                                    </div>
                                                </div>  
                                            <?php } ?>        
                                            <!-- show question admin panel -->




                                            <h1 class="title is-6">Test</h1> 
                                            <progress class="progress is-info is-small" :value="(questionIndex/quiz.questions.length)*100" max="100">{{(questionIndex/quiz.questions.length)*100}}%</progress>
                                            <div class="lenth_width">
                                                <span  class="label lable-blue">Total: {{quiz.questions.length}}</span>
                                                <?php /* <span class="label label-success">Answered: {{((quiz.questions.length)-(quiz.questions.length-questionIndex))}}</span> */ ?>
                                                <span  class="label label-success">Answered: {{anscntstud}}</span> 
                                            </div>
                                        </div>
                                        <!--/progress-->
                                    </div>

                                    <div v-if="!revShow">
                                        <!-- questionTitle -->
                                        <div class="quiz-year" v-if="quiz.questions[questionIndex].year" style="text-align: right;">
                                            <div class="float-right">
                                                <span class="label label-quiz-year">Year : {{quiz.questions[questionIndex].year}}</span>
                                            </div>
                                        </div>
                                        <div id="quiz-hidden">
                                            <div v-if="quiz.questions[questionIndex].show_image" class="text-center">
                                                <img style="width: 50%" v-if="quiz.questions[questionIndex].direction == 'top'" v-bind:src="'api/v1/'+quiz.questions[questionIndex].image_path" alt="image" class="qes-img" />
                                            </div>
                                            <h2 class="titleContainer title"><span class="quiz-question-no">{{questionIndex + 1}}.</span> <span class="quiz-question-title" v-html="quiz.questions[questionIndex].text"></span>
                                            </h2>
                                            <div v-if="quiz.questions[questionIndex].show_image" class="text-center">
                                                <img style="width: 50%" v-if="quiz.questions[questionIndex].direction == 'bottom'" v-bind:src="'api/v1/'+quiz.questions[questionIndex].image_path" alt="image" class="qes-img" />
                                            </div>
                                            <!-- quizOptions -->

                                            
                                            <div class="optionContainer">
                                                <div class="option" :id="index | charIndex | AddPrefix('ansopt_')" v-for="(response, index) in quiz.questions[questionIndex].responses" @click="selectOption(index)" :class="{ 'is-selected': userResponses[questionIndex] == index}" :key="index" v-if="response.text != ''">
                                                     <span class="q-option">{{ index | charIndex }}.&nbsp;</span> <span v-html="response.text"></span>
                                                </div>

                                                <!--div style="margin: 0 auto; text-align: center" v-if="questionIndex>0">
                                                        <a class="button" :class="(userResponses[questionIndex]==null)?'':'is-active'" v-on:click="prev();" :disabled="questionIndex>=quiz.questions.length">
                                                            Back
                                                        </a>
                                                    </div-->                                         
                                            </div>
                                            

                                        </div>


                                        <div class="question-admin-panel question-admin-panel-num" style="display: none;">
                                            <div class="question-number-title">
<!--                                                <span class="showqus" style="float: left;" onclick="showqus();"><i class="icon-angle-left"></i> Back</span>-->
                                                <h3>Question Admin Panel</h3>
                                            </div>
                                            <div id="questionpanel">
                                                
                                            </div>
                                            <div class="admin-panel-btns">
                                                <div class="row">
                                                    <div class="span-4">
                                                        <span class="answered-clr"></span> Answered
                                                    </div>
                                                    
                                                    <div class="span-4">
                                                        <span class="unanswered-clr"></span> Unanswered
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Start subject Result Filter Section -->
                                        <div class="result-filter-section" style="display: none;">
                                            <table>
                                                <tr>
                                                    <th>Subject</th>
                                                    <th>Topic</th>
                                                    <th>Total</th>
                                                    <th>Answered</th>
                                                    <th><i class="icon-ok"></i></th>
                                                    <th><i class="icon-remove"></i></th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                                <tr>
                                                    <td>History and Culture of India</td>
                                                    <td>Indus Valley Civilization</td>
                                                    <td>12</td>
                                                    <td>12</td>
                                                    <td>9</td>
                                                    <td>3</td>
                                                    <td>
                                                        <button class="btn btn-answerd-clr">Show Details</button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- End Subject Result Filter Section -->

                                        <!-- Start Year Result Filter Section -->
                                        <div class="result-filter-section" style="display: none;">
                                            <table>
                                                <tr>
                                                    <th>Year</th>
                                                    <th>Total</th>
                                                    <th>Answered</th>
                                                    <th><i class="icon-ok"></i></th>
                                                    <th><i class="icon-remove"></i></th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                                <tr>
                                                    <td>2019</td>
                                                    <td>12</td>
                                                    <td>12</td>
                                                    <td>9</td>
                                                    <td>3</td>
                                                    <td>
                                                        <button class="btn btn-answerd-clr">Show Details</button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- End Subject Result Filter Section -->




                                        


                                        <footer class="questionFooter" id='quiz-nxt-footer' v-if="showimmediate && !showimmediateblk">
                                            <!--                                    pagination-->
                                            <nav class="pagination" role="navigation" aria-label="pagination">

                                                <!--                                        back button -->
                                                <!--                                        <a class="button" v-on:click="prev();" :disabled="questionIndex < 1">Back</a>-->
                                                <!--                                        <a class="btn btn-green" href="select_language">Home</a>-->

                                                <!--                                    next button -->
                                                <div style="text-align: left" v-if="questionIndex>0">
                                                    <a class="button"  v-on:click="prev();" :disabled="questionIndex>=quiz.questions.length">
                                                        <!--                                            {{ (userResponses[questionIndex]==null)?'Skip':'Next' }}-->Back
                                                    </a>
                                                </div> 



                                                <div style="text-align: right" v-if="shownotimmdnxt">
                                                    <a class="button"  v-on:click="next();" :disabled="questionIndex>=quiz.questions.length">
                                                        <!--                                            {{ (userResponses[questionIndex]==null)?'Skip':'Next' }}-->Next
                                                    </a>
                                                </div> 

                                            </nav>
                                            <!--                                    /pagination-->

                                        </footer>





                                        <!--footer class="questionFooter" id='quiz-nxt-footer'  v-if="shownotimmdnxt"-->
                                        <footer class="questionFooter" id='quiz-nxt-footer' v-if="!showimmediate">
                                            <!--                                    pagination-->
                                            <nav class="pagination" role="navigation" aria-label="pagination">

                                                <!--                                        back button -->
                                                <!--                                        <a class="button" v-on:click="prev();" :disabled="questionIndex < 1">Back</a>-->
                                                <!--                                        <a class="btn btn-green" href="select_language">Home</a>-->

                                                <!--                                    next button -->
                                                <div style="text-align: left" v-if="questionIndex>0">
                                                    <a class="button"  v-on:click="prev();" :disabled="questionIndex>=quiz.questions.length">
                                                        <!--                                            {{ (userResponses[questionIndex]==null)?'Skip':'Next' }}-->Back
                                                    </a>
                                                </div> 



                                                <div style="text-align: right" v-if="shownotimmdnxt">
                                                    <a class="button"  v-on:click="next();" :disabled="questionIndex>=quiz.questions.length" v-if="questionIndex<quiz.questions.length-1">
                                                            <!--                                            {{ (userResponses[questionIndex]==null)?'Skip':'Next' }}-->Next
                                                    </a>
                                                </div> 

                                            </nav>
                                            <!--                                    /pagination-->

                                        </footer>


                                        <!--footer class="questionFooter" id='quiz-footer'  v-if="showimmediateblk"-->
                                        <?php // if($type=='Year Order') {   ?>
                                        <footer class="questionFooter" id='quiz-footer'  v-if="showimmediateblk">
                                            <div class="footer-explanation-section">
                                                <div class="quiz-explanation-view border-b">Correct Answer - <strong>{{quiz.questions[questionIndex].answer}}</strong>
                                                </div>
                                                <!--                                        <hr>-->
                                                <div class="quiz-explanation-view">Explanation:</div>

                                                <div v-if="quiz.questions[questionIndex].show_image_explanation" class="text-center">
                                                    <img v-if="quiz.questions[questionIndex].explanation_img_direction == 'top'" v-on:click="showexpimgpopup('api/v1/'+quiz.questions[questionIndex].image_path_explanation);" v-bind:src="'api/v1/'+quiz.questions[questionIndex].image_path_explanation" alt="image" class="qes-img" />

                                                </div>


                                        
                                                <div v-if="!quiz.questions[questionIndex].show_image_explanation && otherlangquiz[quiz.questions[questionIndex].year_id+quiz.questions[questionIndex].question_no] && otherlangquiz[quiz.questions[questionIndex].year_id+quiz.questions[questionIndex].question_no].show_image_explanation" class="text-center">
                                                    <img v-if="otherlangquiz[quiz.questions[questionIndex].year_id+quiz.questions[questionIndex].question_no].explanation_img_direction == 'top'" v-on:click="showexpimgpopup('api/v1/'+quiz.questions[questionIndex].image_path_explanation);" v-bind:src="'api/v1/'+otherlangquiz[quiz.questions[questionIndex].year_id+quiz.questions[questionIndex].question_no].image_path_explanation" alt="image" class="qes-img" />
                                                </div>
                                                <?php // }   ?>

                                                <!--span v-html="quiz.questions[questionIndex].explanation"></span-->
                                                <br/>
                                                <div style="text-align: left;">
                                                    <span v-html="quiz.questions[questionIndex].explanation"></span>
                                                </div> 
                                                <div style="text-align: left;" v-if="!quiz.questions[questionIndex].explanation && otherlangquiz[quiz.questions[questionIndex].year_id+quiz.questions[questionIndex].question_no] && otherlangquiz[quiz.questions[questionIndex].year_id+quiz.questions[questionIndex].question_no].explanation">
                                                    <span v-html="otherlangquiz[quiz.questions[questionIndex].year_id+quiz.questions[questionIndex].question_no].explanation"></span>
                                                </div>
                                                <?php // }    ?>



                                                <div v-if="quiz.questions[questionIndex].show_image_explanation" class="text-center">
                                                    <img v-if="quiz.questions[questionIndex].explanation_img_direction == 'bottom'" v-on:click="showexpimgpopup('api/v1/'+quiz.questions[questionIndex].image_path_explanation);" v-bind:src="'api/v1/'+quiz.questions[questionIndex].image_path_explanation" alt="image" class="qes-img" />
                                                </div>          


                                             
                                                <div v-if="!quiz.questions[questionIndex].show_image_explanation && otherlangquiz[quiz.questions[questionIndex].year_id+quiz.questions[questionIndex].question_no] && otherlangquiz[quiz.questions[questionIndex].year_id+quiz.questions[questionIndex].question_no].show_image_explanation" class="text-center">
                                                    <img v-if="otherlangquiz[quiz.questions[questionIndex].year_id+quiz.questions[questionIndex].question_no].explanation_img_direction == 'bottom'" v-bind:src="'api/v1/'+otherlangquiz[quiz.questions[questionIndex].year_id+quiz.questions[questionIndex].question_no].image_path_explanation" alt="image" class="qes-img" />
                                                </div>
                                                <?php // }  ?>



                                            </div>
                                            <!--                                    pagination-->
                                            <nav class="pagination" role="navigation" aria-label="pagination">

                                                <!--                                        back button -->
                                                <!--                                        <a class="button" v-on:click="prev();" :disabled="questionIndex < 1">Back</a>-->
                                                <!--                                        <a class="btn btn-green" href="select_language">Home</a>-->

                                                <!--                                    next button -->
                                                <div style="margin: 0 auto; text-align: center" v-if="questionIndex>0">
                                                    <a class="button"  v-on:click="prev();" :disabled="questionIndex>=quiz.questions.length">
                                                        <!--                                            {{ (userResponses[questionIndex]==null)?'Skip':'Next' }}-->Back
                                                    </a>
                                                </div> 
                                                <div style="margin: 0 auto; text-align: center">
                                                    <a class="button"  v-on:click="next();" :disabled="questionIndex>=quiz.questions.length">
                                                        <!--                                            {{ (userResponses[questionIndex]==null)?'Skip':'Next' }}-->Next
                                                    </a>
                                                </div> 

                                            </nav>
                                            <!--                                    /pagination-->

                                        </footer>
                                       
                                        <div class="other-language" v-if="olqshow" id="olqhidden">

                                            <div v-if="olqd">
                                                <div v-if="olqd.show_image" class="text-center">
                                                    <img style="width: 50%" v-if="olqd.direction == 'top'" v-bind:src="'api/v1/'+olqd.image_path" alt="image" class="qes-img" />
                                                </div>
                                                <h2 class="titleContainer title"><span class="quiz-question-no">{{questionIndex + 1}}.</span> <span class="quiz-question-title" v-html="olqd.text"></span>
                                                </h2>
                                                <div v-if="olqd.show_image" class="text-center">
                                                    <img style="width: 50%" v-if="olqd.direction == 'bottom'" v-bind:src="'api/v1/'+olqd.image_path" alt="image" class="qes-img" />
                                                </div>
                                                <!-- quizOptions -->
                                                <div class="optionContainer">
                                                    <div class="option" :id="olqdindex | charIndex | AddPrefix('olqdansopt_')" v-for="(olqdresponse, olqdindex) in olqd.responses" >
                                                         <span class="q-option">{{ olqdindex | charIndex }}.&nbsp;</span> <span v-html="olqdresponse.text"></span>
                                                    </div>

                                                </div>

                                            </div> 

                                            <div v-if="!olqd">
                                                <h2 class="titleContainer title"><span class="quiz-question-title">Question Not Available in <?php echo $other_language['name'] ?></span></h2>
                                            </div>  
                                        </div>
                                        
                                                                               
                                    </div>
                                </div>   
                                <!--quizCompletedResult-->

                                <div v-if="questionIndex >= quiz.questions.length" v-bind:key="questionIndex" class="quizCompleted has-text-centered">

                                    <!-- quizCompletedIcon: Achievement Icon -->
                                    <span class="icon">
                                        <i class="fa" :class="scoreval>3?'fa-check-circle-o is-active':'fa-times-circle'"></i>
                                    </span>

                                    <!--resultTitleBlock-->
                                    <h2 class="complete-title" v-if="scoreval == quiz.questions.length">
                                        Congratulations! You have answered everything right!!! <img style="width: 12%" src="img/thumbs-up.gif">
                                    </h2>
                                    <h2 class="complete-title" v-if="scoreval != quiz.questions.length">
                                        Test Completed
                                    </h2>
                                    <?php if ($type == 'Year Order') { ?>
                                        <p class="subtitledur" v-if="data_ques_duration>0">
                                            <span class="stotdur">At {{data_ques_duration}} Minutes You have completed the Quiz <br v-if="data_ques_answered!=0"> <span class="stotques" v-if="data_ques_answered!=0">At {{totalquizduration}} Minutes you have completed {{data_ques_answered}} Questions</span>
                                        </p>
                                    <?php } ?>
                                    <p class="subtitle">
                                        Your Score: <span class="score-clr">{{ scoreval }}</span> / {{ quiz.questions.length }}
                                    </p>
                                <!-- <p class="subtitle">
                                    Total score: {{ score() }} / {{ quiz.questions.length }}
                                </p> -->
                                    <div class="">

                                        <img src="img/pic-intr-offer.jpg" alt="" />
                                        <h4><strike>₹999 </strike> &nbsp;&nbsp; <span> ₹499</span> <span style="font-size: 15px;">(Inclusive of 18% GST)</span></h4>
                                        <a href="member-benefits" class="btn btn-green" style="font-size: 20px;padding: 15px;">Buy Full Version</a>
                                        


                                    </div>

                                    <div  id="feedback-popup" class="feedback-popup" style="display: none;" v-if="scoreval == quiz.questions.length">
                                        <div class="container">
                                            <div class="feedback-popup-box">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                
                            </div>
                            <!-- question Box -->

                            <div v-if="questionIndex >= quiz.questions.length" v-bind:key="questionIndex" class="quizCompleted has-text-centered">      
                                <div id="create" class="quiz-result"  tabindex='1'>                            

                                    <?php if ($type == 'Subject Order') { ?>
                                        <div id="question_list">{{divshowsorder()}}</div>

                                    <?php } else { ?>
                                        <div id="question_list">{{divshow()}}</div>
                                    <?php } ?>                    

                                    <div id="question_list_det" style="display: none;"></div>
                                </div>
                            </div>   
                        <?php } ?>


                        <?php
                        if ($quiz_from_page == 'quiz') {

                            $total_ques = 0;
                            $ans_ques = 0;
                            $cor_ans_ques = 0;

                            if (isset($student_log_order['student_log_order']) && ($student_log_order['student_log_order'] == 1)) { //year order   
                                $log_detail = $obj->selectRow('COUNT(student_log_detail_id) AS attended, IFNULL((SELECT COUNT(student_log_detail_id) FROM free_user_log_detail INNER JOIN question ON free_user_log_detail.question_id=question.question_id WHERE student_log_id=' . $student_log['student_log_id'] . ' AND UPPER(answer) = UPPER(student_answer)), 0) AS correct_answers', 'free_user_log_detail', 'student_log_id=' . $student_log['student_log_id']);
                                $total_ques = $student_log['total_questions'];
                                $ans_ques = $log_detail['attended'];
                                $cor_ans_ques = $log_detail['correct_answers'];
                            }
                            if (isset($student_log_order['student_log_order']) && ($student_log_order['student_log_order'] == 2)) { //subject order   
                                foreach ($stud_topic_order as $stud_topic) {
                                    foreach ($stud_topic_logs[$stud_topic] as $log_id) {
                                        if (isset($ques_year_cnt[$stud_topic])) {

                                            if (isset($ques_year_cnt[$stud_topic]['count'])) {
                                                $total_ques += $ques_year_cnt[$stud_topic]['count'];
                                            }

                                            if (isset($ques_cor_ans_cnt[$log_id][$stud_topic]['answerd_cnt'])) {
                                                $ans_ques += $ques_cor_ans_cnt[$log_id][$stud_topic]['answerd_cnt'];
                                            }

                                            if (isset($ques_cor_ans_cnt[$log_id][$stud_topic]['correct_cnt'])) {
                                                $cor_ans_ques += $ques_cor_ans_cnt[$log_id][$stud_topic]['correct_cnt'];
                                            }
                                        }
                                    }
                                }
                            }
                            ?>





                            <div class="questionBox">
                                <div  class="quizCompleted has-text-centered">

                                    <h2 class="complete-title">
                                        Test Completed
                                    </h2>

                                    <p class="subtitle">
                                        Your Score: <span class="score-clr"><?php echo $cor_ans_ques; ?></span> / <?php echo $total_ques; ?>
                                    </p>

                                    <div class="">

                                        <img src="img/pic-intr-offer.jpg" alt="" />
                                        <h4><strike>₹999 </strike> &nbsp;&nbsp; <span> ₹499</span> <span style="font-size: 15px;">(Inclusive of 18% GST)</span></h4>
                                        <a href="member-benefits" class="btn btn-green" style="font-size: 20px;padding: 15px;">Buy Full Version</a>



                                    </div>



                                </div>



                            </div>


                            <div class="quizCompleted has-text-centered">      
                                <div id="create" class="quiz-result"  tabindex='1'>  
                                    <div id="question_list">
                                        <?php
                                        if (count($student_log) > 0) {

                                            if (isset($student_log_order['student_log_order']) && ($student_log_order['student_log_order'] == 1)) { //question order   
                                                ?>    
                                                <table style="width:100%;">
                                                    <thead>
                                                        <tr>                                                
                                                            <th>Year</th>
                                                            <th>Total</th>
                                                            <th>Answered</th>
                                                            <th class="text-center"><i class="icon-ok"></i></th>
                                                            <th class="text-center"><i class="icon-remove"></i></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>



                                                    <tbody>
                                                        <?php
                                                        $log_year_val = '';
                                                        if (isset($ans_log_year[$student_log['student_log_id']])) {
                                                            $log_year_val = $ans_log_year[$student_log['student_log_id']][0];
                                                        }


                                                        $log_detail = $obj->selectRow('COUNT(student_log_detail_id) AS attended, IFNULL((SELECT COUNT(student_log_detail_id) FROM free_user_log_detail INNER JOIN question ON free_user_log_detail.question_id=question.question_id WHERE student_log_id=' . $student_log['student_log_id'] . ' AND UPPER(answer) = UPPER(student_answer)), 0) AS correct_answers', 'free_user_log_detail', 'student_log_id=' . $student_log['student_log_id']);
                                                        $log_attended = $log_detail['attended'];
                                                        $log_correct_answers = $log_detail['correct_answers'];
                                                        ?>
                                                        <tr>                 

                                                            <td><?php echo $log_year_val; ?></td>
                                                            <td><?php echo $student_log['total_questions']; ?></td>
                                                            <td><?php echo $log_attended; ?></td>
                                                            <td><?php echo $log_correct_answers; ?></td>
                                                            <td><?php echo $log_attended - $log_correct_answers ?></td>
                                                            <td><button class="btn btn-answerd-clr" onClick=yordershowdetailFree(<?php echo $student_log['student_log_id']; ?>);>Show Details</button></td>
                                                        </tr>



                                                    </tbody>
                                                </table>

                                                <?php
                                            }if (isset($student_log_order['student_log_order']) && ($student_log_order['student_log_order'] == 2)) { //subject order   
                                                ?>


                                                <table>
                                                    <thead>
                                                        <tr>


                                                            <th>Subject</th>
                                                            <th>Topic</th>
                                                            <th>Total</th>
                                                            <th>Answered</th>
                                                            <th class="text-center"><i class="icon-ok"></i></th>
                                                            <th class="text-center"><i class="icon-remove"></i></th>
                                                        </tr>
                                                    </thead>



                                                    <tbody>
                                                        <?php
                                                        foreach ($stud_topic_order as $stud_topic) {
                                                            foreach ($stud_topic_logs[$stud_topic] as $log_id) {
                                                                if (isset($ques_year_cnt[$stud_topic])) {
                                                                    ?>
                                                                    <tr>                 

                                                                        <td><?php echo $ques_year_cnt[$stud_topic]['subject_name']; ?></td>
                                                                        <td><?php echo $ques_year_cnt[$stud_topic]['topic_name']; ?></td>
                                                                        <td><?php
                                                                            if (isset($ques_year_cnt[$stud_topic]['count'])) {
                                                                                echo $ques_year_cnt[$stud_topic]['count'];
                                                                            } else {
                                                                                echo '0';
                                                                            }
                                                                            ?></td>
                                                                        <td><?php
                                                                            if (isset($ques_cor_ans_cnt[$log_id][$stud_topic]['answerd_cnt'])) {
                                                                                echo $ques_cor_ans_cnt[$log_id][$stud_topic]['answerd_cnt'];
                                                                                $answered = $ques_cor_ans_cnt[$log_id][$stud_topic]['answerd_cnt'];
                                                                            } else {
                                                                                echo '0';
                                                                                $answered = 0;
                                                                            }
                                                                            ?></td>    


                                                                        <td><?php
                                                                            if (isset($ques_cor_ans_cnt[$log_id][$stud_topic]['correct_cnt'])) {
                                                                                echo $ques_cor_ans_cnt[$log_id][$stud_topic]['correct_cnt'];
                                                                                $correct_cnt = $ques_cor_ans_cnt[$log_id][$stud_topic]['correct_cnt'];
                                                                            } else {
                                                                                echo '0';
                                                                                $correct_cnt = 0;
                                                                            }
                                                                            ?></td>
                                                                        <td><?php echo $answered - $correct_cnt; ?></td>
                                                                        <td><button class="btn btn-answerd-clr" onClick=topicShowDetailFree(<?php echo $stud_topic; ?>,<?php echo $student_log['student_log_id']; ?>)>Show Details</button></td>  



                                                                    </tr>
                                                                    <?php
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>   
                                                </table>


                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div id="question_list_det" style="display: none;"></div>
                                </div>
                            </div>








                        <?php }
                        ?>



                        <?php ?>
                    </div>
                </div>
            </section>
        </div>
        <!--/container-->

        <div class="loadingoverlay" style="display: none">
            <div class="loadingoverlay-spinner">
                <img alt="" src="img/loader.gif" />
            </div>
        </div>



        <div class="explanation-popup" id="explimagemodal" style="display: none;">
            <div class="popup-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="popup-content">
                <img src="" class="explimagepreview">
            </div>
        </div>



        <?php include 'footer.php'; ?>
        <?php include 'script.php'; ?>
        <?php if ($quiz_from_page != 'quiz') { ?>
            <script>

                //image_url = 'http://localhost/project/examhorse/api/v1/';
                //image_url ='http://examhorse.com/gama/api/v1/';
                image_url = 'http://examhorse.com/api/v1/';
                console.log(<?php echo json_encode($questions_list); ?>);
                var quiz = {
                user: "<?php echo $student['name']; ?>",
                        questions: <?php echo json_encode($questions_list); ?>
                },
                        userResponseSkelaton = Array(quiz.questions.length).fill(null);
                var app = new Vue({
                el: "#app",
                        data: {
                        quiz: quiz,
                                questionIndex: <?php
        echo $attended_questions;
//echo 0; 
        ?>,
                                userResponses: userResponseSkelaton,
                                showimmediate: false,
                                showimmediateblk: false,
                                isDisabled: false,
                                shownotimmdnxt: false,
                                studans: false,
                                isActive: false,
                                revShow: false,
                                olqshow:false,
                                olqd:null,
                                showcnfrmaftersel:false,
                                shownotsureaftersel : false,
                                shownextnosave : true,
                                showsurebtnans:false,
                                questionprevanswered:false,
                                selected_answer: '',
                                otherlangquiz: null,
                                totseconds : 0,
                                secondslabel : 0,
                                minuteslabel : 0,
                                isTimerPaused : true,
                                isTimerStart: false,
                                isAllQAnsed: false,
                                showTimer: true,
                                totalquizduration : 18,
                                quizalertbeforemins: 1,
                                data_ques_answered : 0,
                                data_ques_duration : 0,
                                showqap: false,
                                anscntstud:0,
                                scoreval:0
                        },
                        filters: {
                        charIndex: function (i) {
                        return String.fromCharCode(97 + i);
                        },
                                AddPrefix: function (value, prefix) {
                                return prefix + value;
                                }
                        },
                        methods: {
                        showexpimgpopup: function (imgsrc) {
                        if (imgsrc != '') {
                        $('.explimagepreview').attr('src', imgsrc);
                        $('#explimagemodal').modal('show');
                        }
                        },
                                restart: function () {
                                $('#create').hide();
                                this.questionIndex = 0;
                                this.userResponses = Array(this.quiz.questions.length).fill(null);
                                //document.getElementById('#create').style.display = 'none';
                                },
                                convertLower: function (strval) {
                                return strval.toLowerCase().trim();
                                },
                                showOverlay: function () {
                                $('.loadingoverlay').show();
                                },
                                hideOverlay: function () {
                                $('.loadingoverlay').hide();
                                },
                                revcontAns: function () {

                                this.questionIndex = 0;
                                app.revShow = false;
                                $('#question_list').empty();
                                $("#create").toggle();
                                },
                                revAns: function () {
                                $.ajax({
                                type: "GET",
                                        url: 'api/v1/free_user_get_result_detail/' +<?php echo $student_log; ?>,
                                        success: function (data) {
                                        if (data.result.error === false) {

                                        app.revShow = true;
                                        $('.loadingoverlay').show();
                                        setTimeout(() => {
                                        applyMathAjax();
                                        $('.loadingoverlay').hide();
                                        }, 600);
                                        var qlist = '';
                                        var correct_ans = '';
                                        var student_ans = '';
                                        $.each(data.result.data, function (key, val) {
                                        qlist = qlist + '<div class="question-title"><h6>' + (key + 1) + '. ' + val.name + '</h6>';
                                        if (val.a !== '') {
                                        student_ans = '';
                                        if ((val.student_answer).toUpperCase() === 'A') {
                                        student_ans = 'crt_clr';
                                        } else if ((val.student_notsure_answer).toUpperCase() === 'A') {
                                        student_ans = 'notsure_clr';
                                        }

                                        qlist = qlist + '<div class="result-option ' + student_ans + '"><div class="option"><span class="quiz-option-float">A.</span> ' + val.a + '</div></div>';
                                        }
                                        if (val.b !== '') {
                                        student_ans = '';
                                        if ((val.student_answer).toUpperCase() === 'B') {
                                        student_ans = 'crt_clr';
                                        } else if ((val.student_notsure_answer).toUpperCase() === 'B') {
                                        student_ans = 'notsure_clr';
                                        }
                                        qlist = qlist + '<div class="result-option ' + student_ans + '"><div class="option"><span class="quiz-option-float">B.</span> ' + val.b + '</div></div>';
                                        }
                                        if (val.c !== '') {
                                        student_ans = '';
                                        if ((val.student_answer).toUpperCase() === 'C') {
                                        student_ans = 'crt_clr';
                                        } else if ((val.student_notsure_answer).toUpperCase() === 'C') {
                                        student_ans = 'notsure_clr';
                                        }

                                        qlist = qlist + '<div class="result-option ' + student_ans + '"><div class="option"><span class="quiz-option-float">C.</span> ' + val.c + '</div></div>';
                                        }
                                        if (val.d !== '') {
                                        student_ans = '';
                                        if ((val.student_answer).toUpperCase() === 'D') {
                                        student_ans = 'crt_clr';
                                        } else if ((val.student_notsure_answer).toUpperCase() === 'D') {
                                        student_ans = 'notsure_clr';
                                        }
                                        qlist = qlist + '<div class="result-option ' + student_ans + '"><div class="option"><span class="quiz-option-float">D.</span> ' + val.d + '</div></div>';
                                        }
                                        qlist = qlist + '</div>';
                                        });
                                        $('#question_list').html(qlist);
                                        $('#question_list').show();
                                        $("#create").toggle();
                                        } else {
                                        swal('Information', data.result.message, 'info');
                                        }
                                        },
                                        error: function (err) {
                                        swal('Error', err.statusText, 'error');
                                        }
                                });
                                },
                                showQuesPanel: function() {

                                var stud_ans = [];
                                $.ajax({
                                type: "GET",
                                        url: 'api/v1/free_user_get_result_detail/' +<?php echo $student_log; ?>,
                                        success: function (data) {
                                        if (data.result.error === false) {
                                        if (data.result.data) {
                                        $.each(data.result.data, function (key, val) {
                                        //stud_ans[val.question_no]= {'student_answer':val.student_answer,'student_notsure_answer':val.student_notsure_answer};
                                        stud_ans[val.question_id] = {'student_answer':val.student_answer, 'student_notsure_answer':val.student_notsure_answer};
                                        });
                                        }
                                        }



                                        var questionslist = <?php echo json_encode($questions_list); ?>;
                                        var qTable = '<table class="question-number-table"><tr>';
                                        $.each(questionslist, function (key, val) {
                                        var qn = key + 1;
                                        if (qn != 1 && (key % 10 == 0)) {
                                        if (qn < questionslist.length) {
                                        qTable += '<tr>';
                                        }
                                        }

                                        var tdval = '<td onClick=goQuesFrPanel(' + key + ');><span class="q-a-n">' + qn + '</span></td>';
                                        if (typeof val.question_no !== 'undefined') {
                                        if (typeof stud_ans[val.question_id] !== 'undefined'){
                                        if (stud_ans[val.question_id].student_answer != '') {
                                        tdval = '<td onClick=goQuesFrPanel(' + key + '); class=""><span class="q-a-n clr-blue">' + qn + '</span></td>';
                                        }
                                        else if (stud_ans[val.question_id].student_notsure_answer != '') {
                                        tdval = '<td onClick=goQuesFrPanel(' + key + '); class=""><span class="q-a-n clr-yellow">' + qn + '</span></td>';
                                        }
                                        }
                                        }
                                        qTable += tdval;
                                        if (qn != 1 && (qn % 10 == 0)) {

                                        if (qn <= questionslist.length) {
                                        qTable += '</tr>';
                                        }
                                        } else if (qn == questionslist.length) {
                                        var rtd = 10 - (qn % 10);
                                        for (i = 1; i <= rtd; i++) {
                                        qTable += '<td></td>';
                                        }
                                        qTable += '</tr>';
                                        }





                                        });
                                        qTable += '</table>';
                                        //console.log(qTable);

                                        $('#header-hidden').hide();
                                        $('#quiz-hidden').hide();
                                        $('.questionFooter').hide();
                                        $('#olqhidden').hide();
                                        $('#questionpanel').html(qTable);
                                        $('.question-admin-panel').show();
                                        }
                                });
                               
                                this.showqap = true;
                                },
                                divshow: function () {
                                $('.loadingoverlay').show();
                                setTimeout(() => {
                                applyMathAjax();
                                $('.loadingoverlay').hide();
                                }, 600);
                                $.ajax({
                                type: "GET",
                                        url: 'api/v1/free_user_get_result_detail/' +<?php echo $student_log; ?>,
                                        success: function (data) {
                                        if (data.result.error === false) {
                                        var qlist = '';
                                        var correct_ans = '';
                                        var student_ans = '';
                                        var cor_cnt = 0;
                                        var ans_cnt = 0;
                                        var wrong_cnt = 0;
                                        $.each(data.result.data, function (key, val) {
                                        ans_cnt = ans_cnt + 1;
                                        qlist = qlist + '<div class="question-title"><h6>' + (key + 1) + '. ' + val.name + '</h6>';
                                        if (val.a !== '') {
                                        correct_ans = '';
                                        student_ans = '';
                                        if ((val.answer).toUpperCase() === 'A') {
                                        correct_ans = 'crt_clr';
                                        }
                                        if ((val.student_answer).toUpperCase() === 'A' && (val.answer).toUpperCase() !== 'A') {
                                        student_ans = 'wrng_clr';
                                        wrong_cnt = wrong_cnt + 1;
                                        }
                                        qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="quiz-option-float">A.</span> ' + val.a + '</div></div>';
                                        }
                                        if (val.b !== '') {
                                        correct_ans = '';
                                        student_ans = '';
                                        if ((val.answer).toUpperCase() === 'B') {
                                        correct_ans = 'crt_clr';
                                        }
                                        if ((val.student_answer).toUpperCase() === 'B' && (val.answer).toUpperCase() !== 'B') {
                                        student_ans = 'wrng_clr';
                                        wrong_cnt = wrong_cnt + 1;
                                        }
                                        qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="quiz-option-float">B.</span> ' + val.b + '</div></div>';
                                        }
                                        if (val.c !== '') {
                                        correct_ans = '';
                                        student_ans = '';
                                        if ((val.answer).toUpperCase() === 'C') {
                                        correct_ans = 'crt_clr';
                                        }
                                        if ((val.student_answer).toUpperCase() === 'C' && (val.answer).toUpperCase() !== 'C') {
                                        student_ans = 'wrng_clr';
                                        wrong_cnt = wrong_cnt + 1;
                                        }
                                        qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="quiz-option-float">C.</span> ' + val.c + '</div></div>';
                                        }
                                        if (val.d !== '') {
                                        correct_ans = '';
                                        student_ans = '';
                                        if ((val.answer).toUpperCase() === 'D') {
                                        correct_ans = 'crt_clr';
                                        }
                                        if ((val.student_answer).toUpperCase() === 'D' && (val.answer).toUpperCase() !== 'D') {
                                        student_ans = 'wrng_clr';
                                        wrong_cnt = wrong_cnt + 1;
                                        }
                                        qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="quiz-option-float">D.</span> ' + val.d + '</div></div>';
                                        }
                                        if (val.image_path_explanation !== '' && val.explanation_img_direction !== 'bottom') {
                                        qlist = qlist + '<div class="explanation_image"><img  onClick="showexpimgpopup(\'' + image_url + val.image_path_explanation + '\');" src="' + image_url + val.image_path_explanation + '"></div>';
                                        } else {
                                        qlist = qlist + '';
                                        }
                                        if (val.explanation !== '') {
                                        qlist = qlist + '<div class="explanation-section"><strong>Explanation</strong> : ' + val.explanation + '</div>';
                                        } else {
                                        //qlist = qlist + '<div class="explanation-section">No Explanation</div>';
                                        }
                                        if (val.image_path_explanation !== '' && val.explanation_img_direction !== 'top') {
                                        qlist = qlist + '<div class="explanation_image"><img  onClick="showexpimgpopup(\'' + image_url + val.image_path_explanation + '\');" src="' + image_url + val.image_path_explanation + '"></div>';
                                        } else {
                                        qlist = qlist + '';
                                        }
                                        qlist = qlist + '</div>';
                                        });
                                        $('#question_list_det').html(qlist);
                                        cor_cnt = ans_cnt - wrong_cnt;
                                        var res = '<table style="width:100%">';
                                        res += '<tr>';
                                        res += '<th>Year</th>';
                                        res += '<th>Total</th>';
                                        res += '<th>Answered</th>';
                                        res += '<th><i class="icon-ok"></i></th>';
                                        res += '<th><i class="icon-remove"></i></th>';
                                        res += '<th>&nbsp;</th>';
                                        res += '</tr>';
                                        res += '<tr>';
                                        res += '<td><?php echo $sel_year_val; ?></td>';
                                        res += '<td>' + quiz.questions.length + '</td>';
                                        res += '<td>' + ans_cnt + '</td>';
                                        res += '<td>' + cor_cnt + '</td>';
                                        res += '<td>' + wrong_cnt + '</td>';
                                        res += '<td>';
                                        res += '<button class="btn btn-answerd-clr" onClick="yordershowdetail();" id="btnyorderdetail">Show Details</button>';
                                        res += '</td>';
                                        res += '</tr>';
                                        //$('#question_list').html(qlist);
                                        $('#question_list').html(res);
                                        $('#question_list').show();
                                        //$("#create").toggle();                                    
                                        } else {
                                        swal('Information', data.result.message, 'info');
                                        }
                                        },
                                        error: function (err) {
                                        swal('Error', err.statusText, 'error');
                                        }
                                });
                                },
                                divshowsorder: function () {


                                $('.loadingoverlay').show();
                                

                                $.ajax({
                                type: "GET",
                                        url: 'api/v1/free_user_get_student_result_count_by_topic/' +<?php echo $student_log; ?>,
                                        success: function (data) {
                                        if (data.result.error === false) {
                                        var res = '<table>';
                                        res += '<tr>';
                                        res += '<th>Subject</th>';
                                        res += '<th>Topic</th>';
                                        res += '<th>Total</th>';
                                        res += '<th>Answered</th>';
                                        res += '<th><i class="icon-ok"></i></th>';
                                        res += '<th><i class="icon-remove"></i></th>';
                                        res += '<th>&nbsp;</th>';
                                        res += '</tr>';
                                        $.each(data.result.data, function (key, val) {

                                        res += '<tr>';
                                        res += '<td>' + val.subject_name + '</td>';
                                        res += '<td>' + val.topic_name + '</td>';
                                        res += '<td class="q-center">' + val.totalcnt + '</td>';
                                        res += '<td class="q-center">' + val.answerdcnt + '</td>';
                                        res += '<td>' + val.correctcnt + '</td>';
                                        res += '<td>' + val.wrongcnt + '</td>';
                                        res += '<td>';
                                        res += '<button class="btn btn-answerd-clr btnsorderdetail" onClick="topicShowDetail(' + val.topic_id + ')";  id="btnsorderdetail_' + val.topic_id + '">Show Details</button>';
                                        res += '</td>';
                                        res += '</tr>';
                                        });
                                        $('#question_list').html(res);
                                        $('#question_list').show();
                                        //$("#create").toggle();                                    
                                        $('.loadingoverlay').hide();
                                        }
                                        }
                                });
                               
                                },
                                divshowsorderdetail: function (tid, lid) {
                               

                                $('.loadingoverlay').show();
                                setTimeout(() => {
                                applyMathAjax();
                                $('.loadingoverlay').hide();
                                }, 600);
                                $.ajax({
                                type: "GET",
                                        url: 'api/v1/free_user_get_result_detail_by_topic/' +<?php echo $student_log; ?> + '/' + tid,
                                        success: function (data) {
                                        if (data.result.error === false) {
                                        var qlist = '';
                                        var correct_ans = '';
                                        var student_ans = '';
                                        $.each(data.result.data, function (key, val) {
                                        var foc = '';
                                        if (key == 0) {
                                        foc = " id='ansdetfocus' tabindex='1' style='outline: none;'";
                                        }
                                        qlist = qlist + '<div class="question-title"' + foc + '><h6>' + (key + 1) + '. ' + val.name + '</h6>';
                                        if (val.a !== '') {
                                        correct_ans = '';
                                        student_ans = '';
                                        if ((val.answer).toUpperCase() === 'A') {
                                        correct_ans = 'crt_clr';
                                        }
                                        if ((val.student_answer).toUpperCase() === 'A' && (val.answer).toUpperCase() !== 'A') {
                                        student_ans = 'wrng_clr';
                                        }
                                        qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="quiz-option-float">A.</span> ' + val.a + '</div></div>';
                                        }
                                        if (val.b !== '') {
                                        correct_ans = '';
                                        student_ans = '';
                                        if ((val.answer).toUpperCase() === 'B') {
                                        correct_ans = 'crt_clr';
                                        }
                                        if ((val.student_answer).toUpperCase() === 'B' && (val.answer).toUpperCase() !== 'B') {
                                        student_ans = 'wrng_clr';
                                        }
                                        qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="quiz-option-float">B.</span> ' + val.b + '</div></div>';
                                        }
                                        if (val.c !== '') {
                                        correct_ans = '';
                                        student_ans = '';
                                        if ((val.answer).toUpperCase() === 'C') {
                                        correct_ans = 'crt_clr';
                                        }
                                        if ((val.student_answer).toUpperCase() === 'C' && (val.answer).toUpperCase() !== 'C') {
                                        student_ans = 'wrng_clr';
                                        }
                                        qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="quiz-option-float">C.</span> ' + val.c + '</div></div>';
                                        }
                                        if (val.d !== '') {
                                        correct_ans = '';
                                        student_ans = '';
                                        if ((val.answer).toUpperCase() === 'D') {
                                        correct_ans = 'crt_clr';
                                        }
                                        if ((val.student_answer).toUpperCase() === 'D' && (val.answer).toUpperCase() !== 'D') {
                                        student_ans = 'wrng_clr';
                                        }
                                        qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="quiz-option-float">D.</span> ' + val.d + '</div></div>';
                                        }
                                        if (val.image_path_explanation !== '' && val.explanation_img_direction !== 'bottom') {
                                        qlist = qlist + '<div class="explanation_image"><img onClick="showexpimgpopup(\'' + image_url + val.image_path_explanation + '\');"  src="' + image_url + val.image_path_explanation + '"></div>';
                                        } else {
                                        qlist = qlist + '';
                                        }
                                        if (val.explanation !== '') {
                                        qlist = qlist + '<div class="explanation-section"><strong>Explanation</strong> : ' + val.explanation + '</div>';
                                        } else {
                                        //qlist = qlist + '<div class="explanation-section">No Explanation</div>';
                                        }
                                        if (val.image_path_explanation !== '' && val.explanation_img_direction !== 'top') {
                                        qlist = qlist + '<div class="explanation_image"><img onClick="showexpimgpopup(\'' + image_url + val.image_path_explanation + '\');" src="' + image_url + val.image_path_explanation + '"></div>';
                                        } else {
                                        qlist = qlist + '';
                                        }
                                        qlist = qlist + '</div>';
                                        });
                                        $('#question_list_det').html(qlist);
                                        $('#question_list_det').show();
                                        //$("#create").toggle();
                                        $('#ansdetfocus').focus();
                                        } else {
                                        swal('Information', data.result.message, 'info');
                                        }
                                        },
                                        error: function (err) {
                                        swal('Error', err.statusText, 'error');
                                        }
                                });
                                },
                                clickPause: function () {
                                $('.loader').removeClass('is-active');
                                swal({
                                title: "Are you sure?",
                                        text: "Do you want to Pause Test?",
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonClass: "btn-danger",
                                        confirmButtonText: "Yes",
                                        closeOnConfirm: false
                                },
                                        function () {
                                        window.location = './select_language';
                                        //swal("Deleted!", "Your imaginary file has been deleted.", "success");
                                        });
                                },
                                selectOptionNoSave: function (index) {


                                if (!this.questionprevanswered) {
                                this.showsurebtnans = false;
                                this.shownotsureaftersel = true;
                                this.showcnfrmaftersel = true;
                                this.shownextnosave = false;
                                }


                                var answers = ['A', 'B', 'C', 'D'];
                                $.each(answers, function (key, val) {
                                var optval = app.convertLower(val);
                                //alert(' tostr '+answers[val].toString());
                                $('#ansopt_' + optval).removeClass('crt_clr');
                                });
                                var selopt = app.convertLower(answers[index]);
                                $('#ansopt_' + selopt).addClass('crt_clr');
                                this.selected_answer = answers[index];
                                this.continueTimer();
                                },
                                notSureSave:function() {

                                this.showsurebtnans = false;
                                this.shownextnosave = true;
                                this.shownotsureaftersel = false;
                                this.showcnfrmaftersel = false;
                                this.questionprevanswered = false;
                                $('.loadingoverlay').show();
                                setTimeout(() => {
                                applyMathAjax();
                                $('.loadingoverlay').hide();
                                }, 600);
                                if (this.selected_answer){
                                var questions = <?php echo json_encode($questions_list); ?>;
                                $.post("api/v1/store_notsure_answer",
                                {
                                question_id: questions[this.questionIndex].question_id,
                                        answer: '',
                                        notsure_answer : this.selected_answer,
                                        student_log_id: <?php echo $student_log; ?>
                                },
                                        function (data, status) {
                                        if (data.result.error === false) {

                                        }
                                        });
                                }

                                if (this.questionIndex == this.quiz.questions.length - 1)   {
                                this.savetimetaken();
                                this.quizdurtext();
                                }

                                setTimeout(() => {
                                if (this.questionIndex < this.quiz.questions.length) {
                                this.questionIndex++;
                                this.selected_answer = '';
                                var qid = questions[this.questionIndex].question_id;
                                $.get("api/v1/get_student_notsure_answer/" + qid + "/<?php echo $student_log; ?>",
                                        function (data, status) {
                                        if (data.result.error === false) {
                                        ansid = data.result.data;
                                        notsure_ansid = data.result.data_notsure;
                                        if (ansid != '')
                                        {
                                        var studansid = app.convertLower(ansid);
                                        $('#ansopt_' + studansid).addClass('crt_clr');
                                        app.selected_answer = ansid;
                                        app.shownotsureaftersel = true;
                                        app.showcnfrmaftersel = false;
                                        app.questionprevanswered = true;
                                        app.showsurebtnans = false;
                                        }
                                        else if (notsure_ansid != '')
                                        {
                                        var studansid = app.convertLower(notsure_ansid);
                                        $('#ansopt_' + studansid).addClass('notsure_clr');
                                        app.selected_answer = notsure_ansid;
                                        app.shownotsureaftersel = false;
                                        app.showcnfrmaftersel = false;
                                        app.questionprevanswered = true;
                                        app.showsurebtnans = true;
                                        }
                                        else {

                                        app.selected_answer = '';
                                        app.shownotsureaftersel = false;
                                        app.showcnfrmaftersel = false;
                                        app.questionprevanswered = false;
                                        app.showsurebtnans = false;
                                        }
                                        }
                                        });
                                }


                                }, 500);
                                },
                                confirmSave:function (){

                                this.showsurebtnans = false;
                                this.shownextnosave = true;
                                this.shownotsureaftersel = false;
                                this.showcnfrmaftersel = false;
                                this.questionprevanswered = false;
                                $('.loadingoverlay').show();
                                setTimeout(() => {
                                applyMathAjax();
                                $('.loadingoverlay').hide();
                                }, 600);
                                if (this.selected_answer){
                                var questions = <?php echo json_encode($questions_list); ?>;
                                $.post("api/v1/store_notsure_answer",
                                {
                                question_id: questions[this.questionIndex].question_id,
                                        answer: this.selected_answer,
                                        notsure_answer : '',
                                        student_log_id: <?php echo $student_log; ?>
                                },
                                        function (data, status) {
                                        if (data.result.error === false) {


                                        }
                                        });
                                //show score save
                                var answers = ['A', 'B', 'C', 'D'];
                                var answersidx = - 1;
                                $.each(answers, function (key, val) {
                                if (app.selected_answer == val){
                                answersidx = key;
                                }
                                });
                                if (answersidx != - 1) {
                                Vue.set(this.userResponses, this.questionIndex, answersidx);
                                }
                                }

                                if (this.questionIndex == this.quiz.questions.length - 1)   {
                                this.savetimetaken();
                                this.quizdurtext();
                                }

                                setTimeout(() => {

                                if (this.questionIndex < this.quiz.questions.length) {
                                this.questionIndex++;
                                this.selected_answer = '';
                                if (questions[this.questionIndex]) {
                                var qid = questions[this.questionIndex].question_id;
                                $.get("api/v1/get_student_notsure_answer/" + qid + "/<?php echo $student_log; ?>",
                                        function (data, status) {
                                        if (data.result.error === false) {
                                        ansid = data.result.data;
                                        notsure_ansid = data.result.data_notsure;
                                        if (ansid != '')
                                        {
                                        var studansid = app.convertLower(ansid);
                                        $('#ansopt_' + studansid).addClass('crt_clr');
                                        app.selected_answer = ansid;
                                        app.shownotsureaftersel = true;
                                        app.showcnfrmaftersel = false;
                                        app.questionprevanswered = true;
                                        app.showsurebtnans = false;
                                        }
                                        else if (notsure_ansid != '')
                                        {
                                        var studansid = app.convertLower(notsure_ansid);
                                        $('#ansopt_' + studansid).addClass('notsure_clr');
                                        app.selected_answer = notsure_ansid;
                                        app.shownotsureaftersel = false;
                                        app.showcnfrmaftersel = false;
                                        app.questionprevanswered = true;
                                        app.showsurebtnans = true;
                                        }
                                        else {

                                        app.selected_answer = '';
                                        app.shownotsureaftersel = false;
                                        app.showcnfrmaftersel = false;
                                        app.questionprevanswered = false;
                                        app.showsurebtnans = false;
                                        }
                                        }
                                        });
                                }
                                }
                                }, 500);
                                },
                                prevNoSave: function () {

                                this.selected_answer = '';
                                this.showsurebtnans = false;
                                this.shownextnosave = true;
                                this.shownotsureaftersel = false;
                                this.showcnfrmaftersel = false;
                                this.questionprevanswered = false;
                                $('.loadingoverlay').show();
                                setTimeout(() => {
                                applyMathAjax();
                                $('.loadingoverlay').hide();
                                }, 600);
                                if (this.quiz.questions.length > 0)
                                        this.questionIndex--;
                                var questions = <?php echo json_encode($questions_list); ?>;
                                var qid = questions[this.questionIndex].question_id;
                                var answers = ['A', 'B', 'C', 'D'];
                                var ansid = '';
                                $.get("api/v1/get_student_notsure_answer/" + qid + "/<?php echo $student_log; ?>",
                                        function (data, status) {
                                        if (data.result.error === false) {
                                        ansid = data.result.data;
                                        notsure_ansid = data.result.data_notsure;
                                        if (ansid != '')
                                        {
                                        var studansid = app.convertLower(ansid);
                                        $('#ansopt_' + studansid).addClass('crt_clr');
                                        app.selected_answer = ansid;
                                        app.shownotsureaftersel = true;
                                        app.showcnfrmaftersel = false;
                                        app.questionprevanswered = true;
                                        app.showsurebtnans = false;
                                        }
                                        else if (notsure_ansid != '')
                                        {

                                        var studansid = app.convertLower(notsure_ansid);
                                        $('#ansopt_' + studansid).addClass('notsure_clr');
                                        app.selected_answer = notsure_ansid;
                                        app.shownotsureaftersel = false;
                                        app.showcnfrmaftersel = false;
                                        app.questionprevanswered = true;
                                        app.showsurebtnans = true;
                                        }
                                        else {

                                        app.selected_answer = '';
                                        app.shownotsureaftersel = false;
                                        app.showcnfrmaftersel = false;
                                        app.questionprevanswered = false;
                                        app.showsurebtnans = false;
                                        }


                                        }
                                        });
                                },
                                nextNoSave : function () {

                                this.selected_answer = '';
                                this.showsurebtnans = false;
                                this.shownextnosave = true;
                                this.shownotsureaftersel = false;
                                this.showcnfrmaftersel = false;
                                this.questionprevanswered = false;
                                $('.loadingoverlay').show();
                                setTimeout(() => {
                                applyMathAjax();
                                $('.loadingoverlay').hide();
                                }, 600);
                                if (this.questionIndex == this.quiz.questions.length - 1)   {
                                this.savetimetaken();
                                this.quizdurtext();
                                }


                                if (this.questionIndex < this.quiz.questions.length) {
                                this.questionIndex++;
                                }



                                var questions = <?php echo json_encode($questions_list); ?>;
                                var qid = questions[this.questionIndex].question_id;
                                var answers = ['A', 'B', 'C', 'D'];
                                var ansid = '';
                                $.get("api/v1/get_student_notsure_answer/" + qid + "/<?php echo $student_log; ?>",
                                        function (data, status) {
                                        if (data.result.error === false) {
                                        ansid = data.result.data;
                                        notsure_ansid = data.result.data_notsure;
                                        if (ansid != '')
                                        {
                                        var studansid = app.convertLower(ansid);
                                        $('#ansopt_' + studansid).addClass('crt_clr');
                                        app.selected_answer = ansid;
                                        app.shownotsureaftersel = true;
                                        app.showcnfrmaftersel = false;
                                        app.questionprevanswered = true;
                                        app.showsurebtnans = false;
                                        }
                                        else if (notsure_ansid != '')
                                        {
                                        var studansid = app.convertLower(notsure_ansid);
                                        $('#ansopt_' + studansid).addClass('notsure_clr');
                                        app.selected_answer = notsure_ansid;
                                        app.shownotsureaftersel = false;
                                        app.showcnfrmaftersel = false;
                                        app.questionprevanswered = true;
                                        app.showsurebtnans = true;
                                        }
                                        else {

                                        app.selected_answer = '';
                                        app.shownotsureaftersel = false;
                                        app.showcnfrmaftersel = false;
                                        app.questionprevanswered = false;
                                        app.showsurebtnans = false;
                                        }
                                        }
                                        });
                                },
                                selectOption: function (index) {
                                $('.loadingoverlay').show();
    <?php if ($type == 'Year Order') { ?>
                                    if (this.questionIndex == this.quiz.questions.length - 1)   {
                                    this.savetimetaken();
                                    this.quizdurtext();
                                    }
    <?php } ?>

                                if (!app.showimmediate) {
                                var questions = <?php echo json_encode($questions_list); ?>;
                                var answers = ['A', 'B', 'C', 'D'];
                                $.each(answers, function(ansi, ansv) {
                                var ansvl = app.convertLower(ansv);
                                $('#ansopt_' + ansvl).removeClass('crt_clr');
                                $('#ansopt_' + ansvl).removeClass('is-selected');
                                $('#ansopt_' + ansvl).removeClass('wrng_clr');
                                });
                                $.post("api/v1/free_user_store_answer",
                                {
                                question_id: questions[this.questionIndex].question_id,
                                        answer: answers[index],
                                        student_log_id: <?php echo $student_log; ?>
                                },
                                        function (data, status) {
                                        if (data.result.error === false) {
                                        app.studanscnt();
                                        if (app.questionIndex == app.quiz.questions.length - 1) {
                                        app.chkAllquesAnswered();
                                        }
                                        }
                                        });
                                setTimeout(() => {
                                Vue.set(this.userResponses, this.questionIndex, index);
                                if (this.questionIndex < this.quiz.questions.length) {
                                //this.questionIndex++;      


                                if (this.questionIndex == this.quiz.questions.length - 1) {
                                if (this.isAllQAnsed) {
                                app.score();
    <?php if ($type == 'Year Order') { ?>
                                    //if(this.questionIndex == this.quiz.questions.length-1)   {
                                    this.savetimetaken();
                                    this.quizdurtext();
                                    //   }
    <?php } ?>
                                this.savequizendtime();
                                this.questionIndex++;
                                this.stopTimer();
                                this.showTimer = false;
                                }

                                } else
                                {
                                this.questionIndex++;
                                }




    <?php // if($testmode==1){           ?>
                                if (this.olqshow) {
                                this.showQuestionOtherLang();
                                }
    <?php // }    ?>


                                if (this.questionIndex < this.quiz.questions.length) {
                                
                                var nqid = questions[this.questionIndex].question_id;
                                if (!app.showimmediate) {
                                $.get("api/v1/free_user_get_student_answer/" + nqid + "/<?php echo $student_log; ?>",
                                        function (data, status) {

                                        if (data.result.error === false) {

                                        ansid = data.result.data;
                                        var studansid = app.convertLower(ansid);
                                        $('#ansopt_' + studansid).addClass('crt_clr');
                                        app.isDisabled = false;
                                        app.showimmediateblk = false;
                                        //app.shownotimmdnxt = false;
                                        app.shownotimmdnxt = true;
                                        } else {

                                        app.shownotimmdnxt = false;
                                        }
                                        });
                                }
                                }
                                }
                                }, 500);
                                this.continueTimer();
                                setTimeout(() => {
                                applyMathAjax();
                                $('.loadingoverlay').hide();
                                }, 600);
                                }

                                if (app.showimmediate) {
                                if (!app.isDisabled) {
                                var questions = <?php echo json_encode($questions_list); ?>;
                                var answers = ['A', 'B', 'C', 'D'];
                                $.each(answers, function(ansi, ansv) {
                                var ansvl = app.convertLower(ansv);
                                $('#ansopt_' + ansvl).removeClass('crt_clr');
                                $('#ansopt_' + ansvl).removeClass('is-selected');
                                $('#ansopt_' + ansvl).removeClass('wrng_clr');
                                });
                                $.post("api/v1/free_user_store_answer",
                                {
                                question_id: questions[this.questionIndex].question_id,
                                        answer: answers[index],
                                        student_log_id: <?php echo $student_log; ?>
                                },
                                        function (data, status) {
                                        if (data.result.error === false) {
                                        app.studanscnt();
                                        if (data.result.error === false) {
                                        if (app.questionIndex == app.quiz.questions.length - 1) {
                                        app.chkAllquesAnswered();
                                        }
                                        }
                                        }
                                        });
                                // var questions = <?php echo json_encode($questions_list); ?>;
                                var qid = questions[this.questionIndex].question_id;
                                //var answers   = ['A', 'B', 'C', 'D'];
                                var ansid = answers[index];
                                $.get("api/v1/get_question_answer/" + qid,
                                        function (data, status) {
                                        if (data.result.error === false) {

                                        var corransid = app.convertLower(data.result.data);
                                        var studansid = app.convertLower(ansid);
                                        if (data.result.data == ansid) {
                                        $('#ansopt_' + corransid).addClass('crt_clr');
                                        } else {
                                        $('#ansopt_' + corransid).addClass('crt_clr');
                                        $('#ansopt_' + studansid).addClass('wrng_clr');
                                        }
                                        }
                                        });
                                
                                app.showimmediateblk = true;
                                app.isDisabled = true;
                                }
                                }


                                setTimeout(() => {
                                applyMathAjax();
                                $('.loadingoverlay').hide();
                                }, 600);
                                },
                                next: function () {


                                $('.loadingoverlay').show();
                                setTimeout(() => {
                                applyMathAjax();
                                $('.loadingoverlay').hide();
                                }, 600);
                                app.isDisabled = false;
                                app.showimmediateblk = false;
                                app.shownotimmdnxt = false;
                                

                                if (this.questionIndex == this.quiz.questions.length - 1) {
                                if (this.isAllQAnsed) {
                                app.score();
    <?php if ($type == 'Year Order') { ?>
                                    //if(this.questionIndex == this.quiz.questions.length-1)   {
                                    this.savetimetaken();
                                    this.quizdurtext();
                                    //   }
    <?php } ?>
                                this.savequizendtime();
                                this.questionIndex++;
                                this.stopTimer();
                                this.showTimer = false;
                                }

                                } else
                                {
                                this.questionIndex++;
                                }




                                if (this.questionIndex < this.quiz.questions.length) {
                                var questions = <?php echo json_encode($questions_list); ?>;
                                var qid = questions[this.questionIndex].question_id;
                                var answers = ['A', 'B', 'C', 'D'];
                                if (app.showimmediate) {


                                $.get("api/v1/free_user_get_student_answer/" + qid + "/<?php echo $student_log; ?>",
                                        function (data, status) {
                                        if (data.result.error === false) {
                                        ansid = data.result.data;
                                        $.each(answers, function(ansi, ansv) {
                                        var ansvl = app.convertLower(ansv);
                                        $('#ansopt_' + ansvl).removeClass('crt_clr');
                                        $('#ansopt_' + ansvl).removeClass('is-selected');
                                        $('#ansopt_' + ansvl).removeClass('wrng_clr');
                                        });
                                        $.get("api/v1/get_question_answer/" + qid,
                                                function (data, status) {
                                                if (data.result.error === false) {

                                                var corransid = app.convertLower(data.result.data);
                                                var studansid = app.convertLower(ansid);
                                                if (data.result.data == ansid) {
                                                $('#ansopt_' + corransid).addClass('crt_clr');
                                                } else {
                                                $('#ansopt_' + corransid).addClass('crt_clr');
                                                $('#ansopt_' + studansid).addClass('wrng_clr');
                                                }

                                                }
                                                });
                                        app.showimmediateblk = true;
                                        app.isDisabled = false;
                                        app.shownotimmdnxt = false;
                                        }
                                        });
                                } else {


                                $.get("api/v1/free_user_get_student_answer/" + qid + "/<?php echo $student_log; ?>",
                                        function (data, status) {
                                        if (data.result.error === false) {
                                        ansid = data.result.data;
                                        $.each(answers, function(ansi, ansv) {
                                        var ansvl = app.convertLower(ansv);
                                        $('#ansopt_' + ansvl).removeClass('crt_clr');
                                        $('#ansopt_' + ansvl).removeClass('is-selected');
                                        $('#ansopt_' + ansvl).removeClass('wrng_clr');
                                        });
                                        var studansid = app.convertLower(ansid);
                                        $('#ansopt_' + studansid).addClass('crt_clr');
                                        app.isDisabled = false;
                                        app.showimmediateblk = false;
                                        
                                        app.shownotimmdnxt = true;
                                        }
                                        });
                                }


    <?php // if($testmode==1){           ?>
                                if (this.olqshow) {
                                this.showQuestionOtherLang();
                                }
    <?php // }    ?>
                                }


                                this.continueTimer();
                                },
                                prev: function () {

                                $('.loadingoverlay').show();
                                app.isDisabled = false;
                                app.showimmediateblk = false;
                                app.shownotimmdnxt = false;
                                if (this.quiz.questions.length > 0)
                                        this.questionIndex--;
                                var questions = <?php echo json_encode($questions_list); ?>;
                                var qid = questions[this.questionIndex].question_id;
                                var answers = ['A', 'B', 'C', 'D'];
                                var ansid = '';
                                if (app.showimmediate) {
                                $.get("api/v1/free_user_get_student_answer/" + qid + "/<?php echo $student_log; ?>",
                                        function (data, status) {
                                        if (data.result.error === false) {
                                        ansid = data.result.data;
                                        $.each(answers, function(ansi, ansv) {
                                        var ansvl = app.convertLower(ansv);
                                        $('#ansopt_' + ansvl).removeClass('crt_clr');
                                        $('#ansopt_' + ansvl).removeClass('is-selected');
                                        $('#ansopt_' + ansvl).removeClass('wrng_clr');
                                        });
                                        $.get("api/v1/get_question_answer/" + qid,
                                                function (data, status) {
                                                if (data.result.error === false) {

                                                var corransid = app.convertLower(data.result.data);
                                                var studansid = app.convertLower(ansid);
                                                if (data.result.data == ansid) {
                                                $('#ansopt_' + corransid).addClass('crt_clr');
                                                } else {
                                                $('#ansopt_' + corransid).addClass('crt_clr');
                                                $('#ansopt_' + studansid).addClass('wrng_clr');
                                                }

                                                }
                                                });
                                        app.showimmediateblk = true;
                                        app.isDisabled = false;
                                        app.shownotimmdnxt = false;
                                        }
                                        });
                                } else {


                                $.get("api/v1/free_user_get_student_answer/" + qid + "/<?php echo $student_log; ?>",
                                        function (data, status) {
                                        if (data.result.error === false) {
                                        ansid = data.result.data;
                                        $.each(answers, function(ansi, ansv) {
                                        var ansvl = app.convertLower(ansv);
                                        $('#ansopt_' + ansvl).removeClass('crt_clr');
                                        $('#ansopt_' + ansvl).removeClass('is-selected');
                                        $('#ansopt_' + ansvl).removeClass('wrng_clr');
                                        });
                                        var studansid = app.convertLower(ansid);
                                        $('#ansopt_' + studansid).addClass('crt_clr');
                                        app.isDisabled = false;
                                        app.showimmediateblk = false;
                                        app.shownotimmdnxt = true;
                                        }
                                        });
                                }

    <?php // if($testmode==1){           ?>
                                if (this.olqshow) {
                                this.showQuestionOtherLang();
                                }
    <?php // }    ?>

                                setTimeout(() => {
                                applyMathAjax();
                                $('.loadingoverlay').hide();
                                }, 600);
                                this.continueTimer();
                                },
                                // Return "true" count in userResponses

                                immChange: function () {


                                if (app.showimmediate) {
                                app.shownotimmdnxt = false;
                                if (!app.isDisabled) {
                                app.showimmediateblk = false;
                                } else {
                                app.showimmediateblk = true;
                                }
                                } else {
                                app.showimmediateblk = false;
                                if (app.isDisabled) {
                                app.shownotimmdnxt = true;
                                }
                                }



                                var questions = <?php echo json_encode($questions_list); ?>;
                                var qid = questions[this.questionIndex].question_id;
                                var answers = ['A', 'B', 'C', 'D'];
                                if (app.showimmediate) {


                                $.get("api/v1/free_user_get_student_answer/" + qid + "/<?php echo $student_log; ?>",
                                        function (data, status) {
                                        if (data.result.error === false) {
                                        ansid = data.result.data;
                                        $.get("api/v1/get_question_answer/" + qid,
                                                function (data, status) {
                                                if (data.result.error === false) {

                                                var corransid = app.convertLower(data.result.data);
                                                var studansid = app.convertLower(ansid);
                                                if (data.result.data == ansid) {
                                                $('#ansopt_' + corransid).addClass('crt_clr');
                                                } else {
                                                $('#ansopt_' + corransid).addClass('crt_clr');
                                                $('#ansopt_' + studansid).addClass('wrng_clr');
                                                }

                                                }
                                                });
                                        app.showimmediateblk = true;
                                        app.isDisabled = false;
                                        app.shownotimmdnxt = false;
                                        }
                                        });
                                } else {


                                $.get("api/v1/free_user_get_student_answer/" + qid + "/<?php echo $student_log; ?>",
                                        function (data, status) {
                                        if (data.result.error === false) {
                                        ansid = data.result.data;
                                        var studansid = app.convertLower(ansid);
                                        $('#ansopt_' + studansid).addClass('crt_clr');
                                        app.isDisabled = false;
                                        app.showimmediateblk = false;
                                        //app.shownotimmdnxt = false;
                                        app.shownotimmdnxt = true;
                                        }
                                        });
                                }


                                },
                                goQuesAns: function (val) {


                                $('.loadingoverlay').show();
                                setTimeout(() => {
                                applyMathAjax();
                                $('.loadingoverlay').hide();
                                }, 600);
                                app.isDisabled = false;
                                app.showimmediateblk = false;
                                app.shownotimmdnxt = false;
                                $('#header-hidden').show();
                                $('#quiz-hidden').show();
                                $('.questionFooter').show();
                                $('#olqhidden').show();
                                $('.question-admin-panel').hide();
                                this.questionIndex = val;
                                var questions = <?php echo json_encode($questions_list); ?>;
                                var qid = questions[this.questionIndex].question_id;
                                if (app.showimmediate) {


                                $.get("api/v1/free_user_get_student_answer/" + qid + "/<?php echo $student_log; ?>",
                                        function (data, status) {
                                        if (data.result.error === false) {
                                        ansid = data.result.data;
                                        $.get("api/v1/get_question_answer/" + qid,
                                                function (data, status) {
                                                if (data.result.error === false) {

                                                var corransid = app.convertLower(data.result.data);
                                                var studansid = app.convertLower(ansid);
                                                if (data.result.data == ansid) {
                                                $('#ansopt_' + corransid).addClass('crt_clr');
                                                } else {
                                                $('#ansopt_' + corransid).addClass('crt_clr');
                                                $('#ansopt_' + studansid).addClass('wrng_clr');
                                                }

                                                }
                                                });
                                        app.showimmediateblk = true;
                                        app.isDisabled = false;
                                        app.shownotimmdnxt = false;
                                        }
                                        });
                                } else {


                                $.get("api/v1/free_user_get_student_answer/" + qid + "/<?php echo $student_log; ?>",
                                        function (data, status) {
                                        if (data.result.error === false) {
                                        ansid = data.result.data;
                                        var studansid = app.convertLower(ansid);
                                        $('#ansopt_' + studansid).addClass('crt_clr');
                                        app.isDisabled = false;
                                        app.showimmediateblk = false;
                                        //app.shownotimmdnxt = false;
                                        app.shownotimmdnxt = true;
                                        }
                                        });
                                }


    <?php // if($testmode==1){           ?>
                                if (this.olqshow) {
                                this.showQuestionOtherLang();
                                }
    <?php // }    ?>

                                },
                                
                                goquestion: function () {
                                var goquestion = parseInt($("#goques").val());
                                if (goquestion > this.quiz.questions.length)   {
                                var maxnum = this.quiz.questions.length + 1
                                        swal("Error!", "Number Should be Less than " + maxnum, "error");
                                return;
                                }
                                else
                                {
                                this.questionIndex = goquestion - 1;
                                $('.loadingoverlay').show();
    <?php // if($testmode==1){           ?>
                                if (this.olqshow) {
                                this.showQuestionOtherLang();
                                }
    <?php // }    ?>

                                setTimeout(() => {
                                applyMathAjax();
                                $('.loadingoverlay').hide();
                                }, 600);
                                }

                                },
                                showolqChange: function () {

                                !this.olqshow;
                                if (this.olqshow) {
                                this.showQuestionOtherLang();
                                }
                                },
                                showQuestionOtherLang: function() {

    <?php // if($testmode==1){           ?>
                                this.olqd = null;
                                var other_language = '<?php echo $other_language['language_id']; ?>';
                                var questions = <?php echo json_encode($questions_list); ?>;
                                var otherlang_questions = <?php echo json_encode($otherlang_questions_list); ?>;
                                var qno = questions[this.questionIndex].question_no;
                                var ye = questions[this.questionIndex].year_id;
                                if (otherlang_questions) {
                                for (let i = 0; i < otherlang_questions.length; i++) {
                                if (otherlang_questions[i].question_no == qno && otherlang_questions[i].year_id == ye){
                                this.olqd = otherlang_questions[i];
                                //this.olqshow = true;


                                }
                                }
                                } else {
                                this.olqd = null;
                                }

                                setTimeout(() => {
                                applyMathAjax();
                                $('.loadingoverlay').hide();
                                }, 600);
    <?php // }    ?>
                                },
                                showExplanationOtherLang: function() {
                                //display other langauage explaination
    <?php // if($testmode==1){           ?>


                                var other_language = '<?php echo $other_language['language_id']; ?>';
                                var questions = <?php echo json_encode($questions_list); ?>;
                                var otherlang_questions = <?php echo json_encode($otherlang_questions_list); ?>;
                                if (otherlang_questions) {
                                //alert(otherlang_questions.length);
                                var sample = new Array();
                                for (let il = 0; il < otherlang_questions.length; il++) {
                                sample[otherlang_questions[il].year_id + otherlang_questions[il].question_no] = {'explanation_img_direction':otherlang_questions[il].explanation_img_direction, 'explanation':otherlang_questions[il].explanation, 'show_image_explanation':otherlang_questions[il].show_image_explanation, 'image_path_explanation':otherlang_questions[il].image_path_explanation};
                                }

                                this.otherlangquiz = sample;
                                console.log(sample);
                                }
    <?php // }    ?>
                                },
                                
                                score: function () {
                                var scoreva = 0;
                                $.get("api/v1/free_user_get_result_correct_ans_cnt/<?php echo $student_log; ?>",
                                        function (data, status) {
                                        if (data.result.error === false) {
                                        scoreva = data.result.correct_cnt;
                                        }
                                        app.scoreval = scoreva;
                                        });
                                },
                                startTimer:function() {
                                if (!this.isTimerPaused) {
                                this.totseconds++;
                                this.secondslabel = pad(this.totseconds % 60);
                                this.minuteslabel = pad(parseInt(this.totseconds / 60));
                                }
                                var alertduration = this.totalquizduration - this.quizalertbeforemins;
                                if (this.minuteslabel == alertduration && this.secondslabel == 0) {
                                this.quizTimerAlert();
                                }
                                if (this.minuteslabel == this.totalquizduration && this.secondslabel == 0) {
                                this.savenoquesdur();
                                this.quizTimertotdurAlert();
                                }
                                },
                                pauseTimer: function () {
                                this.isTimerPaused = true;
                                },
                                playTimer: function () {
                                if (!this.isTimerStart) {
                                this.isTimerStart = true;
                                this.timerId = setInterval(this.startTimer, 1000);
                                }
                                this.continueTimer();
                                },
                                stopTimer: function () {
                                this.pauseTimer();
                                clearInterval(this.timerId);
                                },
                                continueTimer: function () {
                                if (this.isTimerStart) {
                                this.isTimerPaused = false;
                                }
                                },
                                savenoquesdur:function() {
                                $.post("api/v1/free_user_store_duration_question",
                                {
                                student_log: <?php echo $student_log; ?>
                                },
                                        function (data, status) {
                                        if (data.result.error === false) {

                                        }
                                        });
                                },
                                savetimetaken:function() {
                                $.post("api/v1/free_user_store_stud_duration",
                                {
                                stud_duration : this.totseconds,
                                        student_log: <?php echo $student_log; ?>
                                },
                                        function (data, status) {
                                        if (data.result.error === false) {

                                        }
                                        });
                                },
                                savequizendtime: function () {
                                $.post("api/v1/free_user_store_quiz_end_time",
                                {
                                student_log: <?php echo $student_log; ?>
                                },
                                        function (data, status) {
                                        if (data.result.error === false) {

                                        }
                                        });
                                },
                                quizTimerAlert:function() {
                                swal('Only ' + this.quizalertbeforemins + ' Minutes Left');
                                },
                                quizTimertotdurAlert:function() {
                                swal(this.totalquizduration + ' Minutes Completed. But you can answer and complete the pending questions');
                                },
                                quizdurtext:function() {
                                $('.loadingoverlay').show();
                                $.get("api/v1/free_user_get_student_log_time_info/<?php echo $student_log; ?>",
                                        function (data, status) {
                                        if (data.result.error === false) {
                                        var qt = 0;
                                        var qta = 0;
                                        app.data_ques_answered = data.result.ques_answered;
                                        qt = data.result.ques_duration;
                                        qta = qt / 60;
                                        app.data_ques_duration = parseInt(qta);
                                        $('.loadingoverlay').hide();
                                        }
                                        });
                                //return true; 

                                },
                                chkAllquesAnswered: function () {
                                $.get("api/v1/free_user_get_result_detail_ans_cnt/<?php echo $student_log; ?>",
                                        function (data, status) {
                                        if (data.result.error === false) {
                                        if (data.result.ans_cnt == app.quiz.questions.length) {
                                        app.isAllQAnsed = true;
                                        } else {
                                        app.isAllQAnsed = false;
                                        //app.isAllQAnsed = true;
                                        }

                                        }
                                        });
                                },
                                studanscnt: function() {
                                $.get("api/v1/free_user_get_result_detail_ans_cnt/<?php echo $student_log; ?>",
                                        function (data, status) {
                                        app.anscntstud = data.result.ans_cnt;
                                        });
                                }
                        }
                });
                setTimeout(() => {
                $("#feedback-popup").show();
                }, 500);
            </script>
            <script>
                
                function pad(val) {
                var valString = val + "";
                if (valString.length < 2) {
                return "0" + valString;
                } else {
                return valString;
                }
                }

                $(document).ready(function(){
                $('.loadingoverlay').show();
                setTimeout(() => {
                applyMathAjax();
                $('.quiz-section').show();
    <?php // if($testmode==1){           ?>
                //display other lanaguage explanation           
                app.showExplanationOtherLang();
    <?php // }    ?>
    <?php // if($testmode == 0) {     ?>
    <?php if ($type == 'Year Order') { ?>
                    //setInterval(app.startTimer, 1000);
    <?php } ?>
                $('.loadingoverlay').hide();
                }, 600);
                });
            </script>
            <script>
                function showqno() {
                $('#header-hidden').hide();
                $('#quiz-hidden').hide();
                $('.question-admin-panel').show();
                }
                function showqus() {
                $('#header-hidden').show();
                $('#quiz-hidden').show();
                $('#olqhidden').show();
                $('.question-admin-panel').hide();
                $('.questionFooter').show();
                app.showqap = false;
                }
                function goQuesFrPanel(val) {
                app.goQuesAns(val);
                }
                function topicShowDetail(tid) {

               
                var seltoptxt = '';
                seltoptxt = $('#btnsorderdetail_' + tid).html();
                $('.btnsorderdetail').html('Show Details');
                if (seltoptxt == 'Show Details') {
                app.divshowsorderdetail(tid,<?php echo $student_log; ?>);
                $('#question_list_det').show();
                $('#btnsorderdetail_' + tid).html('Hide Details');
                }
                if (seltoptxt == 'Hide Details') {
                $('#btnsorderdetail_' + tid).html('Show Details');
                $('#question_list_det').hide();
                }

                }
                function yordershowdetail(){

                $('#question_list_det').toggle();
                if ($('#question_list_det').css('display') == 'none'){
                $('#btnyorderdetail').html('Show Details');
                } else {
                $('#btnyorderdetail').html('Hide Details');
                }

                
                }


            </script>



            <?php
        }


        if ($quiz_from_page == 'quiz') {
            ?>
            <script>
                  
                image_url = 'http://examhorse.com/api/v1/';
                var app = new Vue({
                el: "#app",
                        data: {

                        },
                        filters: {
                        charIndex: function (i) {
                        return String.fromCharCode(97 + i);
                        },
                                AddPrefix: function (value, prefix) {
                                return prefix + value;
                                }
                        },
                        methods: {
                        divshowsorderdetailFree: function (tid, lid) {


                        $('.loadingoverlay').show();
                        setTimeout(() => {
                        applyMathAjax();
                        $('.loadingoverlay').hide();
                        }, 600);
                        $.ajax({
                        type: "GET",
                                url: 'api/v1/free_user_get_result_detail_by_topic/' + lid + '/' + tid,
                                success: function (data) {
                                if (data.result.error === false) {
                                var qlist = '';
                                var correct_ans = '';
                                var student_ans = '';
                                $.each(data.result.data, function (key, val) {
                                var foc = '';
                                if (key == 0) {
                                foc = " id='ansdetfocus' tabindex='1' style='outline: none;'";
                                }
                                qlist = qlist + '<div class="question-title"' + foc + '><h6>' + (key + 1) + '. ' + val.name + '</h6>';
                                if (val.a !== '') {
                                correct_ans = '';
                                student_ans = '';
                                if ((val.answer).toUpperCase() === 'A') {
                                correct_ans = 'crt_clr';
                                }
                                if ((val.student_answer).toUpperCase() === 'A' && (val.answer).toUpperCase() !== 'A') {
                                student_ans = 'wrng_clr';
                                }
                                qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="quiz-option-float">A.</span> ' + val.a + '</div></div>';
                                }
                                if (val.b !== '') {
                                correct_ans = '';
                                student_ans = '';
                                if ((val.answer).toUpperCase() === 'B') {
                                correct_ans = 'crt_clr';
                                }
                                if ((val.student_answer).toUpperCase() === 'B' && (val.answer).toUpperCase() !== 'B') {
                                student_ans = 'wrng_clr';
                                }
                                qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="quiz-option-float">B.</span> ' + val.b + '</div></div>';
                                }
                                if (val.c !== '') {
                                correct_ans = '';
                                student_ans = '';
                                if ((val.answer).toUpperCase() === 'C') {
                                correct_ans = 'crt_clr';
                                }
                                if ((val.student_answer).toUpperCase() === 'C' && (val.answer).toUpperCase() !== 'C') {
                                student_ans = 'wrng_clr';
                                }
                                qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="quiz-option-float">C.</span> ' + val.c + '</div></div>';
                                }
                                if (val.d !== '') {
                                correct_ans = '';
                                student_ans = '';
                                if ((val.answer).toUpperCase() === 'D') {
                                correct_ans = 'crt_clr';
                                }
                                if ((val.student_answer).toUpperCase() === 'D' && (val.answer).toUpperCase() !== 'D') {
                                student_ans = 'wrng_clr';
                                }
                                qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="quiz-option-float">D.</span> ' + val.d + '</div></div>';
                                }
                                if (val.image_path_explanation !== '' && val.explanation_img_direction !== 'bottom') {
                                qlist = qlist + '<div class="explanation_image"><img onClick="showexpimgpopup(\'' + image_url + val.image_path_explanation + '\');" src="' + image_url + val.image_path_explanation + '"></div>';
                                } else {
                                qlist = qlist + '';
                                }
                                if (val.explanation !== '') {
                                qlist = qlist + '<div class="explanation-section"><strong>Explanation</strong> : ' + val.explanation + '</div>';
                                } else {
                                //qlist = qlist + '<div class="explanation-section">No Explanation</div>';
                                }
                                if (val.image_path_explanation !== '' && val.explanation_img_direction !== 'top') {
                                qlist = qlist + '<div class="explanation_image"><img onClick="showexpimgpopup(\'' + image_url + val.image_path_explanation + '\');" src="' + image_url + val.image_path_explanation + '"></div>';
                                } else {
                                qlist = qlist + '';
                                }
                                qlist = qlist + '</div>';
                                });
                                $('#question_list_det').html(qlist);
                                $('#question_list_det').show();
                                //$("#create").toggle();
                                $('#ansdetfocus').focus();
                                } else {
                                swal('Information', data.result.message, 'info');
                                }
                                },
                                error: function (err) {
                                swal('Error', err.statusText, 'error');
                                }
                        });
                        },
                                divshowYearFree: function (lid) {
                                $('.loadingoverlay').show();
                                setTimeout(() => {
                                applyMathAjax();
                                $('.loadingoverlay').hide();
                                }, 600);
                                $.ajax({
                                type: "GET",
                                        url: 'api/v1/free_user_get_result_detail/' + lid,
                                        success: function (data) {
                                        if (data.result.error === false) {
                                        var qlist = '';
                                        var correct_ans = '';
                                        var student_ans = '';
                                        var cor_cnt = 0;
                                        var ans_cnt = 0;
                                        var wrong_cnt = 0;
                                        $.each(data.result.data, function (key, val) {
                                        ans_cnt = ans_cnt + 1;
                                        qlist = qlist + '<div class="question-title"><h6>' + (key + 1) + '. ' + val.name + '</h6>';
                                        if (val.a !== '') {
                                        correct_ans = '';
                                        student_ans = '';
                                        if ((val.answer).toUpperCase() === 'A') {
                                        correct_ans = 'crt_clr';
                                        }
                                        if ((val.student_answer).toUpperCase() === 'A' && (val.answer).toUpperCase() !== 'A') {
                                        student_ans = 'wrng_clr';
                                        wrong_cnt = wrong_cnt + 1;
                                        }
                                        qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="quiz-option-float">A.</span> ' + val.a + '</div></div>';
                                        }
                                        if (val.b !== '') {
                                        correct_ans = '';
                                        student_ans = '';
                                        if ((val.answer).toUpperCase() === 'B') {
                                        correct_ans = 'crt_clr';
                                        }
                                        if ((val.student_answer).toUpperCase() === 'B' && (val.answer).toUpperCase() !== 'B') {
                                        student_ans = 'wrng_clr';
                                        wrong_cnt = wrong_cnt + 1;
                                        }
                                        qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="quiz-option-float">B.</span> ' + val.b + '</div></div>';
                                        }
                                        if (val.c !== '') {
                                        correct_ans = '';
                                        student_ans = '';
                                        if ((val.answer).toUpperCase() === 'C') {
                                        correct_ans = 'crt_clr';
                                        }
                                        if ((val.student_answer).toUpperCase() === 'C' && (val.answer).toUpperCase() !== 'C') {
                                        student_ans = 'wrng_clr';
                                        wrong_cnt = wrong_cnt + 1;
                                        }
                                        qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="quiz-option-float">C.</span> ' + val.c + '</div></div>';
                                        }
                                        if (val.d !== '') {
                                        correct_ans = '';
                                        student_ans = '';
                                        if ((val.answer).toUpperCase() === 'D') {
                                        correct_ans = 'crt_clr';
                                        }
                                        if ((val.student_answer).toUpperCase() === 'D' && (val.answer).toUpperCase() !== 'D') {
                                        student_ans = 'wrng_clr';
                                        wrong_cnt = wrong_cnt + 1;
                                        }
                                        qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="quiz-option-float">D.</span> ' + val.d + '</div></div>';
                                        }
                                        if (val.image_path_explanation !== '' && val.explanation_img_direction !== 'bottom') {
                                        qlist = qlist + '<div class="explanation_image"><img onClick="showexpimgpopup(\'' + image_url + val.image_path_explanation + '\');" src="' + image_url + val.image_path_explanation + '"></div>';
                                        } else {
                                        qlist = qlist + '';
                                        }
                                        if (val.explanation !== '') {
                                        qlist = qlist + '<div class="explanation-section"><strong>Explanation</strong> : ' + val.explanation + '</div>';
                                        } else {
                                        //qlist = qlist + '<div class="explanation-section">No Explanation</div>';
                                        }
                                        if (val.image_path_explanation !== '' && val.explanation_img_direction !== 'top') {
                                        qlist = qlist + '<div class="explanation_image"><img onClick="showexpimgpopup(\'' + image_url + val.image_path_explanation + '\');" src="' + image_url + val.image_path_explanation + '"></div>';
                                        } else {
                                        qlist = qlist + '';
                                        }
                                        qlist = qlist + '</div>';
                                        });
                                        $('#question_list_det').html(qlist);
                                        $('#question_list_det').show();
                                                                           
                                        } else {
                                        swal('Information', data.result.message, 'info');
                                        }
                                        },
                                        error: function (err) {
                                        swal('Error', err.statusText, 'error');
                                        }
                                });
                                },
                        }

                });
                function yordershowdetailFree(lid) {
                app.divshowYearFree(lid);
                }

                function topicShowDetailFree(tid, lid) {
                app.divshowsorderdetailFree(tid, lid);
                }
            </script> 
        <?php } ?>


        <script>
            function showexpimgpopup(imgsrc) {
            if (imgsrc != '') {
            $('.explimagepreview').attr('src', imgsrc);
            $('#explimagemodal').modal('show');
            }
            }
        </script>

    </body>
</html>
