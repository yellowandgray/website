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
            <?php include 'admission-content.php'; ?>
            <!--Contact Start-->
            <section class="contact-page wf100 p80">
                <div class="container contact-dropdown-from">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-form">
                                <h3>Feel Free to Contact us</h3>

                                <ul class="cform">
                                    <form role="form" class="contact">
                                        <div class="form-group">
                                            <li class="half pr-15">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
                                            </li>
                                        </div>
                                        <div class="form-group">
                                            <li class="half pl-15">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                            </li>
                                        </div>
                                        <div class="form-group">
                                            <li class="half pr-15">
                                                <input type="text" pattern="^\d{10}$" id="mobile" class="form-control" name="mobile" placeholder="Contact Number" required>
                                            </li>
                                        </div>
                                        <div class="form-group">
                                            <li class="half pl-15">
                                                <select name="no_children" class="form-control" id="no_children">
                                                    <option value="0">No. of Children</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </li>
                                        </div>
                                        <div class="form-group">
                                            <li class="half pr-15">
                                                <div class="multiselect">
                                                    <select id="contactform" class="form-control" name="preffred_classes[]" multiple>
                                                        <option value="L.K.G">Pre-KG</option>
                                                        <option value="L.K.G">LKG</option>
                                                        <option value="L.K.G">UKG</option>
                                                        <option value="I STD">I STD</option>
                                                        <option value="II STD">II STD</option>
                                                        <option value="III STD ">III STD </option>
                                                        <option value="IV STD">IV STD</option>
                                                        <option value="V STD">V STD</option>
                                                    </select>
                                                </div>
                                            </li>
                                        </div>
                                        <div class="form-group">
                                            <li class="half pl-15">
                                                <input type="text" id="subject" class="form-control" name="subject" placeholder="Subject">
                                            </li>
                                        </div>
                                        <div class="form-group">
                                            <li class="full">
                                                <select name="social_media" class="form-control" id="social_media">
                                                    <option value="">How did you here about us?</option>
                                                    <option value="Facebook">Facebook</option>
                                                    <option value="Linked-In">Linked-In</option>
                                                    <option value="YouTube">YouTube</option>
                                                    <option value="Google Search">Google Search</option>
                                                    <option value="SMS">SMS</option>
                                                    <option value="Whatsapp">Whatsapp</option>
                                                    <option value="TV">TV</option>
                                                    <option value="Other Reference">Other Reference</option>
                                                </select>
                                            </li>
                                        </div>
                                        <div class="form-group">
                                            <li class="full">
                                                <textarea class="textarea-control" id="message" name="message" placeholder="Message" required></textarea>
                                            </li>
                                        </div>
                                        <li class="full">
                                            <input type="submit" value="Submit" class="fsubmit" onClick="clearform();">
                                        </li>
                                    </form>
                                </ul>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="google-map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3916.8763041920433!2d79.77225501469684!3d10.972708192188481!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5517ec11543567%3A0x128f69355cf8a645!2sENPEE+International+School!5e0!3m2!1sen!2sin!4v1545316033083"></iframe>
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
                                <p><strong>ENPEE International School</strong><br/> <i class="light-green">Château Français</i><br/>
                                    ENPEE Enclave, 241/2, Puthakudy Village,  <br/> 
                                    Vadamattam Main Road, Nedungadu Panchayat, <br/>
                                    Karaikal – 609603. U.T of Puducherry
                                </p>
                            </div>
                        </div>
                        <!--Contact Info End--> 
                        <!--Contact Info Start-->
                        <div class="col-md-4 text-right">
                            <div class="c-info">
                                <h6>Contact:</h6>
                                <p><strong>Telephone:</strong><a href="tel:04368 265 265"> 04368 265 265</a></p>
                                <p><strong>Phone:</strong><a href="tel:+91 8300111265"> +91 8300 111 265</a></p>
                            </div>
                        </div>
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

//                function clearform()
//                {
//                    document.getElementById("name").value = ""; //don't forget to set the textbox id
//                    document.getElementById("email").value = "";
//                    document.getElementById("mobile").value = "";
//                    document.getElementById("no_children").value = "";
//                    document.getElementById("contactform").value = "";
//                    document.getElementById("subject").value = "";
//                    document.getElementById("social_media").value = "";
//                    document.getElementById("message").value = "";
//                }
            </script>
        </div>

    </body>
</html>
