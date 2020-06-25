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
$name               = '';
$gender             = '';

//now we will get users first name , email , last name
if (isset($_SESSION['access_token'])) { 
      
    try {

        $fb->setDefaultAccessToken($_SESSION['access_token']);
        
        $res = $fb->get('/me?locale=en_US&fields=email,name');
        $user = $res->getGraphUser();
        
        $name = $user->getField('name');
        $email = $user->getField('email');
        $gender = $user->getField('gender');        
                     
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
    $sel_stud = $obj->selectRow('*','student_register','email=\''.$email.'\'');


    if(count($sel_stud)==0) {            
       //$record = $obj->insertRecord(array('student_name'=>$name,'email'=>$email,'gender'=>$gender,'created_at'=>date('Y-m-d H:i:S')),'student_register'); 
        if(isset($_SESSION['pay_student'])) {
            unset($_SESSION['pay_student']);
        }        
        $_SESSION['pay_student']   = array('student_name'=>$name,'email'=>$email,'gender'=>$gender);

        header('Location:payment/pay');
        exit;
    }
    else {
        $error_msg = 'Email Already Exists!';  

    }

}    


if($error_msg!='') {
    $_SESSION['google_login_error'] =$error_msg;
    header("Location:member-signup");
}
?>