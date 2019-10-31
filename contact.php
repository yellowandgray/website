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
        <div class="hero-wrap hero-bread" style="background-image: url('images/bg_04.jpg'); background-size: cover;">

            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-9 ftco-animate text-center">
                        <h1 class="mb-0 bread">contact Us</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home-</a></span> <span class="mr-2"></span> <span>contact Us</span></p>

                    </div>
                </div>
            </div>
        </div>

        <section class="contact-section bg-light pad-tb-50">
            <div class="container">
                <div class="row d-flex mb-5 contact-info">
                    <div class="w-100"></div>
                    <div class="col-md-4 d-flex">
                        <div class="info bg-white p-4">
                            <p><span>Address:</span> </p>
                            <p>Guardian Health Management Pvt Ltd,<br>
                                210-G, Evoma Business Centre,<br>
                                #88, Borewell Road,<br>
                                Whitefield,<br>
                                Bengaluru – 560 066</p>
                        </div>
                    </div>
                  
                    <div class="col-md-4 d-flex">
                        <div class="info bg-white p-4">
                             <p><span>Phone:</span> <a href="tel://1234567920">8409 012345</a></p>
                            <p><span>Email:</span> </p>
                            <p><a href="mailto:info@yoursite.com">info@guardianhealthmanagement.com</a></p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex">
                        <div class="info bg-white p-4">
                            <p><span>Website</span> <a href="#">yoursite.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="row block-9">
                    <div class="col-md-6 order-md-last d-flex">
                        <form action="#" class="bg-white p-5 contact-form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                            </div>
                        </form>

                    </div>

                    <div class="col-md-6 d-flex">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.8769329986767!2d77.60381861484956!3d12.979722318211808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1662c8ac5555%3A0xf3ba9f317a0882d5!2sGuardian%20Health%20Management%20Pvt%20Limited!5e0!3m2!1sen!2sin!4v1572417203819!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </section>

        <?php include 'footer.php'; ?>

    </body>
</html>