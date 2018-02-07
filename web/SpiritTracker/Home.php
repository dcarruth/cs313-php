<?php
session_start();

try {
	$dburl = getenv('DATABASE_URL');
	if (empty($dburl)){
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
	echo 'Failed to open database! Please try again later.';
	die();
}

?>


<html>
	<head>
		<title> Spiritual Experience Tracker </title>
		<link href="ST.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body id="bcground" background="bcground.jpeg">
				<?php
				$i = 0;
				foreach ($myPDO->query('SELECT buildingid, path FROM _building ORDER BY buildingid') as $row)
				{ 
					$i++;
					echo '<td><img class="img-thumbnail bldg" src="Campus_Pictures/' . $row['path'] . '.JPG"></td>';
					if ($i % 3 == 0 and $i != 0)
						echo '<br/>';
				}
				?>
		</table>
	</body>
</html>
