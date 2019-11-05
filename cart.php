
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
                        <h1 class="mb-0 bread">About</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home-</a></span> <span class="mr-2"></span> <span>About</span></p>

                    </div>
                </div>
            </div>
        </div>

        <section class="ftco-section">
            <div class="pad-lr-80">
                <div class="row">
                    <div class="col-lg-12 pl-md-5 ftco-animate pad-80">
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
<!--                                    <div class="row">
                                        <input type="submit" value="Continue to checkout" class="btn">
                                    </div>-->
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
                    </div>
                </div>
            </div>
        </section>


        <?php include 'footer.php'; ?>
    </body>
</html>