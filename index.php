<?php
if (isset($_SESSION['student_register_id'])) {
    $login_student = $obj->selectRow('*', 'student_register', 'student_register_id = ' . $_SESSION["student_register_id"]);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Feringo | 10th STD State Board Quiz</title>
        <meta charset="UTF-8">
        <meta name="description" content="Mekana Feringo">
        <meta name="keywords" content="Mekana Feringo">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" href="img/favicon.png" type="image/gif">

        <link href="examhorse-landing/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="examhorse-landing/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="examhorse-landing/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
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
        <header class="header-fixed">
            <div class="header-limiter">
                <h1><a href="#"><img src='img/logo.png'></a></h1>
                <?php
                if (!isset($_SESSION['student_register_id'])) {
                    ?>
                    <nav>
                        <a href="register-page" class="btn btn-custom">Registration</a>
                        <a href="login-page" class="btn btn-custom">Login</a>
                    </nav>
                <?php } else {
                    ?>
                    <div class="logout_position">
                        <div id="open-logout" class="logout_section">
        <!--                        <img src='<?php //echo BASE_URL . $login_student['profile_image'];      ?>' alt=''>-->
                            <?php if (isset($login_student['profile_image']) && $login_student['profile_image'] == '') { ?>
                                <img src="<?php echo BASE_URL . $login_student['gender']; ?>.jpg" alt="" />
                            <?php } else { ?>
                                <img src="<?php echo BASE_URL . $login_student['profile_image']; ?>" alt="" />
                            <?php } ?>
                            <div class="logout_dropdown">
                                <div class="user_profile">
                                    <?php if (isset($login_student['profile_image']) && $login_student['profile_image'] == '') { ?>
                                        <img src="<?php echo BASE_URL . $login_student['gender']; ?>.jpg" alt="" />
                                    <?php } else { ?>
                                        <img src="<?php echo BASE_URL . $login_student['profile_image']; ?>" alt="" />
                                    <?php } ?>
                                    <h5><?php echo $login_student['student_name']; ?></h5>
                                </div>
                                <ul class="logout_list">
                                    <li onclick="window.location = 'home_subject'">Subject</li>
                                    <li onclick="window.location = 'student_result'">Result</li>
                                    <li onclick="logoutUser();">Logout</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>
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
                    <!--<div class="float-right register-now-btn wow fadeInRight" data-wow-delay="3s">
                        <a href='register-page' class="register-btn wow pulse" data-wow-iteration="infinite" data-wow-duration="1500ms">Register Now!</a>
                    </div>-->
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
                                <h5>Scientifically proven method to study and practice in a more effective way!</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="home-box wow fadeInDown">
                            <div class="box-custom">
                                <div class="box-img1"></div>
                            </div>
                            <div class="box-text">
                                <h5>Explore over thousands and thousands of questions and attain the benefits!</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="home-box wow fadeInDown">
                            <div class="box-custom">
                                <div class="box-img2"></div>
                            </div>
                            <div class="box-text">
                                <h5>Questions are prepared very sensefully for the students to explore and excel maximum.</h5>
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
