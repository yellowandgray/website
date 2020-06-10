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
                <form class = 'form-horizontal' onsubmit="return changePassword();">
                    <input type = 'text' id = 'user_name' placeholder = 'Enter Register User Name'>
                    <input type = 'password' id = 'password' placeholder = ''>
                    <input type = 'password' id = 'confirm_password' placeholder = ''>
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