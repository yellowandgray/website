<!DOCTYPE html>
<html lang="en">
    <?php
    include 'head.php';
    require_once 'api/include/common.php';
    $obj = new Common();
    $order = $obj->selectRow('*', 'orders', 'orders_id > 0');
    ?>
    <body class="goto-here">
        <section class="order-success-section">
            <div class="container">
                <div class="row">
                    <div class="order-success">
                        <img src="images/check-circle.gif" alt="success info">
                        <h2>Payment Successful.</h2>
                        <h4>Your order has been Successfully Placed.</h4>
                        <p>Your order reference number is <strong>#<?php echo $order['orders_id']; ?></strong></p>
                        <p>Your Transaction Id <strong><?php echo $order['transaction_id']; ?></strong></p>
                        <br/>
                        <a href="index.php"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back to Home</a>
                    </div>
                </div>
            </div>
        </section>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>