<!DOCTYPE html>
<html lang="en">
    <?php
    include 'head.php';
    $page = 'contact'
    ?>
    <body>
        <!-- Page Preloder -->

        <!-- header section -->
        <?php include 'menu.php'; ?>
        <!-- header section end-->


        <!-- Banner Section -->
        <div class="sub-banner-section" style="background: url(img/sub-banner/contact.jpg)no-repeat; height: 250px;"></div>
        <!-- End Banner Section -->

        <!-- Breadcrumb section -->
        <div class="site-breadcrumb breadcrumb-bg">
            <div class="container">
                <a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
                <span>Contact</span>
            </div>
        </div>
        <!-- Breadcrumb section end -->


        <!-- Courses section -->
        <section class="contact-page spad pt-0 section-background">
            <div class="container">
                <div class="map-section">
                    <div class="contact-info-warp">
                        <div class="contact-info">
                            <h4>Address</h4>
                            <p>40, Kershaw Drive, Narre Warren South, Melbourne, Victoria 3805,Australia.</p>
                        </div>
                        <div class="contact-info">
                            <h4>Phone</h4>
                            <p>+61 3 97056268</p>
                        </div>
                        <div class="contact-info">
                            <h4>Email</h4>
                            <p>info@aaluvglobal.com</p>
                        </div>
<!--                        <div class="contact-info">
                            <h4>Working time</h4>
                            <p>Monday - Friday: 08 AM - 06 PM</p>
                        </div>-->
                    </div>
                    <!-- Google map -->
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3141.552715383878!2d145.2840002824186!3d-38.05750723119763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad6105bee6d0595%3A0xf227c0759cfb0dfe!2s40+Kershaw+Dr%2C+Narre+Warren+South+VIC+3805%2C+Australia!5e0!3m2!1sen!2sin!4v1549345911320" width="1150" height="500" frameborder="0" style="border:0;width: 100%" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="contact-form spad pb-0">
                    <div class="section-title text-center">
                        <h3>GET IN TOUCH</h3>
                        <p>Contact us for best deals and offer</p>
                    </div>
                    <form class="comment-form contact">
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="text" placeholder="Your Name">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" placeholder="Your Email">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" placeholder="Subject">
                            </div>
                            <div class="col-lg-12">
                                <textarea placeholder="Message"></textarea>
                                <div class="text-center">
                                    <button class="site-btn">SUBMIT</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Courses section end-->


        <!-- Newsletter section -->
<!--        <section class="newsletter-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-lg-7">
                        <div class="section-title mb-md-0">
                            <h3>NEWSLETTER</h3>
                            <p>Subscribe and get the latest news and useful tips, advice and best offer.</p>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-5">
                        <form class="newsletter">
                            <input type="text" placeholder="Enter your email">
                            <button class="site-btn">SUBSCRIBE</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>-->
        <!-- Newsletter section end -->	


        <!-- Footer section -->
        <?php include 'footer.php'; ?>
        <!-- Footer section end-->

    </body>
</html>