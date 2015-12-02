<?php
	
	$message = "";
	$deleteMessage;
	$count = 0;


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

?>



<!doctype html>

<html>
<head>
	<title>Opdracht CRUD Delete</title>
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
						<!-- <from action="deel1.php" method ="get"><input class="deleteButton" name="submit" type="submit"></from> -->
					</tr>
					<?php endforeach?>
				</tbody?>				
			</thead>

		

		</table>
		
	
		
</body>
</html>
