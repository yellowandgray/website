<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <div id="wrapper">
            <!-- toggle top area -->
            <!--            <div class="hidden-top">
                            <div class="hidden-top-inner container">
                                <div class="row">
                                    <div class="span12">
                                        <ul>
                                            <li><strong>We are available for any custom works this month</strong></li>
                                            <li>Main office: Springville center X264, Park Ave S.01</li>
                                            <li>Call us <i class="icon-phone"></i> (123) 456-7890 - (123) 555-7891</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>-->
            <!-- end toggle top area -->
            <!-- start header -->
            <?php include 'menu.php'; ?>
            <!-- end header -->
            <section id="featured">
                <!-- start slider -->
                <div id="slider" class="sl-slider-wrapper demo-2">
                    <div class="sl-slider">
                        <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                            <div class="sl-slide-inner">
                                <div class="bg-img bg-img-1">
                                </div>
<!--                                <h2><strong>Premium</strong> template</h2>-->
                                <!--                                <blockquote>
                                                                    <p>
                                                                        You have just dined, and however scrupulously the slaughterhouse is concealed in the graceful distance of miles, there is complicity.
                                                                    </p>
                                                                    <cite>Johny Doe Mblangsak</cite>
                                                                </blockquote>-->
                            </div>
                        </div>
                        <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                            <div class="sl-slide-inner">
                                <div class="bg-img bg-img-2">
                                </div>
                                <h2><strong>Twitter</strong> bootstrap</h2>
                                <blockquote>
                                    <p>
                                        Until he extends the circle of his compassion to all living things, man will not himself find peace.
                                    </p>
                                    <cite>Ramond Schummiler</cite>
                                </blockquote>
                            </div>
                        </div>
                        <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
                            <div class="sl-slide-inner">
                                <div class="bg-img bg-img-3">
                                </div>
                                <h2><strong>Responsive</strong> layout</h2>
                                <blockquote>
                                    <p>
                                        Thousands of people who say they 'love' animals sit down once or twice a day to enjoy the flesh of creatures who have been utterly deprived of everything that could make their lives worth living and who endured the awful suffering and the terror of the
                                        abattoirs.
                                    </p>
                                    <cite>Andress Michel Aorta</cite>
                                </blockquote>
                            </div>
                        </div>
                        <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
                            <div class="sl-slide-inner">
                                <div class="bg-img bg-img-4">
                                </div>
                                <h2><strong>Awesome</strong> features</h2>
                                <blockquote>
                                    <p>
                                        The human body has no more need for cows' milk than it does for dogs' milk, horses' milk, or giraffes' milk.
                                    </p>
                                    <cite>Smilee Bounvaller</cite>
                                </blockquote>
                            </div>
                        </div>
                        <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
                            <div class="sl-slide-inner">
                                <div class="bg-img bg-img-5">
                                </div>
                                <h2><strong>Premium</strong> support</h2>
                                <blockquote>
                                    <p>
                                        I think if you want to eat more meat you should kill it yourself and eat it raw so that you are not blinded by the hypocrisy of having it processed for you.
                                    </p>
                                    <cite>Clarke Edward Thompson</cite>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <!-- /sl-slider -->
                    <nav id="nav-dots" class="nav-dots">
                        <span class="nav-dot-current"></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </nav>
                </div>
                <!-- /slider-wrapper -->
                <!-- end slider -->
            </section>
            <section class="callaction">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <div class="big-cta">
                                <div class="cta-text">
                                    <h3>Online <span class="highlight"><strong>Mentoring</strong></span> and <span class="highlight"><strong>Coaching</strong></span></h3>
                                </div>
                                <div class="cta floatright">
                                    <a class="btn btn-large btn-theme btn-rounded" href="#mySignup" data-toggle="modal">Register Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="content">
                <div class="container">
                    <div class="row">
                        <div class="span4 box-shadow">
                            <div class="box-custom">
                                <div class="box-img"></div>
                            </div>
                            <div class="box-text">
                                <p>Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                            </div>
                        </div>
                        <div class="span4 box-shadow">
                            <div class="box-custom">
                                <div class="box-img"></div>
                            </div>
                            <div class="box-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                            </div>
                        </div>
                        <div class="span4 box-shadow">
                            <div class="box-custom">
                                <div class="box-img"></div>
                            </div>
                            <div class="box-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="display-content">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <h3>Quiz Contents</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span6">
                            <ul>
                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                            </ul>
                        </div>
                        <div class="span6">
                            <img src="img/no-image.png" alt="" />
                        </div>
                    </div>
                </div>
            </section>
            <section id="content">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <h3>Quiz Videos</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span4">
                            <iframe height="250" style="width: 100%" src="https://www.youtube.com/embed/Be2istzBgk4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="span4">
                            <iframe style="width: 100%" height="250" src="https://www.youtube.com/embed/Be2istzBgk4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="span4">
                            <iframe style="width: 100%" height="250" src="https://www.youtube.com/embed/Be2istzBgk4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </section>
            <?php include 'footer.php'; ?>
        </div>
        <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>
        <!-- javascript ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <?php include 'script.php'; ?>
    </body>
</html>
