<?php

	$kolommen = 10;
	$rijen = 10;




?>


<!doctype html>

<html>

	<head>
		<title>
				opdracht-looping statements for deel 1
		</title>
	</head>
	<body>

		<h1>opdracht-looping statements for deel 1</h1>
		
		<table>
	
			<?php for ($kolom=0; $kolom < $kolommen  ; $kolom++) :?>
			<tr>


			<?php for ($rij=0; $rij <= $rijen; $rij++):?>
			<td>kolom</td>
			<?php endfor?>

			</tr>

		<?php endfor?>


		</table>

	

	</body>


</html>