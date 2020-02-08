<?php
session_start();
require_once 'api/include/common.php';
$questions = array();
date_default_timezone_set('Asia/Kolkata');
$obj = new Common();
$type = '';
$student_log = 0;
if (!isset($_GET['topic'])) {
    $chapter = $obj->selectRow('*', 'chapter', 'chapter_id = ' . $_SESSION['selected_chapter_id']);
    header('Location: topic_page?chapter=' . $chapter['name']);
}
$subject = $obj->selectRow('*', 'subject', 'subject_id=' . $_SESSION['selected_subject_id']);
$difficult = $obj->selectRow('*', 'difficult', 'difficult_id=' . $_SESSION['selected_difficult_id']);
$chapter = $obj->selectRow('*', 'chapter', 'chapter_id=' . $_SESSION['selected_chapter_id']);
$topic = $obj->selectRow('*', 'topic', 'name=\'' . $obj->escapeString($_GET['topic']) . '\'');
$_SESSION['selected_topic_id'] = $topic['topic_id'];
$questions = $obj->selectAll('name, a, b, c, d, UPPER(answer) AS answer, image_path, direction, question_id', 'question', 'topic_id = ' . $_SESSION['selected_topic_id'] . ' AND difficult_id <= ' . $_SESSION['selected_difficult_id']);
$student_log = $obj->insertRecord(array('subject_id' => $_SESSION['selected_subject_id'], 'subject_name' => $subject['name'], 'difficult_id' => $_SESSION['selected_difficult_id'], 'difficult_name' => $difficult['name'], 'chapter_id' => $_SESSION['selected_chapter_id'], 'chapter_name' => $chapter['name'], 'topic_id' => $_SESSION['selected_topic_id'], 'topic_name' => $topic['name'], 'student_register_id' => $_SESSION['student_register_id'], 'total_questions' => count($questions), 'created_at' => date('Y-m-d H:i:s'), 'created_by' => $_SESSION['student_register_id'], 'updated_at' => date('Y-m-d'), 'updated_by' => $_SESSION['student_register_id']), 'student_log');
$questions_list = array();
if (count($questions) > 0) {
    foreach ($questions as $q) {
        $options = array();
        $showimg = false;
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
        array_push($questions_list, array(
            'text' => $q['name'],
            'direction' => $q['direction'],
            'image_path' => $q['image_path'],
            'show_image' => $showimg,
            'question_id' => $q['question_id'],
            'responses' => $options
        ));
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
        <div class="quiz-section">
            <section class="container">
                <div class="row">
                    <div class="span12">
                        <div class="quiz-question-section">
                            <a href = '#' onclick="goBack()"><i class = 'font-icon-arrow-simple-left'></i></a>
                            <h2>Selected Subject: <strong><?php echo $subject['name']; ?></strong> <br/> Selected Mark Category: <strong><?php echo $difficult['name']; ?></strong> <br/>Selected Chapter: <strong><?php echo $chapter['name']; ?></strong> <!--<br/> Selected Topic: <?php //echo $topic['name'];  ?> <br/>--></h2>
                            <a class="home_link" href="home_subject">
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
                                        <h1 class="title is-6"><?php echo $topic['name']; ?></h1> 
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
                                    <img v-if="quiz.questions[questionIndex].direction == 'top'" v-bind:src="'../api/v1/'+quiz.questions[questionIndex].image_path" alt="image" class="qes-img" />
                                </div>
                                <h2 class="titleContainer title">{{questionIndex + 1}}. <span v-html="quiz.questions[questionIndex].text"></span></h2>
                                <div v-if="quiz.questions[questionIndex].show_image" class="text-center">
                                    <img v-if="quiz.questions[questionIndex].direction == 'bottom'" v-bind:src="'../api/v1/'+quiz.questions[questionIndex].image_path" alt="image" class="qes-img" />
                                </div>
                                <!-- quizOptions -->
                                <div class="optionContainer">
                                    <div class="option" v-for="(response, index) in quiz.questions[questionIndex].responses" @click="selectOption(index)" :class="{ 'is-selected': userResponses[questionIndex] == index}" :key="index" v-if="response.text != ''">
                                         {{ index | charIndex }}. <span v-html="response.text"></span>
                                    </div>
                                </div>
                                <!--quizFooter: navigation and progress-->
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
                                <!--/quizFooter-->
                            </div>
                            <!--/questionContainer-->
                            <!--quizCompletedResult-->
                            <div v-if="questionIndex >= quiz.questions.length" v-bind:key="questionIndex" class="quizCompleted has-text-centered">

                                <!-- quizCompletedIcon: Achievement Icon -->
                                <span class="icon">
                                    <i class="fa" :class="score()>3?'fa-check-circle-o is-active':'fa-times-circle'"></i>
                                </span>

                                <!--resultTitleBlock-->
                                <h2 class="complete-title">
                                    Thanks for Completing!
                                </h2>
                                <p class="subtitle">
                                    Total Score: <span class="score-clr">{{ score() }}</span> / {{ quiz.questions.length }}
                                </p>
                                <div class="">
                                    <a class="btn btn-theme btn-rounded" @click="restart()">Restart <i class="fa fa-refresh"></i></a>
                                    <a class="btn btn-theme btn-rounded" onclick="window.location = 'home_subject'">Home <i class="fa fa-refresh"></i></a>
                                    <a class="btn btn-theme btn-rounded" onclick="window.location = 'student_result'">Full Result <i class="fa fa-refresh"></i></a>
                                    <!--/resultTitleBlock-->

                                </div>
                            </div>
                            <!--/quizCompetedResult-->
                            <!-- 		</transition> -->
                        </div>
                        <!-- question Box -->
                    </div>
                </div>
            </section>
        </div>
        <!--/container-->
        <?php include 'footer.php'; ?>
        <?php include 'script.php'; ?>
        <script>
            var quiz = {
                user: "Feringo",
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
                        this.questionIndex = 0;
                        this.userResponses = Array(this.quiz.questions.length).fill(null);
                    },
                    selectOption: function (index) {
                        setTimeout(() => {
                            Vue.set(this.userResponses, this.questionIndex, index);
                            if (this.questionIndex < this.quiz.questions.length) {
                                this.questionIndex++;
                            }
                        }, 1000);
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
