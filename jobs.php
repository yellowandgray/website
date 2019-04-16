<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <div class="container">
            <div class="col-md-12">
                <div class="text-center">
                    <a href="index.php"><img src="img/logo.png" alt="" /></a>
                </div>
                <div class="text-center"><a href="index.php" class="backtohome"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back to Home</a></div>
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3>Apply For the Job</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label>Your name <span class="required">*</span></label>
                                <input type="text" value="" maxlength="100" class="form-control" name="name" id="name">
                                <label>Your email address <span class="required">*</span></label>
                                <input type="email" value="" maxlength="100" class="form-control" name="email" id="email1">
                                <label>Subject <span class="required">*</span></label>
                                <input type="text" value="" maxlength="100" class="form-control" name="website" id="website">
                                <label>Comment <span class="required">*</span></label>
                                <textarea maxlength="5000" rows="5" class="form-control" name="comment" id="Textarea1"></textarea>
                                <label>Resume <span class="required">*</span></label>
                                <input type="file" class="form-control" name="file_upload" id="file" accept="application/pdf"/>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <br />
                            <button name="submit" type="submit" id="sendmesage" class="btn v-btn no-three-d">Submit</button>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </body>
    <!--// BACK TO TOP //-->
    <div id="back-to-top" class="animate-top"><i class="fa fa-angle-up"></i></div>

    <!-- Libs -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script src="js/jquery.easing.js"></script>
    <script src="js/jquery.fitvids.js"></script>
    <script src="js/jquery.carouFredSel.min.js"></script>
    <script src="js/theme-plugins.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/imagesloaded.js"></script>

    <script src="js/view.min.js?auto"></script>

    <script src="plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

    <script src="js/theme-core.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
</html>