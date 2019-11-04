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
        <section class="workshop-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>WORKSHOP</h3>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-md-2">
                        <img src="img/slider/slider-002.png" alt="" class="image-border-width">
                    </div>
                    <div class="col-md-10">
                        <h4>Workshop Title</h4>
                        <span>Location | Expertise(Category)</span>
                        <div class="rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span> 
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <a href="workshop?type=<?php echo $type; ?>" class="workshop-btn"> Read More</a>
                        <br/>
                        <br/>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.php'; ?>
    </body>
</html>