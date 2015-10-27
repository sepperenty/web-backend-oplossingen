<?php

	

	function __autoload( $className ) {
	    include 'classes/' . $className . '.php';
	}


	__autoload("Percent");

	$new = 150;
	$unit = 100;
	$percent = new Percent($new,$unit);


	$absolute =  $percent->absolute;
	$nominal = $percent->nominal;
	$relative =$percent->relative;
	$hunderd = $percent->hunderd;
?>


<!doctype html>

<html>
	<style>
		table{
			border: 1px solid black;
		}
		td{
			border: 1px solid black;
		}

	</style>

	<p> hoeveel procent is <?=$new?> van <?=$unit?> ? </p>


	<table>
		<tr>
			<td>absolute</td>
			<td><?=$absolute?></td>
		</tr>
		<tr>
			<td>nominal</td>
			<td><?=$nominal?></td>
		</tr>

		<tr>
			<td>Relative</td>
			<td><?=$relative?></td>
		</tr>



	</table>	


</html>