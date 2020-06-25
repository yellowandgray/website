<?php

require('config.php');
require('razorpay-php/Razorpay.php');
require_once '../api/include/common.php';
session_start();

// Create the Razorpay Order

use Razorpay\Api\Api;

if(isset($_SESSION['pay_student']) && count($_SESSION['pay_student'])>0) {
    
    $email = '';
    $mobile = '';
    $stud_name = '';
    
    if(isset($_SESSION['pay_student']['email'])) {
        $email = $_SESSION['pay_student']['email'];
    }
    
    if(isset($_SESSION['pay_student']['mobile'])) {
        $mobile = $_SESSION['pay_student']['mobile'];
    }
    
     if(isset($_SESSION['pay_student']['student_name'])) {
        $stud_name = $_SESSION['pay_student']['student_name'];
    }

	

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => 3456,
    'amount'          => 499 * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'manual';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
{
    $checkout = $_GET['checkout'];
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => "Exam Horse",
    "description"       => "Membership Cost",
    "image"             => "https://examhorse.com/img/logo.png",
    "prefill"           => [
    "name"              => $stud_name,
    "email"             => $email,
    "contact"           => $mobile,
    ],
    "notes"             => [
    "address"           => "Hello World",
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

require("checkout/{$checkout}.php");


}
