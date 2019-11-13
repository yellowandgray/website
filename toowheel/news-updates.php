<?php
if (!isset($_GET['type'])) {
    header('Location: ../index.php');
}
$type = $_GET['type'];
require_once 'api/include/common.php';
$obj = new Common();
$news = $obj->selectAll('n.*, m.name AS media, c.name AS club, ca.name AS category', 'news AS n LEFT JOIN media AS m ON m.media_id = n.media_id LEFT JOIN club AS c ON c.club_id = n.club_id LEFT JOIN category AS ca ON ca.category_id = n.category_id AND ca.category_id = c.category_id', 'n.news_id > 0 AND n.type = \'' . $type . '\' ORDER BY n.news_id DESC');
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="padding-top-108"></div>
        <div class="news-all" style="padding-top: 0px;padding-bottom: 0px">
            <div class="container">
                <!--                <div class="row">
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
                                </div>-->
                <h3>NEWS & UPDATES</h3>
                <div class="news-all-content">
                    <?php foreach ($news as $row) { ?>
                        <div class="row">
                            <div class="col-md-3">
                                 <div class="news-cover-image-bg" onClick="document.location.href = 'news?nid=<?php echo $row['news_id']; ?>'" style="background: url(<?php echo BASE_URL . $row['thumb_image']; ?>)no-repeat;background-repeat: no-repeat;background-position: top;background-size: cover; cursor: pointer; "></div>
<!--                                <img src="" alt="image" />-->
                            </div>
                            <div class="col-md-9">
                                <h4><a href="news?nid=<?php echo $row['news_id']; ?>"><?php echo $row['title']; ?></a></h4>
                                <span><?php echo $row['media']; ?> | <?php echo $row['author_name']; ?> | <?php echo date('M d, Y', strtotime($row['news_date'])); ?></span>
                                <p><?php echo nl2br($row['moto_text']); ?></p>
                                <br/>
                                <a href="news?nid=<?php echo $row['news_id']; ?>" class="all-news-button"> DISCOVER</a>
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