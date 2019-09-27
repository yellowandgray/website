<?php
require_once 'toowheel/api/include/common.php';
$obj = new Common();
$configs = $obj->getLandingDetails();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Toowheel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Revenue Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="img/favicon.png" rel="shortcut icon"/>
        <!-- CSS -->
        <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
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
    <body>
<!--        <div class="main-wrapper">-->
            <section class="header slide slide-one" data-background="#0f0f0f">
                <div class="container inside">
                    <div class="row">
                        <a href="index" class="logo"><img src='img/logo.png' alt=''></a>
                        <div class="header-login">
                            <a href="toowheel/login" class="mob-noon"><span class="login-button"><i class="fa fa-user"></i> Login</span></a>
                            <a href="toowheel/login" class="mob-block"><span class="login-button"><i class="fa fa-user"></i></span></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <img src="<?php echo BASE_URL . $configs['landing_twowheel_image']; ?>" alt=""  class="landing-bike" />
    <!--                        <img src="img/image-05.png" alt="" class="landing-bike" />-->
                        </div>
                        <div class="col-md-7 bg-text">
                            <h2>TWO WHEELS</h2>
                            <h1>TWO<br/> WHEELS</h1>
                            <div class="btn-position-twowheel"><a href="toowheel/index" class="btn-enter-twowheel">ENTER <i class="fa fa-play-circle" aria-hidden="true"></i></a></div>
                            <!--<a href="toowheel/index" class="engine-button" onclick="document.getElementById('engineON').src = 'img/engine-on.png'"><img src="img/engine-off.png" id="engineON" alt="" /></a>-->
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
                            <div class="btn-position-fourwheel"><a href="toowheel/index" class="btn-enter-fourwheel"><i class="fa fa-play-circle" aria-hidden="true"></i> ENTER</a></div>
                        </div>
                        <div class="col-md-7">
                            <img src="<?php echo BASE_URL . $configs['landing_fourwheel_image']; ?>" alt=""  class="landing-car" />
    <!--                        <img src="img/image-06.png" alt="" class="landing-car"/>-->
                        </div>
                    </div>
                </div>
            </section>
            <section class="landing-text slide slide-three" data-background="#fff">
                <div class="container inside">
                    <div class="row">
                        <div class="col-md-12 text-center dummy-text">
                            <p><?php echo $configs['landing_description']; ?></p>
    <!--                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit <br/>praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet </p>-->
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <div class="row padding-tb-40 landing-row-img">
                        <div class="col-md-3">
    <!--                        <img src="img/image/002.png" alt="" />-->
                            <img src="<?php echo BASE_URL . $configs['landing_about_us_image']; ?>" alt="" />
                            <a href="toowheel/about" class="cross-btn"><span>ABOUT US</span></a>
                        </div>
                        <div class="col-md-3">
                            <!--<img src="img/image/001.png" alt="" />-->
                            <img src="<?php echo BASE_URL . $configs['landing_news_updates_image']; ?>" alt="" />
                            <a href="toowheel/news" class="cross-btn"><span>NEWS & UPDATES</span></a>
                        </div>
                        <div class="col-md-3">
                            <img src="<?php echo BASE_URL . $configs['landing_join_club_image']; ?>" alt="" />
                    <!--<img src="img/image/003.png" alt="" />-->
                            <a href="toowheel/member-register" class="cross-btn"><span>JOIN A CLUB</span></a>
                        </div>
                        <div class="col-md-3">
                            <img src="<?php echo BASE_URL . $configs['landing_shop_now_image']; ?>" alt="" />
                            <!--<img src="img/image/004.png" alt="" />-->
                            <a href="#" class="cross-btn"><span>SHOP NOW!</span></a>
                        </div>
                    </div>
                    <div class="row">
                        <img src="img/attachment-bg.jpg" alt="" style="width: 100%;margin: 20px 0;">
    <!--                    <img src="<?php echo BASE_URL . $configs['home_advertisement_banner']; ?>" alt="" style="width: 100%;margin: 20px 0;">-->
                    </div>
                </div>
            </section>
<!--        <footer class="footer slide slide-four" data-background="#111111">
            <div class="container footer-sec inside">
                <div class="footer-section fooetr-1">
                    <img src="img/footer-logo.png" alt=""/>
                </div>
                <div class="footer-section fooetr-2">
                    <ul class="footer__nav">
                        <li class="nav__item">
                            <h2 class="footer-text">2 Wheel</h2>
                            <h2 class="footer-text">4 Wheel</h2>
                            <h2 class="footer-text">NEWS & MEDIA</h2>
                            <h2 class="footer-text">UPCOMING EVENTS</h2>
                            <h2 class="footer-text">PRESS RELEASE</h2>
                                                <ul class="nav__ul">
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
                                                </ul>
                        </li>
                    </ul>
                </div>
                <div class="footer-section  fooetr-3">
                    <ul class="footer__nav">
                        <li class="nav__item">
                            <h2 class="nav__title">MEMBERS</h2>
                            <ul class="nav__ul">
                                <li>
                                    <a href="toowheel/login">Login</a>
                                </li>
                                <li>
                                    <a href="toowheel/member-register">Be A Member</a>
                                </li>
                                <li>
                                    <a href="toowheel/member">Member Benefits</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="footer__nav">
                        <li class="nav__item">
                            <h2 class="nav__title">CLUB</h2>
                            <ul class="nav__ul">
                                <li>
                                    <a href="toowheel/find-a-club">Find A Club</a>
                                </li>
                                <li>
                                    <a href="toowheel/club-register">Register My Club</a>
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
                                    <a href="toowheel/about">About us</a>
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
                                    <form>
                                        <input type="email" placeholder="Email Address" required="">
                                        <button type="submit">submit</button>
                                    </form>
                                </li>
                                <li class="i-con text-center">
                                    <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

                <div class="legal">
                    <p>&copy; 2019 TOOWHEEl. All Right Reserved</p>
                    <span class="legal__links">
                        <a href="#">Privacy Policy</a>
                        <span></span>
                        <a href="#">Terms of Use</a>
                    </span>
                </div>
        </footer>-->
<!--        </div>-->
        <?php include 'footer.php'; ?>
<!--        <script type="text/javascript">
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
        </script>-->
    </body>
</html>
