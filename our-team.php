<html lang="en">
    <?php
    $page = 'about';
    include 'head.php';
    ?>

    <body>

        <!--==========================
          Header
        ============================-->
        <?php include 'menu.php' ?>

        <div class="banner-w3layouts four">

            <div class="banner-w3layouts-info two">
                <!--/search_form -->
                <div id="banner-w3layouts-info" class="search_top text-center">
                    <h3><strong>Our Team</strong></h3>
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="breadcrumb-item">About</li>
                        <li class="breadcrumb-item active">Our Team</li>
                    </ol>
                </div>
                <!--//banner-w3layouts-info -->
            </div>

        </div>
        <!--==========================
                      Leadership Section
                    ============================-->
        <section id="custome">
            <div class="container">

                <header class="section-header">
                    <h3>OUR TEAM</h3>
                </header>
                <div class="row about-cols">
                    <div class="col-md-12 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="about-col">
                            <p class="our-team-para">At SARO Group, our Technicians come from across the globe plastic industry and are experts in design, development, integration and service. This expertise is evident in our technology and our systems which exceed all critical industry specifications for precision, availability and reliability. We believe they are the most innovative and talented technical staff working anywhere in the industry.</p>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <section id="portfolio"  class="section-bg" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="img/team/team-01.jpg" class="img-fluid" alt="">
                                <a href="img/team/team-Sub.jpg" class="link-preview" data-lightbox="portfolio" title="Preview"><i class="ion ion-eye"></i></a>
<!--                                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>-->
                            </figure>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="img/team/team-02.jpg" class="img-fluid" alt="">
                                <a href="img/team/banner-team2.png" class="link-preview" data-lightbox="portfolio" title="Preview"><i class="ion ion-eye"></i></a>
<!--                                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>-->
                            </figure>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="img/team/team-03.jpg" class="img-fluid" alt="">
                                <a href="img/team/banner-team3.png" class="link-preview" data-lightbox="portfolio" title="Preview"><i class="ion ion-eye"></i></a>
<!--                                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>-->
                            </figure>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <?php include 'footer.php' ?>

    </body>
</html>