<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
if (isset($_SESSION['student_register_id'])) {
    $student = $obj->selectrow('*', 'student_register', 'student_register_id = ' . $_SESSION['student_register_id']);
    $student_answer = $obj->selectAll('sa.*, l.name AS language', 'student_answer AS sa LEFT JOIN language AS l ON l.language_id = sa.language_id', 'student_answer_id > 0');

    $student_log        = $obj->selectAll('sl.*,l.name As language_name','student_log sl LEFT JOIN language l ON sl.language_id=l.language_id','student_register_id='.$_SESSION['student_register_id'].' ORDER BY student_log_id DESC');
    
    
    
    $student_log_order = $obj->selectAll('slo.*','student_log AS sl LEFT JOIN student_log_order As slo  ON sl.student_log_id=slo.student_log_id',' sl.student_register_id='.$_SESSION['student_register_id']);
    $student_log_year  = $obj->selectAll('sly.*,y.year As year','student_log AS sl LEFT JOIN student_log_year As sly ON sl.student_log_id=sly.student_log_id LEFT JOIN year As y ON y.year_id=sly.year_id',' sl.student_register_id='.$_SESSION['student_register_id']);
       
    
    
    $ans_log_order =  array();
    if(count($student_log_order)>0) {
        foreach($student_log_order as $student_log_order_v) {
           
                $ans_log_order[$student_log_order_v['student_log_id']] = $student_log_order_v['student_log_order'];
        }
    }     
    
   
    
    $ans_log_year      = array();    
    if(count($student_log_year)>0) {
        foreach($student_log_year as $student_log_year_v) {
            $ans_log_year[$student_log_year_v['student_log_id']][] = $student_log_year_v['year'];
        }
    }
    
     
  
  
  
  
}   
?>
<html lang = 'en'>
    <?php include 'head.php';
    ?>
    <body>
        <div id = 'wrapper'>
            <?php include 'menu.php';
            ?>
            <section class = 'topic_section'>
                <div class = 'container'>
                    <div class = 'row'>
                        <div class = 'span4'>
                            <div class = 'result_user_section'>
                                <?php if (isset($login_student['profile_image']) && $login_student['profile_image'] == '') {
                                    ?>
                                    <div class = 'user_profile' style = 'background: url(<?php echo BASE_URL . $login_student['gender']; ?>.jpg)no-repeat;background-position: center;background-size: cover'></div>
                                <?php } else {
                                    ?>
                                    <div class = 'user_profile' style = 'background: url(<?php echo BASE_URL . $login_student['profile_image']; ?>)no-repeat;background-position: center;background-size: cover'></div>
                                <?php }
                                ?>
                            </div>
                            <div class = 'user_details'>
                                <h2><?php echo $student['student_name'];
                                ?></h2>
                                <h4><?php echo $student['parent_name'];
                                ?> <span><?php echo $student['mobile'] ?></span></h4>
                                <h5><?php echo $student['school_name'];
                                ?> </h5>
                                <p><?php echo $student['city'];
                                ?> <?php echo $student['pin'];
                                ?> </p>
                            </div>
                        </div>
                        <div class = 'span8'>
                            <h4>My Completed Task</h4>
<!--                            <h6></h6>-->
                            <!-- start: Accordion -->
