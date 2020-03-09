<?php

require_once dirname(__FILE__) . '/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class DbHandler {

    private $conn;

    function __construct() {
        require_once dirname(__FILE__) . '/DbConnect.php';
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

    public function addRow($data, $isfile, $file, $filefield, $path, $unset, $table, $checkexist, $checkfield, $slug) {
        $obj = new Common();
        $exist = array();
        if ($checkexist != false && $checkexist != 'false') {
            $exist = $obj->selectRowWithWhere($table, $checkfield . '=\'' . $data[$checkfield] . '\'');
        }
        if (count($exist) == 0) {
            foreach ($unset as $val) {
                unset($data[$val]);
            }
            if ($isfile && $file != '') {
                $data[$filefield] = $obj->saveFile($file, $path);
            }
            if ($table == 'notification_global') {
                unset($data['student_id']);
            }
            $insert = $obj->insertRecord($data, $table);
            if ($insert > 0) {
                if ($table === 'student_attendance') {
                    $notification_attendance = $obj->insertRecord(array('title' => 'Absent Notice', 'message' => 'Your child was absent on ' . $data['date'] . ' in the ' . $data['session'] . ' session. Reasson - ' . $data['reason'], 'student_id' => $data['student_id'], 'class_section_id' => $data['class_section_id'], 'teacher_id' => $data['teacher_id']), 'notification_individual');
                    if ($insert > 0) {
                        echo "Notification inseters";
                    }
                }
                $response = array('error' => false, 'message' => $slug . ' added successfully', 'data' => $insert);
            }
        } else {
            $response = array('error' => true, 'message' => $slug . ' already exist with this ' . str_replace('_', ' ', $checkfield));
        }
        return $response;
    }

    public function updateRow($data, $isfile, $file, $filefield, $path, $unset, $table, $checkexist, $checkfield, $slug) {
        $obj = new Common();
        $exist = array();
        if ($checkexist != false && $checkexist != 'false') {
            $exist = $obj->selectRowWithWhere($table, $checkfield . '=\'' . $data[$checkfield] . '\' AND ID != ' . $data['ID']);
        }
        if (count($exist) == 0) {
            foreach ($unset as $val) {
                unset($data[$val]);
            }
            if ($isfile && $file != '') {
                $data[$filefield] = $obj->saveFile($file, $path);
            }
            $update = $obj->updateRecordWithWhere($data, $table, 'ID=' . $data['ID']);
            if ($update > 0) {
                $response = array('error' => false, 'message' => $slug . ' updated successfully', 'data' => $update);
            } else {
                $response = array('error' => true, 'message' => 'No update found');
            }
        } else {
            $response = array('error' => true, 'message' => $slug . ' already exist with this ' . str_replace('_', ' ', $checkfield));
        }
        return $response;
    }

    public function checkForAlertNotification($data, $res) {
        $obj = new thirdparty();
        $com = new Common();
        if ($data['table'] == 'teachers') {
            $email = $com->selectRowWithWhere('templates', 'type=\'email\' AND target=\'user\' AND name=\'new_teacher\'');
            $sms = $com->selectRowWithWhere('templates', 'type=\'sms\' AND target=\'user\' AND name=\'new_teacher\'');
            $replaces_email = $com->getReplacedString($email['body'], $data);
            $replaces_sms = $com->getReplacedString($sms['body'], $data);
            $obj->sendSMS(array($data['mobile']), $replaces_sms);
            $obj->sendMail($data['email'], $data['name'], $replaces_email, $replaces_email, $email['subject'], $email['to_email'], $email['to_name'], '', '', $email['cc_email'], $email['cc_name']);
        }
        if ($data['table'] == 'students') {
            $email = $com->selectRowWithWhere('templates', 'type=\'email\' AND target=\'user\' AND name=\'new_student\'');
            $sms = $com->selectRowWithWhere('templates', 'type=\'sms\' AND target=\'user\' AND name=\'new_student\'');
            $replaces_email = $com->getReplacedString($email['body'], $data);
            $replaces_sms = $com->getReplacedString($sms['body'], $data);
            $obj->sendSMS(array($data['mobile']), $replaces_sms);
            $obj->sendMail($data['email'], $data['name'], $replaces_email, $replaces_email, $email['subject'], $email['to_email'], $email['to_name'], '', '', $email['cc_email'], $email['cc_name']);
        }
        if ($data['table'] == 'notification_individual') {
            $student = $com->selectRowWithWhere('students', 'ID=\'' . $data['student_id'] . '\'');
            $notification = $com->selectRowWithWhere('notification_individual', 'ID=\'' . $res['data'] . '\'');
            $data['mobile'] = $student['mobile'];
            $data['image'] = $notification['image'];
            $push = $com->selectRowWithWhere('templates', 'type=\'push\' AND target=\'user\' AND name=\'individual_notification\'');
            $sms = $com->selectRowWithWhere('templates', 'type=\'sms\' AND target=\'user\' AND name=\'individual_notification\'');
            $replaces_push_title = $com->getReplacedString($push['subject'], $data);
            $replaces_push_body = $com->getReplacedString($push['body'], $data);
            $replaces_sms = $com->getReplacedString($sms['body'], $data);
            if ($student['device_token'] != '') {
                $img = '';
                if ($data['image'] != '') {
                    $img = IMG_BASE_URL . $data['image'];
                }
                $obj->sendSinglePush(array($student['device_token']), $replaces_push_body, $replaces_push_title, $img, array());
            } else {
                $obj->sendSMS(array($data['mobile']), $replaces_sms);
            }
        }
        if ($data['table'] == 'notification_global') {
            $student = $com->selectRowWithWhere('students', 'class_section_id=\'' . $data['class_section_id'] . '\'');
            $notification = $com->selectRowWithWhere('notification_global', 'ID=\'' . $res['data'] . '\'');
            $data['mobile'] = $student['mobile'];
            $data['image'] = $notification['image'];
            $push = $com->selectRowWithWhere('templates', 'type=\'push\' AND target=\'user\' AND name=\'notification_global \'');
            $sms = $com->selectRowWithWhere('templates', 'type=\'sms\' AND target=\'user\' AND name=\'notification_global\'');
            $replaces_push_title = $com->getReplacedString($push['subject'], $data);
            $replaces_push_body = $com->getReplacedString($push['body'], $data);
            $replaces_sms = $com->getReplacedString($sms['body'], $data);
            if ($student['device_token'] != '') {
                $img = '';
                if ($data['image'] != '') {
                    $img = IMG_BASE_URL . $data['image'];
                }
                $obj->sendSinglePush(array($student['device_token']), $replaces_push_body, $replaces_push_title, $img, array());
            } else {
                $obj->sendSMS(array($data['mobile']), $replaces_sms);
            }
        }
        if ($data['table'] == 'student_attendance') {
            $student = $com->selectRowWithWhere('students', 'ID=\'' . $data['student_id'] . '\'');
            $data['mobile'] = $student['mobile'];
            $data['name'] = $student['name'];
            $push = $com->selectRowWithWhere('templates', 'type=\'push\' AND target=\'user\' AND name=\'student_attendance\'');
            $sms = $com->selectRowWithWhere('templates', 'type=\'sms\' AND target=\'user\' AND name=\'student_attendance\'');
            $replaces_push_title = $com->getReplacedString($push['subject'], $data);
            $replaces_push_body = $com->getReplacedString($push['body'], $data);
            $replaces_sms = $com->getReplacedString($sms['body'], $data);
            if ($student['device_token'] != '') {
                $obj->sendSinglePush(array($student['device_token']), $replaces_push_body, $replaces_push_title, '', array());
            } else {
                $obj->sendSMS(array($data['mobile']), $replaces_sms);
            }
        }
        if ($data['table'] == 'events') {
            $event = $com->selectRowWithWhere('events', 'ID=\'' . $res['data'] . '\'');
            $devices = $com->selectAllCustomWithWhere(array('device_token'), 'students', 'device_token != \'\'');
            $push = $com->selectRowWithWhere('templates', 'type=\'push\' AND target=\'user\' AND name=\'new_event\'');
            $replaces_push_title = $com->getReplacedString($push['subject'], $event);
            $replaces_push_body = $com->getReplacedString($push['body'], $data);
            if (count($devices) > 0) {
                $device_tokens = array();
                $img = '';
                if ($event['invitation'] != '') {
                    $img = IMG_BASE_URL . $event['invitation'];
                }
                foreach ($devices as $val) {
                    array_push($device_tokens, $val['device_token']);
                }
                $obj->sendSinglePush($device_tokens, $replaces_push_body, $replaces_push_title, $img, array());
            }
        }
        if ($data['table'] == 'otp') {
            $sms = $com->selectRowWithWhere('templates', 'type=\'sms\' AND target=\'user\' AND name=\'otp\'');
            $replaces_sms = $com->getReplacedString($sms['body'], $data);
            $obj->sendSMS(array($data['mobile']), $replaces_sms);
        }
        if ($data['table'] == 'class_section_subjects') {
            $record = $com->executeSelectRowWithWhere('`t`.`name`, `t`.`email`, `t`.`mobile`, `c`.`name` AS `class`, `s`.`name` AS `section`, `su`.`name` AS `subject`', '`class_section_subjects` AS `css` LEFT JOIN `class_sections` AS `cs` ON `cs`.`ID` = `css`.`class_section_id` LEFT JOIN `classes` AS `c` ON `c`.`ID` = `cs`.`class_id` LEFT JOIN `sections` AS `s` ON `s`.`ID` = `cs`.`section_id` LEFT JOIN `teachers` AS `t` ON `t`.`ID` = `css`.`teacher_id` LEFT JOIN `subjects` AS `su` ON `su`.`ID` = `css`.`subject_id`', '`css`.`ID` = ' . $res['data']);
            $email = $com->selectRowWithWhere('templates', 'type=\'email\' AND target=\'user\' AND name=\'teacher_added_class_section_subject\'');
            $sms = $com->selectRowWithWhere('templates', 'type=\'sms\' AND target=\'user\' AND name=\'teacher_added_class_section_subject\'');
            $replaces_email = $com->getReplacedString($email['body'], $record);
            $replaces_sms = $com->getReplacedString($sms['body'], $record);
            $obj->sendSMS(array($record['mobile']), $replaces_sms);
            $obj->sendMail($record['email'], $record['name'], $replaces_email, $replaces_email, $email['subject'], $email['to_email'], $email['to_name'], '', '', $email['cc_email'], $email['cc_name']);
        }
        if ($data['table'] == 'change_class') {
            $students = $com->selectAllWithWhere('students', 'ID IN (' . $data['ID'] . ')');
            $push = $com->selectRowWithWhere('templates', 'type=\'push\' AND target=\'user\' AND name=\'change_class\'');
            foreach ($students as $student) {
                if (isset($student['device_token']) && $student['device_token'] != '') {
                    $data['name'] = $student['name'];
                    $replaces_push_title = $com->getReplacedString($push['subject'], $data);
                    $replaces_push_body = $com->getReplacedString($push['body'], $data);
                    $obj->sendSinglePush(array($student['device_token']), $replaces_push_body, $replaces_push_title, '', array());
                }
            }
        }
    }

    public function getOTP() {
        $obj = new Common();
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
        return $otp;
    }

    public function getAllFeeses() {
        $res = array('error' => true, 'message' => 'Unable to get feeses');
        $result = $this->conn->query('SELECT `f`.*, `c`.`name` AS `class` FROM `class_feeses` AS `f` LEFT JOIN `classes` AS `c` ON `c`.`ID` = `f`.`class_id`');
        if ($result->num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[$row['class']][] = $row;
            }
            $res['error'] = false;
            $res['message'] = 'Records found';
            $res['data'] = $data;
        }
        return $res;
    }

    public function selectAllPaidFeesesByStudent($sid) {
        $res = array('error' => true, 'message' => 'Unable to get feeses');
        $result = $this->conn->query('SELECT `fpt`.*, `f`.`created_at` AS `paid_date`, `f`.`ID` AS `paid_id`, `f`.`class_name`, `f`.`remarks` FROM `fees_paids` AS `f` LEFT JOIN `fees_paid_terms` AS `fpt` ON `f`.`ID` = `fpt`.`fees_paid_id` WHERE `f`.`student_id` = ' . $sid);
        if ($result->num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $row['receipt'] = IMG_BASE_URL . 'receipts/bill_' . $row['paid_id'] . '.pdf';
                $data[$row['class_name']][$row['paid_date']][] = $row;
            }
            $res['error'] = false;
            $res['message'] = 'Records found';
            $res['data'] = $data;
        }
        return $res;
    }

    public function getPaidReceipt($param) {
        $res = '';
        $total = 0;
        $com = new Common();
        $payment = 'Cash and Card';
        if ($param['payment'] != 'both') {
            $payment = strtoupper($param['payment']);
        }
        require_once('pdf/config/tcpdf_config_alt.php');
        require_once('pdf/tcpdf.php');
        require_once('pdf/lang/eng.php');
        require_once 'pdf/classes/AUTHPDF.php';
        $result = $this->conn->query('SELECT `s`.`name`, `s`.`roll_no`, `a`.`from_year`, `a`.`to_year`, `c`.`name` AS `class`, `se`.`name` AS `section` FROM `students` AS `s` LEFT JOIN `class_sections` AS `cs` ON `cs`.`ID` = `s`.`class_section_id` LEFT JOIN `classes` AS `c` ON `c`.`ID` = `cs`.`class_id` LEFT JOIN `sections` AS `se` ON `se`.`ID` = `cs`.`section_id` LEFT JOIN `academics` AS `a` ON `a`.`ID`=`s`.`academic_id` WHERE `s`.`ID` = ' . $param['student_id']);
        $student = $result->fetch_assoc();
        $page_height = 160;
        $schoolHeader = '<table style="width:100%"><tbody><tr><td style="text-align:center;"><h1>SACRED HEART CENTRAL SCHOOL [CBSE]</h1></td></tr><tr><td style="text-align:center;">Affiliation no. 1930788</td></tr><tr><td style="text-align:center;"><h1>VILLUPURAM</h1></td></tr><tr><td style="text-align:center;"><h1>FEE RECEIPT</h1></td></tr></tbody></table>';
        $academicHeader = '<table style="width:100%"><tbody><tr><td><table style="width: 100%"><tr><td>RECEIPT NO:</td><td>#' . $param['fees_paid_id'] . '</td></tr><tr><td>ADMISSION NO.:</td><td>' . $student['roll_no'] . '</td></tr></table></td><td><table style="width: 100%"><tr><td>DATE:</td><td>' . date('d-m-Y') . '</td></tr><tr><td>STD & SEC:</td><td>' . $param['class_name'] . ' - ' . $param['section_name'] . '</td></tr><tr><td>NAME:</td><td>' . $student['name'] . '</td></tr></table></td></tr></tbody></table>';
        $studentHeader = '<table style="width:100%" border="1" cellpadding="5"><tr><th>Sl.No</th><th>PARTICULARS</th><th>AMOUNT</th></tr>';
        foreach (json_decode($param['fees_terms']) as $key => $val) {
            $total = $total + $val->amount;
            $studentHeader = $studentHeader . '<tr><td>' . ($key + 1) . '</td><td>' . $val->fees_name . '</td><td>' . number_format($val->amount, 2) . '</td></tr>';
        }
        $studentHeader = $studentHeader . '<tr><td>&nbsp;</td><td>TOTAL</td><td>' . number_format($total, 2) . '</td></tr>';
        $studentHeader = $studentHeader . '<tr><td colspan="3">(Total in words: ' . ucwords($com->getIndianCurrency($total)) . ') Only</td></tr>';
        $studentHeader = $studentHeader . '</table>';
        $studentHeader = $studentHeader . '<table style="width:100%"><tbody>';
        $studentHeader = $studentHeader . '<tr><td colspan="3">&nbsp;</td></tr>';
        $studentHeader = $studentHeader . '<tr><td colspan="3">&nbsp;</td></tr>';
        $studentHeader = $studentHeader . '<tr><td colspan="3">&nbsp;</td></tr>';
        $studentHeader = $studentHeader . '<tr><td colspan="3">&nbsp;</td></tr>';
        $studentHeader = $studentHeader . '<tr><td colspan="3">&nbsp;</td></tr>';
        $studentHeader = $studentHeader . '<tr><td>Mode of Payment: ' . $payment . '</td><td>&nbsp;</td><td>Signature</td></tr></table>';
        $lg = Array();
        $lg['a_meta_charset'] = 'UTF-8';
//$lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';

        $pdf = new AUTHPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(100, $page_height), true, 'UTF-8', false);
        $pdf->SetCreator("4BLOCKSInc");
        $pdf->SetAuthor('4BLOCKSInc');
        $pdf->SetTitle('4BLOCKSInc');
        $pdf->SetSubject('Receipt');
        $pdf->SetKeywords('Receipt');
        $pdf->SetHeaderData("/upScale.png", PDF_HEADER_LOGO_WIDTH, '', "");
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(4, 4, 4);
        $pdf->SetHeaderMargin(5);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(TRUE, 5);
        $pdf->setImageScale(2);
        $pdf->setLanguageArray($lg);

