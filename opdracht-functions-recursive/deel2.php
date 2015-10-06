
<?php
	
	$geldHans = 100000;
	$renteVoet = 8;
	$jaren = 10;

	$jaar = 1;
	$amountPerJaar = array();


	function berekenGeld($geld, $rentevoet, $tijd)
	{
		global $jaar;
		global $amountPerJaar;

		if($jaar <= $tijd)
		{
			$rente = round($geld * ($rentevoet/100));
			$totaalGeld = $geld + $rente;
			$amountPerJaar[$jaar] = $totaalGeld;
			$jaar++;
			return berekenGeld($totaalGeld, $rentevoet, $tijd);
			
		}
		else
		{
			return $amountPerJaar;
		}
	}

	$rekeningUitReksel = berekenGeld($geldHans, $renteVoet, $jaren);
	$toshow ="";

	for ( $index = 1; $index <= count($rekeningUitReksel); $index++)
	{
		$toshow = $toshow . "in het " . $index . "ste jaar is hans zijn geld " . $rekeningUitReksel[$index] . " euro waard <br>";
	}
?>


<!doctype html>

<html>

	<head>
		<title>
				opdracht-functions recursive deel 1
		</title>
	</head>
	<body>

		<?=$toshow?>;
		
	</body>


</html>