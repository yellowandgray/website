<?php
require_once 'api/include/common.php';
$obj = new Common();
$configs = $obj->getHomeDetails();
$card_add_one = $obj->selectRow('url, image', 'advertisement', 'advertisement_id = ' . $configs['home_card_ad1']);
$card_add_two = $obj->selectRow('url, image', 'advertisement', 'advertisement_id = ' . $configs['home_card_ad2']);
$banner_add = $obj->selectRow('url, image', 'advertisement', 'advertisement_id = ' . $configs['home_banner_ad']);
$categories = $obj->selectAll('*', 'category', 'category_id > 0 AND type = \'two_wheel\'');
$news = $obj->selectAll('n.*, m.name AS media, c.name AS club, ca.name AS category', 'news AS n LEFT JOIN media AS m ON m.media_id = n.media_id LEFT JOIN club AS c ON c.club_id = n.club_id LEFT JOIN category AS ca ON ca.category_id = n.category_id AND ca.category_id = c.category_id', 'n.news_id > 0 AND n.type = \'two_wheel\' AND category_id = ' . $categories[0]['category_id']);
$galleries = $obj->selectAll('*', 'gallery', 'gallery_id > 0');
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
                        <img src="img/events/banner.jpg" alt="" style="width: 80%;" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row events-content">
                    <div class="col-md-8">
                        <p class="clb-bg clr-white">WFC</p>
                        <div class="events-main-content">
                            <span>Media | Author Name | 24-09-2019</span>
                            <div class="middle">
                                <div class="middle-1">
                                    <h2>NEWS TITLE COMES HERE</h2>
                                </div>
                                <div class="middle-2">
                                    <span class="twitter-share" data-js="twitter-share"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                                </div>
                                <div class="middle-2">
                                    <span class="facebook-share" data-js="facebook-share"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </strong><br/><br/>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <img src="img/attachment-bg.jpg" alt="" style="width: 100%" /><br/><br/>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <div class="news-gallery">
                                <h3>Gallery</h3>
                                <div class="row event-gallery-section">
                                    <div class="col-md-3 col-sm-6">
                                        <img src="img/news/gallery/001.png" alt="" />
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <img src="img/news/gallery/002.png" alt="" />
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <img src="img/news/gallery/001.png" alt="" />
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <img src="img/news/gallery/002.png" alt="" />
                                    </div>
                                </div>
                                <div class="row event-gallery-section">
                                    <div class="col-md-3 col-sm-6">
                                        <img src="img/news/gallery/002.png" alt="" />
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <img src="img/news/gallery/001.png" alt="" />
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <img src="img/news/gallery/002.png" alt="" />
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <img src="img/news/gallery/001.png" alt="" />
                                    </div>
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