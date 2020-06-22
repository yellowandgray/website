<?php
include('googlelogin/login-user-config.php');
include('fb-login/index.php');
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'head_landing.php'; ?>
    <body>
        <?php include 'menu_landing.php'; ?>
        <div id="wrapper">
            <section id="featured-1" class="new-register-section">
                <div id="mySignin" tabindex="-1" role="dialog" aria-labelledby="mySigninModalLabel" aria-hidden="true">
                    <div class="container">
                        <div class="card bg-light">
                            <article class="card-body">
                                <h4 class="card-title mt-3 text-center">Login</h4>
                                <p class="text-center">Login your account</p>
                                <div class="google-btn" onclick="window.location = '<?php echo $google_client->createAuthUrl(); ?>'">
                                    <div class="google-icon-wrapper">
                                        <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
                                    </div>
                                    <!--p class="btn-text"><b>Sign in with google</b></p-->
                                    <a href="" class="btn-text"><b>Sign in with google</b></a>
                                </div>
                                <div class="google-btn" onclick="window.location='<?php echo $fb_login_url;  ?>';">
                                    <div class="google-icon-wrapper">
                                        <img class="google-icon" src="examhorse-landing/img/fb.png"/>
                                    </div>
                                    <p class="btn-text"><b>Sign in with Facebook</b></p>
                                </div>
                                <p class="divider-text">
                                    <span class="bg-light">OR</span>
                                </p>
                                <form onsubmit="return loginStudent();">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                        </div>
                                        <input name="" class="form-control" id = 'email' placeholder="Email" type="email" required>
                                    </div> <!-- form-group// -->
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-key"></i> </span>
                                        </div>
                                        <input type="password" name="" class="form-control" id = 'password1' placeholder="Password" type="text" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block"> Sign In  </button> 
                                    </div> <!-- form-group// -->   
                                    <a href="forgot-password" class="float-right text-right">Forgot password?</a>
                                    <br/>
                                    <p class="text-center">Don't have any account? <a href="member-signup">Sign Up</a> </p>                                                                 
                                </form>
                            </article>
                        </div>
                    </div> 
                </div>
            </section>

            <!-- Reset Modal -->
            <?php include 'footer_landing.php'; ?>
            <!-- end reset modal -->
        </div>
        <?php include 'landing_script.php'; ?>
    </body>
     <script>
        <?php if(isset($_GET['login_err'])) {  ?>
        swal('Error','<?php echo $_GET['login_err']; ?>', 'error');
        <?php
        } ?>
    </script
</html>
