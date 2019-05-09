<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cheryl P Pinto</title>
        <?php $page = 'home'; ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Zeta Template Project">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
        <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
        <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
        <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
        <link rel="stylesheet" type="text/css" href="styles/responsive.css">
        <link rel="icon" href="images/fav-logo.png" type="image/gif" sizes="16x16">
        <link href="styles/common.css" rel="stylesheet" type="text/css"/>
        <link href="styles/slider-1.css" rel="stylesheet" type="text/css"/>
        <link href="styles/infinite-slider.css" rel="stylesheet" type="text/css"/>
        <link href="styles/media-query.css" rel="stylesheet" type="text/css"/>
    </head>
    <!--    <script>
    
            setTimeout(
                    function showModal() {
    
                        $('#myModal').modal('show');
                    }, 2000);
        </script>-->
    <script type="text/javascript">
        function PopUp(hideOrshow) {
            if (hideOrshow == 'hide')
                document.getElementById('ac-wrapper').style.display = "none";
            else
                document.getElementById('ac-wrapper').removeAttribute('style');
        }
        window.onload = function () {
            setTimeout(function () {
                PopUp('show');
            }, 10000);
        }
    </script>
    <body>
        <div class="super_container">
            <!-- Header -->
            <?php include 'menu.php'; ?>
            <!-- Menu -->
            <?php include 'mobile-menu.php'; ?>
            <!-- Hero Slider -->
            <div class="home">
                <video autoplay loop poster="polina.jpg" id="vid" muted="muted">
                    <source src="vedio/WhatsApp Video 2018-12-18 at 11.14.49 AM (1).mp4" type="video/mp4">
                </video>  
                <div class="overlay"></div>
                <div class="hero_slider_container slider_prlx">
                    <div class="owl-carousel owl-theme hero_slider">
                        <!-- Slider Item -->
                        <div class="owl-item main_slider_item">
                            <!--<div class="main_slider_item_bg" style="background-image:url(images/main_slider_1.jpg)"></div>-->
                            <div class="main_slider_shapes"><img src="images/slider-png/cheryl-02.png" alt="" style="width: 100% !important;"></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col slider_content_col">
                                        <div class="main_slider_content">
                                            <h1><span>Hi! I am Cheryl.</span></h1>
                                            <!--<h1>a <span>modern</span> website?</h1>-->
                                            <p>Inspire. Empower. Transform… My mantra.</p>
                                            <div class="button discover_button">
                                                <a href="#" class="d-flex flex-row align-items-center justify-content-center">discover<img src="images/arrow_right.svg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slider Item -->
                        <div class="owl-item main_slider_item">
                            <!--<div class="main_slider_item_bg" style="background-image:url(images/main_slider_2.jpg)"></div>-->
                            <div class="main_slider_shapes"><img src="images/slider-png/cheryl-03.png" alt="" style="width: 100% !important;"></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col slider_content_col">
                                        <div class="main_slider_content">
                                            <h1><span>Unquenchable thirst for education and learning</span></h1>
                                            <p>I am a certified NLP Master Practitioner and an Advanced Life Coach.</p>
                                            <div class="button discover_button">
                                                <a href="#" class="d-flex flex-row align-items-center justify-content-center">discover<img src="images/arrow_right.svg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slider Item -->
                        <div class="owl-item main_slider_item">
                            <!--<div class="main_slider_item_bg" style="background-image:url(images/main_slider_3.jpg)"></div>-->
                            <div class="main_slider_shapes"><img src="images/slider-png/cheryl-01.png" alt="" style="width: 100% !important;"></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col slider_content_col">
                                        <div class="main_slider_content">
                                            <h1><span>Leaders taught me that truly nothing is impossible.</span></h1>
                                            <p> I saw, first-hand, what a powerful vision, belief and perseverance can do.</p>
                                            <div class="button discover_button">
                                                <a href="#" class="d-flex flex-row align-items-center justify-content-center">discover<img src="images/arrow_right.svg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slider Dots -->
                    <!--                    <div class="main_slider_dots">
                    
                                            <div class="container">
                    
                                                <div class="row">
                    
                                                    <div class="col">
                    
                                                        <ul id="main_slider_custom_dots" class="main_slider_custom_dots">
                    
                                                            <li class="main_slider_custom_dot active">01.</li>
                    
                                                            <li class="main_slider_custom_dot">02.</li>
                    
                                                            <li class="main_slider_custom_dot">03.</li>
                    
                                                        </ul>
                    
                                                    </div>
                    
                                                </div>
                    
                                            </div>		
                    
                                        </div>-->
                    <!-- Slider Dots -->
                    <div class="main_slider_nav_left main_slider_nav">
                        <i class="fas fa-chevron-left trans_300"></i>
                    </div>
                    <div class="main_slider_nav_right main_slider_nav">
                        <i class="fas fa-chevron-right trans_300"></i>
                    </div>
                </div>
            </div>
            <!--            <div class="home_social_container d-flex flex-row justify-content-end align-items-center">
            
                            <ul class="home_social">
            
                                <li><a href="#"><i class="fab fa-pinterest trans_300"></i></a></li>
            
                                <li><a href="#"><i class="fab fa-facebook-f trans_300"></i></a></li>
            
                                <li><a href="#"><i class="fab fa-twitter trans_300"></i></a></li>
            
                                <li><a href="#"><i class="fab fa-dribbble trans_300"></i></a></li>
            
                                <li><a href="#"><i class="fab fa-behance trans_300"></i></a></li>
            
                                <li><a href="#"><i class="fab fa-linkedin-in trans_300"></i></a></li>
            
                            </ul>
            
                        </div>-->
            <!-- Features -->
            <div class="features">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 text-center section_title section_title_dark">
                            <h2>My Specialisation Coaching</h2>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Features Item -->
                        <div class="col-lg-4">
                            <div>
                                <img src="images/slider/001.png" alt="" class="img-b">
                            </div>
                            <div class="features_item  d-flex flex-column align-items-center ">
                                <div class="icon_container box-4 d-flex flex-column">
                                    <h3 class="text-center">Financial Freedom</h3>
                                    <video class=" video-res features_item box-3 d-flex flex-column align-items-center justify-content-end text-center" style="width: 100%" height="315" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen controls>
                                        <source src="vedio/WhatsApp Video 2018-12-18 at 11.14.49 AM (1).mp4" type="video/mp4">
                                        Your browser does not support the <code>video</code> tag.
                                    </video>
                                    <p>If you often get to the end of the month and wonder where your money has gone, if your expenses exceed your income...</p>
                                    <div class="text-center arrow-1">
                                        <a href="#"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Features Item -->
                        <div class="col-lg-4">
                            <div>
                                <img src="images/slider/002.png" alt="" class="img-b">
                            </div>
                            <div class="features_item  d-flex flex-column align-items-center ">
                                <div class="icon_container box-4 d-flex flex-column">
                                    <h3 class="text-center">Time Management</h3>
                                    <video class="video-res features_item box-3 d-flex flex-column align-items-center justify-content-end text-center" style="width: 100%" height="315" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen controls>
                                        <source src="vedio/WhatsApp Video 2018-12-18 at 11.36.35 AM.mp4" type="video/mp4">
                                        Your browser does not support the <code>video</code> tag.
                                    </video>
                                    <p>If you always find yourself wanting to do more, live more meaningfully, but are somehow unable to...</p>
                                    <div class="text-center arrow-1">
                                        <a href="#"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Features Item -->
                        <div class="col-lg-4">
                            <div>
                                <img src="images/slider/003.png" alt="" class="img-b">
                            </div>
                            <div class="features_item  d-flex flex-column align-items-center ">
                                <div class="icon_container box-4 d-flex flex-column">
                                    <h3 class="text-center">Career Progress</h3>
                                    <video class="video-res features_item box-3 d-flex flex-column align-items-center justify-content-end text-center" style="width: 100%" height="315" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen controls>
                                        <source src="vedio/WhatsApp Video 2018-12-18 at 11.36.35 AM.mp4" type="video/mp4">
                                        Your browser does not support the <code>video</code> tag.
                                    </video>
                                    <p>If you are in a job that does not light you up, or in a career that you once loved but now wish to change...</p>
                                    <div class="text-center arrow-1">
                                        <a href="#"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="row margin-top-50">
                        <!-- Features Item -->
                        <div class="col-lg-4">
                            <div>
                                <img src="images/slider/004.png" alt="" class="img-b">
                            </div>
                            <div class="features_item  d-flex flex-column align-items-center ">
                                <div class="icon_container box-4 d-flex flex-column">
                                    <h3 class="text-center">Trader Coach</h3>
                                    <div class="features_item box-3 d-flex flex-column align-items-center justify-content-end text-center">
                                        <iframe style="width: 100%" height="176" src="https://www.youtube.com/embed/fQUfIgLCAHU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                    <p>If you are a trader in the financial markets and are unable to remain consistently profitable...</p>
                                    <div class="text-center arrow-1">
                                        <a href="#"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Features Item -->
                        <div class="col-lg-4">
                            <div>
                                <img src="images/slider/005.png" alt="" class="img-b">
                            </div>
                            <div class="features_item  d-flex flex-column align-items-center ">
                                <div class="icon_container box-4 d-flex flex-column">
                                    <h3 class="text-center">Transformational Change</h3>
                                    <div class="features_item box-3 d-flex flex-column align-items-center justify-content-center text-center">
                                        <iframe style="width: 100%" height="176" src="https://www.youtube.com/embed/u7NntUPBdkM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                    <p>If you have found yourself at a stage where you feel like it is ‘now time’ to make a large change that is likely to impact...</p>
                                    <div class="text-center arrow-1">
                                        <a href="#"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Features Item -->
                        <div class="col-lg-4">
                            <div>
                                <img src="images/slider/006.png" alt="" class="img-b">
                            </div>
                            <div class="features_item  d-flex flex-column align-items-center ">
                                <div class="icon_container box-4 d-flex flex-column">
                                    <h3 class="text-center">Super Women</h3>
                                    <div class="features_item box-3 d-flex flex-column align-items-center justify-content-center text-center">
                                        <iframe style="width: 100%" height="176" src="https://www.youtube.com/embed/QwooUQ-oAHU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                    <p>If you are an ambitious woman, who wishes to break through the proverbial glass-ceiling that is restricting your progress...</p>
                                    <div class="text-center arrow-1">
                                        <a href="#"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="pad-50 bg-b">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="images/bg/cheryl-05.jpg" alt="" class="sub-img">
                        </div>
                        <div class="col-lg-9 subscribe">
                            <h2 class="color-w">JOIN OUR COMMUNITY OF DREAMERS, ACHIEVERS & CREATORS</h2>
                            <h4>Stay updated with articles, tools, updates from me.</h4>
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type='text' name='name' placeholder="Your Name..." class="input-box">
                                </div>
                                <div class="col-lg-4">
                                    <input type='email' name='email' placeholder="Your Email..." class="input-box">
                                </div>

                                <div class="col-lg-4">
                                    <button type="submit" class="button-2"><span>Submit</span></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- About -->
            <div class="about prlx_parent" style="background-image:url(images/main_slider_03.jpg);background-repeat: no-repeat;background-size: cover;background-position: right;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 text-center section_title">
                            <h2>about me</h2>
                        </div>
                    </div>
                    <div class="row">
                        <!--                        <div class="col-lg-6">
                                                    <img src='images/bg/cheryl-04.jpg' alt="">
                                                </div>-->
                        <div class="col-lg-6">
                            <div class="text-bg">
                                <div class="about_text">
                                    <h3 class="color-purple">Hi! I am Cheryl.</h3>
                                    <p><span>Inspire. Empower. Transform… My mantra.</span></p>
                                    <p>Dear friend, a warm welcome! I am a life-coach and a trader. I love life and everything & everybody that lives.
                                    <ul class="list-1">
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i><li>My highs: being unorthodox and doing the impossible.</li>
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i><li>My addictions: traveling and learning.</li>
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i><li>I write about big ideas and life-lessons from my experiences. I write about my travels around our magical planet and how it has changed my perception of our world.</li>
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i><li>Some people call me crazy. Others say I have changed their lives. Come, join the tribe and decide.</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="pad-20 margin-top-50 bg-p">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 text-center">
                                <button class="button-1" id="myBtn-1"><span>Join The Community</span></button>
                            </div>
                            <div class="col-lg-6 text-center">
                                <button class="button-1" id="myBtn"><span>Book a 30-minute FREE coaching session</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimonials -->
            <div class="testimonials">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 text-center section_title section_title_dark">
                            <h2>testimonials</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="testimonials_container">
                                <div class="testimonials_container_inner"></div>
                                <!-- Testimonials Slider -->
                                <div class="owl-carousel owl-theme testimonials_slider">
                                    <!-- Testimonials Item -->
                                    <!-- Testimonials Item -->
                                    <div class="owl-item-1 testimonials_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="testimonials_content">
                                            <div class="test_user_pic"><img src="images/testimonial/person-01.jpg" alt=""></div>
                                            <div class="test_name">Paul Dermody</div>
                                            <div class="test_title"></div>
                                            <div class="test_quote"></div>
                                            <p>Cheryl Pinto has been my life coach for the past 5 months. I was working in the IT industry for 5 years and felt like I needed a change and pursue a passion...</p>
                                            <div class="button discover_button center">
                                                <a href="testimonials.php#test-1" class="d-flex flex-row align-items-center justify-content-center">Read More<img src="images/arrow_right.svg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item-1 testimonials_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="testimonials_content">
                                            <div class="test_user_pic"><img src="images/testimonial/person-03.jpg" alt=""></div>
                                            <div class="test_name">Avil Pinto</div>
                                            <div class="test_title">Founder, Dubai Job Hunt</div>
                                            <div class="test_quote">"</div>
                                            <p>Today is just the 18th day since we began our coaching session. With just 2 sessions, falling short of words to describe the transformation that's...</p>
                                            <div class="button discover_button center">
                                                <a href="testimonials.php#test-1" class="d-flex flex-row align-items-center justify-content-center">Read More<img src="images/arrow_right.svg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Testimonials Item -->
                                    <div class="owl-item-1 testimonials_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="testimonials_content">
                                            <div class="test_user_pic"><img src="images/testimonial/person-02.jpg" alt=""></div>
                                            <div class="test_name">Kunal Bhatia</div>
                                            <div class="test_title">Assistant Vice President- FX, Interest rates & Commodity Derivative Solutions</div>
                                            <div class="test_quote">"</div>
                                            <p>At the outset I looked at NLP with a lot of skepticism and it was only because I trusted Cheryl that I decided to give it a shot. She has the ability...</p>
                                            <div class="button discover_button center">
                                                <a  href="testimonials.php#test-1" class="d-flex flex-row align-items-center justify-content-center">Read More<img src="images/arrow_right.svg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Testimonials Item -->
                                    <div class="owl-item-1 testimonials_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="testimonials_content">
                                            <div class="test_user_pic"><img src="images/testimonial/person-04.jpg" alt=""></div>
                                            <div class="test_name">Ram S</div>
                                            <div class="test_title">Team Leader at a bank in Dubai</div>
                                            <div class="test_quote">"</div>
                                            <p>Cheryl has been a friend, mentor and guide for me. I have worked with Cheryl over the past 14 months and I can term our engagement as a wonderful journey of discovering new things..,</p>
                                            <div class="button discover_button center">
                                                <a href="testimonials.php#test-1" class="d-flex flex-row align-items-center justify-content-center">Read More<img src="images/arrow_right.svg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Testimonials Item -->
                                    <div class="owl-item-1 testimonials_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="testimonials_content">
                                            <div class="test_user_pic"><img src="images/testimonial/person-05.jpg" alt=""></div>
                                            <div class="test_name">Neena Sharma</div>
                                            <div class="test_title">Associate Magazine Editor at The Gulf Today - Dar Al Khaleej</div>
                                            <div class="test_quote">"</div>
                                            <p>Cheryl’s warm nature and genuine empathy for her clients are her biggest strengths. She is patient, listens well and is non-judgmental..,</p>
                                            <div class="button discover_button center">
                                                <a href="testimonials.php#test-1" class="d-flex flex-row align-items-center justify-content-center">Read More<img src="images/arrow_right.svg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Testimonials Item -->
                                    <div class="owl-item-1 testimonials_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="testimonials_content">
                                            <div class="test_user_pic"><img src="images/testimonial/person-06.jpg" alt=""></div>
                                            <div class="test_name">Naman Rajvanshi</div>
                                            <div class="test_title">Sales & Operations Manager at Technauto</div>
                                            <div class="test_quote">"</div>
                                            <p>Cheryl has this contagious confidence in herself and the ability to build the same in you which makes you believe that you too can do it!</p>
                                            <div class="button discover_button center">
                                                <a href="testimonials.php#test-1" class="d-flex flex-row align-items-center justify-content-center">Read More<img src="images/arrow_right.svg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Testimonials Item -->
                                    <div class="owl-item-1 testimonials_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="testimonials_content">
                                            <div class="test_user_pic"><img src="images/testimonial/person-07.jpg" alt=""></div>
                                            <div class="test_name">Stefania Picheca</div>
                                            <div class="test_title">Director of Talent Management at TSA Solutions</div>
                                            <div class="test_quote">"</div>
                                            <p>Cheryl is smart, a fast-thinker and just asks the right question at the right time. After coaching with Cheryl, I felt energised and ready to face challenges with my chin up. </p>
                                            <div class="button discover_button center">
                                                <a href="testimonials.php#test-1" class="d-flex flex-row align-items-center justify-content-center">Read More<img src="images/arrow_right.svg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Testimonials Item -->
                                    <div class="owl-item-1 testimonials_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="testimonials_content">
                                            <div class="test_user_pic"><img src="images/testimonial/person-08.jpg" alt=""></div>
                                            <div class="test_name">Karim Zayed</div>
                                            <div class="test_title">Specialist at Novartis Oncology</div>
                                            <div class="test_quote">"</div>
                                            <p>Cheryl is result oriented. She will push you to your limits to get the results you want. I was lost in what I wanted for my career.</p>
                                            <div class="button discover_button center">
                                                <a href="testimonials.php#test-1" class="d-flex flex-row align-items-center justify-content-center">Read More<img src="images/arrow_right.svg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Testimonials Item -->
                                    <div class="owl-item-1 testimonials_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="testimonials_content">
                                            <div class="test_user_pic"><img src="images/testimonial/person-09.jpg" alt=""></div>
                                            <div class="test_name">Luma Iqbal</div>
                                            <div class="test_title">Student at Murdoch University - Bsc. Computer Science and Bsc. Business Information Systems</div>
                                            <div class="test_quote">"</div>
                                            <p>Cheryl has been my role model ever since I've met her. She's inspired me to better myself and improve my life by showing me it's possible.</p>
                                            <div class="button discover_button center">
                                                <a href="testimonials.php#test-1" class="d-flex flex-row align-items-center justify-content-center">Read More<img src="images/arrow_right.svg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Testimonials Item -->
                                    <div class="owl-item-1 testimonials_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="testimonials_content">
                                            <div class="test_user_pic"><img src="images/testimonial/person-10.jpg" alt=""></div>
                                            <div class="test_name">Fanika Nikic</div>
                                            <div class="test_title">Sales Manager at Azadea Group</div>
                                            <div class="test_quote">"</div>
                                            <p>Cheryl has a number of strengths & abilities that make her a spectacular coach. Some of them are: persistence, helping me break through self-imposed barriers, obtaining clarity and goal-setting.</p>
                                            <div class="button discover_button center">
                                                <a href="testimonials.php#test-1" class="d-flex flex-row align-items-center justify-content-center">Read More<img src="images/arrow_right.svg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Testimonials Slider Navigation -->
                        <div class="test_slider_nav test_slider_nav_left d-flex flex-column justify-content-center align-items-center trans_200">
                            <i class="fas fa-chevron-left trans_200"></i>
                        </div>
                        <div class="test_slider_nav test_slider_nav_right d-flex flex-column justify-content-center align-items-center trans_200">
                            <i class="fas fa-chevron-right trans_200"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Services -->
            <!--            <div class="services prlx_parent bg-pic" style="background-image: url(images/bg/bg-01.jpg);background-size: cover;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3 text-center section_title section_title_dark">
                                        <h2 class="color-w">Types of Cherly Coaching</h2>
                                    </div>
                                </div>
                                <div class="row pad-50">
                                    <div class="col-lg-4">
                                        <div class="box service_item text-left d-flex flex-column align-items-start justify-content-start">
                                            <div class="icon_container d-flex flex-column justify-content-end center">
                                                <img src="images/types/Financial-Freedom.png" alt="">
                                            </div>
                                            <h3 class="text-cen">Financial Freedom</h3>
                                            <p class="text-justify">If you often get to the end of the month and wonder where your money has gone, if your expenses exceed your income, if you find yourself drowning in the quagmire of credit card debts, if you wish to start saving more and building a retirement fund then get in touch with me now. I have been a banker for nearly 2 decades and have cracked the code.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="box service_item text-left d-flex flex-column align-items-start justify-content-start">
                                            <div class="icon_container d-flex flex-column justify-content-end center">
                                                <img src="images/types/Time-Management.png" alt="">
                                            </div>
                                            <h3 class="text-cen">Time Management</h3>
                                            <p class="text-justify">If you always find yourself wanting to do more, live more meaningfully, but are somehow unable to, then I will help shine the light on how you may manage your time and thus your life so that you live the life you want to live.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="box service_item text-left d-flex flex-column align-items-start justify-content-start">
                                            <div class="icon_container d-flex flex-column justify-content-end center">
                                                <img src="images/types/careerimage.png" alt="">
                                            </div>
                                            <h3 class="text-cen">Career Progress</h3>
                                            <p class="text-justify">If you are in a job that does not light you up, or in a career that you once loved but now wish to change, or if you are not advancing in your career no matter what you do, then chat with me and learn how I raced through the corporate ladder over my 17 years of experience in the corporate world.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="box service_item text-left d-flex flex-column align-items-start justify-content-start">
                                            <div class="icon_container d-flex flex-column justify-content-end center">
                                                <img src="images/types/Trader-Coach.png" alt="">
                                            </div>
                                            <h3 class="text-cen">Trader Coach</h3>
                                            <p class="text-justify">If you are a trader in the financial markets and are unable to remain consistently profitable, if you cannot stick to your rules or deal with the psychological impact of trading, talk to me. I am a Professional Trader and have been through the same painful rite of passage emerging victorious</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="box service_item text-left d-flex flex-column align-items-start justify-content-start">
                                            <div class="icon_container d-flex flex-column justify-content-end center">
                                                <img src="images/types/Transformational-Change.png" alt="">
                                            </div>
                                            <h3 class="text-cen">Transformational Change</h3>
                                            <p class="text-justify">If you have found yourself at a stage where you feel like it is ‘now time’ to make a large change that is likely to impact many facets of your life. If you wish to disrupt the status quo,follow your passion, live life to the fullest, then contact me right away. I will be honored to guide you along your path to your most fulfilling life.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="box service_item text-left d-flex flex-column align-items-start justify-content-start">
                                            <div class="icon_container d-flex flex-column justify-content-end center">
                                                <img src="images/types/Super-Women.png" alt="">
                                            </div>
                                            <h3 class="text-cen">Super Women</h3>
                                            <p class="text-justify">If you are an ambitious woman, who wishes to break through the proverbial glass-ceiling that is restricting your progress, learn how to ask for a raise or a promotion, be heard, grab a coffee with me. I have ‘been there, done that’ and am thrilled to help you learn the ropes.</p>
                                        </div>
                                    </div>
                                </div>
                                                    <div class="row">
                                                                            <div class="col text-center">
                                                                                <div class="button services_button">
                                                                                    <a href="services.html" class="d-flex flex-row align-items-center justify-content-center">
                                                                                        discover<img src="images/arrow_right.svg" alt="">
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                            </div>
                        </div>-->
            <!-- Clients -->
            <div class="clients">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 text-center section_title section_title_dark">
                            <h2>What You Like to Improve?</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 box-6">
                            <img src="images/bg/cheryl-07.jpg" alt=""/>
                        </div>
                        <div class="col-lg-8">
                            <div class="rio-promos">
                                <img src="images/slider/007.png" alt="" />
                                <img src="images/slider/008.png" alt="" />
                                <img src="images/slider/009.png" alt="" />
                                <img src="images/slider/010.png" alt="" />
                            </div>
                            <!--                            <h2 class="color-w">JOIN OUR COMMUNITY OF DREAMERS, ACHIEVERS & CREATORS</h2>
                                                            <h4>Stay updated with articles, tools, updates from me.</h4>-->
                            <div class="row" style="padding: 10px 0 20px;">
                                <div class="col-lg-4">
                                    <input type='text' name='name' placeholder="Your Name..." class="input-box">
                                </div>
                                <div class="col-lg-4">
                                    <input type='email' name='email' placeholder="Your Email..." class="input-box">
                                </div>
                                <div class="col-lg-4" style="text-align: center;">
                                    <button type="submit" class="button-2"><span>Submit</span></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Contact -->
            <div class="prlx_parent pad-50" style="background-image:url(images/bg/cheryl-06.jpg);background-repeat: no-repeat;background-size: cover;background-position: right;">
                <!-- <div class="contact_background parallax-window" data-parallax="scroll" data-speed="0.7" data-image-src="images/contact_background.jpg"></div> -->
                <div class=" prlx bg-enquiry"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 text-center section_title contact_title">
                            <h2>let's work together</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <form class="text-bg">
                                <h2>Contact us</h2>
                                <input type="text" name="fname" placeholder="Name" required > 
                                <input type="email" name="email" placeholder="Email Address" required>
                                <input type="text" name="phone" placeholder="Phone Number" required> 
                                <input type="text" name="subject" placeholder="subject" required>
                                <textarea type="text" name="requirement" placeholder="Requirement" class="req" required></textarea>
                                <button type="submit" class="button-1"><span class="color-w">Submit</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php include 'footer.php'; ?>
            <?php include 'onload-popup.php'; ?>
        </div>
        <!-- The Modal -->
        <div id="myModal-1" class="modal-1">
            <!-- Modal content -->
            <div class="modal-content-1">
                <div class="modal-header-1">
                    <span class="close-1">&times;</span>
                    <h2 style="text-align: center">30-Minutes Free Coaching Session</h2>
                </div>
                <div class="modal-body">
                    <form class="form-2">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                                <input type="text" name="fname">
                            </div>
                            <div class="col-md-6">
                                <label>Email Address</label>
                                <input type="email" name="email"> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Contact Number</label>
                                <input type="text" name="contact"> 
                            </div>
                            <div class="col-md-6">
                                <label>How do you want to be contacted</label>
                                <select name="How-do-contacted">
                                    <option value="Email">Email</option>
                                    <option value="Whatsapp">Whatsapp</option>
                                </select>
                            </div>
                        </div>
                        <label>My current challenge that I want to overcome</label>
                        <textarea type="text" name="requirement" class="req"></textarea>
                        <div class="button discover_button" style="margin-top: 20px">
                            <a href="#" class="d-flex flex-row align-items-center justify-content-center">Send<img src="images/arrow_right.svg" alt=""></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            // Get the modal
            var modal = document.getElementById('myModal-1');
            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close-1")[0];
            // When the user clicks the button, open the modal 
            btn.onclick = function () {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
        <div id="myModal-2" class="modal-1">
            <!--            Modal content -->
            <div class="modal-content-1">
                <div class="modal-header-1">
                    <span class="close-2">&times;</span>
                    <h2 style="text-align: center">Join The Community</h2>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <img src="images/bg/cheryl-07.jpg" alt="" class="img-2"/>
                            </div>
                            <div class="col-lg-8">
                                <p class="text-justify">Just an invitation - come and be a part of this wonderful community. I’ll be traveling the world, sharing my WOW-moments, delivering content to inspire you, sharing tools & tips to be more and live more. Don’t worry, I hate spam as much as you do. I promise to send you an email only once a month with awesome, relevant value for you.</p>
                            </div>
                        </div>
                        <form class="text-bg">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Name</label>
                                    <input type="text" name="fname">
                                </div>
                                <div class="col-lg-6">
                                    <label>Email Address</label>
                                    <input type="email" name="email">
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="button-1 font-16"><span class="color-w">Join us!</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // Get the modal
            var mode = document.getElementById('myModal-2');
            // Get the button that opens the modal
            var btnn = document.getElementById("myBtn-1");
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close-2")[0];
            // When the user clicks the button, open the modal 
            btnn.onclick = function () {
                mode.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                mode.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == mode) {
                    mode.style.display = "none";
                }
            }
        </script>
        <script src="js/silk_slider.js" type="text/javascript"></script>


    </body>
</html>
