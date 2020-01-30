<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
if (!isset($_GET['lan'])) {
    header('Location: select_language');
}
$language = $obj->selectRow('*', 'language', 'name = \'' . $_GET['lan'] . '\'');
$_SESSION['student_selected_language_id'] = $language['language_id'];
?>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <div id="wrapper">
            <?php include 'menu.php'; ?>
            <section id="featured-1">
                <div id="mySignin" tabindex="-1" aria-labelledby="mySigninModalLabel" aria-hidden="true">
                    <div class="modal styled">
                        <div class="modal-header login-section">
                            <a href="select_language"><i class="font-icon-arrow-simple-left"></i></a>
                            <h4 id="mySigninModalLabel" class="text-center"><?php echo $language['name']; ?> <br/> <strong class="title-section">Select Types</strong></h4>
                        </div>
                        <div class="modal-body">
                            <div class="language_section">
                                <ul>
                                    <li>
                                        <i class="icon-double-angle-right"></i>
                                        <a href="qorder-years">Question Order</a>
                                    </li>
                                    <li>
                                        <i class="icon-double-angle-right"></i>
                                        <a href="subject">Subject Order</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include 'script.php'; ?>
    </body>

</html>