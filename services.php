<!DOCTYPE html>
<html>
    <?php $page = 'service';
    include 'head.php';
    ?>
    <body>
<?php include 'menu.php'; ?>
        <div class="sub-banner-section">
            <div class="container sub-banner-content">
                <h3>Services</h3>
            </div>
        </div>
        <div class="services-section">
            <div class="container">
                <div class="service-content">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="service-bg-section" onclick="window.location = 'services-fabrication'">
                                <div class="service-img">
                                    <img src="img/pic-mechanical-landing.jpg" alt="">
                                </div>
                                <div class="service-title">
                                    <h3>Mechanical</h3>
                                </div>
                                <div class="service-bg-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                    <a href="services-fabrication" class="btn btn-custome">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="service-bg-section" onclick="window.location = 'services-steel-structural'">
                                <div class="service-img"><img src="img/pic-steel-structural-landing.jpg" alt=""></div>
                                <div class="service-title">
                                    <h3>Steel Structural</h3>
                                </div>
                                <div class="service-bg-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                    <a href="services-steel-structural" class="btn btn-custome">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="service-bg-section" onclick="window.location = 'services-scaffolding'">
                                <div class="service-img"><img src="img/pic-scaffolding-landing.jpg" alt=""></div>
                                <div class="service-title">
                                    <h3>Scaffolding</h3>
                                </div>
                                <div class="service-bg-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                    <a href="services-scaffolding" class="btn btn-custome">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="service-bg-section" onclick="window.location = 'services-piping-insulation'">
                                <div class="service-img"><img src="img/pic-piping-landing.jpg" alt=""></div>
                                <div class="service-title">
                                    <h3>Piping & Insulation</h3>
                                </div>
                                <div class="service-bg-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                    <a href="services-piping-insulation" class="btn btn-custome">Read More</a>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
<?php include 'footer.php'; ?>
        <script type="text/javascript">

            $(document).ready(function () {
                $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function () {
                    $(this).toggleClass('open');
                });
            }
            );



            $(document).ready(function () {
                $("#nav-icon1").click(function () {
                    $(".mob-nav-bar").toggle();
                });
            });
        </script>
    </body>
</html>