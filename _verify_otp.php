<?php
error_reporting(0);
session_start();
$otp = $_SESSION["otp"];
if(isset($_POST["otp"])){
	if($_POST["otp"]==$otp){


if(isset($_SESSION["name"]) && isset($_SESSION["email"]) && isset($_SESSION["password"])){

$name=$_SESSION["name"];
$email=$_SESSION["email"];
$pass=$_SESSION["password"];
$pass = md5($pass);


$id = hash('adler32', $email);

$conn=mysqli_connect('localhost','root','','tolldb');

 if(!$conn) {
      die('Could not connect');
   }
   


    $sql2 = "SELECT * FROM user WHERE email='$email'";
    $retval2 = mysqli_query( $conn, $sql2 );
   
   $numrows=mysqli_num_rows($retval2);
   
   if($numrows>0){
      header("Location: register.php?status=exists");
      die();
   }




   $sql = "INSERT INTO user
      (id,email,name,password,updated,verified) 
      VALUES ('$id','$email','$name','$pass',0,0)";



   $retval = mysqli_query( $conn, $sql);
   
   if(!$retval) {
      die('Could not enter data');
   }
   
  
   
   mysqli_close($conn);

   session_destroy();

   header("Location: login.php?status=created");
   die();
   }
   session_destroy();
   header("Location: login.php");

	}else{
		echo 'otp incorrect';
	}
}else{
	echo 'otp not set';
}


?>