
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
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home-</a></span> <span class="mr-2"></span> <span>My Cart</span></p>

                    </div>
                </div>
            </div>
        </div>

        <section class="ftco-section" style="background-color: #f1f3f6;padding: 0px 0 0 !important;">
            <div class="pad-lr-80">
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
                                    <div class="row">
                                        <div class="col-md-12" style="margin-bottom: 10px">
                                            <div class="items-n">
                                                <div class="row" style="padding: 10px;">
                                                    <div class="col-md-3 cart-img">
                                                        <img src="images/combo.png" alt=""/>
                                                        <div class="add-num">
                                                            <input type="number" value="1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5 product-update">
                                                        <h5>Fresche Combo Pack</h5>
                                                        <p class="cart-remove"><a href="#">Remove</a></p>
                                                    </div>
                                                    <div class="col-md-4 checkout-money">
                                                        <p><i class="fa fa-inr" aria-hidden="true"></i></i> 8000.00</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row" style="padding: 10px;">
                                                    <div class="col-md-3 cart-img">
                                                        <img src="images/mini.png" alt=""/>
                                                        <div class="add-num">
                                                            <input type="number" value="1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5 product-update">
                                                        <h5>Fresche Mini Kit</h5>
                                                        <p class="cart-remove"><a href="#">Remove</a></p>
                                                    </div>
                                                    <div class="col-md-4 checkout-money">
                                                        <p><i class="fa fa-inr" aria-hidden="true"></i></i> 250.00</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 ">
                                                        <div class="add-next">
                                                            <button>UPDATE</button>
                                                        </div> 
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="margin-bottom: 10px">
                                            <div class="check">
                                                <h4><span>1</span> LOGIN</h4>
                                                <!--flow-4- after login-->
                                                <div class="flow-4">
                                                    <hr>
                                                    <h5>Vignesh V <span>+91 1234567890</span></h5>
                                                    <button>Change</button>
                                                </div>
                                            </div>
                                            <div class="bg-white">
                                                <div class="check-login">
                                                    <h4><span>1</span> LOGIN OP SIGNUP</h4>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="margin-bottom: 10px">
                                            <div class="check">
                                                <h4><span>2</span> DELIVERY ADDRESS</h4>

                                                <div class="address-flow-2">
                                                    <hr>
                                                    <h5>Vignesh V <span>+91 1234567890</span></h5>
                                                    <p>YG STUDIO,no.12, Durga colony,4th cross street,<br/>sembakkam.chennai-600073</p>
                                                    <button>Edit</button>
                                                </div>

                                            </div>
                                            <div class="bg-white">
                                                <div class="check-login">
                                                    <h4><span>2</span> DELIVERY ADDRESS</h4>
                                                </div>
                                                <!--address-flow-1-->
                                                <div class="user-address">
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Name">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Mobile number">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Pincode">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Locality">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <textarea  placeholder="Address(Area and Street)"></textarea>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="City/District/Town">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <select type="text" placeholder="State">
                                                                    <option>--Select State--</option>
                                                                    <option>Tamilnadu</option>
                                                                    <option>Kerala</option>
                                                                    <option>Andra</option>
                                                                    <option>Assam</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Landmark (Optional)">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Alternate Phone (Optional)">
                                                            </div>

                                                        </div>
                                                        <div class="row address-submit">
                                                            <div class="col-md-12">
                                                                <button type="submit">SAVE AND DELIVER HERE</button>  <button class="can"type="submit">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!--address-flow-1-->
                                                <div class="saved-address">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="check">
                                                <h4><span>3</span> PAYMENT OPTIONS</h4>
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