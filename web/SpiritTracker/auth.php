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
	$pass = $_POST['password2'];
	$passs = password_hash($pass, PASSWORD_DEFAULT);
	$scrn = $_POST['screenName'];
	$_SESSION['screen'] = $_POST['screenName'];
	
	
	$query = 'INSERT INTO _user (userName, password, screenName) VALUES(:usr, :pass, :scrn)';
	$statement = $myPDO->prepare($query);
	
	$statement->bindValue(':usr', $usr);
	$statement->bindValue(':pass', $passs);
	$statement->bindValue(':scrn', $scrn);
	
	if ($statement->execute()){
		
		$_SESSION['userid'] = $myPDO->lastInsertId("_user_userID_seq");
		header('Location: Home.php');
	}
	else 
	{
		header('Location: login.php?status=0');
	}
		
} 

if (isset($_POST['username1'])) {
	
	$usr = $_POST['username1'];
	$pass = $_POST['password1'];
	$cred = $myPDO->prepare('SELECT userid, username, password, screenname FROM _user WHERE username = :usr');
	$cred->bindValue(':usr',$usr);
	$cred->execute();
	$creds = $cred->fetch();
	
	if (!empty($creds)){
		
		if (password_verify($pass,$creds['password']))
		{
			$_SESSION['userid'] = $creds['userid'];
			$_SESSION['screen'] = $creds['screenname'];
			header('Location: Home.php');
		}
		else
		{
			header('Location: login.php?status=1');
		}

	}
	else
	{
		header('Location: login.php?status=2');
	}
}

?>





<?php
	mysql_close($myPDO);
?>