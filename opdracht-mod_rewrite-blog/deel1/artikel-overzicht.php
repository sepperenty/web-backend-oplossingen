
<?php 

		$noArticles = false;
	
		$db = new PDO('mysql:host=localhost;dbname=mod_rewrite_artikels', 'root', 'root');
		$showSql = "SELECT * from artikels";
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

		$title="Overzicht van de artikels";

		include "overzicht.php";
 ?>