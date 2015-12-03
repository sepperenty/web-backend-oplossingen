<?php
	static $nummer = 0;
	
	$messae = "";
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');
		$messae = "connectie met db bieren is geslaagt.";

		$queryString = "SELECT * from bieren

					INNER JOIN brouwers

					ON brouwers.brouwernr = bieren.brouwernr

					WHERE brouwers.brnaam like '%a%' AND
					bieren.naam like 'du%'";

		
		$statement = $db->prepare($queryString);

		// Een query uitvoeren
		$statement->execute();

		$fetchAr = array();

		/*while ( $row = $statement->fetch() )
		{
			$fetchAr[]	=	$row;
		}*/


		while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
		{

			$fetchAr[]	=	$row;
		}


	}
	catch( PDOException $e )
	{
		$messae = "er ging iets mis + " . $e->getMessage();
	}

?>

<!doctype html>
<html>
<head>
	<style>
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
	</style>
</head>

<body>
<h1>Overzicht van de bieren </h1>
		
		<table>
			<thead>
				
				<thead>
					<tr>
						<td>#</td>
						<td>biernr</td>
						<td>naam</td>	
						<td>brouwernr</td>
						<td>soortnr</td>
						<td>alcohol</td>
						<td>brnaam</td>
						<td>adres</td>
						<td>postcode</td>
						<td>gemeente</td>
						<td>omzet</td>
					</tr>

				</thead>
				<?php foreach ($fetchAr as $row): ?>
				<tr>
				<td><?php $nummer++; echo $nummer?></td>
				<td><?=$row["biernr"]?></td>
				<td><?=$row["naam"]?></td>	
				<td><?=$row["brouwernr"]?></td>
				<td><?=$row["soortnr"]?></td>
				<td><?=$row["alcohol"]?></td>
				<td><?=$row["brnaam"]?></td>
				<td><?=$row["adres"]?></td>
				<td><?=$row["postcode"]?></td>
				<td><?=$row["gemeente"]?></td>
				<td><?=$row["omzet"]?></td>

				</tr>
				
				<?php endforeach ?>
				
			</thead>

		

		</table>
		
	
		
</body>
</html>


<!-- 
SELECT *

FROM bieren

INNER JOIN brouwers

ON brouwers.brouwernr = bieren.biernr

WHERE brouwers.brnaam like "%a%" AND
WHERE bieren.naam like "du%" -->


