
<?php
	echo "<div id='header'> <h1> Custom Segfault Inc.</h1>";
	if (basename ($_SERVER['PHP_SELF']) == "home.php")
	{
		echo "<a href='home.php'><button class='highlight'>home</button></a>";
	}
	else
	{
		echo "<a href='home.php'><button>home</button></a>";
	}
	if (basename ($_SERVER['PHP_SELF']) == "about-us.php")
	{
		echo "<a href='about-us.php'><button class='highlight'>about</button></a>";
	}
	else
	{
		echo "<a href='about-us.php'><button>about</button></a>";
	}if (basename ($_SERVER['PHP_SELF']) == "login.php")
	{
		echo "<a href='login.php'><button class='highlight'>login</button></a>";
	}
	else
	{
		echo "<a href='login.php'><button>login</button></a>";
	}
	echo "</div>";
?>