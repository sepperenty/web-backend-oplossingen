<?php

session_start();

$email = "";
$nickname = "";
$_straat ="";
$_nummer ="";
$_gemeente ="";
$_postcode = "";

if(isset($_SESSION["straat"]))
{
	$_straat = $_SESSION["straat"];
}

if(isset($_SESSION["nummer"]))
{
	$_nummer = $_SESSION["nummer"];
}
if(isset($_SESSION["gemeente"]))
{
	$_gemeente = $_SESSION["gemeente"];
}
if(isset($_SESSION["postcode"]))
{
	$_postcode = $_SESSION["postcode"];
}




if(isset($_POST["validate"]))
{

	if(isset($_POST["email"]))
	{
		$_SESSION["email"] = $_POST["email"];
		
	}

	if(isset($_POST["nickname"]))
	{
		$_SESSION["nickname"] = $_POST["nickname"];
		
	}

	$email = $_SESSION["email"];
	$nickname = $_SESSION["nickname"];

	
}

if(isset($_GET["remove"]))
{
	
		session_destroy();
	
}



?>


<!doctype html>
<html>
	
	<head>
		<title>Opdracht sessions DEEL2</title>
	</head>
	<body>
		<h1>Deel 2: adres</h1>

		<p>email : <?=$email?>
		<p>nickname : <?=$nickname?>



		<form action="deel3.php" method="post">
			<p>straat</p>
				<input type="text" name ="straat" placeholder="straatnaam" value=<?=$_straat?> <?php if(isset($_GET["wijzigstraat"])):?>        autofocus <?php endif?>><p></p>
			<p>nummer</p>
				<input type="text" name ="nummer" placeholder="nummer" value = <?=$_nummer?> <?php if(isset($_GET["wijzignummer"])):?>         autofocus <?php endif?>><p></p>
			<p>gemeente</p>
				<input type="text" name ="gemeente" placeholder="gemeente"  <?php if(isset($_GET["wijziggemeente"])):?> autofocus <?php endif?> value = <?=$_gemeente?>><p></p>
			<p>Post code</p>
				<input type="text" name ="postcode" placeholder="Post code" value = <?=$_postcode?> <?php if(isset($_GET["wijzigpostcode"])):?>     autofocus <?php endif?>><p></p>


		<input type="submit" name="validate">

			<a href="deel2.php?remove">Remove session</a>

		</form>
		

	</body>


</html>