<?php
session_start();

$address = htmlspecialchars($_POST['street']);
$city = htmlspecialchars($_POST['city']);
$state = htmlspecialchars($_POST['state']);
$zip = htmlspecialchars($_POST['zip']);
$ssn = htmlspecialchars($_POST['ssn']);

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Confirmation</title>
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
			<h1> Confirmation </h1>
			<a href="shoppingCart.php" class="links">Browse</a> 
			<br/><br/>
			<h3> Thank you for your order! Your order is being shipped to: <br/><br/>
			<?php
				echo $address . '<br/>';
				echo $city . ', ' . $state . ' ' . $zip . '<br/><br/>';
				
				$check = "watch";
				for ($i = 0; $i <= 7; $i++){
					$time = $check . $i;
					if (isset($_SESSION[$time])){
						$src = "img" . $i . ".png";
						echo '<img src="' . $src . '" class="items img-rounded">';
					}
				}
			?>
		</div>
	</body>
</html>

<?php
	session_destroy();
?>