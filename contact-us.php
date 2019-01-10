<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php';
    $page = 'contact'; ?>

    <body>
        <div class="position">
            <div class="sub-banner" style="background: url(images/sub-banner/alias-about-bg.jpg) no-repeat;">
                <div class="container-fluid">
<?php include 'menu.php'; ?>
                    <div class="sub-banner-contant">
                        <h3>CONTACT US</h3>
                    </div>
                </div>
            </div>
        </div>
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