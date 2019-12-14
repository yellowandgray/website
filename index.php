<?php
require_once 'api/include/common.php';
$obj = new Common();
$testimonials = $obj->selectAll('*', 'testimonial', 'testimonial_id > 0');
$banners = $obj->selectAll('*', 'banner', 'banner_id > 0');
?>
<!DOCTYPE html>
<html lang="en">
    <?php
    include 'head.php';
    ?>
    <body class="goto-here">

        <!-- END nav -->
        <?php include 'enquiry.php'; ?>

        <?php foreach ($banners as $row) { ?>
            <section id="home-section" class="hero" style="background-image:url(<?php echo BASE_URL . $row['image_path']; ?>);background-size:cover">
                <!--            <div id="video-viewport">
                                <video width="1920" height="1280" autoplay muted loop>
                                    <source src="video/nature-01.mp4" type="video/mp4">
                                    Your browser does not support the <code>video</code> tag.
                                </video>
                            </div>-->
                <?php include 'menu.php'; ?>
                <div class="home-slider owl-carousel">
                    <div class="slider-item">
                        <div class="container">
                            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                                <div class="col-lg-8 col-md-8 ftco-animate product-text">
                                    <!--<h1 class="mb-2">PRODUCT</h1>-->
                                    <!--<h2 class="subheading mb-4" style="text-align: center;">GAIN SUPER POWER WITH <span>FRESCHE</span></h2><article class="container">-->

                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="curve">
                    <img src="images/box.png" alt=""/>
                </div>

            </section>
        <?php } ?>
        <section class="ftco-category pad-20-80 res-feature">
            <div class="col-md-12">
                <div class="row feature-l"> 
                    <div class="col-md-2 col-sm-2 col-4">
                        <div class="box-1">
                            <a onclick="document.getElementById('featured').classList.add('featured-view')"><img src="images/feature/003.png" alt=""/></a>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-4">
                        <div class="box-1">
                            <a onclick="document.getElementById('featured-1').classList.add('featured-view')"><img src="images/feature/002.png" alt=""/></a>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-4">
                        <div class="box-1">
                            <a onclick="document.getElementById('featured-2').classList.add('featured-view')"><img src="images/feature/006.png" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-4">
                        <div class="box-1">
                            <a onclick="document.getElementById('featured-3').classList.add('featured-view')"><img src="images/feature/001.png" alt=""/></a>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-4">
                        <div class="box-1">
                            <a onclick="document.getElementById('featured-4').classList.add('featured-view')"><img src="images/feature/004.png" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-4">
                        <div class="box-1">
                            <a onclick="document.getElementById('featured-5').classList.add('featured-view')"><img src="images/feature/005.png" alt=""/></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class=" ftco-category pad-80" id="featured">
            <div class="row">
                <i onclick="document.getElementById('featured').classList.remove('featured-view')" class="fa fa-times remove" aria-hidden="true"></i>
                <div class="col-md-12 heading-section ftco-animate deal-of-the-day ftco-animate bg-gray">
               <!--<span class="subheading">Best Price For You</span>-->
                    <h2 class="mb-4 text-head">Non-leaching & Non-depleting</h2>
                </div>
                <div class="col-md-3 heading-section ftco-animate deal-of-the-day ftco-animate">
                    <!--<span class="subheading">Best Price For You</span>-->
                    <img src="images/feature/001.jpg" alt="" class="pad-t-45 img-responsive"/>
                </div>
                <div class="col-md-9 heading-section ftco-animate deal-of-the-day ftco-animate">
                    <!--<span class="subheading">Best Price For You</span>-->
                    <p>Fresche is a non leaching technology. This immediately differentiates Fresche from many competitor products, which leach or detach from the surface on which they are applied.</p>
                    <p>Depleting antimicrobials effectively diminish to the point where they no longer have microbial efficacy. This means that the surface they were designed to protect, has no defence against bacterial or fungal attack.</p>
                    <p>Fresche surface bonded antimicrobial treatments do not leach, migrate or transfer from the surface on which they are applied. Only heavy abrasion or incorrect application will diminish the bond of Fresche coatings. As a bound antimicrobial they provide durable, long term, persistent microbial protection, keeping fibres or surfaces safe, clean and fresh.</p>
                </div>
            </div>

        </section>
        <section class=" ftco-category pad-80" id="featured-1">
            <div class="row">
                <i onclick="document.getElementById('featured-1').classList.remove('featured-view')" class="fa fa-times remove" aria-hidden="true"></i>
                <div class="col-md-12 heading-section ftco-animate deal-of-the-day ftco-animate bg-gray">
                    <!--<span class="subheading">Best Price For You</span>-->
                    <h2 class="mb-4 text-head">Mode of Action</h2>
                </div>
                <div class="col-md-3 heading-section ftco-animate deal-of-the-day ftco-animate">
                   <!--<span class="subheading">Best Price For You</span>-->
                    <img src="images/feature/001.jpg" alt="" class="pad-t-45 img-responsive"/>
                </div>
                <div class="col-md-9 heading-section ftco-animate deal-of-the-day ftco-animate">
                    <!--<span class="subheading">Best Price For You</span>-->
                    <p>Fresche Bioscience Si QAC antimicrobial treatments function by penetrating and terminally destroying the delicate cell membrane of bacterial and fungal organisms. This is effectively achieved by mechanically setting a series of molecular "road spikes" on a surface, which attract and destroy pathogens through a process known as lysis.</p>
                    <p>The pathogen cell is drawn onto the molecular spike through simple magnetic attraction and ruptures the cell wall. As the cell wall is unable to control its own hydrostatic pressure, this results in both immediate and terminal disintegration of the cell.</p>
                    <p>Most other antimicrobial treatments seek to deactivate bacteria and fungi by chemical interaction, which more frequently is only partially successful, thereby permitting bacteria and fungi to develop resistance to further antimicrobial treatments.</p>
                    <p>SiQac's do not disable organisms by the use of toxic or chemical mode of action, preventing organisms adapting to it. The mode of action is physical and mechanical, rather than chemical. Because the Fresche molecule remains bonded to the surface or substrate, it remains ready to defend and protect the surface or substrate from any subsequent colonisation or attack by bacterial or fungal organisms.</p>
                    <p>Once bonded to a surface, Fresche microbial protection and control treatments deliver long term protection for extended periods of time. This technology revolution keeps surfaces and substrates fresh, clean and free of bacteria or fungal which cause odour and degrade the host surface they chose to colonise.</p>
                    <p>Si QAC bound antimicrobials were originally developed over 40 years ago, and are an effective way to prevent and control contamination and cross contamination. Now in the ninth generation of development, Fresche Si QAC microbial protection is safe for people, plants, animals and the delicate environment in which we live.</p>
                </div>
            </div>

        </section>
        <section class=" ftco-category pad-80" id="featured-2">
            <div class="row">
                <i onclick="document.getElementById('featured-2').classList.remove('featured-view')" class="fa fa-times remove" aria-hidden="true"></i>
                <div class="col-md-12 heading-section ftco-animate deal-of-the-day ftco-animate bg-gray">
                                    <!--<span class="subheading">Best Price For You</span>-->
                    <h2 class="mb-4 text-head">Lock & Bond</h2>
                </div>
                <div class="col-md-3 heading-section ftco-animate deal-of-the-day ftco-animate">
                   <!--<span class="subheading">Best Price For You</span>-->
                    <img src="images/feature/001.jpg" alt="" class="pad-t-45 img-responsive"/>
                </div>
                <div class="col-md-9 heading-section ftco-animate deal-of-the-day ftco-animate">
                    <!--<span class="subheading">Best Price For You</span>-->
                    <p>New generation Fresch Bioscience Si QAC microbial control and protection treatments are very different in their mode of action to most chemical and metals based antimicrobial compounds. When Fresche treatments are applied, they form covalent associations which "lock and bond" the Fresche active molecule to the surface or substrate being treated.</p>
                    <p>Once bound to a surface or substrate, Fresche antimicrobial coatings will not leach, migrate or otherwise leave the surface.</p>
                    <p>During drying of the Fresche solution, the active ingredient changes from a monomer to a polymer, and bonds to the surface. Once bound, the Fresche molecule delivers durable, continuous and persistent protection from microbial colonisation or attack.</p>
                    <p>As a bound molecule, Fresche delivers continuing long term microbial protection for indefinite periods of time, unless removed from the surface by heavy abrasion. Fresche will bond to many surfaces and substrates and the surface bond is durable and capable of providing high levels of microbial protection and control for long periods of time.</p>
                    <p>Fresche antimicrobials can be applied to a diverse range of substrates which include natural and synthetic textiles, urethane foam substrates, fibre fill, various plastics, timber, laminates, most metals (including stainless steel), plaster and rigid foam.</p>
                </div>
            </div>

        </section>
        <section class=" ftco-category pad-80" id="featured-3">
            <div class="row">
                <i onclick="document.getElementById('featured-3').classList.remove('featured-view')" class="fa fa-times remove" aria-hidden="true"></i>
                <div class="col-md-12 heading-section ftco-animate deal-of-the-day ftco-animate bg-gray">
                    <!--<span class="subheading">Best Price For You</span>-->
                    <h2 class="mb-4 text-head">No heavy metals or volatile chemicals</h2>
                </div>
                <div class="col-md-3 heading-section ftco-animate deal-of-the-day ftco-animate">
                   <!--<span class="subheading">Best Price For You</span>-->
                    <img src="images/feature/001.jpg" alt="" class="pad-t-45 img-responsive"/>
                </div>
                <div class="col-md-9 heading-section ftco-animate deal-of-the-day ftco-animate">
                    <!--<span class="subheading">Best Price For You</span>-->
                    <p>Many biocides, antimicrobials and disinfectants comprise chemicals which include chlorine, Triclosan, heavy metals (including silver ion and nano-silver), which do not readily break down and often bio accumulate in our natural environment.</p>
                    <p>Some, during the process of microbial interaction produce halogenated by-products such as carcinogenic trihalomethanes.</p>
                    <p>Significant questions are now being raised concerning health impacts of some ion and nano-technologies, which traverse the human dermal barrier, entering into the body easily and biologically accumulating in multiple organs.</p>
                    <p>Fresche is the cleanest and greenest surface bonded antimicrobial in the world today.</p>
                </div>
            </div>

        </section>
        <section class=" ftco-category pad-80" id="featured-4">
            <div class="row">
                <i onclick="document.getElementById('featured-4').classList.remove('featured-view')" class="fa fa-times remove" aria-hidden="true"></i>
                <div class="col-md-12 heading-section ftco-animate deal-of-the-day ftco-animate bg-gray">
                   <!--<span class="subheading">Best Price For You</span>-->
                    <h2 class="mb-4 text-head">Enduring protection</h2>
                </div>
                <div class="col-md-3 heading-section ftco-animate deal-of-the-day ftco-animate">
                   <!--<span class="subheading">Best Price For You</span>-->
                    <img src="images/feature/001.jpg" alt="" class="pad-t-45 img-responsive"/>
                </div>
                <div class="col-md-9 heading-section ftco-animate deal-of-the-day ftco-animate">
                    <!--<span class="subheading">Best Price For You</span>-->
                    <p>As a bound microbial control and protection treatment, Fresche antimicrobial coatings continues to provide high level, broad spectrum antibacterial, anti fungal and odour protection for long periods of time.</p>
                    <p>Fresche antimicrobial formulations have been engineered to provide various levels of durable antimicrobial performance. Depending on the surface or substrate, this can range from 24 hours of 99.9% microbial protection, to high levels of microbial protection for the anticipated service life of the product on which it is applied.</p>
                    <p>The durability and lifespan will be determined by suitability and stability of the surface or substrate to which the antimicrobial is applied, and general exposure to abrasive elements.</p>
                    <p>Fresche surface bonded antimicrobials are unmatched in their delivery of consistent, enduring, safe, high performance antimicrobial activity.</p>
                </div>
            </div>
        </section>
        <section class=" ftco-category pad-80" id="featured-5">
            <div class="row">
                <i onclick="document.getElementById('featured-5').classList.remove('featured-view')" class="fa fa-times remove" aria-hidden="true"></i>
                <div class="col-md-12 heading-section ftco-animate deal-of-the-day ftco-animate bg-gray">
                                   <!--<span class="subheading">Best Price For You</span>-->
                    <h2 class="mb-4 text-head">Pathogens</h2>
                </div>
                <div class="col-md-3 heading-section ftco-animate deal-of-the-day ftco-animate">
                   <!--<span class="subheading">Best Price For You</span>-->
                    <img src="images/feature/001.jpg" alt="" class="pad-t-45 img-responsive"/>
                </div>
                <div class="col-md-9 heading-section ftco-animate deal-of-the-day ftco-animate">
                    <!--<span class="subheading">Best Price For You</span>-->
                    <p>Bacteria are present in most human and natural environments on earth, growing in water, waste, soil and the live bodies of people, plants and animals. Bacteria are living organisms that are neither plants nor animals, but belong to a group all by themselves.</p>
                    <p>Individually they are generally not more than one single cell, however there are normally millions of them together due to their ability to rapidly multiply. There are typically 40 million bacterial cells in a gram of soil and a million bacterial cells in a millilitre of fresh water.</p>
                    <p>There are approximately ten times as many bacterial cells as there are human cells in the body, with large numbers of bacteria on our skin and in the human gut. The vast majority of the bacteria in the body are rendered harmless by the protective effects of the human immune system and a few are beneficial.</p>
                    <p>However, a growing number of bacterial forms are pathogenic and cause illness, poor health and infectious disease.</p>
                    <p>Microorganisms that cause diseases are called pathogens. They are specialised to infect body tissues where they reproduce and cause damage that gives rise to the symptoms of the infection.</p>
                    <p>The World Health Organisation is particularly concerned at the rising presence of nosocomial (healthcare acquired infections) contracted in hospital and healthcare environments. Healthcare-associated infections are those which were not present [and without evidence of incubation] at the time of admission to a healthcare setting. Within hours after admission, a patient's flora begins to acquire characteristics of the surrounding bacterial pool, and HAI infections are responsible for numerous deaths worldwide each year.</p>
                </div>
            </div>

        </section>
        <section class=" ftco-category pad-80">
            <div class="row res-feature-1 application-1">
                <div class="col-md-12">

                    <div class="row feature-l"> 
                        <div class="col-md-2">
                            <div class="box-1">
                                <a onclick="document.getElementById('featured').classList.add('featured-view')"><img src="images/feature/003.png" alt=""/><p>Non Leaching & Non Depleting</p></a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="box-1">
                                <a onclick="document.getElementById('featured-1').classList.add('featured-view')"><img src="images/feature/002.png" alt=""/><p>Mode of Action </p></a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="box-1">
                                <a onclick="document.getElementById('featured-2').classList.add('featured-view')"><img src="images/feature/006.png" alt="" /><p>Lock and Bond</p> </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="box-1">
                                <a onclick="document.getElementById('featured-3').classList.add('featured-view')"><img src="images/feature/001.png" alt=""/><p>No Heavy metals or Chemicals</p></a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="box-1">
                                <a onclick="document.getElementById('featured-4').classList.add('featured-view')"><img src="images/feature/004.png" alt="" /><p>Enduring protection</p></a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="box-1">
                                <a onclick="document.getElementById('featured-5').classList.add('featured-view')"><img src="images/feature/005.png" alt=""/><p>Pathogens</p></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 heading-section ftco-animate deal-of-the-day ftco-animate">
                    <!--<span class="subheading">Best Price For You</span>-->
                    <h2 class="mb-4 text-head">Applications</h2>
                </div>
            </div>
            <div class="row app">
                <div class="col-md-12">
                    <div class="row  mar-b-30">
                        <div class="col-md-4">
                            <div class="div-1">
                                <div class="div-2">
                                    <a href="#" onclick="document.getElementById('featured-6').classList.add('featured-view')"><img src="images/applications/002.jpg" alt="" class="img-responsive"/></a>
                                </div>
                            </div>
                            <h3>Hotels</h3>
                            <h3 class="see"><a href="#" onclick="document.getElementById('featured-6').classList.add('featured-view')">See More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></h3>
                        </div>
                        <div class="col-md-4">
                            <div class="div-1">
                                <div class="div-2">
                                    <a href="#" onclick="document.getElementById('featured-7').classList.add('featured-view')"><img src="images/applications/004.jpg" alt="" class="img-responsive"/></a>
                                </div>
                            </div>
                            <h3>Hospitals</h3>
                            <h3 class="see"><a href="#" onclick="document.getElementById('featured-7').classList.add('featured-view')">See More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></h3>
                        </div>
                        <div class="col-md-4">
                            <div class="div-1">
                                <div class="div-2">
                                    <a href="#" onclick="document.getElementById('featured-8').classList.add('featured-view')"><img src="images/applications/001.jpg" alt="" class="img-responsive"/></a>
                                </div>
                            </div>
                            <h3>Textiles</h3>
                            <h3 class="see"><a href="#" onclick="document.getElementById('featured-8').classList.add('featured-view')">See More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></h3>
                        </div>

                    </div>
                    <div class="row mar-t-30">
                        <div class="col-md-4">
                            <div class="div-1">
                                <div class="div-2">
                                    <a href="#" onclick="document.getElementById('featured-9').classList.add('featured-view')"><img src="images/applications/006.jpg" alt="" class="img-responsive"/></a>
                                </div>
                            </div>
                            <h3>Food & Packaging</h3>
                            <h3 class="see"><a href="#" onclick="document.getElementById('featured-9').classList.add('featured-view')">See More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></h3>
                        </div>
                        <div class="col-md-4">
                            <div class="div-1">
                                <div class="div-2">
                                    <a href="#" onclick="document.getElementById('featured-10').classList.add('featured-view')"><img src="images/applications/003.jpg" alt="" class="img-responsive"/></a>
                                </div>
                            </div>

                            <h3>Footwear & Leather</h3>
                            <h3 class="see"><a href="#" onclick="document.getElementById('featured-10').classList.add('featured-view')">See More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></h3>
                        </div>
                        <div class="col-md-4">
                            <div class="div-1">
                                <div class="div-2">
                                    <a href="#" onclick="document.getElementById('featured-11').classList.add('featured-view')"><img src="images/applications/005.jpg" alt="" class="img-responsive"/></a>
                                </div>
                            </div>
                            <h3>Institution and Aged Care</h3>
                            <h3 class="see"><a href="#" onclick="document.getElementById('featured-11').classList.add('featured-view')">See More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> </h3>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class=" ftco-category pad-80" id="featured-6">
            <div class="row">
                <i onclick="document.getElementById('featured-6').classList.remove('featured-view')" class="fa fa-times remove" aria-hidden="true"></i>
                <div class="col-md-12 heading-section ftco-animate deal-of-the-day ftco-animate bg-gray">
                                   <!--<span class="subheading">Best Price For You</span>-->
                    <h2 class="mb-4 text-head">Hotel Industry</h2>
                </div>
                <div class="col-md-3 heading-section ftco-animate deal-of-the-day ftco-animate">
                   <!--<span class="subheading">Best Price For You</span>-->
                    <img src="images/hopital-001.png" alt="" class="pad-t-45 img-responsive"/>

                </div>
                <div class="col-md-9 heading-section ftco-animate deal-of-the-day ftco-animate">
                    <!--<span class="subheading">Best Price For You</span>-->
                    <h4>Dangers of contamination</h4>
                    <p>Presence of microbes is very common in Hotels</p>
                    <p>The germs are carried by large number of different individuals using same facility poses threat of cross contamination.</p>
                    <h5>The Problems:</h5>
                    <p>Bed Linen, Pillow Covers, Towels & Uniforms, are the most vulnerable carriers</p>

                    <p>Uniforms, Linen are susceptible to  bacterial, fungal and other  microbial contamination  resulting in Contaminated Food areas,   Unpleasant Odour,   Low Brand Image, Customer dissatisfaction </p>
                    <p class="font-weight-bold">Get Your Fresche tag to communicate the Unique Value Addition  to your customers</p>
                    <h4>Results:</h4>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <ul class="tech-list">
                                <i class="fa fa-check-circle" aria-hidden="true"></i><li>Odour-Free, Bacteria-Free, Fungus-Free Linen</li>
                                <i class="fa fa-check-circle" aria-hidden="true"></i><li>Taking Customer Care to the next level</li>
                                <i class="fa fa-check-circle" aria-hidden="true"></i><li>Unique Solution for Customer Safety and  Protection</li>
                                <i class="fa fa-check-circle" aria-hidden="true"></i><li>Enhance Customer Satisfaction</li>
                                <i class="fa fa-check-circle" aria-hidden="true"></i><li>Boosts your Brand Image</li>
                            </ul>
                        </div>
                        <div class="col-md-6  col-sm-12 heading-section ftco-animate deal-of-the-day ftco-animate">
                       <!--<span class="subheading">Best Price For You</span>-->
                            <img src="images/applications/app/005.jpg" alt="" class="pad-t-45 img-responsive"/>
                        </div>
                    </div>
                </div>

            </div>

        </section>
        <section class=" ftco-category pad-80" id="featured-7">
            <div class="row">
                <i onclick="document.getElementById('featured-7').classList.remove('featured-view')" class="fa fa-times remove" aria-hidden="true"></i>
                <div class="col-md-12 heading-section ftco-animate deal-of-the-day ftco-animate bg-gray">
                                   <!--<span class="subheading">Best Price For You</span>-->
                    <h2 class="mb-4 text-head">Hospitals</h2>
                </div>
                <section class="ftco-section" >
                    <div class="pad-lr-80">
                        <div class="row box-4">
                            <div class=" col-lg-8 product-details pl-md-5 ftco-animate">
                                <p>“A recent Indian Intensive Care Case Mix and Practice Patterns (INDICAPS) study with a sample size of 4,209 patients admitted in 124 ICUs across 17 states  found that <span class="font-weight-bold">one out of every eight patients in India die  from infections contracted in ICUs.</span>”</p>
                                <p class="font-weight-bold">“10-30% of the patients admitted  to hospitals and nursing homes In India acquires nosocomial infection as against  an impressive 5% in the west.”</p>
                                <p class="font-weight-bold" style="text-align: right"><bold>-Hospital Infection Society –India</bold></p>
                                                                                <!--<button class="button-03"><a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i>  Add To Cart</a></button>-->
                            </div>
                            <div class=" text-center col-lg-4 product-details pl-md-5 ftco-animate">
                                <img src="images/applications/app/005.jpg" class="product-img-responsive" alt=""/>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="ftco-section">
                    <div class="pad-lr-80">
                        <div class="row">
                            <div class="col-lg-4 mb-5  app-img ftco-animate">
                                <div class="">
                                <!--<a href="images/product-01.png" class="image-popup"><img src="images/product-01.png" class="img-fluid" alt="Colorlib Template"></a>-->
                                    <img src="images/applications/app/001.jpg" class="product-img-responsive" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8 product-details app-con pl-md-5 ftco-animate">
                                <h3>Delivering Powerful Outcomes</h3>
                                <p>Fresche is the worlds first surface bonding, aqueous based, broad spectrum antimicrobial which delivers high level, persistent, continuing, antimicrobial control and  protection of surfaces and substrates in healthcare environments. Fresche delivers a terminal kill of bacteria, and because it is not ingested into the bacteria it does not permit the building of microbial resistance.</p>
                                <p>Fresche contains no heavy metals, no toxic chemicals, no poisons. It is green, clean and safe for patients, patient families, hospital employees, and the environment.</p>
                                <p>Unlike conventional biocides, Fresche SiQac compounds do not leach, and they do not deplete as a bound antimicrobial, and inhibitory performance does not diminish on account of the disinfection process. Because of this, Fresche stands continually on guard to protect surfaces from microbial attack and colonisation.</p>
                                <p>We believe it is a powerful advance in the management and control of healthcare acquired infections [HAI's], and offers health providers significant potential to improve patient health outcomes together with lowering of patient risks, and facilitating release of hospital assets tied to re admissions on account of increasingly aggressive patient HAI’s.</p>
        <!--<button class="button-03"><a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i>  Add To Cart</a></button>-->
                            </div>
                        </div>
                    </div>
                </section>
                <section class="ftco-section" style="background-image: url('images/bg_02.png'); background-size: cover;">
                    <div class="pad-lr-80">
                        <div class="row">
                            <div class="col-lg-8 product-details  app-con pl-md-5 ftco-animate">
                                <h3>Protecting Hospital Patients</h3>
                                <p>The challenge for hospital and healthcare practitioners is how to prevent and control hospital-acquired and other healthcare-associated infections in a perpetually changing medical environment.</p>
                                <p>Hospitals worldwide, are experiencing an increased volume of immuno compromised patients, increasingly complex medical procedures and a growing presence of harmful and biocide resistant microorganisms.</p>
                                <p>Most biocides available today in India have limited time efficacy, lasting generally from a few minutes to a few days.</p>
                                <p>Fresche is a powerful new weapon in infection management, persistently protecting surfaces from attack or colonization by pathogens, and reducing potential touch points which promote cross contamination.</p>
                                <!--<button class="button-03"><a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i>  Add To Cart</a></button>-->
                            </div>
                            <div class="col-lg-4 mb-5 app-img ftco-animate">
                                <div class="">
                               <!--<a href="images/product-01.png" class="image-popup"><img src="images/product-01.png" class="img-fluid" alt="Colorlib Template"></a>-->
                                    <img src="images/hospital-004.jpg" class="product-img-responsive" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="ftco-section ">
                    <div class="pad-lr-80">
                        <div class="row">
                            <div class="col-lg-4 mb-5 app-img  ftco-animate">
                                <div class="">
                                <!--<a href="images/product-01.png" class="image-popup"><img src="images/product-01.png" class="img-fluid" alt="Colorlib Template"></a>-->
                                    <img src="images/hospital-003.jpg" class="product-img-responsive" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8 product-details pl-md-5  app-con ftco-animate">
                                <h3>Protecting Hospital Employees</h3>
                                <p>All hospitals have infection control procedures and policies, and staff take every precaution to avoid infections. However the risk of employee infection can never be eliminated and some employees have a higher risk of acquiring an infection than others.</p>
                                <p>A key issue, is the fact that pathogens are transmitted around hospital environments either as airborne pathogens, or as passengers on textiles and equipment moving in and around the hospital environment.</p>
                                <p>Fresche is highly efficient when applied [or infused] into all forms of textiles. As a bound antimicrobial, it delivers a 99.9% terminal knock down of bacteria, followed by persistent microbial protection for the life of the textile.</p>
                                <p>Its “lock and bond” is durable for minimum 50 washes.</p>
                                <p>While Infusion of Fresche to textiles is best at the production stage, hospital textiles can be retro-treated with great results.</p>
        <!--<button class="button-03"><a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i>  Add To Cart</a></button>-->
                            </div>
                        </div>
                    </div>
                </section>
                <section class="ftco-section pad-b-50" style="background-image: url('images/bg_02.png'); background-size: cover;">
                    <div class="pad-lr-80">
                        <div class="row">

                            <div class="col-lg-8 product-details pl-md-5  app-con ftco-animate">
                                <h3>Protecting Hospital Environments</h3>
                                <p>Modern day hospitals are large scale communities in themselves, embracing surgeons, administrators, casualty staff, paramedics, nursing teams, contractors, patients, families, patient doctors, visitors and hospital ancillaries. The hospital environment is both complex and intense.</p>
                                <p>Hospitals worldwide are severely compromised by the presence of pathogens which impact sick or unwell patients, whose recovery depends on being cared for in a safe, secure and hygienically clean environment.</p>
                                <p>Fresche SiQac technology stands alone in its capacity to deliver a safer more protected environment for patients and healthcare employees.</p>
                                <p>Its non-leaching, non-depleting, non-chemical mode of action is a quantum opportunity for infection control managers and hospital administrators to gain significant traction in the war on superbugs and pathogens.</p>
                             <!--<button class="button-03"><a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i>  Add To Cart</a></button>-->
                            </div>
                            <div class="col-lg-4 mb-5 app-img ftco-animate">
                                <div class="">
                               <!--<a href="images/product-01.png" class="image-popup"><img src="images/product-01.png" class="img-fluid" alt="Colorlib Template"></a>-->
                                    <img src="images/hospital-002.jpg" class="product-img-responsive" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 mb-5 app-img ftco-animate">
                                <div class="">
                               <!--<a href="images/product-01.png" class="image-popup"><img src="images/product-01.png" class="img-fluid" alt="Colorlib Template"></a>-->
                                    <img src="images/hospital-001.jpg" class="product-img-responsive" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8 product-details pl-md-5  app-con ftco-animate">
                                <h3>Protecting Hospital Laundry</h3>
                                <p>The best approach is for Fresche microbial protection to be applied to hospital textiles at the manufacturing stage. Fresche technical managers work with hospital suppliers to implement this powerful microbial control technology.</p>
                                <p>Traditional methods of sanitizing hospital laundry is by application of either steam                                        [or heat] to the face of the textile or by chemical sanitization. This frequently degrades the life of the textile, and is not always efficient.</p>
                                <p>Fresche can be applied to hospital linen in a protocol where Fresche microbial protection compounds are applied to the textile during the final stage laundering process. Following this application, most treated hospital textiles can be washed in cold water and still meet healthcare standards. This represents a significant saving in energy costs and carbon footprint</p>
                                <p>Fresche Bioscience can engage with hospital laundry staff to conduct application and bacterial challenge validation trials.</p>
                                <!--<button class="button-03"><a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i>  Add To Cart</a></button>-->
                            </div>

                        </div>
                    </div>
                </section>
            </div>

        </section>
        <section class=" ftco-category pad-80" id="featured-8">
            <div class="row">
                <i onclick="document.getElementById('featured-8').classList.remove('featured-view')" class="fa fa-times remove" aria-hidden="true"></i>
                <div class="col-md-12 heading-section ftco-animate deal-of-the-day ftco-animate bg-gray">
                                   <!--<span class="subheading">Best Price For You</span>-->
                    <h2 class="mb-4 text-head">Textiles</h2>
                </div>
                <div class="col-md-3 heading-section ftco-animate deal-of-the-day ftco-animate">
                   <!--<span class="subheading">Best Price For You</span>-->
                    <img src="images/applications/textiles.jpg" alt="" class="pad-t-45 img-responsive"/>
                </div>
                <div class="col-md-9 heading-section ftco-animate deal-of-the-day ftco-animate">
                    <h5>Textile products are prone to host microorganisms responsible for diseases, unpleasant odours, colour degradation and deterioration of textile fibres and substrates.</h5>
                    <p>Many current antimicrobial products applied to textiles, include toxic chemicals or compounds such as triclosan, heavy metals, silver or organo tin, zinc, copper, all of which are leaching technologies. In each case the compound leaves the surface on which it has been applied, and progressively depletes in antimicrobial efficacy leaving the surface unprotected from microbial infestation.</p>
                    <p>Fresche microbial control and protection treatments for commercial and industrial textiles are a new and highly effective approach to long-term protection of natural and synthetic fibres. They form a covalent "lock and bond" with the surface or substrate on which they are applied, and they provide durable, persistent, long-term protection against bacterial and fungal attack.</p>
                    <p>Available in both ready to use or concentrate form, they can be applied by spray, pad bath or exhaust methods. Fresche microbial control and protection treatments are transparent and invisible when applied, and do not change the hand, color or appearance of the textile.</p>
                    <ul>
                        <li>domestic and commercial floor coverings</li>
                        <li>window furnishing fabrics</li>
                        <li>upholstery furnishing fabrics</li>
                        <li>bath towels and mats</li>
                        <li>kitchen towels and table wear</li>
                        <li>tents, back packs, sleeping bags and annexes</li>
                        <li>truck tarpaulins and crop protection covers</li>
                        <li>automotive, aircraft, cinemas, public venues</li>
                    </ul>
                </div>
            </div>

        </section>
        <section class=" ftco-category pad-80" id="featured-9">
            <div class="row">
                <i onclick="document.getElementById('featured-9').classList.remove('featured-view')" class="fa fa-times remove" aria-hidden="true"></i>
                <div class="col-md-12 heading-section ftco-animate deal-of-the-day ftco-animate bg-gray">
                                   <!--<span class="subheading">Best Price For You</span>-->
                    <h2 class="mb-4 text-head">Food & Packaging</h2>
                </div>
                <div class="col-md-3 heading-section ftco-animate deal-of-the-day ftco-animate">
                   <!--<span class="subheading">Best Price For You</span>-->
                    <img src="images/applications/food-packaging.jpg" alt="" class="pad-t-45 img-responsive"/>
                </div>
                <div class="col-md-9 heading-section ftco-animate deal-of-the-day ftco-animate">
                    <h5>Food manufacturing, storage, processing, packaging and distribution environments represent significant hygiene challenges. Fresche Bioscience is an effective broad spectrum anti bacterial, anti fungal, mould and odour control treatment which bonds to the surface on which it is applied. As a bound antimicrobial, it does not leach from the surface or deplete in antimicrobial efficacy.</h5>
                    <p>As with surface and environmental hygiene, Fresche microbial control and surface protection effectively protects the treated surface from microbial attack, and stops microbes from colonizing the surface.</p>
                    <p>Surface hygiene applications in food and beverage verticals* include:</p>
                    <ul>
                        <li>food storage</li>
                        <li>food processing</li>
                        <li>food packaging</li>
                        <li>food distribution</li>
                        <li>bottling equipment</li>
                    </ul>
                    <p>*As regulations differ widely by region, Fresche may not be approved for use in every jurisdiction. Care should be taken to ensure all local requirements are satisfied prior to using Fresche in food manufacturing and storage areas or packaging.</p>
                </div>
            </div>

        </section>
        <section class=" ftco-category pad-80" id="featured-10">
            <div class="row">
                <i onclick="document.getElementById('featured-10').classList.remove('featured-view')" class="fa fa-times remove" aria-hidden="true"></i>
                <div class="col-md-12 heading-section ftco-animate deal-of-the-day ftco-animate bg-gray">
                                   <!--<span class="subheading">Best Price For You</span>-->
                    <h2 class="mb-4 text-head">Footwear & Leather</h2>
                </div>
                <div class="col-md-6 footwear-css">
                    <br/>
                    <h5>NEW GENERATION MICROBIAL CONTROL AND PROTECTION FOR LEATHER.</h5>
                    <img src="images/applications/footwear.jpg" alt="" class="img-responsive"/>
                </div>

                <div class="col-md-6">
                    <br/>
                    <ul>
                        <li>ENVIRONMENTAL INTEGRITY</li>
                        <li>VALIDATED MICROBIAL PERFORMANCE</li>
                        <li>NO HEAVY METALS OR CHEMICAL TOXINS</li>
                        <li>LOCK & BOND MICROBIAL PROTECTION</li>
                        <li>NON LEACHING AND NON DEPLETING</li>
                        <li>EFFICIENT MECHANICAL MODE OF ACTION</li>
                        <li>CLEAN, FRESH & ODOUR FREE</li>
                    </ul>
                    <h4 class="clr-blue">FRESCHE BENEFITS</h4>
                    <h4>Bio-Active Odour Protection</h4>
                    <ul>
                        <li>Anti-Odour</li>
                        <li>Anti-Microbial</li>
                        <li>Anti-Fungal</li>
                        <li>Durable</li>
                        <li>Anti-Static</li>
                        <li>Non-Toxic</li>
                        <li>Safe For You And The Planet</li>
                        <li>Derived From Coconut Oil (sustainable & renewable resource)</li>
                    </ul>
                    <!--                    <div class="bg-do-it">
                                            <h5>Fresche SiQuat technology delivers durable and validated microbial performance with environmental integrity at an affordable cost.</h5>
                                            <h2>LETS DO IT NOW</h2>
                                            <p>Call us for an obilgation free discussion and production trail.</p>
                                        </div>-->
                </div>
                <div class="col-md-12 footwear-css">
                    <h5>Did you know that sweat from your feet has no odour?</h5>
                    <p>It's the bacteria that grows on our feet or in the shoes we wear hat actually cause odour.</p>
                    <p>These bacteria convert the sweat and oil from skin into a complex mixture of chemical compounds that lead to unpleasant odours. The truth is that your shoes DO NOTHING to stop your sweat turning into odour!</p>
                    <p>Sure, many brands might argue their shoes have better ventilation & odour absorbing chemicals. But, unless that sweet "magically disappears" from your shoes, the bacteria are going to accumulate and YOUR feet is going to produce unpleasant odour!</p>
                    <ul>
                        <li>Give yourself an environmental market edge <br/> Reduce chemical use and increase productivity <br/> A clean, green, safe solution.</li>
                    </ul>
                    <h6>Approved for use by:</h6>
                    <h4>US EPA | EU BPR | OEKO-TEX</h4>
                </div>
            </div>

        </section>
        <section class=" ftco-category pad-80" id="featured-11">
            <div class="row">
                <i onclick="document.getElementById('featured-11').classList.remove('featured-view')" class="fa fa-times remove" aria-hidden="true"></i>
                <div class="col-md-12 heading-section ftco-animate deal-of-the-day ftco-animate bg-gray">
                                   <!--<span class="subheading">Best Price For You</span>-->
                    <h2 class="mb-4 text-head">Institution and Aged Care</h2>
                </div>
                <div class="col-md-3 heading-section ftco-animate deal-of-the-day ftco-animate">
                   <!--<span class="subheading">Best Price For You</span>-->
                    <img src="images/applications/footwear.jpg" alt="" class="pad-t-45 img-responsive"/>
                </div>
                <div class="col-md-9 heading-section ftco-animate deal-of-the-day ftco-animate">
                    <!--<span class="subheading">Best Price For You</span>-->
                    <p>Bacteria are present in most human and natural environments on earth, growing in water, waste, soil and the live bodies of people, plants and animals. Bacteria are living organisms that are neither plants nor animals, but belong to a group all by themselves.</p>
                    <p>Individually they are generally not more than one single cell, however there are normally millions of them together due to their ability to rapidly multiply. There are typically 40 million bacterial cells in a gram of soil and a million bacterial cells in a millilitre of fresh water.</p>
                    <p>There are approximately ten times as many bacterial cells as there are human cells in the body, with large numbers of bacteria on our skin and in the human gut. The vast majority of the bacteria in the body are rendered harmless by the protective effects of the human immune system and a few are beneficial.</p>
                    <p>However, a growing number of bacterial forms are pathogenic and cause illness, poor health and infectious disease.</p>
                    <p>Microorganisms that cause diseases are called pathogens. They are specialised to infect body tissues where they reproduce and cause damage that gives rise to the symptoms of the infection.</p>
                    <p>The World Health Organisation is particularly concerned at the rising presence of nosocomial (healthcare acquired infections) contracted in hospital and healthcare environments. Healthcare-associated infections are those which were not present [and without evidence of incubation] at the time of admission to a healthcare setting. Within hours after admission, a patient's flora begins to acquire characteristics of the surrounding bacterial pool, and HAI infections are responsible for numerous deaths worldwide each year.</p>
                </div>
            </div>

        </section>

<!--        <section class="img" style="background:#88d4f9;">
    <div class="pad-80">
        <div class="row acc">
            <div class="col-md-12 heading-section ftco-animate deal-of-the-day ftco-animate">
                 <span class="subheading">Best Price For You</span>
                <h2 class="mb-4 text-center">Accreditation</h2>
                <p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>

                <div class="row">
                    <div class="col-md-3">
                        <div class="text-center box-2" style="background-image: url(images/acc/bg-001.jpg);background-size: cover;">
                            <img src="images/acc/001.png" alt=""/>
                            <p>US EPA</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center box-2" style="background-image: url(images/acc/bg-004.jpg); background-size: cover;">
                            <img src="images/acc/002.png" alt=""/>
                            <p>Oeko-Tex</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center box-2" style="background-image: url(images/acc/bg-002.jpg);background-size: cover;">
                            <img src="images/acc/003.png" alt=""/>
                            <p>European BPR</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center box-2" style="background-image: url(images/acc/bg-003.jpg);background-size: cover;">
                            <img src="images/acc/004.png" alt="" />
                            <p>Primary Industry in New Zealand</p>
                        </div>
                    </div>
                </div>
                                        <ul class="acc-list">
                                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i> <li>US EPA</li>
                                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i> <li>Oeko-Tex</li>
                                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i> <li>European BPR</li>
                                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i> <li>Primary Industry in New Zealand</li>
                                        </ul>

            </div>
        </div> 
    </div>                
</section>-->
        <section class="img" style="background-image: url(images/bg-acc.jpg); background-size: cover;">
            <div class="pad-80">
                <div class="row acc">
                    <div class="col-md-8 col-sm-12 heading-section ftco-animate deal-of-the-day ftco-animate" style="z-index: 1;">
                        <h2 class="mb-4 text-center">Recognised / Tested By</h2>
                        <div class=" accredition">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row padding-lr-20per">
                                        <div class="col-md-4 col-sm-4 col-xs-6">
                                            <div class="report-logo">
                                                <img src="images/acc/005-01.png" alt="" class=""/>
                                                <p>US EPA</p>
                                            </div>
                                            <div class="report-logo">
                                                <img src="images/acc/002.png" alt=""/>
                                                <p>Oeko-Tex</p>
                                            </div>
                                            <!--                                            <div class="report-logo">
                                                                                            <img src="images/acc/010.png" alt=""/>
                                                                                            <p>European BPR</p>
                                                                                        </div>-->
                                            <div class="report-logo">
                                                <img src="images/acc/004.png" alt=""/>
                                                <p>SHRIRAM INSTITUTE FOR INDUSTRIAL RESEARCH</p>
                                            </div>

                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-6 ">
                                            <div class="report-logo">
                                                <img src="images/acc/007.png" alt=""/>
                                                <p>AMS laboratory</p>
                                            </div>
                                            <div class="report-logo">
                                                <img src="images/acc/003.png" alt=""/>
                                                <p>HITECH Diagnostic Centre</p>
                                            </div>
                                            <div class="report-logo">
                                                <img src="images/acc/006.png" alt="" class=""/>
                                                <p>MEDICA Superspecialty Hospital</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-6">
                                            <div class="report-logo">
                                                <img src="images/acc/001.png" alt=""/>
                                                <p>BANGALORE TEST HOUSE</p>

                                            </div>
                                            <!--                                            <div class="report-logo">
                                                                                            <img src="images/acc/010.png" alt="" />
                                                                                            <p>Primary Industry in New Zealand</p>
                                                                                        </div>-->
                                            <div class="report-logo">
                                                <img src="images/acc/008.png" alt=""/>
                                                <p>Fresche Application Testing</p>

                                            </div>

                                            <div class="report-logo">
                                                <img src="images/acc/009.png" alt=""/>
                                                <p>THE SOUTH INDIA TEXTILE RESEARCH ASSOCIATION</p>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <!--                                <div class="col-md-6">
                                                                    <img src="images/acc/003.png" alt=""/><li>HITECH Diagnostic Centre</li>
                                                                    <div class="hov-img">
                                                                        <img src="images/acc/006-01.png" alt="" class="hov-img-1"/> <img src="images/acc/006.png" alt="" class="hov-img-2"/><li>MEDICA Superspecialty Hospital</li>
                                                                    </div>
                                                                    <img src="images/acc/004.png" alt=""/><li>SHRIRAM INSTITUTE FOR INDUSTRIAL RESEARCH</li>
                                
                                
                                                                    <img src="images/acc/001.png" alt=""/><li>BANGALORE TEST HOUSE</li>
                                                                    <img src="images/acc/009.png" alt=""/><li>THE SOUTH INDIA TEXTILE RESEARCH ASSOCIATION</li>
                                                                                                        <div class="fs-gal-view">
                                                                                                            <h1></h1>
                                                                                                            <img class="fs-gal-prev fs-gal-nav" src="images/prev.svg" alt="Previous picture" title="Previous picture" />
                                                                                                            <img class="fs-gal-next fs-gal-nav" src="images/next.svg" alt="Next picture" title="Next picture" />
                                                                                                            <img class="fs-gal-close" src="images/close.svg" alt="Close gallery" title="Close gallery" />
                                                                                                            <img class="fs-gal-main" src="" alt="" />
                                                                                                        </div>
                                                                                                        <div class="row report">
                                                                                                            <div class="col-md-12">
                                                                                                                <h3 class="text-center">Test Reports</h3>
                                                                                                            </div>
                                                                                                            <div class="col-md-4 col-sm-3 col-xs-3">
                                                                                                                 <img class="fs-gal" src="images/report/001.jpg" alt=""  data-url="images/report/001.jpg"/>
                                                                                                            </div>
                                                                                                           <div class="col-md-4 col-sm-3 col-xs-3">
                                                                                                              <img class="fs-gal" src="images/report/002.jpg" alt=""  data-url="images/report/002.jpg"/>
                                                                                                            </div>
                                                                                                           <div class="col-md-4 col-sm-3 col-xs-3">
                                                                                                             <img class="fs-gal" src="images/report/003.jpg" alt=""  data-url="images/report/003.jpg"/>
                                                                                                            </div>
                                                                                                            <div class="col-md-4 col-sm-3 col-xs-3">
                                                                                                               <img class="fs-gal" src="images/report/004.jpg" alt=""  data-url="images/report/004.jpg"/>
                                                                                                            </div>
                                                                                                            <div class="col-md-4 col-sm-3 col-xs-3 ">
                                                                                                                <img class="fs-gal" src="images/report/005.jpg" alt=""  data-url="images/report/005.jpg"/>
                                                                                                            </div>
                                                                                                           <div class="col-md-4 col-sm-3 col-xs-3">
                                                                                                                <img class="fs-gal" src="images/report/006.jpg" alt=""  data-url="images/report/006.jpg"/>
                                                                                                            </div>
                                                                                                           <div class="col-md-4 col-sm-3 col-xs-3">
                                                                                                                <img class="fs-gal" src="images/report/007.jpg" alt=""  data-url="images/report/007.jpg"/>
                                                                                                            </div>
                                                                                                            <div class="col-md-4 col-sm-3 col-xs-3 ">
                                                                                                               <img class="fs-gal" src="images/report/008.jpg" alt=""  data-url="images/report/008.jpg"/>
                                                                                                            </div>
                                                                                                           <div class="col-md-4 col-sm-3 col-xs-3">
                                                                                                               <img class="fs-gal" src="images/report/009.jpg" alt=""  data-url="images/report/009.jpg"/>
                                                                                                            </div>
                                                                                                        </div>
                                                                </div>-->
                            </div>

                        </div>

                    </div>
                    <div class="col-md-4 col-sm-12 heading-section ftco-animate deal-of-the-day ftco-animate" style="z-index: 2;">
                        <h2 class="mb-4 text-center">Test Reports</h2>
                        <div class="fs-gal-view">
                            <h1></h1>
                            <img class="fs-gal-prev fs-gal-nav" src="images/prev.svg" alt="Previous picture" title="Previous picture" />
                            <img class="fs-gal-next fs-gal-nav" src="images/next.svg" alt="Next picture" title="Next picture" />
                            <img class="fs-gal-close" src="images/close.svg" alt="Close gallery" title="Close gallery" />
                            <img class="fs-gal-main" src="" alt="" />
                        </div>
                        <div class="row ftco-animate">
                            <div class="col-md-12">
                                <div class="carousel-testimony owl-carousel">
                                    <div class="item">
                                        <div class="testimony-wrap p-4 pb-5">
                                            <div class="text text-center certificate">
                                                <img class="fs-gal" src="images/report/001.jpg" alt="" class="img-responsive" data-url="images/report/001.jpg"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimony-wrap p-4 pb-5 ">
                                            <div class="text text-center certificate">
                                                <img class="fs-gal" src="images/report/002.jpg" alt=""  class="img-responsive" data-url="images/report/009.jpg"/>
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="testimony-wrap p-4 pb-5">
                                            <div class="text text-center certificate">
                                                <img class="fs-gal" src="images/report/003.jpg" alt=""  class="img-responsive" data-url="images/report/009.jpg"/>
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="testimony-wrap p-4 pb-5">
                                            <div class="text text-center certificate">
                                                <img class="fs-gal" src="images/report/005.jpg" alt=""  class="img-responsive" data-url="images/report/005.jpg"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="testimony-wrap p-4 pb-5">
                                            <div class="text text-center certificate">
                                                <img class="fs-gal" src="images/report/006.jpg" alt=""  class="img-responsive" data-url="images/report/006.jpg"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimony-wrap p-4 pb-5">
                                            <div class="text text-center certificate">
                                                <img class="fs-gal" src="images/report/007.jpg" alt=""  class="img-responsive" data-url="images/report/007.jpg"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimony-wrap p-4 pb-5">
                                            <div class="text text-center certificate">
                                                <img class="fs-gal" src="images/report/009.jpg" alt=""  class="img-responsive" data-url="images/report/009.jpg"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimony-wrap p-4 pb-5">
                                            <div class="text text-center certificate">
                                                <img class="fs-gal" src="images/report/008.jpg" alt=""  class="img-responsive" data-url="images/report/008.jpg"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimony-wrap p-4 pb-5">
                                            <div class="text text-center certificate">
                                                <img class="fs-gal" src="images/report/004.jpg" alt=""  class="img-responsive" data-url="images/report/004.jpg"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimony-wrap p-4 pb-5">
                                            <div class="text text-center certificate">
                                                <img class="fs-gal" src="images/report/010.jpg" alt=""  class="img-responsive" data-url="images/report/010.jpg"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimony-wrap p-4 pb-5">
                                            <div class="text text-center certificate">
                                                <img class="fs-gal" src="images/report/011.jpg" alt=""  class="img-responsive" data-url="images/report/011.jpg"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div> 
            </div>                
        </section>
        <section class="pad-80 img">
            <div class="row">
                <div class="col-md-12 heading-section ftco-animate deal-of-the-day ftco-animate">
                                   <!--<span class="subheading">Best Price For You</span>-->
                    <div class="row pad-tb-50 ">
                        <div class="col-md-8">

                            <div class="cer-text">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="images/logo.png" alt=""/>
                                    </div>
                                </div>
                                <h3>Bio Antimicrobials</h3>
                                <p>Fresche Bioscience is a new generation SI QAC antimicrobial which delivers high performance, broad spectrum antibacterial, anti-fungal, mould and odour protection on surfaces to which they are either applied or infused. They are widely recognised as one of the worlds most advanced non-volatile, surface bonded antimicrobial, safe for people, plants, pets and the environment.</p>
                                <p>Fresche is now challenging the dominance of conventional antimicrobials on their key points of risk and concern. These include their chemical volatility, harmful compounds including organo and heavy metals [silver], their instability, toxicity, flammability, poor record in workplace safety, end user health impacts and quite importantly environmental bio-accumulation.</p>
                                <div class=" see-1">
                                    <div class=" button-1">
                                        <div class="eff-1"></div>
                                        <a href="about.php">See More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 cer-text">
                            <div class="cer-img">
                                <img src="images/applications/007.jpg" alt="" class="img-responsive"/>
                            </div>
                            <div class="see-2">
                                <div class="button-1">
                                    <div class="eff-1"></div>
                                    <a href="about.php">See More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </section>

        <section class="ftco-section testimony-section bg-blue">
            <div class="container">
                <div class="row ftco-animate">
                    <div class="col-md-12">
                        <div class="carousel-testimony owl-carousel">
                            <?php foreach ($testimonials as $row) { ?>
                                <div class="item">
                                    <div class="testimony-wrap p-4 pb-5">
                                        <div class="text text-center">
                                            <i class="icon-quote-left"></i> <p class="mb-5 pl-4 "><?php echo $row['description']; ?></p><i class="icon-quote-right"></i>
                                        </div>
                                        <div class="testimony-name text-right">
                                            <p class="name"><?php echo $row['name']; ?></p>
                                            <span class="position"><?php echo $row['company']; ?></span>
                                        </div> 
                                    </div>
                                </div>
                            <?php } ?>
                            <!--                            <div class="item">
                                                            <div class="testimony-wrap p-4 pb-5">
                                                                <div class="text text-center">
                                                                    <i class="icon-quote-left"></i> <p class="mb-5 pl-4 ">I would like to update you that the we are impressed with the tenure of efficacy of your FRESCHE anti microbial product. We are crossing 6 months and the surface in our 3rd West area is still fungal free and the dust resistant nature of the surface is an added advantage. </p><i class="icon-quote-right"></i>
                                                                </div>
                                                                <div class="testimony-name text-right">
                                                                    <p class="name">SHANKAR M</p>
                                                                    <span class="position">Sr. Manager, Housekeeping Department, KMCH Hospital.</span>
                                                                </div> 
                                                            </div>
                                                        </div>-->
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <?php include 'footer.php'; ?>
    </body>
</html>
