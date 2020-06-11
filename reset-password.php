<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
$languages = $obj->selectAll('*', 'language', 'status = 1');
?>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="member-full-version-secttion">
            <div class="container">
                <div class="text-center"><h3>Reset Your Password </h3></div>
                <form onsubmit="return changePassword();" class="reset-form">
                    <div class="form-group">
                        <input type = 'text' id = 'user_name' placeholder = 'Enter Register User Name' required>
                    </div>
                    <div class="form-group">
                        <input type = 'password' id = 'password' placeholder = 'New Password' required>
                    </div>
                    <div class="form-group">
                        <input type = 'password' id = 'confirm_password' placeholder = 'Confirm Password' required>
                    </div>
                    <div class="form-group">
                        <button type = 'submit' class = 'btn'>Reset password</button>
            <!--                <p class = 'aligncenter margintop20'>
                        Please put your registered user name. you have reset the your password...
                    </p>-->
                    </div>
                </form>
            </div>
        </div>
        <?php include 'footer.php'; ?>
        <?php include 'script.php'; ?>
        <script>
            $("#open-logout").click(function (e) {
                console.log("test-1");
                e.stopPropagation();
                $(".logout_position").show("fast");
            });
            $(document).click(function (e) {
                if (!(e.target.class === 'logout_position')) {
                    $(".logout_position").hide("fast");
                }
            });
        </script>
    </body>
</html>