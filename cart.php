<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>

    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
        <div class="site-wrap">
            <div class="site-mobile-menu site-navbar-target">
                <div class="site-mobile-menu-header">
                    <div class="site-mobile-menu-close mt-3">
                        <span class="icon-close2 js-menu-toggle"></span>
                    </div>
                </div>
                <div class="site-mobile-menu-body"></div>
            </div>
            <?php include 'menu.php'; ?>
            <div class="site-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Your Cart</h2>
                        </div>
                        <div class="col-md-3">
                            <a href="#"><h4>Continue Shooping</h4></a>
                        </div>
                        <div class="col-md-3">
                            <a href="#"><button class="btn btn-black rounded-0"><h4>Place Order</h4></button></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="width: 10%">Item</th>
                                        <th>Name</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th align="center"><span id="amount" class="amount">Amount</span></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="images/item.jpg" style="width: 80%"></td>
                                        <td>Bogorchid Black</td>
                                        <td><p><input type="hidden" value="200" class="price">Rs.1887</p></td>
                                        <td>
                                            <input type="hidden" name="mode" value="PinRequest" />
                                            <select name="tot_pin_requested" onchange="calculateAmount(this.value)" required>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </td>
                                        <td>Rs. <input class="w3-input w3-border" name="tot_amount" id="tot_amount" type="text" readonly style="background: transparent;border: none"></td>
                                        <td><span class="icon-cancel"></span></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <?php include 'footer.php'; ?>


        </div>
    </body>
    <script>
        function calculateAmount(val) {
            var tot_price = val * 1887;
            /*display the result*/
            var divobj = document.getElementById('tot_amount');
            divobj.value = tot_price;
        }
    </script>
</html>