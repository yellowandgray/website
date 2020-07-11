<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Grand Sunshine</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link href="img/favicon.png" rel="shortcut icon"/>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/responsive.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <section class="login-section">
            <div class="container">
                <div class="login-form">
                    <div class="logo-section">
                        <img src="img/logo-login.jpg" alt="login logo" />
                    </div>
                    <form>
                        <div class="form-group input-group">
                            <i class="fa fa-envelope"></i>
                            <input type="email" id="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group input-group">
                            <i class="fa fa-phone"></i>
                            <input type="phone" id="phone" class="form-control" maxlength="10" pattern="[0-9]{10}" placeholder="Phone" required>
                        </div>
                        <div class="form-group input-group">
                            <i class="fa fa-key"></i>
                            <input type="password" id="password" class="form-control" placeholder="Password" required>
                            <span class="password-icon">
                                <i class="fa fa-eye-slash"></i>
                            </span>
                        </div>
                        <button type="submit">LOG IN</button>
                    </form>
                </div>
            </div>
        </section>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
