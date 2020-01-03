<?php
if (isset($_SESSION['student_register_id'])) {
    $login_member = $obj->selectRow('*', 'student_register', 'student_register_id = ' . $_SESSION["student_register_id"]);
}
?>
<header>
    <div class = 'container'>
        <!-- hidden top area toggle link -->
        <!--                    <div id = 'header-hidden-link'>
        <a href = '#' class = 'toggle-link' title = "Click me you'll get a surprise" data-target = '.hidden-top'><i></i>Open</a>
        </div>-->
        <!-- end toggle link -->
        <div class = 'row nomargin'>
            <div class = 'span4'>
                <div class = 'logo'>
                    <a href = 'index'>
                        <img src = 'img/logo.png' alt = '' class = 'logo' />
                        <!--                        <h1>Feringo</h1>-->
                    </a>
                </div>
            </div>
            <?php
            if (!isset($_SESSION['student_register_id'])) {
                ?>
                <div class = 'span8'>
                    <div class = 'headnav'>
                        <ul>
                            <li>
                                <a href = '#mySignup' data-toggle = 'modal'><i class = 'icon-user'></i> Register</a>
                            </li>
                            <li>
                                <a href = '#mySignin' data-toggle = 'modal'>Sign in</a>
                            </li>
                        </ul>
                    </div>
                    <div class = 'headnav-1'>
                        <ul>
                            <li>
                                <a href = '#mySignup' data-toggle = 'modal'>
                                    <i class = 'icon-user'></i>
                                </a>
                            </li>
                            <li>
                                <a href = '#mySignin' data-toggle = 'modal'>
                                    <i class="icon-signin"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Signup Modal -->
                    <?php include 'singnup.php'; ?>
                    <!-- end signup modal -->
                    <!-- Sign in Modal -->
                    <?php include 'login.php';
                    ?>
                    <!-- end signin modal -->
                    <!-- Reset Modal -->
                    <?php include 'reset_password.php'; ?>
                    <!-- end reset modal -->
                </div>
            <?php } else {
                ?>
                <div class="logout_position">
                    <div id="open-logout" class="logout_section" style="background: url(img/avatar.png)no-repeat;background-position: center;">
                        <div class="logout_dropdown">
                            <div class="user_profile">
                                <img src="img/avatar_1.png" alt="" />
                                <h5><?php echo $login_member['student_name']; ?></h5>
                            </div>
                            <ul class="logout_list">
                                <li onclick="window.location = 'home_subject'">Subject</li>
                                <li onclick="window.location = 'student_result'">Result</li>
                                <li onclick="logoutUser();">Logout</li>
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
