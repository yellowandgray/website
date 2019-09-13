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
        $result = $this->conn->query('SELECT ' . $fields . ' FROM `' . $table . '` WHERE ' . $where);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function selectRow($fields, $table, $where) {
        $data = array();
        $result = $this->conn->query('SELECT ' . $fields . ' FROM `' . $table . '` WHERE ' . $where);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $data = $row;
        }
        return $data;
    }

}
