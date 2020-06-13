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
                <form onsubmit="return forgotPassword();" class="reset-form">
                    <div class="form-group">
                        <input type = 'email' id = 'email' placeholder = 'Enter Register Email Id' required>
                    </div>
                    <div class="form-group">
                        <button type = 'submit' class = 'btn btn-custom'>Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <?php include 'footer.php'; ?>
        <?php include 'script.php'; ?>
    </body>
</html>