<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; $page = 'contact'; ?>

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