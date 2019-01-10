<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; $page = 'home' ?>

    <body>
<!-- banner -->
        <div class="position">
            <div class="banner">
                <div class="agileinfo-dot">
                    <div class="container-fluid">
                        <?php include 'menu.php'; ?>
                        <div class="w3_agile_banner_info">
                            <section class="slider">
                                <div class="flexslider">
                                    <ul class="slides">
                                        <li>
                                            <div class="agileits_w3layouts_banner_info">
                                                <h2>Technical…</h2>
                                                <p>See our recent works projects! Sed bibendum, purus ac posuere tristique arcu augue pharetra augue,</p>
                                                <div class="w3ls-button">
                                                    <a href="#" data-toggle="modal" data-target="#myModal">Read More</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="agileits_w3layouts_banner_info">
                                                <h3>Challenges…</h3>
                                                <p>Sed bibendum, purus ac posuere tristique See our recent works projects! arcu augue pharetra augue,</p>
                                                <div class="w3ls-button">
                                                    <a href="#" data-toggle="modal" data-target="#myModal">Read More</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="agileits_w3layouts_banner_info">
                                                <h3>Additional…</h3>
                                                <p>See our recent works projects! Sed bibendum, purus ac posuere tristique arcu augue pharetra augue,</p>
                                                <div class="w3ls-button">
                                                    <a href="#" data-toggle="modal" data-target="#myModal">Read More</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </section>
                            <!-- flexSlider -->
                            <script defer src="js/jquery.flexslider.js"></script>
                            <script type="text/javascript">
                                $(window).load(function () {
                                    $('.flexslider').flexslider({
                                        animation: "slide",
                                        start: function (slider) {
                                            $('body').removeClass('loading');
                                        }
                                    });
                                });
                            </script>
                            <!-- //flexSlider -->
                        </div>
                    </div>

                    <div class="bannergrids">
