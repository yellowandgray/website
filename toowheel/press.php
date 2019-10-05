<?php
if (!isset($_GET['pid'])) {
    header('Location: ../index.php');
}
$pid = $_GET['pid'];
require_once 'api/include/common.php';
$obj = new Common();
$press_release = $obj->selectRow('p.*, m.name AS media', 'press_release AS p LEFT JOIN media AS m ON m.media_id = p.media_id', 'p.press_release_id = ' . $pid);
$type = $press_release['type'];
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
                        <img src="<?php echo BASE_URL . $press_release['cover_image']; ?>" alt="" style="width: 80%;" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row events-content">
                    <div class="col-md-8">
                        <div class="events-main-content">
                            <div class="middle">
                                <div class="middle-1">
                                    <h2><?php echo $press_release['title']; ?></h2>
                                    <span><?php echo $press_release['media']; ?> | <?php echo $press_release['author_name']; ?> | <?php echo date('M d, Y', strtotime($press_release['press_release_date'])); ?></span>
                                </div>
                                <div class="middle-2">
                                    <span class="twitter-share" data-js="twitter-share"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                                </div>
                                <div class="middle-2">
                                    <span class="facebook-share" data-js="facebook-share"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <p><?php echo $press_release['description_1']; ?></p>
                            <?php if (isset($press_release['banner_1']) && $press_release['banner_1'] != '') { ?>
                                <img src="<?php echo BASE_URL . $press_release['banner_1']; ?>" alt="" style="width: 100%" /><br/><br/>
                            <?php } ?>
                            <p><?php echo $press_release['description_2']; ?></p>
                            <?php if (isset($press_release['banner_2']) && $press_release['banner_2'] != '') { ?>
                                <img src="<?php echo BASE_URL . $press_release['banner_2']; ?>" alt="" style="width: 100%" /><br/><br/>
                            <?php } ?>
                            <?php if (isset($press_release['youtube_id']) && $press_release['youtube_id'] != '') { ?>
                                <iframe src="http://www.youtube.com/embed/<?php echo $press_release['youtube_id']; ?>" style="width: 100%; height: auto;" frameborder="0" allowfullscreen></iframe><br/><br/>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="side-news">
                            <span class="side-news-widget1"><span>WFC</span></span>
                            <img src="img/events/001.jpg" alt="" />
                            <h4>TITLE COMES HERE</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                            <div class="button-1">
                                <div class="eff-1"></div>
                                <a href="#">Discover</a>
                            </div>
                        </div>
                        <div class="side-news">
                            <span class="side-news-widget1"><span>WFC</span></span>
                            <img src="img/events/001.jpg" alt="" />
                            <h4>TITLE COMES HERE</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                            <div class="button-1">
                                <div class="eff-1"></div>
                                <a href="#">Discover</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="events-upcoming">
                            <img src="img/events/001.jpg" alt="" />
                            <div class="events-upcoming-content">
                                <h4>NEWS TITLE COMES HERE</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                                <center>
                                    <div class="button-8">
                                        <div class="eff-8"></div>
                                        <a href="#">Discover</a>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="events-upcoming">
                            <img src="img/events/002.jpg" alt="" />
                            <div class="events-upcoming-content">
                                <h4>NEWS TITLE COMES HERE</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                                <center>
                                    <div class="button-8">
                                        <div class="eff-8"></div>
                                        <a href="#">Discover</a>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="events-upcoming">
                            <img src="img/events/003.jpg" alt="" />
                            <div class="events-upcoming-content">
                                <h4>NEWS TITLE COMES HERE</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                                <center>
                                    <div class="button-8">
                                        <div class="eff-8"></div>
                                        <a href="#">Discover</a>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="events-upcoming">
                            <img src="img/events/004.jpg" alt="" />
                            <div class="events-upcoming-content">
                                <h4>NEWS TITLE COMES HERE</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                                <center>
                                    <div class="button-8">
                                        <div class="eff-8"></div>
                                        <a href="#">Discover</a>
                                    </div>
                                </center>
                            </div>
                        </div>
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