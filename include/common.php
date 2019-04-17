<?php

session_start();

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

    public function selectFranchiseReport($qry) {
        $data = array();
        $result = $this->conn->query($qry);
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
            while ($row = $result->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
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
        $this->conn->query('DELETE FROM ' . $table . ' WHERE ' . $where);
        return $this->conn->affected_rows;
    }

    public function deleteLevelFourChilds($id) {
        $this->conn->query('DELETE franchise_programs, level_four_mapping FROM franchise_programs INNER JOIN level_four_mapping ON franchise_programs.level_one_id = level_four_mapping.level_one_id AND franchise_programs.level_two_id = level_four_mapping.level_two_id AND franchise_programs.level_three_id = level_four_mapping.level_three_id WHERE level_four_mapping.level_four_id IN (' . $id . ')');
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
        require_once dirname(__FILE__) . '/../PHPExcel.php';
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

}
