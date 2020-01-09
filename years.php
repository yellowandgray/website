<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
if (isset($_SESSION['student_register_id'])) {
    $year = $obj->selectAll('*', 'year', 'year_id = ' . $_SESSION['student_register_id']);
}
?>
<!DOCTYPE html>
<html lang = 'en'>
    <?php include 'head.php';
    ?>
    <body>
        <div id = 'wrapper'>
            <?php include 'menu.php';
            ?>
            <section id = 'featured-1'>

                <div id = 'mySignin' tabindex = '-1' aria-labelledby = 'mySigninModalLabel' aria-hidden = 'true'>
                    <div class = 'logo'>
                        <a href = 'index'>
                            <img src = 'img/logo.png' alt = '' class = 'logo' />
                        </a>

                    </div>
                    <div class = 'modal styled'>
                        <div class = 'modal-header login-section'>
                            <a href = 'index'><i class = 'font-icon-arrow-simple-left'></i></a>
                            <h4 id = 'mySigninModalLabel'  class = 'text-center'>Choose <strong>Year</strong></h4>
                        </div>
                        <div class = 'modal-body'>
                            <div class = 'language_section'>
                                <ul>
                                    <?php foreach ($year as $row) { ?>
                                        <i class = 'icon-angle-right'></i><a href = 'topic_select'><li> <?php echo $row['year']; ?></li></a>
                                            <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Reset Modal -->
            <?php include 'reset_password.php';
            ?>
            <!-- end reset modal -->
        </div>
        <?php include 'script.php';
        ?>
    </body>
</html>
