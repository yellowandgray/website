<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php';
    $page = 'contact'; ?>
    <body>
        <div class="super_container">
            <!-- Header -->
            <?php include 'menu.php'; ?>
            <!-- Menu -->
<?php include 'mobile-menu.php'; ?>
            <!-- Hero Slider -->
            <div class="sub-bg prlx_parent">

                <!-- Parallax Background -->
                <div class="home_background prlx bg-show" style="background-image:url(images/blog_background-04.png); z-index: 9;"></div>
                <div class="home_background prlx bg-hide-1" style="background-image:url(images/blog_background-04.png); z-index: 9;"></div>
                <div class="home_background prlx bg-hide" style="background-image:url(images/blog_background-04.png); z-index: 9;"></div>
                <div class="services_page_shapes">
                    <video style="height:100%;float: right;" autoplay>
                        <source src="vedio/WhatsApp Video 2018-12-18 at 11.14.49 AM (1).mp4" type="video/mp4">
                        Your browser does not support the <code>video</code> tag.
                    </video>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-6" style="z-index: 999;">
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
                                <p>Phone     : <a href="tel:+971-50-79-89-121">+971 50 79 89 121</a></p>
                                <p>E-mail    : <a href="mailto:info@cherylppinto.com">info@cherylppinto.com</a></p>
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

            <?php include 'join-our-community.php'; ?>
            <!-- Footer -->
<?php include 'footer.php'; ?>
    </body>
</html>
