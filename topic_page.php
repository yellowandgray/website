<?php
require_once 'api/include/common.php';
session_start();
$obj = new Common();
if (!isset($_GET['chapter'])) {
    $subject = $obj->selectRow('*', 'subject', 'subject_id = ' . $_SESSION['selected_subject_id']);
    header('Location: select_chapter?sub=' . $subject['name']);
}
$subject = $obj->selectRow('*', 'subject', 'subject_id > 0');
$chapter = $obj->selectRow('*', 'chapter', 'name = \'' . $obj->escapeString($_GET['chapter']) . '\'');
$difficult = $obj->selectRow('*', 'difficult', 'difficult_id=' . $_SESSION['selected_difficult_id']);
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
                                <a href="select_chapter?difficult=<?php echo $difficult['name']; ?>"><i class="font-icon-arrow-simple-left"></i></a>
                                                                                                                                                                                                        <h2>Selected Subject: <strong><?php echo $subject['name']; ?></strong> <br/> Selected Mark Category: <strong><?php echo $difficult['name']; ?></strong> <br/>Selected Chapter: <strong><?php echo $chapter['name']; ?></strong> <!--<br/> Select <strong>Topic</strong>--></h2>
                                <a class="home_link" href="home_subject">
                                    <i class="icon-home"></i>
                                </a>
                            </div>
                            <div class="topic_section_1">
                                <p class="m-b-0">Select Topic</p>
                                <?php if (count($topics) > 0) { ?>
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
                                }
                                ?>
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
