<?php
session_start();
	

	$email = "";
	$message ="";

	if(isset($_SESSION["message"]))
	{
		echo "type : " .     $_SESSION["message"]["type"] . "</br>";
		echo " message : " . $_SESSION["message"]["message"];
		unset($_SESSION["message"]);
	}

	if(isset($_SESSION["contact"]))
	{
		$email =   $_SESSION["contact"]["email"];
		$message = $_SESSION["contact"]["message"];

	}
?>


<!doctype html>
<html>
	<head>
		<title>Contact</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<style>

			#succes{
				color:green;
			}

			#fail{
				color:red;
			}

		</style>

	</head>
		

	<body>
		<h1>Contacteer ons</h1>
				<p id="succes"></p>
				<p id="fail"></p>
		<form action="contact.php" method =  "post" id="contactForm">

			<ul>
				<li id="email">
					<label for="email">Email</label>
						<input  type="text" name="email" value="<?=$email?>">
				
				</li>
				<li id="text">
					<label for="text">message</label>
						<input  type="text" name="text" value="<?=$message?>">
					
				</li>
				<li id="checkBox">
					
					<input  type="checkBox" name="selfSend">Verstuur kopie naar mezelf
					
				</li>
				<li id="button">
					
					<input  type="submit" name="send">
				</li>

			</ul>


		</form>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	<script>

		$(document).ready(function(){
			$("#succes").hide();
			console.log("Document is ready");

				$("#contactForm").submit(function(){
					console.log("submit");
					var formData = $("#contactForm").serialize();
					console.log(formData);

					

						$.ajax({

									type: 'POST',
									url: 'contact-ajax.php',
									data: formData,
									success: function(data){

											console.log(data);
											var newData = JSON.parse(data);
											console.log(newData);

											if(newData["type"] == "succes")
											{
												$("#email").fadeOut("fast", function(){

													$("#text").fadeOut("fast", function(){

														$("#checkBox").fadeOut("fast", function(){

																$("#button").fadeOut("fast", function(){

																	$("#succes").append(newData["message"]).hide().fadeIn("slow")
												
																});

														});

														

													});


												});

													
												
												
													
											}

											else
											{
												$("#fail").append(newData["message"])
											}
									}

								})
						return false;
			

				});



		});

		</script>
		</body>
		


	




</html>