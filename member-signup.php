<?php
session_start();
include('googlelogin/register-user-config.php');

require_once 'api/include/common.php';
$obj = new Common();
?>
<html lang="en">
    <?php include 'head_landing.php' ?>
    <body>
        <?php include 'menu_landing.php'; ?>
        <div id="wrapper">
            <section id="featured-1" class="new-register-section">
                <div class="container">
                    <div class="row">
                        <div class="card bg-light">
                            <article class="card-body">
                                <h4 class="card-title mt-3 text-center">Create Account</h4>
                                <p class="text-center">Get started with your account</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="google-btn">
                                            <div class="google-icon-wrapper">
                                                <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
                                            </div>
                                            <!--p class="btn-text"><b>Sign up with google</b></p-->
                                            <a href="<?php echo $google_client->createAuthUrl(); ?>" class="btn-text"><b>Sign up with google</b></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="google-btn">
                                            <div class="google-icon-wrapper">
                                                <img class="google-icon" src="examhorse-landing/img/fb.png"/>
                                            </div>
                                            <p class="btn-text"><b>Sign up with Facebook</b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="divider-text">
                                            <span class="bg-light">OR</span>
                                        </p>
                                    </div>
                                </div>
                                <form onsubmit = 'return registerStudent(event);'>
                                    <h4>Candidate's Info:</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                                </div>
                                                <input name="" class="form-control" id="student_name" placeholder="Full Name" type="text" required>
                                            </div> <!-- form-group// -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                                </div>
                                                <input name="" id="email" class="form-control" placeholder="Email address" type="email" required>
                                            </div> <!-- form-group// -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                                </div>
                                                <input class="form-control" id="password" placeholder="Password" type="password" required>
                                            </div> <!-- form-group// -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                                </div>
                                                <input class="form-control" id="confirm_password" placeholder="Confirm Password" type="password" required>
                                            </div> <!-- form-group// -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                                </div>
                                                <input name="" maxlength="10" pattern="[0-9]{10}" id="mobile" class="form-control" placeholder="Phone number" type="text" required>
                                            </div> <!-- form-group// -->  
                                        </div>   

                                        <div class="col-md-6">
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-book"></i> </span>
                                                </div>
                                                <select class="custom-select" id="practice_medium" name="practice_medium">
                                                    <option value="0">Practice Medium</option>							  <option value="1">Tamil</option>
                                                    <option value="2">English</option>
                                                </select>                                                
                                            </div> <!-- form-group// -->
                                        </div>
                                    </div>  
                                    <div class="g-recaptcha" <div class="g-recaptcha" data-sitekey="6Lf6LaMZAAAAAHnZx0J7Pab-7KRSZy7fzv7f76_W" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
                                        </div> <!-- form-group// -->      
                                        <p class="text-center">Have an account? <a href="member-signin">Log In</a> </p>
                                </form>
                            </article>
                        </div>
                    </div> 
                </div>
            </section>
        </div>
        <?php include 'footer_landing.php'; ?>
        <?php include 'landing_script.php'; ?>
    </body>
    <script>
<?php if (isset($_SESSION['google_login_error'])) { ?>
            swal('Error', '<?php echo $_SESSION['google_login_error']; ?>', 'error');
    <?php
    unset($_SESSION['google_login_error']);
}
?>
    </script>    
</html>
