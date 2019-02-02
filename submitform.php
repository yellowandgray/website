<?php

require_once('PHPMailer/class.phpmailer.php');
$res = array('error' => true, 'message' => 'Unable to submit your form');
$data = $_POST['data'];
$body = '<table><tbody><tr><td colspan="2">Dear Admin, <br/><br/>New form submitted following are the details.</td></tr>';
foreach ($data as $val) {
    $body = $body . '<tr><td>' . $val['label'] . '</td><td>' . $val['value'] . '</td></tr>';
}
$body = $body . '</tbody></table>';
$mail = new PHPMailer();
$mail->From = 'info@alias-innovation.com';
$mail->FromName = 'Alisa Innovation';
$mail->AddReplyTo('mushaqdeen@gmail.com', 'Alisa Innovation');
$mail->Subject = 'Contact Form';
$mail->Body = $body;
$mail->AltBody = $body;
$mail->AddCC('umasekar098@gmail.com', 'Alisa Innovation');
$mail->AddAddress('mushaqdeen@gmail.com', 'Alisa Innovation');
if ($mail->Send()) {
    $res = array('error' => false, 'message' => 'Thank You! Your message has been sent. We will get back to you very soon!');
}
response_json($res);

function response_json($res) {
    header('Content-Type: application/json');
    //header("Content-encoding", "deflate");
    ob_start("ob_gzhandler");
    echo json_encode($res);
    ob_end_flush();
    die();
}
