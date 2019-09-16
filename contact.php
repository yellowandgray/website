<!DOCTYPE html>
<html lang="en">
    <?php
    include 'head.php';
    $page = 'contact';
    ?>
    <body>
        <?php include 'side-icon.php'; ?>
        <div class="super_container">
            <!-- Header -->
            <?php include 'menu.php'; ?>
            <!-- Menu -->
            <?php include 'mobile-menu.php'; ?>
            <!-- Hero Slider -->
            <div class="prlx_parent" style="height: 110px;background: #3f1a56;width: 100%;">
            </div>
            <!-- Features -->
            <div class="features">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 text-center section_title section_title_dark wow fadeInDown">
                            <h2>Welcome. How may we help you?</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 wow fadeInUp">
                            <h3><i class="fa fa-check color-pink"></i> To book a <strong class="color-pink">one-to-one Coaching session,</strong> please <button class="button-1"><span><a href="opportunity-call-application" class="color-w">START HERE</a></span></button></h3>
                            <br/>
                            <h3><i class="fa fa-check color-pink"></i> For <strong class="color-pink">Interviews, Speaking Engagements or Corporate Trainings,</strong> please email <a href="mailto:cheryl@cherylppinto.com">Cheryl@cherylppinto.com</a></h3>
                            <br/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="contact-form">
                                <form class="contact text-bg-1 wow fadeInUp">
                                    <h3 class="text-center">For all other enquiries, please use the form below</h3>
                                    <hr>
                                    <div class="form-group">
                                        <input type="text" name="fname" placeholder="First Name" required >
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="lname" placeholder="Last Name" required > 
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Email Address" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" placeholder="Phone Number" required> 
                                    </div>
                                    <div class="form-group">
                                        <label>How would you like to be contacted?</label>
                                        <select  name="no_children">
                                            <option value="Call">Call</option>
                                            <option value="Email">Email</option>
                                            <option value="Whatsapp">Whatsapp</option>
                                        </select>
                                    </div>
                                    <br/>
                                    <!--                                <textarea type="text" name="requirement" placeholder="How can I help you?" class="req" required></textarea>-->
                                    <div class="form-group">
                                        <textarea type="text" name="requirement" placeholder="Comment" class="req" required></textarea>
                                    </div>
                                    <div class="g-recaptcha" data-sitekey="6Ld9YaMUAAAAAG1qHv8gS4Lj3QTKHfz2IcfBwBUJ"></div>
                                    <div class="form-group">
                                        <button type="submit" class="button-1"><span class="color-w">Submit</span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-details-1 con-img wow fadeInRight">
                                <img src="images/contact-img.jpg" alt="" >
                            </div>
                            <div class="contact-details footer-p wow fadeInUp">
                                <!--                                <h2 class="text-center">Say Hello!</h2>
                                                                <hr>-->
<!--                                <p><i class="fas fa-phone"></i> : <a href="tel:+971-50-79-89-121">+971 50 79 89 121</a></p>-->
                                <p><i class="fas fa-envelope-square"></i> : <a href="mailto:info@cherylppinto.com">info@cherylppinto.com</a></p>
                                <p><i class="fas fa-globe"></i> : <a href="http://cherylppinto.com/">www.cherylppinto.com</a></p>
                            </div>
                            <div class="contact-details wow fadeInUp">
                                <h4 class="font-20"><i>Don't keep us a SECRET, share with your family and friends!</i></h4><br>
                                <h4 class="font-20"><i>Choose your way to stay connected – click your favorite icon below and let’s connect, share and grow!</i></h4>
                                <hr>
                                <ul class="footer_social social-icon">
                                    <li>
                                        <a href="https://www.facebook.com/Cherylppinto/" target="blank">
                                            <i class="fab fa-facebook-f trans_300"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/cherylppinto/" target="blank">
                                            <i class="fab fa-instagram trans_300"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/cherylppinto" target="blank">
                                            <i class="fab fa-twitter trans_300"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://in.pinterest.com/cherylppinto/" target="blank">
                                            <i class="fab fa-pinterest trans_300"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/in/cherylppinto/" target="blank">
                                            <i class="fab fa-linkedin-in trans_300"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.youtube.com/channel/UC_RvcECAMTKuOcVfIU93Dwg?view_as=subscriber" target="blank">
                                            <i class="fab fa-youtube trans_300"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10913658.061977062!2d-110.67475651911568!3d54.7269841774671!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4b0d03d337cc6ad9%3A0x9968b72aa2438fa5!2sCanada!5e0!3m2!1sen!2sin!4v1557815827847!5m2!1sen!2sin" height="400" frameborder="0" style="border:0;width: 100%;" allowfullscreen></iframe>
            </div>

            <?php include 'join-our-community.php'; ?>
            <!-- Footer -->
            <?php include 'footer.php'; ?>
        </div>
    </body>
</html>
