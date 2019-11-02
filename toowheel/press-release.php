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
                <div class="row">
                    <div class="col-md-8">
                        <div class="press-release-search">
                            <input type="text" name="press_release_search" placeholder="Search by Name" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="press-release-sort">
                            <select name="sort_by">
                                <option>Sort by</option>
                                <option>Name A-Z</option>
                                <option>Name Z-A</option>
                                <option>Created Date ASC</option>
                                <option>Created Date DESC</option>
                            </select>
                        </div>
                    </div>
                </div>
                <h3>PRESS RELEASE</h3>
                <div class="press-release-content">
                    <?php foreach ($press_release as $row) { ?>
                        <div class="border-bottom" style="margin-bottom: 10px;">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="<?php echo BASE_URL . $row['thumb_image']; ?>" alt="">
                                </div>
                                <div class="col-md-9">
                                    <h4><?php echo $row['title']; ?></h4>
                                    <span><?php echo $row['media']; ?> | <?php echo $row['author_name']; ?> | <?php echo date('M d, Y', strtotime($row['press_release_date'])); ?></span>
                                    <p><?php echo nl2br($row['description_1']); ?></p>
                                    <a href="press.php?pid=<?php echo $row['press_release_id']; ?>" class="press-download-button"> Read More</a>
                                    <br/>
                                    <br/>
                                </div>
                            </div>
                            <hr>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>