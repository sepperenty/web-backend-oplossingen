<?php

session_start();
	$email = "";
	$password = "";

	if(isset($_SESSION["registration"]))
	{
		$email = $_SESSION["registration"]["email"];
		$password = $_SESSION["registration"]["password"];

	}

	if(isset($_SESSION["notifications"]))
	{
		echo "type: " . $_SESSION["notifications"]["type"];
		echo " Message: " . $_SESSION["notifications"]["message"];
	}



?>



<!doctype html>
<html>

<head>
	<title>Registreer</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<h1>Registreer</h1>


		<form action="registratie-process.php" method="post">
			<ul>
				<li>
					<label for="email">e'mail</label></br>
					<input type="text" name="email" <?php if($email != ""):?> value="<?=$email?>" <?php endif ?>>
				</li>
				<li>
					<label for="password">password</label></br>
					<input name="password" <?php if($password != ""):?>type="text" value="<?=$password?>"<?php else:?> type="password" <?php endif ?>>
					<input type="submit" name="generatePw" value="Generate password"></br>
				</li>
				<li>
					<input type="submit" name="register" value="Register">
				</li>

			</ul>
		</form>

</body>



</html>