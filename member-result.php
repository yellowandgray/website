<?php
session_start();
include('login-check.php');
require_once 'api/include/common.php';
$obj = new Common();
if (isset($_SESSION['student_register_id'])) {
    $student = $obj->selectrow('*', 'student_register', 'student_register_id = ' . $_SESSION['student_register_id']);
    $student_answer = $obj->selectAll('sa.*, l.name AS language', 'student_answer AS sa LEFT JOIN language AS l ON l.language_id = sa.language_id', 'student_answer_id > 0');

    $student_log = $obj->selectAll('sl.*,l.name As language_name', 'student_log sl LEFT JOIN language l ON sl.language_id=l.language_id', 'student_register_id=' . $_SESSION['student_register_id'] . ' ORDER BY student_log_id DESC');


    $student_log_order = $obj->selectAll('slo.*', 'student_log AS sl LEFT JOIN student_log_order As slo  ON sl.student_log_id=slo.student_log_id', ' sl.student_register_id=' . $_SESSION['student_register_id']);
    $student_log_year = $obj->selectAll('sly.*,y.year As year', 'student_log AS sl LEFT JOIN student_log_year As sly ON sl.student_log_id=sly.student_log_id LEFT JOIN year As y ON y.year_id=sly.year_id', ' sl.student_register_id=' . $_SESSION['student_register_id']);



    $ans_log_order = array();
    if (count($student_log_order) > 0) {
        foreach ($student_log_order as $student_log_order_v) {

            $ans_log_order[$student_log_order_v['student_log_id']] = $student_log_order_v['student_log_order'];
        }
    }


    $stud_all_sel_year = Array();
    $stud_all_sel_topic = Array();


    $ans_log_year = array();
    if (count($student_log_year) > 0) {
        foreach ($student_log_year as $student_log_year_v) {
            $ans_log_year[$student_log_year_v['student_log_id']][] = $student_log_year_v['year'];
            if ($student_log_year_v['year_id'] != '') {
                if (!in_array($student_log_year_v['year_id'], $stud_all_sel_year)) {
                    $stud_all_sel_year[] = $student_log_year_v['year_id'];
                }
            }
        }
    }



    $student_log_topic = $obj->selectAll('slt.*,t.name As topic_name,subject.subject_id As subject_id,subject.name As subject_name', 'student_log As sl'
            . ' LEFT JOIN student_log_topic slt ON sl.student_log_id=slt.student_log_id LEFT JOIN topic As t ON slt.topic_id=t.topic_id LEFT JOIN subject ON '
            . 't.subject_id=subject.subject_id', 'sl.student_register_id = ' . $_SESSION['student_register_id'] . ' AND sl.student_log_id IS NOT NULL AND sl.student_log_id<>\'\' ORDER BY student_log_id,subject.subject_id,t.topic_id ASC');



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


    $stud_all_sel_year_id_val = '';
    $stud_all_sel_topic_id_val = '';

    $ques_year_cnt = array();
    $ques_cor_ans_cnt = array();

    if (count($stud_all_sel_year) > 0) {
        $stud_all_sel_year_id_val = implode(',', $stud_all_sel_year);
    }

    if (count($stud_all_sel_topic) > 0) {
        $stud_all_sel_topic_id_val = implode(',', $stud_all_sel_topic);
    }



    //total questions count in topic
    if ($stud_all_sel_topic_id_val != '') {
        //total questions year , topic 
        $student_log_question = $obj->selectAll('q.*,year.year,subject.name As subject_name,t.name As topic_name', ' question As q LEFT JOIN year ON q.year_id=year.year_id '
                . 'LEFT JOIN topic As t ON q.topic_id=t.topic_id LEFT JOIN subject ON t.subject_id=subject.subject_id', ' q.topic_id IN (' . $stud_all_sel_topic_id_val . ')');



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



        /*
          echo "<pre>";
          print_r($ques_year_cnt);
          exit;
         */





        $student_log_answer = $obj->selectAll('student_log_detail.*,year.year,question.answer,question.topic_id', ' student_log LEFT JOIN student_log_detail ON student_log.student_log_id=student_log_detail.student_log_id '
                . 'LEFT JOIN question ON student_log_detail.question_id=question.question_id LEFT JOIN year ON question.year_id=year.year_id', 'student_log.student_register_id=' . $_SESSION['student_register_id'] . ' ORDER BY student_log_id DESC,student_log_detail_id DESC');


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

        /*
          echo "<pre>";
          print_r($ques_cor_ans_cnt);
          exit;
         */

        /*
          echo "<pre>";
          print_r($stud_topic_order);

          echo "<pre>";
          print_r($stud_topic_logs);
          exit;
         * 
         */
    }
}
?>
<html lang = 'en'>
    <?php include 'head.php';
    ?>
    <body>
        <div id = 'wrapper'>
            <?php include 'menu.php';
            ?>
            <section class = 'topic_section'>
                <div class = 'container'>
                    <div class = 'row'>
