<?php

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';
//require_once 'google-api-php-client-250/src/Google/Client.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('286725676418-osr6v7r00qj8paccfj5qao466mu5ko9c.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('p8UIjJmEVvXlrH4jF11uGxyd');

//Set the OAuth 2.0 Redirect URI
//$google_client->setRedirectUri('http://localhost/project/exam-horse-sample/register_user1');
$google_client->setRedirectUri('http://examhorse.com/register_user1');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
//session_start();

?>