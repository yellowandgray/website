<header class="header-style-3 wf100">

    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="header-contact">
                        <li><i class="fas fa-phone"></i> 0800 12345</li>
                        <li><i class="fas fa-envelope"></i> info@vpnc.com</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="navrow" id='navbar'>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="logo"><a href="index.php"><img src="images/home/001.png" alt=""></a></div>
                </div>
                <div class="col-md-9">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <i class="fas fa-bars"></i> </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">

                                <li class="nav-item <?php
                                if ($page == 'home') {
                                    echo 'active';
                                }
                                ?>"> <a class="nav-link" href="index.php">Home</a> </li>
                                <li class="nav-item <?php
                                if ($page == 'about') {
                                    echo 'active';
                                }
                                ?>"> <a class="nav-link" href="about.php">About</a> </li>
                                <!--<li class="nav-item"> <a class="nav-link" href="about.html">About</a> </li>-->
                                <li class="nav-item dropdown <?php
                                if ($page == 'products') {
                                    echo 'active';
                                }
                                ?>">
                                    <a class="nav-link dropdown-toggle" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Products </a>
                                    <ul class="dropdown-menu" >
                                        <li><a href="tele-communication.php">Telecommunications</a> </li>
                                        <li><a href="renewable-energy.php">Renewable Energy</a> </li>
                                        <li><a href="industrial-safetyproducts.php">Safety Shoes</a> </li>
                                        <li><a href="metal.php">Metal</a> </li>
                                        <li><a href="cable-tray.php">Strut Channel & Cable Tray</a> </li>
                                        <!--                                            <li><a href="projects.html">Telecommunications</a> </li>
                                                                                    <li><a href="projects-grid.html">Renewable Energy</a> </li>
                                                                                    <li><a href="projects-grid-two.html">Industry Safety Products</a> </li>
                                                                                    <li><a href="projects-list.html">Metal</a> </li>
                                                                                    <li><a href="projects-details.html">Cable Tray</a> </li>-->
                                    </ul>
                                </li>

                                <li class="nav-item <?php
                                if ($page == 'partners') {
                                    echo 'active';
                                }
                                ?>"> <a class="nav-link" href="partners.php">Our Partners</a> </li>
                                <li class="nav-item <?php
                                if ($page == 'contact') {
                                    echo 'active';
                                }
                                ?>"> <a class="nav-link" href="contact.php">Contact</a> </li>
                                <!--                                <li class="nav-item"> <a class="nav-link" href="contact-one.html">Contact</a> </li>-->

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</header>