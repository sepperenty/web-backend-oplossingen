<?php

	session_start();

	if(isset($_GET["artikel"]))
	{
		$id = $_GET["artikel"];
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=opdracht-crud-cms', 'root', 'root');
			$changeActiveQuery = "UPDATE artikels SET is_archived = 1 where id=:id";
			$changeActiveStatement = $db->prepare($changeActiveQuery);
			$changeActiveStatement->bindParam(":id", $id);
			$changeActiveStatement->execute();
			$_SESSION["notifications"]["type"] = "succes";
			$_SESSION["notifications"]["message"] = "Artikel succesvol verwijderd";
			header("location: artikels-overzicht.php");
		}

		catch(PDOException $e)
		{
			$_SESSION["notifications"]["type"] = "dataBase error";
			$_SESSION["notifications"]["message"] = $e->getMessage();
			header("location: artikels-overzicht.php");
		}
	}

	else
	{
		header("location: artikels-overzicht.php");
	}

?>