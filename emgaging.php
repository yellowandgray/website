<!DOCTYPE html>
<html>
    <head>
        <title>Project Next Door</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/fontawesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>

        <script>
            new WOW().init();
        </script>
    </head>
    <body>
        <header style="background: #2f4d4b;">
            <div class="logo">
                <a href="index.php"><img src="img/back-arrow.png" alt="backarrow" /></a>
                <span class="menu-nav" onclick="openNav()"><img src="img/menu-bar.png" /></span>
            </div>
            <?php include 'menu.php'; ?>
        </header>
        <section class="ptb50">
            <div class="container">
                <div class="row" style="background: url(img/bg/service-banner-bg-1.png)no-repeat;padding: 20px 0px;">
                    <div class="col-md-12">
                        <div class="service-section">
                            <h1>EXPERIENTIAL LEARNING</h1>
                        </div>
                        <div class="services-text">
                            <h2>EXECUTE. <br/>NOW. <br/> FUTURE. </h2>
                        </div>

                        <div class="service-h4">
                            <h4>SIMULATION ROOM<br/> COMMAND & SUPPORT HUB<br/> INDUSTRY 4.0 HUB<br/> INTERNET OF THINGS<br/> BIG DATA</h4>
                        </div>
                    </div>
                </div>
                <div class="row" style="background: url(img/bg/service-banner-bg.png)no-repeat;padding: 50px 0px;">
                    <div class="col-md-2">
                        <div id="circle">
                            <svg style="top: -40%;left: 0;width: auto;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="300px" height="300px" viewBox="0 0 300 300" enable-background="new 0 0 300 300" xml:space="preserve">
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
                    <div class="col-md-8">
                        <div class="SlickCarousel">
                            <!-- Item -->
                            <div class="ProductBlock">
                                <div class="Content">
                                    <div class="img-fill">
                                        <img src="img/banner.jpg" alt="banner-1" class="img-responsive" style="height: auto;">
                                    </div>
                                </div>
                            </div>
                            <!-- Item -->
                            <!-- Item -->
                            <div class="ProductBlock">
                                <div class="Content">
                                    <div class="img-fill">
                                        <img src="img/banner-1.jpg" alt="banner-2" class="img-responsive" style="height: auto;">
                                    </div>
                                </div>
                            </div>
                            <!-- Item -->
                            <!-- Item -->
                            <div class="ProductBlock">
                                <div class="Content">
                                    <div class="img-fill">
                                        <img src="img/banner-2.jpg" alt="banner-3" class="img-responsive" style="height: auto;">
                                    </div>
                                </div>
                            </div>
                            <!-- Item -->
                        </div>
                        <ul class="social-media">
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
            </div>
        </section>
        <section id="contact" class="ptb50" style="background: #eee;">
            <div class="container">
                <div class="header-style-1 text-center">
                    <h1>Contact Us</h1>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.9544992786723!2d101.59787331464979!3d3.1067379977377474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4d6f2ebba175%3A0x8b633e7b44f03dc6!2sInfinity+Tower!5e0!3m2!1sen!2sin!4v1564835922110!5m2!1sen!2sin" style="width: 100%; height: 400px;" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-bg">
                            <!--                            <h3>Contact Address</h3>-->
                            <div class="contact-address">
                                <i class="fa fa-map-marker-alt"></i>
                                <p>Project Next Door, No. 16-05, Penthouse, menara Infiniti, Jalan SS6/3, 47301 Petaling Jaya, Selangor, Malaysia.</p><br/>
                                <i class="fa fa-envelope"></i>
                                <p><a href="#">email@mywebsite.com</a></p><br/>
                                <i class="fa fa-phone-alt"></i>
                                <p><a href="#">+630 7662 7601</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="section">
            <div class="text-center">
                <p>&copy; 2019 Allright Reserved | Project Next Door | Privacy Policy</p>
            </div>
        </footer>
    </body>
    <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.plugin.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/menu.js" type="text/javascript"></script>
    <script src="js/fontawesome.min.js" type="text/javascript"></script>
    <script src="js/banner.js" type="text/javascript"></script>
    <script src="js/all.min.js" type="text/javascript"></script>
    <script src="js/slick.js" type="text/javascript"></script>
</html>