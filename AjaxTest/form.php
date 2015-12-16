<?php

session_start();

	if(isset($_SESSION["message"]))
	{
		echo $_SESSION["message"];
		unset($_SESSION["message"]);
	}



?>



<!doctype html>
<html>



	<head><title>Ajax Test</title>

		<style>
			 #succes{
			 	color:green;
			 }

			 #failed{
			 	color:red;
			 }


		</style>


	</head>


	<body>
		<div id="succes"></div>
		<div id="failed"></div>
		<h1>Geef een getal van 1 tot 10</h1>
		<form method ="post" id="formName">


			<input type="text" name="nummer">
			<input type="submit" name="sendName">


		</form>	

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		

		<script>
			$("document").ready(function(){
				console.log("ready");

				$("#formName").submit(function(){

						var formData = $("#formName").serialize();
						console.log(formData);

						$.ajax({

							type: 'POST',
							url: 'process.php',
							data: formData,
							success: function(data){

								var newData = JSON.parse(data);
								if(newData["type"] == "gegeven")
								{
									$("#succes").append(newData["message"]);
									console.log(newData["type"]);
								}

								else
								{
									$("#failed").append(newData["message"]);
								}

							}

						})

						return false;
				});

			});


		</script>




	</body>






</html>