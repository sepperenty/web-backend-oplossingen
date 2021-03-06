<?php

session_start();

	
	$admin = "rentyseppe@gmail.com";

	if(isset($_POST["email"]))
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
            $selfSend = true;
            if(isset($_POST["selfSend"]))
            {
                if(mail($email, "kopie contact message", $text))
                {
                  $selfSend = true;
                }

                else
                {
                  $selfSend = false;
                }
            }

            if((mail($admin, "contact Message from", $text)) && ($selfSend == true))
            {

                if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
                {
                    
                    $ajaxData["type"] = "succes";
                    $ajaxData["message"] = "Succesvol veronden";
                    unset($_SESSION["contact"]);
                    echo json_encode($ajaxData);
                }

             
                else
                {

                  $_SESSION["message"]["type"] = "succes";
                  $_SESSION["message"]["message"] = "contact verzonden";
                  unset($_SESSION["contact"]);
                  header("location: contact-form.php");
                }
            }

            else
            {

               if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
                {
                  $ajaxData["type"] = "failed";
                  $ajaxData["message"] = "Niet veronden";
                  echo json_encode($ajaxData);

                }

                else
                {


                    $_SESSION["message"]["type"] = "failed";
                    $_SESSION["message"]["message"] = "verzenden mislukt";
                    header("location: contact-form.php");
                }
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