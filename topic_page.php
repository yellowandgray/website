<?php
require_once 'api/include/common.php';
session_start();
$obj = new Common();
$back_page = '';
if (!isset($_GET['chapter'])) {
    $subject = $obj->selectRow('*', 'subject', 'subject_id = ' . $_SESSION['selected_subject_id']);
    header('Location: select_chapter?sub=' . $subject['name']);
}
$subject = $obj->selectRow('*', 'subject', 'subject_id = ' . $_SESSION['selected_subject_id']);
$chapter = $obj->selectRow('*', 'chapter', 'name = \'' . $obj->escapeString($_GET['chapter']) . '\' AND subject_id = ' . $_SESSION['selected_subject_id'] . ' AND book_id=' . $_SESSION['selected_book_id']);
$difficult = $obj->selectRow('*', 'difficult', 'difficult_id=' . $_SESSION['selected_difficult_id']);
$book = $obj->selectRow('*', 'book', 'book_id=' . $_SESSION['selected_book_id']);
$topics = $obj->selectAll('*', 'topic', 'chapter_id = ' . $chapter['chapter_id'] . ' ORDER BY name ASC ');
$_SESSION['selected_chapter_id'] = $chapter['chapter_id'];
if ($_SESSION['selected_course_id'] == 1) {
    $back_page = 'select_chapter?difficult=' . $difficult['name'];
}
if ($_SESSION['selected_course_id'] == 2) {
    $back_page = 'select_chapter?book=' . $book['book_name'];
}
?>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <div id="wrapper">
            <?php include 'menu.php'; ?>
            <section class="topic_section">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <div class="side_section topic-head">
                                <a href="<?php echo $back_page; ?>"><i class="font-icon-arrow-simple-left"></i></a>
                                <h2>
                                    <table class="table-title">
                                        <tr>
                                            <td valign="top">Selected Subject</td>
                                            <td valign="top" class="w-5">:</td>
                                            <th valign="top"><?php echo $subject['name']; ?></th>
                                        </tr>
                                        <?php if ($_SESSION['selected_course_id'] == 1) { ?>
                                            <tr>
                                                <td valign="top">Selected Mark Category</td>
                                                <td valign="top">:</td>
                                                <th valign="top"><?php echo $difficult['name']; ?></th>
                                            </tr>  
                                        <?php } if ($_SESSION['selected_course_id'] == 2) { ?>
                                            <tr>
                                                <td valign="top">Selected Book</td>
                                                <td valign="top">:</td>
                                                <th valign="top"><?php echo $book['book_name']; ?></th>
                                            </tr>  
                                        <?php } ?>
                                        <tr>
                                            <td valign="top">Selected Chapter</td>
                                            <td valign="top">:</td>
                                            <th valign="top"><?php echo $chapter['name']; ?></th>
                                        </tr>
                                    </table>
                                </h2>
                                <a class="home_link" href="home_subject">
                                    <i class="icon-home"></i>
                                </a>
                            </div>
                            <div class="topic_section_1">
                                <?php if (count($topics) > 0) { ?>
                                    <p class="m-b-0 f-s-18 clr-g">Select Topic</p>
                                    <?php foreach ($topics as $row) { ?>
                                        <div class="topic_list_section">
                                            <div class="topic_list_position_left">
                                                <i class="icon-caret-right"></i>
                                                <a href="quiz_page?topic=<?php echo $row['name']; ?>"> 
                                                    <?php echo $row['name']; ?>
                                                </a>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <div class="text-center no-count-page">
                                        <h6>No Topics on This Chapter</h6>
                                        <span onclick="window.location = 'home_subject'">Back to Home</span>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php include 'footer.php'; ?>
        </div>
        <?php include 'script.php'; ?>
    </body>
</html>
