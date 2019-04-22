<!DOCTYPE html>

<html>
    <!--head-->
    <?php include 'head.php'; ?>
    <!--head-->

    <body class="no-page-top">

        <!--Header-->
        <!--Set your own background color to the header-->
        <header class="semi-transparent-header" data-bg-color="rgb(32, 32, 32)" data-font-color="#fff">
            <div class="container menu-container">

                <!--Site Logo-->
                <div class="logo" data-sticky-logo="img/logo-white.png" data-normal-logo="img/logo.png">
                    <a href="index.php">
                        <img alt="Viva Odyssey Logo" src="img/logo.png" data-logo-height="50">
                    </a>
                </div>
                <!--End Site Logo-->

                <div class="navbar-collapse nav-main-collapse collapse">

                    <!--Header Search-->
                    <!--            <div class="search" id="headerSearch">
                                    <a href="#" id="headerSearchOpen"><i class="fa fa-search"></i></a>
                                    <div class="search-input">
                                        <form id="headerSearchForm" action="#" method="get">
                                            <div class="input-group">
                                                <input type="text" class="form-control search" name="q" id="q" placeholder="Search...">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                        <span class="v-arrow-wrap"><span class="v-arrow-inner"></span></span>
                                    </div>
                                </div>-->
                    <!--End Header Search-->

                    <!--Main Menu-->
                    <nav class="nav-main mega-menu one-page-menu">
                        <ul class="nav nav-pills nav-main" id="mainMenu">
                            <li class="active">
                                <a href="index.php"><i class="fa fa-home"></i>Home</a>
                            </li> 
                            <li>
                                <a href="index.php#about"><i class="fa fa-fire"></i>About</a>
                            </li>
                            <!--                    <li>
                                                    <a data-hash href="#vision"><i class="fa fa-location-arrow"></i>Vision & Mision</a>
                                                </li>-->

                            <li>
                                <a href="index.php#services"><i class="fa fa-file-text-o"></i>Petronas Licenses</a>
                            </li>
                            <li>
                                <a href="index.php#describe"><i class="fa fa-flash"></i>Energy</a>
                            </li>
                            <li>
                                <a href="index.php#download"><i class="fa fa-users"></i>Team</a>
                            </li>
                            <li>
                                <a href="index.php#features"><i class="fa fa-laptop"></i>Features</a>
                            </li>
                            <li>
                                <a href="index.php#clients"><i class="fa fa fa-user"></i>Clients</a>
                            </li>
                            <li>
                                <a href="index.php#join-us"><i class="fa fa-phone"></i>Join us</a>
                            </li>
                            <!--                    <li class="dropdown">
                                                    <a class="dropdown-toggle menu-icon" href="#"><i class="fa fa-umbrella"></i>Menu <i class="fa fa-caret-down"></i></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">Blog - Standard</a></li>
                                                        <li><a href="#">Blog - Small</a></li>
                                                        <li><a href="#">Blog - Masonry</a></li>
                                                        <li><a href="#">Blog – Fullwidth Masonry</a></li>
                                                        <li class="dropdown-submenu">
                                                            <a href="#">Blog Posts</a>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="#">Standard Post</a></li>
                                                                <li><a href="#">Slideshow Post</a></li>
                                                                <li><a href="#">Full Width Post</a></li> 
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>-->
                        </ul>
                    </nav>
                    <!--End Main Menu-->
                </div>
                <button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
        </header>
        <!--End Header-->

        <div id="container">

            <!--Set your own slider options. Look at the v_RevolutionSlider() function in 'theme-core.js' file to see options-->
            <div class="home-slider-wrap fullwidthbanner-container" id="home">
                <div class="v-rev-slider" data-slider-options='{ "startheight": 700 }'>
                    <ul>
                        <li data-transition="fade" data-slotamount="7" data-masterspeed="600">
                            <img src="img/slider/image2.png" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                            <div class="tp-caption v-caption-big-white sfl stl" data-x="450" data-y="245" data-speed="600" data-start="600" data-easing="Power1.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0" data-endspeed="300">
                             
                            </div>
                            <div class="tp-caption v-caption-h1 sfl stl" data-x="450" data-y="360" data-speed="700" data-start="1200" data-easing="Power1.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0" data-endspeed="300">
                               
                            </div>
                            <div class="tp-caption sfl stl" data-x="450" data-y="450" data-speed="600" data-start="1800" data-easing="Power1.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0" data-endspeed="300">
                                <!--<a href='#' class="btn v-btn v-second-light">GET IT NOW!</a>-->
                            </div>
                            <div class="tp-caption sfl stl" data-x="605" data-y="450" data-speed="600" data-start="2200" data-easing="Power1.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0" data-endspeed="300">
                                <!--<a href='#' class="btn v-btn v-second-light">FIND OUT MORE</a>-->
                            </div>
                            <div class="tp-caption sfl stl" data-x="110" data-y="130" data-speed="600" data-start="1800" data-easing="Power1.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0" data-endspeed="300">
                                <!--<a href='#' class="btn v-btn v-third-light">GET IT NOW!</a>-->
                            
                            </div>
                            <!--<div class="v-slider-overlay overlay-colored"></div>-->
                        </li>
                    </ul>
                </div>
                <div class="shadow-right"></div>
            </div>
            <div class="v-page-wrap no-bottom-spacing">


                <div class="v-parallax v-bg-stylish" id="describe">
                    <div class="container">
                        <center>
                            <p class="v-smash-text-large-2x pull-top">
                                <span>ENERGY</span>
                            </p>
                        </center>
                        <div class="horizontal-break center"></div>
                        <div class="row app-brief">
                            <div class="col-sm-8">
                                <h3>Manpower - HSE Consultants / Safety & Health Officers / Trainers</h3>
                                <p class="v-lead text-justify">Viva focuses on providing Malaysian Nationals to cater for the drilling industry. However, we have Expatriates and Regional Consultants from SEA to furnish operations within the Asia Pacific unit. Daily Rate (12hour) - an ALL inclusive cost of medical benefits and Work Injury Compensation and Basic Offshore Survival Training (OPITO Standard)</p>

                                <p class="v-lead text-justify">VO is able to provide HSE Coaches and Safety Training Officers to support services for the following position to meet the clients request.</p>
                            </div>
                            <div class="col-sm-4">
                                <img class="img-responsive" data-animation="fade-from-right" src="img/viva-energy-01.png" />
                            </div>
                        </div>
                        <div class="row app-brief">
                            <div class="col-sm-12">
                                <h3>Scope of HSE Work</h3>
                                <p class="v-lead text-justify">Offshore Safety Training Officers (STO), capable of performing services required for Safety, Training development of safety presentations/programs based on the clients scope.</p>
                                <p class="v-lead text-justify">Safety Training Officers to provide On-site support for Company's Safety Program <p class="v-lead">Develop Safety Programs and supply Specialist to Facilitate these Programs</p>

                                <h3>List of HSE Position Provided by Viva</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="v-list-v2">
                                            <li class="v-animation" data-animation="fade-from-right" data-delay="150"><i class="fa fa-check"></i><span class="v-lead">Senior HSSE Manager / Drilling Background - Onshore/Offshore Based</span></li>
                                            <li class="v-animation" data-animation="fade-from-right" data-delay="300"><i class="fa fa-check"></i><span class="v-lead">HSE Drilling Executive / Offshore Based</span></li>
                                            <li class="v-animation" data-animation="fade-from-right" data-delay="450"><i class="fa fa-check"></i><span class="v-lead">HSE Coach (Trainer)</span></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="v-list-v2">
                                            <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">Senior Site Safety Manager</span></li>
                                            <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">Site Safety Officers</span></li>
                                            <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">Junior Experienced Safety Officers</span></li>
                                            <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">HSETraining and Administrative Coordinaton</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="v-parallax v-bg-stylish v-bg-stylish-v4 no-shadow padding-t-50" id="features">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Offshore Marine Manpower Supply </h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <p class="text-justify">The TOPSHOT development programs is a fast track program to develop the candidates to familiarize themselves with Offshore Safety requirements especially understanding of the drilling operations. Candidates will receive sufficient training in drilling operations and would have the necessary skill to conduct training on all the modules. This program is specifically created to expedite the process of developing local Offshore Safety Officers/Advisers to cater for the Drilling Industry. The participants are trained on detailed drilling modules and safety processes to meet the local demand for qualified safety officers who are well versed in the technical aspect of petroleum drilling. All training received is in accordance to SHELL IG Well Services standards. The programs will develop participants to have a better understanding on how to assist (Audit, Train, Coach, & Mentor) on-site personnel to ensure VO Clients' HSSE Management Standards are in place with full compliance on all sites within the region.</p>
                            </div>
                            <div class="col-sm-4">
                                <img src="img/viva-energy-02.jpg" alt="" class="img-responsive width-img">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="text-justify">The drilling industry requires TOPHOT Safety personnel to help Oil & Gas (OG) operators laos and drilling contractors achieve safety targets and goals and this program is designed to rs) He rth fiRaP meet those requirements.</p>
                                <p class="text-justify">Viva Odyssey is looking at placement opportunities to extend our services to our clients as part of our Corporate Social Responsibility and development program in preparation for our consultant to be fully equipped with the hand on experience and developing areas of expertise to work as a drilling HSE Officer/Adviser. This enable VO to produce quality HSE Officers/Advisers and provide mutual benefit to our host as all TOPSHOT Candidates will help improve the client's safety performance further. </p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="v-parallax v-bg-stylish no-shadow padding-t-50" id="features">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Offshore Safety Development Program Trainees</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <ul class="v-list-v2">
                                    <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">Maritime Crew for Offshore support, Dredging, Towage and Merchant Shipping</span></li>
                                    <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">Towage and Merchant Shipping</span></li>
                                    <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">Offshore projects crew (maritime and construction) </span></li>
                                    <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">Offshore / Energy operations technicians (Oil & Gas)</span></li>
                                    <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">Project services incl. local outsourcing</span></li>
                                    <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">Recruitment and selection of professionals</span></li>
                                    <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">International payroll, tax and insurances solutions </span></li>
                                    <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">HR Consultancy Training & Development programs</span></li>
                                    <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">Offshore Catering Services.</span></li>
                                </ul>

                            </div>

                            <div class="col-sm-4">
                                <img src="img/viva-energy-03.jpg" alt="" class="img-responsive">
                            </div>
                        </div>
                        <p>General Workforce Specialties Maritime crew, Oil & Gas Personnel, Offshore Personnel, Recruitment Services, Offshore Catering and Food Supply</p>
                    </div>
                </div>
                <div class="v-parallax v-bg-stylish v-bg-stylish-v4 no-shadow padding-t-50" id="features">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Offshore drilling</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="text-justify">We provide drilling companies with conventional and specialist crews for drilling jobs. We offer services from the start of a project right to the end, giving our clients a comprehensive one-stop solution for all their personnel needs. </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <ul class="v-list-v2">
                                    <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">Offshore Installation Managers</span></li>
                                    <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">Mechanics / Chief Mechanic / Maintenance Supervisors</span></li>
                                    <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">Electricians / Chief Electricians / Asst. Chief Electricians / Electrical Technicians</span></li>
                                    <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">Drillers / Assistant Drillers</span></li>
                                    <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">Rig Safety & Training Officers</span></li>
                                    <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">Rig Clerk</span></li>
                                    <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">Tool pushers / Tour pusher</span></li>
                                    <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">Pump man/ Derrick Man/ Motorman / Pump man / </span></li>
                                    <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">Roughnecks / Deck Hands</span></li>
                                    <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">Crane Operators</span></li>
                                    <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">Roustabouts / Lead Roustabouts</span></li>
                                    <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">Painter / Welder / Riggers & Slingers </span></li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <img src="img/viva-energy-04.jpg" alt="" class="img-responsive">
                            </div>
                        </div>

                    </div>
                </div>
                <!--End Features-->
                <!--                <div class="container">
                                    <div class="v-spacer col-sm-12 v-height-standard">
                
                                    </div>
                                </div>-->




                <!--Screenshots-->
                <div class="v-parallax v-bg-stylishno-shadow padding-t-50" id="screenshots">
                    <div class="container">
                        <div class="row center">
                            <div class="col-sm-12">
                                <p class="v-smash-text-large-2x">
                                    <span>RECOGNITIONS</span>
                                </p>
                                <div class="horizontal-break"></div>
    <!--                                <p class="lead" style="color: #999;">
                                    Responsive & optimized for mobile devices.
                                </p>-->
                            </div>
                            <div class="v-spacer col-sm-12 v-height-standard"></div>
                        </div>

                        <div class="row text-center">
                            <div class="col-sm-6">
                                <h3>APICTA Awards 2018</h3>
                                <img src="img/awards/001.jpg" alt="" class="width-img" />
                            </div> 
                            <div class="col-sm-6">
                                <h3>Best of Social Enterprise and SMEs Award</h3>
                                <img src="img/awards/004.jpg" alt="" class="width-img" />
                            </div> 
                            <div class="col-sm-6">
                                <h3>International Business Award 2017/2018</h3>
                                <img src="img/awards/002.jpg" alt="" class="width-img" />
                            </div> 
                            <div class="col-sm-6">
                                <h3>Grandeur TOP 10 Awards</h3>
                                <img src="img/awards/003.jpg" alt="" class="width-img" />
                            </div> 
                            <!--                                <div class="carousel-wrap">
                            
                                                                <div class="owl-carousel" data-plugin-options='{"items": 4, "singleItem": false, "pagination": true}'>
                                                                    <div class="item">
                                                                        <figure class="lightbox animated-overlay overlay-alt clearfix">
                                                                            <img src="img/landing/1.jpg" class="attachment-full">
                                                                            <a class="view" href="img/landing/1.jpg" rel="image-gallery"></a>
                                                                            <figcaption>
                                                                                <div class="thumb-info">
                                                                                    <h4>Lorem ipsum dolor sit amet.</h4>
                                                                                    <i class="fa fa-eye"></i>
                                                                                </div>
                                                                            </figcaption>
                                                                        </figure>
                                                                    </div>
                            
                                                                    <div class="item">
                                                                        <figure class="lightbox animated-overlay overlay-alt clearfix">
                                                                            <img src="img/landing/2.jpg" class="attachment-full">
                                                                            <a class="view" href="img/landing/2.jpg" rel="image-gallery"></a>
                                                                            <figcaption>
                                                                                <div class="thumb-info">
                                                                                    <h4>Lorem ipsum dolor sit amet.</h4>
                                                                                    <i class="fa fa-eye"></i>
                                                                                </div>
                                                                            </figcaption>
                                                                        </figure>
                                                                    </div>
                            
                                                                    <div class="item">
                                                                        <figure class="lightbox animated-overlay overlay-alt clearfix">
                                                                            <img src="img/landing/3.jpg" class="attachment-full">
                                                                            <a class="view" href="img/landing/3.jpg" rel="image-gallery"></a>
                                                                            <figcaption>
                                                                                <div class="thumb-info">
                                                                                    <h4>Lorem ipsum dolor sit amet.</h4>
                                                                                    <i class="fa fa-eye"></i>
                                                                                </div>
                                                                            </figcaption>
                                                                        </figure>
                                                                    </div>
                            
                                                                    <div class="item">
                                                                        <figure class="lightbox animated-overlay overlay-alt clearfix">
                                                                            <img src="img/landing/4.jpg" class="attachment-full">
                                                                            <a class="view" href="img/landing/4.jpg" rel="image-gallery"></a>
                                                                            <figcaption>
                                                                                <div class="thumb-info">
                                                                                    <h4>Lorem ipsum dolor sit amet.</h4>
                                                                                    <i class="fa fa-eye"></i>
                                                                                </div>
                                                                            </figcaption>
                                                                        </figure>
                                                                    </div>
                            
                                                                    <div class="item">
                                                                        <figure class="lightbox animated-overlay overlay-alt clearfix">
                                                                            <img src="img/landing/1.jpg" class="attachment-full">
                                                                            <a class="view" href="img/landing/1.jpg" rel="image-gallery"></a>
                                                                            <figcaption>
                                                                                <div class="thumb-info">
                                                                                    <h4>Lorem ipsum dolor sit amet.</h4>
                                                                                    <i class="fa fa-eye"></i>
                                                                                </div>
                                                                            </figcaption>
                                                                        </figure>
                                                                    </div>
                            
                                                                    <div class="item">
                                                                        <figure class="lightbox animated-overlay overlay-alt clearfix">
                                                                            <img src="img/landing/2.jpg" class="attachment-full">
                                                                            <a class="view" href="img/landing/2.jpg" rel="image-gallery"></a>
                                                                            <figcaption>
                                                                                <div class="thumb-info">
                                                                                    <h4>Lorem ipsum dolor sit amet.</h4>
                                                                                    <i class="fa fa-eye"></i>
                                                                                </div>
                                                                            </figcaption>
                                                                        </figure>
                                                                    </div>
                                                                </div>
                                                            </div>-->
                        </div>
                    </div>
                </div>

            </div>

            <!--Footer-Wrap-->
            <div class="footer-wrap">
                <footer>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                <section class="widget">
                                    <img alt="Venue" src="img/logo-white.png" style="height: 40px; margin-bottom: 20px;">
                                    <p class="pull-bottom-small">
                                        Viva Odyssey Sdn Bhd is a Malaysian company located in the heart of Kuala Lumpur, founded and incorporated in 2009 by Jerryson Abraham.
                                    </p>
                                    <p>
                                        <a href="index.php">Read More →</a>
                                    </p>
                                </section>
                            </div>
                            <div class="col-sm-8">
                                <h4>Contact Us</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <section class="widget">
                                            <div class="widget-heading">

                                            </div>
                                            <div class="footer-contact-info">
                                                <ul>
                                                    <li>
                                                        <i class="fa fa-building"></i><p>VIVA ODYSSEY SDN. BHD.</p>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-map-marker"></i><p>No.1, Jalan Puteri 12/5</br>Wisma Grand View</br>Bandar Puteri Puchong</br>47100 Puchong</br>Selangor</p>
                                                    </li>

                                                </ul>

                                            </div>
                                        </section>
                                    </div>

                                    <div class="col-sm-6">
                                        <section class="widget">
                                            <ul class="footer-contact-info">
                                                <li>
                                                    <i class="fa fa-envelope"></i><p><strong>Email:</strong> <a href="mailto:info@vivaodyssey.com">info@vivaodyssey.com</a></p>
                                                </li>
                                                <li>
                                                    <i class="fa fa-phone"></i><p><strong>Phone:</strong></br><a href="tel:+60380663258">(+603) 8066-3258</a></br><a href="tel:+60123206544">(+6012) 3206544</a></br><a href="tel:+60123206544"> (+6012) 329 3258 </a></p>
                                                </li>
                                            </ul>
                                            <br />

                                            <ul class="social-icons standard">
                                                <li class="twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i><i class="fa fa-twitter"></i></a></li>
                                                <li class="facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i><i class="fa fa-facebook"></i></a></li>

                                                <li class="youtube"><a href="#" target="_blank"><i class="fa fa-youtube"></i><i class="fa fa-youtube"></i></a></li>
                                                <li class="googleplus"><a href="#" target="_blank"><i class="fa fa-google-plus"></i><i class="fa fa-google-plus"></i></a></li>
                                            </ul>

                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>

                <div class="copyright">
                    <div class="container">
                        <p>© 2019 All Rights Reserved. Designed By <span class="color-white"><a href="http://yellowandgray.com" target="_blank"><strong>YG Studio</strong></a></span></p>
                        <!--                        <nav class="footer-menu std-menu">
                                                    <ul class="menu">
                                                        <li><a href="#">About Us</a></li>
                                                        <li><a href="#">Services</a></li>
                                                        <li><a href="#">Portfolio</a></li>
                                                        <li><a href="#">Blog</a></li>
                                                        <li><a href="#">Contact</a></li>
                                                        <li><a href="#">Buy Now</a></li>
                                                    </ul>
                                                </nav>-->
                    </div>
                </div>
            </div>
            <!--End Footer-Wrap-->
        </div>

        <!--// BACK TO TOP //-->
        <div id="back-to-top" class="animate-top"><i class="fa fa-angle-up"></i></div>

        <!-- Libs -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.flexslider-min.js"></script>
        <script src="js/jquery.easing.js"></script>
        <script src="js/jquery.fitvids.js"></script>
        <script src="js/jquery.carouFredSel.min.js"></script>
        <script src="js/theme-plugins.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/imagesloaded.js"></script>

        <script src="js/view.min.js?auto"></script>

        <script src="plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script src="plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

        <script src="js/theme-core.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
        <script>
            $(document).ready(function () {
                $('.customer-logos').slick({
                    slidesToShow: 6,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 1500,
                    arrows: false,
                    dots: false,
                    pauseOnHover: false,
                    responsive: [{
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 4
                            }
                        }, {
                            breakpoint: 520,
                            settings: {
                                slidesToShow: 3
                            }
                        }]
                });
            });
        </script>
    </body>
</html>
