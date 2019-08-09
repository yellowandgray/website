<!doctype html>
<html lang="en">
    <?php $page = 'home';
    include 'head.php'; ?>
    <body>
        <div class="wrapper home3">
            <!--Header Start-->
<?php include'menu.php'; ?>
            <!--Header End--> 
            <!--Slider Start-->
            <section id="home-slider" class="owl-carousel owl-theme wf100">
                <div class="item">
                    <div class="slider-caption h3slider">
                        <div class="container">
                            <strong>We are not only selling Products but also Trust </strong>
                            <h1>Telecommunications</h1>
                            <a href="#">Find Out More</a>
                        </div>
                    </div>
                    <img src="images/banner/003.jpg" alt=""> 
                </div>
                <div class="item">
                    <div class="slider-caption h3slider">
                        <div class="container">
                            <strong>content-2</strong>
                            <h1>Industry Safety Products</h1>
                            <a href="industrial-safetyproducts.php">Find Out More</a>
                        </div>
                    </div>
                    <img src="images/banner/004.jpg" alt=""> 
                </div>
                <div class="item">
                    <div class="slider-caption h3slider">
                        <div class="container">
                            <strong>We are not only selling Products but also Trust </strong>
                            <h1>Metal & Cable Tray</h1>
                            <a href="#">Find Out More</a>
                        </div>
                    </div>
                    <img src="images/banner/002.jpg" alt=""> 
                </div>
                <div class="item">
                    <div class="slider-caption h3slider">
                        <div class="container">
                            <strong>We are not only selling Products but also Trust </strong>
                            <h1>Renewable Energy</h1>
                            <a href="#">Find Out More</a>
                        </div>
                    </div>
                    <img src="images/banner/001.jpg" alt=""> 
                </div>
            </section>
            <!--Slider End--> 

            <div class="quick">
                <button class="open-button" onclick="openForm()">Enquiry</button>
            </div>
            <div class="form-popup" id="myForm">
                <form action="/action_page.php" class="form-container">
                    <h1>Sales Enquiry</h1>
                    <input type="text" placeholder="Name *" name="name" required>
                    <input type="text" placeholder="Your Email *" name="email" required>
                    <input type="text" placeholder="Phone *" name="phone" required>
                    <textarea type="text" placeholder="Comments" name="comment" required></textarea>
                    <button type="submit" class="btn">Submit</button>
                    <button type="button" class="btn-1 cancel" onclick="closeForm()"><i class="fas fa-times"></i></button>
                </form>
            </div>
            <!--Service Area Start-->
            <section class="donation-join wf100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-sm-6">
                            <div class="volbox">
                                <img src="images/home/002.png" alt="">
                                <h5>Telecommunications</h5>
                                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                <a href="tele-communication.php">See More</a> 
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <div class="volbox nob">
                                <img src="images/home/003.png" alt="">
                                <h5>Renewable Energy</h5>
                                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                <a href="#">See More</a> 
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <div class="volbox nob">
                                <img src="images/home/004.png" alt="">
                                <h5>Safety Products</h5>
                                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                <a href="industrial-safetyproducts.php">See More</a>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <div class="volbox nob">
                                <img src="images/home/005.png" alt="">
                                <h5>Metal</h5>
                                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                <a href="metal.php">See More</a>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <div class="volbox nob">
                                <img src="images/home/0005.png" alt="">
                                <h5>Cable Tray</h5>
                                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                <a href="#">See More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Service Area End--> 
            <!--About Section Start-->
            <section class="h3-about wf100 p80">
                <div class="container">
                    <div class="row pad-t-80">
                        <div class="col-md-4">
                            <div class="h3-aboutxt volbox-2">
                                <h1>About<span> VPN Commodities</span></h1>
                                <p class="text-justify"> VPN Commodities is a reputed global service provider in the field of Copper and Fiber Products in the Telecom Sector and in the field of Low Voltage Electrical products. Having its base in India, Germany and USA, the firm has carved a niche through the support of its valuable clients. Backed by a team of experts from engineering manufacturing, trading and sourcing, the firm offers cost effective solutions and caters the needs of the client in mentioned domains.</p>
                                <a href="#">See More</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="images/home/027.png" alt="">
                        </div>
                        <div class="col-md-4">
                            <div class="img-radius"> <img src="images/home/026.jpg" alt=""> </div>
                        </div>

                    </div>
                </div>
            </section>
            <!--About Section End--> 
            <!--Our Core Projects Start-->
            <section class="our-core-projects wf100 p80">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="h3-stitle">
                                <h1>Telecommunication</h1>
                                <p> <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p> </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="core-projects-slider" class="owl-carousel owl-theme">
                                <!--Project Box Start-->
                                <div class="item">
                                    <div class="ocp-box">
                                        <div class="ocp-thumb">
                                            <a href="#"><i class="fas fa-link"></i></a>
                                            <img src="images/home/006.png" alt=""></div>
                                        <h5> <a href="#">Rack & Cabinet</a> </h5>
                                    </div>
                                </div>
                                <!--Project Box End--> 
                                <!--Project Box Start-->

                                <div class="ocp-box">
                                    <div class="ocp-thumb">
                                        <a href="#"><i class="fas fa-link"></i></a>
                                        <img src="images/home/007.png" alt=""></div>
                                    <h5> <a href="#">Fiber Cable</a> 
                                    </h5>
                                </div>


                                <!--Project Box End--> 
                                <!--Project Box Start-->
                                <div class="item">
                                    <div class="ocp-box">
                                        <div class="ocp-thumb">
                                            <a href="#"><i class="fas fa-link"></i></a>
                                            <img src="images/home/008.png" alt=""></div>
                                        <h5> <a href="#">Copper cable </a> 
                                        </h5>
                                    </div>
                                </div>
                                <!--Project Box End--> 
                                <!--Project Box Start-->
                                <div class="item">
                                    <div class="ocp-box">
                                        <div class="ocp-thumb">
                                            <a href="#"><i class="fas fa-link"></i></a>
                                            <img src="images/home/009.png" alt=""></div>
                                        <h5> <a href="#">Copper Products </a> 
                                        </h5>
                                    </div>
                                </div>
                                <!--Project Box End--> 
                                <!--Project Box Start-->
                                <div class="item">
                                    <div class="ocp-box">
                                        <div class="ocp-thumb">
                                            <a href="#"><i class="fas fa-link"></i></a>
                                            <img src="images/home/010.png" alt=""></div>
                                        <h5> <a href="#">Rope </a> 
                                        </h5>
                                    </div>
                                </div>
                                <!--Project Box End--> 
                                <!--Project Box Start-->
                                <div class="item">
                                    <div class="ocp-box">
                                        <div class="ocp-thumb">
                                            <a href="#"><i class="fas fa-link"></i></a>
                                            <img src="images/home/011.png" alt=""></div>
                                        <h5> <a href="#">FRP & GRP</a> 
                                        </h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row pad-t-40">
                        <div class="col-md-12">
                            <div class="volbox-3 text-center">
                                <a href="tele-communication.php">See More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Our Core Projects End--> 
            <!--News and Events Start-->
            <section class="news-events wf100 p80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <h1>Renewable Energy</h1>
                            <!--News Blog Start-->
                            <div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 news-block">
                                        <div class="news-thumb height">
                                            <a href="#"><i class="fas fa-link"></i></a>
                                            <img src="images/home/012.jpg" alt="">
                                            <p class="effect-p">Minipol, Maxipol & Combiester</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 news-block">
                                        <div class="news-thumb">
                                            <a href="#"><i class="fas fa-link"></i></a>
                                            <img src="images/home/030.jpg" alt="">
                                            <p class="effect-p">Connectors and Junction Box</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--News Blog End--> 
                            <!--News Blog Start-->
                            <div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 news-block">
                                        <div class="news-thumb">
                                            <a href="#"><i class="fas fa-link"></i></a>
                                            <img src="images/home/029.jpg" alt="">
                                            <p class="effect-p">DC-DC Converter</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 news-block">
                                        <div class="news-thumb">
                                            <a href="#"><i class="fas fa-link"></i></a>
                                            <img src="images/home/028.jpg" alt="">
                                            <p class="effect-p">Combiner Box</p>
                                            <p></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row pad-t-40">
                                <div class="col-md-12">
                                    <div class="volbox-3 text-center">
                                        <a href="#">See More</a>
                                    </div>
                                </div>
                            </div>
                            <!--News Blog End--> 
                        </div>
                        <div class="col-md-4">
                            <!--Events Start-->
                            <div class="h3-events">
                                <h1>Industry Safety Products</h1>
                                <div id="h3-events" class="owl-carousel owl-theme">
                                    <!--Event box Start-->
                                    <div class="item">
                                        <div class="event-box">
                                            <div class="event-thumb">
                                                <a href="#"><i class="fas fa-link"></i></a>
                                                <img src="images/home/014.jpg" alt=""></div>
                                            <div class="event-txt">
                                                <h4><a href="#">Safety Shoe</a></h4>
                                                <a class="rm" href="industrial-safetyproducts.php">Read More</a> 
                                            </div>
                                        </div>
                                    </div>

                                    <!--Event box End--> 
                                    <!--Event box Start-->
                                    <!--                                    <div class="item">
                                                                            <div class="event-box">
                                                                                <div class="event-thumb"> <a href="#"><i class="fas fa-link"></i></a><img src="images/eventslideimg2.jpg" alt=""></div>
                                                                                <div class="event-txt">
                                                                                    <ul class="event-meta">
                                                                                        <li>17 September, 2018</li>
                                                                                        <li>09:30 am - 03:00 pm</li>
                                                                                    </ul>
                                                                                    <h4><a href="#">Get the Wild Generations Safe</a></h4>
                                                                                    <p> <i class="fas fa-map-marker-alt"></i> Expo Center, Lahore-Pakistan </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>-->
                                    <!--Event box End--> 
                                    <!--Event box Start-->
                                    <!--                                    <div class="item">
                                                                            <div class="event-box">
                                                                                <div class="event-thumb"> <a href="#"><i class="fas fa-link"></i></a><img src="images/eventslideimg3.jpg" alt=""></div>
                                                                                <div class="event-txt">
                                                                                    <ul class="event-meta">
                                                                                        <li>17 September, 2018</li>
                                                                                        <li>09:30 am - 03:00 pm</li>
                                                                                    </ul>
                                                                                    <h4><a href="#">Get the Wild Generations Safe</a></h4>
                                                                                    <p> <i class="fas fa-map-marker-alt"></i> Expo Center, Lahore-Pakistan </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>-->
                                    <!--Event box End--> 
                                </div>
                            </div>
                            <!--Events End--> 
                        </div>
                    </div>

            </section>
            <!--News and Events End--> 
            <!--Team Section Start-->
            <section class="wf100 p80 h3teams-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="h3-stitle text-center">
                                <h1 class="color-w">Cable Tray</h1>
                                <p>  <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!--Team Box Start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="team-box">
                                <img src="images/home/015.jpg" alt="">
                                <div class="team-info">
                                    <h3>Wire mesh cable tray</h3>
                                    <a class="rm" href="#">Read More</a>

                                </div>
                            </div>
                        </div>
                        <!--Team Box Start--> 
                        <!--Team Box Start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="team-box">
                                <img src="images/home/016.jpg" alt="">
                                <div class="team-info">
                                    <h3>Frp cable tray </h3>
                                    <a class="rm" href="#">Read More</a>

                                </div>
                            </div>
                        </div>
                        <!--Team Box Start--> 
                        <!--Team Box Start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="team-box">
                                <img src="images/home/017.jpg" alt="">
                                <div class="team-info">
                                    <h3>Accessories</h3>
                                    <a class="rm" href="#">Read More</a>

                                </div>
                            </div>
                        </div>
                        <!--Team Box Start--> 
                    </div>
                    <div class="row pad-t-40">
                        <div class="col-md-12">
                            <div class="volbox-3 text-center">
                                <a href="#">See More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Team Section End--> 

            <!--Testimonials Start-->
            <section class="wf100 p80 projects" style="background-color: #e1e1e1;">
                <div class="projects-grid custom-gap">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="h3-stitle text-center">
                                    <h1>Metal</h1>
                                    <p> <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p></p>
                                    <p> and we are providing all kinds of Eco-Friendly and Environmental Services. </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!--Project box Start-->
                            <div class="col-md-3 col-sm-6">
                                <div class="pro-box">
                                    <img src="images/home/021.jpg" alt="">
                                    <h5>Billet</h5>
                                    <div class="pro-hover">
                                        <h6>Billet</h6>
                                        <p> <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p></p>
                                        <a href="#">Read More</a> 
                                    </div>
                                </div>
                            </div>
                            <!--Project box End-->
                            <!--Project box Start-->
                            <div class="col-md-3 col-sm-6">
                                <div class="pro-box">
                                    <img src="images/home/022.jpg" alt="">
                                    <h5>Reinforcing Bars</h5>
                                    <div class="pro-hover">
                                        <h6>Reinforcing Bars</h6>
                                        <p> <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p></p>
                                        <a href="#">Read More</a> 
                                    </div>
                                </div>
                            </div>
                            <!--Project box End--> 
                            <!--Project box Start-->
                            <div class="col-md-3 col-sm-6">
                                <div class="pro-box">
                                    <img src="images/home/023.jpg" alt="">
                                    <h5>Compact Coil</h5>
                                    <div class="pro-hover">
                                        <h6>Compact Coil</h6>
                                        <p> <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p></p>
                                        <a href="#">Read More</a> 
                                    </div>
                                </div>
                            </div>
                            <!--Project box End--> 
                            <!--Project box Start-->
                            <div class="col-md-3 col-sm-6">
                                <div class="pro-box">
                                    <img src="images/home/024.jpg" alt="">
                                    <h5>Wire Bar</h5>
                                    <div class="pro-hover">
                                        <h6>Wire Rod</h6>
                                        <p> <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p></p>
                                        <a href="#">Read More</a> 
                                    </div>
                                </div>
                            </div>
                            <!--Project box End--> 
                        </div>
                        <div class="row pad-t-40">
                            <div class="col-md-12">
                                <div class="volbox-3 text-center">
                                    <a href="metal.php">See More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--Partner Logos Section End--> 
<?php include'footer.php'; ?>

    </body>
</html>