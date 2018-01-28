<?php
session_start();
?>
<?php
	if (isset($_POST['remove'])){
		$watchNum = $_POST['remove'];
		$name = "watch" . $watchNum;
		if ($_SESSION[$name] > 1){
			$_SESSION[$name]--;
		} else {
			unset($_SESSION[$name]);
		}
	} 	
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Shopping Cart</title>
		<link href="sc.css" rel="stylesheet">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body id="rene" background="https://images.fineartamerica.com/images-medium-large-5/time-clock-gears-clipart-on-red-background-jpldesigns.jpg">
		<div id="header1">
			<h1> Cart </h1>
			<a href="shoppingCart.php" class="links">Browse</a> 
			<a href="checkout.php" class="links">Checkout</a>
		</div>
		<div>
		<form method="POST" target="_self" action="cart.php">
			<?php	
				$check = "watch";
				for ($i = 0; $i <= 7; $i++){
					$time = $check . $i;
					if (isset($_SESSION[$time])){
						$src = "img" . $i . ".png";
						echo '<img src="' . $src . '" class="items img-rounded">';
						echo '<button class="btn-default btn-lg" type="submit" name="remove" value="' . $i . '">Remove From Cart
						' . $_SESSION[$time] . '</button><br/>';

					}
				}
			?>
		</div>
	</body>
</html>