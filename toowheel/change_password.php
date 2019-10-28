<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
require_once 'api/include/common.php';
$obj = new Common();
$user = array();
if (isset($_GET['auth'])) {
    $code = $_GET['auth'];
    $user = $obj->selectRow('*', 'member', 'reset_code=\'' . $code . '\' AND reset_expired_at >= \'' . date('Y-m-d H:i:s') . '\'');
}
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <section class="login-pad">
            <div class="container log-in">
                <div class="login-sec">
                    <div class="login-sec-2 login">
                        <div id="log-in" class="log-cont-01">
                            <div class="change-password-section">
                                <img src="img/password_logo.png" alt="toowheel_logo" />
                                <?php
                                if (count($user) > 0) {
                                    ?>
                                    <h3>Change Your Password</h3>
                                    <form onsubmit="return changePassword('<?php echo $code; ?>');">
                                        <div class="input-container">
                                            <input type="password" name="password" id="password" placeholder="Enter Your New password" onchange="removeValidation('password');" onKeyUp="checkPasswordStrength();" autofocus />
                                            <div id="password_error"></div>
                                        </div>
                                        <div class="input-container">
                                            <input type="password" name="confirm_password" id="confirm_password" onchange="removeValidation('confirm_password');" placeholder="Enter Your Confirm password" />
                                            <div id="confirm_password_error"></div>
                                        </div>
                                        <center>
                                            <button type="submit">SUBMIT</button>
                                        </center>
                                    </form> 
                                <?php } else { ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <i style="font-size: 48px;" class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="text-center">Invalid Authentication</h4>
                                            <p class="text-center">Might be your link was expired</p>
                                        </div>
                                    </div>
                                <?php } ?>
                                <br/>
                                <h5><a href="index.php?type=two_wheel"><i class="fa fa-home" aria-hidden="true"></i> Go to Toowheel</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
        <script src="js/sweet-alert.min.js" type="text/javascript"></script>
    </body>
</html>