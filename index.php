<?php
session_start();
require_once 'toowheel/api/include/common.php';
$type = $_GET['type'];
$obj = new Common();
$configs = $obj->getLandingDetails();
$menu_member = $obj->selectRow('m.*, c.name AS club', 'member AS m LEFT JOIN club AS c ON c.club_id = m.club_id', 'm.member_id = ' . $_SESSION["member_id"]);
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-150934532-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-150934532-1');
        </script>
        <title>Toowheel - An automotive digital platform</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="TOOWHEEL.com Toowheel is an automotive digital platform combining Website, Content Management System, Ecommerce and E-Wallet, That centralized all two wheel and four-wheel motorsports activities and event in Malaysia. With alliance to all registered motor club from various standard, we manage to attract all motorsport enthusiast to support and fully utilize Toowheel platform services." />
        <meta name="keywords" content="Two Wheel Racing, Four Wheel Racing, Racing, Motor Sports, Motor Sports Activities, MALAYSIA SUPERBIKE CHAMPIONSHIP, Malaysia Autoshow, Member Registration, Club Registration, Online Shop" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="img/favicon.png" rel="shortcut icon"/>
        <!-- CSS -->
        <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="toowheel/css/sweet-alert.css" rel="stylesheet" type="text/css"/>
        <link href="css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <style>
            @font-face {
                font-family: "VenusRising";
                src: url("fonts/venus-rising/10496aa2f7e9295bdf45faca7f15a5aa.eot"); /* IE9*/
                src: url("fonts/venus-rising/10496aa2f7e9295bdf45faca7f15a5aa.eot?#iefix") format("embedded-opentype"), /* IE6-IE8 */
                    url("fonts/venus-rising/10496aa2f7e9295bdf45faca7f15a5aa.woff2") format("woff2"), /* chrome、firefox */
                    url("fonts/venus-rising/10496aa2f7e9295bdf45faca7f15a5aa.woff") format("woff"), /* chrome、firefox */
                    url("fonts/venus-rising/10496aa2f7e9295bdf45faca7f15a5aa.ttf") format("truetype"), /* chrome、firefox、opera、Safari, Android, iOS 4.2+*/
                    url("fonts/venus-rising/10496aa2f7e9295bdf45faca7f15a5aa.svg#VenusRising") format("svg"); /* iOS 4.1- */
            }
        </style>
    </head>
    <body class="main-wrapper">
        <section class="header slide slide-one" data-background="#0f0f0f">
            <div class="container inside">
                <div class="row">
                    <a href="index" class="logo"><img src='img/logo.png' alt=''></a>
                    <div class="header-login">
                        <?php
                        if (!isset($_SESSION["member_id"])) {
                            foreach ($menu_member as $row)
                                
                                ?>
                            <a href="toowheel/login?type=<?php echo $type; ?>" class="mob-noon login-button">
                                <i class="fa fa-user"></i> Login
                            </a>
                        <?php } else {
                            ?>
                            <span class="mob-noon login-button" id="open-logout">
                                <?php if (isset($menu_member['profile_picture']) && $menu_member['profile_picture'] == '') { ?>
                                    <img src="<?php echo BASE_URL . $menu_member['gender']; ?>.jpg" alt="" />
                                <?php } else { ?>
                                    <img src="<?php echo BASE_URL . $menu_member['profile_picture']; ?>" alt="" />
                                <?php } ?>
                                <div id="logout-dropdown" class="logout-dropdown">
                                    <div class="header-logout row">
                                        <div class="col-xl-3 col-sm-3 padding-lr-0">
                                            <div class="member-profile-radius">
                                                <?php if (isset($menu_member['profile_picture']) && $menu_member['profile_picture'] == '') { ?>
                                                    <img src="<?php echo BASE_URL . $menu_member['gender']; ?>.jpg" alt="" />
                                                <?php } else { ?>
                                                    <img src="<?php echo BASE_URL . $menu_member['profile_picture']; ?>" alt="" />
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-xl-9 col-sm-9 padding-lr-0">
                                            <h3><?php echo $menu_member['first_name']; ?> <?php echo $menu_member['last_name']; ?></h3>
                                            <span><?php echo $menu_member['email_id']; ?></span>
                                        </div>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="toowheel/my-account?type=<?php echo $type; ?>">
                                                <i class="fa fa-user" aria-hidden="true"></i> Profile</a>
                                        </li>
                                        <li>
                                            <a href="#" onclick="logoutUser();">
                                                <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </span>
                        <?php }
                        ?>
                        <?php
                        if (!isset($_SESSION["member_id"])) {
                            foreach ($menu_member as $row)
                                
                                ?>
                            <a href="toowheel/login?type=<?php echo $type; ?>" class="mob-block">
                                <span class="login-button">
                                    <i class="fa fa-user"></i>
                                </span>
                            </a>
                        <?php } else {
                            ?>
                            <span class="mob-block" id="open-logout1">
                                <?php if (isset($menu_member['profile_picture']) && $menu_member['profile_picture'] == '') { ?>
                                    <img src="<?php echo BASE_URL . $menu_member['gender']; ?>.jpg" alt="" />
                                <?php } else { ?>
                                    <img src="<?php echo BASE_URL . $menu_member['profile_picture']; ?>" alt="" />
                                <?php } ?>
                            </span>
                            <div id="logout-dropdown1" class="logout-dropdown1">
                                <div class="header-logout row">
                                    <div class="col-xl-3 col-sm-3 padding-lr-0">
                                        <div class="member-profile-radius">
                                            <?php if (isset($menu_member['profile_picture']) && $menu_member['profile_picture'] == '') { ?>
                                                <img src="<?php echo BASE_URL . $menu_member['gender']; ?>.jpg" alt="" />
                                            <?php } else { ?>
                                                <img src="<?php echo BASE_URL . $menu_member['profile_picture']; ?>" alt="" />
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-sm-9 padding-lr-0">
                                        <h3><?php echo $menu_member['first_name']; ?> <?php echo $menu_member['last_name']; ?></h3>
                                        <span><?php echo $menu_member['email_id']; ?></span>
                                    </div>
                                </div>
                                <ul>
                                    <li>
                                        <a href="toowheel/my-account?type=<?php echo $type; ?>">
                                            <i class="fa fa-user" aria-hidden="true"></i> Profile</a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="logoutUser();">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                                    </li>
                                </ul>
                            </div>
                        <?php }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <img src="<?php echo BASE_URL . $configs['landing_twowheel_image']; ?>" alt=""  class="landing-bike" />
                    </div>
                    <div class="col-md-7 bg-text">
                        <h2>TWO WHEELS</h2>
                        <h1>TWO<br/> WHEELS</h1>
                        <div class="btn-position-twowheel"><a href="toowheel/index?type=two_wheel" class="btn-enter-twowheel">ENTER <i class="fa fa-play-circle" aria-hidden="true"></i></a></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="fourwheel slide slide-two" data-background="#f4001e">
            <div class="container inside">
                <div class="row">
                    <div class="col-md-5 order-img bg-four-text">
                        <h2>FOUR WHEELS</h2>
                        <h1>FOUR<br/> WHEELS</h1>
                        <div class="btn-position-fourwheel"><a href="toowheel/index?type=four_wheel" class="btn-enter-fourwheel"><i class="fa fa-play-circle" aria-hidden="true"></i> ENTER</a></div>
                    </div>
                    <div class="col-md-7">
                        <img src="<?php echo BASE_URL . $configs['landing_fourwheel_image']; ?>" alt=""  class="landing-car" />
                    </div>
                </div>

            </div>
        </section>
        <section class="landing-description slide slide-three" data-background="#f4001e">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center dummy-text">
                        <p><?php echo $configs['landing_description']; ?></p>
                    </div>
                </div>
            </div>
        </section>
        <section class="landing-text slide slide-four" data-background="#fff">
            <div class="container inside">
                <div class="row padding-tb-40 landing-row-img">
                    <div class="col-md-3">
                        <a href="toowheel/about?type=two_wheel"><img src="<?php echo BASE_URL . $configs['landing_about_us_image']; ?>" alt="" /></a>
                        <a href="toowheel/about?type=two_wheel" class="cross-btn"><span>ABOUT US</span></a>
                    </div>
                    <div class="col-md-3">
                        <a href="toowheel/news-updates?type=two_wheel"><img src="<?php echo BASE_URL . $configs['landing_news_updates_image']; ?>" alt="" /></a>
                        <a href="toowheel/news-updates?type=two_wheel" class="cross-btn"><span>NEWS & UPDATES</span></a>
                    </div>
                    <div class="col-md-3">
                        <a href="toowheel/find-a-club?type=two_wheel"><img src="<?php echo BASE_URL . $configs['landing_join_club_image']; ?>" alt="" /></a>
                        <a href="toowheel/find-a-club?type=two_wheel" class="cross-btn"><span>JOIN A CLUB</span></a>
                    </div>
                    <div class="col-md-3">
                        <a href="toowheel/shop-now"><img src="<?php echo BASE_URL . $configs['landing_shop_now_image']; ?>" alt="" /></a>
                        <a href="toowheel/shop-now" class="cross-btn"><span>SHOP NOW!</span></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="attachment-bg">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    $banner = $obj->selectRow('url, image', 'advertisement', 'advertisement_id = ' . $configs['landing_banner_ad']);
                    ?>
                    <a href="<?php echo $banner['url']; ?>" target="_blank" class="ad-banner-footer"><img src="<?php echo BASE_URL . $banner['image']; ?>" alt=""  /></a>
                </div>
            </div>
        </section>
        <footer class="footer">
            <div class="container footer-sec">
                <div class="footer-section fooetr-1">
                    <img src="img/footer-logo.png" alt=""/>
                </div>
                <div class="footer-section fooetr-2">
                    <ul class="footer__nav">
                        <li class="nav__item">
                            <a href="toowheel/index?type=two_wheel" class="footer-text">2 WHEEL</a>
                            <br/>
                            <a href="toowheel/index?type=four_wheel" class="footer-text">4 WHEEL</a>
                            <br/>
                            <a href="toowheel/news-updates?type=two_wheel" class="footer-text">NEWS & MEDIA</a>
                            <br/>
                            <a href="toowheel/events?type=two_wheel" class="footer-text">UPCOMING EVENTS</a>
                            <br/>
                            <a href="toowheel/press-release?type=two_wheel" class="footer-text">PRESS RELEASE</a>
                            <!--                                        <ul class="nav__ul">
                                                                        <li>
                                                                            <a href="#">Home</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">News & Media</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">Press Release</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">Gallery</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">Join A Club</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">Partners</a>
                                                                        </li>
                                                                    </ul>-->
                        </li>
                    </ul>
                </div>
                <div class="footer-section  fooetr-3">
                    <ul class="footer__nav">
                        <li class="nav__item">
                            <h2 class="nav__title">MEMBERS</h2>
                            <ul class="nav__ul">
                                <li>
                                    <a href="toowheel/login?type=two_wheel">Login</a>
                                </li>
                                <li>
                                    <a href="toowheel/member-register?type=two_wheel">Be A Member</a>
                                </li>
                                <li>
                                    <a href="toowheel/member-benefits?type=two_wheel">Member Benefits</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="footer__nav">
                        <li class="nav__item">
                            <h2 class="nav__title">CLUB</h2>
                            <ul class="nav__ul">
                                <li>
                                    <a href="toowheel/find-a-club?type=two_wheel">Find A Club</a>
                                </li>
                                <li>
                                    <a href="toowheel/club-register?type=two_wheel">Register My Club</a>
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
                                    <a href="toowheel/about?type=two_wheel">About us</a>
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
                            <ul class="nav__ul" style="margin-top: 10px;">
                                <li>
                                    <a href="#">Receive updates on our Upcoming Events</a>
                                </li>
                                <li>
                                    <form onsubmit="return subscribeNewsLetter();">
                                        <input type="email" id="newsletter_email" name="newsletter_email" placeholder="Email Address" required="">
                                        <button type="submit">submit</button>
                                    </form>
                                </li>
                                <li class="i-con text-center">
                                    <a href="https://www.facebook.com/Toowheel-Malaysia-102602757819930" target="_blank"><img src="toowheel/img/social-icons/fb.png" alt="fb"></a>
                                    <a href="https://www.instagram.com/p/B2iG45lnGi-/" target="_blank"><img src="toowheel/img/social-icons/insta.png" alt="fb"></a>
                                    <a href="https://twitter.com/@ToowheelM" target="_blank"><img src="toowheel/img/social-icons/twitter.png" alt="fb"></a>
                                    <a href="https://www.youtube.com/channel/UCueyRbB52hjc0XUIqbkYxcg" target="_blank"><img src="toowheel/img/social-icons/yt.png" alt="fb"></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/jquery.scrollie.min.js" type="text/javascript"></script>
        <script src="toowheel/js/sweet-alert.min.js" type="text/javascript"></script>
        <script src="toowheel/js/script.js" type="text/javascript"></script>
        <script type="text/javascript">
                                        function subscribeNewsLetter() {
                                            $('.loader').addClass('is-active');
                                            $.ajax({
                                                type: "POST",
                                                url: 'toowheel/api/v1/subscribe_news_letter',
                                                data: {email: $('#newsletter_email').val()},
                                                success: function (data) {
                                                    $('.loader').removeClass('is-active');
                                                    if (data.result.error === false) {
                                                        $('#newsletter_email').val('');
                                                        swal("Thanks for the subscirption", "we will get in touch with you", "success");
                                                    } else {
                                                        swal("Oops!", data.result.message, "info");
                                                    }
                                                },
                                                error: function (err) {
                                                    swal("Oops!", err.statusText, "error");
                                                }
                                            });
                                            return false;
                                        }
                                        $(window).ready(function () {
                                            var wHeight = $(window).height();
                                            $('.slide')
                                                    .height(wHeight)
                                                    .scrollie({
                                                        scrollOffset: -50,
                                                        scrollingInView: function (elem) {
                                                            var bgColor = elem.data('background');
                                                            $('body').css('background-color', bgColor);
                                                        }
                                                    });
                                        });

                                        $("#open-logout").click(function (e) {
                                            e.stopPropagation();
                                            $("#logout-dropdown").show("fast");
                                        });
                                        $(document).click(function (e) {
                                            if (!(e.target.id === 'logout-dropdown')) {
                                                $("#logout-dropdown").hide("fast");
                                            }
                                        });
                                        $("#open-logout1").click(function (e) {
                                            e.stopPropagation();
                                            $("#logout-dropdown1").show("fast");
                                        });
                                        $(document).click(function (e) {
                                            if (!(e.target.id === 'logout-dropdown1')) {
                                                $("#logout-dropdown1").hide("fast");
                                            }
                                        });
//                                        function openLogout() {
//                                            var x = document.getElementById("logout-dropdown");
//                                            if (x.style.display != "block")
//                                            {
//                                                x.style.display = "block";
//                                            } else {
//                                                x.style.display = "none";
//                                            }
//                                        }

                                        function logoutUser() {
                                            $('.loader').addClass('is-active');
                                            $.ajax({
                                                type: "POST",
                                                url: 'toowheel/api/v1/logout_user',
                                                data: {},
                                                success: function (data) {
                                                    $('.loader').removeClass('is-active');
                                                    if (data.result.error === false) {
                                                        window.location = 'toowheel/login?type=two_wheel';
                                                    } else {
                                                        swal('Information', data.result.message, 'info');
                                                    }
                                                },
                                                error: function (err) {
                                                    $('.loader').removeClass('is-active');
                                                    swal('Error', err.statusText, 'error');
                                                }
                                            });
                                        }

        </script>
    </body>
</html>
