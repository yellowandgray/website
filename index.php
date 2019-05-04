<!DOCTYPE html>

<html lang="en">
    <?php
    include 'head.php';
    $page = 'home';
    ?>
    <body>
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
                        <li class="active"><a href="#"><span>home</span></a></li>
                        <li><a href="services.html"><span>services</span></a></li>
                        <li><a href="elements.html"><span>elements</span></a></li>
                        <li><a href="blog.html"><span>blog</span></a></li>
                        <li><a href="contact.html"><span>contact</span></a></li>
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
                        <li><a href="#"><span><span>H</span>Home</span></a></li>
                        <li><a href="#"><span><span>S</span>Services</span></a></li>
                        <li><a href="#"><span><span>E</span>Elements</span></a></li>
                        <li><a href="#"><span><span>B</span>Blog</span></a></li>
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

                <div class="hero_slider_container slider_prlx">

                    <div class="owl-carousel owl-theme hero_slider">



                        <!-- Slider Item -->

                        <div class="owl-item main_slider_item">

                            <div class="main_slider_item_bg" style="background-image:url(images/main_slider_1.jpg)"></div>

                            <div class="main_slider_shapes"><img src="images/main_slider_shapes.png" alt="" style="width: 100% !important;"></div>

                            <div class="container">

                                <div class="row">

                                    <div class="col slider_content_col">

                                        <div class="main_slider_content">

                                            <h1>Do you need</h1>

                                            <h1>a <span>modern</span> website?</h1>

                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. </p>

                                            <div>

                                                <a href="#" class="text-center"><img src="images/video.png" alt="" class="center" ></a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                        <!-- Slider Item -->

                        <div class="owl-item main_slider_item">

                            <div class="main_slider_item_bg" style="background-image:url(images/main_slider_2.jpg)"></div>

                            <div class="main_slider_shapes"><img src="images/main_slider_shapes.png" alt="" style="width: 100% !important;"></div>

                            <div class="container">

                                <div class="row">

                                    <div class="col slider_content_col">

                                        <div class="main_slider_content">

                                            <h1>Do you need</h1>

                                            <h1>a <span>modern</span> website?</h1>

                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. </p>

                                            <!--                                            <div class="button discover_button">
                                            
                                                                                            <a href="#" class="d-flex flex-row align-items-center justify-content-center">discover<img src="images/arrow_right.svg" alt=""></a>
                                            
                                                                                        </div>-->
                                            <div>

                                                <a href="#" class="text-center"><img src="images/video.png" alt="" class="center"></a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                        <!-- Slider Item -->

                        <div class="owl-item main_slider_item">

                            <div class="main_slider_item_bg" style="background-image:url(images/main_slider_3.jpg)"></div>

                            <div class="main_slider_shapes"><img src="images/main_slider_shapes.png" alt="" style="width: 100% !important;"></div>

                            <div class="container">

                                <div class="row">

                                    <div class="col slider_content_col">

                                        <div class="main_slider_content">

                                            <h1>Do you need</h1>

                                            <h1>a <span>modern</span> website?</h1>

                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. </p>

                                            <!--                                            <div class="button discover_button">
                                            
                                                                                            <a href="#" class="d-flex flex-row align-items-center justify-content-center">discover<img src="images/arrow_right.svg" alt=""></a>
                                            
                                                                                        </div>-->
                                            <div>

                                                <a href="#" class="text-center"><img src="images/video.png" alt="" class="center" ></a>

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



            <div class="home_social_container d-flex flex-row justify-content-end align-items-center">

                <ul class="home_social">

                    <li><a href="#"><i class="fab fa-pinterest trans_300"></i></a></li>

                    <li><a href="#"><i class="fab fa-facebook-f trans_300"></i></a></li>

                    <li><a href="#"><i class="fab fa-twitter trans_300"></i></a></li>

                    <li><a href="#"><i class="fab fa-dribbble trans_300"></i></a></li>

                    <li><a href="#"><i class="fab fa-behance trans_300"></i></a></li>

                    <li><a href="#"><i class="fab fa-linkedin-in trans_300"></i></a></li>

                </ul>

            </div>



            <!-- Features -->



            <div class="features">

                <div class="container">

                    <div class="row align-items-end">



                        <!-- Features Item -->

                        <div class="col-lg-4 features_col">

                            <div class="features_item d-flex flex-column align-items-center justify-content-end text-center">

                                <!-- <div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div> -->

                                <div class="icon_container d-flex flex-column justify-content-end">

                                    <img src="images/png/doller.png" alt="">

                                </div>

                                <h3>Money & Finance</h3>

                                <p>Money – we spend our whole lives working for it but do not know where it goes or how to make it work for us. Maybe it’s time we figured it out?</p>

                            </div>

                        </div>



                        <!-- Features Item -->

                        <div class="col-lg-4 features_col">

                            <div class="features_item d-flex flex-column align-items-center justify-content-center text-center">

                                <!-- <div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div> -->

                                <div class="icon_container d-flex flex-column justify-content-end">

                                    <img src="images/png/step.png" alt="">

                                </div>

                                <h3>Self-Development</h3>

                                <p>Be it time, relationships, health or skill development there is always something we can learn to do better. Let’s get started!</p>

                            </div>

                        </div>



                        <!-- Features Item -->

                        <div class="col-lg-4 features_col">

                            <div class="features_item d-flex flex-column align-items-center justify-content-center text-center">

                                <!-- <div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div> -->

                                <div class="icon_container d-flex flex-column justify-content-end">

                                    <img src="images/png/plane.png" alt="">

                                </div>

                                <h3>Travel</h3>

                                <p>Travel – everyone is talking about it. Why travel? How to travel? Where to travel to? Let’s find out! </br> &nbsp;</p>

                            </div>

                        </div>



                    </div>

                </div>

            </div>



            <!-- About -->



            <div class="about prlx_parent">

                <!-- https://unsplash.com/@nativemello -->

                <div class="about_background prlx" style="background-image:url(images/about_background.jpg)"></div>

                <div class="about_shapes"><img src="images/main_slider_2.jpg" alt=""></div>



                <div class="container">

                    <div class="row">

                        <div class="col-lg-6 offset-lg-3 text-center section_title">

                            <h2>about our project</h2>

                        </div>

                    </div>

                    <div class="row">



                        <div class="col-lg-6">

                            <div class="about_text">

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum, quam tincidunt venenatis ultrices, est libero mattis ante, ac consectetur diam neque eget quam. Etiam feugiat augue et varius blandit. Praesent mattis, eros a sodales commodo, justo ipsum rutrum mauris, sit amet egestas metus.</p>

                                <img src="images/signiture.png" alt="">

                            </div>

                        </div>



                        <div class="col-lg-6">

                            <div class="skills_container">

                                <ul class="progress_bar_container col_12 clearfix">

                                    <li class="pb_item">

                                        <div id="skill_1_pbar" class="skill_bars" data-perc="0.85" data-name="skill_1_pbar"></div>

                                        <h5>management</h5>

                                    </li>

                                    <li class="pb_item">

                                        <div id="skill_2_pbar" class="skill_bars" data-perc="1" data-name="skill_2_pbar"></div>

                                        <h5>design</h5>

                                    </li>

                                    <li class="pb_item">

                                        <div id="skill_3_pbar" class="skill_bars" data-perc="0.75" data-name="skill_3_pbar"></div>

                                        <h5>projects</h5>

                                    </li>

                                    <li class="pb_item">

                                        <div id="skill_4_pbar" class="skill_bars" data-perc="0.95" data-name="skill_4_pbar"></div>

                                        <h5>inspiration</h5>

                                    </li>

                                </ul>

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

                                    <div class="owl-item testimonials_item d-flex flex-column align-items-center justify-content-center text-center">

                                        <div class="testimonials_content">

                                            <div class="test_user_pic"><img src="images/testimonial/person-01.jpg" alt=""></div>

                                            <div class="test_name">Paul Dermody</div>

                                            <!--                                            <div class="test_title">Company CEO</div>
                                            
                                                                                        <div class="test_quote">"</div>-->

                                            <p>Cheryl Pinto has been my life coach for the past 5 months. I was working in the IT industry for 5 years and felt like I needed a change and pursue a passion...</p>
                                            <div class="button discover_button center">
                                                <a href="#" class="d-flex flex-row align-items-center justify-content-center">Read More<img src="images/arrow_right.svg" alt=""></a>
                                            </div>
                                        </div>

                                    </div>



                                    <!-- Testimonials Item -->

                                    <div class="owl-item testimonials_item d-flex flex-column align-items-center justify-content-center text-center">

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

                                    <div class="owl-item testimonials_item d-flex flex-column align-items-center justify-content-center text-center">

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



            <div class="services prlx_parent">

                <!-- artist: https://unsplash.com/@nativemello -->

                <div class="services_background prlx" style="background-image:url(images/main_slider_1.jpg)"></div>

