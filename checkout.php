
<!DOCTYPE html>
<html lang="en">
    <?php
    include 'head.php';
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
                                <div class="check m-b-10">
                                    <h4><span>1</span> LOGIN</h4>
                                    <!--flow-4- after login-->
                                    <div class="flow-4">
                                        <hr>
                                        <h5>Vignesh V <span>+91 1234567890</span></h5>
                                        <button>Change</button>
                                    </div>
                                </div>
                                <div class="bg-white m-b-10">
                                    <div class="check-login">
                                        <h4><span>1</span> LOGIN OP SIGNUP</h4>
                                    </div>
                                    <div class="user-login">

                                        <!--default-->

                                        <div class="flow-1">
                                            <input type="email" placeholder="Enter Your Email" id="email" name="email">
                                            <input type="password" placeholder="Enter Your Password" id="password" name="password">
                                            <a href="">Forget password?</a>
                                            <br/>
                                            <button type="submit">CONTINUE</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="check m-b-10">
                                    <h4><span>2</span> DELIVERY ADDRESS</h4>
                                    <div class="address-flow-2">
                                        <hr>
                                        <h5>Vignesh V <span>+91 1234567890</span></h5>
                                        <p>YG STUDIO, no.12, Durga colony, 4th cross street,<br/>sembakkam.chennai-600073</p>
                                        <button>Edit</button>
                                    </div>
                                </div>
                                <div class="bg-white m-b-10">
                                    <div class="check-login">
                                        <h4><span>2</span> DELIVERY ADDRESS</h4>
                                    </div>
                                    <!--address-flow-1-->
                                    <div class="user-address">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea  placeholder="Address" rows="4"></textarea>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select>
                                                        <option value="SELECT STATE">Select State</option>
                                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                        <option value="Assam">Assam</option>
                                                        <option value="Bihar">Bihar</option>
                                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                                        <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                                        <option value="Daman and Diu">Daman and Diu</option>
                                                        <option value="Delhi">Delhi</option>
                                                        <option value="Goa">Goa</option>
                                                        <option value="Gujarat">Gujarat</option>
                                                        <option value="Haryana">Haryana</option>
                                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                        <option value="Jharkhand">Jharkhand</option>
                                                        <option value="Karnataka">Karnataka</option>
                                                        <option value="Kerala">Kerala</option>
                                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                        <option value="Maharashtra">Maharashtra</option>
                                                        <option value="Manipur">Manipur</option>
                                                        <option value="Meghalaya">Meghalaya</option>
                                                        <option value="Mizoram">Mizoram</option>
                                                        <option value="Nagaland">Nagaland</option>
                                                        <option value="Orissa">Orissa</option>
                                                        <option value="Puducherry">Puducherry</option>
                                                        <option value="Punjab">Punjab</option>
                                                        <option value="Rajasthan">Rajasthan</option>
                                                        <option value="Sikkim">Sikkim</option>
                                                        <option value="Tamil Nadu" selected>Tamil Nadu</option>
                                                        <option value="Telangana">Telangana</option>
                                                        <option value="Tripura">Tripura</option>
                                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                        <option value="Uttarakhand">Uttarakhand</option>
                                                        <option value="West Bengal">West Bengal</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" placeholder="City/District/Town">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" placeholder="Pincode" name="pincode">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" placeholder="Landmark (Optional)">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Alternate Phone (Optional)">
                                                </div>

                                            </div>
                                            <div class="row address-submit">
                                                <div class="col-md-12">
                                                    <button type="submit">MAKE PAYMENT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--address-flow-1-->
                                    <div class="saved-address">

                                    </div>
                                </div>
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