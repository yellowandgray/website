<?php
session_start();
include('googlelogin/register-user-config.php');

require_once 'api/include/common.php';
$obj = new Common();
?>
<html lang="en">
    <?php include 'head_landing.php' ?>
    <body>
        <?php include 'menu_landing.php'; ?>
        <div id="wrapper">
            <section id="featured-1" class="new-register-section">
                <div class="container">
                    <div class="row">
                        <div class="card bg-light">
                            <article class="card-body">

                                <div class="payment-success-content">

                                    <?php
                                    if (isset($_SESSION['payment_info'])) {
                                        $payment_status = $_SESSION['payment_info']['payment_status'];
                                        if ($payment_status == 'success') {
                                            $payment_id = $_SESSION['payment_info']['payment_id'];
                                            $student_name = $_SESSION['payment_info']['student_name'];
                                            ?>
                                            <div class="payment-success-img" style="text-align: center;">
                                                <img style="width: 25%" src="img/payment-success.gif" alt="success payment" />
                                            </div>
                                            <h1>Dear <?php echo $student_name; ?>,</h1>
                                            <h3>Thank you for joining ExamHorse.com - the Online Platform to reach your successful Government Job.  </h3>
                                            <div class="form-group"><a href="member-signin" class="btn btn-primary btn-block">Go to Login</a></div>
                                            <?php
                                        }
                                        if ($payment_status == 'failed') {
                                            ?>
                                            <h1>Payment Status  : Failed</h1> 
                                            <?php
                                        }
                                    }
                                    ?>   
                                </div>
                            </article>
                        </div>
                    </div> 
                </div>
            </section>
        </div>
        <?php include 'footer_landing.php'; ?>
        <?php include 'landing_script.php'; ?>
    </body>
</html>