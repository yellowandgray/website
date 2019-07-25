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
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.997825985159!2d101.61424631470493!3d3.0952363543450017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4bc8a054a701%3A0x60671c5f314125b8!2sAlias+Innovation+Sdn+Bhd!5e0!3m2!1sen!2sin!4v1564034857216!5m2!1sen!2sin" frameborder="0" style="border:0; width: 100%; height: 450px;" allowfullscreen></iframe>
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
                        <form role="form" class="contact">
                            <div class="left form-border">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" name="name"required>
                                </div>
                                <div class="form-group">
                                    <input type="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" name="email"required>
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'"  name="subject"required>
                                </div>
                            </div>
                            <div class="right form-group">
                                <textarea class="form-group"  name="message" cols="20" rows="7"  placeholder="Enter Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" name="message" required></textarea>
                            </div>
                            <input type="submit" value="Submit" class="template-btn">
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
        <script src="assets/js/contactform.js" type="text/javascript"></script>
        <script src="assets/js/sweetalert.min.js" type="text/javascript"></script>



    </body>
</html>
