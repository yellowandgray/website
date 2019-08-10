<!DOCTYPE html>
<html>
    <head>
        <title>Project Next Door</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="css/fontawesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/all.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/slick-theme-min.css" rel="stylesheet" type="text/css"/>
        <link href="css/slick.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/animate.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/animate.css" rel="stylesheet" type="text/css"/>
        <link href="css/examples.css" rel="stylesheet" type="text/css"/>
        <!--        <link href="css/fullpage.css" rel="stylesheet" type="text/css"/>-->
        <link href="css/pickmeup.css" rel="stylesheet" type="text/css"/>
        <!--        <link href="css/demo.css" rel="stylesheet" type="text/css"/>-->
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <style>
            @font-face {font-family: "Nexa Bold";
                        src: url("fonts/lips/nexa-bold/c9f309b3d47969ecac64a77a6c672594.eot"); /* IE9*/
                        src: url("fonts/lips/nexa-bold/c9f309b3d47969ecac64a77a6c672594.eot") format("embedded-opentype"), /* IE6-IE8 */
                            url("fonts/lips/nexa-bold/c9f309b3d47969ecac64a77a6c672594.woff2") format("woff2"), /* chrome、firefox */
                            url("fonts/lips/nexa-bold/c9f309b3d47969ecac64a77a6c672594.woff") format("woff"), /* chrome、firefox */
                            url("fonts/lips/nexa-bold/c9f309b3d47969ecac64a77a6c672594.ttf") format("truetype"), /* chrome、firefox、opera、Safari, Android, iOS 4.2+*/
                            url("fonts/lips/nexa-bold/c9f309b3d47969ecac64a77a6c672594.svg") format("svg"); /* iOS 4.1- */
            }
            @font-face {font-family: "DashNess";
                        src: url("fonts/lips/dash-ness/ee1c62326ab59c0683247d7a66322c8b.eot"); /* IE9*/
                        src: url("fonts/lips/dash-ness/ee1c62326ab59c0683247d7a66322c8b.eot?#iefix") format("embedded-opentype"), /* IE6-IE8 */
                            url("fonts/lips/dash-ness/ee1c62326ab59c0683247d7a66322c8b.woff2") format("woff2"), /* chrome、firefox */
                            url("fonts/lips/dash-ness/ee1c62326ab59c0683247d7a66322c8b.woff") format("woff"), /* chrome、firefox */
                            url("fonts/lips/dash-ness/ee1c62326ab59c0683247d7a66322c8b.ttf") format("truetype"), /* chrome、firefox、opera、Safari, Android, iOS 4.2+*/
                            url("fonts/lips/dash-ness/ee1c62326ab59c0683247d7a66322c8b.svg#DashNess") format("svg"); /* iOS 4.1- */
            }
            @font-face {font-family: "Quicksandlight";
                        src: url("fonts/lips/quick-sand/QuicksandLight-Regular.eot"); /* IE9*/
                        src: url("fonts/lips/quick-sand/QuicksandLight-Regular.otf") format("embedded-opentype"), /* IE6-IE8 */
                            url("fonts/lips/quick-sand/QuicksandLight-Regular.ttf") format("woff2"), /* chrome、firefox */
                            url("fonts/lips/quick-sand/QuicksandLight-Regular.woff") format("woff"), /* chrome、firefox */
                            url("fonts/lips/quick-sand/QuicksandLight-Regular.woff2") format("truetype"), /* chrome、firefox、opera、Safari, Android, iOS 4.2+*/
                            url("fonts/lips/quick-sand/QuicksandLight-Regular.svg#DashNess") format("svg"); /* iOS 4.1- */
            }
            @font-face {
                font-family: 'TeXGyreAdventor-Regular';
                src: local('TeXGyreAdventor-Regular'), url('fonts/lips/tex-gyre/texgyreadventor-regular.woff') format('woff');
            }


            @font-face {
                font-family: 'TeXGyreAdventor-Italic';
                src: local('TeXGyreAdventor-Italic'), url('fonts/lips/tex-gyre/texgyreadventor-italic.woff') format('woff');
            }


            @font-face {
                font-family: 'TeXGyreAdventor-Bold';
                font-style: normal;
                font-weight: normal;
                src: local('TeXGyreAdventor-Bold'), url('fonts/lips/tex-gyre/texgyreadventor-bold.woff') format('woff');
            }


            @font-face {
                font-family: 'TeXGyreAdventor-BoldItalic';
                font-style: normal;
                font-weight: normal;
                src: local('TeXGyreAdventor-BoldItalic'), url('fonts/lips/tex-gyre/texgyreadventor-bolditalic.woff') format('woff');
            }
        </style>
        <script>
            new WOW().init();
        </script>
    </head>
    <body>
        <header style="background: #2f4d4b;">
            <div class="logo">
                <a href="index.php"><img class="back-arrow" src="img/back-arrow.png" alt="backarrow" /></a>
                <img class="logo-size" src="img/logo.png" alt="Project Next Door Logo" />
                <span class="menu-nav" onclick="openNav()"><img src="img/menu-bar.png" /></span>
            </div>
            <?php include 'menu.php'; ?>
        </header>
        <section class="ptb50" style="background: url(img/bg/empower-bg-1.jpg)no-repeat;background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="service-section wow fadeInLeft">
                            <h1>EMPOWERING KNOWLEDGE</h1>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="services-text wow fadeInRight">
                            <h2>BE WITH THE <br/>RIGHT <br/> PARTNERS. </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ptb50">
            <div class="container">
                <div class="row wow fadeInRight" style="background: url(img/bg/service-banner-bg-3.png)no-repeat;padding: 50px 0px;">
                    <div class="service-1-h4 wow fadeInDown">
                        <h4>You need experts you can always turn to for<br/> guidance. And that's what we're about.</h4>
                    </div>
                    <div class="col-md-8 wow fadeInUp">
                        <div class="SlickCarousel">
                            <!-- Item -->
                            <div class="ProductBlock">
                                <div class="Content">
                                    <div class="img-fill">
                                        <img src="img/empoer-slide/001.jpg" alt="banner-1" class="img-responsive" style="height: auto;">
                                    </div>
                                </div>
                            </div>
                            <!-- Item -->
                            <!-- Item -->
                            <div class="ProductBlock">
                                <div class="Content">
                                    <div class="img-fill">
                                        <img src="img/empoer-slide/002.jpg" alt="banner-2" class="img-responsive" style="height: auto;">
                                    </div>
                                </div>
                            </div>
                            <!-- Item -->
                            <!-- Item -->
                            <div class="ProductBlock">
                                <div class="Content">
                                    <div class="img-fill">
                                        <img src="img/empoer-slide/003.jpg" alt="banner-3" class="img-responsive" style="height: auto;">
                                    </div>
                                </div>
                            </div>
                            <!-- Item -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div id="circle">
                            <svg class="circle-2" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="300px" height="300px" viewBox="0 0 300 300" enable-background="new 0 0 300 300" xml:space="preserve">
                            <defs>
                            <path id="circlePath" d="M 150, 150 m -60, 0 a 60,60 0 0,1 120,0 a 60,60 0 0,1 -120,0 "/>
                            </defs>
                            <circle cx="150" cy="100" r="75" fill="none"/>
                            <g>
                            <use xlink:href="#circlePath" fill="none"/>
                            <text fill="#e7aca6">
                            <textPath xlink:href="#circlePath">p r o j e c t &nbsp; n e x t &nbsp; d o o r &nbsp;</textPath>
                            </text>
                            </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section class="ptb50" style="background: url(img/bg/01.jpg)no-repeat;background-size: cover;padding-bottom: 150px;">
            <div class="container-fluid">
                <h1 class="text-center wow fadeInDown">SERVICES</h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="bg-services wow fadeInRight">
                            <p class="wow bounceInLeft" data-wow-delay="0.1s">BITE SIZED TRAINING</p>
                            <p class="wow bounceInLeft" data-wow-delay="0.2s">FULL SIZED TRAINING</p>
                            <p class="wow bounceInLeft" data-wow-delay="0.3s">CUSTOMIZED TRAINING</p>
                            <p class="wow bounceInLeft" data-wow-delay="0.4s">IDEAS @ PONDOK</p>
                            <p class="wow bounceInLeft" data-wow-delay="0.5s">IDEANATORS</p>
                            <p class="wow bounceInLeft" data-wow-delay="0.6s">S.U.M.O</p>
                            <p class="wow bounceInLeft" data-wow-delay="0.7s">BUSINESS MANAGEMENT & ENGLISH</p>
                            <p class="wow bounceInLeft" data-wow-delay="0.8s">CONTENT DELIVERY</p>
                            <p class="wow bounceInLeft" data-wow-delay="0.9s">ENTREPRENEURSHIP</p>
                        </div>
                    </div> 
                    <div class="col-md-6">
                        <div class="bg-services wow fadeInLeft">
                            <div class="float-text">
                                <p class="wow bounceInRight" data-wow-delay="0.1s">MANAGEMENT</p>
                                <p class="wow bounceInRight" data-wow-delay="0.2s">STRATEGIC PLANNING</p>
                                <p class="wow bounceInRight" data-wow-delay="0.3s">STRATEGIC PLANNING</p>
                                <p class="wow bounceInRight" data-wow-delay="0.4s">TECHNICAL SKILLS</p>
                                <p class="wow bounceInRight" data-wow-delay="0.5s">SOFT SKILLS</p>
                                <p class="wow bounceInRight" data-wow-delay="0.6s">IN HOUSE TRAINING</p>
                                <p class="wow bounceInRight" data-wow-delay="0.7s">PUBLIC PROGRAMS</p>
                                <p class="wow bounceInRight" data-wow-delay="0.8s">BUSINESS COACHING</p>
                            </div>
                        </div>
                    </div>

                    <!--                <div class="row">
                                                            <div class="col-md-2 wow fadeInRight">
                                                                <div id="circle">
                                                                    <svg style="top: 30%;left: 0;width: auto;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="300px" height="300px" viewBox="0 0 300 300" enable-background="new 0 0 300 300" xml:space="preserve">
                                                                    <defs>
                                                                    <path id="circlePath" d="M 150, 150 m -60, 0 a 60,60 0 0,1 120,0 a 60,60 0 0,1 -120,0 "/>
                                                                    </defs>
                                                                    <circle cx="150" cy="100" r="75" fill="none"/>
                                                                    <g>
                                                                    <use xlink:href="#circlePath" fill="none"/>
                                                                    <text fill="#e7aca6">
                                                                    <textPath xlink:href="#circlePath">P r o j e c t &nbsp; N e x t &nbsp; D o o r &nbsp;</textPath>
                                                                    </text>
                                                                    </g>
                                                                    </svg>
                                                                </div>
                                                            </div>
                    
                                    </div>-->
                </div>
                <!--                <div class="row">
                                    <div class="b-header-site-lf-area">
                                        <div class="scroll-indicator scroll-indicator--dark">
                
                
                                            <div class="vertical vertical--bottom" style="height: 875px;">
                                                <div class="vertical-cell" style="transform-origin: 65.625px 65.625px; height: 131.25px; width: 875px; transform: rotate(-90deg);">
                
                                                    <div class="dash dash--dark dash--normal">
                                                        <div class="dash-line"></div>
                                                        <div class="dash-text">Scroll down</div>
                                                    </div></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
        </section>
        <section class="calendar-section">
            <div class="row">
                <div class="calendar-bg-section">
                    <h2>UPCOMING TRAININGS</h2>
                    <article style="text-align: center;">
                        <div class="single"></div>
                    </article>
                </div>
                <div class="calendar-bg1-section">
                    <div class="calendar-inner-bg"></div>
                    <div class="calendar-text-section">
                        <h2>What is Lorem Ipsum?</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
            </div>
            <!--            <div class="container-fluid">
                            <h1 class="text-center wow fadeInDown" style='padding: 0 0 60px 0;margin-top: -40px;'>Upcoming Trainings</h1>
                            <div class="row">
                                <div class="col-md-6 wow fadeInLeft">
                                    
                                </div>
                                <div class="col-md-6 text-center wow fadeInRight">
                                    <div style="background: #4a7c7c;padding: 10px 0;">
                                        <div class="section-h1">
                                            <h1>Lorem Ipsum</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="social-media" style="float: right;">
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>-->
        </section>
        <?php include 'footer.php'; ?>
    </body>
    <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.plugin.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/menu.js" type="text/javascript"></script>
    <script src="js/fontawesome.min.js" type="text/javascript"></script>
    <script src="js/banner.js" type="text/javascript"></script>
    <script src="js/all.min.js" type="text/javascript"></script>
    <script src="js/slick.js" type="text/javascript"></script>
    <script src="js/pickmeup.js" type="text/javascript"></script>
    <script src="js/demo.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js" type="text/javascript"></script>
    <script type="text/javascript">
                    new WOW().init();
    </script>
</html>