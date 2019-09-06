<html>
    <?php include 'head.php'; ?>
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


