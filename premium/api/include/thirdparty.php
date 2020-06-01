<?php

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
        if (filter_var($to_id, FILTER_VALIDATE_EMAIL)) {
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

    public function getPushConfigs() {
        $data = [];
        $result = $this->conn->query('SELECT * FROM `configs` WHERE `name` IN (\'push_id\', \'push_icon\')');
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[$row['name']] = trim($row['value']);
            }
        }
        return $data;
    }

    public function sendSinglePush($player, $msg, $ttl, $picture, $buttons) {
        //$players = array('id1', 'id2'), $msg = 'Message', $ttl = 'Title', $picture = 'URL', $buttons = [{"id": "id1", "text": "button1", "icon": "ic_menu_share"}, {"id": "id2", "text": "button2", "icon": "ic_menu_send"}];
        $push_config = $this->getPushConfigs();
        $fields = json_encode(array('app_id' => $push_config['push_id'], 'include_player_ids' => $player, 'data' => array("foo" => "bar"), 'contents' => array("en" => $msg), 'headings' => array("en" => $ttl), 'big_picture' => $picture, 'buttons' => array(array('id' => '3', 'text' => 'Text', 'icon' => 'ic_menu_share'), array('id' => '5', 'text' => 'Text2', 'icon' => 'ic_menu_send')), 'small_icon' => $push_config['push_icon'], 'large_icon' => $push_config['push_icon']));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Authorization: Basic NGEwMGZmMjItY2NkNy0xMWUzLTk5ZDUtMDAwYzI5NDBlNjJj'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

}
