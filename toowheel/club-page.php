<?php
if (!isset($_GET['cid'])) {
    header('Location: ../index.php');
}
$cid = $_GET['cid'];
require_once 'api/include/common.php';
$obj = new Common();
$club = $obj->selectRow('*', 'club', 'club_id = ' . $cid);
$type = $club['type'];
$announcements = $obj->selectAll('*', 'announcement', 'club_id = ' . $cid . ' LIMIT 3');
$events = $obj->selectAll('*', 'event', 'club_id = ' . $cid . ' LIMIT 3');
$news = $obj->selectAll('n.*, c.name AS club', 'news AS n LEFT JOIN club AS c ON c.club_id = n.club_id', 'n.club_id = ' . $cid . ' LIMIT 3');
$images = $obj->selectAll('media_path', 'club_gallery', 'club_id = ' . $cid);
$ad = $obj->selectRow('*', 'advertisement', 'type = \'card\' RAND() LIMIT 1');
$club_type = '2 WHEEL CLUB';
if ($type == 'four_wheel') {
    $club_type = '4 WHEEL CLUB';
}
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="club-pad-top-108"></div>
        <section>
            <div class="container sec-club-logo">
                <div class="row">
                    <img src="<?php echo BASE_URL . $club['cover_image']; ?>" alt="Club Cover Imge" class="club-cover-image" />
                    <div class="col-lg-12">
                        <div class="row w-text club-cover-overlay">
                            <div class="w-text-con">
                                <h2 class="text-center"><?php echo $club['name']; ?></h2>
                            </div>
                            <div class="w-text-con">
                                <div class="w-img-con club-logo">
                                    <div class="club-view-logo" style="background: url(<?php echo BASE_URL . $club['logo']; ?>)no-repeat;background-position: center;background-size: cover;"></div>
