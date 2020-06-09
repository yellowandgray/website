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
    
    $student_pause_log_id    = $student_log_pause['student_log_id'];
    
    $student_log_order = $obj->selectRow('slo.*','student_log_order As slo','student_log_id ='.$student_pause_log_id);   
   
    $stud_log           = $obj->selectRow('*','student_log','student_log_id ='.$student_pause_log_id);
    $stud_log_detail    = $obj->selectAll('*','student_log_detail','student_log_id ='.$student_pause_log_id);

    $tot_qs = $stud_log['total_questions'];
    $att_qs = count($stud_log_detail);
    
    if($tot_qs>$att_qs){
        $student_pause = true;
    }
}    

?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <div id="wrapper">
            <?php include 'menu.php'; ?>
            <section class="language-section sample-language-section">
                <div class="container">
                    <div class="language-main-title">
                        <h4>Group-I Exams</h4>
                    </div>
                    
                    <div class="language-width">
                        <div class="row">
                            <div class="span4">
                                 <?php if($student_pause && $student_log_order['student_log_order']==1) { ?>
                                <div class="recent-session">  
                               <?php  
                                $student_log_year  = $obj->selectRow('sly.*,y.year As year','student_log_year As sly LEFT JOIN year As y ON y.year_id=sly.year_id',' sly.student_log_id='.$student_pause_log_id);
                                $student_log = $obj->selectRow('sl.*,l.name As language_name','student_log sl LEFT JOIN language l ON sl.language_id=l.language_id','student_log_id='.$student_pause_log_id);
                                
                                $student_log_detail             = $obj->selectRow('COUNT(student_log_detail_id) AS attended, IFNULL((SELECT COUNT(student_log_detail_id) FROM student_log_detail INNER JOIN question ON student_log_detail.question_id=question.question_id WHERE student_log_id=' . $student_pause_log_id . ' AND UPPER(answer) = UPPER(student_answer)), 0) AS correct_answers', 'student_log_detail', 'student_log_id=' . $student_pause_log_id);
                                $student_log_attended           = $student_log_detail['attended'];
                                
                                ?>
                            
                                    <h3>Your Last Session</h3>
                                    <p><span>Language:</span> <?php echo $student_log['language_name']; ?></p>
                                    <p><span>Order:</span> Year Order</p>
                                    <p><span>Date:</span> <?php echo date('d/m/Y',strtotime($student_log_pause['pause_date'])); ?></p>
                                    <p><span>Year:</span> <?php echo $student_log_year['year']; ?></p>
                                    <p><span>Questions:</span> <?php echo $student_log['total_questions'] ?></p>
                                    <p><span>Answered:</span> <?php echo $student_log_attended; ?></p>
                                    <div class="recent-btn">
                                        <a onClick="selpausequiz();" class="btn btn-green">Resume Test</a>
                                    </div>
                                </div>
                                    
                              <?php }else if($student_pause && $student_log_order['student_log_order']==2)  { ?>
                                  
                                  <div class="recent-session">  
                          <?php               
                                  $student_log = $obj->selectRow('sl.*,l.name As language_name','student_log sl LEFT JOIN language l ON sl.language_id=l.language_id','student_log_id='.$student_pause_log_id);
                                  //$data = $obj->selectAll('*', 'student_log_detail', 'student_log_id = ' . $student_pause_log_id);    
   
                                
                                $stud_all_sel_topic     =  Array();
    
       
     
    $student_log_topic = $obj->selectAll('slt.*,t.name As topic_name,subject.subject_id As subject_id,subject.name As subject_name','student_log As sl'
            . ' LEFT JOIN student_log_topic slt ON sl.student_log_id=slt.student_log_id LEFT JOIN topic As t ON slt.topic_id=t.topic_id LEFT JOIN subject ON '
            . 't.subject_id=subject.subject_id','sl.student_log_id = '.$student_pause_log_id.' ORDER BY student_log_id,subject.subject_id,t.topic_id ASC');
    

    $stud_log_topic_by_log = array();
    if(count($student_log_topic)>0) {
        foreach ($student_log_topic as $student_log_topic) {
            if($student_log_topic['student_log_id']!=''){
                $stud_log_topic_by_log[$student_log_topic['student_log_id']][$student_log_topic['subject_name']][$student_log_topic['topic_id']] =  $student_log_topic['topic_name'];
                 if(!in_array($student_log_topic['topic_id'], $stud_all_sel_topic)) {
                        $stud_all_sel_topic[] = $student_log_topic['topic_id'];
                 }
            }        
        }
    }
    
 
    //$stud_all_sel_year_id_val  = '';
    $stud_all_sel_topic_id_val = '';
    
    $ques_topic_cnt      = array();
    $ques_cor_ans_cnt   = array();
       
    
    if(count($stud_all_sel_topic)>0) {
        $stud_all_sel_topic_id_val = implode(',',$stud_all_sel_topic);
    }
	
	    
    $data_res = array();
  
   if($stud_all_sel_topic_id_val!='') {
      
		
       //total questions  topic 
       $student_log_question  = $obj->selectAll('q.*,year.year,subject.name As subject_name,t.name As topic_name',' question As q LEFT JOIN year ON q.year_id=year.year_id '
            . 'LEFT JOIN topic As t ON q.topic_id=t.topic_id LEFT JOIN subject ON t.subject_id=subject.subject_id',' q.topic_id IN ('.$stud_all_sel_topic_id_val.')'); 
        
        if(count($student_log_question)>0) {
            foreach($student_log_question as $student_log_question_val) {
                if(!isset($ques_topic_cnt[$student_log_question_val['topic_id']]['count'])){
                    $ques_topic_cnt[$student_log_question_val['topic_id']]['count'] = 0;
                }
                $ques_topic_cnt[$student_log_question_val['topic_id']]['count']              =  $ques_topic_cnt[$student_log_question_val['topic_id']]['count'] + 1;
                $ques_topic_cnt[$student_log_question_val['topic_id']]['topic_name']         =  $student_log_question_val['topic_name'];
                $ques_topic_cnt[$student_log_question_val['topic_id']]['subject_name']       =  $student_log_question_val['subject_name'];
         
            }   
        }		
		
        
        //answered,correct answer count topic
       
        $student_log_answer = $obj->selectAll('student_log_detail.*,question.answer,year.year,question.topic_id',' student_log LEFT JOIN student_log_detail ON student_log.student_log_id=student_log_detail.student_log_id '
                . 'LEFT JOIN question ON student_log_detail.question_id=question.question_id LEFT JOIN year ON question.year_id=year.year_id','student_log_detail.student_log_id='.$student_pause_log_id.' ORDER BY student_log_id,student_log_detail_id ASC');
       
        
        $tmp_stud_log_queston_id = array(); //rmv mul question  in student log details
        foreach($student_log_answer as $student_log_answer_val) {
            if($student_log_answer_val['student_log_id']!='') {
                if(!isset($tmp_stud_log_queston_id[$student_log_answer_val['student_log_id']]) || !in_array($student_log_answer_val['question_id'], $tmp_stud_log_queston_id[$student_log_answer_val['student_log_id']]))
                {        
                    $tmp_stud_log_queston_id[$student_log_answer_val['student_log_id']][] = $student_log_answer_val['question_id'];
                        

                    if(!isset($ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['answerd_cnt']))
                    { 
                        $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['answerd_cnt'] = 0;
                    }

                    
                    if($student_log_answer_val['student_answer']!=''){                        
                 
                        $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['answerd_cnt'] = $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['answerd_cnt']+1;
                       
                    } 

                    
                    } 
            } 
        }
        
        
        
         foreach($stud_log_topic_by_log[$student_pause_log_id] as $student_log_subj_subj=>$student_log_subj)
         {    
            //topic
            {
                 foreach($student_log_subj as $student_log_subj_topic_id=>$student_log_subj_topic)
                 {
                     $data_res[$student_log_subj_topic_id]['topic_id']      = $student_log_subj_topic_id;
                     $data_res[$student_log_subj_topic_id]['subject_name']  = $student_log_subj_subj;
                     $data_res[$student_log_subj_topic_id]['topic_name']    = $student_log_subj_topic;
                     
                     
                     $tot_topic_question = 0;
                     if(isset($ques_topic_cnt[$student_log_subj_topic_id]['count'])) {
                            $tot_topic_question = $ques_topic_cnt[$student_log_subj_topic_id]['count'];
                     }                     
                     $data_res[$student_log_subj_topic_id]['totalcnt'] = $tot_topic_question;                     
                     
                     
                    $answerd_topic_question = 0;
                    if(isset($ques_cor_ans_cnt[$student_pause_log_id][$student_log_subj_topic_id]['answerd_cnt'])) {
                        $answerd_topic_question = $ques_cor_ans_cnt[$student_pause_log_id][$student_log_subj_topic_id]['answerd_cnt'];
                    }
                    $data_res[$student_log_subj_topic_id]['answerdcnt'] = $answerd_topic_question;
                    
                    
                 }
            }
         }
   }  
  
   ?>
                                    <h3>Your Last Session</h3>
                                    <p><span>Language:</span> <?php echo $student_log['language_name']; ?></p>
                                    <p><span>Order:</span> Subject Order</p>
                                    <p><span>Date:</span> <?php echo date('d/m/Y',strtotime($student_log_pause['pause_date'])); ?></p>
                                    <?php 
                                   
                                    foreach($data_res as $resval) {
                                    
                                    ?>    
                                    <p><span>Subject:</span> <?php echo $resval['subject_name']; ?></p>                                  
                                    <p><span>Topic:</span> <?php echo $resval['topic_name']; ?></p>
                                    <p><span>Questions:</span> <?php echo $resval['totalcnt']; ?></p>
                                    <p><span>Answered:</span> <?php echo $resval['answerdcnt']; ?></p>
                                    <?php } ?>
                                    <div class="recent-btn">
                                        <a onClick="selpausequiz();" class="btn btn-green">Resume Test</a>
                                    </div>                         
                                    
                                             
                                  
                            
                             
                               </div>
                                 <?php } ?>
                            </div>
                            <?php foreach ($languages as $val) { ?>
                                <div class="span4">
                                    <div class="language-box"   data-lang="<?php echo $val['name']; ?>">
                                        <div class="language-img-zoom">
                                            <div class="language-img" style="background: url(<?php echo BASE_URL . $val['imageurl']; ?>)no-repeat;"></div>
                                        </div>
                                        <div class="language-title">
                                            <h3>
                                                <?php 
                                                if($val['name']=='Tamil')
                                                {    
                                                ?>   
                                                தமிழ்    
                                                <?php     
                                                }
                                                else  
                                                {    
                                                    echo $val['name'];
                                                }    
                                                ?>
                                            </h3>
                                        </div>
                                        <div class="language-description">
                                            <ul style="list-style: none;margin: 0">
                                                <?php if ($val['name'] == 'Tamil') { ?>
                                                    <li>
                                                        <i class="icon-double-angle-right"></i>
                                                        <a href="qorder-years?lan=<?php echo $val['name']; ?>"><i class="icon-calendar"></i> ஆண்டு வரிசை</a>                             
                                                    </li> 
                                                    <li>
                                                        <i class="icon-double-angle-right"></i>
                                                        <a href="subject?lan=<?php echo $val['name']; ?>"><i class="icon-book"></i> பாடத்திட்ட வரிசை</a>
                                                    </li>
                                                <?php } else { ?>
                                                    <li>
                                                        <i class="icon-double-angle-right"></i>
                                                        <a href="qorder-years?lan=<?php echo $val['name']; ?>"><i class="icon-calendar"></i> Year Wise</a>                             
                                                    </li> 
                                                    <li>
                                                        <i class="icon-double-angle-right"></i>
                                                        <a href="subject?lan=<?php echo $val['name']; ?>"><i class="icon-book"></i> Subject Wise</a>
                                                    </li>
                                                <?php } ?>
                                            </ul>                                            
                                        </div>
                                    </div>
                                </div>
                            <?php }
                            ?>
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
