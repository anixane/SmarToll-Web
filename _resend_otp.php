<?php
set_time_limit(600);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
error_reporting(0);
session_start();

$otp = rand(1000,9999);

$_SESSION["otp"]=$otp;


$name=$_SESSION["name"];
$email=$_SESSION["email"];

//Load Composer's autoloader
require 'vendor/autoload.php';
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.yandex.ru';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'smartoll@yandex.com';                 // SMTP username
    $mail->Password = 'smartoll12345';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('smartoll@yandex.com', 'admin');
    $mail->addAddress($email, $name);     // Add a recipient             // Name is optiona
    //Attachments
   // Optional name
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Smartoll Registration';
    $mail->Body    = 'your code is '.$otp;
    $mail->AltBody = 'your code is '.$otp;
    $mail->send();
    
} catch (Exception $e) {
    
}

header("Location: otp.php?status=resent");

?>