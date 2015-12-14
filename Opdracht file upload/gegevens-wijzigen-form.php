<?php
	include("artikels-logic.php");

	function __autoload($filename)
	{
		include "classes/".$filename . ".php";
	}

	$dataBase = new dataBase();

	$picture = $dataBase->getRow("profile_picture", "users", true, "'" . $email . "'" , "email");

	$id = $dataBase->getRow("id", "users", true, "'" . $email . "'", "email");

	$actualId = $id[0]["id"];


	if(empty($picture[0]["profile_picture"]))
	{
		$imgstring = "img/default.png";
	}

	else
	{
		$actualPicture = $picture[0]["profile_picture"];
		$imgstring = "img/" . $actualPicture;
	}



	if(isset($_SESSION["notifications"]))
	{
		echo "Type :" . $_SESSION["notifications"]["type"];
		echo " message : " . $_SESSION["notifications"]["message"];
		unset($_SESSION["notifications"]);
	}

?>




<!doctype html>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<?php if($validationComplete):?>


			<p><a href="dashboard.php">terug naar dashboard</a> | ingelogd als <?=$email?> | <a href="dashboard.php?logout">uitloggen</a></p>
				<h1>Gegevens wijzigen</h1>
			<img src="<?=$imgstring?>" alt="<?=$email?>">
			<form action = "gegevens-bewerken.php" method="post" enctype="multipart/form-data">
			<ul>
				<li>
					<input type="hidden" name="id" value="<?=$actualId?>">
					<label for="e-mail">e-mail</label></br>
					<input type="text" name="email" value="<?=$email?>">
				</li>
				
				<li>
					<input type="file" name="profilePicture">
				</li>
				<li>
					<input type="submit" name="changeInfo" value="Wijzegingen opslaan">
				</li>
				
			</ul>	



			</form>

	<?php endif?>
</body>




</html>