<!--                                    <img src="" alt=""/>-->
                                </div>
                            </div>
                            <div class="w-text-con">
                                <h5 class="text-center"><?php echo $club_type; ?></h5>
                            </div>
                        </div>
                        <div class="row w-text-1 club-cover-overlay1">
                            <div class="w-text-con-1">
                                <div class="row">
                                    <?php if ($club['rank'] && $club['rank'] != 0) { ?>
                                        <div class="col-md-3">
                                            <p><i class="fa fa-signal" aria-hidden="true"></i> #<?php echo $club['rank']; ?></p>
                                        </div>
                                    <?php } ?>
                                    <div class="col-md-3">
                                        <p><i class="fa fa-users" aria-hidden="true"></i> <?php echo $club['no_of_member']; ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $club['city']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-text-con-1">
                                <div class="row">
                                    <!--                                    <div class="col-md-5">
                                                                            <p><a onclick="document.getElementById('about-club').classList.add('club-about')" style="cursor: pointer;">About</a></p>
                                                                            <div id="about-club">
                                                                                <p onclick="document.getElementById('about-club').classList.remove('club-about')">
                                                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                                                </P>
                                                                                <h1>About Club</h1>
                                                                                <p><?php echo $club['about']; ?></p>
                                                                            </div>
                                                                        </div>-->
                                    <div class="col-xl-12 col-md-12">
                                        <li class="w-icon">
                                            <?php if ($club['facebook_link'] && $club['facebook_link'] != '') { ?>
                                                <a href="<?php echo $club['facebook_link']; ?>" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                                            <?php } ?>
                                            <?php if ($club['youtube_link'] && $club['youtube_link'] != '') { ?>
                                                <a href="<?php echo $club['youtube_link']; ?>" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>                                            
                                            <?php } ?>
                                            <?php if ($club['twitter_link'] && $club['twitter_link'] != '') { ?>
                                                <a href="<?php echo $club['twitter_link']; ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <?php } ?>
                                            <?php if ($club['instagram_link'] && $club['instagram_link'] != '') { ?>
                                                <a href="<?php echo $club['instagram_link']; ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                            <?php } ?>
                                        </li>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="fs-gal-view">
                <h1></h1>
                <img class="fs-gal-prev fs-gal-nav" src="img/prev.svg" alt="Previous picture" title="Previous picture" />
                <img class="fs-gal-next fs-gal-nav" src="img/next.svg" alt="Next picture" title="Next picture" />
                <img class="fs-gal-close" src="img/close.svg" alt="Close gallery" title="Close gallery" />
                <img class="fs-gal-main" src="" alt="" />
            </div>
            <!--pop-up-gallery-->

        </section>
        <div class="club-details event-section club-cover-overlay2">
            <div class="container ">
                <div class="row">
                    <div class="col-lg-8 col-xl-8 col-md-8">
                        <div class="about-myclub">
                            <h1>About Club</h1>
                            <p><?php echo $club['about']; ?></p>
                            <hr>
                        </div>
                        <div class="myclub-news">
                            <?php if (count($news) > 0) { ?>
                                <h1>News & Updates</h1>
                                <div class="row">
                                    <?php foreach ($news as $row) { ?>
                                        <div class="col-xl-4 col-md-4 col-sm-4 discover-slider">
                                            <a href="news?nid=<?php echo $row['news_id']; ?>">
                                                <div class="home-news-thumb-hover">
                                                    <div class="home-news-thumb-image" style="background: url(<?php echo BASE_URL . $row['cover_image']; ?>)no-repeat;background-repeat: no-repeat;background-position: top;background-size: cover;"></div>
                                                </div>
                                            </a>
                                            <div class="discover-slider-content">
                                                <p class="clb-bg"><?php echo $row['club_id'] != 0 ? $obj->charLimit($row['club'], 14) : $obj->charLimit($row['sponsor'], 14) ?></p>
                                                <h2>
                                                    <a href="news?nid=<?php echo $row['news_id']; ?>"><?php echo $row['title']; ?></a>
                                                </h2>           

                                                <!--<div class="discover-btn">
                                                        <a href="news?nid=<?php echo $row['news_id']; ?>" class="discover-btn-home">DISCOVER</a>
                                                    </div>-->
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="member-gird">
                            <h1>Member</h1>
                            <div class="row">
                                <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                                    <div class="chat-container">
                                        <img src="img/1.jpg" alt="Avatar" style="width:100%;">
                                        <h3>Member Questions 1</h3>
                                        <input type="text" name="answer" placeholder="Type Your Answer" />
                                        <i class="fa fa-paper-plane" aria-hidden="true" type="submit"></i>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                                    <div class="chat-container">
                                        <img src="img/1.jpg" alt="Avatar" style="width:100%;">
                                        <h3>Member Questions 1</h3>
                                        <input type="text" name="answer" placeholder="Type Your Answer" />
                                        <i class="fa fa-paper-plane" aria-hidden="true" type="submit"></i>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                                    <div class="chat-container">
                                        <img src="img/1.jpg" alt="Avatar" style="width:100%;">
                                        <h3>Member Questions 1</h3>
                                        <input type="text" name="answer" placeholder="Type Your Answer" />
                                        <i class="fa fa-paper-plane" aria-hidden="true" type="submit"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 box-anounce event-con">
                        <!--<div class="col-lg-12 col-mg-12">
                            <div class="calendar-wrapper">
                                <button id="btnPrev" type="button">Prev</button>
                                <button id="btnNext" type="button">Next</button>
                                <div id="divCal"></div>
                            </div>
                        </div>-->
                        <div class="event-con">
                            <?php if (count($announcements) > 0) { ?>
                                <div class="box-anounce">
                                    <h2>Announcements</h2>
                                    <?php foreach ($announcements as $row) { ?>
                                        <div class="anounce box-anounce-1">
                                            <div class="anounce-con">
                                                <img src="<?php echo BASE_URL . $row['thumb_image']; ?>" alt="" class="img-responsive"/>
                                            </div> 
                                            <div class="anounce-con">
                                                <h5><a>CLUB ADMIN</a></h5>
                                                <span><em><?php echo date('M d, Y', strtotime($row['announcement_date'])); ?></em></span>
                                                <h3><?php echo $row['title']; ?></h3>
                                                <p class="desc"><?php echo nl2br($row['description']); ?></p>
                                            </div>  
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="myclub-events">
                            <h1>Events & Activities</h1>
                            <?php foreach ($events as $row) { ?>
                                <div class="anounce box-anounce-1">
                                    <div class="anounce-con-1">
                                        <span class="date-myevent"><?php echo date('d', strtotime($row['event_from_date'])) ?></span>
                                        <span class="mon-myevent"><?php echo $row['event_date']; ?></span>
                                        <p class="text-center"><?php echo date('M', strtotime($row['event_from_date'])) ?></p>
                                    </div>  
                                    <div class="anounce-con-1">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <h5><a>CLUB ADMIN</a></h5>
                                            </div>
                                            <div class="col-md-7">
                                                <p class="float-right"><em><?php echo date('M d, Y', strtotime($row['event_from_date'])) ?> | <?php echo date('M d, Y', strtotime($row['event_to_date'])) ?></em></p>
                                            </div>
                                        </div>
                                        <h3><?php echo $row['title']; ?></h3>
                                        <p class="desc"><?php echo $row['description']; ?></p>
                                    </div>  
                                </div>
                            <?php } ?>
                        </div>
                        <div class="myclub-gallery">
                            <h1>Gallery</h1>
                            <?php if ($club['club_video'] && $club['club_video'] != '' && $club['club_video'] != 'undefined') { ?>
                                <video muted loop controls id="myVideo" class="img-responsive">
                                    <source src="<?php echo BASE_URL . $club['club_video']; ?>" type="video/mp4">
                                </video>
                            <?php } ?>
                            <div class="img-b-10px club-gallery">
                                <?php foreach ($images as $row) { ?>
                                    <img class="fs-gal" src="<?php echo BASE_URL . $row['media_path']; ?>" alt=""  data-url="<?php echo BASE_URL . $row['media_path']; ?>" class="img-responsive"/>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12 col-md-12">
                            <div class="img-box-ad">
                                <img src="<?php echo BASE_URL . $ad['image']; ?>" alt="" class="img-responsive"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="footer-sec">
                    <div class="footer-section fooetr-1">
                        <img src="img/footer-logo.png" alt=""/>
                    </div>
                    <div class="footer-section fooetr-2">
                        <ul class="footer__nav">
                            <li class="nav__item">
                                <a href="index?type=two_wheel" class="footer-text">2 Wheel</a>
                                <br/>
                                <a href="index?type=four_wheel" class="footer-text">4 Wheel</a>
                                <br/>
                                <a href="news-updates?type=<?php echo $type; ?>" class="footer-text">NEWS & MEDIA</a>
                                <br/>
                                <a href="events?type=<?php echo $type; ?>" class="footer-text">UPCOMING EVENTS</a>
                                <br/>
                                <a href="press-release?type=<?php echo $type; ?>" class="footer-text">PRESS RELEASE</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-section fooetr-3">
                        <ul class="footer__nav">
                            <li class="nav__item">
                                <h2 class="nav__title">MEMBERS</h2>
                                <ul class="nav__ul">
                                    <li>
                                        <a href="login?type=<?php echo $type; ?>">Login</a>
                                    </li>
                                    <li>
                                        <a href="member-register?type=<?php echo $type; ?>">Be A Member</a>
                                    </li>
                                    <li>
                                        <a href="member-benefits?type=<?php echo $type; ?>">Member Benefits</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="footer__nav">
                            <li class="nav__item">
                                <h2 class="nav__title">CLUB</h2>
                                <ul class="nav__ul">
                                    <li>
                                        <a href="find-a-club?type=<?php echo $type; ?>">Find A Club</a>
                                    </li>
                                    <li>
                                        <a href="club-register?type=<?php echo $type; ?>">Register My Club</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-section fooetr-4">
                        <ul class="footer__nav">
                            <li class="nav__item">
                                <h2 class="nav__title">TOOWHEEL</h2>
                                <ul class="nav__ul">
                                    <li>
                                        <a href="about?type=<?php echo $type; ?>">About us</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact us</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-section fooetr-5">
                        <ul class="footer__nav">
                            <li class="nav__item">
                                <h2 class="nav__title color-w">ALWAYS GET IN TOUCH</h2>
                                <span>Receive updates on our Upcoming Events</span>
                                <ul class="nav__ul" style="margin-top: 10px;">
                                    <li>
                                        <form onsubmit="return subscribeNewsLetter();">
                                            <input type="email" id="newsletter_email" name="newsletter_email" placeholder="Email Address" required="" />
                                            <button type="submit">submit</button>
                                        </form>
                                    </li>
                                    <li class="i-con text-center">
                                        <a href="https://www.facebook.com/Toowheel-Malaysia-102602757819930" target="_blank"><img src="img/social-icons/fb.png" alt="fb"></a>
                                        <a href="https://www.instagram.com/p/B2iG45lnGi-/" target="_blank"><img src="img/social-icons/insta.png" alt="fb"></a>
                                        <a href="https://twitter.com/@ToowheelM" target="_blank"><img src="img/social-icons/twitter.png" alt="fb"></a>
                                        <a href="https://www.youtube.com/channel/UCueyRbB52hjc0XUIqbkYxcg" target="_blank"><img src="img/social-icons/yt.png" alt="fb"></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/slick-slider_1.js" type="text/javascript"></script>
        <script src="js/rangeslider.min.js" type="text/javascript"></script>
        <script src="js/jquery.easing.min.js" type="text/javascript"></script>
        <script src="js/jquery.smartWizard_step_by.min.js" type="text/javascript"></script>
        <script src="js/html5lightbox.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
        <script src="js/fs-gal.js" type="text/javascript"></script>
        <script src="js/sweet-alert.min.js" type="text/javascript"></script>
        <script src="js/jquery.autocomplete.min.js" type="text/javascript"></script>
        <script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>
        <script src="js/jquery-shorten.js" type="text/javascript"></script>
        <script>
                                            function showTextPassword() {
                                                var x = document.getElementById("password");
                                                if (x.type === "password") {
                                                    x.type = "text";
                                                } else {
                                                    x.type = "password";
                                                }
                                            }
                                            function showTextPassword1() {
                                                var x = document.getElementById("cnfpassword");
                                                if (x.type === "password") {
                                                    x.type = "text";
                                                } else {
                                                    x.type = "password";
                                                }
                                            }
                                            function showTextPassword2() {
                                                var x = document.getElementById("confirm_password");
                                                if (x.type === "password") {
                                                    x.type = "text";
                                                } else {
                                                    x.type = "password";
                                                }
                                            }

                                            $(".toggle-password").click(function () {

                                                $(this).toggleClass("fa-eye-slash fa-eye");
                                                var input = $($(this).attr("toggle"));
                                                if (input.attr("type") == "password") {
                                                    input.attr("type", "text");
                                                } else {
                                                    input.attr("type", "password");
                                                }
                                            });
        </script>
        <script type="text/javascript">

            $(document).ready(function () {
                $('#close-btn').click(function () {
                    $('#search-menu-overlay').fadeOut();
                    $('#search-menu-btn').show();
                });
                $('#search-menu-btn').click(function () {
                    $(this).hide();
                    $('#search-menu-overlay').fadeIn();
                });
            });
        </script>
        <script type="text/javascript">
            function openNav() {
                document.getElementById("mySidenav").style.height = "100%";
                document.getElementById("mySidenav").style.top = "95px";
            }
            function closeNav() {
                document.getElementById("mySidenav").style.height = "0";
                document.getElementById("mySidenav").style.top = "-800px";
            }
            $(document).ready(function () {
                $('#nav-icon3').click(function () {
                    $(this).toggleClass('open');
                    if ($(this).hasClass('open')) {
                        openNav();
                    } else {
                        closeNav();
                    }
                });
                $('body').click(function () {
                    if (!$('#nav-icon3').hasClass('open')) {
                        closeNav();
                    }
                });
                // Step show event
                $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection, stepPosition) {
                    $('.sw-btn-next').removeClass('hidden');
                    $('.sw-btn-prev').removeClass('hidden');
                    if (stepNumber === 2) {
                        $('.sw-btn-next').addClass('hidden');
                    }
                    if (stepNumber === 0) {
                        $('#smartwizard').smartWizard("disabledSteps", 2);
                    }
                    if (stepNumber === 3) {
                        $('.sw-btn-next').addClass('hidden');
                        $('.sw-btn-prev').addClass('hidden');
                    }
                });

                // Toolbar extra buttons
                var btnFinish = $('<button></button>').text('Finish')
                        .addClass('btn btn-info')
                        .on('click', function () {
                            alert('Finish Clicked');
                        });
                var btnCancel = $('<button></button>').text('Cancel')
                        .addClass('btn btn-danger')
                        .on('click', function () {
                            $('#smartwizard').smartWizard("reset");
                        });

                // Please note enabling option "showStepURLhash" will make navigation conflict for multiple wizard in a page.
                // so that option is disabling => showStepURLhash: false

                // Smart Wizard 1
                $('#smartwizard').smartWizard({
                    selected: 0,
                    theme: 'arrows',
                    transitionEffect: 'fade',
                    showStepURLhash: false,
                    anchorClickable: false,
                    enableAllAnchors: false,
                    useURLhash: false,
                    anchorSettings: {
                        enableAnchorOnDoneStep: false
                    },
                    toolbarSettings: {toolbarPosition: 'both',
                        toolbarExtraButtons: [btnFinish, btnCancel]
                    }
                });
                $('#smartwizard_container').removeClass('hidden');
                $(".set > a").on("click", function () {
                    if ($(this).hasClass("active")) {
                        $(this).removeClass("active");
                        $(this)
                                .siblings(".content")
                                .slideUp(200);
                        $(".set > a i")
                                .removeClass("fa-minus")
                                .addClass("fa-plus");
                    } else {
                        $(".set > a i")
                                .removeClass("fa-minus")
                                .addClass("fa-plus");
                        $(this)
                                .find("i")
                                .removeClass("fa-plus")
                                .addClass("fa-minus");
                        $(".set > a").removeClass("active");
                        $(this).addClass("active");
                        $(".content").slideUp(200);
                        $(this)
                                .siblings(".content")
                                .slideDown(200);
                    }
                });
            });
            $.each(autocomplete_club, function (key, val) {
                autocomplete_suggestion.push({value: val.name, data: {category: 'Club', id: val.club_id}});
            });
            $.each(autocomplete_news, function (key, val) {
                autocomplete_suggestion.push({value: val.title, data: {category: 'News', id: val.news_id}});
            });
            $.each(autocomplete_press_release, function (key, val) {
                autocomplete_suggestion.push({value: val.title, data: {category: 'Press Release', id: val.press_release_id}});
            });
            $('.head-search').devbridgeAutocomplete({
                lookup: autocomplete_suggestion,
                minChars: 1,
                onSelect: function (suggestion) {
                    if (suggestion.data.category == 'News') {
                        window.location = 'news?nid=' + suggestion.data.id;
                    }
                    if (suggestion.data.category == 'Club') {
                        window.location = 'club-page?cid=' + suggestion.data.id;
                    }
                    if (suggestion.data.category == 'Press Release') {
                        window.location = 'press?pid=' + suggestion.data.id;
                    }
                },
                showNoSuggestionNotice: true,
                noSuggestionNotice: 'Sorry, no matching results',
                groupBy: 'category'
            });
            $("#open-logout").click(function (e) {
                console.log("test");
                e.stopPropagation();
                $("#logout-dropdown").show("fast");
            });
            $(document).click(function (e) {
                if (!(e.target.id === 'logout-dropdown')) {
                    $("#logout-dropdown").hide("fast");
                }
            });
            $("#open-logout1").click(function (e) {
                console.log("test");
                e.stopPropagation();
                $("#logout-dropdown1").show("fast");
            });
            $(document).click(function (e) {
                if (!(e.target.id === 'logout-dropdown1')) {
                    $("#logout-dropdown1").hide("fast");
                }
            });
        </script>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0"></script>
        <!--mega-menu-->
        <script>
            jQuery(document).ready(function ($) {
                $('.slider').slick({
                    dots: true,
                    infinite: true,
                    speed: 500,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    autoplay: false,
                    autoplaySpeed: 2000,
                    arrows: true,
                    responsive: [{
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                                arrows: true,
                                dots: false,
                                autoplay: false
                            }
                        },
                        {
                            breakpoint: 991,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                                arrows: true,
                                dots: false,
                                autoplay: false
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2,
                                arrows: false,
                                dots: false,
                                autoplay: false
                            }
                        },
                        {
                            breakpoint: 400,
                            settings: {
                                arrows: false,
                                slidesToShow: 2,
                                slidesToScroll: 2,
                                dots: false,
                                autoplay: false
                            }
                        }]
                });
            });
            var Cal = function (divId) {

                //Store div id
                this.divId = divId;

                // Days of week, starting on Sunday
                this.DaysOfWeek = [
                    'Sun',
                    'Mon',
                    'Tue',
                    'Wed',
                    'Thu',
                    'Fri',
                    'Sat'
                ];

                // Months, stating on January
                this.Months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

                // Set the current month, year
                var d = new Date();

                this.currMonth = d.getMonth();
                this.currYear = d.getFullYear();
                this.currDay = d.getDate();

            };

            // Goes to next month
            Cal.prototype.nextMonth = function () {
                if (this.currMonth == 11) {
                    this.currMonth = 0;
                    this.currYear = this.currYear + 1;
                } else {
                    this.currMonth = this.currMonth + 1;
                }
                this.showcurr();
            };

            // Goes to previous month
            Cal.prototype.previousMonth = function () {
                if (this.currMonth == 0) {
                    this.currMonth = 11;
                    this.currYear = this.currYear - 1;
                } else {
                    this.currMonth = this.currMonth - 1;
                }
                this.showcurr();
            };

            // Show current month
            Cal.prototype.showcurr = function () {
                this.showMonth(this.currYear, this.currMonth);
            };

            // Show month (year, month)
            Cal.prototype.showMonth = function (y, m) {

                var d = new Date()
                        // First day of the week in the selected month
                        , firstDayOfMonth = new Date(y, m, 1).getDay()
                        // Last day of the selected month
                        , lastDateOfMonth = new Date(y, m + 1, 0).getDate()
                        // Last day of the previous month
                        , lastDayOfLastMonth = m == 0 ? new Date(y - 1, 11, 0).getDate() : new Date(y, m, 0).getDate();


                var html = '<table>';

                // Write selected month and year
                html += '<thead><tr>';
                html += '<td colspan="7">' + this.Months[m] + ' ' + y + '</td>';
                html += '</tr></thead>';


                // Write the header of the days of the week
                html += '<tr class="days">';
                for (var i = 0; i < this.DaysOfWeek.length; i++) {
                    html += '<td>' + this.DaysOfWeek[i] + '</td>';
                }
                html += '</tr>';

                // Write the days
                var i = 1;
                do {

                    var dow = new Date(y, m, i).getDay();

                    // If Sunday, start new row
                    if (dow == 0) {
                        html += '<tr>';
                    }
                    // If not Sunday but first day of the month
                    // it will write the last days from the previous month
                    else if (i == 1) {
                        html += '<tr>';
                        var k = lastDayOfLastMonth - firstDayOfMonth + 1;
                        for (var j = 0; j < firstDayOfMonth; j++) {
                            html += '<td class="not-current">' + k + '</td>';
                            k++;
                        }
                    }

                    // Write the current day in the loop
                    var chk = new Date();
                    var chkY = chk.getFullYear();
                    var chkM = chk.getMonth();
                    if (chkY == this.currYear && chkM == this.currMonth && i == this.currDay) {
                        html += '<td class="today">' + i + '</td>';
                    } else {
                        html += '<td class="normal">' + i + '</td>';
                    }
                    // If Saturday, closes the row
                    if (dow == 6) {
                        html += '</tr>';
                    }
                    // If not Saturday, but last day of the selected month
                    // it will write the next few days from the next month
                    else if (i == lastDateOfMonth) {
                        var k = 1;
                        for (dow; dow < 6; dow++) {
                            html += '<td class="not-current">' + k + '</td>';
                            k++;
                        }
                    }

                    i++;
                } while (i <= lastDateOfMonth);

                // Closes table
                html += '</table>';

                // Write HTML to the div
                document.getElementById(this.divId).innerHTML = html;
            };

            // On Load of the window
            window.onload = function () {

                // Start calendar
                var c = new Cal("divCal");
                c.showcurr();

                // Bind next and previous button clicks
                getId('btnNext').onclick = function () {
                    c.nextMonth();
                };
                getId('btnPrev').onclick = function () {
                    c.previousMonth();
                };
            }

            // Get element by id
            function getId(id) {
                return document.getElementById(id);
            }
        </script>
        <script>
            jQuery(function ($) {
                $('.desc').shorten();
            });
        </script>
    </body>
</html>
