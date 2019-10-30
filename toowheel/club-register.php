<?php
if (!isset($_GET['type'])) {
    header('Location: ../index.php');
}
$type = $_GET['type'];
require_once 'api/include/common.php';
$obj = new Common();
$states = $obj->selectAll('*', 'state', 'state_id > 0');
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="padding-top-108"></div>
        <div class="club-register-section">
            <div class="container">
                <div class="row">
                    <div id="club-register">
                        <form onsubmit="return registerClub();">
                            <h3>Register Your Club</h3>
                            <h4>Basic Details:</h4>
                            <div class="form-group">
                                <input id="name" placeholder="Your club name" name="name" type="text" tabindex="1" required autofocus />
                            </div>
                            <div class="form-group">
                                <select id="type" name="type" tabindex="2" required onchange="renderCategory(this.value);">                                   
                                    <option value="two_wheel">2 Wheel</option>
                                    <option value="four_wheel">4 Wheel</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select id="category_id" name="category_id" tabindex="3" required></select>
                            </div>
                            <div class="custom-file">
                                <label>Choose Cover Image: </label>
                                <input id="cover_image" name="cover_image" type="file" class="custom-file-input" onchange="attachFile('cover_image');" />
<!--                                <label class="custom-file-label" >Choose Cover Image...</label>-->
                            </div>
                            <br/>
                            <br/>
                            <div class="custom-file">
                                <label>Choose Club Logo: </label>
                                <input id="logo" name="logo" type="file" class="custom-file-input" onchange="attachFile('logo');" />
                            </div>
                            <br/>
                            <br/>
                            <div class="custom-file">
                                <label>Choose Club Video: </label>
                                <input id="club_video" name="club_video" type="file" class="custom-file-input" onchange="attachFile('club_video');" />
                            </div>
                            <br/>
                            <br/>
                             
                            <div class="form-group">
                                <input id="mobile" placeholder="Contact No." name="mobile" type="text" tabindex="9" required />
                            </div>
                            <div class="form-group">
                                <select id="state" name="state" required tabindex="11">                                    
                                    <?php foreach ($states as $row) { ?>
                                        <option value="<?php echo $row['state_id']; ?>"><?php echo $row['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input id="city" placeholder="City" name="city" type="text" tabindex="12" required />
                            </div>
                            <div class="form-group">
                                <input id="zip" placeholder="Zip" name="zip" type="text" tabindex="13" required />
                            </div>
                            <div class="form-group">
                                <input id="landmark" placeholder="Landmark" name="landmark" type="text" tabindex="14" required />
                            </div>
                            <div class="form-group">
                                <textarea id="address" placeholder="Address" name="address" type="text" tabindex="15" required></textarea>
                            </div>
                            <div class="form-group">
                                <input id="club_leader_name" placeholder="Club Leader name (Full Name)" name="club_leader_name" type="text" tabindex="16" required />
                            </div>
                            <div class="form-group">
                                <input id="no_of_member" placeholder="No. of Members" name="no_of_member" type="text" tabindex="17" required />
                            </div>
                            <div class="form-group">
                                <textarea id="about" placeholder="About Club" name="about" type="text" tabindex="22" required></textarea>
                            </div>
                            <h4>Login Details:</h4>
                            <div class="form-group">
                                <input id="email" placeholder="Email Address" name="email" type="email" tabindex="8" required />
                            </div>
                            <div class="form-group">
                                <input id="password" placeholder="Password" name="Password" type="Password" tabindex="8" required />
                            </div>
                            <div class="form-group">
                                <input id="confirm_password" placeholder="Confirm Password" name="confirm_password" type="Password" tabindex="8" required />
                            </div>
                             <h4>Social Media</h4>
                            <div class="form-row">
                                <div class="col-md-6 mb-6">
                                    <div class="form-group">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                        <input id="facebook_link" placeholder="Facebook Link" name="facebook_link" type="text" tabindex="18" style="padding-left: 50px" />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <div class="form-group">
                                        <i class="fa fa-youtube" aria-hidden="true"></i>
                                        <input id="youtube_link" placeholder="Youtube Link" name="youtube_link" type="text" tabindex="19" style="padding-left: 50px" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-row input-padding">
                                <div class="col-md-6 mb-6">
                                    <div class="form-group">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                        <input id="twitter_link" placeholder="Twitter Link" name="twitter_link" type="text" tabindex="20" style="padding-left: 50px" />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <div class="form-group">
                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                        <input id="instagram_link" placeholder="Instagram Link" name="instagram_link" type="text" tabindex="21" style="padding-left: 50px" />
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <button name="submit" type="submit" id="contact-submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="loader loader-default"></div>
        <?php include 'footer.php'; ?>
        <script src="js/bootbox.min.js"></script>
        <script src="js/popper.min.js"></script>
    </body>
</html>