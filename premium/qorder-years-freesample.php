<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();

if (!isset($_GET['lan'])) {
    header('Location: question-subject-order_freesample');
}

$language = $obj->selectRow('*', 'language', 'name = \'' . $_GET['lan'] . '\'');
$_SESSION['student_selected_language_id'] = $language['language_id'];
/*
if (!isset($_SESSION['student_selected_language_id'])) {
    header('Location: select_language');
}
*/


$language = $obj->selectRow('*', 'language', 'language_id=' . $_SESSION['student_selected_language_id']);
$_SESSION['student_selected_type'] = 'order';
$years = $obj->selectAll('y.*,(select count(question_id) FROM question As q INNER JOIN topic As t ON q.topic_id=t.topic_id INNER JOIN subject As s ON s.subject_id=t.subject_id WHERE q.year_id=y.year_id AND s.language_id='.$_SESSION['student_selected_language_id'].') As ques_cnt', 'year As y', 'status = 1 ORDER BY y.year ASC');
//echo "<pre>";    
//print_r($obj);
/*
$student_log_order_year = $obj->selectAll('sl.*,year.year', 'student_log sl LEFT JOIN student_log_order slo ON sl.student_log_id=slo.student_log_id LEFT JOIN student_log_year sly ON sly.student_log_id=sl.student_log_id LEFT JOIN year ON sly.year_id=year.year_id',
        'student_register_id=' . $_SESSION['student_register_id'] . ' AND sl.language_id=' . $_SESSION['student_selected_language_id'] . ' AND student_log_order=1  ORDER BY updated_at  DESC LIMIT 1');

$student_log_year = array();

if (count($student_log_order_year) > 0) {
    foreach ($student_log_order_year as $log_v) {
        //$log_detail = $obj->selectRow('COUNT(student_log_detail_id) AS attended, IFNULL((SELECT COUNT(student_log_detail_id) FROM student_log_detail WHERE student_log_id=' . $log_v['student_log_id'] . ' AND UPPER(answer) = UPPER(student_answer)), 0) AS correct_answers', 'student_log_detail', 'student_log_id=' . $log_v['student_log_id']);
        $log_detail = $obj->selectRow('COUNT(student_log_detail_id) AS attended, IFNULL((SELECT COUNT(student_log_detail_id) FROM student_log_detail INNER JOIN question ON student_log_detail.question_id=question.question_id  WHERE student_log_id=' . $log_v['student_log_id'] . ' AND UPPER(answer) = UPPER(student_answer)), 0) AS correct_answers', 'student_log_detail', 'student_log_id=' . $log_v['student_log_id']);
        
        $total_questions = $log_v['total_questions'];
        $attended = $log_detail['attended'];
        $log_id = $log_v['student_log_id'];
        $created_at = $log_v['created_at'];
        $updated_at = $log_v['updated_at'];

        if ($attended < $total_questions) {

            $student_log_year['year'] = $log_v['year'];
            $student_log_year['log_id'] = $log_id;
            $student_log_year['total_qustions'] = $total_questions;
            $student_log_year['attended'] = $attended;
            $student_log_year['created_at'] = $created_at;
            $student_log_year['updated_at'] = $updated_at;

            //$student_log_year[$log_v['year']][$log_id] =  array('total_qustions'=>$total_questions,'attended'=>$attended,'created_at'=>$created_at,'updated_at'=>$updated_at);
        }
    }
}
*/

?>
<!DOCTYPE html>
<html lang='en'>
    <?php include 'head.php';
    ?>

    <body>
        <div id='wrapper'>
            <?php include 'menu.php';
            ?>
            <section id='featured-1'>
                <div id='mySignin' tabindex='-1' aria-labelledby='mySigninModalLabel' aria-hidden='true'>
                    <div class='modal styled'>
                        <div class='modal-header login-section'>
                            <a href="question-subject-order?lan=<?php echo $language['name']; ?>"><i class='font-icon-arrow-simple-left'></i></a>
                            <h4 id='mySigninModalLabel' class='text-center'>
                                <table class="table-title">
                                    <tr>
                                        <td valign="top">Selected Language</td>
                                        <td valign="top" class="w-5">:</td>
                                        <th valign="top"><?php echo $language['name']; ?></th>
                                    </tr>
                                    <tr>
                                        <td valign="top">Selected Order</td>
                                        <td valign="top" class="w-5">:</td>
                                        <th valign="top">Year Order</th>
                                    </tr>
                                </table>
                            </h4>
                            <a class="home_link" href="select_language">
                                <i class="icon-home"></i>
                            </a>
                        </div>
                        <div class='modal-body'>
                            <div class='year_select_section'>
                                <h6 class="sub-title">Select Year</h6>
                                <ul class="list-none">
                                    <?php 
                                    $freeyears = 3;
                                    $y   = 0;
                                    ?>
                                    <?php foreach ($years as $row) { 
                                        if($y<3) {
                                        ?>
                                        <li>
                                            <i class="icon-double-angle-right"></i> <a href="quiz_page?year=<?php echo $row['year']; ?>"><?php echo $row['year']; ?> (<?php echo $row['ques_cnt']; ?> Questions)</a>
                                        </li>
    <?php
                                        }
                                        else {  ?>
                                        <li>
                                            <i class="icon-double-angle-right"></i><?php echo $row['year']; ?> (<?php echo $row['ques_cnt']; ?> Questions)                                        </li>
                           <?php        }
    /*
      if(isset($student_log_year[$row['year']]))
      {
      foreach($student_log_year[$row['year']] as $stud_log_id_val=>$student_log_year_v) {
      ?>
      <li>
      <i class="font-italic">Paused On <?php echo date('d/M/Y h:iA', strtotime($student_log_year_v['updated_at'])).' - '; ?> </i> <a href="quiz_page?year=<?php echo $row['year']; ?>&from_log=<?php echo $stud_log_id_val; ?>">Resume</a>
      </li>
      <?php

      }
      }
     * 
     */
    $y++;
}

/*
if (!empty($student_log_year)) { 
    ?>
                                        <li class="pause-content">
                                            Paused On <?php echo date('d/M/Y h:iA', strtotime($student_log_year['updated_at'])) . ' - '; ?>
                                            <a class="btn logout-btn nmlfont" href="quiz_page?year=<?php echo $student_log_year['year']; ?>&from_log=<?php echo $student_log_year['log_id']; ?>">Resume</a>
                                        </li>
                                    <?php } 
 * */ 
?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Reset Modal -->
            <?php include 'footer.php'; ?>

            <!-- end reset modal -->
        </div>
        <?php include 'script.php';
        ?>
    </body>

</html>