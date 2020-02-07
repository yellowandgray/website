<!DOCTYPE html>
<html lang="en">
    <?php
    $page = 'contact';
    include 'head.php';
    ?>
    <body class="goto-here">


        <!-- END nav -->
        <?php include 'enquiry.php'; ?>
        <section>
            <?php include 'menu.php'; ?>
        </section>
        <div class="hero-wrap hero-bread" style="background-image: url('images/bg_06.jpg'); background-size: cover;">

            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-9 ftco-animate text-center">
                        <h1 class="mb-0 bread">contact Us</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home-</a></span> <span class="mr-2"></span> <span>contact Us</span></p>

                    </div>
                </div>
            </div>
        </div>

        <section class="contact-section bg-light pad-tb-50 section-position">
            <div class="container">
                <div class="row d-flex mb-5 contact-info">
                    <div class="w-100"></div>
                    <div class="col-md-6 d-flex">
                        <div class="info bg-white p-4 contact">
                            <p><i class="fa fa-home" aria-hidden="true"></i> </p>
                            <p>Guardian Health Management Pvt Ltd,<br>
                                210-G, Evoma Business Centre,<br>
                                #88, Borewell Road,<br>
                                Whitefield,<br>
                                Bengaluru – 560 066</p>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex">
                        <div class="info bg-white p-4 contact">
                            <p><i class="fa fa-phone" aria-hidden="true"></i></p>
                            <p><a href="tel://1234567920">+91 8409 012345</a></p>
                            <p><i class="fa fa-envelope" aria-hidden="true"></i></p>
                            <p><a href="mailto:info@yoursite.com">info@ghmindia.com</a></p>
                        </div>
                    </div>

                </div>
                <div class="row block-9 mb-5">
                    <div class="col-md-12 d-flex">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.0543067145604!2d77.74562911484949!3d12.968376818457816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1662c8ac5555%3A0xf3ba9f317a0882d5!2sGuardian%20Health%20Management%20Pvt%20Limited!5e0!3m2!1sen!2sin!4v1574169366003!5m2!1sen!2sin" width="100%" height="250px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
                <div class="row block-9 m">
                    <div class="col-md-12 order-md-last d-flex">
                        <form class="contact-form bg-white p-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group bg-1">
                                        <input type="text" class="form-control" name="fname" placeholder="Your Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group bg-1">
                                        <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group bg-1">
                                        <input type="text" class="form-control" name="contact" placeholder="Your Phone" maxlength="10" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group bg-1">
                                        <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group bg-1">
                                        <textarea id="" cols="30" rows="5" name="message" class="form-control" placeholder="Message" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group submit-btn">
                                    <input type="submit" value="Send Message" class="btn  py-3 px-5">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>

        <?php include 'footer.php'; ?>

    </body>
</html>