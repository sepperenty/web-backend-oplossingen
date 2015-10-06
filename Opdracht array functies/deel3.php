<?php
	
	$waarden = array(8, 7, 8, 7, 3, 2, 1, 2, 4);
	$uniekeWaarden = array_unique($waarden);
	
	rsort($waarden);

?>

<!doctype html>

<html>

	<head>
		<title>
				opdracht-array functies deel 3
		</title>
	</head>
	<h1>
				opdracht-array functies deel 3
	</h1>
	<body>
		<p> Alle waarden van de array = <?=var_dump($waarden)?></p>
		<p> De unieke waarden van de array = <?=var_dump($uniekeWaarden)?></p>
		<p> De waarden zijn gesorteerd van groot naar klein</p>

	</body>


</html>