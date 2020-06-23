<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//include autoload file from vendor folder
require 'vendor/autoload.php';


$fb = new Facebook\Facebook([
    'app_id' => '1155857954778683', // replace your app_id
    'app_secret' => '07fd623b78586bb37deeaf667f20b125',   // replace your app_scsret
    'default_graph_version' => 'v2.7'
        ]);


$helper = $fb->getRedirectLoginHelper();
$fb_login_url = $helper->getLoginUrl("http://localhost/project/exam-horse-sample/login-user-facebook.php",array('email'));
$fb_register_url = $helper->getLoginUrl("http://localhost/project/exam-horse-sample/register-user-facebook.php",array('email'));
 


