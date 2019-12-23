<?php
session_start();
$login_member = $obj->selectRow('*', 'student_register', 'student_register_id = ' . $_SESSION["student_register_id"]);
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
                    <!--                        <img src = 'img/logo.png' alt = '' class = 'logo' />-->
                        <h1>Feringo</h1>
                    </a>
                </div>
            </div>
            <?php
            if (!isset($_SESSION['student_register_id'])) {
                foreach ($login_member as $row)
                    
                    ?>
                <div class = 'span8'>
                    <div class = 'headnav'>
                        <ul>
                            <li><a href = '#mySignup' data-toggle = 'modal'><i class = 'icon-user'></i> Register</a></li>
                            <li>
                                <a href = '#mySignin' data-toggle = 'modal'>Sign in</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Signup Modal -->
                    <div id = 'mySignup' class = 'modal styled hide fade' tabindex = '-1' role = 'dialog' aria-labelledby = 'mySignupModalLabel' aria-hidden = 'true'>
                        <div class = 'modal-header'>
                            <button type = 'button' class = 'close' data-dismiss = 'modal' aria-hidden = 'true'>×</button>
                            <h4 id = 'mySignupModalLabel'>Register <strong>Form</strong></h4>
                        </div>
                        <div class = 'modal-body'>
                            <form class = 'form-horizontal student-register'onsubmit = 'return registerStudent();'>
                                <div class = 'control-group'>
                                    <label class = 'control-label' for = 'username'>User Name</label>
                                    <div class = 'controls'>
                                        <input type = 'text' id = 'user_name' placeholder = 'User Name' required>
                                    </div>
                                </div>
                                <div class = 'control-group'>
                                    <label class = 'control-label' for = 'student-name'>Student Name</label>
                                    <div class = 'controls'>
                                        <input type = 'text' id = 'student_name' placeholder = 'Student Name' required>
                                    </div>
                                </div>
                                <div class = 'control-group'>
                                    <label class = 'control-label' for = 'parent_name'>Parent Name</label>
                                    <div class = 'controls'>
                                        <input type = 'text' id = 'parent_name' placeholder = 'Parent Name' required>
                                    </div>
                                </div>
                                <div class = 'control-group'>
                                    <label class = 'control-label' for = 'mobile'>Mobile</label>
                                    <div class = 'controls'>
                                        <input type = 'text' id = 'mobile' maxlength = '10' placeholder = 'Ex:123-456-7890' pattern = '[0-9]{10}' required>
                                    </div>
                                </div>
                                <div class = 'control-group'>
                                    <label class = 'control-label' for = 'city'>Town/City</label>
                                    <div class = 'controls'>
                                        <input type = 'text' id = 'city' placeholder = 'Town/City' required>
                                    </div>
                                </div>
                                <div class = 'control-group'>
                                    <label class = 'control-label' for = 'pin'>Pin</label>
                                    <div class = 'controls'>
                                        <input type = 'text' id = 'pin' placeholder = 'Pin' required>
                                    </div>
                                </div>
                                <div class = 'control-group'>
                                    <label class = 'control-label' for = 'school_name'>School Name</label>
                                    <div class = 'controls'>
                                        <input type = 'text' id = 'school_name' placeholder = 'School Name' required>
                                    </div>
                                </div>
                                <div class = 'control-group'>
                                    <label class = 'control-label' for = 'slelct_standard'>Select Standard</label>
                                    <div class = 'controls'>
                                        <select id = 'select_standard' required>
                                            <option value = '10th-State-Board'>10th State Board</option>
                                            <option value = '10th-CBSC'>10th CBSC</option>
                                        </select>
                                    </div>
                                </div>
                                <div class = 'control-group'>
                                    <label class = 'control-label' for = 'password'>Password</label>
                                    <div class = 'controls'>
                                        <input type = 'password' id = 'password' placeholder = 'Password' required>
                                    </div>
                                </div>
                                <div class = 'control-group'>
                                    <label class = 'control-label' for = 'confirm_password'>Confirm Password</label>
                                    <div class = 'controls'>
                                        <input type = 'password' id = 'confirm_password' placeholder = 'Confirm Password' required>
                                    </div>
                                </div>
                                <div class = 'control-group'>
                                    <label class = 'control-label' for = 'email'>Email</label>
                                    <div class = 'controls'>
                                        <input type = 'email' id = 'email' placeholder = 'Email (Option)'>
                                    </div>
                                </div>
                                <div class = 'control-group'>
                                    <div class = 'controls'>
                                        <button name = 'submit' type = 'submit' id = 'contact-submit' class = 'btn'>Sign up</button>
                                    </div>
                                    <p class = 'aligncenter margintop20'>
                                        Already have an account? <a href = '#mySignin' data-dismiss = 'modal' aria-hidden = 'true' data-toggle = 'modal'>Sign in</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
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
                <div class = "">
                    <h5>Test</h5>
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