<!--                            <div class = 'accordion' id = 'accordion2'>
                                <div class = 'accordion-group'>-->
                                    <div class = 'accordion-heading'>
                                        <a class = 'accordion-toggle active'> Test Report</a>
                                    </div>
                                    <div class = 'accordion-body collapse in'>
                                        <div class = 'accordion-inner border-none'>
                                            
                                            <?php 
                                            foreach($student_log as $student_log_detail) { 
                                             if(isset($ans_log_order[$student_log_detail['student_log_id']]) && ($ans_log_order[$student_log_detail['student_log_id']]==1))   { //test order
                                                 $log_year_val = '';
                                                 if(isset($ans_log_year[$student_log_detail['student_log_id']])) {
                                                     $log_year_val  = $ans_log_year[$student_log_detail['student_log_id']][0];
                                                 }                                               
                                             
                                                $log_detail             = $obj->selectRow('COUNT(student_log_detail_id) AS attended, IFNULL((SELECT COUNT(student_log_detail_id) FROM student_log_detail WHERE student_log_id=' . $student_log_detail['student_log_id'] . ' AND UPPER(answer) = UPPER(student_answer)), 0) AS correct_answers', 'student_log_detail', 'student_log_id=' . $student_log_detail['student_log_id']);
                                                $log_attended           = $log_detail['attended'];
                                                $log_correct_answers    = $log_detail['correct_answers'];
                                             ?>

                                            <h2 class = 'titleContainer title'> <i class="font-icon-arrow-simple-right"></i> <?php  echo $student_log_detail['language_name']; ?> - Question Order - <?php echo $log_year_val; ?> <span>Date: <?php echo date('d/M/Y h:iA', strtotime($student_log_detail['created_at'])); ?></span></h2>
                                            <table class = 'table table-striped result_table'>
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Total</th>
                                                        <th class="text-center">Answered</th>
                                                        <th class="text-center"><i class="icon-ok-sign"></i></th>
                                                        <th class="text-center"><i class="font-icon-remove-circle"></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $student_log_detail['total_questions']; ?></td>
                                                        <td><?php echo $log_attended; ?></td>
                                                        <td><?php echo $log_correct_answers; ?></td>
                                                        <td><?php echo $log_attended - $log_correct_answers?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <center>
                                                <button class="btn btn-brown" onclick="showFullResult(<?php echo $student_log_detail['student_log_id']; ?>);">Show Details</button>
                                            </center>
                                            <div id="result_view_<?php echo $student_log_detail['student_log_id']; ?>" class="full-result"></div>
                                            <br/>
                                            
                                            <?php } else {
                                                
                                                /*
                                                $student_log_topic = $obj->selectAll('slt.*,s.name as subject_name,t.name As topic_name','student_log AS sl LEFT JOIN student_log_topic As slt ON sl.student_log_id=slt.student_log_id '
                                                        . 'LEFT JOIN topic t ON slt.topic_id=t.topic_id LEFT JOIN subject As s ON t.subject_id=s.subject_id',
                                                        ' sl.student_log_id='.$student_log_detail['student_log_id'].' ORDER BY s.subject_id,t.topic_id');
    
                                               
                                                
                                                $student_log_details = $obj->selectAll('sld.*,y.year,t.name As topic_name,s.name As subject_name','student_log_detail As sld INNER JOIN student_log As sl ON sl.student_log_id=sld.student_log_id LEFT JOIN question As q ON sld.question_id=q.question_id 
                                                                                        LEFT JOIN year as y ON q.year_id=y.year_id LEFT JOIN topic as t ON q.topic_id=t.topic_id LEFT JOIN subject AS s ON t.subject_id=s.subject_id',' sl.student_log_id='.$student_log_detail['student_log_id'].' ORDER BY student_log_detail_id ASC');
                                                                                            
                                               
                                                */
                                                /*
                                                ?>
                                            
                                            
                                            <h2 class = 'titleContainer title'> 
                                                <i class="font-icon-arrow-simple-right"></i> <?php echo $student_log_detail['language_name']; ?> - Subject Order - Subject-1 (Topic 1, Topic 2), Subject-2 (Topic-1, Topic-2).
                                                <span>Date: 10-01-2020</span>
                                            </h2>
                                            <table class = 'table table-striped result_table'>
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Year</th>
                                                        <th class="text-center">Subject</th>
                                                        <th class="text-center">Topic</th>
                                                        <th class="text-center">Total</th>
                                                        <th class="text-center">Answered</th>
                                                        <th class="text-center">
                                                            <i class="icon-ok-sign"></i>
                                                        </th>
                                                        <th class="text-center">
                                                            <i class="font-icon-remove-circle"></i>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>2010</td>
                                                        <td>Science</td>
                                                        <td>Physics</td>
                                                        <td>40</td>
                                                        <td>40</td>
                                                        <td>30</td>
                                                        <td>10</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2010</td>
                                                        <td>Science</td>
                                                        <td>Chemistry</td>
                                                        <td>30</td>
                                                        <td>30</td>
                                                        <td>25</td>
                                                        <td>05</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2010</td>
                                                        <td>General</td>
                                                        <td>GS</td>
                                                        <td>30</td>
                                                        <td>30</td>
                                                        <td>15</td>
                                                        <td>15</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <center>
                                                <button class="btn btn-brown">Show Details</button>
                                            </center>
                                            <br/>
                                            
                                            <?php 
                                                 * 
                                                 *   */ }
                                                
                                                
                                            }
                                            ?> 
                                        </div>
                                    </div>
