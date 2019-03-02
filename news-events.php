<!doctype html>
<html lang="en">
    <?php include 'head.php'; ?>
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
            <section class="wf100 p100 inner-header" style="background: url(images/sub-banner/banner-02.jpg) no-repeat;">
                <div class="container">
                    <h1>News & Events</h1>
                    <!--                    <ul>
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">Château Français</a></li>
                                        </ul>-->
                </div>
            </section>
            <!--Inner Header End--> 
            <?php include 'admission-content.php'; ?>
            <!--About Start-->
            <section class="wf100 about">
                <!--About Txt Video Start-->
                <div class="about-video-section wf100">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="images/about-sub.jpg" alt="Events" title="Events-ENPEE International School" />
                            </div>
                            <div class="col-md-4">
                                <img src="images/about-sub.jpg" alt="Events" title="Events-ENPEE International School" />
                            </div>
                            <div class="col-md-4">
                                <img src="images/about-sub.jpg" alt="Events" title="Events-ENPEE International School" />
                            </div>
                        </div>
                    </div>
                </div>
                <!--About Txt Video End-->
            </section>
            <!--About End--> 
            <!--Footer Start-->
            <?php include 'footer.php'; ?>
        </div>
    </body>
</html>