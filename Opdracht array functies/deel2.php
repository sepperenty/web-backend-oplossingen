<?php
	
	$dieren = array("hond", "kat", "panter", "beer", "hamster", "koe", "paard", "mol");
	sort($dieren);
	//var_dump($dieren);

	$zoogdieren = array("walvis", "ree", "olifant");

	$dierenlijst = array_merge($dieren, $zoogdieren);
	var_dump($dierenlijst);

	$teZoekenDier = "glimworm";
	$dierenLength = count($dieren);
	$dierGevonden = "";

	if(in_array($teZoekenDier, $dieren))
	{
		$dierGevonden = "Het dier: " . $teZoekenDier . " is gevonden !";
	}
	else
	{
		$dierGevonden =  "Het dier: " . $teZoekenDier . " is niet gevonden.";
	}



?>





<!doctype html>

<html>

	<head>
		<title>
				opdracht-array functies deel 2
		</title>
	</head>
	<body>

		<h1>Opdracht-array functies deel 1</h1>

		<p> De array dieren heeft <?=$dierenLength?> aantal dieren</p>
	
		<?=$dierGevonden?>

	</body>


</html>