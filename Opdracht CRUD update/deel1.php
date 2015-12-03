<?php
	
	$message = "";
	$deleteMessage;
	$count = 0;
	$brouwerToUpdate = "niet gevonden";
	$brouwerNaam;
	$brouwerAdres;
	$brouwerPostcode;
	$brouwerGemeente;
	$brouwerOmzet;

	try{

		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');

		if(isset($_GET["confirmation"]))
		{
			$deleteQuery = "DELETE FROM brouwers
									WHERE brouwernr = :brouwernr";
			$deleteBrouwerStatement = $db->prepare($deleteQuery);
			$deleteBrouwerStatement->bindParam(":brouwernr", $_GET["confirmation"]);
			$deleteSucces = $deleteBrouwerStatement->execute();

			if($deleteSucces)
			{
				$deleteMessage = "De brouwer met brouwernummer ". $_GET["confirmation"] . " is succesvol verwijderd";
			}

			else
			{
				$deleteMessage = "het verwijderen van brouwer met brouwernummer " .$_GET["confirmation"] ." is mislukt";
			}
		}

		if(isset($_POST["validate"]))
		{
			$updateQuery = 'UPDATE brouwers
									SET     brnaam 		=	:brnaam,
											adres		=	:adres,
											postcode	=	:postcode,
											gemeente	=	:gemeente,
											omzet		=	:omzet
									WHERE   brouwernr	=   :brouwernr
									LIMIT 1';
			$updateBrouwerStatement = $db->prepare($updateQuery);

			$updateBrouwerStatement->bindParam(":brnaam", $_POST["brnaam"]);
			$updateBrouwerStatement->bindParam(":adres", $_POST["adres"]);
			$updateBrouwerStatement->bindParam(":postcode", $_POST["postcode"]);
			$updateBrouwerStatement->bindParam(":gemeente", $_POST["gemeente"]);
			$updateBrouwerStatement->bindParam(":omzet", $_POST["omzet"]);
			$updateBrouwerStatement->bindParam(":brouwernr", $_POST["brouwernr"]);

			$updateSucces = $updateBrouwerStatement->execute();

			if($updateSucces)
			{
				$updateMessage = "De brouwerij is met succes gewijzigd";
			}
			else
			{
				$updateMessage = "Aanpassing is niet gelukt. Probeer opnieuw of neem contact op met de systeembeheerder wanneer deze fout blijft aanhouden sepperenty@hotmail.com";
			}

		}

		$getQuery = "SELECT * from brouwers";

		$getBrouwerStatement = $db->prepare($getQuery);

		$getBrouwerStatement->execute();

		$brouwerAr = array();

		while ( $row = $getBrouwerStatement->fetch(PDO::FETCH_ASSOC) )
		{
			$brouwerAr[]	=	$row;
		}

		

	}

	catch(PDOException $e)
	{
		$message = "Connectie met de data base is mislukt, de fout: ". $e->getMessage();
	}


	if(isset($_GET["update"]))
	{
		foreach($brouwerAr as $key)
		{
			if($key["brouwernr"] == $_GET["update"])
			{
				$brouwerToUpdate = $key["brnaam"];
				$brouwerAdres = $key["adres"];
				$brouwerPostcode = $key["postcode"];
				$brouwerGemeente = $key["gemeente"];
				$brouwerOmzet = $key["omzet"];
			}
		}

		if($brouwerToUpdate == "niet gevonden")
		{
			$brouwerToUpdate = "niet gevonden";
		}
	}



?>



<!doctype html>

<html>
<head>
	<title>Opdracht CRUD update</title>
	<style>
	.setcenter{
		margin-left: auto;
		margin-right: auto;
		text-align: center;
	}
	h1 {
		text-align: center;
	}
	table
	{
		margin-left: auto;
		margin-right: auto;
		border: 1px solid gray;
		border-radius: 2px;
		  border-collapse: collapse;
	}

	

	td{
		padding: 5px;
		border: 1px solid black;
	}

	table thead{
		background-color: #aeabab;
		text-align: center;
	}

	tbody tr:nth-child(odd) {background: gray; color: white;}
	.deleteButton{

	background-image: url ('img/delete.png');

	}

	.formDiv{
		margin-left: auto;
		margin-right: auto;
		width: 800px;
		margin-bottom: 50px;
	}

	</style>
</head>

<body>
	<p><?=$message?></p>
	<h1> Overzicht van de brouwers </h1>
	
	<div class="setcenter">

			<?php if (isset($_GET["delete"])): ?>
			<p>Are you shore you want to delete brouwer with number <?= $_GET["delete"]?> ?</p>
			<a  href="deel1.php?confirmation=<?=$_GET['delete']?>">Yes</a>
			<a  href="deel1.php">No</a>
			<?php endif?>
			<?php if(isset($_GET["confirmation"])):?>
			<p><?=$deleteMessage?></p>
			<?php endif ?>

	</div>
	<div class="formDiv">

		<?php if(isset($_GET["update"])):?>

		
			<h1>Brouwerij <?=$brouwerToUpdate?> #<?=$_GET["update"]?></h1>

			<?php if($brouwerToUpdate != "niet gevonden"):?>

				<form action="deel1.php" method="post">
					<input type="hidden" name="brouwernr" value="<?=$_GET["update"]?>">
					<p>brnaam</p>
					<input type="text" name="brnaam" value="<?=$brouwerToUpdate?>">
					<p>adres</p>
					<input type="text" name="adres"  value="<?=$brouwerAdres?>">
					<p>Postcode</p>
					<input type="text" name="postcode" value="<?=$brouwerPostcode?>">
					<p>gemeente</p>
					<input type="text" name="gemeente" value="<?=$brouwerGemeente?>">
					<p>omzet</p>
					<input type="test" name="omzet" value="<?=$brouwerOmzet?>">
					<input type="submit" name="validate" value="update">
				</from>

			<?php endif ?>

		<?php endif ?>

		<?php if(isset($_POST["validate"])):?>
			<p><?=$updateMessage?></p>
		<?php endif ?>
		
		
	</div>

		<table>
			<thead>
				
				
					<tr>
						<td>#</td>
						<td>brouwernr</td>
						<td>brnaam</td>
						<td>adres</td>
						<td>postcode</td>
						<td>gemeente</td>
						<td>omzet</td>
						<td>delete</td>
						<td>update</td>
					</tr>

				</thead>
				<tbody>
					<?php foreach ($brouwerAr as $key):?>
					<?php $count++ ?>
					<tr>
						<td><?=$count?></td>
						<td><?=$key["brouwernr"]?></td>
						<td><?=$key["brnaam"]?></td>
						<td><?=$key["adres"]?></td>
						<td><?=$key["postcode"]?></td>
						<td><?=$key["gemeente"]?></td>
						<td><?=$key["omzet"]?></td>
						<td><a  href="deel1.php?delete=<?=$key["brouwernr"]?>"><img src="img/delete.png"></a></td>
						<td><a href="deel1.php?update=<?=$key["brouwernr"]?>"><img src="img/edit.png"></a></td>
						</tr>
					<?php endforeach?>
				</tbody?>				
			</thead>

		

		</table>
		
	
		
</body>
</html>
