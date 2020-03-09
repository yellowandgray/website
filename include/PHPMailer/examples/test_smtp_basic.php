<html>
    <head>
        <title>PHPMailer - SMTP basic test with authentication</title>
    </head>
    <body>

        <?php
//error_reporting(E_ALL);
        error_reporting(E_STRICT);

        date_default_timezone_set('America/Toronto');

        require_once('../class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

        $mail = new PHPMailer();

        $body = '<p>ffffffff</p>'; //file_get_contents('contents.html');
        //$body = preg_replace('/[\]/', '', $body);

        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->Host = "relay-hosting.secureserver.net"; // SMTP server
        $mail->SMTPDebug = 2;                     // enables SMTP debug information (for testing)
        // 1 = errors and messages
        // 2 = messages only
        //$mail->SMTPAuth = true;                  // enable SMTP authentication
        $mail->Host = "relay-hosting.secureserver.net"; // sets the SMTP server
        $mail->Port = 80;                    // set the SMTP port for the GMAIL server
        $mail->Username = "info@ygbeta.in"; // SMTP account username
        $mail->Password = "ygbeta.in";        // SMTP account password
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Timeout = 3600;

        $mail->SetFrom('info@ygbeta.in', 'First Last');

        $mail->AddReplyTo("info@ygbeta.in", "First Last");

        $mail->Subject = "PHPMailer Test Subject via smtp, basic with authentication";

        $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

        $mail->MsgHTML($body);

        $address = "mushaqdeen@gmail.com";
        $mail->AddAddress($address, "John Doe");

        $mail->AddAttachment("images/phpmailer.gif");      // attachment
        $mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }
        ?>

    </body>
</html>
