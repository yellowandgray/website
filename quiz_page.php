<?php
session_start();
require_once 'api/include/common.php';
$questions = array();
$obj = new Common();
$type = '';
if (!isset($_SESSION['student_selected_type']) || !isset($_SESSION['student_register_id'])) {
    header('Location: qorder-years');
}


if ($_SESSION['student_selected_type'] == 'order') {
    if(isset($_SESSION['student_selected_topics_id'])) { 
        unset($_SESSION['student_selected_topics_id']);
    }
    if(isset($_SESSION['student_selected_years_id'])) { 
        unset($_SESSION['student_selected_years_id']);
    }
    
    if (!isset($_GET['year'])) {
        header('Location: qorder-years');
    }
    $type = 'Question Order';
    $selyear = $obj->selectRow('*', 'year', 'year=\'' . $_GET['year'] . '\'');
    $_SESSION['student_selected_year_id'] = $selyear['year_id'];
    
    $questions = $obj->selectAll('name, a, b, c, d, UPPER(answer) AS answer, image_path, direction,question_id,explanation,image_path_explanation,explanation_img_direction','question', 'topic_id IN (SELECT t.topic_id FROM topic AS t LEFT JOIN subject AS s ON s.subject_id = t.subject_id WHERE s.language_id = ' . $_SESSION['student_selected_language_id'] . ') AND year_id = ' . $_SESSION['student_selected_year_id'] . ' ORDER BY year_id ASC, topic_id ASC');
    
     
    $student_log = $obj->insertRecord(array('language_id' => $_SESSION['student_selected_language_id'],
    'student_register_id' => $_SESSION['student_register_id'], 'total_questions' => count($questions), 
    'created_at' => date('Y-m-d H:i:s'), 'created_by' => $_SESSION['student_register_id'], 'updated_at' => date('Y-m-d'), 
    'updated_by' => $_SESSION['student_register_id']), 'student_log');    
    
     $student_log_order = $obj->insertRecord(array('student_log_id' => $student_log,'student_log_order'=>1),'student_log_order');
     
     $student_log_year = $obj->insertRecord(array('student_log_id' => $student_log,'year_id'=>$_SESSION['student_selected_year_id']),'student_log_year');
}
if ($_SESSION['student_selected_type'] == 'subject') {
    if(isset($_SESSION['student_selected_year_id'])) { 
        unset($_SESSION['student_selected_year_id']);
    }
    if (!isset($_GET['years'])) {
        header('Location: subject-years?topics=' . $_SESSION['student_selected_topics_id']);
    }
    $type = 'Subject Order';
    $_SESSION['student_selected_years_id'] = $_GET['years'];
    //$questions = $obj->selectAll('name, a, b, c, d, UPPER(answer) AS answer, image_path, direction', 'question', 'topic_id IN (SELECT t.topic_id FROM topic AS t LEFT JOIN subject AS s ON s.subject_id = t.subject_id WHERE s.language_id = ' . $_SESSION['student_selected_language_id'] . ' AND t.topic_id IN (' . $_SESSION['student_selected_topics_id'] . ') ORDER BY t.subject_id ASC) AND year_id IN (' . $_SESSION['student_selected_years_id'] . ') ORDER BY year_id ASC, topic_id ASC');
    $questions = $obj->selectAll('question.name As name, a, b, c, d, UPPER(answer) AS answer, image_path, direction,question_id,explanation,image_path_explanation,explanation_img_direction','question LEFT JOIN topic ON question.topic_id=topic.topic_id', 'question.topic_id IN (SELECT t.topic_id FROM topic AS t LEFT JOIN subject AS s ON s.subject_id = t.subject_id WHERE s.language_id = ' . $_SESSION['student_selected_language_id'] . ' AND t.topic_id IN (' . $_SESSION['student_selected_topics_id'] . ') ORDER BY t.subject_id ASC) AND year_id IN (' . $_SESSION['student_selected_years_id'] . ') ORDER BY subject_id ASC,question.topic_id ASC,year_id ASC');
    
    
    $student_log = $obj->insertRecord(array('language_id' => $_SESSION['student_selected_language_id'],
    'student_register_id' => $_SESSION['student_register_id'], 'total_questions' => count($questions), 
    'created_at' => date('Y-m-d H:i:s'), 'created_by' => $_SESSION['student_register_id'], 'updated_at' => date('Y-m-d'), 
    'updated_by' => $_SESSION['student_register_id']), 'student_log');
    
    $student_log_order = $obj->insertRecord(array('student_log_id' => $student_log,'student_log_order'=>2),'student_log_order');
    
    
    if(isset($_SESSION['student_selected_years_id']) && ($_SESSION['student_selected_years_id']!='')) {
        $student_selected_years_id_arr = explode(',',$_SESSION['student_selected_years_id']);
        foreach($student_selected_years_id_arr as $student_selected_years_id_val) {
            $student_log_year = $obj->insertRecord(array('student_log_id' => $student_log,'year_id'=>$student_selected_years_id_val),'student_log_year');
        }
    }
    
    if(isset($_SESSION['student_selected_topics_id']) && ($_SESSION['student_selected_topics_id']!='')) {
        $student_selected_topics_id_arr = explode(',',$_SESSION['student_selected_topics_id']);
        foreach($student_selected_topics_id_arr as $student_selected_topics_id_val) {
            $student_log_topic = $obj->insertRecord(array('student_log_id' => $student_log,'topic_id'=>$student_selected_topics_id_val),'student_log_topic');
        }
    }
    
    
    
}


