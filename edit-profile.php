<?php
session_start();
include('login-check.php');
require_once 'api/include/common.php';
$obj = new Common();
if (isset($_SESSION['student_register_id'])) {
    $login_student = $obj->selectRow('*', 'student_register', 'student_register_id = ' . $_SESSION["student_register_id"]);
}
?>
<html lang = 'en'>
    <?php include 'head_landing.php' ?>
    <body>
        <?php include 'menu_landing.php'; ?>
        <div id="wrapper">
            <section id="featured-1" class="edit-profile-section">
                <div class="container">
                    <div class="update-back-btn">
                        <i class="fa fa-angle-left" aria-hidden="true" onclick="window.location ='member-account'"></i>
                    </div>
                    <div class="edit-form">
                        <h2 style="border-bottom: 2px solid #e3e3e3;padding-bottom: 10px;margin-bottom: 20px;">Update Your Account</h2>
                        <form onsubmit = "return updateStudentProfile(<?php echo $login_student['student_register_id']; ?>);">
                            <h4>Candidate's Info:</h4>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                        </div>
                                        <input type="text" id="name" class="form-control" value="<?php echo $login_student['student_name']; ?>" placeholder="Name">
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-venus"></i> </span>
                                        </div>
                                        <select class="custom-select" id="gender" name="gender">
                                            <option value="">Gender</option>
                                            <?php
                                            foreach (array('male' => 'Male', 'female' => 'Female') as $key => $val) {
                                                $selected = '';
                                                if ($key == $login_student['gender']) {
                                                    $selected = 'selected';
                                                }
                                                ?>
                                                <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div> <!-- form-group// -->
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                        </div>
                                        <input type="text" id="mobile" maxlength="10" pattern="[0-9]{10}" class="form-control" value="<?php echo $login_student['mobile']; ?>" placeholder="Mobile No">
                                    </div> <!-- form-group// -->
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                        </div>
                                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $login_student['email']; ?>" placeholder="Email Id">
                                    </div> <!-- form-group// -->
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-graduation-cap"></i> </span>
                                        </div>
                                        <input name="graduation" id="graduation" class="form-control" value="<?php echo $login_student['graduation']; ?>" placeholder="Graduation">
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <label>Practice Medium: &nbsp;&nbsp;</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="practice_medium" id="practice_medium" value="1"  <?php
                                            if ($login_student['practice_medium'] == 1) {
                                                echo 'checked=checked';
                                            }
                                            ?>>
                                            <label class="form-check-label" for="tamil">தமிழ் </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="practice_medium" id="practice_medium" value="2" <?php
                                            if ($login_student['practice_medium'] == 2) {
                                                echo 'checked=checked';
                                            }
                                            ?>>
                                            <label class="form-check-label" for="english">English</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>Address:</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-location-arrow"></i> </span>
                                        </div>
                                        <input name="street" id="street" class="form-control" value="<?php echo $login_student['street']; ?>" type="text" placeholder="Street">
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-location-arrow"></i> </span>
                                        </div>
                                        <input name="city" id="city" class="form-control" value="<?php echo $login_student['city']; ?>" type="text" placeholder="City">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
                                        </div>
                                        <input name="district" id="district" class="form-control" value="<?php echo $login_student['district']; ?>" type="text" placeholder="District">
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-map-pin"></i> </span>
                                        </div>
                                        <input name="pin" id="pin" class="form-control" value="<?php echo $login_student['pin']; ?>" type="text" placeholder="Pin">
                                    </div> <!-- form-group// -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-map-signs"></i> </span>
                                        </div>
                                        <input name="nearcity" id="nearcity" class="form-control" value="<?php echo $login_student['nearcity']; ?>" placeholder="Near By City" type="text">
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
                                        <select class="custom-select" id="selectgroup" name="">
                                            <option value="0">Select Group</option>
                                            <?php
                                            foreach (array('group1' => 'Group 1', 'group22a' => 'Group 2/2A') as $key => $val) {
                                                $selected = '';
                                                if ($key == $login_student['selectgroup']) {
                                                    $selected = 'selected';
                                                }
                                                ?>
                                                <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div> <!-- form-group// -->
                                </div>
                            </div>
                            <button type="submit" class="btn btn-custom">Update</button>
                            <br/>
                            <br/>
                            </from>
                    </div>
                </div>
            </section>
            <?php include 'footer_landing.php'; ?>
        </div>
        <?php include 'landing_script.php'; ?>
    </body>
</html>