	<?php

	session_start();

	function __autoload($filename)
	{
		include "classes/".$filename . ".php";
	}

	$dataBase = new dataBase();

	if(isset($_POST["changeInfo"]))
	{
		$newEmail = $_POST["email"];
		$id = $_POST["id"];

		if(($_POST["email"] != "") && ($_FILES["profilePicture"]["name"] != ""))
		{
			

			if(($_FILES["profilePicture"]["type"] == "image/png")||
			   ($_FILES["profilePicture"]["type"] == "image/jpeg")||
			   ($_FILES["profilePicture"]["type"] == "image/gif"))
			{
				if($_FILES["profilePicture"]["size"] <= 2000000)
				{
					$newPictureName = newName($_FILES["profilePicture"]["name"]);

					while ( file_exists("img\\" . $newPictureName ) )
					{
					$newPictureName = newName($_FILES["profilePicture"]["name"]);
					}

					 move_uploaded_file( $_FILES[ 'profilePicture' ][ 'tmp_name' ], "img\\" . $newPictureName );

					 $test = $dataBase->update("users", "email", "'".$newEmail."'", "profile_picture", "'".$newPictureName."'", "id", "'".$id."'");
					 $salt = $dataBase->getRow("salt", "users", true, "'" . $id . "'" , "id");
					 $actualSalt = $salt[0]["salt"];
					 $hash = openssl_digest($newEmail . $actualSalt, 'sha512');
					 var_dump($test);
					 setcookie("login", $newEmail . "," . $hash, time()+2592000);
					 header("location: gegevens-wijzigen-form.php");
				
				}

				else
				{
					
					$_SESSION["notifications"]["type"] = "error";
				 	$_SESSION["notifications"]["message"] = "File is too big";
				 	header("location: gegevens-wijzigen-form.php");
				}

			}

			else
			{
				$_SESSION["notifications"]["type"] = "error";
			 	$_SESSION["notifications"]["message"] = "File is wrong type";
			 	header("location: gegevens-wijzigen-form.php");
			 	
			}

			
		}

		else
		{

				$_SESSION["notifications"]["type"] = "error";
			 	$_SESSION["notifications"]["message"] = "Fill both textboces";
			 	header("location: gegevens-wijzigen-form.php");
		}

	
	}


	function newName($originalName)
	{
		$result = time() . "_" . $originalName;
		return $result;
	}

	?>