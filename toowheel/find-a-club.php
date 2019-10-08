<?php
if (!isset($_GET['type'])) {
    header('Location: ../index.php');
}
$type = $_GET['type'];
require_once 'api/include/common.php';
$obj = new Common();
$findclub = $obj->selectAll('*', 'club', 'club_id > 0 AND type = \'' . $type . '\'');
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
                        <input type="text" name="search" placeholder="Search Club Name" />
                        <a href="#" class="search-btn">Search</a>
                    </div>
                    <div class="search-sort-order">
                        <label>Name:</label>
                        <select>
                            <option value="A-Z">A-Z</option>
                            <option value="Z-A">Z-A</option>
                        </select>
                    </div>
                    <div class="search-sort-order">
                        <label>Category:</label>
                        <select>
                            <option value="All">All</option>
                            <option value="125cc">125cc</option>
                            <option value="250cc">250cc</option>
                            <option value="500cc">500cc</option>
                        </select>
                    </div>
                    <div class="search-sort-order">
                        <label>Show:</label>
                        <select>
                            <option value="All">All</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="search-sort-order">
                        <label>State:</label>
                        <select>
                            <option value="All">All</option>
                            <option value="Johor">Johor</option>
                            <option value="Kedah">Kedah</option>
                            <option value="Kelantan">Kelantan</option>
                            <option value="Kuala-Lumpur">Kuala Lumpur</option>
                            <option value="Labuan">Labuan</option>
                            <option value="Melaka">Melaka</option>
                            <option value="Negeri-Sembilan">Negeri Sembilan</option>
                            <option value="Pahang">Pahang</option>
                            <option value="Perak">Perak</option>
                            <option value="Perlis">Perlis</option>
                            <option value="Pulau-Pinang">Pulau Pinang</option>
                            <option value="Putrajaya">Putrajaya</option>
                            <option value="Sabah">Sabah</option>
                            <option value="Sarawak">Sarawak</option>
                            <option value="Selangor">Selangor</option>
                            <option value="Terengganu">Terengganu</option>
                            <option value="Putrajaya">Putrajaya</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row" style="max-width: 1200px; margin: 0 auto;">
                    <?php foreach ($findclub as $row) { ?>
                        <!--                        <div class="col-md-2 col-sm-6">-->
                        <div class="club-box">
                            <?php if ($row['rank'] && $row['rank'] != 0) { ?>
                                <span>#<?php echo $row['rank']; ?></span>
                            <?php } ?>
                            <img src="<?php echo BASE_URL . $row['logo']; ?>" alt="" />
                            <h3> <?php echo $row['name']; ?></h3>
                            <p> <?php echo $row['city']; ?></p>
                            <a href="club-page.php?cid=<?php echo $row['club_id']; ?>" class="find-club-button"> Read More</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>