<?php
require_once 'api/include/common.php';
session_start();
$obj = new Common();
//if (!isset($_GET['chapter'])) {
//    $subject = $obj->selectRow('*', 'subject', 'subject_id = ' . $_SESSION['selected_subject_id']);
//    header('Location: select_chapter?sub=' . $subject['name']);
//}
if (!isset($_SESSION['selected_subject_id'])) {
    header('Location: home_subject');
}
$subject = $obj->selectRow('*', 'subject', 'subject_id=' . $_SESSION['selected_subject_id']);
$chapter = $obj->selectRow('*', 'chapter', 'name = \'' . $obj->escapeString($_GET['chapter']) . '\'');
$topics = $obj->selectAll('*', 'topic', 'chapter_id = ' . $chapter['chapter_id'] . ' ORDER BY name ASC ');
$_SESSION['selected_chapter_id'] = $chapter['chapter_id'];

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
                                <a href="neet_chapter?sub=<?php echo $subject['name']; ?>"><i class="font-icon-arrow-simple-left"></i></a>
                                <h2>
                                    <table class="table-title">
                                        <tr>
                                            <td valign="top">Selected Subject</td>
                                            <td valign="top" class="w-5">:</td>
                                            <th valign="top"><?php echo $subject['name']; ?></th>
                                        </tr>
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
                                                <a href="neet_sub_topic?topic=<?php echo $row['name']; ?>"> 
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
