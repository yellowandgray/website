<!doctype html>
<html lang="en">
    <?php
    $page = 'about';
    include 'head.php';
    ?>
    <body>
        <div class="wrapper">
            <!--Header Start-->
            <?php include 'menu.php'; ?>
            <!--            <div id="search">
                            <button type="button" class="close">×</button>
                            <form class="search-overlay-form">
                                <input type="search" value="" placeholder="type keyword(s) here" />
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </form>
                        </div>-->
            <!--Header End-->
            <!--Inner Header Start-->
            <section class="wf100 p100 inner-header" style="background: url(images/sub-banner/banner-01.jpg) no-repeat;">
                <div class="container">
                    <h1>Advisory Board</h1>
                    <!--                    <ul>
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Advisory Board</a></li>
                                        </ul>-->
                </div>
            </section>
            <!--Inner Header End--> 
            <?php include 'admission-content.php'; ?>
            <section class="wf100 p80 team">
                <div class="team-details">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="team-details-txt">
                                    <h2 class="font-size-20">Dr.Sakthivel M.D</h2>
                                    <p>Advisory Board member of ENPEE International</p>
                                    <p>HOD of General Medicine, Vinayaka Mission’s Medical College, Karaikal.</p>
                                    <!--Partner Logos Section Start-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Footer Start-->
            <?php include 'footer.php'; ?>

        </div>
    </body>
</html>
