<?php

if ($_POST['name']) {

    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $mobile = $_REQUEST['mobile'];
    $no_children = $_REQUEST['no_children'];
    $preffred_classes = $_REQUEST['preffred_classes'];
    echo $preffred_classes;
    $subject = $_REQUEST['subject'];
    $message = $_REQUEST['message'];
    error_reporting(E_STRICT);

    require_once('PHPMailer/class.phpmailer.php');

    //include("include/PHPMailer/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

    $mail = new PHPMailer();

    $mail->IsSMTP();

    $mail->Mailer = 'smtp';

    $mail->SMTPDebug = 1;                     // enables SMTP debug information (for testing)
    // 1 = errors and messages
    // 2 = messages only

    $mail->SMTPAuth = true;                  // enable SMTP authentication

    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier

    $mail->Host = "box975.bluehost.com";      // sets GMAIL as the SMTP server

    $mail->Port = 465;                   // set the SMTP port for the GMAIL server

    $mail->Username = "noreply@enpeekkl.com";  // GMAIL username

    $mail->Password = "Admin@EnPE3Kkl";            // GMAIL password
    $mail->IsHTML(true);
    $mail->SetFrom('noreply@enpeekkl.com', 'ENPEEKKL');
    $mail->Subject = "Contact form submited" . date('d-m-y H:i:s');
    $message = "
    <table style='color:#000'>
    <tr>
        <td style='color:#000;'>Name</td>
        <td style='color:#000;'>" . $name . "</td>
    </tr>
    <tr>
        <td style='color:#000;'>Email</td>";
    $message .= "<td style='color:#000;'>$email</td>";
    $message .= "</tr>
    <tr>
        <td style='color:#000;'>Subject</td>
        <td style='color:#000;'>" . $subject . "</td>
    </tr>
    <tr>
        <td style='background:color:#000;'>Programs Preffred</td>";
    foreach ($_POST['preffred_classes'] as $names) {
        $message .= "<td style='background:#004976;color:#fff;'>$names</td>";
    }


    $message .="</td></tr>
    <tr>
        <td style='color:#000;'>Message</td>";
    $message .= "<td style='color:#000;'>$message</td>";

    $message .="</td></tr>
    </table>
    ";
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $mail->Body = $message;
    // More headers
    $address = "noreply@enpeekkl.com";

    $mail->AddAddress($address, "ENPEEKKL");

    if (!$mail->Send()) {
        echo "error";
//        echo "<script> window.location = 'http://lemonandshadow.com/stocklink/startup-corner.html'; </script>";
    } else {
        echo "<script> window.location = 'http://enpeekkl.com'; </script>";
        echo "Thank you for applying";
        //print_r(error_get_last());
    }
}
?>
