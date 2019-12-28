<?php
require_once 'api/include/common.php';
$obj = new Common();
$topics = $obj->selectAll('*', 'topic', 'topic_id > 0');
$sub_topics = $obj->selectAll('*', 'sub_topic', 'sub_topic_id > 0');
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
                            <h2>Difficulty</h2>
                            <div class="box-dif">
                                <label class="dif-container">Easy
                                    <input type="radio" checked="checked" name="radio">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="dif-container">Normal
                                    <input type="radio" name="radio">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="dif-container">Hard
                                    <input type="radio" name="radio">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="dif-container">Very Hard
                                    <input type="radio" name="radio">
                                    <span class="checkmark"></span>
                                </label>
                                <div class="continue">
                                    <a href="topic_page.php" class="btn btn-theme btn-large e_pulse">Continue</a>
                                </div>
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