<?php

$boodschappenlijstje = array("brood", "boter", "eieren", "vlees", "kaas");

$index = 0;

$toshow = "";
while ($index < count($boodschappenlijstje))
 {
	$toshow = $toshow . "<li>" . $boodschappenlijstje[$index] . "</li>";
	$index++;
}


?>



<!doctype html>

<html>

	<head>
		<title>
				opdracht-looping statements while deel 2
		</title>
	</head>
	<body>

		<h1>opdracht-looping statements while deel 2</h1>
		
		<ul>
			<?=$toshow?>
		</ul>

	</body>


</html>