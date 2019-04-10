<!DOCTYPE html>
<html lang="en">

    <!--head -->
    <?php include 'head.php'; ?> 
    <!--head -->
    <body>

        <!-- LOADER -->
        <div id="preloader">
            <div class="loader">
                <div class="loader__bar"></div>
                <div class="loader__bar"></div>
                <div class="loader__bar"></div>
                <div class="loader__bar"></div>
                <div class="loader__bar"></div>
                <div class="loader__ball"></div>
            </div>
        </div><!-- end loader -->
        <!-- END LOADER -->

        <!-- menu-->
        <?php include 'menu.php'; ?>
        <!-- menu-->

        <div class="banner-area banner-bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="banner">
                            <h2><span>Contact Us</span></h2>
                            <ul class="page-title-link">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Pricing</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="contact" class="section wb">
            <div class="container">
                <div class="section-title text-center">
                    <h3>Get in touch</h3>
                    <p class="lead">Let us give you more details about the special offer website you want us. Please fill out the form below. <br>We have million of website owners who happy to work with us!</p>
                </div><!-- end title -->

                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="contact_form">
                            <div id="message"></div>
                            <form id="contactform" class="row" action="contact.php" name="contactform" method="post">
                                <fieldset class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Your Email">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Your Phone">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <textarea class="form-control" name="comments" id="comments" rows="6" placeholder="Give us more details.."></textarea>
                                    </div>
                                    <div class="text-center cont-btn">
                                        <button type="submit" value="SEND" id="submit" class="btn11"><span>Submit</span></button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->

                <div class="row">
                    <div class="offset-md-1 col-sm-10 col-md-10 offset-sm-1 pd-add">
                        <div class="address-item">
                            <div class="address-icon">
                                <i class="icon icon-location2"></i>
                            </div>
                            <h3>Headquarters</h3>
                            <p>PO Box 16122 Collins Street West 
                                <br> Victoria 8007 Australia</p>
                        </div>
                        <div class="address-item">
                            <div class="address-icon">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <h3>Email Us</h3>
                            <p>info@yoursite.com
                                <br>info@yoursite.com</p>
                        </div>
                        <div class="address-item">
                            <div class="address-icon">
                                <i class="icon icon-headphones"></i>
                            </div>
                            <h3>Call Us</h3>
                            <p>+61 3 8376 6284
                                <br>+61 3 8376 6185</p>
                        </div>
                    </div>
                </div><!-- end row -->

            </div><!-- end container -->
        </div><!-- end section -->

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="widget clearfix">
                            <div class="widget-title">
                                <img src="images/logos/logo-2.png" alt="" />
                            </div>
                            <p> Integer rutrum ligula eu dignissim laoreet. Pellentesque venenatis nibh sed tellus faucibus bibendum. Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et magnis dis montes.</p>                        
                        </div><!-- end clearfix -->
                    </div><!-- end col -->

                    <div class="col-md-6 col-lg-3">
                        <div class="widget clearfix">
                            <div class="widget-title">
                                <h3>Useful links</h3>
                            </div>

                            <ul class="footer-links hov">
                                <li><a href="#">Home <span class="icon icon-arrow-right2"></span></a></li>
                                <li><a href="#">Blog <span class="icon icon-arrow-right2"></span></a></li>
                                <li><a href="#">Pricing <span class="icon icon-arrow-right2"></span></a></li>
                                <li><a href="#">About <span class="icon icon-arrow-right2"></span></a></li>
                                <li><a href="#">Faq <span class="icon icon-arrow-right2"></span></a></li>
                                <li><a href="#">Contact <span class="icon icon-arrow-right2"></span></a></li>
                            </ul><!-- end links -->
                        </div><!-- end clearfix -->
                    </div><!-- end col -->

                    <div class="col-md-6 col-lg-3">
                        <div class="footer-recent clearfix">
                            <div class="widget-title">
                                <h3>Recent posts</h3>
                            </div>

                            <ul>
                                <li>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span>Posted By : Ahmed Rubel</span>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <span> Time : 1.30 Am</span>
                                    <h2>Etiam dignissim augue a commodo</h2>
                                </li>
                                <li>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span>Posted By : Ahmed Rubel</span>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <span> Time : 1.30 Am</span>
                                    <h2>Etiam dignissim augue a commodo</h2>
                                </li>
                                <li>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span>Posted By : Ahmed Rubel</span>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <span> Time : 1.30 Am</span>
                                    <h2>Etiam dignissim augue a commodo</h2>
                                </li>
                            </ul>

                        </div><!-- end clearfix -->
                    </div><!-- end col -->
                    <div class="col-md-6 col-lg-3">
                        <div class="widget footer-contact clearfix">
                            <div class="widget-title">
                                <h3>Contact Us</h3>
                            </div>

                            <ul>
                                <li>Address: PO Box 16122 Collins Street West Victoria 8007 Australia</li>
                                <li>Phone: <a href="#">+62 3 8376 8080  </a></li>
                                <li>Email: <a href="#">info@yoursite.com </a></li>
                            </ul>
                            <ul class="social-list">
                                <li><a href="https://www.facebook.com/" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://linkedin.com/" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="https://www.instagram.com/" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="https://plus.google.com/" class="googlePlus"><i class="fa fa-google-plus"></i></a></li>
                            </ul>

                        </div>
                    </div>



                </div><!-- end row -->
            </div><!-- end container -->
        </footer><!-- end footer -->

        <div class="copyrights">
            <div class="container">
                <div class="footer-distributed">
                    <div class="footer-left">                   
                        <p class="footer-company-name">All Rights Reserved. &copy; 2018 <a href="#">Linkweb</a> Design By : 
                            <a href="https://html.design/">html design</a></p>
                    </div>


                </div>
            </div><!-- end container -->
        </div><!-- end copyrights -->

        <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

        <!-- ALL JS FILES -->
        <script src="js/all.js"></script>
        <!-- ALL PLUGINS -->
        <script src="js/custom.js"></script>
        <script src="js/portfolio.js"></script>
        <script src="js/hoverdir.js"></script>    

    </body>
</html>