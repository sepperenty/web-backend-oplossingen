
<?php

	$password = "azerty";
	$username = "seppe";
	$message = "";
	
	if(isset($_POST["validate"]))
	{
		$tempUserName = "";
		$tempPassWord = "";

		if(isset($_POST["userName"]))
		{
			$tempUserName = $_POST["userName"];
		}

		if(isset($_POST["passWord"]))
		{
			$tempPassWord = $_POST["passWord"];
		}


		if(($tempPassWord == $password) && ($tempUserName == $username))
		{
			$message = "Welkom";
		}

		else
		{
			$message = "Er ging iets mis bij het inloggen, probeer opnieuw";
		}

	}

?>



<!doctype html>

<html>

	<head>
		<title>
				opdracht post
		</title>
	</head>
	<body>

		<h1>opdracht Post</h1>

		<form action="deel1.php" method="post">
			<input type="text" name ="userName" placeholder="gebruikersnaam"><br><p></p>
			<input type="password" name ="passWord" placeholder="passwoord"><br><p></p>
			<input type="submit" name="validate">
			<?=$message?>

		</form>
		


	</body>


</html>