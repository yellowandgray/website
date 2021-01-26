<?php
require_once 'api/include/common.php';
session_start();
$obj = new Common();
if (!isset($_SESSION['selected_subject_id'])) {
    header('Location: home_course');
}
$subject = $obj->selectRow('*', 'subject', 'subject_id=' . $_SESSION['selected_subject_id']);
if (!isset($_GET['difficult']) && !isset($_GET['book'])) {
    header('Location: home_course');
}
if (isset($_GET['difficult'])) {
    $difficult = $obj->selectRow('*', 'difficult', 'name=\'' . $_GET['difficult'] . '\'');
    $_SESSION['selected_difficult_id'] = $difficult['difficult_id'];
    $_SESSION['selected_book_id'] = 0;
    $chapters = $obj->selectAll('*', 'chapter', 'subject_id = ' . $subject['subject_id'] . ' ORDER BY name ASC');
}
if (isset($_GET['book'])) {
    $book = $obj->selectRow('*', 'book', 'book_name=\'' . $_GET['book'] . '\' AND subject_id = ' . $_SESSION['selected_subject_id']);
    $_SESSION['selected_difficult_id'] = 0;
    $_SESSION['selected_book_id'] = $book['book_id'];
    $chapters = $obj->selectAll('*', 'chapter', 'book_id = ' . $book['book_id'] . ' ORDER BY name ASC');
}
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
                            <a href="difficult_level?sub=<?php echo $subject['name']; ?>"><i class="font-icon-arrow-simple-left"></i></a>
                            <h4 id="mySigninModalLabel">
                                <table class="table-title">
                                    <tr>
                                        <td valign="top">Selected Subject</td>
                                        <td valign="top" class="w-5">:</td>
                                        <th valign="top"><?php echo $subject['name']; ?></th>
                                    </tr>
                                    <?php if($_SESSION['selected_course_id'] == 1) { ?>
                                    <tr>
                                        <td valign="top">Selected Mark Category</td>
                                        <td valign="top">:</td>
                                        <th valign="top"><?php echo $difficult['name']; ?></th>
                                    </tr>  
                                    <?php } if($_SESSION['selected_course_id'] == 2) { ?>
                                    <tr>
                                        <td valign="top">Selected Book</td>
                                        <td valign="top">:</td>
                                        <th valign="top"><?php echo $book['book_name']; ?></th>
                                    </tr>  
                                    <?php } ?>
                                </table>
                            </h4>
                            <a class="home_link" href="home_subject">
                                <i class="icon-home"></i>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="language_section">
                                <?php if (count($chapters) > 0) { ?>
                                    <p class="m-b-0 f-s-18 clr-g">Select Chapter</p>
                                    <ul>
                                        <?php foreach ($chapters as $row) { ?>
                                            <li><i class="icon-double-angle-right"></i> 
                                                <a href="topic_page?chapter=<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>                                
                                <?php } else { ?>
                                    <div class="text-center no-count-page">
                                        <h6>No Chpter on This Subject</h6>
                                        <span onclick="window.location = 'home_subject'">Back to Home</span>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Reset Modal -->
            <?php include 'footer.php'; ?>
            <?php //include 'reset_password.php';  ?>
            <!-- end reset modal -->
        </div>
        <?php include 'script.php'; ?>
    </body>
</html>
