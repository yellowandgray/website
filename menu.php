<nav class="navbar navbar-default">
    <div class="navbar-header navbar-left">
        <h1><a class="navbar-brand" href="index.php"><img class="common-img-size" src="images/logo-website.png" alt="Alias Logo" title="Alias" />
<!--                Technical <span>SOlutions</span>-->
            </a>
        </h1>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
        <nav class="link-effect-8" id="link-effect-8">
            <ul class="nav navbar-nav">
                <li class="<?php if ($page == 'home') {echo 'active';}?>"><a href="index.php">Home</a></li>
                <li class="<?php if ($id == 'about') {echo 'active';}?>"><a id="about">About Us</a></li>
                <li class="<?php if ($id=='services') {echo 'active';}?>"><a id="services">Our Services</a></li>
                <li class="<?php if ($id == 'client') {echo 'active';}?>"><a id="client">Our Clients</a></li>
                <li class="<?php if ($id == 'team') {echo 'active';}?>"><a id="team">Our Team</a></li>
                <!--                <li><a href="" class="scroll">Testimonials</a></li>-->
                <li class="<?php if ($page == 'contact') {echo 'active';}?>"><a href=#>Contact</a></li>
            </ul>
            <ul class="footericons">
                <li><a href="#"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
                <li><a href="#"><span class="fa fa-linkedin" aria-hidden="true"></span></a></li>
                <li><a href="#"><span class="fa fa-google-plus" aria-hidden="true"></span></a></li>
                <li><a href="#"><span class="fa fa-youtube" aria-hidden="true"></span></a></li>
            </ul>
        </nav>
    </div>
</nav>