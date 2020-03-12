<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
if (!isset($_GET['topics'])) {
    header('Location: subject');
}
$_SESSION['student_selected_topics_id'] = $_GET['topics'];
$subj_topic = $obj->selectAll('t.*,s.name As subject',' topic AS t LEFT JOIN subject AS s ON s.subject_id = t.subject_id',' t.topic_id IN (' . $_SESSION['student_selected_topics_id'] . ')  ORDER BY subject_id, topic_id ASC');
//$topics = $obj->selectAll('t.*, s.name AS subject', 'topic AS t LEFT JOIN subject AS s ON s.subject_id = t.subject_id', 's.language_id=' . $_SESSION['student_selected_language_id']);
//$alltopics = array();
//foreach ($topics as $row) {
//    $alltopics[$row['subject']][] = $row;
//}


$sub_topic_val = '';
if(count($subj_topic)>0) {
   $sub_topic_arr = array();
    foreach($subj_topic as $val) {
            $sub_topic_arr[$val['subject']][] = $val['name'];
    }
    
    foreach($sub_topic_arr as $stak=>$stav) {
        if($sub_topic_val != '') {
            $sub_topic_val .= ', ';
        }
        $sub_topic_val .= $stak;
        $sub_topic_val .= ' ('.implode(', ',$stav).') ';
    }
 }

 

$years = $obj->selectAll('*', 'year', 'status = 1');
$language = $obj->selectRow('*', 'language', 'language_id=' . $_SESSION['student_selected_language_id']);
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
                            <a href='question-subject-order'><i class='font-icon-arrow-simple-left'></i></a>
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
                                        <th valign="top">Subject Order</th>
                                    </tr>
                                    <tr>
                                        <td valign="top">Selected Subject and Topic</td>
                                        <td valign="top" class="w-5">:</td>
                                        <th valign="top"><?php echo $sub_topic_val; ?></th>
                                    </tr>
                                </table>
                            </h4>
                        </div>
                        <div class='modal-body'>
                            <div class='year_select_section'>
                                <h6 class="sub-title">Select Year</h6>
                                <ul>
                                    <?php foreach ($years as $yr) { ?>
                                        <li>
                                            <input type="checkbox" class="suboptions" value="<?php echo $yr['year_id']; ?>" />
                                            <label><?php echo $yr['year']; ?></label>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <div class='text-right'>
                                    <a href='#' onclick="goToQuiz();" class='btn btn-danger'>Next</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Reset Modal -->
            <?php include 'reset_password.php';
            ?>
            <!-- end reset modal -->
        </div>
        <?php include 'script.php';
        ?>
        <script type="text/javascript">
            function goToQuiz() {
                var years = [];
                $('.suboptions').each(function (key, ele) {
                    if (ele.checked === true) {
                        years.push(ele.value);
                    }
                });
                if (years.length > 0) {
                    window.location = 'quiz_page?years=' + years.join(',');
                } else {
                    alert('Please select atleast one year');
                }
            }
        </script>
    </body>

</html>