

<?php
	
	$arrayDieren = array("hond", "kat", "giraffe", "paard", "koe" );
	$arrayDieren[] = "wolf";
	$arrayDieren[] = "beer";
	$arrayDieren[] = "hamster";
	$arrayDieren[] = "kip";
	$arrayDieren[] = "konijn";


	$arrayVoertuigen = array('landvoertuigen' => array("fiets", "vespa"), 'waterVoertuihen' => array("boot"), 'luchtvoertuigen' => array('vliegtuig') );
	$dumpArray = var_dump($arrayVoertuigen);
?>


<!doctype html>

<html>

	<head>
		<title>
				opdracht-array basis deel 1
		</title>
	</head>
	<body>

		
		<?=$dumpArray?>


	</body>


</html>