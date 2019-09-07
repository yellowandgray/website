<!DOCTYPE html>
<html lang="en">
    <?php
    include 'head.php';
    $page = 'home';
    ?>
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
                <video autoplay loop poster="polina.jpg" id="vid" muted>
                    <source src="vedio/home-01.mp4" type="video/mp4">
                </video>  
                <div class="overlay"></div>
                <div class="hero_slider_container slider_prlx">
                    <div class="owl-carousel owl-theme hero_slider container-slide">
                        <!-- Slider Item -->
                        <div class="owl-item main_slider_item">
                            <div class="main_slider_shapes"><img src="images/slider-png/banner-01.jpg" alt=""  style="width: 100% !important;"></div>
                            <!--<div class="main_slider_item_bg" style="background-image:url(images/main_slider_1.jpg)"></div>-->
                            <div class="container">
                                <div class="row">
                                    <div class="col slider_content_col">
                                        <div class="main_slider_content">
                                            <h1><span>Tired of your doubts & fears holding you back?</span></h1>
                                            <h1><span>Let us smash those limits and catapult you forward!</span></h1>
                                            <!--<h1>a <span>modern</span> website?</h1>-->
                                            <!--<p>Inspire. Empower. Transform… My mantra.</p>-->
                                            <!--                                            <div class="button discover_button">
                                                                                            <a href="about.php" class="d-flex flex-row align-items-center justify-content-center">discover<img src="images/arrow_right.svg" alt=""></a>
                                                                                        </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slider Item -->
                        <div class="owl-item main_slider_item">
                            <!--<div class="main_slider_item_bg" style="background-image:url(images/main_slider_2.jpg)"></div>-->
                            <div class="main_slider_shapes"><img src="images/slider-png/banner-02.jpg" alt="" style="width: 100% !important;"></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col slider_content_col">
                                        <div class="main_slider_content">
                                            <h1><span>You KNOW that you can do & be so much more. But something holds you back?</span></h1>
                                            <h1><span>Let’s work together so you can live the life you want to live. </span></h1>
<!--                                                <p>I am a certified NLP Master Practitioner and an Advanced Life Coach.</p>
                                            <div class="button discover_button">
                                                <a href="about.php" class="d-flex flex-row align-items-center justify-content-center">discover<img src="images/arrow_right.svg" alt=""></a>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slider Item -->
                        <div class="owl-item main_slider_item">
                            <!--<div class="main_slider_item_bg" style="background-image:url(images/main_slider_3.jpg)"></div>-->
                            <div class="main_slider_shapes"><img src="images/slider-png/banner-03.jpg" alt="" style="width: 100% !important;"></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col slider_content_col">
                                        <div class="main_slider_content">
                                            <h1><span>Want to move from confusion to clarity? From difficulties to opportunities? From fear to freedom? </span></h1>
                                            <h1><span>You’ve only got one life. Let’s make sure it’s the greatest possible one! </span></h1>
<!--                                            <p> I saw, first-hand, what a powerful vision, belief and perseverance can do.</p>
                                            <div class="button discover_button">
                                                <a href="about.php" class="d-flex flex-row align-items-center justify-content-center">discover<img src="images/arrow_right.svg" alt=""></a>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item main_slider_item">
                            <!--<div class="main_slider_item_bg" style="background-image:url(images/main_slider_3.jpg)"></div>-->
                            <div class="main_slider_shapes"><img src="images/slider-png/banner-04.jpg" alt="" style="width: 100% !important;"></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col slider_content_col">
                                        <div class="main_slider_content">
                                            <h1><span>Of course, you can do it by yourself. </span></h1>
                                            <h1><span>But having a Partner makes it so much easier & quicker. </span></h1>
                                            <h1><span>Let’s work together so you may live the life you want. </span></h1>
<!--                                            <p> I saw, first-hand, what a powerful vision, belief and perseverance can do.</p>
                                            <div class="button discover_button">
                                                <a href="about.php" class="d-flex flex-row align-items-center justify-content-center">discover<img src="images/arrow_right.svg" alt=""></a>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item main_slider_item">
                            <!--<div class="main_slider_item_bg" style="background-image:url(images/main_slider_3.jpg)"></div>-->
                            <div class="main_slider_shapes"><img src="images/slider-png/banner-05.jpg" alt="" style="width: 100% !important;"></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col slider_content_col">
                                        <div class="main_slider_content">
                                            <h1><span>What if you reach the top and realize you’ve climbed the wrong mountain? </span></h1>
                                            <h1><span>Let’s work together and discover your true purpose, passion & path. </span></h1>
                                            <h1><span>Here is to you having a life of no regrets! </span></h1>
