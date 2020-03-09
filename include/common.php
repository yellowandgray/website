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
        $result = $this->conn->query('SELECT * FROM `' . $table . '` ORDER BY `ID` DESC');
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (isset($row['image']) && $row['image'] != '') {
                    $row['image'] = IMG_BASE_URL . $row['image'];
                }
                if (isset($row['invitation']) && $row['invitation'] != '') {
                    $row['invitation'] = IMG_BASE_URL . $row['invitation'];
                }
                if (isset($row['eventimage']) && $row['eventimage'] != '') {
                    $row['eventimage'] = IMG_BASE_URL . $row['eventimage'];
                }
                if (isset($row['cover_image']) && $row['cover_image'] != '') {
                    $row['cover_image'] = IMG_BASE_URL . $row['cover_image'];
                }
                if ($table == 'classes') {
                    $row['classsubjects'] = [];
                    $classsubjects = $this->selectAllCustomWithWhere(array('subject_id'), 'class_subjects', 'class_id=' . $row['ID']);
                    if (count($classsubjects) > 0) {
                        foreach ($classsubjects as $val) {
                            array_push($row['classsubjects'], $val['subject_id']);
                        }
                    }
                }
                if ($table == 'events') {
                    $row['eventimages'] = [];
                    $eventimages = $this->selectAllWithWhere('event_images', 'event_id=' . $row['ID']);
                    if (count($eventimages) > 0) {
                        foreach ($eventimages as $val) {
                            //$val['image'] = IMG_BASE_URL . $val['image'];
                            array_push($row['eventimages'], $val['image']);
                        }
                    }
                }
                if ($table == 'teachers') {
                    $row['subjects'] = [];
                    $subjects = $this->selectAllCustomWithWhere(array('subject_id'), 'teacher_subjects', 'teacher_id=' . $row['ID']);
                    if (count($subjects) > 0) {
                        foreach ($subjects as $val) {
                            array_push($row['subjects'], $val['subject_id']);
                        }
                    }
                }
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

    public function getallcount($table) {
        $data = array();
        $result = $this->conn->query('SELECT COUNT(*) AS `count` FROM `' . $table . '`');
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
        }
        return $data;
    }

    public function getallcountwithWhere($table, $where) {
        $data = array();
        $result = $this->conn->query('SELECT COUNT(*) AS `count` FROM `' . $table . '` WHERE ' . $where);
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
                $data[] = $row;
            }
        }
        return $data;
    }

    public function selectRowWithWhere($table, $where) {
        $this->conn->set_charset("utf8");
        $data = array();
        $result = $this->conn->query('SELECT * FROM `' . $table . '` WHERE ' . $where);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

    public function selectAllCustomWithoutWhere($fields, $table) {
        $data = array();
        $result = $this->conn->query('SELECT ' . implode(",", $fields) . ' FROM ' . $table);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (isset($row['image']) && $row['image'] != '') {
                    $row['image'] = IMG_BASE_URL . $row['image'];
                }
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

    public function selectInJoinWithWhere($array, $where) {
        //$array = array('table'=>'teacher', 'alise'=>'t', 'fields'=>array('name'=>'teacher_name', 'gender'=>'teacher_gender'), 'on'=>'t.name=s.name');
        $data = array();
        $fields = array();
        $table = '';
        foreach ($array as $key => $val) {
            foreach ($val['fields'] as $index => $row) {
                array_push($fields, $val['alise'] . '.' . $key . ' AS ' . $row);
            }
            if ($key != 0) {
                if ((count($array) - 1) == $key) {
                    $table = $table . $val['table'] . ' AS ' . $val['alise'] . ' ON ' . $val['on'];
                } else {
                    $table = $table . $val['table'] . ' AS ' . $val['alise'] . ' ON ' . $val['on'] . ' LEFT JOIN ';
                }
            } else {
                $table = $table . $val['table'] . ' AS ' . $val['alise'] . ' LEFT JOIN ';
            }
        }
        $result = $this->conn->query('SELECT ' . implode(",", $fields) . ' FROM ' . $table . ' WHERE ' . $where);
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

    public function executeSelectRowWithWhere($fields, $table, $where) {
        $data = array();
        $result = $this->conn->query('SELECT ' . $fields . ' FROM ' . $table . ' WHERE ' . $where);
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
        }
        return $data;
    }

    public function executeSelectAllWithWhere($fields, $table, $where) {
        $data = array();
        $result = $this->conn->query('SELECT ' . $fields . ' FROM ' . $table . ' WHERE ' . $where);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function executeSelectAllWithoutWhere($fields, $table) {
        $data = array();
        $result = $this->conn->query('SELECT ' . $fields . ' FROM ' . $table);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
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

}
