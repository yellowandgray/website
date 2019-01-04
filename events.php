<html lang="en">
    <?php
    require_once 'include/master.php';
    require_once 'include/common.php';
    $object = new master();
    $result1 = $object->getAllBanner();
    $titles = [];
    if ($result1['error'] === false) {
        $titles = $result1['data'];
    }
    $page = 'news';
    include 'head.php';
    ?>

    <body>

        <!--==========================
          Header
        ============================-->
        <?php include 'menu.php' ?>

        <div class="banner-w3layouts six">

            <div class="banner-w3layouts-info six">
                <!--/search_form -->
                <div id="banner-w3layouts-info" class="search_top text-center">
                    <h3><strong>Events</strong></h3>
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="breadcrumb-item">About</li>
                        <li class="breadcrumb-item active">Events</li>
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
                    <h3>EVENTS</h3>
                </header>
                <div class="row about-cols">
                    <?php foreach ($titles as $title) { ?>
                        <div class = "col-md-4 wow fadeInUp">
                            <div class = "about-col">
                                <div class = "img">
                                    <img src = "https://www.yellowandgray.com/arunpla/v1/<?php echo $title['eventimage']?>" alt = "" class = "img-fluid">
                                </div>
                                <h2 class = "event-title bold"><a href = "#"><?php echo $title['eventtitle']?></a></h2>
                                <p class = "text-center"><?php echo $title['eventdate']?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <div class = "col-md-4 wow fadeInUp">
                        <div class = "about-col">
                            <div class = "img">
                                <img src = "img/events/events-01.jpg" alt = "" class = "img-fluid">
                            </div>
                            <h2 class = "event-title bold"><a href = "#">JOY OF GIVING</a></h2>
                            <p class = "text-center">May 20, 2015</p>
                        </div>
                    </div>

                    <div class = "col-md-4 wow fadeInUp" data-wow-delay = "0.1s">
                        <div class = "about-col">
                            <div class = "img">
                                <img src = "img/events/events-02.jpg" alt = "" class = "img-fluid">
                            </div>
                            <h2 class = "event-title bold"><a href = "#">Helping Hand Program</a></h2>
                            <p class = "text-center">April 20, 2015</p>
                        </div>
                    </div>

                    <div class = "col-md-4 wow fadeInUp" data-wow-delay = "0.2s">
                        <div class = "about-col">
                            <div class = "img">
                                <img src = "img/events/events-03.jpg" alt = "" class = "img-fluid">
                            </div>
                            <h2 class = "event-title bold"><a href = "#">Womens Day</a></h2>
                            <p class = "text-center">March 20, 2015</p>
                        </div>
                    </div>

                    <div class = "col-md-4 wow fadeInUp" data-wow-delay = "0.2s">
                        <div class = "about-col">
                            <div class = "img">
                                <img src = "img/events/events-04.jpg" alt = "" class = "img-fluid">
                            </div>
                            <h2 class = "event-title bold"><a href = "#">Blood Camp</a></h2>
                            <p class = "text-center">August 14, 2014</p>
                        </div>
                    </div>

                    <div class = "col-md-4 wow fadeInUp" data-wow-delay = "0.2s">
                        <div class = "about-col">
                            <div class = "img">
                                <img src = "img/events/events-05.jpg" alt = "" class = "img-fluid">
                            </div>
                            <h2 class = "event-title bold"><a href = "#">EYE Camp</a></h2>
                            <p class = "text-center">June 14, 2014</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!--#about -->

        <?php include 'footer.php'
        ?>

    </body>
</html>