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
        <nav class="link-effect-8 morgin-top-35" id="link-effect-8">
            <ul class="nav navbar-nav">
                <li class="<?php if ($page == 'home') {echo 'active';}?>"><a href="index.php" class="scroll">Home</a></li>
                <li class="<?php if ($id == 'about') {echo 'active';}?>"><a href="#about" class="scroll">About Us</a></li>
                <li class="<?php if ($id=='services') {echo 'active';}?>"><a href="#services" class="scroll">Our Services</a></li>
                <li class="<?php if ($id == 'client') {echo 'active';}?>"><a href="#client" class="scroll">Our Clients</a></li>
                <li class="<?php if ($id == 'team') {echo 'active';}?>"><a href="#team" class="scroll">Our Team</a></li>
                <!--                <li><a href="" class="scroll">Testimonials</a></li>-->
                <li class="<?php if ($id == 'contact') {echo 'active';}?>"><a href="#contact" class="scroll">Contact</a></li>
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