<?php

require_once 'dbhandler.php';
$db = new DbHandler();
$db->sendNotifications();

