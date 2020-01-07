<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
if (isset($_SESSION['student_register_id'])) {
    $student = $obj->selectrow('*', 'student_register', 'student_register_id = ' . $_SESSION['student_register_id']);
}
$student_answer = $obj->selectAll('sa.*, s.name AS subject, t.name AS topic', 'student_answer AS sa LEFT JOIN subject AS s ON s.subject_id = sa.subject_id LEFT JOIN topic AS t ON t.topic_id = sa.topic_id', 'sa.question_id > 0');
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
                                    <div class = 'user_profile' style = 'background: url(<?php echo BASE_URL . $login_student['gender']; ?>.jpg)no-repeat;background-position: center;'></div>
                                <?php } else {
                                    ?>
                                    <div class = 'user_profile' style = 'background: url(<?php echo BASE_URL . $login_student['profile_image']; ?>)no-repeat;background-position: center;'></div>
                                <?php }
                                ?>
                            </div>
                            <div class = 'user_details'>
                                <h2><?php echo $student['student_name'];
                                ?></h2>
                                <h4><?php echo $student['parent_name'];
                                ?> <span><?php echo $student['mobile'] ?></span></h4>
                                <h5><?php echo $student['school_name'];
                                ?> </h5>
                                <p><?php echo $student['city'];
                                ?> <?php echo $student['pin'];
                                ?> </p>
                            </div>
                        </div>
                        <div class = 'span8'>
                            <h4>My Completed Task</h4>
                            <!-- start: Accordion -->
                            <?php foreach ($student_answer as $row) {
                                ?>
                                <div class = 'accordion' id = 'accordion2'>
                                    <div class = 'accordion-group'>
                                        <div class = 'accordion-heading'>
                                            <a class = 'accordion-toggle active' data-toggle = 'collapse' data-parent = '#accordion2' href = '#collapseOne>'><i class = 'icon-minus'></i> <?php echo $row['subject'];
                                ?></a>
                                        </div>
                                        <div id = 'collapseOne' class = 'accordion-body collapse in'>
                                            <div class = 'accordion-inner'>
                                                <!-- questionTitle -->
                                                <h2 class = 'titleContainer title'><?php echo $row['topic'];
                                ?> <span>Date: 10-01-2020</span></h2>
                                                <!-- quizOptions -->
                                                <table class = 'table table-striped'>
                                                    <thead>
                                                        <tr>
                                                            <th>Total Questions</th>
                                                            <th>Attend Questions</th>
                                                            <th><i class="icon-ok-sign"></i></th>
                                                            <th><i class="font-icon-remove-circle"></i></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Mark</td>
                                                            <td>Otto</td>
                                                            <td>@mdo</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Jacob</td>
                                                            <td>Thornton</td>
                                                            <td>@fat</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Larry</td>
                                                            <td>the Bird</td>
                                                            <td>@twitter</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                            ?>
                            <!--end: Accordion -->
                        </div>
                    </div>
                </div>
            </section>
            <?php include 'footer.php';
            ?>
        </div>
        <?php include 'script.php';
        ?>
    </body>
</html>