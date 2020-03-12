<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
if (!isset($_SESSION['student_selected_language_id'])) {
    header('Location: select_language');
}
$language = $obj->selectRow('*', 'language', 'language_id=' . $_SESSION['student_selected_language_id']);
$_SESSION['student_selected_type'] = 'order';
$years = $obj->selectAll('*', 'year', 'status = 1');
?>
<!DOCTYPE html>
<html lang='en'>
    <?php include 'head.php';
    ?>

    <body>
        <div id='wrapper'>
            <?php include 'menu.php';
            ?>
            <section id='featured-1'>
                <div id='mySignin' tabindex='-1' aria-labelledby='mySigninModalLabel' aria-hidden='true'>
                    <div class='modal styled'>
                        <div class='modal-header login-section'>
                            <a href='question-subject-order'><i class='font-icon-arrow-simple-left'></i></a>
                            <h4 id='mySigninModalLabel' class='text-center'>
                                <table class="table-title">
                                    <tr>
                                        <td valign="top">Selected Language</td>
                                        <td valign="top" class="w-5">:</td>
                                        <th valign="top"><?php echo $language['name']; ?></th>
                                    </tr>
                                    <tr>
                                        <td valign="top">Selected Order</td>
                                        <td valign="top" class="w-5">:</td>
                                        <th valign="top">Question Order</th>
                                    </tr>
                                </table>
                            </h4>
                            <a class="home_link" href="select_language">
                                <i class="icon-home"></i>
                            </a>
                        </div>
                        <div class='modal-body'>
                            <div class='year_select_section'>
                                <h6 class="sub-title">Select Year</h6>
                                <ul class="list-none">
                                    <?php foreach ($years as $row) { ?>
                                        <li>
                                            <i class="icon-double-angle-right"></i> <a href="quiz_page?year=<?php echo $row['year']; ?>"><?php echo $row['year']; ?></a>
                                        </li>
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