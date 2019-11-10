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
        <div class="press-release" style="padding-top: 0px;">
            <!--pop-up-gallery-->
            <div class="fs-gal-view">
                <h1></h1>
                <img class="fs-gal-prev fs-gal-nav" src="img/prev.svg" alt="Previous picture" title="Previous picture" />
                <img class="fs-gal-next fs-gal-nav" src="img/next.svg" alt="Next picture" title="Next picture" />
                <img class="fs-gal-close" src="img/close.svg" alt="Close gallery" title="Close gallery" />
                <img class="fs-gal-main" src="" alt="" />
            </div>
            <!--pop-up-gallery-->
            <div class="container-fluid container">
                <div class="row">
                    <div class="news-banner text-center">
                        <img src="<?php echo BASE_URL . $news['cover_image']; ?>" alt="" class="news-cover-image" />
                    </div>
                </div>
            </div>
            <div class="container events-main-content">
                <div class="row head-news">
                    <div class="side-news">
                        <span class="side-news-widget1"><span><?php echo $news['club_id'] != 0 ? $obj->charLimit($news['club'], 17) : $obj->charLimit($news['sponsor'], 14); ?></span></span>
                        <h1><?php echo $news['title']; ?></h1>
                        <span class="news-details-span">
                            <?php echo $news['media']; ?> | <?php echo $news['author_name']; ?> | <?php echo date('M d, Y', strtotime($news['news_date'])); ?>
                        </span>
                    </div>
                </div>
                <div class="row events-content" >
                    <div class="col-md-8" id="contentDiv">
                        <div class="middle" style="">
                            <div style="margin-bottom: 20px;">
                                <span class="twitter-share" data-js="twitter-share" style="float: left;"> <i class="fa fa-twitter" aria-hidden="true"></i> Twitter</span>
                                <span class="facebook-share" data-js="facebook-share" style="float: left;"><i class="fa fa-facebook" aria-hidden="true"></i>  Facebook</span>
                                <span class="pinterest-share" data-js="pinterest-share" style="float: right;"><i class="fa fa-pinterest-p" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <strong><?php echo nl2br($news['moto_text']); ?></strong><br/><br/>
                        <?php if (isset($news['banner_1']) && $news['banner_1'] != '') { ?>
                            <img src="<?php echo BASE_URL . $news['banner_1']; ?>" alt="" style="width: 100%" /><br/><br/>
                        <?php } ?>
                        <p id="tese"><?php echo nl2br($news['description_1']); ?></p>
                        <?php if (isset($news['banner_2']) && $news['banner_2'] != '') { ?>
                            <img src="<?php echo BASE_URL . $news['banner_2']; ?>" alt="" style="width: 100%" /><br/><br/>
                        <?php } ?>
                        <p><?php echo nl2br($news['description_2']); ?></p>
                        <p id="tese"><?php echo nl2br($news['description_3']); ?></p>
                        <?php if (isset($news['banner_3']) && $news['banner_3'] != '') { ?>
                            <img src="<?php echo BASE_URL . $news['banner_3']; ?>" alt="" style="width: 100%" /><br/><br/>
                        <?php } ?>
                        <p id="tese"><?php echo nl2br($news['description_4']); ?></p>
                        <?php if (isset($news['banner_4']) && $news['banner_4'] != '') { ?>
                            <img src="<?php echo BASE_URL . $news['banner_4']; ?>" alt="" style="width: 100%" /><br/><br/>
                        <?php } ?>
                        <?php if (isset($news['youtube_id']) && $news['youtube_id'] != '' && $news['youtube_id'] != null && $news['youtube_id'] != 'null' && $news['youtube_id'] != 'undefined') { ?>
                            <iframe src="https://www.youtube.com/embed/<?php echo $news['youtube_id']; ?>" style="width: 100%; height: auto;" frameborder="0" allowfullscreen></iframe><br/><br/>
                        <?php } ?>
                        <?php if (count($news_gallery) > 0) { ?>
                            <div class="news-gallery">
                                <h3>Gallery</h3>
                                <div class="row event-gallery-section">
                                    <?php foreach ($news_gallery as $row) { ?>
                                        <div class="col-md-3 col-sm-6">
                                            <img class="fs-gal" src="<?php echo BASE_URL . $row['media_path']; ?>" alt="" data-url="<?php echo BASE_URL . $row['media_path']; ?>"/>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <div class="sidecontent-search-section search">
                                <div class="search-1">
                                    <i class="fa fa-search" aria-hidden="true"></i><input placeholder='Search Here' type='search' class="head-search" autocomplete="off" />
                                </div>

                            </div>
                            <div class="section-title">
                                <h3>LIKE FACEBOOK KAMI</h3>
                            </div>
                            <div class="fb-01">
                                <div class="fb-page" data-href="https://www.facebook.com/Toowheel-Malaysia-102602757819930" data-tabs="timeline" data-width="" data-height="350px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                    <blockquote cite="https://www.facebook.com/Toowheel-Malaysia-102602757819930" class="fb-xfbml-parse-ignore">
                                        <a href="https://www.facebook.com/Toowheel-Malaysia-102602757819930">Toowheel Malaysia</a></blockquote>
                                </div>
                            </div>
                            <div class="fb-02">
                                <div class="fb-page" data-href="https://www.facebook.com/Toowheel-Malaysia-102602757819930" data-tabs="timeline" data-width="280px" data-height="350px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                    <blockquote cite="https://www.facebook.com/Toowheel-Malaysia-102602757819930" class="fb-xfbml-parse-ignore">
                                        <a href="https://www.facebook.com/Toowheel-Malaysia-102602757819930">Toowheel Malaysia</a></blockquote>
                                </div>
                            </div>
                            <div class="fb-03">
                                <div class="fb-page" data-href="https://www.facebook.com/Toowheel-Malaysia-102602757819930" data-tabs="timeline" data-width="210px" data-height="350px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                    <blockquote cite="https://www.facebook.com/Toowheel-Malaysia-102602757819930" class="fb-xfbml-parse-ignore">
                                        <a href="https://www.facebook.com/Toowheel-Malaysia-102602757819930">Toowheel Malaysia</a></blockquote>
                                </div>
                            </div>
                            <div class="fb-04">
                                <div class="fb-page" data-href="https://www.facebook.com/Toowheel-Malaysia-102602757819930" data-tabs="timeline" data-width="290px" data-height="350px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                    <blockquote cite="https://www.facebook.com/Toowheel-Malaysia-102602757819930" class="fb-xfbml-parse-ignore">
                                        <a href="https://www.facebook.com/Toowheel-Malaysia-102602757819930">Toowheel Malaysia</a></blockquote>
                                </div>
                            </div>
                            <div id="fb-root"></div>
                            <?php foreach ($releated_news as $row) { ?>
                                <div class="side-news">
                                    <span class="side-news-widget1">
                                        <span><?php echo $row['club_id'] != 0 ? $obj->charLimit($row['club'], 30) : $obj->charLimit($row['sponsor'], 30); ?></span>
                                    </span>
                                    <div class="press-cover-image-bg" style="background: url(<?php echo BASE_URL . $row['cover_image']; ?>)no-repeat;background-repeat: no-repeat;background-position: top;background-size: cover; "></div>
        <!--                                <img src="<?php //echo BASE_URL . $row['cover_image'];                   ?>" alt=" image" />-->
                                    <h4><?php echo $row['title']; ?></h4>
                                    <p><?php echo $obj->charLimit($row['moto_text'], 120); ?></p>
                                    <div class="button-1">
                                        <div class="eff-1"></div>
                                        <a href="news?nid=<?php echo $row['news_id']; ?>">Discover</a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 20px;">
                    <?php foreach ($similar_news as $row) { ?>
                        <div class="col-md-3">
                            <div class="events-upcoming">
                                <div class="press-cover-image-bg" style="background: url(<?php echo BASE_URL . $row['cover_image']; ?>)no-repeat;background-repeat: no-repeat;background-position: top;background-size: cover; "></div>
    <!--                                <img src="<?php //echo BASE_URL . $row['cover_image'];                    ?>" alt="" />-->
                                <div class="events-upcoming-content">
                                    <h4><?php echo $row['title']; ?></h4>
                                    <p><?php echo $obj->charLimit($row['moto_text'], 75); ?></p>
                                </div>
                                <center>
                                    <div class="button-8">
                                        <div class="eff-8"></div>
                                        <a href="news?nid=<?php echo $row['news_id']; ?>">Discover</a>
                                    </div>
                                </center>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v5.0"></script>
        <script src="js/sticky-sidebar-scroll.min.js" type="text/javascript"></script>
        <script type='text/javascript'>
            $(document).ready(function () {
                $.stickysidebarscroll("#sideslider", {offset: {top: 100, bottom: 200, width: 100}});
            });
            //        $(document).ready(function () {
            //            $(window).scroll(function () {
            //
            //                if ($(window).scrollTop() > 500) {
            //                    $('#sidebar').css('position', 'fixed');
            //                    $('#sidebar').css('top', '0');
            //                } else if ($(window).scrollTop() <= 500) {
            //                    $('#sidebar').css('position', '');
            //                    $('#sidebar').css('top', '');
            //                }
            //                if ($('#sidebar').offset().top + $("#sidebar").height() > $("#footer").offset().top) {
            //                    $('#sidebar').css('top', -($("#sidebar").offset().top + $("#sidebar").height() - $("#footer").offset().top));
            //                }
            //            });
            //        });
        </script>
        <script type="text/javascript">
            var twitterShare = document.querySelector('[data-js="twitter-share"]');

            twitterShare.onclick = function (e) {
                e.preventDefault();
                var twitterWindow = window.open('https://twitter.com/share?url=' + document.URL, 'twitter-popup', 'height=350,width=600');
                if (twitterWindow.focus) {
                    twitterWindow.focus();
                }
                return false;
            };

            var facebookShare = document.querySelector('[data-js="facebook-share"]');

            facebookShare.onclick = function (e) {
                e.preventDefault();
                var facebookWindow = window.open('https://www.facebook.com/sharer/sharer?u=' + document.URL, 'facebook-popup', 'height=350,width=600');
                if (facebookWindow.focus) {
                    facebookWindow.focus();
                }
                return false;
            };

            var pinterestShare = document.querySelector('[data-js="pinterest-share"]');

            pinterestShare.onclick = function (e) {
                e.preventDefault();
                var pinterestWindow = window.open('https://in.pinterest.com/pin/create/button/?url=' + document.URL, 'pinterest-popup', 'height=350,width=600');
                if (pinterestWindow.focus) {
                    pinterestWindow.focus();
                }
                return false;
            };
        </script>
        <script type="text/javascript">
            var modal = document.getElementById('pop-img');
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    </body>
</html>
