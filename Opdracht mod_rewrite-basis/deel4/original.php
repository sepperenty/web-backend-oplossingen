<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Original</title>
</head>
<body>
<h1>Original</h1>

	<?php 

		if(isset($_GET["user"]))
		{
			echo "<p> user = ".$_GET["user"]."</p>";
		}

		if(isset($_GET["role"]))
		{
			echo "<p> role = ".$_GET["role"]."</p>";
		}
	 ?>

</body>
</html>