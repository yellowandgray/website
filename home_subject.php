<?php 
require_once 'api/include/common.php';
$obj = new Common();
$subjects = $obj->selectAll('*', 'subject', 'subject_id > 0');
?>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <div id="wrapper">
            <?php include 'menu.php'; ?>
            <section id="content" class="subject-content">
                <div class="container-fluid">
                    <h4 class="heading">
                        <strong>Home Subjects</strong>
                    </h4>
                    <div class="row margin-auto">
                        <?php foreach ($subjects as $row) { ?>
                            <div class="span3 subject-section" onclick="window.location=''">
                                <div class="price">Entroll</div>
                                <div class="subject-1">
                                    <div class="subject-1-img" style="background: url(<?php echo BASE_URL . $subjects['image_path']; ?>)no-repeat;"></div>
                                </div>
                                <div class="subject-1-text">
                                    <h2><?php echo $row['name']; ?></h2>
                                    <p><?php echo $row['description']; ?></p>
                                    <button class="btn btn-theme margintop10" onclick="window.location='quiz_page'">SEE MORE...</button>
                                </div>
                            </div>
                        <?php } ?>
                        <!--<div class="span3 subject-section">
                            <div class="price">Entroll</div>
                            <div class="subject-1">
                                <div class="subject-1-img"></div>
                            </div>
                            <div class="subject-1-text">
                                <h2>English</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                <button class="btn btn-theme margintop10">SEE MORE...</button>
                            </div>
                        </div>
                        <div class="span3 subject-section">
                            <div class="price">Entroll</div>
                            <div class="subject-1">
                                <div class="subject-1-img"></div>
                            </div>
                            <div class="subject-1-text">
                                <h2>Maths</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                <button class="btn btn-theme margintop10">SEE MORE...</button>
                            </div>
                        </div>
                        <div class="span3 subject-section">
                            <div class="price">Entroll</div>
                            <div class="subject-1">
                                <div class="subject-1-img"></div>
                            </div>
                            <div class="subject-1-text">
                                <h2>Science</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                <button class="btn btn-theme margintop10">SEE MORE...</button>
                            </div>
                        </div>
                        <div class="span3 subject-section">
                            <div class="price">Entroll</div>
                            <div class="subject-1">
                                <div class="subject-1-img"></div>
                            </div>
                            <div class="subject-1-text">
                                <h2>Social Science</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                <button class="btn btn-theme margintop10">SEE MORE...</button>
                            </div>
                        </div>-->
                    </div>
                </div>
            </section>
            <?php include 'footer.php'; ?>
        </div>
        <?php include 'script.php'; ?>
    </body>
</html>