<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
    <?php
    include 'head.php';
    $page = 'home'
    ?>

    <body>
        <!-- banner -->
        <div class="position" id="top">
            <div class="banner">
                <div class="agileinfo-dot">
                    <div class="container-fluid" style="padding-left: 0px">
                        <?php include "menu.php"; ?>
                    </div>
                    <div class="container-fluid">
                        <div class="w3_agile_banner_info">
                            <section class="slider">
                                <div class="flexslider">
                                    <ul class="slides">
                                        <li>
                                            <div class="agileits_w3layouts_banner_info">
                                                <h2>Software Solutions Provider</h2>
<!--                                                <p>See our recent works projects! Sed bibendum, purus ac posuere tristique arcu augue pharetra augue,</p>
                                                <div class="w3ls-button">
                                                    <a href="#" data-toggle="modal" data-target="#myModal">Read More</a>
                                                </div>-->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="agileits_w3layouts_banner_info">
                                                <h2>Business Consulting Services</h2>
<!--                                                <p>See our recent works projects! Sed bibendum, purus ac posuere tristique arcu augue pharetra augue,</p>
                                                <div class="w3ls-button">
                                                    <a href="#" data-toggle="modal" data-target="#myModal">Read More</a>
                                                </div>-->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="agileits_w3layouts_banner_info">
                                                <h3>IT Architecture Team</h3>
<!--                                                <p>See our recent works projects! Sed bibendum, purus ac posuere tristique arcu augue pharetra augue,</p>
                                                <div class="w3ls-button">
                                                    <a href="#" data-toggle="modal" data-target="#myModal">Read More</a>
                                                </div>-->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="agileits_w3layouts_banner_info">
                                                <h2>Disciplined Processes & leading edge Methodologies</h2>
