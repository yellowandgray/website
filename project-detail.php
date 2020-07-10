<!DOCTYPE html>
<html>
    <?php
    $page = 'project';
    include 'head.php';
    ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="sub-banner-section">
            <div class="container sub-banner-content">
                <h3>Project Detail</h3>
            </div>
        </div>
        <div class="project-details-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Project Title Comes Here</h2>
                        <img src="img/home-banner-01.jpg" alt=""/>
                    </div>
                </div>
                <div class="details-content">
                    <div class="row">
                        <div class="col-md-7">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        </div>
                        <div class="col-md-5">
                            <h3>Project Images</h3>
                            <div class="row p-b-20">
                                <div class="col-md-6">
                                    <img src="img/pic-about-everest.jpg" alt="" />
                                </div>
                                <div class="col-md-6">
                                    <img src="img/pic-about-everest.jpg" alt="" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="img/pic-about-everest.jpg" alt="" />
                                </div>
                                <div class="col-md-6">
                                    <img src="img/pic-about-everest.jpg" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'footer.php'; ?>
            <script type="text/javascript">

                //Client Slider JS //
                $(document).ready(function () {
                    $('.customer-logos').slick({
                        slidesToShow: 5,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 1500,
                        arrows: false,
                        dots: false,
                        pauseOnHover: false,
                        responsive: [{
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 3
                                }
                            }, {
                                breakpoint: 520,
                                settings: {
                                    slidesToShow: 2
                                }
                            }]
                    });
                });

                $(document).ready(function () {
                    $('.project-slider').slick({
                        slidesToShow: 3,
                        slidesToScroll: 2,
                        autoplay: true,
                        autoplaySpeed: 1500,
                        arrows: false,
                        dots: false,
                        pauseOnHover: false,
                        responsive: [{
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 2
                                }
                            }, {
                                breakpoint: 520,
                                settings: {
                                    slidesToShow: 1
                                }
                            }]
                    });
                });
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
        </div>
    </body>
</html>