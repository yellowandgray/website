<?php 
require_once 'api/include/common.php';
$obj = new Common();
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
                                <h2>Tamil</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </div>
                        </div>
                        <div class="span8">
                            <div class="topic_section_1">
                                <h2>Topic Title</h2>
                                <?php foreach ($topics as $row) { ?>
                                    <ul class="topic-list">
                                        <li><i class="icon-angle-right"></i><a href="quiz_page"> <?php echo $row['name']; ?></a> <input type="checkbox" name=""></li>
                                    </ul>
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