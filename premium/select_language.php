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
                                    <div class="language-box" onClick="selmode('<?php echo $val['name']; ?>');"  data-lang="<?php echo $val['name']; ?>">
                                        <div class="language-img-zoom">
                                            <div class="language-img" style="background: url(<?php echo BASE_URL . $val['imageurl']; ?>)no-repeat;"></div>
                                        </div>
                                        <div class="language-title">
                                            <h3>
                                                <a href="#" onClick="selmode('<?php echo $val['name']; ?>');"  data-lang="<?php echo $val['name']; ?>"><?php echo $val['name']; ?></a>
                                            </h3>
                                        </div>
                                        <div class="language-description">
                                            <p></p>
                                            <a class="btn btn-theme margintop10 difficult-button" onClick="selmode('<?php echo $val['name']; ?>');"  data-lang="<?php echo $val['name']; ?>">START QUIZ</a>
                                        </div>
                                    </div>
                                </div>
                            <?php 
                            
                            } ?>
                        </div>
                    </div>
                </div>
            </section>
            <div id="popup1" class="overlay">
                <div class="popup custom-title">
                    <h2>Select Type</h2>
                    <a class="close" href="#">&times;</a>
                    <div class="content">
                        <ul class="radio-btn-section">
                            <li>
                                <img src="img/learn.gif" style="width: 15%"><!--input type="radio"  name="method" value="learn"--><span class="testmodetxt" onClick="chooseTestmode(1);">Learning Mode</span>                          
                            </li>
                            <li>
                                <img src="img/test.gif" style="width: 15%"><!--input type="radio" name="method" value="test"--><span class="testmodetxt" onClick="chooseTestmode(0);">Practice Test</span>
                            </li>
                        </ul>
                        <div style="display:none;"><button class="btn btn-custom1" data-lang="" id='tets'>Let's Go</button></div>
                    </div>
                </div>
            </div>    
            <?php include 'footer.php'; ?>
            <!-- end reset modal -->
        </div>
        <?php include 'script.php'; ?>
    </body>
</html>
