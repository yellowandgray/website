<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'head_landing.php'; ?>
    <body>
        <div id="wrapper">
            <?php include 'menu_landing.php'; ?>
            <section class="contact-section-examhorse">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-form">
                                <h3>Contact Us</h3>
                                <span>Get in touch</span>
                                <br/>
                                <form class="contact" onsubmit="return ContactForm(event);">
                                    <div class="input-group">
                                        <input type="text" name="name" class="form-control" id="name" class="" Placeholder="Name" required />
                                    </div>
                                    <div class="input-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email" required>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" name="subject" class="form-control" id="subject" class="" Placeholder="Subject" required />
                                    </div>
                                    <div class="input-group">
                                        <textarea type="text" name="description" class="form-control" id="description" rows="5" class="" Placeholder="Message"  required ></textarea>
                                    </div>
                                    <br/>
                                    <div class="input-group">
                                        <div class="g-recaptcha" data-sitekey="6Lf6LaMZAAAAAHnZx0J7Pab-7KRSZy7fzv7f76_W" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                                    </div>
                                    <br/>
                                    <button type="submit" class="btn btn-blue">Send</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-content">
                                <span>SAY HELLO</span>
                                <h3>Send us an email</h3>
                                <img src="img/email-bg-01.jpg" /><br>
                                <p>ExamHorse offers support 7 days a week. We particularly like email feedback and answer each one personally. Email us below and you will receive a response within 24 hours</p>
                                <div class="call-as-now">
                                    <ul>
                                        <li><img src="img/email.png" alt="Email"/> <span>support@examhorse.com</span></li>
                                    </ul>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php include 'footer_landing.php'; ?>
        </div>
        <?php include 'landing_script.php'; ?>
        <script type="text/javascript">
            function validateEmail(emailField) {
                var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

                if (reg.test(emailField.value) == false)
                {
                    alert('Invalid Email Address');
                    return false;
                }

                return true;

            }
        </script>
    </body>

</html>
