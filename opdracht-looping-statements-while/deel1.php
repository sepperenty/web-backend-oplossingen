<?php
	
	$index = 0;
	$toShow = "";
	$amount = 100;
	while ($index < $amount) 
	{	
		if($index != $amount-1)
		{
		$toShow = $toShow . $index . ", ";
		}

		else
		{
			$toShow = $toShow . $index;
		}

		$index++;
	}

	$arrayNumbers = array();
	$secondListToShow ="";
	$numberInList = 0;

	while ($numberInList < $amount)
	{
		
		if(($numberInList % 3 == 0) && ($numberInList > 40) && ($numberInList < 80))
		{
			$secondListToShow = $secondListToShow . $numberInList . ", ";
		}
		$numberInList++;
	}




?>



<!doctype html>

<html>

	<head>
		<title>
				opdracht-looping statements while deel 1
		</title>
	</head>
	<body>

		<h1>opdracht-looping statements while deel 1</h1>
		<p><?=$toShow?></p>

		<p>De 2de lijst</p>
		<p><?=$secondListToShow?></p>
	

	</body>


</html>