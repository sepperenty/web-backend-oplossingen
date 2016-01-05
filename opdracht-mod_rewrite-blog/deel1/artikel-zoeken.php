
<?php 

		$noArticles = false;

		$db = new PDO('mysql:host=localhost;dbname=mod_rewrite_artikels', 'root', 'root');
		
		
		if(isset($_GET["zoekWoord"]))
		{
			$zoekWoord = "%".$_GET["zoekWoord"]."%";
			$showSql = "SELECT * from artikels where artikel like :zoekwoord";
			$showStatement = $db->prepare($showSql);
			$showStatement->bindParam(":zoekwoord",$zoekWoord);
			$title = "Artikels die het woorde " . $_GET["zoekWoord"] . " bevatten ";
		}

		elseif(isset($_GET["zoekDatum"]))
		{
			$datum = date('Y-m-d', strtotime(str_replace('-', '/', $_GET["zoekDatum"])));
			$showSql = "SELECT * from artikels where datum like :zoekDatum";
			$showStatement = $db->prepare($showSql);
			$showStatement->bindParam(":zoekDatum", $datum);
			$title = "Artikels met de datum " . $datum;
		}

		else
		{
			header("location: artikel-overzicht.php");
		}


		
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

		include "overzicht.php";
 ?>