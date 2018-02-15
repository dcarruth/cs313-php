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

<?php	

if (isset($_POST['screenName'])){

	$usr = $_POST['username2'];
	$pass = $_POST['password'];
	$scrn = $_POST['screenName'];
	$_SESSION['screen'] = $_POST['screenName'];
	
	
	$query = 'INSERT INTO _user (userName, password, screenName) VALUES(:usr, :pass, :scrn)';
	$statement = $myPDO->prepare($query);
	
	$statement->bindValue(':usr', $usr);
	$statement->bindValue(':pass', $pass);
	$statement->bindValue(':scrn', $scrn);
	
	if ($statement->execute()){
		header('Location: Home.php');
		$usrID = $myPDO->lastInsertId("_user_userID_seq");
	}
	else {
		echo "<h1> HELP </h1>";
	}
		
} 

if (isset($_POST['username1'])) {
	echo "<h1>" . $_POST['username1'] . "     " . $_POST['password1'] . "</h1>";	
}

?>





<?php
	mysql_close($myPDO);
?>