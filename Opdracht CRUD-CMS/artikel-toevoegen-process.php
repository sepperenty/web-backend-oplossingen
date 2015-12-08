<?php
	
	session_start();


	if(isset($_POST["artikelToevoegen"]))
	{
		$titel = $_POST["titel"];
		$artikel = $_POST["artikel"];
		$kernwoorden = $_POST["kernwoorden"];
		$datum = $_POST["datum"];
		$auteur = $_POST["auteur"];

		$_SESSION["artikelAanmaken"]["titel"] = $titel;
		$_SESSION["artikelAanmaken"]["artikel"] = $artikel;
		$_SESSION["artikelAanmaken"]["kernwoorden"] = $kernwoorden;
		$_SESSION["artikelAanmaken"]["datum"] = $datum;
		

		if(($titel != "") && ($artikel != "") && ($kernwoorden != "") && ($datum != ""))
		{
			$db = new PDO('mysql:host=localhost;dbname=opdracht-crud-cms', 'root', 'root');
			$insertQuery = "INSERT into artikels (titel, artikel, kernwoorden, datum, auteur) 
							values(:titel, :artikel, :kernwoorden, :datum, :auteur)";
			$insertStatement = $db->prepare($insertQuery);
			$insertStatement->bindParam(":titel", $titel);
			$insertStatement->bindParam(":artikel", $artikel);
			$insertStatement->bindParam(":kernwoorden", $kernwoorden);
			$insertStatement->bindParam(":datum", $datum);
			$insertStatement->bindParam(":auteur", $auteur);
			$succes = $insertStatement->execute();
			if($succes)
			{
				$_SESSION["notifications"]["type"] = "succes";
				$_SESSION["notifications"]["message"] = "Artikel succesvol toegevoegd";
				unset($_SESSION["artikelAanmaken"]);
				header("location: artikels-overzicht.php");
			}

			else
			{
				$_SESSION["notifications"]["type"] = "error";
				$_SESSION["notifications"]["message"] = "Artikel kon niet worden toegevoegd";
				header("location: artikel-toevoegen-form.php");			
			}

		}

		else
		{
			$_SESSION["notifications"]["type"] = "error";
			$_SESSION["notifications"]["message"] = "vul alle velden in";
			header("location: artikel-toevoegen-form.php");

		}
	}




?>