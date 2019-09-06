<section class="header">
    <div class="container">
        <div class="row mega-menu">
            <span class="toggle" style="font-size:30px;cursor:pointer" id onclick="openNav()">
                <img class="toggle" src='img/toggle.png' alt=''>
            </span>
            <div id="mySidenav" class="sidenav">
                <div class="container tab-menu">
                    <div class="tab mega-menu-tab">
                        <div class="text-center language">
                            <input type="radio" id="bm" name="skills" >
                            <label for="bm" class="bm">BM</label>
                            <input type="radio" id="en" name="skills" checked>
                            <label for="en" class="em">EN</label>

<!--                            <input class="bm" type="radio" name="gender" value="male">
<input class="em" type="radio" name="gender" value="female">-->
<!--                            <input class="bm">BM</button>
<input class="em">EN</button>-->
                        </div>
                        <button class="tablinks" onclick="openCity(event, 'About')">About Us <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                        <button class="tablinks" onclick="openCity(event, 'News')" id="defaultOpen">Latest News <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                        <button class="tablinks" onclick="openCity(event, 'Release')">Press Release <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                        <button class="tablinks" onclick="openCity(event, 'Member')">Be A Member <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                        <button class="tablinks" onclick="openCity(event, 'Clubs')">Find Clubs <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                        <button class="tablinks" onclick="openCity(event, 'Events')">Events <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                        <div class="line-g"></div>
                        <h5>FOLLOW US</h5>
                        <ul class="nav__ul">
                            <li class="i-con">
                                <i class="fa fa-facebook-square" aria-hidden="true"></i>
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                <i class="fa fa-youtube-play" aria-hidden="true"></i>
                            </li>
                        </ul>
                    </div>

                    <div id="About" class="tabcontent">
                        <h3>About</h3>
                    </div> 

                    <div id="News" class="tabcontent">
                        <div class="row news">
                            <div class="news-cont">
                                <div>
                                    <img src="img/mega-menu/001.jpg" alt=""/>
                                    <center class="news-discover"><a href="news.php">DISCOVER</a></center>
                                </div>
                            </div>
                            <div class="news-cont">
                                <div>
                                    <img src="img/mega-menu/002.jpg" alt=""/>
                                    <center class="news-discover"><a href="news.php">DISCOVER</a></center>
                                </div>
                            </div>
                            <div class="news-cont">
                                <div>
                                    <img src="img/mega-menu/003.jpg" alt=""/>
                                    <center class="news-discover"><a href="news.php">DISCOVER</a></center>
                                </div>
                            </div>
                            <div class="news-cont">
                                <div>
                                    <img src="img/mega-menu/004.jpg" alt=""/>
                                    <center class="news-discover"><a href="news.php">DISCOVER</a></center>
                                </div>
                            </div>
                            <div class="news-cont">
                                <div>
                                    <img src="img/mega-menu/004.jpg" alt=""/>
                                    <center class="news-discover"><a href="news.php">DISCOVER</a></center>
                                </div>
                            </div>
                            <div class="news-cont">
                                <div>
                                    <img src="img/mega-menu/003.jpg" alt=""/>
                                    <center class="news-discover"><a href="news.php">DISCOVER</a></center>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="Release" class="tabcontent">
                        <div class="row">
                            <div>
                                <ul class="release">
                                    <li class="release-cont-1"><img src="img/mega-menu/mic.png" alt=""/></li>
                                    <li class="release-cont-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</</li>
                                    <li class="release-cont-3"><a href="press-release.php"><span>READ </span>MORE</a></li>
                                </ul>
                                <ul class="release">
                                    <li class="release-cont-1"><img src="img/mega-menu/mic.png" alt=""/></li>
                                    <li class="release-cont-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</</li>
                                    <li class="release-cont-3"><a href="press-release.php"><span>READ </span>MORE</a></li>
                                </ul>
                                <ul class="release">
                                    <li class="release-cont-1"><img src="img/mega-menu/mic.png" alt=""/></li>
                                    <li class="release-cont-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</</li>
                                    <li class="release-cont-3"><a href="press-release.php"><span>READ </span>MORE</a></li>
                                </ul>
                                <ul class="release">
                                    <li class="release-cont-1"><img src="img/mega-menu/mic.png" alt=""/></li>
                                    <li class="release-cont-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</</li>
                                    <li class="release-cont-3"><a href="press-release.php"><span>READ </span>MORE</a></li>
                                </ul>
                                <ul class="release">
                                    <li class="release-cont-1"><img src="img/mega-menu/mic.png" alt=""/></li>
                                    <li class="release-cont-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</</li>
                                    <li class="release-cont-3"><a href="press-release.php"><span>READ </span>MORE</a></li>
                                </ul>
                            </div>
                        </div> 
                    </div>

                    <div id="Member" class="tabcontent">
                        <h3>Member</h3>
                    </div>


                    <div id="Clubs" class="tabcontent">
                        <h3>Find Clubs</h3>
                    </div>


                    <div id="Events" class="tabcontent">
                        <h3>Events</h3>
                    </div>


                </div>
            </div>
            <a href="index.php" class="logo"><img src='img/logo.png' alt=''></a>

            <div class="header-login">
                <div class="float-left margin-left-10">
                    <a href="#">
                        <i class="fa fa-search search-bg"></i>
                        <p>Search </p>
                    </a>
                </div>
                <div class="float-left margin-left-10">
                    <a href="login.php">
                        <i class="fa fa-sign-in search-bg"></i>
                        <p> Login</p>
                    </a>
                </div>
            </div>
            <div class="mobile-header-login">
                <i class="fa fa-search"></i>
                <i class="fa fa-user"></i>
            </div>
        </div>
    </div>
</section>
