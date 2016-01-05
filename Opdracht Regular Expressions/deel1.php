
<?php 
	session_start();
	$result = "";
	$exp = "";
	$str = "";

	

	if(isset($_POST["send"]))
	{
		$replaceString = "#";
		if(($_POST["expression"] != "") && ($_POST["string"] != ""))
		{	
			$_SESSION["regex"]["expression"] = $_POST["expression"];
			$_SESSION["regex"]["string"] = $_POST["string"];
			$expression = $_POST["expression"];
			$result = htmlspecialchars(preg_replace('/' . $expression . '/', $replaceString, $_POST["string"]));
		}
	}

	if(isset($_SESSION["regex"]))
	{
		$exp = $_SESSION["regex"]["expression"];
		$str = $_SESSION["regex"]["string"];
	}


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
			ul{
				list-style-type: none;
			}
		ul{
			list-style-type: none;
		}

		.exp{
			width: 90%;
			font-size: 20px;
			height: 22px;
		}
	</style>
</head>
<body>
		<h1>Regular Expression</h1>
		<form action="deel1.php" method="post">
		<ul>
			<li><label for="Regular expression">Regular expression</label></li>
			<li><input type="text" name="expression" id="" value="<?=$exp?>" class="exp"></li>
			<li><label for="String">String</label></li>
			<li><textarea name="string" id="" cols="30" rows="10"><?=$str?></textarea></li>
			<li><input type="submit" name="send"></li>
		</ul>
		</form>
		<p><?=$result ?></p>
		
		<h4>Oplossingen Deel 2</h4>
		<ul>
			<li>[a-dA-Du-zU-Z]</li>
			<li>color|colour</li>
			<li>1\d{3}</li>
			<li>\d{2}[\.|\-|\/]\d{2}[\.|\-|\/]\d{4}</li>
		</ul>
</body>
</html>