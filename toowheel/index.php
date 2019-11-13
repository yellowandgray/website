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
$news_star = $obj->selectRow('n.*, m.name AS media, c.name AS club, ca.name AS category', 'news AS n LEFT JOIN media AS m ON m.media_id = n.media_id LEFT JOIN club AS c ON c.club_id = n.club_id LEFT JOIN category AS ca ON ca.category_id = n.category_id AND ca.category_id = c.category_id', 'n.news_id > 0 AND n.type = \'' . $type . '\' AND n.isstar = 1 ORDER BY n.news_id DESC');
$news_flag = $obj->selectAll('n.*, m.name AS media, c.name AS club, ca.name AS category', 'news AS n LEFT JOIN media AS m ON m.media_id = n.media_id LEFT JOIN club AS c ON c.club_id = n.club_id LEFT JOIN category AS ca ON ca.category_id = n.category_id AND ca.category_id = c.category_id', 'n.news_id > 0 AND n.type = \'' . $type . '\' AND n.isflag = 1 ORDER BY n.news_id DESC');
$events = $obj->selectAll('e.*, c.name AS club, ca.name AS category', 'event AS e LEFT JOIN club AS c ON c.club_id = e.club_id LEFT JOIN category AS ca ON ca.category_id = e.category_id', 'e.event_id > 0 AND e.type = \'' . $type . '\' ORDER BY e.event_id DESC LIMIT 4');
$images = $obj->selectAll('*', 'gallery', 'gallery_id > 0 AND media_type = \'image\' AND type = \'' . $type . '\' ORDER BY gallery_id DESC');
$videos = $obj->selectAll('*', 'gallery', 'gallery_id > 0 AND media_type = \'video\' AND type = \'' . $type . '\' ORDER BY gallery_id DESC');
$press_release_menu = $obj->selectAll('p.*, m.name AS media', 'press_release AS p LEFT JOIN media AS m ON m.media_id = p.media_id', 'p.type = \'' . $type . '\' ORDER BY p.press_release_id DESC LIMIT 3');
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
                                <a href="news?nid=<?php echo $row['news_id']; ?>">
                                    <div class="home-news-thumb-hover">
                                        <div class="home-news-thumb-image" style="background: url(<?php echo BASE_URL . $row['thumb_image']; ?>)no-repeat;background-repeat: no-repeat;background-position: top;background-size: cover;"></div>
                                    </div>
                                </a>
    <!--                                <img src="<?php echo BASE_URL . $row['thumb_image']; ?>" alt="alt" />-->
                                <div class="discover-slider-content">
                                    <p class="clb-bg"><?php echo $row['club_id'] != 0 ? $obj->charLimit($row['club'], 14) : $obj->charLimit($row['sponsor'], 14) ?></p>
                                    <h2><?php echo $row['title']; ?></h2>
    <!--                                    <p><?php //echo $obj->charLimit($row['moto_text'], 60);            ?></p>-->

                                    <div class="discover-btn">
                                        <a href="news?nid=<?php echo $row['news_id']; ?>" class="discover-btn-home">DISCOVER</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="media-press-release pad-t-80">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 padding-lr-5">
                        <div class="news-img-01 news-01 height-one" onClick="document.location.href = 'news?nid=<?php echo $news_star['news_id']; ?>'">
                            <div class="news-home-flag-large" style="background: url(<?php echo BASE_URL . $row['cover_image']; ?>)no-repeat; background-position: center; background-size: cover; "></div>
                            <div class="news-01-cont">
                                <div class="position-ad">
                                    <span class="sponsor-bg"><?php echo $news_star['club_id'] != 0 ? $obj->charLimit($news_star['club'], 14) : $obj->charLimit($news_star['sponsor'], 14) ?></span>
                                    <h2><?php echo $news_star['title']; ?></h2>
                                    <p><?php echo $news_star['media']; ?> | <?php echo $news_star['author_name']; ?> | <?php echo date('M d, Y', strtotime($news_star['news_date'])); ?></p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <?php foreach ($news_flag as $row) { ?>
                                <div class="col-md-6 col-sm-6 col-xs-6 padding-lr-5">
                                    <div class="news-img-02 news-01 height-two" onClick="document.location.href = 'news?nid=<?php echo $row['news_id']; ?>'">
                                        <div class="news-home-flag" style="background: url(<?php echo BASE_URL . $row['cover_image']; ?>)no-repeat; background-position: center; background-size: cover; "></div>
                                        <div class=" news-02-cont">
                                            <div class="position-ad-01">
                                                <span class="sponsor-bg"><?php echo $row['club_id'] != 0 ? $obj->charLimit($row['club'], 14) : $obj->charLimit($row['sponsor'], 14) ?></span>
                                                <h2><?php echo $row['title']; ?></h2>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="media-press-release">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" onClick="document.location.href = 'press-release?type=<?php echo $type; ?>'">
                        <div class="media-bg" style="background: url(img/media-bg.jpg)no-repeat; background-position: left; background-size: cover;">
<!--                            <a href="press-release?type=<?php echo $type; ?>">
                                <img src="img/media-bg.jpg" alt="" />
                            </a>-->
                            <?php foreach ($press_release_menu as $row) { ?>
                                <div class="row margin-b-20 ">
                                    <!--                                    <div class="col-md-2">
                                                                            <div class="home-press-release-bg" style="background: url(<?php //echo BASE_URL . $row['thumb_image'];       ?>)no-repeat;background-position: center;background-size: cover;cursor: pointer;width: 100%;height: 150px;"></div>
                                                                        </div>-->
                                    <div class="col-md-12">
                                        <div class="press-width float-right">
                                            <h4><a href="press?pid=<?php echo $row['press_release_id']; ?>"><?php echo $row['title']; ?></a></h4>
                                            <span><?php echo $row['media']; ?> | <?php echo $row['author_name']; ?> | <?php echo date('M d, Y', strtotime($row['press_release_date'])); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <a href="press-release?type=<?php echo $type; ?>" class="btn-tranparent">
                            <span>ALL PRESS RELEASE</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-sm-12">
                        <div class="advertaisement-bg">
                            <a href="<?php echo $card_add_one['url']; ?>" target="_blank">
                                <img src="<?php echo BASE_URL . $card_add_one['image']; ?>" alt="" style="width: 100%;" />
                            </a>
                            <div class="icon-bg"><i class="fa fa-play" aria-hidden="true"></i></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-12">
                        <div class="advertaisement-bg">
                            <a href="<?php echo $card_add_two['url']; ?>" target="_blank">
                                <img src="<?php echo BASE_URL . $card_add_two['image']; ?>" alt="" style="width: 100%;" />
                            </a>
                            <div class="icon-bg"><i class="fa fa-play" aria-hidden="true"></i></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-12">
                        <div class="upcoming-events">
                            <h4>UPCOMING EVENTS</h4>
                        </div>
                        <?php foreach ($events as $row) { ?>
                            <div class="upcoming-events-bg">
                                <div class="row">
                                    <img class="home-upcoming" src="<?php echo BASE_URL . $row['thumb_image']; ?>" alt="" />
                                    <div class="content-detail">
                                        <h6><?php echo $obj->charLimit($row['title'], 38); ?></h6>
                                        <i class="fa fa-calendar" aria-hidden="true"></i><p> <?php echo date('M d, Y', strtotime($row['event_from_date'])); ?> to <?php echo date('M d, Y', strtotime($row['event_to_date'])); ?></p>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i><p> <?php echo $obj->charLimit($row['location'], 50); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div ><a href="events?type=<?php echo $type; ?>" class="btn-secondary">SEE MORE </a></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="photo-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h1>PHOTOS</h1>
                        <!--<div class="s-photo"><a href="gallery?type=<?php //echo $type;            ?>" class="btn-secondary">SEE MORE PHOTOS</a></div>-->
                    </div>
                </div>
            </div>
            <div class="margin-0">
                <div class="col-md-12">
                    <div class="row photo">

                        <?php if ($type == 'two_wheel') { ?>
                            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6" id="gPhoto">
                                <a href="<?php echo BASE_URL . $images[18]['media_path']; ?>" class="html5lightbox" title="<?php echo $images[18]['title']; ?> <?php echo $images[18]['description']; ?>" data-group="imagegroup"><img src="img/photo/001.jpg" alt="" class="img-responsive"/></a>
                                <h5 class="text-center">Toowheel Launch</h5>
                            </div>
                            <div class=" col-lg-2 col-md-4 col-sm-4 col-xs-6" id="gPhoto">
                                <a href="<?php echo BASE_URL . $images[33]['media_path']; ?>" class="html5lightbox" title="<?php echo $images[33]['title']; ?> <?php echo $images[33]['description']; ?>" data-group="imagegroup"><img src="img/photo/002.jpg" alt="" class="img-responsive"/></a>
                                <h5 class="text-center">Toowheel Launch</h5>
                            </div>
                            <div class=" col-lg-2 col-md-4 col-sm-4 col-xs-6" id="gPhoto">
                                <a href="<?php echo BASE_URL . $images[65]['media_path']; ?>" class="html5lightbox" title="<?php echo $images[65]['title']; ?> <?php echo $images[65]['description']; ?>" data-group="imagegroup"><img src="img/photo/003.jpg" alt="" class="img-responsive"/></a>
                                <h5 class="text-center">Toowheel Launch</h5>
                            </div>
                            <div class="col-lg-2  col-md-4 col-sm-4 col-xs-6" id="gPhoto">
                                <a href="<?php echo BASE_URL . $images[63]['media_path']; ?>" class="html5lightbox" title="<?php echo $images[63]['title']; ?> <?php echo $images[63]['description']; ?>" data-group="imagegroup"><img src="img/photo/004.jpg" alt="" class="img-responsive"/></a>
                                <h5 class="text-center">Toowheel Launch</h5>
                            </div>
                            <div class="col-lg-2  col-md-4 col-sm-4 col-xs-6" id="gPhoto">
                                <a href="<?php echo BASE_URL . $images[50]['media_path']; ?>" class="html5lightbox" title="<?php echo $images[50]['title']; ?> <?php echo $images[50]['description']; ?>" data-group="imagegroup"><img src="img/photo/005.jpg" alt="" class="img-responsive"/></a>
                                <h5 class="text-center">Toowheel Launch</h5>
                            </div>
                            <div class="col-lg-2  col-md-4 col-sm-4 col-xs-6" id="gPhoto">
                                <a href="<?php echo BASE_URL . $images[44]['media_path']; ?>" class="html5lightbox" title="<?php echo $images[44]['title']; ?> <?php echo $images[44]['description']; ?>" data-group="imagegroup"><img src="img/photo/006.jpg" alt="" class="img-responsive"/></a>
                                <h5 class="text-center">Toowheel Launch</h5>
                            </div>
                        <?php } else { ?>
                            <a href="<?php echo BASE_URL . $images[0]['media_path']; ?>" class="html5lightbox" title="<?php echo $images[0]['title']; ?> <?php echo $images[0]['description']; ?>" data-group="imagegroup"><img src="<?php echo BASE_URL . $configs['four_wheel_photos']; ?>" class="popup-img" alt="" /></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="video-img">
            <div class="container">
                <div class="flex-row">
                    <h1>VIDEOS</h1>
                    <!--<div class="s-photo"><a href="gallery?type=<?php //echo $type;            ?>" class="btn-secondary">SEE MORE VIDEOS</a></div>-->
<!--                    <div class="home-gallery video-section">
                        <?php if ($type == 'two_wheel') { ?>
                            <a href="<?php echo BASE_URL . $videos[0]['media_path']; ?>" class="html5lightbox" title="<?php echo $videos[0]['title']; ?> <?php echo $videos[0]['description']; ?>" data-group="videogroup"><img src="<?php echo BASE_URL . $configs['two_wheel_videos']; ?>" class="popup-img" alt="" /></a>
                        <?php } else { ?>
                            <a href="<?php echo BASE_URL . $videos[0]['media_path']; ?>" class="html5lightbox" title="<?php echo $videos[0]['title']; ?> <?php echo $videos[0]['description']; ?>" data-group="videogroup"><img src="<?php echo BASE_URL . $configs['four_wheel_videos']; ?>" class="popup-img" alt="" /></a>
                        <?php } ?>
                    </div>-->
                </div>
            </div>
            <div class="row margin-0 home-gallery video-section">
                <div class="col-md-12 pad-0" id="video-pic">
                    <div class="video-gallery">
                        <div class="column-1">
                            <div class="video-gal">
                                <img src="img/photo/007.jpg" alt="" class="img-responsive"/>
                                <video id="myVideo1" width="100%" height="500"  muted="">
                                    <source src="video/002.mp4" type="video/mp4">
                                </video>
                                <img  id="vimg01" src="img/photo/007.jpg" alt="" class="img-responsive popup-img"/>
                                <a href="video/002.mp4" class="html5lightbox" title="" data-group="videogroup"> <i class="fa fa-play-circle-o" aria-hidden="true"></i></a>
                                <div class="video-t-1" id="text-v">
                                    <h4>Toowheel</h4>
                                </div>
                            </div>
                        </div>
                        <div class="column-1">

                            <div class="video-gal">
                                <video id="myVideo3" width="100%" height="250" muted="" >
                                    <source src="video/004.mp4" type="video/mp4">
                                </video>
                                <img id="vimg02" src="img/photo/009.jpg" alt="" class="img-responsive"/>
                                <a href="video/004.mp4" class="html5lightbox" title="1st convoy arrival , stay tuned for official video . Thx to fan cam" data-group="videogroup"> <i  class="fa fa-play-circle-o" aria-hidden="true"></i></a>
                                <div class="video-t-1" id="text-v">
                                    <h4>1st convoy arrival , stay tuned for official video . Thx to fan cam </h4>
                                </div>
                            </div>
                            <div class="video-gal">
                                <video id="myVideo2" width="100%" height="250" muted="" >
                                    <source src="video/003.mp4" type="video/mp4">
                                </video>
                                <img id="vimg03" src="img/photo/008.jpg" alt="" class="img-responsive"/>
                                <a href="video/003.mp4" class="html5lightbox" title="2nd convoy , stay tuned for official video." data-group="videogroup"> <i  class="fa fa-play-circle-o" aria-hidden="true"></i></a>
                                <div class="video-t-1" id="text-v">
                                    <h4>2nd convoy , stay tuned for official video.</h4>
                                </div>
                            </div>
                        </div>
                        <div class="column-1">
                            <div class="video-gal">
                                <video id="myVideo4" width="100%" height="250" muted="">
                                    <source src="video/005.mp4" type="video/mp4">
                                </video>
                                <img id="vimg04" src="img/photo/010.jpg" alt="" class="img-responsive"/>
                                <a href="video/005.mp4" class="html5lightbox" title="3rd convoy in coming." data-group="videogroup"> <i  class="fa fa-play-circle-o" aria-hidden="true"></i></a>
                                <div class="video-t-1" id="text-v">
                                    <h4>3rd convoy in coming.</h4>

                                </div>
                            </div>
                            <div class="video-gal">
                                <video id="myVideo5" width="100%" height="250" muted="" >
                                    <source src="video/006.mp4" type="video/mp4">
                                </video>
                                <img id="vimg05" src="img/photo/011.jpg" alt="" class="img-responsive"/>
                                <a href="video/006.mp4" class="html5lightbox" title="Soft Launching Toowheel Group" data-group="videogroup"> <i onclick="playVid('myVideo1', 'vimg01')"  class="fa fa-play-circle-o" aria-hidden="true"></i></a>
                                <div class="video-t-1" id="text-v">
                                    <h4>Soft Launching Toowheel Group</h4>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                        list = list + '<div class="discover-slider"><a href="news?nid=' + val.news_id + '"><div class="home-news-thumb-hover"><div class="home-news-thumb-image" style="background: url(' + BASE_URL + val.thumb_image + ')no-repeat;background-repeat: no-repeat;background-position: top;background-size: cover;"></div></div></a><div class="discover-slider-content"><p class="clb-bg">' + charLimit(name, 10) + '</p><h2>' + val.title + '</h2><div class="discover-btn"><a href="news?nid=' + val.news_id + '" class="discover-btn-home">DISCOVER</a></div></div></div>';
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
