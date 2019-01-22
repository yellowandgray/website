<!doctype html>
<html lang="en">
    <?php
    $page = 'career';
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
                    <h1>We are Hiring</h1>
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
                        <div class="col-md-12">
                            <div class="contact-form">
                                <h3>WE ARE HIRING</h3>
                                <p>(Join us and get immerse yourself in a care taking and professional environment. Enpee International School hiring now for Admin Staff, Front Office Staff and Teachers. Interested candidates can fill the below form and attach resume and apply.)</p>
                                <ul class="cform">
                                    <form role="form" class="career" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <li class="half pr-15">
                                                <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                                            </li>
                                        </div>
                                        <div class="form-group">
                                            <li class="half pl-15">
                                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                                            </li>
                                        </div>
                                        <div class="form-group">
                                            <li class="half pr-15">
                                                <input type="text" pattern="^\d{10}$" class="form-control" name="mobile" placeholder="Contact Number" required>
                                            </li>
                                        </div>
                                        <div class="form-group">
                                            <li class="half pl-15">
                                                <select name="select_role" class="form-control">
                                                    <option value="Select Job Role">Select Job Role</option>
                                                    <option value="Admin Manager">Admin Manager</option>
                                                    <option value="Front Office Staff">Front Office staff</option>
                                                    <option value="Teacher">Teacher</option>
                                                </select>
                                            </li>
                                        </div>
                                        <div class="form-group">
                                            <li class="half pr-15">
                                                <input type="text" class="form-control" name="address_1" placeholder="Address-1" required>
                                                <!--                                                <div class="multiselect">
                                                                                                    <select id="contactform" class="form-control" name="preffred_classes[]" multiple required>
                                                                                                        <option value="L.K.G">Pre-KG</option>
                                                                                                        <option value="L.K.G">LKG</option>
                                                                                                        <option value="L.K.G">UKG</option>
                                                                                                        <option value="I STD">I STD</option>
                                                                                                        <option value="II STD">II STD</option>
                                                                                                        <option value="III STD ">III STD </option>
                                                                                                        <option value="IV STD">IV STD</option>
                                                                                                        <option value="V STD">V STD</option>
                                                                                                    </select>
                                                
                                                                                                </div>-->
                                            </li>
                                        </div>
                                        <div class="form-group">
                                            <li class="half pl-15">
                                                <input type="text" class="form-control" name="address_2" placeholder="Address-2" required>
                                            </li>
                                        </div>
                                        <div class="form-group">
                                            <li class="full">
                                                <select name="social_media" class="form-control">
                                                    <option value="0">How did you here about us?</option>
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
                                                <textarea class="textarea-control" name="message" placeholder="Message" required></textarea>
                                            </li>
                                        </div>
                                        <div class="form-group">
                                            <li class="full">
                                                Submit Your CV / Resume: <input type="file" name="resume" id="resume">
                                            </li>
                                        </div>
                                        <li class="full">
                                            <input type="submit" value="Submit" class="fsubmit btn-primary" style="width: 200px;">
                                        </li>
                                    </form>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <!--                <div class="container contact-info">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Contact Information</h3>
                                        </div>
                                        Contact Info Start
                                        <div class="col-md-4 text-right">
                                            <div class="c-info">
                                                <h6>Address:</h6>
                                                <p><strong>ENPEE International School</strong><br/> <i>Château Français</i><br/>
                                                    ENPEE Enclave, 241/2, Puthakudy Village,  <br/> 
                                                    Vadamattam Main Road, Nedunkadu Panchayat, <br/>
                                                    Karaikal – 609603, U.T of Puducherry
                                                </p>
                                            </div>
                                        </div>
                                        Contact Info End 
                                        Contact Info Start
                                        <div class="col-md-4 text-right">
                                            <div class="c-info">
                                                <h6>Contact:</h6>
                                                <p><strong>Telephone:</strong><a href="tel:04368 265 265"> 04368 265 265</a></p>
                                                <p><strong>Phone:</strong><a href="tel:+91 8300111265"> +91 8300 111 265</a></p>
                                            </div>
                                        </div>
                                        Contact Info End 
                                        Contact Info Start
                                        <div class="col-md-4 text-right">
                                            <div class="c-info">
                                                <h6>For More Information:</h6>
                                                <p><strong>Email:</strong><a href="mailto:info@enpeekl.com"> info@enpeekkl.com</a></p>
                                                <p><a href="mailto:admin@enpeekl.com">admin@enpeekkl.com</a></p>
                                            </div>
                                        </div>
                                        Contact Info End 
                                    </div>
                                </div>-->
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
