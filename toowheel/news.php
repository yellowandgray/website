<?php
if (!isset($_GET['nid'])) {
    header('Location: ../index.php');
}
$nid = $_GET['nid'];
require_once 'api/include/common.php';
$obj = new Common();
$news = $obj->selectRow('n.*, m.name AS media, c.name AS club, ca.name AS category', 'news AS n LEFT JOIN media AS m ON m.media_id = n.media_id LEFT JOIN club AS c ON c.club_id = n.club_id LEFT JOIN category AS ca ON ca.category_id = n.category_id AND ca.category_id = c.category_id', 'n.news_id = ' . $nid);
$news_gallery = $obj->selectAll('*', 'news_gallery', 'news_id = ' . $nid);
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu_news.php'; ?>
        <div class="padding-top-108"></div>
        <div class="press-release">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img src="<?php echo BASE_URL . $news['cover_image']; ?>" alt="" style="width: 80%;" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row events-content">
                    <div class="col-md-8">
                        <p class="clb-bg clr-white"><?php echo $news['category']; ?></p>
                        <div class="events-main-content">
                            <span><?php echo $news['media']; ?> | <?php echo $news['author_name']; ?> | <?php echo $news['news_date']; ?></span>
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
                            <img src="<?php echo BASE_URL . $news['banner_1']; ?>" alt="" style="width: 100%" /><br/><br/>
                            <p><?php echo BASE_URL . $news['description_2']; ?></p>
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
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!--                        <div class="side-news">
                                                    <span class="side-news-widget1"><span>WFC</span></span>
                                                    <img src="img/events/001.jpg" alt="" />
                                                    <h4>TITLE COMES HERE</h4>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                                                    <div class="button-1">
                                                        <div class="eff-1"></div>
                                                        <a href="#">Discover</a>
                                                    </div>
                                                </div>-->
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