<?php
require_once 'api/include/common.php';
$obj = new Common();
$testimonials = $obj->selectAll('*', 'testimonial', 'testimonial_id > 0');
?>
<!DOCTYPE html>
<html lang="en">
    <?php
    include 'head.php';
    ?>
    <body class="goto-here">

        <!-- END nav -->
        <?php include 'enquiry.php'; ?>
        <section id="home-section" class="hero" style="background-image:url(images/bg_green-06.jpg);background-size:cover">
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
                <i onclick="document.getElementById('featured').classList.remove('featured-view')" class="fa fa-times" aria-hidden="true"></i>
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
                <i onclick="document.getElementById('featured-1').classList.remove('featured-view')" class="fa fa-times" aria-hidden="true"></i>
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
                <i onclick="document.getElementById('featured-2').classList.remove('featured-view')" class="fa fa-times" aria-hidden="true"></i>
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
                <i onclick="document.getElementById('featured-3').classList.remove('featured-view')" class="fa fa-times" aria-hidden="true"></i>
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
                <i onclick="document.getElementById('featured-4').classList.remove('featured-view')" class="fa fa-times" aria-hidden="true"></i>
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
                <i onclick="document.getElementById('featured-5').classList.remove('featured-view')" class="fa fa-times" aria-hidden="true"></i>
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
                                    <a href="application.php"><img src="images/applications/002.jpg" alt="" class="img-responsive"/></a>
                                </div>
                            </div>
                            <h3>Hotels</h3>
                            <h3 class="see"><a href="application.php">See More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></h3>
                        </div>
                        <div class="col-md-4">
                            <div class="div-1">
                                <div class="div-2">
                                    <a href="application.php"><img src="images/applications/004.jpg" alt="" class="img-responsive"/></a>
                                </div>
                            </div>
                            <h3>Hospitals</h3>
                            <h3 class="see"><a href="application.php">See More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></h3>
                        </div>
                        <div class="col-md-4">
                            <div class="div-1">
                                <div class="div-2">
                                    <a href="application.php"><img src="images/applications/001.jpg" alt="" class="img-responsive"/></a>
                                </div>
                            </div>
                            <h3>Textiles</h3>
                            <h3 class="see"><a href="application.php">See More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></h3>
                        </div>

                    </div>
                    <div class="row mar-t-30">
                        <div class="col-md-4">
                            <div class="div-1">
                                <div class="div-2">
                                    <a href="application.php"><img src="images/applications/006.jpg" alt="" class="img-responsive"/></a>
                                </div>
                            </div>
                            <h3>Food & Packaging</h3>
                            <h3 class="see"><a href="application.php">See More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></h3>
                        </div>
                        <div class="col-md-4">
                            <div class="div-1">
                                <div class="div-2">
                                    <a href="application.php"><img src="images/applications/003.jpg" alt="" class="img-responsive"/></a>
                                </div>
                            </div>

                            <h3>Footwear & Leather</h3>
                            <h3 class="see"><a href="application.php">See More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></h3>
                        </div>
                        <div class="col-md-4">
                            <div class="div-1">
                                <div class="div-2">
                                    <a href="application.php"><img src="images/applications/005.jpg" alt="" class="img-responsive"/></a>
                                </div>
                            </div>
                            <h3>Institution and Aged Care</h3>
                            <h3 class="see"><a href="application.php">See More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> </h3>
                        </div>

                    </div>
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
