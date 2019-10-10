<?php
if (!isset($_GET['type'])) {
    header('Location: ../index.php');
}
$type = $_GET['type'];
require_once 'api/include/common.php';
$obj = new Common();
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
                        <form action="" method="post">
                            <h3>Register Your Club</h3>
                            <div class="form-group">
                                <input placeholder="Your club name" name="club_name" type="text" tabindex="1" required autofocus>
                            </div>
                            <div class="form-group">
                                <select name="type" tabindex="2" required>
                                    <option>Type</option>
                                    <option>2 Wheel</option>
                                    <option>4 Wheel</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="category" tabindex="3" required>
                                    <option>Category</option>
                                    <option>125 cc</option>
                                    <option>250 cc</option>
                                    <option>500 cc</option>
                                </select>
                            </div>
                            <br/>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                <label class="custom-file-label" >Choose file...</label>
                            </div>
                            <br/>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                <label class="custom-file-label">Choose file...</label>
                            </div>
                            <br/>
                            <div class="form-group">
                                <input type="text" name="rank" placeholder="Rank" tabindex="6" required />
                            </div>
                            <br/>
                            <div class="form-group">
                                <label>Club Video :</label>
                                <input type="file" name="video" placeholder="" tabindex="7" required />
                            </div>
                            <div class="form-group">
                                <input placeholder="Email Address" name="email" type="email" tabindex="8" required>
                            </div>
                            <div class="form-group">
                                <input placeholder="Contact No." name="contact" type="text" tabindex="9" required>
                            </div>
                            <div class="form-group">
                                <select name="country" tabindex="10" required>
                                    <option value='Malaysia'>Malaysia</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="state" tabindex="11" required>
                                    <option value="0">State</option>
                                    <option value='Kuala_Lumpur'>Kuala Lumpur</option>
                                    <option value='Labuan'>Labuan</option>
                                    <option value='Putrajaya'>Putrajaya</option>
                                    <option value='Johor'>Johor</option>
                                    <option value='Kedah'>Kedah</option>
                                    <option value='Kelantan'>Kelantan</option>
                                    <option value='Malacca'>Malacca</option>
                                    <option value='Negeri_Sembilan'>Negeri Sembilan</option>
                                    <option value='Pahang'>Pahang</option>
                                    <option value='Perak'>Perak</option>
                                    <option value='Perlis'>Perlis</option>
                                    <option value='Penang'>Penang</option>
                                    <option value='Sabah'>Sabah</option>
                                    <option value='Sarawak'>Sarawak</option>
                                    <option value='Selangor'>Selangor</option>
                                    <option value='Terengganu'>Terengganu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input placeholder="City" name="city" type="text" tabindex="12" required>
                            </div>
                            <div class="form-group">
                                <input placeholder="Zip" name="zip" type="text" tabindex="13" required>
                            </div>
                            <div class="form-group">
                                <input placeholder="Landmark" name="landmark" type="text" tabindex="14" required>
                            </div>
                            <div class="form-group">
                                <textarea placeholder="Address" name="address" type="text" tabindex="15" required></textarea>
                            </div>
                            <div class="form-group">
                                <input placeholder="Club Leader name (Full Name)" name="leader_name" type="text" tabindex="16" required>
                            </div>
                            <div class="form-group">
                                <input placeholder="No. of Members" name="no_of_members" type="text" tabindex="17" required>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-6">
                                    <div class="form-group">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                        <input placeholder="Facebook Link" name="fb_link" type="text" tabindex="18" style="padding-left: 40px">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <div class="form-group">
                                        <i class="fa fa-youtube" aria-hidden="true"></i>
                                        <input placeholder="Youtube Link" name="yt_link" type="text" tabindex="19" style="padding-left: 50px">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row input-padding">
                                <div class="col-md-6 mb-6">
                                    <div class="form-group">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                        <input placeholder="Twitter Link" name="tw_link" type="text" tabindex="20" style="padding-left: 40px">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <div class="form-group">
                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                        <input placeholder="Instagram Link" name="insta_link" type="text" tabindex="21" style="padding-left: 40px">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea placeholder="About Club" name="about_club" type="text" tabindex="22" required></textarea>
                            </div>
                            <br/>
                            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>