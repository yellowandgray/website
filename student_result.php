<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
if (isset($_SESSION['student_register_id'])) {
$student = $obj->selectrow('*', 'student_register', 'student_register_id = ' . $_SESSION["student_register_id"]);
}
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
                            <div class="accordion" id="accordion2">
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle active" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                            <i class="icon-minus"></i> Topic 1 </a>
                                    </div>
                                    <div id="collapseOne" class="accordion-body collapse in">
                                        <div class="accordion-inner">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Question No.
                                                        </th>
                                                        <th>
                                                            Attend Questions
                                                        </th>
                                                        <th>
                                                            Correct Question
                                                        </th>
                                                        <th>
                                                            Wrong Question
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            1
                                                        </td>
                                                        <td>
                                                            20
                                                        </td>
                                                        <td>
                                                            15
                                                        </td>
                                                        <td>
                                                            5
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            1
                                                        </td>
                                                        <td>
                                                            20
                                                        </td>
                                                        <td>
                                                            15
                                                        </td>
                                                        <td>
                                                            5
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            1
                                                        </td>
                                                        <td>
                                                            20
                                                        </td>
                                                        <td>
                                                            15
                                                        </td>
                                                        <td>
                                                            5
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                            <i class="icon-plus"></i> Topic 2 </a>
                                    </div>
                                    <div id="collapseTwo" class="accordion-body collapse">
                                        <div class="accordion-inner">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Question No.
                                                        </th>
                                                        <th>
                                                            Attend Questions
                                                        </th>
                                                        <th>
                                                            Correct Question
                                                        </th>
                                                        <th>
                                                            Wrong Question
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            1
                                                        </td>
                                                        <td>
                                                            20
                                                        </td>
                                                        <td>
                                                            15
                                                        </td>
                                                        <td>
                                                            5
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            1
                                                        </td>
                                                        <td>
                                                            20
                                                        </td>
                                                        <td>
                                                            15
                                                        </td>
                                                        <td>
                                                            5
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            1
                                                        </td>
                                                        <td>
                                                            20
                                                        </td>
                                                        <td>
                                                            15
                                                        </td>
                                                        <td>
                                                            5
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                                            <i class="icon-plus"></i> Topic 3 </a>
                                    </div>
                                    <div id="collapseThree" class="accordion-body collapse">
                                        <div class="accordion-inner">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Question No.
                                                        </th>
                                                        <th>
                                                            Attend Questions
                                                        </th>
                                                        <th>
                                                            Correct Question
                                                        </th>
                                                        <th>
                                                            Wrong Question
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            1
                                                        </td>
                                                        <td>
                                                            20
                                                        </td>
                                                        <td>
                                                            15
                                                        </td>
                                                        <td>
                                                            5
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            1
                                                        </td>
                                                        <td>
                                                            20
                                                        </td>
                                                        <td>
                                                            15
                                                        </td>
                                                        <td>
                                                            5
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            1
                                                        </td>
                                                        <td>
                                                            20
                                                        </td>
                                                        <td>
                                                            15
                                                        </td>
                                                        <td>
                                                            5
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
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