<?php

error_reporting(0);
session_start();

if(isset($_GET['vnum']) && isset($_GET['tid'])){

$vnum=$_GET["vnum"];
$tid=$_GET["tid"];



$conn=mysqli_connect('localhost','root','','tolldb');

 if(!$conn) {
      die('Could not connect');
   }
   



   $sql = "INSERT INTO toll_event (v_num, toll_id, amount) VALUES ('$vnum','$tid', 50)";



   $retval = mysqli_query( $conn, $sql);
   
   if(!$retval) {
      die('Could not enter data');
   }
   
  
   
   mysqli_close($conn);
   echo 'updated';
}

?>