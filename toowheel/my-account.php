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
                        <div><a href="#" class="change-password"><img src="img/my-account/edit.png" alt="" /></a></div>
                        <div><img src="img/my-account/setting.png" alt="" /></div>
                        <div><img src="img/my-account/bell.png" alt="" /></div>
                    </div>
                </div>
                <!--<div class="row profile-section">-->
                <div class="row">
                    <div class="col-md-4 profile-picture-section">
                        <div class="">
                            <img src="img/my-account/person.png" alt="" />
                        </div>
                    </div>
                    <div class="col-md-8 profile-details-section">
                        <div class="profile-club-details">
                            <span>2 WHEELS</span>
                            <span>250CC</span>
                        </div>
                        <div class="profile-club-details">
                            <span>RTM BIKERS CLUB</span>
                            <span>Invite a Friend</span>
                        </div>
                        <h2>MUHAMAD HAFIZI</h2>
                    </div>
                </div>
                <div class="row margin-b-40">
                    <div class="col-md-2"></div>
                    <div class="col-md-6">
                        <div class="profile-table">
                            <table>
                                <tr>
                                    <th>Age</th>
                                    <td>:</td>
                                    <td>34</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>:</td>
                                    <td>Male</td>
                                </tr>
                                <tr>
                                    <th>Date of Birth</th>
                                    <td>:</td>
                                    <td>November 14 1985</td>
                                </tr>
                                <tr>
                                    <th>Email Address</th>
                                    <td>:</td>
                                    <td>Muhamadhafizi@gmail.com</td>
                                </tr>
                                <tr>
                                    <th>Contact No</th>
                                    <td>:</td>
                                    <td>+3011 245 24077</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>:</td>
                                    <td>Jalan SS 6/3, Ss 6, 47301<br/> Petaling Jaya, Selangor.</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="profile-details-section-1">
                            <div class="profile-table">
                                <h4>COVERAGE INFORMATION (NEXT OF KIN)</h4>
                                <table>
                                    <tr>
                                        <th>Full Name</th>
                                        <td>:</td>
                                        <td>Muhamad Farhan</td>
                                    </tr>
                                    <tr>
                                        <th>Contact No.</th>
                                        <td>:</td>
                                        <td>+3011 245 24077</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>:</td>
                                        <td>Jalan SS 6/3, Ss 6, 47301<br/> Petaling Jaya, Selangor.</td>
                                    </tr>
                                </table>
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
                                <h4>345</h4>
                                <span>RM 172.50</span>
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
                                <h4>30</h4>
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
                                <h4>76</h4>
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
                    <input type="password" name="password" placeholder="Enter Your New Password" />
                    <center><button type="submit">Submit</button></center>
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