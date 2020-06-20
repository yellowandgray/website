<?php
if (isset($_SESSION['student_register_id'])) {
    $login_student = $obj->selectRow('*', 'student_register', 'student_register_id = ' . $_SESSION["student_register_id"]);
}
?>
<header class="header-fixed">
    <div class="container">
        <div class="header-limiter">
            <h1><a href="index"><img src='img/ExamHorse-Logo-New.png'></a></h1>
            <div class="custom-full-width-menu">
                <?php
                if (!isset($_SESSION['student_register_id'])) {
                    ?>
                    <nav>
                        <a href="about-us" class="menu-nav">About Us</a>
                        <a href="contact-us" class="menu-nav">Contact Us</a>
                        <a href="free-practice-test?from-page=quiz" class="menu-nav">Exit</a>
                        <a href="member-benefits" class="btn btn-green">Buy Full Version</a>
                        <a href="member-signin" class="btn btn-custom">Login</a>                    
                    </nav>
                <?php } else { ?>
                    <div class="logout_position main-menu">
                        <a href="member-home" class="user-menu-btn">My Home</a>
                        <a href="member-select-language" class="user-menu-btn">Test</a>
                        <a class="user-menu-btn" href="about-us">About Us</a>
                        <a class="user-menu-btn" href="contact-us">Contact Us</a>
                        <a onclick="logoutUser('<?php echo $login_student['student_name']; ?>');" class="btn logout-btn">Logout</a>
                        <div id="open-logout" class="logout_section">
                            <span class="menu-bar">
                                <i class="fa fa-reorder"></i>
                            </span>
                            <?php //if (isset($login_student['profile_image']) && $login_student['profile_image'] == '') { ?>
                            <!--<img src="<?php //echo BASE_URL . $login_student['gender'];               ?>.jpg" alt="" />-->
                            <?php //} else { ?>
                            <!--<img src="<?php //echo BASE_URL . $login_student['profile_image'];               ?>" alt="" />-->
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
                                    <li onclick="window.location = 'member-select-language'">Test</li>
                                    <li onclick="window.location = 'member-result'">Result</li>
                                    <li onclick="window.location = 'member-account'">Account</li>
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
                        </div>
                    </div>
                    <div class="logout_dropdown">
                        <ul class="logout_list">
                            <li onclick="window.location = 'about-us'">About us</li>
                            <li onclick="window.location = 'contact-us'">Contact us</li>
                            <li>
                                <a href="member-benefits" class="btn btn-green">Buy Full Version</a>
                                <a href="member-signin" class="btn btn-custom">Login</a>
                            </li>
                        </ul>
                    </div>
                <?php } else { ?>
                    <div class="logout_position mobile-main-menu">
                        <a onclick="logoutUser('<?php echo $login_student['student_name']; ?>');" class="btn logout-btn">Logout</a>
                        <div id="open-logout-1" class="logout_section">
                            <span class="menu-bar">
                                <i class="fa fa-reorder"></i>
                            </span>
                        </div>
                    </div>
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
                            <li onclick="window.location = 'about-us'">About Us</li>
                            <li onclick="window.location = 'member-select-language'">Test</li>
                            <li onclick="window.location = 'member-result'">Result</li>
                            <li onclick="window.location = 'member-account'">Account</li>
                            <li onclick="window.location = 'contact-us'">Contact Us</li>
                            <!--                                <li onclick="logoutUser();">Logout</li>-->
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</header>