
<?php 
		
		session_start();

		$titel = "";
		$artikel = "";
		$kernWoorden = "";
		$datum = "";

		if(isset($_SESSION["toevoegenForm"]))
		{
			$titel 			= $_SESSION["toevoegenForm"]["titel"];
			$artikel 		= $_SESSION["toevoegenForm"]["artikel"];
			$kernWoorden 	= $_SESSION["toevoegenForm"]["kernWoorden"];
			$Datum 			= $_SESSION["toevoegenForm"]["datum"];
		}

		if(isset($_SESSION["notification"]))
		{
			echo "<p> type : ".$_SESSION["notification"]["type"]."</p>";

			echo "<p> message : ".$_SESSION["notification"]["message"]."</p>";

			unset($_SESSION["notification"]);
		}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Artikel toevoegen</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<h1>Artikel toevoegen</h1>
	
	<ul>
		<form action="artikel-toevoegen.php" method="post">
			<li><label for="titel">Titel</label></li>
			<li><input type="text" name="titel" value="<?=$titel?>"></li>
			<li><label for="artikel">Artikel</label></li>
			<li><textarea name="artikel"cols="30" rows="10"><?=$artikel?></textarea></li>
			<li><label for="kernwoorden">Kernwoorden</label></li>
			<li><input type="text" name="kernWoorden"value="<?=$kernWoorden?>" ></li>
			<li><label for="date">Datum</label></li>
			<li><input type="date" name="datum" value="<?=$datum?>"></li>
			<input type="submit" value="add" name="add">
		</form>
	</ul>
	
	
</body>
</html>