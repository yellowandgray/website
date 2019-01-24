<?php
include 'admin/include/common.php';
$db = new Common();
$categories = $db->selectAllWithoutWhere('categories');
?>
<!DOCTYPE html>
<html lang="en" style="" class=" js csstransforms csstransforms3d csstransitions">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title>:: MAC WORLD ::</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon -->
        <link rel="icon" href="img/favicon.png" type="image/gif" sizes="16x16">
        <!-- google -->
        <link href="css/css" rel="stylesheet">
        <!-- linked css -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/slick.css" rel="stylesheet" type="text/css"/>
        <link href="css/normalize.css" rel="stylesheet" type="text/css"/>
        <!-- <link rel="stylesheet" type="text/css" href="include/css/animate.css" /> -->
        <link href="css/owl.carousel.css" rel="stylesheet" type="text/css"/>
        <link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css"/>

        <link href="css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="css/slicknav.css" rel="stylesheet" type="text/css"/>
        <link href="css/jquery.fullPage.css" rel="stylesheet" type="text/css"/>
        <link href="css/slicebox.css" rel="stylesheet" type="text/css"/>
        <!-- plugin -->
        <!-- plugin close -->
        <link href="css/custom-style.css" rel="stylesheet" type="text/css"/>
        <link href="css/media.css" rel="stylesheet" type="text/css"/>
        <!-- linked css closed-->
        <script src="js/modernizr.custom.46884.js" type="text/javascript"></script>
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/jquery.mousewheel.min.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
    </head>
    <body class="home page-template-default page page-id-5 twentyseventeen-front-page has-header-image page-two-column colors-light" style="">
        <div id="page">
            <!-- header start -->
            <header id="header" class="container-fluid">
                <div class="row">
                    <div class="header-wrapper">
                        <div class="header-top " id="header-top">
                            <div class="container clearfix">
                                <div class="col-md-5 col-sm-3 col-xs-4">
                                    <div class="logo-wrap">
                                        <h1>
                                            <a href="#main-banner" title="">
                                                <img class="img-responsive" src="img/logo-top-1.png" alt="" title="MAC WORLD">
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-9 col-xs-8 clearfix">
                                    <div class="search-panel-right">
                                        <form method="post" action="#" id="SearchForm">
                                            <!-- <select class="d-inline-flex appi-none" name="">
                                                <option value="">All</option>
                                                <option value="">select 1</option>
                                                <option value="">select 2</option>
                                            </select> -->
                                            <input style="float: left;" class="d-inline-flex search-product" type="search" name="search_input" placeholder="Search product" value="">
                                            <input type="submit" name="submit" value="" class="submit_search_form">
                                        </form>
                                        <div href="#" class="language_flag select_language text-center" style="display: inline-block;">
                                            <select class="language_select">
                                                <option value="en" selected="">En</option>
                                                <option value="fr">Fr</option>
                                                <option value="ar">Ar</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- /header -->
            <!-- content start -->
            <div class="contain content">
                <section id="main-banner" class="container-fluid" style="height: 756px;">
                    <!--                    <div class="row"></div>-->
                    <div class="banner_menu clearfix banner_sticky" style="height: 756px;">
                        <div class="sidebar-container">
                            <div class="sidebar-menu">
                                <div id="hamburger" class="hamburger">
                                    <span class="line-1"></span> 
                                    <span class="line-2"></span> 
                                    <span class="line-3"></span>
                                </div>
                                <ul id="menu" class="menu about_right_content mCustomScrollbar _mCS_1" style="height: 600px;">
                                    <div id="mCSB_1" class="mCustomScrollBox mCS-dark-3 mCSB_vertical mCSB_inside" style="max-height: none;" tabindex="0">
                                        <div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
                                            <li class="menu-item"><a href="#main-banner" data-content="HOME">HOME</a></li>
                                            <li class="menu-item"><a href="#our_journey" data-content="OUR JOURNEY">OUR JOURNEY</a></li>
                                            <li class="menu-item"><a href="#about_section" data-content="WHO WE ARE">WHO WE ARE</a></li>
                                            <li class="menu-item"><a href="#team_section" data-content="WHAT WE DO">WHAT WE DO</a></li>
                                            <li class="menu-item"><a href="#explor_product" data-content="PRODUCTS">PRODUCTS</a></li>
                                            <li class="menu-item"><a href="#service_section" data-content="SERVICES">SERVICES</a></li>
                                            <li class="menu-item"><a href="#accreditation_section" data-content="ACCREDITATION">ACCREDITATION</a></li>
                                            <li class="menu-item"><a href="#ourpartner" data-content="OUR PARTNERS">OUR PARTNERS</a></li>
                                            <li class="menu-item"><a href="#contact_section" data-content="CONTACT US">CONTACT US</a></li>
                                        </div>
                                        <!--                                        <div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-dark-3 mCSB_scrollTools_vertical" style="display: block;">
                                                                                    <div class="mCSB_draggerContainer">
                                                                                        <div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; display: block; height: 385px; max-height: 490px; top: 0px;">
                                                                                            <div class="mCSB_dragger_bar" style="line-height: 30px;"></div>
                                                                                        </div>
                                                                                        <div class="mCSB_draggerRail"></div>
                                                                                    </div>
                                                                                </div>-->
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <ul class="nav_menu clearfix">
                            <li><a href="#">LinkedIN</a></li>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Instagram</a></li>
                            <li><a href="mailto:">Email</a></li>
                            <li class="mobile-language search-panel-right">
                                <div class="language_flag select_language text-center" style="display: inline-block;">
                                    <select class="language_select">
                                        <option value="en" selected="">En</option>
                                        <option value="fr">Fr</option>
                                        <option value="ar">Ar</option>
                                    </select>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="container">
                        <div class="banner_content text-center">
                            <figure><img title="" src="img/mac_wolrd.png" alt=""></figure>
                            <h2>Futurizing Manufacturing <br/>and <br/>Commodities Commerce Globally </h2>
                        </div>
                    </div>
                    <div class="sroll_down" style="display: block;"><a href="#">Scroll Down</a></div>
                    <div class="row">
                        <ul id="sb-slider" class="sb-slider" style="height: 756px; max-width: 2000px; overflow: hidden;">
                            <li style="height: 756px; display: none;" class="">
                                <a href="#" target="_blank" rel="noopener" style="height: 756px; background-image: url(&quot;img/malaysia.jpg&quot;);">
                                    <img src="img/malaysia.jpg" alt="image1" style="display: none;">
                                </a>
                            </li>
                            <li style="height: 756px; display: none;" class="">
                                <a href="#" target="_blank" rel="noopener" style="height: 756px; background-image: url(&quot;img/indonesia.jpg&quot;);">
                                    <img src="img/indonesia.jpg" alt="image1" style="display: none;">
                                </a>
                            </li>
                            <li style="height: 756px; display: none;" class="">
                                <a href="#" target="_blank" rel="noopener" style="height: 756px; background-image: url(&quot;img/nigerya.jpg&quot;);">
                                    <img src="img/nigerya.jpg" alt="image1" style="display: none;">
                                </a>
                            </li>
                            <li style="height: 756px; display: block;" class="sb-current">
                                <a href="#" target="_blank" rel="noopener" style="height: 756px; background-image: url(&quot;img/benin.jpg&quot;);">
                                    <img src="img/benin.jpg" alt="image1" style="display: none;"></a>
                            </li>
                            <li style="height: 756px; display: block;" class="sb-current">
                                <a href="#" target="_blank" rel="noopener" style="height: 756px; background-image: url(&quot;img/guinea.jpg&quot;);">
                                    <img src="img/guinea.jpg" alt="image1" style="display: none;"></a>
                            </li>
                            <li style="height: 756px; display: block;" class="sb-current">
                                <a href="#" target="_blank" rel="noopener" style="height: 756px; background-image: url(&quot;img/egypt.jpg&quot;);">
                                    <img src="img/egypt.jpg" alt="image1" style="display: none;"></a>
                            </li>
                            <li style="height: 756px; display: block;" class="sb-current">
                                <a href="#" target="_blank" rel="noopener" style="height: 756px; background-image: url(&quot;img/india.jpg&quot;);">
                                    <img src="img/india.jpg" alt="image1" style="display: none;"></a>
                            </li>
                            <li style="height: 756px; display: block;" class="sb-current">
                                <a href="#" target="_blank" rel="noopener" style="height: 756px; background-image: url(&quot;img/uae.jpg&quot;);">
                                    <img src="img/uae.jpg" alt="image1" style="display: none;"></a>
                            </li>
                            <li style="height: 756px; display: block;" class="sb-current">
                                <a href="#" target="_blank" rel="noopener" style="height: 756px; background-image: url(&quot;img/tanzania.jpg&quot;);">
                                    <img src="img/tanzania.jpg" alt="image1" style="display: none;"></a>
                            </li>
                            <li style="height: 756px; display: block;" class="sb-current">
                                <a href="#" target="_blank" rel="noopener" style="height: 756px; background-image: url(&quot;img/singapore.jpg&quot;);">
                                    <img src="img/singapore.jpg" alt="image1" style="display: none;"></a>
                            </li>
                            <li style="height: 756px; display: block;" class="sb-current">
                                <a href="#" target="_blank" rel="noopener" style="height: 756px; background-image: url(&quot;img/ivory-coast.jpg&quot;);">
                                    <img src="img/ivory-coast.jpg" alt="image1" style="display: none;"></a>
                            </li>
                        </ul>
                    </div>
                </section>
                <script>
                    jQuery('input.d-inline-flex.search-product').keypress(function (e) {
                        if (e.which == 13) {
                            var InputSearch = $(".search-product").val();
                            if (InputSearch == '') {
                                location.reload();
                            } else {
                                jQuery('form#SearchForm').submit();
                            }
                        }
                    });
                </script>
                <section id="our_journey" class="container-fluid back_main internation_house_section" style="background-image: url(img/ecport_house.png);">
                    <div class="row">
                        <div class="back_img"> 
                            <img src="img/ecport_house-1.png" alt="" title="" style="display: none;"> 
                        </div>
                        <div class="container">
                            <div class="international_exports">
                                <div class="internation_content_wraper">
                                    <div class="poretal">
                                        <figure class="text-center"> <img src="img/mac_wolrd.png" alt="" title=""> </figure>
                                        <h3 class="text-center">Futurizing Manufacturing and Commodities Commerce Globally</h3>
                                        <p class="justified-align">MAC WORLD is a diversified yet integrated toll manufacturing group in Malaysia, and key players in the global commodity market. The company has grown exponentially under the forward-thinking leadership of a group of entrepreneurs who shared a common objective and vision.</p>
                                        <p class="justified-align">Headquartered in Malaysia which is known for it abundance in natural resources, MAC WORLD manufactures and supplies raw materials to some of the biggest food and beverage brands across the globe. With worldwide connectivity and by seamlessly integrated operations and services, the group has successfully designed, developed and commercially exported wide range of products and services to most parts of the world.</p>
                                        <p class="justified-align">Having grown organically, by applying modern and rational philosophy and approach; balancing Financial Return of Investment (FROI) and Social Return of Investment (SROI), MAC WORLD transforms raw materials into bespoke ingredients to help customers meet the ever changing demand of consumers.</p>
                                    </div>
                                </div>
                                <a class="about_us_btn1">Our Journey</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="about_section" style="background-image: url(&quot;img/about_banner.jpg&quot;); background-size: cover">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="padding-l-r-20">
                                <div class="col-md-3">
                                    <h3>Who We Are</h3>
                                    <p style="font-size: 23px"><strong>Expertise <br/>Reliability <br/>Entrepreneurial Spirit</strong></p>
                                </div>
                                <div class="col-md-9">
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <p class="justified-align">MAC WORLD is an entrepreneurial driven entity delivering Globally Reliable and world class products and services consistently for almost 20 years. This ambitious spirit has permeated throughout the Eco System and Value chain of the organization, contributing towards a holistic and dynamic workplace environment and leading the group and its associated companies to successfully enter new markets and secure long term customers.</p>
                                    <p class="justified-align">MAC WORLD’ management team has a cumulative experience of more than 100 years in multiple touch points, ranging from sourcing, branding, marketing, production and manufacturing right to customization, trade and international sales. The management team is supported by highly qualified and experienced technical and Research & Development personnel who are able to provide the best of breed solutions and advice to the group.</p>
                                </div>
                            </div>
                            <div class="text-center">
                                <img src="img/team-02.jpg" alt="" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </section>
                <script>
                    $(window).load(function () {
                        $(".trigger_popup_fricc").click(function () {
                            $('.hover_bkgr_fricc').show();
                        });
//                        $('.hover_bkgr_fricc').click(function () {
//                            $('.hover_bkgr_fricc').hide();
//                        });
                        $('.popupCloseButton').click(function () {
                            $('.hover_bkgr_fricc').hide();
                        });
                    });
                </script>
                <section class="about_right_section">
                    <div class="container">
                        <div class="row">
                            <a class="about_us_btn2 trigger_popup_fricc">Join our Team</a>
                            <div class="hover_bkgr_fricc">
                                <span class="helper"></span>
                                <div>
                                    <div class="popupCloseButton">X</div>
                                    <h5>Join our Team</h5>
                                    <br/>
                                    <from>
                                        <input type="text" name="name" class="form-control" placeholder="Name" />
                                        <br/>
                                        <input type="email" name="email" class="form-control" placeholder="Email" />
                                        <br/>
                                        <input type="text" name="contact" pattern="[0-9]{10}" class="form-control" placeholder="Contact Number" />
                                        <br/>
                                        <textarea row="4" type="text" name="message" class="form-control" placeholder="Leave Comments"></textarea>
                                        <p style="float:left;color:#555;font-size: 14px;margin: 10px 0 0;">Upload CV</p> <input type="file" name="upload" class="form-control" accept="image/pdf*">
                                        <br/>
                                        <a href="#" class="about_us_btn">Submit</a>
                                    </from>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <!--                            <div class="who_we_content about_right_content mCustomScrollbar _mCS_2 content-margin">
                                                        <div id="mCSB_2" class="mCustomScrollBox mCS-dark-3 mCSB_vertical mCSB_inside" tabindex="0">
                                                            <div id="mCSB_2_container" class="mCSB_container" style="position:relative;" dir="ltr">-->
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <div class="border-line">
                                    <div class="global_ralby">
                                        <h4>Vision</h4>
                                        <p>To provide reliable products, with sustainable supply chain, through bilateral trade</p>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <h4>Mission </h4>
                                        <p>To be the benchmark in the industry we serve.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="border-line">
                                    <div class="global_ralby value_content">
                                        <h4>Values</h4>
                                        <p>From the founders to the most recent employee, our values guide our conduct:</p>
                                        <ul>
                                            <li><span>C </span>
                                                <p>Caring and Communicative</p>
                                            </li>
                                            <li><span>A </span>
                                                <p>Attention & Attentiveness to customer's needs.</p>
                                            </li>
                                            <li><span>R </span>
                                                <p>Responsive to change and Reliability</p>
                                            </li>
                                            <li><span>E </span>
                                                <p>Engagement with stakeholders, Energetic and Enthusiastic Team</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <!--                                    </div>-->
                            <!--                                    <div id="mCSB_2_scrollbar_vertical" class="mCSB_scrollTools mCSB_2_scrollbar mCS-dark-3 mCSB_scrollTools_vertical" style="display: block;">
                                                                    <div class="mCSB_draggerContainer">
                                                                        <div id="mCSB_2_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; display: block; height: 595px; max-height: 590px; top: 0px;">
                                                                            <div class="mCSB_dragger_bar" style="line-height: 30px;">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mCSB_draggerRail">
                                                                        </div>
                                                                    </div>
                                                                </div>-->
                            <!--                                </div>
                                                        </div>-->
                        </div>
                    </div>
                </section>
                <section class="container-fluid" id="team_section" style="background: url(img/what-we-do-bg.jpg) no-repeat;background-size: cover">
                    <div class="row">
                        <div class="container">

                            <div class="our_partner_heading heading_text">
                                <h3 class="text-center">What We Do</h3>
                                <p class="justified-align">MAC WORLD is an ISO 9001:2015 certified company which exports products and services to over 65 countries. The company is continuously penetrating new markets, opening and accessing new opportunities. Since its inception in 2001, MAC WORLD is in the business of manufacturing and trading Palm Oil, Palm Derivatives, its by-products and agro commodities.</p>
                                <p class="justified-align">Being pioneers of Palm Oil export in Malaysia, in the recent years, MAC WORLD has further diversified into major suppliers of consumer packs, soft/ lauric oils, cattle and poultry feeds, confectionary and bakery products, agro Commodities and oleo chemicals, providing its customers high quality products by engaging in competitive origin sourcing and ensuring on-time delivery to consumers world-wide. MAC WORLD Group have established several brands in the International market like </p>
                                <p class="text-center"><img class="brand-img margin-lf-20" src="img/goldstar.jpg" alt="image" /><img class="brand-img margin-lf-20" src="img/goldfry.jpg" alt="image" /><img class="brand-img margin-lf-20" src="img/goldfat.jpg" alt="image" /><img class="brand-img margin-lf-20" src="img/mrmac.jpg" alt="image" /><img class="brand-img margin-lf-20" src="img/golden-farm.jpg" alt="image" /></p>
                                <p class="justified-align">for its range of cooking oil, confectionery fats, vegetable ghee, tomato paste and dairy based products such as sweetened condensed milk, evaporated milk, skim milk powder, fat filled milk powder etc. MAC WORLD has become a one stop shop in Malaysia for palm oil derivatives, oleo chemicals, confectionery fats and agro commodities for customers worldwide.</p>
                                <p class="justified-align">Driven by the commitment to ensure that high quality products are being offered at competitive pricing by using the expertise and experience to serve the dynamic needs of customers.  MAC WORLD ensures that its values and principles are upheld at all times.</p>
        <!--                                <div class="team-images-set"><img src="img/team.jpg" alt=""></div>-->

                            </div>
                            <!--                            <div class="our_partner_heading heading_text">
                                                            <h3 class="text-center">Our Team</h3>
                                                            <p class="justified-align">The MAC WORLD Group is a largely entrepreneurial driven entity and this characteristic has permeated throughout the Eco System and Value chain of our organization. These attributes inevitably contribute towards a holistic and dynamic workplace environment and this also helps the group and our associated companies to successfully enter new markets and secure long term customers.<br>
                                                                Our Management Team has a collective industry experience of more than 100 years in multiple touch points of our industry, ranging from sourcing, branding, marketing, production, manufacturing right up to customization, trade and International sales. The Management Team is ably supported by highly qualified and experienced technical and Research and Development personnel who are able to provide the best of breed solutions and advice to the group. All this collectively, leads to the MAC WORLD Brand being recognized as a Globally reknowned company and a brand that delivers globally reliable products and services. Our Management and Technical Team’s efforts have also let us to achieve the highly acclaimed 9001:2015 ISO certification and accreditation.</p>
                                                            <div class="team-images-set text-center"><img src="img/master-01.jpg" alt=""></div>
                                                            <p class="text-center">Join Our Team!</p>
                                                        </div>-->
                            <div class="products-container">
                                <div class="produts_listing">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="container-fluid light-gray-bg" id="explor_product">
                    <div class="row">
                        <div class="product-list-wrapper clearfix">
                            <div class="col-md-3 col-sm-12 pull-right right_blue_product_list">
                                <div class="row">
                                    <div class="list-wrapper">
                                        <div class="head-wrap">
                                            <h3>Explore<br> Product List</h3>
                                            <h4>Click on below category listing and get detailed description at left side Section.</h4> </div>
                                        <div class="list-group-product">
                                            <ul class="nav nav-tabs">
                                                <?php
                                                $first = true;
                                                foreach ($categories as $row) {
                                                    $cls = '';
                                                    if ($first == true) {
                                                        $cls = 'active';
                                                        $first = false;
                                                    }
                                                    ?>
                                                    <li class="<?php echo $cls; ?>">
                                                        <a onclick="renderCategory(<?php echo $row['ID']; ?>);" href="#tab<?php echo $row['ID']; ?>" data-toggle = "tab"><?php echo $row['name']; ?></a>
                                                    </li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-12 matchHeight">
                                <div class="row">
                                    <div class="tab-content tab-content-product">
                                        <?php
                                        $first = true;
                                        foreach ($categories as $row) {
                                            $cls = '';
                                            if ($first == true) {
                                                $cls = 'active';
                                                $first = false;
                                            }
                                            ?>
                                            <div class="tab-pane <?php echo $cls; ?>" id="tab<?php echo $row['ID']; ?>">
                                                <div class="products-content-main">
                                                    <div class="product_sub_category_slider1 slick-initialized slick-slider">
                                                        <div class="slick-list draggable">
                                                            <div class="slick-track">
                                                                <div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false">
                                                                    <div>
                                                                        <div class="">
                                                                            <figure class="clearfix">
                                                                                <div class="img-wrapper clearfix">
                                                                                    <img src="<?php echo IMG_BASE_URL . $row['image']; ?>" alt="image" id="category_image_<?php echo $row['ID']; ?>" />
                                                                                </div>
                                                                                <figcaption>
                                                                                    <div class="inner-contant">
                                                                                        <h3 id="category_name_<?php echo $row['ID']; ?>"><?php echo $row['name']; ?></h3>
                                                                                        <p id="category_description_<?php echo $row['ID']; ?>"><?php echo $row['description']; ?></p>
                                                                                    </div>
                                                                                </figcaption>
                                                                            </figure>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 col-sm-12 thumline-img">
                                                                        <?php
                                                                        $sub_cats = $db->selectAllWithWhere('sub_categories', 'category_id=' . $row['ID']);
                                                                        foreach ($sub_cats as $sub) {
                                                                            ?>
                                                                            <img src="<?php echo IMG_BASE_URL . $sub['normal_icon']; ?>" alt="image" data-normal="<?php echo IMG_BASE_URL . $sub['normal_icon']; ?>" data-hover="<?php echo IMG_BASE_URL . $sub['hover_icon']; ?>"onmouseout="mouseOut(this)" onmouseenter="mouseEnter(this)" onclick="renderSubCategory(<?php echo $sub['ID']; ?>);" />
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="container-fluid" id="service_section">
                    <div class="row">
                        <div class="container">
                            <div class="text-center our_partner_heading heading_text">
                                <h3>Our Services</h3>

                                <p class="justified-align">We offer integrated end-to-end manufacturing services and this has also assisted the MAC WORLD Group to attract customers and markets on an international level.<br>
                                </p>

                            </div>
                            <div class="products-container">
                                <div class="produts_listing">
                                    <div class="single-product clearfix left-product left-product">
                                        <div class="img-wraps">
                                            <img width="736" height="552" src="img/services01.jpg" class="attachment-full size-full wp-post-image" alt="" srcset="img/services01.jpg 736w, img/services01-300x225.jpg 300w" sizes="100vw">
                                        </div>
                                        <div class="containt-wrap">
                                            <h3>Integrated Financial Service</h3>
                                            <p class="justified-align">MAC WORLD truly understands that the ability to access and secure finance is critical for business survival and growth. Our established strategic networking alliances and distribution  channels allow to leverage competitive pricing for customers on regular basis. Sustainable finance facilitation combined with ability to source from commodity origination make us price competitive and help us in delivering quality products. MAC WORLD’ customer-centric philosophy lays emphasis on providing personalised end-to-end supply chain management solutions for buyers and suppliers to draw maximum advantage in cash flow, extended credit, risk mitigation etc.</p>
                                            <p class="justified-align">MAC WORLD’ commitment to go beyond customer expectation, along with its association with financial institutions allow us to raise finance support for critical transactions. This strengthens our partnership with customers and suppliers which help to match demand and supply for commodities more effectively and efficiently.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="container-fluid padding-t-80" id="accreditation_section">
                    <div class="row">
                        <div class="container">
                            <div class="text-center our_partner_heading heading_text">
                                <h3>Accreditations</h3>
                                <p class="justified-align">We believe in continuous improvement and adhere to international benchmarks and standards, particularly those related within our industry and focal areas. Over the years, we have been accredited by various bodies and we are also registered with industry and trade associations.</p>                        
                            </div>
                            <div class="products-container">
                                <div class="produts_listing clearfix">
                                    <div class="single-product clearfix accreditation_box">
                                        <div class="accreditation_box_img text-center">
                                            <img src="img/accrediation.png">
                                        </div>
                                        <div class="containt-wrap">
                                            <p class="justified-align">As a member of the Roundtable on Sustainable Palm Oil, MAC WORLD demonstrate that its palm oil is sustainable.<br/><br/>Through this certification, we ensure that we are not associated directly or indirectly with any kind of deforestation and loss of critical habitat. Our palm oil is produced responsibly to take care of these ecosystems and their future.</p>
                                        </div>
                                    </div>
                                    <div class="single-product clearfix accreditation_box">
                                        <div class="accreditation_box_img text-center">
                                            <img src="img/lrukas-1.jpg">
                                        </div>
                                        <div class="containt-wrap">
                                            <p class="justified-align">ISO 9001:2015 sets out the criteria for a quality management system with the capability of complete traceability of the cargo we have supplied. This standard is based on a number of quality management principles including a strong customer focus, the motivation and implication of top management, the process approach and continual improvement. Using ISO 9001:2015 helps ensure that customers get consistent, good quality products and services, which in turn brings good business opportunities.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accrediation_logo">
                                    <ul>
                                        <li class="">
                                            <a href="#">
                                                <figure>
                                                    <img src="img/accreditations/Picture1.png" alt="" title="">
                                                </figure>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#">
                                                <figure>
                                                    <img src="img/accreditations/Picture2.png" alt="" title="">
                                                </figure>
                                            </a>
                                        </li>
                                        <!--                                        <li class="">
                                                                                    <a href="#">
                                                                                        <figure>
                                                                                            <img src="img/accreditations/Picture3.png" alt="" title="">
                                                                                        </figure>
                                                                                        
                                                                                    </a>
                                                                                </li>-->
                                        <li class="">
                                            <a href="#">
                                                <figure>
                                                    <img src="img/accreditations/Picture4.png" alt="" title="">
                                                </figure>

                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#">
                                                <figure>
                                                    <img src="img/accreditations/Picture5.png" alt="" title="">
                                                </figure>

                                            </a>
                                        </li>
                                        <!--                                        <li class="">
                                                                                    <a href="#">
                                                                                        <figure>
                                                                                            <img src="img/accreditations/Picture6.png" alt="" title="">
                                                                                        </figure>
                                                                                        
                                                                                    </a>
                                                                                </li>-->
                                        <li class="">
                                            <a href="#">
                                                <figure>
                                                    <img src="img/accreditations/Picture7.png" alt="" title="">
                                                </figure>

                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#">
                                                <figure>
                                                    <img src="img/accreditations/Picture8.png" alt="" title="">
                                                </figure>

                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#">
                                                <figure>
                                                    <img src="img/accreditations/Picture9.png" alt="" title="">
                                                </figure>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="container-fluid out_partner_section" id="ourpartner">
                    <div class="row">
                        <div class="container">
                            <div class="our_partner_heading our_partner_text">
                                <h3 class="text-center">Our Partners</h3>

                                <p class="justified-align">With the expansive portfolio that MAC WORLD handles – sourcing, manufacturing, trading and distributing raw materials, MAC WORLD Group and its management believe in establishing mutually beneficial, strong strategic alliances with parties and organizations at every level of the business, across geographies, commodities and functions to achieve its mission and vision.</p>

                                <ul class="clearfix">
                                    <li class="active"><a data-toggle="tab" href="#menu1">Banking</a></li>
                                    <li class=""><a data-toggle="tab" href="#menu2">Insurance</a></li>
                                    <li class=""><a data-toggle="tab" href="#menu3">Technology</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="menu1" class="tab-pane fade in active padding-t-50">
                                        <div class="slider">
                                            <div>
                                                <img src="img/banking/banking-1.jpg" alt="" />
                                            </div>
                                            <div>
                                                <img src="img/banking/banking-2.png" alt="" />
                                            </div>
                                            <div>
                                                <img src="img/banking/banking-3.jpg" alt="" />
                                            </div>
                                            <div>
                                                <img src="img/banking/banking-4.jpg" alt="" />
                                            </div>
                                            <div>
                                                <img src="img/banking/banking-5.jpg" alt="" />
                                            </div>
                                            <div>
                                                <img src="img/banking/banking-6.jpg" alt="" />
                                            </div>
                                            <div>
                                                <img src="img/banking/banking-7.jpg" alt="" />
                                            </div>
                                            <div>
                                                <img src="img/banking/banking-8.png" alt="" />
                                            </div>
                                            <div>
                                                <img src="img/banking/banking-9.png" alt="" />
                                            </div>
                                        </div>

                                        <!--                                        <div class="paginator-center text-color text-center">
                                                                                    <ul>
                                                                                        <li class="prev slick-arrow slick-hidden" aria-disabled="true" tabindex="-1" style="display: list-item;"> <img src="img/prev_aoorw.png" alt="" title=""> </li>
                                                                                        <li class="next slick-arrow slick-hidden" style="display: list-item;" aria-disabled="true" tabindex="-1"> <img src="img/next_aoorw.png" alt="" title=""> </li>
                                                                                    </ul>
                                                                                </div>-->
                                    </div>
                                    <div id="menu2" class="tab-pane fade in padding-t-50">

                                        <div class="slider">
                                            <div class="slide">
                                                <img src="img/insurance/insurance-1.png" alt="" />
                                            </div>
                                            <div class="slide">
                                                <img src="img/insurance/insurance-2.png" alt="" />
                                            </div>
                                            <div class="slide">
                                                <img src="img/insurance/insurance-3.jpg" alt="" />
                                            </div>
                                            <div class="slide">
                                                <img src="img/insurance/insurance-4.png" alt="" />
                                            </div>
                                            <div class="slide">
                                                <img src="img/insurance/insurance-5.png" alt="" />
                                            </div>
                                            <div class="slide">
                                                <img src="img/insurance/insurance-6.jpg" alt="" />
                                            </div>
                                            <div class="slide">
                                                <img src="img/insurance/insurance-7.png" alt="" />
                                            </div>
                                            <div class="slide">
                                                <img src="img/insurance/insurance-8.png" alt="" />
                                            </div>
                                        </div>

                                        <!--                                        <div class="paginator-center text-color text-center">
                                                                                    <ul>
                                                                                        <li class="prev slick-arrow slick-hidden" aria-disabled="true" tabindex="-1" style="display: list-item;"> <img src="img/prev_aoorw.png" alt="" title=""> </li>
                                                                                        <li class="next slick-arrow slick-hidden" style="display: list-item;" aria-disabled="true" tabindex="-1"> <img src="img/next_aoorw.png" alt="" title=""> </li>
                                                                                    </ul>
                                                                                </div>-->
                                    </div>
                                    <div id="menu3" class="tab-pane fade in padding-t-50">
                                        <div>
                                            <div class="" style="text-align: center">
                                                <img src="img/technology/technology.png" alt=""/>
                                            </div>
                                        </div>
                                        <!--                                        <div class="paginator-center text-color text-center">
                                                                                    <ul>
                                                                                        <li class="prev slick-arrow slick-hidden" aria-disabled="true" tabindex="-1" style="display: list-item;"> <img src="img/prev_aoorw.png" alt="" title=""> </li>
                                                                                        <li class="next slick-arrow slick-hidden" style="display: list-item;" aria-disabled="true" tabindex="-1"> <img src="img/next_aoorw.png" alt="" title=""> </li>
                                                                                    </ul>
                                                                                </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <script>
                    $(document).ready(function () {
                        $("ul.nav.nav-tabs li").click(function () {
                            $('html, body').animate({
                                scrollTop: $(".slick-track").offset().top
                            }, 1500);
                        });
                    });
                </script>
                <div id="nav-arrows" class="nav-arrows" style="display: block;"><a href="#">Next</a></div>
        <!--                <section class="container-fluid product_section" id="our_product">
                    <div class="row">
                        <div class="container">
                            <div class="products-wrapper clearfix">
                                <div class="match_height product_image" style="height: 409px;">
        
                                    <div class="img-wrapper"> <img src="img/tellss.png"> </div>
                                </div>
                                <div class="match_height product_content" style="height: 409px;">
                                    <div class="content-wrapper">
                                        <h3>Teak Wood</h3>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p><p>
                                            <a href="#explor_product">View Products</a>
                                        </p></div>
                                </div>
                            </div>
                            <div class="products-wrapper clearfix">
                                <div class="match_height product_image" style="height: 411px;">
        
                                    <div class="img-wrapper"> <img src="img/tellss.png"> </div>
                                </div>
                                <div class="match_height product_content" style="height: 411px;">
                                    <div class="content-wrapper">
                                        <h3>Yellow Balao</h3>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p><p>
                                            <a href="#explor_product">View Products</a>
                                        </p></div>
                                </div>
                            </div>
                            <div class="products-wrapper clearfix">
                                <div class="match_height product_image" style="height: 409px;">
        
                                    <div class="img-wrapper"> <img src="img/tellss.png"> </div>
                                </div>
                                <div class="match_height product_content" style="height: 409px;">
                                    <div class="content-wrapper">
                                        <h3>Keruing</h3>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p><p>
                                            <a href="#explor_product">View Products</a>
                                        </p></div>
                                </div>
                            </div>
                            <div class="products-wrapper clearfix">
                                <div class="match_height product_image" style="height: 411px;">
        
                                    <div class="img-wrapper"> <img src="img/tellss.png"> </div>
                                </div>
                                <div class="match_height product_content" style="height: 411px;">
                                    <div class="content-wrapper">
                                        <h3>Merbau</h3>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p><p>
                                            <a href="#explor_product">View Products</a>
                                        </p></div>
                                </div>
                            </div>
                            <div class="view_all_product"> <a href="#explor_product">View All Products</a> </div>
                        </div>
                    </div>
                </section>-->
                <section id="map_indigate_section" class="container-fluid map_indigate_section">
                    <div class="row">
                        <div class="container">
                            <div class="map_indigate">
                                <div class="map-image"> <img src="img/pointer_map.png" alt="" title=""> </div>
                                <div class="map_pointer_content">
                                    <ul>
                                        <li><a href="#">Malaysia</a></li>
                                        <li><a href="#">Egypt</a></li>
                                        <li><a href="#">Indonesia</a></li>
                                        <li><a href="#">India</a></li>
                                        <li><a href="#">Ivory Coast</a></li>
                                        <li><a href="#">UAE</a></li>
                                        <li><a href="#">Nigeria</a></li>
                                        <li><a href="#">Tanzania</a></li>
                                        <li><a href="#">Benin</a></li>
                                        <li><a href="#">Singapore</a></li>
                                        <li><a href="#">Guinea Bissau</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- footer start -->
                <footer class="container-fluid back_main" id="contact_section" style="background-image: url(img/footer_image.png);">
                    <div class="row">
                        <div class="back_img"> <img src="img/footer_image.png" alt="" title="" style="display: none;"> </div>
                        <div class="container">
                            <div class="footer_content">
                                <h3>Contact Us</h3>
                                <div class="footer_box">
                                    <!--<img src="img/master-1g.jpg" alt="" title="" style="width: 100%"/>-->
                                    <div class="poretal">
                                        <h4>MAC WORLD Industries SDN BHD (548445-V)</h4>
                                        <p>3-11, Block B,<br>
                                            <br>Phileo Damansara II,<br>
                                            <br>No. 15, Jalan 16/11 Off Jalan Damansara,<br>
                                            <br>46350 Petaling Jaya,<br>
                                            <br>Selangor Darul Ehsan, Malaysia.</p>
                                        <ul>
                                            <li>
<!--                                                <span></span>-->
                                                <img src="img/call_icon1.png" alt="" title="">
                                                <div class="footer_mobile">
                                                    <a href="tel:+603-7954 7059">+603 7954 7059</a>
                                                    <a href="tel:+603-7931 0352">+603-7931 0352</a>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#"> 
<!--                                            <span></span>-->
                                                    <img src="img/fax1.png" alt="" title="">
                                                    <p>+603-7954 0059</p>
                                                </a>
                                                <p><a href="#"></a></p></li>
                                            <li>
                                                <a href="#"> 
<!--                                                    <span></span>-->
                                                    <img src="img/mail1.png" alt="" title="">
                                                    <p>products@macworldinc.com</p>
                                                </a>
                                                <p><a href="#"></a></p>
                                            </li>
                                            <li>
                                                <a href="#"> 
<!--                                                    <span></span>-->
                                                    <img src="img/web1.png" alt="" title="">
                                                    <p>www.macworldinc.com</p>
                                                </a><p><a href="#">                                        </a>
                                                </p>
                                            </li>
                                        </ul>
                                        <div class="padding-t-20">
                                            <a class="about_us_btn3 trigger_popup_fricc1">Join our Team</a>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="padding-20">
                                    <div class="hover_bkgr_fricc1">
                                        <span class="helper1"></span>
                                        <div>
                                            <div class="popupCloseButton1">X</div>
                                            <h5>Join our Team</h5>
                                            <br/>
                                            <from>
                                                <input type="text" name="name" class="form-control" placeholder="Name" />
                                                <br/>
                                                <input type="email" name="email" class="form-control" placeholder="Email" />
                                                <br/>
                                                <input type="text" name="contact" pattern="[0-9]{10}" class="form-control" placeholder="Contact Number" />
                                                <br/>
                                                <textarea row="4" type="text" name="message" class="form-control" placeholder="Leave Comments"></textarea>
                                                <p style="float:left;color:#555;font-size: 14px;margin: 10px 0 0;">Upload CV</p> <input type="file" name="upload" class="form-control" accept="image/pdf*">
                                                <br/>
                                                <a href="#" class="about_us_btn">Submit</a>
                                            </from>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="container-fluid padding-rl-0">
                            <img src="img/team-members.jpg" alt="image" class="img-responsive" style="width: 100%">
                            <div class="footer_logo text-center">
                                <a href="#">
                                    <figure> <img class="img-responsive" src="img/footer_logo.png" alt="" title=""> </figure>
                                </a>
                                <p>All Rights Reserved. Copyright &copy; 2018 MAC WORLD Industries Sdn. Bhd.</p>
                            </div>
                        </div>
                    </div>
                </footer>
                <script>
                    $(window).load(function () {
                        $(".trigger_popup_fricc1").click(function () {
                            $('.hover_bkgr_fricc1').show();
                        });
                        //                        $('.hover_bkgr_fricc').click(function () {
                        //                            $('.hover_bkgr_fricc').hide();
                        //                        });
                        $('.popupCloseButton1').click(function () {
                            $('.hover_bkgr_fricc1').hide();
                        });
                    });
                </script>
                <!-- footer End -->
            </div>
            <script src="js/bootstrap.min.js" type="text/javascript"></script>
            <script src="js/slick.js" type="text/javascript"></script>
            <!-- plugin -->
            <script src="js/owl.carousel.min.js" type="text/javascript"></script>
            <script src="js/jquery.matchHeight.js" type="text/javascript"></script>
            <script src="js/jquery.slicknav.min.js" type="text/javascript"></script>
            <!-- <script src="include/js/project-jquery.js"></script> -->
            <script src="js/jquery-ui.min.js" type="text/javascript"></script>
            <script src="js/jquery.fullPage.js" type="text/javascript"></script>
            <script src="js/jquery.slicebox.js" type="text/javascript"></script>

            <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
            <script src="js/jquery.mCustomScrollbar.js" type="text/javascript"></script>
            <script type="text/javascript">
                    $(window).on("scroll", function () {
                        var scrollHeight = $(document).height();
                        var scrollPosition = $(window).height() + $(window).scrollTop();
                        if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
                            $(".sroll_down").css('display', 'none');
                        } else {
                            $(".sroll_down").css('display', 'block');
                        }
                    });
            </script>
            <script type="text/javascript">

                var header_height = $(".header-top").height();

                // for scroll down
                $('#menu li a[href^="#"]').on('click', function (event) {
                    var target = $(this.getAttribute('href'));
                    if (target.length) {
                        event.preventDefault();
                        $('html, body').stop().animate({
                            scrollTop: target.offset().top - header_height + 55
                        }, 1000);
                    }
                });



                $('.about_us_btn[href^="#"]').on('click', function (event) {
                    var target = $(this.getAttribute('href'));
                    if (target.length) {
                        event.preventDefault();
                        $('html, body').stop().animate({
                            scrollTop: target.offset().top - header_height + 55
                        }, 1000);
                    }
                });

                /*// for scroll down
                 var target = $(window).height();
                 $('.sroll_down a[href^="#"]').on('click', function(event) {
                 
                 $('html, body').stop().animate({
                 scrollTop: target.offset().top - header_height + 55
                 }, 1000);
                 });*/


                // The resize function
                function resize() {
                    var vheight = $(window).height();
                    var vwidth = $(window).width();
                    $('.fullsize-background').css({
                        'height': vheight,
                        'width': vwidth
                    });
                }
                ;

                // The scroll-up function
                function scrollUp() {
                    var vheight = $(window).height();
                    $('html, body').animate({
                        scrollTop: (Math.ceil($(window).scrollTop() / vheight) - 1) * vheight
                    }, 500);
                }
                ;

                // The scroll-down function
                function scrollDown() {
                    var vheight = $(window).height();
                    $('html, body').animate({
                        scrollTop: (Math.floor($(window).scrollTop() / vheight) + 1) * vheight
                    }, 500);
                }
                ;

                // Do stuff when document is ready
                $(document).ready(function () {

                    // Resize Container Function
                    resize();

                    // Click to Scroll DOWN Functions
                    $('.sroll_down a').click(function (event) {
                        scrollDown();
                        event.preventDefault();
                    });
                    // Click to Scroll UP Functions
                    $('.scroll-prev').click(function (event) {
                        scrollUp();
                        event.preventDefault();
                    });

                });

                // Key Events
                /*$(document).keydown(function(e) {
                 if (e.keyCode == 40) { scrollDown(); };
                 if (e.keyCode == 34) { scrollDown(); };
                 if (e.keyCode == 33) { scrollUp(); };
                 if (e.keyCode == 38) { scrollUp(); };
                 e.preventDefault;
                 });*/

                // Mousewheel events
                /*$(window).bind('mousewheel', function(event) {
                 if (event.originalEvent.wheelDelta >= 0) {
                 scrollDown();
                 }
                 else {
                 scrollUp();
                 }
                 event.preventDefault;
                 });*/

                // Resize Container on window resize
                $(window).resize(function () {

                    resize();

                });

            </script>
            <script type="text/javascript">
                /*for header fix*/
                $(window).scroll(function () {

                    if (screen.width > 991) {
                        if ($(window).scrollTop() > 5) {
                            $('.header-top').addClass('header_sticky');
                        } else {
                            $('.header-top').removeClass('header_sticky');
                        }
                    }

                });
            </script>
            <!-- <script type="text/javascript">
        
                function scrolfunction() {
                    $("section").each(function(){
                        var visibl = $(this).position().top;
                        var visiblnext = $(this).next('section').attr("id");
        
                        var postio_top = visiblnext.position().top;
        
        
        
                        var scroltop = $(window).scrollTop();
                        if (postio_top > scroltop && visibl <= scroltop ) {
                            var elementid = $(this).next("section").attr("id");
                            $(".sroll_down a").attr('href', '#' + elementid);
                            console.log(elementid);
                        }else{
        
                        }
                        /**/
        
                    });
                }
        
                $(window).scroll(function(){
        
                    scrolfunction();
        
                });
        
                $(document).ready(function() {
                    scrolfunction();
                });
        
        
            </script> -->
            <script type="text/javascript">
                $(document).ready(function () {

                    $('.match_height').matchHeight();
                    $('.matchHeight').matchHeight();
                });
            </script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $(".language").click(function (event) {
                        $(".flag_ul").toggleClass('active_ul');
                    });
                    $(".flag_ul li a img").click(function () {
                        var flagsrc = $(this).attr("src");
                        $(".main_flag").attr('src', flagsrc);
                        $(".flag_ul").removeClass('active_ul'); /*alert(flagsrc);*/
                    });
                });
            </script>
            <script type="text/javascript">
                $(".regular").slick({
                    dots: false,
                    autoplay: true,
                    loop: true,
                    infinite: true,
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    margin: 50,
                    prevArrow: $('.prev'),
                    nextArrow: $('.next'),
                    responsive: [{
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 1
                            }
                        }, {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1
                            }
                        }, {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                        }, {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }]
                });
                $(".regular2").slick({
                    dots: false,
                    loop: true,
                    autoplay: true,
                    infinite: true,
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    margin: 50,
                    prevArrow: $('.prev2'),
                    nextArrow: $('.next2'),
                    responsive: [{
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1
                            }
                        }, {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1,
                                infinite: true,
                                dots: true
                            }
                        }, {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                        }, {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }]
                });

                $(".regularnew").slick({
                    dots: false,
                    loop: true,
                    autoplay: true,
                    infinite: true,
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    margin: 50,
                    prevArrow: $('.prevnew'),
                    nextArrow: $('.nextnew'),
                    responsive: [{
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 1
                            }
                        }, {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1,
                                infinite: true,
                                dots: true
                            }
                        }, {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                        }, {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }]
                });

                $(".regular3").slick({
                    dots: false,
                    loop: true,
                    autoplay: true,
                    infinite: true,
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    margin: 50,
                    prevArrow: $('.prev3'),
                    nextArrow: $('.next3'),
                    responsive: [{
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 1,
                                infinite: true,
                                dots: true
                            }
                        }, {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                        }, {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }]});

                for (i = 1; i <= 12; i++) {
                    $(".product_sub_category_slider" + i).slick({
                        dots: false,
                        loop: true,
                        fade: true,
                        infinite: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        margin: 50,
                        prevArrow: $('.prev4' + i),
                        nextArrow: $('.next4' + i)
                    });
                }
            </script>
            <script type="text/javascript">
                // for scroll down  $('.sroll_down a[href^="#"]').on('click', function(event) {    var target = $(this.getAttribute('href'));       if( target.length ) {           event.preventDefault();         $('html, body').stop().animate({            scrollTop: target.offset().top        }, 1000);     }   });
            </script>
            <script type="text/javascript">
                $(function () {
                    $(".back_main").each(function () {
                        var BG = $(this).find(".back_img img").attr("src");
                        $(this).css('backgroundImage', 'url(' + BG + ')');
                        $(".back_img img").hide();
                    })
                });
            </script>
            <script type="text/javascript">
                $(document).ready(function () {
                    var winheight = $(window).height();
                    $('#main-banner').height(winheight);
                    $('.banner_menu').height(winheight);
                    $('.who_we_content_section').height(winheight);
                    $('#sb-slider,#sb-slider li,#sb-slider a').height(winheight);
                });
            </script>
            <script type="text/javascript">
                $(function () {
                    $("#sb-slider").find("li").each(function () {
                        var BG_img = $(this).find("a img").attr("src");
                        $(this).find("a").css('backgroundImage', 'url(' + BG_img + ')');
                        $(this).find("a img").hide();
                    })
                })
            </script>
            <script type="text/javascript">
                $(window).scroll(function () {
                    if ($(window).scrollTop() > 0) {
                        $('.banner_menu').addClass('banner_sticky');
                    } else {
                        $('.banner_menu').removeClass('banner_sticky');
                    }
                });
            </script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#fullpage').fullpage({
                        anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage', 'lastPage'],
                        menu: '#menu',
                        /*navigation: true,*/
                    }); /*$('video').each((i,v) => v.play());*/
                });
            </script>
            <script type="text/javascript">
                $(function() {
                var Page = (function() {
                var $navArrows = $('#nav-arrows').hide(),
                        $shadow = $('#shadow').hide(),
                        slicebox = $('#sb-slider').slicebox({
                onReady: function() {
                $navArrows.show();
                        $shadow.show();
                },
                        orientation: 'r',
                        cuboidsRandom: true,
                        disperseFactor: 30                 }),
                        init = function() {
                        initEvents();
                        },
                        initEvents = function() { // add navigation events                          $navArrows.children( ':first' ).on( 'click', function() {                               slicebox.next();                                return false;                           } );                            $navArrows.children( ':last' ).on( 'click', function() {                                                                slicebox.previous();                                return false;                           } );                        };                      return { init : init };             })();               setInterval(function(){                     $('#nav-arrows a').trigger('click');                }, 5000);               Page.init();            });
            </script>
            <script type="text/javascript">
                        $(function() {

                        var Page = (function() {

                        var $navArrows = $('#nav-arrows').hide(),
                                $shadow = $('#shadow').hide(),
                                slicebox = $('#sb-slider').slicebox({
                        onReady : function() {

                        $navArrows.show();
                                $shadow.show();
                        },
                                orientation : 'r',
                                cuboidsRandom : true,
                                disperseFactor : 30
                        }),
                                init = function() {

                                initEvents();
                                },
                                initEvents = function() {

                                // add navigation events
                                $navArrows.children(':first').on('click', function() {

                                slicebox.next();
                                        return false;
                                });
                                        $navArrows.children(':last').on('click', function() {

                                slicebox.previous();
                                        return false;
                                });
                                };
                                return { init : init };
                        })();
                                setInterval(function(){
                                $('#nav-arrows a').trigger('click');
                                }, 3000);
                                Page.init();
                        });</script>


            <script type="text/javascript">
                                jQuery(document).ready(function($) {

                        $(".menu li").on('click', function() {
                        hamb.trigger("click");
                        })

                                var hamb = $('#hamburger'), sidebarContainer = $('.sidebar-container'); hamb.on('click', function() {
                        $(this).toggleClass('active');
                                sidebarContainer.toggleClass('active');
                        })


                        })
            </script>


            <script type="text/javascript">
                                $(document).ready(function() {
                        var gturl = window.location.href;
                                var winheight = $(window).height();
                                var arr = gturl.split('#');
                                var scrid = "#" + arr[1];
                                if (arr[1]) {
                        $('html, body').animate({
                        scrollTop: $(scrid).offset().top + 0
                        }, 500);
                        }
                        });</script>

            <script type="text/javascript">
                                $('.banner-product-slider').owlCarousel({
                        center: true,
                                items:2,
                                loop:true,
                                margin:10,
                                autoplay:true,
                                nav:true,
                                navText:['<img src="images/slider_arrrow1.png" alt=""/>', '<img src="images/slider_arrrow2.png" alt=""/>'],
                                responsive:{
                                0:{
                                items:1
                                },
                                        768:{
                                        items:3
                                        }
                                }
                        });</script>


            <script>
                                (function($){
                                $(window).on("load", function(){

                                $(".about_right_content").mCustomScrollbar({
                                setHeight:600,
                                        theme:"dark-3"
                                });
                                });
                                })(jQuery);</script>

            <script type="text/javascript">
                                jQuery(document).ready(function() {
                        jQuery(".language_select").change(function(){
                        var lang = jQuery(this).val();
                                var lang_url = window.location.origin + window.location.pathname + '/?lang=' + lang;
                                window.location.href = lang_url;
                        });
                        });</script>

            <script type="text/javascript">
                                window.onload = function(){
                                $('.slider').slick({
                                autoplay:true,
                                        autoplaySpeed:9000,
                                        arrows:true,
                                        prevArrow:'',
                                        nextArrow:'',
                                        centerMode:true,
                                        slidesToShow:4,
                                        slidesToScroll:1,
                                        responsive: [
                                        {
                                        breakpoint: 768,
                                                settings: {
                                                arrows: false,
                                                        centerMode: true,
                                                        centerPadding: '40px',
                                                        slidesToShow: 3
                                                }
                                        },
                                        {
                                        breakpoint: 480,
                                                settings: {
                                                arrows: false,
                                                        centerMode: true,
                                                        centerPadding: '40px',
                                                        slidesToShow: 1
                                                }
                                        }
                                        ]
                                });
                                };
            </script>

            <svg style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <defs>
            <symbol id="icon-behance" viewBox="0 0 37 32">
                <path class="path1" d="M33 6.054h-9.125v2.214h9.125v-2.214zM28.5 13.661q-1.607 0-2.607 0.938t-1.107 2.545h7.286q-0.321-3.482-3.571-3.482zM28.786 24.107q1.125 0 2.179-0.571t1.357-1.554h3.946q-1.786 5.482-7.625 5.482-3.821 0-6.080-2.357t-2.259-6.196q0-3.714 2.33-6.17t6.009-2.455q2.464 0 4.295 1.214t2.732 3.196 0.902 4.429q0 0.304-0.036 0.839h-11.75q0 1.982 1.027 3.063t2.973 1.080zM4.946 23.214h5.286q3.661 0 3.661-2.982 0-3.214-3.554-3.214h-5.393v6.196zM4.946 13.625h5.018q1.393 0 2.205-0.652t0.813-2.027q0-2.571-3.393-2.571h-4.643v5.25zM0 4.536h10.607q1.554 0 2.768 0.25t2.259 0.848 1.607 1.723 0.563 2.75q0 3.232-3.071 4.696 2.036 0.571 3.071 2.054t1.036 3.643q0 1.339-0.438 2.438t-1.179 1.848-1.759 1.268-2.161 0.75-2.393 0.232h-10.911v-22.5z"></path>
            </symbol>
            <symbol id="icon-deviantart" viewBox="0 0 18 32">
                <path class="path1" d="M18.286 5.411l-5.411 10.393 0.429 0.554h4.982v7.411h-9.054l-0.786 0.536-2.536 4.875-0.536 0.536h-5.375v-5.411l5.411-10.411-0.429-0.536h-4.982v-7.411h9.054l0.786-0.536 2.536-4.875 0.536-0.536h5.375v5.411z"></path>
            </symbol>
            <symbol id="icon-medium" viewBox="0 0 32 32">
                <path class="path1" d="M10.661 7.518v20.946q0 0.446-0.223 0.759t-0.652 0.313q-0.304 0-0.589-0.143l-8.304-4.161q-0.375-0.179-0.634-0.598t-0.259-0.83v-20.357q0-0.357 0.179-0.607t0.518-0.25q0.25 0 0.786 0.268l9.125 4.571q0.054 0.054 0.054 0.089zM11.804 9.321l9.536 15.464-9.536-4.75v-10.714zM32 9.643v18.821q0 0.446-0.25 0.723t-0.679 0.277-0.839-0.232l-7.875-3.929zM31.946 7.5q0 0.054-4.58 7.491t-5.366 8.705l-6.964-11.321 5.786-9.411q0.304-0.5 0.929-0.5 0.25 0 0.464 0.107l9.661 4.821q0.071 0.036 0.071 0.107z"></path>
            </symbol>
            <symbol id="icon-slideshare" viewBox="0 0 32 32">
                <path class="path1" d="M15.589 13.214q0 1.482-1.134 2.545t-2.723 1.063-2.723-1.063-1.134-2.545q0-1.5 1.134-2.554t2.723-1.054 2.723 1.054 1.134 2.554zM24.554 13.214q0 1.482-1.125 2.545t-2.732 1.063q-1.589 0-2.723-1.063t-1.134-2.545q0-1.5 1.134-2.554t2.723-1.054q1.607 0 2.732 1.054t1.125 2.554zM28.571 16.429v-11.911q0-1.554-0.571-2.205t-1.982-0.652h-19.857q-1.482 0-2.009 0.607t-0.527 2.25v12.018q0.768 0.411 1.58 0.714t1.446 0.5 1.446 0.33 1.268 0.196 1.25 0.071 1.045 0.009 1.009-0.036 0.795-0.036q1.214-0.018 1.696 0.482 0.107 0.107 0.179 0.161 0.464 0.446 1.089 0.911 0.125-1.625 2.107-1.554 0.089 0 0.652 0.027t0.768 0.036 0.813 0.018 0.946-0.018 0.973-0.080 1.089-0.152 1.107-0.241 1.196-0.348 1.205-0.482 1.286-0.616zM31.482 16.339q-2.161 2.661-6.643 4.5 1.5 5.089-0.411 8.304-1.179 2.018-3.268 2.643-1.857 0.571-3.25-0.268-1.536-0.911-1.464-2.929l-0.018-5.821v-0.018q-0.143-0.036-0.438-0.107t-0.42-0.089l-0.018 6.036q0.071 2.036-1.482 2.929-1.411 0.839-3.268 0.268-2.089-0.643-3.25-2.679-1.875-3.214-0.393-8.268-4.482-1.839-6.643-4.5-0.446-0.661-0.071-1.125t1.071 0.018q0.054 0.036 0.196 0.125t0.196 0.143v-12.393q0-1.286 0.839-2.196t2.036-0.911h22.446q1.196 0 2.036 0.911t0.839 2.196v12.393l0.375-0.268q0.696-0.482 1.071-0.018t-0.071 1.125z"></path>
            </symbol>
            <symbol id="icon-snapchat-ghost" viewBox="0 0 30 32">
                <path class="path1" d="M15.143 2.286q2.393-0.018 4.295 1.223t2.92 3.438q0.482 1.036 0.482 3.196 0 0.839-0.161 3.411 0.25 0.125 0.5 0.125 0.321 0 0.911-0.241t0.911-0.241q0.518 0 1 0.321t0.482 0.821q0 0.571-0.563 0.964t-1.232 0.563-1.232 0.518-0.563 0.848q0 0.268 0.214 0.768 0.661 1.464 1.83 2.679t2.58 1.804q0.5 0.214 1.429 0.411 0.5 0.107 0.5 0.625 0 1.25-3.911 1.839-0.125 0.196-0.196 0.696t-0.25 0.83-0.589 0.33q-0.357 0-1.107-0.116t-1.143-0.116q-0.661 0-1.107 0.089-0.571 0.089-1.125 0.402t-1.036 0.679-1.036 0.723-1.357 0.598-1.768 0.241q-0.929 0-1.723-0.241t-1.339-0.598-1.027-0.723-1.036-0.679-1.107-0.402q-0.464-0.089-1.125-0.089-0.429 0-1.17 0.134t-1.045 0.134q-0.446 0-0.625-0.33t-0.25-0.848-0.196-0.714q-3.911-0.589-3.911-1.839 0-0.518 0.5-0.625 0.929-0.196 1.429-0.411 1.393-0.571 2.58-1.804t1.83-2.679q0.214-0.5 0.214-0.768 0-0.5-0.563-0.848t-1.241-0.527-1.241-0.563-0.563-0.938q0-0.482 0.464-0.813t0.982-0.33q0.268 0 0.857 0.232t0.946 0.232q0.321 0 0.571-0.125-0.161-2.536-0.161-3.393 0-2.179 0.482-3.214 1.143-2.446 3.071-3.536t4.714-1.125z"></path>
            </symbol>
            <symbol id="icon-yelp" viewBox="0 0 27 32">
                <path class="path1" d="M13.804 23.554v2.268q-0.018 5.214-0.107 5.446-0.214 0.571-0.911 0.714-0.964 0.161-3.241-0.679t-2.902-1.589q-0.232-0.268-0.304-0.643-0.018-0.214 0.071-0.464 0.071-0.179 0.607-0.839t3.232-3.857q0.018 0 1.071-1.25 0.268-0.339 0.705-0.438t0.884 0.063q0.429 0.179 0.67 0.518t0.223 0.75zM11.143 19.071q-0.054 0.982-0.929 1.25l-2.143 0.696q-4.911 1.571-5.214 1.571-0.625-0.036-0.964-0.643-0.214-0.446-0.304-1.339-0.143-1.357 0.018-2.973t0.536-2.223 1-0.571q0.232 0 3.607 1.375 1.25 0.518 2.054 0.839l1.5 0.607q0.411 0.161 0.634 0.545t0.205 0.866zM25.893 24.375q-0.125 0.964-1.634 2.875t-2.42 2.268q-0.661 0.25-1.125-0.125-0.25-0.179-3.286-5.125l-0.839-1.375q-0.25-0.375-0.205-0.821t0.348-0.821q0.625-0.768 1.482-0.464 0.018 0.018 2.125 0.714 3.625 1.179 4.321 1.42t0.839 0.366q0.5 0.393 0.393 1.089zM13.893 13.089q0.089 1.821-0.964 2.179-1.036 0.304-2.036-1.268l-6.75-10.679q-0.143-0.625 0.339-1.107 0.732-0.768 3.705-1.598t4.009-0.563q0.714 0.179 0.875 0.804 0.054 0.321 0.393 5.455t0.429 6.777zM25.714 15.018q0.054 0.696-0.464 1.054-0.268 0.179-5.875 1.536-1.196 0.268-1.625 0.411l0.018-0.036q-0.411 0.107-0.821-0.071t-0.661-0.571q-0.536-0.839 0-1.554 0.018-0.018 1.339-1.821 2.232-3.054 2.679-3.643t0.607-0.696q0.5-0.339 1.161-0.036 0.857 0.411 2.196 2.384t1.446 2.991v0.054z"></path>
            </symbol>
            <symbol id="icon-vine" viewBox="0 0 27 32">
                <path class="path1" d="M26.732 14.768v3.536q-1.804 0.411-3.536 0.411-1.161 2.429-2.955 4.839t-3.241 3.848-2.286 1.902q-1.429 0.804-2.893-0.054-0.5-0.304-1.080-0.777t-1.518-1.491-1.83-2.295-1.92-3.286-1.884-4.357-1.634-5.616-1.259-6.964h5.054q0.464 3.893 1.25 7.116t1.866 5.661 2.17 4.205 2.5 3.482q3.018-3.018 5.125-7.25-2.536-1.286-3.982-3.929t-1.446-5.946q0-3.429 1.857-5.616t5.071-2.188q3.179 0 4.875 1.884t1.696 5.313q0 2.839-1.036 5.107-0.125 0.018-0.348 0.054t-0.821 0.036-1.125-0.107-1.107-0.455-0.902-0.92q0.554-1.839 0.554-3.286 0-1.554-0.518-2.357t-1.411-0.804q-0.946 0-1.518 0.884t-0.571 2.509q0 3.321 1.875 5.241t4.768 1.92q1.107 0 2.161-0.25z"></path>
            </symbol>
            <symbol id="icon-vk" viewBox="0 0 35 32">
                <path class="path1" d="M34.232 9.286q0.411 1.143-2.679 5.25-0.429 0.571-1.161 1.518-1.393 1.786-1.607 2.339-0.304 0.732 0.25 1.446 0.304 0.375 1.446 1.464h0.018l0.071 0.071q2.518 2.339 3.411 3.946 0.054 0.089 0.116 0.223t0.125 0.473-0.009 0.607-0.446 0.491-1.054 0.223l-4.571 0.071q-0.429 0.089-1-0.089t-0.929-0.393l-0.357-0.214q-0.536-0.375-1.25-1.143t-1.223-1.384-1.089-1.036-1.009-0.277q-0.054 0.018-0.143 0.063t-0.304 0.259-0.384 0.527-0.304 0.929-0.116 1.384q0 0.268-0.063 0.491t-0.134 0.33l-0.071 0.089q-0.321 0.339-0.946 0.393h-2.054q-1.268 0.071-2.607-0.295t-2.348-0.946-1.839-1.179-1.259-1.027l-0.446-0.429q-0.179-0.179-0.491-0.536t-1.277-1.625-1.893-2.696-2.188-3.768-2.33-4.857q-0.107-0.286-0.107-0.482t0.054-0.286l0.071-0.107q0.268-0.339 1.018-0.339l4.893-0.036q0.214 0.036 0.411 0.116t0.286 0.152l0.089 0.054q0.286 0.196 0.429 0.571 0.357 0.893 0.821 1.848t0.732 1.455l0.286 0.518q0.518 1.071 1 1.857t0.866 1.223 0.741 0.688 0.607 0.25 0.482-0.089q0.036-0.018 0.089-0.089t0.214-0.393 0.241-0.839 0.17-1.446 0-2.232q-0.036-0.714-0.161-1.304t-0.25-0.821l-0.107-0.214q-0.446-0.607-1.518-0.768-0.232-0.036 0.089-0.429 0.304-0.339 0.679-0.536 0.946-0.464 4.268-0.429 1.464 0.018 2.411 0.232 0.357 0.089 0.598 0.241t0.366 0.429 0.188 0.571 0.063 0.813-0.018 0.982-0.045 1.259-0.027 1.473q0 0.196-0.018 0.75t-0.009 0.857 0.063 0.723 0.205 0.696 0.402 0.438q0.143 0.036 0.304 0.071t0.464-0.196 0.679-0.616 0.929-1.196 1.214-1.92q1.071-1.857 1.911-4.018 0.071-0.179 0.179-0.313t0.196-0.188l0.071-0.054 0.089-0.045t0.232-0.054 0.357-0.009l5.143-0.036q0.696-0.089 1.143 0.045t0.554 0.295z"></path>
            </symbol>
            <symbol id="icon-search" viewBox="0 0 30 32">
                <path class="path1" d="M20.571 14.857q0-3.304-2.348-5.652t-5.652-2.348-5.652 2.348-2.348 5.652 2.348 5.652 5.652 2.348 5.652-2.348 2.348-5.652zM29.714 29.714q0 0.929-0.679 1.607t-1.607 0.679q-0.964 0-1.607-0.679l-6.125-6.107q-3.196 2.214-7.125 2.214-2.554 0-4.884-0.991t-4.018-2.679-2.679-4.018-0.991-4.884 0.991-4.884 2.679-4.018 4.018-2.679 4.884-0.991 4.884 0.991 4.018 2.679 2.679 4.018 0.991 4.884q0 3.929-2.214 7.125l6.125 6.125q0.661 0.661 0.661 1.607z"></path>
            </symbol>
            <symbol id="icon-envelope-o" viewBox="0 0 32 32">
                <path class="path1" d="M29.714 26.857v-13.714q-0.571 0.643-1.232 1.179-4.786 3.679-7.607 6.036-0.911 0.768-1.482 1.196t-1.545 0.866-1.83 0.438h-0.036q-0.857 0-1.83-0.438t-1.545-0.866-1.482-1.196q-2.821-2.357-7.607-6.036-0.661-0.536-1.232-1.179v13.714q0 0.232 0.17 0.402t0.402 0.17h26.286q0.232 0 0.402-0.17t0.17-0.402zM29.714 8.089v-0.438t-0.009-0.232-0.054-0.223-0.098-0.161-0.161-0.134-0.25-0.045h-26.286q-0.232 0-0.402 0.17t-0.17 0.402q0 3 2.625 5.071 3.446 2.714 7.161 5.661 0.107 0.089 0.625 0.527t0.821 0.67 0.795 0.563 0.902 0.491 0.768 0.161h0.036q0.357 0 0.768-0.161t0.902-0.491 0.795-0.563 0.821-0.67 0.625-0.527q3.714-2.946 7.161-5.661 0.964-0.768 1.795-2.063t0.83-2.348zM32 7.429v19.429q0 1.179-0.839 2.018t-2.018 0.839h-26.286q-1.179 0-2.018-0.839t-0.839-2.018v-19.429q0-1.179 0.839-2.018t2.018-0.839h26.286q1.179 0 2.018 0.839t0.839 2.018z"></path>
            </symbol>
            <symbol id="icon-close" viewBox="0 0 25 32">
                <path class="path1" d="M23.179 23.607q0 0.714-0.5 1.214l-2.429 2.429q-0.5 0.5-1.214 0.5t-1.214-0.5l-5.25-5.25-5.25 5.25q-0.5 0.5-1.214 0.5t-1.214-0.5l-2.429-2.429q-0.5-0.5-0.5-1.214t0.5-1.214l5.25-5.25-5.25-5.25q-0.5-0.5-0.5-1.214t0.5-1.214l2.429-2.429q0.5-0.5 1.214-0.5t1.214 0.5l5.25 5.25 5.25-5.25q0.5-0.5 1.214-0.5t1.214 0.5l2.429 2.429q0.5 0.5 0.5 1.214t-0.5 1.214l-5.25 5.25 5.25 5.25q0.5 0.5 0.5 1.214z"></path>
            </symbol>
            <symbol id="icon-angle-down" viewBox="0 0 21 32">
                <path class="path1" d="M19.196 13.143q0 0.232-0.179 0.411l-8.321 8.321q-0.179 0.179-0.411 0.179t-0.411-0.179l-8.321-8.321q-0.179-0.179-0.179-0.411t0.179-0.411l0.893-0.893q0.179-0.179 0.411-0.179t0.411 0.179l7.018 7.018 7.018-7.018q0.179-0.179 0.411-0.179t0.411 0.179l0.893 0.893q0.179 0.179 0.179 0.411z"></path>
            </symbol>
            <symbol id="icon-folder-open" viewBox="0 0 34 32">
                <path class="path1" d="M33.554 17q0 0.554-0.554 1.179l-6 7.071q-0.768 0.911-2.152 1.545t-2.563 0.634h-19.429q-0.607 0-1.080-0.232t-0.473-0.768q0-0.554 0.554-1.179l6-7.071q0.768-0.911 2.152-1.545t2.563-0.634h19.429q0.607 0 1.080 0.232t0.473 0.768zM27.429 10.857v2.857h-14.857q-1.679 0-3.518 0.848t-2.929 2.134l-6.107 7.179q0-0.071-0.009-0.223t-0.009-0.223v-17.143q0-1.643 1.179-2.821t2.821-1.179h5.714q1.643 0 2.821 1.179t1.179 2.821v0.571h9.714q1.643 0 2.821 1.179t1.179 2.821z"></path>
            </symbol>
            <symbol id="icon-twitter" viewBox="0 0 30 32">
                <path class="path1" d="M28.929 7.286q-1.196 1.75-2.893 2.982 0.018 0.25 0.018 0.75 0 2.321-0.679 4.634t-2.063 4.437-3.295 3.759-4.607 2.607-5.768 0.973q-4.839 0-8.857-2.589 0.625 0.071 1.393 0.071 4.018 0 7.161-2.464-1.875-0.036-3.357-1.152t-2.036-2.848q0.589 0.089 1.089 0.089 0.768 0 1.518-0.196-2-0.411-3.313-1.991t-1.313-3.67v-0.071q1.214 0.679 2.607 0.732-1.179-0.786-1.875-2.054t-0.696-2.75q0-1.571 0.786-2.911 2.161 2.661 5.259 4.259t6.634 1.777q-0.143-0.679-0.143-1.321 0-2.393 1.688-4.080t4.080-1.688q2.5 0 4.214 1.821 1.946-0.375 3.661-1.393-0.661 2.054-2.536 3.179 1.661-0.179 3.321-0.893z"></path>
            </symbol>
            <symbol id="icon-facebook" viewBox="0 0 19 32">
                <path class="path1" d="M17.125 0.214v4.714h-2.804q-1.536 0-2.071 0.643t-0.536 1.929v3.375h5.232l-0.696 5.286h-4.536v13.554h-5.464v-13.554h-4.554v-5.286h4.554v-3.893q0-3.321 1.857-5.152t4.946-1.83q2.625 0 4.071 0.214z"></path>
            </symbol>
            <symbol id="icon-github" viewBox="0 0 27 32">
                <path class="path1" d="M13.714 2.286q3.732 0 6.884 1.839t4.991 4.991 1.839 6.884q0 4.482-2.616 8.063t-6.759 4.955q-0.482 0.089-0.714-0.125t-0.232-0.536q0-0.054 0.009-1.366t0.009-2.402q0-1.732-0.929-2.536 1.018-0.107 1.83-0.321t1.679-0.696 1.446-1.188 0.946-1.875 0.366-2.688q0-2.125-1.411-3.679 0.661-1.625-0.143-3.643-0.5-0.161-1.446 0.196t-1.643 0.786l-0.679 0.429q-1.661-0.464-3.429-0.464t-3.429 0.464q-0.286-0.196-0.759-0.482t-1.491-0.688-1.518-0.241q-0.804 2.018-0.143 3.643-1.411 1.554-1.411 3.679 0 1.518 0.366 2.679t0.938 1.875 1.438 1.196 1.679 0.696 1.83 0.321q-0.696 0.643-0.875 1.839-0.375 0.179-0.804 0.268t-1.018 0.089-1.17-0.384-0.991-1.116q-0.339-0.571-0.866-0.929t-0.884-0.429l-0.357-0.054q-0.375 0-0.518 0.080t-0.089 0.205 0.161 0.25 0.232 0.214l0.125 0.089q0.393 0.179 0.777 0.679t0.563 0.911l0.179 0.411q0.232 0.679 0.786 1.098t1.196 0.536 1.241 0.125 0.991-0.063l0.411-0.071q0 0.679 0.009 1.58t0.009 0.973q0 0.321-0.232 0.536t-0.714 0.125q-4.143-1.375-6.759-4.955t-2.616-8.063q0-3.732 1.839-6.884t4.991-4.991 6.884-1.839zM5.196 21.982q0.054-0.125-0.125-0.214-0.179-0.054-0.232 0.036-0.054 0.125 0.125 0.214 0.161 0.107 0.232-0.036zM5.75 22.589q0.125-0.089-0.036-0.286-0.179-0.161-0.286-0.054-0.125 0.089 0.036 0.286 0.179 0.179 0.286 0.054zM6.286 23.393q0.161-0.125 0-0.339-0.143-0.232-0.304-0.107-0.161 0.089 0 0.321t0.304 0.125zM7.036 24.143q0.143-0.143-0.071-0.339-0.214-0.214-0.357-0.054-0.161 0.143 0.071 0.339 0.214 0.214 0.357 0.054zM8.054 24.589q0.054-0.196-0.232-0.286-0.268-0.071-0.339 0.125t0.232 0.268q0.268 0.107 0.339-0.107zM9.179 24.679q0-0.232-0.304-0.196-0.286 0-0.286 0.196 0 0.232 0.304 0.196 0.286 0 0.286-0.196zM10.214 24.5q-0.036-0.196-0.321-0.161-0.286 0.054-0.25 0.268t0.321 0.143 0.25-0.25z"></path>
            </symbol>
            <symbol id="icon-bars" viewBox="0 0 27 32">
                <path class="path1" d="M27.429 24v2.286q0 0.464-0.339 0.804t-0.804 0.339h-25.143q-0.464 0-0.804-0.339t-0.339-0.804v-2.286q0-0.464 0.339-0.804t0.804-0.339h25.143q0.464 0 0.804 0.339t0.339 0.804zM27.429 14.857v2.286q0 0.464-0.339 0.804t-0.804 0.339h-25.143q-0.464 0-0.804-0.339t-0.339-0.804v-2.286q0-0.464 0.339-0.804t0.804-0.339h25.143q0.464 0 0.804 0.339t0.339 0.804zM27.429 5.714v2.286q0 0.464-0.339 0.804t-0.804 0.339h-25.143q-0.464 0-0.804-0.339t-0.339-0.804v-2.286q0-0.464 0.339-0.804t0.804-0.339h25.143q0.464 0 0.804 0.339t0.339 0.804z"></path>
            </symbol>
            <symbol id="icon-google-plus" viewBox="0 0 41 32">
                <path class="path1" d="M25.661 16.304q0 3.714-1.554 6.616t-4.429 4.536-6.589 1.634q-2.661 0-5.089-1.036t-4.179-2.786-2.786-4.179-1.036-5.089 1.036-5.089 2.786-4.179 4.179-2.786 5.089-1.036q5.107 0 8.768 3.429l-3.554 3.411q-2.089-2.018-5.214-2.018-2.196 0-4.063 1.107t-2.955 3.009-1.089 4.152 1.089 4.152 2.955 3.009 4.063 1.107q1.482 0 2.723-0.411t2.045-1.027 1.402-1.402 0.875-1.482 0.384-1.321h-7.429v-4.5h12.357q0.214 1.125 0.214 2.179zM41.143 14.125v3.75h-3.732v3.732h-3.75v-3.732h-3.732v-3.75h3.732v-3.732h3.75v3.732h3.732z"></path>
            </symbol>
            <symbol id="icon-linkedin" viewBox="0 0 27 32">
                <path class="path1" d="M6.232 11.161v17.696h-5.893v-17.696h5.893zM6.607 5.696q0.018 1.304-0.902 2.179t-2.42 0.875h-0.036q-1.464 0-2.357-0.875t-0.893-2.179q0-1.321 0.92-2.188t2.402-0.866 2.375 0.866 0.911 2.188zM27.429 18.714v10.143h-5.875v-9.464q0-1.875-0.723-2.938t-2.259-1.063q-1.125 0-1.884 0.616t-1.134 1.527q-0.196 0.536-0.196 1.446v9.875h-5.875q0.036-7.125 0.036-11.554t-0.018-5.286l-0.018-0.857h5.875v2.571h-0.036q0.357-0.571 0.732-1t1.009-0.929 1.554-0.777 2.045-0.277q3.054 0 4.911 2.027t1.857 5.938z"></path>
            </symbol>
            <symbol id="icon-quote-right" viewBox="0 0 30 32">
                <path class="path1" d="M13.714 5.714v12.571q0 1.857-0.723 3.545t-1.955 2.92-2.92 1.955-3.545 0.723h-1.143q-0.464 0-0.804-0.339t-0.339-0.804v-2.286q0-0.464 0.339-0.804t0.804-0.339h1.143q1.893 0 3.232-1.339t1.339-3.232v-0.571q0-0.714-0.5-1.214t-1.214-0.5h-4q-1.429 0-2.429-1t-1-2.429v-6.857q0-1.429 1-2.429t2.429-1h6.857q1.429 0 2.429 1t1 2.429zM29.714 5.714v12.571q0 1.857-0.723 3.545t-1.955 2.92-2.92 1.955-3.545 0.723h-1.143q-0.464 0-0.804-0.339t-0.339-0.804v-2.286q0-0.464 0.339-0.804t0.804-0.339h1.143q1.893 0 3.232-1.339t1.339-3.232v-0.571q0-0.714-0.5-1.214t-1.214-0.5h-4q-1.429 0-2.429-1t-1-2.429v-6.857q0-1.429 1-2.429t2.429-1h6.857q1.429 0 2.429 1t1 2.429z"></path>
            </symbol>
            <symbol id="icon-mail-reply" viewBox="0 0 32 32">
                <path class="path1" d="M32 20q0 2.964-2.268 8.054-0.054 0.125-0.188 0.429t-0.241 0.536-0.232 0.393q-0.214 0.304-0.5 0.304-0.268 0-0.42-0.179t-0.152-0.446q0-0.161 0.045-0.473t0.045-0.42q0.089-1.214 0.089-2.196 0-1.804-0.313-3.232t-0.866-2.473-1.429-1.804-1.884-1.241-2.375-0.759-2.75-0.384-3.134-0.107h-4v4.571q0 0.464-0.339 0.804t-0.804 0.339-0.804-0.339l-9.143-9.143q-0.339-0.339-0.339-0.804t0.339-0.804l9.143-9.143q0.339-0.339 0.804-0.339t0.804 0.339 0.339 0.804v4.571h4q12.732 0 15.625 7.196 0.946 2.393 0.946 5.946z"></path>
            </symbol>
            <symbol id="icon-youtube" viewBox="0 0 27 32">
                <path class="path1" d="M17.339 22.214v3.768q0 1.196-0.696 1.196-0.411 0-0.804-0.393v-5.375q0.393-0.393 0.804-0.393 0.696 0 0.696 1.196zM23.375 22.232v0.821h-1.607v-0.821q0-1.214 0.804-1.214t0.804 1.214zM6.125 18.339h1.911v-1.679h-5.571v1.679h1.875v10.161h1.786v-10.161zM11.268 28.5h1.589v-8.821h-1.589v6.75q-0.536 0.75-1.018 0.75-0.321 0-0.375-0.375-0.018-0.054-0.018-0.625v-6.5h-1.589v6.982q0 0.875 0.143 1.304 0.214 0.661 1.036 0.661 0.857 0 1.821-1.089v0.964zM18.929 25.857v-3.518q0-1.304-0.161-1.768-0.304-1-1.268-1-0.893 0-1.661 0.964v-3.875h-1.589v11.839h1.589v-0.857q0.804 0.982 1.661 0.982 0.964 0 1.268-0.982 0.161-0.482 0.161-1.786zM24.964 25.679v-0.232h-1.625q0 0.911-0.036 1.089-0.125 0.643-0.714 0.643-0.821 0-0.821-1.232v-1.554h3.196v-1.839q0-1.411-0.482-2.071-0.696-0.911-1.893-0.911-1.214 0-1.911 0.911-0.5 0.661-0.5 2.071v3.089q0 1.411 0.518 2.071 0.696 0.911 1.929 0.911 1.286 0 1.929-0.946 0.321-0.482 0.375-0.964 0.036-0.161 0.036-1.036zM14.107 9.375v-3.75q0-1.232-0.768-1.232t-0.768 1.232v3.75q0 1.25 0.768 1.25t0.768-1.25zM26.946 22.786q0 4.179-0.464 6.25-0.25 1.054-1.036 1.768t-1.821 0.821q-3.286 0.375-9.911 0.375t-9.911-0.375q-1.036-0.107-1.83-0.821t-1.027-1.768q-0.464-2-0.464-6.25 0-4.179 0.464-6.25 0.25-1.054 1.036-1.768t1.839-0.839q3.268-0.357 9.893-0.357t9.911 0.357q1.036 0.125 1.83 0.839t1.027 1.768q0.464 2 0.464 6.25zM9.125 0h1.821l-2.161 7.125v4.839h-1.786v-4.839q-0.25-1.321-1.089-3.786-0.661-1.839-1.161-3.339h1.893l1.268 4.696zM15.732 5.946v3.125q0 1.446-0.5 2.107-0.661 0.911-1.893 0.911-1.196 0-1.875-0.911-0.5-0.679-0.5-2.107v-3.125q0-1.429 0.5-2.089 0.679-0.911 1.875-0.911 1.232 0 1.893 0.911 0.5 0.661 0.5 2.089zM21.714 3.054v8.911h-1.625v-0.982q-0.946 1.107-1.839 1.107-0.821 0-1.054-0.661-0.143-0.429-0.143-1.339v-7.036h1.625v6.554q0 0.589 0.018 0.625 0.054 0.393 0.375 0.393 0.482 0 1.018-0.768v-6.804h1.625z"></path>
            </symbol>
            <symbol id="icon-dropbox" viewBox="0 0 32 32">
                <path class="path1" d="M7.179 12.625l8.821 5.446-6.107 5.089-8.75-5.696zM24.786 22.536v1.929l-8.75 5.232v0.018l-0.018-0.018-0.018 0.018v-0.018l-8.732-5.232v-1.929l2.625 1.714 6.107-5.071v-0.036l0.018 0.018 0.018-0.018v0.036l6.125 5.071zM9.893 2.107l6.107 5.089-8.821 5.429-6.036-4.821zM24.821 12.625l6.036 4.839-8.732 5.696-6.125-5.089zM22.125 2.107l8.732 5.696-6.036 4.821-8.821-5.429z"></path>
            </symbol>
            <symbol id="icon-instagram" viewBox="0 0 27 32">
                <path class="path1" d="M18.286 16q0-1.893-1.339-3.232t-3.232-1.339-3.232 1.339-1.339 3.232 1.339 3.232 3.232 1.339 3.232-1.339 1.339-3.232zM20.75 16q0 2.929-2.054 4.982t-4.982 2.054-4.982-2.054-2.054-4.982 2.054-4.982 4.982-2.054 4.982 2.054 2.054 4.982zM22.679 8.679q0 0.679-0.482 1.161t-1.161 0.482-1.161-0.482-0.482-1.161 0.482-1.161 1.161-0.482 1.161 0.482 0.482 1.161zM13.714 4.75q-0.125 0-1.366-0.009t-1.884 0-1.723 0.054-1.839 0.179-1.277 0.33q-0.893 0.357-1.571 1.036t-1.036 1.571q-0.196 0.518-0.33 1.277t-0.179 1.839-0.054 1.723 0 1.884 0.009 1.366-0.009 1.366 0 1.884 0.054 1.723 0.179 1.839 0.33 1.277q0.357 0.893 1.036 1.571t1.571 1.036q0.518 0.196 1.277 0.33t1.839 0.179 1.723 0.054 1.884 0 1.366-0.009 1.366 0.009 1.884 0 1.723-0.054 1.839-0.179 1.277-0.33q0.893-0.357 1.571-1.036t1.036-1.571q0.196-0.518 0.33-1.277t0.179-1.839 0.054-1.723 0-1.884-0.009-1.366 0.009-1.366 0-1.884-0.054-1.723-0.179-1.839-0.33-1.277q-0.357-0.893-1.036-1.571t-1.571-1.036q-0.518-0.196-1.277-0.33t-1.839-0.179-1.723-0.054-1.884 0-1.366 0.009zM27.429 16q0 4.089-0.089 5.661-0.179 3.714-2.214 5.75t-5.75 2.214q-1.571 0.089-5.661 0.089t-5.661-0.089q-3.714-0.179-5.75-2.214t-2.214-5.75q-0.089-1.571-0.089-5.661t0.089-5.661q0.179-3.714 2.214-5.75t5.75-2.214q1.571-0.089 5.661-0.089t5.661 0.089q3.714 0.179 5.75 2.214t2.214 5.75q0.089 1.571 0.089 5.661z"></path>
            </symbol>
            <symbol id="icon-flickr" viewBox="0 0 27 32">
                <path class="path1" d="M22.286 2.286q2.125 0 3.634 1.509t1.509 3.634v17.143q0 2.125-1.509 3.634t-3.634 1.509h-17.143q-2.125 0-3.634-1.509t-1.509-3.634v-17.143q0-2.125 1.509-3.634t3.634-1.509h17.143zM12.464 16q0-1.571-1.107-2.679t-2.679-1.107-2.679 1.107-1.107 2.679 1.107 2.679 2.679 1.107 2.679-1.107 1.107-2.679zM22.536 16q0-1.571-1.107-2.679t-2.679-1.107-2.679 1.107-1.107 2.679 1.107 2.679 2.679 1.107 2.679-1.107 1.107-2.679z"></path>
            </symbol>
            <symbol id="icon-tumblr" viewBox="0 0 19 32">
                <path class="path1" d="M16.857 23.732l1.429 4.232q-0.411 0.625-1.982 1.179t-3.161 0.571q-1.857 0.036-3.402-0.464t-2.545-1.321-1.696-1.893-0.991-2.143-0.295-2.107v-9.714h-3v-3.839q1.286-0.464 2.304-1.241t1.625-1.607 1.036-1.821 0.607-1.768 0.268-1.58q0.018-0.089 0.080-0.152t0.134-0.063h4.357v7.571h5.946v4.5h-5.964v9.25q0 0.536 0.116 1t0.402 0.938 0.884 0.741 1.455 0.25q1.393-0.036 2.393-0.518z"></path>
            </symbol>
            <symbol id="icon-dockerhub" viewBox="0 0 24 28">
                <path class="path1" d="M1.597 10.257h2.911v2.83H1.597v-2.83zm3.573 0h2.91v2.83H5.17v-2.83zm0-3.627h2.91v2.829H5.17V6.63zm3.57 3.627h2.912v2.83H8.74v-2.83zm0-3.627h2.912v2.829H8.74V6.63zm3.573 3.627h2.911v2.83h-2.911v-2.83zm0-3.627h2.911v2.829h-2.911V6.63zm3.572 3.627h2.911v2.83h-2.911v-2.83zM12.313 3h2.911v2.83h-2.911V3zm-6.65 14.173c-.449 0-.812.354-.812.788 0 .435.364.788.812.788.447 0 .811-.353.811-.788 0-.434-.363-.788-.811-.788"></path>
                <path class="path2" d="M28.172 11.721c-.978-.549-2.278-.624-3.388-.306-.136-1.146-.91-2.149-1.83-2.869l-.366-.286-.307.345c-.618.692-.8 1.845-.718 2.73.063.651.273 1.312.685 1.834-.313.183-.668.328-.985.434-.646.212-1.347.33-2.028.33H.083l-.042.429c-.137 1.432.065 2.866.674 4.173l.262.519.03.048c1.8 2.973 4.963 4.225 8.41 4.225 6.672 0 12.174-2.896 14.702-9.015 1.689.085 3.417-.4 4.243-1.968l.211-.4-.401-.223zM5.664 19.458c-.85 0-1.542-.671-1.542-1.497 0-.825.691-1.498 1.541-1.498.849 0 1.54.672 1.54 1.497s-.69 1.498-1.539 1.498z"></path>
            </symbol>
            <symbol id="icon-dribbble" viewBox="0 0 27 32">
                <path class="path1" d="M18.286 26.786q-0.75-4.304-2.5-8.893h-0.036l-0.036 0.018q-0.286 0.107-0.768 0.295t-1.804 0.875-2.446 1.464-2.339 2.045-1.839 2.643l-0.268-0.196q3.286 2.679 7.464 2.679 2.357 0 4.571-0.929zM14.982 15.946q-0.375-0.875-0.946-1.982-5.554 1.661-12.018 1.661-0.018 0.125-0.018 0.375 0 2.214 0.786 4.223t2.214 3.598q0.893-1.589 2.205-2.973t2.545-2.223 2.33-1.446 1.777-0.857l0.661-0.232q0.071-0.018 0.232-0.063t0.232-0.080zM13.071 12.161q-2.143-3.804-4.357-6.75-2.464 1.161-4.179 3.321t-2.286 4.857q5.393 0 10.821-1.429zM25.286 17.857q-3.75-1.071-7.304-0.518 1.554 4.268 2.286 8.375 1.982-1.339 3.304-3.384t1.714-4.473zM10.911 4.625q-0.018 0-0.036 0.018 0.018-0.018 0.036-0.018zM21.446 7.214q-3.304-2.929-7.732-2.929-1.357 0-2.768 0.339 2.339 3.036 4.393 6.821 1.232-0.464 2.321-1.080t1.723-1.098 1.17-1.018 0.67-0.723zM25.429 15.875q-0.054-4.143-2.661-7.321l-0.018 0.018q-0.161 0.214-0.339 0.438t-0.777 0.795-1.268 1.080-1.786 1.161-2.348 1.152q0.446 0.946 0.786 1.696 0.036 0.107 0.116 0.313t0.134 0.295q0.643-0.089 1.33-0.125t1.313-0.036 1.232 0.027 1.143 0.071 1.009 0.098 0.857 0.116 0.652 0.107 0.446 0.080zM27.429 16q0 3.732-1.839 6.884t-4.991 4.991-6.884 1.839-6.884-1.839-4.991-4.991-1.839-6.884 1.839-6.884 4.991-4.991 6.884-1.839 6.884 1.839 4.991 4.991 1.839 6.884z"></path>
            </symbol>
            <symbol id="icon-skype" viewBox="0 0 27 32">
                <path class="path1" d="M20.946 18.982q0-0.893-0.348-1.634t-0.866-1.223-1.304-0.875-1.473-0.607-1.563-0.411l-1.857-0.429q-0.536-0.125-0.786-0.188t-0.625-0.205-0.536-0.286-0.295-0.375-0.134-0.536q0-1.375 2.571-1.375 0.768 0 1.375 0.214t0.964 0.509 0.679 0.598 0.714 0.518 0.857 0.214q0.839 0 1.348-0.571t0.509-1.375q0-0.982-1-1.777t-2.536-1.205-3.25-0.411q-1.214 0-2.357 0.277t-2.134 0.839-1.589 1.554-0.598 2.295q0 1.089 0.339 1.902t1 1.348 1.429 0.866 1.839 0.58l2.607 0.643q1.607 0.393 2 0.643 0.571 0.357 0.571 1.071 0 0.696-0.714 1.152t-1.875 0.455q-0.911 0-1.634-0.286t-1.161-0.688-0.813-0.804-0.821-0.688-0.964-0.286q-0.893 0-1.348 0.536t-0.455 1.339q0 1.643 2.179 2.813t5.196 1.17q1.304 0 2.5-0.33t2.188-0.955 1.58-1.67 0.589-2.348zM27.429 22.857q0 2.839-2.009 4.848t-4.848 2.009q-2.321 0-4.179-1.429-1.375 0.286-2.679 0.286-2.554 0-4.884-0.991t-4.018-2.679-2.679-4.018-0.991-4.884q0-1.304 0.286-2.679-1.429-1.857-1.429-4.179 0-2.839 2.009-4.848t4.848-2.009q2.321 0 4.179 1.429 1.375-0.286 2.679-0.286 2.554 0 4.884 0.991t4.018 2.679 2.679 4.018 0.991 4.884q0 1.304-0.286 2.679 1.429 1.857 1.429 4.179z"></path>
            </symbol>
            <symbol id="icon-foursquare" viewBox="0 0 23 32">
                <path class="path1" d="M17.857 7.75l0.661-3.464q0.089-0.411-0.161-0.714t-0.625-0.304h-12.714q-0.411 0-0.688 0.304t-0.277 0.661v19.661q0 0.125 0.107 0.018l5.196-6.286q0.411-0.464 0.679-0.598t0.857-0.134h4.268q0.393 0 0.661-0.259t0.321-0.527q0.429-2.321 0.661-3.411 0.071-0.375-0.205-0.714t-0.652-0.339h-5.25q-0.518 0-0.857-0.339t-0.339-0.857v-0.75q0-0.518 0.339-0.848t0.857-0.33h6.179q0.321 0 0.625-0.241t0.357-0.527zM21.911 3.786q-0.268 1.304-0.955 4.759t-1.241 6.25-0.625 3.098q-0.107 0.393-0.161 0.58t-0.25 0.58-0.438 0.589-0.688 0.375-1.036 0.179h-4.839q-0.232 0-0.393 0.179-0.143 0.161-7.607 8.821-0.393 0.446-1.045 0.509t-0.866-0.098q-0.982-0.393-0.982-1.75v-25.179q0-0.982 0.679-1.83t2.143-0.848h15.857q1.696 0 2.268 0.946t0.179 2.839zM21.911 3.786l-2.821 14.107q0.071-0.304 0.625-3.098t1.241-6.25 0.955-4.759z"></path>
            </symbol>
            <symbol id="icon-wordpress" viewBox="0 0 32 32">
                <path class="path1" d="M2.268 16q0-2.911 1.196-5.589l6.554 17.946q-3.5-1.696-5.625-5.018t-2.125-7.339zM25.268 15.304q0 0.339-0.045 0.688t-0.179 0.884-0.205 0.786-0.313 1.054-0.313 1.036l-1.357 4.571-4.964-14.75q0.821-0.054 1.571-0.143 0.339-0.036 0.464-0.33t-0.045-0.554-0.509-0.241l-3.661 0.179q-1.339-0.018-3.607-0.179-0.214-0.018-0.366 0.089t-0.205 0.268-0.027 0.33 0.161 0.295 0.348 0.143l1.429 0.143 2.143 5.857-3 9-5-14.857q0.821-0.054 1.571-0.143 0.339-0.036 0.464-0.33t-0.045-0.554-0.509-0.241l-3.661 0.179q-0.125 0-0.411-0.009t-0.464-0.009q1.875-2.857 4.902-4.527t6.563-1.67q2.625 0 5.009 0.946t4.259 2.661h-0.179q-0.982 0-1.643 0.723t-0.661 1.705q0 0.214 0.036 0.429t0.071 0.384 0.143 0.411 0.161 0.375 0.214 0.402 0.223 0.375 0.259 0.429 0.25 0.411q1.125 1.911 1.125 3.786zM16.232 17.196l4.232 11.554q0.018 0.107 0.089 0.196-2.25 0.786-4.554 0.786-2 0-3.875-0.571zM28.036 9.411q1.696 3.107 1.696 6.589 0 3.732-1.857 6.884t-4.982 4.973l4.196-12.107q1.054-3.018 1.054-4.929 0-0.75-0.107-1.411zM16 0q3.25 0 6.214 1.268t5.107 3.411 3.411 5.107 1.268 6.214-1.268 6.214-3.411 5.107-5.107 3.411-6.214 1.268-6.214-1.268-5.107-3.411-3.411-5.107-1.268-6.214 1.268-6.214 3.411-5.107 5.107-3.411 6.214-1.268zM16 31.268q3.089 0 5.92-1.214t4.875-3.259 3.259-4.875 1.214-5.92-1.214-5.92-3.259-4.875-4.875-3.259-5.92-1.214-5.92 1.214-4.875 3.259-3.259 4.875-1.214 5.92 1.214 5.92 3.259 4.875 4.875 3.259 5.92 1.214z"></path>
            </symbol>
            <symbol id="icon-stumbleupon" viewBox="0 0 34 32">
                <path class="path1" d="M18.964 12.714v-2.107q0-0.75-0.536-1.286t-1.286-0.536-1.286 0.536-0.536 1.286v10.929q0 3.125-2.25 5.339t-5.411 2.214q-3.179 0-5.42-2.241t-2.241-5.42v-4.75h5.857v4.679q0 0.768 0.536 1.295t1.286 0.527 1.286-0.527 0.536-1.295v-11.071q0-3.054 2.259-5.214t5.384-2.161q3.143 0 5.393 2.179t2.25 5.25v2.429l-3.482 1.036zM28.429 16.679h5.857v4.75q0 3.179-2.241 5.42t-5.42 2.241q-3.161 0-5.411-2.223t-2.25-5.366v-4.786l2.339 1.089 3.482-1.036v4.821q0 0.75 0.536 1.277t1.286 0.527 1.286-0.527 0.536-1.277v-4.911z"></path>
            </symbol>
            <symbol id="icon-digg" viewBox="0 0 37 32">
                <path class="path1" d="M5.857 5.036h3.643v17.554h-9.5v-12.446h5.857v-5.107zM5.857 19.661v-6.589h-2.196v6.589h2.196zM10.964 10.143v12.446h3.661v-12.446h-3.661zM10.964 5.036v3.643h3.661v-3.643h-3.661zM16.089 10.143h9.518v16.821h-9.518v-2.911h5.857v-1.464h-5.857v-12.446zM21.946 19.661v-6.589h-2.196v6.589h2.196zM27.071 10.143h9.5v16.821h-9.5v-2.911h5.839v-1.464h-5.839v-12.446zM32.911 19.661v-6.589h-2.196v6.589h2.196z"></path>
            </symbol>
            <symbol id="icon-spotify" viewBox="0 0 27 32">
                <path class="path1" d="M20.125 21.607q0-0.571-0.536-0.911-3.446-2.054-7.982-2.054-2.375 0-5.125 0.607-0.75 0.161-0.75 0.929 0 0.357 0.241 0.616t0.634 0.259q0.089 0 0.661-0.143 2.357-0.482 4.339-0.482 4.036 0 7.089 1.839 0.339 0.196 0.589 0.196 0.339 0 0.589-0.241t0.25-0.616zM21.839 17.768q0-0.714-0.625-1.089-4.232-2.518-9.786-2.518-2.732 0-5.411 0.75-0.857 0.232-0.857 1.143 0 0.446 0.313 0.759t0.759 0.313q0.125 0 0.661-0.143 2.179-0.589 4.482-0.589 4.982 0 8.714 2.214 0.429 0.232 0.679 0.232 0.446 0 0.759-0.313t0.313-0.759zM23.768 13.339q0-0.839-0.714-1.25-2.25-1.304-5.232-1.973t-6.125-0.67q-3.643 0-6.5 0.839-0.411 0.125-0.688 0.455t-0.277 0.866q0 0.554 0.366 0.929t0.92 0.375q0.196 0 0.714-0.143 2.375-0.661 5.482-0.661 2.839 0 5.527 0.607t4.527 1.696q0.375 0.214 0.714 0.214 0.518 0 0.902-0.366t0.384-0.92zM27.429 16q0 3.732-1.839 6.884t-4.991 4.991-6.884 1.839-6.884-1.839-4.991-4.991-1.839-6.884 1.839-6.884 4.991-4.991 6.884-1.839 6.884 1.839 4.991 4.991 1.839 6.884z"></path>
            </symbol>
            <symbol id="icon-soundcloud" viewBox="0 0 41 32">
                <path class="path1" d="M14 24.5l0.286-4.304-0.286-9.339q-0.018-0.179-0.134-0.304t-0.295-0.125q-0.161 0-0.286 0.125t-0.125 0.304l-0.25 9.339 0.25 4.304q0.018 0.179 0.134 0.295t0.277 0.116q0.393 0 0.429-0.411zM19.286 23.982l0.196-3.768-0.214-10.464q0-0.286-0.232-0.429-0.143-0.089-0.286-0.089t-0.286 0.089q-0.232 0.143-0.232 0.429l-0.018 0.107-0.179 10.339q0 0.018 0.196 4.214v0.018q0 0.179 0.107 0.304 0.161 0.196 0.411 0.196 0.196 0 0.357-0.161 0.161-0.125 0.161-0.357zM0.625 17.911l0.357 2.286-0.357 2.25q-0.036 0.161-0.161 0.161t-0.161-0.161l-0.304-2.25 0.304-2.286q0.036-0.161 0.161-0.161t0.161 0.161zM2.161 16.5l0.464 3.696-0.464 3.625q-0.036 0.161-0.179 0.161-0.161 0-0.161-0.179l-0.411-3.607 0.411-3.696q0-0.161 0.161-0.161 0.143 0 0.179 0.161zM3.804 15.821l0.446 4.375-0.446 4.232q0 0.196-0.196 0.196-0.179 0-0.214-0.196l-0.375-4.232 0.375-4.375q0.036-0.214 0.214-0.214 0.196 0 0.196 0.214zM5.482 15.696l0.411 4.5-0.411 4.357q-0.036 0.232-0.25 0.232-0.232 0-0.232-0.232l-0.375-4.357 0.375-4.5q0-0.232 0.232-0.232 0.214 0 0.25 0.232zM7.161 16.018l0.375 4.179-0.375 4.393q-0.036 0.286-0.286 0.286-0.107 0-0.188-0.080t-0.080-0.205l-0.357-4.393 0.357-4.179q0-0.107 0.080-0.188t0.188-0.080q0.25 0 0.286 0.268zM8.839 13.411l0.375 6.786-0.375 4.393q0 0.125-0.089 0.223t-0.214 0.098q-0.286 0-0.321-0.321l-0.321-4.393 0.321-6.786q0.036-0.321 0.321-0.321 0.125 0 0.214 0.098t0.089 0.223zM10.518 11.875l0.339 8.357-0.339 4.357q0 0.143-0.098 0.241t-0.241 0.098q-0.321 0-0.357-0.339l-0.286-4.357 0.286-8.357q0.036-0.339 0.357-0.339 0.143 0 0.241 0.098t0.098 0.241zM12.268 11.161l0.321 9.036-0.321 4.321q-0.036 0.375-0.393 0.375-0.339 0-0.375-0.375l-0.286-4.321 0.286-9.036q0-0.161 0.116-0.277t0.259-0.116q0.161 0 0.268 0.116t0.125 0.277zM19.268 24.411v0 0zM15.732 11.089l0.268 9.107-0.268 4.268q0 0.179-0.134 0.313t-0.313 0.134-0.304-0.125-0.143-0.321l-0.25-4.268 0.25-9.107q0-0.196 0.134-0.321t0.313-0.125 0.313 0.125 0.134 0.321zM17.5 11.429l0.25 8.786-0.25 4.214q0 0.196-0.143 0.339t-0.339 0.143-0.339-0.143-0.161-0.339l-0.214-4.214 0.214-8.786q0.018-0.214 0.161-0.357t0.339-0.143 0.33 0.143 0.152 0.357zM21.286 20.214l-0.25 4.125q0 0.232-0.161 0.393t-0.393 0.161-0.393-0.161-0.179-0.393l-0.107-2.036-0.107-2.089 0.214-11.357v-0.054q0.036-0.268 0.214-0.429 0.161-0.125 0.357-0.125 0.143 0 0.268 0.089 0.25 0.143 0.286 0.464zM41.143 19.875q0 2.089-1.482 3.563t-3.571 1.473h-14.036q-0.232-0.036-0.393-0.196t-0.161-0.393v-16.054q0-0.411 0.5-0.589 1.518-0.607 3.232-0.607 3.482 0 6.036 2.348t2.857 5.777q0.946-0.393 1.964-0.393 2.089 0 3.571 1.482t1.482 3.589z"></path>
            </symbol>
            <symbol id="icon-codepen" viewBox="0 0 32 32">
                <path class="path1" d="M3.857 20.875l10.768 7.179v-6.411l-5.964-3.982zM2.75 18.304l3.446-2.304-3.446-2.304v4.607zM17.375 28.054l10.768-7.179-4.804-3.214-5.964 3.982v6.411zM16 19.25l4.857-3.25-4.857-3.25-4.857 3.25zM8.661 14.339l5.964-3.982v-6.411l-10.768 7.179zM25.804 16l3.446 2.304v-4.607zM23.339 14.339l4.804-3.214-10.768-7.179v6.411zM32 11.125v9.75q0 0.732-0.607 1.143l-14.625 9.75q-0.375 0.232-0.768 0.232t-0.768-0.232l-14.625-9.75q-0.607-0.411-0.607-1.143v-9.75q0-0.732 0.607-1.143l14.625-9.75q0.375-0.232 0.768-0.232t0.768 0.232l14.625 9.75q0.607 0.411 0.607 1.143z"></path>
            </symbol>
            <symbol id="icon-twitch" viewBox="0 0 32 32">
                <path class="path1" d="M16 7.75v7.75h-2.589v-7.75h2.589zM23.107 7.75v7.75h-2.589v-7.75h2.589zM23.107 21.321l4.518-4.536v-14.196h-21.321v18.732h5.821v3.875l3.875-3.875h7.107zM30.214 0v18.089l-7.75 7.75h-5.821l-3.875 3.875h-3.875v-3.875h-7.107v-20.679l1.946-5.161h26.482z"></path>
            </symbol>
            <symbol id="icon-meanpath" viewBox="0 0 27 32">
                <path class="path1" d="M23.411 15.036v2.036q0 0.429-0.241 0.679t-0.67 0.25h-3.607q-0.429 0-0.679-0.25t-0.25-0.679v-2.036q0-0.429 0.25-0.679t0.679-0.25h3.607q0.429 0 0.67 0.25t0.241 0.679zM14.661 19.143v-4.464q0-0.946-0.58-1.527t-1.527-0.58h-2.375q-1.214 0-1.714 0.929-0.5-0.929-1.714-0.929h-2.321q-0.946 0-1.527 0.58t-0.58 1.527v4.464q0 0.393 0.375 0.393h0.982q0.393 0 0.393-0.393v-4.107q0-0.429 0.241-0.679t0.688-0.25h1.679q0.429 0 0.679 0.25t0.25 0.679v4.107q0 0.393 0.375 0.393h0.964q0.393 0 0.393-0.393v-4.107q0-0.429 0.25-0.679t0.679-0.25h1.732q0.429 0 0.67 0.25t0.241 0.679v4.107q0 0.393 0.393 0.393h0.982q0.375 0 0.375-0.393zM25.179 17.429v-2.75q0-0.946-0.589-1.527t-1.536-0.58h-4.714q-0.946 0-1.536 0.58t-0.589 1.527v7.321q0 0.375 0.393 0.375h0.982q0.375 0 0.375-0.375v-3.214q0.554 0.75 1.679 0.75h3.411q0.946 0 1.536-0.58t0.589-1.527zM27.429 6.429v19.143q0 1.714-1.214 2.929t-2.929 1.214h-19.143q-1.714 0-2.929-1.214t-1.214-2.929v-19.143q0-1.714 1.214-2.929t2.929-1.214h19.143q1.714 0 2.929 1.214t1.214 2.929z"></path>
            </symbol>
            <symbol id="icon-pinterest-p" viewBox="0 0 23 32">
                <path class="path1" d="M0 10.661q0-1.929 0.67-3.634t1.848-2.973 2.714-2.196 3.304-1.393 3.607-0.464q2.821 0 5.25 1.188t3.946 3.455 1.518 5.125q0 1.714-0.339 3.357t-1.071 3.161-1.786 2.67-2.589 1.839-3.375 0.688q-1.214 0-2.411-0.571t-1.714-1.571q-0.179 0.696-0.5 2.009t-0.42 1.696-0.366 1.268-0.464 1.268-0.571 1.116-0.821 1.384-1.107 1.545l-0.25 0.089-0.161-0.179q-0.268-2.804-0.268-3.357 0-1.643 0.384-3.688t1.188-5.134 0.929-3.625q-0.571-1.161-0.571-3.018 0-1.482 0.929-2.786t2.357-1.304q1.089 0 1.696 0.723t0.607 1.83q0 1.179-0.786 3.411t-0.786 3.339q0 1.125 0.804 1.866t1.946 0.741q0.982 0 1.821-0.446t1.402-1.214 1-1.696 0.679-1.973 0.357-1.982 0.116-1.777q0-3.089-1.955-4.813t-5.098-1.723q-3.571 0-5.964 2.313t-2.393 5.866q0 0.786 0.223 1.518t0.482 1.161 0.482 0.813 0.223 0.545q0 0.5-0.268 1.304t-0.661 0.804q-0.036 0-0.304-0.054-0.911-0.268-1.616-1t-1.089-1.688-0.58-1.929-0.196-1.902z"></path>
            </symbol>
            <symbol id="icon-periscope" viewBox="0 0 24 28">
                <path class="path1" d="M12.285,1C6.696,1,2.277,5.643,2.277,11.243c0,5.851,7.77,14.578,10.007,14.578c1.959,0,9.729-8.728,9.729-14.578 C22.015,5.643,17.596,1,12.285,1z M12.317,16.551c-3.473,0-6.152-2.611-6.152-5.664c0-1.292,0.39-2.472,1.065-3.438 c0.206,1.084,1.18,1.906,2.352,1.906c1.322,0,2.393-1.043,2.393-2.333c0-0.832-0.447-1.561-1.119-1.975 c0.467-0.105,0.955-0.161,1.46-0.161c3.133,0,5.81,2.611,5.81,5.998C18.126,13.94,15.449,16.551,12.317,16.551z"></path>
            </symbol>
            <symbol id="icon-get-pocket" viewBox="0 0 31 32">
                <path class="path1" d="M27.946 2.286q1.161 0 1.964 0.813t0.804 1.973v9.268q0 3.143-1.214 6t-3.259 4.911-4.893 3.259-5.973 1.205q-3.143 0-5.991-1.205t-4.902-3.259-3.268-4.911-1.214-6v-9.268q0-1.143 0.821-1.964t1.964-0.821h25.161zM15.375 21.286q0.839 0 1.464-0.589l7.214-6.929q0.661-0.625 0.661-1.518 0-0.875-0.616-1.491t-1.491-0.616q-0.839 0-1.464 0.589l-5.768 5.536-5.768-5.536q-0.625-0.589-1.446-0.589-0.875 0-1.491 0.616t-0.616 1.491q0 0.911 0.643 1.518l7.232 6.929q0.589 0.589 1.446 0.589z"></path>
            </symbol>
            <symbol id="icon-vimeo" viewBox="0 0 32 32">
                <path class="path1" d="M30.518 9.25q-0.179 4.214-5.929 11.625-5.946 7.696-10.036 7.696-2.536 0-4.286-4.696-0.786-2.857-2.357-8.607-1.286-4.679-2.804-4.679-0.321 0-2.268 1.357l-1.375-1.75q0.429-0.375 1.929-1.723t2.321-2.063q2.786-2.464 4.304-2.607 1.696-0.161 2.732 0.991t1.446 3.634q0.786 5.125 1.179 6.661 0.982 4.446 2.143 4.446 0.911 0 2.75-2.875 1.804-2.875 1.946-4.393 0.232-2.482-1.946-2.482-1.018 0-2.161 0.464 2.143-7.018 8.196-6.821 4.482 0.143 4.214 5.821z"></path>
            </symbol>
            <symbol id="icon-reddit-alien" viewBox="0 0 32 32">
                <path class="path1" d="M32 15.107q0 1.036-0.527 1.884t-1.42 1.295q0.214 0.821 0.214 1.714 0 2.768-1.902 5.125t-5.188 3.723-7.143 1.366-7.134-1.366-5.179-3.723-1.902-5.125q0-0.839 0.196-1.679-0.911-0.446-1.464-1.313t-0.554-1.902q0-1.464 1.036-2.509t2.518-1.045q1.518 0 2.589 1.125 3.893-2.714 9.196-2.893l2.071-9.304q0.054-0.232 0.268-0.375t0.464-0.089l6.589 1.446q0.321-0.661 0.964-1.063t1.411-0.402q1.107 0 1.893 0.777t0.786 1.884-0.786 1.893-1.893 0.786-1.884-0.777-0.777-1.884l-5.964-1.321-1.857 8.429q5.357 0.161 9.268 2.857 1.036-1.089 2.554-1.089 1.482 0 2.518 1.045t1.036 2.509zM7.464 18.661q0 1.107 0.777 1.893t1.884 0.786 1.893-0.786 0.786-1.893-0.786-1.884-1.893-0.777q-1.089 0-1.875 0.786t-0.786 1.875zM21.929 25q0.196-0.196 0.196-0.464t-0.196-0.464q-0.179-0.179-0.446-0.179t-0.464 0.179q-0.732 0.75-2.161 1.107t-2.857 0.357-2.857-0.357-2.161-1.107q-0.196-0.179-0.464-0.179t-0.446 0.179q-0.196 0.179-0.196 0.455t0.196 0.473q0.768 0.768 2.116 1.214t2.188 0.527 1.625 0.080 1.625-0.080 2.188-0.527 2.116-1.214zM21.875 21.339q1.107 0 1.884-0.786t0.777-1.893q0-1.089-0.786-1.875t-1.875-0.786q-1.107 0-1.893 0.777t-0.786 1.884 0.786 1.893 1.893 0.786z"></path>
            </symbol>
            <symbol id="icon-hashtag" viewBox="0 0 32 32">
                <path class="path1" d="M17.696 18.286l1.143-4.571h-4.536l-1.143 4.571h4.536zM31.411 9.286l-1 4q-0.125 0.429-0.554 0.429h-5.839l-1.143 4.571h5.554q0.268 0 0.446 0.214 0.179 0.25 0.107 0.5l-1 4q-0.089 0.429-0.554 0.429h-5.839l-1.446 5.857q-0.125 0.429-0.554 0.429h-4q-0.286 0-0.464-0.214-0.161-0.214-0.107-0.5l1.393-5.571h-4.536l-1.446 5.857q-0.125 0.429-0.554 0.429h-4.018q-0.268 0-0.446-0.214-0.161-0.214-0.107-0.5l1.393-5.571h-5.554q-0.268 0-0.446-0.214-0.161-0.214-0.107-0.5l1-4q0.125-0.429 0.554-0.429h5.839l1.143-4.571h-5.554q-0.268 0-0.446-0.214-0.179-0.25-0.107-0.5l1-4q0.089-0.429 0.554-0.429h5.839l1.446-5.857q0.125-0.429 0.571-0.429h4q0.268 0 0.446 0.214 0.161 0.214 0.107 0.5l-1.393 5.571h4.536l1.446-5.857q0.125-0.429 0.571-0.429h4q0.268 0 0.446 0.214 0.161 0.214 0.107 0.5l-1.393 5.571h5.554q0.268 0 0.446 0.214 0.161 0.214 0.107 0.5z"></path>
            </symbol>
            <symbol id="icon-chain" viewBox="0 0 30 32">
                <path class="path1" d="M26 21.714q0-0.714-0.5-1.214l-3.714-3.714q-0.5-0.5-1.214-0.5-0.75 0-1.286 0.571 0.054 0.054 0.339 0.33t0.384 0.384 0.268 0.339 0.232 0.455 0.063 0.491q0 0.714-0.5 1.214t-1.214 0.5q-0.268 0-0.491-0.063t-0.455-0.232-0.339-0.268-0.384-0.384-0.33-0.339q-0.589 0.554-0.589 1.304 0 0.714 0.5 1.214l3.679 3.696q0.482 0.482 1.214 0.482 0.714 0 1.214-0.464l2.625-2.607q0.5-0.5 0.5-1.196zM13.446 9.125q0-0.714-0.5-1.214l-3.679-3.696q-0.5-0.5-1.214-0.5-0.696 0-1.214 0.482l-2.625 2.607q-0.5 0.5-0.5 1.196 0 0.714 0.5 1.214l3.714 3.714q0.482 0.482 1.214 0.482 0.75 0 1.286-0.554-0.054-0.054-0.339-0.33t-0.384-0.384-0.268-0.339-0.232-0.455-0.063-0.491q0-0.714 0.5-1.214t1.214-0.5q0.268 0 0.491 0.063t0.455 0.232 0.339 0.268 0.384 0.384 0.33 0.339q0.589-0.554 0.589-1.304zM29.429 21.714q0 2.143-1.518 3.625l-2.625 2.607q-1.482 1.482-3.625 1.482-2.161 0-3.643-1.518l-3.679-3.696q-1.482-1.482-1.482-3.625 0-2.196 1.571-3.732l-1.571-1.571q-1.536 1.571-3.714 1.571-2.143 0-3.643-1.5l-3.714-3.714q-1.5-1.5-1.5-3.643t1.518-3.625l2.625-2.607q1.482-1.482 3.625-1.482 2.161 0 3.643 1.518l3.679 3.696q1.482 1.482 1.482 3.625 0 2.196-1.571 3.732l1.571 1.571q1.536-1.571 3.714-1.571 2.143 0 3.643 1.5l3.714 3.714q1.5 1.5 1.5 3.643z"></path>
            </symbol>
            <symbol id="icon-thumb-tack" viewBox="0 0 21 32">
                <path class="path1" d="M8.571 15.429v-8q0-0.25-0.161-0.411t-0.411-0.161-0.411 0.161-0.161 0.411v8q0 0.25 0.161 0.411t0.411 0.161 0.411-0.161 0.161-0.411zM20.571 21.714q0 0.464-0.339 0.804t-0.804 0.339h-7.661l-0.911 8.625q-0.036 0.214-0.188 0.366t-0.366 0.152h-0.018q-0.482 0-0.571-0.482l-1.357-8.661h-7.214q-0.464 0-0.804-0.339t-0.339-0.804q0-2.196 1.402-3.955t3.17-1.759v-9.143q-0.929 0-1.607-0.679t-0.679-1.607 0.679-1.607 1.607-0.679h11.429q0.929 0 1.607 0.679t0.679 1.607-0.679 1.607-1.607 0.679v9.143q1.768 0 3.17 1.759t1.402 3.955z"></path>
            </symbol>
            <symbol id="icon-arrow-left" viewBox="0 0 43 32">
                <path class="path1" d="M42.311 14.044c-0.178-0.178-0.533-0.356-0.711-0.356h-33.778l10.311-10.489c0.178-0.178 0.356-0.533 0.356-0.711 0-0.356-0.178-0.533-0.356-0.711l-1.6-1.422c-0.356-0.178-0.533-0.356-0.889-0.356s-0.533 0.178-0.711 0.356l-14.578 14.933c-0.178 0.178-0.356 0.533-0.356 0.711s0.178 0.533 0.356 0.711l14.756 14.933c0 0.178 0.356 0.356 0.533 0.356s0.533-0.178 0.711-0.356l1.6-1.6c0.178-0.178 0.356-0.533 0.356-0.711s-0.178-0.533-0.356-0.711l-10.311-10.489h33.778c0.178 0 0.533-0.178 0.711-0.356 0.356-0.178 0.533-0.356 0.533-0.711v-2.133c0-0.356-0.178-0.711-0.356-0.889z"></path>
            </symbol>
            <symbol id="icon-arrow-right" viewBox="0 0 43 32">
                <path class="path1" d="M0.356 17.956c0.178 0.178 0.533 0.356 0.711 0.356h33.778l-10.311 10.489c-0.178 0.178-0.356 0.533-0.356 0.711 0 0.356 0.178 0.533 0.356 0.711l1.6 1.6c0.178 0.178 0.533 0.356 0.711 0.356s0.533-0.178 0.711-0.356l14.756-14.933c0.178-0.356 0.356-0.711 0.356-0.889s-0.178-0.533-0.356-0.711l-14.756-14.933c0-0.178-0.356-0.356-0.533-0.356s-0.533 0.178-0.711 0.356l-1.6 1.6c-0.178 0.178-0.356 0.533-0.356 0.711s0.178 0.533 0.356 0.711l10.311 10.489h-33.778c-0.178 0-0.533 0.178-0.711 0.356-0.356 0.178-0.533 0.356-0.533 0.711v2.311c0 0.178 0.178 0.533 0.356 0.711z"></path>
            </symbol>
            <symbol id="icon-play" viewBox="0 0 22 28">
                <path d="M21.625 14.484l-20.75 11.531c-0.484 0.266-0.875 0.031-0.875-0.516v-23c0-0.547 0.391-0.781 0.875-0.516l20.75 11.531c0.484 0.266 0.484 0.703 0 0.969z"></path>
            </symbol>
            <symbol id="icon-pause" viewBox="0 0 24 28">
                <path d="M24 3v22c0 0.547-0.453 1-1 1h-8c-0.547 0-1-0.453-1-1v-22c0-0.547 0.453-1 1-1h8c0.547 0 1 0.453 1 1zM10 3v22c0 0.547-0.453 1-1 1h-8c-0.547 0-1-0.453-1-1v-22c0-0.547 0.453-1 1-1h8c0.547 0 1 0.453 1 1z"></path>
            </symbol>
            </defs>
            </svg>




        </div>
    </body>
</html>