<!--                                            <p> I saw, first-hand, what a powerful vision, belief and perseverance can do.</p>
                                            <div class="button discover_button">
                                                <a href="about.php" class="d-flex flex-row align-items-center justify-content-center">discover<img src="images/arrow_right.svg" alt=""></a>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slider Dots -->
                    <!-- Slider Dots -->
                    <div class="main_slider_nav_left main_slider_nav">
                        <i class="fas fa-chevron-left trans_300"></i>
                    </div>
                    <div class="main_slider_nav_right main_slider_nav">
                        <i class="fas fa-chevron-right trans_300"></i>
                    </div>
                </div>
            </div>
            <?php include 'join-our-community.php'; ?>
            <!-- Features -->
            <div class="features">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 text-center section_title section_title_dark wow fadeInDown">
                            <h2>MASTER EVERY AREA OF YOUR LIFE</h2>
                        </div>
                    </div>
                    <div class="bx-01">
                        <!-- Features Item -->
                        <div class="bx-02  coach-box  wow fadeInUp">
                            <div>
                                <img src="images/slider/001.png" alt="" class="img-b">
                            </div>
                            <div class="features_item  d-flex flex-column align-items-center ">
                                <div class="icon_container d-flex flex-column">
                                    <h3 class="text-center">Financial Freedom</h3>
                                    <video class=" video-res features_item box-3 d-flex flex-column align-items-center justify-content-end text-center" style="width: 100%" height="315" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen controls>
                                        <source src="vedio/WhatsApp Video 2018-12-18 at 11.14.49 AM (1).mp4" type="video/mp4">
                                        Your browser does not support the <code>video</code> tag.
                                    </video>
                                    <p>Do you now wish to stop working for money and have money work for you? Do you often get to the end of the month and wonder where your money has gone? Are you drowning in the quagmire of credit card debts and know that something needs to change? Then get in touch with me now. I have been a banker for nearly 2 decades, have cracked the code and am waiting to show you how you too, can become finanically free. </p>
                                    <div class="text-center arrow-1">
                                        <a href="resources.php"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Features Item -->
                        <div class="bx-02  coach-box wow fadeInUp">
                            <div>
                                <img src="images/slider/002.png" alt="" class="img-b">
                            </div>
                            <div class="features_item  d-flex flex-column align-items-center ">
                                <div class="icon_container  d-flex flex-column">
                                    <h3 class="text-center">Life Control</h3>
                                    <video class="video-res features_item box-3 d-flex flex-column align-items-center justify-content-end text-center" style="width: 100%" height="315" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen controls>
                                        <source src="vedio/WhatsApp Video 2018-12-18 at 11.36.35 AM.mp4" type="video/mp4">
                                        Your browser does not support the <code>video</code> tag.
                                    </video>
                                    <p>Do you find yourself wanting to do more, live more meaningfully, give back to the world, but just haven't been able to? Connect with me and we will shine the light on how you may manage your time and thus your life so that you live the life you want to live.</p>
                                    <div class="text-center arrow-1">
                                        <a href="resources.php"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Features Item -->
                        <div class="bx-02  coach-box wow fadeInUp">
                            <div>
                                <img src="images/slider/003.png" alt="" class="img-b">
                            </div>
                            <div class="features_item  d-flex flex-column align-items-center ">
                                <div class="icon_container d-flex flex-column">
                                    <h3 class="text-center">Career Mastery</h3>
                                    <video class="video-res features_item box-3 d-flex flex-column align-items-center justify-content-end text-center" style="width: 100%" height="315" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen controls>
                                        <source src="vedio/WhatsApp Video 2018-12-18 at 11.36.35 AM.mp4" type="video/mp4">
                                        Your browser does not support the <code>video</code> tag.
                                    </video>
                                    <p>Are you in a job that does not light you up, or in a career that you once loved but now wish to change? Or do you find yourself unable to advance in your career no matter what you do? Then chat with me and we will discover how you too can race through the corporate ladder.</p>
                                    <div class="text-center arrow-1">
                                        <a href="resources.php"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="bx-01 margin-top-50">
                        <!-- Features Item -->
                        <div class="wow bx-02 coach-box fadeInUp">
                            <div>
                                <img src="images/slider/004.png" alt="" class="img-b">
                            </div>
                            <div class="features_item  d-flex flex-column align-items-center ">
                                <div class="icon_container  d-flex flex-column">
                                    <h3 class="text-center">Professional Trader</h3>
                                    <div class="features_item box-3 d-flex flex-column align-items-center justify-content-end text-center">
                                        <iframe style="width: 100%" height="176" src="https://www.youtube.com/embed/fQUfIgLCAHU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                    <p>Are you a trader in the financial markets and are unable to remain consistently profitable? Perhaps you cannot stick to your rules or deal with the psychological impact of trading? Talk to me - I trade Forex and Futures markets - I have been through the same painful rite of passage and emerged victorious. </p>
                                    <div class="text-center arrow-1">
                                        <a href="resources.php"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Features Item -->
                        <div class="bx-02 coach-box wow fadeInUp">
                            <div>
                                <img src="images/slider/005.png" alt="" class="img-b">
                            </div>
                            <div class="features_item  d-flex flex-column align-items-center ">
                                <div class="icon_container  d-flex flex-column">
                                    <h3 class="text-center">Life reboot</h3>
                                    <div class="features_item box-3 d-flex flex-column align-items-center justify-content-center text-center">
                                        <iframe style="width: 100%" height="176" src="https://www.youtube.com/embed/u7NntUPBdkM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                    <p>Are you at a stage where you feel like it is ‘now time’ to make a large change? Do you feel that there "there has to be more than this" and want to radically catapult all areas of your life? If you wish to disrupt the status quo,follow your passion, live life to the fullest, then contact me right away. I will be honored to guide you along your path to your most fulfilling life.</p>
                                    <div class="text-center arrow-1">
                                        <a href="resources.php"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Features Item -->
                        <div class="coach-box bx-02 wow fadeInUp">
                            <div>
                                <img src="images/slider/006.png" alt="" class="img-b">
                            </div>
                            <div class="features_item  d-flex flex-column align-items-center ">
                                <div class="icon_container  d-flex flex-column">
                                    <h3 class="text-center">Woman Of Wonder</h3>
                                    <div class="features_item box-3 d-flex flex-column align-items-center justify-content-center text-center">
                                        <iframe style="width: 100%" height="176" src="https://www.youtube.com/embed/QwooUQ-oAHU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                    <p>Are you an ambitious woman, who wishes to break through the proverbial glass-ceiling that is restricting your progress? Do you want it to be easier to ask for a raise or a promotion or be heard? Then grab a coffee with me! I have ‘been there, done that’ and am thrilled to help you learn the ropes. Let's do this, sister! </p>
                                    <div class="text-center arrow-1">
                                        <a href="resources.php"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- About -->
            <div class="about prlx_parent" style="background-image:url(images/main_slider_03.jpg);background-repeat: no-repeat;background-size: cover;background-position: right;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 text-center section_title wow fadeInDown">
                            <h2>ABOUT CHERYL</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="text-bg wow fadeInUp">
                                <div class="about_text">
                                    <h3 class="color-purple">Hi! I am Cheryl.</h3>
                                    <p><span>Inspire. Empower. Transform… My mantra.</span></p>
                                    <p>Dear friend, a warm welcome! I am a life-coach and a trader. I love life and everything & everybody that lives.
                                    <ul class="list-1">
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i><li>Cheryl Pinto is the CEO of GrowPro Consultants, where the #1 objective is to help people to Learn, Earn & Prosper. </li>
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i><li>She is the author of the upcoming book From Fear to Freedom - Master your Money & your Mind.</li>
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i><li>She has been trained by Tony Robbins (yes, she walked on fire!), holds two Masters degrees and is a Harvard alumni. </li>
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i><li>Through her work, she helps people to unlearn old patterns / habits and embrace a completely new version of themselves. </li>
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i><li>Her private coaching clients have reported remarkable life transformations in all areas of their lives. Be it getting out of the rat-race & launching successful new businesses or throwing away anti-depressants or getting into the best shape of their lives, the list is varied & vast.</li>
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i><li>Through her workshops and Masterminds, she shares her secrets on how you may quickly achieve career success and financial freedom. </li>
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i><li>She has touched thousands of lives with her work and says the journey has only just begun. Her goal is to touch the lives of 2 million people by 2022. Will you help her?</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="pad-20 margin-top-50 bg-p">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 text-center  wow fadeInLeft">
                                <button class="button-1" id="myBtn-1"><span>Join The Community</span></button>
                            </div>
                            <div class="col-lg-6 text-center wow fadeInRight">
                                <!--<button class="button-1" id="myBtn"><span>Apply to Coach with Cheryl</span></button>-->
                                <button class="button-1"><span><a href="contact.php" class="color-w">Apply to Coach with Cheryl</a></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimonials -->
            <div class="testimonials">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 text-center section_title section_title_dark wow fadeInDown">
                            <h2>testimonials</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1 wow fadeInUp">
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
                                                <a href="testimonials.php" class="d-flex flex-row align-items-center justify-content-center">Read More<img src="images/arrow_right.svg" alt=""></a>
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
                                                <a href="testimonials.php" class="d-flex flex-row align-items-center justify-content-center">Read More<img src="images/arrow_right.svg" alt=""></a>
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
                                                <a  href="testimonials.php" class="d-flex flex-row align-items-center justify-content-center">Read More<img src="images/arrow_right.svg" alt=""></a>
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
                                                <a href="testimonials.php" class="d-flex flex-row align-items-center justify-content-center">Read More<img src="images/arrow_right.svg" alt=""></a>
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
                                                <a href="testimonials.php" class="d-flex flex-row align-items-center justify-content-center">Read More<img src="images/arrow_right.svg" alt=""></a>
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
                                                <a href="testimonials.php" class="d-flex flex-row align-items-center justify-content-center">Read More<img src="images/arrow_right.svg" alt=""></a>
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
                                                <a href="testimonials.php" class="d-flex flex-row align-items-center justify-content-center">Read More<img src="images/arrow_right.svg" alt=""></a>
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
                                                <a href="testimonials.php" class="d-flex flex-row align-items-center justify-content-center">Read More<img src="images/arrow_right.svg" alt=""></a>
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
                                                <a href="testimonials.php" class="d-flex flex-row align-items-center justify-content-center">Read More<img src="images/arrow_right.svg" alt=""></a>
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
                                                <a href="testimonials.php" class="d-flex flex-row align-items-center justify-content-center">Read More<img src="images/arrow_right.svg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Testimonials Slider Navigation -->
                        <div class="test_slider_nav test_slider_nav_left d-flex flex-column justify-content-center align-items-center trans_200 wow fadeInLeft">
                            <i class="fas fa-chevron-left trans_200"></i>
                        </div>
                        <div class="test_slider_nav test_slider_nav_right d-flex flex-column justify-content-center align-items-center trans_200 wow fadeInRight">
                            <i class="fas fa-chevron-right trans_200"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Services -->
            <!-- Counter -->
            <div class="counter-section">
                <div class="container">
                    <div class="row love_counter" id="counter">
                        <div class="col-md-3">
                            <div class="counter col_fourth">
                                <img src="images/counter-img/follow-sm.png" class="fa-2x" alt="">
                                <!--<h2 class="timer count-title count-number" data-to="3000" data-speed="1500"></h2>-->
                                <div class="love_count counter-value timer count-title count-number" data-count="17">17</div>
                                <p class="count-text ">Years of Corporate Experience</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="counter col_fourth">
                                <img src="images/counter-img/reached-wrokshop.png" class="fa-2x" alt=""></i>
                                <!--<h2 class="timer count-title count-number" data-to="500" data-speed="1500"></h2>-->
                                <div class="love_count counter-value timer count-title count-number" data-count="500">500</div>
                                <p class="count-text ">Reached via Trainings</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="counter col_fourth">
                                <img src="images/counter-img/one-to-one.png" class="fa-2x" alt="">
                                <!--<h2 class="timer count-title count-number" data-to="200" data-speed="1500"></h2>-->
                                <div class="love_count counter-value timer count-title count-number" data-count="300">300</div>
                                <p class="count-text ">1:1 Coaching Hours</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="counter col_fourth end">
                                <img src="images/counter-img/visitors-website.png" class="fa-2x" alt="">
                                <!--<h2 class="timer count-title count-number" data-to="1000" data-speed="1500"></h2>-->
                                <div class="love_count counter-value timer count-title count-number" data-count="3000">3000</div>
                                <p class="count-text ">Followers on SM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Counter -->
            <!-- Clients -->
            <div class="clients">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 text-center section_title section_title_dark wow fadeInDown">
                            <h2>What You Like to Improve?</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 box-6 wow fadeInUp">
                            <img src="images/bg/cheryl-07.jpg" alt=""/>
                        </div>
                        <div class="col-lg-8 wow fadeInUp">
                            <div class="rio-promos">
                                <div>
                                    <img src="images/png/chat.png" alt="" />
                                    <h3>COMMUNICATION SKILLS</h3>
                                    <P>Presentation & Relationships</P>
                                </div>
                                <div>
                                    <img src="images/png/note.png" alt="" />
                                    <h3>IMPROVE DISCIPLINE</h3>
                                    <P>Life Control & Results</P>
                                </div>
                                <div>
                                    <img src="images/png/clock.png" alt="" />
                                    <h3>MANAGE TIME</h3>
                                    <P>More Life & Living</P>
                                </div>
                                <div>
                                    <img src="images/png/doller-01.png" alt="" />
                                    <h3>IMPROVE FINANCES</h3>
                                    <P>Assessment & Saving</P>
                                </div>
                            </div>
                            <div class="row wow fadeInUp improve" style="padding: 10px 0 20px;">
                                <div class="col-12">
                                    <form class="improve-form">
                                        <div class="row">
                                            <div class="col-lg-4 form-group">
                                                <input type='text' name='name' placeholder="Your Name..." class="input-box">
                                            </div>
                                            <div class="col-lg-4 form-group">
                                                <input type='email' name='email' placeholder="Your Email..." class="input-box">
                                            </div>
                                            <div class="col-lg-4 form-group" style="text-align: center;">
                                                <button type="submit" class="button-2"><span>Submit</span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="features">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 text-center section_title section_title_dark wow fadeInDown">
                            <h2>As Featured In</h2>
                        </div>
                    </div>
                    <div class="bx-01">
                        <div class="bx-02 apperance">
                            <div class="wow fadeInUp">
                                <h2><a href="https://www.khaleejtimes.com/redefining-memory-skills-in-the-digital-age" target="blank" style="font-size:21px;">Khaleej Times</a></h2>
                                <span>Filed on August 6, 2018</span>
                                <img src="images/khaleej_times.png" alt="" style="width: 100%;"/>
                                <p>"Neuro-linguistic programming (NLP) offers various tools to aid in improving memory by using the brain's ability for spatial, visual, auditory and kinesthetic storage and recall. One effective method has three steps. First, decide that you want to remember it. Then, pay close attention by writing it down. Finally, create an enchanting story with characters and a sequence of events. Make the story memorable by making it funny, exciting or even ridiculous. This will then help you to quickly recall the story and thus the information that you stored within it."</p>
                            </div>
                        </div>
                        <div class="bx-02 apperance">
                            <div class="wow fadeInUp">
                                <h2><a href="http://magazines.toastmasters.org/article/HOW_TO/1261771/138995/article.html" target="blank" style="font-size:21px;">Toastmasters International Magazine</a></h2>
                                <span>January 2013</span>
