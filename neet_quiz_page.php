<?php
session_start();
require_once 'api/include/common.php';
$neetquestions = array();
date_default_timezone_set('Asia/Kolkata');
$obj = new Common();
$type = '';
//$student_log = 0;
if (!isset($_SESSION['selected_topic_id'])) {
    $chapter = $obj->selectRow('*', 'chapter', 'chapter_id = ' . $_SESSION['selected_chapter_id']);
    header('Location: topic_page?chapter=' . $chapter['name']);
}
$subject = $obj->selectRow('*', 'subject', 'subject_id=' . $_SESSION['selected_subject_id']);
//$difficult = $obj->selectRow('*', 'difficult', 'difficult_id=' . $_SESSION['selected_difficult_id']);
$chapter = $obj->selectRow('*', 'chapter', 'chapter_id=' . $_SESSION['selected_chapter_id']);
$topic = $obj->selectRow('*', 'topic', 'topic_id=' . $_SESSION['selected_topic_id'] );
$subtopic = $obj->selectRow('*', 'sub_topic', 'name = \'' . $obj->escapeString($_GET['neetquestions']) . '\'');
$_SESSION['selected_topic_id'] = $topic['topic_id'];
$neetquestions = $obj->selectAll('name, a, b, c, d, UPPER(answer) AS answer, image_path, direction, neet_question_id', 'neet_question', 'sub_topic_id = ' . $subtopic['sub_topic_id']);
//$student_log = $obj->insertRecord(array('subject_id' => $_SESSION['selected_subject_id'], 'subject_name' => $subject['name'], 'difficult_id' => $_SESSION['selected_difficult_id'], 'difficult_name' => $difficult['name'], 'chapter_id' => $_SESSION['selected_chapter_id'], 'chapter_name' => $chapter['name'], 'topic_id' => $_SESSION['selected_topic_id'], 'topic_name' => $topic['name'], 'student_register_id' => $_SESSION['student_register_id'], 'total_questions' => count($questions), 'created_at' => date('Y-m-d H:i:s'), 'created_by' => $_SESSION['student_register_id'], 'updated_at' => date('Y-m-d'), 'updated_by' => $_SESSION['student_register_id']), 'student_log');
$questions_list = array();
//if (count($questions) > 0) {
//    foreach ($questions as $q) {
//        $options = array();
//        $showimg = false;
//        array_push($options, array('text' => $q['a'], 'correct' => ($q['answer'] == 'A' ? true : false)));
//        array_push($options, array('text' => $q['b'], 'correct' => ($q['answer'] == 'B' ? true : false)));
//        if (isset($q['c'])) {
//            array_push($options, array('text' => $q['c'], 'correct' => ($q['answer'] == 'C' ? true : false)));
//        }
//        if (isset($q['d'])) {
//            array_push($options, array('text' => $q['d'], 'correct' => ($q['answer'] == 'D' ? true : false)));
//        }
//        if ($q['image_path'] != '') {
//            $showimg = true;
//        }
//        array_push($questions_list, array(
//            'text' => $q['name'],
//            'direction' => $q['direction'],
//            'image_path' => $q['image_path'],
//            'show_image' => $showimg,
//            'question_id' => $q['question_id'],
//            'responses' => $options
//        ));
//    }
//}




$student_register_id = $_SESSION['student_register_id'];

$data1 = $obj->selectAll('sf.*', 'student_feedback As sf', 'sf.student_id ='.$student_register_id);
$sfeed = '';
if(count($data1)>0) {
            foreach($data1 as $sf) {
                 $sflist[] = $sf['feedback_id'];
            }
            $sfeed = implode(',',$sflist);
            $sfeed = ' AND f.feedback_id NOT IN ('.$sfeed.')';
}

