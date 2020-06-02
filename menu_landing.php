<?php
if (isset($_SESSION['student_register_id'])) {
    $login_student = $obj->selectRow('*', 'student_register', 'student_register_id = ' . $_SESSION["student_register_id"]);
}
?>
<header class="header-fixed">
    <div class="header-limiter">
        <h1><a href="index"><img src='img/logo.png'></a></h1>
        <?php
        if (!isset($_SESSION['student_register_id'])) {
            ?>
            <nav>
                <a href="about" class="menu-nav">About Us</a>
                <a href="contact" class="menu-nav">Contact Us</a>
                <a href="registration_intro" class="btn btn-green">Buy Full Version</a>
                <a href="login-page" class="btn btn-custom">Login</a>
            </nav>
        <?php } else { ?>
        
             <div class="logout_position" style="display:block !important;">
                    <a href="member-home" class="user-menu-btn">My Home</a>
                                <a href="select_language" class="user-menu-btn">Quiz</a>
                    
                    <a class="user-menu-btn" href="about">About Us</a>
                    <a class="user-menu-btn" href="contact">Contact Us</a>
                    <a onclick="logoutUser('<?php echo $login_student['student_name']; ?>');" class="btn logout-btn">Logout</a>
                    <div id="open-logout" class="logout_section">
                        <span class="menu-bar">
                            <i class="icon-reorder"></i>
                        </span>
                        <?php //if (isset($login_student['profile_image']) && $login_student['profile_image'] == '') { ?>
                        <!--<img src="<?php //echo BASE_URL . $login_student['gender'];    ?>.jpg" alt="" />-->
                        <?php //} else { ?>
                        <!--<img src="<?php //echo BASE_URL . $login_student['profile_image'];    ?>" alt="" />-->
                        <?php //} ?>
                        <div class="logout_dropdown">
                            <div class="user_profile">
                                <?php if (isset($login_student['profile_image']) && $login_student['profile_image'] == '') { ?>
                                    <img src="<?php echo BASE_URL . $login_student['gender']; ?>.jpg" alt="" />
                                <?php } else { ?>
                                    <img src="<?php echo BASE_URL . $login_student['profile_image']; ?>" alt="" />
                                <?php } ?>
                                <h5><?php echo $login_student['student_name']; ?></h5>
                            </div>
                            <ul class="logout_list">
                                <li onclick="window.location = 'select_language'">Quiz</li>
                                <li onclick="window.location = 'student_result'">Result</li>
                                <li onclick="window.location = 'account'">Account</li>
                                <!--                                <li onclick="logoutUser();">Logout</li>-->
                            </ul>
                        </div>
                    </div>
                </div>
   
            <?php /* ?>
            <div class="logout_position">
                <a onclick="logoutUser('<?php echo $login_student['student_name']; ?>');" class="btn logout-btn">Logout</a>
                <div id="open-logout" class="logout_section">
                    <span class="menu-bar">
                        <i class="icon-reorder"></i>
                    </span>
                    <?php //if (isset($login_student['profile_image']) && $login_student['profile_image'] == '') { ?>
                    <!--<img src="<?php //echo BASE_URL . $login_student['gender'];    ?>.jpg" alt="" />-->
                    <?php //} else { ?>
                    <!--<img src="<?php //echo BASE_URL . $login_student['profile_image'];    ?>" alt="" />-->
                    <?php //} ?>
                    <div class="logout_dropdown">
                        <div class="user_profile">
                            <?php if (isset($login_student['profile_image']) && $login_student['profile_image'] == '') { ?>
                                <img src="<?php echo BASE_URL . $login_student['gender']; ?>.jpg" alt="" />
                            <?php } else { ?>
                                <img src="<?php echo BASE_URL . $login_student['profile_image']; ?>" alt="" />
                            <?php } ?>
                            <h5><?php echo $login_student['student_name']; ?></h5>
                        </div>
                        <ul class="logout_list">
                            <li onclick="window.location = 'select_language'">Quiz</li>
                            <li onclick="window.location = 'student_result'">Result</li>
                            <li onclick="window.location = ''">Account</li>
                            <!--                                <li onclick="logoutUser();">Logout</li>-->
                        </ul>
                    </div>
                </div>
            </div>
            <?php */ ?>
            
        <?php } ?>
        <div class="logout_position">
            <div id="open-logout" class="logout_section">
                <i class="fa fa-bars"></i>
                <div class="logout_dropdown">
                    <ul class="logout_list">
                        <li onclick="window.location = 'about'">About us</li>
                        <li onclick="window.location = 'contact'">Contact us</li>
                        <li>
                            <a href="sample-login" class="btn btn-green">Buy Full Version</a>
                            <a href="login-page" class="btn btn-custom">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>