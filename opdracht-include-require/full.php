<?php
	$artikels[0]["title"] = "Titel artikel 1";
	$artikels[0]["text"] = "text artikel 1";
	$artikels[0]["tags"] = "tags artikel 1";

	$artikels[1]["title"] = "Titel artikel 2";
	$artikels[1]["text"] = "text artikel 2";
	$artikels[1]["tags"] = "tags artikel 2";

	$artikels[2]["title"] = "Titel artikel 3";
	$artikels[2]["text"] = "text artikel 3";
	$artikels[2]["tags"] = "tags artikel 3";
	

?>



<!doctype html>
<html>
	<head>
			<title>Dit is een include/require oefening</title>
	</head>	
	<style>
		body{
			margin: 0px;
		}

		h1{
			display: block;
			width: 100%;
			position: fixed;
			height: 70px;
			background-color: grey;
			color: white;
			font-family: sans-serif;
			font-size: 30px;
			margin: 0;
			text-align: center;
		}

		header{
			top: 0px;
		}

		footer{
			position: fixed;
			bottom: 0px;
			background-color: orange;
			width: 100%;
			text-align: center;
			color: white;
			font-size: 30px;
			font-family: inherit;

		}

		.artikels{
			width: 1320px;
			margin-right: auto;
			margin-left: auto;
			height: 400px;
			top: 150px;
			position: relative;
		}

		.artikel{
		
			width: 400px;
			float: left;
			padding: 5px;
			margin:20px;
			background-color: red;
			-webkit-box-sizing: border-box; 
			-moz-box-sizing: border-box;    
			box-sizing: border-box;    
		}


	</style>

	<header>
			<h1> Dit is een include-require oefening</h1>
	</header>

	<body>
		<div class="artikels">

			<?php foreach ($artikels as $key => $value):?>

			<div class="artikel">
					<h2><?=$value["title"]?></h2>
					<p><?=$value["text"]?></p>
					<p><?=$value["tags"]?></p>
			</div>


			<?php endforeach ?>
		</div>


	</body>


	<footer>
			<p>Dit is de footer</p>
	</footer>


</html>