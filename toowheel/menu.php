<?php
$menu_latest_news = $obj->selectAll('n.*, m.name AS media, c.name AS club, ca.name AS category', 'news AS n LEFT JOIN media AS m ON m.media_id = n.media_id LEFT JOIN club AS c ON c.club_id = n.club_id LEFT JOIN category AS ca ON ca.category_id = n.category_id AND ca.category_id = c.category_id', 'n.news_id > 0 AND n.type = \'' . $type . '\' ORDER BY n.news_id DESC LIMIT 8');
$menu_press_release = $obj->selectAll('p.*, m.name AS media', 'press_release AS p LEFT JOIN media AS m ON m.media_id = p.media_id', 'p.type = \'' . $type . '\' ORDER BY p.press_release_id DESC LIMIT 3');
$menu_findclub = $obj->selectAll('*', 'club', 'club_id > 0 AND type = \'' . $type . '\' AND published = 1 ORDER BY club_id DESC LIMIT 8');
$menu_events = $obj->selectAll('e.*, c.name AS club, ca.name AS category', 'event AS e LEFT JOIN club AS c ON c.club_id = e.club_id LEFT JOIN category AS ca ON ca.category_id = e.category_id AND ca.category_id = c.category_id', 'e.event_id > 0 AND e.type = \'' . $type . '\' ORDER BY e.event_id DESC LIMIT 8');
$autocomplete_club = $obj->selectAll('*', 'club', 'club_id > 0 AND type = \'' . $type . '\' ORDER BY name DESC');
$autocomplete_news = $obj->selectAll('*', 'news', 'news_id > 0 AND type = \'' . $type . '\' ORDER BY title DESC');
$autocomplete_press_release = $obj->selectAll('*', 'press_release', 'press_release_id > 0 AND type = \'' . $type . '\' ORDER BY title DESC');
?>
<section class="header">
    <div class="container">
        <div class="row mega-menu">
            <span id="nav-icon3" class="toggle" style="font-size:30px;cursor:pointer">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <p class="open-menu">MENU</p>
                <p class="close-menu">CLOSE</p>
            </span>
            <div id="mySidenav" class="sidenav">
                <div class="container tab-menu">
                    <div class="tab mega-menu-tab">
                        <div class="text-center language">
                            <input type="radio" name="size" id="size_1" value="small" checked />
                            <label for="size_1">BM</label>
                            <input type="radio" name="size" id="size_2" value="small" />
                            <label for="size_2">EN</label>
                        </div>
                        <button class="tablinks" onclick="openCity(event, 'About')" id="defaultOpen">About Us <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                        <button class="tablinks" onclick="openCity(event, 'News')">Latest News <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                        <button class="tablinks" onclick="openCity(event, 'Release')">Press Release <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                        <button class="tablinks"><a href="member-benefits.php?type=<?php echo $type; ?>">Be A Member <i class="fa fa-caret-right" aria-hidden="true"></i></a></button>
                        <button class="tablinks" onclick="openCity(event, 'Clubs')">Find a Club <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                        <button class="tablinks" onclick="openCity(event, 'Events')">Events <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                        <button class="tablinks"><a href="club-register.php?type=<?php echo $type; ?>">Club Registration <i class="fa fa-caret-right" aria-hidden="true"></i></a></button>
                        <div class="line-g"></div>
                        <h5>FOLLOW US</h5>
                        <ul class="nav__ul">
                            <li class="i-con">
                                <a href="https://www.facebook.com/Toowheel-Malaysia-102602757819930" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                                <a href="https://www.instagram.com/p/B2iG45lnGi-/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="https://twitter.com/@ToowheelM" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="https://www.youtube.com/channel/UCueyRbB52hjc0XUIqbkYxcg" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
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
                                        <p>Toowheel is an automotive digital platform combining Website, Content Management System, E-commerce and E-Wallet, That centralized all two wheel and four-wheel motorsports activities and event in Malaysia. With alliance to all registered motor club from various standard, we manage to attract all motorsport enthusiast to support and fully utilize Toowheel platform services. Toowheel operate as a digital platform and combine with physical services such as social community networking ,corporate event and organize multiple legal motorsport entity to cater from lower end to high end motorsports members. With this united platform, we targeted to have more than 30,000 member by end of this year and up to 2 million active members by 2020.</p>
                                        <br/>
                                        <div class="news-discover"><a href="about.php?type=<?php echo $type; ?>">Read More</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div id="News" class="tabcontent">
                        <div class="row news">
                            <?php foreach ($menu_latest_news as $row) { ?>
                                <div class="news-cont">
                                    <div>
                                        <img src="<?php echo BASE_URL . $row['thumb_image']; ?>" alt="image" />
                                        <div class="discover-slider-content">
                                            <p class="clb-bg"><?php echo $row['club_id'] != 0 ? $obj->charLimit($row['club'], 10) : $obj->charLimit($row['sponsor'], 10); ?></p>
                                            <h2><?php echo $obj->charLimit($row['title'], 10); ?></h2>
                                            <p><?php echo $obj->charLimit($row['moto_text'], 60); ?></p>
                                            <center class="news-discover"><a href="news.php?nid=<?php echo $row['news_id']; ?>">DISCOVER</a></center>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="find-club-btn"><a href="news-updates.php?type=<?php echo $type; ?>" class="menu-btn">See All Latest News</a></div>
                    </div>
                    <div id="Release" class="tabcontent">
                        <div class="row">
                            <div>
                                <?php foreach ($menu_press_release as $row) { ?>
                                    <ul class="release">
                                        <li class="release-cont-1"><img src="<?php echo BASE_URL . $row['thumb_image']; ?>" alt="image" /></li>
                                        <li class="release-cont-2">
                                            <strong><?php echo $obj->charLimit($row['title'], 80); ?></strong>
                                            <br/>
                                            <span><?php echo $row['media']; ?> | <?php echo $row['author_name']; ?> | <?php echo $row['press_release_date']; ?></span>
                                            <p><?php echo $obj->charLimit($row['description_1'], 120); ?>
                                        </li>
                                        <li class="release-cont-3"><a href="press.php?pid=<?php echo $row['press_release_id']; ?>"><span>READ </span>MORE</a></li>
                                    </ul>
                                <?php } ?>
                            </div>
                        </div> 
                        <div class="find-club-btn"><a href="press-release.php?type=<?php echo $type; ?>" class="menu-btn">All Press Release</a></div>
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
                                <?php foreach ($menu_findclub as $row) { ?>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="club-box">
                                            <div class="rank-h">
                                                <?php if ($row['rank'] && $row['rank'] != 0) { ?>
                                                    <span>#<?php echo $row['rank']; ?></span>
                                                <?php } ?>
                                            </div>
                                            <img src="<?php echo BASE_URL . $row['logo']; ?>" alt="" />
                                            <h3><?php echo $obj->charLimit($row['name'], 13); ?></h3>
                                            <p><?php echo $obj->charLimit($row['city'], 20); ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="find-club-btn"><a href="find-a-club.php?type=<?php echo $type; ?>" class="menu-btn">Read More</a></div>
                        </div>
                    </div>
                    <div id="Events" class="tabcontent">
                        <h3>Events</h3>
                        <div class="find-club-menu event-menu-box">
                            <div class="row">
                                <?php foreach ($menu_events as $row) { ?>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="club-box">
                                            <img src="<?php echo BASE_URL . $row['thumb_image']; ?>" alt="" />
                                            <h3><?php echo $obj->charLimit($row['title'], 13); ?></h3>
                                            <p>Location: <?php echo $obj->charLimit($row['location'], 20); ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="find-club-btn"><a href="events.php?type=<?php echo $type; ?>" class="menu-btn">Read More</a></div>
                        </div>
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
                <a href="#" class="float-left margin-left-10" id="demo-2" style="position: relative;top: -2px;">
                    <span onfocusin="myFunction()" onfocusout="myFunction2()">
                        <input type="search" placeholder="Search" class="head-search" />
                        <p id="myDiv">Search</p>
                    </span> 
                </a>
                <a href="login.php?type=<?php echo $type; ?>" class="float-left margin-left-10">
                    <span>
                        <i class="fa fa-sign-in search-bg"></i>
                        <p> Login</p>
                    </span>
                </a>
            </div>
            <div class="mobile-header-login">
<!--                <i class="fa fa-search"></i>-->
                <a href="login.php?type=<?php echo $type; ?>"><i class="fa fa-user"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="mobile-search">
                <input type="search" placeholder="Search" class="head-search" />
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
    var autocomplete_club = <?php echo json_encode($autocomplete_club); ?>;
    var autocomplete_news = <?php echo json_encode($autocomplete_news); ?>;
    var autocomplete_press_release = <?php echo json_encode($autocomplete_press_release); ?>;
    var autocomplete_suggestion = [];

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