//$pdf->SetFont('helvetica', '', 9);
        $pdf->SetFont('dejavusans', '', 8);
        $pdf->AddPage();
        $pdf->setCellPaddings(0, 0.4, 0, 0.4);
        $pdf->writeHTML($schoolHeader, true, false, true, false);
        $pdf->setCellPaddings(0, 0.5, 0, 0);
        $pdf->writeHTML($academicHeader, true, false, true, false);
        $pdf->setCellPaddings(0, 0.5, 0, 0);
        $pdf->writeHTML($studentHeader, true, false, true, false);
        $pdf->lastPage();
        $pdf->Output(PDF_ROOT . 'receipts/bill_' . $param['fees_paid_id'] . '.pdf', 'F');
        $res = IMG_BASE_URL . 'receipts/bill_' . $param['fees_paid_id'] . '.pdf';

        return $res;
    }

    public function login($uname, $pass) {
        $response = array('error' => true, 'message' => 'Invalid login details');
        $result = $this->conn->query('SELECT * FROM `admins` WHERE `username`= \'' . $uname . '\' AND `password` = \'' . $pass . '\'');
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $response = array('error' => false, 'message' => 'Data fetched successfully', 'data' => $data);
        }
        return $response;
    }

    public function addEventImage($files, $data) {
        $obj = new Common();
        $count = 0;
        $total = count($files['name']);
        for ($i = 0; $i < $total; $i++) {
            $path = $obj->saveFile(array('name' => $files['name'][$i], 'tmp_name' => $files['tmp_name'][$i]), 'event_gallery/' . $data['event_id']);
            $insert = $obj->insertRecord(array('event_id' => $data['event_id'], 'image' => $path), 'event_images');
            if ($insert > 0) {
                $count = $count + 1;
            }
        }
        $res = array('error' => false, 'message' => $count . ' images added');
        return $res;
    }

    public function getAllEventwithImages() {
        $res = array('error' => true, 'message' => 'Order items does not exists');
        $obj = new Common();
        $items = $obj->selectAllWithWhere('events', 'showingallery="1"');
        if (count($items) > 0) {
            $data = $items;
            $res = array('error' => false, 'message' => 'Order items  found', 'data' => $data);
        }
        return $res;
    }

    public function getAllNotifications($student_id, $class_section_id) {
        $res = array('error' => true, 'message' => 'No Notificatons Found');
        $notifications = $this->conn->query('SELECT `title`, `message`, `image`, `created_at` FROM `notification_global` WHERE `class_section_id`=' . $class_section_id . ' UNION SELECT `title`, `message`, `image`, `created_at` FROM `notification_individual` WHERE `class_section_id`=' . $class_section_id . ' AND `student_id`=' . $student_id . ' ORDER BY `created_at` DESC ');
        if ($notifications->num_rows > 0) {
            $data = [];
            while ($row = $notifications->fetch_assoc()) {
                $data[] = $row;
            }
            $res = array('error' => false, 'message' => 'Notifications  found', 'data' => $data);
        }
        return $res;
    }

    public function generatePayroll($file, $data) {
        $res = array('error' => true, 'data' => [], 'message' => 'Unable to generate payroll');
        $handle = fopen($file['file']['tmp_name'], "r");
        $mimes = array('application/vnd.ms-excel', 'text/plain', 'text/csv', 'text/tsv', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if (in_array($file['file']['type'], $mimes)) {
            $com = new Common();
            $staffs = $com->executeSelectAllWithWhere('s.ID, s.name, s.monthly_salary, s.per_day_salary, s.emp_code, d.name AS designition, pc.leave_allowable, pc.in_time, w.working_days, w.month_id, m.name AS month_name, y.name AS year_name, w.year_id, 0 AS late, 0 AS present, 0 AS absent', 'staffs AS s LEFT JOIN designitions AS d ON d.ID = s.designition_id LEFT JOIN payroll_configs AS pc ON pc.designition_id = s.designition_id LEFT JOIN working_days AS w ON w.designition_id = s.designition_id AND w.year_id = ' . $data['year_id'] . ' AND w.month_id = ' . $data['month_id'] . ' LEFT JOIN months AS m ON m.ID = w.month_id LEFT JOIN years AS y ON y.ID = w.year_id', 's.status = 1');
            if (count($staffs) > 0) {
                $res['error'] = false;
                $staff_list = array();
                foreach ($staffs as $r) {
                    if (isset($r['emp_code']) && $r['emp_code'] != '') {
                        $r['addons'] = [];
                        $staff_list[] = $r;
                    }
                }
                $first = true;
                $count = 0;
                while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
                    if ($first == false && trim($row[1]) != null && trim($row[1]) != '') {
                        foreach ($staff_list as $key => $val) {
                            if ($val['emp_code'] == trim($row[1])) {
//Check present or absent $row[15]
                                if (strpos(trim($row[15]), 'Present') !== false) {
                                    $staff_list[$key]['present'] = $staff_list[$key]['present'] + 1;
                                }
                                if (strpos(trim($row[15]), 'Absent') !== false) {
                                    $staff_list[$key]['absent'] = $staff_list[$key]['absent'] + 1;
                                }
                                //Check intime $row[10]
                                if (strtotime(trim($row[10])) > strtotime(trim($staff_list[$key]['in_time']))) {
                                    $staff_list[$key]['late'] = $staff_list[$key]['late'] + 1;
                                }
                                break;
                            }
                        }
                    } else {
                        $first = false;
                    }
                }
                $res['data'] = $staff_list;
                $res['message'] = 'Payroll generted successfully';
            }
        }
        return $res;
    }

    public function importStudents($file) {
        $res = array('error' => true, 'message' => 'Unable to import students');
        $handle = fopen($file['file']['tmp_name'], "r");
        $mimes = array('application/vnd.ms-excel', 'text/plain', 'text/csv', 'text/tsv', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if (in_array($file['file']['type'], $mimes)) {
            $com = new Common();
            $res['error'] = false;
            $first = true;
            $count = 0;
            $all_classes = $com->selectAllCustomWithWhere(array('ID', 'name'), 'classes', 'ID > 0');
            $all_sections = $com->selectAllCustomWithWhere(array('ID', 'name'), 'sections', 'ID > 0');
            $all_groups = $com->selectAllCustomWithWhere(array('ID', 'name'), 'groups', 'ID > 0');
            $all_genders = $com->selectAllCustomWithWhere(array('ID', 'name'), 'genders', 'ID > 0');
            $all_religions = $com->selectAllCustomWithWhere(array('ID', 'name'), 'religions', 'ID > 0');
            $all_casts = $com->selectAllCustomWithWhere(array('ID', 'name'), 'casts', 'ID > 0');
            $all_countries = $com->selectAllCustomWithWhere(array('ID', 'name'), 'countries', 'ID > 0');
            $all_states = $com->selectAllCustomWithWhere(array('ID', 'name'), 'states', 'ID > 0');
            $all_cities = $com->selectAllCustomWithWhere(array('ID', 'name'), 'cities', 'ID > 0');
            $classes = array();
            $sections = array();
            $groups = array();
            $genders = array();
            $religions = array();
            $casts = array();
            $countries = array();
            $states = array();
            $cities = array();
            foreach ($all_classes as $cls) {
                $classes[trim($cls['name'])] = $cls['ID'];
            }
            foreach ($all_sections as $sec) {
                $sections[strtolower(trim($sec['name']))] = $sec['ID'];
            }
            foreach ($all_groups as $grp) {
                $groups[strtolower(trim($grp['name']))] = $grp['ID'];
            }
            foreach ($all_genders as $gnd) {
                $genders[strtolower(trim($gnd['name']))] = $gnd['ID'];
            }
            foreach ($all_religions as $reg) {
                $religions[strtolower(trim($reg['name']))] = $reg['ID'];
            }
            foreach ($all_casts as $cas) {
                $casts[strtolower(trim($cas['name']))] = $cas['ID'];
            }
            foreach ($all_countries as $con) {
                $countries[strtolower(trim($con['name']))] = $con['ID'];
            }
            foreach ($all_states as $sts) {
                $states[strtolower(trim($sts['name']))] = $sts['ID'];
            }
            foreach ($all_cities as $cty) {
                $cities[strtolower(trim($cty['name']))] = $cty['ID'];
            }
            while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
                if ($first == false) {
                    $class = 0;
                    $section = 0;
                    $group = 0;
                    $gender = 0;
                    $religion = 0;
                    $cast = 0;
                    $country = 0;
                    $state = 0;
                    $city = 0;
                    if (isset($classes[trim($row[1])])) {
                        $class = $classes[trim($row[1])];
                    }
                    if (isset($sections[strtolower(trim($row[2]))])) {
                        $section = $sections[strtolower(trim($row[2]))];
                    }
                    if (isset($groups[strtolower(trim($row[7]))])) {
                        $group = $groups[strtolower(trim($row[7]))];
                    }
                    if (isset($genders[strtolower(trim($row[8]))])) {
                        $gender = $genders[strtolower(trim($row[8]))];
                    }
                    if (isset($religions[strtolower(trim($row[10]))])) {
                        $religion = $religions[strtolower(trim($row[10]))];
                    }
                    if (isset($casts[strtolower(trim($row[11]))])) {
                        $cast = $casts[strtolower(trim($row[11]))];
                    }
                    if (isset($countries[strtolower(trim($row[22]))])) {
                        $country = $countries[strtolower(trim($row[22]))];
                    }
                    if (isset($states[strtolower(trim($row[23]))])) {
                        $state = $states[strtolower(trim($row[23]))];
                    }
                    if (isset($cities[strtolower(trim($row[24]))])) {
                        $city = $cities[strtolower(trim($row[24]))];
                    }
                    $insert = $com->insertRecord(array('name' => trim($row[0]), 'class_id' => $class, 'section_id' => $section, 'dob' => date('Y-m-d', strtotime(trim($row[3]))), 'application_no' => trim($row[4]), 'admission_no' => trim($row[5]), 'hosteller' => trim($row[6]), 'group_id' => $group, 'gender_id' => $gender, 'community' => strtoupper(trim($row[9])), 'religion_id' => $religion, 'cast_id' => $cast, 'nationality' => trim($row[12]), 'blood_group' => trim($row[12]), 'doj' => date('Y-m-d', strtotime(trim($row[14]))), 'father_name' => trim($row[15]), 'mother_name' => trim($row[16]), 'contact_no' => trim($row[17]), 'status' => trim($row[18]), 'stopping_name' => trim($row[19]), 'address1' => trim($row[20]), 'address2' => trim($row[21]), 'country_id' => $country, 'state_id' => $state, 'city_id' => $city, 'pincode' => trim($row[25]), 'avatar' => trim($row[26])), 'students');
                    if ($insert > 0) {
                        $count = $count + 1;
                    }
                } else {
                    $first = false;
                }
            }
            if ($count > 0) {
                $res['error'] = false;
                $res['message'] = $count . ' students uploaded';
            }
        }
        return $res;
    }

    public function issueTcToStudent($fields) {
        $res = array('error' => true, 'message' => 'Unable generated TC');
        $dompdf = new Dompdf();
        $com = new Common();
        $student = $com->executeSelectRowWithWhere('c.tc_format', 'students AS s LEFT JOIN classes AS c ON c.ID = s.class_id', 's.ID=' . $fields['ID']);
        $format = $student['tc_format'];
        if ($format == 1) {
            $row = $com->selectRowWithWhere('transfer_certificates', 'name=\'format_1\'');
            $dompdf->setPaper(array(0, 0, 750, 1200));
        } else {
            $row = $com->selectRowWithWhere('transfer_certificates', 'name=\'format_2\'');
            $dompdf->setPaper(array(0, 0, 800, 1350));
        }
        $content = $row['value'];
        $content = $com->getReplacedString($content, $fields);
        $dompdf->loadHtml($content);
        $dompdf->render();
        $font = $dompdf->getFontMetrics()->get_font("helvetica", "light");
        $output = $dompdf->output();
        $fileName = 'uploads/' . uniqid();
        file_put_contents($fileName . '.pdf', $output);
        $update = $com->updateRecordWithWhere(array('tc_issued' => 1, 'tc_path' => $fileName . '.pdf'), 'students', 'ID = ' . $fields['ID']);
        if ($update > 0) {
            $res = array('error' => false, 'message' => 'TC generated successfully', 'data' => array('tc_issued' => 1, 'tc_path' => $fileName . '.pdf'));
        }
        return $res;
    }

}
