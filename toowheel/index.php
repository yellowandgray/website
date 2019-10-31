<?php
if (!isset($_GET['type'])) {
    header('Location: ../index.php');
}
$type = $_GET['type'];
require_once 'api/include/common.php';
$obj = new Common();
$configs = $obj->getHomeDetails();
$card_add_one = $obj->selectRow('url, image', 'advertisement', 'advertisement_id = ' . $configs['home_card_ad1']);
$card_add_two = $obj->selectRow('url, image', 'advertisement', 'advertisement_id = ' . $configs['home_card_ad2']);
$banner_add = $obj->selectRow('url, image', 'advertisement', 'advertisement_id = ' . $configs['home_banner_ad']);
$categories = $obj->selectAll('*', 'category', 'category_id > 0 AND type = \'' . $type . '\'');
$news = $obj->selectAll('n.*, m.name AS media, c.name AS club, ca.name AS category', 'news AS n LEFT JOIN media AS m ON m.media_id = n.media_id LEFT JOIN club AS c ON c.club_id = n.club_id LEFT JOIN category AS ca ON ca.category_id = n.category_id AND ca.category_id = c.category_id', 'n.news_id > 0 AND n.type = \'' . $type . '\' ORDER BY n.news_id DESC');
$events = $obj->selectAll('e.*, c.name AS club, ca.name AS category', 'event AS e LEFT JOIN club AS c ON c.club_id = e.club_id LEFT JOIN category AS ca ON ca.category_id = e.category_id', 'e.event_id > 0 AND e.type = \'' . $type . '\' ORDER BY e.event_id DESC LIMIT 4');
$images = $obj->selectAll('*', 'gallery', 'gallery_id > 0 AND media_type = \'image\' AND type = \'' . $type . '\' ORDER BY gallery_id DESC');
$videos = $obj->selectAll('*', 'gallery', 'gallery_id > 0 AND media_type = \'video\' AND type = \'' . $type . '\' ORDER BY gallery_id DESC');
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <section class="video-bg-banner">
            <video autoplay muted loop id="myVideo" playsinline>
                <?php if ($type == 'two_wheel') { ?>
                    <source src="<?php echo BASE_URL . $configs['home_banner_video']; ?>" type="video/mp4">
                <?php } else { ?>
                    <source src="<?php echo BASE_URL . $configs['home_banner_video_four_wheel']; ?>" type="video/mp4">
                <?php } ?>
            </video>
            <div class="video-overlay"></div>
        </section>
        <section class="bg-1">

            <div class="container">
                <h1>DISCOVER</h1>
                <div class="row cc">
                    <?php
                    foreach ($categories as $key => $val) {
                        ?>
                        <div class="tag-box tablink" onclick="openTag(event, <?php echo $val['category_id']; ?>, '<?php echo $type; ?>')">
                            <p><?php echo $val['name']; ?></p>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
            <div class=" container-fluid text-center">
                <span>DISCOVER</span>
            </div>
            <div id="club1" class="tagcontent">
                <div class="container-fluid">
                    <div class="slider">
                        <?php foreach ($news as $row) { ?>
                            <div class="discover-slider">
                                <img src="<?php echo BASE_URL . $row['thumb_image']; ?>" alt="alt" />
                                <div class="discover-slider-content">
                                    <p class="clb-bg"><?php echo $row['club_id'] != 0 ? $obj->charLimit($row['club'], 14) : $obj->charLimit($row['sponsor'], 14) ?></p>
                                    <h2><?php echo $obj->charLimit($row['title'], 20); ?></h2>
                                    <p><?php echo $obj->charLimit($row['moto_text'], 120); ?></p>
                                </div>
                                <div class="discover-btn">
                                    <a href="news.php?nid=<?php echo $row['news_id']; ?>" class="discover-btn-home">DISCOVER</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="media-press-release">
            <div class="container">
                <div class="col-md-12">
                    <div class="row news-01">
                        <div class="col-md-6">
                            <div class="news-01 height-one">
                                <img src="img/events/004.jpg" alt="" class="img-responsive-01"/>
                                <div class="news-01-cont">
                                    <p class="clb-bg"><?php echo $row['club_id'] != 0 ? $obj->charLimit($row['club'], 14) : $obj->charLimit($row['sponsor'], 14) ?></p>
                                    <h2><?php echo $obj->charLimit($row['title'], 20); ?></h2>
                                    <p>others  |  Mohan K Ramanujam  | Oct 09, 2019</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row" style="margin-bottom: 12px;">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="news-01 height-two">
                                        <img src="img/events/001.jpg" alt="" class="img-responsive-h"/>
                                        <div class=" news-01-cont">
                                            <p class="clb-bg"><?php echo $row['club_id'] != 0 ? $obj->charLimit($row['club'], 14) : $obj->charLimit($row['sponsor'], 14) ?></p>
                                            <h2><?php echo $obj->charLimit($row['title'], 20); ?></h2>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="news-01 height-two">
                                        <img src="img/events/003.jpg" alt="" class="img-responsive-h"/>
                                        <div class=" news-01-cont">
                                            <p class="clb-bg"><?php echo $row['club_id'] != 0 ? $obj->charLimit($row['club'], 14) : $obj->charLimit($row['sponsor'], 14) ?></p>
                                            <h2><?php echo $obj->charLimit($row['title'], 20); ?></h2>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-md-6 col-sm-6">
                                    <div class="news-01 height-two">
                                        <img src="img/events/005.jpg" alt="" class="img-responsive-h"/>
                                        <div class=" news-01-cont">
                                            <p class="clb-bg"><?php echo $row['club_id'] != 0 ? $obj->charLimit($row['club'], 14) : $obj->charLimit($row['sponsor'], 14) ?></p>
                                            <h2><?php echo $obj->charLimit($row['title'], 20); ?></h2>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="news-01 height-two">
                                        <img src="img/events/002.jpg" alt="" class="img-responsive-h"/>
                                        <div class=" news-01-cont">
                                            <p class="clb-bg"><?php echo $row['club_id'] != 0 ? $obj->charLimit($row['club'], 14) : $obj->charLimit($row['sponsor'], 14) ?></p>
                                            <h2><?php echo $obj->charLimit($row['title'], 20); ?></h2>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="media-press-release" onClick="document.location.href = 'press-release.php?type=<?php echo $type; ?>'">
            <div class="container">
                <div class="col-md-12">
                    <div class="media-bg">
                        <a href="press-release.php?type=<?php echo $type; ?>"><img src="img/media-bg.jpg" alt="" /></a>
                    </div>
                    <a href="press-release.php?type=<?php echo $type; ?>" class="btn-tranparent"><span>ALL PRESS RELEASE</span></a>
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
                                    <img class="home-upcoming" src="<?php echo BASE_URL . $row['thumb_image']; ?>" alt="" />
                                    <div class="content-detail">
                                        <h6><?php echo $obj->charLimit($row['title'], 38); ?></h6>
                                        <i class="fa fa-calendar" aria-hidden="true"></i><p> <?php echo date('M d, Y', strtotime($row['event_date'])); ?></p>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i><p> <?php echo $obj->charLimit($row['location'], 50); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div><a href="events.php?type=<?php echo $type; ?>" class="btn-secondary">SEE MORE</a></div>
                    </div>
                    </section>
                    <section class="photo-section">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1>PHOTOS</h1>
                                    <?php if ($type == 'two_wheel') { ?>
                                        <a href="<?php echo BASE_URL . $images[0]['media_path']; ?>" class="html5lightbox" title="<?php echo $images[0]['title']; ?> <?php echo $images[0]['description']; ?>" data-group="imagegroup"><img src="<?php echo BASE_URL . $configs['two_wheel_photos']; ?>" class="popup-img" alt="" /></a>
                                    <?php } else { ?>
                                        <a href="<?php echo BASE_URL . $images[0]['media_path']; ?>" class="html5lightbox" title="<?php echo $images[0]['title']; ?> <?php echo $images[0]['description']; ?>" data-group="imagegroup"><img src="<?php echo BASE_URL . $configs['four_wheel_photos']; ?>" class="popup-img" alt="" /></a>
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
                    <?php if ($type == 'two_wheel') { ?>
                        <a href="<?php echo BASE_URL . $videos[0]['media_path']; ?>" class="html5lightbox" title="<?php echo $videos[0]['title']; ?> <?php echo $videos[0]['description']; ?>" data-group="videogroup"><img src="<?php echo BASE_URL . $configs['two_wheel_videos']; ?>" class="popup-img" alt="" /></a>
                    <?php } else { ?>
                        <a href="<?php echo BASE_URL . $videos[0]['media_path']; ?>" class="html5lightbox" title="<?php echo $videos[0]['title']; ?> <?php echo $videos[0]['description']; ?>" data-group="videogroup"><img src="<?php echo BASE_URL . $configs['four_wheel_videos']; ?>" class="popup-img" alt="" /></a>
                    <?php } ?>
                </div>
            </div>
        </section>
        <?php include 'social-media-embed.php'; ?>
        <?php include 'partners-logos.php'; ?>
        <?php include 'add-banner.php'; ?>
        <?php include 'footer.php'; ?>
        <script src="js/ninja-slider.js" type="text/javascript"></script>
        <script src="js/ninjaVideoPlugin.js" type="text/javascript"></script>
        <?php
        foreach ($images as $key => $img) {
            if ($key != 0) {
                ?>
                <a style="display: none;" href="<?php echo BASE_URL . $img['media_path']; ?>" class="html5lightbox" title="<?php echo $img['title']; ?><br/><div><?php echo $img['description']; ?></div>" data-group="imagegroup">Image</a>
                <?php
            }
        }
        ?>
        <?php
        foreach ($videos as $key => $vid) {
            if ($key != 0) {
                ?>
                <a style="display: none;" href="<?php echo BASE_URL . $vid['media_path']; ?>" class="html5lightbox" title="<?php echo $vid['title']; ?><br/><div><?php echo $vid['description']; ?></div>" data-group="videogroup">Video</a>
                <?php
            }
        }
        ?>
        <script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
        <script>
            function lightbox(type) {
                var ninjaSldr = document.getElementById("ninja-slider");
                ninjaSldr.parentNode.style.display = "block";
                nslider.init();
                var fsBtn = document.getElementById("fsBtn");
                fsBtn.click();
            }
            function fsIconClick(isFullscreen, ninjaSldr) { //fsIconClick is the default event handler of the fullscreen button
                if (isFullscreen) {
                    ninjaSldr.parentNode.style.display = "none";
                }
            }
            $(".home-gallery").magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
            function charLimit(str, len) {
                if (str && str !== null && str !== 'null') {
                    if (str.length <= len) {
                        return str;
                    } else {
                        var y = str.substring(0, len) + '...';
                        return y;
                    }
                }
            }

            function openTag(evt, cid, type) {
                var i, tablink, remove = false;
                if (evt !== null) {
                    if ((evt.currentTarget.className).indexOf('active') !== -1) {
                        remove = true;
                    }
                    tablink = document.getElementsByClassName("tablink");
                    for (i = 0; i < tablink.length; i++) {
                        tablink[i].className = tablink[i].className.replace(" active", "");
                    }
                    if (remove == false) {
                        evt.currentTarget.className += " active";
                    } else {
                        cid = 0;
                    }
                }
                $.ajax({
                    type: "GET",
                    url: 'api/v1/get_news_by_category/' + cid + '/' + type,
                    success: function (data) {
                        $('.slider').slick('unslick');
                        $('#club1 .slider').empty();
                        var BASE_URL = 'https://www.toowheel.com/toowheel/api/v1/';
                        if (data.result.error === false) {
                            var list = '';
                            $.each(data.result.data, function (key, val) {
                                var name = val.sponsor;
                                if (val.club && val.club !== null && val.club !== 'null') {
                                    name = val.club;
                                }
                                list = list + '<div class="discover-slider"><img src="' + BASE_URL + val.thumb_image + '" alt="alt" /><div class="discover-slider-content"><p class="clb-bg">' + charLimit(name, 10) + '</p><h2>' + charLimit(val.title, 20) + '</h2><p>' + charLimit(val.moto_text, 120) + '</p><center><a href="news.php?nid=' + val.news_id + '" class="btn btn-primary">DISCOVER</a></center></div></div>';
                            });
                            $('#club1 .slider').html(list);
                            $('.slider').slick({
                                dots: true,
                                infinite: true,
                                speed: 500,
                                slidesToShow: 6,
                                slidesToScroll: 1,
                                autoplay: true,
                                autoplaySpeed: 2000,
                                arrows: true,
                                responsive: [{
                                        breakpoint: 1024,
                                        settings: {
                                            slidesToShow: 4,
                                            slidesToScroll: 1,
                                            dots: true,
                                            autoplay: true
                                        }
                                    },
                                    {
                                        breakpoint: 991,
                                        settings: {
                                            slidesToShow: 3,
                                            slidesToScroll: 1,
                                            dots: false,
                                            autoplay: true
                                        }
                                    },
                                    {
                                        breakpoint: 600,
                                        settings: {
                                            slidesToShow: 1,
                                            slidesToScroll: 1,
                                            dots: false,
                                            autoplay: true
                                        }
                                    },
                                    {
                                        breakpoint: 400,
                                        settings: {
                                            arrows: false,
                                            slidesToShow: 1,
                                            slidesToScroll: 1,
                                            dots: false,
                                            autoplay: true
                                        }
                                    }]
                            });
                        }
                    },
                    error: function (err) {
                        $('#club1 .slider').empty();
                    }
                });
            }
        </script>
    </body>
</html>