$student = $obj->selectRow('*', 'student_register', 'student_register_id = ' . $_SESSION['student_register_id']);
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
            'explanation_img_direction' => $q['explanation_img_direction']
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

if(isset($_SESSION['student_selected_topics_id']) && ($_SESSION['student_selected_topics_id']!='')) {
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
}else if(isset($_SESSION['student_selected_year_id']) && ($_SESSION['student_selected_year_id'] != '')) {
    $yearres        = $obj->selectRow('year', 'year', ' year_id = ' . $_SESSION['student_selected_year_id']);
    $sel_year_val    = $yearres['year'];
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
        <div class="quiz-section">
            <section class="container">
                <div class="row">
                    <div class="span12">
                        <div class="quiz-question-section">
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
                                    <?php if(isset($_SESSION['student_selected_topics_id']) && ($_SESSION['student_selected_topics_id']!='')) { ?>
                                    <tr>
                                        <td valign="top">Selected Subject and Topics</td>
                                        <td valign="top" class="w-5">:</td>
                                        <th valign="top"><?php echo $sub_topic_val; ?></th>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <td valign="top">Selected Year</td>
                                        <td valign="top" class="w-5">:</td>
                                        <th valign="top"><?php echo $sel_year_val; ?></th>
                                    </tr>
                                </table>
                            </h4>
                            <a class="home_link" href="select_language">
                                <i class="icon-home"></i>
                            </a>
                        </div>
                        <!--question Box-->
                        <div class="questionBox" id="app">
                            <!--qusetionContainer-->
                            <div class="questionContainer" v-if="questionIndex<quiz.questions.length" v-bind:key="questionIndex">
                                <div class="question-header">
                                    <!--progress-->
                                    <div class="progressContainer">
                                        <h1 class="title is-6">Quiz</h1> 
                                        <progress class="progress is-info is-small" :value="(questionIndex/quiz.questions.length)*100" max="100">{{(questionIndex/quiz.questions.length)*100}}%</progress>
                                        <div class="lenth_width">
                                            <span  class="label lable-blue">Total: {{quiz.questions.length}}</span>
                                            <span class="label label-success">Attend: {{((quiz.questions.length)-(quiz.questions.length-questionIndex))}}</span>
                                        </div>
                                    </div>
                                    <!--/progress-->
                                </div>
                                <!-- questionTitle -->
                                <div v-if="quiz.questions[questionIndex].show_image" class="text-center">
                                    <img style="width: 50%" v-if="quiz.questions[questionIndex].direction == 'top'" v-bind:src="'api/v1/'+quiz.questions[questionIndex].image_path" alt="image" class="qes-img" />
                                </div>
                                <h2 class="titleContainer title"><span class="quiz-question-no">{{questionIndex + 1}}.</span> <span class="quiz-question-title" v-html="quiz.questions[questionIndex].text"></span></h2>
                                <div v-if="quiz.questions[questionIndex].show_image" class="text-center">
                                    <img style="width: 50%" v-if="quiz.questions[questionIndex].direction == 'bottom'" v-bind:src="'api/v1/'+quiz.questions[questionIndex].image_path" alt="image" class="qes-img" />
                                </div>
                                <!-- quizOptions -->
                                <div class="optionContainer">
                                    <div id="two" class="option" v-for="(response, index) in quiz.questions[questionIndex].responses" @click="selectOption(index)" :class="{ 'is-selected': userResponses[questionIndex] == index}" :key="index" v-if="response.text != ''">
                                         <span class="q-option">{{ index | charIndex }}.&nbsp;</span> <span v-html="response.text"></span>
                                    </div>
                                </div>
                                <footer class="questionFooter">
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
                            </div>
                            <!--quizCompletedResult-->
                            <div v-if="questionIndex >= quiz.questions.length" v-bind:key="questionIndex" class="quizCompleted has-text-centered">

                                <!-- quizCompletedIcon: Achievement Icon -->
                                <span class="icon">
                                    <i class="fa" :class="score()>3?'fa-check-circle-o is-active':'fa-times-circle'"></i>
                                </span>

                                <!--resultTitleBlock-->
                                <h2 class="complete-title">
                                    <?php 
                                    /* You did {{ (score()>7?'an amazing':(score()<4?'improve':'a good')) }} knowledge! */ 
                                    ?>
                                    Test Completed
                                </h2>
                                <p class="subtitle">
                                    Total score: {{ score() }} / {{ quiz.questions.length }}
                                </p>
                                <div class="">
                                    <a class="btn btn-theme btn-rounded" @click="restart()">Restart <i class="fa fa-refresh"></i></a>
                                    <a class="btn btn-theme btn-rounded" onclick="window.location = 'select_language'">Home <i class="fa fa-refresh"></i></a>
                                    <a @click="divshow()" class="btn btn-theme btn-rounded">Show Full Result <i class="fa fa-refresh"></i></a>
                                    <!--/resultTitleBlock-->

                                </div>
                            </div>
                            <!--/quizCompetedResult-->
                            <!-- 		</transition> -->
                        </div>
                        <!-- question Box -->
                        
                        
                        <div id="create" class="quiz-result" style="display: none;">
                            <h1 class="title is-6">Selected Topic: <?php // echo $topic['name']; ?></h1>
                            <div id="question_list"></div>
                        </div>
                        
                        
                    </div>
                </div>
            </section>
        </div>
        <!--/container-->
        <?php include 'footer.php'; ?>
        <?php include 'script.php'; ?>
        <script>
            image_url = 'http://localhost/project/exam-horse/api/v1/';
            console.log(<?php echo json_encode($questions_list); ?>);
            var quiz = {
                user: "<?php echo $student['student_name']; ?>",
                questions: <?php echo json_encode($questions_list); ?>
            },
                    userResponseSkelaton = Array(quiz.questions.length).fill(null);
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
                        $('#create').hide();
                        this.questionIndex = 0;
                        this.userResponses = Array(this.quiz.questions.length).fill(null);
                        //document.getElementById('#create').style.display = 'none';
                    },
                    divshow: function () {
                        setTimeout(() => {
                            applyMathAjax();
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
                    },
                    selectOption: function (index) {
                        
                        var questions = <?php echo json_encode($questions_list); ?>;
                        var answers = ['A', 'B', 'C', 'D'];
                        $.post("api/v1/store_answer",
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
                            }
                        }, 500);
                        setTimeout(() => {
                            applyMathAjax();
                        }, 600);
                    },
                    next: function () {
                        if (this.questionIndex < this.quiz.questions.length)
                            this.questionIndex++;
                    },
                    prev: function () {
                        if (this.quiz.questions.length > 0)
                            this.questionIndex--;
                    },
                    // Return "true" count in userResponses
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
                    }
                }
            });
        </script>
    </body>
</html>
