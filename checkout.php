<!DOCTYPE html>
<html>
<head>
	<title>Complete your payment</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/uikit.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/uikit.min.js"></script>
	<script src="js/uikit-icons.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto:300,400" rel="stylesheet">

	<style type="text/css">
		body{
			margin: 0px;
			padding-bottom: 100px;
		}

		header .inner{
			position: relative;
			height: 460px;
			background: #461b93;
			color: #fff; 
			text-align: center;
			z-index: -1;
		}


		header .inner:before{
			content: ' ';
			width: 100%;
			left: 0;
			position: absolute;
			height: 300px;
			bottom: -50px;
			background: #461b93;
			transform: skewY(4deg);

		}
		.head-text{
			text-align: center;
			color: #fff;
			font-family: 'Open Sans', sans-serif;
			padding-top: 80px;
		}

		.content{
			max-width: 1000px;
			margin: 0 auto;
			background: #f1f1f1;
			z-index: 99;
			margin-top: -150px;
			border-radius: 6px;
			box-shadow: 0px 0px 40px rgba(0,0,0,0.2);
			padding-bottom: 100px;
		}

		.inner-cont{
			padding-top: 100px;
		}
	</style>
</head>
<body>

<header>
	<div class="inner">
		<h1 class="head-text">Let's Checkout</h1>
		<p style="opacity: 0.8; font-family: 'Open Sans', sans-serif; letter-spacing: 1px">Please choose the payment method that suits you.</p>

	</div>
</header>

<div class="content">
	
	
	<div class="uk-container inner-cont">


		<ul uk-accordion>
    <li class="uk-open">
        <a class="uk-accordion-title uk-card uk-card-default uk-card-body uk-width-1-1@m" href="#"><span uk-icon="icon: credit-card; ratio: 1.5"></span> Debit Card</a>
        <div class="uk-accordion-content">
               <div class="uk-card uk-card-secondary uk-card-body">
               	<form class="uk-grid-small" uk-grid>
				    <div class="uk-width-1-1">
				    	 card Number
				        <input class="uk-input" type="number" placeholder="Card Number">
				    </div>
				    <div class="uk-width-1-2@s">
				    	 cvv
				        <input class="uk-input" type="number" placeholder="CVV">
				    </div>
				    <div class="uk-width-1-4@s">
				    	month
				        <select class="uk-input" placeholder="Month">
				        	<option value="1">1</option>
				        	<option value="2">2</option>
				        	<option value="3">3</option>
				        	<option value="4">4</option>
				        	<option value="5">5</option>
				        	<option value="6">6</option>
				        	<option value="7">7</option>
				        	<option value="8">8</option>
				        	<option value="9">9</option>
				        	<option value="10">0</option>
				        	<option value="11">11</option>
				        	<option value="12">12</option>
				        </select>
				    </div>
				    <div class="uk-width-1-4@s">
				    	year
				        <input class="uk-input" type="number" placeholder="Year">
				    </div>
				    <div class="uk-width-1-4@s"> <input type="submit" name="" value="Pay" class="uk-button uk-button-danger"></div>
				  
				</form>
               </div>
        </div>
    </li>
    <li>
        <a class="uk-accordion-title uk-card uk-card-default uk-card-body uk-width-1-1@m" href="#">Tez UPI</a>
        <div class="uk-accordion-content">
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor reprehenderit.</p>
        </div>
    </li>
    <li>
        <a class="uk-accordion-title uk-card uk-card-default uk-card-body uk-width-1-1@m" href="#">Paytm</a>
        <div class="uk-accordion-content">
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat proident.</p>
        </div>
    </li>
</ul>

<br>
<br>


	<center> <a href="dashboard.php"><div class="uk-button uk-button-danger">Go Back to Dashboard</div></a></center>

	</div>


</div>





</body>
</html>