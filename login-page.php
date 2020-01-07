<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <div id="wrapper">
            <!-- toggle top area -->
            <!--            <div class="hidden-top">
                            <div class="hidden-top-inner container">
                                <div class="row">
                                    <div class="span12">
                                        <ul>
                                            <li><strong>We are available for any custom works this month</strong></li>
                                            <li>Main office: Springville center X264, Park Ave S.01</li>
                                            <li>Call us <i class="icon-phone"></i> (123) 456-7890 - (123) 555-7891</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>-->
            <!-- end toggle top area -->
            <!-- start header -->

            <section id="featured">

                <div id="mySignin" tabindex="-1" role="dialog" aria-labelledby="mySigninModalLabel" aria-hidden="true">
                    <div class = 'logo text-center'>
                        <img src = 'img/logo.png' alt = '' class = 'logo' />

                    </div>
                    <div class="modal styled">
                        <div class="modal-header">
                            <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
                            <h4 id="mySigninModalLabel"  class="text-center"><strong>Login</strong></h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" onsubmit="return loginStudent();">
                                <div class="control-group">
                                    <label class="control-label" for="user_name">Username</label>
                                    <div class="controls">
                                        <input type="text" id="user-name" placeholder="Username">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="password">Password</label>
                                    <div class="controls">
                                        <input type="password" id="password1" placeholder="Password">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="checkbox" id="rememberme"> Remember Me 
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" class="btn">Sign in</button> Forgot password? <a href="#myReset" data-dismiss="modal" aria-hidden="true" data-toggle="modal">Reset</a>
                                    </div>
                                    <p class="aligncenter margintop20">
                                        Click here to create the new account <a href = '#mySignup' data-dismiss="modal" aria-hidden="true" data-toggle="modal">Register Now!</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </body>
</html>
