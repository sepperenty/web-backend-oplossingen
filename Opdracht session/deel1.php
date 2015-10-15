<?php
session_start();

$_email ="";
$_nickname ="";

if(isset($_SESSION["email"]))
{
	$_email = $_SESSION["email"];
}

if(isset($_SESSION["nickname"]))
{
	$_nickname = $_SESSION["nickname"];
}


if(isset($_GET["remove"]))
{
	
		session_destroy();
	
}

?>


<!doctype html>
<html>
	
	<head>
		<title>Opdracht sessions DEEL1</title>
	</head>
	<body>
		<h1>Deel 1: Registratiegegevens</h1>



	<form action="deel2.php" method="post">
		<p>email</p>
			<input type="text" name ="email" placeholder="email" <?php if(isset($_GET["wijzigemail"])):?>autofocus <?php endif?>  value=<?=$_email?>><br><p></p>
		<p>nickname</p>
			<input type="text" name ="nickname" placeholder="nickname" <?php if(isset($_GET["wijzignickname"])):?>autofocus <?php endif?> value=<?=$_nickname?>><br><p></p>
			<input type="submit" name="validate">
		
		</form>

		<a href="deel1.php?remove">Remove session</a>

	</body>


</html>