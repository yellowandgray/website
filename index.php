<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <main class="section banner-section" style="background: url(img/banner-bg.jpg);height: 100%;padding-bottom: 40px;background-size: cover;">
            <header style="background: #2f4d4b">
                <div class="logo">
                    <img class="logo-size" src="img/logo.png" alt="Project Next Door Logo" />
                    <span class="menu-nav" onclick="openNav()"><img src="img/menu-bar.png" /></span>
                </div>
                <?php include 'menu.php'; ?>
            </header>
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="b-header-site-lf-area">
                            <div class="scroll-indicator scroll-indicator--dark">


                                <div class="vertical vertical--bottom" style="height: 875px;">
                                    <div class="vertical-cell" style="transform-origin: 65.625px 65.625px; height: 131.25px; width: 875px; transform: rotate(-90deg);">

                                        <div class="dash dash--dark dash--normal">
                                            <div class="dash-line"></div>
                                            <div class="dash-text">Scroll down</div>
                                        </div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">

                        <div class="SlickCarousel wow fadeInDown">
                            <!-- Item -->
                            <div class="ProductBlock">
                                <div class="Content">
                                    <div class="img-fill">
                                        <img src="img/banner.jpg" alt="banner-1" class="img-responsive">
                                    </div>
                                </div>
                            </div>
                            <!-- Item -->
                            <!-- Item -->
                            <div class="ProductBlock">
                                <div class="Content">
                                    <div class="img-fill">
                                        <img src="img/banner-1.jpg" alt="banner-2" class="img-responsive">
                                    </div>
                                </div>
                            </div>
                            <!-- Item -->
                            <!-- Item -->
                            <div class="ProductBlock">
                                <div class="Content">
                                    <div class="img-fill">
                                        <img src="img/banner-2.jpg" alt="banner-3" class="img-responsive">
                                    </div>
                                </div>
                            </div>
                            <!-- Item -->
                        </div>
                        <!-- Carousel Container -->
                        <a href="#" class="btn btn-custom-1 wow fadeInUp"><i class="fas fa-arrow-right"></i> Find out more.</a>
                    </div>
                    <div class="col-md-3 banner-h1">
                        <h1 class="wow fadeInUp">WHERE IMAGINEERS ARE BORN</h1>
                    </div>
                </div>
                <div id="circle">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="300px" height="300px" viewBox="0 0 300 300" enable-background="new 0 0 300 300" xml:space="preserve">
                    <defs>
                    <path id="circlePath" d="M 150, 150 m -60, 0 a 60,60 0 0,1 120,0 a 60,60 0 0,1 -120,0 "/>
                    </defs>
                    <circle cx="150" cy="100" r="75" fill="none"/>
                    <g>
                    <use xlink:href="#circlePath" fill="none"/>
                    <text fill="#e7aca6">
                    <textPath xlink:href="#circlePath">p r o j e c t &nbsp; n e x t &nbsp; d o o r &nbsp;</textPath>
                    </text>
                    </g>
                    </svg>
                </div>
            </div>
        </main>
        <section id="section1" class="section ptb50 section-padding about-section" style="background: #d5cbcc;">
            <div class="container">
                <div class="header-style-1 wow fadeInDown">
                    <h1 class="text-center">About Project Next Door</h1>
                </div>
                <div class="row">
                    <div class="col-md-4 wow fadeInLeft">
                        <div class="box" style="background: url(img/bg/img-2.jpg);background-size: cover;">
                            <div class="content-overlay"></div>
                            <a href="empowering.php">
                                <div class="box-padding">
                                    <h1>Empowering</h1>
                                </div>
                                <div class="text-hover">
                                    <p>A brief<br/> introduction <br/>of this<br/> area.</p>
                                    <div class="door-img">
                                        <p style="font-size: 20px"><i class="fas fa-arrow-right"></i><a href="empowering.php"> Find Out More</a></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 wow zoomIn">
                        <div class="box" style="background: url(img/bg/img-3.jpg);background-size: cover;">
                            <div class="content-overlay"></div>
                            <a href="#">
                                <div class="box-padding">
                                    <h1>Engaging</h1>
                                </div>
                                <div class="text-hover">
                                    <p>A brief<br/> introduction <br/>of this<br/> area.</p>
                                    <div class="door-img">
                                        <p style="font-size: 20px"><i class="fas fa-arrow-right"></i><a href="#"> Find Out More</a></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 wow fadeInRight">
                        <div class="box" style="background: url(img/bg/img-1.jpg);background-size: cover;">
                            <div class="content-overlay"></div>
                            <a href="experiential.php">
                                <div class="box-padding">
                                    <h1 class="text-1">Experiential</h1>
                                </div>
                                <div class="text-hover">
                                    <p>A brief<br/> introduction <br/>of this<br/> area.</p>
                                    <div class="door-img">
                                        <p style="font-size: 20px"><i class="fas fa-arrow-right"></i><a href="#"> Find Out More</a></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="section2" class="section ptb50 " style="background: url(img/bg/02.jpg)no-repeat;background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="booking-form wow bounceInUp" style="margin-top: 100px;">
                            <h1 class="text-center wow bounceInDown">Book Your Space</h1>
                            <form id="contact" action="" method="post">
                                <div class="row">
                                    <!--                                        <div class="form-group" style="display: none;">
                                                                                <input type="text" name="name" placeholder="NAME" required />
                                                                            </div>-->
                                    <div class="form-group wow bounceInLeft">
                                        <input type="text" name="name" placeholder="NAME" required style='display: none;'/>
                                        <input type="text" name="name" placeholder="NAME" required />
                                    </div>
                                    <div class="form-group wow bounceInLeft">
                                        <input type="email" name="email" placeholder="EMAIL" required />
                                    </div>
                                    <div class="form-group wow bounceInLeft">
                                        <input type="text" name="number" placeholder="MOBILE NUMBER" required />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 table-section wow fadeInRight">
                                        <h5 style="line-height: 40px;">DECEMBER 27-JANUARY 19 
                                            <a>
                                                <i class="fas fa-angle-left cw"></i>
                                            </a>
                                            <a>
                                                <i class="fas fa-angle-right cw"></i>
                                            </a> 
                                        </h5>
                                        <div class="form-group">
                                            <label>I'M INTERESTED IN</label>
                                            <select class="ui dropdown">
                                                <option value="">Please Select</option>
                                                <option value="Rent our Space">Rent our Space</option>
                                                <option value="Book a Training Session">Book a Training Session</option>
                                            </select>
                                        </div>
                                        <div class="time">
                                            <div class="row">
                                                <select class="ui dropdown" style="margin-right: 10px;">
                                                    <option>Hours</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                                <select class="ui dropdown">
                                                    <option>Minutes</option>
                                                    <option value="05">05</option>
                                                    <option value="12">10</option>
                                                    <option value="13">15</option>
                                                    <option value="24">20</option>
                                                    <option value="25">25</option>
                                                    <option value="30">30</option>
                                                    <option value="35">35</option>
                                                    <option value="40">40</option>
                                                    <option value="45">45</option>
                                                    <option value="50">50</option>
                                                    <option value="55">55</option>
                                                    <option value="60">60</option>
                                                </select>
                                                <select class="ui dropdown">
                                                    <option value="AM">AM</option>
                                                    <option value="PM">PM</option>
                                                </select>
                                            </div>
                                            <div class="date-select">
                                                <p><input type='checkbox' name='checkbox' /><strong> SELECTED: </strong> 4/08/2019, 12:45PM.</p>
                                            </div>
                                            <div class="button-group">
                                                <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-cancel">Add</a>
                                                <a href="#" class="btn btn-ok">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 wow fadeInLeft">
                                        <article class="home-calendar">
                                            <div class="single"></div>
                                        </article>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <ul class="social-media">
                            <li class="wow fadeInleft">
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li class="wow fadeInleft">
                                <a href="#">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                            <li class="wow fadeInleft">
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section id="section3" class="section section-padding ptb50 about-section" style="background: url(img/bg/03.jpg)no-repeat;background-size: cover;">
            <div class="container">
                <div class="header-style-1 text-center">
                    <h1>Contact Us</h1>
                </div>
                <div class="row">
                    <div class="col-md-4 wow fadeInLeft">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.9544992786723!2d101.59787331464979!3d3.1067379977377474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4d6f2ebba175%3A0x8b633e7b44f03dc6!2sInfinity+Tower!5e0!3m2!1sen!2sin!4v1564835922110!5m2!1sen!2sin" style="width: 100%; height: 400px;" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div class="col-md-4 wow fadeInRight">
                        <div class="contact-bg">
                            <h3>Address</h3>
                            <br/>
                            <div class="contact-address">
                                <i class="fa fa-map-marker-alt"></i>
                                <p> Project Next Door, No. 16-05, Penthouse, menara Infiniti, Jalan SS6/3, 47301 Petaling Jaya, Selangor, Malaysia.</p><br/>
                                <i class="fa fa-envelope"></i>
                                <p><a href="#">&nbsp; email@mywebsite.com</a></p><br/>
                                <i class="fa fa-phone-alt"></i>
                                <p><a href="#">&nbsp; +630 7662 7601</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 wow fadeInRight">
                        <div class="contact-img">
                            <img src="img/contact-img.jpg" alt="contact-img" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer id="section4" class="section">
            <div class="text-center">
                <p>&copy; 2019 All Right Reserved | Project Next Door | Privacy Policy</p>
            </div>
        </footer>
    </body>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thank you for Booking with us.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><i>Our team will get in touch with you shortly.</i></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.plugin.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>

    <script src="js/banner.js" type="text/javascript"></script>
    <script src="js/menu.js" type="text/javascript"></script>
    <script src="js/all.min.js" type="text/javascript"></script>
    <script src="js/slick.js" type="text/javascript"></script>
    <script src="js/pickmeup.js" type="text/javascript"></script>
    <script src="js/demo.js" type="text/javascript"></script>
    <script src="js/wow-js.js" type="text/javascript"></script>
    <script src="js/wow.js" type="text/javascript"></script>
    <script type="text/javascript">
                        $('#myModal').on('shown.bs.modal', function () {
                            $('#myInput').trigger('focus')
                        })
    </script>
<!--    <script src="//cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js" type="text/javascript"></script>-->
<!--    <script src="js/fullpage.js" type="text/javascript"></script>-->
<!--    <script src="js/examples.js" type="text/javascript"></script>-->
<!--    <script src="js/jquery-ui.js" type="text/javascript"></script>-->
<!--    <script src="js/fontawesome.min.js" type="text/javascript"></script>-->
<!--    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript"></script>-->
<!--    <script type="text/javascript">
                            var myFullpage = new fullpage('#fullpage', {
                                //sectionsColor: ['#1bbc9b', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff'],
                                anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage', 'lastPage'],
                                menu: '#menu',
                                lazyLoad: true
                            });
    </script>-->
</html>