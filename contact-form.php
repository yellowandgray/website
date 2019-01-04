<?php

if ($_POST['cname']) {
    $name = $_REQUEST['first_name'];
    $email = $_REQUEST['email'];
    $sex = $_REQUEST['radio'];
    $phone = $_REQUEST['phone'];
    $country = $_REQUEST['country'];
    $state = $_REQUEST['state'];
    $qualification = $_REQUEST['qualification'];
    $keyskills = $_REQUEST['keyskills'];
    $exp = $_REQUEST['experience'];
    $position = $_REQUEST['position_applying'];
    $target = "uploads/";
//    $resume = $target . date('m-d-Y') . '_' . $_FILES['pic'];
//    //array_push($foovalue, $resume);
//    move_uploaded_file($_FILES['tmp_name'], $resume);
    $to = "ashok@4blocksinc.com";
    $subject = "Career form submited" . date('d-m-y H:i:s');

    $message = "
    <html>
    <head>
    <title>Career form submited</title>
    </head>
    <body>
    <p>Career form submited</p>
    <table style='background:#004976;color:#fff'>
    <tr>
        <td style='background:#004976;color:#fff;'>Name</td>
        <td style='background:#004976;color:#fff;'>" . $name . "</td>
    </tr>
    <tr>
        <td style='background:#004976;color:#fff;'>Email</td>";
    $message .= "<td style='background:#004976;color:#fff;'>$email</td>";
    $message .= "</tr>
    <tr>
        <td style='background:#004976;color:#fff;'>Gender</td>
        <td style='background:#004976;color:#fff;'>" . $sex . "</td>
    </tr>
    <tr>
        <td style='background:#004976;color:#fff;'>Phone Number</td>";
    $message .= "<td style='background:#004976;color:#fff;'>$phone</td>";

    $message .= "</tr>
    <tr>
        <td style='background:#004976;color:#fff;'>Country</td>
        <td style='background:#004976;color:#fff;'>" . $country . "</td>
    </tr>
    <tr>
        <td style='background:#004976;color:#fff;'>State</td>
        <td style='background:#004976;color:#fff;'>" . $state . "</td>
    </tr>
    <tr>
        <td style='background:#004976;color:#fff;'>Qualification</td>
        <td style='background:#004976;color:#fff;'>" . $qualification . "</td>
    </tr>
    <tr>
        <td style='background:#004976;color:#fff;'>Skills</td>
        <td style='background:#004976;color:#fff;'>" . $keyskills . "</td>
    </tr>
    <tr>
        <td style='background:#004976;color:#fff;'>Experience</td>
        <td style='background:#004976;color:#fff;'>" . $exp . "</td>
    </tr>
    <tr>
        <td style='background:#004976;color:#fff;'>Position Applying</td>
        <td style='background:#004976;color:#fff;'>" . $position . "</td>
    </tr>
    <tr>
        <td style='background:#004976;color:#fff;'>Latest Presentation</td>
        <td style='background:#004976;color:#fff;'>";
    //$message .= "<a href='http://lemonandshadow.com/stocklink/" . $resume . "'>Click To View</a>";
    $message .="</td></tr>
    </table>
    </body>
    </html>
    ";
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <webmaster@example.com>' . "\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "mail sent";
//        echo "<script> window.location = 'http://lemonandshadow.com/stocklink/startup-corner.html'; </script>";
    } else {
        echo "error";
    }
}
?>