<?php

require_once 'textlocal.class.php';
require_once 'PHPMailer/class.phpmailer.php';

class thirdparty {

    private $conn;

    function __construct() {
        require_once dirname(__FILE__) . '/DbConnect.php';
// opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

    public function sendMail($to_id, $to_name, $body_web, $body_mobile, $subject, $from_url, $from_name, $attach_url, $attach_name, $bcc, $bcc_name) {
        $mail = new PHPMailer();  // create a new object
        $mail->From = $from_url;
        $mail->FromName = $from_name;
        $mail->AddReplyTo($from_url, $from_name); //reply-to address
        $mail->Subject = $subject;
        if ($attach_url !== '') {
            $mail->AddAttachment($attach_url, $attach_name);
        }
        if ($bcc !== '') {
            $mail->AddBcc($bcc, $bcc_name);
        }
        $mail->Body = $body_web;
        $mail->AltBody = $body_mobile;
        $mail->AddAddress($to_id, $to_name);
        $mail->Send();
    }

    public function sendSMS($numbers, $message) {
        try {
            $configs = $this->getLocalTextConfigs();
            $sender = trim($configs['txtlcl_sender']);
            $textlocal = new Textlocal(trim($configs['txtlcl_email']), trim($configs['txtlcl_api']));
            $textlocal->sendSms($numbers, $message, $sender);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function getLocalTextConfigs() {
        $data = [];
        $result = $this->conn->query('SELECT * FROM `configs` WHERE `name` IN (\'txtlcl_sender\', \'txtlcl_email\', \'txtlcl_api\')');
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[$row['name']] = trim($row['value']);
            }
        }
        return $data;
    }

}
