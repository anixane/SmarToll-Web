<?php
error_reporting(0);
session_start();

if(!isset($_SESSION["user"])){
  header("Location: login.php");
}

?>



<?php
$id=$_SESSION["id"];
$conn=mysqli_connect('localhost','root','','tolldb');


 $sql1 = 'SELECT updated,verified FROM user WHERE id="'.$id.'"';

 
   $retval1 = mysqli_query( $conn, $sql1 );
   
   if(! $retval1) {
      die('Could not select data');
   }
   
 
 $row = mysqli_fetch_array($retval1, MYSQLI_BOTH);
      $updated=$row[0];
      $verified=$row[1];

      if($updated==0){
      	header("Location: update.php");
      }

      if($verified==0){
      	session_destroy();
      	header("Location: login.php?status=awaited");
      }








 if(!$conn ) {
      die('Could not connect');
   }
   
   $sql = 'SELECT * FROM details WHERE id="'.$id.'"';

 
   $retval = mysqli_query( $conn, $sql );
   
   if(! $retval) {
      die('Could not select data');
   }
   
 
 $row = mysqli_fetch_array($retval, MYSQLI_BOTH);
      $id=$row[0];
      $uid=$row[1];
      $vnum=$row[2];
      $dlnum=$row[3];
      $city=$row[4];
      $state=$row[5];
      $phone=$row[6];
      $dob=$row[7];
      $rc=$row[8];
      $dl=$row[9];



mysqli_close($conn);

?>




<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/uikit.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/uikit.min.js"></script>
	<script src="js/uikit-icons.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto:400,700" rel="stylesheet">

	<style type="text/css">
		.sidebar{
			background: url('images/overlay.png'), #461b93;
			min-width: 22%;
			float: left;
			margin-right: 0%;
			top: 0em;
			left: 0em;
			bottom: 0em;
			height: 100vh;
			position: fixed;
			display: block;
			padding-top: 50px;

		}
		body{
			background: #ecf0f3;
			margin-left: 22%;
		}

		.main{
			margin-left: 3%;
			margin-right: 3%;
			margin-top: 30px;
			min-height: 100vh;
			padding-bottom: 100px;

		}

		.name{
			font-family: 'Open Sans', sans-serif;
			color: rgba(255,255,255,0.8);
			font-size: 15pt;
		}

		.u_profile{
			font-family: 'Open Sans', sans-serif;
			color: rgba(255,255,255,0.8);
			font-size: 12pt;
			border: 1px solid rgba(255,255,255,0.4);
			padding-left: 15px;
			padding-right: 15px;
			padding-top: 5px;
			padding-bottom: 5px;
			border-radius: 100px;
			display: inline;
		}

		.dp{
			background: url('images/avatar.png');
			background-size: cover;
			min-width: 170px;
			min-height: 170px;
			width: 170px;
			height: auto;
			box-shadow: 0px 5px 10px 1px rgba(0,0,0,0.2);
			border-radius: 500px;

		}
		.mob{
			display: none;
		}

		@media only screen and (max-width: 600px){
			.sidebar{
				display: none;
			}
			body{
				margin-left: 0px;
			}
			.mob{
				display: block;
			}
		}

		.tab_title{
			font-weight: bold;
		}


	</style>
</head>
<body>
	

<div class="sidebar">
	
	<center>
		<div class="dp"></div>
		<br>
		<div class="name"><?php echo $_SESSION["name"];?></div>

		<br>

		<div class="u_profile">Update Profile</div>
	</center>

</div>



<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
    <nav class="uk-navbar-container" uk-navbar="dropbar: true;" style="position: relative; z-index: 980;max-height: 100px; background: #fff; box-shadow: 0px 3px 10px 1px rgba(0,0,0,0.1);">
    	<div class="uk-navbar-left" style="padding-left: 5%">
    		<span uk-icon="icon: user; ratio: 1"></span><span style="font-size: 13pt; padding-left: 5px">DASHBOARD</span>
    	</div>
        <div class="uk-navbar-right" style="padding-right: 5%">

            <ul class="uk-navbar-nav">
                <li class="uk-active"><a href="index.php">Home</a></li>
                
                <li><a href="_logout.php">Logout</a></li>
            </ul>

        </div>
    </nav>
