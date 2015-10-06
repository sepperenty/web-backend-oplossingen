<?php

$voornaam = "seppe";
$achternaam = "renty";
$volledigeNaam = $voornaam . $achternaam;
$aantalKarakters = strlen($volledigeNaam);

?>


<!doctype html>
<html>
	
	<head>
		<title>Opdracht string concantenate
	</title>
</head>

<body>

	<h1>
		Opdracht string concantenate
	</h1>

	<p>voornaam : <?=$voornaam?> </p>

		
	<p>	achternaam : <?=$achternaam?></p>
	<p>	volledigenaam : <?=$volledigeNaam?></p>
	<p> aantal karakters in volledige naam : <?=$aantalKarakters?></p>





</body>
		



</html>