<section class="header">
    <div class="container">
        <div class="row">
            <span class="toggle" style="font-size:30px;cursor:pointer" id onclick="openNav()">
                <img class="toggle" src='img/toggle.png' alt=''>
            </span>
            <div id="mySidenav" class="sidenav">
                <div class="container">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <div class="tab">
                        <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">London</button>
                        <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>
                        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
                    </div>

                    <div id="London" class="tabcontent">
                        <h3>London</h3>
                        <p>London is the capital city of England.</p>
                    </div>

                    <div id="Paris" class="tabcontent">
                        <h3>Paris</h3>
                        <p>Paris is the capital of France.</p> 
                    </div>

                    <div id="Tokyo" class="tabcontent">
                        <h3>Tokyo</h3>
                        <p>Tokyo is the capital of Japan.</p>
                    </div>
                </div>
            </div>
            <a href="index.php" class="logo"><img src='img/logo.png' alt=''></a>

            <div class="header-login">
                <span class="search-bg"><i class="fa fa-search"></i></span>
                <a href="login.php"><span class="login-button"><i class="fa fa-user"></i> Login</span></a>
            </div>
            <div class="mobile-header-login">
                <i class="fa fa-search"></i>
                <i class="fa fa-user"></i>
            </div>
        </div>
    </div>
</section>
