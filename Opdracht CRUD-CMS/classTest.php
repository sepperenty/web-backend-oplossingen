<?php

	function __autoload($filename)
	{
		include "classes/".$filename . ".php";
	}

	$dataBase = new dataBase();

	/*var_dump($dataBase->getRow("titel, artikel", "artikels", true, 13, "id"));
*/
	
	if(isset($_POST["artikelToevoegen"]))
	{
		$titel = $_POST["titel"];
		$kernWoorden = $_POST["kernwoorden"];
		$artikel = $_POST["artikel"];
		$datum= $_POST["datum"];

		var_dump($dataBase->insert("artikels", "titel, kernwoorden, artikel, auteur, datum", "'" . $titel . "','" 
			. $kernWoorden . "','" . $artikel . "','" . "sepperenty@hotmail.com" . "','" . $datum . "'"));
		
}

	
?>

<!doctype html>

<html>

	<head>

		<title>Framewordk test</title>

		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>

			<h1>FrameWork test</h1>

			<form action ="classTest.php" method="post">

			<ul>
				<li>
					<label for="titel">Titel</label></br>
					<input type="text" name="titel">
				</li>	
				<li>
					<label for="artikel">Artikel</label></br>
					<input type="text" name="artikel" >
				</li>	
				<li>
					<label for="kernwoorden">Kernwoorden</label></br>
					<input type="text" name="kernwoorden">
				</li>	
				<li>
					<label for="datum">Datum (jjjj-mm-dd)</label></br>
					<input type="text" name="datum">
				</li>	
				<li>
					<input type="submit" name="artikelToevoegen" value="Artikel toevoegen">
				</li>	
			</ul>
		</form>

	</body>

</html>
