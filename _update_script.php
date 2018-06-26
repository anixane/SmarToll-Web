<?php

error_reporting(0);
session_start();

if(isset($_POST['uid']) && isset($_FILES['v_num']['name']) && isset($_FILES['dl_num']['name']) && isset($_POST["dob"]) && isset($_POST["city"]) && isset($_POST["state"]) && isset($_POST["phone"])){

$id=$_SESSION["id"];
$uid=$_POST["uid"];
$dob=$_POST["dob"];
$city=$_POST["city"];
$state=$_POST["state"];
$phone=$_POST["phone"];


//for RC
$v_fname = $_FILES['v_num']['name'];
$v_fsize = $_FILES['v_num']['size'];
$v_type = $_FILES['v_num']['type'];
$v_tmp_name = $_FILES['v_num']['tmp_name'];
$location = 'docs/';

$md5 = md5($v_fname.$v_fsize.$v_type);

$v_title = md5($md5);

$v_newname = $v_title.".jpg";

if(isset($v_fname)){
  if(!empty($v_fname)){
    move_uploaded_file($v_tmp_name, $location.$v_newname);
  }
}





//for DL
$d_fname = $_FILES['dl_num']['name'];
$d_fsize = $_FILES['dl_num']['size'];
$d_type = $_FILES['dl_num']['type'];
$d_tmp_name = $_FILES['dl_num']['tmp_name'];

$md5 = md5($d_fname.$d_fsize.$d_type);

$d_title = md5($md5);

$d_newname = $d_title.".jpg";

if(isset($d_fname)){
  if(!empty($d_fname)){
    move_uploaded_file($d_tmp_name, $location.$d_newname);
  }
}









$conn=mysqli_connect('localhost','root','','tolldb');

 if(!$conn) {
      die('Could not connect');
   }
   


    $sql2 = "UPDATE user SET updated=1 WHERE id='$id'";
    $retval2 = mysqli_query( $conn, $sql2 );
   


   $sql = "INSERT INTO details VALUES ('$id','$uid','$v_newname','$d_newname','$city','$state','$phone','$dob','-','-')";



   $retval = mysqli_query( $conn, $sql);
   
   if(!$retval) {
      die('Could not enter data');
   }
   
  
   
   mysqli_close($conn);

   header("Location: login.php?status=awaited");
   die();
   }
   header("Location: login.php?status=awaited");

?>