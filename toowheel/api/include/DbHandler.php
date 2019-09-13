<?php

require_once 'thirdparty.php';
require_once 'common.php';
require_once 'tcpdf/tcpdf.php';

class DbHandler {

    private $conn;

    function __construct() {
        require_once dirname(__FILE__) . '/DbConnect.php';
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

    
}
