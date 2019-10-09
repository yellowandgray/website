<?php
if (!isset($_GET['nid'])) {
    header('Location: ../index.php');
}
$nid = $_GET['nid'];
require_once 'api/include/common.php';
$obj = new Common();
$news = $obj->selectRow('n.*, m.name AS media, c.name AS club, ca.name AS category', 'news AS n LEFT JOIN media AS m ON m.media_id = n.media_id LEFT JOIN club AS c ON c.club_id = n.club_id LEFT JOIN category AS ca ON ca.category_id = n.category_id AND ca.category_id = c.category_id', 'n.news_id = ' . $nid);
$releated_news = $obj->selectAll('n.*, m.name AS media, c.name AS club, ca.name AS category', 'news AS n LEFT JOIN media AS m ON m.media_id = n.media_id LEFT JOIN club AS c ON c.club_id = n.club_id LEFT JOIN category AS ca ON ca.category_id = n.category_id AND ca.category_id = c.category_id', 'n.category_id = ' . $news['category_id'] . ' AND n.type = \'' . $news['type'] . '\' AND n.news_id != ' . $news['news_id'] . ' ORDER BY RAND() LIMIT 3');
$similar_news = $obj->selectAll('n.*, m.name AS media, c.name AS club, ca.name AS category', 'news AS n LEFT JOIN media AS m ON m.media_id = n.media_id LEFT JOIN club AS c ON c.club_id = n.club_id LEFT JOIN category AS ca ON ca.category_id = n.category_id AND ca.category_id = c.category_id', 'n.type = \'' . $news['type'] . '\' AND n.category_id != ' . $news['category_id'] . ' ORDER BY RAND() LIMIT 4');
$type = $news['type'];
$news_gallery = $obj->selectAll('*', 'news_gallery', 'news_id = ' . $nid);
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="padding-top-108"></div>
        <div class="press-release">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img src="<?php echo BASE_URL . $news['cover_image']; ?>" alt="" class="news-cover-image" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row events-content">
                    <div class="col-md-8">
                        <p class="clb-bg clr-white"><?php echo $news['club_id'] != 0 ? $obj->charLimit($news['category'], 17) : $obj->charLimit($news['sponsor'], 14); ?></p>
                        <div class="events-main-content">
                            <span><?php echo $news['media']; ?> | <?php echo $news['author_name']; ?> | <?php echo date('M d, Y', strtotime($news['news_date'])); ?></span>
                            <div class="middle">
                                <div class="middle-1">
                                    <h2><?php echo $news['title']; ?></h2>
                                </div>
                                <div class="middle-2">
                                    <span class="twitter-share" data-js="twitter-share"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                                </div>
                                <div class="middle-2">
                                    <span class="facebook-share" data-js="facebook-share"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <strong><?php echo $news['moto_text']; ?></strong><br/><br/>
                            <p><?php echo $news['description_1']; ?></p>
                            <?php if (isset($news['banner_1']) && $news['banner_1'] != '') { ?>
                                <img src="<?php echo BASE_URL . $news['banner_1']; ?>" alt="" style="width: 100%" /><br/><br/>
                            <?php } ?>
                            <p><?php echo $news['description_2']; ?></p>
                            <?php if (isset($news['banner_2']) && $news['banner_2'] != '') { ?>
                                <img src="<?php echo BASE_URL . $news['banner_2']; ?>" alt="" style="width: 100%" /><br/><br/>
                            <?php } ?>
                            <?php if (isset($news['youtube_id']) && $news['youtube_id'] != '' && $news['youtube_id'] != null && $news['youtube_id'] != 'null' && $news['youtube_id'] != 'undefined') { ?>
                                <iframe src="http://www.youtube.com/embed/<?php echo $news['youtube_id']; ?>" style="width: 100%; height: auto;" frameborder="0" allowfullscreen></iframe><br/><br/>
                            <?php } ?>
                            <?php if (count($news_gallery) > 0) { ?>
                                <div class="news-gallery">
                                    <h3>Gallery</h3>
                                    <div class="row event-gallery-section">
                                        <?php foreach ($news_gallery as $row) { ?>
                                            <div class="col-md-3 col-sm-6">
                                                <img src="<?php echo BASE_URL . $row['media_path']; ?>" alt="" />
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?php foreach ($releated_news as $row) { ?>
                            <div class="side-news">
                                <span class="side-news-widget1"><span><?php echo $row['club_id'] != 0 ? $obj->charLimit($row['club'], 30) : $obj->charLimit($row['sponsor'], 30); ?></span></span>
                                <img src="<?php echo BASE_URL . $row['cover_image']; ?>" alt=" image" />
                                <h4><?php echo $row['title']; ?></h4>
                                <p><?php echo $row['moto_text']; ?></p>
                                <div class="button-1">
                                    <div class="eff-1"></div>
                                    <a href="news.php?nid=<?php echo $row['news_id']; ?>">Discover</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($similar_news as $row) { ?>
                        <div class="col-md-3">
                            <div class="events-upcoming">
                                <img src="<?php echo BASE_URL . $row['cover_image']; ?>" alt="" />
                                <div class="events-upcoming-content">
                                    <h4><?php echo $obj->charLimit($row['title'], 25); ?></h4>
                                    <p><?php echo $obj->charLimit($row['moto_text'], 120); ?></p>
                                    <center>
                                        <div class="button-8">
                                            <div class="eff-8"></div>
                                            <a href="news.php?nid=<?php echo $row['news_id']; ?>">Discover</a>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
        <script type="text/javascript">
            var twitterShare = document.querySelector('[data-js="twitter-share"]');

            twitterShare.onclick = function (e) {
                e.preventDefault();
                var twitterWindow = window.open('https://twitter.com/share?url=' + document.URL, 'twitter-popup', 'height=350,width=600');
                if (twitterWindow.focus) {
                    twitterWindow.focus();
                }
                return false;
            }

            var facebookShare = document.querySelector('[data-js="facebook-share"]');

            facebookShare.onclick = function (e) {
                e.preventDefault();
                var facebookWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + document.URL, 'facebook-popup', 'height=350,width=600');
                if (facebookWindow.focus) {
                    facebookWindow.focus();
                }
                return false;
            }
        </script>
    </body>
</html>
