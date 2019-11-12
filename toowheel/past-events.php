<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
if (!isset($_GET['type'])) {
    header('Location: ../index.php');
}
$type = $_GET['type'];
require_once 'api/include/common.php';
$obj = new Common();
$events = $obj->selectAll('e.*, c.name AS club, ca.name AS category', 'event AS e LEFT JOIN club AS c ON c.club_id = e.club_id LEFT JOIN category AS ca ON ca.category_id = e.category_id AND ca.category_id = c.category_id', 'e.event_id > 0 AND e.type = \'' . $type . '\' AND e.event_date >= \'' . date('Y-m-d') . '\' ORDER BY e.event_date DESC');
$past_events = $obj->selectAll('e.*, c.name AS club, ca.name AS category', 'event AS e LEFT JOIN club AS c ON c.club_id = e.club_id LEFT JOIN category AS ca ON ca.category_id = e.category_id AND ca.category_id = c.category_id', 'e.event_id > 0 AND e.type = \'' . $type . '\' AND e.event_to_date < \'' . date('Y-m-d') . '\' ORDER BY e.event_to_date DESC');
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="padding-top-108"></div>
        <div class="past-events-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Past Events</h3>
                        <?php if (count($past_events) > 0) { ?>
                            <div class="past-event">
                                <?php foreach ($past_events as $row) { ?>
                                <h3><?php echo $row['title']; ?></h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="<?php echo BASE_URL . $row['thumb_image']; ?>" alt="image" class="img-responsive"/>
                                        </div>
                                        <div class="col-md-6">
                                            <p><span>Club/Sponsor:</span> <?php echo $row['club_id'] != 0 ? $obj->charLimit($row['club'], 20) : $obj->charLimit($row['sponsor'], 20); ?></p>
                                           <p><span>From Date:</span> <?php echo date('M d, Y', strtotime($row['event_from_date'])); ?> | <span>To Date:</span> <?php echo date('M d, Y', strtotime($row['event_to_date'])); ?></p>
                                            <p><span>Location:</span> <?php echo $row['location']; ?></p>
                                            <br/>
                                            <p><strong>Description</strong><br/> <?php echo $row['description']; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>