<?php

if ($_POST['name']) {



    $name = $_REQUEST['name'];

    $email = $_REQUEST['email'];

    $mobile = $_REQUEST['mobile'];

    $select_role = $_REQUEST['select_role'];

    $address_1 = $_REQUEST['address_1'];

    $address_2 = $_REQUEST['address_2'];

    $message1 = $_REQUEST['message'];

    //$filename = $_FILES['pic']['name'];
    $temp_name =  $_FILES['resume']['tmp_name'];
    //$extension = strtolower($this->getExtension($filename));
    $temp_file_name = $_FILES['resume']['name'];
    $temp_file_path = 'uploads/' . $temp_file_name;
    move_uploaded_file($temp_name, $temp_file_path);

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

    $mail->Subject = "Career Form Submited" . date('d-m-y H:i:s');

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
            <h1 style = "color:#ffffff;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:center"><img src = "http://enpeekkl.com/images/logo-enpee-international-school.png" alt = "ENPEEKKL" style = "width:50%" /></h1>
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
            <h3 style = "margin:0 0 16px; text-align:center;">Job Enquiry</h3>
            <p style = "margin:0 0 16px">Name: ' . $name . '</p>
            <p style = "margin:0 0 16px">Email: ' . $email . '</p>
            <p style = "margin:0 0 16px">Phone Number: ' . $mobile . '</p>
            <p style = "margin:0 0 16px">Job Role: ' . $select_role . '</p>
            <p style = "margin:0 0 16px">Address-1: ' . $address_1 . '</p>
            <p style = "margin:0 0 16px">Address-2: ' . $address_2 . '</p>
            <p style = "margin:0 0 16px">Message: ' . $message1 . '</p>
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
    // Always set content-type when sending HTML email

    $headers = "MIME-Version: 1.0" . "\r\n";

    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

    // headers for attachment 
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

    $mail->Body = $message;

    // More headers

    $address = "info@enpeekkl.com";
    //$attach = $_FILES['pic'];


    $mail->AddAddress($address, "ENPEEKKL");
    $mail->AddCC('npschoolkkl@gmail.com', 'ENPEEKKL');
    $mail->AddCC('arrchanac@gmail.com', 'ENPEEKKL');
    $mail->AddAttachment($temp_file_path);




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

