<?php
	$message = "";
	try{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');
		

		if(isset($_POST["submit"]))
		{
			if(isset($_POST["brnaam"]) && isset($_POST["adres"]) && isset($_POST["postcode"]) && isset($_POST["gemeente"]) && isset($_POST["omzet"]))
			{
				$query = "INSERT into brouwers (brnaam, adres, postcode, gemeente, omzet) values (:naam, :adres, :postcode, :gemeente, :omzet)";

				$bierStatement = $db->prepare($query);
				$bierStatement->bindParam( ':naam', $_POST["brnaam"]);
				$bierStatement->bindParam( ':adres', $_POST["adres"]);
				$bierStatement->bindParam( ':postcode', $_POST["postcode"]);
				$bierStatement->bindParam( ':gemeente', $_POST["gemeente"]);
				$bierStatement->bindParam( ':omzet', $_POST["omzet"]);

				$succes = $bierStatement->execute();

				if($succes)
				{
					$lastId			=	$db->lastInsertId();
					$message = "het toevoegen is gelukt, de laatste toegevoegde brouwer heeft als id ". $lastId;
				}
				else
				{
					$message = "het toevoegen van de brouwer is mislukt :(";
				}

			}

		}

	}
	catch( PDOException $e)
	{
		$message = " er is iets mis gegaan " . $e->getMessage();
	}
	echo $message;

?>


<!doctype html>

<html>
<head>
	<title>Opdracht CRUD insert</title>
</head>

<body>
	<h1> voeg een brouwer toe </h1>
	
	<form action="deel1.php" method = "post">
		<p>Naam</p>
		<input name="brnaam" type="text">
		<p>adres</p>
		<input name="adres" type="text">
		<p>postcode</p>
		<input name="postcode" type="text">
		<p>gemeente</p>
		<input name="gemeente" type="text">
		<p>omzet</p>
		<input name="omzet" type="text">
		<input name="submit" type="submit">

	</form>
		
		
	
		
</body>
</html>
