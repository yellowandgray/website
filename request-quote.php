<html lang="en">
    <?php
    $page = 'how-to-buy';
    include 'head.php';
    ?>

    <body>

        <!--==========================
          Header
        ============================-->
        <?php include 'menu.php' ?>

        <div class="banner-w3layouts foreteen">

            <div class="banner-w3layouts-info foreteen">
                <!--/search_form -->
                <div id="banner-w3layouts-info" class="search_top text-center">
                    <h3><strong>Request a Quote</strong></h3>
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="breadcrumb-item">How to Buy</li>
                        <li class="breadcrumb-item active">Request a Quote</li>
                    </ol>
                </div>
                <!--//banner-w3layouts-info -->
            </div>

        </div>

        <section id="contact" class="section-bg wow fadeInUp">
            <div class="container">

                <div class="section-header">
                    <h3>Request A Quote</h3>
                </div>
                <div class="form">
                    <div id="sendmessage">Your message has been sent. Thank you!</div>
                    <div id="errormessage"></div>
                    <form action="" method="post" role="form" class="contactForm">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter your name" />
                                <div class="validation"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validation"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="radio" checked="checked" name="radio">&nbsp; Male &nbsp;
                                <input type="radio" name="radio"> &nbsp; Female &nbsp;
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text/number" class="form-control" name="phone" id="phone" placeholder="Phone Number" data-rule="minlen:4" data-msg="Please enter valid your contact number" />
                                <div class="validation"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                Country : &nbsp;
                                <select name="country">
                                    <option value="india">India</option>
                                    <option value="indonesia">Indonesia</option>
                                </select>
                                <div class="validation"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                State : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <select name="state">
                                    <option value="chennai">Chennai</option>
                                    <option value="hyderapad">Hyderapad</option>
                                </select>
                                <div class="validation"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <textarea type="text" class="form-control" name="message" id="message" placeholder="Message" rows="4" data-rule="minlen:4" data-msg="" /></textarea>
                                <div class="validation"></div>
                            </div>
                        </div>
                        <div class="g-recaptcha" data-sitekey="6LfkxXYUAAAAAH2ktM1IKn_FiywdAkcF7-FNxX3a"></div>
                        <!-- secret key (6LfBw3YUAAAAAIxduK6ndPv_YvzKEIHNgC3ZwWGW) -->
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>

            </div>
        </section><!-- #contact -->

        <?php include 'footer.php' ?>

    </body>
</html>