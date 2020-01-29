<?php 
session_start();
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
                            <div class="span3 subject-section" onclick="window.location='select_chapter?subject=<?php echo $row['name']; ?>'">
                                <div class="price">Entroll</div>
                                <div class="subject-1">
                                    <div class="subject-1-img" style="background: url(<?php echo BASE_URL . $row['image_path']; ?>)no-repeat;"></div>
                                </div>
                                <div class="subject-1-text">
                                    <h2><?php echo $row['name']; ?></h2>
                                    <p><?php echo $row['description']; ?></p>
                                    <button class="btn btn-theme margintop10" onclick="window.location='select_chapter'">SEE MORE...</button>
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