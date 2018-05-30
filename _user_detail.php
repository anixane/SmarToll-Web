<?php


error_reporting(0);
session_start();

if(isset($_GET["id"])){


$id=$_GET["id"];

$conn=mysqli_connect('localhost','root','','tolldb');

 if(!$conn ) {
      die('Could not connect');
   }
   
   $sql = "SELECT * FROM details WHERE id='$id'";

 
   $retval = mysqli_query( $conn, $sql );
   
   if(! $retval) {
      die('Could not select data');
   }
   
    $row = mysqli_fetch_array($retval, MYSQLI_BOTH);
      $uid=$row[1];
      $v_img=$row[2];
      $d_img=$row[3];
      $city=$row[4];
      $state=$row[5];
      $phone=$row[6];
      $dob=$row[7];



echo '

	<form action="_user_verify.php" method="post" >
	<input type="hidden" value="'.$id.'" name="id">
	<table align=center border=1 style="font-size:15pt; font-family:arial;">
	<tr>
	<td>UID</td><td>'.$uid.'</td>
	</tr>
	<tr>
	<td>Vehicle RC</td><td><img src="docs/'.$v_img.'"></td>
	</tr>
	<tr>
	<td>DL</td><td><img src="docs/'.$d_img.'"></td>
	</tr>
	<tr>
	<td>City</td><td>'.$city.'</td>
	</tr>
	<tr>
	<td>state</td><td>'.$state.'</td>
	</tr>
	<tr>
	<td>Phone</td><td>'.$phone.'</td>
	</tr>
	<tr>
	<td>DOB</td><td>'.$dob.'</td>
	</tr>
	<tr>
	<td>Vehicle Number</td><td><input type="text" name="vnm"></td>
	</tr>
	<tr>
	<td>DL Number</td><td><input type="text" name="dnm"></td>
	</tr>


</table><br><center><input type="submit" style="font-size:15pt" value="Verify"></center></form>';



 
mysqli_close($conn);



}




?>