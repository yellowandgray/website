<?php

require_once 'thirdparty.php';
require_once 'common.php';

class DbHandler {

    private $conn;

    function __construct() {
        require_once dirname(__FILE__) . '/DbConnect.php';
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

    public function sendNotifications() {
        $tpry = new thirdparty();
        $com = new Common();
        $data = $com->selectAllWithWhere('notifications', 'status=0');
        if (count($data) > 0) {
            foreach ($data as $val) {
                switch ($val['type']) {
                    case 'sms':
                        $tpry->sendSMS(array($val['to_email']), $val['body']);
                        break;
                    case 'email':
                        $tpry->sendMail($val['to_email'], $val['to_name'], $val['body'], $val['body'], $val['subject'], $val['from_email'], $val['from_name'], $val['attachment_url'], $val['attachment_name'], $val['cc_email'], $val['cc_name']);
                        break;
                    default;
                        break;
                }
                $com->updateRecordWithWhere(array('status' => 1), 'notifications', 'ID=' . $val['ID']);
            }
        }
    }

    public function addNotification($data, $id, $type) {
        date_default_timezone_set('Asia/Kolkata');
        $com = new Common();
        switch ($type) {
            case 'register':
                $tpry = new Thirdparty();
                $email_user = $com->selectRowWithWhere('templates', 'name=\'register\' AND type=\'email\' AND target=\'user\'');
                $email_admin = $com->selectRowWithWhere('templates', 'name=\'register\' AND type=\'email\' AND target=\'admin\'');
                $sms_user = $com->selectRowWithWhere('templates', 'name=\'register\' AND type=\'sms\' AND target=\'user\'');
                $email_user_body = $com->getReplacedString($email_user['body_web'], $data);
                $email_admin_body = $com->getReplacedString($email_admin['body_web'], $data);
                $sms_user_body = $com->getReplacedString($sms_user['body_web'], $data);
                $com->insertRecord(array('subject' => $email_user['subject'], 'body' => $email_user_body, 'type' => 'email', 'to_email' => $data['email'], 'attachment_url' => '', 'attachment_name' => '', 'from_email' => $email_user['mail'], 'from_name' => $email_user['mail_name'], 'to_name' => $data['name'], 'cc_email' => $email_user['cc'], 'cc_name' => $email_user['cc_name'], 'created_at' => date('Y-m-d H:i:s')), 'notifications');
                $com->insertRecord(array('subject' => $email_admin['subject'], 'body' => $email_admin_body, 'type' => 'email', 'to_email' => $email_admin['mail'], 'attachment_url' => '', 'attachment_name' => '', 'from_email' => $data['email'], 'from_name' => $data['name'], 'to_name' => $email_admin['mail_name'], 'cc_email' => $email_admin['cc'], 'cc_name' => $email_admin['cc_name'], 'created_at' => date('Y-m-d H:i:s')), 'notifications');
                $tpry->sendSMS(array($data['mobile']), $sms_user_body);
                break;
            case 'forgot_password':
                $tpry = new Thirdparty();
                $email_user = $com->selectRowWithWhere('templates', 'name=\'forgot_password\' AND type=\'email\' AND target=\'user\'');
                $email_user_body = $com->getReplacedString($email_user['body'], $data);
                $tpry->sendMail($data['email'], $data['name'], $email_user_body, $email_user_body, $email_user['subject'], $email_user['to_email'], $email_user['to_name'], '', '', $email_user['cc_email'], $email_user['cc_name']);
                break;
            default:
                break;
        }
    }

}
