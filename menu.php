<nav class="colorlib-nav" role="navigation">
    <div class="upper-menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-4">
                    <p>
<!--                        <i class="fa fa-phone"></i>&nbsp;<a href="tel:+91 93840 10241">+91 93840 10241</a>&nbsp;&nbsp;-->
                        <i class="fa fa-envelope"></i>&nbsp;<a href="mailto:info@enpeekkl.com">info@enpeekkl.com</a>
                    </p>
                </div>
                <div class="col-xs-6 col-md-push-2 text-right">
                    <p>
<!--                    <ul class="colorlib-social-icons">
                        <li><a href="#"><i class="fa fa-facebook-official"></i></a></li>&nbsp;
                        <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>&nbsp;
                        <li><a href="#"><i class="fa fa-youtube-square"></i></a></li>&nbsp;
                    </ul>-->
                    </p>
                    <p class="btn-apply"><a href="index.php#enquiry">Enquire Now</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div id="colorlib-logo"><a href="index.php"><img style="width: 200px;height: 130px; padding-bottom: 10px;" class="logo" src="images/logo-np.png" alt=""/></a></div>
                </div>
                <div class="col-md-10 text-right menu-1">
                    <ul>
                        <li class="<?php
                        if ($page == 'home') {
                            echo 'active';
                        }
                        ?>"><a href="index.php">Home</a></li>
                        <li class="dropdown <?php
                        if ($page == 'about') {
                            echo 'active';
                        }
                        ?>">
                            <a href="about.php">About Us</a>
                            <ul class="dropdown-content">
                                <li><a href="promoters.php">Promoters</a></li>
                                <li><a href="management.php">Management</a></li>
                                <li><a href="advisory-board.php">Advisory Board</a></li>
                            </ul>
                        </li>
                        <li class="<?php
                        if ($page == 'chateau') {
                            echo 'active';
                        }
                        ?>"><a href="chateau-francais.php">Château Français</a></li>
                        <li class="<?php
                        if ($page == 'way-work') {
                            echo 'active';
                        }
                        ?>"><a href="way-we-work.php">The way we work</a></li>
                        <li class="<?php
                        if ($page == 'programs-offered') {
                            echo 'active';
                        }
                        ?>"><a href="programs-offered.php">Programs offered</a></li>
                        <li class="<?php
                        if ($page == 'make-different') {
                            echo 'active';
                        }
                        ?>"><a href="what-makes-different.php">What makes us different</a></li>
                        <li class="<?php
                        if ($page == 'contact') {
                            echo 'active';
                        }
                        ?>"><a href="contact.php">Contact</a></li>
<!--                        <li class="btn-cta"><a href="#"><span>Free Trial</span></a></li>-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-container">

        <!-- Top Navigation Menu -->
        <div class="topnav" style="background: #fff">
            <div id="colorlib-logo"><a href="index.php"><img style="width: 200px;height: 130px; padding-bottom: 10px;" class="mobile-logo" src="images/logo-np.png" alt=""/></a></div>
            <div id="myLinks">
                <ul>
                    <li class="<?php
                    if ($page == 'home') {
                        echo 'active';
                    }
                    ?>"><a href="index.php">Home</a></li>
                    <li class="dropdown <?php
                    if ($page == 'about') {
                        echo 'active';
                    }
                    ?>">
                        <a href="about.php">About Us <i class="fas fa-sort-down" id="show"></i></a>
                        <ul class="dropdown-content">
                            <li><a href="promoters.php">Promoters</a></li>
                            <li><a href="management.php">Management</a></li>
                        </ul>
                    </li>
                    <li class="<?php
                    if ($page == 'chateau') {
                        echo 'active';
                    }
                    ?>"><a href="chateau-francais.php">Château Français</a></li>
                    <li class="<?php
                    if ($page == 'way-work') {
                        echo 'active';
                    }
                    ?>"><a href="way-we-work.php">The way we work</a></li>
                    <li class="<?php
                    if ($page == 'programs-offered') {
                        echo 'active';
                    }
                    ?>"><a href="programs-offered.php">Programs offered</a></li>
                    <li class="<?php
                    if ($page == 'make-different') {
                        echo 'active';
                    }
                    ?>"><a href="what-makes-different.php">What makes us different</a></li>
                    <li class="<?php
                    if ($page == 'contact') {
                        echo 'active';
                    }
                    ?>"><a href="contact.php">Contact</a></li>
<!--                        <li class="btn-cta"><a href="#"><span>Free Trial</span></a></li>-->
                </ul>
            </div>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars green-color"></i>
            </a>
        </div>
    </div>
    <div class="col-md-8">
        <div class="boder-10"></div>
    </div>
    <div class="col-md-4">
        <div class="boder-2"></div>
    </div>
</nav>