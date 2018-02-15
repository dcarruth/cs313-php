<?php
session_start();
?>

<script>
function create(){
	create = document.getElementById('createacc');
	create.style.visibility = "visible";
}
</script>

<html>
	<head>
		<title> Login or Create </title>
		<link href="ST.css" rel="stylesheet">
	</head>
	<body id="bcground" background="bcground.jpeg">
		<div class="loginBox">
			<div class="forms">
				<br/>
				<form method="POST" target="_self" action="auth.php">
				<h4 class="title1">Username</h4>
				<input class="field" type="text" name="username1"><br/>
				<h4 class="title1">Password</h4>
				<input class="field" type="text" name="password1"><br/><br/>
				<input class="field" type="submit" value="Login">
				</form>
			</div>
			<a id="create1" href="#" onclick="create()">Create Account</a>
		</div>
		<div id="createacc" class="loginBox">
			<div class="forms">
				<br/>
				<form method="POST" target="_self" action="auth.php">
				<h4 class="title1">Username</h4>
				<input class="field" type="text" name="username2"><br/>
				<h4 class="title1">Password</h4>
				<input class="field" type="text" name="password2"><br/>
				<h4 class="title1">Screen Name</h4>
				<input class="field" type="text" name="screenName"><br/><br/>
				<input class="field" type="submit" value="Create Account">
				</form>
			</div>
		</div>
	</body>
</html>
