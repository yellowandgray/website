<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
    <?php
    include "head.php";
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
                                                <h2>Technical Excellence</h2>
                                                <p>See our recent works projects! Sed bibendum, purus ac posuere tristique arcu augue pharetra augue,</p>
                                                <div class="w3ls-button">
                                                    <a href="#" data-toggle="modal" data-target="#myModal">Read More</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="agileits_w3layouts_banner_info">
                                                <h3>Client Focused</h3>
                                                <p>Sed bibendum, purus ac posuere tristique See our recent works projects! arcu augue pharetra augue,</p>
                                                <div class="w3ls-button">
                                                    <a href="#" data-toggle="modal" data-target="#myModal">Read More</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="agileits_w3layouts_banner_info">
                                                <h3>IT Architecture Team</h3>
                                                <p>See our recent works projects! Sed bibendum, purus ac posuere tristique arcu augue pharetra augue,</p>
                                                <div class="w3ls-button">
                                                    <a href="#" data-toggle="modal" data-target="#myModal">Read More</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="agileits_w3layouts_banner_info">
                                                <h2>Disciplined Processes and leading edge Methodologies</h2>
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
                            <div class="col-md-3 bannerbott1">
                                <h3><span class="fa fa-laptop" aria-hidden="true"></span>SOFTWARE DEVELOPMENT</h3>
                                <p>Donec et venenatis libero. Fusce dapibus pulvinar tincidunt. Proin maximus ipsum 
                                    ut scelerisque dictum.</p>
                            </div>
                            <div class="col-md-3 bannerbott1">
                                <h3><span class="fa fa-diamond" aria-hidden="true"></span> QA & TESTING</h3>
                                <p>Donec et venenatis libero. Fusce dapibus pulvinar tincidunt. Proin maximus ipsum 
                                    ut scelerisque dictum.</p>
                            </div>
                            <div class="col-md-3 bannerbott1">
                                <h3><span class="fa fa-cube" aria-hidden="true"></span>UX DESIGN</h3>
                                <p>Donec et venenatis libero. Fusce dapibus pulvinar tincidunt. Proin maximus ipsum 
                                    ut scelerisque dictum.</p>
                            </div>
                            <div class="col-md-3 bannerbott1">
                                <h3><span class="fa fa-cube" aria-hidden="true"></span>CONSULTING</h3>
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
                        <p class="text-justify">Alias Innovations is a Software Solutions Provider and Business Consulting company with collective industry experience of more than 50 years.</p><br/>
                        <p class="text-justify">We cater to clients from multiple industry verticals on an international level and provide our services for demand leading edge software development skills.</p>
                    </div>
                    <div class="col-md-4 aboutgrid3">
                        <p>
                        <p class="text-justify">We are 100+ people, distributed in our three development centers in Malaysia(Kuala Lumpur, Selangor), India(Chennai) and Philippines(Manila).</p><br/>
                        <p>We also provide outsourced offshore services.</p><br/>
                        <p class="text-justify">Around 40% of our revenues are generated by offshoring projects, a fact that underscores our commitment and abilities to work with clients outside Malaysia.</p>
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
                            <h4>Technical Excellence</h4>
                            <ul>
                                <li>Full-time team dedicated to Process Improvement</li>
                                <li>Ai AT(Alias Innovation Architecture Team) experienced pool of Architects available to support development teams at no additional cost</li>
                                <li>Disciplined processes and leading-edge methodologies</li>
                            </ul>
                        </div>
                        <div class="col-md-3 bottomgrid1">
                            <h3>2012</h3>
                            <span class="fa fa-circle" aria-hidden="true"></span>
                            <h4>Client Focus</h4>
                            <ul>
                                <li>Large enough to execute big projects;<br/> small enough to be agile</li>
                                <li>Simple organization with strong commitment to customer service</li>
                                <li>Solid understanding of business processes, trends and best practices in the industry</li>
                            </ul>
                        </div>
                        <div class="col-md-3 bottomgrid1">
                            <h3>2014</h3>
                            <span class="fa fa-circle" aria-hidden="true"></span>
                            <h4>High Performance Team</h4>
                            <ul>
                                <li>Compatible time zone with other countries</li>
                                <li>Cultural affinity</li>
                                <li>Best talents in the region</li>
                            </ul>
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
                    <div class="row">
                        <div class="col-md-6 margin-top-3em our-infra">
                            <h2>Our Infrastructure</h2>
                            <span>Main Services</span>
                            <ul>
                                <li>Internet connection (primary and secondary) and Firwall with IDS</li>
                                <li>Network / Directory Service</li>
                                <li>Inventory Management</li>
                                <li>Corporate Antivirus protection</li>
                                <li>Backup policies</li>
                                <li>Version Management</li>
                                <li>Physical security</li>
                                <li>UPS</li>
                                <li>Temperature and humidity control</li>
                                <li>Fire detection system</li>
                                <li>Contingency plan in the cloud</li>
                            </ul>
                        </div>
                        <div class="col-md-6 margin-top-3em our-infra">
                            <h2>Our ready to use end to end solutions</h2>
                            <ul>
                                <li><strong>ERP Solutions-</strong> Including VAT implementation</li>
                                <li><strong>Mobile Application Development</strong> including UI / UX Design (iOS / Android)</li>
                                <li><strong>High-Quality 3D Animation</strong> & Architectural Walkthrough</li>
                                <li><strong>Food Delivery Application</strong></li>
                                <li><strong>Ecommerce Portal</strong> Similar to Amazon</li>
                                <li><strong>Messaging Application</strong> Similar to Whatsapp</li>
                                <li><strong>E-Hailing Application</strong></li>
                                <li><strong>Game Development</strong> (iOS & Android)</li>
                                <li><strong>Hire Dedicated Programmers</strong></li>
                                <li><strong>SAP / SAP B1 / SAP HANA / Oracle</strong></li>
                                <li><strong>School Management System</strong></li>
                                <li><strong>Hospital management System</strong></li>
                                <li><strong>Core Banking & Tools</strong>(Reports)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About -->

        <!-- Services -->
        <div class="services" id="services">
            <div class="container">
                <h3 class="w3l_header w3_agileits_header two"><span>Our</span> Services</h3>
                <div class="servicegrids">
                    <div class="col-md-3 serv1">
                        <span class="fa fa-cubes" aria-hidden="true"></span>
                        <h5>SOFTWARE DEVELOPMENT</h5>
                        <!--                        <h4>Power in your hand and best thoughts</h4>-->
                        <ul>
                            <li>Development and maintenance of Java or .Net based projects</li>
                            <li>Fixed Price/Fixed Scope projects or Time & Materials engagements</li>
                            <li>Staff augmentation</li>
                            <li>Off-shore development</li>
                        </ul>
                    </div>
                    <div class="col-md-3 serv2">
                        <span class="fa fa-desktop" aria-hidden="true"></span>
                        <h5>UX DESIGN</h5><br/>
                        <!--                        <h4>Encryption of data monitoring service</h4>-->
                        <ul>
                            <li>Usability Consulting</li>
                            <li>Heuristic Analysis</li>
                            <li>User Interface Design</li>
                            <li>Prototype Construction</li>
                        </ul>
                    </div>
                    <div class="col-md-3 serv3">
                        <span class="fa fa-clone" aria-hidden="true"></span>
                        <h5>QA & TESTING</h5><br/>
                        <!--                        <h4>Product service value genuine management</h4>-->
                        <ul>
                            <li>Test Case definition and execution</li>
                            <li>Test automation</li>
                            <li>QA Services and Consulting</li>
                            <li>Platform 4.0 Developer Training</li>
                        </ul>
                    </div>
                    <div class="col-md-3 serv4">
                        <span class="fa fa-feed" aria-hidden="true"></span>
                        <h5>CONSULTING</h5><br/>
                        <!--                        <h4>Supportive chat help with our customers</h4>-->
                        <ul>
                            <li>Definition of technological strategies</li>
                            <li>BPR (Business Process Redesign)</li>
                            <li>Functional specification of software solutions</li>
                            <li>Definition of technological architectures</li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="servicebottomgrids">
                    <div class="row">
                        <div class="col-md-4">
                            <h2>We work on a wide range of technologies</h2><br/>
                            <h5>Main Platforms <span class="fa fa-cubes" aria-hidden="true"></span></h5>
                            <ul>
                                <li>JAVA</li>
                                <li>C# / C++ / VB.NET</li>
                                <li>PHP</li>
                                <li>RUBY / PYTHON</li>
                                <li>MS SQL SERVER</li>
                                <li>ORACLE</li>
                                <li>MYSQL / POSTRESQL</li>
                            </ul>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4 serv1">
                                    <h5>Web<br/> Technologies <span class="fa fa-cubes" aria-hidden="true"></span></h5>
                                    <ul>
                                        <li>HTML5, JQUERY, BOOTSTRAP, NODE.JS</li>
                                        <li>SPRING MVC, WICKET, SEAM</li>
                                        <li>MVC4, WPF, SILVERLIGHT, REPORTING</li>
                                        <li>RAILS, DJANGO, GRAILS</li>
                                        <li>REST & SOAP SERVICES</li>
                                    </ul>
                                </div>
                                <div class="col-md-4 serv2">
                                    <h5>Mobile <span class="fa fa-clone" aria-hidden="true"></span></h5>
                                    <ul>
                                        <li>ANDROID, iPHONE, iPAD, WINDOWS MOBILE, BLACKBERRY</li>
                                        <li>NATIVE APPLICATIONS</li>
                                        <li>PHONECAP, TITANIUM, JQUERY MOBILE</li>
                                    </ul>
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
        <?php include "footer.php"; ?>
        <!-- Responsive slides -->
        <script src="js/responsiveslides.min.js"></script>
        <script>
                                $(function () {
                                    $("#slider").responsiveSlides({
                                        auto: true,
                                        pager: true,
                                        nav: true,
                                        speed: 1000,
                                        namespace: "callbacks",
                                        before: function () {
                                            $('.events').append("<li>before event fired.</li>");
                                        },
                                        after: function () {
                                            $('.events').append("<li>after event fired.</li>");
                                        }
                                    });
                                });
        </script>
        <!-- //Responsive slides -->

        <!-- carousel -->
        <script src="js/owl.carousel.js"></script>
        <script>
                                $(document).ready(function () {
                                    $("#owl-demo").owlCarousel({
                                        items: 1,
                                        itemsDesktop: [768, 1],
                                        itemsDesktopSmall: [414, 1],
                                        lazyLoad: true,
                                        autoPlay: true,
                                        navigation: true,

                                        navigationText: false,
                                        pagination: true,

                                    });

                                });
        </script>
        <!-- //carousel -->

        <!-- bootstrap-modal-pop-up -->
        <div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        Technical Solutions
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
                    </div>
                    <div class="modal-body">
                        <img src="images/laptop.jpg" alt=" " class="img-responsive" />
                        <p>Ut enim ad minima veniam, quis nostrum 
                            exercitationem ullam corporis suscipit laboriosam, 
                            nisi ut aliquid ex ea commodi consequatur? Quis autem 
                            vel eum iure reprehenderit qui in ea voluptate velit 
                            esse quam nihil molestiae consequatur, vel illum qui 
                            dolorem eum fugiat quo voluptas nulla pariatur.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- //bootstrap-modal-pop-up --> 

        <!-- start-smoth-scrolling -->
        <script src="js/SmoothScroll.min.js"></script>

        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript">
                                jQuery(document).ready(function ($) {
                                    $(".scroll").click(function (event) {
                                        event.preventDefault();
                                        $('html,body').animate({
                                            scrollTop: $(this.hash).offset().top
                                        }, 1000);
                                    });
                                });
        </script>

        <!-- here stars scrolling icon -->
        <script type="text/javascript">
            $(document).ready(function () {
                /*
                 var defaults = {
                 containerID: 'toTop', // fading element id
                 containerHoverID: 'toTopHover', // fading element hover id
                 scrollSpeed: 1200,
                 easingType: 'linear' 
                 };
                 */

                $().UItoTop({easingType: 'easeOutQuart'});

            });
        </script>
        <!-- //here ends scrolling icon -->

        <!-- for bootstrap working -->
        <script src="js/bootstrap.js"></script>
        <!-- //for bootstrap working -->

    </body>
</html>