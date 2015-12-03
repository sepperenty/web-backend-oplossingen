<?php
	static $nummer = 0;
	
	$messae = "";
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');
		$messae = "connectie met db bieren is geslaagt.";

		$queryString = "SELECT brnaam, brouwernr FROM brouwers";

		
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
		$biernr = 5;
		$fetchBier = array();
		if(isset($_GET["val"]))
		{
			$biernr = $_GET["val"];
			$getBierQuery = "SELECT naam from bieren where brouwernr like :biernr";

			$bierStatement = $db->prepare($getBierQuery);
			$bierStatement->bindParam( ':biernr', $biernr);
			$bierStatement->execute();
			
			while ( $row = $bierStatement->fetch(PDO::FETCH_ASSOC) )
			{
				$fetchBier[]	=	$row;
			}

			/*var_dump($fetchBier);*/
		}

	}
	catch( PDOException $e )
	{
		$messae = "er ging iets mis + " . $e->getMessage();
	}


	if(isset($_GET[""]))

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
<h1> Zoek op brouwer</h1>
	
<form action="deel2.php", method="GET">
	<select name="val">

		<?php foreach ($fetchAr as $val):?>
		<option value="<?=$val["brouwernr"]?>"<?= ( $biernr === $val['brouwernr'] ) ? 'selected' : ''?>><?=$val["brnaam"]?></option>
		<?php endforeach ?>
	</select>
	<input type="submit" value="Geef mij alle bieren van deze brouwerij">

</form>


<table>
			<thead>
				
				<thead>
					<tr>
						<td>#</td>
						<td>naam</td>
					</tr>

				</thead>
				<?php foreach ($fetchBier as $bier): ?>
				<tr>
				<td><?php $nummer++; echo $nummer?></td>
				<td><?=$bier["naam"]?></td>
				</tr>
				
				<?php endforeach ?>
				
			</thead>

		

		</table>

	
		
</body>
</html

 