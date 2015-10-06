<?php
	
$jaartal = 2004;

$toshow = "";



if(($jaartal % 4 == 0) && (($jaartal % 100 != 0 ) || ($jaartal % 400 == 0) )) 
{
	$toshow = "jaartal :" . $jaartal . " is een schrikkeljaar";
}

else
{
	$jaartal = "jaartal :" . $jaartal . " is geen schrikkeljaar";
}

?>


<!doctype html>
<html>

	<head>
		<title>
				opdracht-conditional-statements-if-else deel1
		</title>
	</head>
	<body>

		<?=$toshow?>


	</body>


</html>