<?php
error_reporting(0);
session_start();
if(isset($_POST["email"]) && isset($_POST["password"])){

$email=$_POST["email"];

$conn=mysqli_connect('localhost','root','','tolldb');

 if(!$conn ) {
      die('Could not connect');
   }
   
   $sql = 'SELECT id,email, name, password,updated FROM user WHERE email="'.$email.'"';

 
   $retval = mysqli_query( $conn, $sql );
   
   if(! $retval) {
      die('Could not select data');
   }
   
 
 $row = mysqli_fetch_array($retval, MYSQLI_BOTH);
      $id=$row[0];
      $email=$row[1];
      $name=$row[2];
      $pass=$row[3];
      $updated=$row[4];



if($_POST["email"]==$email && md5($_POST["password"])==$pass){

$_SESSION["id"] = $id;
$_SESSION["user"] = $email;
$_SESSION["name"] = $name;


		if($updated==0){
         header("Location: update.php");
      }else{
         header("Location: dashboard.php");
      }
}else{
      header("Location: login.php?status=failed");
die();
}

mysqli_close($conn);
}
?>