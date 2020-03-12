<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
$languages = $obj->selectAll('*', 'language', 'status = 1');
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <div id="wrapper">
            <?php include 'menu.php'; ?>
            <section class="language-section">
                <div class="container">
                    <div class="language-width">
                        <div class="row">
                            <?php foreach ($languages as $val) { ?>
                                <div class="span3">
                                    <div class="language-box">
                                        <div class="language-img" style="background: url(<?php echo BASE_URL . $val['imageurl']; ?>)no-repeat;"></div>
                                        <div class="language-title">
                                            <h3>
                                                <a href="question-subject-order?lan=<?php echo $val['name']; ?>"><?php echo $val['name']; ?></a>
                                            </h3>
                                        </div>
                                        <div class="language-description">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                                            <button class="btn btn-theme margintop10" onclick="window.location = 'question-subject-order?lan=<?php echo $val['name']; ?>'">START QUIZ</button>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Reset Modal -->
            <?php include 'footer.php'; ?>
            <!-- end reset modal -->
        </div>
        <?php include 'script.php'; ?>
    </body>
</html>
