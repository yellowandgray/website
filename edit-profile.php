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
                    <div class="edit-form">
                        <h2 style="border-bottom: 2px solid #e3e3e3;padding-bottom: 10px;margin-bottom: 20px;">Update Your Account</h2>
                        <from  onsubmit="return updateStudentProfile();">
                            <h4>Candidate's Info:</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                        </div>
                                        <input type="text" id="mobile" class="form-control" value="<?php echo $login_student['mobile']; ?>" required>
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                        </div>
                                        <input name="email" id="email" class="form-control" value="<?php echo $login_student['email']; ?>" placeholder="Email Id" required>
                                    </div> <!-- form-group// -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-venus"></i> </span>
                                        </div>
                                        <select class="custom-select" id="gender" name="gender" required>
                                            <option value="0">Gender</option>
                                            <?php
                                            foreach (array('male' => 'Male', 'female' => 'Female') as $key => $val) {
                                                $selected = '';
                                                if ($key == $login_student['gender']) {
                                                    $selected = 'selected';
                                                }
                                                ?>
                                                <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-graduation-cap"></i> </span>
                                        </div>
                                        <input name="graduation" id="graduation" class="form-control" value="<?php echo $login_student['graduation']; ?>" placeholder="Graduation" required>
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
                                        <input name="street" id="street" class="form-control" value="<?php echo $login_student['street']; ?>" type="text" placeholder="Street" required>
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-location-arrow"></i> </span>
                                        </div>
                                        <input name="city" id="city" class="form-control" value="<?php echo $login_student['city']; ?>" type="text" placeholder="City" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
                                        </div>
                                        <input name="district" id="district" class="form-control" value="<?php echo $login_student['district']; ?>" type="text" placeholder="District" required>
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-map-pin"></i> </span>
                                        </div>
                                        <input name="pin" id="pin" class="form-control" value="<?php echo $login_student['pin']; ?>" type="text" placeholder="Pin" required>
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
                                        <select class="custom-select" id="selectgroup" name="" required>
                                            <option value="0">Select Group</option>
                                            <?php
                                            foreach (array('group' => 'Group 1', 'groups' => 'Group 2/2A') as $key => $val) {
                                                $selected = '';
                                                if ($key == $login_student['selectgroup']) {
                                                    $selected = 'selected';
                                                }
                                                ?>
                                                <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
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