<!--                                </div>
                            </div>-->
                            <!--end: Accordion -->
                        </div>
                    </div>
                </div>
            </section>
            <?php include 'footer.php';
            ?>
        </div>
        <?php include 'script.php';
        ?>
        <script type="text/javascript">
            function showFullResult(slid) {
                setTimeout(() => {
                        applyMathAjax();
                    }, 600);
                $.ajax({
                    type: "GET",
                    url: 'api/v1/get_result_detail/' + slid,
                    success: function (data) {
                        if (data.result.error === false) {
                            var qlist = '';
                            var correct_ans = '';
                            var student_ans = '';
                            $.each(data.result.data, function (key, val) {
                                qlist = qlist + '<div class="question-title result-title"><h6><span>' + (key + 1) + '</span>. ' + val.name + '</h6>';
                                if (val.a !== '') {
                                    correct_ans = '';
                                    student_ans = '';
                                    if ((val.answer).toUpperCase() === 'A') {
                                        correct_ans = 'crt_clr';
                                    }
                                    if ((val.student_answer).toUpperCase() === 'A' && (val.answer).toUpperCase() !== 'A') {
                                        student_ans = 'wrng_clr';
                                    }
                                    qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="option-float">A.</span> ' + val.a + '</div></div>';
                                }
                                if (val.b !== '') {
                                    correct_ans = '';
                                    student_ans = '';
                                    if ((val.answer).toUpperCase() === 'B') {
                                        correct_ans = 'crt_clr';
                                    }
                                    if ((val.student_answer).toUpperCase() === 'B' && (val.answer).toUpperCase() !== 'B') {
                                        student_ans = 'wrng_clr';
                                    }
                                    qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="option-float">B.</span> ' + val.b + '</div></div>';
                                }
                                if (val.c !== '') {
                                    correct_ans = '';
                                    student_ans = '';
                                    if ((val.answer).toUpperCase() === 'C') {
                                        correct_ans = 'crt_clr';
                                    }
                                    if ((val.student_answer).toUpperCase() === 'C' && (val.answer).toUpperCase() !== 'C') {
                                        student_ans = 'wrng_clr';
                                    }
                                    qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="option-float">C.</span> ' + val.c + '</div></div>';
                                }
                                if (val.d !== '') {
                                    correct_ans = '';
                                    student_ans = '';
                                    if ((val.answer).toUpperCase() === 'D') {
                                        correct_ans = 'crt_clr';
                                    }
                                    if ((val.student_answer).toUpperCase() === 'D' && (val.answer).toUpperCase() !== 'D') {
                                        student_ans = 'wrng_clr';
                                    }
                                    qlist = qlist + '<div class="result-option ' + correct_ans + ' ' + student_ans + '"><div class="option"><span class="option-float">D.</span> ' + val.d + '</div></div>';
                                }
                                if (val.image_path_explanation !== '' && val.explanation_img_direction === 'top') {
                                    qlist = qlist + '<div class="explanation_image"><img src="' + image_url + val.image_path_explanation + '"></div>';
                                } else {
                                    qlist = qlist + '';
                                }
                                if (val.explanation !== '') {
                                    qlist = qlist + '<div class="explanation-section"><strong>Explanation</strong> : ' + val.explanation + '</div>';
                                } else {
                                    qlist = qlist + '<div class="explanation-section"> </div>';
                                }
                                if (val.image_path_explanation !== '' && val.explanation_img_direction === 'bottom') {
                                    qlist = qlist + '<div class="explanation_image"><img src="' + image_url + val.image_path_explanation + '"></div>';
                                } else {
                                    qlist = qlist + '';
                                }
                                qlist = qlist + '</div>';
                            });
                            $('#result_view_' + slid).html(qlist);
                        } else {
                            swal('Information', data.result.message, 'info');
                        }
                    },
                    error: function (err) {
                        swal('Error', err.statusText, 'error');
                    }
                });
            }
        </script>    
    </body>
</html>