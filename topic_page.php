<?php
require_once 'api/include/common.php';
session_start();
$obj = new Common();
if (!isset($_SESSION['student_selected_language_id']) || !isset($_SESSION['student_selected_year_id']) || !isset($_SESSION['student_register_id'])) {
    header('Location: years');
}
$topics = $obj->selectAll('t.*, IFNULL(MAX(q.question_id), 0) AS max_questions, IFNULL(MAX(sa.question_id), 0) AS max_questions_answered', 'topic AS t LEFT JOIN question AS q ON q.topic_id = t.topic_id LEFT JOIN student_answer AS sa ON sa.topic_id = t.topic_id AND sa.student_register_id = ' . $_SESSION['student_register_id'], 't.year_id = ' . $_SESSION['student_selected_year_id'] . ' AND t.language_id = ' . $_SESSION['student_selected_language_id'] . ' GROUP BY t.topic_id');
?>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <div id="wrapper">
            <?php include 'menu.php'; ?>
            <section class="topic_section">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <div class="side_section">
                                <h2>Topics</h2>
                            </div>
                            <div class="topic_section_1">
                                <?php if (count($topics) > 0) { ?>
                                    <?php foreach ($topics as $row) { ?>
                                        <div class="topic_list_section">
                                            <div class="topic_list_position_left">
                                                <i class="icon-caret-right"></i>
                                                <a href="quiz_page?topic=<?php echo $row['name']; ?>"> 
                                                    <?php echo $row['name']; ?>
                                                </a>
                                            </div>
                                            <div class="topic_list_position_right">
                                                <?php if ($row['max_questions_answered'] == 0) { ?>
                                                    <a href="quiz_page?topic=<?php echo $row['name']; ?>" class="btn btn-green">Start</a>
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
