<?php
require_once 'api/include/common.php';
$obj = new Common();
$findclub = $obj->selectAll('*', 'club', 'club_id > 0 AND type = \'two_wheel\' ORDER BY club_id DESC LIMIT 8');
$events = $obj->selectAll('e.*, c.name AS club, ca.name AS category', 'event AS e LEFT JOIN club AS c ON c.club_id = e.club_id LEFT JOIN category AS ca ON ca.category_id = e.category_id AND ca.category_id = c.category_id', 'e.event_id > 0 AND e.type = \'two_wheel\' ORDER BY e.event_id DESC LIMIT 8');
?>
<section class="header">
    <div class="container">
        <div class="row mega-menu">
            <span id="nav-icon3" class="toggle" style="font-size:30px;cursor:pointer">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </span>
<!--            <span class="toggle" style="font-size:30px;cursor:pointer;display: none;" id="close" onclick="closeNav();">
                <img src='img/close.png' alt=''>
            </span>-->
            <div id="mySidenav" class="sidenav">
                <div class="container tab-menu">
<!--                    <div class="nav-close" onclick="closeNav();"><img src="img/close.png" alt=""></div>-->
                    <div class="tab mega-menu-tab">
                        <!--                        <div class="text-center language">
                                                    <input type="radio" name="size" id="size_1" value="small" checked />
                                                    <label for="size_1">BM</label>
                                                    <input type="radio" name="size" id="size_2" value="small" />
                                                    <label for="size_2">EN</label>
                                                </div>-->
                        <button class="tablinks" onclick="openCity(event, 'About')" id="defaultOpen">About Us <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                        <button class="tablinks" onclick="openCity(event, 'News')">Latest News <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                        <button class="tablinks" onclick="openCity(event, 'Release')">Press Release <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                        <button class="tablinks"><a href="member-benefits.php">Be A Member <i class="fa fa-caret-right" aria-hidden="true"></i></a></button>
                        <button class="tablinks" onclick="openCity(event, 'Clubs')">Find a Club <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                        <button class="tablinks" onclick="openCity(event, 'Events')">Events <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                        <button class="tablinks"><a href="club-register.php">Club Registration <i class="fa fa-caret-right" aria-hidden="true"></i></a></button>
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
                        <div class="about-menu">
                            <div class="about-section">
                                <div class="about-background">
                                    <div class="about-bg">
                                        <img src="img/about/about-logo.png" alt="">
                                        <h1>About Us</h1>
                                        <p>Toowheel is an automotive digital platform combining Website, Content Management System, Ecommerce and E-Wallet, That centralized all two wheel and four-wheel motorsports activities and event in Malaysia. With alliance to all registered motor club from various standard, we manage to attract all motorsport enthusiast to support and fully utilize Toowheel platform services. Toowheel operate as a digital platform and combine with physical services such as social community networking ,corporate event and organize multiple legal motorsport entity to cater from lower end to high end motorsports members. With this united platform, we targeted to have more than 30,000 member by end of this year and up to 2 million active members by 2020.</p>
                                        <br/>
                                        <div class="news-discover"><a href="about.php">Read More</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div id="News" class="tabcontent">
                        <div class="row news">
                            <?php //foreach ($news as $row) { ?>
                            <!--                                <div class="news-cont">
                                                                <div>
                                                                    <img src="<?php echo BASE_URL . $news['thumb_image']; ?>" alt=""/>
                                                                    <div class="discover-slider-content">
                                                                        <p class="clb-bg"><?php echo $row['club']; ?></p>
                                                                        <h2><?php echo $row['title']; ?></h2>
                                                                        <p><?php echo $row['moto_text']; ?></p>
                                                                    </div>
                                                                </div>
                                                                <center class="news-discover"><a href="news.php">DISCOVER</a></center>
                                                            </div>-->
                            <?php //} ?>
                            <div class="news-cont">
                                <div>
                                    <img src="img/mega-menu/001.jpg" alt=""/>
                                    <div class="discover-slider-content">
                                        <p class="clb-bg">Club Name</p>
                                        <h2>Title Comes Here</h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has</p>
                                        <center class="news-discover"><a href="#">DISCOVER</a></center>
                                    </div>
                                </div>
                            </div>
                            <div class="news-cont">
                                <div>
                                    <img src="img/mega-menu/002.jpg" alt=""/>
                                    <div class="discover-slider-content">
                                        <p class="clb-bg">Club Name</p>
                                        <h2>Title Comes Here</h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has</p>
                                        <center class="news-discover"><a href="#">DISCOVER</a></center>
                                    </div>
                                </div>
                            </div>
                            <div class="news-cont">
                                <div>
                                    <img src="img/mega-menu/003.jpg" alt=""/>
                                    <div class="discover-slider-content">
                                        <p class="clb-bg">Club Name</p>
                                        <h2>Title Comes Here</h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has</p>
                                        <center class="news-discover"><a href="#">DISCOVER</a></center>
                                    </div>
                                </div>
                            </div>
                            <div class="news-cont">
                                <div>
                                    <img src="img/mega-menu/004.jpg" alt=""/>
                                    <div class="discover-slider-content">
                                        <p class="clb-bg">Club Name</p>
                                        <h2>Title Comes Here</h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has</p>
                                        <center class="news-discover"><a href="#">DISCOVER</a></center>
                                    </div>
                                </div>
                            </div>
                            <div class="news-cont">
                                <div>
                                    <img src="img/mega-menu/004.jpg" alt=""/>
                                    <div class="discover-slider-content">
                                        <p class="clb-bg">Club Name</p>
                                        <h2>Title Comes Here</h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has</p>
                                        <center class="news-discover"><a href="#">DISCOVER</a></center>
                                    </div>
                                </div>
                            </div>
                            <div class="news-cont">
                                <div>
                                    <img src="img/mega-menu/003.jpg" alt=""/>
                                    <div class="discover-slider-content">
                                        <p class="clb-bg">Club Name</p>
                                        <h2>Title Comes Here</h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has</p>
                                        <center class="news-discover"><a href="#">DISCOVER</a></center>
                                    </div>
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
                                <div class="find-club-btn"><a href="press-release.php" class="menu-btn">All Press Release</a></div>
                            </div>
                        </div> 
                    </div>
                    <div id="Member" class="tabcontent">
                        <h3>Member Registration</h3>
                        <div class="member-register-menu">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                    <div class="find-club-btn"><a href="member-register.php" class="menu-btn">Click to Register</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="Clubs" class="tabcontent">
                        <h3>Find a Club</h3>
                        <div class="find-club-menu">
                            <div class="row">
                                <?php foreach ($findclub as $row) { ?>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="club-box">
                                            <span>#1</span>
                                            <img src="<?php echo BASE_URL . $row['logo']; ?>" alt="" />
                                            <h3><?php echo $row['name']; ?></h3>
                                            <p><?php echo $row['city_id']; ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                                <!--                                <div class="col-md-3 col-sm-6">
                                                                    <div class="club-box">
                                                                        <span>#1</span>
                                                                        <img src="img/find-club/dummy-logo.png" alt="" />
                                                                        <h3>Frendly Bikers</h3>
                                                                        <p>Kuala Lumpur</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-6">
                                                                    <div class="club-box">
                                                                        <span>#1</span>
                                                                        <img src="img/find-club/dummy-logo.png" alt="" />
                                                                        <h3>Frendly Bikers</h3>
                                                                        <p>Kuala Lumpur</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-6">
                                                                    <div class="club-box">
                                                                        <span>#1</span>
                                                                        <img src="img/find-club/dummy-logo.png" alt="" />
                                                                        <h3>Frendly Bikers</h3>
                                                                        <p>Kuala Lumpur</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-6">
                                                                    <div class="club-box">
                                                                        <span>#1</span>
                                                                        <img src="img/find-club/dummy-logo.png" alt="" />
                                                                        <h3>Frendly Bikers</h3>
                                                                        <p>Kuala Lumpur</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-6">
                                                                    <div class="club-box">
                                                                        <span>#1</span>
                                                                        <img src="img/find-club/dummy-logo.png" alt="" />
                                                                        <h3>Frendly Bikers</h3>
                                                                        <p>Kuala Lumpur</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-6">
                                                                    <div class="club-box">
                                                                        <span>#1</span>
                                                                        <img src="img/find-club/dummy-logo.png" alt="" />
                                                                        <h3>Frendly Bikers</h3>
                                                                        <p>Kuala Lumpur</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-6">
                                                                    <div class="club-box">
                                                                        <span>#1</span>
                                                                        <img src="img/find-club/dummy-logo.png" alt="" />
                                                                        <h3>Frendly Bikers</h3>
                                                                        <p>Kuala Lumpur</p>
                                                                    </div>
                                                                </div>-->
                            </div>
                            <div class="find-club-btn"><a href="find-a-club.php" class="menu-btn">Read More</a></div>
                        </div>
                    </div>
                    <div id="Events" class="tabcontent">
                        <h3>Events</h3>
                        <div class="find-club-menu event-menu-box">
                            <div class="row">
                                <?php foreach ($events as $row) { ?>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="club-box">
                                            <img src="<?php echo BASE_URL . $row['thumb_image']; ?>" alt="" />
                                            <h3><?php echo $row['title']; ?></h3>
                                            <p>Date: <?php echo $row['event_date']; ?></p>
                                            <p>Location: <?php echo $row['location']; ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                                <!--                                <div class="col-md-3 col-sm-6">
                                                                    <div class="club-box">
                                                                        <img src="img/events/005.jpg" alt="" />
                                                                        <h3>Event Title</h3>
                                                                        <p>Date: 10/10/2019</p>
                                                                        <p>Location: Kuala lumpur</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-6">
                                                                    <div class="club-box">
                                                                        <img src="img/events/005.jpg" alt="" />
                                                                        <h3>Event Title</h3>
                                                                        <p>Date: 10/10/2019</p>
                                                                        <p>Location: Kuala lumpur</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-6">
                                                                    <div class="club-box">
                                                                        <img src="img/events/005.jpg" alt="" />
                                                                        <h3>Event Title</h3>
                                                                        <p>Date: 10/10/2019</p>
                                                                        <p>Location: Kuala lumpur</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-6">
                                                                    <div class="club-box">
                                                                        <img src="img/events/005.jpg" alt="" />
                                                                        <h3>Event Title</h3>
                                                                        <p>Date: 10/10/2019</p>
                                                                        <p>Location: Kuala lumpur</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-6">
                                                                    <div class="club-box">
                                                                        <img src="img/events/005.jpg" alt="" />
                                                                        <h3>Event Title</h3>
                                                                        <p>Date: 10/10/2019</p>
                                                                        <p>Location: Kuala lumpur</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-6">
                                                                    <div class="club-box">
                                                                        <img src="img/events/005.jpg" alt="" />
                                                                        <h3>Event Title</h3>
                                                                        <p>Date: 10/10/2019</p>
                                                                        <p>Location: Kuala lumpur</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-6">
                                                                    <div class="club-box">
                                                                        <img src="img/events/005.jpg" alt="" />
                                                                        <h3>Event Title</h3>
                                                                        <p>Date: 10/10/2019</p>
                                                                        <p>Location: Kuala lumpur</p>
                                                                    </div>
                                                                </div>-->
                            </div>
                            <div class="find-club-btn"><a href="events.php" class="menu-btn">Read More</a></div>
                        </div>
                        <!--                        <div class="event-num">
                                                    <div class="event-num-1">
                                                        <h3>Event Title</h3>
                                                        <div class="event-n">
                                                            <div class="event-img">
                                                                <img src="img/events/005.jpg" alt="" class="img-responsive"/>
                                                            </div>
                                                            <div class="event-conent">
                                                                <p><span>Date:</span> 06-09-2019</p>
                                                                <p><span>Location:</span> Malaysia</p>
                                                                <p><span>Club Name:</span> Name</p>
                        
                                                            </div>
                                                            <div class="event-desc">
                                                                <p><span>Description</span></p>
                                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                                                <div class="find-club-btn"><a href="events.php">Read More</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="event-num-1">
                                                        <h3>Event Title</h3>
                                                        <div class="event-n">
                                                            <div class="event-img">
                                                                <img src="img/events/005.jpg" alt="" class="img-responsive"/>
                                                            </div>
                                                            <div class="event-conent">
                                                                <p><span>Date:</span> 06-09-2019</p>
                                                                <p><span>Location:</span> Malaysia</p>
                                                                <p><span>Club Name:</span> Name</p>
                        
                                                            </div>
                                                            <div class="event-desc">
                                                                <p><span>Description</span></p>
                                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                                                <div class="find-club-btn"><a href="events.php">Read More</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>-->
                    </div>
                    <div id="register-club" class="tabcontent">
                        <h3>Register My Club</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                        <div class="find-club-btn"><a href="club-register.php">Read More</a></div>
                    </div>
                </div>
            </div>
            <a href="index.php" class="logo"><img src='img/logo.png' alt=''></a>
            <div class="header-login">
                <div class="float-left margin-left-10">
                    <a href="#" onfocusin="myFunction()" onfocusout="myFunction2()" id="demo-2">
                        <input type="search" placeholder="Search">

                    </a> 
                    <p id="myDiv">Search</p>

                    <!--                    <form id="demo-2">
                                            <input type="search" placeholder="Search">
                                            <p>Search</p>
                                        </form>-->
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
                <a href="login.php"><i class="fa fa-user"></i></a>
            </div>
        </div>
    </div>
</section>
<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

// Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();

    //Toggle icon Hide function
//    document.getElementById("toggle").onclick = function (e) {
//        e.target.style.visibility = 'hidden';
//    };

    function myFunction() {
        var x = document.getElementById("myDiv");
        x.style.display = "none";
    }
    function myFunction2() {
        var x = document.getElementById("myDiv");
        x.style.display = "block";
    }

</script>
