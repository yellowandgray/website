<nav class="colorlib-nav" role="navigation">
    <div class="upper-menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-8">
                    <p>
                        <i class="fa fa-phone"></i>&nbsp;<a href="tel:+04368 265 265"> 04368 265 265</a>&nbsp;&nbsp;
                        <i class="fa fa-envelope"></i>&nbsp;<a href="mailto:info@enpeekkl.com">info@enpeekkl.com</a>
<!--                        <i class="fa fa-arrow-down"></i>&nbsp;-->
                        <a href="downloads.php" type="button" class="btn-custom-1">Download Resources</a>
<!--                        <a href="application-form.php" type="button" class="btn-custom-1">Download Application</a>-->
                    </p>
                </div>
                <div class="col-xs-4 text-right line-height-35">
                    <ul class="colorlib-social-icons">
                        <li><a href="https://www.facebook.com/ENPEEInternationalSchool" target="blank"><i class="fa fa-facebook-official" style="color:#1c61ab"></i></a></li>&nbsp;
                        <li><a href="https://twitter.com/SchoolEnpee" target="blank"><i class="fa fa-twitter-square" style="color:#429cd6"></i></a></li>&nbsp;
                        <li><a href="https://www.linkedin.com/in/enpee-international-school/" target="blank"><i class="fa fa-linkedin-square" style="color:#0077B5"></i></a></li>&nbsp;
                        <li><a href="https://www.instagram.com/enpeeschool/" target="blank"><i class="fa fa-instagram" style="color:#125688"></i></a></li>&nbsp;
                        <li><a href="https://www.youtube.com/channel/UCcYOtTSP__ZyX8EY5TiHY9g" target="blank"><i class="fa fa-youtube-square" style="color:#cd201f"></i></a></li>&nbsp;
                    </ul>
                    <p class="btn-apply"><a href="index.php#enquiry">Enquire Now</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div id="colorlib-logo"><a href="index.php"><img style="height: 130px; padding-bottom: 10px;" class="logo" src="images/logo-enpee-international-school.png" alt="Enpee-International-School"/></a></div>
                </div>
                <div class="col-md-10 text-right menu-1">
                    <ul id="menu">
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
                            <input id="check01" type="checkbox" name="menu" style="display: none"/>
                            <label for="check01">About Us</label>
<!--                            <a href="#">About Us</a>-->
                            <ul class="submenu">
                                <li class="text-left"><a href="about.php" class="margin-left-10">About the School</a></li>
                                <li class="text-left"><a href="promoters.php" class="margin-left-10">Promoters</a></li>
                                <li class="text-left"><a href="management.php" class="margin-left-10">Management</a></li>
                                <li class="text-left"><a href="advisory-board.php" class="margin-left-10">Advisory Board</a></li>
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
                        <li class="<?php
                        if ($page == 'career') {
                            echo 'active';
                        }
                        ?>"><a href="career.php">Career</a></li>
<!--                        <li class="btn-cta"><a href="#"><span>Free Trial</span></a></li>-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-container">

        <!-- Top Navigation Menu -->
        <div class="topnav" style="background: #fff">
            <div id="colorlib-logo"><a href="index.php"><img style="width: 200px;height: 130px; padding-bottom: 10px;" class="mobile-logo" src="images/logo-enpee-international-school.png" alt=""/></a></div>
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
                        <a href="#">About Us <i class="fas fa-sort-down" id="show"></i></a>
                        <ul class="dropdown-content">
                            <li class="text-left"><a href="about.php" class="margin-left-10">About the School</a></li>
                            <li class="text-left"><a href="promoters.php" class="margin-left-10">Promoters</a></li>
                            <li class="text-left"><a href="management.php" class="margin-left-10">Management</a></li>
                            <li class="text-left"><a href="advisory-board.php" class="margin-left-10">Advisory Board</a></li>
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
                    <li class="<?php
                    if ($page == 'contact') {
                        echo 'active';
                    }
                    ?>"><a href="career.php">Career</a></li>
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
    <marquee><a href="http://enpeekkl.com/images/download/ENPEE-School-Flyer-ENG&TAM-2019.pdf" target="blank">Admissions open for PreKG to STD V. Contact our City Office at Old No 79, MOHIDEEN PALLI STREET, OPPOSITE: AXIS BANK  & LATHAA SUPER MARKET, KARAIKAL 609 602. Call 04368 265 265.</a></marquee>
</nav>