<?php
if (!isset($_GET['cid'])) {
    header('Location: ../index.php');
}
$cid = $_GET['cid'];
require_once 'api/include/common.php';
$obj = new Common();
$club = $obj->selectRow('*', 'club', 'club_id = ' . $cid);
$type = $club['type'];
$announcements = $obj->selectAll('*', 'announcement', 'club_id = ' . $cid);
$events = $obj->selectAll('*', 'event', 'club_id = ' . $cid);
$news = $obj->selectAll('n.*, c.name AS club', 'news AS n LEFT JOIN club AS c ON c.club_id = n.club_id', 'n.club_id = ' . $cid . ' LIMIT 3');
$images = $obj->selectAll('media_path', 'club_gallery', 'club_id = ' . $cid);
$ad = $obj->selectRow('*', 'advertisement', 'type = \'card\' RAND() LIMIT 1');
$club_type = '2 WHEEL CLUB';
if ($type == 'four_wheel') {
    $club_type = '4 WHEEL CLUB';
}
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="club-pad-top-108"></div>
        <section>
            <div class="container sec-club-logo">
                <div class="row">
                    <img src="<?php echo BASE_URL . $club['cover_image']; ?>" alt="Club Cover Imge" class="club-cover-image" />
                    <div class="col-lg-12">
                        <div class="row w-text club-cover-overlay">
                            <div class="w-text-con">
                                <h2 class="text-center"><?php echo $club['name']; ?></h2>
                            </div>
                            <div class="w-text-con">
                                <div class="w-img-con club-logo">
                                    <img src="<?php echo BASE_URL . $club['logo']; ?>" alt=""/>
                                </div>
                            </div>
                            <div class="w-text-con">
                                <h5 class="text-center"><?php echo $club_type; ?></h5>
                            </div>
                        </div>
                        <div class="row w-text-1 club-cover-overlay1">
                            <div class="w-text-con-1">
                                <div class="row">
                                    <?php if ($club['rank'] && $club['rank'] != 0) { ?>
                                        <div class="col-md-3">
                                            <p><i class="fa fa-signal" aria-hidden="true"></i> #<?php echo $club['rank']; ?></p>
                                        </div>
                                    <?php } ?>
                                    <div class="col-md-3">
                                        <p><i class="fa fa-users" aria-hidden="true"></i> <?php echo $club['no_of_member']; ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $club['city']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-text-con-1">
                                <div class="row">
                                    <div class="col-md-5">
                                        <p><a onclick="document.getElementById('about-club').classList.add('club-about')" style="cursor: pointer;">About</a></p>
                                        <div id="about-club">
                                            <p onclick="document.getElementById('about-club').classList.remove('club-about')">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </P>
                                            <h1>About Club</h1>
                                            <p><?php echo $club['about']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <li class="w-icon">
                                            <?php if ($club['facebook_link'] && $club['facebook_link'] != '') { ?>
                                                <a href="<?php echo $club['facebook_link']; ?>" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                                            <?php } ?>
                                            <?php if ($club['youtube_link'] && $club['youtube_link'] != '') { ?>
                                                <a href="<?php echo $club['youtube_link']; ?>" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>                                            
                                            <?php } ?>
                                            <?php if ($club['twitter_link'] && $club['twitter_link'] != '') { ?>
                                                <a href="<?php echo $club['twitter_link']; ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <?php } ?>
                                            <?php if ($club['instagram_link'] && $club['instagram_link'] != '') { ?>
                                                <a href="<?php echo $club['instagram_link']; ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                            <?php } ?>
                                        </li>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="fs-gal-view">
                <h1></h1>
                <img class="fs-gal-prev fs-gal-nav" src="img/prev.svg" alt="Previous picture" title="Previous picture" />
                <img class="fs-gal-next fs-gal-nav" src="img/next.svg" alt="Next picture" title="Next picture" />
                <img class="fs-gal-close" src="img/close.svg" alt="Close gallery" title="Close gallery" />
                <img class="fs-gal-main" src="" alt="" />
            </div>
            <!--pop-up-gallery-->

        </section>
        <div class="club-details event-section club-cover-overlay2">
            <div class="container ">
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        <div class="row">
                            <?php if ($club['club_video'] && $club['club_video'] != '' && $club['club_video'] != 'undefined') { ?>
                                <video muted loop controls id="myVideo" class="img-responsive">
                                    <source src="<?php echo BASE_URL . $club['club_video']; ?>" type="video/mp4">
                                </video>
                            <?php } ?>
                            <div class="img-b-10px club-gallery">
                                <?php foreach ($images as $row) { ?>
                                    <img class="fs-gal" src="<?php echo BASE_URL . $row['media_path']; ?>" alt=""  data-url="<?php echo BASE_URL . $row['media_path']; ?>" class="img-responsive"/>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 event-con">
                        <?php if (count($announcements) > 0) { ?>
                            <div class="box-anounce">
                                <h2>Announcements</h2>
                                <?php foreach ($announcements as $row) { ?>
                                    <div class="anounce box-anounce-1">
                                        <div class="anounce-con">
                                            <img src="<?php echo BASE_URL . $row['thumb_image']; ?>" alt="" class="img-responsive"/>
                                        </div> 
                                        <div class="anounce-con">
                                            <h5><a>CLUB ADMIN</a></h5>
                                            <span><em><?php echo date('M d, Y', strtotime($row['announcement_date'])); ?></em></span>
                                            <h3><?php echo $row['title']; ?></h3>
                                            <p><?php echo nl2br($row['description']); ?></p>
                                        </div>  
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <br/>
                        <?php if (count($news) > 0) { ?>
                            <div class="box-anounce update">
                                <h2>Updates</h2>
                                <div class="anounce">
                                    <div class="event-section-sub">
                                        <?php foreach ($news as $row) { ?>
                                            <div class="event-con-img">
                                                <div class="discover-slider">
                                                    <img src="<?php echo BASE_URL . $row['cover_image']; ?>" alt="" class="img-responsive"/>
                                                    <div class="discover-slider-content">
                                                        <p class="clb-bg"><?php echo $obj->charLimit($row['club'], 10); ?></p>
                                                        <h2><?php echo $obj->charLimit($row['title'], 15); ?></h2>
                                                        <p><?php echo $obj->charLimit($row['description'], 35); ?></p>
                                                        <center><a class="btn btn-primary" href="news?nid=<?php echo $row['news_id']; ?>">DISCOVER</a></center>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-3 col-md-12 box-anounce event-con">
                        <div class="col-lg-12 col-mg-12">
                            <h2>Events & Activities</h2>
                        </div>
                        <div class="col-lg-12 col-mg-12">
                            <div class="calendar-wrapper">
                                <button id="btnPrev" type="button">Prev</button>
                                <button id="btnNext" type="button">Next</button>
                                <div id="divCal"></div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-8">
                            <?php foreach ($events as $row) { ?>
                                <div class="anounce box-anounce-1">
                                    <div class="anounce-con-1">
                                        <h1><?php echo date('d', strtotime($row['event_date'])) ?></h1>
                                        <p class="text-center"><?php echo date('M', strtotime($row['event_date'])) ?></p>
                                    </div>  
                                    <div class="anounce-con-1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5><a>CLUB ADMIN</a></h5>
                                            </div>
                                            <div class="col-md-6">
                                                <p><em><?php echo date('M d, Y', strtotime($row['event_date'])) ?></em></p>
                                            </div>
                                        </div>
                                        <h3><?php echo $row['title']; ?></h3>
                                        <p><?php echo $row['description']; ?></p>
                                    </div>  
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-lg-12 col-md-4">
                            <div class="img-box-ad">
                                <img src="<?php echo BASE_URL . $ad['image']; ?>" alt="" class="img-responsive"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php' ?>
        <script>
            var Cal = function (divId) {

                //Store div id
                this.divId = divId;

                // Days of week, starting on Sunday
                this.DaysOfWeek = [
                    'Sun',
                    'Mon',
                    'Tue',
                    'Wed',
                    'Thu',
                    'Fri',
                    'Sat'
                ];

                // Months, stating on January
                this.Months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

                // Set the current month, year
                var d = new Date();

                this.currMonth = d.getMonth();
                this.currYear = d.getFullYear();
                this.currDay = d.getDate();

            };

    // Goes to next month
            Cal.prototype.nextMonth = function () {
                if (this.currMonth == 11) {
                    this.currMonth = 0;
                    this.currYear = this.currYear + 1;
                } else {
                    this.currMonth = this.currMonth + 1;
                }
                this.showcurr();
            };

    // Goes to previous month
            Cal.prototype.previousMonth = function () {
                if (this.currMonth == 0) {
                    this.currMonth = 11;
                    this.currYear = this.currYear - 1;
                } else {
                    this.currMonth = this.currMonth - 1;
                }
                this.showcurr();
            };

    // Show current month
            Cal.prototype.showcurr = function () {
                this.showMonth(this.currYear, this.currMonth);
            };

    // Show month (year, month)
            Cal.prototype.showMonth = function (y, m) {

                var d = new Date()
                        // First day of the week in the selected month
                        , firstDayOfMonth = new Date(y, m, 1).getDay()
                        // Last day of the selected month
                        , lastDateOfMonth = new Date(y, m + 1, 0).getDate()
                        // Last day of the previous month
                        , lastDayOfLastMonth = m == 0 ? new Date(y - 1, 11, 0).getDate() : new Date(y, m, 0).getDate();


                var html = '<table>';

                // Write selected month and year
                html += '<thead><tr>';
                html += '<td colspan="7">' + this.Months[m] + ' ' + y + '</td>';
                html += '</tr></thead>';


                // Write the header of the days of the week
                html += '<tr class="days">';
                for (var i = 0; i < this.DaysOfWeek.length; i++) {
                    html += '<td>' + this.DaysOfWeek[i] + '</td>';
                }
                html += '</tr>';

                // Write the days
                var i = 1;
                do {

                    var dow = new Date(y, m, i).getDay();

                    // If Sunday, start new row
                    if (dow == 0) {
                        html += '<tr>';
                    }
                    // If not Sunday but first day of the month
                    // it will write the last days from the previous month
                    else if (i == 1) {
                        html += '<tr>';
                        var k = lastDayOfLastMonth - firstDayOfMonth + 1;
                        for (var j = 0; j < firstDayOfMonth; j++) {
                            html += '<td class="not-current">' + k + '</td>';
                            k++;
                        }
                    }

                    // Write the current day in the loop
                    var chk = new Date();
                    var chkY = chk.getFullYear();
                    var chkM = chk.getMonth();
                    if (chkY == this.currYear && chkM == this.currMonth && i == this.currDay) {
                        html += '<td class="today">' + i + '</td>';
                    } else {
                        html += '<td class="normal">' + i + '</td>';
                    }
                    // If Saturday, closes the row
                    if (dow == 6) {
                        html += '</tr>';
                    }
                    // If not Saturday, but last day of the selected month
                    // it will write the next few days from the next month
                    else if (i == lastDateOfMonth) {
                        var k = 1;
                        for (dow; dow < 6; dow++) {
                            html += '<td class="not-current">' + k + '</td>';
                            k++;
                        }
                    }

                    i++;
                } while (i <= lastDateOfMonth);

                // Closes table
                html += '</table>';

                // Write HTML to the div
                document.getElementById(this.divId).innerHTML = html;
            };

    // On Load of the window
            window.onload = function () {

                // Start calendar
                var c = new Cal("divCal");
                c.showcurr();

                // Bind next and previous button clicks
                getId('btnNext').onclick = function () {
                    c.nextMonth();
                };
                getId('btnPrev').onclick = function () {
                    c.previousMonth();
                };
            }

    // Get element by id
            function getId(id) {
                return document.getElementById(id);
            }
        </script>
    </body>
</html>
