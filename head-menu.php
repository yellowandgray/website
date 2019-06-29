<header class="header-area">

    <div id="header" id="home">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="index.php"><img src="assets/images/logo/logo.png" alt="" class="img-responsive" class="img-responsive" title="" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="btn <?php if ($page == 'home') { echo 'active';}?>""><a href="index.php">Home</a></li>
                        <li class="btn <?php if ($page == 'about') { echo 'active';}?>"><a href="about.php">our company</a></li>
                        <li class="btn <?php if ($page == 'capabilities') { echo 'active';}?>""><a href="our-capabilities.php">our capabilities</a></li>
                        <li class="btn <?php if ($page == 'story') { echo 'active';}?>""><a href="#">success stories & reference</a></li>
                        <li class="btn <?php if ($page == 'contact') { echo 'active';}?>""><a href="#">Contact</a></li>			          				          
                    </ul>
                </nav><!-- #nav-menu-container -->		    		
            </div>
        </div>
    </div>
</header>