<!--                        <ul class="banneraddress">
                            <li><span class="fa fa-envelope" aria-hidden="true"></span><a href="mailto:example@email.com">info@example.com</a></li>
                            <li><span class="fa fa-phone" aria-hidden="true"></span>+017 544 673 2277</li>
                            <li><a href="#contact" class="scroll"><span class="fa fa-long-arrow-right" aria-hidden="true"></span> Contact Us</a></li>
                            <li><span class="fa fa-map-marker" aria-hidden="true"></span>123 london street maquis servilon, london</li>
                        </ul>-->
                        <div class="clearfix"></div>
                        <div class="bannerbottom">
                            <div class="col-md-4 bannerbott1">
                                <h3><span class="fa fa-laptop" aria-hidden="true"></span>  venenatis libero</h3>
                                <p>Donec et venenatis libero. Fusce dapibus pulvinar tincidunt. Proin maximus ipsum 
                                    ut scelerisque dictum.</p>
                            </div>
                            <div class="col-md-4 bannerbott1">
                                <h3><span class="fa fa-diamond" aria-hidden="true"></span> venenatis libero</h3>
                                <p>Donec et venenatis libero. Fusce dapibus pulvinar tincidunt. Proin maximus ipsum 
                                    ut scelerisque dictum.</p>
                            </div>
                            <div class="col-md-4 bannerbott1">
                                <h3><span class="fa fa-cube" aria-hidden="true"></span> venenatis libero</h3>
                                <p>Donec et venenatis libero. Fusce dapibus pulvinar tincidunt. Proin maximus ipsum 
                                    ut scelerisque dictum.</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- //banner -->	

        <!-- About -->
        <div class="about" id="about">
            <div class="container">
                <h3 class="w3l_header w3_agileits_header two"><span>Who</span> We Are</h3>
                <div class="aboutgrids">
                    <div class="col-md-4 aboutgrid1">
                        <h4>Professional learning academy will make us develop high in the quality</h4>
                    </div>
                    <div class="col-md-4 aboutgrid2">
                        <p>Donec et venenatis libero. Fusce dapibus pulvinar tincidunt. Proin maximus ipsum 
                            ut scelerisque dictum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices 
                            posuere cubilia Curae; Nunc non risus in justo convallis feugiat.</p>
                    </div>
                    <div class="col-md-4 aboutgrid3">
                        <p>
                        <p>Donec et venenatis libero. Fusce dapibus pulvinar tincidunt. Proin maximus ipsum 
                            ut scelerisque dictum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices 
                            posuere cubilia Curae; Nunc non risus in justo convallis feugiat.</p>
                    </div>
                    <div class="clearfix"> </div>
                    <!-- Aboutslider -->
                    <div class="aboutslider">
                        <!--Slider-->
                        <div class="slider">
                            <div class="callbacks_container">
                                <ul class="rslides" id="slider">
                                    <li>
                                        <div class="slider-info">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="slider-info1">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="slider-info2">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="slider-info3">
                                        </div>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!--//Slider-->
                    </div>
                    <!-- //Aboutslider -->
                </div>
            </div>
            <div class="aboutbottom">
                <div class="container">
                    <div class="bottomgrids">
                        <div class="col-md-3 bottomgrid1">
                            <h3>2010</h3>
                            <span class="fa fa-circle" aria-hidden="true"></span>
                            <h4>Consulting Ideas</h4>
                            <p>Donec et venenatis libero. Fusceing dapibus pulvinar tincidunt. Proin 
                                maximus ipsum ut scelerisque.</p>
                        </div>
                        <div class="col-md-3 bottomgrid1">
                            <h3>2012</h3>
                            <span class="fa fa-circle" aria-hidden="true"></span>
                            <h4>Partnership Values</h4>
                            <p>Donec et venenatis libero. Fusceing dapibus pulvinar tincidunt. Proin 
                                maximus ipsum ut scelerisque.</p>
                        </div>
                        <div class="col-md-3 bottomgrid1">
                            <h3>2014</h3>
                            <span class="fa fa-circle" aria-hidden="true"></span>
                            <h4>Management</h4>
                            <p>Donec et venenatis libero. Fusceing dapibus pulvinar tincidunt. Proin 
                                maximus ipsum ut scelerisque.</p>
                        </div>
                        <div class="col-md-3 bottomgrid1">
                            <h3>2017</h3>
                            <span class="fa fa-circle" aria-hidden="true"></span>
                            <h4>Theme core</h4>
                            <p>Donec et venenatis libero. Fusceing dapibus pulvinar tincidunt. Proin 
                                maximus ipsum ut scelerisque.</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About -->

        <!-- Services -->
        <div class="services" id="services">
            <div class="container">
                <h3 class="w3l_header w3_agileits_header two"><span>What</span> We Serve</h3>
                <div class="servicegrids">
                    <div class="col-md-3 serv1">
                        <span class="fa fa-cubes" aria-hidden="true"></span>
                        <h5>Innovation</h5>
                        <h4>Power in your hand and best thoughts</h4>
                    </div>
                    <div class="col-md-3 serv2">
                        <span class="fa fa-desktop" aria-hidden="true"></span>
                        <h5>Layout Design</h5>
                        <h4>Encryption of data monitoring service</h4>
                    </div>
                    <div class="col-md-3 serv3">
                        <span class="fa fa-clone" aria-hidden="true"></span>
                        <h5>Consulting</h5>
                        <h4>Product service value genuine management</h4>
                    </div>
                    <div class="col-md-3 serv4">
                        <span class="fa fa-feed" aria-hidden="true"></span>
                        <h5>Architecture</h5>
                        <h4>Supportive chat help with our customers</h4>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="servicebottomgrids">
                    <div class="col-md-4 serv1">
                        <h5>Management Events <span class="fa fa-cubes" aria-hidden="true"></span></h5>
                        <p>porttitor non vulputate ut, aliquam et justo id.
                            Nullam aliquet a massa id euismod. Duis at euismod elit, 
                            vitae hendrerit quam nisl Sed bibendum, purus ac posuere tristique.</p>
                    </div>
                    <div class="col-md-4 serv2">
                        <h5>Existing Clients <span class="fa fa-clone" aria-hidden="true"></span></h5>
                        <p>porttitor non vulputate ut, aliquam et justo id.
                            Nullam aliquet a massa id euismod. Duis at euismod elit,
                            vitae hendrerit quam nisl Sed bibendum, purus ac posuere tristique.</p>
                    </div>
                    <div class="col-md-4 serv3">
                        <h5>24/7 Support <span class="fa fa-user" aria-hidden="true"></span></h5>
                        <p>porttitor non vulputate ut, aliquam et justo id.
                            Nullam aliquet a massa id euismod. Duis at euismod elit, 
                            vitae hendrerit quam nisl Sed bibendum, purus ac posuere tristique.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- Services -->

        <!-- team -->
        <div class="team" id="team">
            <div class="agile_dot_info two">
                <div class="container">
                    <h3 class="w3l_header w3_agileits_header two"> <span>Our</span> Core Team</h3>
                    <div class="agileits_team_grids">
                        <div class="col-md-4 agileits_team_grid">
                            <div class="agileits_team_grid_figure">
                                <img src="images/team1.jpg" alt=" " class="img-responsive" />
                            </div>
                            <h4>Jane Nguyen</h4>
                            <p>General Manager</p>
                            <p>+21 345 287 4556</p>
                            <div class="social-icon">
                                <a href="#" class="social-button facebook"><i class="fa fa-facebook"></i></a> 
                                <a href="#" class="social-button twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="social-button google"><i class="fa fa-google-plus"></i></a> 
                                <a href="#" class="social-button dribbble"><i class="fa fa-dribbble"></i></a> 
                            </div>
                        </div>
                        <div class="col-md-4 agileits_team_grid">
                            <div class="agileits_team_grid_figure">
                                <img src="images/team2.jpg" alt=" " class="img-responsive" />
                            </div>
                            <h4>James Doe</h4>
                            <p>Finance Executive</p>
                            <p>+21 345 287 4556</p>
                            <div class="social-icon">
                                <a href="#" class="social-button facebook"><i class="fa fa-facebook"></i></a> 
                                <a href="#" class="social-button twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="social-button google"><i class="fa fa-google-plus"></i></a> 
                                <a href="#" class="social-button dribbble"><i class="fa fa-dribbble"></i></a> 
                            </div>
                        </div>
                        <div class="col-md-4 agileits_team_grid">
                            <div class="agileits_team_grid_figure">
                                <img src="images/team3.jpg" alt=" " class="img-responsive" />
                            </div>
                            <h4>Laura Carl</h4>
                            <p>Management</p>
                            <p>+21 345 287 4556</p>
                            <div class="social-icon">
                                <a href="#" class="social-button facebook"><i class="fa fa-facebook"></i></a> 
                                <a href="#" class="social-button twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="social-button google"><i class="fa fa-google-plus"></i></a> 
                                <a href="#" class="social-button dribbble"><i class="fa fa-dribbble"></i></a> 
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //team -->

        <!-- testimonials -->
        <div class="agile_testimonials" id="testimonials">
            <div class="container">
                <div class="clients-inn">
                    <h3 class="head"><span>What</span> people say</h3>
                    <div class="col-md-7 clients_agile_slider">
                        <div id="owl-demo" class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="agile_tesimonials_content">
                                    <div class="about-midd-main">
                                        <p> Lorem ipsum adipiscing elit, sed do eiusmod idunt ut labore. sed do eiusmod 
                                            Sed non quam ligula. Morbi sit amet interdum neque, eget viverra elit. 
                                            Donec sed massa mi. Nulla sed maximus ipsum.</p>
                                        <div class="col-md-2 testimg">
                                            <img class="agile-img" src="images/team3.jpg" alt="img" >
                                        </div>
                                        <div class="col-md-10 testname">
                                            <h4>- by ketty,Company Manager</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="agile_tesimonials_content">
                                    <div class="about-midd-main">
                                        <p> Lorem ipsum adipiscing elit, sed do eiusmod idunt ut labore. sed do eiusmod 
                                            Sed non quam ligula. Morbi sit amet interdum neque, eget viverra elit. 
                                            Donec sed massa mi. Nulla sed maximus ipsum.</p>
                                        <div class="col-md-2 testimg">
                                            <img class="agile-img" src="images/team1.jpg" alt="img" >
                                        </div>
                                        <div class="col-md-10 testname">
                                            <h4>- by ketty,Company Manager</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="agile_tesimonials_content">
                                    <div class="about-midd-main">
                                        <p> Lorem ipsum adipiscing elit, sed do eiusmod idunt ut labore. sed do eiusmod 
                                            Sed non quam ligula. Morbi sit amet interdum neque, eget viverra elit. 
                                            Donec sed massa mi. Nulla sed maximus ipsum.</p>
                                        <div class="col-md-2 testimg">
                                            <img class="agile-img" src="images/team2.jpg" alt="img" >
                                        </div>
                                        <div class="col-md-10 testname">
                                            <h4>- by ketty,Company Manager</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>

                <h5>C</h5>
            </div>
        </div>
        <!-- //testimonials -->

        <!-- map -->
        <div class="map">
            <h3 class="w3l_header w3_agileits_header two"> <span>Contact</span> Us</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d2482.432383990807!2d0.028213999961443994!3d51.52362882484525!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1423469959819" style="border:0"></iframe>
            <div class="contactgrids">
                <div class="col-md-6">
                    <div class="gridleft">
                        <h3>Working hours</h3>
                        <p>Monday-Thursday : 9:00am to 6:00pm</p>
                        <p>Friday and Saturday : 9:00am to 12:00pm</p>
                        <p>Sunday : Close</p>
                        <span class="fa fa-clock-o" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="gridright">
                        <h3>phone Online</h3>
                        <p>Phone : +456-123-7890</p>
                        <p>Fax : +456-123-7890</p>
                        <p><a href="mailto:example@email.com">info@example.com</a></p>
                        <span class="fa fa-phone" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- //map -->

        <!-- contact -->
        <div class="contact-form" id="contact">
            <h3 class="w3l_header w3_agileits_header two"> <span>Send Us</span> A Mail</h3>
            <div class="container">
                <form action="#" method="post">
                    <span class="fa fa-user" aria-hidden="true"></span>
                    <input type="text" placeholder="First Name" required="">

                    <span class="fa fa-user" aria-hidden="true"></span>
                    <input type="text" placeholder="Last Name" required="">

                    <textarea placeholder="Message" required=""></textarea>
                    <span class="fa fa-envelope" aria-hidden="true"></span>

                    <input type="email" placeholder="Email" required="">
                    <span class="fa fa-phone" aria-hidden="true"></span>

                    <input type="text" placeholder="Telephone" required="">
                    <button class="btn1">Submit</button>
                </form>
            </div>	
        </div>	
        <!-- //contact -->

        <?php include 'footer.php'; ?>
    </body>
</html>
