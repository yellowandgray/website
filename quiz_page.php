<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
if (!isset($_GET['topic']) || !isset($_SESSION['student_register_id'])) {
    header('Location: topic_page');
}
$student = $obj->selectRow('*', 'student_register', 'student_register_id = ' . $_SESSION['student_register_id']);
$topic = $obj->selectRow('t.topic_id, t.name, s.name AS subject, s.description', 'topic AS t LEFT JOIN subject AS s ON s.subject_id = t.subject_id', 't.name = \'' . $_GET['topic'] . '\' AND t.subject_id = ' . $_SESSION['student_selected_subject_id']);
if (count($topic) == 0) {
    header('Location: topic_page');
}
$_SESSION['student_selected_topic_id'] = $topic['topic_id'];
$questions = $obj->selectAll('name, a, b, c, d, UPPER(answer) AS answer', 'question', 'topic_id = ' . $topic['topic_id'] . ' LIMIT 2');
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
                    <div class="span4">
                        <div class="side_section">
                            <h2><?php echo $topic['subject']; ?> / <?php echo $topic['name']; ?></h2>
                            <p><?php echo $topic['description']; ?></p>
                        </div>
                    </div>
                    <!--question Box-->
                    <div class="span8">
                        <div class="questionBox" id="app">
                            <!--qusetionContainer-->
                            <div class="questionContainer" v-if="questionIndex<quiz.questions.length" v-bind:key="questionIndex">
                                <div class="question-header">
                                    <h1 class="title is-6">Quiz</h1>
                                    <!--progress-->
                                    <div class="progressContainer">
                                        <progress class="progress is-info is-small" :value="(questionIndex/quiz.questions.length)*100" max="100">{{(questionIndex/quiz.questions.length)*100}}%</progress>
                                        <p>{{(questionIndex/quiz.questions.length)*100}}% complete</p>
                                    </div>
                                    <!--/progress-->
                                </div>
                                <!-- questionTitle -->
                                <h2 class="titleContainer title">{{ quiz.questions[questionIndex].text }}</h2>
                                <!-- quizOptions -->
                                <div class="optionContainer">
                                    <div class="option" v-for="(response, index) in quiz.questions[questionIndex].responses" @click="selectOption(index)" :class="{ 'is-selected': userResponses[questionIndex] == index}" :key="index">
                                         {{ index | charIndex }}. {{ response.text }}
                                </div>
                            </div>
                            <!--quizFooter: navigation and progress-->
                            <footer class="questionFooter">

                                <!--pagination-->
                                <nav class="pagination" role="navigation" aria-label="pagination">

                                    <!-- back button -->
                                    <a class="button" v-on:click="prev();" :disabled="questionIndex < 1">
                                       Back
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
                        <br>
                        <a class="button1" @click="restart()">Restart <i class="fa fa-refresh"></i></a>
                        <!--/resultTitleBlock-->

                    </div>
                    <!--/quizCompetedResult-->
                    <!-- 		</transition> -->
                </div>
            </div>
            <!-- question Box -->
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
                console.log(index);
                Vue.set(this.userResponses, this.questionIndex, index);
                if (this.questionIndex < this.quiz.questions.length)
                    this.questionIndex++;
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