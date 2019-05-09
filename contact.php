<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cheryl P Pinto</title>
        <?php $page = 'how-work'; ?>
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
    <body>
        <div class="super_container">
            <!-- Header -->
            <?php include 'menu.php'; ?>
            <!-- Menu -->
            <?php include 'mobile-menu.php'; ?>
            <!-- Hero Slider -->
            <div class="sub-bg prlx_parent">

                <!-- Parallax Background -->
                <div class="home_background prlx" style="background-image:url(images/blog_background.jpg)"></div>
                <div class="services_page_shapes">
                    <video style="height:100%;float: right;" autoplay>
                        <source src="vedio/WhatsApp Video 2018-12-18 at 11.14.49 AM (1).mp4" type="video/mp4">
                        Your browser does not support the <code>video</code> tag.
                    </video>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="home_content">
                                <h1>Contact</h1>
                                <span>Get in touch me</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Features -->
            <div class="features">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 text-center section_title section_title_dark">
                            <h2>Get in Touch Me</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <form class="text-bg-1">
                                <h2 class="text-center">Contact us</h2>
                                <hr>
                                <p>I am here to help! I check each message and will respond to you personally.</p>
                                <input type="text" name="fname" placeholder="Name" required > 
                                <input type="email" name="email" placeholder="Email Address" required>
                                <input type="text" name="phone" placeholder="Phone Number" required> 
                                <input type="text" name="subject" placeholder="subject" required>
                                <textarea type="text" name="requirement" placeholder="Requirement" class="req" required></textarea>
                                <button type="submit" class="button-1"><span class="color-w">Submit</span></button>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-details">
                                <h2 class="text-center">Say Hello!</h2>
                                <hr>
                                <p>Phone     : +971 50 79 89 121</p>
                                <p>E-mail    : info@cherylppinto.com</p>
                                <p>Website   : www.cherylppinto.com</p>
                            </div>
                            <div class="contact-details">
                                <h2 class="text-center">Joins Now!</h2>
                                <hr>
                                <input type="email" name="email" placeholder="E-mail address" />
                                <button type="submit" class="button-1"><span class="color-w">Join</span></button>
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
            <!-- Footer -->
            <?php include 'footer.php'; ?>
    </body>
</html>
