<?php
session_start();
include('googlelogin/login-user-config.php');
require_once 'api/include/common.php';
ini_set('date.timezone', 'Asia/Kolkata');
$obj = new Common();

if(isset($_GET["code"]))
{
 //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
 
 
 if(!isset($token['error']))
 {
    //Set the access token used for requests
    $google_client->setAccessToken($token['access_token']);

    //Create Object of Google Service OAuth 2 class
    $google_service = new Google_Service_Oauth2($google_client);

    //Get user profile data from google
    $data = $google_service->userinfo->get();
    
        
    $email              = '';
    $name               = '';
    $gender             = '';
    
    if(!empty($data['email']))
    {
        $email = $data['email'];
    }

    
    $error_msg = '';
    if(trim($email)!='') {
        $error_msg = 'Email Required';        
    }
    
    
    if($error_msg!='')
    {    
        $record = $obj->selectRow('*','student_register','email=\''.$email.'\'');
       
        
        if(count($record)>0) {


            $user_logged_in = $obj->selectRow('*', 'student_current_login', 'student_register_id='.$record['student_register_id']);
            if(count($user_logged_in)==0)
            {
            
                    $obj->insertRecord(array('student_register_id' => $record['student_register_id']),'student_current_login');
                    $obj->insertRecord(array('student_register_id' => $record['student_register_id'], 'login_at' => date('Y-m-d H:i:s'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')), 'student_register_login');
                    $_SESSION['student_register_id'] = $record['student_register_id'];
                    header('Location:member-home');
                    exit;
                    
                    
            }
            else 
            {
                $error_msg = 'User Already Logged In';
            }    
                
        }
        else {
            $error_msg = 'Email Not Registered!';  
            
        }
        
    }    
    
    
    if($error_msg!='') {
         header("Location:member-signin?login_err=".$error_msg);
    }
    
 }
}   
?>