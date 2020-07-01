<?php
session_start();
include('free-register-check.php');
require_once 'api/include/common.php';
$obj = new Common();


if (!isset($_GET['lan'])) {
    header('Location: free-select-language');
}

$language = $obj->selectRow('*', 'language', 'name = \'' . $_GET['lan'] . '\'');
$_SESSION['student_selected_language_id'] = $language['language_id'];


$_SESSION['student_selected_type'] = 'subject';
/*
  $topics = $obj->selectAll('t.*, s.name AS subject', 'topic AS t LEFT JOIN subject AS s ON s.subject_id = t.subject_id', 's.language_id=' . $_SESSION['student_selected_language_id']);
  $alltopics = array();
  foreach ($topics as $row) {
  $alltopics[$row['subject']][] = $row;
  }
 * 
 */

$yid = array();
$years = $obj->selectAll('y.*', 'year As y', 'status = 1 ORDER BY y.year ASC LIMIT 3');
/*
  echo "<pre>";
  print_r($years);
  exit;
 */
foreach ($years as $y) {
    $yid[] = $y['year_id'];
}
if (count($yid) > 0) {
    $yids = implode(',', $yid);
}



//$subjects = $obj->selectAll('s.*','subject As s', 's.language_id=' . $_SESSION['student_selected_language_id']);
$subjects = $obj->selectAll('s.*,(select count(question_id) FROM question As q INNER JOIN topic As t ON q.topic_id=t.topic_id INNER JOIN subject As s1 ON s1.subject_id=t.subject_id WHERE s1.subject_id=s.subject_id AND q.year_id IN (' . $yids . ')) As ques_cnt', 'subject As s', 's.language_id=' . $_SESSION['student_selected_language_id']);
$language = $obj->selectRow('*', 'language', 'language_id=' . $_SESSION['student_selected_language_id']);
$counter = 0;
?>
<html lang="en">
    <?php include 'head_landing.php'; ?>
    <body>
        <div id="wrapper">
            <?php include 'menu_landing.php'; ?>
            <section id="featured-1">
                <div class="container">
                    <div class="select-language-section subject-box-section">
                        <div class="language-header">
                            <div class="float-left">
                                <a href="free-select-language">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                            </div>
                            <h4 class="text-center">
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
                                </table>
                            </h4>
                            <div class="float-right">
                                <a class="home_link" href="free-select-language">
                                    <i class="fa fa-home"></i>
                                </a>
                            </div>
                        </div>
                        <div class="subject-content">
                            <h6 class="sub-title" style="font-size: 20px;margin-bottom: 20px;"><i class="fa fa-book"></i> Select Subject</h6>
                            <div class="row">
                                <?php foreach ($subjects as $key => $row) { ?>                                     
                                    <div class="col-md-6">
                                        <div class="subject-section" onclick="goToTopics(<?php echo $row['subject_id']; ?>);">
                                            <div class="price">Exam Horse</div>
                                            <div class="subject-1">
                                                <div class="subject-1-img" style="background: url(<?php echo BASE_URL . $row['image_path']; ?>)no-repeat;"></div>
                                            </div>
                                            <div class="subject-1-text">
                                                <h2><?php echo $row['name']; ?> <br><span class="cls-orange">(<?php echo $row['ques_cnt']; ?> Questions)</span></h2>

                                                <p><?php echo $row['description']; ?></p>
                                                <button class="btn btn-theme margintop10" onclick="goToTopics(<?php echo $row['subject_id']; ?>);">SEE MORE...</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--                                    <li>
                                                                            <i class="icon-double-angle-right"></i>
                                                                            <a href="#" onclick="goToTopics(<?php echo $row['subject_id']; ?>);"><?php echo $row['name']; ?></span>(<?php echo $row['ques_cnt']; ?> Questions)</a>
                                                                        </li>         -->

                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include 'footer_landing.php'; ?>
        <?php include 'landing_script.php'; ?>
        <script type="text/javascript">
            var counter = <?php echo $counter; ?>;
            /*
             for (var j = 1; j <= counter; j++) {
             var option = j;
             window['checkboxes' + option] = document.querySelectorAll('input.subOption' + option),
             window['checkall' + option] = document.getElementById('option' + option);
             for (var i = 0; i < window['checkboxes' + option].length; i++) {
             window['checkboxes' + option][i].onclick = function () {
             window['checkedCount' + option] = document.querySelectorAll('input.subOption' + option + ':checked').length;
             window['checkall' + option].checked = window['checkedCount' + option] > 0;
             window['checkall' + option].indeterminate = window['checkedCount' + option] > 0 && window['checkedCount' + option] < window['checkboxes' + option].length;
             }
             }
             window['checkall' + option].onclick = function () {
             console.log(this);
             for (var i = 0; i < window['checkboxes' + option].length; i++) {
             window['checkboxes' + option][i].checked = this.checked;
             }
             }
             }
             * 
             */

            /*
             $('.childchk').change(function(){
             // create var for parent .checkall and group
             var group = $(this).data('chkgroup'),                
             checkall = $('.selectallchk[data-chkgroup="'+group+'"]');
             
             // do we have some checked? Some unchecked? Store as boolean variables
             var someChecked = $('.childchk[data-chkgroup="'+group+'"]:checkbox:checked').length > 0;
             var someUnchecked = $('.childchk[data-chkgroup="'+group+'"]:checkbox:not(:checked)').length > 0;
             
             // if we have some checked and unchecked, set .checkall, of the correct group, to indeterminate. 
             // If all are checked, set .checkall to checked
             checkall.prop("indeterminate", someChecked && someUnchecked);
             checkall.prop("checked", someChecked || !someUnchecked);
             
             // fire change() when this loads to ensure states are updated on page load
             }).change();
             
             // clicking .checkall will check all children in the same group.
             $('.selectallchk').click(function() {
             var group = $(this).data('chkgroup');
             $('.childchk[data-chkgroup="'+group+'"]').prop('checked', this.checked).change(); 
             });
             */

            function goToYears() {
                var subjects = [];
                $('.subjects').each(function (key, ele) {
                    if (ele.checked === true) {
                        subjects.push(ele.value);
                    }
                });
                if (subjects.length > 0) {
                    window.location = 'subject-topic?subjects=' + subjects.join(',');
                } else {
                    alert('Please select atleast one Subject');
                }
            }


            function goToTopics(sub) {
                window.location = 'free-select-topic?subjects=' + sub;
            }
        </script>
    </body>

</html>