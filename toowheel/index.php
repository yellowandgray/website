<?php
require_once 'api/include/common.php';
$obj = new Common();
$configs = $obj->getHomeDetails();
$card_add_one = $obj->selectRow('url, image', 'advertisement', 'advertisement_id = ' . $configs['home_card_ad1']);
$card_add_two = $obj->selectRow('url, image', 'advertisement', 'advertisement_id = ' . $configs['home_card_ad2']);
$banner_add = $obj->selectRow('url, image', 'advertisement', 'advertisement_id = ' . $configs['home_banner_ad']);
$categories = $obj->selectAll('*', 'category', 'category_id > 0 AND type = \'two_wheel\'');
$news = $obj->selectAll('n.*, m.name AS media, c.name AS club, ca.name AS category', 'news AS n LEFT JOIN media AS m ON m.media_id = n.media_id LEFT JOIN club AS c ON c.club_id = n.club_id LEFT JOIN category AS ca ON ca.category_id = n.category_id AND ca.category_id = c.category_id', 'n.news_id > 0 AND n.type = \'two_wheel\' AND n.category_id = ' . $categories[0]['category_id'] . ' ORDER BY n.news_id DESC LIMIT 10');
$events = $obj->selectAll('e.*, c.name AS club, ca.name AS category', 'event AS e LEFT JOIN club AS c ON c.club_id = e.club_id LEFT JOIN category AS ca ON ca.category_id = e.category_id AND ca.category_id = c.category_id', 'e.event_id > 0 AND e.type = \'two_wheel\' ORDER BY e.event_id DESC LIMIT 3');
$images = $obj->selectAll('*', 'gallery', 'gallery_id > 0 AND media_type = \'image\' ORDER BY gallery_id DESC LIMIT 8');
$videos = $obj->selectAll('*', 'gallery', 'gallery_id > 0 AND media_type = \'video\' ORDER BY gallery_id DESC LIMIT 8');
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <section class="video-bg-banner">
            <video autoplay muted loop id="myVideo">
                <source src="<?php echo BASE_URL . $configs['home_banner_video']; ?>" type="video/mp4">
            </video>
            <div class="video-overlay"></div>
        </section>
        <section class="bg-1">
            <div class="container-fluid text-center">
                <span>DISCOVER</span>
            </div>
            <div class="container">
                <h1>DISCOVER</h1>
                <div class="row cc">
                    <?php
                    foreach ($categories as $key => $val) {
                        $cls = '';
                        if ($key == 0) {
                            $cls = 'active';
                        }
                        ?>
                        <div class="tag-box tablink <?php echo $cls; ?>" onclick="openTag(event, 'club1')">
                            <p><?php echo $val['name']; ?></p>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
            <div id="club1" class="tagcontent">
                <div class="container-fluid">
                    <div class="slider">
                        <?php foreach ($news as $row) { ?>
                            <div class="discover-slider">
                                <img src="<?php echo BASE_URL . $row['thumb_image']; ?>" alt="alt" />
                                <div class="discover-slider-content">
                                    <p class="clb-bg"><?php echo $row['club']; ?></p>
                                    <h2><?php echo $row['title']; ?></h2>
                                    <p><?php echo $row['moto_text']; ?></p>
                                    <center><a href="" class="btn btn-primary">DISCOVER</a></center>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="media-press-release">
            <div class="container">
                <div class="media-bg">
                    <a href="press-release.php" class="btn-tranparent"><span>ALL PRESS RELEASE</span></a>
                </div>
            </div>
        </section>
        <section class="section-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="advertaisement-bg">
                            <a href="<?php echo $card_add_one['url']; ?>" target="_blank">
                                <img src="<?php echo BASE_URL . $card_add_one['image']; ?>" alt="" style="width: 100%;" />
                            </a>
                            <div class="icon-bg"><i class="fa fa-play" aria-hidden="true"></i></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="advertaisement-bg">
                            <a href="<?php echo $card_add_two['url']; ?>" target="_blank">
                                <img src="<?php echo BASE_URL . $card_add_two['image']; ?>" alt="" style="width: 100%;" />
                            </a>
                            <div class="icon-bg"><i class="fa fa-play" aria-hidden="true"></i></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="upcoming-events">
                            <h4>UPCOMING EVENTS</h4>
                        </div>
                        <?php foreach ($events as $row) { ?>
                            <div class="upcoming-events-bg">
                                <div class="row">
                                    <img src="<?php echo BASE_URL . $row['thumb_image']; ?>" alt="" />
                                    <div class="content-detail">
                                        <h6><?php echo $row['title']; ?></h6>
                                        <i class="fa fa-calendar" aria-hidden="true"></i><p> <?php echo $row['event_date']; ?></p>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i><p> <?php echo $row['location']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div><a href="events.php" class="btn-secondary">SEE MORE</a></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="photo-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>PHOTOS</h1>
                        <div class="home-gallery video-section">
                            <?php foreach ($images as $row) { ?>
                                <a href="<?php echo BASE_URL . $row['media_path']; ?>" class="image">
                                    <img src="<?php echo BASE_URL . $row['media_path']; ?>" alt="alt" />
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="video-img">
            <div class="container">
                <div class="flex-row">
                    <h1>VIDEOS</h1>
                </div>
                <div class="home-gallery video-section">
                    <?php foreach ($videos as $row) { ?>
                        <video autoplay muted loop class="image">
                            <source src="<?php echo BASE_URL . $row['media_path']; ?>" type="video/mp4">
                        </video>
                    <?php } ?>
                </div>
            </div>
        </section>
        <section class="ptb-80 social-media-section">
            <div class="container">
                <div class="social-bg text-center"><span>SOCIAL MEDIA</span></div>
                <div class="row">
                    <div class="col-md-12">      
                        <h2>TOOWHEEL MOTORSPROT NETWORK</h2>
                    </div>
                    <div class="col-md-12">                       
                        <div class="row margin-top-30 social-icon">
                            <span class="fb"><img src="img/social-icons/fb.jpg"/></span>
                            <span class="yt"><img src="img/social-icons/yt.png"/></span>
                            <span class="twitter"><img src="img/social-icons/twitter.png"/></span>
                            <span class="insta"><img src="img/social-icons/insta.png"/></span>
                        </div>
                    </div>
                </div>
                <div class="row social-media-post-section">
                    <div class="col-md-4">
<!--                        <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FBikeRaceByTopFreeGames%2Fposts%2F1509211869182434&width=500" width="500" height="465" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>-->
                    </div>
                </div>
            </div>
        </section>
        <section class="partners-section">
            <div class="container">
                <h2>OUR PARTNERS</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-center">
                            <img src="img/partners/001.png" alt="" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <img src="img/partners/002.png" alt="" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <img src="img/partners/003.png" alt="" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-center">
                            <img src="img/partners/004.png" alt="" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <img src="img/partners/005.png" alt="" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <img src="img/partners/006.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="attachment-bg">
            <div class="container-fluid padding-lr-0">
                <a href="<?php echo $banner_add['url']; ?>" target="_blank"><img src="<?php echo BASE_URL . $banner_add['image']; ?>" alt="" style="width: 100%;" /></a>
            </div>
        </section>
        <?php include 'footer.php'; ?>
        <script src="js/ninja-slider.js" type="text/javascript"></script>
        <div style="display:none;">
            <div id="ninja-slider">
                <div class="slider-inner">
                    <ul>
                        <li>
                            <h4>TITLE COMES HERE</h4>
                            <a class="ns-img" href="https://live.staticflickr.com/65535/48691708073_da1f19f532.jpg"></a>
                            <div class="caption">
                                <a href="#" class="btn-secondary">SEE MORE PICTURES</a>
                                <!--                                <h3>Dummy Caption 1</h3>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus accumsan purus.</p>-->
                            </div>
                        </li>
                        <li>
                            <h4>TITLE COMES HERE</h4>
                            <a class="ns-img" href="https://live.staticflickr.com/65535/48692219917_a8971eb340.jpg"></a>
                            <div class="caption">
                                <a href="#" class="btn-secondary">SEE MORE PICTURES</a>
                            </div>
                        </li>
                        <li>
                            <h4>TITLE COMES HERE</h4>
                            <span class="ns-img" style="background-image:url(https://live.staticflickr.com/65535/48692219962_c4a486e64a.jpg);"></span>
                            <div class="caption">
                                <a href="#" class="btn-secondary">SEE MORE PICTURES</a>
                            </div>
                        </li>
                        <li>
                            <h4>TITLE COMES HERE</h4>
                            <a class="ns-img" href="https://live.staticflickr.com/65535/48692219992_5a7e2a5dbc.jpg"></a>
                            <div class="caption">
                                <a href="#" class="btn-secondary">SEE MORE PICTURES</a>
                            </div>
                        </li>
                        <li>
                            <h4>TITLE COMES HERE</h4>
                            <a class="ns-img" href="https://live.staticflickr.com/65535/48691708208_ffbeaf41a5.jpg"></a>
                            <div class="caption">
                                <a href="#" class="btn-secondary">SEE MORE PICTURES</a>
                            </div>
                        </li>
                    </ul>
                    <div id="fsBtn" class="fs-icon" title="Expand/Close"></div>
                </div>
            </div>
        </div>
        <script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
        <script>
                        function lightbox(idx) {
                            //show the slider's wrapper: this is required when the transitionType has been set to "slide" in the ninja-slider.js
                            var ninjaSldr = document.getElementById("ninja-slider");
                            ninjaSldr.parentNode.style.display = "block";

                            nslider.init(idx);

                            var fsBtn = document.getElementById("fsBtn");
                            fsBtn.click();
                        }

                        function fsIconClick(isFullscreen, ninjaSldr) { //fsIconClick is the default event handler of the fullscreen button
                            if (isFullscreen) {
                                ninjaSldr.parentNode.style.display = "none";
                            }
                        }
        </script>
        <script>
            $(".home-gallery").magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        </script>
        <script>
            function openTag(evt, clubName) {
                var i, tagcontent, tablink;
                tagcontent = document.getElementsByClassName("tagcontent");
                for (i = 0; i < tagcontent.length; i++) {
                    tagcontent[i].style.display = "none";
                }
                document.getElementById(clubName).style.display = "block";
                if (evt !== null) {
                    tablink = document.getElementsByClassName("tablink");
                    for (i = 0; i < tablink.length; i++) {
                        tablink[i].className = tablink[i].className.replace(" active", "");
                    }
                    evt.currentTarget.className += " active";
                }
            }
            setTimeout(function () {
                openTag(null, 'club1');
            }, 1000);
        </script>
    </body>
</html>
