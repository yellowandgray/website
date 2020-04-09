<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
$subjects = $obj->selectAll('*', 'subject', 'subject_id > 0 AND status = 1');

$student_register_id = $_SESSION['student_register_id'];

$from = '';
if(isset($_REQUEST['from'])) 
{    
    $from=$_REQUEST['from'];
}    

$student_feedbacks = array();
if($from!='' && $from=='login') {
    $data1 = $obj->selectAll('sf.*', 'student_feedback As sf', 'sf.student_id ='.$student_register_id);
    $sfeed = '';
    if(count($data1)>0) {
                foreach($data1 as $sf) {
                     $sflist[] = $sf['feedback_id'];
                }
                $sfeed = implode(',',$sflist);
                $sfeed = ' AND f.feedback_id NOT IN ('.$sfeed.')';
    }

    $student_feedbacks = $obj->selectAll('f.*,ftm.feedback_timing As fb_timing,fe.*,fty.feedback_type as feedback_type,fe.name as fback,fe.feedback_type as feedback_type_id,fe.option_1,fe.option_2,fe.option_3', 'user_assign_feedback As f LEFT JOIN feedback_timing_master As ftm ON f.timing_id=ftm.feedback_timing_id LEFT JOIN feedback As fe ON f.feedback_id=fe.feedback_id LEFT JOIN feedback_type_master As fty ON fe.feedback_type=fty.feedback_type_id', 'f.student_id ='.$student_register_id.'  AND f.timing_id=1'.$sfeed.'  ORDER BY fe.feedback_id');
}
?>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <div id="wrapper">
            <?php include 'menu.php'; ?>
            <section class="subject-content">
                <div class="container-fluid">
                    <h4 class="heading text-center">
                        <!--<strong>10<sup>th</sup> STD State Board</strong>-->
                        <strong><?php echo $login_student['standard']; ?></strong>
                    </h4>
                    <div class="row margin-auto">
                        <?php foreach ($subjects as $row) { ?>
                            <div class="span3 subject-section" onclick="window.location = 'difficult_level?sub=<?php echo $row['name']; ?>'">
                                <div class="price">Feringo</div>
                                <div class="subject-1">
                                    <div class="subject-1-img" style="background: url(<?php echo BASE_URL . $row['image_path']; ?>)no-repeat;"></div>
                                </div>
                                <div class="subject-1-text">
                                    <h2><?php echo $row['name']; ?></h2>
                                    <p><?php echo $obj->charLimit($row['description'], 200); ?></p>
                                    <button class="btn btn-theme margintop10" onclick="window.location = 'select_chapter?sub=<?php echo $row['name']; ?>'">Start Quiz...</button>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="span3 subject-section kanoli-top-25" onclick="window.location = 'thunaipaadam_kaanoli'">
                            <!-- <div class="price">Feringo</div> -->
                            <div class="subject-1">
                                <div class="subject-1-img" style="background: url(img/thunaipaadam-thumb.jpg)no-repeat;"></div>
                            </div>
                            <div class="subject-1-text">
                                <h2>பத்தாம் வகுப்பு தமிழ் துணைப்பாடம் -  காணொளிகள்</h2>
                                <p>விரிவானம் இயல் 2, 4, 5, 6, 7, 8, 9 முதலிய கதைகளை அனிமேஷன் வடிவத்தில் கண்டு ரசித்து படிக்கலாம்..</p>
                                <button class="btn btn-theme margintop10" onclick="window.location = 'thunaipaadam_kaanoli'">See Videos...</button>
                            </div>
                        </div>
                    </div>      
                    
                    

                    <?php if (count($student_feedbacks) > 0) { ?>
                    <div class="feedbackBox fbackModal modal hide fade" id="feedbackapp">
                            
                                <div class="feedbackContainer" v-if="feedbackIndex<quiz.feedbacks.length" v-bind:key="feedbackIndex">
                                    
                                    <h3 style="font-size: 20px;color: rgb(95, 95, 95); font-weight: 500; margin-bottom: 5px;">Your Feedback.</h3>

                                    <h2 class="titleContainer title">{{/* feedbackIndex + 1 */}} <span v-html="quiz.feedbacks[feedbackIndex].fback"></span></h2>
                                    
                                    <div class="optionContainer" v-if="quiz.feedbacks[feedbackIndex].feedback_type_id == 2">          
                                         <div class="radio">
                                            <label><input type="radio" :name="quiz.feedbacks[feedbackIndex].feedback_id|AddPrefix('fbak_')" value="option_1">{{quiz.feedbacks[feedbackIndex].option_1}}</label>
                                          </div>
                                          <div class="radio">
                                            <label><input type="radio" :name="quiz.feedbacks[feedbackIndex].feedback_id|AddPrefix('fbak_')" value="option_2">{{quiz.feedbacks[feedbackIndex].option_2}}</label>
                                          </div>
                                        <?php //if (count($studnet_feedbacks.option_3) > 0) { ?>
                                          <div class="radio disabled" v-if="quiz.feedbacks[feedbackIndex].option_3">
                                            <label><input type="radio" :name="quiz.feedbacks[feedbackIndex].feedback_id|AddPrefix('fbak_')" value="option_3">{{quiz.feedbacks[feedbackIndex].option_3}}</label>
                                          </div> 
                                        <?php //} ?>
                                    </div>
                                    
                                    
                                    <div class="optionContainer" v-if="quiz.feedbacks[feedbackIndex].feedback_type_id == 1">
                                         <textarea class="form-control" rows="5" :name="quiz.feedbacks[feedbackIndex].feedback_id|AddPrefix('fbak_')"></textarea>
                                    </div>
                                    
                                    
                                     <div class="modal-footer text-center">
                                                <button type="button" class="btn logout-btn" v-on:click="nextFeedback(quiz.feedbacks[feedbackIndex].feedback_id);">Skip</button>
<!--                                                <button type="button" class="btn btn-default" v-on:click="nextFeedback(quiz.feedbacks[feedbackIndex].feedback_id);">Next</button>-->
                                    </div>
                                                               
                                </div>
                        
                        
                                <div v-if="feedbackIndex >= quiz.feedbacks.length" v-bind:key="feedbackIndex" class="quizCompleted has-text-centered">
                                    <h2 class="titleContainer title">{{/* feedbackIndex + 1 */}} <span>Thanks For your Feedback</span></h2>
                                    
                                     <div class="modal-footer">
                                                <button type="button" class="btn btn-default" v-on:click="closeFeedback();">Close</button>
                                    </div>
                                </div>
                                
                               
                        </div>
                    <?php } ?>
                    
                    
                    
                </div>
            </section>
            <?php include 'footer.php'; ?>
        </div>
         <?php include 'script.php'; ?>
         <?php if (count($student_feedbacks) > 0) { ?>
            <script type="text/javascript">
             $(document).ready(function() {  
                $('.fbackModal').modal('show');                 
             });
             
             var feedback = {
                user: "Feringo",
                feedbacks: <?php echo json_encode($student_feedbacks); ?>
            },
            feedbackuserResponseSkelaton = Array(feedback.feedbacks.length).fill(null);
            var feedbackapp = new Vue({
                el: "#feedbackapp",
                data: {
                    quiz: feedback,
                    feedbackIndex: 0,
                    feedbackuserResponses: feedbackuserResponseSkelaton,
                    isActive: false
                },
                filters: {
                    charIndex: function (i) {
                        return String.fromCharCode(97 + i);
                    },
                    AddPrefix: function (value, prefix) {
                        return prefix + value;
                    }
                },
                methods: {
                    restart: function () {
                        location.reload();
                        /*this.feedbackIndex = 0;
                         this.feedbackuserResponses = Array(this.quiz.feedbacks.length).fill(null);
                         document.getElementById('create').style.display = "none"; */
                    },                    
                    nextFeedback: function () {
                        var sel_ans = '';
                        if(this.quiz.feedbacks[this.feedbackIndex].feedback_type_id==2){
                           sel_ans = $('input[name=fbak_'+this.quiz.feedbacks[this.feedbackIndex].feedback_id+']:checked').val();                            
                         } 
                         
                         if(this.quiz.feedbacks[this.feedbackIndex].feedback_type_id==1){
                             sel_ans = $('textarea:input[name=fbak_'+this.quiz.feedbacks[this.feedbackIndex].feedback_id+']').val();                             
                         }
                         
                         if(sel_ans!='' && sel_ans!=undefined) {
                         $.post("api/v1/store_student_feedback",
                        {
                            feedback: this.quiz.feedbacks[this.feedbackIndex].feedback_id,
                            answer: sel_ans,
                            student: <?php echo $student_register_id; ?>
                        },
                        function (data, status) {
                            if (data.result.error === false) {
                                     if (feedbackapp.feedbackIndex < feedbackapp.quiz.feedbacks.length)                            
                                     feedbackapp.feedbackIndex++;
                            }
                        });
                        }else{
                            this.feedbackIndex++;
                        }
                        
                       
                    },
                    skipFeedback: function () {
                        if (feedbackapp.feedbackIndex < feedbackapp.quiz.feedbacks.length)                            
                             feedbackapp.feedbackIndex++;
                    },
                    closeFeedback: function () {
                        $('.fbackModal').modal('hide'); 
                    },
                    prev: function () {
                        if (this.quiz.feedbacks.length > 0)
                            this.feedbackIndex--;
                    },
                    // Return "true" count in feedbackuserResponses
                    score: function () {
                        var score = 0;
                        for (let i = 0; i < this.feedbackuserResponses.length; i++) {
                            if (
                                    typeof this.quiz.feedbacks[i].responses[
                                    this.feedbackuserResponses[i]
                            ] !== "undefined" &&
                                    this.quiz.feedbacks[i].responses[this.feedbackuserResponses[i]].correct
                                    ) {
                                score = score + 1;
                            }
                        }
                        return score;
                        //return this.feedbackuserResponses.filter(function(val) { return val }).length;
                    }
                }
            }
            );
    </script>    
         <?php } ?>
    </body> 
</html>