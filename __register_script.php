<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
set_time_limit(600);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.yandex.ru';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'smartoll@yandex.com';                 // SMTP username
    $mail->Password = 'smartoll12345';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('smartoll@yandex.com', 'administration');
    $mail->addAddress('sohaibalam67@gmail.com', 'sohaib');     // Add a recipient             // Name is optiona
    //Attachments
   // Optional name
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Smartoll Registration';
    $mail->Body    = 'your code is 1235';
    $mail->AltBody = 'your code is 1234';
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}