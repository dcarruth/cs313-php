<?php
session_start();
?>
<?php
	if (isset($_POST['watch'])){
		$watchNum = $_POST['watch'];
		$name = "watch" . $watchNum;
		if (isset($_SESSION[$name])){
			$_SESSION[$name]++;
		} else {
			$_SESSION[$name] = 1;
		}
	} 	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Browse</title>
		<link href="sc.css" rel="stylesheet">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body id="rene" background="https://images.fineartamerica.com/images-medium-large-5/time-clock-gears-clipart-on-red-background-jpldesigns.jpg">
		<div id="header1">
			<h1> Watch It </h1>
			<a href="cart.php" class="links">Shopping Cart</a> 
		</div>
		<div>
			<form method="post" target="_self" action="shoppingCart.php">
			<div>
				<img class="items img-rounded" src="img0.png">
				<button class="btn-default btn-lg" type="submit" name="watch" value="0">Add to Cart</button>
			</div>
			<div>
				<img class="items img-rounded" src="img1.png">
				<button class="btn-default btn-lg" type="submit" name="watch" value="1">Add to Cart</button>
			</div>
			<div>
				<img class="items img-rounded" src="img2.png">
				<button class="btn-default btn-lg" type="submit" name="watch" value="2">Add to Cart</button>
			</div>
			<div>
				<img class="items img-rounded" src="img3.png">
				<button class="btn-default btn-lg" type="submit" name="watch" value="3">Add to Cart</button>
			</div>
			<div>
				<img class="items img-rounded" src="img4.png">
				<button class="btn-default btn-lg" type="submit" name="watch" value="4">Add to Cart</button>
			</div>
			<div>
				<img class="items img-rounded" src="img5.png">
				<button class="btn-default btn-lg" type="submit" name="watch" value="5">Add to Cart</button>
			</div>
			<div>
				<img class="items img-rounded" src="img7.png">
				<button class="btn-default btn-lg" type="submit" name="watch" value="7">Add to Cart</button>
			</div>
			<div>
				<img class="items img-rounded" src="img6.png">
				<button class="btn-default btn-lg" type="submit" name="watch" value="6">Add to Cart</button>
			</div>
		</div>
	</body>
</html>