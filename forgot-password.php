<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
$languages = $obj->selectAll('*', 'language', 'status = 1');
?>
<html lang="en">
    <?php include 'head_landing.php'; ?>
    <body>
        <?php include 'menu_landing.php'; ?>
        <div class="member-full-version-secttion">
            <div class="container">
                <div class="forgot-section">
                    <div class="text-center">
                        <p>Forgot Your Password </p>
                    </div>
                    <form onsubmit="return SendMail();" class="reset-form">
                        <div class="form-group">
                            <input type = 'email' id = 'email' placeholder = 'Enter Your Register Email Id' required>
                        </div>
                        <div class="form-group">
                            <button type = 'submit' class = 'btn btn-custom'>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'footer_landing.php'; ?>
        <?php include 'landing_script.php'; ?>
    </body>
</html>