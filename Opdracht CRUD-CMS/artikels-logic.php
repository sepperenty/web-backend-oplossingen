<?php

session_start();

	if(isset($_COOKIE["login"]))
	{
		$userInformation = explode(',', $_COOKIE["login"]);
		$email =  $userInformation[0];
		$cookieString = $userInformation[1];
		$validationComplete = false;

		$db = new PDO('mysql:host=localhost;dbname=opdracht-crud-cms', 'root', 'root');
		$cookieCheck = "SELECT salt from users where email = :email";
		$cookieCheckStatement = $db->prepare($cookieCheck);
		$cookieCheckStatement->bindParam(":email", $userInformation[0]);
		$cookieCheckStatement->execute();

		$saltAr = array();

		while($row = $cookieCheckStatement->fetch(PDO::FETCH_ASSOC))
		{
					$saltAr[] = $row;
		}
		
		$salt = $saltAr[0]["salt"];

		$toCheckCookieString = openssl_digest($email . $salt, 'sha512');


		if($toCheckCookieString == $cookieString)
		{
			$validationComplete = true;
		}

		else
		{
			unset($_COOKIE["login"]);
			$_SESSION["notifications"]["type"] = "error";
			$_SESSION["notifications"]["message"] = "Something went wrong with your validation, please contact the webmaster";
		}

	}

	else
	{
		$_SESSION["notifications"]["type"] = "error";
		$_SESSION["notifications"]["message"] = "You are not logged in yet, please do";

		header("location: login-form.php");
	}

	
	if(isset($_GET["logout"]))
	{
		setcookie("login", null, -1);
		$_SESSION["notifications"]["type"] = "notifications";
		$_SESSION["notifications"]["message"] = "You are succesfully logged out, untill next time";
		header("location: login-form.php");
	}

	




?>