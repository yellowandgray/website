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
        <section class="login-pad">
            <div class="container log-in">
                <div class="login-sec">
                    <div class="login-sec-2 login">
                        <div id="log-in" class="log-cont-01">
                            <div class="change-password-section">
                                <img src="img/password_logo.png" alt="toowheel_logo" />
                                <h3>Change Your Password</h3>
                                <form>
                                    <div class="input-container">
                                        <input type="password" name="password" id="password" placeholder="Enter Your New password" autofocus />
                                    </div>
                                    <div class="input-container">
                                        <input type="password" name="confirm_password" id="confirm_password" placeholder="Enter Your Confirm password" />
                                    </div>
                                    <center>
                                        <button type="submit">SUBMIT</button>
                                    </center>
                                </form> 
                                <br/>
                                <h5><a href="index.php?type=<?php echo $type; ?>"><i class="fa fa-home" aria-hidden="true"></i> Go to Toowheel</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
    </body>
</html>