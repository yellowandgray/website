<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
if (!isset($_SESSION['student_selected_language_id'])) {
    header('Location: select_language');
}
$_SESSION['student_selected_type'] = 'subject';
$topics = $obj->selectAll('t.*, s.name AS subject', 'topic AS t LEFT JOIN subject AS s ON s.subject_id = t.subject_id', 's.language_id=' . $_SESSION['student_selected_language_id']);
$alltopics = array();
foreach ($topics as $row) {
    $alltopics[$row['subject']][] = $row;
}
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
                            <a href="question-subject-order"><i class="font-icon-arrow-simple-left"></i></a>
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
                        </div>
                        <div class="modal-body">
                            <div class="language_section">
                                <h6 class="sub-title">Selected subject and Topic</h6>
                                <ul class="subject-section-order">
                                    <?php
                                    foreach ($alltopics as $key => $row) {
                                        $counter++;
                                        ?>
                                        <li>
                                            <input type="checkbox" id="option<?php echo $counter; ?>"><label for="option<?php echo $counter; ?>" class=""> <?php echo $key; ?></label>
                                            <ul>
                                                <?php foreach ($row as $r) { ?>
                                                    <li><label class="pl-0"><input type="checkbox" name="suboptions[]" value="<?php echo $r['topic_id']; ?>" class="subOption<?php echo $counter; ?> suboptions"> <span><?php echo $r['name']; ?></span></label></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="text-right">
                                <a href="#" onclick="goToYears();" class="btn btn-danger">Next</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include 'script.php'; ?>
        <script type="text/javascript">
            var counter = <?php echo $counter; ?>;
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

            function goToYears() {
                var topics = [];
                $('.suboptions').each(function (key, ele) {
                    if (ele.checked === true) {
                        topics.push(ele.value);
                    }
                });
                if (topics.length > 0) {
                    window.location = 'subject-years?topics=' + topics.join(',');
                } else {
                    alert('Please select atleast one topic');
                }
            }
        </script>
    </body>

</html>