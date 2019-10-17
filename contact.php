<!doctype html>
<html lang="en">

    <?php include 'head.php'; ?>

    <body>
        <!--::header part start::-->
        <?php include 'menu.php'; ?>
        <!-- Header part end-->

        <!-- breadcrumb start-->
        <section class="breadcrumb breadcrumb_bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb_iner">
                            <div class="breadcrumb_iner_item">
                                <h2>contact us</h2>
                                <p> <a href="index">Home</a> <span>-</span>contact us</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb start-->

        <!-- ================ contact section start ================= -->
        <section class="contact-section">
            <div class="container">
                <div class="d-none d-sm-block mb-5 pb-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3354.114053793134!2d103.69925336755114!3d1.3344095460585914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da0f8c29f35373%3A0xd9586700ba01c27a!2s7%20Soon%20Lee%20St%2C%20Unit%2002-11%20Ispace%2C%20Singapore%20628718!5e0!3m2!1sen!2sin!4v1571219471650!5m2!1sen!2sin" frameborder="0" style="border:0;width: 100%; height: 400px" allowfullscreen=""></iframe>
                </div>


                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Get in Touch</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm"
                              novalidate="novalidate">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="name" id="name" type="text"
                                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                               placeholder='Enter your name'>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="email" id="email" type="email"
                                               onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Enter email address'"
                                               placeholder='Enter email address'>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="subject" id="subject" type="text"
                                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'"
                                               placeholder='Enter Subject'>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">

                                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                                                  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"
                                                  placeholder='Enter Message'></textarea>
                                    </div>
                                </div>                         
                                <div class="form-group mt-3">
                                    <button type="submit" class="button button-contactForm btn_2">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>S&T Testing Services Pte Ltd.</h3>
                                <p>iSPACE, 7 Soon Lee Street Unit 02-11,<br/> Singapore 627608</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>6561 7601 / 8626 1994</h3>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>sales@sttesting.com.sg</h3>
                                <p>Send us your enquiry anytime!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ contact section end ================= -->

        <!--::subscribe area start::-->
        <?php include 'subscribe.php'; ?>
        <!--::subscribe area end::-->

        <!-- footer part start-->
        <?php include 'footer.php'; ?>
    </body>

</html>