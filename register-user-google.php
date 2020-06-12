<?php
session_start();
include('googlelogin/register-user-config.php');
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

    if(!empty($data['name']))
    {
        $name = $data['name'];
    }

    if(!empty($data['email']))
    {
        $gender = $data['gender'];
    }

    $error_msg = '';
    if(trim($email)!='') {
        $error_msg = 'Email Required';        
    }
    
    
    if($error_msg!='')
    {    
        $sel_stud = $obj->selectRow('*','student_register','email=\''.$email.'\'');
       
        
        if(count($sel_stud)==0) {            
            $obj->insertRecord(array('student_name'=>$name,'email'=>$email,'gender'=>$gender,'created_at'=>date('Y-m-d H:i:S')),'student_register'); 
            header('Location:payment-page');
            exit;
        }
        else {
            $error_msg = 'Email Already Exists!';  
            
        }
        
    }    
    
    
    if($error_msg!='') {
        $_SESSION['google_login_error'] =$error_msg;
        header("Location:register_user");
    }
    
 }
}   
?>