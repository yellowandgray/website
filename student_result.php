<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
if (isset($_SESSION['student_register_id'])) {
    $student = $obj->selectrow('*', 'student_register', 'student_register_id = ' . $_SESSION['student_register_id']);
    $student_answer = $obj->selectAll('sa.*, s.name AS subject, c.name AS chapter, t.name AS topic', 'student_answer AS sa LEFT JOIN subject AS s ON s.subject_id = sa.subject_id LEFT JOIN chapter AS c ON c.chapter_id = sa.chapter_id LEFT JOIN topic AS t ON t.topic_id = sa.topic_id', 'student_answer_id > 0');
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
                            <div class = 'accordion' id = 'accordion2'>
                                <div class = 'accordion-group'>
                                    <div class = 'accordion-heading'>
                                        <a class = 'accordion-toggle active' data-toggle = 'collapse' data-parent = '#accordion2' href = '#collapseOne'><i class = 'icon-minus'></i> Report</a>
                                    </div>
                                    <div id = 'collapseOne' class = 'accordion-body collapse in'>
                                        <div class = 'accordion-inner'>
                                            <?php foreach ($student_answer as $row) { ?>
                                                <h2 class = 'titleContainer title'> <i class="font-icon-arrow-simple-right"></i> <?php echo $row['subject']; ?><i class="font-icon-arrow-simple-right"></i> <?php echo $row['chapter']; ?> <i class="font-icon-arrow-simple-right"></i><?php echo $row['topic']; ?><span>Date: <?php echo $row['created_at']; ?></span></h2>
                                                <table class = 'table table-striped result_table'>
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Total Questions</th>
                                                            <th class="text-center">Attended</th>
                                                            <th class="text-center"><i class="icon-ok-sign"></i></th>
                                                            <th class="text-center"><i class="font-icon-remove-circle"></i></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>100</td>
                                                            <td>95</td>
                                                            <td>68</td>
                                                            <td>27</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!--                            <div class = 'accordion' id = 'accordion2'>
                                <div class = 'accordion-group'>
                                    <div class = 'accordion-heading'>
                                        <a class = 'accordion-toggle' data-toggle = 'collapse' data-parent = '#accordion2' href = '#collapseOne1'><i class = 'icon-minus'></i> Without Topic</a>
                                    </div>
                                    <div id = 'collapseOne1' class = 'accordion-body collapse in'>
                                        <div class = 'accordion-inner'>
                                            <h2 class = 'titleContainer title'> <i class="font-icon-arrow-simple-right"></i> Language - Year <span>Date: 10-01-2020</span></h2>
                                            <table class = 'table table-striped result_table'>
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Total Questions</th>
                                                        <th class="text-center">Attended</th>
                                                        <th class="text-center"><i class="icon-ok-sign"></i></th>
                                                        <th class="text-center"><i class="font-icon-remove-circle"></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>100</td>
                                                        <td>95</td>
                                                        <td>68</td>
                                                        <td>27</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
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