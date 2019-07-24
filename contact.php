<!DOCTYPE html>
<html lang="en">
    <?php
    $page = 'contact';
    include 'head.php';
    ?>
    <body>
        <!-- Preloader Starts -->
        <div class="preloader">
            <div class="spinner"></div>
        </div>
        <!-- Preloader End -->

        <!-- Header Area Starts -->
        <?php include 'head-menu.php'; ?>
        <!-- Header Area End -->

        <!-- Banner Area Starts -->
        <section class="banner-area other-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Contact Us</h1>
                        <a href="index.php">Home</a> <span>|</span> <a href="contact.php">Contact Us</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner Area End -->

        <!-- Map Area Starts -->
        <section class="map-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="mapBox" class="mapBox" 
                             data-lat="40.701083" 
                             data-lon="-74.1522848" 
                             data-zoom="13" 
                             data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia."
                             data-mlat="40.701083"
                             data-mlon="-74.1522848">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Map Area End -->


        <!-- Contact Form Starts -->
        <section class="contact-form section-padding3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 mb-5 mb-lg-0">
                        <div class="d-flex">
                            <div class="into-icon">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="info-text">
                                <h3>Selangor</h3>
                                <p>No. 16-10, Penthouse,</br>Menara Infiniti,</br>Jalan SS6/3,</br>47301 Petaling Jaya,</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="into-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="info-text">
                                <h3>+603 7662 7601</h3>
                                <h3>+6019 277 2077 (Hotline)</h3>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="into-icon">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <div class="info-text">
                                <h3>info@alias-innovation.com</h3>
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <form action="#">
                            <div class="left form-border">
                                <input type="text" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" required>
                                <input type="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" required>
                                <input type="text" placeholder="Enter subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'" required>
                            </div>
                            <div class="right">
                                <textarea name="message" cols="20" rows="7"  placeholder="Enter Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" required></textarea>
                            </div>
                            <button type="submit" class="template-btn">subscribe now</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Form End -->


        <!-- Footer Area Starts -->
        <?php include 'footer.php'; ?>
        <!-- Footer Area End -->


        <!-- Javascript -->
        <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
        <script src="assets/js/vendor/bootstrap-4.1.3.min.js"></script>
        <script src="assets/js/vendor/wow.min.js"></script>
        <script src="assets/js/vendor/owl-carousel.min.js"></script>
        <script src="assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
        <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
        <script src="assets/js/vendor/superfish.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I"></script>
        <script src="assets/js/vendor/gmaps.min.js"></script>
        <script src="assets/js/main.js"></script>



    </body>
</html>
