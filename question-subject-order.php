<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
if (!isset($_GET['lan'])) {
    header('Location: select_language');
}

if (isset($_SESSION['testmode'])) {
    $testmode = $_SESSION['testmode'];
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
                            <h4 id="mySigninModalLabel" class="text-center">
                                <table class="table-title">
                                    <tr>
                                        <td valign="top">Selected Language</td>
                                        <td valign="top" class="w-5">:</td>
                                        <th valign="top"><?php echo $language['name']; ?></th>
                                    </tr>
                                </table>
                            </h4>
                            <a class="home_link" href="select_language">
                                <i class="icon-home"></i>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="language_section">
                                <h6 class="sub-title">Select Types</h6>
                                <ul>
                                    <li>
                                        <i class="icon-double-angle-right"></i>
                                        <a href="qorder-years">Question Order</a>
                                    </li>         
                                    <?php if($testmode!=0) { //subject order in learning mode  ?>
                                    <li>
                                        <i class="icon-double-angle-right"></i>
                                        <a href="subject">Subject Order</a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include 'footer.php'; ?>
        <?php include 'script.php'; ?>
    </body>

</html>