<!DOCTYPE html>
<html>
    <?php $page = 'contact';
    include 'head.php'; ?>
    <body>
<?php include 'menu.php'; ?>
        <div class="sub-banner-section">
            <div class="container sub-banner-content">
                <h3>Contact Us</h3>
            </div>
        </div>
        <section class="certificate-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 quick-form">
                        <div class="enquiry-form">
                            <h3>Contact Us</h3>
                            <form>
                                <div class="form-group">
                                    <input name="name" class="form-control" type="text"  placeholder="Enter your Name" />
                                </div>
                                <div class="form-group">
                                    <input name="email" class="form-control" type="email"  placeholder="Enter your Email" />
                                </div>
                                <div class="form-group">
                                    <select class="form-control">
                                        <option value="0">Select Subject</option>
                                        <option value="General Engineering Contractor">General Engineering Contractor</option>
                                        <option value="Building Maintenance">Building Maintenance</option>
                                        <option value="Air-conditioning System">Air-conditioning System</option>
                                        <option value="Mechanical & Electrical Services">Mechanical & Electrical Services</option>
                                        <option value="Electrical and Piping Works">Electrical and Piping Works</option>
                                        <option value="Internet of Things & CAD Drafting">Internet of Things & CAD Drafting</option>
                                    </select>
                                </div>
                                <!--                                <div class="form-group">
                                                                    <input name="subject" class="form-control" type="text"  placeholder="Enter Subject" />
                                                                </div>-->
                                <div class="form-group">
                                    <textarea name="description" rows="6" class="form-control" type="text"  placeholder="Enter Your Commant"></textarea>
                                </div>
                                <a href="#" class="btn btn-primary">Submit</a>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 contact-section">
                        <div class="certificate-title">
                            <h3>Get in Touch!</h3>
                        </div>
                        <div class="text-center parent-content">
                            <h5>Dear Client & Partners,</h5>
                            <p>Whether you need preventive maintenance in any category - We at SPRING UNITED PTE LTD cater to and are committed to service your needs.</p>
<!--                            <a href="#">Tel: +65 6898 0628</a> | <a href="#">Email: sales@everestscaffolding.com,sg</a>-->
                        </div>
                        <div class="contact-address">
                            <ul>
                                <li><strong>Office Address:</strong></li>
                                <li>ARK @Gambas,</li>
                                <li>Sembawang</li>
                                <li>#09-43</li>
                                <li>Singapore-758077</li>
                            </ul>
                            <ul class="contact-icon">
                                <li><i class="fa fa-calendar"></i> Incorporation 09-02-2012</li>
                                <li><i class="fa fa-phone"></i> <a href="tel: 66672640">66672640</a></li>
                                <li><i class="fa fa-envelope"></i> <a href="mailto: admin@springunited.sg">admin@springunited.sg</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php include 'footer.php'; ?>
        <script type="text/javascript">
            
            $(document).ready(function () {
                $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function () {
                    $(this).toggleClass('open');
                });
            }
            );



            $(document).ready(function () {
                $("#nav-icon1").click(function () {
                    $(".mob-nav-bar").toggle();
                });
            });
        </script>
    </body>
</html>