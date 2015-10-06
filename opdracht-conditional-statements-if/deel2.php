<?php

	$dag1 = "maandag";
	$dag2 = "dinsdag";
	$dag3 = "woendag";
	$dag4 = "donderdag";
	$dag5 = "vrijdag";
	$dag6 = "zaterdag";
	$dag7 = "zondag";

	$dag = "";

	$getal = 1;

	if ($getal == 1) {

		$dag = $dag1;

		} 


	if ($getal == 2) {

		$dag = $dag2;

		} 


	if ($getal == 3) {

		$dag = $dag3;

		} 

	if ($getal == 4) {

		$dag = $dag4;

		} 

	if ($getal == 5) {

		$dag = $dag5;

		} 

	if ($getal == 6) {

		$dag = $dag6;

		} 

	if ($getal == 7) {

		$dag = $dag7;

		} 

	$upperDag = strtoupper($dag);
	$upperBehalveA = str_replace("A","a",$upperDag);
	$posLaatsteA = strrpos($upperDag, "A");
	$upperBehalveLaatsteA = substr_replace($upperDag, "a", $posLaatsteA, 1);


?>

<!doctype html>
<html>
	
	<head>
		<title>Opdracht conditional statements if DEEL1</title>
	</head>
	<body>
		<h1>Opdracht conditional statements if DEEL1</h1>

		<p> Het is <?=$dag?></p>

		<p>Dag in hoofdletters = <?=$upperDag?>
			<p>Dag in hoofdletters behalve a = <?=$upperBehalveA?> </p>
			<p>Dag in hoofdletters behalve laatste a = <?=$upperBehalveLaatsteA?></p>



	</body>


</html>