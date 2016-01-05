

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Artikel overzicht</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	
	<div class="overzicht">

		<form action="artikel-zoeken.php" method="get">
		
		<ul>
			<li><label for="zoeken">Zoek in artikels</label></li>
			<li><input type="text" name="zoekWoord" id=""><input type="submit" value="zoek"></li>
		</ul>

	</form>

	<form action="artikel-zoeken.php" method="get">
		
		<ul>
			<li><label for="Datum">Datum</label></li>
			<li><input type="date" name="zoekDatum" id=""><input type="submit" value="zoek"></li>
		</ul>

	</form>

		<h1><?=$title?></h1>

		<a href="artikel-toevoegen-form.php">Artikel toevoegen</a>
		
		<?php foreach ($artikels as $artikel):?>
			<article>
				
				<h2><?=$artikel["titel"]?></h2>
				<p><?=$artikel["artikel"]?></p>
				<p> kernwoorden: <?=$artikel["kernwoorden"]?></p>
				<p> datum: <?=$artikel["datum"]?></p>

			</article>
		<?php endforeach ?>
	</div>

	
</body>
</html>