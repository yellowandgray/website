<?php
require_once 'api/include/common.php';
session_start();
$obj = new Common();
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
                                    <i class="icon-angle-right"></i><a href="select_chapter"><li> 40 Mark's</li></a>
                                    <i class="icon-angle-right"></i><a href="select_chapter"><li> 60 Mark's</li></a>
                                    <i class="icon-angle-right"></i><a href="select_chapter"><li> 80 Mark's</li></a>
                                    <i class="icon-angle-right"></i><a href="select_chapter"><li> 100 Mark's</li></a>
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
