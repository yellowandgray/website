<?php

class User {

    private $conn;

    function __construct() {
        require_once dirname(__FILE__) . '/DbConnect.php';
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

    public function sendOTP($mobile, $name) {
        $obj = new Common();
        $tpty = new thirdparty();
        $min = 1;
        $max = '';
        $otp_len = $obj->selectRowWithWhere('configs', 'name=\'otp_length\'');
        for ($i = 0; $i < $otp_len['value']; $i++) {
            if ($i > 0) {
                $min = $min * 10;
            }
            $max = $max . '9';
        }
        $otp = rand($min, $max);
        $tpl = $obj->selectRowWithWhere('templates', 'name=\'otp\' AND type=\'sms\' AND target=\'user\'');
        $tpl['body_web'] = $obj->getReplacedString($tpl['body_web'], array('name' => $name, 'otp' => $otp));
        $tpty->sendSMS(array($mobile), $tpl['body_web']);
        return $otp;
    }

    public function sendSignupMail($email, $name) {
        $obj = new Common();
        $decide = $obj->selectRowWithWhere('configs', 'name=\'send_signup_mail\'');
        if ($decide['value'] == 1) {
            $tpty = new thirdparty();
            $mail = $obj->selectRowWithWhere('templates', 'name=\'signup\' AND type=\'email\' AND target=\'user\'');
            $mail['body_web'] = $obj->getReplacedString($mail['body_web'], array('name' => $name));
            $mail['body_mobile'] = $obj->getReplacedString($mail['body_mobile'], array('name' => $name));
            $tpty->sendMail($email, $name, $mail['body_web'], $mail['body_mobile'], $mail['subject'], $mail['mail'], $mail['mail_name'], '', '', $mail['cc'], $mail['cc_name']);
        }
    }

    public function sendActivateMail($email, $name) {
        $obj = new Common();
        $decide = $obj->selectRowWithWhere('configs', 'name=\'send_activate_mail\'');
        if ($decide['value'] == 1) {
            $tpty = new thirdparty();
            $mail = $obj->selectRowWithWhere('templates', 'name=\'activate_user\' AND type=\'email\' AND target=\'user\'');
            $mail['body_web'] = $obj->getReplacedString($mail['body_web'], array('name' => $name));
            $mail['body_mobile'] = $obj->getReplacedString($mail['body_mobile'], array('name' => $name));
            $tpty->sendMail($email, $name, $mail['body_web'], $mail['body_mobile'], $mail['subject'], $mail['mail'], $mail['mail_name'], '', '', $mail['cc'], $mail['cc_name']);
        }
    }

    public function sendDeActivateMail($email, $name) {
        $obj = new Common();
        $decide = $obj->selectRowWithWhere('configs', 'name=\'send_deactivate_mail\'');
        if ($decide['value'] == 1) {
            $tpty = new thirdparty();
            $mail = $obj->selectRowWithWhere('templates', 'name=\'deactivate_user\' AND type=\'email\' AND target=\'user\'');
            $mail['body_web'] = $obj->getReplacedString($mail['body_web'], array('name' => $name));
            $mail['body_mobile'] = $obj->getReplacedString($mail['body_mobile'], array('name' => $name));
            $tpty->sendMail($email, $name, $mail['body_web'], $mail['body_mobile'], $mail['subject'], $mail['mail'], $mail['mail_name'], '', '', $mail['cc'], $mail['cc_name']);
        }
    }

}
