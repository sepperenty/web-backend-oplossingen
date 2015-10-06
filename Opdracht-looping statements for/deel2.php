<?php

	$kolommen = 10;
	$rijen = 10;

	$numberToPrint = 0;


?>


<!doctype html>

<html>

	<head>
		<title>
				opdracht-looping statements for deel 1
		</title>


		<style>

		.oneven {
			background-color: green;
		}



		</style>
	</head>
	<body>

		<h1>opdracht-looping statements for deel 1</h1>
		
		<table>
	
			<?php for ($kolom=0; $kolom <= $kolommen  ; $kolom++) :?>
			<tr>


			<?php for ($rij=1; $rij <= $rijen; $rij++):?>

				<?php if (($rij * $kolom) % 2 != 0):?>
					
				<td class="oneven"><?=$rij*$kolom?></td>

			<?php else:?>

				<td><?=$rij*$kolom?></td>

			<?php endif ?>

			<?php endfor?>

			</tr>

		<?php endfor?>


		</table>

	

	</body>


</html>