<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
$courses = $obj->selectAll('*', 'course', 'course_id > 0');
?>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <div id="wrapper">
            <?php include 'menu.php'; ?>
            <section class="subject-content">
                <div class="container-fluid">
                    <h5 class="text-center" style="margin-bottom:0;margin-top:15px">
                        <!--<strong>10<sup>th</sup> STD State Board</strong>-->
                        <!--<strong><?php echo $login_student['standard']; ?></strong>-->
						<strong>Welcome to Feringo!!</strong>
                    </h5>
					 <h6 class="text-center" style="color:#1c75bc">                       
						<strong>Practice your exams in more innovative and efficient way!!</strong>
                    </h6>
                    <div class="row margin-auto">
                        <?php foreach ($courses as $row) { ?>
                            <div class="span3 subject-section" onclick="window.location = 'home_subject?course=<?php echo $row['name']; ?>'">
                                <div class="price">Feringo</div>
                                <div class="subject-1">
                                    <div class="subject-1-img" style="background: url(<?php echo BASE_URL . 'uploads/' . $row['course_id'] . '.jpg'; ?>)no-repeat;"></div>
                                </div>
                                <div class="subject-1-text">
                                    <h2><?php echo $row['name']; ?></h2>
									<p>Explore the subjects, chapters and topics andd practice the test in a very innovative and intereting method.</p>
                                    <button class="btn btn-theme margintop10">Select Subjects</button>
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