<?php
session_start();
require_once 'api/include/common.php';
$questions = array();
$obj = new Common();
$type = '';
$testmode = 0;
ini_set('date.timezone', 'Asia/Kolkata');

if (isset($_SESSION['testmode'])) {
    $testmode = $_SESSION['testmode'];
}

if (!isset($_SESSION['student_selected_type'])) {
    header('Location: sample-language');
}

if(isset($_SESSION['free_user_id'])) {
    $student_register_id = $_SESSION['free_user_id'];
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

    $questions              = $obj->selectAll('name,year_id, a, b, c, d, UPPER(answer) AS answer, image_path, direction,question_id,explanation,image_path_explanation,explanation_img_direction,question_no', 'question', 'topic_id IN (SELECT t.topic_id FROM topic AS t LEFT JOIN subject AS s ON s.subject_id = t.subject_id WHERE s.language_id = ' . $_SESSION['student_selected_language_id'] . ') AND year_id = ' . $_SESSION['student_selected_year_id'] . ' ORDER BY question_no ASC,year_id ASC, topic_id ASC');
    //if($testmode==1){
        $other_lang_questions   = $obj->selectAll('name,year_id, a, b, c, d, UPPER(answer) AS answer, image_path, direction,question_id,explanation,image_path_explanation,explanation_img_direction,question_no', 'question', 'topic_id IN (SELECT t.topic_id FROM topic AS t LEFT JOIN subject AS s ON s.subject_id = t.subject_id WHERE s.language_id = ' . $other_language['language_id'] . ') AND year_id = ' . $_SESSION['student_selected_year_id'] . ' ORDER BY question_no ASC,year_id ASC, topic_id ASC');
    //}
    
    //resume log
    $student_log_v = '';
    if (isset($_REQUEST['from_log']) && ($_REQUEST['from_log'] != '') && ($student_register_id!=0)) {
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
    /*
    if (!isset($_GET['years'])) {
        header('Location: subject-years?topics=' . $_SESSION['student_selected_topics_id']);
    }
    */
    
    if (!isset($_GET['topics'])) {
        header('Location: subject');
    }
    $_SESSION['student_selected_topics_id'] = $_GET['topics'];
    
    
    $yid = array();
    $years = $obj->selectAll('y.*', 'year As y', 'status = 1 ORDER BY y.year ASC LIMIT 3');
    /*
    echo "<pre>";
    print_r($years);
    exit;
    */
    foreach($years as $y) {
            $yid[] = $y['year_id'];
    }
    if(count($yid)>0) {
       $yids =  implode(',',$yid);
    }
    
    
    $type = 'Subject Order';
    //$_SESSION['student_selected_years_id'] = $_GET['years'];
    $questions = $obj->selectAll('question.year_id,year.year,question.name As name, a, b, c, d, UPPER(answer) AS answer, image_path, direction,question_id,explanation,image_path_explanation,explanation_img_direction,question_no', 'question LEFT JOIN topic ON question.topic_id=topic.topic_id LEFT JOIN year ON question.year_id=year.year_id', 'question.topic_id IN (SELECT t.topic_id FROM topic AS t LEFT JOIN subject AS s ON s.subject_id = t.subject_id WHERE s.language_id = ' . $_SESSION['student_selected_language_id'] . ' AND t.topic_id IN (' . $_SESSION['student_selected_topics_id'] . ') ORDER BY t.subject_id ASC) AND question.year_id IN (' .$yids. ') ORDER BY subject_id ASC,question.topic_id ASC,year.year DESC,question_no ASC');
        
    $qu_cond = array();
   if (count($questions) > 0) {
    foreach ($questions as $qu) { 
        $qu_cond[] = '(year_id='.$qu['year_id'].' AND question_no='.$qu['question_no'].')';
    }
   }  
   
   $qu_conds = '';
   if(count($qu_cond)>0){
       $qu_conds = ' AND ('.implode(' OR ',$qu_cond).')';
   }
    
    //if($testmode==1){
        //$other_lang_questions   = $obj->selectAll('question.name As name, a, b, c, d, UPPER(answer) AS answer, image_path, direction,question_id,explanation,image_path_explanation,explanation_img_direction,question_no', 'question LEFT JOIN topic ON question.topic_id=topic.topic_id', 'question.topic_id IN (SELECT t.topic_id FROM topic AS t LEFT JOIN subject AS s ON s.subject_id = t.subject_id WHERE s.language_id = ' . $other_language['language_id'] . ' AND t.topic_id IN (' . $_SESSION['student_selected_topics_id'] . ') ORDER BY t.subject_id ASC) AND year_id IN (' . $_SESSION['student_selected_years_id'] . ') ORDER BY question_no ASC,subject_id ASC,question.topic_id ASC,year_id ASC');
        //$other_lang_questions   = $obj->selectAll('question.name As name, a, b, c, d, UPPER(answer) AS answer, image_path, direction,question_id,explanation,image_path_explanation,explanation_img_direction,question_no', 'question LEFT JOIN topic ON question.topic_id=topic.topic_id', 'question.topic_id IN (SELECT t.topic_id FROM topic AS t LEFT JOIN subject AS s ON s.subject_id = t.subject_id WHERE s.language_id = ' . $other_language['language_id'] . ' AND t.topic_id IN (' . $_SESSION['student_selected_topics_id'] . ') ORDER BY t.subject_id ASC) AND year_id IN (' . $sel_year_ids. ')  ORDER BY question_no ASC,subject_id ASC,question.topic_id ASC,year_id ASC');
       $other_lang_questions = $obj->selectAll('question.name As name, a, b, c, d, UPPER(answer) AS answer, image_path, direction,question_id,explanation,image_path_explanation,explanation_img_direction,question_no,year_id', 'question LEFT JOIN topic ON question.topic_id=topic.topic_id', 'question.topic_id IN (SELECT t.topic_id FROM topic AS t LEFT JOIN subject AS s ON s.subject_id = t.subject_id WHERE s.language_id = ' . $other_language['language_id'] .') '.$qu_conds.'  ORDER BY question_no ASC,subject_id ASC,question.topic_id ASC,year_id ASC');       
        
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

/*
echo "<pre>";
print_r($student_selected_topics_id_arr);
print_r($student_selected_years_id_arr);
exit;
*/

if($student_register_id!=0){
    $student = $obj->selectRow('*', 'free_user_login', 'free_user_login_id = ' . $student_register_id);
}
/*
else 
{
    $student['student_name'] = 'guest';
}    
 * 
 */
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
        /*
          array_push($questions_list, array(
          'text' => $q['name'],
          'direction' => $q['direction'],
          'image_path' => $q['image_path'],
          'show_image' => $showimg,
          'show_image_explanation' => $show_img,
          'explanation' => $q['explanation'],
          'image_path_explanation' => $q['image_path_explanation'],
          'explanation_img_direction' => $q['explanation_img_direction'],
          'responses' => $options
          ));
         * 
         */

        $qyear = '';
        if(isset($q['year'])) {
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
            'question_no'=>$q['question_no'],
            'year_id'=>$q['year_id'],
            'year'=>$qyear
        ));

        /*
          array_push($questions_list, array(
          'text' => $q['name'],
          'direction' => $q['direction'],
          'image_path' => $q['image_path'],
          'show_image' => $showimg,
          'question_id' => $q['question_id'],
          'responses' => $options,
          'answer' => $q['answer'],
          'explanation' => $q['explanation']

          ));
         * 
         */
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
                'question_no'=>$oq['question_no'],
                'year_id'=>$oq['year_id']
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
        <div class="quiz-section" style="display:none;">
            <section class="container">
                <div class="row">
                    <div class="span12" id="app">
                        
                        <div class="quiz-question-section" v-if="questionIndex < quiz.questions.length">
                            
                            <a href = '#' onclick="goBack()"><i class = 'font-icon-arrow-simple-left'></i></a>
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
                                    <?php if($type=='Year Order') { ?>   
                                    <tr>
                                        <td valign="top">Selected Year</td>
                                        <td valign="top" class="w-5">:</td>
                                        <th valign="top"><?php echo $sel_year_val; ?></th>
                                    </tr>
                                    <?php } ?>
                                </table>
                            </h4>
                            <a class="home_link" href="select_language">
                                <i class="icon-home"></i>
                            </a>
                            
                            
                        </div>
                       
                         <!--question Box-->
                        <?php /*
                        <div class="questionBox" id="app">
                         * 
                         */?>
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
                                 <?php if($type == 'Year Order') { ?>  
                                <div class="quiz-review">
                                    <div class="float-left" style="padding: 20px 0;">
                                        <!--a href="#" onclick="showqno();" class="btn logout-btn">Question Admin Panel</a  -->
                                         <a href="#" @click="showQuesPanel();" class="btn logout-btn">Question Admin Panel</a>
                                    </div>
                                </div>  
                                <?php } ?>        
                                <!-- show question admin panel -->
                                        
                                        
                                      

                                        <h1 class="title is-6">Quiz</h1> 
                                        <progress class="progress is-info is-small" :value="(questionIndex/quiz.questions.length)*100" max="100">{{(questionIndex/quiz.questions.length)*100}}%</progress>
                                        <div class="lenth_width">
                                            <span  class="label lable-blue">Total: {{quiz.questions.length}}</span>
                                            <span class="label label-success">Answered: {{((quiz.questions.length)-(quiz.questions.length-questionIndex))}}</span>
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
                                    
                                    <?php /* if($testmode==0) {  //testmode  ?>
                                        
                                        <div class="optionContainer">
                                        <div class="option" :id="index | charIndex | AddPrefix('ansopt_')" v-for="(response, index) in quiz.questions[questionIndex].responses" @click="selectOptionNoSave(index)" :class="{ 'is-selected': userResponses[questionIndex] == index}" :key="index" v-if="response.text != ''">
                                             <span class="q-option">{{ index | charIndex }}.&nbsp;</span> <span v-html="response.text"></span>
                                        </div>

                                        <!--div style="margin: 0 auto; text-align: center" v-if="questionIndex>0">
                                                <a class="button" :class="(userResponses[questionIndex]==null)?'':'is-active'" v-on:click="prev();" :disabled="questionIndex>=quiz.questions.length">
                                                    Back
                                                </a>
                                            </div-->                                         
                                    </div>
                                        
                                   <?php  }else { //learning mode */ ?>
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
                                    <?php // } ?>
                                    
                                    </div>
                                    
                                   
                                    <div class="question-admin-panel" style="width: 100%; padding: 20px; display: none;">
                                        <div class="question-number-title">
                                            <span class="showqus" style="float: left;" onclick="showqus();"><i class="icon-angle-left"></i> Back</span>
                                            <h3>Question Admin Panel</h3>
                                        </div>
                                        <div id="questionpanel">
                                            <?php /*
                                            <table class="question-number-table">
                                                <tr>
                                                    <td class="clr-blue">1</td>
                                                    <td class="clr-yellow">2</td>
                                                    <td>3</td>
                                                    <td>4</td>
                                                    <td>5</td>
                                                    <td>6</td>
                                                    <td>7</td>
                                                    <td>8</td>
                                                    <td>9</td>
                                                    <td>10</td>
                                                </tr>
                                                <tr>
                                                    <td>11</td>
                                                    <td>12</td>
                                                    <td>13</td>
                                                    <td>14</td>
                                                    <td>15</td>
                                                    <td>16</td>
                                                    <td>17</td>
                                                    <td>18</td>
                                                    <td>19</td>
                                                    <td>20</td>
                                                </tr>
                                                <tr>
                                                    <td>21</td>
                                                    <td>22</td>
                                                    <td>23</td>
                                                    <td>24</td>
                                                    <td>25</td>
                                                    <td>26</td>
                                                    <td>27</td>
                                                    <td>28</td>
                                                    <td>29</td>
                                                    <td>30</td>
                                                </tr>
                                                <tr>
                                                    <td>31</td>
                                                    <td>32</td>
                                                    <td>33</td>
                                                    <td>34</td>
                                                    <td>35</td>
                                                    <td>36</td>
                                                    <td>37</td>
                                                    <td>38</td>
                                                    <td>39</td>
                                                    <td>40</td>
                                                </tr>
                                                <tr>
                                                    <td>41</td>
                                                    <td>42</td>
                                                    <td>43</td>
                                                    <td>44</td>
                                                    <td>45</td>
                                                    <td>46</td>
                                                    <td>47</td>
                                                    <td>48</td>
                                                    <td>49</td>
                                                    <td>50</td>
                                                </tr>
                                            </table>
                                             * 
                                             */ 
                                            ?>
                                        </div>
                                        <div class="admin-panel-btns">
                                            <div class="row">
                                                <div class="span-4">
                                                    <span class="answered-clr"></span> Answered
                                                </div>
                                                <?php /*
                                                <div class="span-4">
                                                    <span class="notsure-clr"></span> Not Sure
                                                </div>
                                                 * 
                                                 */
                                                ?>
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
                                    
                                    
                                    
                                    
                                    <?php /* if($testmode==0){     //test mode   ?> 
                                    
                                    <footer class="questionFooter" id='quiz-nxt-footer'>
                                        <!--                                    pagination-->
                                        <nav class="pagination" role="navigation" aria-label="pagination">

                                            <!--                                        back button -->
                                            <!--                                        <a class="button" v-on:click="prev();" :disabled="questionIndex < 1">Back</a>-->
                                            <!--                                        <a class="btn btn-green" href="select_language">Home</a>-->

                                            <!--                                    next button -->
                                            <div style="text-align: left" >
                                                <a class="button"  v-on:click="prevNoSave();" v-if="questionIndex>0" :disabled="questionIndex>=quiz.questions.length">
                                                    Back
                                                </a>
                                            </div> 


                                            
                                            <div style="text-align: right" v-if="showsurebtnans">
                                                <a class="button"  v-on:click="confirmSave();" :disabled="questionIndex>=quiz.questions.length">
                                                    Sure
                                                </a>
                                            </div> 

                                            <div style="text-align: center" v-if="shownotsureaftersel">
                                                <a class="not-sure-button"  v-on:click="notSureSave();" :disabled="questionIndex>=quiz.questions.length">
                                                    Not Sure
                                                </a>
                                            </div> 

              
                                            
                                             <div style="text-align: right" v-if="shownextnosave">
                                                <a class="button"  v-on:click="nextNoSave();" :disabled="questionIndex>=quiz.questions.length">
                                                    Next
                                                </a>
                                            </div> 
                                            
                                             <div style="text-align: right" v-if="showcnfrmaftersel">
                                                <a class="button"  v-on:click="confirmSave();" :disabled="questionIndex>=quiz.questions.length">
                                                    Confirm
                                                </a>
                                            </div> 
                                            
                                        </nav>
                                        <!--                                    /pagination-->

                                    </footer>
                                    
                                    
                                    <?php }else {  */   //learning mode ?>
                                    

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
                                                <a class="button"  v-on:click="next();" :disabled="questionIndex>=quiz.questions.length">
                                                    <!--                                            {{ (userResponses[questionIndex]==null)?'Skip':'Next' }}-->Next
                                                </a>
                                            </div> 

                                        </nav>
                                        <!--                                    /pagination-->

                                    </footer>


                                    <!--footer class="questionFooter" id='quiz-footer'  v-if="showimmediateblk"-->
                                    <?php // if($type=='Year Order') { ?>
                                    <footer class="questionFooter" id='quiz-footer'  v-if="showimmediateblk">
                                        <div class="footer-explanation-section">
                                            <div class="quiz-explanation-view border-b">Correct Answer - <strong>{{quiz.questions[questionIndex].answer}}</strong>
                                            </div>
                                            <!--                                        <hr>-->
                                            <div class="quiz-explanation-view">Explanation:</div>
                                            
                                            <div v-if="quiz.questions[questionIndex].show_image_explanation" class="text-center">
                                                <img v-if="quiz.questions[questionIndex].explanation_img_direction == 'top'" v-bind:src="'api/v1/'+quiz.questions[questionIndex].image_path_explanation" alt="image" class="qes-img" />
                                            
                                            </div>
                                            
                                                                                          
                                            <?php /* // if($testmode==1){ ?>
                                            <div v-if="!quiz.questions[questionIndex].show_image_explanation && otherlangquiz[quiz.questions[questionIndex].question_no] && otherlangquiz[quiz.questions[questionIndex].question_no].show_image_explanation" class="text-center">
                                                <img v-if="otherlangquiz[quiz.questions[questionIndex].question_no].explanation_img_direction == 'top'" v-bind:src="'api/v1/'+otherlangquiz[quiz.questions[questionIndex].question_no].image_path_explanation" alt="image" class="qes-img" />
                                            </div>
                                            <?php // } */ ?>
                                            
                                             <?php                                             
                                            // if($testmode==1){ ?>
                                            <div v-if="!quiz.questions[questionIndex].show_image_explanation && otherlangquiz[quiz.questions[questionIndex].year_id+quiz.questions[questionIndex].question_no] && otherlangquiz[quiz.questions[questionIndex].year_id+quiz.questions[questionIndex].question_no].show_image_explanation" class="text-center">
                                                <img v-if="otherlangquiz[quiz.questions[questionIndex].year_id+quiz.questions[questionIndex].question_no].explanation_img_direction == 'top'" v-bind:src="'api/v1/'+otherlangquiz[quiz.questions[questionIndex].year_id+quiz.questions[questionIndex].question_no].image_path_explanation" alt="image" class="qes-img" />
                                            </div>
                                            <?php // }  ?>

                                            <!--span v-html="quiz.questions[questionIndex].explanation"></span-->
                                            <br/>
                                            <div style="text-align: left;">
                                                <span v-html="quiz.questions[questionIndex].explanation"></span>
                                            </div>    

                                            <?php /* // if($testmode==1){ ?>
                                            <div style="text-align: left;" v-if="!quiz.questions[questionIndex].explanation && otherlangquiz[quiz.questions[questionIndex].question_no] && otherlangquiz[quiz.questions[questionIndex].question_no].explanation">
                                                <span v-html="otherlangquiz[quiz.questions[questionIndex].question_no].explanation"></span>
                                            </div>
                                            <?php // } */ ?>
                                           
                                             <?php   // if($testmode==1){ ?>
                                            <div style="text-align: left;" v-if="!quiz.questions[questionIndex].explanation && otherlangquiz[quiz.questions[questionIndex].year_id+quiz.questions[questionIndex].question_no] && otherlangquiz[quiz.questions[questionIndex].year_id+quiz.questions[questionIndex].question_no].explanation">
                                                <span v-html="otherlangquiz[quiz.questions[questionIndex].year_id+quiz.questions[questionIndex].question_no].explanation"></span>
                                            </div>
                                            <?php // }  ?>
                                            
                                            
                                            
                                            <div v-if="quiz.questions[questionIndex].show_image_explanation" class="text-center">
                                                <img v-if="quiz.questions[questionIndex].explanation_img_direction == 'bottom'" v-bind:src="'api/v1/'+quiz.questions[questionIndex].image_path_explanation" alt="image" class="qes-img" />
                                            </div>          
                                            
                                           
                                            <?php /* // if($testmode==1){ ?>
                                            <div v-if="!quiz.questions[questionIndex].show_image_explanation && otherlangquiz[quiz.questions[questionIndex].question_no] && otherlangquiz[quiz.questions[questionIndex].question_no].show_image_explanation" class="text-center">
                                                <img v-if="otherlangquiz[quiz.questions[questionIndex].question_no].explanation_img_direction == 'bottom'" v-bind:src="'api/v1/'+otherlangquiz[quiz.questions[questionIndex].question_no].image_path_explanation" alt="image" class="qes-img" />
                                            </div>
                                            <?php // }  */  ?>
                                            
                                            <?php // if($testmode==1){ ?>
                                            <div v-if="!quiz.questions[questionIndex].show_image_explanation && otherlangquiz[quiz.questions[questionIndex].year_id+quiz.questions[questionIndex].question_no] && otherlangquiz[quiz.questions[questionIndex].year_id+quiz.questions[questionIndex].question_no].show_image_explanation" class="text-center">
                                                <img v-if="otherlangquiz[quiz.questions[questionIndex].year_id+quiz.questions[questionIndex].question_no].explanation_img_direction == 'bottom'" v-bind:src="'api/v1/'+otherlangquiz[quiz.questions[questionIndex].year_id+quiz.questions[questionIndex].question_no].image_path_explanation" alt="image" class="qes-img" />
                                            </div>
                                            <?php // }?>
                                            
                                            
                                            
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
                                    <?php // } ?>
                                    
                                    
                                    <?php // } ?>
                                    
                                    <?php  //  if($type=='Year Order') { ?>
                                    <div v-if="olqshow">
                                        
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

                                        <!--div style="margin: 0 auto; text-align: center" v-if="questionIndex>0">
                                                <a class="button" :class="(userResponses[questionIndex]==null)?'':'is-active'" v-on:click="prev();" :disabled="questionIndex>=quiz.questions.length">
                                                    Back
                                                </a>
                                            </div--> 
                                        
                                         
                                    </div>
                                        
                                        </div> 
                                        
                                         <div v-if="!olqd">
                                             <h2 class="titleContainer title"><span class="quiz-question-title">Question Not Available in <?php echo $other_language['name'] ?></span></h2>
                                         </div>  
                                    </div>
                                    <?php // } ?>    
                                    <?php
                                    /*
                                      <footer class="questionFooter"  v-if="showimmediateblk">
                                      <div class="question-explanation">
                                      <h4>Explanation:</h4>
                                      <div v-if="quiz.questions[questionIndex].show_image_explanation" class="text-center">
                                      <img v-if="quiz.questions[questionIndex].explanation_img_direction == 'top'" v-bind:src="'api/v1/'+quiz.questions[questionIndex].image_path_explanation" alt="image" class="qes-img" />
                                      </div>
                                      <span v-html="quiz.questions[questionIndex].explanation"></span>
                                      <div v-if="quiz.questions[questionIndex].show_image_explanation" class="text-center">
                                      <img v-if="quiz.questions[questionIndex].explanation_img_direction == 'buttom'" v-bind:src="'api/v1/'+quiz.questions[questionIndex].image_path_explanation" alt="image" class="qes-img" />
                                      </div>
                                      </div>
                                      <!--                                    <nav class="pagination" role="navigation" aria-label="pagination">
                                      <a class="button" v-on:click="prev();" :disabled="questionIndex < 1">
                                      Back
                                      </a>
                                      <a class="btn btn-green" href="select_language">
                                      Home
                                      </a>
                                      <a class="button" :class="(userResponses[questionIndex]==null)?'':'is-active'" v-on:click="next();" :disabled="questionIndex>=quiz.questions.length">
                                      {{ (userResponses[questionIndex]==null)?'Skip':'Next' }}
                                      </a>
                                      </nav>-->
                                      </footer>
                                     */
                                    ?>                                           
                                </div>
                            </div>   
                            <!--quizCompletedResult-->
                           
                            <div v-if="questionIndex >= quiz.questions.length" v-bind:key="questionIndex" class="quizCompleted has-text-centered">

                                <!-- quizCompletedIcon: Achievement Icon -->
                                <span class="icon">
                                    <i class="fa" :class="score()>3?'fa-check-circle-o is-active':'fa-times-circle'"></i>
                                </span>

                                <!--resultTitleBlock-->
                                <h2 class="complete-title" v-if="score() == quiz.questions.length">
                                    Congratulations! You have answered everything right!!! <img style="width: 12%" src="img/thumbs-up.gif">
                                </h2>
                                <h2 class="complete-title" v-if="score() != quiz.questions.length">
                                    Test Completed
                                </h2>
                                <?php  if($type=='Year Order') { ?>
                                <p class="subtitledur">
                                    <span class="stotdur">At {{data_ques_duration}} Minutes You have completed the Quiz <br v-if="data_ques_answered!=0"> <span class="stotques" v-if="data_ques_answered!=0">At {{totalquizduration}} Minutes you have completed {{data_ques_answered}} Questions</span>
                                </p>
                                <?php }  ?>
                                <p class="subtitle">
                                    Your Score: <span class="score-clr">{{ score() }}</span> / {{ quiz.questions.length }}
                                </p>
                            <!-- <p class="subtitle">
                                Total score: {{ score() }} / {{ quiz.questions.length }}
                            </p> -->
                                <div class="">
                                    
                                    <h2>Introductory Offer</h2><h4><strike>₹999 </strike> &nbsp;&nbsp; <span> ₹499</span></h4><a href="register_user" class="btn btn-green">Buy Full Version</a>
                                    <?php /*
                                    <a class="btn btn-theme btn-rounded" @click="restart()">Restart <i class="fa fa-refresh"></i></a>
                                    <a class="btn btn-theme btn-rounded" onclick="window.location = 'select_language'">Home <i class="fa fa-refresh"></i></a>
                                    <?php if ($type=='Subject Order') { ?>
                                    <a @click="divshowsorder()" class="btn btn-theme btn-rounded">Show Full Result <i class="fa fa-refresh"></i></a>
                                    <?php }else { ?>
                                    <a @click="divshow()" class="btn btn-theme btn-rounded">Show Full Result <i class="fa fa-refresh"></i></a>
                                    <?php } ?>
                                    <!--/resultTitleBlock-->
                                     */
                                     ?>
                                     

                                </div>

                                <div  id="feedback-popup" class="feedback-popup" style="display: none;" v-if="score() == quiz.questions.length">
                                    <div class="container">
                                        <div class="feedback-popup-box">
                                            
                                        </div>
                                    </div>
                                </div>

                            </div>
                          <!--/quizCompetedResult-->
                            <!-- 		</transition> -->
                        </div>
                        <!-- question Box -->

                      <div v-if="questionIndex >= quiz.questions.length" v-bind:key="questionIndex" class="quizCompleted has-text-centered">      
                        <div id="create" class="quiz-result"  tabindex='1'>                            
                            
                             <?php if ($type=='Subject Order') { ?>
                                    <div id="question_list">{{divshowsorder()}}</div>
                                    
                            <?php }else { ?>
                                    <div id="question_list">{{divshow()}}</div>
                             <?php } ?>                    
                            
                            <div id="question_list_det" style="display: none;"></div>
                        </div>
                      </div>    

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

        <?php include 'footer.php'; ?>
        <?php include 'script.php'; ?>
        <script>
            //image_url = 'http://localhost/project/examhorse/api/v1/';
            image_url ='http://examhorse.com/beta/api/v1/';
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
                    showTimer: true,
                    totalquizduration : 18,
                    quizalertbeforemins: 1,
                    data_ques_answered : 0,
                    data_ques_duration : 0
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
                                            }else if((val.student_notsure_answer).toUpperCase() === 'A') {
                                                student_ans = 'notsure_clr';
                                             }   
                                                                                        
                                            qlist = qlist + '<div class="result-option ' + student_ans + '"><div class="option"><span class="quiz-option-float">A.</span> ' + val.a + '</div></div>';
                                        }
                                        if (val.b !== '') {
                                            student_ans = '';
                                            if ((val.student_answer).toUpperCase() === 'B') {
                                                student_ans = 'crt_clr';
                                            }else if((val.student_notsure_answer).toUpperCase() === 'B') {
                                                student_ans = 'notsure_clr';
                                             } 
                                            qlist = qlist + '<div class="result-option ' + student_ans + '"><div class="option"><span class="quiz-option-float">B.</span> ' + val.b + '</div></div>';
                                        }
                                        if (val.c !== '') {
                                            student_ans = '';
                                            if ((val.student_answer).toUpperCase() === 'C') {
                                                student_ans = 'crt_clr';
                                            }else if((val.student_notsure_answer).toUpperCase() === 'C') {
                                                student_ans = 'notsure_clr';
                                             } 
                                             
                                            qlist = qlist + '<div class="result-option ' + student_ans + '"><div class="option"><span class="quiz-option-float">C.</span> ' + val.c + '</div></div>';
                                        }
                                        if (val.d !== '') {
                                            student_ans = '';
                                            if ((val.student_answer).toUpperCase() === 'D') {
                                                student_ans = 'crt_clr';
                                            }else if((val.student_notsure_answer).toUpperCase() === 'D') {
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
                                    if(data.result.data) {
                                    $.each(data.result.data, function (key, val) {
                                        //stud_ans[val.question_no]= {'student_answer':val.student_answer,'student_notsure_answer':val.student_notsure_answer};
                                        stud_ans[val.question_id]= {'student_answer':val.student_answer,'student_notsure_answer':val.student_notsure_answer};
                                    });   
                                }
                                
                                
                                
                                
                       var questionslist = <?php echo  json_encode($questions_list); ?>;
                       var  qTable = '<table class="question-number-table"><tr>';
                        $.each(questionslist, function (key, val) {
                            var qn = key+1;
                                                    
                            if(qn!=1 && (key%10==0)) {                                                                
                                 if(qn<questionslist.length) {
                                    qTable += '<tr>';
                                 }   
                              }   
                                
                                var tdval = '<td onClick=goQuesFrPanel('+key+');><span class="q-a-n">'+qn+'</span></td>';
                                if(typeof val.question_no !== 'undefined') {                                    
                                    if(typeof stud_ans[val.question_id] !== 'undefined'){
                                        if(stud_ans[val.question_id].student_answer!='') {
                                            tdval =  '<td onClick=goQuesFrPanel('+key+'); class=""><span class="q-a-n clr-blue">'+qn+'</span></td>';                                           
                                         }
                                         else if(stud_ans[val.question_id].student_notsure_answer!='') {
                                             tdval = '<td onClick=goQuesFrPanel('+key+'); class=""><span class="q-a-n clr-yellow">'+qn+'</span></td>';
                                         }    
                                    }   
                                }
                                qTable += tdval;
                              
                              
                               if(qn!=1 && (qn%10==0)) {
                                                                
                                 if(qn<=questionslist.length) {
                                    qTable += '</tr>';
                                 }   
                              }else if(qn==questionslist.length) {
                                  var rtd = 10-(qn%10);
                                  for(i=1;i<=rtd;i++) {
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
                        $('#questionpanel').html(qTable);
                        $('.question-admin-panel').show();   
                        
                            } 
                            }
                        });
                        //console.log(stud_ans);       
                        
                        
                        /*
                    
                    setTimeout(() => {                        
                        
                        
                        var questionslist = <?php // echo  json_encode($questions_list); ?>;
                       var  qTable = '<table class="question-number-table"><tr>';
                        $.each(questionslist, function (key, val) {
                            var qn = key+1;
                                                    
                            if(qn!=1 && (key%10==0)) {                                                                
                                 if(qn<questionslist.length) {
                                    qTable += '<tr>';
                                 }   
                              }   
                                
                                var tdval = '<td onClick=goQuesFrPanel('+key+');>'+qn+'</td>';
                                if(typeof val.question_no !== 'undefined') {                                    
                                    if(typeof stud_ans[val.question_no] !== 'undefined'){
                                        if(stud_ans[val.question_no].student_answer!='') {
                                            tdval =  '<td onClick=goQuesFrPanel('+key+'); class="clr-blue">'+qn+'</td>';                                           
                                         }
                                         else if(stud_ans[val.question_no].student_notsure_answer!='') {
                                             tdval = '<td onClick=goQuesFrPanel('+key+'); class="clr-yellow">'+qn+'</td>'
                                         }    
                                    }   
                                }
                                qTable += tdval;
                              
                              
                               if(qn!=1 && (qn%10==0)) {
                                                                
                                 if(qn<=questionslist.length) {
                                    qTable += '</tr>';
                                 }   
                              }else if(qn==questionslist.length) {
                                  var rtd = 10-(qn%10);
                                  for(i=1;i<=rtd;i++) {
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
                        $('#questionpanel').html(qTable);
                        $('.question-admin-panel').show();   
                          


                        }, 1000);
                    
                    
                    
                    */
                        
                       
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
                                    var cor_cnt     = 0;
                                    var ans_cnt     = 0;
                                    var wrong_cnt   = 0;
                                    
                                    $.each(data.result.data, function (key, val) {                  
                                        ans_cnt = ans_cnt +1 ;
                                        qlist = qlist + '<div class="question-title"><h6>' + (key + 1) + '. ' + val.name + '</h6>';
                                        if (val.a !== '') {
                                            correct_ans = '';
                                            student_ans = '';
                                            if ((val.answer).toUpperCase() === 'A') {
                                                correct_ans = 'crt_clr';                                                
                                            }
                                            if ((val.student_answer).toUpperCase() === 'A' && (val.answer).toUpperCase() !== 'A') {
                                                student_ans = 'wrng_clr';
                                                wrong_cnt = wrong_cnt+1;
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
                                                wrong_cnt = wrong_cnt+1;
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
                                                wrong_cnt = wrong_cnt+1;
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
                                                wrong_cnt = wrong_cnt+1;
                                            }
                                            qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="quiz-option-float">D.</span> ' + val.d + '</div></div>';
                                        }
                                        if (val.image_path_explanation !== '' && val.explanation_img_direction !== 'bottom') {
                                            qlist = qlist + '<div class="explanation_image"><img src="' + image_url + val.image_path_explanation + '"></div>';
                                        } else {
                                            qlist = qlist + '';
                                        }
                                        if (val.explanation !== '') {
                                            qlist = qlist + '<div class="explanation-section"><strong>Explanation</strong> : ' + val.explanation + '</div>';
                                        } else {
                                            //qlist = qlist + '<div class="explanation-section">No Explanation</div>';
                                        }
                                        if (val.image_path_explanation !== '' && val.explanation_img_direction !== 'top') {
                                            qlist = qlist + '<div class="explanation_image"><img src="' + image_url + val.image_path_explanation + '"></div>';
                                        } else {
                                            qlist = qlist + '';
                                        }
                                        qlist = qlist + '</div>';
                                    });
                                     $('#question_list_det').html(qlist);
                                                                          
                                      cor_cnt = ans_cnt -  wrong_cnt;
                                      var res ='<table style="width:100%">';
                                      res +='<tr>';
                                                res +='<th>Year</th>';
                                                res +='<th>Total</th>';
                                                res +='<th>Answered</th>';
                                                res +='<th><i class="icon-ok"></i></th>';
                                                res +='<th><i class="icon-remove"></i></th>';
                                                res +='<th>&nbsp;</th>';
                                            res +='</tr>';
                                       res +='<tr>';
                                                res +='<td><?php echo $sel_year_val; ?></td>';
                                                res +='<td>'+quiz.questions.length+'</td>';
                                                res +='<td>'+ans_cnt+'</td>';
                                                res +='<td>'+cor_cnt+'</td>';
                                                res +='<td>'+wrong_cnt+'</td>';
                                                 res +='<td>';
                                                res +='<button class="btn btn-answerd-clr" onClick=yordershowdetail();>Show Details</button>';
                                                res +='</td>';
                                                res +='</tr>';    
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
                         
                         /*
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
                         */
                                    
                                    
                                    
                         $.ajax({
                            type: "GET",
                            url: 'api/v1/free_user_get_student_result_count_by_topic/' +<?php  echo $student_log; ?>,
                            success: function (data) {
                                if (data.result.error === false) {
                                     var res ='<table>';
                                        res +='<tr>';
                                                res +='<th>Subject</th>';
                                                res +='<th>Topic</th>';
                                                res +='<th>Total</th>';
                                                res +='<th>Answered</th>';
                                                res +='<th><i class="icon-ok"></i></th>';
                                                res +='<th><i class="icon-remove"></i></th>';
                                                res +='<th>&nbsp;</th>';
                                            res +='</tr>';
                                    $.each(data.result.data, function (key, val) {    
                                                                
                                                res +='<tr>';
                                                res +='<td>'+val.subject_name+'</td>';
                                                res +='<td>'+val.topic_name+'</td>';
                                                res +='<td class="q-center">'+val.totalcnt+'</td>';
                                                res +='<td class="q-center">'+val.answerdcnt+'</td>';
                                                res +='<td>'+val.correctcnt+'</td>';
                                                res +='<td>'+val.wrongcnt+'</td>';
                                                res +='<td>';
                                                res +='<button class="btn btn-answerd-clr" onClick=topicShowDetail('+val.topic_id+')>Show Details</button>';
                                                res +='</td>';
                                                res +='</tr>';                 
                                    });
                                    
                                    $('#question_list').html(res);
                                     $('#question_list').show();
                                    //$("#create").toggle();                                    
                                    $('.loadingoverlay').hide();          
                                }
                            }
                        });  
                                                              
                        
                        /*

                        /*
                        $('.loadingoverlay').show();
                        setTimeout(() => {
                            applyMathAjax();
                            $('.loadingoverlay').hide();
                        }, 600);
                        $.ajax({
                            type: "GET",
                            url: 'api/v1/free_user_get_result_detail/' +<?php // echo  $student_log; ?>,
                            success: function (data) {
                                if (data.result.error === false) {
                                    var qlist = '';
                                    var correct_ans = '';
                                    var student_ans = '';
                                    $.each(data.result.data, function (key, val) {
                                        qlist = qlist + '<div class="question-title"><h6>' + (key + 1) + '. ' + val.name + '</h6>';
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
                                            qlist = qlist + '<div class="explanation_image"><img src="' + image_url + val.image_path_explanation + '"></div>';
                                        } else {
                                            qlist = qlist + '';
                                        }
                                        if (val.explanation !== '') {
                                            qlist = qlist + '<div class="explanation-section"><strong>Explanation</strong> : ' + val.explanation + '</div>';
                                        } else {
                                            qlist = qlist + '<div class="explanation-section">No Explanation</div>';
                                        }
                                        if (val.image_path_explanation !== '' && val.explanation_img_direction !== 'top') {
                                            qlist = qlist + '<div class="explanation_image"><img src="' + image_url + val.image_path_explanation + '"></div>';
                                        } else {
                                            qlist = qlist + '';
                                        }
                                        qlist = qlist + '</div>';
                                    });
                                    $('#question_list').html(qlist);
                                    $("#create").toggle();
                                } else {
                                    swal('Information', data.result.message, 'info');
                                }
                            },
                            error: function (err) {
                                swal('Error', err.statusText, 'error');
                            }
                        });
                        */
                    },
                    divshowsorderdetail: function (tid,lid) {        
                        //alert(' lid '+lid+' tid '+tid);
                        
                        $('.loadingoverlay').show();
                        setTimeout(() => {
                            applyMathAjax();
                            $('.loadingoverlay').hide();
                        }, 600);
                        $.ajax({
                            type: "GET",
                            url: 'api/v1/free_user_get_result_detail_by_topic/' +<?php  echo  $student_log; ?>+'/'+tid,
                            success: function (data) {
                                if (data.result.error === false) {
                                    var qlist = '';
                                    var correct_ans = '';
                                    var student_ans = '';
                                    $.each(data.result.data, function (key, val) {
                                        var foc = '';
                                        if(key==0) {
                                            foc = " id='ansdetfocus' tabindex='1' style='outline: none;'";
                                        }
                                        qlist = qlist + '<div class="question-title"'+foc+'><h6>' + (key + 1) + '. ' + val.name + '</h6>';
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
                                            qlist = qlist + '<div class="explanation_image"><img src="' + image_url + val.image_path_explanation + '"></div>';
                                        } else {
                                            qlist = qlist + '';
                                        }
                                        if (val.explanation !== '') {
                                            qlist = qlist + '<div class="explanation-section"><strong>Explanation</strong> : ' + val.explanation + '</div>';
                                        } else {
                                            //qlist = qlist + '<div class="explanation-section">No Explanation</div>';
                                        }
                                        if (val.image_path_explanation !== '' && val.explanation_img_direction !== 'top') {
                                            qlist = qlist + '<div class="explanation_image"><img src="' + image_url + val.image_path_explanation + '"></div>';
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
                        
                        
                        if(!this.questionprevanswered) {
                            this.showsurebtnans         = false;
                            this.shownotsureaftersel    = true;
                            this.showcnfrmaftersel      = true;
                            this.shownextnosave         = false;
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
                        
                        this.showsurebtnans  = false;
                        this.shownextnosave   = true;
                        this.shownotsureaftersel = false;
                        this.showcnfrmaftersel = false;
                        this.questionprevanswered = false;
                        
                        $('.loadingoverlay').show();
                        
                         setTimeout(() => {
                                applyMathAjax();
                                $('.loadingoverlay').hide();
                            }, 600);
                            
                            
                            
                        if(this.selected_answer){
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
                         
                         if(this.questionIndex == this.quiz.questions.length-1)   {
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
                                            

                                            if(ansid!='')
                                            {   
                                                 var studansid = app.convertLower(ansid);
                                                $('#ansopt_' + studansid).addClass('crt_clr');                                             
                                                
                                                
                                                app.selected_answer = ansid;
                                                app.shownotsureaftersel = true;
                                                app.showcnfrmaftersel = false;    
                                                app.questionprevanswered = true;
                                                
                                                app.showsurebtnans  = false;
                                            } 
                                            else if(notsure_ansid!='')
                                            {   
                                                var studansid = app.convertLower(notsure_ansid);
                                                $('#ansopt_' + studansid).addClass('notsure_clr');                                                
                                                
                                                app.selected_answer = notsure_ansid;
                                                app.shownotsureaftersel = false;
                                                app.showcnfrmaftersel = false;    
                                                app.questionprevanswered = true;
                                                app.showsurebtnans  = true;
                                            }

                                            else {
                                                
                                                app.selected_answer = '';
                                                app.shownotsureaftersel = false;
                                                app.showcnfrmaftersel = false;
                                                app.questionprevanswered = false;
                                                app.showsurebtnans  = false;
                                            }  
                                        }
                                    });

                                }   
                                
                                
                           }, 500);    
                         
                         
                        
                    },    
                    confirmSave:function (){
                    
                        this.showsurebtnans  = false;
                        this.shownextnosave = true;
                        this.shownotsureaftersel = false;
                        this.showcnfrmaftersel = false;
                        this.questionprevanswered = false;
                        
                        $('.loadingoverlay').show();
                        
                         setTimeout(() => {
                                applyMathAjax();
                                $('.loadingoverlay').hide();
                            }, 600);
                            
                            
                        if(this.selected_answer){
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
                                  var answersidx = -1;
                                  $.each(answers, function (key, val) {                                      
                                      if(app.selected_answer==val){
                                          answersidx = key;
                                      }    
                                  });    

                                  if(answersidx!=-1) {
                                      Vue.set(this.userResponses, this.questionIndex, answersidx); 
                                  }   
                         }          
                         
                          if(this.questionIndex == this.quiz.questions.length-1)   {
                                    this.savetimetaken();
                                    this.quizdurtext();
                          }
                                    
                           setTimeout(() => {
                                                      
                                if (this.questionIndex < this.quiz.questions.length) {
                                    this.questionIndex++;  
                                    this.selected_answer = '';
                                    
                                    if(questions[this.questionIndex]) {
                                    var qid = questions[this.questionIndex].question_id;
                                    
                                    $.get("api/v1/get_student_notsure_answer/" + qid + "/<?php echo $student_log; ?>",
                                    function (data, status) {
                                        if (data.result.error === false) {
                                           ansid = data.result.data;
                                           notsure_ansid = data.result.data_notsure;
                                            

                                            if(ansid!='')
                                            {   
                                                 var studansid = app.convertLower(ansid);
                                                $('#ansopt_' + studansid).addClass('crt_clr');                                             
                                                
                                                
                                                app.selected_answer = ansid;
                                                app.shownotsureaftersel = true;
                                                app.showcnfrmaftersel = false;    
                                                app.questionprevanswered = true;
                                                
                                                app.showsurebtnans  = false;
                                            } 
                                            else if(notsure_ansid!='')
                                            {   
                                                var studansid = app.convertLower(notsure_ansid);
                                                $('#ansopt_' + studansid).addClass('notsure_clr');                                                
                                                
                                                app.selected_answer = notsure_ansid;
                                                app.shownotsureaftersel = false;
                                                app.showcnfrmaftersel = false;    
                                                app.questionprevanswered = true;
                                                app.showsurebtnans  = true;
                                            }

                                            else {
                                                
                                                app.selected_answer = '';
                                                app.shownotsureaftersel = false;
                                                app.showcnfrmaftersel = false;
                                                app.questionprevanswered = false;
                                                app.showsurebtnans  = false;
                                            }   
                                        }
                                    });
                                  }
                                }                               
                           }, 500);    
                           
                          
                    },    
                    prevNoSave: function () {
                    
                       this.selected_answer = '';
                       
                       this.showsurebtnans  = false;
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

                        var questions = <?php  echo json_encode($questions_list); ?>;
                        var qid = questions[this.questionIndex].question_id;
                        var answers = ['A', 'B', 'C', 'D'];
                        var ansid = '';
                 

                        $.get("api/v1/get_student_notsure_answer/" + qid + "/<?php  echo $student_log; ?>",
                                function (data, status) {
                                    if (data.result.error === false) {
                                       ansid = data.result.data;
                                       notsure_ansid = data.result.data_notsure;
                                            

                                            if(ansid!='')
                                            {   
                                                var studansid = app.convertLower(ansid);
                                                $('#ansopt_' + studansid).addClass('crt_clr'); 
                                                
                                                
                                                app.selected_answer = ansid;
                                                app.shownotsureaftersel = true;
                                                app.showcnfrmaftersel = false;    
                                                app.questionprevanswered = true;
                                                
                                                app.showsurebtnans  = false;
                                            } 
                                            else if(notsure_ansid!='')
                                            {   
                                                
                                                var studansid = app.convertLower(notsure_ansid);
                                                $('#ansopt_' + studansid).addClass('notsure_clr');   
                                                
                                                
                                                app.selected_answer = notsure_ansid;
                                                app.shownotsureaftersel = false;
                                                app.showcnfrmaftersel = false;    
                                                app.questionprevanswered = true;
                                                app.showsurebtnans  = true;
                                            }

                                            else {
                                                
                                                app.selected_answer = '';
                                                app.shownotsureaftersel = false;
                                                app.showcnfrmaftersel = false;
                                                app.questionprevanswered = false;
                                                app.showsurebtnans  = false;
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
                       

                         if(this.questionIndex == this.quiz.questions.length-1)   {
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
                                            

                                            if(ansid!='')
                                            {   
                                                 var studansid = app.convertLower(ansid);
                                                $('#ansopt_' + studansid).addClass('crt_clr');
                                                
                                                app.selected_answer = ansid;
                                                app.shownotsureaftersel = true;
                                                app.showcnfrmaftersel = false;    
                                                app.questionprevanswered = true;
                                                
                                                app.showsurebtnans  = false;
                                            } 
                                            else if(notsure_ansid!='')
                                            {   
                                                var studansid = app.convertLower(notsure_ansid);
                                                $('#ansopt_' + studansid).addClass('notsure_clr');    
                                                
                                                app.selected_answer = notsure_ansid;
                                                app.shownotsureaftersel = false;
                                                app.showcnfrmaftersel = false;    
                                                app.questionprevanswered = true;
                                                app.showsurebtnans  = true;   
                                            }
                                            
                                            else {
                                                
                                                app.selected_answer = '';
                                                app.shownotsureaftersel = false;
                                                app.showcnfrmaftersel = false;
                                                app.questionprevanswered = false;
                                                app.showsurebtnans  = false;
                                            }
                                        }
                                    });
                        
                    },    
                    selectOption: function (index) {
                        $('.loadingoverlay').show();
                        
                        <?php if ($type=='Year Order') { ?>
                        if(this.questionIndex == this.quiz.questions.length-1)   {
                                    this.savetimetaken();
                                    this.quizdurtext();
                                }
                        <?php } ?>        
                                
                        if (!app.showimmediate) {
                            var questions = <?php echo json_encode($questions_list); ?>;
                            var answers = ['A', 'B', 'C', 'D'];
                            $.post("api/v1/free_user_store_answer",
                                    {
                                        question_id: questions[this.questionIndex].question_id,
                                        answer: answers[index],
                                        student_log_id: <?php echo $student_log; ?>
                                    },
                                    function (data, status) {
                                        if (data.result.error === false) {

                                        }
                                    });

                            setTimeout(() => {
                                Vue.set(this.userResponses, this.questionIndex, index);
                                if (this.questionIndex < this.quiz.questions.length) {
                                    this.questionIndex++;      
                                    
                                     <?php // if($testmode==1){        ?>  
                         if(this.olqshow) {
                            this.showQuestionOtherLang();
                         }  
                         <?php // } ?>  

                                    var nqid = this.questionIndex + 1;

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
                                $.post("api/v1/free_user_store_answer",
                                        {
                                            question_id: questions[this.questionIndex].question_id,
                                            answer: answers[index],
                                            student_log_id: <?php echo $student_log; ?>
                                        },
                                        function (data, status) {
                                            if (data.result.error === false) {

                                            }
                                        });

                                // var questions = <?php echo json_encode($questions_list); ?>;
                                var qid = questions[this.questionIndex].question_id;
                                //var answers   = ['A', 'B', 'C', 'D'];
                                var ansid = answers[index];
                                $.get("api/v1/free_user_get_question_answer/" + qid,
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
                                //document.getElementById("quiz-footer").style.display = "block";
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

                        if (this.questionIndex < this.quiz.questions.length) {
                            this.questionIndex++;
                        }

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
                        
                        
                         <?php // if($testmode==1){        ?>  
                         if(this.olqshow) {
                            this.showQuestionOtherLang();
                         }  
                         <?php // } ?>
                             
                         this.continueTimer();    
       
                    },
                    prev: function () {
                           
                        $('.loadingoverlay').show();                       
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
                                            app.shownotimmdnxt = true;



                                        }
                                    });

                        }
                        
                         <?php // if($testmode==1){        ?>  
                         if(this.olqshow) {
                            this.showQuestionOtherLang();
                         }  
                         <?php // } ?>
                        
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
                        
                        
                         <?php // if($testmode==1){        ?>  
                         if(this.olqshow) {
                            this.showQuestionOtherLang();
                         }  
                         <?php // } ?>
       
                    },    
                    /*    
                    goQuesAns: function (val) {   
                        
                        
                        
                         $('#header-hidden').show();
                         $('#quiz-hidden').show();
                         $('.questionFooter').show();
                         $('.question-admin-panel').hide();
      
                        this.questionIndex = val;
                                
                         $('.loadingoverlay').show();  
                         
                        setTimeout(() => {                            
                            applyMathAjax();   
                            $('.loadingoverlay').hide();
                        }, 600);      
                        
                        
                        this.selected_answer = '';
                        
                        this.showsurebtnans = false;
                        this.shownextnosave = true;
                        this.shownotsureaftersel = false;
                        this.showcnfrmaftersel = false;     
                        this.questionprevanswered = false;
                        
                        
                        var questions = <?php // echo json_encode($questions_list); ?>;
                        var qid = questions[this.questionIndex].question_id;
                         var answers = ['A', 'B', 'C', 'D'];
                        var ansid = '';
                        
                           $.get("api/v1/get_student_notsure_answer/" + qid + "/<?php // echo $student_log; ?>",
                                    function (data, status) {
                                        if (data.result.error === false) {
                                            ansid = data.result.data;
                                            notsure_ansid = data.result.data_notsure;
                                            

                                            if(ansid!='')
                                            {   
                                                 var studansid = app.convertLower(ansid);
                                                $('#ansopt_' + studansid).addClass('crt_clr');
                                                
                                                app.selected_answer = ansid;
                                                app.shownotsureaftersel = true;
                                                app.showcnfrmaftersel = false;    
                                                app.questionprevanswered = true;
                                                
                                                app.showsurebtnans  = false;
                                            } 
                                            else if(notsure_ansid!='')
                                            {   
                                                var studansid = app.convertLower(notsure_ansid);
                                                $('#ansopt_' + studansid).addClass('notsure_clr');    
                                                
                                                app.selected_answer = notsure_ansid;
                                                app.shownotsureaftersel = false;
                                                app.showcnfrmaftersel = false;    
                                                app.questionprevanswered = true;
                                                app.showsurebtnans  = true;   
                                            }
                                            
                                            else {
                                                
                                                app.selected_answer = '';
                                                app.shownotsureaftersel = false;
                                                app.showcnfrmaftersel = false;
                                                app.questionprevanswered = false;
                                                app.showsurebtnans  = false;
                                            }
                                        }
                                    });
                        
                        

                    },
                                     */
                    goquestion: function () {    
                        var goquestion = parseInt($("#goques").val());
                        
                        if(goquestion>this.quiz.questions.length)   {
                            var maxnum = this.quiz.questions.length+1
                           swal("Error!", "Number Should be Less than "+maxnum, "error");
                            return;
                        }  
                        else 
                        {
                            this.questionIndex = goquestion-1;

                             $('.loadingoverlay').show();


                              <?php // if($testmode==1){        ?>  
                             if(this.olqshow) {
                                this.showQuestionOtherLang();
                             }  
                             <?php // } ?>

                            setTimeout(() => {                            
                                applyMathAjax();   
                                $('.loadingoverlay').hide();
                            }, 600);      
                        
                        }

                    },   
                    showolqChange: function () {
                        
                       !this.olqshow;
                       if(this.olqshow) {         
                           this.showQuestionOtherLang();  
                       }   
                    },   
                    showQuestionOtherLang: function() {
                      
                       <?php // if($testmode==1){        ?>      
                            this.olqd = null;   
                            var other_language = '<?php  echo $other_language['language_id']; ?>';
                            var questions = <?php echo json_encode($questions_list); ?>;
                            var otherlang_questions = <?php echo json_encode($otherlang_questions_list); ?>;
                            var qno = questions[this.questionIndex].question_no;
                            var ye = questions[this.questionIndex].year_id;
                            
                           if(otherlang_questions) {
                               for (let i = 0; i < otherlang_questions.length; i++) {                               
                                    if(otherlang_questions[i].question_no==qno && otherlang_questions[i].year_id==ye){
                                        this.olqd = otherlang_questions[i];
                                        //this.olqshow = true;
                                        
                                         
                                }
                                }
                            }else {
                                this.olqd = null;
                            }    
                            
                             setTimeout(() => {                            
                                applyMathAjax();   
                                $('.loadingoverlay').hide();
                            }, 600);    
                       <?php // } ?>
                    },    
                    showExplanationOtherLang: function() {
                      //display other langauage explaination
                       <?php  // if($testmode==1){        ?>   
                               
                            
                            var other_language = '<?php  echo $other_language['language_id']; ?>';
                            var questions = <?php echo json_encode($questions_list); ?>;
                            var otherlang_questions = <?php echo json_encode($otherlang_questions_list); ?>;                            
                          
                           if(otherlang_questions) {
                               //alert(otherlang_questions.length);
                               var sample = new Array();    
                               
                               for (let il = 0; il < otherlang_questions.length; il++) { 
                                   sample[otherlang_questions[il].year_id+otherlang_questions[il].question_no] = {'explanation_img_direction':otherlang_questions[il].explanation_img_direction,'explanation':otherlang_questions[il].explanation,'show_image_explanation':otherlang_questions[il].show_image_explanation,'image_path_explanation':otherlang_questions[il].image_path_explanation};
                                       
                                }   
                           
                            this.otherlangquiz = sample;
                            console.log(sample);
                        }
                       <?php // } ?>
                    },          
                    score: function () {
                        var score = 0;
                        for (let i = 0; i < this.userResponses.length; i++) {
                            if (
                                    typeof this.quiz.questions[i].responses[
                                    this.userResponses[i]
                            ] !== "undefined" &&
                                    this.quiz.questions[i].responses[this.userResponses[i]].correct
                                    ) {
                                score = score + 1;
                            }
                        }
                         
                        return score;

                        //return this.userResponses.filter(function(val) { return val }).length;
                      
                       
                    },
                    startTimer:function() {                       
                        if(!this.isTimerPaused) {
                            this.totseconds++;
                            this.secondslabel = pad(this.totseconds % 60);
                            this.minuteslabel = pad(parseInt(this.totseconds / 60));
                        }   
                        var alertduration = this.totalquizduration - this.quizalertbeforemins;
                        if(this.minuteslabel==alertduration && this.secondslabel==0) {
                            this.quizTimerAlert();
                        }
                        if(this.minuteslabel==this.totalquizduration && this.secondslabel==0) {
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
                    quizTimerAlert:function() {
                        swal('Only '+this.quizalertbeforemins+' Minutes Left');
                    },
                    quizTimertotdurAlert:function() {
                        swal(this.totalquizduration+' Minutes Completed. But you can answer and complete the pending questions');
                    },
                    quizdurtext:function() {
                         $('.loadingoverlay').show();
                         $.get("api/v1/free_user_get_student_log_time_info/<?php echo $student_log; ?>",
                                                    function (data, status) {
                                                        if (data.result.error === false) {
                                                           var qt = 0;  
                                                           var qta= 0;
                                                           app.data_ques_answered = data.result.ques_answered;
                                                           qt = data.result.ques_duration;
                                                           qta = qt/60;
                                                           app.data_ques_duration = parseInt(qta);
                                                               
                                                               
                                                           $('.loadingoverlay').hide();
                                                        }
                                                    });
                                                    //return true; 

                    }    
                }
            });
            setTimeout(() => {
                $("#feedback-popup").show();
            }, 500);
        </script>
        <script>
            /*
            var minutesLabel = document.getElementById("minutes");
            var secondsLabel = document.getElementById("seconds");
            var totalSeconds = 0;
            setInterval(setTime, 1000);

            function setTime() {
                ++totalSeconds;
                secondsLabel.innerHTML = pad(totalSeconds % 60);
                minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
            }
            */
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
                             <?php // if($testmode==1){        ?>   
                            //display other lanaguage explanation           
                            app.showExplanationOtherLang();
                             <?php // } ?>
                            <?php // if($testmode == 0) {  ?>     
                            <?php if ($type=='Year Order') { ?>    
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
                $('.question-admin-panel').hide();
                $('.questionFooter').show();
            }
            function goQuesFrPanel(val) {
                app.goQuesAns(val);                
            }
            function topicShowDetail(tid) {
               app.divshowsorderdetail(tid,<?php echo $student_log; ?>);
            }
            function yordershowdetail(){
                $('#question_list_det').show();
            }
        </script>
    </body>
</html>
