<?php
if (!isset($_GET['type'])) {
    header('Location: ../index.php');
}
$type = $_GET['type'];
require_once 'api/include/common.php';
$obj = new Common();
$findclub = $obj->selectAll('*', 'club', 'club_id > 0 AND type = \'' . $type . '\' AND published = 1');
$categories = $obj->selectAll('*', 'category', 'category_id > 0 AND type = \'' . $type . '\'');
$states = $obj->selectAll('*', 'state', 'state_id > 0');
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="padding-top-108"></div>
        <div class="find-club-title">
            <div class="container">
                <h1>FIND A CLUB</h1>
            </div>
        </div>
        <div class="find-club">
            <div class="container">
                <div class="row">
                    <div class="search-section">
                        <input type="text" name="search" placeholder="Search Club Name" id="filter_name" />
                        <a href="#" onclick="filterClub();" class="search-btn">Search</a>
                    </div>
                    <div class="search-sort-order">
                        <label>Order:</label>
                        <select onchange="filterClub();" id="filter_order">
                            <option value="asc">A-Z</option>
                            <option value="desc">Z-A</option>
                        </select>
                    </div>
                    <div class="search-sort-order">
                        <label>Category:</label>
                        <select onchange="filterClub();" id="filter_category">
                            <option value="">All</option>
                            <?php foreach ($categories as $cat) { ?>
                                <option value="<?php echo $cat['category_id']; ?>"><?php echo $cat['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="search-sort-order">
                        <label>Show:</label>
                        <select onchange="filterClub();" id="filter_limit">
                            <option value="">All</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="search-sort-order">
                        <label>State:</label>
                        <select onchange="filterClub();" id="filter_state">
                            <option value="">All</option>
                            <?php foreach ($states as $row) { ?>
                                <option value="<?php echo $row['state_id']; ?>"><?php echo $row['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row" style="max-width: 1200px; margin: 0 auto;" id="club_list">
                    <?php foreach ($findclub as $row) { ?>
                        <div class="club-box" data-name="<?php echo $row['name']; ?>" data-state="<?php echo $row['state_id']; ?>" data-category="<?php echo $row['category_id']; ?>">
                            <div class="rank-button">
                                <?php if ($row['rank'] && $row['rank'] != 0) { ?>
                                    <span>#<?php echo $row['rank']; ?></span>
                                <?php } ?>
                            </div>
                            <img src="<?php echo BASE_URL . $row['logo']; ?>" alt="" />
                            <h3> <?php echo $row['name']; ?></h3>
                            <p> <?php echo $row['city']; ?></p>
                            <a href="club-page?cid=<?php echo $row['club_id']; ?>" class="find-club-button">Read More</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>