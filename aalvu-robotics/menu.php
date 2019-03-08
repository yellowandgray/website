<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- header section -->
<header class="header-section">
    <div class="container">
        <!-- logo -->
        <a href="index.php" class="site-logo"><img src="img/aaluv-logo.png" alt=""></a>
        <div class="nav-switch">
            <i class="fa fa-bars"></i>
        </div>
        <div class="header-info">
            <div class="hf-item">
                <i class="fa fa-phone"></i>
                <p><span>Phone:</span>+61 3 97056268</p>
            </div>
            <div class="hf-item">
                <i class="far fa-envelope"></i>
                <p><span>Email:</span>info@aaluvglobal.com</p>
            </div>
        </div>
    </div>
</header>
<!-- header section end-->


<!-- Header section  -->
<nav class="nav-section">
    <div class="container">
        <div class="nav-right">
            <a href=""><i class="fa fa-search"></i></a>
<!--            <a href=""><i class="fa fa-shopping-cart"></i></a>-->
        </div>
        <ul class="main-menu">
            <li class="<?php if ($page == 'home'){ echo 'active';} ?>"><a href="index.php">Home</a></li>
            <li class="<?php if ($page == 'about') {echo 'active';} ?>"><a href="about.php">About Us</a></li>
            <li class="<?php if ($page == 'learning') {echo 'active';} ?>"><a href="learning.php">Learning</a></li>
            <li class="<?php if ($page == 'syllabus') {echo 'active';} ?>"><a href="syllabus.php">Syllabus</a></li>
            <li class="<?php if ($page == 'gallery') {echo 'active';} ?>"><a href="gallery.php">Gallery</a></li>
            <li class="<?php if ($page == 'contact') {echo 'active';} ?>"><a href="contact.php">Contact</a></li>
<!--            <li class="<?php if ($page == 'career') {echo 'active';} ?>"><a href="careers.php">Careers</a></li>
            <li class="<?php if ($page == 'faq') {echo 'active';} ?>"><a href="faq.php">FAQ</a></li>
            <li class="<?php if($page == 'classroom-enroll') {echo 'active';} ?>"><a href="classroom-enrollment.php">Classroom Enrollment</a></li>-->
        </ul>
    </div>
</nav>
<!-- Header section end -->