<!--                <div class="services_shapes"><img src="images/services_shapes.png" alt=""></div>-->



                <div class="container">
                    <div class="row pad-50">
                        <h2 class="color-w">Types of Coaching Cherly Specializes in:</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">

                            <div class="icon_container d-flex flex-column justify-content-end center">

                                <img src="images/types/Financial-Freedom.png" alt="" style=" width: 80px; height: 80px;">

                            </div>

                            <h3>Financial Freedom</h3>

                            <p class="text-justify">If you often get to the end of the month and wonder where your money has gone, if your expenses exceed your income, if you find yourself drowning in the quagmire of credit card debts, if you wish to start saving more and building a retirement fund then get in touch with me now. I have been a banker for nearly 2 decades and have cracked the code.</p>

                        </div>



                        <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">

                            <div class="icon_container d-flex flex-column justify-content-end center">

                                <img src="images/types/Time-Management.png" alt="" style=" width: 80px; height: 80px;">

                            </div>

                            <h3>Time Management</h3>

                            <p class="text-justify">If you always find yourself wanting to do more, live more meaningfully, but are somehow unable to, then I will help shine the light on how you may manage your time and thus your life so that you live the life you want to live.</p>

                        </div>



                        <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">

                            <div class="icon_container d-flex flex-column justify-content-end center">

                                <img src="images/types/careerimage.png" alt="" style=" width: 80px; height: 80px;">

                            </div>

                            <h3>Career Progress</h3>

                            <p class="text-justify">If you are in a job that does not light you up, or in a career that you once loved but now wish to change, or if you are not advancing in your career no matter what you do, then chat with me and learn how I raced through the corporate ladder over my 17 years of experience in the corporate world.</p>

                        </div>



                        <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">

                            <div class="icon_container d-flex flex-column justify-content-end center">

                                <img src="images/types/Trader-Coach.png" alt="" style=" width: 80px; height: 80px;">

                            </div>

                            <h3>Trader Coach</h3>

                            <p class="text-justify">If you are a trader in the financial markets and are unable to remain consistently profitable, if you cannot stick to your rules or deal with the psychological impact of trading, talk to me. I am a Professional Trader and have been through the same painful rite of passage emerging victorious</p>

                        </div>



                        <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">

                            <div class="icon_container d-flex flex-column justify-content-end center">

                                <img src="images/types/Transformational-Change.png" alt="" style=" width: 80px; height: 80px;">

                            </div>

                            <h3>Transformational Change</h3>

                            <p class="text-justify">If you have found yourself at a stage where you feel like it is ‘now time’ to make a large change that is likely to impact many facets of your life. If you wish to disrupt the status quo,follow your passion, live life to the fullest, then contact me right away. I will be honored to guide you along your path to your most fulfilling life.</p>

                        </div>



                        <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start text-center">

                            <div class="icon_container d-flex flex-column justify-content-end  center">

                                <img src="images/types/Super-Women.png" alt="" style=" width: 80px; height: 80px;">

                            </div>

                            <h3>Super Women</h3>

                            <p class="text-justify">If you are an ambitious woman, who wishes to break through the proverbial glass-ceiling that is restricting your progress, learn how to ask for a raise or a promotion, be heard, grab a coffee with me. I have ‘been there, done that’ and am thrilled to help you learn the ropes.</p>

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

            </div>



            <!-- Clients -->



            <div class="clients">

                <div class="container">



                    <div class="row">

                        <div class="col-lg-6 offset-lg-3 text-center section_title section_title_dark">

                            <h2>our clients<span>z</span></h2>

                        </div>

                    </div>



                    <div class="row">

                        <div class="col-lg-6">

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum, olor sit amet, consectetur adipiscing eli quam tincidunt venen atis ultrices, est libero olor sit amet, consectetur adipiscing eli mattis ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum, quam tincidunt venenatis ultrices, est libero mattis quam tincidun ante, ac consectetur diam neque eget quam. </p>

                        </div>

                        <div class="col-lg-6">

                            <p>Amet, consectetur adipiscing elit. Phasellus vestibulum, olor sit amet, consectetur adipiscing eli quam tincidunt venen atis ultrices, quam tincidunest libero olor sit amet, consectetur adipiscing eli mattis ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum, quam tincidunt venenatis ultrices, est libero mattis quam tincidun ante, ac cquam tincidunonsectetur diam neque eget quam.</p>

                        </div>

                    </div>



                    <div class="row">

                        <div class="col">



                            <!-- Clients Slider -->



                            <div class="clients_slider_container">

                                <div class="owl-carousel owl-theme clients_slider">



                                    <!-- Slider Item -->

                                    <div class="owl-item clients_item">

                                        <img src="images/client_1.png" alt="">

                                    </div>



                                    <!-- Slider Item -->

                                    <div class="owl-item clients_item">

                                        <img src="images/client_2.png" alt="">

                                    </div>



                                    <!-- Slider Item -->

                                    <div class="owl-item clients_item">

                                        <img src="images/client_3.png" alt="">

                                    </div>



                                    <!-- Slider Item -->

                                    <div class="owl-item clients_item">

                                        <img src="images/client_4.png" alt="">

                                    </div>



                                    <!-- Slider Item -->

                                    <div class="owl-item clients_item">

                                        <img src="images/client_5.png" alt="">

                                    </div>



                                </div>

                            </div>



                        </div>

                    </div>



                </div>

            </div>



            <!-- Contact -->



            <div class="contact prlx_parent">

                <!-- <div class="contact_background parallax-window" data-parallax="scroll" data-speed="0.7" data-image-src="images/contact_background.jpg"></div> -->

                <div class="contact_background prlx" style="background-image: url(images/contact_background.jpg);"></div>

                <div class="contact_shapes"><img src="images/contact_shape.png" alt=""></div>

                <div class="container">



                    <div class="row">

                        <div class="col-lg-6 offset-lg-3 text-center section_title contact_title">

                            <h2>let's work together<span>z</span></h2>

                        </div>

                    </div>



                    <div class="row">

                        <div class="col-lg-10 offset-lg-1 text-center contact_text">

                            <p>Dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum, quam tincidunt venen atis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum, quam tincidunt venenatis ultrices, est libero mattis ante, ac consectetur diam neque eget quam.</p>

                            <div class="button contact_button">

                                <a href="contact.html" class="d-flex flex-row align-items-center justify-content-center">contact<img src="images/arrow_right.svg" alt=""></a>

                            </div>

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

                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">THEME-2</a>

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

    </body>



</html>