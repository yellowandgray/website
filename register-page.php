<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <div id="wrapper">
            <section class="register_section">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <div class = 'logo'>
                                <a href='index'><img src = 'img/logo.png' alt = '' class = 'logo' /></a>
                            </div>
                            <br/>
                            <div class="signup-title">
                                <a href="login-page"><i class="font-icon-arrow-simple-left"></i></a>
                                <h4>Register <strong>Form</strong></h4>
                            </div>
                            <div class="signup-section">
                                <form class = 'form-horizontal student-register'onsubmit = 'return registerStudent();'>
                                    <div class = 'control-group'>
                                        <label class = 'control-label' for = 'username'>User Name</label>
                                        <div class = 'controls'>
                                            <input type = 'text' id = 'user_name' placeholder = 'User Name' required>
                                        </div>
                                    </div>
                                    <div class = 'control-group'>
                                        <label class = 'control-label' for = 'student-name'>Student Name</label>
                                        <div class = 'controls'>
                                            <input type = 'text' id = 'student_name' placeholder = 'Student Name' required>
                                        </div>
                                    </div>
                                    <div class = 'control-group'>
                                        <label class = 'control-label' for = 'upload-profile'>Upload Your Profile Picture</label>
                                        <div class = 'controls'>
                                            <div id="upload_container">
                                                <input type="file" id="profile_picture" accept="image/x-png,image/gif,image/jpeg" onchange="attachFile('profile_picture');" />
                                            </div>
                                            <div class="image-preview hidden" id="preview_container">
                                                <button type="button" onclick="closeProfilePic();" class="close-button-profile-img"><i class="icon-remove-sign"></i></button>
                                                <img src="" alt="image" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class = 'control-group'>
                                        <label class = 'control-label' for = 'gender'>Gender</label>
                                        <div class = 'controls'>
                                            <select class="form-control" id="gender" name="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class = 'control-group'>
                                        <label class = 'control-label' for = 'parent_name'>Parent Name</label>
                                        <div class = 'controls'>
                                            <input type = 'text' id = 'parent_name' placeholder = 'Parent Name' required>
                                        </div>
                                    </div>
                                    <div class = 'control-group'>
                                        <label class = 'control-label' for = 'mobile'>Mobile</label>
                                        <div class = 'controls'>
                                            <input type = 'text' id = 'mobile' maxlength = '10' placeholder = 'Ex: 9876543210' pattern = '[0-9]{10}' required>
                                        </div>
                                    </div>
                                    <div class = 'control-group'>
                                        <label class = 'control-label' for = 'city'>Town/City</label>
                                        <div class = 'controls'>
                                            <input type = 'text' id = 'city' placeholder = 'Town/City' required>
                                        </div>
                                    </div>
                                    <div class = 'control-group'>
                                        <label class = 'control-label' for = 'pin'>Pin</label>
                                        <div class = 'controls'>
                                            <input type = 'text' id = 'pin' placeholder = 'Pin' required>
                                        </div>
                                    </div>
                                    <div class = 'control-group'>
                                        <label class = 'control-label' for = 'school_name'>School Name</label>
                                        <div class = 'controls'>
                                            <input type = 'text' id = 'school_name' placeholder = 'School Name' required>
                                        </div>
                                    </div>
                                    <div class = 'control-group'>
                                        <label class = 'control-label' for = 'slelct_standard'>Select Standard</label>
                                        <div class = 'controls'>
                                            <select id = 'standard' required>
                                                <option value = '10th-State-Board'>10th State Board</option>
                                                <option value = '10th-CBSC'>10th CBSC</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class = 'control-group'>
                                        <label class = 'control-label' for = 'password'>Password</label>
                                        <div class = 'controls'>
                                            <input type = 'password' id = 'password' placeholder = 'Password' required>
                                        </div>
                                    </div>
                                    <div class = 'control-group'>
                                        <label class = 'control-label' for = 'confirm_password'>Confirm Password</label>
                                        <div class = 'controls'>
                                            <input type = 'password' id = 'confirm_password' placeholder = 'Confirm Password' required>
                                        </div>
                                    </div>
                                    <div class = 'control-group'>
                                        <label class = 'control-label' for = 'email'>Email</label>
                                        <div class = 'controls'>
                                            <input type = 'email' id = 'email' placeholder = 'Email (Option)'>
                                        </div>
                                    </div>
                                    <div class = 'control-group'>
                                        <div class = 'controls'>
                                            <button name = 'submit' type = 'submit' id = 'contact-submit' class = 'btn'>Sign up</button>
                                        </div>
                                        <p class = 'aligncenter margintop20'>
                                            Already have an account? <a href = 'login-page'>Sign in</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include 'script.php'; ?>
    </body>
</html>
