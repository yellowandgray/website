<?php

$firstname = $_REQUEST["firstname"];
$lastname = $_REQUEST["lastname"];
$email = $_REQUEST["email"];
$subject = $_REQUEST["subject"];
$website = $_REQUEST["website"];
$message = $_REQUEST["message"];

//require_once('PHPMailer/class.phpmailer.php');
//$mail = new PHPMailer();

$body = "<h1 style='background:#004976;color:#fff;'>Student Registration</h1><br/>" .
        "<table style='background:#004976;color:#fff'>
			
			<tr><td style='background:#004976;color:#fff;border:1px solid #ccc;'>Name of Student: </td><td style='background:#c4cb02;color:#000;border:1px solid #ccc;'>{$txtsname}</td></tr>
			<tr><td style='background:#004976;color:#fff;border:1px solid #ccc;'>Student Age: </td><td style='background:#c4cb02;color:#000;border:1px solid #ccc;'>{$txtage}</td></tr>
			<tr><td style='background:#004976;color:#fff;border:1px solid #ccc;'>Contact No: </td><td style='background:#c4cb02; color:#000;border:1px solid #ccc;'>{$txtscontact}</td></tr>
			<tr><td style='background:#004976;color:#fff;border:1px solid #ccc;'>Email: </td><td style='background:#c4cb02;color:#000;border:1px solid #ccc;'>{$txtfmail}</td></tr>
			<tr><td style='background:#004976;color:#fff;border:1px solid #ccc;'>Parent Name: </td><td style='background:#c4cb02;color:#000;border:1px solid #ccc;'>{$txtparentname}</td></tr>
			<tr><td style='background:#004976;color:#fff;border:1px solid #ccc;'>Preferred Location: </td><td style='background:#c4cb02;color:#000;border:1px solid #ccc;'>{$txtlocation}</td></tr>		
			<tr><td style='background:#004976;color:#fff;border:1px solid #ccc;'>Other Location: </td><td style='background:#c4cb02;color:#000;border:1px solid #ccc;'>{$txtothers}</td></tr>		
			</table>	
			"; //file_get_contents('contents.html');
//$body = preg_replace('/[\]/', '', $body);
//
//$mail->IsSMTP(); // telling the class to use SMTP
////$mail->Host = "relay-hosting.secureserver.net"; // SMTP server
//$mail->SMTPDebug = 2;                     // enables SMTP debug information (for testing)
////$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
//                                           // 1 = errors and messages
//                                           // 2 = messages only
//$mail->SMTPAuth   = true;                  // enable SMTP authentication
//$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
//$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
//$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
//$mail->Username   = "enquiry.alohaindia@gmail.com";  // GMAIL username
//$mail->Password   = "Admin@4blocksinc";  
//$mail->SMTPSecure = 'ssl';
////$mail->Timeout = 3600;
//
//$mail->SetFrom('enquiry.alohaindia@gmail.com', 'Aloha India');
//
////$mail->AddReplyTo("info@ygbeta.in", "First Last");
//
//$mail->Subject = "Student Registration";
//
////$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
//
//$mail->MsgHTML($body);
//
//$address = "fido2cool.ak@gmail.com";
//$mail->AddAddress($address, "Aloha India");
//
//if (!$mail->Send()) {
//    echo "Mailer Error: " . $mail->ErrorInfo;
//    $status = array('status' => false, 'message' => 'Mail sent failed');
//} else {
//    echo "Message sent!";
//       $status = array('status' => true, 'message' => 'Mail sent successfully');
//}

if (mail('4blocksinc.com@gmail.com', 'test', 'test')) {
    $status = array('status' => true, 'message' => 'Mail sent successfully');
} else {
    $status = array('status' => false, 'message' => 'Mail sent failed');
}
echo json_encode($status);
?>
