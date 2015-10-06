
<?php

$getal = 99;

$toshow ="";

//$KleinsteTiental = (((int) ($getal / 10)) * 10);
//$grootsteTiental = $KleinsteTiental + 10;

if(($getal >= 0) && ($getal < 10))
{
	$KleinsteTiental = 0;
	$grootsteTiental = 10;
}
elseif(($getal >= 10) && ($getal < 20))
{
	$KleinsteTiental = 10;
	$grootsteTiental = 20;
}
elseif(($getal >= 20) && ($getal < 30))
{
	$KleinsteTiental = 20;
	$grootsteTiental = 30;
}
elseif(($getal >= 30) && ($getal < 40))
{
	$KleinsteTiental = 30;
	$grootsteTiental = 40;
}
elseif(($getal >= 40) && ($getal < 50))
{
	$KleinsteTiental = 40;
	$grootsteTiental = 50;
}
elseif(($getal >= 50) && ($getal < 60))
{
	$KleinsteTiental = 50;
	$grootsteTiental = 60;
}
elseif(($getal >= 60) && ($getal < 70))
{
	$KleinsteTiental = 60;
	$grootsteTiental = 70;
}
elseif(($getal >= 70) && ($getal < 80))
{
	$KleinsteTiental = 70;
	$grootsteTiental = 80;
}
elseif(($getal >= 80) && ($getal < 90))
{
	$KleinsteTiental = 80;
	$grootsteTiental = 90;
}
elseif(($getal >= 90) && ($getal < 100))
{
	$KleinsteTiental = 90;
	$grootsteTiental = 100;
}

$toshow = "het getal " . $getal . " ligt tussen " . $KleinsteTiental . " en " . $grootsteTiental;
$revToShow = strrev($toshow);


?>


<!doctype html>

<html>

	<head>
		<title>
				opdracht-conditional-statements-if-elseif
		</title>
	</head>
	<body>

		<p><?=$toshow?></p>
		<p><?=$revToShow?></p>

		


	</body>


</html>