<!DOCTYPE html>
<html lang="en">
    <?php
    include 'head.php';
    $page = 'home';
    ?>
    <script>

        setTimeout(
                function showModal() {

                    $('#myModal').modal('show');

                }, 1000);

    </script>
    <body onload="showModal()">
        <div class="super_container">
            <!-- Header -->
            <header class="header d-flex flex-row justify-content-end align-items-center">
                <!-- Logo -->
                <div class="logo_container mr-auto">
                    <div class="logo text-center">
                        <a href="#"><img src="images/logo.png" alt=""/></a>
                    </div>
                </div>
                <!-- Main Navigation -->
                <nav class="main_nav justify-self-end">
                    <ul class="nav_items">
                        <li class="active"><a href="#"><span>Blogs</span></a></li>
                        <li><a href="#"><span>Resources</span></a></li>
                        <li><a href="#"><span>Work With us</span></a></li>
                        <li><a href="#"><span>Testimonials</span></a></li>
                        <li><a href="#"><span>About Cheryl</span></a></li>
                        <li><a href="#"><span>Contact</span></a></li>
                    </ul>
                </nav>
                <!-- Hamburger -->
                <div class="hamburger_container">
                    <span class="hamburger_text">Menu</span>
                    <span class="hamburger_icon"></span>
                </div>
            </header>
            <!-- Menu -->
            <div class="fs_menu_overlay"></div>
            <div class="fs_menu_container">
                <div class="fs_menu_shapes"><img src="images/menu_shapes.png" alt=""></div>
                <nav class="fs_menu_nav">
                    <ul class="fs_menu_list">
                        <li><a href="#"><span><span>B</span>Blogs</span></a></li>
                        <li><a href="#"><span><span>R</span>Resources</span></a></li>
                        <li><a href="#"><span><span>W</span>Work With us</span></a></li>
                        <li><a href="#"><span><span>T</span>Testimonials</span></a></li>
                        <li><a href="#"><span><span>A</span>About Cheryl</span></a></li>
                        <li><a href="#"><span><span>C</span>Contact</span></a></li>
                    </ul>
                </nav>
                <div class="fs_social_container d-flex flex-row justify-content-end align-items-center">
                    <ul class="fs_social">
                        <li><a href="#"><i class="fab fa-pinterest trans_300"></i></a></li>
                        <li><a href="#"><i class="fab fa-facebook-f trans_300"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter trans_300"></i></a></li>
                        <li><a href="#"><i class="fab fa-dribbble trans_300"></i></a></li>
                        <li><a href="#"><i class="fab fa-behance trans_300"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in trans_300"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- Hero Slider -->
            <div class="home">
                <video autoplay loop poster="polina.jpg" id="vid" muted="muted">
                    <source src="images/test.mp4" type="video/mp4">
                </video>  
                <div class="overlay"></div>
                <div class="hero_slider_container slider_prlx">
                    <div class="owl-carousel owl-theme hero_slider">
                        <!-- Slider Item -->
                        <div class="owl-item main_slider_item">
                            <!--<div class="main_slider_item_bg" style="background-image:url(images/main_slider_1.jpg)"></div>-->
                            <div class="main_slider_shapes"><img src="images/bg/cheryl-03.jpg" alt="" style="width: 100% !important;"></div>
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
                            <div class="main_slider_shapes"><img src="images/bg/cheryl-01.jpg" alt="" style="width: 100% !important;"></div>
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
                            <div class="main_slider_shapes"><img src="images/bg/cheryl-02.jpg" alt="" style="width: 100% !important;"></div>
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
                        <!-- Features Item -->
                        <div class="col-lg-4">
                            <div class="features_item d-flex flex-column align-items-center justify-content-end text-center">
                                <div class="icon_container d-flex flex-column justify-content-end">
                                    <img src="images/slider/001.png" alt="">
                                </div>
                                <h3>Money & Finance</h3>
                                <p>Money – we spend our whole lives working for it but do not know where it goes or how to make it work for us. Maybe it’s time we figured it out?</p>
                            </div>
                        </div>
                        <!-- Features Item -->
                        <div class="col-lg-4">
                            <div class="features_item d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="icon_container d-flex flex-column justify-content-end">
                                    <img src="images/slider/002.png" alt="">
                                </div>
                                <h3>Self-Development</h3>
                                <p>Be it time, relationships, health or skill development there is always something we can learn to do better. Let’s get started!</p>
                            </div>
                        </div>
                        <!-- Features Item -->
                        <div class="col-lg-4">
                            <div class="features_item d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="icon_container d-flex flex-column justify-content-end">
                                    <img src="images/slider/003.png" alt="">
                                </div>
                                <h3>Travel</h3>
                                <p>Travel – everyone is talking about it. Why travel? How to travel? Where to travel to? Let’s find out! </br> &nbsp;</p>
                            </div>
                        </div>
                    </div>
                    <div class="row margin-top-50">
                        <!-- Features Item -->
                        <div class="col-lg-4">
                            <div class="features_item d-flex flex-column align-items-center justify-content-end text-center">
                                <div class="icon_container d-flex flex-column justify-content-end">
                                    <img src="images/slider/004.png" alt="">
                                </div>
                                <h3>Money & Finance</h3>
                                <p>Money – we spend our whole lives working for it but do not know where it goes or how to make it work for us. Maybe it’s time we figured it out?</p>
                            </div>
                        </div>
                        <!-- Features Item -->
                        <div class="col-lg-4">
                            <div class="features_item d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="icon_container d-flex flex-column justify-content-end">
                                    <img src="images/slider/005.png" alt="">
                                </div>
                                <h3>Self-Development</h3>
                                <p>Be it time, relationships, health or skill development there is always something we can learn to do better. Let’s get started!</p>
                            </div>
                        </div>
                        <!-- Features Item -->
                        <div class="col-lg-4">
                            <div class="features_item d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="icon_container d-flex flex-column justify-content-end">
                                    <img src="images/slider/006.png" alt="">
                                </div>
                                <h3>Travel</h3>
                                <p>Travel – everyone is talking about it. Why travel? How to travel? Where to travel to? Let’s find out! </br> &nbsp;</p>
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
                        <div class="col-lg-9">
                            <h3 class="color-w"><strong>JOIN OUR COMMUNITY OF DREAMERS, ACHIEVERS & CREATORS</strong></h3>
                            <h4 class="color-purple">Stay updated with articles, tools, updates from me.</h4>
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type='text' name='name' placeholder="Your Name..." class="input-box">
                                </div>
                                <div class="col-lg-4">
                                    <input type='email' name='email' placeholder="Your Email..." class="input-box">
                                </div>
                                <div class="col-lg-4">
                                    <button type='submit' class="sub-submit">subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- About -->
            <div class="about prlx_parent" style="background-image:url(images/main_slider_03.jpg);background-repeat: no-repeat;background-size: cover;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 text-center section_title">
                            <h2>about</h2>
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
                            <div class="col-lg-6">
                                <p class="join text-center"><a href="#" >Join The Community</a></p>
                            </div>
                            <div class="col-lg-6">
                                <p class="join text-center"><a href="#" >Book a 30-minute FREE coaching session</a></p>
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
                                                <a href="#" class="d-flex flex-row align-items-center justify-content-center">Read More<img src="images/arrow_right.svg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item-1 testimonials_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="testimonials_content">
                                            <div class="test_user_pic"><img src="images/testimonial/person-02.jpg" alt=""></div>
                                            <div class="test_name">Avil Pinto</div>
                                            <div class="test_title">Founder, Dubai Job Hunt</div>
                                            <div class="test_quote">"</div>
                                            <p>Today is just the 18th day since we began our coaching session. With just 2 sessions, falling short of words to describe the transformation that's...</p>
                                            <div class="button discover_button center">
                                                <a href="#" class="d-flex flex-row align-items-center justify-content-center">Read More<img src="images/arrow_right.svg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Testimonials Item -->
                                    <div class="owl-item-1 testimonials_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="testimonials_content">
                                            <div class="test_user_pic"><img src="images/testimonial/person-03.jpg" alt=""></div>
                                            <div class="test_name">Kunal Bhatia</div>
                                            <div class="test_title">Assistant Vice President- FX, Interest rates & Commodity Derivative Solutions</div>
                                            <div class="test_quote">"</div>
                                            <p>At the outset I looked at NLP with a lot of skepticism and it was only because I trusted Cheryl that I decided to give it a shot. She has the ability...</p>
                                            <div class="button discover_button center">
                                                <a href="#" class="d-flex flex-row align-items-center justify-content-center">Read More<img src="images/arrow_right.svg" alt=""></a>
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
            <div class="services prlx_parent bg-pic" style="background-image: url(images/bg/bg-01.jpg);background-size: cover;">
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
                    <!--                    <div class="row">
                                                                <div class="col text-center">
                                                                    <div class="button services_button">
                                                                        <a href="services.html" class="d-flex flex-row align-items-center justify-content-center">
                                                                            discover<img src="images/arrow_right.svg" alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>-->
                </div>
            </div>
            <!-- Clients -->
            <div class="clients">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 text-center section_title section_title_dark">
                            <h2>I Want to Improve...</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="service_item text-left d-flex flex-column align-items-start justify-content-start box-1">
                                <div class="icon_container d-flex flex-column justify-content-end center">
                                    <img src="images/png/doller-01.png" alt="">
                                </div>
                                <h3 class=" color-black text-cen">Improve Finances</h3>
                                <p class="text-cen color-black">Assessment & Saving</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="service_item text-left d-flex flex-column align-items-start justify-content-start box-1">
                                <div class="icon_container d-flex flex-column justify-content-end center">
                                    <img src="images/png/clock.png" alt="">
                                </div>
                                <h3 class=" color-black text-cen">Manage<br/> Time</h3>
                                <p class="text-cen color-black">More Life & Living</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="service_item text-left d-flex flex-column align-items-start justify-content-start box-1">
                                <div class="icon_container d-flex flex-column justify-content-end center">
                                    <img src="images/png/note.png" alt="">
                                </div>
                                <h3 class=" color-black text-cen">Improve Discipline</h3>
                                <p class="text-cen color-black">Life Control & Results</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="service_item text-left d-flex flex-column align-items-start justify-content-start box-1">
                                <div class="icon_container d-flex flex-column justify-content-end center">
                                    <img src="images/png/chat.png" alt="">
                                </div>
                                <h3 class=" color-black text-cen">Communication Skills</h3>
                                <p class="text-cen color-black">Presentation & Relationships</p>
                            </div>
                        </div>
                    </div>
                    <!--                <div class="row">
                    <div class="col">
                    Clients Slider 
                     <div class="clients_slider_container">
                     <div class="owl-carousel owl-theme clients_slider">
                    Slider Item 
                    <div class="owl-item clients_item">
                     <img src="images/client_1.png" alt="">
                                                    </div>
                                                     Slider Item 
                                                   <div class="owl-item clients_item">
                                                        <img src="images/client_2.png" alt="">
                                                    </div>
                                                    Slider Item 
                                                   <div class="owl-item clients_item">
                                                        <img src="images/client_3.png" alt="">
                                                    </div>
                                                     Slider Item 
                                                   <div class="owl-item clients_item">
                                                       <img src="images/client_4.png" alt="">
                                                   </div>
                                                    Slider Item 
                                                   <div class="owl-item clients_item">
                                                        <img src="images/client_5.png" alt="">
                                                  </div>
                                               </div>
                                           </div>
                                       </div>
                                  </div>-->
                </div>
            </div>
            <!-- Contact -->
            <div class="prlx_parent pad-50">
                <!-- <div class="contact_background parallax-window" data-parallax="scroll" data-speed="0.7" data-image-src="images/contact_background.jpg"></div> -->
                <div class="contact_background prlx bg-enquiry"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 text-center section_title contact_title">
                            <h2>let's work together</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <form class="form-1">
                                <input type="text" name="fname" placeholder="Name"> 
                                <input type="email" name="email" placeholder="Email Address"> 
                                <input type="text" name="phone" placeholder="Phone Number"> 
                                <input type="text" name="subject" placeholder="subject"> 
                                <textarea type="text" name="requirement" placeholder="Requirement" class="req"></textarea>
                                <button type="submit" class="sub-submit">submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class="footer">
                <div class="container">
                    <div class="row footer_content d-flex flex-sm-row flex-column align-items-center">
                        <div class="col-sm-6 cr text-sm-left text-center">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Designed By <a href="http://www.yellowandgray.com/" target="_blank"> YG STUDIO</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                        <div class="col-sm-6 text-sm-right text-center">
                            <div class="footer_social_container">
                                <ul class="footer_social">
                                    <li><a href="#"><i class="fab fa-pinterest trans_300"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook-f trans_300"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter trans_300"></i></a></li>
                                    <li><a href="#"><i class="fab fa-dribbble trans_300"></i></a></li>
                                    <li><a href="#"><i class="fab fa-behance trans_300"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in trans_300"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="styles/bootstrap4/popper.js"></script>
        <script src="styles/bootstrap4/bootstrap.min.js"></script>
        <script src="plugins/greensock/TweenMax.min.js"></script>
        <script src="plugins/greensock/TimelineMax.min.js"></script>
        <script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
        <script src="plugins/greensock/animation.gsap.min.js"></script>
        <script src="plugins/greensock/ScrollToPlugin.min.js"></script>
        <script src="plugins/progressbar/progressbar.min.js"></script>
        <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
        <script src="plugins/easing/easing.js"></script>
        <script src="js/custom.js"></script>
        <?php include 'onload-popup.php'; ?>
    </body>
</html>
