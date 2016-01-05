

<?php 
	
	function __autoload($filename)
	{
		include "classes/".$filename . ".php";
	}


	$class="";


	if(isset($_GET["controller"]))
	{
		echo "<p> controller : " . $_GET["controller"] . "</p>";
		$class=$_GET["controller"];
	}

	$controller = new $class;

	if(isset($_GET["method"]))
	{
		echo "<p> method : " . $_GET["method"] . "</p>";
		$controller->$_GET["method"]();
	}

	if(isset($_GET["id"]))
	{
		echo "<p> id : " . $_GET["id"] . "</p>";
	}

	

	
	
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
</head>
<body>

	<h1>Index</h1>

	
</body>
</html>