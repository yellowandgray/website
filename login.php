<html>
    <head>
        <title>Toowheel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Revenue Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="img/favicon.png" rel="shortcut icon"/>
        <!-- CSS -->
        <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="css/slick-slider.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/common.css" rel="stylesheet" type="text/css"/>
        <style>
            @font-face {
                font-family: "VenusRising";
                src: url("fonts/venus-rising/10496aa2f7e9295bdf45faca7f15a5aa.eot"); /* IE9*/
                src: url("fonts/venus-rising/10496aa2f7e9295bdf45faca7f15a5aa.eot?#iefix") format("embedded-opentype"), /* IE6-IE8 */
                    url("fonts/venus-rising/10496aa2f7e9295bdf45faca7f15a5aa.woff2") format("woff2"), /* chrome、firefox */
                    url("fonts/venus-rising/10496aa2f7e9295bdf45faca7f15a5aa.woff") format("woff"), /* chrome、firefox */
                    url("fonts/venus-rising/10496aa2f7e9295bdf45faca7f15a5aa.ttf") format("truetype"), /* chrome、firefox、opera、Safari, Android, iOS 4.2+*/
                    url("fonts/venus-rising/10496aa2f7e9295bdf45faca7f15a5aa.svg#VenusRising") format("svg"); /* iOS 4.1- */
            }
        </style>
    </head>
    <body>
        <?php include 'menu.php'; ?>
        <section class="login-pad">
            <div class="container">
                <div class="login-sec">
                    <div class="login-sec-1" style="background-image:url(img/login-pic.jpg)">
                        <div class="bg-img text-center">
                            <img src="img/login-001.png" alt=""/>
                            <h5>NOT A TOOWHEEL MEMBER YET?</h5>
                            <h3>BE A MEMBER TODAY</h3>
                            <h5>AND ENJOY EXCITING BENEFITS</h5>
                            <p class="member-t"><a href="member.php">MEMBER BENEFITS</a></p>
                            <p class="sing-t"><a onclick="signIn()" >Sign up</a></p>
                            <!--                            <button onclick="myFunction()">Click me</button>-->
                        </div>

                    </div>
                    <div class="login-sec-2 login">
                        <div id="log-in" class="log-cont-01">
                            <div class="text-center">
                                <h3>LOGIN ACCOUNT</h3>
                                <form>
                                    <p><i class="fa fa-user-o" aria-hidden="true"></i><input type="text" name="firstname" placeholder="Username"></p>
                                    <p><i class="fa fa-ellipsis-h" aria-hidden="true"></i> <input type="text" name="lastname" placeholder="Password"></p>
                                    <button type="submit">LOGIN</button>
                                </form> 
                                <h5><a href="#">Forgot your Password</a></h5>
                            </div>
                        </div>
                        <div id="sign-up" class="log-cont-02">
                            <div class="text-center">
                                <h3>SIGN UP</h3>
                                <form class="sign-up-form">
                                    <input type="text" name="name" placeholder="Name">
                                    <input type="email" name="email" placeholder="Email">
                                    <input type="text" name="phone" placeholder="Phone">
                                    <input type="text" name="ic" placeholder="IC">
                                    <input type="text" name="gender" placeholder="Gender">
                                    <input type="text" name="dob" placeholder="DOB">
                                    <button type="submit">SIGN UP</button>
                                </form> 
                                <h5 onclick="logIn()"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>Back to Login</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.php'; ?>
    </body>
</html>


