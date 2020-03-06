<?php
session_start();
$immdediate = $_REQUEST['immediate'];
$_SESSION['immediate'] = $immdediate;
?>