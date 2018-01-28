<?php

	$name = $email = $major = $comments = "";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$name = $_POST["name"];
		$email = $_POST["email"];
		$major = $_POST["major"];
		$comments = $_POST["comments"];
			
		echo "Name: $name <br/>";
		echo "<a href='mailto:$email'>$email</a><br/>";
		echo "Major: $major <br/>";
		echo "Comments: $comments <br/>";
		
		foreach($_POST['continent'] as $var){
			echo $var;
			echo "<br/>";
		}
	}
	else {
		echo "<h1> WHIFFF!!!! Please use Post.</h1><br/>";
	}	

?>