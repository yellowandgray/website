<?php

session_start();

class common {

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
                $data[] = $row;
            }
        }
        return $data;
    }

    public function selectAllWithdaterange($table, $start_date, $end_date) {
        $data = array();
        $result = $this->conn->query("SELECT * from $table where booking_date BETWEEN '$start_date' AND '$end_date'");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function selectAllWithoutWhereWithLimit($table, $limit) {
        $data = array();
        $result = $this->conn->query('SELECT * FROM `' . $table . '` LIMIT ' . $limit);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function titleView() {
        $data = array();
        $result = $this->conn->query('SELECT `t`.*, `p`.`page_name` AS `page_name` from `sub_title` AS `t` LEFT JOIN `pages` AS `p` ON `p`.`ID` = `t`.`page_id`');
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function pageContentView() {
        $data = array();
        $result = $this->conn->query('SELECT `pc`.*, `t`.`title` AS `sub_title`,`t`.`ID` as `sub_title_id` from `page_content` AS `pc` LEFT JOIN `sub_title` AS `t` ON `pc`.`sub_title_id` = `t`.`ID`');
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function pageContentById($id) {
        $data = array();
        $result = $this->conn->query('SELECT `pc`.*, `t`.`title` AS `sub_title`,`t`.`ID` as `sub_title_id` from `page_content` AS `pc` LEFT JOIN `sub_title` AS `t` ON `pc`.`sub_title_id` = `t`.`ID` where `pc`.`ID` =' . $id);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function pageContentdetails($id) {
        $data = array();
        $result = $this->conn->query('SELECT `pc`.*, `t`.`title` AS `sub_title`,`t`.`ID` as `sub_title_id` , `p`.`ID` as `page_id` from `page_content` AS `pc` LEFT JOIN `sub_title` AS `t` ON `pc`.`sub_title_id` = `t`.`ID` LEFT JOIN `pages` AS `p` ON `t`.`page_id` = `p`.`ID` where `p`.`ID` =' . $id);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function pageContentdetailsgroupBy($id) {
        $data = array();
        $result = $this->conn->query('SELECT `pc`.*, `t`.`title` AS `sub_title`,`t`.`ID` as `sub_title_id` , `p`.`ID` as `page_id` from `page_content` AS `pc` LEFT JOIN `sub_title` AS `t` ON `pc`.`sub_title_id` = `t`.`ID` LEFT JOIN `pages` AS `p` ON `t`.`page_id` = `p`.`ID` where `p`.`ID` =' . $id . ' group by `t`.`ID`');       
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
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

    public function selectAllWithWhere($table, $where) {
        $data = array();
        $result = $this->conn->query('SELECT * FROM `' . $table . '` WHERE ' . $where);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function selectRowWithWhere($table, $where) {
        $data = array();
        $result = $this->conn->query('SELECT * FROM `' . $table . '` WHERE ' . $where);
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
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
        $result = $this->conn->query('SELECT ' . implode(",", $fields) . ' FROM `' . $table . '` WHERE ' . $where);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function selectRowCustomWithWhere($fields, $table, $where) {
        $data = array();
        $result = $this->conn->query('SELECT ' . implode(",", $fields) . ' FROM `' . $table . '` WHERE ' . $where);
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

    public function saveImage($file, $dir) {
        if (!file_exists($dir)) {
            mkdir($dir);
        }
        $extension = strtolower($this->getExtension($file['name']));
        $temp_file_name = md5(uniqid()) . '.' . $extension;
        $dir = $dir . '/' . $temp_file_name;
        $temp_name = $file['tmp_name'];
        move_uploaded_file($temp_name, $dir);
        return $dir;
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

}
