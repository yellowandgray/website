<?php

if ($_POST['fname']) {
    $fname = $_REQUEST['fname'];
    $lname = $_REQUEST['lname'];
    $linkdin = $_REQUEST['linkdin'];
//    $business_name = $_REQUEST['business-name'];
//    $business_url = $_REQUEST['business-url'];
    $email = $_REQUEST['email'];
    $mobile = $_REQUEST['phone'];
    $their_full_name = $_REQUEST['their-full-name'];
    $about_cheryle = $_REQUEST['about-cheryl'];
    $about_current = $_REQUEST['about-current'];
    $challenges = $_REQUEST['challenges'];
    $about_life = $_REQUEST['about-life'];
    $quickly = $_REQUEST['quickly'];
    $specifically = $_REQUEST['specifically'];
    $right = $_REQUEST['right'];
    $connect = $_REQUEST['connect'];
    $finally = $_REQUEST['finally'];
    //$no_children = $_REQUEST['no_children'];
//    $preffred_classes = $_REQUEST['preffred_classes'];
//    $social_media = $_REQUEST['social_media'];
//    $subject = $_REQUEST['subject'];
//    $message = $_REQUEST['requirement'];
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

    $mail->Host = "sg2plcpnl0113.prod.sin2.secureserver.net";      // sets GMAIL as the SMTP server

    $mail->Port = 465;                   // set the SMTP port for the GMAIL server

    $mail->Username = "noreplay@cherylppinto.com";  // GMAIL username

    $mail->Password = "Admin@cheryl$";            // GMAIL password
    $mail->IsHTML(true);
    $mail->SetFrom('noreply@cherylppinto.com', 'CHERYLPPINTO');
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
            <h1 style = "color:#ffffff;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:center"><img src="http://cherylppinto.com/images/logo.png" alt = "CHERYLPPINTO" style = "width:50%" /></h1>
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
            <h3 style = "margin:0 0 16px; text-align:center;">Enquiry Form Details.</h3>
            <p style = "margin:0 0 16px"><strong>Name:</strong>' . $fname . '</p>
            <p style = "margin:0 0 16px"><strong>Last Name:</strong> ' . $lname . '</p>
            <p style = "margin:0 0 16px"><strong>Linkedin Page:</strong> ' . $linkdin . '</p>
            <p style = "margin:0 0 16px"><strong>Email:</strong> ' . $email . '</p>
            <p style = "margin:0 0 16px"><strong>Phone:</strong> ' . $mobile . '</p>
            <p style = "margin:0 0 16px"><strong>Full Name of the referred client:</strong> ' . $their_full_name . '</p>
            <p style = "margin:0 0 16px"><strong>how did you learn about Cheryl P Pinto?</strong> ' . $about_cheryle . '</p>
            <p style = "margin:0 0 16px"><strong>What do you want to be doing?</strong> ' . $about_current . '</p>
            <p style = "margin:0 0 16px"><strong>What opportunities and/or challenges are you currently facing that keep you from moving forward?</strong> ' . $challenges . '</p>
            <p style = "margin:0 0 16px"><strong>What would you most like to change about your life?</strong> ' . $about_life . '</p>
            <p style = "margin:0 0 16px"><strong>How quickly (or not) would you like to change your life? And why?</strong> ' . $quickly . '</p>
            <p style = "margin:0 0 16px"><strong>What specifically appeals to you about working with Cheryl P Pinto?</strong> ' . $specifically . '</p>
            <p style = "margin:0 0 16px"><strong>RIGHT NOW I...:</strong> ' . $right . '</p>
            <p style = "margin:0 0 16px"><strong>How would you like us to connect:</strong> ' . $connect . '</p>
            <p style = "margin:0 0 16px"><strong>Finally, on a scale of 1 to 10, how passionately do you approach life?</strong> ' . $finally . '</p>
            <p style="margin:0 0 16px">Sent From Website</p></div>
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
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $mail->Body = $message;
    // More headers
    $address = "cherylppinto@gmail.com";
    $mail->AddAddress($address, "CHERYLPPINTO");
//    $mail->AddCC('npschoolkkl@gmail.com', 'ALIAS');
//    $mail->AddCC('arrchanac@gmail.com', 'ALIAS');

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