<!DOCTYPE HTML>
<html lang="zxx">
    <?php include 'head.php'; ?>
    <body data-spy="scroll" data-target=".header" data-offset="50">
        <!-- Page loader -->
        <div id="preloader"></div>
        <!-- about section start -->
        <section class="about-area ptb-90" style="background-image: url(assets/img/login-background.jpg);background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="single-about-box active">
                            <div class="sec-title">
                                <h2><a href="index"><img src="assets/img/logo1.png" alt="logo" /></a><span class="sec-title-border"><span></span><span></span><span></span></span></h2>
                            </div>
                            <section class="customer-logos slider">
                                <div class="slide"><img src="assets/img/main-page-image/christlink-slider/001.png" alt="slider-1"></div>
                                <div class="slide"><img src="assets/img/main-page-image/christlink-slider/002.png" alt="slider-2"></div>
                                <div class="slide"><img src="assets/img/main-page-image/christlink-slider/003.png" alt="slider-3"></div>
                                <div class="slide"><img src="assets/img/main-page-image/christlink-slider/004.png" alt="slider-4"></div>
                                <div class="slide"><img src="assets/img/main-page-image/christlink-slider/005.png" alt="slider-5"></div>
                            </section>
                            <p>A mobile application providing a safe and secure platform for Christians to be enriched by one another within the support of the Local church and the global community of believers.</p>
                            <a href="christlink/index" class="appao-btn appao-btn2">See More</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-about-box active">
                            <div class="sec-title">
                                <h2><a href="index"><img src="assets/img/churchlink-logo.png" alt="logo" /></a><span class="sec-title-border"><span></span><span></span><span></span></span></h2>
                            </div>
                            <section class="customer-logos slider church-link-img">
                                <div class="slide">
                                    <img src="assets/img/main-page-image/churchlink-slider/001.jpg" alt="slider-1">
                                </div>
                                <div class="slide">
                                    <img src="assets/img/main-page-image/churchlink-slider/002.jpg" alt="slider-2">
                                </div>
                                <div class="slide">
                                    <img src="assets/img/main-page-image/churchlink-slider/003.jpg" alt="slider-3">
                                </div>
                                <div class="slide">
                                    <img src="assets/img/main-page-image/churchlink-slider/004.jpg" alt="slider-4">
                                </div>
                            </section>
                            <p>A web application providing a safe and secure connection between the church and the members. This web application enables the church to have a complete control and manage the entire activities.</p>
                            <a href="churchlink/index" class="appao-btn appao-btn2">See More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- about section end -->
        <!-- jquery main JS -->
        <script src="assets/js/jquery.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- Slick nav JS -->
        <script src="assets/js/jquery.slicknav.min.js"></script>
        <!-- Slick JS -->
        <script src="assets/js/slick.min.js"></script>
        <!-- owl carousel JS -->
        <script src="assets/js/owl.carousel.min.js"></script>
        <!-- Popup JS -->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <!-- Counter JS -->
        <script src="assets/js/jquery.counterup.min.js"></script>
        <!-- Counterup waypoints JS -->
        <script src="assets/js/waypoints.min.js"></script>
        <!-- YTPlayer JS -->
        <script src="assets/js/jquery.mb.YTPlayer.min.js"></script>
        <!-- jQuery Easing JS -->
        <script src="assets/js/jquery.easing.1.3.js"></script>
        <!-- Gmap JS -->
        <script src="assets/js/gmap3.min.js"></script>
        <!-- Google map api -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnKyOpsNq-vWYtrwayN3BkF3b4k3O9A_A"></script>
        <!-- Custom map JS -->
        <script src="assets/js/custom-map.js"></script>
        <!-- WOW JS -->
        <script src="assets/js/wow-1.3.0.min.js"></script>
        <!-- Switcher JS -->
        <script src="assets/js/switcher.js"></script>
        <!-- main JS -->
        <script src="assets/js/main.js"></script>
        <script>
            $(document).ready(function () {
                $('.customer-logos').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 4000,
                    arrows: false,
                    dots: false,
                    pauseOnHover: false,
                    responsive: [{
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1
                            }
                        }, {
                            breakpoint: 520,
                            settings: {
                                slidesToShow: 1
                            }
                        }]
                });
            });
        </script>
    </body>
</html>