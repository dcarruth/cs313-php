<? php
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
				<form method="POST" target="_self" action="Home.php">
				<h4 class="title1">Username</h4>
				<input type="text" name="username1"><br/>
				<h4 class="title1">Password</h4>
				<input type="password" name="password"><br/><br/>
				<input type="submit" value="Login">
			</div>
			<a id="create1" href="#" onclick="create()">Create Account</a>
		</div>
		<div id="createacc" class="loginBox">
			<div class="forms">
				<br/>
				<form method="POST" target="_self" action="Home.php">
				<h4 class="title1">Username</h4>
				<input type="text" name="username2"><br/>
				<h4 class="title1">Password</h4>
				<input type="password" name="password"><br/>
				<h4 class="title1">Screen Name</h4>
				<input type="text" name="screenName"><br/><br/>
				<input type="submit" value="Create Account">
			</div>
		</div>
	</body>
</html>