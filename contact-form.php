<?php

if ($_POST['fname']) {



    $fname = $_REQUEST['fname'];

    $email = $_REQUEST['email'];

    $phone = $_REQUEST['contact'];

    $subject = $_REQUEST['subject'];

    $message = $_REQUEST['message'];

    error_reporting(E_STRICT);



    require_once('api/include/PHPMailer/class.phpmailer.php');
    //require_once('PHPMailer/class.phpmailer.php');
    //include("include/PHPMailer/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded



    $mail = new PHPMailer();






    $mail->From = 'no-reply@ghmindia.com';
    $mail->FromName = 'Guardian health management';
    $mail->AddReplyTo('no-reply@ghmindia.com', 'Guardian health management'); //reply-to address
    $mail->Subject = "Contact Form Submited" . date('d-m-y H:i:s');

    $message = '<table border = "0" cellpadding = "0" cellspacing = "0" height = "100%" width = "100%">
            <tbody>
            <tr>
            <td align = "center" valign = "top">
            <span>
            <font color = "#888888">
            </font>
            </span>
            <span>
            <font color = "#888888">
            </font>
            </span>
            <table border = "0" cellpadding = "0" cellspacing = "0" width = "600" style = "background-color:#fdfdfd;border:1px solid #dcdcdc;border-radius:3px!important;">
            <tbody>
            <tr>
            <td align = "center" valign = "top">
            <table border = "0" cellpadding = "0" cellspacing = "0" width = "600" style = "background-color:#eee;border-radius:3px 3px 0 0!important;color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">
            <tbody>
            <tr>
            <td style = "padding:36px 48px;display:block">
            <h1 style = "color:#ffffff;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:center"><img src = "http://ghmindia.com/images/logo-01.png" alt = "Guardian health management" style = "width:25%" /></h1>
            </td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            <tr>
            <td align = "center" valign = "top">
            <table border = "0" cellpadding = "0" cellspacing = "0" width = "600">
            <tbody>
            <tr>
            <td valign = "top" style = "background-color:#fdfdfd">
            <table border = "0" cellpadding = "20" cellspacing = "0" width = "100%">
            <tbody>
            <tr>
            <td valign = "top" style = "padding:48px">
            <div style = "color:#737373;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left">
            <h3 style = "margin:0 0 16px; text-align:center;">Contact Form</h3>
            <p style = "margin:0 0 16px">Name: ' . $fname . '</p>
            <p style = "margin:0 0 16px">Email: ' . $email . '</p>
            <p style = "margin:0 0 16px">Contact: ' . $phone . '</p>
            <p style = "margin:0 0 16px">Subject: ' . $subject . '</p>
            <p style = "margin:0 0 16px">Message: ' . $message . '</p>
            <p style = "margin:0 0 16px">Sent From Website</p></div>
            </td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            <tr>
            <td align = "center" valign = "top">
            <table border = "0" cellpadding = "0" cellspacing = "0" width = "600" style = "background-color:#cccccc;border-radius:3px 3px 0 0!important;color:#ffffff;border-bottom:0;font-weight:bold;width: 100%;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">
            <tbody>
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>

            </tbody>
            </table>
            <span>
            <font color = "#888888">
            </font>
            </span>
            </td>
            </tr>
            </tbody>
            </table>';


    $mail->Body = $message;
    $mail->AltBody = $message;

    $address = "projects@yellowandgray.com";


    $mail->AddAddress($address, "Guardian health management");


    if (!$mail->Send()) {

        echo "error";

//        echo "<script> window.location = 'http://lemonandshadow.com/stocklink/startup-corner.html'; </script>";
    } else {

        $return = "OK";
        echo json_encode($return);

        //print_r(error_get_last());
    }
}
?>

