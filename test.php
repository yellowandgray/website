<div class="container">
                    <div class="card bg-light">
                        <article class="card-body">
                            <h4 class="card-title mt-3 text-center">Create Account</h4>
                            <p class="text-center">Get started with your account</p>
                            <div class="google-btn">
                                <div class="google-icon-wrapper">
                                    <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
                                </div>
                                <p class="btn-text"><b>Sign up with google</b></p>
                            </div>
                            <div class="google-btn">
                                <div class="google-icon-wrapper">
                                    <img class="google-icon" src="examhorse-landing/img/fb.png"/>
                                </div>
                                <p class="btn-text"><b>Sign up with Facebook</b></p>
                            </div>
                            <p class="divider-text">
                                <span class="bg-light">OR</span>
                            </p>
                            <form onsubmit = 'return registerStudent();'>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="" class="form-control" id = 'user_name' placeholder="User name" type="text">
                                </div> <!-- form-group// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="" class="form-control" id = 'student_name' placeholder="Full name" type="text">
                                </div> <!-- form-group// -->
                                <label>Profile Picture</label>
                                <div class="form-group input-group">
                                    <div id="upload_container">
                                        <input type="file" id="profile_picture" accept="image/x-png,image/gif,image/jpeg" onchange="attachFile('profile_picture');" />
                                    </div>
                                    <div class="image-preview hidden" id="preview_container">
                                        <button type="button" onclick="closeProfilePic();" class="close-button-profile-img"><i class="fa fa-close"></i></button>
                                        <img src="" alt="image" />
                                    </div>
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa fa-venus"></i> </span>
                                    </div>
                                    <select class="custom-select" id="gender" name="gender">
                                        <option value="0">Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>  
                                </div> <!-- form-group// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                    </div>
                                    <input name="" id="email" class="form-control" placeholder="Email address" type="email">
                                </div> <!-- form-group// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                    </div>
                                    <input name="" id = 'mobile' class="form-control" placeholder="Phone number" type="text">
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                                    </div>
                                    <input name="" id = 'city' class="form-control" placeholder="City" type="text">
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                                    </div>
                                    <input name="" id = 'pin' class="form-control" placeholder="Pin Code" type="text">
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                    <input class="form-control" id = 'password' placeholder="Create password" type="password">
                                </div> <!-- form-group// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                    <input class="form-control" id = 'confirm_password' placeholder="Repeat password" type="password">
                                </div> <!-- form-group// -->    
                                <div class="g-recaptcha" data-sitekey="6LdRV_sUAAAAAJUxyvE5squ2GTwOApnH00odkabA"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
                                </div> <!-- form-group// -->      
                                <p class="text-center">Have an account? <a href="login-page">Log In</a> </p>                                                                 
                            </form>
                        </article>
                    </div>
                </div>