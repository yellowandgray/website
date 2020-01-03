<?php
require_once 'api/include/common.php';
session_start();
$obj = new Common();
if (!isset($_GET['subject']) || !isset($_SESSION['student_register_id'])) {
    header('Location: home_subject');
}
$subject = $obj->selectRow('*', 'subject', 'name = \'' . $_GET['subject'] . '\'');
if (count($subject) == 0) {
    header('Location: home_subject');
}
$_SESSION['student_selected_subject_id'] = $subject['subject_id'];
$topics = $obj->selectAll('t.*, IFNULL(MAX(q.question_id), 0) AS max_questions, IFNULL(MAX(sa.question_id), 0) AS max_questions_answered', 'topic AS t LEFT JOIN question AS q ON q.subject_id = t.subject_id AND q.topic_id = t.topic_id LEFT JOIN student_answer AS sa ON sa.subject_id = q.subject_id AND sa.topic_id = q.topic_id AND sa.student_register_id = ' . $_SESSION['student_register_id'], 't.subject_id = ' . $subject['subject_id']);
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
                            <div class="side_section">
                                <h2><?php echo $subject['name']; ?></h2>
                                <p><?php echo $subject['description']; ?></p>
                            </div>
                        </div>
                        <div class="span8">
                            <div class="topic_section_1">
                                <?php if (count($topics) > 0) { ?>
                                    <h2>Topic Title</h2>
                                    <?php foreach ($topics as $row) { ?>
                                        <div class="topic_list_section">
                                            <div class="topic_list_position_left">
                                                <i class="icon-caret-right"></i><a href="quiz_page?topic=<?php $row['name']; ?>"> <?php echo $row['name']; ?></a>
                                            </div>
                                            <div class="topic_list_position_right">
                                                <?php if ($row['max_questions_answered'] == 0) { ?>
                                                    <a href="#" class="btn btn-green">Start</a>
                                                    <?php
                                                }
                                                if ($row['max_questions_answered'] == $row['max_questions']) {
                                                    ?>
                                                    <a href="#" class="btn btn-green">Completed</a>
                                                    <?php
                                                }
                                                if ($row['max_questions_answered'] < $row['max_questions'] && $row['max_questions_answered'] != 0) {
                                                    ?>
                                                    <a href="#" class="btn btn-danger">Resume</a>
                                                <?php }
                                                ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <p>Sorry no topics were found</p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php include 'footer.php'; ?>
        </div>
        <?php include 'script.php'; ?>
    </body>
</html>
