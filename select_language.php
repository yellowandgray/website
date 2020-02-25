<?php
require_once 'api/include/common.php';
session_start();
$obj = new Common();
$languages = $obj->selectAll('*', 'language', 'status = 1');
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
                            <a href="index"><i class="font-icon-arrow-simple-left"></i></a>
                            <h4 id="mySigninModalLabel"  class="text-center">
                                <table class="table-title">
                                    <tr>
                                        <td valign="top">Select</td>
                                        <td valign="top" class="w-5">:</td>
                                        <th valign="top">Language</th>
                                    </tr>
                                </table>
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div class="language_section">
                                <ul>
                                    <?php foreach ($languages as $val) { ?>
                                       <li><i class="icon-double-angle-right"></i> 
                                            <a href="question-subject-order?lan=<?php echo $val['name'];  ?>"><?php echo $val['name'];  ?></a>
                                        </li>
                                    <?php } ?>
                                    <!-- <li>
                                        <i class="icon-check"></i> 
                                        <a href="question-subject-order">தமிழ் </a>
                                    </li>
                                    <li>
                                        <i class="icon-check"></i> 
                                        <a href="question-subject-order">English</a>
                                    </li> -->
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
