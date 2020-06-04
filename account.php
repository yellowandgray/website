<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
if (isset($_SESSION['student_register_id'])) {
    $login_student = $obj->selectRow('*', 'student_register', 'student_register_id = ' . $_SESSION["student_register_id"]);
}
?>
<html lang = 'en'>
    <?php include 'head.php';
    ?>
    <body>
        <div id = 'wrapper'>
            <?php include 'menu.php'; ?>
            <section class="section about-section gray-bg" id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="float-right text-right">
                                <a href="#" class="edit-btn">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center flex-row-reverse" style="margin-bottom: 0">
                        <div class="span6">
                            <div class="about-avatar">
                                <img src="<?php echo BASE_URL . $login_student['profile_image']; ?>" title="" alt="">
                            </div>
                        </div>
                        <div class="span6">
                            <div class="about-text go-to">
                                <h3 class="dark-color"><?php echo $login_student['student_name']; ?></h3>
                                <h6 class="theme-color lead">A Lead UX &amp; UI designer based in Canada</h6>
                                <p>I <mark>design and develop</mark> services for customers of all sizes, specializing in creating stylish, modern websites, web services and online stores. My passion is to design digital user experiences through the bold interface and meaningful interactions.</p>
                                <div class="row about-list" style="margin-bottom: 0">
                                    <div class="span3">
                                        <table class="member-about-filed">
                                            <tr>
                                                <th>Mobile</th>
                                                <th>:</th>
                                                <td><?php echo $login_student['mobile']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <th>:</th>
                                                <td><?php echo $login_student['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Gender</th>
                                                <th>:</th>
                                                <td><?php echo $login_student['gender']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Graduation</th>
                                                <th>:</th>
                                                <td><?php echo $login_student['graduation']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="span3">
                                        <table>
                                            <tr>
                                                <th>Street</th>
                                                <th>:</th>
                                                <td><?php echo $login_student['street']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>City</th>
                                                <th>:</th>
                                                <td><?php echo $login_student['city']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>District</th>
                                                <th>:</th>
                                                <td><?php echo $login_student['district']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Pin</th>
                                                <th>:</th>
                                                <td><?php echo $login_student['pin']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Near City</th>
                                                <th>:</th>
                                                <td><?php echo $login_student['nearcity']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="counter">
                        <div class="row" style="margin-bottom: 0">
                            <div class="span3">
                                <!--                                <div class="count-data text-center">
                                                                    <h6 class="count h2" data-to="500" data-speed="500">500</h6>
                                                                    <p class="m-0px font-w-600">Happy Clients</p>
                                                                </div>-->
                            </div>
                            <div class="span3">
                                <!--                                <div class="count-data text-center">
                                                                    <h6 class="count h2" data-to="150" data-speed="150">150</h6>
                                                                    <p class="m-0px font-w-600">Project Completed</p>
                                                                </div>-->
                            </div>
                            <div class="span2">
                                <div class="count-data text-center">
                                    <h6 class="count h2" data-to="80" data-speed="8">80</h6>
                                    <p class="m-0px font-w-600">Attend Quiz</p>
                                </div>
                            </div>
                            <div class="span2">
                                <div class="count-data text-center">
                                    <h6 class="count h2" data-to="50" data-speed="5">50</h6>
                                    <p class="m-0px font-w-600">Completed Quiz</p>
                                </div>
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