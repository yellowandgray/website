<!doctype html>
<html lang="en">
    <?php $page = 'make-different';
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
            <section class="wf100 p100 inner-header" style="background: url(images/sub-banner/banner-05.jpg) no-repeat;">
                <div class="container">
                    <h1>What Makes Us Different</h1>
                    <!--                    <ul>
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">What Makes Us Different</a></li>
                                        </ul>-->
                </div>
            </section>
            <!--Inner Header End--> 
<?php include 'admission-content.php'; ?>
            <section class="home-about wf100 p80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="differend-li">
            <!--                                <h2> <span>ecova.</span> Welcome to ENPEE INTERNATIONAL SCHOOL</h2>-->
                                <h2>What Makes Us Different</h2>
                                <ul>
                                    <li><i class="fas fa-check"></i> Secular Campus</li>
                                    <li><i class="fas fa-check"></i> Highly Committed and Qualified Educators</li>
                                    <li><i class="fas fa-check"></i> Your Child's second home in an airconditioned ambience</li>
                                    <li><i class="fas fa-check"></i> State-of-the-Art Labs for all Curricula Mixed Age Group Activity Studio</li>
<!--                                    <li><i class="fas fa-check"></i> Mobile App enabling parents, students and staff to stay connected at all times</li>-->
                                    <li><i class="fas fa-check"></i> Air-conditioned and GPS enabled school transport with dedicated caretakers</li>
                                    <li><i class="fas fa-check"></i> Child-friendly and Participatory Classrooms</li>
                                    <li><i class="fas fa-check"></i> Digital Eyes all across the Campus</li>
                                    <li><i class="fas fa-check"></i> Community days, Parent Engagement Programs and Coffee mornings to involve parents</li>
                                    <li><i class="fas fa-check"></i> Regular Professional Development and other educational as well as Recreational Programs for our passionate Educators</li>
                                    <li><i class="fas fa-check"></i> A wide range of extra-Curricula</li>
                                </ul>
                                <!--                                <a class="lm" href="#">Read More</a> -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="about-pic">
                                <div class="pic1">
                                    <div id="pic-slider" class="owl-carousel owl-theme">
                                        <div class="item"><img src="images/carosel/001.jpg" alt="Secured Campus" title="Secured Campus"></div>
                                        <div class="item"><img src="images/carosel/008.jpg" alt="AC class rooms " title="AC class rooms "></div>
<!--                                        <div class="item"><img src="images/carosel/pic-doscipline.jpg" alt=""></div>-->
                                        <div class="item"><img src="images/carosel/007.jpg" alt="Smart boards" title="Smart boards"></div>
                                        <div class="item"><img src="images/carosel/005.jpg" alt="AC Transport" title="AC Transport"></div>
                                        <div class="item"><img src="images/carosel/002.jpg" alt="Advanced sports facilities" title="Advanced sports facilities"></div>
                                        <div class="item"><img src="images/carosel/003.jpg" alt="Extra Curricular Activities" title="Extra Curricular Activities"></div>
                                        <div class="item"><img src="images/carosel/004.jpg" alt="Events" title="Events"></div>
                                        <div class="item"><img src="images/carosel/006.jpg" alt="Infrastructure" title="Infrastructure"></div>
                                        <div class="item"><img src="images/carosel/009.jpg" alt="ROBOTICS" title="ROBOTICS"></div>
                                    </div>
                                </div>
                                <div class="pic2"><div class="about-video-img-1"><a id="myBtn9" data-toggle="lightbox" data-width="1280"><i class="fas fa-play"></i></a><img src="images/aboutpic2.jpg" alt="Modern Infrastructure-ENPEE International School" title="Modern Infrastructure-ENPEE International School"></div></div>
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