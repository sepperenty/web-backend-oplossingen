
<?php

	function berekenSom($getal1, $getal2)
	{
		return $getal1+$getal2;
	}

	function vermenigvuldig ($getal1, $getal2)
	{
		return $getal1*$getal2;
	}

	function isEven ($getal)
	{
		if($getal % 2 == 0)
		{
			return true;
		}

		else
		{
			return false;
		}
	}

	function lengthStringAndUpperCase($string)
	{
		$length = strlen($string);
		$uppercase = strtoupper($string);
		$arrayToReturn = array($uppercase ,$length);
		return $arrayToReturn;
	}

	$som = berekenSom(5,4);
	$vermenigvuldeging = vermenigvuldig(5,4);

	$getalToCheck = 13;
	$isGetalEven = "";
	$stringToUpperAndCount = "sepperenty";

	$stringToUpperAndLength = lengthStringAndUpperCase($stringToUpperAndCount);

	if(isEven($getalToCheck))
	{
		$isGetalEven = "het getal " . $getalToCheck . " is even";
	}

	else
	{
		$isGetalEven = "het getal " . $getalToCheck . " is oneven";
	}



?>




<!doctype html>

<html>

	<head>
		<title>
				opdracht-functions deel 1
		</title>
	</head>
	<body>
		<h1>Opdracht functions deel1 </h1>

		<p>De soms van de getallen 5 en 4 is : <?=$som?></p>
		<p>De vermenigvuldeging van de getallen 5 en 4 is <?=$vermenigvuldeging?></p>
		<p><?=$isGetalEven?></p>
		<p>De string <?=$stringToUpperAndCount?> naar hoofdletters is : <?=$stringToUpperAndLength[0]?></p>
		<p>De string <?=$stringToUpperAndCount?> bevat <?=$stringToUpperAndLength[1]?> karakters</p>

	</body>


</html>