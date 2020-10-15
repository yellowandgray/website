<!DOCTYPE html>
<html lang="en">
    <?php
    $page = 'applications';
    include 'head.php';
    require_once 'api/include/common.php';
    $obj = new Common();
    $application = $obj->selectAll('*', 'application', 'application_id > 0');
    ?>
    <body class="goto-here">


        <!-- END nav -->
        <?php include 'enquiry.php'; ?>
        <section>
            <?php include 'menu.php'; ?>
        </section>

        <div class="hero-wrap hero-bread" style="background-image: url('images/bg_03.jpg'); background-size: cover;">
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-9 ftco-animate text-center">
                        <h1 class="mb-0 bread">Applications</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"></span> <span>Applications</span></p>

                    </div>
                </div>
            </div>
        </div>


        <section class=" ftco-category pad-80" style="position: relative; top: 80px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 heading-section ftco-animate deal-of-the-day ftco-animate">
                        <!--<span class="subheading">Best Price For You</span>-->
                        <h2 class="mb-4 text-head">Applications</h2>
                    </div>
                </div>
                <div class="row app">
                    <div class="col-md-12">
                        <div class="row  mar-b-30">
                            <?php foreach($application as $row) { ?>
                            <div class="col-md-4" style='margin-bottom: 20px;'>
                                <div class="div-1" style='margin-bottom: 10px;'>
                                    <div class="div-2">
                                        <a href="#"><img src="<?php echo BASE_URL . $row['image_path_thumb']; ?>" alt="" class="" style="width: 350px;height: 260px;"/></a>
                                    </div>
                                </div>
                                <h3><?php echo $row['title']; ?></h3>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include 'footer.php'; ?>
    </body>
</html>