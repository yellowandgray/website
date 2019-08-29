<!doctype html>
<html lang="en">
    <?php
    $page = 'contact';
    include 'head.php';
    ?>
    <body>
        <div class="wrapper">
            <!--Header Start-->
            <?php include 'menu.php'; ?>
            <div id="search">
                <button type="button" class="close">×</button>
                <form class="search-overlay-form">
                    <input type="search" value="" placeholder="type keyword(s) here" />
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <!--Header End-->
            <!--Inner Header Start-->
            <section class="wf100 p100 inner-header" style="background: url(images/sub-banner/003.jpg) no-repeat; background-size: cover;">
                <div class="container">
                    <h1>Contact Us</h1>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#"> Contact Us </a></li>

                    </ul>
                </div>
            </section>
            <!--Inner Header End--> 
              <?php include 'enquiry.php'; ?>
            <!--Contact Start-->
            <section class="contact-page wf100 p80 pad-t-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-form">
                                <h3>Feel Free to Contact us</h3>
                                <ul class="cform">
                                    <li class="half pr-15">
                                        <input type="text" class="form-control" placeholder="Full Name">
                                    </li>
                                    <li class="half pl-15">
                                        <input type="text" class="form-control" placeholder="Email">
                                    </li>
                                    <li class="half pr-15">
                                        <input type="text" class="form-control" placeholder="Contact">
                                    </li>
                                    <li class="half pl-15">
                                        <input type="text" class="form-control" placeholder="Subject">
                                    </li>
                                    <li class="full">
                                        <textarea class="textarea-control" placeholder="Message"></textarea>
                                    </li>
                                    <li class="full">
                                        <input type="submit" value="Contact us" class="fsubmit">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="google-map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15555.994296236835!2d80.1675912197754!3d12.907812900000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x68c349a2637da354!2sYellow%20and%20Gray!5e0!3m2!1sen!2sin!4v1567058504566!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container contact-info">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Contact Information</h3>
                        </div>
                        <!--Contact Info Start-->
                        <div class="col-md-4">
                            <div class="c-info">
                                <h6>Address:</h6>
                                <p> 4700 Millenia Blvd # 175, Orlando, FL 32839, USA </p>
                            </div>
                        </div>
                        <!--Contact Info End--> 
                        <!--Contact Info Start-->
                        <div class="col-md-4">
                            <div class="c-info">
                                <h6>Contact:</h6>
                                <p><strong>Phone:</strong> +1 321 2345 678-9</p>
                                <p><strong>Fax:</strong> +1 321 2345 876-7</p>
                            </div>
                        </div>
                        <!--Contact Info End--> 
                        <!--Contact Info Start-->
                        <div class="col-md-4">
                            <div class="c-info">
                                <h6>For More Information:</h6>
                                <p><strong>Email:</strong> info@ecova.com</p>
                                <p>contact@ecova.com</p>
                            </div>
                        </div>
                        <!--Contact Info End--> 
                    </div>
                </div>
            </section>
            <!--Contact End--> 
            <!--Footer Start-->
            <?php include'footer.php'; ?>
            <!--Footer End--> 
        </div>

    </body>
</html>