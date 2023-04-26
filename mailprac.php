<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$_SERVER['DOCUMENT_ROOT'].
require __DIR__.'\PHPMailer-master\src\Exception.php';
require __DIR__.'\PHPMailer-master\src\PHPMailer.php';
require __DIR__.'\PHPMailer-master\src\SMTP.php';
//Create an instance; passing `true` enables exceptions

echo $_SERVER['DOCUMENT_ROOT'];
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp-relay.sendinblue.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'dhdsh.lang@gmail.com';                     //SMTP username
    $mail->Password   = 'Mb4LJ9jaAq3dmC07';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('julia@gmail.com', 'From Julia, your Friend');
    $mail->addAddress('dhavalbhatt3981@gmail.com', 'DEAR');     //Add a recipient
   
   //  $mail->addReplyTo('info@example.com', 'Information');
   //  $mail->addCC('cc@example.com');
   //  $mail->addBCC('bcc@example.com');

   //  //Attachments
   //  $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
   //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'This is Julia';
    $mail->Body    = 'I\'ve been loving you for a long time, come to me and show me love</b>';
    $mail->AltBody = 'tell ';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>