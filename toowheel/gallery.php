<?php
if (!isset($_GET['type'])) {
    header('Location: ../index.php');
}
$type = $_GET['type'];
require_once 'api/include/common.php';
$obj = new Common();
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="padding-top-108"></div>
        <section id="gallery">
            <div class="container">
                <h1>Nom Nom Gallery</h1>
                <div class="grid">
                    <div class="item">
                        <div class="item__details">
                            jelly-o brownie sweet
                        </div>
                    </div>
                    <div class="item item--large">
                        <div class="item__details">
                            Muffin jelly gingerbread 
                        </div>
                    </div>
                    <div class="item item--medium">
                        <div class="item__details">
                            sesame snaps chocolate
                        </div>
                    </div>
                    <div class="item item--large">
                        <div class="item__details">
                            Oat cake
                        </div>
                    </div>
                    <div class="item item--full">
                        <div class="item__details">
                            jujubes cheesecake
                        </div>
                    </div>
                    <div class="item item--medium">
                        <div class="item__details">
                            Dragée pudding brownie
                        </div>
                    </div>
                    <div class="item item--large">
                        <div class="item__details">
                            Oat cake
                        </div>
                    </div>
                    <div class="item">
                        <div class="item__details">
                            powder toffee
                        </div>
                    </div>
                    <div class="item item--medium">
                        <div class="item__details">
                            pudding cheesecake
                        </div>
                    </div>
                    <div class="item item--large">
                        <div class="item__details">
                            toffee bear claw 
                        </div>
                    </div>
                    <div class="item">
                        <div class="item__details">
                            cake cookie croissant
                        </div>
                    </div>
                    <div class="item item--medium">
                        <div class="item__details">
                            liquorice sweet roll
                        </div>
                    </div>
                    <div class="item item--medium">
                        <div class="item__details">
                            chocolate marzipan
                        </div>
                    </div>
                    <div class="item item--large">
                        <div class="item__details">
                            danish dessert lollipop
                        </div>
                    </div>
                    <div class="item">
                        <div class="item__details">
                            sugar plum dragée
                        </div>
                    </div>
                </div>
            </div><!-- End image gallery -->
        </div><!-- End container --> 
    </section>
    <?php include 'footer.php'; ?>
</body>
</html>