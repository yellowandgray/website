<?php
session_start();
include('googlelogin/register-user-config.php');

require_once 'api/include/common.php';
$obj = new Common();
?>
<html lang="en">
    <?php include 'head_landing.php' ?>
    <body>
        <?php include 'menu_landing.php'; ?>
        <div id="wrapper">
            <section id="featured-1" class="new-register-section">
                <div class="container">
                    <div class="row">
                        <div class="card bg-light">
                            <article class="card-body">
                                
                                <div class="row">
                                    <h1>Thanks for your Registration</h1>
                                </div>
                                <div class="row">
                                    
                                </div>
                                <form >                              
                                  
                                   
                                   
                                    <div class="form-group">
                                        <!--button  class="btn btn-primary btn-block" onClick="window.location.href='login-page';"> Go to Login </button-->
                                        <a href="login-page" class="btn btn-primary btn-block">Go to Login</a>
                                    </div> <!-- form-group// -->      
                                    
                                </form>
                            </article>
                        </div>
                    </div> 
                </div>
            </section>
        </div>
        <?php include 'footer_landing.php'; ?>
        <?php include 'landing_script.php'; ?>
    </body>
</html>