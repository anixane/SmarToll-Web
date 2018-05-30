<?php
error_reporting(0);
session_start();


$conn=mysqli_connect('localhost','root','','tolldb');

 if(!$conn ) {
      die('Could not connect');
   }
   
   $sql = 'SELECT id, name, updated, verified FROM user WHERE updated=1 AND verified=0';
   $retval = mysqli_query( $conn, $sql );
   
   $sql1 = 'SELECT COUNT(*) as nums from user where updated=1 AND verified=0';
   $retval1 = mysqli_query( $conn, $sql1 );

   $sql2 = 'SELECT COUNT(*) from user';
   $retval2 = mysqli_query( $conn, $sql2 );
   $counts2=0;
   $row2 = mysqli_fetch_array($retval2, MYSQLI_BOTH);
   $counts2=$row2[0];


   $counts=0;
   $row1 = mysqli_fetch_array($retval1, MYSQLI_BOTH);
   $counts=$row1[0];


   if(! $retval) {
      die('Could not select data');
   }
   
   $i=0;
   while($row = mysqli_fetch_assoc($retval)){

    $arr[$i]=$row;+ 
    $i++;
}
 
 
mysqli_close($conn);

?>



<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
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
		.q_stat_head{
			font-size: 10pt;
		}
		.num{
			font-size: 15pt; font-weight: bold;
			font-family: 'Open Sans', sans-serif; 
		}

	</style>
</head>
<body>
	

<div class="sidebar">
	
	<center>
		<div class="dp"></div>
		<br>
		<div class="name">Admin</div>

		<br>

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
		<div class="name">Admin</div>
		<br>

	</center>
	</div>

<h4>Quick Statistics</h4>


<div class="uk-child-width-expand@s uk-text-center" uk-grid>
    <div>
        <div class="uk-card uk-card-default uk-card-body" style="padding: 7px"><span uk-icon="icon: users; ratio: 1.5" style="float: right; background: #fcbb3c; padding: 20px"></span><span class="q_stat_head">Total Users</span> <br><span class="num"><?php echo $counts2;?></span></div>
    </div>
   <div>
        <div class="uk-card uk-card-default uk-card-body" style="padding: 7px"><span uk-icon="icon: menu; ratio: 1.5" style="float: right; background: #75cbe8; padding: 20px"></span><span class="q_stat_head">Total Tolls</span> <br><span class="num">567</span></div>
    </div>
   <div>
        <div class="uk-card uk-card-default uk-card-body" style="padding: 7px"><span uk-icon="icon:  bolt; ratio: 1.5" style="float: right; background: #f48259; padding: 20px"></span><span class="q_stat_head">Total Revenue</span> <br><span class="num">45920</span></div>
    </div>
   <div>
        <div class="uk-card uk-card-default uk-card-body" style="padding: 7px"><span uk-icon="icon: bell; ratio: 1.5" style="float: right; background: #adca63; padding: 20px"></span><span class="q_stat_head">Not Verified</span> <br><span class="num"><?php echo $counts;?></span></div>
    </div>
</div>



<h4>Verify Users</h4>

<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Details</th>
            
        </tr>
    </thead>
    <tbody>

		<?php

                    try{
                        foreach ($arr as $usr) {
                        echo '<tr><td>'.$usr["name"].'</td><td><a href="_user_detail.php?id='.$usr["id"].'" target="_blank"><button class="uk-button uk-button-primary">Details</button></a></tr>';
                    }

                    }catch(Exception $e){
                   
                    }

                    ?>
    </tbody>
</table>
	</div>



</div>

</body>
</html>