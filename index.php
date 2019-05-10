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
                    <!-- Slider Dots -->
                    <div class="main_slider_nav_left main_slider_nav">
                        <i class="fas fa-chevron-left trans_300"></i>
                    </div>
                    <div class="main_slider_nav_right main_slider_nav">
                        <i class="fas fa-chevron-right trans_300"></i>
                    </div>
                </div>
            </div>
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
                                <div class="icon_container coach-box d-flex flex-column">
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
                                <div class="icon_container coach-box d-flex flex-column">
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
                                <div class="icon_container coach-box d-flex flex-column">
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
                                <div class="icon_container coach-box d-flex flex-column">
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
                                <div class="icon_container coach-box d-flex flex-column">
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
                                <div class="icon_container coach-box d-flex flex-column">
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
<?php include 'join-our-community.php'; ?>
            <!-- About -->
            <div class="about prlx_parent" style="background-image:url(images/main_slider_03.jpg);background-repeat: no-repeat;background-size: cover;background-position: right;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 text-center section_title">
                            <h2>about me</h2>
                        </div>
                    </div>
                    <div class="row">
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
            <?php include 'contact-page.php'; ?>
            <!-- Footer -->
            <?php include 'footer.php'; ?>
<?php include 'onload-popup.php'; ?>
        </div>
        <!-- The Modal -->
        <?php include 'join-page.php'; ?>
<?php include '30-minute-free.php'; ?>
        <script src="js/silk_slider.js" type="text/javascript"></script>
    </body>
</html>
