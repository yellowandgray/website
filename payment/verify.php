<?php

require('config.php');
require_once '../api/include/common.php';
require_once '../api/include/thirdparty.php';
ini_set('date.timezone', 'Asia/Kolkata');
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
             
             if(isset($_SESSION['pay_student']) && count($_SESSION['pay_student'])>0) {
                 
                 $student_name = '';
                 if(isset($_SESSION['pay_student']['student_name'])) {
                     $student_name = $_SESSION['pay_student']['student_name'];
                 }
                 
                 $password = '';
                 if(isset($_SESSION['pay_student']['password'])) {
                     $password = $_SESSION['pay_student']['password'];
                 }
                 
                 
                 $confirm_password = '';
                 if(isset($_SESSION['pay_student']['confirm_password'])) {
                     $confirm_password = $_SESSION['pay_student']['confirm_password'];
                 }
                 
                 $mobile = '';
                 if(isset($_SESSION['pay_student']['mobile'])) {
                     $mobile = $_SESSION['pay_student']['mobile'];
                 }
                 
                 $email = '';
                 if(isset($_SESSION['pay_student']['email'])) {
                     $email = $_SESSION['pay_student']['email'];
                 }
                 
                 $practice_medium = '';
                 if(isset($_SESSION['pay_student']['practice_medium'])) {
                     $practice_medium = $_SESSION['pay_student']['practice_medium'];
                 }
                 
                 
                 $student_id = $obj->insertRecord(array('student_name' => $student_name,  'password' => $password, 'confirm_password' => $confirm_password, 'mobile' => $mobile, 'email' => $email, 'practice_medium'=> $practice_medium,  'created_at'=>date('Y-m-d H:i:S')), 'student_register');
                 $payment_amt = 1;
                 
                 $obj->insertRecord(array('student_id'=>$student_id,'payment_amount'=>$payment_amt,'payment_status'=>1,'payment_succ_ref'=>$_POST['razorpay_payment_id'],'created_at'=>date('Y-m-d H:i:s')),'student_payment');
                 unset($_SESSION['pay_student']);
                 
                 $_SESSION['payment_info']['student_name'] = $student_name;
                 
                 $sel_stud = $obj->selectRow('*', 'student_register', 'student_register_id = ' .$student_id);
                $from_mail = 'learn@examhorse.com';
                $from_mail_name = '';

        $subject = 'Examhorse User Account';
        $body = '<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 800px; margin: 0 auto; border: 1px dotted #ed1c24;">
            <tbody>
               
                <tr>
                    <td colspan="3" style="padding: 15px;">
                        <p>Dear ' . $sel_stud['student_name'] . ',</p>                       
                        <p>Thank you for joining ExamHorse.com - the Online Platform to reach your successful Government Job.</p>					
                        <p>ExamHorse offers the concept of Micro-Learning to become the master of each and every exam related topic. Currently, all the past 16-year Original Question Papers and the 2020 new syllabus Model Question Paper are given along with the answers,explanation, and important additional information needed for the upcoming exams</p>
                        <br>
                        <p> To start using the product, please follow the instruction given below:</p>
                        <br>
                        <p>1. Go to www.examhorse.com</p>
                        <p>2. Enter your username and password</p>
                        <br>
                        <p>Once you login to your account, you can find the Practice Test option of either in Tamil or in English and Year wise or Syllabus/Unit-Topic wise. Proceed to explore all the options. </p>
                        <br>
                        <p>Note: Kindly find the E-Receipt attached, amount once paid is not refundable</p>
                        <br>
                        <p>Best Wishes!</p>
                        <br>
                        <p>If you have any questions, please send us an email to support@examhorse.com</p>
                        <br>
                        <p>Happy Practicing!</p>
                    </td>
                </tr>
               
            </tbody>
        </table>
    </body>
</html>';

        $tpty = new Thirdparty();
        $tpty->sendMail($sel_stud['email'], $sel_stud['student_name'], $body, $body, $subject, $from_mail, $from_mail_name, '', '', '', '');
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
