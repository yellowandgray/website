<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <div class="super_container">
            <!-- Header -->
            <?php include 'menu.php'; ?>
            <!-- Menu -->
            <?php include 'mobile-menu.php'; ?>
            <div class="prlx_parent" style="height: 110px;background: #3f1a56;width: 100%;">
            </div>

            <div class="features">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="text-bg-1 wow fadeInUp contact-form starthere-form" style="width: 80%; margin: 0 auto;">
                                <h2 class="text-center">Opportunity Call Application</h2>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>First Name</label>
                                        <input type="text" name="fname" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="lname" required> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Linkedin Page</label>
                                        <input type="text" name="linkdin" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Business Name</label>
                                        <input type="text" name="business-name" required> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Business URL (Including http://)</label>
                                    <input type="text" name="business-url" required > 
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone" required> 
                                </div>
                                <div class="form-group">
                                    <label>Were you referred to us by one of our clients? If so, please type their full name below.</label>
                                    <input type="text" name="their-full-name" required> 
                                </div>
                                <div class="form-group">
                                    <label>Otherwise, how did you learn about Cheryl P Pinto?</label>
                                    <textarea type="text" name="about-cheryl" class="req" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Please tell us about the current area you wish to make great. Where do you find that you are not doing the best that you can do? Where do you want to be? What do you want to be doing?</label>
                                    <textarea type="text" name="about-current" class="req" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>What opportunities and/or challenges are you currently facing that keep you from moving forward? </label>
                                    <textarea type="text" name="challenges" class="req" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>What would you most like to change about your life? </label>
                                    <textarea type="text" name="about-life" class="req" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>How quickly (or not) would you like to change your life? And why?</label>
                                    <textarea type="text" name="quickly" class="req" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>What specifically appeals to you about working with Cheryl P Pinto?</label>
                                    <textarea type="text" name="specifically" class="req" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>RIGHT NOW I...</label><br/>
                                    <input type="checkbox" name="" value="Have the financial resources to invest in transforming myself "> Have the financial resources to invest in transforming myself <br/>
                                    <input type="checkbox" name="" value="Have access to the financial resources to invest in transforming myself. "> Have access to the financial resources to invest in transforming myself. <br/>
                                    <input type="checkbox" name="" value="I do not have any financial resources at all and I am going to keep the state of my life exactly as it is. "> I do not have any financial resources at all and I am going to keep the state of my life exactly as it is.
                                </div>
                                <div class="form-group">
                                    <br/>
                                    <br/>
                                    <label>How would you like us to connect back with you to schedule your call/ meeting with Cheryl P Pinto</label><br/>
                                    <input type="checkbox" name="" value="Phone call"> Phone call <br/>
                                    <input type="checkbox" name="" value="WhatsApp "> WhatsApp <br/>
                                    <input type="checkbox" name="" value="Email "> Email<br/>
                                    <input type="checkbox" name="" value="Other (please specify) "> Other (please specify)<br/>
                                </div>
                                <div class="form-group">
                                    <br/>
                                    <label>Finally, on a scale of 1 to 10, how passionately do you approach life? :</label>
                                    <input type="text" name="finally" />
                                </div>
                                <div class="g-recaptcha" data-sitekey="6Ld9YaMUAAAAAG1qHv8gS4Lj3QTKHfz2IcfBwBUJ"></div>
                                <button type="submit" class="button-1"><span class="color-w">Submit</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>
    <?php include 'footer.php'; ?>
</html>