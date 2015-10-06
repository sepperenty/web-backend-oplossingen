<?php
	
	$numbers = array(1,2,3,4,5);
	$numbers_2 = array(5, 4, 3, 2, 1 );
	$vermenigVuldeging = $numbers[0]*$numbers[1]*$numbers[2]*$numbers[3]*$numbers[4];
	$evenGetallen = "";

	for($number = 0; $number < count($numbers); $number++)
	{
		if($numbers[$number] % 2 != 0)
		{
				$evenGetallen = $evenGetallen . " " . $numbers[$number];
		}
	}

	$som1 = $numbers[0] + $numbers_2[0];
	$som2 = $numbers[1] + $numbers_2[1];
	$som3 = $numbers[2] + $numbers_2[2];
	$som4 = $numbers[3] + $numbers_2[3];
	$som5 = $numbers[4] + $numbers_2[4];


?>



<!doctype html>

<html>

	<head>
		<title>
				opdracht-array basis deel 2
		</title>
	</head>
	<body>

		<h1>opdracht-array basis deel 2 EXTRA</h1>

		
		<p>Product van al de getallen is <?=$vermenigVuldeging?> </p>
		<p> de oneven getallen zijn : <?=$evenGetallen?></p>
		<p>De getallen van beide arrays met dezelfde index met elkaar opgeteld</p>
		<p>Som van getallen met index 0 = <?=$som1?></p>
		<p>Som van getallen met index 1 = <?=$som2?></p>
		<p>Som van getallen met index 2 = <?=$som3?></p>
		<p>Som van getallen met index 3 = <?=$som4?></p>
		<p>Som van getallen met index 4 = <?=$som5?></p>


	</body>


</html>