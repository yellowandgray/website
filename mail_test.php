<html>
    <head>
        <title>PHPMailer - SMTP (Gmail) basic test</title>
    </head>
    <body>

        <?php
//error_reporting(E_ALL);
        error_reporting(E_STRICT);

        require_once('include/PHPMailer/class.phpmailer.php');
        //include("include/PHPMailer/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $body = 'Hello';
        $mail->SMTPDebug = 1;                     // enables SMTP debug information (for testing)
        // 1 = errors and messages
        // 2 = messages only
        $mail->SMTPAuth = true;                  // enable SMTP authentication
        $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
        $mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
        $mail->Port = 465;                   // set the SMTP port for the GMAIL server
        $mail->Username = "yellowandgraychannel@gmail.com";  // GMAIL username
        $mail->Password = "Y3ll0w@g";            // GMAIL password
        $mail->SetFrom('yellowandgraychannel@gmail.com', 'Test');

        $mail->Subject = "PHPMailer Test Subject via smtp (Gmail), basic";

//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

        $mail->Body = $body;

        $address = "fido2cool.ak@gmail.com";
        $mail->AddAddress($address, "John Doe");


        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }
        ?>

    </body>
</html>
