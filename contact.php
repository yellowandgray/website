<!DOCTYPE html>
<html>
    <?php
    include 'head.php';
    $page = 'contact';
    ?>
    <body>
        <!-- Header -->
        <?php include 'menu.php'; ?>
        <div class="sub-banner">
            <div class="container">
                <div class="sub-banner-content">
                    <h1>Contact Us</h1>
                    <div class="scp-breadcrumb">
                        <ul class="breadcrumb">
                            <li><a href="index"><i class="fa fa-home" aria-hidden="true" style="color: orangered;"></i> Home</a></li>
                            <li class="active">Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="common-title">
                            <h3>Contact Us</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-address">
                            <h3>Get In Touch!</h3>
                            <address>
                                <h4>Address</h4>
                                <strong>JJ FinCap Private Limited.</strong>
                                <h6>“JJ Manor”, II Floor, 146</h6>
                                <h6>Rukmani Lakshmipathy Road, Egmore,</h6>
                                <h6>Chennai – 600 008.</h6>
                                <h6><a href="tel:"><i class="fa fa-phone"></i> 044-4213 4343 / 44 </a></h6>
                                <h6><a href="tel:"><i class="fa fa-phone"></i> 044-4213 4333 </a></h6>
                                <h6><a href="mailto:"><i class="fa fa-envelope"></i> info@jjfincap.com</a></h6>
                            </address>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-form">
                            <h3>Contact Now!</h3>
                            <form>
                                <div class="form-group">
                                    <input name="name" class="form-control" type="text"  placeholder="Enter your Name" />
                                </div>
                                <div class="form-group">
                                    <input name="email" class="form-control" type="email"  placeholder="Enter your Email" />
                                </div>
                                <div class="form-group">
                                    <input name="subject" class="form-control" type="text"  placeholder="Enter your Subject" />
                                </div>
                                <div class="form-group">
                                    <textarea name="description" rows="6" class="form-control" type="text"  placeholder="Enter Your Commant"></textarea>
                                </div>
                                <a href="#" class="btn btn-primary">Submit</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
        <script>
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