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
            <section id="inner-headline">
                <div class="container">
                    <div class="row">
                        <div class="span4">
                            <div class="inner-heading">
                                <h2>Contact us</h2>
                            </div>
                        </div>
                        <div class="span8">
                            <ul class="breadcrumb">
                                <li><a href="index"><i class="fa fa-home"></i></a></li>
                                <li><i class="fa fa-angle-right"></i></li>
                                <li class="active">Contact us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section id="content">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15554.963145623255!2d80.15063147402782!3d12.924374704188791!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a525ee96688048f%3A0xf49622f6c3663a8c!2sSembakkam%2C%20Chennai%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1584698088221!5m2!1sen!2sin" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-section">
                                <h4><strong>Get in touch</strong></h4>

                                <form action="" method="post" role="form" class="contactForm">
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" />
                                        </div>
                                        <div class="col-md-12 margintop10 form-group">
                                            <textarea class="form-control" name="message" rows="8" data-rule="required" placeholder="Message"></textarea>
                                            <br/>
                                            <p class="text-center">
                                                <button class="btn btn-custom" type="submit">Submit message</button>
                                            </p>
                                        </div>
                                    </div>
                                </form>
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
