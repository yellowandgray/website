<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
if (!isset($_SESSION['student_selected_language_id'])) {
    header('Location: select_language');
}
$_SESSION['student_selected_type'] = 'subject';
/*
$topics = $obj->selectAll('t.*, s.name AS subject', 'topic AS t LEFT JOIN subject AS s ON s.subject_id = t.subject_id', 's.language_id=' . $_SESSION['student_selected_language_id']);
$alltopics = array();
foreach ($topics as $row) {
    $alltopics[$row['subject']][] = $row;
}
 * 
 */

//$subjects = $obj->selectAll('s.*','subject As s', 's.language_id=' . $_SESSION['student_selected_language_id']);
$subjects = $obj->selectAll('s.*,(select count(question_id) FROM question As q INNER JOIN topic As t ON q.topic_id=t.topic_id INNER JOIN subject As s1 ON s1.subject_id=t.subject_id WHERE s1.subject_id=s.subject_id) As ques_cnt','subject As s', 's.language_id=' . $_SESSION['student_selected_language_id']);
$language = $obj->selectRow('*', 'language', 'language_id=' . $_SESSION['student_selected_language_id']);
$counter = 0;
?>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <div id="wrapper">
            <?php include 'menu.php'; ?>
            <section id="featured-1">
                <div id="mySignin" tabindex="-1" aria-labelledby="mySigninModalLabel" aria-hidden="true">
                    <div class="modal styled">
                        <div class="modal-header login-section">
                            <a href="question-subject-order?lan=<?php echo $language['name']; ?>"><i class="font-icon-arrow-simple-left"></i></a>
                            <h4 id="mySigninModalLabel" class="text-center">
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
                            <a class="home_link" href="select_language">
                                <i class="icon-home"></i>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="language_section">
                                <h6 class="sub-title">Select subject</h6>
                                <?php 
                                /*
                                <ul class="subject-section-order">
                                    <?php
                                    foreach ($subjects as $key => $row) {
                                        $counter++;
                                        ?>
                                        <li>
                                            <label class="pl-0"><input type="checkbox" class="subjects" data-chkgroup="option<?php echo $counter; ?>" value="<?php echo $row['subject_id']; ?>"><span class=""> <?php echo $row['name']; ?></span>(<?php echo $row['ques_cnt']; ?> Questions)</label>
                                            
                                        </li>
                                    <?php } ?>
                                </ul>
                                 * 
                                 */
                                ?>
                                <ul class="subject-section-order">
                                     <?php  foreach ($subjects as $key => $row) { ?>                                     

                                    <li>
                                        <i class="icon-double-angle-right"></i>
                                        <a href="#" onclick="goToTopics(<?php echo $row['subject_id']; ?>);"><?php echo $row['name']; ?></span>(<?php echo $row['ques_cnt']; ?> Questions)</a>
                                    </li>         
                                   
                                    <?php } ?>
                                </ul>
                                
                                
                            </div>
                            <?php 
                            /*
                            <div class="text-right">
                                <a href="#" onclick="goToYears();" class="btn btn-danger">Next</a>
                            </div>
                             * */
                             
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include 'footer.php'; ?>
        <?php include 'script.php'; ?>
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
               window.location = 'subject-topic?subjects=' + sub;                 
            }
        </script>
    </body>

</html>