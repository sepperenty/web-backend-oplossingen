<?php
	
	$weekgetal = 7;
	$weekdag ="";

	switch ($weekgetal) {
		case 1:
			$weekdag = "Maandag";
			break;
		case 2:
			$weekdag = "dinsdag";
			break;
		case 3:
			$weekdag = "woensdag";
			break;
		case 4:
			$weekdag = "donderdag";
			break;
		case 5:
			$weekdag = "vrijdag";
			break;
		case 6:
			$weekdag = "zaterdag";
			break;
		case 7:
			$weekdag = "zondag";
			break;

		default:
			$weekdag = "a dag";
			break;
	}


?>




<!doctype html>

<html>

	<head>
		<title>
				opdracht-conditional-statements-switch
		</title>
	</head>
	<body>
		<p> <?=$weekdag?> is de <?=$weekgetal?>de dag van de week </p>



	</body>


</html>