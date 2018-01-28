<?php
session_start();
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Checkout</title>
		<link href="sc.css" rel="stylesheet">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body id="rene" background="https://images.fineartamerica.com/images-medium-large-5/time-clock-gears-clipart-on-red-background-jpldesigns.jpg">
		<div id="header1">
			<h1> Checkout </h1>
			<a href="cart.php" class="links">Shopping Cart</a> 
		</div>
		<div>
			<br/></br><br/>
			<form method="POST" target="_self" action="confirm.php">
			<p class="lab"> Street Address </p>
			<input class="lab2" type="text" id="streetAddress" name="street">
			<p class="lab"> City  </p>
			<input class="lab2" type="text" id="streetAddress" name="city">
			<p class="lab"> State </p>
			<input class="lab2" type="text" id="streetAddress" name="state">
			<p class="lab"> Zip </p>
			<input class="lab2" type="text" id="streetAddress" name="zip">
			<p class="lab"> SSN (Optional) </p>
			<input class="lab2" type="text" id="streetAddress" name="ssn"><br/><br/><br/>
			<input class="btn-default btn-lg but" type="submit">
		</div>
	</body>
</html>