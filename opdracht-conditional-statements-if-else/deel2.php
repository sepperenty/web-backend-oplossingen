<?php

$totaal = 221108521;



$aantalMinuten = (int) ($totaal / 60);
$aantalUren = (int) ($totaal / 3600);
$aantalDagen = (int) ($totaal / 86400);
$aantalWeken = (int) ($totaal / 604800);
$aantalMaanden = (int) ($totaal / 2678400);
$aantalJaren = (int) ($totaal / 31536000);

?>



<!doctype html>
<html>
	
	<head>
		<title>Extra conditional if else </title>
	</head>
	<body>
		<h1>Extra conditional if else </h1>
		<p>In <?=$totaal?> aantal seconden zitten : </p>
		<p>Aantal minuten = <?=$aantalMinuten?></p>
		<p>Aantal uren = <?=$aantalUren?></p>
		<p>Aantal dagen = <?=$aantalDagen?></p>
		<p>Aantal weken = <?=$aantalWeken?></p>
		<p>Aantal maanden = <?=$aantalMaanden?></p>
		<p>Aantal jaren = <?=$aantalJaren?></p>
		

	</body>


</html>