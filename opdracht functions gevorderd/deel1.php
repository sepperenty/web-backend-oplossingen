
<?php
	
	$md5HashKey = "d1fa402db91a7a93c4f414b8278ce073";
	$char1 = 2;
	$char2 = 8;
	$char3 = "a";
	 

	function manier1($hash, $karakter)
	{
		$hashLength = strlen($hash);
		$karakterHoeveelheid = substr_count($hash, $karakter);
		$procent = ($karakterHoeveelheid/$hashLength) * 100;
		return $procent;
	}

	function manier2($karakter)
	{
		global $md5HashKey;
		$hashLength = strlen($md5HashKey);
		$karakterHoeveelheid = substr_count($md5HashKey, $karakter);
		$procent = ($karakterHoeveelheid/$hashLength)*100;
		return $procent;
	}

	function manier3($karakter)
	{
		$GLOBALS['md5HashKey'];
		$hashLength = strlen(	$GLOBALS['md5HashKey']);
		$karakterHoeveelheid = substr_count(	$GLOBALS['md5HashKey'], $karakter);
		$procent = ($karakterHoeveelheid/$hashLength)*100;
		return $procent;
		

	}

	$procent1 = manier1($md5HashKey, $char1);
	$procent2 = manier2($char2);
	$procent3 = manier3($char3);
	
?>

<!doctype html>

<html>

	<head>
		<title>
				opdracht-functions gevorderd deel 1
		</title>
	</head>
	<body>
		<h1>Opdracht functions gevorderd deel1 </h1>

		<p>Het karakter <?=$char1?> is <?=$procent1?>% van de hash</p>
		<p>Het karakter <?=$char2?> is <?=$procent2?>% van de hash</p>
		<p>Het karakter <?=$char3?> is <?=$procent3?>% van de hash</p>


	</body>


</html>