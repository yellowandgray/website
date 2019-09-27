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
        <div class="main-wrapper">
            <section class="header slide slide-one" data-background="#3498db">
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
            <section class="fourwheel slide slide-two">
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
            <section class="landing-text slide slide-three">
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
        </div>
        <?php include 'footer.php'; ?>
        <script type="text/javascript">
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
        </script>
    </body>
</html>
