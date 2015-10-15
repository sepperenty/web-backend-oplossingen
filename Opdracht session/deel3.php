
<?php
	
	session_start();
	$nickname ="";
	$email = "";
	$straat = "";
	$nummer = "";
	$gemeente = "";
	$postcode = "";

	if(isset($_SESSION["nickname"]))
	{
		$nickname = $_SESSION["nickname"];
	}

	if(isset($_SESSION["email"]))
	{
		$email = $_SESSION["email"];
	}




	if(isset($_POST["validate"]))
	{
		if(isset($_POST["straat"]))
		{
			$_SESSION["straat"] = $_POST["straat"];
			$straat = $_SESSION["straat"];
		}

		if(isset($_POST["nummer"]))
		{
			$_SESSION["nummer"] = $_POST["nummer"];
			$nummer = $_SESSION["nummer"];
		}
		if(isset($_POST["gemeente"]))
		{
			$_SESSION["gemeente"] = $_POST["gemeente"];
			$gemeente = 	$_SESSION["gemeente"];
		}
		if(isset($_POST["postcode"]))
		{
			$_SESSION["postcode"] = $_POST["postcode"];
			$postcode = 		$_SESSION["postcode"];
		}
	}



if(isset($_GET["remove"]))
{
	
		session_destroy();
	
}


?>


<!doctype html>
<html>
	
	<head>
		<title>Opdracht sessions DEEL3</title>
	</head>
	<body>
		<h1>Deel 3</h1>

		<p>email = <?=$email?><a href="deel1.php?wijzigemail"> wijzig</a></p>
		<p>nickname = <?=$nickname?><a href="deel1.php?wijzignickname"> wijzig</a></p>
		<p>straat = <?=$straat?><a href="deel2.php?wijzigstraat"> wijzig</a></p>
		<p>nummer = <?=$nummer?><a href="deel2.php?wijzignummer"> wijzig</a></p>
		<p>gemeente = <?=$gemeente?><a href="deel2.php?wijziggemeente"> wijzig</a></p>
		<p>postcode = <?=$postcode?><a href="deel2.php?wijzigpostcode"> wijzig</a></p>

		
		<a href="deel3.php?remove">Remove session</a>
	</body>


</html>