<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
if (!isset($_GET['type'])) {
    header('Location: ../index.php');
}
$type = $_GET['type'];
require_once 'api/include/common.php';
$obj = new Common();
$events = $obj->selectAll('e.*, c.name AS club, ca.name AS category', 'event AS e LEFT JOIN club AS c ON c.club_id = e.club_id LEFT JOIN category AS ca ON ca.category_id = e.category_id AND ca.category_id = c.category_id', 'e.event_id > 0 AND e.type = \'' . $type . '\' AND e.event_date >= \'' . date('Y-m-d') . '\' ORDER BY e.event_date DESC');
$past_events = $obj->selectAll('e.*, c.name AS club, ca.name AS category', 'event AS e LEFT JOIN club AS c ON c.club_id = e.club_id LEFT JOIN category AS ca ON ca.category_id = e.category_id AND ca.category_id = c.category_id', 'e.event_id > 0 AND e.type = \'' . $type . '\' AND e.event_date < \'' . date('Y-m-d') . '\' ORDER BY e.event_date ASC');
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="padding-top-108"></div>
        <section class="event-sec">
            <div class="container event-container">
                <div class="event-title">
                    <h3>UPCOMING EVENTS</h3>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <?php foreach ($events as $row) { ?>
                            <div class="event-n">
                                <h3><?php echo $row['title']; ?></h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12 event-img">
                                                <img src="<?php echo BASE_URL . $row['cover_image']; ?>" alt="" class="img-responsive"/>
                                            </div>
                                            <div class="col-md-12 event-conent">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p><span>Club Name:</span> <?php echo $row['club_id']; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <p><span>Date:</span> <?php echo date('M d, Y', strtotime($row['event_date'])); ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <p><span>Location:</span></p>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <p><?php echo $row['location']; ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 event-desc">
                                        <span>Description</span>
                                        <p><?php echo nl2br($row['description']); ?></p>
                                        <br/>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!--                    </div>
                                            <div class="event-num-1">-->
                        <!--                        <div class="event-n">
                                                    <h3>Event Title</h3>
                                                    <div class="row">
                                                        <div class="col-md-3 event-img">
                                                            <img src="img/events/005.jpg" alt="" class="img-responsive"/>
                                                        </div>
                                                        <div class="col-md-3 event-conent">
                                                            <p><span>Date:</span> 06-09-2019</p>
                                                            <p><span>Location:</span> Malaysia</p>
                                                            <p><span>Club Name:</span> Name</p>
                                                        </div>
                                                        <div class="col-md-6 event-desc">
                                                            <span>Description</span>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                                            <br/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 event-btn-width">
                                                            <div class="button-8">
                                                                <div class="eff-8"></div>
                                                                <a href="#">Attend</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>-->
                        <!--                    </div>
                                            <div class="event-num-1">-->
                        <!--                        <div class="event-n">
                                                    <h3>Event Title</h3>
                                                    <div class="row">
                                                        <div class="col-md-3 event-img">
                                                            <img src="img/events/005.jpg" alt="" class="img-responsive"/>
                                                        </div>
                                                        <div class="col-md-3 event-conent">
                                                            <p><span>Date:</span> 06-09-2019</p>
                                                            <p><span>Location:</span> Malaysia</p>
                                                            <p><span>Club Name:</span> Name</p>
                                                        </div>
                                                        <div class="col-md-6 event-desc">
                                                            <span>Description</span>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                                            <br/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 event-btn-width">
                                                            <div class="button-8">
                                                                <div class="eff-8"></div>
                                                                <a href="#">Attend</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>-->
                    </div>
                    <div class="col-md-4">
                        <?php if (count($past_events) > 0) { ?>
                            <div class="past-event">
                                <h5>Past Events</h5>
                                <?php foreach ($past_events as $row) { ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="<?php echo BASE_URL . $row['thumb_image']; ?>" alt="image" class="img-responsive"/>
                                            <p><span>Date:</span> <?php echo date('M d, Y', strtotime($row['event_date'])); ?></p>
                                            <p><span>Location:</span> <?php echo $row['location']; ?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <h3><?php echo $row['title']; ?></h3>
                                            <p><span>Club Name:</span> <?php echo $row['club']; ?></p>
                                            <p><strong>Description</strong><br/> <?php echo $obj->charLimit($row['description'], 200); ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.php'; ?>
    </body>
</html>
