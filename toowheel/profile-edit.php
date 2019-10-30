<?php
session_start();
if (!isset($_GET["type"]) && !isset($_SESSION["member_id"])) {
    header("Location: ../index.php");
}
$type = $_GET["type"];
require_once "api/include/common.php";
$obj = new Common();
$member = $obj->selectRow('m.*, c.name AS club', 'member AS m LEFT JOIN club AS c ON c.club_id = m.club_id', 'm.member_id = ' . $_SESSION["member_id"]);
$clubs = $obj->selectAll('name, club_id', 'club', 'type = \'' . $member['type'] . '\'');
$states = $obj->selectAll('*', 'state', 'state_id > 0');
?>
<!DOCTYPE html>
<html>
    <?php include "head.php"; ?>
    <body>
        <?php include "menu.php"; ?>
        <div class="padding-top-108"></div>
        <div class="member-register-section">
            <div class="container">
                <div class="col-md-12">
                    <div class="registation-step">
                        <h4>Basic Information</h4>
                        <form id="basic_information" onsubmit="return updateMemberProfile(<?php echo $member['member_id']; ?>, '<?php echo $type; ?>');">
                            <div class="form-group">
                                <label for="type">Type</label>
                                <span class="red-i">*</span>
                                <select class="form-control" name="type" id="type" onchange="loadProfileUpdateClub(this.value, <?php echo $member['club_id']; ?>);">
                                    <?php
                                    foreach (array('four_wheel' => '4 Wheel', 'two_wheel' => '2 Wheel') as $key => $row) {
                                        $selected = '';
                                        if ($member['type'] == $key) {
                                            $selected = 'selected';
                                        }
                                        ?>
                                        <option value="<?php echo $key ?>" <?php echo $selected; ?>><?php echo $row; ?></option>
                                    <?php } ?>
                                </select>
                                <div id="type_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="type">Club</label>
                                <select class="form-control" name="club_id" id="club_id">
                                    <option value="0">None</option>
                                    <?php
                                    foreach ($clubs as $club) {
                                        $selected = '';
                                        if ($club['club_id'] == $member['club_id']) {
                                            $selected = 'selected';
                                        }
                                        ?>
                                        <option value="<?php echo $club['club_id']; ?>" <?php echo $selected; ?>><?php echo $club['name']; ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <span class="red-i">*</span>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="" required-i value="<?php echo $member['first_name']; ?>" onchange="removeValidation('first_name');" />
                                <div id="first_name_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <span class="red-i">*</span>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="" required-i value="<?php echo $member['last_name']; ?>" onchange="removeValidation('last_name');" />
                                <div id="last_name_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <?php
                                    foreach (array('male' => 'Male', 'female' => 'Female') as $key => $val) {
                                        $selected = '';
                                        if ($key == $member['gender']) {
                                            $selected = 'selected';
                                        }
                                        ?>
                                        <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="age">Age</label>
                                <select class="form-control" id="age" name="age">
                                    <?php
                                    foreach (range(15, 99) as $row) {
                                        $selected = '';
                                        if ($row == $member['age']) {
                                            $selected = 'selected';
                                        }
                                        ?>
                                        <option value="<?php echo $row; ?>" <?php echo $selected; ?>><?php echo $row; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="age">Marital Status</label>
                                <select class="form-control" id="marital_status" name="marital_status">
                                    <?php
                                    foreach (array('single' => 'Single', 'married' => 'Married') as $key => $val) {
                                        $selected = '';
                                        if ($key == $member['marital_status']) {
                                            $selected = 'selected';
                                        }
                                        ?>
                                        <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ic_passport">IC Number / Passport Number</label> 
                                <span class="red-i">*</span>
                                <input type="text" class="form-control" name="ic_passport" id="ic_passport" placeholder="" required-i value="<?php echo $member['ic_passport']; ?>" onchange="removeValidation('ic_passport');" />
                                <div id="ic_passport_error"></div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="dob_date">Date of Birth</label> 
                                    <span class="red-i">*</span>
                                    <select class="form-control" id="dob_date" name="dob_date" required-i onchange="removeValidation('dob_date');">
                                        <option value="">Day</option>
                                        <?php
                                        foreach (range(1, 31) as $row) {
                                            $selected = '';
                                            if ($row == $member['dob_date']) {
                                                $selected = 'selected';
                                            }
                                            ?>
                                            <option value="<?php echo $row; ?>" <?php echo $selected; ?>><?php echo $row; ?></option>
                                        <?php } ?>
                                    </select>
                                    <div id="dob_date_error"></div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="dob_month">&nbsp;</label>
                                    <select class="form-control" id="dob_month" name="dob_month" required-i>
                                        <option value="0">Month</option>
                                        <?php
                                        foreach (range(1, 31) as $row) {
                                            $selected = '';
                                            if ($row == $member['dob_month']) {
                                                $selected = 'selected';
                                            }
                                            ?>
                                            <option value="<?php echo $row; ?>" <?php echo $selected; ?>><?php echo $row; ?></option>
                                        <?php } ?>
                                    </select>
                                    <div id="dob_month_error"></div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="dob_year">&nbsp;</label>
                                    <select class="form-control" id="dob_year" name="dob_year" required-i>
                                        <option value="0">Year</option>
                                        <?php
                                        foreach (range(1947, 2003) as $row) {
                                            $selected = '';
                                            if ($row == $member['dob_year']) {
                                                $selected = 'selected';
                                            }
                                            ?>
                                            <option value="<?php echo $row; ?>" <?php echo $selected; ?>><?php echo $row; ?></option>
                                        <?php } ?>
                                    </select>
                                    <div id="dob_year_error"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contact_number">Contact Number</label> 
                                <span class="red-i">*</span>
                                <input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="" required-i value="<?php echo $member['contact_number']; ?>" onchange="removeValidation('contact_number');" />
                                <div id="contact_number_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label> 
                                <input type="email" class="form-control" name="email_id" id="email_id" placeholder="" required-i value="<?php echo $member['email']; ?>" readonly />
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label> 
                                <span class="red-i">*</span>
                                <textarea class="form-control" placeholder="" name="address" id="address" type="text" rows="3" required-i onchange="removeValidation('address');"><?php echo $member['address']; ?></textarea>
                                <div id="address_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label> 
                                <span class="red-i">*</span>
                                <input placeholder="" name="country" id="country" type="text" class="form-control" required-i onchange="removeValidation('country');" value="Malaysia" readonly />
                                <div id="country_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="state_id">State</label> 
                                <span class="red-i">*</span>
                                <select class="form-control" id="state_id" name="state_id" required-i onchange="removeValidation('state_id');">
                                    <option value="">State</option>
                                    <?php
                                    foreach ($states as $row) {
                                        $selected = '';
                                        if ($row['state_id'] == $member['state_id']) {
                                            $selected = 'selected';
                                        }
                                        ?>
                                        <option value="<?php echo $row['state_id']; ?>" <?php echo $selected; ?>><?php echo $row['name']; ?></option>
                                    <?php } ?>
                                </select>
                                <div id="state_id_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="zip_code">Zip Code</label>
                                <span class="red-i">*</span>
                                <input placeholder="" name="zip_code" id="zip_code" type="text" required-i class="form-control" value="<?php echo $member['zip_code']; ?>" onchange="removeValidation('zip_code');">
                                <div id="zip_code_error"></div>
                            </div>
                            <br/>
                            <h4>Referral</h4>
                            <div class="form-group">
                                <label for="referral_member_id">Member ID</label>
                                <input placeholder="" name="referral_member_id" id="referral_member_id" type="text" class="form-control" value="<?php echo $member['refferal_member_id']; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="referral_club_id">Club ID</label>
                                <input placeholder="" id="referral_club_id" name="referral_club_id" type="text" class="form-control" value="<?php echo $member['refferal_club_id']; ?>" />
                            </div>
                            <br/>
                            <h4>Login Information</h4>
                            <div class="form-group">
                                <label for="email">Username</label> 
                                <span class="red-i">*</span>
                                <input type="text" class="form-control" name="email" id="email" placeholder="" required-i onchange="removeValidation('email');" value="<?php echo $member['email']; ?>" readonly />
                                <div id="email_error"></div>
                            </div>
                            <br/>
                            <button class="back-btn" type="submit">Back</button>
                            <button class="update-btn" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="loader loader-default"></div>
        <?php include "footer.php"; ?>
        <script src="js/bootbox.min.js"></script>
        <script src="js/popper.min.js"></script>
    </body>
</html>
