
<?php
	include("artikels-logic.php");

	$titel ="";
	$artikel ="";
	$kernwoorden = "";
	$datum ="";

	if(isset($_SESSION["artikelAanmaken"]))
	{
		$titel = $_SESSION["artikelAanmaken"]["titel"];
		$artikel = $_SESSION["artikelAanmaken"]["artikel"];
		$kernwoorden = $_SESSION["artikelAanmaken"]["kernwoorden"];
		$datum = $_SESSION["artikelAanmaken"]["datum"];

	}

	if(isset($_SESSION["notifications"]))
	{
		echo "type : " . $_SESSION["notifications"]["type"];
		echo " message : " . $_SESSION["notifications"]["message"];
		unset($_SESSION["notifications"]);
	}

?>

<!doctype html>
<html>
<head><title>Artikel toevoegen</title>

<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php if($validationComplete):?>

		<p><a href="dashboard.php">terug naar dashboard</a> | ingelogd als <?=$email?> | <a href="dashboard.php?logout">uitloggen</a></p>
		<a href="artikels-overzicht.php">Terug naar overzicht</a>

		<h1>Artikel toevoegen</h1>

		<form action ="artikel-toevoegen-process.php" method="post">
			<input type="hidden" value="<?=$email?>" name="auteur">
			<ul>
				<li>
					<label for="titel">Titel</label></br>
					<input type="text" name="titel" value="<?=$titel?>">
				</li>	
				<li>
					<label for="artikel">Artikel</label></br>
					<input type="text" name="artikel" value="<?=$artikel?>">
				</li>	
				<li>
					<label for="kernwoorden">Kernwoorden</label></br>
					<input type="text" name="kernwoorden" value="<?=$kernwoorden?>">
				</li>	
				<li>
					<label for="datum">Datum (jjjj-mm-dd)</label></br>
					<input type="text" name="datum" value="<?=$datum?>">
				</li>	
				<li>
					<input type="submit" name="artikelToevoegen" value="Artikel toevoegen">
				</li>	
			</ul>
		</form>

	

	<?php endif?>

</body>

</html>