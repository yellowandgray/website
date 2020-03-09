<?php

class Track {

    private $conn;

    function __construct() {
        require_once dirname(__FILE__) . '/DbConnect.php';
// opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

    public function getAllByUser($uid) {
        $response = array('error' => true, 'message' => 'No tracks found');
        $obj = new common();
        $user = $obj->selectRowWithWhere('users', '`ID` = \'' . $uid . '\'');
        $invited = $obj->selectAllWithWhere('tracks', 'user_ID = ' . $uid);
        $received = [];
        $query = $this->conn->query('SELECT `t`.*, `u`.`name`, `u`.`mobile` FROM `tracks` AS `t` LEFT JOIN `users` AS `u` ON `u`.`ID` = `t`.`user_ID` WHERE `t`.`to_user_mobile` = \'' . $user['mobile'] . '\'');
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $received[] = $row;
            }
        }
        if (count($invited) > 0 || count($received) > 0) {
            $data = array('invited' => $invited, 'received' => $received);
            $response['error'] = false;
            $response['message'] = 'Records found';
            $response['data'] = $data;
        }
        return $response;
    }

    public function getPendingTrack($uid) {
        $response = array('error' => true, 'message' => 'No tracks found');
        $obj = new common();
        $result = $obj->selectRowWithWhere('tracks', '(`user_ID` = ' . $uid . ' OR `to_user_ID` = ' . $uid . ') AND `status` = 2');
        if (count($result) > 0) {
            $response['error'] = false;
            $response['message'] = 'Records found';
            $response['data'] = $result;
        }
        return $response;
    }

    public function updateStatus($params) {
        $response = array('error' => true, 'message' => 'Unable to update status');
        $obj = new common();
        $result = $obj->updateRecordWithWhere($params, 'tracks', 'ID = ' . $params['ID']);
        if ($params['status'] == 2 || $params['status'] == 0) {
            $update = $obj->updateRecordWithWhere(array('to_user_ID' => $params['updated_id']), 'tracks', 'ID = ' . $params['ID']);
        }
        if (count($result) > 0) {
            $response['error'] = false;
            $response['message'] = 'Status updated successfully';
            $response['data'] = $result;
        }
        return $response;
    }

    public function updateCoords($data) {
        $response = array('error' => true, 'message' => 'Unable to update coord');
        $coord = array('latitude' => $data['latitude'], 'longitude' => $data['longitude']);
        $obj = new common();
        $get_coords = $obj->selectRowWithWhere('tracks', 'ID=' . $data['ID']);
        $position = [];
        if ($get_coords['coords'] != null && $get_coords['coords'] != '') {
            $position[] = json_decode($get_coords['coords']);
            array_push($position, $coord);
        } else {
            $position[] = $coord;
        }
        $params = array('coords' => json_encode($position));
        $result = $obj->updateRecordWithWhere($params, 'tracks', 'ID = ' . $data['ID']);
        if (count($result) > 0) {
            $response['error'] = false;
            $response['message'] = 'Coord updated successfully';
            $response['data'] = $result;
        }
        return $response;
    }

    public function sendRequest($mobile, $name, $uid) {
        $response = array('error' => true, 'message' => 'Unable to send track request');
        $obj = new common();
        $thirdparty = new thirdparty();
        $result = $obj->selectRowWithWhere('users', 'mobile = \'' . $mobile . '\'');
        $exist = $this->checkMobileExistInTrack($mobile);
        if ($exist['error'] == false) {
            $response['error'] = false;
            $response['message'] = 'Request sent to the user';
            $to_user_ID = 0;
            if (count($result) > 0) {
                $to_user_ID = $result['ID'];
            }
            if (count($result) > 0 && $result['device_token'] != null && $result['device_token'] != '') {
                $tmpl = $obj->selectRowWithWhere('templates', 'name=\'track_request\' AND type=\'push\' AND target=\'user\'');
                $thirdparty->sendSinglePush(array($result['device_token']), $tmpl['body_mobile'], $tmpl['subject'], '', '');
            } else {
                $tmpl = $obj->selectRowWithWhere('templates', 'name=\'track_request\' AND type=\'sms\' AND target=\'user\'');
                $thirdparty->sendSMS(array($mobile), $tmpl['body_mobile']);
            }
            $fields = array('user_ID' => $uid, 'to_user_ID' => $to_user_ID, 'to_user_mobile' => $mobile, 'to_user_name' => $name, 'track_id' => uniqid());
            $obj->insertRecord($fields, 'tracks');
        } else {
            $response['message'] = $exist['message'];
        }
        return $response;
    }

    public function checkMobileExistInTrack($mobile) {
        $data = array('error' => false, 'message' => 'User available');
        $obj = new common();
        $tracks = $obj->selectRowWithWhere('tracks', 'to_user_mobile=\'' . $mobile . '\' AND status = 2');
        $result = $this->conn->query('SELECT `t`.`ID` FROM `tracks` AS `t` LEFT JOIN `users` AS `u` ON `u`.`ID` = `t`.`user_ID` AND `u`.`mobile` = \'' . $mobile . '\' WHERE `t`.`status` = 2');
        if ($result->num_rows > 0 || count($tracks) > 0) {
            $data = array('error' => true, 'message' => 'User not available! The user in another track request!!');
        }
        return $data;
    }

}
