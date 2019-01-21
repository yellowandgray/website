<!doctype html>
<html lang="en">
    <?php
    include 'head.php';
    ?>

    <body>
        <div class="wrapper">
            <!--Header Start-->
            <?php include 'menu.php'; ?>
            <div id="search">
                <button type="button" class="close">×</button>
                <form class="search-overlay-form">
                    <input type="search" value="" placeholder="type keyword(s) here" />
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <!--Header End-->
            <!--Inner Header Start-->
            <section class="wf100 p100 inner-header" style="background: url(images/sub-banner/banner-06.jpg) no-repeat;">
                <div class="container">
                    <h1>Downloads</h1>
                    <!--                    <ul>
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#"> Contact </a></li>
                    
                                        </ul>-->
                </div>
            </section>
            <!--Inner Header End-->
            <?php include 'admission-content.php'; ?>
            <!--Contact Start-->
            <section class="contact-page wf100 p80">
                <div class="container contact-dropdown-from">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <a href="images/calendar/ENPEE-School-Calendar-2019.pdf" download>
                                <img src="images/ENPEE-School-Calendar-2019-.jpg" class="img-width" alt="ENPEE-School-Calendar-2019" title="ENPEE-School-Calendar-2019">
                                <h5 class="margin-top-10 bold green-color" title="ENPEE-School-Calendar-2019">ENPEE International School Calendar - 2019</h5>
                            </a>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
            </section>
            <!--Contact End--> 
            <?php include 'footer.php'; ?>
        </div>

    </body>
</html>