$student_feedbacks = array();
$student_feedbacks = $obj->selectAll('f.*,ftm.feedback_timing As fb_timing,fe.*,fty.feedback_type as feedback_type,fe.name as fback,fe.feedback_type as feedback_type_id,fe.option_1,fe.option_2,fe.option_3', 'user_assign_feedback As f LEFT JOIN feedback_timing_master As ftm ON f.timing_id=ftm.feedback_timing_id LEFT JOIN feedback As fe ON f.feedback_id=fe.feedback_id LEFT JOIN feedback_type_master As fty ON fe.feedback_type=fty.feedback_type_id', 'f.student_id ='.$student_register_id.'  AND f.timing_id=2'.$sfeed.'  ORDER BY fe.feedback_id');
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
        <div class="quiz-section">
            <section class="container">
                <div class="row">
                    <div class="span12">
                        <div class="quiz-question-section">
                            <a href = '#' onclick="goBack()"><i class = 'font-icon-arrow-simple-left'></i></a>
                            <h2>
                                <table class="table-title">
                                    <tr>
                                        <td valign="top">Selected Subject</td>
                                        <td valign="top" class="w-5">:</td>
                                        <th valign="top"><?php echo $subject['name']; ?></th>
                                    </tr>
                                    <tr>
                                        <td valign="top">Selected Chapter</td>
                                        <td valign="top">:</td>
                                        <th valign="top"><?php echo $chapter['name']; ?></th>
                                    </tr>     
                                    <tr>
                                        <td valign="top">Selected topic</td>
                                        <td valign="top">:</td>
                                        <th valign="top"><?php echo $topic['name']; ?></th>
                                    </tr>     
                                    <tr>
                                        <td valign="top">Selected Sub topic</td>
                                        <td valign="top">:</td>
                                        <th valign="top"><?php echo $subtopic['name']; ?></th>
                                    </tr>     
                                </table>
                            </h2>
                            <a class="home_link" href="home_subject">
                                <i class="icon-home"></i>
                            </a>
                        </div>
                        <!--question Box-->

                        <div class="questionBox" id="app">
                            <?php if (count($neetquestions) > 0) { ?>
                                <div class="questionContainer" v-if="questionIndex<quiz.neetquestions.length" v-bind:key="questionIndex">
                                    <div class="question-header">
                                        <!--progress-->
                                        <div class="progressContainer">
                                            <h1 class="title is-6"><?php echo $topic['name']; ?></h1>
                                            <progress class="progress is-info is-small" :value="(questionIndex/quiz.neetquestions.length)*100" max="100">{{(questionIndex/quiz.neetquestions.length)*100}}%</progress>
                                            <div class="lenth_width">
                                                <span  class="label lable-blue">Total: {{quiz.neetquestions.length}}</span>
                                                <span class="label label-success">Answered: {{((quiz.neetquestions.length)-(quiz.neetquestions.length-questionIndex))}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div v-if="quiz.neetquestions[questionIndex].show_image" class="text-center">
                                        <img v-if="quiz.neetquestions[questionIndex].direction == 'top'" v-bind:src="'../api/v1/'+quiz.neetquestions[questionIndex].image_path" alt="image" class="qes-img" />
                                    </div>

                                    <h2 class="titleContainer title">{{questionIndex + 1}}. <span v-html="quiz.neetquestions[questionIndex].text"></span></h2>
                                    <div v-if="quiz.neetquestions[questionIndex].show_image" class="text-center">
                                        <img v-if="quiz.neetquestions[questionIndex].direction == 'bottom'" v-bind:src="'../api/v1/'+quiz.neetquestions[questionIndex].image_path" alt="image" class="qes-img" />
                                    </div>
                                    <div class="optionContainer">
                                        <div class="option" v-for="(response, index) in quiz.neetquestions[questionIndex].responses" @click="selectOption(index)" :class="{ 'is-selected': userResponses[questionIndex] == index}" :key="index" v-if="response.text != ''">
                                             <span class="q-option">{{ index | charIndex }}.&nbsp; </span> <span v-html="response.text"></span>
                                        </div>
                                    </div>
                                    <!--                                <footer class="questionFooter">
                                    
                                                                        pagination
                                                                        <nav class="pagination" role="navigation" aria-label="pagination">
                                    
                                                                             back button 
                                                                                                                <a class="button" v-on:click="prev();" :disabled="questionIndex < 1">
                                                                                                                   Back
                                                                                                            </a>
                                                                            <a class="btn btn-green" href="select_language">
                                                                                Home
                                                                            </a>
                                    
                                                                             next button 
                                                                            <a class="button" :class="(userResponses[questionIndex]==null)?'':'is-active'" v-on:click="next();" :disabled="questionIndex>=quiz.questions.length">
                                                                                {{ (userResponses[questionIndex]==null)?'Skip':'Next' }}
                                                                            </a>
                                    
                                                                        </nav>
                                                                        /pagination
                                    
                                                                    </footer>-->
                                </div>
                                <div v-if="questionIndex >= quiz.neetquestions.length" v-bind:key="questionIndex" class="quizCompleted has-text-centered">

                                    <!-- quizCompletedIcon: Achievement Icon -->
                                    <span class="icon">
                                        <i class="fa" :class="score()>3?'fa-check-circle-o is-active':'fa-times-circle'"></i>
                                    </span>

                                    <!--resultTitleBlock-->
                                    <h2 class="complete-title" v-if="score() == quiz.neetquestions.length">
                                        Congratulations! You have answered everything right!!! <img style="width: 12%" src="img/thumbs-up.gif">
                                    </h2>
                                    <h2 class="complete-title" v-if="score() != quiz.neetquestions.length">
                                        Test Completed
                                    </h2>
                                    <p class="subtitle">
                                        Total Score: <span class="score-clr">{{ score() }}</span> / {{ quiz.neetquestions.length }}
                                    </p>
                                    <div class="quiz-btn">
                                        <a class="btn btn-theme btn-rounded" @click="restart()">Restart <i class="fa fa-refresh"></i></a>
                                        <a class="btn btn-theme btn-rounded" onclick="window.location = 'home_subject'">Home <i class="fa fa-refresh"></i></a>
                                        <a @click="divshow()" class="btn btn-theme btn-rounded">Show Full Result <i class="fa fa-refresh"></i></a>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="text-center no-count-page">
                                    <h6>No Questions on This Topics</h6>
                                    <span onclick="window.location = 'home_subject'">Back to Home</span>
                                </div>
                            <?php } ?>
                        </div>
                        <div id="create" class="quiz-result" style="display: none;">
                            <h1 class="title is-6">Selected Topic: <?php echo $topic['name']; ?></h1>
                            <div id="question_list"></div>
                        </div>
                        
                          <?php if (count($student_feedbacks) > 0) { ?>
                    <div class="feedbackBox fbackModal modal hide fade" id="feedbackapp">
                            
                                <div class="feedbackContainer" v-if="feedbackIndex<quiz.feedbacks.length" v-bind:key="feedbackIndex">
                                    
                                    <h3 style="font-size: 20px;color: rgb(95, 95, 95); font-weight: 500; margin-bottom: 5px;">Your Feedback.</h3>
                                    

                                    <h2 class="titleContainer title">{{/* feedbackIndex + 1 */}} <span v-html="quiz.feedbacks[feedbackIndex].fback"></span></h2>
                                    
                                    <div class="optionContainer" v-if="quiz.feedbacks[feedbackIndex].feedback_type_id == 2">          
                                         <div class="radio">
                                            <label><input type="radio" :name="quiz.feedbacks[feedbackIndex].feedback_id|AddPrefix('fbak_')" value="option_1">{{quiz.feedbacks[feedbackIndex].option_1}}</label>
                                          </div>
                                          <div class="radio">
                                            <label><input type="radio" :name="quiz.feedbacks[feedbackIndex].feedback_id|AddPrefix('fbak_')" value="option_2">{{quiz.feedbacks[feedbackIndex].option_2}}</label>
                                          </div>
                                          <div class="radio disabled" v-if="quiz.feedbacks[feedbackIndex].option_3">
                                            <label><input type="radio" :name="quiz.feedbacks[feedbackIndex].feedback_id|AddPrefix('fbak_')" value="option_3">{{quiz.feedbacks[feedbackIndex].option_3}}</label>
                                          </div> 
                                    </div>
                                    
                                    
                                    <div class="optionContainer" v-if="quiz.feedbacks[feedbackIndex].feedback_type_id == 1">
                                         <textarea class="form-control" rows="5" :name="quiz.feedbacks[feedbackIndex].feedback_id|AddPrefix('fbak_')"></textarea>
                                    </div>
                                    
                                    
                                     <div class="modal-footer text-center">
                                                <button type="button" class="btn logout-btn" v-on:click="nextFeedback(quiz.feedbacks[feedbackIndex].feedback_id);">Skip</button>
<!--                                                <button type="button" class="btn btn-default" v-on:click="nextFeedback(quiz.feedbacks[feedbackIndex].feedback_id);">Next</button>-->
                                    </div>
                                                               
                                </div>
                        
                        
                                <div v-if="feedbackIndex >= quiz.feedbacks.length" v-bind:key="feedbackIndex" class="quizCompleted has-text-centered">
                                    <h2 class="titleContainer title">{{/* feedbackIndex + 1 */}} <span>Thanks For your Feedback</span></h2>
                                    
                                     <div class="modal-footer">
                                                <button type="button" class="btn btn-default" v-on:click="closeFeedback();">Close</button>
                                    </div>
                                </div>
                                
                               
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </section>
        </div>
        <!--/container-->
        <?php include 'footer.php'; ?>
        <?php include 'script.php'; ?>
        <script>
            image_url = 'api/v1/';
            var quiz = {
                user: "Feringo",
                questions: <?php echo json_encode($questions_list); ?>
            },
                    userResponseSkelaton = Array(quiz.neetquestions.length).fill(null);
            var app = new Vue({
                el: "#app",
                data: {
                    quiz: quiz,
                    questionIndex: 0,
                    userResponses: userResponseSkelaton,
                    isActive: false
                },
                filters: {
                    charIndex: function (i) {
                        return String.fromCharCode(97 + i);
                    }
                },
                methods: {
                    restart: function () {
                        location.reload();
                        /*this.questionIndex = 0;
                         this.userResponses = Array(this.quiz.questions.length).fill(null);
                         document.getElementById('create').style.display = "none"; */
                    },
                    divshow: function () {
                        setTimeout(() => {
                            test();
                        }, 600);
                        $.ajax({
                            type: "GET",
                            url: 'api/v1/get_result_detail/' +<?php echo $student_log; ?>,
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
                                            qlist = qlist + '<div class="explanation-section"> </div>';
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
                    },
                    selectOption: function (index) {
                        setTimeout(() => {
                            Vue.set(this.userResponses, this.questionIndex, index);
                            if (this.questionIndex < this.quiz.neetquestions.length) {
                                this.questionIndex++;
                                if(this.questionIndex >= this.quiz.neetquestions.length) {
                                    $('.fbackModal').modal('show');
                                }
                            }
                        }, 500);
                        setTimeout(() => {
                            test();
                        }, 600);
                        var questions = <?php echo json_encode($questions_list); ?>;
                        var answers = ['A', 'B', 'C', 'D'];
                        $.post("api/v1/store_answer",
                                {
                                    neet_question_id: meetquestions[this.questionIndex].question_id,
                                    answer: answers[index],
                                    student_log_id: <?php echo $student_log; ?>
                                },
                                function (data, status) {
                                    if (data.result.error === false) {

                                    }
                                });
                    },
                    next: function () {
                        if (this.questionIndex < this.quiz.neetquestions.length)
                            this.questionIndex++;
                    },
                    prev: function () {
                        if (this.quiz.neetquestions.length > 0)
                            this.questionIndex--;
                    },
                    // Return "true" count in userResponses
                    score: function () {
                        var score = 0;
                        for (let i = 0; i < this.userResponses.length; i++) {
                            if (
                                    typeof this.quiz.neetquestions[i].responses[
                                    this.userResponses[i]
                            ] !== "undefined" &&
                                    this.quiz.neetquestions[i].responses[this.userResponses[i]].correct
                                    ) {
                                score = score + 1;
                            }
                        }
                        return score;
                        //return this.userResponses.filter(function(val) { return val }).length;
                    }
                }
            }
            );






            var feedback = {
                user: "Feringo",
                feedbacks: <?php echo json_encode($student_feedbacks); ?>
            },
            feedbackuserResponseSkelaton = Array(feedback.feedbacks.length).fill(null);
            var feedbackapp = new Vue({
                el: "#feedbackapp",
                data: {
                    quiz: feedback,
                    feedbackIndex: 0,
                    feedbackuserResponses: feedbackuserResponseSkelaton,
                    isActive: false
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
                        location.reload();
                        /*this.feedbackIndex = 0;
                         this.feedbackuserResponses = Array(this.quiz.feedbacks.length).fill(null);
                         document.getElementById('create').style.display = "none"; */
                    },                    
                    nextFeedback: function () {
                        var sel_ans = '';
                        if(this.quiz.feedbacks[this.feedbackIndex].feedback_type_id==2){
                           sel_ans = $('input[name=fbak_'+this.quiz.feedbacks[this.feedbackIndex].feedback_id+']:checked').val();                            
                         } 
                         
                         if(this.quiz.feedbacks[this.feedbackIndex].feedback_type_id==1){
                             sel_ans = $('textarea:input[name=fbak_'+this.quiz.feedbacks[this.feedbackIndex].feedback_id+']').val();                             
                         }
                         
                         if(sel_ans!='' && sel_ans!=undefined) {
                         $.post("api/v1/store_student_feedback",
                        {
                            feedback: this.quiz.feedbacks[this.feedbackIndex].feedback_id,
                            answer: sel_ans,
                            student: <?php echo $student_register_id; ?>
                        },
                        function (data, status) {
                            if (data.result.error === false) {
                                     if (feedbackapp.feedbackIndex < feedbackapp.quiz.feedbacks.length)                            
                                     feedbackapp.feedbackIndex++;
                            }
                        });
                        }else{
                            this.feedbackIndex++;
                        }
                        
                       
                    },
                    skipFeedback: function () {
                        if (feedbackapp.feedbackIndex < feedbackapp.quiz.feedbacks.length)                            
                             feedbackapp.feedbackIndex++;
                    },
                    closeFeedback: function () {
                        $('.fbackModal').modal('hide'); 
                    },
                    prev: function () {
                        if (this.quiz.feedbacks.length > 0)
                            this.feedbackIndex--;
                    },
                    // Return "true" count in feedbackuserResponses
                    score: function () {
                        var score = 0;
                        for (let i = 0; i < this.feedbackuserResponses.length; i++) {
                            if (
                                    typeof this.quiz.feedbacks[i].responses[
                                    this.feedbackuserResponses[i]
                            ] !== "undefined" &&
                                    this.quiz.feedbacks[i].responses[this.feedbackuserResponses[i]].correct
                                    ) {
                                score = score + 1;
                            }
                        }
                        return score;
                        //return this.feedbackuserResponses.filter(function(val) { return val }).length;
                    }
                }
            }
            );    
        </script>
    </body>
</html>
