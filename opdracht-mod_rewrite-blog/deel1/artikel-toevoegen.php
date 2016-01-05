<?php 
	
	session_start();

	if(isset($_POST["add"]))
	{

		$_SESSION["toevoegenForm"]["titel"] = $_POST["titel"];
		$_SESSION["toevoegenForm"]["artikel"] = $_POST["artikel"];
		$_SESSION["toevoegenForm"]["kernWoorden"] = $_POST["kernWoorden"];
		$_SESSION["toevoegenForm"]["datum"] = $_POST["datum"];



		if( ($_POST["titel"] != "") && ($_POST["artikel"] != "") && ($_POST["kernWoorden"] != "") && ($_POST["datum"] != "") )
		{

				$titel = $_POST["titel"];
				$artikel = $_POST["artikel"];
				$kernWoorden = $_POST["kernWoorden"];
				$datum = date('Y-m-d', strtotime(str_replace('-', '/', $_POST["datum"])));

				$db = new PDO('mysql:host=localhost;dbname=mod_rewrite_artikels', 'root', 'root');
				$insertQuery = "INSERT into artikels (titel, artikel, kernwoorden, datum) 
							values(:titel, :artikel, :kernWoorden, :datum)";

				$insertStatement = $db->prepare($insertQuery);
				$insertStatement->bindParam(":titel", $titel);
				$insertStatement->bindParam(":artikel", $artikel);
				$insertStatement->bindParam(":kernWoorden", $kernWoorden);
				$insertStatement->bindParam(":datum", $datum);

				$succes = $insertStatement->execute();

				if($succes)
				{

					$_SESSION["notification"]["type"] = "succes";
					$_SESSION["notification"]["message"] = "Artikel succesvol toegevoegd";
					header("location: artikel-overzicht.php");
				}

				else
				{
					$_SESSION["notification"]["type"] = $datum;
					$_SESSION["notification"]["message"] = "Er is iets fout gebeurt bij het toevoegen van de data, contacteer de webmaster: sepperenty@hotmail.com";
					header("location: artikel-toevoegen-form.php");
				
				}
		}

		else
		{

		$_SESSION["notification"]["type"] = "error";
		$_SESSION["notification"]["message"] = "Vul alstubliefd alle texboxen in";
		header("location: artikel-toevoegen-form.php");
		}


	}

	else
	{
		$_SESSION["notification"]["type"] = "error";
		$_SESSION["notification"]["message"] = "Vul alstubliefd alle texboxen in";
		header("location: artikel-toevoegen-form.php");
	}

 ?>