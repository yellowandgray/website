<!DOCTYPE html>
<html lang="zxx">

    <!-- Mirrored from keenitsolutions.com/products/html/edulearn/edulearn-demo/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Mar 2019 06:07:33 GMT -->
    <?php
    include 'head.php';
    $page = 'locate';
    ?>
    <body class="inner-page">
        <!--Preloader area start here-->
        <div class="book_preload">
            <div class="book">
                <div class="book__page"></div>
                <div class="book__page"></div>
                <div class="book__page"></div>
            </div>
        </div>
        <!--Preloader area end here-->

        <!--Full width header Start-->
        <?php include 'menu_1.php'; ?>
        <!--Full width header End-->

        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs bg7 breadcrumbs-overlay" style="background-image: url(images/sub-banner/sub-04.jpg) !important;">
            <div class="breadcrumbs-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1 class="page-title">LOCATE US</h1>
                            <ul>
                                <li>
                                    <a class="active" href="index.php">Home</a>
                                </li>
                                <li>Locate us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- .breadcrumbs-inner end -->
        </div>
        <!-- Breadcrumbs End -->

        <!-- Contact Section Start -->
        <div class="contact-page-section sec-spacer">
            <div class="container">
                <!--                <div id="googleMap"></div>-->
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d971.8859881878383!2d80.25991618730163!3d13.000994724738561!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1552392514256" style="width:100%;height: 400px" frameborder="0" style="border:0" allowfullscreen></iframe>
                <div class="row contact-address-section">
                    <div class="col-md-4 pl-0">
                        <div class="contact-info contact-address">
                            <i class="fa fa-map-marker"></i>
                            <h4>Address</h4>
                            <p>17/7, 1st Ave Shastri Nagar,</p>
                            <p>Adyar Chennai, Tamil Nadu 600020.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-info contact-phone">
                            <i class="fa fa-phone"></i>
                            <h4>Phone Number</h4>
                            <a href="tel:7601044444">7601044444</a><br>
                        </div>
                    </div>
                    <div class="col-md-4 pr-0">
                        <div class="contact-info contact-email">
                            <i class="fa fa-envelope"></i>
                            <h4>Email Address</h4>
                            <a href="mailto:info@aaluvglobal.com"><p>info@aaluvglobal.com</p></a><br>
                        </div>
                    </div>
                </div>

                <div class="contact-comment-section">
                    <h3>Leave Comment</h3>
                    <div id="form-messages"></div>
                    <form id="contact-form" method="post" action="http://keenitsolutions.com/products/html/edulearn/edulearn-demo/mailer.php">
                        <fieldset>
                            <div class="row">                                      
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>First Name*</label>
                                        <input name="fname" id="fname" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Last Name*</label>
                                        <input name="lname" id="lname" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input name="email" id="email" class="form-control" type="email">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Subject *</label>
                                        <input name="subject" id="subject" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-md-12 col-sm-12">    
                                    <div class="form-group">
                                        <label>Message *</label>
                                        <textarea cols="40" rows="10" id="message" name="message" class="textarea form-control"></textarea>
                                    </div>
                                </div>
                            </div>							        
                            <div class="form-group mb-0">
                                <input class="btn-send" type="submit" value="Submit Now">
                            </div>

                        </fieldset>
                    </form>						
                </div>
            </div>
        </div>
        <!-- Contact Section End -->     

        <!-- Partner Start -->
<!--        <div id="rs-partner" class="rs-partner sec-color pt-70 pb-170">
            <div class="container">
                <div class="rs-carousel owl-carousel" data-loop="true" data-items="5" data-margin="80" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-mobile-device="2" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="4" data-ipad-device-nav="false" data-ipad-device-dots="false" data-md-device="5" data-md-device-nav="false" data-md-device-dots="false">
                    <div class="partner-item">
                        <a href="#"><img src="images/partner/1.png" alt="Partner Image"></a>
                    </div>
                    <div class="partner-item">
                        <a href="#"><img src="images/partner/2.png" alt="Partner Image"></a>
                    </div>
                    <div class="partner-item">
                        <a href="#"><img src="images/partner/3.png" alt="Partner Image"></a>
                    </div>
                    <div class="partner-item">
                        <a href="#"><img src="images/partner/4.png" alt="Partner Image"></a>
                    </div>
                    <div class="partner-item">
                        <a href="#"><img src="images/partner/5.png" alt="Partner Image"></a>
                    </div>
                </div>
            </div>
        </div>-->
        <!-- Partner End -->

        <!-- Footer Start -->
        <?php include 'footer.php'; ?>
        <!-- Footer End -->
    </body>

    <!-- Mirrored from keenitsolutions.com/products/html/edulearn/edulearn-demo/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Mar 2019 06:07:33 GMT -->
</html>