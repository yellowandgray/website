<?php

class user {

    private $conn;

    function __construct() {
        require_once dirname(__FILE__) . '/DbConnect.php';
// opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

    public function create($param) {
        $response = array('error' => true, 'message' => 'Unable to register');
        $exist = $this->checkEmailRMobileExist($param['email'], $param['mobile']);
        if (!$exist) {
            $obj = new common();
            unset($param['ID']);
            $result = $obj->insertRecord($param, 'users');
            if ($result > 0) {
                //session_start();
                $_SESSION['ID'] = $this->conn->insert_id;
                $_SESSION['name'] = $param['name'];
                $param['ID'] = $result;
                $response = array('error' => false, 'message' => 'Registered successfully', 'data' => $param);
            }
        } else {
            $response = array('error' => true, 'message' => 'Mobile number or email already exits');
        }
        return $response;
    }

    public function checkEmailRMobileExist($email, $mobile) {
        $res = false;
        $result = $this->conn->query('SELECT * FROM `users` WHERE `mobile` = \'' . $mobile . '\' OR `email` = \'' . $email . '\'');
        if ($result->num_rows > 0) {
            $res = true;
        }
        return $res;
    }

    public function login($param) {
        $response = array('error' => true, 'message' => 'No user found');
        $result = $this->conn->query('SELECT * FROM `users` WHERE `email` = \'' . $param['login_email'] . '\' AND `user_password` = \'' . $param['login_password'] . '\'');
        //$obj = new common();
        if ($result->num_rows > 0) {
            //$update_param = [];
            //session_start();

            $response['error'] = false;
            $response['message'] = 'Logged in successfully';
            $user = $result->fetch_assoc();
//            if ($user['verified'] == 0) {
//                $response['message'] = 'Please verify your mobile number';
//                $otp_config = $obj->selectRowWithWhere('configs', 'name = \'otp_length\'');
//                $update_param['otp'] = mt_rand(str_repeat(9, ($otp_config['value']) - 1) + 1, str_repeat(9, $otp_config['value']));
//                $this->sendOTP($user['mobile'], $update_param['otp']);
//            }
//            $update_param['uuid'] = uniqid();
//            $update_param['device_token'] = $param['device_token'];
//            $obj->updateRecordWithWhere($update_param, 'users', 'ID = ' . $user['ID']);
//            $this->sendDeviceUUID($user['email'], $user['name'], $update_param['uuid'], 'login');
            $_SESSION['ID'] = $user['ID'];
            $_SESSION['name'] = $user['name'];
            $response['data'] = $user;
        }
        return $response;
    }

    public function register($param) {
        $res = array('error' => true, 'message' => 'Mobile number already exist');
        $table = 'users';
        $where = 'mobile = \'' . $param['mobile'] . '\'';
        $obj = new common();
        $data = $obj->selectRowWithWhere($table, $where);
        if (count($data) === 0) {
            $otp_config = $obj->selectRowWithWhere('configs', 'name = \'otp_length\'');
            $param['uuid'] = uniqid();
            $param['otp'] = mt_rand(str_repeat(9, ($otp_config['value']) - 1) + 1, str_repeat(9, $otp_config['value']));
            $insertion = $obj->insertRecord($param, $table);
            if ($insertion > 0) {
                $this->sendOTP($param['mobile'], $param['otp']);
                $this->sendDeviceUUID($param['email'], $param['name'], $param['uuid'], 'register');
                $user = $obj->selectRowWithWhere('users', 'ID = ' . $insertion);
                $res = array('error' => false, 'message' => 'Please verify your mobile number', 'data' => $user);
            }
        }
        return $res;
    }

    public function verifyCode($param) {
        $res = array('error' => true, 'message' => 'Invalid verification code');
        $table = 'users';
        $where = 'ID = \'' . trim($param['ID']) . '\' AND otp = \'' . trim($param['otp']) . '\'';
        $obj = new common();
        $data = $obj->selectRowWithWhere($table, $where);
        if (count($data) > 0) {
            $fields = array('verified' => 1);
            $return = $obj->updateRecordWithWhere($fields, $table, $where);
            if ($return > 0) {
                $res = array('error' => false, 'message' => 'Verified successfully');
            }
        }
        return $res;
    }

    public function resendCode($param) {
        $res = array('error' => true, 'message' => 'Unable to send code');
        $table = 'users';
        $where = 'ID = \'' . trim($param['ID']) . '\'';
        $obj = new common();
        $data = $obj->selectRowWithWhere($table, $where);
        if (count($data) > 0) {
            $this->sendOTP($data['mobile'], $data['otp']);
            $res = array('error' => false, 'message' => 'Code sent successfully');
        }
        return $res;
    }

    public function makePayment($param) {
        $res = array('error' => true, 'message' => 'Unable to send code');
        $obj = new common();
        require_once "payment_integration.php";
        $course = $obj->selectRowWithWhere('course', 'ID=' . $param['course_id']);
        $user = $obj->selectRowWithWhere('users', 'ID=' . $param['user_ID']);
        $payment = new payment();
        $datenow = date("d/m/Y h:m:s");
        $tnx_ids = rand(0, 999999);
        $uid = uniqid();
        $amts = $course['fees'];
        $names = $param['name'];
        $emais = $param['email'];
        $mobiles = $param['mobile'];
        $addresss = $param['address'] . ' ' . $param['address2'];
        $modifiedDate = str_replace(" ", "%20", $datenow);
        $payment->url = "https://payment.atomtech.in/paynetz/epi/fts";
        $postFields = "";
        $postFields .= "&login=17995";
        $postFields .= "&pass=PONDICHERRY@123";
        $postFields .= "&ttype=NBFundTransfer";
        $postFields .= "&prodid=PONDICHERRY";
        $postFields .= "&amt=" . $amts;
        $postFields .= "&txncurr=INR";
        $postFields .= "&txnscamt=0";
        $postFields .= "&clientcode=" . urlencode(base64_encode($param['user_ID']));
        $postFields .= "&txnid=" . $tnx_ids;
        $postFields .= "&date=" . $modifiedDate;
        $postFields .= "&custacc=123456";
        $postFields .= "&udf1=" . $names;
        $postFields .= "&udf2=" . $emais;
        $postFields .= "&udf3=" . $mobiles;
        $postFields .= "&udf4=" . $addresss;
        $postFields .= "&ru=" . RESPONSE_URL . "response.php?orderId=" . $uid;
        // Not required for merchant
        //$postFields .= "&bankid=".$_POST['bankid'];
        $sendUrl = $payment->url . "?" . substr($postFields, 1) . "\n";
        $returnData = $payment->sendInfo($postFields);
        $xmlObjArray = $this->xmltoarray($returnData);
        $url = $xmlObjArray['url'];
        $postFields = "";
        $postFields .= "&ttype=NBFundTransfer";
        $postFields .= "&tempTxnId=" . $xmlObjArray['tempTxnId'];
        $postFields .= "&token=" . $xmlObjArray['token'];
        $postFields .= "&txnStage=1";
        $course_name = $course['name'];
        $duration = $course['duration'];
        $coursedate = $param['course_date'];
        $totalamount = $course['fees'];
        $balanceamount = 0;
        $order_id = $uid;
        $Indos = $user['indosno'];
        $dob = $user['dob'];
        $passno = $user['passno'];
        $cdcno = $user['cdcno'];
        $this->conn->query("INSERT INTO `orders_details`(`id`, `order_id`, `Indos_No`, `Date_of_Birth`, `Name`, `email`, `Mobile`, `Address`, `trems`, `order_amount`, `course_name`, `Course_Duration`, `Total_Amount`, `Balance_Amount`, `tempTxnId`,`booking_date`,`passno`,`cdcno`) VALUES ('','$order_id','$Indos','$dob','$names','$emais','$mobiles','$addresss','1','$amts','$course_name','$duration','$totalamount','$balanceamount','$tnx_ids','$coursedate','$passno','$cdcno')");
        $url = $payment->url . "?" . $postFields;
        return array('error' => false, 'message' => 'Authenticate successfully', 'data' => $url, 'order_id' => $order_id);
    }

    function xmltoarray($data) {
        $parser = xml_parser_create('');
        xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, "UTF-8");
        xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
        xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
        xml_parse_into_struct($parser, trim($data), $xml_values);
        xml_parser_free($parser);

        $returnArray = array();
        $returnArray['url'] = $xml_values[3]['value'];
        $returnArray['tempTxnId'] = $xml_values[5]['value'];
        $returnArray['token'] = $xml_values[6]['value'];

        return $returnArray;
    }

