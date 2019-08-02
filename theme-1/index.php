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
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main class="banner-section" style="background: #006666;">
            <header>
                <div id="myNav" class="overlay">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <div class="overlay-content">
                        <a href="#">Home</a>
                        <a href="#">About</a>
                        <a href="#">Services</a>
                        <a href="#">Contact</a>
                    </div>
                </div>
                <span class="menu-nav" onclick="openNav()">&#9776;</span>
                <div class="logo">
                    <img src="img/logo.png" alt="Project Next Door Logo" />
                </div>
            </header>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 banner-text">
                        <!--                        <h3>One Stop Innovation & Knowledge</h3>-->
                        <h1>TAGLINE.</h1>
<!--                        <p>HRDF Registered</p>-->
                        <!--                        <div class="">
                                                    <a href="#" type="button" class="button"><span>Find Out More</span></a>
                                                    <a href="#" type="button" class="button"><span>Join Us Now</span></a>
                                                </div>-->
                    </div>
                    <div class="col-md-8">
                        <div class="slideshow">
                            <div class="slider">
                                <div class="item">
                                    <img src="img/banner.jpg" />
                                </div>
                                <div class="item">
                                    <img src="img/banner-1.jpg" />
                                </div>
                                <div class="item">
                                    <img src="img/banner-2.jpg" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <section class="section-padding about-section">
            <div class="container">
                <div class="header-style-1">
                    <h1>About Project Next Door</h1>
<!--                    <p>test</p>-->
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="box-1">
                            <div class="box-padding">
                                <h1 class="text-1">Experiential</h1>
                                <div class="text-hover">
                                    <p>A brief<br/> introduction <br/>of this<br/> area.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-2">
                            <div class="box-padding">
                                <h1>Empowering</h1>
                                <div class="text-hover">
                                    <p>A brief<br/> introduction <br/>of this<br/> area.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-3">
                            <div class="box-padding">
                                <h1>Engaging</h1>
                                <div class="text-hover">
                                    <p>A brief<br/> introduction <br/>of this<br/> area.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
    <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.plugin.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js" type="text/javascript"></script>
    <script>
                    function openNav() {
                        document.getElementById("myNav").style.width = "100%";
                    }

                    function closeNav() {
                        document.getElementById("myNav").style.width = "0%";
                    }
    </script>
    <script>
        $('.slider').slick({
            draggable: true,
            arrows: false,
            dots: true,
            fade: true,
            speed: 900,
            infinite: true,
            cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
            touchThreshold: 100
        })
    </script>
</html>