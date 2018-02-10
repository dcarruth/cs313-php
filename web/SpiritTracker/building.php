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
		<title> Building Posts </title>
		<link href="ST.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body id="bcground" background="bcground.jpeg">
		<div id="header1">
			<h3> Welcome: 
			<?php
			echo $_SESSION['screeName'];
			?>
			</h3>
		</div>
			<?php
				$i = $_GET['id'];
				
				$stmt = $myPDO->query("SELECT buildingid, path FROM _building WHERE buildingid = '$i'");  
				$row2 = $stmt->fetch();
				echo '<div class="contain"><img id="'.$row2['buildingid'].'" class="img-thumbnail bldg" src="Campus_Pictures/' . $row2['path'] . '.jpg"></div>';	
				echo '<div class="contain post">';

				if ($i != 1){				
					foreach ($myPDO->query("SELECT postid, posteduserid, buildingid, post, private, cast(time as date) FROM _post WHERE buildingid = '$i'") as $row)
					{ 	
						$post = $row['postid'];
						$usr = $row['posteduserid'];
						$scrn = $myPDO->query("SELECT screenname FROM _user WHERE userid = '$usr'");
						$name = $scrn->fetch();
						if (!$row['private']){
							echo '<h3>' . $name['screenname'] . '<h4>' . $row['time'] . '</h4></h3>';
							echo $row['post'];
							echo '<br/><a id="comm" href="comment.php?id=' . $post .'"> Make a comment </a>';		
						}
					}
					echo '</div>';
				}
				else {
					
					//Posted user id needs to be updated when the user id is implimented
					$usrid = $_SESSION['userid'];
					foreach ($myPDO->query("SELECT postid, posteduserid, buildingid, post, private, cast(time as date) FROM _post WHERE posteduserid = '$usrid'") as $row)
					{ 	
						$post = $row['postid'];
						$usr = $row['posteduserid'];
						$scrn = $myPDO->query("SELECT screenname FROM _user WHERE userid = '$usr'");
						$name = $scrn->fetch();
						echo '<h3>' . $name['screenname'] . '<h4>' . $row['time'] . '</h4></h3>';
						echo $row['post'];			
						echo '<br/><a id="comm" href="comment.php?id=' . $post .'"> Comments </a>';
					}
					echo '</div>';
				}
			?>
	</body>
</html>

<?php
	mysql_close($myPDO);
?>