<!DOCTYPE html>
<html>
    <head>
        <title>Mekana Feringo</title>
        <meta charset="UTF-8">
        <meta name="description" content="Mekana Feringo">
        <meta name="keywords" content="Mekana Feringo">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" href="img/favicon.png" type="image/gif">

        <link href="feringo-landing/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="feringo-landing/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="feringo-landing/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
        <link href="feringo-landing/css/animate.css" rel="stylesheet" type="text/css"/>
        <link href="feringo-landing/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="feringo-landing/css/responsive.css" rel="stylesheet" type="text/css"/>
        <style>
            .wow:first-child {
                visibility: hidden;
            }
        </style>
    </head>
    <body>
        <header class="header-fixed">
            <div class="header-limiter">
                <h1><a href="#"><img src='img/logo.png'></a></h1>
                <nav>
                    <a href="login-page" class="btn btn-custom">Attend The Quiz</a>
                </nav>
            </div>
        </header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="carousel-caption wow fadeInRight">
                        <h2>Understand, Learn, Score</h2>
                    </div>
                </div>
                <div id="target" class="carousel-item">
                    <div class="carousel-caption wow fadeInRight">
                        <h2>Smart Learning App</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-caption wow fadeInRight">
                        <h2>Easy to Learn and Score</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-caption wow fadeInRight">
                        <h2>Scoring Made Easy</h2>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="home-register-section">
            <div class="container">
                <div class="">
                    <div class="float-left">
                        <h3><span class="span-1 wow fadeInRight" data-wow-delay="0s">UNDERSTAND</span> <span class="span-2 wow fadeInRight" data-wow-delay="1s">LEARN</span> <span class="span-3 wow fadeInRight" data-wow-delay="2s">SCORE</span></h3>
                    </div>
                    <div class="float-right wow fadeInRight" data-wow-delay="3s">
                        <a href='http://mekana.feringo.com/register' class="register-btn wow pulse" data-wow-iteration="infinite" data-wow-duration="1500ms">Register Now!</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="home-box wow fadeInDown">
                            <div class="box-custom">
                                <div class="box-img"></div>
                            </div>
                            <div class="box-text">
                                <p>Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="home-box wow fadeInDown">
                            <div class="box-custom">
                                <div class="box-img1"></div>
                            </div>
                            <div class="box-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="home-box wow fadeInDown">
                            <div class="box-custom">
                                <div class="box-img2"></div>
                            </div>
                            <div class="box-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="mainfooter" role="contentinfo">
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 copy">
                            <p class="text-center">&copy; Copyright 2020 - Feringo.  All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="feringo-landing/js/common.js" type="text/javascript"></script>
        <script src="feringo-landing/js/jquery.min.js" type="text/javascript"></script>
<!--        <script src="js/bootstrap.js" type="text/javascript"></script>-->
        <script src="feringo-landing/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="feringo-landing/js/wow.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var showHeaderAt = 150;
                var win = $(window),
                        body = $('body');
                // Show the fixed header only on larger screen devices
                if (win.width() > 600) {
                    // When we scroll more than 150px down, we set the
                    // "fixed" class on the body element.
                    win.on('scroll', function (e) {
                        if (win.scrollTop() > showHeaderAt) {
                            body.addClass('fixed');
                        } else {
                            body.removeClass('fixed');
                        }
                    });
                }
            });
        </script>
        <script>
            wow = new WOW(
                    {
                        animateClass: 'animated',
                        offset: 100,
                        callback: function (box) {
                            console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                        }
                    }
            );
            wow.init();
            document.getElementById('moar').onclick = function () {
                var section = document.createElement('section');
                section.className = 'section--purple wow fadeInDown';
                this.parentNode.insertBefore(section, this);
            };
        </script>
    </body>
</html>