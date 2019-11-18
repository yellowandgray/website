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
<!--        <section class="workshop-cover-bg" style="background: url(img/workshop/workshop-landing-cover.jpg)no-repeat;background-size: cover;background-position: center;width: 100%; height: 600px;">
            <div class="container">
                <ul class="workshop-teaser">
                    <li>Workshop Teaser 1</li>
                    <li>Workshop Teaser 2</li>
                    <li>Workshop Teaser 3</li>
                </ul>
            </div>
        </section>-->
        <section class="workshop-slider">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                        Workshop Teaser 1
                    </li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1">
                        Workshop Teaser 2
                    </li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2">
                        Workshop Teaser 3
                    </li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="img/workshop/workshop-landing-cover.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/workshop/workshop-landing-cover.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/workshop/workshop-landing-cover.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
        <section class="workshop-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3>WORKSHOP</h3>
                    </div>
                    <div class="col-md-6">
                        <div class="workshop-sort-list">
                            <i class="fa fa-sliders" aria-hidden="true"></i>
                            <i class="fa fa-sort-amount-asc" aria-hidden="true"></i>
                            <i class="fa fa-th-list" aria-hidden="true"></i>
                            <div class="workshop-search">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                <input type="text" placeholder="Search Here..." />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="workshop-list-section">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="image-border-width" style="background: url(img/workshop/001.jpg)no-repeat;background-position: center;background-size: cover;">
                                <img src="img/workshop/workshop-logo.png" alt="" />
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="list-part-section">
                                <p>Bike Experts Brothers</p>
                                <h4>Engine Optimization Workshop</h4>
                                <span>Reviews</span>
                                <div class="rating">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span> 
                                </div>
                                <div class="list-tag-section">
                                    <span>Tags</span>
                                    <ul>
                                        <li>Engine</li>
                                        <li>Maintenance</li>
                                        <li>500cc+ Motorbikes</li>
                                    </ul>
                                </div>
    <!--                            <a href="workshop?type=<?php echo $type; ?>" class="workshop-btn"> Read More</a>-->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="list-part-section1">
                                <p><i class="fa fa-map-marker" aria-hidden="true"></i> Petaling Jaya, Selangor</p>
                            </div>
                            <div class="list-part-section2">
                                <p>Member's Recommendation <i class="fa fa-long-arrow-up" aria-hidden="true"></i><span>13</span> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="workshop-list-section">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="image-border-width" style="background: url(img/workshop/001.jpg)no-repeat;background-position: center;background-size: cover;">
                                <img src="img/workshop/workshop-logo.png" alt="" />
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="list-part-section">
                                <p>Bike Experts Brothers</p>
                                <h4>Engine Optimization Workshop</h4>
                                <span>Reviews</span>
                                <div class="rating">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span> 
                                </div>
                                <div class="list-tag-section">
                                    <span>Tags</span>
                                    <ul>
                                        <li>Engine</li>
                                        <li>Maintenance</li>
                                        <li>500cc+ Motorbikes</li>
                                    </ul>
                                </div>
    <!--                            <a href="workshop?type=<?php echo $type; ?>" class="workshop-btn"> Read More</a>-->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="list-part-section1">
                                <p><i class="fa fa-map-marker" aria-hidden="true"></i> Petaling Jaya, Selangor</p>
                            </div>
                            <div class="list-part-section2">
                                <p>Member's Recommendation <i class="fa fa-long-arrow-up" aria-hidden="true"></i><span>13</span> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="workshop-list-section">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="image-border-width" style="background: url(img/workshop/001.jpg)no-repeat;background-position: center;background-size: cover;">
                                <img src="img/workshop/workshop-logo.png" alt="" />
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="list-part-section">
                                <p>Bike Experts Brothers</p>
                                <h4>Engine Optimization Workshop</h4>
                                <span>Reviews</span>
                                <div class="rating">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span> 
                                </div>
                                <div class="list-tag-section">
                                    <span>Tags</span>
                                    <ul>
                                        <li>Engine</li>
                                        <li>Maintenance</li>
                                        <li>500cc+ Motorbikes</li>
                                    </ul>
                                </div>
    <!--                            <a href="workshop?type=<?php echo $type; ?>" class="workshop-btn"> Read More</a>-->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="list-part-section1">
                                <p><i class="fa fa-map-marker" aria-hidden="true"></i> Petaling Jaya, Selangor</p>
                            </div>
                            <div class="list-part-section2">
                                <p>Member's Recommendation <i class="fa fa-long-arrow-up" aria-hidden="true"></i><span>13</span> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="workshop-list-section">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="image-border-width" style="background: url(img/workshop/001.jpg)no-repeat;background-position: center;background-size: cover;">
                                <img src="img/workshop/workshop-logo.png" alt="" />
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="list-part-section">
                                <p>Bike Experts Brothers</p>
                                <h4>Engine Optimization Workshop</h4>
                                <span>Reviews</span>
                                <div class="rating">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span> 
                                </div>
                                <div class="list-tag-section">
                                    <span>Tags</span>
                                    <ul>
                                        <li>Engine</li>
                                        <li>Maintenance</li>
                                        <li>500cc+ Motorbikes</li>
                                    </ul>
                                </div>
    <!--                            <a href="workshop?type=<?php echo $type; ?>" class="workshop-btn"> Read More</a>-->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="list-part-section1">
                                <p><i class="fa fa-map-marker" aria-hidden="true"></i> Petaling Jaya, Selangor</p>
                            </div>
                            <div class="list-part-section2">
                                <p>Member's Recommendation <i class="fa fa-long-arrow-up" aria-hidden="true"></i><span>13</span> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.php'; ?>
        <script>
            $('.carousel').carousel({
                interval: 1000
            });
        </script>
    </body>
</html>