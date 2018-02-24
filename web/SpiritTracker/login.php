<?php
session_start();

if (isset($_SESSION['userid']))
	{
		header('Location: Home.php');
		die();
	}
?>


<html>
	<head>
		<title> Login or Create </title>
		<link href="ST.css" rel="stylesheet">
		<script src="ST.js"></script>
	</head>
	<body id="bcground" background="bcground.jpeg">
		<div class="loginBox">
			<div class="forms">
				<br/>
				<form method="POST" target="_self" action="auth.php">
				<h4 class="title1">Username</h4>
				<input id ="uname" class="field" type="text" name="username1"><br/>
				<h4 class="title1">Password</h4>
				<input id="passwd" class="field" type="password" name="password1"><br/><br/>
				<input class="field" type="submit" onclick="return loginValidate() "value="Login">
				</form>
				<h3 id="warn"> 
				<?php
					if (isset($_GET['status'])){
						$num = $_GET['status'];
						switch($num){
						
							case 0:
								echo "Username already taken!";
								break;
							case 1:
								echo "INVALID CREDENTIALS!";
								break;
							case 2:
								echo "INVALID CREDENTIALS!";
								break;
							default:
								echo "Server Error: Please try again later.";
						}
						
					}
				?>	
				</h3>	
			</div>
			<a id="create1" href="#" onclick="create()">Create Account</a>
		</div>
		<div id="createacc" class="loginBox">
			<div class="forms">
				<br/>
				<form method="POST" target="_self" action="auth.php">
				<h4 class="title1">Username</h4>
				<input id="unameNew" class="field" type="text" name="username2"><br/>
				<h4 class="title1">Password</h4>
				<input id="passwdNew" class="field" type="password" name="password2"><br/>
				<h4 class="title1">Screen Name</h4>
				<input id="screenN" class="field" type="text" name="screenName"><br/><br/>
				<input class="field" type="submit" onclick="return createValidate()" value="Create Account">
				</form>
			</div>
		</div>
	</body>
</html>
