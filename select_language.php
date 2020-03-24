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
                    <div class="language-main-title">
                        <h4>Group-I Exams</h4>
                    </div>
                    <div class="language-width">
                        <div class="row">
                            <?php foreach ($languages as $val) { ?>
                                <div class="span3">
                                    <div class="language-box">
                                        <div class="language-img-zoom">
                                            <div class="language-img" style="background: url(<?php echo BASE_URL . $val['imageurl']; ?>)no-repeat;"></div>
                                        </div>
                                        <div class="language-title">
                                            <h3>
                                                <a href="question-subject-order?lan=<?php echo $val['name']; ?>"><?php echo $val['name']; ?></a>
                                            </h3>
                                        </div>
                                        <div class="language-description">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                                            <a class="btn btn-theme margintop10 difficult-button" onClick="selmode('<?php echo $val['name']; ?>');"  data-lang="<?php echo $val['name']; ?>">START QUIZ</a>
                                        </div>
                                    </div>
                                </div>
                            <?php 
                            /*
                             * <div class="language-box" onclick="window.location = 'question-subject-order?lan=<?php echo $val['name']; ?>'">
                            onclick="window.location = 'question-subject-order?lan=<?php echo $val['name']; ?>'"                             
                             */
                            } ?>
                        </div>
                    </div>
                </div>
            </section>
            <div id="popup1" class="overlay">
                <div class="popup">
                    <h2>Select Type</h2>
                    <a class="close" href="#">&times;</a>
                    <div class="content">
                        <ul class="radio-btn-section">
                            <li>
                                <input type="radio" name="method" value="learn"> Learning Mode                           
                            </li>
                            <li>
                                <input type="radio" name="method" value="test"> Practice Test
                            </li>
                        </ul>
                        <button class="btn btn-custom1" data-lang="" id='tets'>Let's Go</button>
                    </div>
                </div>
            </div>    
            <?php include 'footer.php'; ?>
            <!-- end reset modal -->
        </div>
        <?php include 'script.php'; ?>
    </body>
</html>
