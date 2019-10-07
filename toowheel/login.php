<?php
if (!isset($_GET['type'])) {
    header('Location: ../index.php');
}
$type = $_GET['type'];
require_once 'api/include/common.php';
$obj = new Common();
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="padding-top-108"></div>
        <section class="login-pad">
            <div class="container log-in">
                <div class="login-sec">
                    <div class="login-sec-1" style="background-image:url(img/login-pic.jpg);background-repeat: no-repeat; background-size: cover;">
                        <div class="bg-img text-center">
                            <img src="img/login-001.png" alt=""/>
                            <h5>NOT A TOOWHEEL MEMBER YET?</h5>
                            <h3>BE A MEMBER TODAY!</h3>
                            <h5>AND ENJOY EXCITING BENEFITS</h5>
                            <p class="member-t"><a href="member-benefits.php?type=<?php echo $type; ?>">MEMBER BENEFITS</a></p>
                            <p class="sing-t text-center"><a href="member-register.php?type=<?php echo $type; ?>" >Sign up</a></p>
                        </div>
                    </div>
                    <div class="login-sec-2 login">
                        <div id="log-in" class="log-cont-01">
                            <div>
                                <h3>LOGIN ACCOUNT</h3>
                                <form>
                                    <div class="input-container"><i class="fa fa-user-o icon" aria-hidden="true"></i><input type="text" name="firstname" placeholder="Username"></div>
                                    <div class="input-container"><i class="fa fa-ellipsis-h icon" aria-hidden="true"></i><input type="password" name="lastname" placeholder="Password"></div>
                                    <center><button type="submit">LOGIN</button></center>
                                </form> 
                                <h5><a href="#" class="forgot-password">Forgot your Password</a></h5>
                                <div class="pop"><i class="fa fa-times-circle" aria-hidden="true"></i>
                                    <div class="margin-top-30">
                                        <h4>Enter Your Register Mail Id!</h4>
                                        <input type="email" name="email" placeholder="Enter Register Mail Id" />
                                        <center><button type="submit">Submit</button></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.php'; ?>
        <script>
            $(".forgot-password").click(
                    function () {
                        $(".pop").fadeIn('slow');
                    }
            );

            $(".pop i").click(
                    function () {
                        $(".pop").fadeOut('fast');
                    }
            );

            //Thanks for Iphone titlebar fix http://coding.smashingmagazine.com/2013/05/02/truly-responsive-lightbox/

            var getIphoneWindowHeight = function () {
                // Get zoom level of mobile Safari
                // Such zoom detection might not work correctly on other platforms
                // 
                var zoomLevel = document.documentElement.clientWidth / window.innerWidth;

                // window.innerHeight returns height of the visible area. 
                // We multiply it by zoom and get our real height.
                return window.innerHeight * zoomLevel;
            };
        </script>
    </body>
</html>