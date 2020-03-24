<?php
session_start();
$testmode       = $_REQUEST['testmode'];

$_SESSION['testmode']  = $testmode;
?>