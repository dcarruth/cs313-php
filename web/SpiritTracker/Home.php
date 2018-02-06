<?php
session_start();

try {
	$user = 'postgres';
	$password = '0117729';
	$myPDO = new PDO('pgsql:host=localhost;dbname=SpiritTracker', $user, $password);
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
		<table style="width:50%">
			<tr>
				<td><img class="bldg img-thumbnail" src="Campus_Pictures/austin.JPG"><div class="caption">Austin Building</div></td> 
				<td><img class="bldg img-thumbnail" src="Campus_Pictures/STC.JPG"><div class="caption">Science and Technology Center</div></td> 
				<?php
				foreach ($myPDO->query('SELECT buildingid, path FROM _building') as $row)
				{ 
					echo '<img class="bldg img-thumbnail" src="Campus_Pictures/' . $row['path'] . '.JPG">';
					echo '<br/>';	
				}
				?>
			</tr>
		</table>
	</body>
</html>
