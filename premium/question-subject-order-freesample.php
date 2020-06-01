<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
$languages = $obj->selectAll('*', 'language', 'status = 1');
/*
if (!isset($_GET['lan'])) {
    header('Location: select_language');
}
 * */


/*
if (isset($_SESSION['testmode'])) {
    $testmode = $_SESSION['testmode'];
}
*/

/*
$language = $obj->selectRow('*', 'language', 'name = \'' . $_GET['lan'] . '\'');
$_SESSION['student_selected_language_id'] = $language['language_id'];
* */
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
                                        <td valign="top">Free Sample</td>
                                        <td valign="top" class="w-5">:</td>
                                        <th valign="top">Language</th>
                                    </tr>
                                </table>
                            </h4>
                            <a class="home_link" href="select_language">
                                <i class="icon-home"></i>
                            </a>
                        </div>
                        <div class="modal-body">
                            
                            <?php foreach ($languages as $val) { ?>
                            <div class="language_section">
                                <h6 class="sub-title"><?php echo $val['name']; ?></h6>
                                <ul>
                                    <li>
                                        <i class="icon-double-angle-right"></i>
                                        <a href="qorder-years-freesample?lan=<?php echo $val['name']; ?>">Year Order</a>                             
                                    </li>         
                                    <?php // if($testmode!=0) { //subject order in learning mode   ?>
                                    <li>
                                        <i class="icon-double-angle-right"></i>
                                        <a href="subject_freesample?lan=<?php echo $val['name']; ?>">Subject Order</a>
                                    </li>
                                    <?php // } ?>
                                </ul>
                            </div>
                            <?php } ?>
                            
                            
                           
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include 'footer.php'; ?>
        <?php include 'script.php'; ?>
    </body>

</html>