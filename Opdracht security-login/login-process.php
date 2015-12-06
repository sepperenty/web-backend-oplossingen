<?php
	
	session_start();

	if(isset($_POST["login"]))
	{
		if((isset($_POST["email"])) && ($_POST["email"] != ""))
		{
			$_SESSION["login"]["email"] = $_POST["email"];
			$_SESSION["login"]["password"] = $_POST["password"];
			$email = $_POST["email"];
			$password = $_POST["password"];


			try{

				$db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', 'root');

				$checkQuery = "SELECT email from users where email = :email";
				$checkQueryStatement = $db->prepare($checkQuery);
				$checkQueryStatement->bindParam(":email", $email);
				$checkQueryStatement->execute();

				$emailAr = array();

				while($row = $checkQueryStatement->fetch(PDO::FETCH_ASSOC))
				{
						$emailAr[] = $row;
				}
				
				if(empty($emailAr))
				{
					$_SESSION["notifications"]["type"] = "error";
					$_SESSION["notifications"]["message"] = "your email does not have an account yet";
					header("location: login-form.php");
				}

				else
				{
					$checkPwQuery = "SELECT hashed_password, salt from users where email = :email";
					$checkPwQueryStatement = $db->prepare($checkPwQuery);
					$checkPwQueryStatement->bindParam(":email", $email);
					$checkPwQueryStatement->execute();

					$passwordSaltAr = array();

					while($row = $checkPwQueryStatement->fetch(PDO::FETCH_ASSOC))
					{
						$passwordSaltAr[] = $row;
					}

					$passwordToCheck = openssl_digest($password . $passwordSaltAr[0]["salt"], 'sha512');
					$originalPassword = $passwordSaltAr[0]["hashed_password"];

					if($passwordToCheck == $originalPassword)
					{
						unset($_SESSION["login"]);
						$hashedEmailSalt = openssl_digest($email . $passwordSaltAr[0]["salt"], 'sha512');
						setcookie("login", $email . "," . $hashedEmailSalt);
						header("location: dashboard.php");
					}

					else
					{
						$_SESSION["notifications"]["type"] = "error";
						$_SESSION["notifications"]["message"] = "Wrong password";
						header("location: login-form.php");
					}

				}


			}

			catch(PDOException $e)
			{
				$_SESSION["notifications"]["type"] = "database error";
				$_SESSION["notifications"]["message"] = $e->getMessage();
				header("location: login-form.php");

			}
		}

		else
		{
			$_SESSION["notifications"]["type"] = "error";
			$_SESSION["notifications"]["message"] = "Please write your email adress.";
			header("location: login-form.php");
		}
	}


?>