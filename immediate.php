<?php
session_start();
$immdediate     = $_REQUEST['immediate'];
$testmode       = $_REQUEST['testmode'];

$_SESSION['immediate'] = $immdediate;
$_SESSION['testmode']  = $testmode;
?>