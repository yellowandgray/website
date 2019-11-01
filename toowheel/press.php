<?php
if (!isset($_GET['pid'])) {
    header('Location: ../index.php');
}
$pid = $_GET['pid'];
require_once 'api/include/common.php';
$obj = new Common();
$press_release = $obj->selectRow('p.*, m.name AS media', 'press_release AS p LEFT JOIN media AS m ON m.media_id = p.media_id', 'p.press_release_id = ' . $pid);
$releated_press_release = $obj->selectAll('p.*, m.name AS media', 'press_release AS p LEFT JOIN media AS m ON m.media_id = p.media_id', 'p.type = \'' . $press_release['type'] . '\' AND p.press_release_id != ' . $press_release['press_release_id'] . ' ORDER BY RAND() LIMIT 3');
$similar_press_release = $obj->selectAll('p.*, m.name AS media', 'press_release AS p LEFT JOIN media AS m ON m.media_id = p.media_id', 'p.type = \'' . $press_release['type'] . '\' ORDER BY RAND() LIMIT 4');
$type = $press_release['type'];
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="padding-top-108"></div>
        <div class="press-release">
            <div class="container-fluid container">
                <div class="row">
                    <div class="news-banner text-center club-press">
                        <img src="<?php echo BASE_URL . $press_release['cover_image']; ?>" alt="" />
                    </div>
                </div>
            </div>
            <div class="container events-main-content">
                <div class="row head-news">
                    <div class="side-news">
                         <span class="side-news-widget1"><span><?php echo $press_release['author_name']; ?></span></span>
                        <h2><?php echo $obj->charLimit($press_release['title'], 50); ?></h2>
                        <span><?php echo $press_release['media']; ?> | <?php echo $press_release['author_name']; ?> | <?php echo date('M d, Y', strtotime($press_release['press_release_date'])); ?></span>
                    </div>
                </div>
                <div class="row events-content">
                    <div class="col-md-8">
                        <div class="events-main-content">
                            <div class="middle">
                                <div class="middle">
                                    <div class="">
                                        <span class="twitter-share" data-js="twitter-share" style="float: left;"> <i class="fa fa-twitter" aria-hidden="true"></i> Tweet di Twitter</span>
                                        <span class="facebook-share" data-js="facebook-share" style="float: right;"><i class="fa fa-facebook" aria-hidden="true"></i>  Kongsikan di Facebook</span>
                                    </div>
                                </div>
                            </div>
                            <div class="middle">
                                <div class="middle-1">
                                    <h2><?php echo $press_release['title']; ?></h2>
                                    <span><?php echo $press_release['media']; ?> | <?php echo $press_release['author_name']; ?> | <?php echo date('M d, Y', strtotime($press_release['press_release_date'])); ?></span>
                                </div>
                            </div>
                            <p><?php echo nl2br($press_release['description_1']); ?></p>
                            <?php if (isset($press_release['banner_1']) && $press_release['banner_1'] != '') { ?>
                                <img src="<?php echo BASE_URL . $press_release['banner_1']; ?>" alt="" style="width: 100%" /><br/><br/>
                            <?php } ?>
                            <p><?php echo nl2br($press_release['description_2']); ?></p>
                            <?php if (isset($press_release['banner_2']) && $press_release['banner_2'] != '') { ?>
                                <img src="<?php echo BASE_URL . $press_release['banner_2']; ?>" alt="" style="width: 100%" /><br/><br/>
                            <?php } ?>
                            <?php if (isset($press_release['youtube_id']) && $press_release['youtube_id'] != '' && $press_release['youtube_id'] != null && $press_release['youtube_id'] != 'null' && $press_release['youtube_id'] != 'undefined') { ?>
                                <iframe src="http://www.youtube.com/embed/<?php echo $press_release['youtube_id']; ?>" style="width: 100%; height: auto;" frameborder="0" allowfullscreen></iframe><br/><br/>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?php foreach ($releated_press_release as $row) { ?>
                            <div class="side-news">
                                <span class="side-news-widget1"><span><?php echo $row['author_name']; ?></span></span>
                                <img src="<?php echo BASE_URL . $row['cover_image']; ?>" alt="" />
                                <h4><?php echo $row['title']; ?></h4>
                                <p><?php echo $obj->charLimit($row['description_1'], 275); ?></p>
                                <div class="button-1">
                                    <div class="eff-1"></div>
                                    <a href="press.php?pid=<?php echo $row['press_release_id']; ?>">Discover</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>


                <div class="row">
                    <?php foreach ($similar_press_release as $row) { ?>
                        <div class="col-md-3">
                            <div class="events-upcoming">
                                <img src="<?php echo BASE_URL . $row['cover_image']; ?>" alt="" />
                                <div class="events-upcoming-content">
                                    <h4><?php echo $obj->charLimit($row['title'], 25); ?></h4>
                                    <p><?php echo $obj->charLimit($row['description_1'], 120); ?></p>
                                    <center>
                                        <div class="button-8">
                                            <div class="eff-8"></div>
                                            <a href="press.php?pid=<?php echo $row['press_release_id']; ?>">Discover</a>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
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