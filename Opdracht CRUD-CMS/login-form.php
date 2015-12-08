
<?php

session_start();


$email = "";
$password = "";
		
	if(isset($_SESSION["login"]))
	{
		$email = $_SESSION["login"]["email"];
	}

	if(isset($_SESSION["notifications"]))
	{
		echo "type: " . $_SESSION["notifications"]["type"];
		echo " message : " . $_SESSION["notifications"]["message"];

	}

?>


<!doctype html>
<html>
<head>
	<title>log in</title>


<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Inloggen</h1>
	
	<form action ="login-process.php" method="post">

	<ul>
		<li>
			<label for="e-mail">e-mail</label></br>
			<input type="text" name="email" value="<?=$email?>">
		</li>
		<li>
			<label for="password">password</label></br>
			<input type="password" name="password" value="<?=$password?>">
		</li>
		<li>
			<input type="submit" name="login" value="inloggen">
		</li>
		<li>
			<p>Nog geen account ? maak er dan een aan op de <a href="registreer.php"> registratiepagina </a </p>
		</li>
	</ul>	


	</form>	


</body>

</html>