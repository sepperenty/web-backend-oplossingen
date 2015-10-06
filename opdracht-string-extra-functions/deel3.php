<?php
	
	$lettertje = "e";
	$cijfertje = "3";
	$langsteWoord = "zandzeepsodemineralenwatersteenstralen";
	$replaceE = str_replace($lettertje, $cijfertje, $langsteWoord);



?>

<!doctype>
<html>

	<head>
		<title>
			Opdracht string extra functions deel 3
		</title>
	</head>
	<body>

		<p>het lettertje = <?=$lettertje?></p>
		<p>Het cijfertje = <?=$cijfertje?></p>
		<p>Het langste woord = <?=$langsteWoord?></p>
		<p>Langste woord vervangen = <?=$replaceE?></p>

	</body>

</html>