</div>



<div class="main">
		
	<div class="uk-card uk-card-primary uk-card-body uk-width-1-1@m mob">
    	<center>
		<div class="dp"></div>
		<br>
		<div class="name"<?php echo $_SESSION["name"];?></div>

		<br>

		<div class="u_profile">Update Profile</div>
	</center>
	</div>




	<h4>Primary info</h4>
	<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">Basic Information</h3>
    <table class="uk-table">
    	<tr>
    		<td class="tab_title">Phone no.</td>
    		<td><?php echo $phone;?></td>
    	</tr>
    	<tr>
    		<td class="tab_title">Vehicle No.</td>
    		<td><?php echo $rc;?></td>
    	</tr>
    	<tr>
    		<td class="tab_title">DL No.</td>
    		<td><?php echo $dl;?></td>
    	</tr>
    	<tr>
    		<td class="tab_title">State</td>
    		<td><?php echo $state;?></td>
    	</tr>
    </table>
	</div>

<h4>Stats</h4>

<div class="uk-child-width-expand@s uk-text-center uk-grid-match" uk-grid>
    <div>
        <div class="uk-card uk-card-default uk-card-body "><h4>Tolls Crossed</h4> <br> <span style="font-size: 40pt; color: #013b84;">15</span> <span style="color: #013b84; padding-left: 3px;">Tolls</span> <br>
			<br>
			<center><div style="min-width: 80%; max-width: 80%; margin-top: 30px">
				<div style="float: left;"><h5 style="color: rgba(0,0,0,0.6);"><b>This month</b></h5> <span style="color: #4eafbf; font-size: 20pt">1</span></div>
				<div style="float: right;"><h5 style="color: rgba(0,0,0,0.6);"><b>This Year</b></h5> <span style="color: #8aa942; font-size: 20pt">14</span></div>
			</div></center>
        </div>
    </div>
    

	<div>
        <div class="uk-card uk-card-default uk-card-body "><h4>Total Amount Paid</h4> <br> <span style="font-size: 40pt; color: #013b84;">25</span> <span style="color: #013b84; padding-left: 3px;">INR</span> <br>
			<br>
			<center><div style="min-width: 80%; max-width: 80%; margin-top: 30px">
				<div style="float: left;"><h5 style="color: rgba(0,0,0,0.6);"><b>This Month</b></h5> <span style="color: #4eafbf; font-size: 20pt">18</span></div>
				<div style="float: right;"><h5 style="color: rgba(0,0,0,0.6);"><b>This Year</b></h5> <span style="color: #8aa942; font-size: 20pt">43</span></div>
			</div></center>
        </div>
    </div>



    <div>
        <div class="uk-card uk-card-default uk-card-body "><h4>Amount Unpaid</h4> <br> <span style="font-size: 40pt; color: #013b84;">98</span> <span style="color: #013b84; padding-left: 3px;">INR</span> <br>
			<br>
			<center><div style="min-width: 80%; max-width: 80%; margin-top: 30px">
				<a href="checkout.php"><button class="uk-button uk-button-danger">Pay</button></a> 
			</div></center>
        </div>
    </div>



</div>


<h4>Last 5 Tolls Crossed</h4>
	<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Place</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Place 1</td>
            <td>Rs. 30</td>
        </tr>
        <tr>
            <td>Place 2</td>
            <td>Rs. 50</td>
        </tr>
        <tr>
            <td>Place 3</td>
            <td>Rs. 40</td>
        </tr>
          <tr>
            <td>Place 4</td>
            <td>Rs. 20</td>
        </tr>
          <tr>
            <td>Place 5</td>
            <td>Rs. 40</td>
        </tr>
    </tbody>
</table>
	</div>



</div>

</body>
</html>