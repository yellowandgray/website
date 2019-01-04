<header id="header">
    <div class="container-fluid">

        <div id="logo" class="pull-left">
            <h1><a href="index.php" class="scrollto"><img src="img/logo.png"/></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="<?php if ($page == 'home') {echo 'menu-active';}?>"><a href="index.php">Home</a></li>
                <li class="<?php if ($page == 'about') {echo 'menu-active';}?> menu-has-children"><a href="#">About Us</a>
                    <ul>
                        <li><a href="leadership.php">LEADERSHIP</a></li>
                        <li><a href="quality-policy.php">QUALITY POLICY</a></li>
                        <li><a href="our-team.php">OUR TEAM</a></li>
                        <li><a href="commitment.php">COMMITMENT</a></li>
                        <li><a href="events.php">EVENTS</a></li>
                    </ul>
                </li>
                <li class="<?php if ($page == 'product') {echo 'menu-active';}?> menu-has-children"><a href="#">PRODUCTS</a>
                    <ul>
                        <li><a href="fmcg.php">FMCG PACKAGING</a></li>
                        <li><a href="plastic-ancillary-equipments.php">PLASTIC ANCILLARY EQUIPMENTS</a></li>
<!--                        <li><a href="thermoforming-extrusion.php">THERMOFORMING AND EXTRUSION</a></li>-->
                        <li><a href="food-packaging.php">FOOD PACKAGING</a></li>
                        <li><a href="agriculture-horticulture.php">AGRICULTURE & HORTICULTURE</a></li>
                        <li><a href="polycarbonate-sheet.php">POLYCARBONATE SHEET</a></li>
                    </ul>
                </li>
                <li class="<?php if ($page == 'how-to-buy') {echo 'menu-active';}?> menu-has-children"><a href="#">HOW TO BUY</a>
                    <ul>
                        <li><a href="contact-sales.php">CONTACT SALES</a></li>
                        <li><a href="request-quote.php">REQUEST A QUOTE</a></li>
                        <li><a href="find-sales-office.php">FIND A SALES OFFICE</a></li>
                        <li><a href="http://saromart.com/shop/" target="blank">ONLINE STORES</a></li>
                    </ul>
                </li>
                <li class="<?php if ($page == 'careers') {echo 'menu-active';}?>"><a href="careers.php">CAREERS</a></li>
                <li class="<?php if ($page == 'contact') {echo 'menu-active';}?>"><a href="contact.php">Contact</a></li>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->