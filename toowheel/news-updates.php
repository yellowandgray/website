<?php
if (!isset($_GET['type'])) {
    header('Location: ../index.php');
}
$type = $_GET['type'];
require_once 'api/include/common.php';
$obj = new Common();
$type = $_GET['type'];
$news = $obj->selectAll('n.*, m.name AS media, c.name AS club, ca.name AS category', 'news AS n LEFT JOIN media AS m ON m.media_id = n.media_id LEFT JOIN club AS c ON c.club_id = n.club_id LEFT JOIN category AS ca ON ca.category_id = n.category_id AND ca.category_id = c.category_id', 'n.news_id > 0 AND n.type = \'' . $type . '\' ORDER BY n.news_id DESC');
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="padding-top-108"></div>
        <div class="news-all">
            <div class="container">
                <h3>ALL NEWS</h3>
                <div class="news-all-content">
                    <?php foreach ($news as $row) { ?>
                        <div class="row">
                            <div class="col-md-2">
                                <img src="<?php echo BASE_URL . $row['thumb_image']; ?>" alt="">
                            </div>
                            <div class="col-md-10">
                                <h4><?php echo $row['title']; ?></h4>
                                <span><?php echo $row['media']; ?> | <?php echo $row['author_name']; ?> | <?php echo date('M d, Y', strtotime($row['news_date'])); ?></span>
                                <p><?php echo $row['moto_text']; ?></p>
                                <a href="news.php?nid=<?php echo $row['news_id']; ?>" class="all-news-button"> DISCOVER</a>
                            </div>
                        </div>
                        <hr/>
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