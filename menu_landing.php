<?php
if (isset($_SESSION['student_register_id'])) {
    $login_student = $obj->selectRow('*', 'student_register', 'student_register_id = ' . $_SESSION["student_register_id"]);
}
?>
<header class="header-fixed">
    <div class="container">
        <div class="header-limiter">
            <h1><a href="index"><img src='img/logo.png'></a></h1>
            <div class="custom-full-width-menu">
                <?php
                if (!isset($_SESSION['student_register_id'])) {
                    ?>
                    <nav>
                        <a href="about" class="menu-nav">About Us</a>
                        <a href="contact" class="menu-nav">Contact Us</a>
                        <a href="quiz_page_freesample?from-page=quiz" class="menu-nav">Exit</a>
                        <a href="registration_intro" class="btn btn-green">Buy Full Version</a>
                        <a href="login-page" class="btn btn-custom">Login</a>                    
                    </nav>
                <?php } else { ?>
                    <div class="logout_position main-menu">
                        <a href="member-home" class="user-menu-btn">My Home</a>
                        <a href="select_language" class="user-menu-btn">Test</a>
                        <a class="user-menu-btn" href="about">About Us</a>
                        <a class="user-menu-btn" href="contact">Contact Us</a>
                        <a onclick="logoutUser('<?php echo $login_student['student_name']; ?>');" class="btn logout-btn">Logout</a>
                        <div id="open-logout" class="logout_section">
                            <span class="menu-bar">
                                <i class="fa fa-reorder"></i>
                            </span>
                            <?php //if (isset($login_student['profile_image']) && $login_student['profile_image'] == '') { ?>
                            <!--<img src="<?php //echo BASE_URL . $login_student['gender'];          ?>.jpg" alt="" />-->
                            <?php //} else { ?>
                            <!--<img src="<?php //echo BASE_URL . $login_student['profile_image'];          ?>" alt="" />-->
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
                                    <li onclick="window.location = 'select_language'">Test</li>
                                    <li onclick="window.location = 'student_result'">Result</li>
                                    <li onclick="window.location = 'account'">Account</li>
                                    <!--                                <li onclick="logoutUser();">Logout</li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="custom-mobile-with-menu">
                <?php if (!isset($_SESSION['student_register_id'])) { ?>
                    <div class="logout_position mobile-menu">
                        <div id="open-logout" class="logout_section">
                            <i class="fa fa-bars"></i>
                            <div class="logout_dropdown">
                                <ul class="logout_list">
                                    <li onclick="window.location = 'about'">About us</li>
                                    <li onclick="window.location = 'contact'">Contact us</li>
                                    <li>
                                        <a href="register-intro" class="btn btn-green">Buy Full Version</a>
                                        <a href="login-page" class="btn btn-custom">Login</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="logout_position mobile-main-menu">
                        <a onclick="logoutUser('<?php echo $login_student['student_name']; ?>');" class="btn logout-btn">Logout</a>
                        <div id="open-logout-1" class="logout_section">
                            <span class="menu-bar">
                                <i class="fa fa-reorder"></i>
                            </span>
                            <?php //if (isset($login_student['profile_image']) && $login_student['profile_image'] == '') { ?>
                            <!--<img src="<?php //echo BASE_URL . $login_student['gender'];          ?>.jpg" alt="" />-->
                            <?php //} else { ?>
                            <!--<img src="<?php //echo BASE_URL . $login_student['profile_image'];          ?>" alt="" />-->
                            <?php //} ?>
                            <div class="logout_dropdown logout-dropdown-1">
                                <div class="user_profile">
                                    <?php if (isset($login_student['profile_image']) && $login_student['profile_image'] == '') { ?>
                                        <img src="<?php echo BASE_URL . $login_student['gender']; ?>.jpg" alt="" />
                                    <?php } else { ?>
                                        <img src="<?php echo BASE_URL . $login_student['profile_image']; ?>" alt="" />
                                    <?php } ?>
                                    <h5><?php echo $login_student['student_name']; ?></h5>
                                </div>
                                <ul class="logout_list">
                                    <li onclick="window.location = 'member-home'">My Home</li>
                                    <li onclick="window.location = 'about'">About Us</li>
                                    <li onclick="window.location = 'select_language'">Test</li>
                                    <li onclick="window.location = 'student_result'">Result</li>
                                    <li onclick="window.location = 'account'">Account</li>
                                    <li onclick="window.location = 'contact'">Contact Us</li>
                                    <!--                                <li onclick="logoutUser();">Logout</li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</header>