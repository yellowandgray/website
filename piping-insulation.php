<!DOCTYPE html>
<html>
    <?php
    $page = 'service';
    include 'head.php';
    ?>
    <body>
<?php include 'menu.php'; ?>
        <div class="sub-banner-section">
            <div class="container sub-banner-content">
                <h3>Piping Insulation</h3>
            </div>
        </div>
        <section class="about-company-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="everest-about">
                            <h3>Everest Engineering & Construction</h3>
                            <p><strong>Everest E&C Pte Ltd</strong> now become upgraded to Everest Engineering & Construction Private Limited. Everest E&C is now providing services in Machineries Installation, Steel Structure, Scaffolding, Piping & Insulation.</p>
                            <p>We are a company with a team well qualified professionals ranges from top management to the technical workers.</p>
                            <p>We have well experienced and well trained site managers, lifting supervisors, technical workers to ensure that the works are completed on schedule with the proposed design complaint. We always focus into worker safety, site safety and minimisation of neighbouring impact.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="img/pic-about-everest.jpg" alt="about everest" />
                    </div>
                </div>
            </div>
        </section>
        <section class="project-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Projects</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <section class="project-slider slider">
                            <div class="slide">
                                <img src="img/project/001.jpg">
                                <h4>Project Title</h4>
                                <p>Year 2016 - TDP-03 TUAS, Tampines Town Hub, Holland Road, CCD Jurong Island. Year 2015 : CWRP, Tank Store, Pulau Bukom, Jurong Island, DUO-Ophir Bugis Skyline.</p>
                            </div>
                            <div class="slide">
                                <img src="img/project/002.jpg">
                                <h4>Project Title</h4>
                                <p>Varius dui, quis posuere nibh mollis quis. Mauris omma rhoncus porttitor. Maecenas et euismod is elit. Nulla lus libero, ultrices</p>
                            </div>
                            <div class="slide">
                                <img src="img/project/003.jpg">
                                <h4>Project Title</h4>
                                <p>Varius dui, quis posuere nibh mollis quis. Mauris omma rhoncus porttitor. Maecenas et euismod is elit. Nulla lus libero, ultrices</p>
                            </div>
                            <div class="slide">
                                <img src="img/project/001.jpg">
                                <h4>Project Title</h4>
                                <p>Year 2016 - TDP-03 TUAS, Tampines Town Hub, Holland Road, CCD Jurong Island. Year 2015 : CWRP, Tank Store, Pulau Bukom, Jurong Island, DUO-Ophir Bugis Skyline.</p>
                            </div>
                            <div class="slide">
                                <img src="img/project/002.jpg">
                                <h4>Project Title</h4>
                                <p>Varius dui, quis posuere nibh mollis quis. Mauris omma rhoncus porttitor. Maecenas et euismod is elit. Nulla lus libero, ultrices</p>
                            </div>
                            <div class="slide">
                                <img src="img/project/003.jpg">
                                <h4>Project Title</h4>
                                <p>Varius dui, quis posuere nibh mollis quis. Mauris omma rhoncus porttitor. Maecenas et euismod is elit. Nulla lus libero, ultrices</p>
                            </div>
                        </section>
                    </div>
                </div>
                <center>
                    <a href="projects" class="btn btn-custome">See More Projects</a>
                </center>
            </div>
        </section>
        <section class="client-section">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Clients</h3>
                    </div>
                </div>
                <section class="customer-logos slider">
                    <div class="slide"><img src="img/clients/client-pentaocean.jpg"></div>
                    <div class="slide"><img src="img/clients/client-smitech.jpg"></div>
                    <div class="slide"><img src="img/clients/client-hsl.jpg"></div>
                    <div class="slide"><img src="img/clients/client-wec.jpg"></div>
                    <div class="slide"><img src="img/clients/client-steadfast.jpg"></div>
                    <div class="slide"><img src="img/clients/client-stolz.jpg"></div>
                </section>
                <br/>
                <center>
                    <a href="clients" class="btn btn-custome">See More Clients</a>
                </center>
            </div>
        </section>
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
    </body>
</html>