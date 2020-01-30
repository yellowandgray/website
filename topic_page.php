<?php
require_once 'api/include/common.php';
session_start();
$obj = new Common();
$topics = $obj->selectAll('*', 'topic', 'topic_id > 0');
$chapters = $obj->selectRow('*', 'chapter', 'chapter_id > 0');
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
                                <a href="select_chapter"><i class="font-icon-arrow-simple-left"></i></a>
                                <h2><?php echo $chapters['name']; ?> - Select Topic</h2>
                            </div>
                            <div class="topic_section_1">
                                <?php if (count($topics) > 0) { ?>
                                    <?php foreach ($topics as $row) { ?>
                                        <div class="topic_list_section">
                                            <div class="topic_list_position_left">
                                                <i class="icon-caret-right"></i>
                                                <a href="difficult_level"> 
                                                    <?php echo $row['name']; ?>
                                                </a>
                                            </div>
                                            <!--                                            <div class="topic_list_position_right">
                                            <?php if ($row['max_questions_answered'] == 0) { ?>
                                                                                                    <a href="quiz_page?topic=<?php echo $row['name']; ?>" class="btn btn-green">Start</a>
                                                <?php
                                            }
                                            if ($row['max_questions_answered'] == $row['max_questions']) {
                                                ?>
                                                                                                    <a href="#" class="btn btn-green">Completed</a>
                                                <?php
                                            }
                                            if ($row['max_questions_answered'] < $row['max_questions'] && $row['max_questions_answered'] != 0) {
                                                ?>
                                                                                                    <a href="#" class="btn btn-danger">Resume</a>
                                            <?php }
                                            ?>
                                                                                        </div>-->
                                        </div>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <p>Sorry no topics were found</p>
                                <?php } ?>
                                <?php if (count($topics) > 9) { ?>
                                    <div class="pagenation-width">
                                        <div class="bs-docs-example">
                                            <div class="pagination">
                                                <ul>
                                                    <li class="disabled"><a href="#">Prev</a></li>
                                                    <li class="active"><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div>&nbsp;</div>
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
