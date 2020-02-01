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
                            <h4 id="mySigninModalLabel"  class="text-center">Select <strong>Question Level</strong></h4>
                        </div>
                        <div class="modal-body">
                            <div class="topic_option">
                                <ul>
                                    <?php foreach ($difficults as $row) { ?>
                                        <li><a href="select_chapter?difficult=<?php echo $row['name']; ?>"><i class="icon-angle-right"></i> <?php echo $row['name']; ?></a></li>
                                        <?php } ?>
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