    public function sendOTP($mobile, $otp) {
        $obj = new common();
        $thirdparty = new thirdparty();
        $data = $obj->selectRowWithWhere('templates', 'name = \'otp\' AND type = \'sms\' AND target = \'user\'');
        $replaces = array('code' => $otp);
        $string = $obj->getReplacedString($data['body_web'], $replaces);
        $thirdparty->sendSMS(array($mobile), $string);
    }
    
    public function getAllBookings() {
        $response = array('error' => true, 'message' => 'Unable to get course');
        $obj = new common();
        $result = $obj->selectAllWithoutWhere('orders_details');
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Orders fetched successfully', 'data' => $result);
        }
        return $response;
    }
    public function getAllBookingsreport($report_start_date,$report_end_date) {
        $response = array('error' => true, 'message' => 'Unable to get course');
        $obj = new common();
        $result = $obj->selectAllWithdaterange('orders_details',$report_start_date,$report_end_date);
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Reports fetched successfully', 'data' => $result);
        }
        return $response;
    }
    
    
    public function getAll() {
        $response = array('error' => true, 'message' => 'Unable to get users');
        $obj = new common();
        $result = $obj->selectAllWithoutWhere('users');
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'users fetched successfully', 'data' => $result);
        }
        return $response;
    }
         public function delete($id) {
        $response = array('error' => true, 'message' => 'Unable to delete User');
        $obj = new common();
        $result = $obj->deleteRecordWithWhere('users', 'ID=' . $id);
        if ($result > 0) {
            $response = array('error' => false, 'message' => 'User deleted successfully');
        }
        return $response;
    }

}
