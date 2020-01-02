<?php
require_once 'api/include/common.php';
$obj = new Common();
$subjects = $obj->selectRow('*', 'subject', 'subject_id > 0');
$topics = $obj->selectAll('*', 'topic', 'topic_id > 0');
?>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <div id="wrapper">
            <?php include 'menu.php'; ?>
            <section class="topic_section">
                <div class="container">
                    <div class="row">
                        <div class="span4">
                            <div class="side_section">
                                <h2><?php echo $subjects['name']; ?></h2>
                                <p><?php echo $subjects['description']; ?></p>
                            </div>
                        </div>
                        <div class="span8">
                            <div class="topic_section_1">
                                <h2>Topic Title</h2>
                                <?php foreach ($topics as $row) { ?>
                                    <div class="topic_list_section">
                                        <div class="topic_list_position_left">
                                            <i class="icon-caret-right"></i><a href="quiz_page"> <?php echo $row['name']; ?></a>
                                        </div>
                                        <div class="topic_list_position_right">
                                            <a href="#" class="btn btn-green">Restart</a> 
                                            <a href="#" class="btn btn-danger">Resume</a>
                                        </div>
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