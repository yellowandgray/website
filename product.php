<!DOCTYPE html>
<html lang="en">

    <?php
    $page = 'products';
    include 'head.php';
    require_once 'api/include/common.php';
    $obj = new Common();
    $product_1 = $obj->selectRow('*', 'product', 'product_id = 1');
    $product_2 = $obj->selectRow('*', 'product', 'product_id = 2');
    $product_3 = $obj->selectRow('*', 'product', 'product_id = 3');
    $product_4 = $obj->selectRow('*', 'product', 'product_id = 7');
    $product_4_sub = $obj->selectAll('*', 'sub_product', 'product_id = 7 AND status = 1');
    $product_5 = $obj->selectRow('*', 'product', 'product_id = 8');
    $product_5_sub = $obj->selectAll('*', 'sub_product', 'product_id = 8 AND status = 1');
    $sales_mode = $obj->selectRow('*', 'sales_mode', 'sales_mode_id > 0');
    ?>
    <body class="goto-here">
        <!-- END nav -->
        <?php include 'enquiry.php'; ?>
        <section>
            <?php include 'menu.php'; ?>
        </section>
        <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg'); background-size: cover;">

            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-6 ftco-animate text-center">
                        <h1 class="mb-0 bread">Products</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Product</span></p>

                    </div>
                    <div class="col-md-6 ftco-animate text-center">
                        <p class="product-top">Fresche technology delivers durable and validated microbial performance with environmental integrity at an affordable cost.</p>

                    </div>
                </div>
            </div>
        </div>
        <section class="ftco-section">
            <div class="pad-lr-80">
                <div class="row">
                    <div class="col-lg-4 mb-5  ftco-animate">
                        <div class="product-img-box">                        
                            <img src="<?php echo BASE_URL . $product_1['image_path']; ?>" class="product-img-responsive" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8 product-details pl-md-5 ftco-animate">
                        <h3><?php echo $product_1['product_name']; ?></h3>
                        <p><?php echo $product_1['description']; ?></p>                       
                    </div>
                </div>
            </div>
        </section>
        <section class="ftco-section" style="background: #efefef;">
            <div class="pad-lr-80">
                <div class="row product-2">
                    <div class="col-lg-8  product-details pl-md-5 ftco-animate">
                        <div class="row">
                            <div class=" col-md-12 bz1-order-2">
                                <h3><?php echo $product_2['product_name']; ?></h3>
                                <p><?php echo $product_2['description']; ?></p>
                               <!--<p class="add-price">(It contains 1 KG Fresche EF 3851 and 1.5 KG of Bz 1 Binder)</p>-->
                            </div>
                            <div class=" col-md-12  bz1-order" style="margin-top:20px">
                                <div class=" combo">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 add-cart">
                                            <img src="images/combo.png" alt="" class="img-responsive" style="padding:15px"/>
                                        </div>
                                        <div class="col-md-6 pro-d col-sm-12" style="padding:15px">
                                            <h3>Combo Pack</h3>
                                            <p>Fresche EF 3851– 1 Litre</p>
                                            <p>Bz 1 Binder – 1.5 Litre </p>
                                            <p><span><i class="fa fa-inr" aria-hidden="true"></i></span><span>8000/-</span></p>
                                            <?php if ($sales_mode['sales_mode'] == '1') { ?> 
                                                <a href="" data-name="Combo Pack" data-price="8000" data-delivery="50" class="add-to-cart">
                                                    <button class="button-03">
                                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>  Add To Cart
                                                    </button>
                                                </a>
                                            <?php } else { ?>
                                                <a href="tel:+91 8409 012345">
                                                    <button class="button-03">
                                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>  Call For Order
                                                    </button>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4  mb-5 ftco-animate">
                        <div class="product-img-box">                            
                            <img src="<?php echo BASE_URL . $product_2['image_path']; ?>" class="product-img-responsive" alt="BZ1 Binder">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="ftco-section">
            <div class="pad-lr-80">
                <div class="row">
                    <div class="col-lg-4 mb-5  ftco-animate">
                        <div class="product-img-box">
                            <img src="<?php echo BASE_URL . $product_3['image_path']; ?>" class="product-img-responsive" alt="Fresche Mini Kit">
                        </div>
                    </div>
                    <div class="col-lg-8 product-details pl-md-5 ftco-animate">                       
                        <h3><?php echo $product_3['product_name']; ?></h3>
                        <div class="pro-d" style="float:left"><p><span><i class="fa fa-inr" aria-hidden="true"></i></span><span>212/-</span></p></div>
                        <!-- <div><?php if ($sales_mode['sales_mode'] == '1') { ?> 
                                    <a href="#" data-name="<?php echo $product_3['product_name']; ?>" data-price="212"  data-delivery="50" class="add-to-cart">
                                        <button class="button-03">
                                            <i class="fa fa-cart-plus" aria-hidden="true"></i>  Add To Cart
                                        </button>
                                    </a>
                        <?php } else { ?>
                                    <a href="tel:+91 8409 012345">
                                        <button class="button-03">
                                            <i class="fa fa-cart-plus" aria-hidden="true"></i>  Call For Order
                                        </button>
                                    </a>
                        <?php } ?>*/</div>-->
                        <div style="clear:both"><?php echo $product_3['description']; ?></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="ftco-section" style="background: #efefef;">
            <div class="pad-lr-80">
                <div class="row product-2">
                    <div class="col-lg-8  product-details pl-md-5 ftco-animate">                        
                        <h3><?php echo $product_4['product_name']; ?></h3>
                        <p><?php echo $product_4['description']; ?></p>
                        <img src="images/logo-siqura.png" alt="SIQURA"><br><br>
                        <a type="button" href="siqura-protectant.php" class="btn btn-info">More Details</a>                        
                    </div>
                    <div class="col-lg-4  mb-5 ftco-animate">
                        <div class="product-img-box">                            
                            <img src="<?php echo BASE_URL . $product_4['image_path']; ?>" class="product-img-responsive" alt="SIQURA Hand Protectant">
                        </div>
                    </div>
                </div>
                <div class="row prod-sub">
                    <?php foreach ($product_4_sub as $sub4) { ?>
                        <div class="col-md-4">
                            <div class="product-img-box2">
                                <img src="<?php echo BASE_URL . $sub4['image_path']; ?>" alt="SIQURA Hand Protectant 10 ML"><br>
                                <div class="pro-d"><p><span><?php echo $sub4['product_name']; ?> - <i class="fa fa-inr" aria-hidden="true"></i></span><span><?php echo $sub4['product_price']; ?>/-</span></p></div>
                                <?php if ($sales_mode['sales_mode'] == '1') { ?>
                                    <button class="button-03 add-to-cart" data-delivery="<?php echo $sub4['delivery_fee'] ?>" data-name="<?php echo $product_4['product_name'] . ' - ' . $sub4['product_name']; ?>" data-price="<?php echo $sub4['product_price']; ?>">
                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>  Add To Cart
                                    </button>
                                <?php } else { ?>
                                    <a href="tel:+91 8409 012345">
                                        <button class="button-03">
                                            <i class="fa fa-cart-plus" aria-hidden="true"></i>  Call For Order
                                        </button>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <section class="ftco-section">
            <div class="pad-lr-80">
                <div class="row">
                    <div class="col-lg-4 mb-5  ftco-animate">
                        <div class="product-img-box">
                            <img src="<?php echo BASE_URL . $product_5['image_path']; ?>" class="product-img-responsive" alt="SIQURA Surface Protectant">
                        </div>
                    </div>
                    <div class="col-lg-8 product-details pl-md-5 ftco-animate">                       
                        <h3><?php echo $product_5['product_name']; ?></h3>
                        <p><?php echo $product_5['description']; ?></p>
                        <img src="images/logo-siqura.png" alt="SIQURA">  
                    </div>
                </div>
                <div class="row prod-sub">
                    <?php foreach ($product_5_sub as $sub5) { ?>
                        <div class="col-md-4">
                            <div class="product-img-box2">
                                <img src="<?php echo BASE_URL . $sub5['image_path']; ?>" alt="SIQURA Hand Protectant 10 ML"><br>
                                <div class="pro-d"><p><span><?php echo $sub5['product_name']; ?> - <i class="fa fa-inr" aria-hidden="true"></i></span><span><?php echo $sub5['product_price']; ?>/-</span></p></div>
                                <?php if ($sales_mode['sales_mode'] == '1') { ?> 
                                    <button class="button-03 add-to-cart" data-delivery="<?php echo $sub5['delivery_fee'] ?>" data-name="<?php echo $product_5['product_name'] . ' - ' . $sub5['product_name']; ?>" data-price="<?php echo $sub5['product_price']; ?>">
                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>  Add To Cart
                                    </button>
                                <?php } else { ?>
                                    <a href="tel:+91 8409 012345">
                                        <button class="button-03">
                                            <i class="fa fa-cart-plus" aria-hidden="true"></i>  Call For Order
                                        </button>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <section class="ftco-section"  style="background-image: url('images/bg_02.png'); background-size: cover;">
            <div class="container">
                <div class="row justify-content-center mb-3 pb-3">
                    <div class="col-md-12 product-details text-center ftco-animate">
                        <h3 class="mb-4">Application</h3>
                    </div>
                </div>   		
            </div>
            <div class="pad-lr-80">
                <div class="row">
                    <div class="col-md-6 col-lg-4 ftco-animate">
                        <div class="product">
                            <div class="img-prod">
                                <img src="images/product/001.png" alt=""/>
                                <h3>AGED & DISABILITY CARE</h3>
                                <P>Reception, beds and bed tables, canteen benches, tables, chairs, children play areas, toilets, bathrooms, food trolleys, handrails, kitchen benches, cool rooms, refrigerators, communal areas, air filters, air ducts, evaporative coolers, rubbish, lifts and elevators.</P>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 ftco-animate">
                        <div class="product">
                            <div class="img-prod">
                                <img src="images/product/002.png" alt=""/>
                                <h3>HOSPITAL & HEALTHCARE</h3>
                                <P>Operation theatre, ICU, cath lab, emergency room, lobby area, stretchers, ECG Monitor, operating table, instrument cabinet / trolley, surgeon’s tools, OT floors and walls, ICU bed, spotlight, floors, walls & ceilings, bedpan, kidney dish, bed rails, waiting areas, benches, air filters, air ducts, evaporative coolers, rubbish and recycling areas.</P>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 ftco-animate">
                        <div class="product">
                            <div class="img-prod">
                                <img src="images/product/003.png" alt=""/>
                                <h3>GOVERNMENT, PUBLIC AREAS, TRANSPORT & DISASTER</h3>
                                <P>Police stations, police vans, holding cells, border protection, detention, corrections, social services, army, navy, air force, public housing, government buildings, libraries, trams, trains, buses, taxis, ferries, rail stations, rental vehicles, airports, public toilets, cinemas, sporting stadiums, theme parks, casino floors and gaming equipment, disaster management, humanity relief, national pandemic and bio security.</P>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 ftco-animate">
                        <div class="product">
                            <div class="img-prod">
                                <img src="images/product/004.png" alt=""/>
                                <h3>FOOD & HOSPITALITY</h3>
                                <P>Hotel and motel rooms, bathrooms, back packer hostels, caravan parks, cruise ship cafes, restaurants, bars, night clubs, fast food, meals on wheels, home delivery creates, washrooms, food vending machines, farm equipment, storage shed, food crates, cool rooms, refrigerators, air ducts, fans and vents, food preparation benches, processing, storage, food transport, conveyer lines.</P>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 ftco-animate">
                        <div class="product">
                            <div class="img-prod">
                                <img src="images/product/005.png" alt=""/>
                                <h3>AROUND THE HOME</h3>
                                <P>Kitchen benches, sink disposal units, rubbish bins, ensuite basins, showers, toilets, bathrooms, playrooms, air conditioning filters, motor vehicles, caravans, boats, TV remotes, spas, swimming pools, door handles, light switches, laundry basins, toilet seats, baby change tables, strollers and soft toys, tents, driveways, paths, cubby houses, dog kennels, decks, outdoor furniture and awnings.</P>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 ftco-animate">
                        <div class="product">
                            <div class="img-prod">
                                <img src="images/product/006.png" alt=""/>
                                <h3>EVERYDAY APPLICATIONS</h3>
                                <P>Baby centers, day care, playgroup, kindergartens, playgrounds, primary, middle, secondary schools, universities, and tafe colleges, public pools, spas, gym equipment, change rooms, lockers, showers, doors, floor mats, boxing mats, basketball stadiums, training equipment, massage equipment.</P>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="ftco-section"  style="background-image: url('images/bg_02.png'); background-size: cover;" id="indegrity">
            <div class="container">
                <div class="row justify-content-center mb-3 pb-3" style="padding-top: 22px;">
                    <div class="col-md-12 product-details text-center ftco-animate">
                        <h3 class="mb-4">Products Features</h3>
                    </div>
                </div>   		
            </div>
            <div class="pad-lr-80">
                <div class="row">
                    <div class="col-md-12 col-lg-12 ftco-animate">
                        <div class="product-fea">
                            <div class="img-prod">
                                <h3>ENVIRONMENTAL INTEGRITY</h3>
                                <P>Fresche is a biobased SiQuat compound which is manufactured from sustainable and renewable materials. As a non chemical, non leaching, surface bonding technology, fresche is safe for people, plants, pets, and the planer. In final life, Fresche biodegrades to form oxygen, nitrogen and common sand.  </P>
                            </div>
                            <div class="img-prod">
                                <h3>VALIDATED MICROBIAL PERFORMANCE</h3>
                                <P>Fresche delivers high performance antibacterial, mould and odour control on treated textile fibres and substrates. Fresche technology has been adopted by many leading corporations and global brands, delivering a clear point of competitive difference and marketing advantage</P>
                            </div>
                            <div class="img-prod">
                                <h3>NO HEAVY METALS OR CHEMICAL TOXINS</h3>
                                <P>Fresche contains no heavy metals, poisons, toxic chemicals, carcinogens or endocrine disruptive compounds, carcinogens or endocrine disruptive compounds which are harmful to human health, crops, plants, animals or the environment.  </P>
                            </div>
                            <div class="img-prod">
                                <h3>LOCK & BOND MICROBIAL PROTECTION</h3>
                                <P>Fresche "locks and bonds" to a treated textiles and fibres, where it delivers continuing, broad spectrum bacterial, fungal, mould and odour control. As Fresche is not continuing, safe, durable, high performance microbial protection of the treated textile.</P>
                            </div>
                            <div class="img-prod">
                                <h3>NON LEACHING AND NON DEPLETING </h3>
                                <P>Fresche will not leach from the treated surface on which it is applied, and therefore it will not deplete in microbial performance or efficacy. Its mechanical mode of action ensures that treated textiles are continually protected from microbial attack.   </P>
                            </div>
                            <div class="img-prod">
                                <h3>EFFICIENT MECHANICAL MODE OF ACTION</h3>
                                <P>Fresche active destroys bacteria and fungus by mechanical mode of action and not chemical interaction. This mode of action ensures terminals control of harmful micro organisms, and will not promote the buildings of microbial resistance</P>
                            </div>
                            <div class="img-prod">
                                <h3>CLEAN, FRESH &  ODOUR FREE</h3>
                                <P>Fresche keeps fibres clean, fresh and odour free. Textiles retain their "newness" longer. </P>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <?php include 'footer.php'; ?>
    </body>
</html>