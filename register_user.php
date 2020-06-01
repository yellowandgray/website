<?php
session_start();
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
                                            <p class="btn-text"><b>Sign up with google</b></p>
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
                                <form onsubmit = 'return registerStudent();'>
                                    <h4>Candidate's Info:</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                                </div>
                                                <input name="" class="form-control" id="student_name" placeholder="Name" type="text" required>
                                            </div> <!-- form-group// -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                                </div>
                                                <input name="" class="form-control" id="user_name" placeholder="Login name" type="text" required>
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
                                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
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
                                                <input name="" id="mobile" class="form-control" placeholder="Phone number" type="text" required>
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
                                                <label>Profile Picture</label>
                                                <div id="upload_container">
                                                    <input type="file" id="profile_picture" accept="image/x-png,image/gif,image/jpeg" onchange="attachFile('profile_picture');" style='width: 100%' />
                                                </div>
                                                <div class="image-preview hidden" id="preview_container">
                                                    <button type="button" onclick="closeProfilePic();" class="close-button-profile-img"><i class="fa fa-close"></i></button>
                                                    <img src="" alt="image" />
                                                </div>
                                            </div> <!-- form-group// -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa fa-venus"></i> </span>
                                                </div>
                                                <select class="custom-select" id="gender" name="gender" required>
                                                    <option value="0">Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div> <!-- form-group// -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-graduation-cap"></i> </span>
                                                </div>
                                                <input name="" id="graduation" class="form-control" placeholder="Graduation Degrees" type="text" required>
                                            </div> <!-- form-group// -->
                                        </div>
                                    </div>
                                    <h4>Address:</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-location-arrow"></i> </span>
                                                </div>
                                                <input name="" id="street" class="form-control" placeholder="Street Name" type="text" required>
                                            </div> <!-- form-group// -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-location-arrow"></i> </span>
                                                </div>
                                                <input name="" id="city" class="form-control" placeholder="Village/Town/City" type="text" required>
                                            </div> <!-- form-group// -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
                                                </div>
                                                <input name="" id="district" class="form-control" placeholder="District" type="text" required>
                                            </div> <!-- form-group// -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-map-pin"></i> </span>
                                                </div>
                                                <input name="" id="pin" class="form-control" placeholder="Pin Code" type="text" required>
                                            </div> <!-- form-group// -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-map-signs"></i> </span>
                                                </div>
                                                <input name="" id="nearcity" class="form-control" placeholder="If village nearest Town/City" type="text">
                                            </div> <!-- form-group// -->
                                        </div>
                                    </div>
                                    <h4>Planned to Write:</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-book"></i> </span>
                                                </div>
                                                <select class="custom-select" id="selectgroup" name="" required>
                                                    <option value="0">Select Group Exam</option>
                                                    <option value="group">Group 1</option>
                                                    <option value="groups">Group 2/2A</option>
                                                </select>
                                            </div> <!-- form-group// -->
                                        </div>
                                    </div>
                                    <!--                                    <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"> <i class="fa fa-book"></i> </span>
                                                                                    </div>
                                                                                    <input name="" id="group_one" class="form-control" placeholder="Group 1" type="text">
                                                                                </div>  form-group// 
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"> <i class="fa fa-book"></i> </span>
                                                                                    </div>
                                                                                    <input name="" id="group_two" class="form-control" placeholder="Group 2/2A" type="text">
                                                                                </div>  form-group// 
                                                                            </div>
                                                                        </div>-->
                                    <div class="g-recaptcha" data-sitekey="6LdRV_sUAAAAAJUxyvE5squ2GTwOApnH00odkabA"></div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
                                    </div> <!-- form-group// -->      
                                    <p class="text-center">Have an account? <a href="login-page">Log In</a> </p>
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
</html>