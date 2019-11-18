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
        <section class="workshop-cover-bg" style="background: url(img/workshop/workshop-landing-cover.jpg)no-repeat;background-size: cover;background-position: center;width: 100%; height: 600px;">
            <div class="container">
                <ul class="workshop-teaser">
                    <li>Workshop Teaser 1</li>
                    <li>Workshop Teaser 2</li>
                    <li>Workshop Teaser 3</li>
                </ul>
            </div>
        </section>
        <section class="workshop-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>WORKSHOP</h3>
                    </div>
                </div>
                <div class="border-bottom" style="padding-bottom: 40px;padding-top: 40px;">
                    <div class="row">
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
                        </div>
                    </div>
                </div>
                <div class="border-bottom" style="padding-bottom: 40px;padding-top: 40px;">
                    <div class="row">
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
                        </div>
                    </div>
                </div>
                <div class="border-bottom" style="padding-bottom: 40px;padding-top: 40px;">
                    <div class="row">
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.php'; ?>
    </body>
</html>