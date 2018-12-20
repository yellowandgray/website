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
            <section class="wf100 p100 inner-header" style="background: url(images/sub-banner/banner-06.jpg) no-repeat;">
                <div class="container">
                    <h1>Contact Us</h1>
<!--                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#"> Contact </a></li>

                    </ul>-->
                </div>
            </section>
            <!--Inner Header End--> 
            <!--Contact Start-->
            <section class="contact-page wf100 p80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-form">
                                <h3>Feel Free to Contact us</h3>

                                <ul class="cform">
                                    <form action="contact-form.php" method="post" role="form" class="contact">
                                        <li class="half pr-15">
                                            <input type="text" class="form-control" name="name" placeholder="Full Name">
                                        </li>
                                        <li class="half pl-15">
                                            <input type="text" class="form-control" name="email" placeholder="Email">
                                        </li>
                                        <li class="half pr-15">
                                            <input type="text" class="form-control" name="mobile" placeholder="Contact">
                                        </li>
                                        <li class="half pl-15">
                                            <select name="no_children" class="form-control">
                                                <option value="0">No. of Children</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </li>
                                        <li class="half pr-15">
                                            <div class="multiselect">
                                                <select id="contactform" class="form-control" name="preffred_classes[]" multiple>
                                                    <option value="L.K.G">L.K.G</option>
                                                    <option value="I STD">I STD</option>
                                                    <option value="II STD">II STD</option>
                                                    <option value="III STD ">III STD </option>
                                                    <option value="IV STD">IV STD</option>
                                                    <option value="V STD">V STD</option>
                                                </select>

                                            </div>
                                        </li>
                                        <li class="half pl-15">
                                            <input type="text" class="form-control" name="subject" placeholder="Subject">
                                        </li>
                                        <li class="full">
                                            <textarea class="textarea-control" name="message" placeholder="Message"></textarea>
                                        </li>
                                        <li class="full">
                                            <input type="submit" value="Contact us" class="fsubmit">
                                        </li>
                                    </form>
                                </ul>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="google-map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3916.871315986748!2d79.77198353863045!3d10.973084525992892!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a551790bea57877%3A0x3e4682164fb32296!2sNedungadu+Commune+Panchayat+Office!5e0!3m2!1sen!2sin!4v1545066553240"></iframe>
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
                        <div class="col-md-4 text-right">
                            <div class="c-info">
                                <h6>Address:</h6>
                                <p>ENPEE International School.<br/> Château Français<br/>
                                    ENPEE Enclave, 241/2, Puthakudy Village,  <br/> 
                                    Vadamattam Main Road, <br/>
                                    Nedunkadu Panchayat, <br/>
                                    Karaikal – 609603, U.T of Puducherry
                                </p>
                            </div>
                        </div>
                        <!--Contact Info End--> 
                        <!--Contact Info Start-->
<!--                        <div class="col-md-4 text-right">
                            <div class="c-info">
                                <h6>Contact:</h6>
                                <p><strong>Phone:</strong> +91 93840 10241</p>
                                <p> +91 93840 10242</p>
                            </div>
                        </div>-->
                        <!--Contact Info End--> 
                        <!--Contact Info Start-->
                        <div class="col-md-4 text-right">
                            <div class="c-info">
                                <h6>For More Information:</h6>
                                <p><strong>Email:</strong><a href="mailto:info@enpeekl.com"> info@enpeekkl.com</a></p>
<!--                                <p><a href="mailto:admin@enpeekl.com">admin@enpeekkl.com</a></p>-->
                            </div>
                        </div>
                        <!--Contact Info End--> 
                    </div>
                </div>
            </section>
            <!--Contact End--> 
            <?php include 'footer.php'; ?>
            <script>
                $('#contactform').multiSelect({
                    noneText: 'Choose Your Program'});
            </script>
        </div>

    </body>
</html>
