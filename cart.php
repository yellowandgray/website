<!DOCTYPE html>
<html lang="en">
    <?php
    $page = 'about';
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
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span><span class="mr-2">-</span> <span>My Cart</span></p>

                    </div>
                </div>
            </div>
        </div>

        <section class="ftco-section" style="background-color: #f1f3f6;padding: 0px 0 0 !important;">
            <div class="pad-lr-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 items">
                            <h3>My Cart</h3>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="bg-white">
                                <div class="check-login">
                                    <h4><span>1</span> LOGIN OR SIGNUP</h4>
                                </div>
                                <div class="user-login">

                                    <!--default-->

                                    <div class="flow-1">
                                        <input type="text" placeholder="Enter Phone/email">
                                        <button type="submit">CONTINUE</button>
                                    </div>

                                    <!--flow-2-not in user list-->

                                    <div class="flow-2">
                                        <div class="">
                                            <input type="text" placeholder="Enter OTP">
                                        </div>
                                        <div class="">
                                            <input type="text" placeholder="Set Password">
                                        </div>
                                    </div>

                                    <!--flow-3- user in list-->

                                    <div class="flow-3">
                                        <div class="">
                                            <input type="text" placeholder="Password">
                                            <a href="">Forget?</a>
                                        </div>
                                    </div>
                                    <div class="login-final-submit">
                                        <button type="submit">LOGIN</button>
                                        <br/>
                                    <a href="#" class="text-center margin-top-10">Not to Quardian? Create Your Account</a>
                                    </div>
                                </div>
                                <hr>
                                <div class="product-list">
                                    <h1><span>2</span> Product List</h1>
                                    <div class="product cart-flex">
                                        <div class="product-image">
                                            <img src="images/product-01.jpg">
                                        </div>
                                        <div class="product-price"><i class="fa fa-inr" aria-hidden="true"></i> 8000</div>
                                        <div class="product-quantity">
                                            <input type="number" value="1" min="1">
                                        </div>
                                        <div class="product-removal">
                                            <button class="remove-product">
                                                Remove
                                            </button>
                                        </div>
                                        <div class="product-line-price"><i class="fa fa-inr" aria-hidden="true"></i> 8000</div>
                                    </div>
                                </div>
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