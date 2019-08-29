<!doctype html>
<html lang="en">
    <?php
    $page = 'partners';
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
            <section class="wf100 p100 inner-header" style="background: url(images/sub-banner/003.jpg) no-repeat; background-size: cover;">
                <div class="container">
                    <h1>Our Partners</h1>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#"> Our Partners </a></li>
                    </ul>
                </div>
            </section>
            <!--Inner Header End--> 
            <!--Blog Start-->
            <section class="wf100 p80 team pad-t-80 pad-b-80">
                <div class="team-details">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <!--title start-->
                                <div class="section-title">
                                    <h2>Our Partners</h2>
                                </div>
                                <!--title end--> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="team-large-img"> <img src="images/partners/001.jpg" alt=""> </div>
                            </div>
                            <div class="col-md-7">
                                <div class="team-details-txt">
                                    <h2>SABIC</h2>
                                    <strong class="trank">Organization</strong>
                                    <p class="text-justify">SABIC is composed of four strategic business units – Petrochemicals, Specialties, Agri-Nutrients, and Metals – each headed by an Executive Vice President.</p>
                                    <p class="text-justify">The Chairman of SABIC is Dr. Abdulaziz Saleh Aljarbou. Vice-Chairman and Chief Executive Officer, Yousef Abdullah Al-Benyan, leads the global management team. The company is overseen by a Board of Directors taken from government and the private sector.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="agallery gallery wf100 p80">
                <div class="container">
                    <div class="partner-logos wf100 mb80">
                        <div class="container">
                            <div id="partner-logos" class="owl-carousel owl-theme">
                                <div class="item"><img src="images/partners/01.png" alt=""></div>
                                <div class="item"><img src="images/partners/02.png" alt=""></div>
                                <div class="item"><img src="images/partners/03.png" alt=""></div>
                                <div class="item"><img src="images/partners/04.png" alt=""></div>
                                <div class="item"><img src="images/partners/05.png" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--Blog End--> 
            <!--Footer Start-->
            <?php include'footer.php'; ?>
            <!--Footer End--> 
        </div>

    </body>
</html>