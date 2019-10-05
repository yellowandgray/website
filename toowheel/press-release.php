<?php
if (!isset($_GET['type'])) {
    header('Location: ../index.php');
}
$type = $_GET['type'];
require_once 'api/include/common.php';
$obj = new Common();
$press_release = $obj->selectAll('p.*, m.name AS media', 'press_release AS p LEFT JOIN media AS m ON m.media_id = p.media_id', 'p.type = \'' . $type . '\' ORDER BY p.press_release_id DESC LIMIT 10');
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="padding-top-108"></div>
        <div class="press-release">
            <div class="container">
                <h3>PRESS RELEASE</h3>
                <div class="press-release-content">
                    <?php foreach ($press_release as $row) { ?>
                        <div class="border-bottom">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="<?php echo BASE_URL . $row['thumb_image']; ?>" alt="">
                                </div>
                                <div class="col-md-10">
                                    <h4><?php echo $row['title']; ?></h4>
                                    <span><?php echo $row['media']; ?> | <?php echo $row['author_name']; ?> | <?php echo date('M d, Y', strtotime($row['press_release_date'])); ?></span>
                                    <p><?php echo $row['description_1']; ?></p>
                                    <a href="press.php?pid=<?php echo $row['press_release_id']; ?>" class="press-download-button"> Read More</a>
                                    <br/>
                                    <br/>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php include 'social-media-embed.php'; ?>
        <?php include 'partners-logos.php'; ?>
        <?php include 'add-banner.php'; ?>
        <?php include 'footer.php'; ?>
    </body>
</html>