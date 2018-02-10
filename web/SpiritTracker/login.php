<?php
session_start();

try {
	
	$dbUrl = getenv('DATABASE_URL');
	if (empty($dbUrl)){
		$user = 'php';
		$password = 'php_1177';
		$myPDO = new PDO('pgsql:host=localhost;dbname=SpiritTracker', $user, $password);
	}
	else {
		$dbopts = parse_url($dbUrl);

		$dbHost = $dbopts["host"];
		$dbPort = $dbopts["port"];
		$dbUser = $dbopts["user"];
		$dbPassword = $dbopts["pass"];
		$dbName = ltrim($dbopts["path"],'/');

		$myPDO = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
	}
}
	
catch (PDOException $ex){
	echo 'Failed to open database! Please try again later.' . $ex;
	die();
}

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

<?php
	mysql_close($myPDO);
?>