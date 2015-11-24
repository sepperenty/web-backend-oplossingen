<?php
	
	$messae = "";
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');
		$messae = "connectie met db bieren is geslaagt.";
	}
	catch( PDOException $e )
	{
		$messae = "er ging iets mis + " . $e->getMessage();
	}

	echo $messae;

?>



SELECT *

FROM bieren

INNER JOIN brouwers

ON brouwers.brouwernr = bieren.biernr

WHERE brouwers.brnaam like "%a%" AND
WHERE bieren.naam like "du%"


