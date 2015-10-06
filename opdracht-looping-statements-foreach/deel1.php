<?php
		
		$text = file_get_contents("text-file.txt");
		$splitText = str_split($text);


	//	$textChars = array();
	//	foreach ($splitText as $char) {
	//		$textChars[]=$char;
	//	}
	//var_dump($textChars);

		rsort($splitText);
		$reversed = array_reverse($splitText);
		//var_dump($reversed);


		$newArray = array();

		foreach ($reversed as $value)
		{
			if(isset($newArray[$value]))
			{
				$newArray[$value]++;
			}
			else
			{
				//$newArray[] = $value;

				$newArray[$value] = 1;
			}
		}

		
?>



<!doctype html>

<html>

	<head>
		<title>
				opdracht-looping statements foreaxh deel 1
		</title>
	</head>
	<body>

		<h1>opdracht-looping statements foreach deel 1</h1>
		

		<?=var_dump($newArray)?>

	</body>


</html>