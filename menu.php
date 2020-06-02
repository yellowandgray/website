<?php
if (isset($_SESSION['student_register_id'])) {
    $login_student = $obj->selectRow('*', 'student_register', 'student_register_id = ' . $_SESSION["student_register_id"]);
}
?>
<header>
    <div class = 'container'>
        <div class = 'row nomargin'>
            <div class = 'span4 no-margin'>
                <div class = 'logo'>
                     <?php
            if (!isset($_SESSION['student_register_id'])) {
                ?>
                    <a href = 'index'>
                        <img src = 'img/logo.png' alt = '' class = 'logo' />
                    </a>
            <?php }else { ?>   
                    <a href = 'select_language'>
                        <img src = 'img/logo.png' alt = '' class = 'logo' />
                    </a>
                 <?php } ?>   
                </div>
            </div>
            <?php
            if (!isset($_SESSION['student_register_id'])) {
                
                ?>
                <?php  /* */ ?>
                <div class = 'span8'>
                    <div class = 'headnav'>
                        <ul>
                            <li class="menu-cus-clr">
                                <a href="about" class="menu-nav">About Us</a>
                                <a href="contact" class="menu-nav">Contact Us</a>
                            </li>
                            <li>
                                <a href = 'register_user'>
    <!--                                    <i class = 'icon-user'></i>-->
                                    <button class="btn btn-custom" style="background: green">Buy Full Version</button>
                                </a>
                                <a href = 'login-page'>
                                    <button class="btn btn-custom">Login</button>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class = 'headnav-1'>
                        <ul>
                            <li>
                                <a href = 'login-page'>
                                    <i class = 'icon-user'></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
             <?php  /* 
                 */ ?>
            <?php } else {                
                ?>
                <div class="logout_position" style="display:block !important;">
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
            <?php }
            ?>
        </div>
        <!--        <div class = 'row'>

        <div class = 'span8'>
        <div class = 'navbar navbar-static-top'>
        <div class = 'navigation'>
        <nav>
        <ul class = 'nav topnav'>
        <li class = 'dropdown active'>
        <a href = 'index.html'>Home <i class = 'icon-angle-down'></i></a>
        <ul class = 'dropdown-menu'>
        <li><a href = 'index-alt2.html'>Homepage 2</a></li>
        <li><a href = 'index-alt3.html'>Homepage 3</a></li>
        </ul>
        </li>
        <li class = 'dropdown'>
        <a href = '#'>Features <i class = 'icon-angle-down'></i></a>
        <ul class = 'dropdown-menu'>
        <li><a href = 'typography.html'>Typography</a></li>
        <li><a href = 'table.html'>Table</a></li>
        <li><a href = 'components.html'>Components</a></li>
        <li><a href = 'animations.html'>56 Animations</a></li>
        <li><a href = 'icons.html'>Icons</a></li>
        <li><a href = 'icon-variations.html'>Icon variations</a></li>
        <li class = 'dropdown'><a href = '#'>3 Sliders <i class = 'icon-angle-right'></i></a>
        <ul class = 'dropdown-menu sub-menu-level1'>
        <li><a href = 'index.html'>Nivo slider</a></li>
        <li><a href = 'index-alt2.html'>Slit slider</a></li>
        <li><a href = 'index-alt3.html'>Parallax slider</a></li>
        </ul>
        </li>
        </ul>
        </li>
        <li class = 'dropdown'>
        <a href = '#'>Pages <i class = 'icon-angle-down'></i></a>
        <ul class = 'dropdown-menu'>
        <li><a href = 'about.html'>About us</a></li>
        <li><a href = 'pricingbox.html'>Pricing boxes</a></li>
        <li><a href = 'testimonials.html'>Testimonials</a></li>
        <li><a href = '404.html'>404</a></li>
        </ul>
        </li>
        <li class = 'dropdown'>
        <a href = '#'>Portfolio <i class = 'icon-angle-down'></i></a>
        <ul class = 'dropdown-menu'>
        <li><a href = 'portfolio-2cols.html'>Portfolio 2 columns</a></li>
        <li><a href = 'portfolio-3cols.html'>Portfolio 3 columns</a></li>
        <li><a href = 'portfolio-4cols.html'>Portfolio 4 columns</a></li>
        <li><a href = 'portfolio-detail.html'>Portfolio detail</a></li>
        </ul>
        </li>
        <li class = 'dropdown'>
        <a href = '#'>Blog <i class = 'icon-angle-down'></i></a>
        <ul class = 'dropdown-menu'>
        <li><a href = 'blog-left-sidebar.html'>Blog left sidebar</a></li>
        <li><a href = 'blog-right-sidebar.html'>Blog right sidebar</a></li>
        <li><a href = 'post-left-sidebar.html'>Post left sidebar</a></li>
        <li><a href = 'post-right-sidebar.html'>Post right sidebar</a></li>
        </ul>
        </li>
        <li>
        <a href = 'contact.html'>Contact </a>
        </li>
        </ul>
        </nav>
        </div>
        end navigation
        </div>
        </div>
        </div>-->
    </div>
</header>
