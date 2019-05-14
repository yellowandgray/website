<header class="header d-flex flex-row justify-content-end align-items-center">
    <!-- Logo -->
    <div class="logo_container mr-auto">
        <div class="logo text-center">
            <a href="index.php"><img src="images/logo.png" alt="" style="width: 100%;"/></a>
        </div>
    </div>
    <!-- Main Navigation -->
    <nav class="main_nav justify-self-end">
        <ul class="nav_items">
            <li class="<?php if ($page == 'how-work') {
    echo 'active';
} ?>"><a href="how-to-works.php"><span>How it Works</span></a></li>
            <li class="<?php if ($page == 'resources') {
    echo 'active';
} ?>"><a href="resources.php"><span>Free Resources</span></a></li>
            <li class="<?php if ($page == 'work-with-us') {
    echo 'active';
} ?> dropdown"><a href="work-with-me.php"><span>Work With me</span></a>
                <div class="dropdown-content">
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
                                <li><a href="work-with-me.php">One-to-one Coaching</a></li>
                                <li><a href="work-with-me.php">Group Coaching</a></li>
                                <li><a href="work-with-me.php">Corporate Training</a></li>
                                <li><a href="work-with-me.php">Speaking Engagements</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <img src="images/mega-menu.jpg" alt="" />
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-12" style="background: #20b9ec;">
                        <div class="mega-menu-md-12" style="padding: 20px;">
                            <h3>Want Cheryl to help you multiply your performance x25?</h3>
                            <button type="submit" class="btn btn-primary"><a href="contact.php" class="color-w">Start Here</a></button>
                        </div>
                    </div>
                </div>
            </li>
            <li class="<?php if ($page == 'testimonials') {
    echo 'active';
} ?>"><a href="testimonials.php"><span>Testimonials</span></a></li>
            <li class="<?php if ($page == 'about') {echo 'active';} ?>"><a href="about.php"><span>About Cheryl</span></a></li>
            <li class="<?php if ($page == 'blog') {echo 'active';} ?>"><a href="blog.php"><span>Blogs</span></a></li>
            <li class="<?php if ($page == 'contact') {echo 'active';} ?>"><a href="contact.php"><span>Contact</span></a></li>
        </ul>
    </nav>
    <!-- Hamburger -->
    <div class="hamburger_container">
        <!--<span class="hamburger_text">Menu</span>-->
        <span class="hamburger_icon"></span>
    </div>
</header>
