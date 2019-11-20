<?php
require_once 'api/include/common.php';
$obj = new Common();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Thirukkural</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta charset=utf-8" />
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/sweet-alert.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>
            <img src="img/logo.png" alt="logo">
        </header>
        <div class="form-section">
            <div class="container">
                <div class="kural-section">
                    <h2>இன்றைய திருக்குறள் </h2>
                    <p>அகர முதல எழுத்தெல்லாம் ஆதி<br/>
                        பகவன் முதற்றே உலகு.</p>
                </div>
                <form class="form" onsubmit="return registerTask();">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <label for="d" class="col-sm-4 col-form-label">D :</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="d" id="d" placeholder="" maxlength="4" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="b" class="col-sm-4 col-form-label">B :</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="b" id="b" placeholder="" maxlength="4" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="a" class="col-sm-4 col-form-label">A :</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="a" id="a" placeholder="" maxlength="4" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="c" class="col-sm-4 col-form-label">C :</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="c" id="c" placeholder="" maxlength="4" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <!--                                <label for="lid">L.Id</label>-->
                                <input type="text" class="form-control" name="member_id" id="member_id" placeholder="Enter Your L.id" required>
                            </div>
                            <div class="form-group">
                                <!--                                <label for="mobile">Mobile Number</label>-->
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Your Mobile Number" required>
                            </div>
                        </div>
                    </div>

                    <center>
                        <button name="submit" type="submit" class="btn btn-primary" id="contact-submit">Submit</button>
                    </center>
                </form>
            </div>
        </div>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/sweet-alert.min.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
<!--        <script>
            $(window).scroll(function () {
                if ($(this).scrollTop() > 250) {
                    $('header').addClass("sticky");
                } else {
                    $('header').removeClass("sticky");
                }
            });
        </script>-->
    </body>
</html>