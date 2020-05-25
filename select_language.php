<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
$languages = $obj->selectAll('*', 'language', 'status = 1');

$student = $obj->selectRow('*', 'student_register', 'student_register_id = ' . $_SESSION['student_register_id']);
$student_log_pause = $obj->selectRow('*', 'student_log_pause', 'student_id=' . $student['student_register_id']);

$student_pause = false;
if(count($student_log_pause)>0) {
    
     /*
    $student_log_detail = $obj->selectAll('sld.*,q.*', 'student_log_detail As sld INNER JOIN question As q ON sld.question_id=q.question_id', 'student_log_id = ' . $student_log_pause['']);
    
   
    $student_log_detail             = $obj->selectRow('COUNT(student_log_detail_id) AS attended, IFNULL((SELECT COUNT(student_log_detail_id) FROM student_log_detail INNER JOIN question ON student_log_detail.question_id=question.question_id WHERE student_log_id=' . $student_log_detail['student_log_id'] . ' AND UPPER(answer) = UPPER(student_answer)), 0) AS correct_answers', 'student_log_detail', 'student_log_id=' . $student_log_detail['student_log_id']);
    $student_log_attended           = $log_detail['attended'];
    */
    $student_pause = true;
    $student_pause_log_id    = $student_log_pause['student_log_id'];
    
    $student_log_order = $obj->selectRow('slo.*','student_log_order As slo','student_log_id ='.$student_pause_log_id);   
    
}    

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
                                <div class="span2">
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
                            
                            
                              <div class="span2">
                                    <div class="language-box" onClick="selfreequiz();">
                                        <div class="language-img-zoom">
                                            <div class="language-img" style="background: url(<?php echo BASE_URL . $val['imageurl']; ?>)no-repeat;"></div>
                                        </div>
                                        <div class="language-title">
                                            <h3>
                                                <a href="#" onClick="selfreequiz();">Free Quiz</a>
                                            </h3>
                                        </div>
                                        <div class="language-description">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                                            <a class="btn btn-theme margintop10 difficult-button" onClick="selfreequiz();">START QUIZ</a>
                                        </div>
                                    </div>
                                </div>
                            
                            
                            <?php if($student_pause && $student_log_order['student_log_order']==1) { 
                                
                                
                                $student_log_year  = $obj->selectRow('sly.*,y.year As year','student_log_year As sly LEFT JOIN year As y ON y.year_id=sly.year_id',' sly.student_log_id='.$student_pause_log_id);
                                $student_log = $obj->selectRow('sl.*,l.name As language_name','student_log sl LEFT JOIN language l ON sl.language_id=l.language_id','student_log_id='.$student_pause_log_id);
                                
                                $student_log_detail             = $obj->selectRow('COUNT(student_log_detail_id) AS attended, IFNULL((SELECT COUNT(student_log_detail_id) FROM student_log_detail INNER JOIN question ON student_log_detail.question_id=question.question_id WHERE student_log_id=' . $student_pause_log_id . ' AND UPPER(answer) = UPPER(student_answer)), 0) AS correct_answers', 'student_log_detail', 'student_log_id=' . $student_pause_log_id);
                                $student_log_attended           = $student_log_detail['attended'];
                                
                                ?>
                            
                            <div class="span2">
                                    <div class="language-box" onClick="selpausequiz();">
                                        <div class="language-img-zoom">
                                            <div class="language-img" style="background: url(<?php echo BASE_URL . $val['imageurl']; ?>)no-repeat;"></div>
                                        </div>
                                        <div class="language-title">
                                            <h3>
                                                <a href="#" onClick="selpausequiz();">Your Last Session</a>
                                            </h3>
                                        </div>
                                        <div class="language-description">
                                            
                                            
                                            
                                            <div class="tab-content">
    <div class="tab-pane container active" id="yordertab">
          <table class = 'table table-striped result_table' style="width:60%;">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Date</th>
                                                        <th class="text-center">Year</th>
                                                        <th class="text-center">Total</th>
                                                        <th class="text-center">Answered</th>
                                                        
                                                    </tr>
                                                </thead>
      
          
                                          
                                                <tbody>

                                                    <tr>
                                                       <td class="text-center"><?php echo date('d/m/Y',strtotime($student_log_pause['pause_date'])); ?></td>
                                                        <td class="text-center"><?php echo $student_log_year['year']; ?></td>
                                                        <td class="text-center"><?php echo $student_log['total_questions'] ?></td>
                                                        <td class="text-center"><?php echo $student_log_attended; ?></td>
                                                    </tr>
                                                </tbody>
          </table>
        </div>
                                            </div>                                            
                                            
                                            
                                            
                                            <a class="btn btn-theme margintop10 difficult-button" onClick="selpausequiz();">START QUIZ</a>
                                        </div>
                                    </div>
                                </div>
                              <?php } ?>
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
