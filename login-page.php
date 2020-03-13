<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <div id="wrapper">
            <section id="featured-1">

                <div id="mySignin" tabindex="-1" role="dialog" aria-labelledby="mySigninModalLabel" aria-hidden="true">
                    <div class="no-header-logo">
                        <a href='index'>
                            <img src = 'img/logo.png' alt = '' />
                        </a>

                    </div>
                    <div class="modal styled">
                        <div class="modal-header login-section">
                            <a href="index"><i class="font-icon-arrow-simple-left"></i></a>
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
                                        <button type="submit" class="btn btn-custom">Sign in</button> Forgot password? <a href="#myReset" data-dismiss="modal" aria-hidden="true" data-toggle="modal">Reset</a>
                                    </div>
                                    <p class="aligncenter margintop20">
                                        Click here to create the new account <a href = 'register-page'>Register Now!</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Reset Modal -->
            <?php include 'reset_password.php'; ?>
            <!-- end reset modal -->
        </div>
        <?php include 'script.php'; ?>
    </body>
</html>
