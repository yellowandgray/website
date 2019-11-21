
<!DOCTYPE html>
<html lang="en">


    <?php
    $page = 'about';
    include 'head.php';
    require_once 'api/include/common.php';
    $obj = new Common();
    $cart = $obj->selectRow('*', 'product', 'id = 1');
    ?>
    <body class="goto-here">


        <!-- END nav -->
        <?php include 'enquiry.php'; ?>
        <section>
            <?php include 'menu.php'; ?>
        </section>
        <div class="hero-wrap hero-bread" style="background-image: url('images/bg_04.jpg'); background-size: cover;">

            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-9 ftco-animate text-center">
                        <h1 class="mb-0 bread">MY CART</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home-</a></span> <span class="mr-2"></span> <span>My Cart</span></p>

                    </div>
                </div>
            </div>
        </div>

        <section class="ftco-section" style="background-color: #f1f3f6;padding: 0px 0 0 !important;">
            <div class="pad-lr-80">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 items">
                                    <h3>My Cart</h3>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="items-n">

                                        <div class="row" style="padding: 10px;">
                                            <div class="col-md-3 cart-img">
                                                <img src="<?php echo $cart['image']; ?>" alt=""/>
                                                <div class="add-num">
                                                    <input type="number" value="<?php echo $cart['quantity']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <h5><?php echo $cart['name']; ?></h5>
                                                <!--<p>Volume: <span>1l + 1.5l</span></p>-->
                                                <p><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $cart['price'] * $cart['quantity']; ?></p>
                                                <p class="cart-remove"><a> Remove</a></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="delivery">Delivery in 4 - 5 days</p>
                                                <p class="replace">10 Days Replacement Policy</p>
                                            </div>
                                        </div>

                                        <hr>
                                        <!--                                                <div class="row" style="padding: 10px;">
                                                                                            <div class="col-md-3 cart-img">
                                                                                                <img src="<?php echo $val['image']; ?>" alt=""/>
                                                                                                <div class="add-num">
                                                                                                    <input type="number" value="<?php echo $val['quantity']; ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-5">
                                                                                                <h5>Fresche Mini Kit</h5>
                                                                                                <p>Volume: <span>2 sets of 5 ml </span></p>
                                                                                                <p><i class="fa fa-inr" aria-hidden="true"></i></i> <?php echo $val['price'] * $val['quantity']; ?></p>
                                                                                                <p class="cart-remove"><a href="#">Remove</a></p>
                                                                                            </div>
                                                                                            <div class="col-md-4">
                                                                                                <p class="delivery">Delivery in 4 - 5 days</p>
                                                                                                <p class="replace">10 Days Replacement Policy</p>
                                        
                                                                                            </div>
                                                                                        </div>-->


                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="add-next">
                                                    <button><a href="checkout.php" style="color: #fff">PLACE ORDER</a></button>
                                                </div> 
                                            </div> 
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4 ">
                                    <div class="total-amount">
                                        <p class="price-tetail">PRICE DETAILS</p>
                                        <hr>
                                        <div class="row price-cart">
                                            <div class="col-md-6">
                                                <p>Price(2 item)</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><i class="fa fa-inr" aria-hidden="true"></i></i> 8250.00</p>
                                            </div>
                                        </div>
                                        <div class="row price-cart">
                                            <div class="col-md-6">
                                                <p>Delivery</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>FREE</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="total-p">Total Payable</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><i class="fa fa-inr" aria-hidden="true"></i></i> 8250.00</p>
                                            </div>

                                        </div>

                                    </div>
                                    <p class="need">Need help? <a href="contact.php">Contact Us</a></p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>


        <?php include 'footer.php'; ?>
    </body>
</html>