<?php
session_start();
$_SESSION['buildingid'] = $_GET['id'];

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

<html>
	<head>
		<title> Comments </title>
		<link href="ST.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body id="bcground" background="bcground.jpeg">
		<div id="header1">
			<h3> Welcome: 
			<?php
			echo $_SESSION['screen'];
			?>
			</h3>
		</div>
			<?php
				$post = $_GET['id'];
				echo '<div class="contain"></div>';
				echo '<div class="contain post">';
				
				foreach ($myPDO->query("SELECT postid, commentuserid, comment FROM _comment WHERE postid = '$post'") as $row)
				{ 	
					$usr = $row['commentuserid'];
					$scrn = $myPDO->query("SELECT screenname FROM _user WHERE userid = '$usr'");
					$name = $scrn->fetch();
					echo '<h3>' . $name['screenname'] . '</h3>';
					echo $row['comment'];		
				}
				echo '</div>';		
			?>
	</body>
</html>

<?php
	mysql_close($myPDO);
?>