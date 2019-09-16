<?php

require_once 'PHPMailer/class.phpmailer.php';

class Thirdparty {

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
            $sender = $configs['txtlcl_sender'];
            //$textlocal = new Textlocal($configs['txtlcl_email'], $configs['txtlcl_api']);
            $textlocal = new Textlocal(false, false, $configs['txtlcl_api']);
            $textlocal->sendSms($numbers, $message, $sender);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function sendWhatsapp($numbers, $message) {

        foreach ($numbers as $number) {
            $my_apikey = "EBD1QLQEIKN61M2BS575";
            $destination = $number;
            $message = $message;
            $api_url = "http://panel.apiwha.com/send_message.php";
            $api_url .= "?apikey=" . urlencode($my_apikey);
            $api_url .= "&number=" . urlencode($destination);
            $api_url .= "&text=" . urlencode($message);
            json_decode(file_get_contents($api_url, false));
        }
    }

    public function sendWhatsappSupport($number, $message) {
        $my_apikey = "EBD1QLQEIKN61M2BS575";
        $destination = $number;
        //$messages = $message;
        $api_url = "http://panel.apiwha.com/send_message.php";
        $api_url .= "?apikey=" . urlencode($my_apikey);
        $api_url .= "&number=" . urlencode($destination);
        $api_url .= "&text=" . urlencode($message);
        json_decode(file_get_contents($api_url, false));
    }

    public function createSMSGlobalNonce($length = 10) {
        $charMap = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTWXYZ0123456789';
        $result = '';
        $size = strlen($charMap);
        for ($i = 0; $i < $length; $i++) {
            $result .= $charMap[rand(0, $size - 1)];
        }
        return $result;
    }

    public function generateMacHeader($apikey, $secret, $port, $method = 'POST', $uri = '/v2/sms/', $host = 'api.smsglobal.com', $extraData = '') {
        $timestamp = time();
        $nonce = $this->createSMSGlobalNonce();
        $rawString = $timestamp . "\n" . $nonce . "\n" . $method . "\n" . $uri . "\n" . $host . "\n" . $port . "\n" . $extraData . "\n";
        $hashHeader = base64_encode(hash_hmac('sha256', $rawString, $secret, true));
        return "MAC id=\"$apikey\", ts=\"$timestamp\", nonce=\"$nonce\", mac=\"$hashHeader\"";
    }

    public function sendSMSIndia($numbers, $message) {
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

    public function getSMSGlobalConfigs() {
        $data = [];
        $result = $this->conn->query('SELECT * FROM `configs` WHERE `name` IN (\'sms_global_url\', \'sms_global_api\', \'sms_global_secreate\', \'sms_global_port\')');
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[$row['name']] = trim($row['value']);
            }
        }
        return $data;
    }

    public function getSMSShareConfigs() {
        $data = [];
        $result = $this->conn->query('SELECT * FROM `configs` WHERE `name` IN (\'sms_share_login\', \'sms_share_password\', \'sms_share_apikey\', \'sms_share_app_name\')');
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
        $obj = new common();
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

    public function sendSMSQatar($numbers, $message) {
        $configs = $this->getSMSShareConfigs();
        $postData = json_encode(array(
            'login' => $configs['sms_share_login'],
            'password' => $configs['sms_share_password'],
            'apiKey' => $configs['sms_share_apikey'],
            'appName' => $configs['sms_share_app_name']
        ));
        $ch = curl_init("https://smshare.fr/api/v2/access-token");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $reply = curl_exec($ch);
        error_log("status code: " . curl_getinfo($ch, CURLINFO_HTTP_CODE));
        error_log(curl_error($ch));    //error
        error_log($reply);             //success
        curl_close($ch);
        $data = json_decode($reply);
        $this->sendToQatarNumber($numbers, $message, $data->token);
    }

    public function sendToQatarNumber($numbers, $message, $token) {
        $sms = array();
        foreach ($numbers as $num) {
            array_push($sms, array('destination' => $num, 'message' => $message));
        }
        $postData = json_encode(array(
            'accessToken' => $token,
            'smsBeans' => $sms
        ));
        $ch = curl_init("https://smshare.fr/api/v2/sms/bulk");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $reply = curl_exec($ch);
        error_log("status code: " . curl_getinfo($ch, CURLINFO_HTTP_CODE));
        error_log(curl_error($ch));    //error
        error_log($reply);             //success
        curl_close($ch);
    }

}
