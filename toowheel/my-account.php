<?php
session_start();
if (!isset($_GET["type"]) && !isset($_SESSION["member_id"])) {
    header("Location: ../index.php");
}
$type = $_GET["type"];
require_once "api/include/common.php";
$obj = new Common();
$member = $obj->selectRow('m.*, c.name AS club', 'member AS m LEFT JOIN club AS c ON c.club_id = m.club_id', 'm.member_id = ' . $_SESSION["member_id"]);
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="padding-top-108"></div>
        <div class="my-account-section">
            <div class="container">
                <div class="display-flex editing-icon">
                    <div class="flex-icon">
                        <!--<div><img src="img/my-account/edit.png" alt="" /></div>-->
                        <div><a href="#" class="change-password"><img src="img/my-account/setting.png" alt="" /></a></div>
                        <!--<div><img src="img/my-account/bell.png" alt="" /></div>-->
                    </div>
                </div>
                <!--<div class="row profile-section">-->
                <div class="row">
                    <div class="col-md-4 profile-picture-section">
                        <div class="member-profile-image">
                            <?php if (isset($member['profile_picture']) && $member['profile_picture'] == '') { ?>
                                <img src="<?php echo BASE_URL . $member['gender']; ?>.jpg" alt="" />
                            <?php } else { ?>
                                <img src="<?php echo BASE_URL . $member['profile_picture']; ?>" alt="" />
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-8 profile-details-section">
                        <div class="profile-club-details">
                            <span><?php echo $member['type'] == 'two_wheel' ? '2 WHEELS' : '4 WHEELS'; ?></span>
                        </div>
                        <div class="profile-club-details">
                            <span><?php echo $member['club'] && isset($member['club']) ? $member['club'] : 'No club selected'; ?></span>
                            <span>Invite a Friend</span>
                        </div>
                        <h2><?php echo $member['first_name'] . ' ' . $member['last_name']; ?></h2>
                    </div>
                </div>
                <div class="row margin-b-40 edit">
                    <div class="col-md-2"></div>
                    <div class="col-md-6 ">
                        <i class="fa fa-times basic-info-edit-action-icon hidden" onclick="disableProfileEdit();" aria-hidden="true"></i>
                        <i class="fa fa-check basic-info-edit-action-icon hidden" onclick="updateProfile(<?php echo $member['member_id']; ?>, 'basic');" aria-hidden="true"></i>
                        <i class="fa fa-pencil basic-info-normal-action-icon" onclick="enableProfileEdit();" aria-hidden="true"></i>
                        <div class="profile-table">
                            <table>
                                <tr>
                                    <th>Age</th>
                                    <td>:</td>
                                    <td class="member-basic-info-fixed"><?php echo $member['age']; ?></td>
                                    <td class="member-basic-info-edit hidden">
                                        <select class="form-control" id="age" name="age" value="<?php echo $member['age']; ?>">
                                            <?php
                                            foreach (range(20, 99) as $row) {
                                                $selected = '';
                                                if ($row == $member['age']) {
                                                    $selected = 'selected';
                                                }
                                                ?>
                                                <option value="<?php echo $row ?>" <?php echo $selected; ?>><?php echo $row; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>:</td>
                                    <td class="member-basic-info-fixed"><?php echo strtoupper($member['gender']); ?></td>
                                    <td class="member-basic-info-edit hidden">
                                        <select class="form-control" id="gender" name="gender">
                                            <?php
                                            foreach (array('male' => 'Male', 'female' => 'Female') as $key => $row) {
                                                $selected = '';
                                                if ($key == $member['gender']) {
                                                    $selected = 'selected';
                                                }
                                                ?>
                                                <option value="<?php echo $key ?>" <?php echo $selected; ?>><?php echo $row; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Date of Birth</th>
                                    <td>:</td>
                                    <td class="member-basic-info-fixed"><?php echo $member['dob_date'] . '-' . str_pad($member['dob_month'], 2, "0", STR_PAD_LEFT) . '-' . $member['dob_year']; ?></td>
                                    <td class="member-basic-info-edit hidden">
                                        <input type="date" value="<?php echo $member['dob_year'] . '-' . str_pad($member['dob_month'], 2, "0", STR_PAD_LEFT) . '-' . $member['dob_date']; ?>" name="dob" id="dob" />
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email Address</th>
                                    <td>:</td>
                                    <td><?php echo strtoupper($member['email']); ?></td>
                                </tr>
                                <tr>
                                    <th>Contact No</th>
                                    <td>:</td>
                                    <td><?php echo $member['contact_number']; ?></td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>:</td>
                                    <td class="member-basic-info-fixed"><?php echo $member['address']; ?></td>
                                    <td class="member-basic-info-edit hidden">
                                        <textarea name="address" id="address"><?php echo $member['address']; ?></textarea>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="profile-details-section-1">
                            <i class="fa fa-times coverage-edit-action-icon hidden" onclick="disableCoverageEdit();" aria-hidden="true"></i>
                            <i class="fa fa-check coverage-edit-action-icon hidden" aria-hidden="true"></i>
                            <i class="fa fa-pencil coverage-normal-action-icon" onclick="enableCoverageEdit();" aria-hidden="true"></i>
                            <div class="coverage-table">
                                <h4>COVERAGE INFORMATION (NEXT OF KIN)</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table>
                                            <tr>
                                                <th>Spouse Name</th>
                                                <th>IC Number</th>
                                            </tr>
                                            <tr>
                                                <td class="coverage-info-fixed">Spouse Name</td>
                                                <td class="coverage-info-edit hidden"><input type="text" value="<?php echo $member['dob_date']; ?>" name="dob" id="dob" /></td>
                                                <td class="coverage-info-fixed">Spouse Name</td>
                                                <td class="coverage-info-edit hidden"><input type="text" value="<?php echo $member['dob_date']; ?>" name="dob" id="dob" /></td>
                                            </tr>
                                            <tr>
                                                <th>Kid One</th>
                                                <th>MY KID ID</th>
                                            </tr>
                                            <tr>
                                                <td class="coverage-info-fixed">Spouse Name</td>
                                                <td class="coverage-info-edit hidden"><input type="text" value="<?php echo $member['dob_date']; ?>" name="dob" id="dob" /></td>
                                                <td class="coverage-info-fixed">Spouse Name</td>
                                                <td class="coverage-info-edit hidden"><input type="text" value="<?php echo $member['dob_date']; ?>" name="dob" id="dob" /></td>
                                            </tr>
                                            <tr>
                                                <th>Kid One</th>
                                                <th>MY KID ID</th>
                                            </tr>
                                            <tr>
                                                <td class="coverage-info-fixed">Spouse Name</td>
                                                <td class="coverage-info-edit hidden"><input type="text" value="<?php echo $member['dob_date']; ?>" name="dob" id="dob" /></td>
                                                <td class="coverage-info-fixed">Spouse Name</td>
                                                <td class="coverage-info-edit hidden"><input type="text" value="<?php echo $member['dob_date']; ?>" name="dob" id="dob" /></td>
                                            </tr>
                                            <tr>
                                                <th>Kid One</th>
                                                <th>MY KID ID</th>
                                            </tr>
                                            <tr>
                                                <td class="coverage-info-fixed">Spouse Name</td>
                                                <td class="coverage-info-edit hidden"><input type="text" value="<?php echo $member['dob_date']; ?>" name="dob" id="dob" /></td>
                                                <td class="coverage-info-fixed">Spouse Name</td>
                                                <td class="coverage-info-edit hidden"><input type="text" value="<?php echo $member['dob_date']; ?>" name="dob" id="dob" /></td>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr>
                                                <th>Name</th>
                                                <th>IC Number</th>
                                            </tr>
                                            <tr>
                                                <td class="coverage-info-fixed">Spouse Name</td>
                                                <td class="coverage-info-edit hidden"><input type="text" value="<?php echo $member['dob_date']; ?>" name="dob" id="dob" /></td>
                                                <td class="coverage-info-fixed">Spouse Name</td>
                                                <td class="coverage-info-edit hidden"><input type="text" value="<?php echo $member['dob_date']; ?>" name="dob" id="dob" /></td>
                                            </tr>
                                            <tr>
                                                <th colspan="2">Address</th>
                                            </tr>
                                            <tr>
                                                <td class="coverage-info-fixed" colspan="2">Kid</td>
                                                <td class="coverage-info-edit hidden" colspan="2"><textarea name="address" id="address"><?php echo $member['addresss']; ?></textarea></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="refer-point-section">
            <div class="container">
                <div class="row box-refer">
                    <div class="col-md-4 refer-border">
                        <div class="row">
                            <div class="col-md-6 refer-point-img">
                                <img src="img/my-account/point.png" alt="" />
                                <h5>POINTS</h5>
                            </div>
                            <div class="col-md-6 refer-point-num">
                                <h4>0</h4>
                                <span>RM 0</span>
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-4 refer-border-1">
                        <div class="row">
                            <div class="col-md-6 refer-point-img">
                                <img src="img/my-account/referal.png" alt="" />
                                <h5>REFERAL</h5>
                            </div>
                            <div class="col-md-6 refer-point-num">
                                <h4>0</h4>
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-4 refer-border-2">
                        <div class="row">
                            <div class="col-md-6 refer-point-img">
                                <img src="img/my-account/event.png" alt="" />
                                <h5>EVENTS ATTENDED</h5>
                            </div>
                            <div class="col-md-6 refer-point-num">
                                <h4>0</h4>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <!-- Change Password Pop Up -->
        <div class="password-popup">
            <div class="popup-box">
                <i class="fa fa-times-circle" aria-hidden="true"></i>
                <div class="margin-top-30">
                    <h4>Change Your Register password!</h4>
                    <input type="password" onchange="removeValidation('curr_password');" name="curr_password" id="curr_password" placeholder="Enter Your Current Password" />
                    <div id="curr_password_error"></div>
                    <br/>
                    <input type="password" onchange="removeValidation('new_password');" name="new_password" id="new_password" placeholder="Enter Your New Password" />
                    <div id="new_password_error"></div>
                    <br/>
                    <input type="password" onchange="removeValidation('confirm_password');" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password" />
                    <div id="confirm_password_error"></div>
                    <center>
                        <button type="button" onclick="updatePassword();">Submit</button>
                    </center>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
        <script>
            $(".change-password").click(
                    function () {
                        $(".password-popup").fadeIn('slow');
                    }
            );

            $(".password-popup i").click(
                    function () {
                        $(".password-popup").fadeOut('fast');
                    }
            );

            //Thanks for Iphone titlebar fix http://coding.smashingmagazine.com/2013/05/02/truly-responsive-lightbox/

            var getIphoneWindowHeight = function () {
                // Get zoom level of mobile Safari
                // Such zoom detection might not work correctly on other platforms
                // 
                var zoomLevel = document.documentElement.clientWidth / window.innerWidth;

                // window.innerHeight returns height of the visible area. 
                // We multiply it by zoom and get our real height.
                return window.innerHeight * zoomLevel;
            };
        </script>
    </body>
</html>