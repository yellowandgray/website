<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
if (isset($_SESSION['student_register_id'])) {
    $login_student = $obj->selectRow('*', 'student_register', 'student_register_id=' . $_SESSION['student_register_id']);
    $student_logs = $obj->selectAll('*', 'student_log', 'student_register_id = ' . $_SESSION['student_register_id'] . ' ORDER BY student_log_id DESC');
    if (count($student_logs) > 0) {
        foreach ($student_logs as $key => $log) {
            $detail = $obj->selectRow('COUNT(student_log_detail_id) AS attended, IFNULL((SELECT COUNT(student_log_detail_id) FROM student_log_detail WHERE student_log_id=' . $log['student_log_id'] . ' AND UPPER(answer) = UPPER(student_answer)), 0) AS correct_answers', 'student_log_detail', 'student_log_id=' . $log['student_log_id']);
            $student_logs[$key]['attended'] = $detail['attended'];
            $student_logs[$key]['correct_answers'] = $detail['correct_answers'];
        }
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
                        <div class = 'span4'>
                            <div class = 'result_user_section'>
                                <?php if (isset($login_student['profile_image']) && $login_student['profile_image'] == '') {
                                    ?>
                                    <div class = 'user_profile' style = 'background: url(<?php echo BASE_URL . $login_student['gender']; ?>.jpg)no-repeat;background-position: center;background-size: cover'></div>
                                <?php } else {
                                    ?>
                                    <div class = 'user_profile' style = 'background: url(<?php echo BASE_URL . $login_student['profile_image']; ?>)no-repeat;background-position: center;background-size: cover'></div>
                                <?php }
                                ?>
                            </div>
                            <div class = 'user_details'>
                                <h2><?php echo $login_student['student_name'];
                                ?></h2>
                                <h4><?php echo $login_student['parent_name'];
                                ?> <span><?php echo $login_student['mobile'] ?></span></h4>
                                <h5><?php echo $login_student['school_name'];
                                ?> </h5>
                                <p><?php echo $login_student['city'];
                                ?> <?php echo $login_student['pin'];
                                ?> </p>
                            </div>
                        </div>
                        <!--                        <div class = 'span8'>
                                                    <div class="result-title">
                                                        <h4>My Completed Task</h4>
                                                        <a href="home_subject">
                                                            <i class="icon-home"></i>
                                                        </a>
                                                    </div>
                                                    <br/>
                                                    <div class = 'accordion' id = 'accordion2'>
                                                        <div class = 'accordion-group'>
                                                            <div class = 'accordion-heading'>
                                                                <a class = 'accordion-toggle active' data-toggle = 'collapse' data-parent = '#accordion2' href = '#collapseOne'><i class = 'icon-minus'></i> Report</a>
                                                            </div>
                                                            <div id = 'collapseOne' class = 'accordion-body collapse in'>
                                                                <div class = 'accordion-inner'>
                        <?php foreach ($student_logs as $row) { ?>
                                                                            <h2 class = 'titleContainer title'> <i class="font-icon-arrow-simple-right"></i> <?php echo $row['subject_name']; ?><i class="font-icon-arrow-simple-right"></i> <?php echo $row['chapter_name']; ?> <i class="font-icon-arrow-simple-right"></i><?php echo $row['topic_name']; ?><span>Date: <?php echo date('d/M/Y h:iA', strtotime($row['created_at'])); ?></span></h2>
                                                                            <table class = 'table table-striped result_table'>
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="text-center">Category</th>
                                                                                        <th class="text-center">Total</th>
                                                                                            <th class="text-center">Attand Questions</th>
                                                                                        <th class="text-center"><i class="icon-ok-sign"></i></th>
                                                                                        <th class="text-center"><i class="font-icon-remove-circle"></i></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td><?php echo $row['difficult_name'] ?> Marks</td>
                                                                                        <td><?php echo $row['total_questions'] ?></td>
                                                                                            <td><?php //echo $row['attended']           ?></td>
                                                                                        <td><?php echo $row['correct_answers'] ?></td>
                                                                                        <td><?php echo ($row['attended'] - $row['correct_answers']) ?></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                        <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>-->
                        <div class = 'span8'>
                            <div class="result-title">
                                <h4>My Completed Task</h4>
                                <a href="home_subject">
                                    <i class="icon-home"></i>
                                </a>
                            </div>
                            <br/>
                            <!-- start: Accordion -->
                            <div class="result_section">
                                <h6>Report</h6>
                                <?php foreach ($student_logs as $row) { ?>
                                    <h2 class = 'titleContainer title'> <i class="font-icon-arrow-simple-right"></i> <?php echo $row['subject_name']; ?><i class="font-icon-arrow-simple-right"></i> <?php echo $row['chapter_name']; ?> <i class="font-icon-arrow-simple-right"></i><?php echo $row['topic_name']; ?></h2>
                                    <span>Date: <?php echo date('d/M/Y h:iA', strtotime($row['created_at'])); ?></span>
                                    <table class = 'table table-striped result_table'>
                                        <thead>
                                            <tr>
                                                <th class="text-center">Category</th>
                                                <th class="text-center">Total</th>
    <!--                                                            <th class="text-center">Attand Questions</th>-->
                                                <th class="text-center"><i class="icon-ok-sign"></i></th>
                                                <th class="text-center"><i class="font-icon-remove-circle"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['difficult_name'] ?> Marks</td>
                                                <td><?php echo $row['total_questions'] ?></td>
    <!--                                                            <td><?php //echo $row['attended']           ?></td>-->
                                                <td><?php echo $row['correct_answers'] ?></td>
                                                <td><?php echo ($row['attended'] - $row['correct_answers']) ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <center><button id="result-view-btn" class="btn btn-brown">Get Result</button></center>
                                    <div id="result-view" class="full-result">
                                        <div class="question-title">
                                            <h6>1. Push or pull is called as ………………………………..</h6>
                                            <div class="result-option crt_clr">
                                                <div class="option">A. motion</div>
                                            </div>
                                            <div class="result-option">
                                                <div class="option">B. force</div>
                                            </div>
                                            <div class="result-option wrng_clr">
                                                <div class="option">C. momentum</div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <br/>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php include 'footer.php';
            ?>
        </div>
        <?php include 'script.php';
        ?>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#result-view-btn").click(function () {
                    $("#result-view").fadeToggle();
                });
            });
        </script>
    </body>
</html>