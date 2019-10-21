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
        <div class="press-release">
            <div class="container-fluid">
                <div class="row">
                    <div class="news-banner text-center">
                        <img src="img/workshop-banner.jpg" alt="" class="news-cover-image" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row events-content">
                    <div class="col-md-12">
                        <div class="events-main-content">
                            <h1 class="workshop-title">Workshop Title</h1>
                            <h2>About the Workshop Provider</h2>
                            <span>Location | Expertise(Category)</span>
                            <div class="rating">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span> 
                            </div>
                            <br/>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <img src="img/workshop/banner.jpg" alt="" style="width: 100%" />
                            <br/>
                            <br/>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <img src="img/workshop/banner.jpg" alt="" style="width: 100%" />
                            <br/>
                            <br/>
                            <div class="news-gallery">
                                <h3>Gallery</h3>
                                <div class="row event-gallery-section">
                                    <div class="col-md-2 col-sm-6">
                                        <img class="fs-gal" src="img/workshop/001.jpg" alt="" data-url=""/>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <img class="fs-gal" src="img/workshop/002.jpg" alt="" data-url=""/>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <img class="fs-gal" src="img/workshop/003.jpg" alt="" data-url=""/>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <img class="fs-gal" src="img/workshop/004.jpg" alt="" data-url="img/workshop/004.jpg"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <h3>Videos</h3>
                    </div>
                    <div class="col-md-6">
                        <iframe src="https://www.youtube.com/embed/0hnzrgOw-xM?start=345" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width: 100%;height: 315px"></iframe>
                    </div>
                    <div class="col-md-6">
                        <iframe src="https://www.youtube.com/embed/cbd1hXsYnpQ?start=12" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width: 100%;height: 315px;"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
        <script type="text/javascript">
            var modal = document.getElementById('pop-img');
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    </body>
</html>
