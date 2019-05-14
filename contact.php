<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php';
    $page = 'contact';
    ?>
    <body>
        <div class="super_container">
            <!-- Header -->
            <?php include 'menu.php'; ?>
            <!-- Menu -->
<?php include 'mobile-menu.php'; ?>
            <!-- Hero Slider -->
            <div class="sub-bg prlx_parent">

                <!-- Parallax Background -->
                <div class="home_background prlx bg-show" style="background-image:url(images/blog_background-04.png);"></div>
                <div class="home_background prlx bg-hide-1" style="background-image:url(images/blog_background-04.png);"></div>
                <div class="home_background prlx bg-hide" style="background-image:url(images/blog_background-04.png);"></div>
                <div class="services_page_shapes">
                    <!--                    <video style="height:100%;float: right;" autoplay>
                                            <source src="vedio/WhatsApp Video 2018-12-18 at 11.14.49 AM (1).mp4" type="video/mp4">
                                            Your browser does not support the <code>video</code> tag.
                                        </video>-->
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-6" style="z-index: 999;">
                            <div class="home_content wow fadeInLeft">
                                <h1>Contact</h1>
                                <span>Get in touch With</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Features -->
            <div class="features">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 text-center section_title section_title_dark wow fadeInDown">
                            <h2>Contact US</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <form class="text-bg-1 wow fadeInUp contact-form">
                                <h2 class="text-center">Contact Now</h2>
                                <hr>
                                <p>I am here to help! I check each message and will respond to you personally.</p>
                                <input type="text" name="fname" placeholder="First Name" required > 
                                <input type="text" name="lname" placeholder="Last Name" required > 
                                <input type="email" name="email" placeholder="Email Address" required>
                                <input type="text" name="phone" placeholder="Phone Number" required> 
                                <label>How do you want to be contacted?</label>
                                <select>
                                    <option value="Email">Email</option>
                                    <option value="Whatsapp">Whatsapp</option>
                                </select>
                                <br/>
<!--                                <textarea type="text" name="requirement" placeholder="How can I help you?" class="req" required></textarea>-->
                                <textarea type="text" name="requirement" placeholder="Comment" class="req" required></textarea>
                                <div class="g-recaptcha" data-sitekey="6Ld9YaMUAAAAAG1qHv8gS4Lj3QTKHfz2IcfBwBUJ"></div>
                                <button type="submit" class="button-1"><span class="color-w">Submit</span></button>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-details-1 wow fadeInUp">
                                <img src="images/contact-img.jpg" alt="" >
                            </div>
                            <div class="contact-details wow fadeInUp">
                                <h2 class="text-center">Say Hello!</h2>
                                <hr>
                                <p>Phone     : <a href="tel:+971-50-79-89-121">+971 50 79 89 121</a></p>
                                <p>E-mail    : <a href="mailto:info@cherylppinto.com">info@cherylppinto.com</a></p>
                                <p>Website   : <a href="http://cherylppinto.com/">www.cherylppinto.com</a></p>
                            </div>
                            <!--                            <div class="contact-details wow fadeInUp">
                                                            <h2 class="text-center">Join Now!</h2>
                                                            <hr>
                                                            <input type="email" name="email" placeholder="E-mail address" />
                                                            <button type="submit" class="button-1"><span class="color-w">Join</span></button>
                                                        </div>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10913658.061977062!2d-110.67475651911568!3d54.7269841774671!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4b0d03d337cc6ad9%3A0x9968b72aa2438fa5!2sCanada!5e0!3m2!1sen!2sin!4v1557815827847!5m2!1sen!2sin" height="400" frameborder="0" style="border:0;width: 100%;" allowfullscreen></iframe>
            </div>

            <?php include 'join-our-community.php'; ?>
            <!-- Footer -->
<?php include 'footer.php'; ?>
    </body>
</html>
