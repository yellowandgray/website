<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
if (isset($_SESSION['student_register_id'])) {
    $student = $obj->selectrow('*', 'student_register', 'student_register_id = ' . $_SESSION["student_register_id"]);
}
$student_answer = $obj->selectAll('sa.*, s.name AS subject, t.name AS topic, q.name AS question', 'student_answer AS sa LEFT JOIN subject AS s ON s.subject_id = sa.subject_id LEFT JOIN topic AS t ON t.topic_id = sa.topic_id LEFT JOIN question AS q ON q.question_id = sa.question_id', 'sa.question_id > 0');
?>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <div id="wrapper">
            <?php include 'menu.php'; ?>
            <section class="topic_section">
                <div class="container">
                    <div class="row">
                        <div class="span4">
                            <div class="result_user_section">
                                <div class="user_profile" style="background: url(img/avatar_1.png)no-repeat;background-position: center;"></div>
                            </div>
                            <div class="user_details">
                                <h2><?php echo $student['student_name']; ?></h2>
                                <h4><?php echo $student['parent_name']; ?> <span><?php echo $student['mobile'] ?></span></h4>
                                <h5><?php echo $student['school_name']; ?> </h5>
                                <p><?php echo $student['city']; ?> <?php echo $student['pin']; ?> </p>
                            </div>
                        </div>
                        <div class="span8">
                            <h4>My Completed Task</h4>
                            <!-- start: Accordion -->
                            <?php foreach ($student_answer as $row) { ?>
                                <div class="accordion" id="accordion2">
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle active" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne>"><i class="icon-minus"></i> <?php echo $row['subject']; ?> - <?php echo $row['topic']; ?>  <span>Attend Questions: 25/30</span></a>
                                        </div>
                                        <div id="collapseOne" class="accordion-body collapse in">
                                            <div class="accordion-inner">
                                                <!-- questionTitle -->
                                                <h2 class="titleContainer title"> <?php echo $row['question']; ?></h2>
                                                <!-- quizOptions -->
                                                <div class="optionContainer">
                                                    <div class="option">You Choose: <?php echo $row['answer_option']; ?></div>
                                                    <div class="option">Correct Answer: <?php echo $row['actual_answer_option']; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <!--end: Accordion -->
                        </div>
                    </div>
                </div>
            </section>
            <?php include 'footer.php'; ?>
        </div>
        <?php include 'script.php'; ?>
    </body>
</html>