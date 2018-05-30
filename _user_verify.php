<?php

set_time_limit(600);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

error_reporting(0);
session_start();

if(isset($_POST["id"]) && isset($_POST["vnm"]) && isset($_POST["dnm"])){


$id=$_POST["id"];
$vnm=$_POST["vnm"];
$dnm=$_POST["dnm"];

$conn=mysqli_connect('localhost','root','','tolldb');

 if(!$conn ) {
      die('Could not connect');
   }
   
 $sql2 = "UPDATE user SET verified=1 WHERE id='$id'";
    $retval2 = mysqli_query( $conn, $sql2 );
   
   if(! $retval2) {
      die('Could not update data');
   }


    $sql4 = "UPDATE details SET rc='$vnm', dl='$dnm' WHERE id='$id'";
    $retval4 = mysqli_query( $conn, $sql4 );
   
   if(! $retval4) {
      die('Could not update data');
   }



   
 $sql3 = "SELECT email FROM user WHERE id='$id'";
 $retval3 = mysqli_query( $conn, $sql3 );

 if(! $retval3) {
      die('Could not select data');
   }
   $row1 = mysqli_fetch_array($retval3, MYSQLI_BOTH);
   $email=$row1[0];
    
mysqli_close($conn);




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
    $mail->addAddress($email, 'User');     // Add a recipient             // Name is optiona
    //Attachments
   // Optional name
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Smartoll Account Verification';
    $mail->Body    = 'Your Smartoll account is verified. You can now sucessfully login.';
    $mail->AltBody = 'Your Smartoll account is verified. You can now sucessfully login.';
    $mail->send();
    
} catch (Exception $e) {
    
}




}
header("Location: _admin.php");
?>