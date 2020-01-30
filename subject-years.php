<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
if (!isset($_GET['topics'])) {
    header('Location: subject');
}
$_SESSION['student_selected_topics_id'] = $_GET['topics'];
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
                            <h4 id='mySigninModalLabel' class='text-center'><?php echo $language['name']; ?> - Question Order <br/> <strong class="title-section">Choose Year</strong></h4>
                        </div>
                        <div class='modal-body'>
                            <div class='year_select_section'>
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