<? php
session_start();

?>

<html>
	<head>
		<title> Login </title>
		<link href="ST.css" rel="stylesheet">
	</head>
	<body id="bcground" background="bcground.jpeg">
		<div class="loginBox">
			<div class="forms">
				<form method="POST" target="_self" action="Home.php">
				Username<br/>
				<input type="text" name="username"><br/>
				Password<br/>
				<input type="text" name="password"><br/><br/>
				<input type="submit" value="Login">
			</div>
		</div>
	</body>
</html>