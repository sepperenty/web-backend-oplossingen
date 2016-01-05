
<?php 
	
	session_start();
	$expression ="";
	$text="";
	$result = false;
	$searchArray = array();


	if(isset($_POST["send"]))
	{
		$_SESSION["expression"]["code"] = $_POST["expression"];
		$_SESSION["expression"]["text"] =$_POST["text"];
		$regEx = '/'.$_POST["expression"] .'/';
		$searchString = $_POST["text"];

		$result = preg_match($regEx, $searchString);
		$result1 = preg_match_all($regEx, $searchString, $searchArray);
		$result2 = preg_replace($regEx, "#", $searchString);

	}

		if(isset($_SESSION["expression"]))
	{
		$expression = $_SESSION["expression"]["code"];
		$text = $_SESSION["expression"]["text"];
	}

/*
	$regEx = '/(jennifer|jen|jenny)\s\w+/'; //jennifer+achternaam
	$regEx2 = '/\w{5,20}@\w{2,10}\.(com|be|nl)/'; //email adres met .com/.be/.nl

	$searchString = "jennifer@telenet.be";
	
	echo preg_match($regEx2, $searchString);*/


	//\w{5,20}@\w{2,10}\.(com|be|nl) //mail validation
	//[A-Za-z]+(straat|laan)\s[0-9]+ //straat validation

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>regextest</title>
	<style>
		ul{
			list-style-type: none;
		}

		.exp{
			width: 90%;
			font-size: 20px;
			height: 22px;
		}
	</style>
</head>
<body>

	<form action ="redExTest.php" method="post">
		<ul>
			<li>
				<label for="text"> Regular Expression</label>	
			</li>
			<li>
				<input class="exp" type="text" name="expression" value="<?=$expression?>">
			</li>
			<li>
				<label for="text">De string</label>
			</li>
			<li>
				<textarea name="text" cols="30" rows="10"><?=$text?></textarea>
			</li>
			<li>
				<input type="submit" name="send">
			</li>
		</ul>	
		
	</form>
<!-- 	<p>There are 3 methods i will use</p> -->
<h2>The preg_match_all method</h2>
	<ul>
		<!-- <li>Method one : The preg_match method : <?=$result?></li>
		<li> <p\></li> -->

			<?php foreach ($searchArray as $key => $value):?>
				<?php foreach ($value as $other => $next):?>
				<li><?=$next?></li>
			<?php endforeach?>
			<?php endforeach?>
		<li> <p\></li>
		<!-- <li>Method two : The preg_replace method : <?=$result2?></li> -->
	</ul>
	

</body>

</html>