<!--                                <img src="images/khaleej_times.png" alt="" style="width: 100%;"/>-->
                                <h3>HOW TO</h3>
                                <span>Cheryl Pinto</span>
                                <p>WHAT GETS SCHEDULED GETS DONE</p>
                                <p>Take tangible steps to meet your goals.</p>
                                <p>“When it is obvious that the goals cannot be reached, don’t adjust the goals, adjust the action steps.” -Confucius</p>
                                <p>"Dream big” is a phrase we are all familiar with. It is a dogma preached by many at self-help seminars. Volumes have been written about it. However, the hoopla surrounding dreams has overshadowed an equally, if not more important, factor—action. It has been said that “an ounce of action is worth a ton of theory.” It is understandable why action is not everyone’s favorite topic of discussion—it involves work!</p>
                            </div>
                        </div>
                        <div class="bx-02 apperance">
                            <div class="wow fadeInUp">
                                <h2><a href="https://www.ivyexec.com/best-executive-mba-rankings/sp-jain-executive-mba-in-dubai-review" target="blank" style="font-size:21px;">SP Jain’s Featured IVY Exec Alumni</a></h2>
<!--                                <span>Filed on August 6, 2018</span>-->
<!--                                <img src="images/khaleej_times.png" alt="" style="width: 100%;"/>-->
                                <h3 style="text-align: center;margin: 20px 0;">Featured Alumni</h3>
                                <div class="row" style="background: #eee;padding: 10px 0">
                                    <div class="col-md-4">
                                        <img src="images/apperence-img.jpg" alt="" style="width: 100%" />
                                    </div>
                                    <div class="col-md-8" style="padding: 20px 0">
                                        <h4>Cheryl P Pinto</h4>
                                        <p>CEO & Managing Director, GrowPro Consultants</p>
                                    </div>
                                </div>
                                <br/>
                                <p>Cheryl P Pinto is the CEO & Managing Director of GrowPro Consultants where she works with individuals who are seeking to exponentially grow their professional performance. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact -->
            <?php include 'contact-page.php'; ?>
            <!-- Footer -->
            <?php include 'footer.php'; ?>
            <?php include 'onload-popup.php'; ?>
        </div>
        <!-- The Modal -->
        <?php include 'join-page.php'; ?>
        <?php include '30-minute-free.php'; ?>
        <script src="js/silk_slider.js" type="text/javascript"></script>
        <script type="text/javascript">
        jQuery(window).scroll(startCounter);
        function startCounter() {
            var hT = jQuery('.love_counter').offset().top,
                    hH = jQuery('.love_counter').outerHeight(),
                    wH = jQuery(window).height();
            if (jQuery(window).scrollTop() > hT + hH - wH) {
                jQuery(window).off("scroll", startCounter);
                jQuery('.love_count').each(function () {
                    var $this = jQuery(this);
                    jQuery({Counter: 0}).animate({Counter: $this.text()}, {
                        duration: 1500,
                        easing: 'swing',
                        step: function () {
                            $this.text(Math.ceil(this.Counter) + '+');
                        }
                    });
                });
            }
        }
        </script>
