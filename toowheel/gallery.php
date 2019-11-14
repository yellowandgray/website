<?php
if (!isset($_GET['type'])) {
    header('Location: ../index.php');
}
$type = $_GET['type'];
require_once 'api/include/common.php';
$obj = new Common();
$medias = $obj->selectAll('*', 'gallery', 'gallery_id > 0 AND type = \'' . $type . '\' AND media_type = \'' . $_GET['target'] . '\' ORDER BY gallery_id DESC');
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="padding-top-108"></div>
        <div class="container">
            <div class="gallery">
                <?php foreach ($medias as $media) { ?>
                    <div class="gallery__item">
                        <div class="embed">
                            <a href="<?php echo BASE_URL . $media['media_path']; ?>" class="html5lightbox" data-group="imagegroup">
                                <img src="<?php echo BASE_URL . $media['media_path']; ?>" />
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>