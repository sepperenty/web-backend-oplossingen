<?php

session_start();


	if(isset($_POST["generatePw"]))
	{
		if(isset($_POST["email"]))
		{
			$_SESSION["registration"]["email"] = $_POST["email"];
		}

		$randomPassword = generatePassWord(10, true, true, true, true);

		$_SESSION["registration"]["password"] = $randomPassword;

		header("location: registreer.php");
	}

	if(isset($_POST["register"]))
	{
		$email = $_POST["email"];
		$password = $_POST["password"];

		$_SESSION["registration"]["email"] = $email;
		$_SESSION["registration"]["password"] = $password;

		$validEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

		if(!$validEmail)
		{
			$_SESSION["notifications"]["type"] = "error";
			$_SESSION["notifications"]["message"] = "Email was not valid, please use valid email";

			header("location: registreer.php");
		}

		else
		{
			if($password == "")
			{
				$_SESSION["notifications"]["type"] = "error";
				$_SESSION["notifications"]["message"] = "Your passwod was not valid, please use valid passWord";

				header("location: registreer.php");
			}

			else
			{
				
				try 
				{
					$db = new PDO('mysql:host=localhost;dbname=opdracht_file_upload', 'root', 'root');
					$emailQuery = "SELECT email FROM users WHERE email like :email";
					$emailStatement = $db->prepare($emailQuery);
					$emailStatement->bindParam(":email", $email);
					$emailStatement->execute();

					$emailArray = array();

					while($row = $emailStatement->fetch(PDO::FETCH_ASSOC))
					{
						$emailArray[] = $row;
					}

					if(!empty($emailArray))
					{
						$_SESSION["notifications"]["type"] = "error";
						$_SESSION["notifications"]["message"] = "You email already exists";
						header("location: registreer.php");
					}

					else
					{
						$randomSalt = uniqid(mt_rand(), true);
						$passwordConcatination = $password . $randomSalt;
						$hashed_pass= openssl_digest($passwordConcatination, 'sha512');

						$insertQuery = "INSERT into users (email, salt, hashed_password, last_login_time) 
													values(:email, :salt, :hashed_password, NOW())";
						$insertStatement = $db->prepare($insertQuery);
						$insertStatement->bindParam(":email", $email);
						$insertStatement->bindParam(":salt", $randomSalt);
						$insertStatement->bindParam(":hashed_password", $hashed_pass);
						$succes = $insertStatement->execute();

						if($succes)
						{

							$hashedEmailSalt = openssl_digest($email . $randomSalt, 'sha512');
							setcookie("login", $email . "," . $hashedEmailSalt, time()+2592000);
							unset($_SESSION["registration"]);
							header("location: dashboard.php");
						}

						else
						{
							$_SESSION["notifications"]["type"] = "error";
							$_SESSION["notifications"]["message"] = "problem with database insertion";

							header("location: registreer.php");
						}


					}

				}

				catch(PDOException $e)
				{
					$_SESSION["notifications"]["type"] = "databaseError";
					$_SESSION["notifications"]["message"] = "Problem with database link, please contact the webmaster";

					header("location: registreer.php");
				}
			}
		}




	}


	function generatePassWord($length, $uppercase = false, $lowercase = true, $special = false, $number = false)
	{
		$test = "";
		$passwordAr = array();

		if($uppercase == true)
		{
			$passwordAr[] = array("A", "B", "C", "D", "E", "F", "G", "H", "I","J", "K", "L", "M", "N", "O", "P","Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
		}

		if($lowercase == true)
		{
			$passwordAr[] = array("a", "b", "c", "d", "e", "f", "g", "h", "i","j", "k", "l", "m", "n", "o", "p","q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
		}

		if($special == true)
		{
			$passwordAr[]= array('+','-','*','/','$','%','@','#','_');
		}
		
		if($number == true)
		{
			$passwordAr[]= array(0,1,2,3,4,5,6,7,8,9);
		}

		for($i = 0; $i < $length; $i++)
		{
			$rand = rand(0,count($passwordAr)-1);
			$randFigure = rand(0, count($passwordAr[$rand])-1);

			$test .= $passwordAr[$rand][$randFigure];
		}

		return $test;

	}






?>