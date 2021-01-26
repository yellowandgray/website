<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
if (!isset($_GET['course'])) {
    header('Location: home_course');
}
$course = $obj->selectRow('*', 'course', 'name = \'' . $_GET['course'] . '\'');
$subjects = $obj->selectAll('*', 'subject', 'subject_id > 0 AND status = 1 AND course_id = ' . $course['course_id']);
$_SESSION['selected_course_id'] = $course['course_id'];
$path = 'difficult_level';
if ($course['course_id'] == 2) {
    $path = 'select_book';
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
                            <div class="span3 subject-section" onclick="window.location = '<?php echo $path; ?>?sub=<?php echo $row['name']; ?>'">
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
                        <?php if ($course['course_id'] == 1) { ?>
                            <div class="span3 subject-section kanoli-top-25" onclick="window.location = 'thunaipaadam_kaanoli'">
                                <!-- <div class="price">Feringo</div> -->
                                <div class="subject-1">
                                    <div class="subject-1-img" style="background: url(img/thunaipaadam-thumb.jpg)no-repeat;"></div>
                                </div>
                                <div class="subject-1-text">
                                    <h2>பத்தாம் வகுப்பு தமிழ் துணைப்பாடம் -  காணொளிகள்</h2>
                                    <p>விரிவானம் இயல் 2, 3, 4, 5, 6, 7, 8, 9 முதலிய கதைகளை அனிமேஷன் வடிவத்தில் கண்டு ரசித்து படிக்கலாம்..</p>
                                    <button class="btn btn-theme margintop10" onclick="window.location = 'thunaipaadam_kaanoli'">See Videos...</button>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <?php include 'footer.php'; ?>
        </div>
        <?php include 'script.php'; ?>
    </body>
</html>