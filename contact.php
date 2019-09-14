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
            <section class="wf100 p100 inner-header" style="background: url(images/sub-banner/007.jpg) no-repeat; background-size: cover;">
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
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8070936222825!2d103.84724451482474!3d1.2900142621239516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da19a0958fa7c5%3A0xdb448acbe7279ed4!2s1%20North%20Bridge%20Rd%2C%20High%20Street%20Centre%2C%20Singapore%20179094!5e0!3m2!1sen!2sin!4v1567488918512!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container contact-info">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="">
                                <h3>Contact Information</h3>
                            </div>
                        </div>
                        <div class="col-md-12 contact">
                            <div class="c-info contact-1">
                                <h6>Address:</h6>
                                <p> NO.1, North Bridge Road, #07-10 High Street Center, Singapore</p>
                            </div>
                            <!--Contact Info End--> 
                            <!--Contact Info Start-->
                            <div class="c-info  contact-1">
                                <h6>Contact:</h6>
                                <p><strong>Phone:</strong> +65 9481 9943</p>
                                <p><strong>Fax:</strong> +65 6338 9174</p>
                            </div>
                            <!--Contact Info End--> 
                            <!--Contact Info Start-->
                            <div class="c-info  contact-1">
                                <h6>For More Information:</h6>
                                <p><strong>Email:</strong>sales@vpnc.com.sg </p>
                                <p></p>
                            </div>
                            <!--Contact Info End--> 
                        </div>
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