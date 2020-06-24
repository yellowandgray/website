<?php
session_start();
include('fb-login/index.php');
require_once 'api/include/common.php';
ini_set('date.timezone', 'Asia/Kolkata');
$obj = new Common();


try {
    $accessToken = $helper->getAccessToken();
    if (isset($accessToken)) {
       $_SESSION['access_token'] = (string) $accessToken;  //conver to string
      //if session is set we can redirect to the user to any page 
        //header("Location:index.php");
    }
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}


$email              = '';

//now we will get users first name , email , last name
if (isset($_SESSION['access_token'])) { 
      
    try {

        $fb->setDefaultAccessToken($_SESSION['access_token']);
        $res = $fb->get('/me?locale=en_US&fields=email,name');
        $user = $res->getGraphUser();
        
        $email = $user->getField('email');
                    
                
        unset($_SESSION['access_token']);

        
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

$error_msg = '';
if(trim($email)=='') {
    $error_msg = 'Email Required';        
}

if($error_msg=='')
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
?>