<?php

error_reporting(0);


if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"])){

$name=$_POST["name"];
$email=$_POST["email"];
$pass=$_POST["password"];
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
      (id,email,name,password,updated) 
      VALUES ('$id','$email','$name','$pass',0)";



   $retval = mysqli_query( $conn, $sql);
   
   if(!$retval) {
      die('Could not enter data');
   }
   
  
   
   mysqli_close($conn);

   header("Location: login.php");
   die();
   }
   header("Location: login.php");

?>