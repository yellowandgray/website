<?php
require_once 'api/include/common.php';
session_start();
$obj = new Common();
if (!isset($_GET['sub'])) {
    header('Location: home_subject');
}
$subject = $obj->selectRow('*', 'subject', 'name = \'' . $_GET['sub'] . '\'');
$difficults = $obj->selectAll('*', 'difficult', 'difficult_id > 0');
$_SESSION['selected_subject_id'] = $subject['subject_id'];
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
                    <div class="modal styled">
                        <div class="modal-header login-section">
                            <a href="home_subject"><i class="font-icon-arrow-simple-left"></i></a>
                            <h4 id="mySigninModalLabel">
                                <table class="table-title">
                                    <tr>
                                        <td valign="top">Selected Subject</td>
                                        <td valign="top" class="w-5">:</td>
                                        <th valign="top"><?php echo $subject['name']; ?></th>
                                    </tr>
                                </table>
                            </h4>
                            <a class="home_link" href="home_subject">
                                <i class="icon-home"></i>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="topic_option">
<!--                                <p class="m-b-0 f-s-18 clr-g">Select Mark Category</p>-->
                                <ul style="text-align: center;">
                                    <li>
                                        <a href="#">Coming Soon Page</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Reset Modal -->
            <?php include 'footer.php'; ?>
            //<?php //include 'reset_password.php';    ?>
            <!-- end reset modal -->
        </div>
        <?php include 'script.php'; ?>
    </body>
</html>
