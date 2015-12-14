
<?php
	include("artikels-logic.php");

	if(isset($_SESSION["notifications"]))
	{
		echo "type : " . $_SESSION["notifications"]["type"];
		echo " message : " . $_SESSION["notifications"]["message"];
	}

	try
	{
		$noArticles = false;
		$db = new PDO('mysql:host=localhost;dbname=opdracht_file_upload', 'root', 'root');
		$showSql = "SELECT * from artikels  where is_archived = 0";
		$showStatement = $db->prepare($showSql);
		$showStatement->execute();

		$artikels = array();



		while($row = $showStatement->fetch(PDO::FETCH_ASSOC))
		{
			$artikels[] = $row;
		}
		if(empty($artikels))
		{
			$noArticles = true;
		}
				
	}

	catch(PDOException $e)
	{
		$_SESSION["notifications"]["type"] = "Database Connection Error";
		$_SESSION["notifications"]["message"] = "We Could not connect to the database";
	}
?>

<!doctype html>
<html>
<head><title>Artikels</title>

<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php if($validationComplete):?>

		<p><a href="dashboard.php">terug naar dashboard</a> | ingelogd als <?=$email?> | <a href="dashboard.php?logout">uitloggen</a></p>


		<h1>Overzicht van artikels</h1>

		<a href="artikel-toevoegen-form.php">Artikel toevoegen</a>

		<?php if($noArticles) : ?>
		<p>Geen artikels te tonen</p>
		<?php endif?>
		
		<?php foreach ($artikels as $key):?>
			<div  <?php if($key["is_active"] == 0):?> class="notActiveColor artikel" <?php else:?> class="artikel" <?php endif?>>
				<h2><?=$key["titel"]?></h2>
				<p><?=$key["artikel"]?></p>
				<p><?=$key["kernwoorden"]?></p>
				<p><?=$key["datum"]?></p>
				<p><?=$key["auteur"]?></p>
				<p><a href="artikels-overzicht.php?wijzigen=<?=$key["id"]?>">artikel wijzigen</a> | 
				<a href="artikel-activeren.php?artikel=<?=$key["id"]?>"><?php if($key["is_active"] == 0):?>artikel activeren   <?php else:?>artikel deactiveren<?php endif?></a> | 
				<a href="artikel-verwijderen.php?artikel=<?=$key["id"]?>">artikel verwijderen</a></p>
			</div>
		<?php endforeach?>		
			


	<?php endif?>

</body>

</html>