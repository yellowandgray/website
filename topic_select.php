<?php
require_once 'api/include/common.php';
session_start();
$obj = new Common();
if (!isset($_GET['year']) || !isset($_SESSION['student_register_id'])) {
    header('Location: years');
}
$year = $obj->selectRow('*', 'year', 'year = \'' . $_GET['year'] . '\'');
if (count($year) == 0) {
    header('Location: years');
}
$_SESSION['student_selected_year_id'] = $year['year_id'];
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <div id="wrapper">
            <?php include 'menu.php';
            ?>
            <section id="featured-1">

                <div id="mySignin" tabindex="-1" aria-labelledby="mySigninModalLabel" aria-hidden="true">
                    <!--                    <div class = 'logo'>
                                            <a href='index'>
                                                <img src = 'img/logo.png' alt = '' class = 'logo' />
                                            </a>
                    
                                        </div>-->
                    <div class="modal styled">
                        <div class="modal-header login-section">
                            <a href="#" onclick="goBack()"><i class="font-icon-arrow-simple-left"></i></a>
                            <h4 id="mySigninModalLabel"  class="text-center"><?php echo $year['year']; ?> - <strong>Topic Type</strong></h4>
                        </div>
                        <div class="modal-body">
                            <div class="topic_option">
                                <ul>
                                    <i class="icon-angle-right"></i><a href="topic_page"><li> With Topics</li></a>
                                    <i class="icon-angle-right"></i><a href="quiz_page?topic=all"><li> Without Topic</li></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Reset Modal -->
            <?php include 'reset_password.php'; ?>
            <!-- end reset modal -->
        </div>
        <?php include 'script.php'; ?>
    </body>
</html>