<!--        <script type="text/javascript">
    (function ($) {
        $.fn.countTo = function (options) {
            options = options || {};

            return $(this).each(function () {
                // set options for current element
                var settings = $.extend({}, $.fn.countTo.defaults, {
                    from: $(this).data('from'),
                    to: $(this).data('to'),
                    speed: $(this).data('speed'),
                    refreshInterval: $(this).data('refresh-interval'),
                    decimals: $(this).data('decimals')
                }, options);

                // how many times to update the value, and how much to increment the value on each update
                var loops = Math.ceil(settings.speed / settings.refreshInterval),
                        increment = (settings.to - settings.from) / loops;

                // references & variables that will change with each update
                var self = this,
                        $self = $(this),
                        loopCount = 0,
                        value = settings.from,
                        data = $self.data('countTo') || {};

                $self.data('countTo', data);

                // if an existing interval can be found, clear it first
                if (data.interval) {
                    clearInterval(data.interval);
                }
                data.interval = setInterval(updateTimer, settings.refreshInterval);

                // initialize the element with the starting value
                render(value);

                function updateTimer() {
                    value += increment;
                    loopCount++;

                    render(value);

                    if (typeof (settings.onUpdate) == 'function') {
                        settings.onUpdate.call(self, value);
                    }

                    if (loopCount >= loops) {
                        // remove the interval
                        $self.removeData('countTo');
                        clearInterval(data.interval);
                        value = settings.to;

                        if (typeof (settings.onComplete) == 'function') {
                            settings.onComplete.call(self, value);
                        }
                    }
                }

                function render(value) {
                    var formattedValue = settings.formatter.call(self, value, settings);
                    $self.html(formattedValue);
                }
            });
        };

        $.fn.countTo.defaults = {
            from: 0, // the number the element should start at
            to: 0, // the number the element should end at
            speed: 1000, // how long it should take to count between the target numbers
            refreshInterval: 100, // how often the element should be updated
            decimals: 0, // the number of decimal places to show
            formatter: formatter, // handler for formatting the value before rendering
            onUpdate: null, // callback method for every time the element is updated
            onComplete: null       // callback method for when the element finishes updating
        };

        function formatter(value, settings) {
            return value.toFixed(settings.decimals);
        }
    }(jQuery));

    jQuery(function ($) {
        // custom formatting example
        $('.count-number').data('countToOptions', {
            formatter: function (value, options) {
                return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
            }
        });

        // start all the timers
        $('.timer').each(count);

        function count(options) {
            var $this = $(this);
            options = $.extend({}, options || {}, $this.data('countToOptions') || {});
            $this.countTo(options);
        }
    });
    </script>-->
    </body>
</html>
