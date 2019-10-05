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
                            <fieldset>
                                <input placeholder="Your club name" type="text" tabindex="1" required autofocus>
                            </fieldset>
                            <fieldset>
                                <select>
                                    <option>Type</option>
                                    <option>2 Wheel</option>
                                    <option>4 Wheel</option>
                                </select>
                            </fieldset>
                            <fieldset>
                                <select>
                                    <option>Category</option>
                                    <option>125 cc</option>
                                    <option>250 cc</option>
                                    <option>500 cc</option>
                                </select>
                            </fieldset>
                            <fieldset>
                                <select>
                                    <option value="0">Country</option>
                                    <option value='India'>India</option>
                                    <option value='Malaysia'>Malaysia</option>
                                </select>
                            </fieldset>
                            <fieldset>
                                <select>
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
                            </fieldset>
                            <fieldset>
                                <select>
                                    <option value="0">City</option>
                                    <option value='Kuala_Lumpur'>Kuala Lumpur</option>
                                    <option value='Victoria'>Victoria</option>
                                    <option value='Putrajaya'>Putrajaya</option>
                                    <option value='Johor_Bahru'>Johor Bahru</option>
                                    <option value='Alor_Setar'>Alor Setar</option>
                                    <option value='Kota_Bharu'>Kota Bharu</option>
                                    <option value='Malacca_City'>Malacca City</option>
                                    <option value='Seremban'>Seremban</option>
                                    <option value='Kuantan'>Kuantan</option>
                                    <option value='Ipoh'>Ipoh</option>
                                    <option value='Kangar'>Kangar</option>
                                    <option value='George_Town'>George Town</option>
                                    <option value='Kota_Kinabalu'>Kota Kinabalu</option>
                                    <option value='Kuching'>Kuching</option>
                                    <option value='Shah_Alam'>Shah Alam</option>
                                    <option value='Kuala_Terengganu'>Kuala Terengganu</option>
                                </select>
                            </fieldset>
                            <fieldset>
                                <input placeholder="Zip" type="text" tabindex="4" required>
                            </fieldset>
                            <fieldset>
                                <textarea placeholder="Address" type="text" tabindex="5" required></textarea>
                            </fieldset>
                            <fieldset>
                                <input placeholder="Club Leader name (Full Name)" type="text" tabindex="6" required>
                            </fieldset>
                            <fieldset>
                                <input placeholder="No. of Members" type="text" tabindex="7" required>
                            </fieldset>
                            <fieldset>
                                <input placeholder="Email Address" type="email" tabindex="8" required>
                            </fieldset>
                            <fieldset>
                                <input placeholder="Contact No." type="text" tabindex="9" required>
                            </fieldset>
                            <fieldset>
                                <textarea placeholder="About Club" type="text" tabindex="10" required></textarea>
                            </fieldset>
                            <fieldset>
                                <br/>
                                <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
                            </fieldset>
                        </form>
                        <!--                        <div class="already-account">
                                                    <p>Have already an account? <a href="login.php">Login here</a></p>
                                                </div>-->
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>