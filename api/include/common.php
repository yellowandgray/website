<?php

class Common {

    private $conn;

    function __construct() {
        require_once dirname(__FILE__) . '/DbConnect.php';
// opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

    public function selectAll($fields, $table, $where) {
        $data = array();
        $result = $this->conn->query('SELECT ' . $fields . ' FROM ' . $table . ' WHERE ' . $where);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function selectRow($fields, $table, $where) {
        $data = array();
        $result = $this->conn->query('SELECT ' . $fields . ' FROM ' . $table . ' WHERE ' . $where);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $data = $row;
        }
        return $data;
    }

    public function updateRecordWithWhere($fields, $table, $where) {
        $records = [];
        foreach ($fields as $key => $val) {
            array_push($records, $key . ' = \'' . mysqli_real_escape_string($this->conn, $val) . '\'');
        }
        $this->conn->query('UPDATE `' . $table . '` SET ' . implode(',', $records) . ' WHERE ' . $where);
        return $this->conn->affected_rows;
    }

    public function deleteRecordWithWhere($table, $where) {
        $this->conn->query('DELETE FROM `' . $table . '` WHERE ' . $where);
        return $this->conn->affected_rows;
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

    public function escapeString($val) {
        return mysqli_real_escape_string($this->conn, $val);
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

    public function getReplacedString($str, $replaces) {
        foreach ($replaces as $key => $val) {
            $str = str_replace('[' . $key . ']', $val, $str);
        }
        return $str;
    }

    public function charLimit($str, $len) {
        if ($str && $str != null && $str != 'null' && $str != 'undefined') {
            if (strlen($str) <= $len) {
                return $str;
            } else {
                $y = substr($str, 0, $len) . '...';
                return $y;
            }
        } else {
            return '-';
        }
    }

    public function encryptPassword($pass) {
        $encrypt = password_hash($pass, PASSWORD_DEFAULT);
        return $encrypt;
    }

    public function decryptPassword($pass, $hash) {
        $encrypt = password_verify($pass, $hash);
        return $encrypt;
    }

    public function randomStringGenerator($n) {
        // Variable which store final string
        $generated_string = "";
        // Create a string with the help of  
        // small letters, capital letters and 
        // digits. 
        $domain = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        // Find the lenght of created string 
        $len = strlen($domain);
        // Loop to create random string 
        for ($i = 0; $i < $n; $i++) {
            // Generate a random index to pick 
            // characters 
            $index = rand(0, $len - 1);
            // Concatenating the character  
            // in resultant string 
            $generated_string = $generated_string . $domain[$index];
        }
        // Return the random generated string 
        return $generated_string;
    }

}
