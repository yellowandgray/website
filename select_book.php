<?php
require_once 'api/include/common.php';
session_start();
$obj = new Common();
if (!isset($_GET['sub'])) {
    header('Location: home_subject');
}
$course = $obj->selectRow('*', 'course', 'course_id = \'' . $_SESSION['selected_course_id'] . '\'');
$subject = $obj->selectRow('*', 'subject', 'name = \'' . $_GET['sub'] . '\'');
$books = $obj->selectAll('*', 'book', 'book_id > 0 AND subject_id = ' . $subject['subject_id']);
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
                            <a href="home_subject?course=<?php echo $course['name']; ?>"><i class="font-icon-arrow-simple-left"></i></a>
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
                                <p class="m-b-0 f-s-18 clr-g">Select Book</p>
                                <ul>
                                    <?php foreach ($books as $row) { ?>
                                        <li style="height:190px">
                                            <i class="icon-angle-right fl-left"></i> 
                                            <img src="<?php echo BASE_URL . $row['image_path']; ?>" class="book-image" />
                                            <?php echo $row['book_name']; ?><br/>
                                            <span class="author-name">(<?php echo $row['book_author']; ?>)</span><br/>
                                            <span style="color:#1b75bc">Chapter Notes</span><br/>
                                            <a href="select_chapter?book=<?php echo $row['book_name']; ?>" style="color:#1b75bc">MCQA</a>
                                        </li>
                                    <?php } ?>
                                        <li class="text-center">
                                        <a href="select_chapter?book=all_books" class="btn btn-primary">Select All Books MCQA</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Reset Modal -->
            <?php include 'footer.php'; ?>
            //<?php //include 'reset_password.php';          ?>
            <!-- end reset modal -->
        </div>
        <?php include 'script.php'; ?>
    </body>
</html>
