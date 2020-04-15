<?php
require_once 'api/include/common.php';
session_start();
$obj = new Common();
if (!isset($_SESSION['selected_subject_id'])) {
    header('Location: home_subject');
}

if (!isset($_SESSION['selected_chapter_id'])) {
    header('Location: home_subject');
}
$subject = $obj->selectRow('*', 'subject', 'subject_id=' . $_SESSION['selected_subject_id']);
$chapter = $obj->selectRow('*', 'chapter', 'chapter_id = ' . $_SESSION['selected_chapter_id'] );
$topic = $obj->selectRow('*', 'topic', 'name = \'' . $obj->escapeString($_GET['topic']) . '\' ORDER BY name ASC');
$subtopic = $obj->selectAll('*', 'sub_topic', 'sub_topic_id = ' . $subject['subject_id'] . ' ORDER BY name ASC');
//print_r($topic);
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <div id="wrapper">
            <?php include 'menu.php'; ?>
            <section id="featured-1">
                <div id="mySignin" tabindex="-1" aria-labelledby="mySigninModalLabel" aria-hidden="true">
                    <div class="modal styled">
                        <div class="modal-header login-section">
                            <a href="difficult_level?sub=<?php echo $subject['name']; ?>"><i class="font-icon-arrow-simple-left"></i></a>
                            <h4 id="mySigninModalLabel">
                                <table class="table-title">
                                    <tr>
                                        <td valign="top">Selected Subject</td>
                                        <td valign="top" class="w-5">:</td>
                                        <th valign="top"><?php echo $subject['name']; ?></th>
                                    </tr>
                                    <tr>
                                        <td valign="top">Selected Chapter</td>
                                        <td valign="top">:</td>
                                        <th valign="top"><?php echo $chapter['name']; ?></th>
                                    </tr>  
                                    <tr>
                                        <td valign="top">Selected Topic</td>
                                        <td valign="top">:</td>
                                        <th valign="top"><?php echo $topic['name']; ?></th>
                                    </tr>  
                                </table>
                            </h4>
                            <a class="home_link" href="home_subject">
                                <i class="icon-home"></i>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="language_section">
                                <?php if (count($subtopic) > 0) { ?>
                                    <p class="m-b-0 f-s-18 clr-g">Select Sub Topic</p>
                                    <ul>
                                        <?php foreach ($subtopic as $row) { ?>
                                            <li><i class="icon-double-angle-right"></i> 
                                                <a href="topic_page?chapter=<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>                                
                                <?php } else { ?>
                                    <div class="text-center no-count-page">
                                        <h6>No Chpter on This Subject</h6>
                                        <span onclick="window.location = 'home_subject'">Back to Home</span>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Reset Modal -->
            <?php include 'footer.php'; ?>
            <?php //include 'reset_password.php'; ?>
            <!-- end reset modal -->
        </div>
        <?php include 'script.php'; ?>
    </body>
</html>
