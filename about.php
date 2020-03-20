<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Exam Horse | Group Exams</title>
        <meta charset="UTF-8">
        <meta name="description" content="Exam Horse">
        <meta name="keywords" content="Exam Horse">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" href="img/favicon.png" type="image/gif">

        <link href="examhorse-landing/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="examhorse-landing/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="examhorse-landing/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="examhorse-landing/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
        <link href="examhorse-landing/css/animate.css" rel="stylesheet" type="text/css"/>
        <link href="examhorse-landing/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="examhorse-landing/css/responsive.css" rel="stylesheet" type="text/css"/>
        <style>
            .wow:first-child {
                visibility: hidden;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <header class="header-fixed">
                <div class="header-limiter">
                    <h1><a href="index"><img src='img/logo.png'></a></h1>
                    <?php
                    if (!isset($_SESSION['student_register_id'])) {
                        ?>
                        <nav>
                            <a href="about" class="menu-nav">About us</a>
                            <a href="contact" class="menu-nav">Contact us</a>
                            <a href="register-page" class="btn btn-custom">Registration</a>
                            <a href="login-page" class="btn btn-custom">Login</a>
                        </nav>
                    <?php } ?>
                    <div class="logout_position">
                        <div id="open-logout" class="logout_section">
                            <i class="fa fa-bars"></i>
                            <div class="logout_dropdown">
                                <ul class="logout_list">
                                    <li onclick="window.location = 'about'">About us</li>
                                    <li onclick="window.location = 'contact'">Contact us</li>
                                    <li>
                                        <a href="register-page" class="btn btn-custom">Registration</a>
                                        <a href="login-page" class="btn btn-custom">Login</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <section id = "inner-headline">
                <div class = "container">
                    <div class = "row">
                        <div class = "span4">
                            <div class = "inner-heading">
                                <h2>About us</h2>
                            </div>
                        </div>
                        <div class = "span8">
                            <ul class = "breadcrumb">
                                <li><a href="index"><i class="fa fa-home"></i></a></li>
                                <li><i class="fa fa-angle-right"></i></li>
                                <li class="active">About us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section id = "content">
                <div class = "container">
                    <div class = "row">
                        <div class = "col-md-6">
                            <h2>Welcome to <strong>Exam Horse</strong></h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur,</p>
                        </div>
                        <div class = "col-md-6">
                            <img src = "img/works/full/image-01-full.jpg" alt = "" />
                        </div>
                    </div>
                    <!--divider -->
                    <div class = "row">
                        <div class = "span12">
                            <div class = "solidline">
                            </div>
                        </div>
                    </div>
                    <!--end divider -->
                    <div class = "row">
                        <div class = "span12">
                            <h4>My Team</h4>
                        </div>
                        <div class = "span3">
                            <img src = "img/dummies/team1.jpg" alt = "" class = "img-polaroid" />
                            <div class = "roles">
                                <p class = "lead">
                                    <strong>Vincent Austin Jr</strong>
                                </p>
                                <p>
                                    CEO - Founder
                                </p>
                            </div>
                        </div>
                        <div class = "span3">
                            <img src = "img/dummies/team2.jpg" alt = "" class = "img-polaroid" />
                            <div class = "roles">
                                <p class = "lead">
                                    <strong>Tommy Laugher</strong>
                                </p>
                                <p>
                                    Lead designer
                                </p>
                            </div>
                        </div>
                        <div class = "span3">
                            <img src = "img/dummies/team3.jpg" alt = "" class = "img-polaroid" />
                            <div class = "roles">
                                <p class = "lead">
                                    <strong>Gabirelle Borowski</strong>
                                </p>
                                <p>
                                    Customer support
                                </p>
                            </div>
                        </div>
                        <div class = "span3">
                            <img src = "img/dummies/team4.jpg" alt = "" class = "img-polaroid" />
                            <div class = "roles">
                                <p class = "lead">
                                    <strong>Benny Strongton</strong>
                                </p>
                                <p>
                                    Coffee maker
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="mainfooter" role="contentinfo">
                <div class="footer-middle">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 copy">
                                <p class="text-center">&copy; Copyright 2020 - Exam Horse - All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <script src="examhorse-landing/js/common.js" type="text/javascript"></script>
        <script src="examhorse-landing/js/jquery.min.js" type="text/javascript"></script>
<!--        <script src="js/bootstrap.js" type="text/javascript"></script>-->
        <script src="examhorse-landing/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="examhorse-landing/js/wow.js" type="text/javascript"></script>
        <script src="js/common.js" type="text/javascript"></script>
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
<!--        <script>
            wow = new WOW(
                    {
                        animateClass: 'animated',
                        offset: 100,
                        callback: function (box) {
                            //console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                        }
                    }
            );
            wow.init();
            document.getElementById('moar').onclick = function () {
                var section = document.createElement('section');
                section.className = 'section--purple wow fadeInDown';
                this.parentNode.insertBefore(section, this);
            };
        </script>-->

        <script type="text/javascript">
            $("#open-logout").click(function (e) {
                //console.log("test");
                e.stopPropagation();
                $(".logout_dropdown").show("fast");
            });
            $(document).click(function (e) {
                if (!(e.target.class === 'logout_dropdown')) {
                    $(".logout_dropdown").hide("fast");
                }
            });
        </script>
    </body>

</html>
