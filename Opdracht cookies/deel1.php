<?php
	
	$file = file("auth.txt");
	$fileDev = explode(",", $file[0]);
	$message = "";
	/*echo $fileDev[0];
	echo $fileDev[1];
	*/
	

	/*Validate after button click*/
	if(isset($_POST["validate"]))
	{

		if(isset($_POST["username"]))
		{
			if(isset($_POST["password"]))
			{
					if( ($_POST["username"] ==  $fileDev[0]) && ($_POST["password"] == $fileDev[1]) )
					{
						$message = "Seccesvol ingelogd";

						if(isset($_POST["onthouden"]))
						{
							setcookie("ingelogd", true, time() + 2592000);
							header( 'location: deel1.php' );
						}
						else
						{
							setcookie("ingelogd", true);
							header( 'location: deel1.php' );
						}

					}

					else{
						$message = "Uw username en of passwoord is fout";
					}
			}
		}

		else{
			$message = "first give your username";
		}
	}

	/*Check if already logged in*/

	if(isset($_COOKIE["ingelogd"]))
	{
		$message = "hallo " . $fileDev[0] . " fijn dat je er weer bij bent";
	}


	/* logout after logout click*/

	if(isset($_GET["logout"]))
	{
		setcookie("ingelogd", true, time() -1);
		header( 'location: deel1.php' );
	}

?>


<!doctype html>

<html>

	<head>
		<title>
				opdracht cookies deel1
		</title>
	</head>
	<body>

		<h1>Inloggen</h1>
		<?php if(!isset($_COOKIE["ingelogd"])):?>
					<form action ="deel1.php" method="post">
					<input type="text" name ="username"><p>
					<input type="password" name ="password"><p>
					<input type="checkbox" name="onthouden" value="Mij onthouden">Mij onthouden<p>
					<input type="submit" name="validate" value ="log in">

					</form>	
					<?=$message?>
		<?php else:?>	
		<p> <?=$message?>  </p>
		<a href="deel1.php?logout">Log out</a>
	<?php endif ?>

	</body>


</html>