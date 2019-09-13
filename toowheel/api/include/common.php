<?php

class Common {

    private $conn;

    function __construct() {
        require_once dirname(__FILE__) . '/DbConnect.php';
// opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

    public function selectAllWithoutWhere($table) {
        $data = array();
        $result = $this->conn->query('SELECT * FROM `' . $table . '`');
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (isset($row['ID']) && $row['ID'] == 0) {
                    
                } else {
                    if (isset($row['p_h_image'])) {
                        if ($row['p_h_image'] != '') {
                            $row['p_h_image'] = IMG_BASE_URL . $row['p_h_image'];
                        } else {
                            $row['p_h_image'] = IMG_BASE_URL . 'default_preview.jpg';
                        }
                    }
                    if (isset($row['p_h_document1'])) {
                        if ($row['p_h_document1'] != '') {
                            $row['p_h_document1'] = IMG_BASE_URL . $row['p_h_document1'];
                        } else {
                            $row['p_h_document1'] = IMG_BASE_URL . 'default_preview.jpg';
                        }
                    }
                    if (isset($row['p_h_document2'])) {
                        if ($row['p_h_document2'] != '') {
                            $row['p_h_document2'] = IMG_BASE_URL . $row['p_h_document2'];
                        } else {
                            $row['p_h_document2'] = IMG_BASE_URL . 'default_preview.jpg';
                        }
                    }
                    if (isset($row['image'])) {
                        if ($row['image'] != '') {
                            $row['image'] = IMG_BASE_URL . $row['image'];
                        } else {
                            $row['image'] = IMG_BASE_URL . 'default_preview.jpg';
                        }
                    }
                    if (isset($row['path']) && strpos($row['path'], "http") === false) {
                        if ($row['path'] != '') {
                            $row['path'] = IMG_BASE_URL . $row['path'];
                        } else {
                            $row['path'] = IMG_BASE_URL . 'default_preview.jpg';
                        }
                    }
                    $data[] = $row;
                }
            }
        }
        return $data;
    }

    public function selectRowWithoutWhere($table) {
        $data = array();
        $result = $this->conn->query('SELECT * FROM `' . $table . '`');
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
        }
        return $data;
    }

    public function executeQuery($qry) {
        $result = $this->conn->query($qry);
        return $result;
    }

    public function selectAllWithWhere($table, $where) {
        $data = array();
        $result = $this->conn->query('SELECT * FROM `' . $table . '` WHERE ' . $where);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (isset($row['ID']) && $row['ID'] == 0) {
                    
                } else {
                    if (isset($row['path']) && strpos($row['path'], "http") === false) {
                        if ($row['path'] != '') {
                            $row['path'] = IMG_BASE_URL . $row['path'];
                        } else {
                            $row['path'] = IMG_BASE_URL . 'default_preview.jpg';
                        }
                    }
                    if (isset($row['p_h_image'])) {
                        if ($row['p_h_image'] != '') {
                            $row['p_h_image'] = IMG_BASE_URL . $row['p_h_image'];
                        } else {
                            $row['p_h_image'] = IMG_BASE_URL . 'default_preview.jpg';
                        }
                    }
                    if (isset($row['p_h_document1'])) {
                        if ($row['p_h_document1'] != '') {
                            $row['p_h_document1'] = IMG_BASE_URL . $row['p_h_document1'];
                        } else {
                            $row['p_h_document1'] = IMG_BASE_URL . 'default_preview.jpg';
                        }
                    }
                    if (isset($row['p_h_document2'])) {
                        if ($row['p_h_document2'] != '') {
                            $row['p_h_document2'] = IMG_BASE_URL . $row['p_h_document2'];
                        } else {
                            $row['p_h_document2'] = IMG_BASE_URL . 'default_preview.jpg';
                        }
                    }
                    if (isset($row['image'])) {
                        if ($row['image'] != '') {
                            $row['image'] = IMG_BASE_URL . $row['image'];
                        } else {
                            $row['image'] = IMG_BASE_URL . 'default_preview.jpg';
                        }
                    }
                    $data[] = $row;
                }
            }
        }
        return $data;
    }

    public function selectRowWithWhere($table, $where) {
        $data = array();
        $result = $this->conn->query('SELECT * FROM `' . $table . '` WHERE ' . $where);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $data = $row;
        }
        return $data;
    }

    public function selectRowWithWhereNoFullImgPath($table, $where) {
        $data = array();
        $result = $this->conn->query('SELECT * FROM `' . $table . '` WHERE ' . $where);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $data = $row;
        }
        return $data;
    }

    public function selectAllCustomWithoutWhere($fields, $table) {
        $data = array();
        $result = $this->conn->query('SELECT ' . implode(",", $fields) . ' FROM `' . $table . '`');
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function selectRowCustomWithoutWhere($fields, $table) {
        $data = array();
        $result = $this->conn->query('SELECT ' . implode(",", $fields) . ' FROM `' . $table . '`');
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
        }
        return $data;
    }

    public function selectAllCustomWithWhere($fields, $table, $where) {
        $data = array();
        $result = $this->conn->query('SELECT ' . implode(",", $fields) . ' FROM ' . $table . ' WHERE ' . $where);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function selectAllCustomFieldsWithWhere($fields, $table, $where) {
        $data = array();
        $result = $this->conn->query('SELECT ' . $fields . ' FROM ' . $table . ' WHERE ' . $where);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function selectRowCustomFieldsWithWhere($fields, $table, $where) {
        $data = array();
        $result = $this->conn->query('SELECT ' . $fields . ' FROM ' . $table . ' WHERE ' . $where);
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
        }
        return $data;
    }

    public function getKey() {
        $data = $this->selectRowCustomFieldsWithWhere('p.base_url, p.merchent_id, p.user_id, p.password', 'api_providers AS p', 'p.status=1');
        if (count($data) > 0) {
            try {
                $client = new SoapClient("http://202.54.157.20/wsTES/TESMethods.asmx?wsdl");
                $result = $client->Login(array('RequestData' => '<TES><MERCHANTID>' . $data['merchent_id'] . '</MERCHANTID><USERID>' . $data['user_id'] . '</USERID><PASSWORD>' . $data['password'] . '</PASSWORD></TES>'));
                $json = json_encode($xml_string);
                $client = new SoapClient(
                        null, array(
                    'location' => 'http://202.54.157.20/wsTES/TESMethods.asmx',
                    'uri' => 'http://202.54.157.20/wsTES/TESMethods.asmx?wsdl',
                    'trace' => 1
                        )
                );
                $result = $client->__doRequest('<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"><soap:Body><Login xmlns="http://tempuri.org/"><RequestData><TES><MERCHANTID>' . $data['merchent_id'] . '</MERCHANTID><USERID>' . $data['user_id'] . '</USERID><PASSWORD>' . $data['password'] . '</PASSWORD></TES></RequestData></Login></soap:Body></soap:Envelope>', 'http://202.54.157.20/wsTES/TESMethods.asmx', 'http://202.54.157.20/wsTES/TESMethods.asmx?wsdl', 1);
                $xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $result);
                $xml = simplexml_load_string($xml);
                $json = json_encode($xml);
                $result = $client->__soapCall('Login', '<TES><MERCHANTID>' . $data['merchent_id'] . '</MERCHANTID><USERID>' . $data['user_id'] . '</USERID><PASSWORD>' . $data['password'] . '</PASSWORD></TES>');
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        return $result;
    }

    public function getStation() {
        try {
            $auth = array(
                'MerchantID' => 'INMAA070001006',
                'LoginKey' => 'Vaganan1*'
            );
            $client = new SoapClient("http://115.248.39.80/wstes/TESMethods.asmx?wsdl");
            $header = new SoapHeader('http://tempuri.org/', 'AuthHeaderVB', $auth);
            $client->__setSoapHeaders($header);
            $result = $client->GetOrigin();
            $xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $result->GetOriginResult);
            $xml = simplexml_load_string($xml);
            $json = json_encode($xml);
            $json_decode = json_decode($json, true);
            foreach ($json_decode['ORIGIN']['ITEM'] as $row) {
                print 'INSERT INTO `stations` (name, code, api_provider_id) VALUES (\'' . $row['ORIGINNAME'] . '\', \'' . $row['ORIGINID'] . '\', 1);';
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function selectRowCustomWithWhere($fields, $table, $where) {
        $data = array();
        $result = $this->conn->query('SELECT ' . implode(",", $fields) . ' FROM ' . $table . ' WHERE ' . $where);
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
        }
        return $data;
    }

    public function selectFieldsRowCustomWithWhere($fields, $table, $where) {
        $data = array();
        $result = $this->conn->query('SELECT ' . $fields . ' FROM ' . $table . ' WHERE ' . $where);
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
        }
        return $data;
    }

    public function escapeString($val) {
        return mysqli_real_escape_string($this->conn, $val);
    }

    public function insertRecord($fields, $table) {
        $values = array_values($fields);
        $this->conn->query('INSERT INTO `' . $table . '` (' . implode(", ", array_keys($fields)) . ') VALUES (\'' . implode("','", array_map(array($this, 'escapeString'), $values)) . '\')');
        if ($this->conn->affected_rows > 0) {
            return $this->conn->insert_id;
        } else {
            return 0;
        }
    }

    public function insertRecordWithQry($qry) {
        $this->conn->query($qry);
        if ($this->conn->affected_rows > 0) {
            return $this->conn->insert_id;
        } else {
            return 0;
        }
    }

    public function updateRecordWithWhere($fields, $table, $where) {
        $records = [];
        foreach ($fields as $key => $val) {
            array_push($records, $key . ' = \'' . mysqli_real_escape_string($this->conn, $val) . '\'');
        }
        $this->conn->query('UPDATE `' . $table . '` SET ' . implode(',', $records) . ' WHERE ' . $where);
        return $this->conn->affected_rows;
    }

    public function updateWithWhere($fields, $table, $where) {
        $this->conn->query('UPDATE `' . $table . '` SET ' . $fields . ' WHERE ' . $where);
        return $this->conn->affected_rows;
    }

    public function getReplacedString($str, $replaces) {
        foreach ($replaces as $key => $val) {
            $str = str_replace('[' . $key . ']', $val, $str);
        }
        return $str;
    }

    public function deleteRecordWithWhere($table, $where) {
        $this->conn->query('DELETE FROM `' . $table . '` WHERE ' . $where);
        return $this->conn->affected_rows;
    }

    public function saveFile($file, $path) {
        $name = $file['name'];
        $temp_name = $file['tmp_name'];
        $extension = strtolower($this->getExtension($name));
        $key = md5(uniqid());
        $temp_file_name = $key . '.' . $extension;
        $dir = $path;
        if (!file_exists($dir)) {
            mkdir($dir);
        }
        $temp_file_path = $path . '/' . $temp_file_name;
        move_uploaded_file($temp_name, $temp_file_path);
        return $temp_file_path;
    }

    public function getExtension($str) {
        $i = strrpos($str, ".");
        if (!$i) {
            return "";
        }
        $l = strlen($str) - $i;
        $ext = substr($str, $i + 1, $l);
        return $ext;
    }

    public function removeSplChars($str) {
        $string = str_replace(' ', '-', $str); // Replaces all spaces with hyphens.
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    public function exportExcel($header, $data, $keys, $fileName, $tabName) {
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        require_once dirname(__FILE__) . '/PHPExcel.php';
        $objPHPExcel = new PHPExcel();
        $range = range('A', 'Z');
        $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")->setLastModifiedBy("Maarten Balliauw")->setTitle("PHPExcel Test Document")->setSubject("PHPExcel Test Document")->setDescription("Test document for PHPExcel, generated using PHP classes.")->setKeywords("office PHPExcel php")->setCategory("Test result file");
        foreach ($header as $key => $val) {
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($range[$key] . '1', $val);
        }
        foreach ($data as $k => $v) {
            foreach ($keys as $col => $ke) {
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($range[$col] . ($k + 2), $data[$k][$ke]);
            }
        }
        $objPHPExcel->getActiveSheet()->setTitle($tabName);
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx"');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save($fileName . '.xlsx');
    }

    public function exportPDF($header, $data, $keys, $fileName, $title, $filterleft, $filterright) {
        $dompdf = new Dompdf();
        $content = '<table cellspacing=0 cellpadding=0 style="width:100%" align="center"><tr><td style="width: 33.33%;"><img src="../img/ooredoo.png" alt="" /></td><td style="text-align: center; width: 33.33%;"><h2>Ooredoo Oman</h2></td><td style="text-align: right; width: 33.33%;"><b>Date:</b> ' . date('d/m/Y') . '</td></tr></table><div style="text-align:center;padding-top:20px;"><table cellspacing=0 cellpadding=0 style="width:100%" align="center"><thead>';
        $content .= "<tr><td colspan='9'><table cellspacing=0 cellpadding=0 style='width:100%; padding-bottom: 10px;' align='center'><tr><td style='width: 33.33%;'>" . $filterleft . "</td><td style='text-align: center;'><h4>" . $title . "</h4></td><td style='text-align: right;'>" . $filterright . "</td></tr></table></td></tr><tr>";
        foreach ($header as $key => $val) {
            if ($key < 9) {
                $content .= "<th style='padding: 10px 0; border-top: 1px solid #000000; border-bottom: 1px solid #000000;'>" . $val . "</th>";
            }
        }
        $content .= "</tr>";
        $content .= "</thead><tbody>";
        foreach ($data as $k => $v) {
            $content .= "<tr>";
            foreach ($keys as $col => $ke) {
                if ($col < 9) {
                    $value = $data[$k][$ke];
                    if ($value == '') {
                        $value = '-';
                    }
                    $content .= "<td style='padding: 10px 0;'>" . $value . "</td>";
                }
            }
            $content .= "</tr>";
        }
        $content .= "</tbody>";
        $content .= "</table></div>";
        $dompdf->loadHtml($content);
        $dompdf->setPaper('A3', 'landscape');
        $dompdf->render();
        $font = $dompdf->getFontMetrics()->get_font("helvetica", "light");
        $dompdf->getCanvas()->page_text(1050, 810, "Page: {PAGE_NUM} of {PAGE_COUNT}", $font, 10, array(0, 0, 0));
        $dompdf->getCanvas()->page_text(50, 810, "This report generated in FFA Portal - contact: sales@zearo.qa", $font, 10, array(0, 0, 0));
        $output = $dompdf->output();
        file_put_contents($fileName . '.pdf', $output);
    }

    public function getRate($rate, $tamt, $dtype, $damt, $count = 1) {
        $tax = 0;
        $discount = 0;
        if ($dtype == 'fixed') {
            $discount = $damt;
        } else {
            $discount = $rate * ($damt / 100);
        }
        if ($tamt > 0) {
            $tax = $rate * ($tamt / 100);
        }
        $total = ($rate + $tax - $discount) * $count;
        return number_format($total, 2);
    }

    public function sendOrderPlaceNotification($email, $name, $mobile, $replaces) {
        date_default_timezone_set('Asia/Riyadh');
        $obj = new Common();
        $order_place_email_user = $obj->selectRowWithWhere('configs', 'name=\'send_order_place_mail_user\'');
        $order_place_email_admin = $obj->selectRowWithWhere('configs', 'name=\'send_order_place_mail_admin\'');
        $order_place_sms_user = $obj->selectRowWithWhere('configs', 'name=\'send_order_place_sms_user\'');
        if ($order_place_email_user['value'] == 1) {
            $mail_user = $obj->selectRowWithWhere('templates', 'name=\'place_order\' AND type=\'email\' AND target=\'user\'');
            $mail_user['body_web'] = $obj->getReplacedString($mail_user['body_web'], $replaces);
            $mail_user['body_mobile'] = $obj->getReplacedString($mail_user['body_mobile'], $replaces);
            $obj->insertRecord(array('subject' => $mail_user['subject'], 'body' => $mail_user['body_web'], 'type' => 'email', 'to_email' => $email, 'attachment_url' => '', 'attachment_name' => '', 'from_email' => $mail_user['mail'], 'from_name' => $mail_user['mail_name'], 'to_name' => $name, 'cc_email' => $mail_user['cc'], 'cc_name' => $mail_user['cc_name'], 'created_at' => date('Y-m-d H:i:s')), 'notifications');
        }
        if ($order_place_email_admin['value'] == 1) {
            $mail_admin = $obj->selectRowWithWhere('templates', 'name=\'place_order\' AND type=\'email\' AND target=\'admin\'');
            $mail_admin['body_web'] = $obj->getReplacedString($mail_admin['body_web'], $replaces);
            $mail_admin['body_mobile'] = $obj->getReplacedString($mail_admin['body_mobile'], $replaces);
            $obj->insertRecord(array('subject' => $mail_admin['subject'], 'body' => $mail_admin['body_web'], 'type' => 'email', 'to_email' => $email, 'attachment_url' => '', 'attachment_name' => '', 'from_email' => $mail_admin['mail'], 'from_name' => $mail_admin['mail_name'], 'to_name' => $name, 'cc_email' => $mail_admin['cc'], 'cc_name' => $mail_admin['cc_name'], 'created_at' => date('Y-m-d H:i:s')), 'notifications');
        }
        if ($order_place_sms_user['value'] == 1) {
            $sms_user = $obj->selectRowWithWhere('templates', 'name=\'place_order\' AND type=\'sms\' AND target=\'user\'');
            $sms_user['body_web'] = $obj->getReplacedString($mail_user['body_web'], $replaces);
            $sms_user['body_mobile'] = $obj->getReplacedString($mail_user['body_mobile'], $replaces);
            $obj->insertRecord(array('subject' => $sms_user['subject'], 'body' => $sms_user['body_web'], 'type' => 'sms', 'to_email' => $mobile, 'attachment_url' => '', 'attachment_name' => '', 'from_email' => $sms_user['mail'], 'from_name' => $sms_user['mail_name'], 'to_name' => $name, 'cc_email' => $sms_user['cc'], 'cc_name' => $sms_user['cc_name'], 'created_at' => date('Y-m-d H:i:s')), 'notifications');
        }
    }

    public function sendOrderShippedNotification($orders) {
        date_default_timezone_set('Asia/Riyadh');
        $obj = new Common();
        $order_shipped_sms_user = $obj->selectRowWithWhere('configs', 'name=\'send_order_shipped_sms_user\'');
        if ($order_shipped_sms_user['value'] == 1) {
            $sms_user = $obj->selectRowWithWhere('templates', 'name=\'order_shipped\' AND type=\'sms\' AND target=\'user\'');
            $users = $this->selectAllCustomFieldsWithWhere('`u`.`mobile`,`u`.`name`, `o`.`ID` AS `order_id`', '`orders` AS `o` LEFT JOIN `users` AS `u` ON `u`.`ID` = `o`.`user_id`', '`o`.`ID` IN (' . $orders . ')');
            foreach ($users as $val) {
                $sms_content = $obj->getReplacedString($sms_user['body_web'], array('name' => $val['name'], 'order_id' => $val['order_id']));
                $obj->insertRecord(array('subject' => $sms_user['subject'], 'body' => $sms_content, 'type' => 'sms', 'to_email' => $val['mobile'], 'attachment_url' => '', 'attachment_name' => '', 'from_email' => $sms_user['mail'], 'from_name' => $sms_user['mail_name'], 'to_name' => $val['name'], 'cc_email' => $sms_user['cc'], 'cc_name' => $sms_user['cc_name'], 'created_at' => date('Y-m-d H:i:s')), 'notifications');
            }
        }
    }

    public function sendOrderDeliveredNotification($orders) {
        date_default_timezone_set('Asia/Riyadh');
        $obj = new Common();
        $order_delivered_sms_user = $obj->selectRowWithWhere('configs', 'name=\'send_order_delivered_sms_user\'');
        $order_delivered_email_user = $obj->selectRowWithWhere('configs', 'name=\'send_order_delivered_email_user\'');
        if ($order_delivered_sms_user['value'] == 1) {
            $sms_user = $obj->selectRowWithWhere('templates', 'name=\'order_delivered\' AND type=\'sms\' AND target=\'user\'');
            $users = $this->selectAllCustomFieldsWithWhere('`u`.`mobile`,`u`.`name`, `o`.`ID` AS `order_id`', '`orders` AS `o` LEFT JOIN `users` AS `u` ON `u`.`ID` = `o`.`user_id`', '`o`.`ID` IN (' . $orders . ')');
            foreach ($users as $val) {
                $sms_content = $obj->getReplacedString($sms_user['body_web'], array('name' => $val['name'], 'order_id' => $val['order_id']));
                $obj->insertRecord(array('subject' => $sms_user['subject'], 'body' => $sms_content, 'type' => 'sms', 'to_email' => $val['mobile'], 'attachment_url' => '', 'attachment_name' => '', 'from_email' => $sms_user['mail'], 'from_name' => $sms_user['mail_name'], 'to_name' => $val['name'], 'cc_email' => $sms_user['cc'], 'cc_name' => $sms_user['cc_name'], 'created_at' => date('Y-m-d H:i:s')), 'notifications');
            }
        }
        if ($order_delivered_email_user['value'] == 1) {
            $email_user = $obj->selectRowWithWhere('templates', 'name=\'order_delivered\' AND type=\'email\' AND target=\'user\'');
            $users = $this->selectAllCustomFieldsWithWhere('`u`.`mobile`, `u`.`name`, `u`.`email`, `o`.`ID` AS `order_id`', '`orders` AS `o` LEFT JOIN `users` AS `u` ON `u`.`ID` = `o`.`user_id`', '`o`.`ID` IN (' . $orders . ')');
            foreach ($users as $val) {
                $items = $obj->selectAllCustomFieldsWithWhere('`oi`.*,(SELECT `url` FROM `product_images` WHERE `product_id` = `oi`.`product_id` LIMIT 1) AS `url`,(CASE WHEN `oi`.`change_rate` = 0 THEN ROUND(`oi`.`rate` * `oi`.`count` + (`oi`.`tax` * `oi`.`rate` * `oi`.`count` / 100) - CASE WHEN `oi`.`discount_type` = \'fixed\' THEN (`oi`.`discount_amt` * `oi`.`count`) ELSE (`oi`.`discount_amt` * `oi`.`rate` * `oi`.`count` / 100) END, 2) ELSE ROUND(`oi`.`change_rate` * `oi`.`change_count` + (`oi`.`tax` * `oi`.`change_rate` * `oi`.`change_count` / 100) - CASE WHEN `oi`.`discount_type` = \'fixed\' THEN (`oi`.`discount_amt` * `oi`.`change_count`) ELSE (`oi`.`discount_amt` * `oi`.`change_rate` * `oi`.`change_count` / 100) END, 2) END) AS `amt`', '`order_items` AS `oi`', '`oi`.`order_id` = ' . $val['order_id']);
                $total = 0;
                $table = '<table><thead><tr><th>Product</th><th>Qty</th><th>Amt.</th></tr></thead><tbody>';
                foreach ($items as $item) {
                    $total = $total + $item['amt'];
                    $qty = $item['qty_name'];
                    if ($item['change_rate'] > 0) {
                        $qty = '<div>Ordered: ' . $item['qty_name'] . ' X ' . $item['count'] . '</div>';
                        $qty = $qty . '<div>Delivered: ' . $item['change_qty_name'] . ' X ' . $item['change_count'] . '</div>';
                    }
                    $table = $table . '<tr><td>' . $item['product_name'] . '</td><td>' . $qty . '</td><td>' . $item['amt'] . '</td></tr>';
                }
                $table = $table . '<tr><td colspan="2">Total:</td><td>' . number_format($total, 2) . '</td></tr>';
                $table = $table . '</tbody></table>';
                $email_content = $obj->getReplacedString($email_user['body_web'], array('name' => $val['name'], 'order_id' => $val['order_id'], 'item' => $table));
                $obj->insertRecord(array('subject' => $email_user['subject'], 'body' => $email_content, 'type' => 'email', 'to_email' => $val['email'], 'attachment_url' => '', 'attachment_name' => '', 'from_email' => $email_user['mail'], 'from_name' => $email_user['mail_name'], 'to_name' => $val['name'], 'cc_email' => $email_user['cc'], 'cc_name' => $email_user['cc_name'], 'created_at' => date('Y-m-d H:i:s')), 'notifications');
            }
        }
    }

    public function sendStoreRegisteredNotification($data) {
        $obj = new Common();
        'store_register_user_email';
        if ($this->decideNotificationSend('store_register_admin_email') == true) {
            $email_admin = $obj->selectRowWithWhere('templates', 'name=\'store_register\' AND type=\'email\' AND target=\'admin\'');
            $email_content_admin = $obj->getReplacedString($email_admin['body_web'], $data);
            $obj->insertRecord(array('subject' => $email_admin['subject'], 'body' => $email_content_admin, 'type' => 'email', 'to_email' => $email_admin['mail'], 'attachment_url' => '', 'attachment_name' => '', 'from_email' => $data['email'], 'from_name' => $data['name'], 'to_name' => $email_admin['mail_name'], 'cc_email' => $email_admin['cc'], 'cc_name' => $email_admin['cc_name'], 'created_at' => date('Y-m-d H:i:s')), 'notifications');
        }
    }

    public function sendEmailNotification($situations, $data, $attachment_url, $attachment_name) {
        foreach ($situations as $val) {
            if ($this->decideNotificationSend($val['config']) == true) {
                $template = $this->selectRowWithWhere('templates', 'name=\'' . $val['name'] . '\' AND type=\'email\' AND target=\'' . $val['target'] . '\'');
                $to_email = $template['mail'];
                $to_name = $template['mail_name'];
                $from_email = $template['mail'];
                $from_name = $template['mail_name'];
                if ($val['target'] == 'user') {
                    $to_email = $data['email'];
                    $to_name = $data['name'];
                }
                if ($val['target'] == 'admin') {
                    $from_email = $data['email'];
                    $from_name = $data['name'];
                }
                $content = $this->getReplacedString($template['body_web'], $data);
                $this->insertRecord(array('subject' => $template['subject'], 'body' => $content, 'type' => 'email', 'to_email' => $to_email, 'attachment_url' => $attachment_url, 'attachment_name' => $attachment_name, 'from_email' => $from_email, 'from_name' => $from_name, 'to_name' => $to_name, 'cc_email' => $template['cc'], 'cc_name' => $template['cc_name'], 'created_at' => date('Y-m-d H:i:s')), 'notifications');
            }
        }
    }

    public function decideNotificationSend($name) {
        $return = false;
        $record = $this->selectRowWithWhere('configs', 'name=\'' . $name . '\'');
        if ($record['value'] == 1) {
            $return = true;
        }
        return $return;
    }

    public function addImage($folder, $uri) {
        if ($uri != '') {
            $uid = uniqid();
            $img = str_replace('data:image/jpeg;base64,', '', $uri);
            $img = str_replace(' ', '+', $img);
            $avatar = base64_decode($img);
            file_put_contents($folder . '/' . $uid . '.jpg', $avatar);
            return $folder . '/' . $uid . '.jpg';
        }
        return '';
    }

    public function getHomeConfigs() {
        $configs = $this->selectAllCustomFieldsWithWhere('name,value', 'configs', 'name IN (\'home_banner\', \'logo\', \'youtube_ad\', \'offer_banner_1\', \'offer_banner_2\')');
        $data = array();
        if (count($configs) > 0) {
            foreach ($configs as $val) {
                $data[$val['name']] = $val['value'];
            }
        }
        return $data;
    }

    public function encryptPassword($pass) {
        $encrypt = password_hash($pass, PASSWORD_DEFAULT);
        return $encrypt;
    }

    public function decryptPassword($pass, $hash) {
        $encrypt = password_verify($pass, $hash);
        return $encrypt;
    }

    public function getTravelDate($date, $format) {
        return date($format, strtotime($date));
    }

    public function getSeatType($type) {
        $res = '';
        if (strpos(strtolower($type), 'sleep') !== false || strpos(strtolower($type), 'sl') !== false || strpos(strtolower($type), 'lb') !== false || strpos(strtolower($type), 'ub') !== false || strpos(strtolower($type), 'dlb') !== false || strpos(strtolower($type), 'dub') !== false || strpos(strtolower($type), 'lsl') !== false || strpos(strtolower($type), 'berth') !== false) {
            $res = 'sleeper';
        }
        if (strpos(strtolower($type), 'seat') !== false || strpos(strtolower($type), 'bs') !== false) {
            $res = 'seater';
        }
        if (strpos(strtolower($type), 'semi') !== false || strpos(strtolower($type), 'st') !== false || strpos(strtolower($type), 'ss') !== false) {
            $res = 'semi';
        }
        if (strpos(strtolower($type), 'push') !== false || strpos(strtolower($type), 'pb') !== false) {
            $res = 'push';
        }
        return $res;
    }

    public function getSearchSOAPResponse($data, $url, $from_st, $to_st, $post_params) {
        if ($data['method'] == 'post') {
            $auth = array(
                'MerchantID' => $data['merchent_id'],
                'LoginKey' => $data['api_key']
            );
            $client = new SoapClient($data['base_url']);
            $header = new SoapHeader('http://tempuri.org/', 'AuthHeaderVB', $auth);
            $client->__setSoapHeaders($header);
            $post = $this->getReplacedString($data['post_data'], $post_params); //Replacing post values
            $value = $client->SearchV3(array('RequestData' => $post));
            $xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $value->SearchV3Result);
            $xml = simplexml_load_string($xml);
            $result = json_encode($xml);
            $arr = json_decode($result, true);
        }
        $status = $this->getDecodeExplodeValue($data['success_param'], $result);
        if ($status == $data['success_value']) {
            $array_data = $arr[$data['data_param']]['ITEM']; //$this->getDecodeExplodeValue($data['data_param'], $result);
            if (isset($arr[$data['data_param']]['ITEM']['TRANSPORTNAME'])) {
                $array_data = $arr[$data['data_param']];
            }
            return $this->getBasicBusDetails($data, $array_data, $from_st, $to_st, $post_params['date']);
        }
        return [];
    }

    public function getSearchJSONResponse($data, $url, $from_st, $to_st, $post_params) {
        if ($data['method'] == 'get') {
            $result = $this->curlGETResult($data['base_url'], $url);
        } else {
            $result = $this->curlPOSTResult($data['base_url'], $url, $post_params, $data['post_data']);
        }
        if ($data['api_provider_id'] == 6) {
            $status = $this->getDecodeExplodeValue($data['success_param'], $result, 'national');
        } else if ($data['api_provider_id'] == 7) {
            $status = $this->getDecodeExplodeValue($data['success_param'], $result, 'tripList-1');
        } else {
            $status = $this->getDecodeExplodeValue($data['success_param'], $result);
        }
        if (($data['api_provider_id'] == 6 && count($status) > 0) || $status == $data['success_value']) {
            if ($data['api_provider_id'] == 6) {
                $array_data = $this->getDecodeExplodeValue($data['data_param'], $result, 'national');
            } else if ($data['api_provider_id'] == 7) {
                $array_data = $this->getDecodeExplodeValue($data['data_param'], $result, 'tripList-0');
            } else {
                $array_data = $this->getDecodeExplodeValue($data['data_param'], $result);
            }
            return $this->getBasicBusDetails($data, $array_data, $from_st, $to_st, $post_params['date']);
        }
        return [];
    }

    public function getBusJSONResponse($data, $url, $post_params) {
        if ($data['method'] == 'get') {
            $result = $this->curlGETResult($data['base_url'], $url);
        } else {
            $result = $this->curlPOSTResult($data['base_url'], $url, $post_params, $data['post_data']);
        }
        if ($data['api_provider_id'] == 6) {
            $array_data = $this->getDecodeExplodeValue($data['success_param'], $result, 'national');
        } else {
            $status = $this->getDecodeExplodeValue($data['success_param'], $result);
        }
        if ($data['api_provider_id'] == 7 || $data['api_provider_id'] == 6 || $status == $data['success_value']) {
            if ($data['api_provider_id'] == 6) {
                $array_data = $this->getDecodeExplodeValue($data['data_param'], $result, 'national');
            } else {
                $array_data = $this->getDecodeExplodeValue($data['data_param'], $result);
            }
            $boarddroparray = $array_data;
            $boarddropdata = $data;
            if ($data['api_provider_id'] == 7) {
                $obj = new Common();
                $boarddrop = $obj->selectRowCustomFieldsWithWhere('p.base_url, p.name, p.api_key, p.merchent_id, p.user_id, p.password, p.date_format, b.*', 'api_providers AS p LEFT JOIN api_boardanddrop AS b ON b.api_provider_id = p.ID', 'p.status=1 AND p.ID = ' . $data['api_provider_id']);
                $boarddropurl = $obj->getReplacedString($boarddrop['endpoint'], $post_params); //Replacing board drop url values
                $detail_layouts = array();
                $layer = 1;
                foreach ($array_data as $arr) {
                    foreach ($arr as $k => $r) {
                        if ($k == 'BusLayout') {
                            foreach ($r->{0}->seatDetailsList as $det) {
                                $det->layer = $layer;
                                array_push($detail_layouts, $det);
                            }
                            $layer = $layer + 1;
                            break;
                        }
                    }
                }
                foreach ($array_data as $arr) {
                    foreach ($arr as $k => $r) {
                        if ($k == 'SeatDetail') {
                            $temp_data = array();
                            foreach ($r as $ro) {
                                $ro->rowNbr = 0;
                                $ro->columnNbr = 0;
                                array_push($temp_data, $ro);
                            }
                            break;
                        }
                    }
                }
                $array_data = array();
                foreach ($temp_data as $ke => $arr) {
                    foreach ($detail_layouts as $ly) {
                        if ($arr->seatNbr == $ly->seatNbr) {
                            $arr->rowNbr = $ly->rowNbr;
                            $arr->columnNbr = $ly->columnNbr;
                            $arr->layer = $ly->layer;
                            array_push($array_data, $arr);
                            break;
                        }
                    }
                }
                $resultboarddrop = $this->curlGETResult($boarddrop['base_url'], $boarddropurl);
                $boarddropdata = $boarddrop;
                $boarddroparray = $this->getDecodeExplodeValue($boarddrop['data_param'], $resultboarddrop);
            }
            $response = array('seats' => $this->getBasicSeatDetails($data, $array_data), 'boarding' => $this->getBoardingDroppingData($boarddropdata, $boarddroparray, 'boarding'), 'dropping' => $this->getBoardingDroppingData($boarddropdata, $boarddroparray, 'dropping'));
            return $response;
        } else {
            return [];
        }
    }

    public function getBusSOAPResponse($data, $url, $post_params) {
        if ($data['method'] == 'post') {
            $auth = array(
                'MerchantID' => $data['merchent_id'],
                'LoginKey' => $data['api_key']
            );
            $client = new SoapClient($data['base_url']);
            $header = new SoapHeader('http://tempuri.org/', 'AuthHeaderVB', $auth);
            $client->__setSoapHeaders($header);
            $post = $this->getReplacedString($data['post_data'], $post_params); //Replacing post values
            $value = $client->BusAvailabilityV4(array('RequestData' => $post));
            $xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $value->BusAvailabilityV4Result);
            $xml = simplexml_load_string($xml);
            $result = json_encode($xml);
        }
        $status = $this->getDecodeExplodeValue($data['success_param'], $result);
        if ($status == $data['success_value']) {
            $array_data = json_decode($result); //$this->getDecodeExplodeValue($data['data_param'], $result);
            $boarddroparray = $array_data;
            $boarddropdata = $data;
            $response = array('seats' => $this->getBasicSeatDetailsSOAP($data, $array_data), 'boarding' => $this->getBoardingDroppingData($boarddropdata, $boarddroparray, 'boarding'), 'dropping' => $this->getBoardingDroppingData($boarddropdata, $boarddroparray, 'dropping'));
            return $response;
        } else {
            return [];
        }
    }

    public function blockSeatJSONResponse($data, $url, $params) {
        $tickets = array();
        foreach (json_decode($params['seats']) as $row) {
            if ($data['passenger_seat_name'] != '') {
                array_push($tickets, array($data['passenger_seat_code'] => $row->code, $data['passenger_seat_name'] => $row->name, $data['passenger_gender'] => $this->getGenderByType($row->gender, $data['passenger_gender_type']), $data['passenger_name'] => $row->passenger, $data['passenger_age'] => $row->age, $data['passenger_seat_fare'] => $row->fare));
            } else {
                $arr = array($data['passenger_seat_code'] => $row->code, $data['passenger_gender'] => $this->getGenderByType($row->gender, $data['passenger_gender_type']), $data['passenger_name'] => $row->passenger, $data['passenger_age'] => $row->age, $data['passenger_seat_fare'] => $row->fare);
                if ($data['api_provider_id'] == 6) {
                    $title = 'Mr';
                    $arr['title'] = $title;
                }
                array_push($tickets, $arr);
            }
        }
        $params['tickets'] = json_encode($tickets);
        $params['travel_date'] = $this->getTravelDate($params['travel_date'], $data['date_format']);
        if ($data['method'] == 'post') {
            $result = $this->curlPOSTResult($data['base_url'], $url, $params, $data['post_data']);
            if ($data['api_provider_id'] == 6) {
                $result_data = json_decode($result);
                if (isset($result_data->result->ticket_details)) {
                    $status = 1;
                } else {
                    $status = 0;
                }
            } else {
                $status = $this->getDecodeExplodeValue($data['success_param'], $result);
            }
        } else {
            $ticket = '';
            foreach ($tickets as $key => $tkt) {
                foreach ($tkt as $k => $t) {
                    $ticket = $ticket . '&passengerDetails[' . $key . '][' . $k . ']=' . $t;
                }
            }
            $params['tickets'] = $ticket;
            $url = $this->getReplacedString($url, $params);
            $result = $this->curlGETResult($data['base_url'], $url);
            $status = $this->getDecodeExplodeValue($data['success_param'], $result, 'BlockSeats-l');
        }
        if ($status == $data['success_value']) {
            if ($data['method'] == 'post') {
                $array_data = $this->getDecodeExplodeValue($data['data_param'], $result);
            } else {
                $array_data = $this->getDecodeExplodeValue('success_param', $result, 'BlockSeats-0');
            }
            $response = $this->getBlockSeatSuccessResponse($data, $array_data, $params['agent_pnr']);
            return array('error' => false, 'data' => $response);
        } else {
            if ($data['api_provider_id'] == 7) {
                return array('error' => true, 'message' => $this->getDecodeExplodeValue($data['error_param'], $result), 'BlockSeats-l');
            } else {
                return array('error' => true, 'message' => $this->getDecodeExplodeValue($data['error_param'], $result));
            }
        }
    }

    public function bookTicketJSONResponse($data, $url, $params) {
        $parameters = array('pnr' => $params->selected_ticket_pnr, 'ticket_code' => $data['udf4']);
        if ($data['method'] == 'post') {
            $result = $this->curlPOSTResult($data['base_url'], $url, $parameters, $data['post_data']);
        } else {
            $result = $this->curlGETResult($data['base_url'], $url);
        }
        if ($data['api_provider_id'] == 7) {
            $array = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $result));
            if (isset($array->BookTicket{0}->PNR)) {
                $result = json_encode(array('Status' => array('StatusCode' => 200), 'PNR' => $array->BookTicket{0}->PNR));
            } else {
                $result = json_encode($array->BookTicket{0});
            }
        }
        $status = $this->getDecodeExplodeValue($data['success_param'], $result);
        if ($status == $data['success_value']) {
            $array_data = $this->getDecodeExplodeValue($data['data_param'], $result);
            $transaction_arr = array();
            if ($data['api_provider_id'] == 1 || $data['api_provider_id'] == 3) {
                $transaction_arr = $array_data->usertransaction[0];
            } else {
                $transaction_arr = $array_data;
            }
            $credit_amount = $this->getExplodeValue($data['credit_amt'], $transaction_arr);
            $transaction_amt = $this->getExplodeValue($data['transaction_amt'], $transaction_arr);
            $debit_amt = $this->getExplodeValue($data['debit_amt'], $transaction_arr);
            $operator_pnr = $this->getExplodeValue($data['operator_pnr'], $array_data);
            if ($data['api_provider_id'] == 5 || $data['api_provider_id'] == 7) {
                $credit_amount = 0;
                $transaction_amt = 0;
                $debit_amt = 0;
            }
            return array('error' => false, 'message' => 'Ticket confirmed', 'data' => $result, 'credit_amount' => $credit_amount, 'transaction_amt' => $transaction_amt, 'debit_amt' => $debit_amt, 'operator_pnr' => $operator_pnr);
        } else {
            return array('error' => true, 'message' => $this->getDecodeExplodeValue($data['error_param'], $result), 'data' => $result);
        }
    }

    public function curlGETResult($base_url, $url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $base_url . $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    public function curlPOSTResult($base_url, $url, $params, $post_string) {
        $post_data = $this->getReplacedString($post_string, $params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $base_url . $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    public function getDecodeExplodeValue($string, $array, $provider = '') {
        if ($provider == 'national') {
            $result = json_decode($array);
        } else {
            $json_string = stripslashes(html_entity_decode($array));
            $result = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $json_string));
        }
        if (isset($result)) {
            if ($provider == 'tripList-1') {
                $result = $result->tripList{1};
            }
            if ($provider == 'tripList-0') {
                $result = $result->tripList{0};
            }
            if ($provider == 'BlockSeats-0') {
                $result = $result->BlockSeats{0};
            }
            if ($provider == 'BlockSeats-l') {
                $result = $result->BlockSeats{count($result->BlockSeats) - 1};
            }
            foreach (explode('-', $string) as $val) {
                foreach ($result as $k => $v) {
                    if ($k == $val) {
                        $result = $v;
                        break;
                    }
                }
            }
            return $result;
        }
        return '';
    }

    public function getExplodeValue($string, $result) {
        $match = explode('-', $string);
        foreach ($match as $val) {
            foreach ($result as $k => $v) {
                if ($k == $val) {
                    $result = $v;
                    break;
                }
            }
        }
        return $result;
    }

    public function getTimeAsFormat($time) {
        return date("g:i a", strtotime($time));
    }

    public function getTravelTime($value, $method, $to = '', $tdate = '') {
        $return = 'N/A';
        switch ($method) {
            case 1:
                $return = gmdate("H:i", ($value * 60));
                break;
            case 2:
                $return = str_replace(' ', '', $value);
                break;
            case 3:
                $from_date = date('Y-m-d H:i:00', strtotime(str_replace('/', '-', $tdate) . ' ' . $value));
                $to_date = date('Y-m-d H:i:00', strtotime(str_replace('/', '-', $tdate) . ' ' . $to));
                if ($from_date > $to_date) {
                    $to_date = date('Y-m-d H:i:00', strtotime(str_replace('/', '-', $tdate) . ' ' . $to . ' +1 day'));
                }
                $dep = new DateTime($from_date);
                $arr = new DateTime($to_date);
                $interval = $dep->diff($arr);
                $return = sprintf("%02d", $interval->h) . ':' . sprintf("%02d", $interval->i);
                break;
            case 4:
                $tdate = date("Y-m-d", strtotime($tdate));
                $from_date = date('Y-m-d H:i:00', strtotime(str_replace('/', '-', $tdate) . ' ' . $value));
                $to_date = date('Y-m-d H:i:00', strtotime(str_replace('/', '-', $tdate) . ' ' . $to));
                if ($from_date > $to_date) {
                    $to_date = date('Y-m-d H:i:00', strtotime(str_replace('/', '-', $tdate) . ' ' . $to . ' +1 day'));
                }
                $dep = new DateTime($from_date);
                $arr = new DateTime($to_date);
                $interval = $dep->diff($arr);
                $return = sprintf("%02d", $interval->h) . ':' . sprintf("%02d", $interval->i);
                break;
            default:
                break;
        }
        return $return;
    }

    public function getGenderByType($value, $method) {
        $return = 'N/A';
        switch ($method) {
            case 1:
            case '1':
                $return = strtoupper($value);
            default:
                break;
        }
        return $return;
    }

    public function getBoardingDroppingTime($value, $method) {
        $return = 'N/A';
        switch ($method) {
            case 1:
            case '1':
                $return = date("g:i a", strtotime($value));
            default:
                break;
        }
        return $return;
    }

    public function getBasicSeatDetails($details, $data) {
        $return = array();
        if ($details['api_provider_id'] == 6) {
            $fares = $this->getFareData(array('fare_amt' => '', 'api_provider_id' => 6, 'fare' => 'service_details-price'), $data);
            $data = $data->coach_layout->seat_details;
        }
        foreach ($data as $val) {
            $seat_code = $this->getExplodeValue($details['seat_code'], $val);
            $seat_type = $this->getSeatType($this->getExplodeValue($details['seat_type'], $val));
            $seat_type_code = $this->getExplodeValue($details['seat_type_code'], $val);
            $seat_type_name = $this->getExplodeValue($details['seat_type_name'], $val);
            $seat_status = $this->getExplodeValue($details['seat_status'], $val);
            $row_position = $this->getExplodeValue($details['row_position'], $val);
            $col_position = $this->getExplodeValue($details['col_position'], $val);
            $seat_position = $this->getExplodeValue($details['seat_position'], $val);
            $seat_layer = $this->getExplodeValue($details['seat_layer'], $val);
            $seat_name = $this->getExplodeValue($details['seat_name'], $val);
            if ($details['api_provider_id'] == 6) {
                $row_position = $row_position + 1;
                $col_position = $col_position + 1;
                foreach ($fares as $row) {
                    if ($row['seat_type'] == $seat_type_code) {
                        $seat_fare = $row['amount'];
                        break;
                    }
                }
                if ($this->getExplodeValue('seat-is_ladies_seat', $val) == true) {
                    $seat_status = 'female';
                }
                if ((strpos(strtolower($seat_name), 'u') !== false || (strpos(strtolower($seat_name), 'a') !== false && strtolower($seat_name) != 'a4') || (strpos(strtolower($seat_name), 'b') !== false && strtolower($seat_name) != 'b4') || (strpos(strtolower($seat_name), 'c') !== false && strtolower($seat_name) != 'c4') || (strpos(strtolower($seat_name), 'd') !== false && strtolower($seat_name) != 'd4') || (strpos(strtolower($seat_name), 'e') !== false && strtolower($seat_name) != 'e4') || (strpos(strtolower($seat_name), 'f') !== false && strtolower($seat_name) != 'f4')) && strpos(strtolower($seat_name), 'l') == false) {
                    $seat_layer = 2;
                } else {
                    $seat_layer = 1;
                }
            } else {
                $seat_fare = $this->getExplodeValue($details['seat_fare'], $val);
            }
            if ($seat_name != '-' && $seat_name != '' && strtoupper($seat_type_code) != 'RRM' && strtoupper($seat_type_code) != 'FRS') {
                if ($details['api_provider_id'] == 5) {
                    $seat_fare = $this->getExplodeValue($details['seat_fare'], $val) + $this->getExplodeValue('serviceTax', $val);
                }
                array_push($return, array('seat_code' => $seat_code, 'seat_type' => $seat_type, 'seat_type_code' => $seat_type_code, 'seat_type_name' => $seat_type_name, 'seat_status' => $seat_status, 'row_position' => $row_position, 'col_position' => $col_position, 'seat_position' => $seat_position, 'seat_layer' => $seat_layer, 'seat_name' => $seat_name, 'seat_fare' => $seat_fare, 'avail_for_all_value' => $details['avail_for_all_value'], 'avail_for_male_vale' => $details['avail_for_male_vale'], 'avail_for_female_vale' => $details['avail_for_female_vale'], 'avail_for_booked_vale' => $details['avail_for_booked_vale']));
            }
        }
        return $return;
    }

    public function getBasicSeatDetailsSOAP($details, $data) {
        $return = array();
        $seat_map = $data->SEATMAP->ROW;
        $booked = $data->BOOKEDTICKETS->ITEM;
        $avails = $data->AVAILABLETICKETS->ITEM;
        foreach ($seat_map as $key => $seat) {
            foreach ($seat->ITEM as $k => $val) {
                $seat_status_value = 'AL';
                $seat_layer_value = 1;
                foreach ($booked as $book) {
                    if ($book->BOOKEDSEATNO == $val->SEATNO) {
                        $seat_status_value = 'BO';
                        break;
                    }
                }
                $seat_code = $this->getExplodeValue($details['seat_code'], $val);
                $seat_type_code = $this->getExplodeValue($details['seat_type_code'], $val);
                $seat_type_name = $this->getExplodeValue($details['seat_type_name'], $val);
                $seat_fare = $this->getExplodeValue($details['seat_fare'], $val);
                $seat_status = $seat_status_value;
                $row_position = ($key + 1);
                $col_position = ($k + 1);
                $seat_position = ($k + 1);
                $seat_name = $this->getExplodeValue($details['seat_name'], $val);
                if ((strpos(strtolower($seat_name), 'u') !== false)) {
                    $seat_layer_value = 2;
                } else {
                    $seat_layer_value = 1;
                }
                $seat_layer = $seat_layer_value;
                if ($seat_name != '0') {
                    $seat_type = $this->getSeatType($this->getExplodeValue($details['seat_type'], $val));
                    array_push($return, array('seat_code' => $seat_code, 'seat_type' => $seat_type, 'seat_type_code' => $seat_type_code, 'seat_type_name' => $seat_type_name, 'seat_status' => $seat_status, 'row_position' => $row_position, 'col_position' => $col_position, 'seat_position' => $seat_position, 'seat_layer' => $seat_layer, 'seat_name' => $seat_name, 'seat_fare' => $seat_fare, 'avail_for_all_value' => $details['avail_for_all_value'], 'avail_for_male_vale' => $details['avail_for_male_vale'], 'avail_for_female_vale' => $details['avail_for_female_vale'], 'avail_for_booked_vale' => $details['avail_for_booked_vale']));
                }
            }
        }
        return $return;
    }

    public function getBlockSeatSuccessResponse($details, $data, $agent_pnr) {
        $booking_pnr = $this->getExplodeValue($details['booking_pnr_code'], $data);
        if ($details['api_provider_id'] == 6) {
            $agent_pnr = $this->getExplodeValue('operator_pnr', $data);
        }
        $return = array('booking_pnr' => $booking_pnr, 'agent_pnr' => $agent_pnr);
        return $return;
    }

    public function getBasicBusDetails($details, $data, $from_st, $to_st, $tdate) {
        $return = array();
        if ($details['api_provider_id'] == 6) {
            $cancellation = $this->getCancellationForNational($details);
        }
        foreach ($data as $val) {
            $travels_name = $this->getExplodeValue($details['travels_name'], $val);
            $bus_type = $this->getExplodeValue($details['bus_type'], $val);
            $from_time = $this->getTimeAsFormat($this->getExplodeValue($details['from_time'], $val));
            if ($details['api_provider_id'] == 6) {
                $to_time = $this->getTimeAsFormat($val->route->{'arrival-time'});
            } else {
                $to_time = $this->getTimeAsFormat($this->getExplodeValue($details['to_time'], $val));
            }
            $travel_time = $this->getTravelTime($this->getExplodeValue($details['duration'], $val), $details['duration_method'], $to_time, $tdate);
            $seats_avail = $this->getExplodeValue($details['seats_avail'], $val);
            if ($details['api_provider_id'] == 3) {
                $seats_avail = $this->getAvailSeatForSBLT($details, $val);
            }
            $trip_code = $this->getExplodeValue($details['trip_code'], $val);
            $stage_code = $this->getExplodeValue($details['stage_code'], $val);
            $fares = $this->group_by($this->getFareData($details, $val), 'amount');
            $boardings = $this->getBoardingDroppingData($details, $val, 'boarding');
            if ($details['api_provider_id'] == 2) {
                $droppings = array(array('code' => 0, 'name' => $to_st, 'latitude' => '', 'longitude' => '', 'address' => $to_st, 'landmark' => '', 'number' => '', 'date_time' => $to_time));
            } else {
                $droppings = $this->getBoardingDroppingData($details, $val, 'dropping');
            }
            $taxes = $this->getTaxData($details, $val);
            if ($details['api_provider_id'] == 6) {
                $cancellation_terms = $cancellation;
            } else {
                $cancellation_terms = $this->getCancellationTerms($details, $val);
            }
            array_push($return, array('travels_name' => $travels_name, 'bus_type' => $bus_type, 'from_station' => $from_st, 'to_station' => $to_st, 'from_time' => $from_time, 'to_time' => $to_time, 'travel_time' => $travel_time, 'seats_avail' => $seats_avail, 'trip_code' => $trip_code, 'stage_code' => $stage_code, 'fare' => $fares, 'boarding' => $boardings, 'dropping' => $droppings, 'tax' => $taxes, 'provider_id' => $details['api_provider_id'], 'is_cancel' => $details['is_cancel_policy'], 'cancellation' => $cancellation_terms, 'cancellation_display_type' => $details['cancellation_display_type'], 'date' => date('Y-m-d')));
        }
        return $return;
    }

    public function getCancellationForNational($details) {
        $url = $this->getReplacedString($details['cancel_url'], array('api_key' => $details['api_key']));
        $result = $this->curlGETResult($details['base_url'], $url);
        return $this->getDecodeExplodeValue($details['cancel_policy'], $result);
    }

    public function getFareData($details, $value) {
        $array = $this->getExplodeValue($details['fare'], $value);
        $data = array();
        if ($details['fare_amt'] != '') {
            foreach ($array as $val) {
                array_push($data, array('amount' => intval($this->getExplodeValue($details['fare_amt'], $val)), 'seat_type' => $this->getExplodeValue($details['fare_seat_type'], $val), 'seat_type_name' => $this->getExplodeValue($details['fare_seat_type_name'], $val)));
            }
        } else {
            if ($details['api_provider_id'] == 6) {
                foreach (explode(',', $array) as $val) {
                    $type = explode(':', $val);
                    array_push($data, array('amount' => intval($type[1]), 'seat_type' => $type[0], 'seat_type_name' => $type[0]));
                }
            } else {
                foreach (explode(',', $array) as $val) {
                    array_push($data, array('amount' => intval($val), 'seat_type' => '', 'seat_type_name' => ''));
                }
            }
        }
        return $data;
    }

    public function group_by($array, $key) {
        $temp_array = array();
        $i = 0;
        $key_array = array();
        foreach ($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }

    public function getAvailSeatForSBLT($details, $value) {
        $array = $this->getExplodeValue($details['fare'], $value);
        $data = 0;
        foreach ($array as $val) {
            $data = $data + $this->getExplodeValue($details['seats_avail'], $val);
        }
        return $data;
    }

    public function getBoardingDroppingData($details, $value, $type) {
        $data = array();
        if ($details[$type . '_detail'] != '') {
            $array = $this->getExplodeValue($details[$type . '_detail'], $value);
            if ($details['api_provider_id'] == 6) {
                foreach ($array as $val) {
                    if ($type == 'boarding' && $val->stage->type == 'Boarding at') {
                        array_push($data, array('code' => $this->getExplodeValue($details[$type . '_code'], $val), 'name' => $this->getExplodeValue($details[$type . '_name'], $val), 'latitude' => '', 'longitude' => '', 'address' => $this->getExplodeValue($details[$type . '_address'], $val), 'landmark' => $this->getExplodeValue($details[$type . '_landmark'], $val), 'number' => $this->getExplodeValue($details[$type . '_number'], $val), 'date_time' => $this->getBoardingDroppingTime($this->getExplodeValue($details[$type . '_datetime'], $val), $details['boarding_dropping_time_method'])));
                    }
                    if ($type == 'dropping' && $val->stage->type == 'Drop Off') {
                        array_push($data, array('code' => $this->getExplodeValue($details[$type . '_code'], $val), 'name' => $this->getExplodeValue($details[$type . '_name'], $val), 'latitude' => '', 'longitude' => '', 'address' => $this->getExplodeValue($details[$type . '_address'], $val), 'landmark' => $this->getExplodeValue($details[$type . '_landmark'], $val), 'number' => $this->getExplodeValue($details[$type . '_number'], $val), 'date_time' => $this->getBoardingDroppingTime($this->getExplodeValue($details[$type . '_datetime'], $val), $details['boarding_dropping_time_method'])));
                    }
                }
            } else if ($details['api_provider_id'] == 7) {
                foreach ($value as $val) {
                    if ($type == 'boarding' && $val->StationsPointDetails->stationPointType == 'B') {
                        array_push($data, array('code' => $this->getExplodeValue($details[$type . '_code'], $val), 'name' => $this->getExplodeValue($details[$type . '_name'], $val), 'latitude' => '', 'longitude' => '', 'address' => $this->getExplodeValue($details[$type . '_address'], $val), 'landmark' => $this->getExplodeValue($details[$type . '_landmark'], $val), 'number' => $this->getExplodeValue($details[$type . '_number'], $val), 'date_time' => $this->getBoardingDroppingTime($this->getExplodeValue($details[$type . '_datetime'], $val), $details['boarding_dropping_time_method'])));
                    }
                    if ($type == 'dropping' && $val->StationsPointDetails->stationPointType == 'D') {
                        array_push($data, array('code' => $this->getExplodeValue($details[$type . '_code'], $val), 'name' => $this->getExplodeValue($details[$type . '_name'], $val), 'latitude' => '', 'longitude' => '', 'address' => $this->getExplodeValue($details[$type . '_address'], $val), 'landmark' => $this->getExplodeValue($details[$type . '_landmark'], $val), 'number' => $this->getExplodeValue($details[$type . '_number'], $val), 'date_time' => $this->getBoardingDroppingTime($this->getExplodeValue($details[$type . '_datetime'], $val), $details['boarding_dropping_time_method'])));
                    }
                }
            } else {
                foreach ($array as $val) {
                    array_push($data, array('code' => $this->getExplodeValue($details[$type . '_code'], $val), 'name' => $this->getExplodeValue($details[$type . '_name'], $val), 'latitude' => $this->getExplodeValue($details[$type . '_lat'], $val), 'longitude' => $this->getExplodeValue($details[$type . '_lng'], $val), 'address' => $this->getExplodeValue($details[$type . '_address'], $val), 'landmark' => $this->getExplodeValue($details[$type . '_landmark'], $val), 'number' => $this->getExplodeValue($details[$type . '_number'], $val), 'date_time' => $this->getBoardingDroppingTime($this->getExplodeValue($details[$type . '_datetime'], $val), $details['boarding_dropping_time_method'])));
                }
            }
        }
        return $data;
    }

    public function getTaxData($details, $value) {
        if ($details['tax'] != '') {
            $val = $this->getExplodeValue($details['tax'], $value);
            $data = array();
            if ($details['c_gst'] != '') {
                $data['c_gst'] = $this->getExplodeValue($details['c_gst'], $val);
            } else {
                $data['c_gst'] = 0;
            }
            if ($details['s_gst'] != '') {
                $data['s_gst'] = $this->getExplodeValue($details['s_gst'], $val);
            } else {
                $data['s_gst'] = 0;
            }
            if ($details['u_gst'] != '') {
                $data['u_gst'] = $this->getExplodeValue($details['u_gst'], $val);
            } else {
                $data['u_gst'] = 0;
            }
            if ($details['gstin'] != '') {
                $data['gstin'] = $this->getExplodeValue($details['gstin'], $val);
            } else {
                $data['gstin'] = '';
            }
            if ($details['trade_name'] != '') {
                $data['trade_name'] = $this->getExplodeValue($details['trade_name'], $val);
            } else {
                $data['trade_name'] = '';
            }
            if ($details['api_provider_id'] == 3 && $this->getExplodeValue('serviceTax', $val) == 0) {
                $data = array('c_gst' => 0, 's_gst' => 0, 'u_gst' => 0, 'gstin' => '', 'trade_name' => '');
            }
            return $data;
        } else {
            return [];
        }
    }

    public function getCancellationTerms($details, $value) {
        if ($details['is_cancel_policy'] == 1) {
            $val = $this->getExplodeValue($details['cancel_policy'], $value);
            return $val;
        } else {
            return [];
        }
    }

}
