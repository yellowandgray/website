
<!DOCTYPE html>
<html lang="en">
    <?php
    require_once 'api/include/common.php';
    include 'head.php';
    $obj = new Common();
    $states = $obj->selectAll('*', 'state', 'state_id > 0');
    $members = $obj->selectAll('m.*, s.name AS state', 'member AS m LEFT JOIN state AS s ON s.state_id = m.state_id', 'member_id > 0');
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

        <section class="ftco-section" style="background-color: #f1f3f6;">
            <div class="container">
                <div class="row">
                    <!--                    <div class="col-lg-12 pl-md-5 ftco-animate pad-80">
                                            <div class="tab-add">
                                                <button class="tablinks-add" onclick="openCity(event, 'step-1')" id="defaultOpen">Cart</button>
                                                <button class="tablinks-add" onclick="openCity(event, 'step-2')">Shipping Address</button>
                                                <button class="tablinks-add" onclick="openCity(event, 'step-3')">Payment</button>
                                            </div>
                                            <div id="step-1" class="tabcontent">
                                                <table class="add-table">
                                                    <tr>
                                                        <th>Product name</th>
                                                        <th>Price</th>
                                                        <th>Quantity</th>
                                                        <th>Total</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Fresche Mini Kit</td>
                                                        <td><i class="fa fa-inr" aria-hidden="true"></i></i> 250</td>
                                                        <td>1</td>
                                                        <td><i class="fa fa-inr" aria-hidden="true"></i> 250</td>
                                                    </tr>
                                                </table>
                                                <div class="add-next">
                                                    <button>next</button>
                                                </div>
                    
                                            </div>
                    
                                            <div id="step-2" class="tabcontent">
                                                <div class="shipping">
                                                    <from>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                                                                <input type="text" id="fname" name="firstname" placeholder="">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                                                <input type="text" id="email" name="email" placeholder="">
                                                            </div>
                                                        </div>
                    
                    
                                                        <div>
                                                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                                                            <input type="text" id="adr" name="address" placeholder="">
                                                        </div>
                                                        <div>
                                                            <label for="city"><i class="fa fa-institution"></i> City</label>
                                                            <input type="text" id="city" name="city" placeholder="">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="state"></label>
                                                                <input type="text" id="state" name="state" placeholder="State">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="zip"></label>
                                                                <input type="text" id="zip" name="zip" placeholder="Pin">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <input type="submit" value="Continue to checkout" class="btn">
                                                        </div>
                                                    </from>
                                                    <div class="add-next">
                                                        <button class="color-back">Back</button>
                                                        <button>next</button>
                                                    </div>
                                                </div>
                    
                    
                                            </div>
                    
                                            <div id="step-3" class="tabcontent">
                                                <h3>Tokyo</h3>
                                                <p>Tokyo is the capital of Japan.</p>
                                            </div>
                                        </div>-->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="check-login">
                                    <h4><span>1</span> PRODUCT</h4>
                                </div>
                                <div class="product-list">
                                    <div class="product row margin-lr-0">
                                        <div class="col-md-3 product-image">
                                            <img src="images/product-01.jpg">
                                        </div>
                                        <div class="col-md-2 product-price">
                                            <i class="fa fa-inr" aria-hidden="true"></i> 8000
                                        </div>
                                        <div class="col-md-2 product-quantity">
                                            <input type="number" value="1" min="1">
                                        </div>
                                        <div class="col-md-2 product-removal">
                                            <button class="remove-product">
                                                Remove
                                            </button>
                                        </div>
                                        <div class="col-md-2 product-line-price">
                                            <i class="fa fa-inr" aria-hidden="true"></i> 8000
                                        </div>
                                    </div>
                                </div>
                                <!--                                <div class="check m-b-10">
                                                                    <h4><span>1</span> LOGIN</h4>
                                                                    flow-4- after login
                                                                    <div class="flow-4">
                                                                        <hr>
                                                                        <h5>Vignesh V <span>+91 1234567890</span></h5>
                                                                        <button>Change</button>
                                                                    </div>
                                                                </div>-->
                                <div class="bg-white m-b-10">
                                    <div class="check-login">
                                        <h4><span>1</span> ENTER YOUR DETAILS</h4>
                                    </div>
                                    <form class="user-register" onsubmit="return MemberInsert();">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" id="fname" placeholder="First Name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" id="lname" placeholder="Last Name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea type="text" rows="4" name="address" class="form-control" id="address" placeholder="Delivery Address" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <select id="state" required>
                                                <?php foreach ($states as $row) { ?>
                                                    <option value="<?php echo $row['state_id']; ?>"><?php echo $row['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="city" class="form-control" id="city" placeholder="City" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="pincode" class="form-control" id="pincode" placeholder="Pincode" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="altphone" placeholder="Alternate Phone (Optional)">
                                        </div>
                                        <button type="submit" class="btn member-register-btn">Submit</button>
                                    </form>
                                </div>
                                <?php if (count($members) > 0) { ?>
                                    <div class="check m-b-10">
                                        <h4><span>2</span> DELIVERY ADDRESS</h4>
                                        <div class="address-flow-2">
                                            <?php foreach ($members as $row) { ?>
                                                <hr>
                                                <h5><?php echo $row['fname']; ?> <?php echo $row['lname']; ?> - <span><?php echo $row['mobile']; ?></span> - <span><?php echo $row['email']; ?></span></h5>
                                                <p><?php echo $row['address']; ?> <br/> <?php echo $row['city']; ?> - <?php echo $row['pincode']; ?> <br/><?php echo $row['state']; ?></p>
                                                <button>Edit</button>
                                            <?php } ?>
                                        </div>
                                        <center>
                                            <button class="btn payment-btn">MAKE PAYMENT</button>
                                        </center>
                                        <br/>
                                    </div>
                                <?php } ?>
                                <div class="check m-b-10">
                                    <h4><span>3</span> PAYMENT OPTIONS</h4>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="total-amount">
                                    <p class="price-tetail">PRICE DETAILS</p>
                                    <hr>
                                    <div class="totals">
                                        <div class="totals-item">
                                            <label>Subtotal</label>
                                            <div class="totals-value" id="cart-subtotal">8000</div>
                                        </div>
                                    </div>
                                    <button class="checkout">Checkout</button>

                                </div>
                                <p class="need">Need help? <a href="contact.php">Contact Us</a></p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>

        <?php include 'footer.php'; ?>
        <script>
            /* Set rates + misc */
            var taxRate = 0.05;
            var shippingRate = 15.00;
            var fadeTime = 300;


            /* Assign actions */
            $('.product-quantity input').change(function () {
                updateQuantity(this);
            });

            $('.product-removal button').click(function () {
                removeItem(this);
            });


            /* Recalculate cart */
            function recalculateCart()
            {
                var subtotal = 0;

                /* Sum up row totals */
                $('.product').each(function () {
                    subtotal += parseFloat($(this).children('.product-line-price').text());
                });

                /* Calculate totals */
                var tax = subtotal * taxRate;
                var shipping = (subtotal > 0 ? shippingRate : 0);
                var total = subtotal + tax + shipping;

                /* Update totals display */
                $('.totals-value').fadeOut(fadeTime, function () {
                    $('#cart-subtotal').html(subtotal.toFixed(2));
                    $('#cart-tax').html(tax.toFixed(2));
                    $('#cart-shipping').html(shipping.toFixed(2));
                    $('#cart-total').html(total.toFixed(2));
                    if (total == 0) {
                        $('.checkout').fadeOut(fadeTime);
                    } else {
                        $('.checkout').fadeIn(fadeTime);
                    }
                    $('.totals-value').fadeIn(fadeTime);
                });
            }


            /* Update quantity */
            function updateQuantity(quantityInput)
            {
                /* Calculate line price */
                var productRow = $(quantityInput).parent().parent();
                var price = parseFloat(productRow.children('.product-price').text());
                var quantity = $(quantityInput).val();
                var linePrice = price * quantity;

                /* Update line price display and recalc cart totals */
                productRow.children('.product-line-price').each(function () {
                    $(this).fadeOut(fadeTime, function () {
                        $(this).text(linePrice.toFixed(2));
                        recalculateCart();
                        $(this).fadeIn(fadeTime);
                    });
                });
            }


            /* Remove item from cart */
            function removeItem(removeButton)
            {
                /* Remove row from DOM and recalc cart total */
                var productRow = $(removeButton).parent().parent();
                productRow.slideUp(fadeTime, function () {
                    productRow.remove();
                    recalculateCart();
                });
            }
        </script>
    </body>
</html>