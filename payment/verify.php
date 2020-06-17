<?php

require('config.php');
require_once '../api/include/common.php';
session_start();

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";
$obj = new Common();

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
            /*
        	$html = "<p>Your payment was successful</p>
                <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
             */
    
             
             $_SESSION['payment_info'] = array('payment_status'=>'success','payment_id'=>$_POST['razorpay_payment_id']);
             
    
             if(isset($_SESSION['register_pay'])) {
                 $student_id = $_SESSION['register_pay']['student_id'];
                 $payment_amt = $_SESSION['register_pay']['amount'];
                 
                 $obj->insertRecord(array('student_id'=>$student_id,'payment_amount'=>$payment_amt,'payment_status'=>1,'payment_succ_ref'=>$_POST['razorpay_payment_id'],'created_at'=>date('Y-m-d H:i:s')),'student_payment');
                 unset($_SESSION['register_pay']);
             }
    
             header('Location:../payment-page');
             
			 
			 
}
else
{
    /*
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
     * 
     */
           
      $_SESSION['payment_info'] = array('payment_status'=>'failed');
      
       if(isset($_SESSION['register_pay'])) {
                 $student_id = $_SESSION['register_pay']['student_id'];
                 $payment_amt = $_SESSION['register_pay']['amount'];
                 
                 $obj->insertRecord(array('student_id'=>$student_id,'payment_amount'=>$payment_amt,'payment_status'=>0,'created_at'=>date('Y-m-d H:i:s')),'student_payment');
                 unset($_SESSION['register_pay']);
             }
       header('Location:../payment-page');
}

//echo $html;
