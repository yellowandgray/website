<!DOCTYPE html>
<html>
    <head>
        <title>Project Next Door</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="css/fontawesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/all.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/pickmeup.css" rel="stylesheet" type="text/css"/>
        <link href="css/demo.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main id="banner" class="banner-section" style="background: #006666;">
            <header>
                <div id="myNav" class="overlay">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <div class="overlay-content">
                        <a href="#banner">Home</a>
                        <a href="#about">About</a>
                        <a href="#services">Services</a>
                        <a href="#contact">Contact</a>
                    </div>
                </div>
                <span class="menu-nav" onclick="openNav()">&#9776;</span>
                <div class="logo">
                    <img src="img/logo.png" alt="Project Next Door Logo" />
                </div>
            </header>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 banner-text">
                        <!--                        <h3>One Stop Innovation & Knowledge</h3>-->
                        <h1>TAGLINE.</h1>
<!--                        <p>HRDF Registered</p>-->
                        <!--                        <div class="">
                                                    <a href="#" type="button" class="button"><span>Find Out More</span></a>
                                                    <a href="#" type="button" class="button"><span>Join Us Now</span></a>
                                                </div>-->
                    </div>
                    <div class="col-md-8">
                        <!-- Slideshow container -->
                        <div class="slideshow-container">

                            <!-- Full-width images with number and caption text -->
                            <div class="mySlides fade">
                                <!--                                <div class="numbertext">1 / 3</div>-->
                                <img src="img/banner.jpg" style="width:100%">
                                <!--                                <div class="text">Caption Text</div>-->
                            </div>

                            <div class="mySlides fade">
                                <!--                                <div class="numbertext">2 / 3</div>-->
                                <img src="img/banner-1.jpg" style="width:100%">
                                <!--                                <div class="text">Caption Two</div>-->
                            </div>

                            <div class="mySlides fade">
                                <!--                                <div class="numbertext">3 / 3</div>-->
                                <img src="img/banner-2.jpg" style="width:100%">
                                <!--                                <div class="text">Caption Three</div>-->
                            </div>

                            <!-- Next and previous buttons -->
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                        </div>
                        <br>

                        <!-- The dots/circles -->
                        <div style="text-align:center">
                            <span class="dot" onclick="currentSlide(1)"></span> 
                            <span class="dot" onclick="currentSlide(2)"></span> 
                            <span class="dot" onclick="currentSlide(3)"></span> 
                        </div>

                        <!--                        <div id="slidy-container">
                                                    <figure id="slidy">
                                                        <img src="" alt="banner" >
                                                        <img src="img/banner-1.jpg" alt="banner" >
                                                        <img src="img/banner-2.jpg" alt="banner" >
                                                    </figure>
                                                </div>-->
                    </div>
                </div>
            </div>
        </main>
        <section id="about" class="section-padding about-section">
            <div class="container">
                <div class="header-style-1">
                    <h1>About Project Next Door</h1>
<!--                    <p>test</p>-->
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="box-1">
                            <div class="content-overlay"></div>
                            <div class="box-padding">
                                <h1 class="text-1">Experiential</h1>
                            </div>
                            <div class="text-hover">
                                <p>A brief<br/> introduction <br/>of this<br/> area.</p>
                                <div class="door-img">
                                    <img src="img/door.png" alt="" /><p style="font-size: 15px"><a href="#">Find Out More</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-2">
                            <div class="content-overlay"></div>
                            <div class="box-padding">
                                <h1>Empowering</h1>
                            </div>
                            <div class="text-hover">
                                <p>A brief<br/> introduction <br/>of this<br/> area.</p>
                                <div class="door-img">
                                    <img src="img/door.png" alt="" /><p style="font-size: 15px"><a href="#">Find Out More</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-3">
                            <div class="content-overlay"></div>
                            <div class="box-padding">
                                <h1>Engaging</h1>
                            </div>
                            <div class="text-hover">
                                <p>A brief<br/> introduction <br/>of this<br/> area.</p>
                                <div class="door-img">
                                    <img src="img/door.png" alt="" /><p style="font-size: 15px"><a href="#">Find Out More</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="services" class="about-section " style="background: url(img/bg-calendar.png)no-repeat;background-position: top;padding: 30px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="booking-form" style="margin-top: 100px;">
                            <h1 class="text-center">Book Your Space</h1>
                            <form id="contact" action="" method="post">
                                <div class="row">
                                    <div class="form-group" style="display: none;">
                                        <input type="text" name="name" placeholder="NAME" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="NAME" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="EMAIL" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="number" placeholder="MOBILE NUMBER" required />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <article>
                                            <div class="one-calendars"></div>
                                        </article>
                                    </div>
                                    <div class="form-group">
                                        <article>
                                            <div class="two-calendars"></div>
                                        </article>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="date-select">
                                        <p><strong>SELECTED: </strong> 4/08/2019, 12:45pm to 12/08/2019</p>
                                    </div>
                                    <div class="button-group">
                                        <a href="#" class="btn btn-cancel">Cancel</a>
                                        <a href="#" class="btn btn-ok">Add</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <ul class="social-media">
                            <li>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section id="contact" class="section-padding about-section" style="background: #eee;">
            <div class="container">
                <div class="header-style-1">
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.9544992786723!2d101.59787331464979!3d3.1067379977377474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4d6f2ebba175%3A0x8b633e7b44f03dc6!2sInfinity+Tower!5e0!3m2!1sen!2sin!4v1564835922110!5m2!1sen!2sin" style="width: 100%; height: 400px;" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-bg">
<!--                            <h3>Contact Address</h3>-->
                            <div class="contact-address">
                                <i class="fa fa-map-marker-alt"></i>
                                <p>Project Next Door, No. 16-05, Penthouse, menara Infiniti, Jalan SS6/3, 47301 Petaling Jaya, Selangor, Malaysia.</p>
                                <i class="fa fa-envelope"></i>
                                <p><a href="#">email@mywebsite.com</a></p>
                                <i class="fa fa-phone-alt"></i>
                                <p><a href="#">+630 7662 7601</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <div class="text-center">
                <p>&copy; 2019 Allright Reserved | Project Next Door | Privacy Policy</p>
            </div>
        </footer>
    </body>
    <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.plugin.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/all.min.js" type="text/javascript"></script>
    <script src="js/fontawesome.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui.js" type="text/javascript"></script>
    <script src="js/pickmeup.js" type="text/javascript"></script>
    <script src="js/demo.js" type="text/javascript"></script>
    <script>
                                function openNav() {
                                    document.getElementById("myNav").style.width = "20%";
                                }

                                function closeNav() {
                                    document.getElementById("myNav").style.width = "0%";
                                }
    </script>
    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
    </script>
    <script>
        webshim.setOptions('forms-ext', {
            replaceUI: 'auto',
            types: 'date',
            date: {
                startView: 2,
                inlinePicker: true,
                classes: 'hide-inputbtns'
            }
        });
        webshim.setOptions('forms', {
            lazyCustomMessages: true
        });
//start polyfilling
        webshim.polyfill('forms forms-ext');

//only last example using format display
        $(function () {
            $('.format-date').each(function () {
                var $display = $('.date-display', this);
                $(this).on('change', function (e) {
                    //webshim.format will automatically format date to according to webshim.activeLang or the browsers locale
                    var localizedDate = webshim.format.date($.prop(e.target, 'value'));
                    $display.html(localizedDate);
                });
            });
        });
    </script>
</html>