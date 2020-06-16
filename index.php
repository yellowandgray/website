<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
if (isset($_SESSION['student_register_id'])) {
    $login_student = $obj->selectRow('*', 'student_register', 'student_register_id = ' . $_SESSION["student_register_id"]);
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'head_landing.php'; ?>
    <body>
        <?php include 'menu_landing.php'; ?>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <!--<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>-->
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <!--<div class="banner-learning" data-toggle="modal" data-target=".bs-example-modal-new">-->
                    <div class="banner-learning" onclick="window.location = 'free-sample-introduction'">
                        <a href="#">Try Free Sample</a>
                    </div>
                    <div class="carousel-caption wow fadeInRight">
                        <h2>Understand, Learn, Score</h2>
                    </div>
                </div>
                <!--                <div id="target" class="carousel-item">
                                    <div class="banner-learning" data-toggle="modal" data-target=".bs-example-modal-new">
                                        <img src="examhorse-landing/img/learning-gif.gif" alt=""/>
                                        <a href="#">Try Free Sample</a>
                                    </div>
                                    <div class="carousel-caption wow fadeInRight">
                                        <h2>Smart Learning App</h2>
                                    </div>
                                </div>-->
                <div class="carousel-item">
                    <div class="banner-learning" onclick="window.location = 'free-sample-introduction'">
                        <!--<img src="examhorse-landing/img/learning-gif.gif" alt=""/>-->
                        <a href="#">Try Free Sample</a>
                    </div>
                    <div class="carousel-caption wow fadeInRight">
                        <h2>Easy to Learn and Score</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="banner-learning" onclick="window.location = 'free-sample-introduction'">
                        <!--<img src="examhorse-landing/img/learning-gif.gif" alt=""/>-->
                        <a href="#">Try Free Sample</a>
                    </div>
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
        <div class="home-register-section" style="background: #293d46 !important">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-content">
                            <h3>One source to practice and learn all the previous set of 16-year TNPSC Group I – Original General Studies Question papers from 1995 to 2019 and 2020 updated Model Question paper with answers and explanation for the upcoming exams</h3>
                            <ul>
                                <li><i class="fa fa-check"></i> For Group I candidates</li>
                                <li><i class="fa fa-check"></i> For Group 2/2A candidates</li>
                                <li><i class="fa fa-check"></i> Total of 3,200 questions</li>
                                <li><i class="fa fa-check"></i> Additional information for each question – both in Tamil and English</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--                <div class="">
                                    <div class="float-left">
                                        <h3 class="text-center"><span class="wow fadeInRight text-center" data-wow-delay="0s">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></h3>
                                    </div>
                                    <div class="float-right register-now-btn wow fadeInRight" data-wow-delay="3s">
                                        <a href='register-page' class="register-btn wow pulse" data-wow-iteration="infinite" data-wow-duration="1500ms">Register Now!</a>
                                    </div>
                                </div>-->
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
                            <div class="box-text learning-box">
                                <p>Syllabus wise(Unit-topic) or Year wise</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="home-box wow fadeInDown">
                            <div class="box-custom">
                                <div class="box-img1"></div>
                            </div>
                            <div class="box-text learning-box">
                                <p>அனைத்து கேள்விகளுக்கும், உரிய படங்களும் விளக்கமான விடைகளும்</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div onclick="window.location = 'free-sample-introduction'" class="home-box wow fadeInDown">
                            <div class="box-custom">
                                <div class="box-img3"></div>
                            </div>
                            <div class="box-text learning-box">
                                <p>Try all the features for three full-year question papers – Completely Free</p>
                                <a href="free-sample-introduction" class="btn btn-green">Try Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="video-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="video">
                            <h3>How It Works</h3>
                            <iframe src="https://www.youtube.com/embed/qxP5Vw-NLf8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3>Testimonial</h3>
                        <section id="testim" class="testim">
                            <!--         <div class="testim-cover"> -->
                            <div class="wrap">

                                <span id="right-arrow" class="arrow right fa fa-chevron-right"></span>
                                <span id="left-arrow" class="arrow left fa fa-chevron-left "></span>
                                <ul id="testim-dots" class="dots">
                                    <li class="dot active"></li><!--
                                    --><li class="dot"></li><!--
                                    --><li class="dot"></li><!--
                                    --><li class="dot"></li><!--
                                    --><li class="dot"></li>
                                </ul>
                                <div id="testim-content" class="cont">

                                    <div class="active">
                                        <div class="img"><img src="https://image.ibb.co/hgy1M7/5a6f718346a28820008b4611_750_562.jpg" alt=""></div>
                                        <h2>Lorem P. Ipsum</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>                    
                                    </div>

                                    <div>
                                        <div class="img"><img src="https://image.ibb.co/cNP817/pexels_photo_220453.jpg" alt=""></div>
                                        <h2>Mr. Lorem Ipsum</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>                    
                                    </div>

                                    <div>
                                        <div class="img"><img src="https://image.ibb.co/iN3qES/pexels_photo_324658.jpg" alt=""></div>
                                        <h2>Lorem Ipsum</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>                    
                                    </div>

                                    <div>
                                        <div class="img"><img src="https://image.ibb.co/kL6AES/Top_SA_Nicky_Oppenheimer.jpg" alt=""></div>
                                        <h2>Lorem De Ipsum</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>                    
                                    </div>

                                    <div>
                                        <div class="img"><img src="https://image.ibb.co/gUPag7/image.jpg" alt=""></div>
                                        <h2>Ms. Lorem R. Ipsum</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>                    
                                    </div>

                                </div>

                            </div>
                            <!--         </div> -->
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'footer_landing.php'; ?>
        <div class="modal fade bs-example-modal-new" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

            <div class="modal-dialog">

                <!-- Modal Content: begins -->
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="gridSystemModalLabel">Enter Your Details</h4>
                    </div>
                    <!-- Modal Body -->  
                    <div class="modal-body sample-login">
                        <div class="body-message">
                            <p>Dear Guest user, please fill the details to access free samples</p>
                            <form onsubmit="return samplehomelogin();">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" placeholder="Enter Your Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" placeholder="Enter Your Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="phone" placeholder="Enter Your Phone">
                                </div>
                                <div class="g-recaptcha" data-sitekey="6LdRV_sUAAAAAJUxyvE5squ2GTwOApnH00odkabA"></div>
                                <button type="submit" class="btn btn-custom">Submit</button><a href="free-sample-introduction" class="float-right">Skip</a>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal Content: ends -->
            </div>
        </div>
        <?php include 'landing_script.php'; ?>
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
            // vars
            'use strict'
            var testim = document.getElementById("testim"),
                    testimDots = Array.prototype.slice.call(document.getElementById("testim-dots").children),
                    testimContent = Array.prototype.slice.call(document.getElementById("testim-content").children),
                    testimLeftArrow = document.getElementById("left-arrow"),
                    testimRightArrow = document.getElementById("right-arrow"),
                    testimSpeed = 4500,
                    currentSlide = 0,
                    currentActive = 0,
                    testimTimer,
                    touchStartPos,
                    touchEndPos,
                    touchPosDiff,
                    ignoreTouch = 30;
            ;

            window.onload = function () {

                // Testim Script
                function playSlide(slide) {
                    for (var k = 0; k < testimDots.length; k++) {
                        testimContent[k].classList.remove("active");
                        testimContent[k].classList.remove("inactive");
                        testimDots[k].classList.remove("active");
                    }

                    if (slide < 0) {
                        slide = currentSlide = testimContent.length - 1;
                    }

                    if (slide > testimContent.length - 1) {
                        slide = currentSlide = 0;
                    }

                    if (currentActive != currentSlide) {
                        testimContent[currentActive].classList.add("inactive");
                    }
                    testimContent[slide].classList.add("active");
                    testimDots[slide].classList.add("active");

                    currentActive = currentSlide;

                    clearTimeout(testimTimer);
                    testimTimer = setTimeout(function () {
                        playSlide(currentSlide += 1);
                    }, testimSpeed)
                }

                testimLeftArrow.addEventListener("click", function () {
                    playSlide(currentSlide -= 1);
                })

                testimRightArrow.addEventListener("click", function () {
                    playSlide(currentSlide += 1);
                })

                for (var l = 0; l < testimDots.length; l++) {
                    testimDots[l].addEventListener("click", function () {
                        playSlide(currentSlide = testimDots.indexOf(this));
                    })
                }

                playSlide(currentSlide);

                // keyboard shortcuts
                document.addEventListener("keyup", function (e) {
                    switch (e.keyCode) {
                        case 37:
                            testimLeftArrow.click();
                            break;

                        case 39:
                            testimRightArrow.click();
                            break;

                        case 39:
                            testimRightArrow.click();
                            break;

                        default:
                            break;
                    }
                })

                testim.addEventListener("touchstart", function (e) {
                    touchStartPos = e.changedTouches[0].clientX;
                })

                testim.addEventListener("touchend", function (e) {
                    touchEndPos = e.changedTouches[0].clientX;

                    touchPosDiff = touchStartPos - touchEndPos;

                    console.log(touchPosDiff);
                    console.log(touchStartPos);
                    console.log(touchEndPos);


                    if (touchPosDiff > 0 + ignoreTouch) {
                        testimLeftArrow.click();
                    } else if (touchPosDiff < 0 - ignoreTouch) {
                        testimRightArrow.click();
                    } else {
                        return;
                    }

                })
            }
        </script>
    </body>
</html>
