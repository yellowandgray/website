<?php
session_start();
include('login-check.php');
require_once 'api/include/common.php';
$obj = new Common();
if (isset($_SESSION['student_register_id'])) {
    $login_student = $obj->selectRow('*', 'student_register', 'student_register_id = ' . $_SESSION["student_register_id"]);
    $member_homes = $obj->selectAll('*', 'member_home', 'member_home_id > 0');
    $news_feeds = $obj->selectAll('*', 'news_feed', 'news_feed_id > 0');
}


if (isset($_SESSION['student_register_id'])) {

    $student_log = $obj->selectRow('sl.*,l.name As language_name', 'student_log sl LEFT JOIN language l ON sl.language_id=l.language_id', 'student_register_id=' . $_SESSION['student_register_id'] . ' ORDER BY student_log_id DESC LIMIT 1');



    if (count($student_log) > 0) {


        $student_log_order = $obj->selectRow('slo.*', 'student_log AS sl LEFT JOIN student_log_order As slo  ON sl.student_log_id=slo.student_log_id', ' sl.student_register_id=' . $_SESSION['student_register_id'] . ' AND sl.student_log_id=' . $student_log['student_log_id']);



        $ans_log_order = array();
        if (count($student_log_order) > 0) {


            $ans_log_order[$student_log_order['student_log_id']] = $student_log_order['student_log_order'];
        }

        if (count($student_log_order) > 0) {

            if ($student_log_order['student_log_order'] == 1) {

                $student_log_year = $obj->selectAll('sly.*,y.year As year', 'student_log AS sl LEFT JOIN student_log_year As sly ON sl.student_log_id=sly.student_log_id LEFT JOIN year As y ON y.year_id=sly.year_id', ' sl.student_register_id=' . $_SESSION['student_register_id']);

                $ans_log_year = array();
                if (count($student_log_year) > 0) {
                    foreach ($student_log_year as $student_log_year_v) {
                        $ans_log_year[$student_log_year_v['student_log_id']][] = $student_log_year_v['year'];
                    }
                }
            } else if ($student_log_order['student_log_order'] == 2) {

                $student_log_topic = $obj->selectAll('slt.*,t.name As topic_name,subject.subject_id As subject_id,subject.name As subject_name', 'student_log As sl'
                        . ' LEFT JOIN student_log_topic slt ON sl.student_log_id=slt.student_log_id LEFT JOIN topic As t ON slt.topic_id=t.topic_id LEFT JOIN subject ON '
                        . 't.subject_id=subject.subject_id', 'sl.student_register_id = ' . $_SESSION['student_register_id'] . ' AND sl.student_log_id=' . $student_log['student_log_id'] . ' AND sl.student_log_id IS NOT NULL AND sl.student_log_id<>\'\' ORDER BY student_log_id,subject.subject_id,t.topic_id ASC');





                $stud_all_sel_topic = Array();
                $stud_log_topic_by_log = array();
                if (count($student_log_topic) > 0) {
                    foreach ($student_log_topic as $student_log_topic) {
                        if ($student_log_topic['student_log_id'] != '') {
                            $stud_log_topic_by_log[$student_log_topic['student_log_id']][$student_log_topic['subject_name']][$student_log_topic['topic_id']] = $student_log_topic['topic_name'];
                            if (!in_array($student_log_topic['topic_id'], $stud_all_sel_topic)) {
                                $stud_all_sel_topic[] = $student_log_topic['topic_id'];
                            }
                        }
                    }
                }








                $stud_all_sel_topic_id_val = '';

                $ques_year_cnt = array();
                $ques_cor_ans_cnt = array();



                if (count($stud_all_sel_topic) > 0) {
                    $stud_all_sel_topic_id_val = implode(',', $stud_all_sel_topic);
                }



                //total questions count in topic
                if ($stud_all_sel_topic_id_val != '') {
                    //total questions year , topic 
                    $student_log_question = $obj->selectAll('q.*,year.year,subject.name As subject_name,t.name As topic_name', ' question As q LEFT JOIN year ON q.year_id=year.year_id '
                            . 'LEFT JOIN topic As t ON q.topic_id=t.topic_id LEFT JOIN subject ON t.subject_id=subject.subject_id', ' q.topic_id IN (' . $stud_all_sel_topic_id_val . ')');



                    if (count($student_log_question) > 0) {
                        foreach ($student_log_question as $student_log_question_val) {
                            if (!isset($ques_year_cnt[$student_log_question_val['topic_id']]['count'])) {
                                $ques_year_cnt[$student_log_question_val['topic_id']]['count'] = 0;
                            }
                            $ques_year_cnt[$student_log_question_val['topic_id']]['count'] = $ques_year_cnt[$student_log_question_val['topic_id']]['count'] + 1;
                            $ques_year_cnt[$student_log_question_val['topic_id']]['topic_name'] = $student_log_question_val['topic_name'];
                            $ques_year_cnt[$student_log_question_val['topic_id']]['subject_name'] = $student_log_question_val['subject_name'];
                        }
                    }



                    /*
                      echo "<pre>";
                      print_r($ques_year_cnt);
                      exit;
                     */





                    $student_log_answer = $obj->selectAll('student_log_detail.*,year.year,question.answer,question.topic_id', ' student_log LEFT JOIN student_log_detail ON student_log.student_log_id=student_log_detail.student_log_id '
                            . 'LEFT JOIN question ON student_log_detail.question_id=question.question_id LEFT JOIN year ON question.year_id=year.year_id', 'student_log.student_register_id=' . $_SESSION['student_register_id'] . ' AND student_log.student_log_id=' . $student_log['student_log_id'] . ' ORDER BY student_log_id DESC,student_log_detail_id DESC');



                    $stud_topic_order = array();
                    $stud_topic_logs = array();


                    $tmp_stud_log_queston_id = array(); //rmv mul question  in student log details
                    foreach ($student_log_answer as $student_log_answer_val) {
                        if ($student_log_answer_val['student_log_id'] != '') {
                            if (!isset($tmp_stud_log_queston_id[$student_log_answer_val['student_log_id']]) || !in_array($student_log_answer_val['question_id'], $tmp_stud_log_queston_id[$student_log_answer_val['student_log_id']])) {

                                $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['date'] = date('d/m/Y', strtotime($student_log_answer_val['created_at']));

                                if (!in_array($student_log_answer_val['topic_id'], $stud_topic_order)) {
                                    $stud_topic_order[] = $student_log_answer_val['topic_id'];
                                }

                                if (!isset($stud_topic_logs[$student_log_answer_val['topic_id']]) || !in_array($student_log_answer_val['student_log_id'], $stud_topic_logs[$student_log_answer_val['topic_id']])) {
                                    $stud_topic_logs[$student_log_answer_val['topic_id']][] = $student_log_answer_val['student_log_id'];
                                }

                                $tmp_stud_log_queston_id[$student_log_answer_val['student_log_id']][] = $student_log_answer_val['question_id'];
                                if (!isset($ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['correct_cnt'])) {
                                    $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['correct_cnt'] = 0;
                                }


                                if (!isset($ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['answerd_cnt'])) {
                                    $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['answerd_cnt'] = 0;
                                }


                                if ($student_log_answer_val['student_answer'] != '') {

                                    $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['answerd_cnt'] = $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['answerd_cnt'] + 1;
                                }

                                if ($student_log_answer_val['answer'] == $student_log_answer_val['student_answer']) {
                                    $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['correct_cnt'] = $ques_cor_ans_cnt[$student_log_answer_val['student_log_id']][$student_log_answer_val['topic_id']]['correct_cnt'] + 1;
                                }
                            }
                        }
                    }
                }


                /*
                  echo "<pre>";
                  print_r($ques_cor_ans_cnt);
                  exit;
                 */

                /*
                  echo "<pre>";
                  print_r($stud_topic_order);

                  echo "<pre>";
                  print_r($stud_topic_logs);
                  exit;
                 * 
                 */
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="member-full-version-secttion">
            <div class="container">
                <div class="row">
                    <div class="span6">
                        <div class="member-banner">
                            <?php  foreach ($member_homes as $row) { ?>
                            <!--<img src="img/pic-examhorse-wishes.jpg" alt="member-banner" />-->
                            <img src="<?php echo BASE_URL . $row['banner_image']; ?>" alt="member-banner" />
                            <?php } ?>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="member-text-content" style="position: relative;background: url(img/pic-welcome-user.jpg)no-repeat;background-position: center;position: relative;background-size: cover;">
                            <div class="banner-padding">
                                <h4>Welcome <span><?php echo $login_student['student_name']; ?></span></h4>
                                <div class="start-quiz-btn">
                                    <a href="member-select-language" class="btn btn-green">PRACTICE TEST</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="span6">
                        <div class="member-banner">
                            <h3>News Feed</h3>
                            <?php foreach ($news_feeds as $data) { ?>
                            <div class="news-feed">
                                <div class="news-feed-img">
<!--                                    <img src="img/member-thumbs.jpg" alt="" />-->
                                    <img src="<?php echo BASE_URL . $data['image_path']; ?>" alt="" />
                                </div>
                                <div class="news-feed-content">
                                    <h4><?php echo $data['news_title']; ?></h4>
                                    <p><?php echo $data['description']; ?></p>
                                    <a href="https://youtu.be/OKCvgDpSp78">See the video</a>
                                </div>
                            </div>
                            <?php } ?>
<!--                            <div class="news-feed">
                                <div class="news-feed-img">
                                    <img src="img/member-thumbs.jpg" alt="" />
                                </div>
                                <div class="news-feed-content">
                                    <h4>Title Comes Here</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                                    <a href="https://youtu.be/OKCvgDpSp78">See the video</a>
                                </div>
                            </div>
                            <div class="news-feed">
                                <div class="news-feed-img">
                                    <img src="img/member-thumbs.jpg" alt="" />
                                </div>
                                <div class="news-feed-content">
                                    <h4>Title Comes Here</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                                    <a href="https://youtu.be/OKCvgDpSp78">See the video</a>
                                </div>
                            </div>-->
                        </div>
                    </div>
                    
                    <?php 
                    if (count($student_log) > 0) {
                      ?>  
                    <div class="span6">
                        <div class="member-text-content">
                            <h4 class="recent-scores">Your Recent Score</h4>

                            <?php
                            //if (count($student_log) > 0) {
                                if (isset($student_log_order['student_log_order']) && ($student_log_order['student_log_order'] == 1)) { //question order   
                                    ?>    
                                    <table class = 'full-member-table'>
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Year</th>
                                                <th>Total</th>
                                                <th>Answered</th>
                                                <th class="text-center"><i class="icon-ok-sign"></i></th>
                                                <th class="text-center"><i class="font-icon-remove-circle"></i></th>
                                            </tr>
                                        </thead>



                                        <tbody>
                                            <?php
                                            $log_year_val = '';
                                            if (isset($ans_log_year[$student_log['student_log_id']])) {
                                                $log_year_val = $ans_log_year[$student_log['student_log_id']][0];
                                            }


                                            $log_detail = $obj->selectRow('COUNT(student_log_detail_id) AS attended, IFNULL((SELECT COUNT(student_log_detail_id) FROM student_log_detail INNER JOIN question ON student_log_detail.question_id=question.question_id WHERE student_log_id=' . $student_log['student_log_id'] . ' AND UPPER(answer) = UPPER(student_answer)), 0) AS correct_answers', 'student_log_detail', 'student_log_id=' . $student_log['student_log_id']);
                                            $log_attended = $log_detail['attended'];
                                            $log_correct_answers = $log_detail['correct_answers'];
                                            ?>
                                            <tr>                 
                                                <td><?php echo date('d/m/Y', strtotime($student_log['created_at'])); ?></td>
                                                <td><?php echo $log_year_val; ?></td>
                                                <td><?php echo $student_log['total_questions']; ?></td>
                                                <td><?php echo $log_attended; ?></td>
                                                <td><?php echo $log_correct_answers; ?></td>
                                                <td><?php echo $log_attended - $log_correct_answers ?></td>

                                            </tr>



                                        </tbody>
                                    </table>

                                    <?php
                                }if (isset($student_log_order['student_log_order']) && ($student_log_order['student_log_order'] == 2)) { //subject order   
                                    ?>


                                    <table class = 'full-member-table' >
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Subject</th>
                                                <th>Topic</th>
                                                <th>Total</th>
                                                <th>Answered</th>
                                                <th><i class="icon-ok-sign"></i></th>
                                                <th><i class="font-icon-remove-circle"></i></th>
                                            </tr>
                                        </thead>



                                        <tbody>
                                            <?php
                                            foreach ($stud_topic_order as $stud_topic) {
                                                foreach ($stud_topic_logs[$stud_topic] as $log_id) {
                                                    if (isset($ques_year_cnt[$stud_topic])) {
                                                        ?>
                                                        <tr>                 
                                                            <td><?php echo $ques_cor_ans_cnt[$log_id][$stud_topic]['date']; ?></td>
                                                            <td><?php echo $ques_year_cnt[$stud_topic]['subject_name']; ?></td>
                                                            <td><?php echo $ques_year_cnt[$stud_topic]['topic_name']; ?></td>
                                                            <td><?php
                                                                if (isset($ques_year_cnt[$stud_topic]['count'])) {
                                                                    echo $ques_year_cnt[$stud_topic]['count'];
                                                                } else {
                                                                    echo '0';
                                                                }
                                                                ?></td>
                                                            <td><?php
                                                                if (isset($ques_cor_ans_cnt[$log_id][$stud_topic]['answerd_cnt'])) {
                                                                    echo $ques_cor_ans_cnt[$log_id][$stud_topic]['answerd_cnt'];
                                                                    $answered = $ques_cor_ans_cnt[$log_id][$stud_topic]['answerd_cnt'];
                                                                } else {
                                                                    echo '0';
                                                                    $answered = 0;
                                                                }
                                                                ?></td>    


                                                            <td><?php
                                                                if (isset($ques_cor_ans_cnt[$log_id][$stud_topic]['correct_cnt'])) {
                                                                    echo $ques_cor_ans_cnt[$log_id][$stud_topic]['correct_cnt'];
                                                                    $correct_cnt = $ques_cor_ans_cnt[$log_id][$stud_topic]['correct_cnt'];
                                                                } else {
                                                                    echo '0';
                                                                    $correct_cnt = 0;
                                                                }
                                                                ?></td>
                                                            <td><?php echo $answered - $correct_cnt; ?></td>




                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </tbody>   
                                    </table>


                                    <?php
                                }
                            //}
                            ?>



                            <a href="member-result" class="seemore-btn">See More</a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </div>
    <?php include 'script.php'; ?>
    <script type="text/javascript">
        $(document).ready(function () {
            var showHeaderAt = 150;
            var win = $(window),
                    body = $('body');
            // Show the fixed header only on larger screen devices
            if (win.width() > 600) {
                // When we scroll more than 150px down, we set the
                // "fixed" class on the body element.
                win.on('scroll', function (e) {
                    if (win.scrollTop() > showHeaderAt) {
                        body.addClass('fixed');
                    } else {
                        body.removeClass('fixed');
                    }
                });
            }
        });
    </script>
    <script>
        wow = new WOW(
                {
                    animateClass: 'animated',
                    offset: 100,
                    callback: function (box) {
                        console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                    }
                }
        );
        wow.init();
        document.getElementById('moar').onclick = function () {
            var section = document.createElement('section');
            section.className = 'section--purple wow fadeInDown';
            this.parentNode.insertBefore(section, this);
        };
    </script>
    <script type="text/javascript">
        $().ready(function () {
            $('.slick-carousel').slick({
                arrows: false,
                centerPadding: "0px",
                dots: true,
                slidesToShow: 1,
                infinite: false,
                autoplay: true,
            });
        });
    </script>
</body>
</html>