<!--                        <div class = 'span4'>
                            <div class = 'result_user_section'>
                                <?php //if (isset($login_student['profile_image']) && $login_student['profile_image'] == '') {
                                    ?>
                                    <div class = 'user_profile' style = 'background: url(<?php //echo BASE_URL . $login_student['gender']; ?>.jpg)no-repeat;background-position: center;background-size: cover'></div>
                                <?php //} else {
                                    ?>
                                    <div class = 'user_profile' style = 'background: url(<?php //echo BASE_URL . $login_student['profile_image']; ?>)no-repeat;background-position: center;background-size: cover'></div>
                                <?php //}
                                ?>
                            </div>
                            <div class = 'user_details'>
                                <h2><?php //echo $student['student_name']; ?></h2>
                                <h4><span><?php //echo $student['mobile'] ?></span></h4>
                                <h5> </h5>
                                <p><?php //echo $student['city']; ?> <?php //echo $student['pin']; ?> </p>
                            </div>
                        </div>-->
                        <div class = 'span12'>
                            <h4>My Completed Test</h4>
                            <!--                            <h6></h6>-->
                            <!-- start: Accordion -->
                            <!--                            <div class = 'accordion' id = 'accordion2'>
                                                            <div class = 'accordion-group'>-->
                            <div class = 'accordion-heading'>
                                <a class = 'accordion-toggle active'> Test Report</a>
                            </div>



                            <div class = 'accordion-body collapse in'>
                                <div class = 'accordion-inner border-none'>
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item active">
                                            <a class="nav-link active" data-toggle="tab" href="#yordertab">Year Order</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#sordertab">Subject Order</a>
                                        </li>

                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane container active" id="yordertab">
                                            <table class = 'table table-striped result_table' style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Year</th>
                                                        <th>Total</th>
                                                        <th>Answered</th>
                                                        <th><i class="icon-ok-sign"></i></th>
                                                        <th><i class="font-icon-remove-circle"></i></th>
                                                    </tr>
                                                </thead>



                                                <tbody>
                                                    <?php
                                                    foreach ($student_log as $student_log_detail) {
                                                        if (isset($ans_log_order[$student_log_detail['student_log_id']]) && ($ans_log_order[$student_log_detail['student_log_id']] == 1)) { //question order
                                                            $log_year_val = '';
                                                            if (isset($ans_log_year[$student_log_detail['student_log_id']])) {
                                                                $log_year_val = $ans_log_year[$student_log_detail['student_log_id']][0];
                                                            }


                                                            $log_detail = $obj->selectRow('COUNT(student_log_detail_id) AS attended, IFNULL((SELECT COUNT(student_log_detail_id) FROM student_log_detail INNER JOIN question ON student_log_detail.question_id=question.question_id WHERE student_log_id=' . $student_log_detail['student_log_id'] . ' AND UPPER(answer) = UPPER(student_answer)), 0) AS correct_answers', 'student_log_detail', 'student_log_id=' . $student_log_detail['student_log_id']);
                                                            $log_attended = $log_detail['attended'];
                                                            $log_correct_answers = $log_detail['correct_answers'];

                                                            if ($log_attended > 0) {
                                                                ?>
                                                                <tr>                 
                                                                    <td><?php echo date('d/m/Y', strtotime($student_log_detail['created_at'])); ?></td>
                                                                    <td><?php echo $log_year_val; ?></td>
                                                                    <td><?php echo $student_log_detail['total_questions']; ?></td>
                                                                    <td><?php echo $log_attended; ?></td>
                                                                    <td><?php echo $log_correct_answers; ?></td>
                                                                    <td><?php echo $log_attended - $log_correct_answers ?></td>
                                                                    <td><button class="btn btn-answerd-clr" id="showbtn_<?php echo $student_log_detail['student_log_id']; ?>" onClick=showFullResult(<?php echo $student_log_detail['student_log_id']; ?>);>Show Details</button>                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                    <td colspan="7">
                                                                        <div id="result_view_<?php echo $student_log_detail['student_log_id']; ?>" style="display:none;" class="student-full-result"></div>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                            <!--center>
                                                <button class="btn btn-brown" onclick="showFullResult(<?php // echo $student_log_detail['student_log_id'];         ?>);">Show Details</button>
                                            </center-->                                            
                                            <br/>

                                        </div>


                                        <div class="tab-pane container fade" id="sordertab">
                                            <table class = 'table table-striped result_table' style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Subject</th>
                                                        <th>Topic</th>
                                                        <th>Total</th>
                                                        <th>Answered</th>
                                                        <th><i class="icon-ok-sign"></i></th>
                                                        <th><i class="font-icon-remove-circle"></i></th>
                                                    </tr>
                                                </thead>



                                                <tbody>
                                                    <?php
                                                    foreach ($stud_topic_order as $stud_topic) {
                                                        foreach ($stud_topic_logs[$stud_topic] as $log_id) {
                                                            if (isset($ques_year_cnt[$stud_topic])) {


                                                                if (isset($ques_cor_ans_cnt[$log_id][$stud_topic]['answerd_cnt'])) {

                                                                    $answered = $ques_cor_ans_cnt[$log_id][$stud_topic]['answerd_cnt'];
                                                                } else {

                                                                    $answered = 0;
                                                                }

                                                                if ($answered > 0) {
                                                                    ?>
                                                                    <tr>                 
                                                                        <td><?php echo $ques_cor_ans_cnt[$log_id][$stud_topic]['date']; ?></td>
                                                                        <td><?php echo $ques_year_cnt[$stud_topic]['subject_name']; ?></td>
                                                                        <td><?php echo $ques_year_cnt[$stud_topic]['topic_name']; ?></td>
                                                                        <td><?php
                                                                            if (isset($ques_year_cnt[$stud_topic]['count'])) {
                                                                                echo $ques_year_cnt[$stud_topic]['count'];
                                                                            } else {
                                                                                echo '0';
                                                                            }
                                                                            ?></td>
                                                                        <td><?php echo $answered;
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
                                                                        <td><button class="btn btn-answerd-clr" id="showbtn_<?php echo $stud_topic ?>_<?php echo $log_id; ?>" onClick=topicShowDetail(<?php echo $stud_topic ?>,<?php echo $log_id; ?>);>Show Details</button>                                                        </td>

                                                                    <tr>
                                                                        <td colspan="8">
                                                                            <div id="result_view_<?php echo $stud_topic; ?>_<?php echo $log_id; ?>" style="display:none;" class="student-full-result"></div>
                                                                        </td>
                                                                    </tr>

                                                                    </tr>
                                                                    <?php
                                                                }
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </tbody>   
                                            </table>
                                            <!--center>
                                                <button class="btn btn-brown" onclick="showFullResult(<?php // echo $student_log_detail['student_log_id'];        ?>);">Show Details</button>
                                            </center-->                                            
                                            <br/>

                                        </div>

                                    </div>
                                </div>
                            </div>     
                            <?php /*
                              <div class = 'accordion-body collapse in'>
                              <div class = 'accordion-inner border-none'>

                              <?php

                              foreach($student_log as $student_log_detail) {
                              if(isset($ans_log_order[$student_log_detail['student_log_id']]) && ($ans_log_order[$student_log_detail['student_log_id']]==1))   { //question order
                              $log_year_val = '';
                              if(isset($ans_log_year[$student_log_detail['student_log_id']])) {
                              $log_year_val  = $ans_log_year[$student_log_detail['student_log_id']][0];
                              }

                              //$log_detail             = $obj->selectRow('COUNT(student_log_detail_id) AS attended, IFNULL((SELECT COUNT(student_log_detail_id) FROM student_log_detail WHERE student_log_id=' . $student_log_detail['student_log_id'] . ' AND UPPER(answer) = UPPER(student_answer)), 0) AS correct_answers', 'student_log_detail', 'student_log_id=' . $student_log_detail['student_log_id']);
                              $log_detail             = $obj->selectRow('COUNT(student_log_detail_id) AS attended, IFNULL((SELECT COUNT(student_log_detail_id) FROM student_log_detail INNER JOIN question ON student_log_detail.question_id=question.question_id WHERE student_log_id=' . $student_log_detail['student_log_id'] . ' AND UPPER(answer) = UPPER(student_answer)), 0) AS correct_answers', 'student_log_detail', 'student_log_id=' . $student_log_detail['student_log_id']);
                              $log_attended           = $log_detail['attended'];
                              $log_correct_answers    = $log_detail['correct_answers'];
                              ?>

                              <h2 class = 'titleContainer title'> <i class="font-icon-arrow-simple-right"></i> <?php  echo $student_log_detail['language_name']; ?> - Question Order - <?php echo $log_year_val; ?> <span>Date: <?php echo date('d/M/Y h:iA', strtotime($student_log_detail['created_at'])); ?></span></h2>
                              <table class = 'table table-striped result_table'>
                              <thead>
                              <tr>
                              <th class="text-center">Year</th>
                              <th class="text-center">Total</th>
                              <th class="text-center">Answered</th>
                              <th class="text-center"><i class="icon-ok-sign"></i></th>
                              <th class="text-center"><i class="font-icon-remove-circle"></i></th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                              <td><?php echo $log_year_val; ?></td>
                              <td><?php echo $student_log_detail['total_questions']; ?></td>
                              <td><?php echo $log_attended; ?></td>
                              <td><?php echo $log_correct_answers; ?></td>
                              <td><?php echo $log_attended - $log_correct_answers?></td>
                              <td><button class="btn btn-answerd-clr" onClick=showFullResult(<?php echo $student_log_detail['student_log_id']; ?>);>Show Details</button>                                                        </td>
                              </tr>
                              </tbody>
                              </table>
                              <!--center>
                              <button class="btn btn-brown" onclick="showFullResult(<?php // echo $student_log_detail['student_log_id']; ?>);">Show Details</button>
                              </center-->
                              <div id="result_view_<?php echo $student_log_detail['student_log_id']; ?>" class="student-full-result"></div>
                              <br/>

                              <?php } if(isset($ans_log_order[$student_log_detail['student_log_id']]) && ($ans_log_order[$student_log_detail['student_log_id']]==2))   {



                              $log_subj_topic = '';
                              if(isset($stud_log_topic_by_log[$student_log_detail['student_log_id']])) {
                              foreach($stud_log_topic_by_log[$student_log_detail['student_log_id']] as $subj=>$topic) {
                              if($log_subj_topic!='') {
                              $log_subj_topic .= ', ';
                              }
                              $log_subj_topic .= $subj.' ( '.implode(', ',$topic).')';
                              }
                              }

                              ?>


                              <h2 class = 'titleContainer title'>
                              <i class="font-icon-arrow-simple-right"></i> <?php echo $student_log_detail['language_name']; ?> - Subject Order - <?php echo $log_subj_topic; ?>.
                              <span>Date: <?php echo date('d/M/Y h:iA', strtotime($student_log_detail['created_at'])); ?></span>
                              </h2>
                              <table class = 'table table-striped result_table'>
                              <thead>
                              <tr>
                              <!--th class="text-center">Year</th-->
                              <th class="text-center">Subject</th>
                              <th class="text-center">Topic</th>
                              <th class="text-center">Total</th>
                              <th class="text-center">Answered</th>
                              <th class="text-center">
                              <i class="icon-ok-sign"></i>
                              </th>
                              <th class="text-center">
                              <i class="font-icon-remove-circle"></i>
                              </th>
                              <th>
                              &nbsp;
                              </th>
                              </tr>
                              </thead>
                              <tbody>




                              <?php

                              if(isset($ans_log_year[$student_log_detail['student_log_id']]))
                              {
                              //year
                              foreach($ans_log_year[$student_log_detail['student_log_id']] as $ans_log_year_v)
                              {
                              if(isset($stud_log_topic_by_log[$student_log_detail['student_log_id']])) {
                              {
                              //subject
                              foreach($stud_log_topic_by_log[$student_log_detail['student_log_id']] as $student_log_subj_subj=>$student_log_subj)
                              {
                              //topic
                              foreach($student_log_subj as $student_log_subj_topic_id=>$student_log_subj_topic){
                              {


                              if(isset($ques_year_cnt[$ans_log_year_v][$student_log_subj_topic_id]['count'])) {
                              //total question

                              if(!isset($tot_topic_question[$student_log_detail['student_log_id']][$student_log_subj_topic_id])) {
                              $tot_topic_question[$student_log_detail['student_log_id']][$student_log_subj_topic_id] = $ques_year_cnt[$ans_log_year_v][$student_log_subj_topic_id]['count'];
                              }
                              else
                              {
                              $tot_topic_question[$student_log_detail['student_log_id']][$student_log_subj_topic_id] += $ques_year_cnt[$ans_log_year_v][$student_log_subj_topic_id]['count'];
                              }
                              }

                              }
                              }
                              }
                              }
                              }
                              }
                              }



                              if(isset($stud_log_topic_by_log[$student_log_detail['student_log_id']]))
                              {
                              //subject
                              foreach($stud_log_topic_by_log[$student_log_detail['student_log_id']] as $student_log_subj_subj=>$student_log_subj)
                              {
                              //topic
                              {
                              foreach($student_log_subj as $student_log_subj_topic_id=>$student_log_subj_topic){
                              ?>
                              <tr>
                              <!--td><?php // echo $ans_log_year_v; ?></td -->
                              <td><?php echo $student_log_subj_subj; ?></td>
                              <td><?php echo $student_log_subj_topic; ?></td>
                              <td><?php
                              //total question

                              if(isset($tot_topic_question[$student_log_detail['student_log_id']][$student_log_subj_topic_id])){
                              echo $tot_topic_question[$student_log_detail['student_log_id']][$student_log_subj_topic_id];
                              }
                              else {
                              echo '0';
                              }
                              ?>
                              </td>
                              <td>
                              <?php
                              //answered question
                              $answerd_topic_question = 0;
                              if(isset($ques_cor_ans_cnt[$student_log_detail['student_log_id']][$student_log_subj_topic_id]['answerd_cnt'])) {
                              $answerd_topic_question = $ques_cor_ans_cnt[$student_log_detail['student_log_id']][$student_log_subj_topic_id]['answerd_cnt'];
                              }
                              echo $answerd_topic_question;
                              ?>
                              </td>
                              <td>
                              <?php
                              //correct answer
                              $correct_topic_question = 0;
                              if(isset($ques_cor_ans_cnt[$student_log_detail['student_log_id']][$student_log_subj_topic_id]['correct_cnt'])) {
                              $correct_topic_question = $ques_cor_ans_cnt[$student_log_detail['student_log_id']][$student_log_subj_topic_id]['correct_cnt'];
                              }
                              echo $correct_topic_question;
                              ?>
                              </td>
                              <td>
                              <?php
                              //wrong answer
                              $wrng_topic_question = 0;
                              $wrng_topic_question = $answerd_topic_question - $correct_topic_question;
                              echo $wrng_topic_question;
                              ?>
                              </td>
                              <td>
                              <button class="btn btn-answerd-clr" onClick=topicShowDetail(<?php echo $student_log_subj_topic_id ?>,<?php echo $student_log_detail['student_log_id']; ?>)>Show Details</button>                                                        </td>
                              </tr>
                              <?php
                              }
                              }
                              }
                              }

                              ?>


                              </tbody>
                              </table>
                              <!--center>
                              <button class="btn btn-brown" onClick="showFullResult(<?php // echo $student_log_detail['student_log_id']; ?>);">Show Details</button>
                              </center-->
                              <br/>
                              <div id="result_view_<?php echo $student_log_detail['student_log_id']; ?>" class="student-full-result"></div>
                              <br/>

                              <?php
                              }


                              }
                              ?>
                              </div>
                              </div>
                             */
                            ?>        

                            <!--                                </div>
                                                        </div>-->
                            <!--end: Accordion -->
                        </div>
                    </div>
                </div>
            </section>
            
            <?php include 'popup-explanation-img.php'; ?>
            <?php include 'footer.php';
            ?>
        </div>
        <?php include 'script.php';
        ?>
        <script type="text/javascript">
            image_url = 'api/v1/';
            //image_url = 'https://examhorse.com/api/v1/';
            function topicShowDetail(topicid, slid) {


            $('#result_view_' + topicid + '_' + slid).toggle();
            if ($('#result_view_' + topicid + '_' + slid).css('display') == 'none'){
            $('#showbtn_' + topicid + '_' + slid).html('Show Details');
            } else {
            $('#showbtn_' + topicid + '_' + slid).html('Hide Details');
            setTimeout(() => {
            applyMathAjax();
            }, 500);
            $.ajax({
            type: "GET",
                    url: 'api/v1/get_result_detail_by_topic/' + slid + '/' + topicid,
                    success: function (data) {
                    if (data.result.error === false) {
                    var qlist = '';
                    var correct_ans = '';
                    var student_ans = '';
                    $.each(data.result.data, function (key, val) {
                    qlist = qlist + '<div class="question-title result-title"><h6><span class="no_question">' + (key + 1) + '.</span> <span class="question_title"> ' + val.name + '</span></h6>';
                    if (val.a !== '') {
                    correct_ans = '';
                    student_ans = '';
                    if ((val.answer).toUpperCase() === 'A') {
                    correct_ans = 'crt_clr';
                    }
                    if ((val.student_answer).toUpperCase() === 'A' && (val.answer).toUpperCase() !== 'A') {
                    student_ans = 'wrng_clr';
                    }
                    qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="option-float">A. </span> <span class="float-left">' + val.a + '</span></div></div>';
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
                    qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="option-float">B. </span> ' + val.b + '</div></div>';
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
                    qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="option-float">C. </span> ' + val.c + '</div></div>';
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
                    qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="option-float">D. </span> ' + val.d + '</div></div>';
                    }
                    if (val.image_path_explanation !== '' && val.explanation_img_direction === 'top') {
                    qlist = qlist + '<div class="explanation_image" id="explanation_image_'+topicid+'_'+slid+'_'+key+'"><img onClick="showexpimgpopuptopic(\''+image_url + val.image_path_explanation+'\','+topicid+','+slid+','+key+');" src="' + image_url + val.image_path_explanation + '"></div>';
                    } else {
                    qlist = qlist + '';
                    }
                    if (val.explanation !== '') {
                    qlist = qlist + '<div class="explanation-section" style="text-align: left;"><strong>Explanation</strong> : ' + val.explanation + '</div>';;
                    } else {
                    qlist = qlist + '<div class="explanation-section"> </div>';
                    }
                    if (val.image_path_explanation !== '' && val.explanation_img_direction === 'bottom') {
                    qlist = qlist + '<div class="explanation_image" id="explanation_image_'+topicid+'_'+slid+'_'+key+'"><img onClick="showexpimgpopuptopic(\''+image_url + val.image_path_explanation+'\','+topicid+','+slid+','+key+');" src="' + image_url + val.image_path_explanation + '"></div>';
                    } else {
                    qlist = qlist + '';
                    }
                    qlist = qlist + '</div>';
                    });
                    $('#result_view_' + topicid + '_' + slid).html(qlist);
                    } else {
                    swal('Information', data.result.message, 'info');
                    }
                    },
                    error: function (err) {
                    swal('Error', err.statusText, 'error');
                    }
            });
            }
            }




            function showFullResult(slid) {

            $('#result_view_' + slid).toggle();
            if ($('#result_view_' + slid).css('display') == 'none'){
            $('#showbtn_' + slid).html('Show Details');
            } else {
            $('#showbtn_' + slid).html('Hide Details');
            setTimeout(() => {
            applyMathAjax();
            }, 500);
            $.ajax({
            type: "GET",
                    url: 'api/v1/get_result_detail/' + slid,
                    success: function (data) {
                    if (data.result.error === false) {
                    var qlist = '';
                    var correct_ans = '';
                    var student_ans = '';
                    $.each(data.result.data, function (key, val) {
                    qlist = qlist + '<div class="question-title result-title"><h6><span class="no_question">' + (key + 1) + '.</span> <span class="question_title"> ' + val.name + '</span></h6>';
                    if (val.a !== '') {
                    correct_ans = '';
                    student_ans = '';
                    if ((val.answer).toUpperCase() === 'A') {
                    correct_ans = 'crt_clr';
                    }
                    if ((val.student_answer).toUpperCase() === 'A' && (val.answer).toUpperCase() !== 'A') {
                    student_ans = 'wrng_clr';
                    }
                    qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="option-float">A. </span> <span class="float-left">' + val.a + '</span></div></div>';
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
                    qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="option-float">B. </span> ' + val.b + '</div></div>';
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
                    qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="option-float">C. </span> ' + val.c + '</div></div>';
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
                    qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="option-float">D. </span> ' + val.d + '</div></div>';
                    }
                    if (val.image_path_explanation !== '' && val.explanation_img_direction === 'top') {
                    qlist = qlist + '<div class="explanation_image" id="explanation_image_'+slid+'_'+key+'"><img onClick="showexpimgpopupyear(\''+image_url + val.image_path_explanation+'\','+slid+','+key+');" src="' + image_url + val.image_path_explanation + '"></div>';
                    } else {
                    qlist = qlist + '';
                    }
                    if (val.explanation !== '') {
                    qlist = qlist + '<div class="explanation-section"><strong>Explanation</strong> : ' + val.explanation + '</div>';
                    } else {
                    qlist = qlist + '<div class="explanation-section"> </div>';
                    }
                    if (val.image_path_explanation !== '' && val.explanation_img_direction === 'bottom') {
                    qlist = qlist + '<div class="explanation_image" id="explanation_image_'+slid+'_'+key+'"><img onClick="showexpimgpopupyear(\''+image_url + val.image_path_explanation+'\','+slid+','+key+');" src="' + image_url + val.image_path_explanation + '"></div>';
                    } else {
                    qlist = qlist + '';
                    }
                    qlist = qlist + '</div>';
                    });
                    $('#result_view_' + slid).html(qlist);
                    } else {
                    swal('Information', data.result.message, 'info');
                    }
                    },
                    error: function (err) {
                    swal('Error', err.statusText, 'error');
                    }
            });
            }
            }




        </script>   
<script>
            function showexpimgpopuptopic(imgsrc,topicid,slid,ky) {
                if (imgsrc != '') {
                    $("#explimagemodal").detach().insertBefore('#explanation_image_'+topicid+'_'+ slid+'_'+ky);
                    $("#explimagemodal").css({"position":'relative'});
                    $('.explimagepreview').attr('src', imgsrc);
                    $('#explimagemodal').modal('show');                
                
                }
            }    
            
            
            function showexpimgpopupyear(imgsrc,slid,ky) {
                if (imgsrc != '') {
                $('.explimagepreview').attr('src', imgsrc);
                $('#explimagemodal').modal('show');
                $('#result_view_' + slid+'_'+ky).append($('#explimagemodal').html());
                }
            }
        </script>
    </body>
   
</html>
