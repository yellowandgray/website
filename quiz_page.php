<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
if (!isset($_GET['topic']) || !isset($_SESSION['student_register_id'])) {
    header('Location: topic_select');
}
$student = $obj->selectRow('*', 'student_register', 'student_register_id = ' . $_SESSION['student_register_id']);
if ($_GET['topic'] != 'all') {
    $topic = $obj->selectRow('*', 'topic', 'name = \'' . $_GET['topic'] . '\' AND year_id = ' . $_SESSION['student_selected_year_id'] . ' AND language_id = ' . $_SESSION['student_selected_language_id']);
    if (count($topic) == 0) {
        header('Location: topic_select');
    }
    $_SESSION['student_selected_topic_id'] = $topic['topic_id'];
} else {
    $_SESSION['student_selected_topic_id'] = 0;
}
if ($_SESSION['student_selected_topic_id'] != 0) {
    $questions = $obj->selectAll('name, a, b, c, d, UPPER(answer) AS answer', 'question', 'topic_id = ' . $topic['topic_id']);
} else {
    $questions = $obj->selectAll('name, a, b, c, d, UPPER(answer) AS answer', 'question', 'topic_id IN (SELECT topic_id FROM topic WHERE year_id = ' . $_SESSION['student_selected_year_id'] . ' AND language_id = ' . $_SESSION['student_selected_language_id'] . ')');
}
$language = $obj->selectRow('*', 'language', 'language_id = ' . $_SESSION['student_selected_language_id']);
$year = $obj->selectRow('*', 'year', 'year_id = ' . $_SESSION['student_selected_year_id']);
$questions_list = array();
if (count($questions) > 0) {
    foreach ($questions as $q) {
        $options = array();
        array_push($options, array('text' => $q['a'], 'correct' => ($q['answer'] == 'A' ? true : false)));
        array_push($options, array('text' => $q['b'], 'correct' => ($q['answer'] == 'B' ? true : false)));
        if (isset($q['c'])) {
            array_push($options, array('text' => $q['c'], 'correct' => ($q['answer'] == 'C' ? true : false)));
        }
        if (isset($q['d'])) {
            array_push($options, array('text' => $q['d'], 'correct' => ($q['answer'] == 'D' ? true : false)));
        }
        array_push($questions_list, array(
            'text' => $q['name'],
            'responses' => $options
        ));
    }
}
global $topic;
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
                            <h2><?php echo $language['name']; ?> - <?php echo $year['year']; ?> <strong>
                                    <?php
                                    $topics = $topic['name'];
                                    if (is_null($topics)) {
                                        echo '';
                                    } else {
                                        echo '-' . $topics;
                                    }
                                    ?>
                                </strong></h2>
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
                                <h2 class="titleContainer title">{{ quiz.questions[questionIndex].text }}</h2>
                                <!-- quizOptions -->
                                <div class="optionContainer">
                                    <div id="two" class="option" v-for="(response, index) in quiz.questions[questionIndex].responses" @click="selectOption(index)" :class="{ 'is-selected': userResponses[questionIndex] == index}" :key="index">
                                         {{ index | charIndex }}. {{ response.text }}
                                </div>
                            </div>
                            <!--quizFooter: navigation and progress-->
                            <footer class="questionFooter">

                                <!--pagination-->
                                <nav class="pagination" role="navigation" aria-label="pagination">

                                    <!-- back button -->
                                    <!--                                    <a class="button" v-on:click="prev();" :disabled="questionIndex < 1">
                                                                           Back
                                                                    </a>-->
                                    <a class="btn btn-green" href="select_language">
                                        Home
                                    </a>

                                    <!-- next button -->
                                    <a class="button" :class="(userResponses[questionIndex]==null)?'':'is-active'" v-on:click="next();" :disabled="questionIndex>=quiz.questions.length">
                                        {{ (userResponses[questionIndex]==null)?'Skip':'Next' }}
                                    </a>

                                </nav>
                                <!--/pagination-->

                            </footer>
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
                            <h2 class="title">
                                You did {{ (score()>7?'an amazing':(score()<4?'a poor':'a good')) }} job!
                            </h2>
                            <p class="subtitle">
                                Total score: {{ score() }} / {{ quiz.questions.length }}
                            </p>
                            <div class="">
                                <a class="btn btn-theme btn-rounded" @click="restart()">Restart <i class="fa fa-refresh"></i></a>
                                <a class="btn btn-theme btn-rounded" onclick="window.location = 'select_language'">Home <i class="fa fa-refresh"></i></a>
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