<?php
		
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');
		$orderDir = "ASC";
		$orderBy = "naam";


			if(isset($_GET["order"]))
			{
				
				$orderAr = explode(" ", $_GET["order"]);
				$orderBy = $orderAr[0];
				$orderDir = $orderAr[1];

				
			}
			
		$orderQuery = " " . $orderBy . " " . $orderDir;

			if(isset($_GET["order"]))
			{
				if($orderAr[1] == "ASC")
				{
					$orderDir = "DESC";
				}

				else
				{
					$orderDir = "ASC";
				}
			}


		$sql  = "SELECT bieren.biernr,
							bieren.naam,
							brouwers.brnaam,
							soorten.soort,
							bieren.alcohol 
						FROM bieren 
							INNER JOIN brouwers
							ON bieren.brouwernr	= brouwers.brouwernr
							INNER JOIN soorten
							ON bieren.soortnr = soorten.soortnr
							order by".$orderQuery;




	
		$bierStatement = $db->prepare($sql);
		$bierStatement->execute();
		$bierenInfo = array();

		while($row = $bierStatement->fetch(PDO::FETCH_ASSOC))
		{
			$bierenInfo[] = $row;
		}
	}

	catch(PDOException $e)
	{
		$message = "Verbinden met database mislukt :" . $e->getMessage();
		echo $message;
	}

?>

<!doctype html>

<html>

<head>
	<title>Opdracht CRUD order-by</title>

	<style>

		table
	{
		margin-left: auto;
		margin-right: auto;
		border: 1px solid gray;
		border-radius: 2px;
		  border-collapse: collapse;
	}
	td, th{
		padding: 10px;
		border: 1px solid black;
	}

	table thead{
		/*background-color: #aeabab;*/
		text-align: center;
	}

	.asc{
		background:	no-repeat url('img/icon-desc.png') right;
		background-size: 20px;
	}

	.desc{

		background:	no-repeat url('img/icon-asc.png') right;
		background-size: 20px;
	}

	tbody tr:nth-child(odd) {background: gray; color: white;}

	</style>
</head>
	
<body>
	<table>

		<thead>
			<tr>
				<th class=<?php if($orderDir == "ASC"):?> "asc" <?php else:?> "desc" <?php endif?>><a href="deel1.php?order=biernr <?=$orderDir?>">Biernummer</a></th>
				<th class=<?php if($orderDir == "ASC"):?> "asc" <?php else:?> "desc" <?php endif?>><a href="deel1.php?order=naam <?=$orderDir?>">Bier</a></th>
				<th class=<?php if($orderDir == "ASC"):?> "asc"  <?php else:?> "desc"<?php endif?>><a href="deel1.php?order=brnaam <?=$orderDir?>">Brouwer</a></th>
				<th class=<?php if($orderDir == "ASC"):?> "asc"  <?php else:?> "desc"<?php endif?>><a href="deel1.php?order=soort <?=$orderDir?>">Soort</a></th>
				<th class=<?php if($orderDir == "ASC"):?> "asc"  <?php else:?> "desc"<?php endif?>><a href="deel1.php?order=alcohol <?=$orderDir?>">AlcoholPercentage</a></th>
			<tr>
		</thead>
		<tbody>

				<?php foreach ($bierenInfo as $key):?>
					<tr>
						<td><?=$key["biernr"]?></td>
						<td><?=$key["naam"]?></td>
						<td><?=$key["brnaam"]?></td>
						<td><?=$key["soort"]?></td>
						<td><?=$key["alcohol"]?></td>
					</tr>
				<?php endforeach ?>

		</tbody>	




	</table>
</body>

</html>