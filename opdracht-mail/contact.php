<?php

session_start();

	
	$admin = "rentyseppe@gmail.com";

	if(isset($_POST["send"]))
	{
		$_SESSION["contact"]["email"]   = $_POST["email"];
		$_SESSION["contact"]["message"] = $_POST["text"];


		if(($_POST["email"] != "") && ($_POST["text"] != ""))
		{
			$email = $_POST["email"];
			$text  = $_POST["text"];
			try
  			{

  				$db = new PDO('mysql:host=localhost;dbname=mailopdracht', 'root', 'root');
  				$insertQuery = "INSERT into contact_messages(email, message, time_sent)values(:email, :message, :time)";
  				$insertStatement = $db->prepare($insertQuery);
  				$insertStatement->bindParam(":email", $email);
  				$insertStatement->bindParam(":message", $text);
  			
				$date = date("Y-m-d h:i:sa");
  				$insertStatement->bindParam(":time",$date);
  				$succes = $insertStatement->execute();

	  				
  				if($succes)
  				{
  					if(isset($_POST["selfSend"]))
  					{
  						mail($email, "kopie contact message", $text);
  					}

  					if(mail($admin, "contact Message from", $text))
  					{

              $_SESSION["message"]["type"] = "succes";
              $_SESSION["message"]["message"] = "contact verzonden";
  					header("location: contact-form.php");
  					}

  					else
  					{
  						$_SESSION["message"]["type"] = "failed";
	  				$_SESSION["message"]["message"] = "verzenden mislukt";
  					header("location: contact-form.php");
  					}
  				}

  				else
  				{

	  				$_SESSION["message"]["type"] = "failed";
	  				$_SESSION["message"]["message"] = "Niet aan database toegevoegd";
	  				header("location: contact-form.php");
  				}


  			}

  			catch(PDOException $e)
  			{
  				$_SESSION["message"]["type"] = "dateBase Error";
  				$_SESSION["message"]["message"] = "failed to connect to database";
  				header("location: contact-form.php");
  			}
			
		}

		else
		{
			$_SESSION["message"]["type"]= "Error";
			$_SESSION["message"]["message"] = "Fill in both TextBoxes";
			header("location: contact-form.php");
		}
	}



?>