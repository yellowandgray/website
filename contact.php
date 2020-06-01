<!DOCTYPE html>
<html lang="en">
    <?php include 'head_landing.php'; ?>
    <body>
        <div id="wrapper">
            <?php include 'menu_landing.php'; ?>
            <section class="contact-section-examhorse">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-section">
                                <div class="text-center contact-title">
                                    <h4>Contact Us</h4>
                                </div>
                                <form action="" method="post" role="form" class="contactForm">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label>Enter Your Name</label>
                                            <input type="text" name="name" class="form-control" id="name" placeholder="" />
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Enter Your Email</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="" />
                                        </div>
                                        <div class="col-md-12 margintop10 form-group">

                                            <label>Enter Your Message</label>
                                            <textarea class="form-control" name="message" rows="4" data-rule="required" placeholder=""></textarea>
                                            <br/>
                                            <p class="text-center">
                                                <button class="btn btn-custom" type="submit">Submit message</button>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 footer-para">
                            <p><span>Address: Company Name, Street, City, Pincode.</span><span>Tel. 98400-12345</span><span>Email. info@mysite.com</span></p>
                        </div>
                    </div>
                </div>
            </section>
            <?php include 'footer_landing.php'; ?>
        </div>
        <?php include 'landing_script.php'; ?>
    </body>

</html>
