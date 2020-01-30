<?php
require_once 'api/include/common.php';
session_start();
$obj = new Common();
$chapters = $obj->selectAll('*', 'chapter', 'chapter_id > 0');
$subjects = $obj->selectRow('*', 'subject', 'subject_id > 0');
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <div id="wrapper">
            <?php include 'menu.php'; ?>
            <section id="featured-1">
                <div id="mySignin" tabindex="-1" aria-labelledby="mySigninModalLabel" aria-hidden="true">
                    <div class="modal styled">
                        <div class="modal-header login-section">
                            <a href="home_subject"><i class="font-icon-arrow-simple-left"></i></a>
                            <h4 id="mySigninModalLabel"  class="text-center"><?php echo $subjects['name']; ?> - Select <strong>Chapter</strong></h4>
                        </div>
                        <div class="modal-body">
                            <div class="language_section">
                                <ul>
                                    <?php foreach ($chapters as $row) { ?>
                                       <li><i class="icon-double-angle-right"></i> 
                                            <a href="topic_page"><?php echo $row['name'];  ?></a>
                                        </li>
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
