
<!DOCTYPE html>
<html>
<head>
	<title>About</title>
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
			min-height: 400px;
		}
	</style>
</head>
<body>
<?php
		require('navbar.php');
	?>
<header>
	<div class="inner">
		<h1 class="head-text">About</h1>
		<p style="opacity: 0.8; font-family: 'Open Sans', sans-serif; letter-spacing: 1px">All that you need to know.</p>

	</div>
</header>

<div class="content">
	
	
	<div class="uk-container inner-cont">
		

		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dignissim facilisis est ac interdum. Integer id finibus libero. Sed ultricies, est ut sodales finibus, eros metus sagittis ex, in imperdiet metus felis fermentum nunc. Sed a ipsum quis sem ullamcorper pretium. Aliquam ex tortor, sollicitudin suscipit placerat sit amet, fermentum nec velit. Morbi a sem libero. Nullam magna turpis, elementum et congue ut, porta sit amet purus. Suspendisse blandit justo a ligula volutpat finibus. Nullam rhoncus nisi sit amet tellus bibendum mollis. Curabitur interdum erat lectus. Sed ultrices pellentesque enim. Nam sodales consequat dictum. Suspendisse nec quam aliquet, tincidunt leo et, suscipit velit.</p>

		<p>Vivamus tincidunt consequat nibh, sed venenatis lectus. Maecenas leo dui, eleifend nec mauris sed, gravida porta eros. Pellentesque bibendum aliquet accumsan. Fusce sodales fermentum lorem ut blandit. Aenean consectetur massa id laoreet porttitor. Pellentesque non metus sed odio tristique tincidunt. In feugiat ex eu eros rhoncus ultrices. Vivamus justo ipsum, pretium id metus porta, convallis eleifend felis. Phasellus faucibus vel sem bibendum ullamcorper. Quisque ut ex lectus. Suspendisse sed dolor et enim ullamcorper eleifend. Vivamus porttitor nunc a placerat dapibus. Maecenas urna ante, rhoncus sit amet fringilla id, dapibus ut purus. In hac habitasse platea dictumst. Pellentesque mattis venenatis tellus in cursus.</p>


	</div>


</div>





</body>
</html>