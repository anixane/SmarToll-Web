<?php
error_reporting(0);
session_start();

if(isset($_SESSION["user"])){
  header("Location: dashboard.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/uikit.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/uikit.min.js"></script>
	<script src="js/uikit-icons.min.js"></script>
	<style type="text/css">
		body{
			margin-top: 0px;
		}
		.login_container{
			min-width: 100%;
			min-height: 100vh;
			padding-top: 50px;
			background: -moz-linear-gradient(225deg, rgba(208,255,174,1) 0%, rgba(52,235,233,1) 100%); /* ff3.6+ */
			background: -webkit-gradient(linear, left bottom, right top, color-stop(0%, rgba(52,235,233,1)), color-stop(100%, rgba(208,255,174,1))); /* safari4+,chrome */
			background: -webkit-linear-gradient(225deg, rgba(208,255,174,1) 0%, rgba(52,235,233,1) 100%); /* safari5.1+,chrome10+ */
			background: -o-linear-gradient(225deg, rgba(208,255,174,1) 0%, rgba(52,235,233,1) 100%); /* opera 11.10+ */
			background: -ms-linear-gradient(225deg, rgba(208,255,174,1) 0%, rgba(52,235,233,1) 100%); /* ie10+ */
			background: linear-gradient(225deg, rgba(208,255,174,1) 0%, rgba(52,235,233,1) 100%); /* w3c */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d0ffae', endColorstr='#34ebe9',GradientType=1 ); /* ie6-9 */
		}

		.loginn_card{
			min-width: 400px;
			max-width: 400px;
			min-height: 450px;
			max-height: 450px;
			background-color: white;
			border-radius: 4px;
			box-shadow: 0px 10px 15px 2px rgba(0,0,0,0.2);
		}

		@media only screen and (max-width: 600px){
			.loginn_card{
			min-width: 90%;
			max-width: 90%;
			min-height: 420px;
			padding-left: 10px;
			padding-right: 10px;
			padding-bottom: 10px;
		}
		}
	</style>
</head>
<body>

	<?php
		require('navbar.php');
	?>

		
		
  
    	<div class="login_container">

    		<?php
			if(isset($_GET["status"])){
				if($_GET["status"]=="exists"){
					echo "<center><div style='max-width:320px'>
							<div class='uk-alert-danger' uk-alert>
    						<a class='uk-alert-close' uk-close></a>
    						<p>User already exists.</p>
							</div>
						</div></center>"	;
				}
			}
		?>
	    	<center>
	    		<div class="loginn_card">
	    			<div style="font-size: 20pt; padding-top: 50px; color: rgba(0,0,0,0.6); padding-bottom: 50px"><span uk-icon="icon: lock; ratio: 1.5"></span> Register</div>

	    			<div style="max-width: 320px">
	    			<form method="post" action="otp.php">
	    				<input type="text" name="name" placeholder="Name" required class="uk-input" style="border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; min-height: 50px; border-left-color: #f492ac; border-top-color: #f492ac; border-right-color: #f492ac">
	    				<input type="email" name="email" placeholder="email" required class="uk-input" style="border-top-left-radius: 0px; border-top-right-radius: 0px; min-height: 50px; border-left-color: #f492ac; border-right-color: #f492ac;">
	    				<input type="password" name="password" placeholder="password" required class="uk-input" style="border-top-left-radius: 0px; border-top-right-radius: 0px; min-height: 50px; border-left-color: #f492ac; border-right-color: #f492ac;border-bottom-color: #f492ac">
	    				<br><br>
	    				<input type="submit" name="submit" value="REGISTER" style="min-height: 50px; background-color: #ef5585; color: #fff; border: 0px solid white; min-width: 320px; border-radius: 3px; font-size: 10pt; font-weight: 600">
	    			</form>
	    			<br><br><div style="font-size: 10pt;">Already have an account? <a href="login.php" style="color: #8869a6">Login here</a></div>
	    			</div>
			
	    		</div>
	    	</center>
    	</div>
    



</body>
</html>