<!--                                                <p>See our recent works projects! Sed bibendum, purus ac posuere tristique arcu augue pharetra augue,</p>
                                                <div class="w3ls-button">
                                                    <a href="#" data-toggle="modal" data-target="#myModal">Read More</a>
                                                </div>-->
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
                            <div class="col-md-3 bannerbott1">
                                <h3><span class="fa fa-laptop" aria-hidden="true"></span>SOFTWARE DEVELOPMENT</h3>
                            </div>
                            <div class="col-md-3 bannerbott1">
                                <h3><span class="fa fa-diamond" aria-hidden="true"></span> QA & TESTING</h3>

                            </div>
                            <div class="col-md-3 bannerbott1">
                                <h3><span class="fa fa-cube" aria-hidden="true"></span>UX DESIGN</h3>

                            </div>
                            <div class="col-md-3 bannerbott1">
                                <h3><span class="fa fa-cube" aria-hidden="true"></span>CONSULTING</h3>

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
                        <h3 class="heading-with-ping"><strong>Alias Innovations</strong></h3><br/>
                        <h4>Software Solutions Provider & Business Consulting Services</h4>
                    </div>
                    <div class="col-md-4 aboutgrid2">
                        <p>Alias Innovations is a Software Solutions Provider and Business Consulting company with collective industry experience of more than 50 years.</p><br/>
                        <p>We cater to clients from multiple industry verticals on an international level and provide our services for demand leading edge software development skills.</p>
                    </div>
                    <div class="col-md-4 aboutgrid3">
                        <p>We are 100+ people, distributed in our three development centers in Malaysia(Kuala Lumpur, Selangor), India(Chennai) and Philippines(Manila).</p><br/>
                        <p>We also provide outsourced offshore services.</p>
                        <p>Around 40% of our revenues are generated by offshoring projects, a fact that underscores our commitment and abilities to work with clients outside Malaysia.</p>
                    </div>
                    <div class="clearfix"> </div>
                    <!-- Aboutslider -->
                    <div class="aboutslider">
                        <!--Slider-->
                        <h3 class="w3l_header w3_agileits_header two"><span>Our</span> Positioning</h3><br/>
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
                                    <!--                                    <li>
                                                                            <div class="slider-info3">
                                                                            </div>
                                                                        </li>-->
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
                        <div class="col-md-4 bottomgrid1">
                            <h3>Technical Excellance</h3>
                            <span class="fa fa-circle" aria-hidden="true"></span>

                            <ul>
                                <li>Full-time team dedicated ti Process Improvement and QA</li>
                                <li>Ai AT(Alias Innovation Architecture Team) experienced pool of Architects available to support development teams at no additional cost</li>
                                <li>Disciplined processes and leading-edge methodologies</li>
                            </ul>
                        </div>
                        <div class="col-md-4 bottomgrid1">
                            <h3>Client Focus</h3>
                            <span class="fa fa-circle" aria-hidden="true"></span>

                            <ul>
                                <li>Large enough to execute big projects; small enough to be agile</li>
                                <li>Simple organization with strong commitment to customer service</li>
                                <li>Solid understanding of business processes, trends and best practices in the industry</li>
                            </ul>
                        </div>
                        <div class="col-md-4 bottomgrid1">
                            <h3>High Performance Team</h3>
                            <span class="fa fa-circle" aria-hidden="true"></span>
                            <ul>
                                <li>Compatible time zone with other countries</li>
                                <li>Cultural affinity</li>
                                <li>Best talents in the region</li>
                            </ul>
                        </div>
                        <!--                        <div class="col-md-3 bottomgrid1">
                                                    <h3>2017</h3>
                                                    <span class="fa fa-circle" aria-hidden="true"></span>
                                                    <h4>Theme core</h4>
                                                    <p>Donec et venenatis libero. Fusceing dapibus pulvinar tincidunt. Proin 
                                                        maximus ipsum ut scelerisque.</p>
                                                </div>-->
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About -->

        <!-- Services -->
        <!--        <div class="services" id="services">
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
                </div>-->
        <!-- Services -->

        <!-- team -->
        <!--        <div class="team" id="team">
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
                </div>-->
        <!-- //team -->

        <!-- testimonials -->
        <div class="agile_testimonials" id="testimonials">
            <div class="container">
                <div class="clients-inn">
                    <h3 class="head text-left"><span>Value</span> Proposition For Our People </h3>
                    <div class="row">
                    <div class="col-md-6 clients_agile_slider">
                        <div id="owl-demo" class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="agile_tesimonials_content">
                                    <div class="about-midd-main">
                                        <img class="agile-img" src="images/icon/structure-03.jpg" alt="img" >
                                        <div class="col-md-2">
                                            <h4>Our Facilities</h4>
                                        </div>
                                        <div class="col-md-10 testname">
                                            <ul>
                                                <li>The infrastructure and the modern design of our development centers allow for a fluid communication and team building.</li>
                                                <li>Our offices are strategically located in quiet neighborhoods.</li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="agile_tesimonials_content">
                                    <div class="about-midd-main">
                                        <img class="agile-img" src="images/icon/structure-02.jpg" alt="img" >
                                        <div class="col-md-2 testimg">
                                            <h4>Our Facilities</h4>
                                        </div>
                                        <div class="col-md-10 testname">
                                            <ul>
                                                <li>The infrastructure and the modern design of our development centers allow for a fluid communication and team building.</li>
                                                <li>Our offices are strategically located in quiet neighborhoods.</li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="agile_tesimonials_content">
                                    <div class="about-midd-main">
                                        <img class="agile-img" src="images/icon/structure-01.jpg" alt="img" >
                                        <div class="col-md-2 testimg">
                                            <h4>Our Culture</h4>
                                        </div>
                                        <div class="col-md-10 testname">
                                            <ul>
                                                <li>We believe that excellence and quality is not divorced from having fun.</li>
                                                <li>Music jam sessions, social events, food tasting and other typical activities of our culture. </li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="col-md-6">
                        <ul>
                            <li><strong>Modern Infrastructure</strong></li>
                            <li><strong>Strategically Located</strong></li>
                        </ul>

                    </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <!-- //testimonials -->

        <!-- map -->
        <!--        <div class="map">
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
                </div>-->
        <!-- //map -->

        <!-- contact -->
        <!--        <div class="contact-form" id="contact">
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
                </div>	-->
        <!-- //contact -->

        <?php include 'footer.php'; ?>
    </body>
</html>
