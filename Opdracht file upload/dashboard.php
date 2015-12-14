<?php

include("artikels-logic.php");
if(isset($_SESSION["notifications"]))
	{
		echo "type : " . $_SESSION["notifications"]["type"];
		echo " message : " . $_SESSION["notifications"]["message"];
		
	}

?>

<!doctype html>
<html>
<head><title>Dashboard</title>

<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php if($validationComplete):?>

		<p><a href="dashboard.php">terug naar dashboard</a> | ingelogd als <?=$email?> | <a href="dashboard.php?logout">uitloggen</a></p>


		<h1>Dashboard</h1>

		<ul>
			<li><a href="artikels-overzicht.php">Artikels<a/></li>
			<li><a href="gegevens-wijzigen-form.php">Gegevens Wijzigen<a/></li>
		</ul>

		

	<?php endif?>
</body>

</html>