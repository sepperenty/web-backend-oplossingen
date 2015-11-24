<?php
$message = "";
session_start();

function __autoload($className){

	include("classes/" . $className . ".php");

}
	$alltodos = array();
		try
		{
			if( isset($_POST[ "validate"] ) )
			{
				if(isset($_POST["instruction"]))
				{
					if($_POST["instruction"] != "")
					{
						$_SESSION["alInstructions"][] = $_POST["instruction"];
					}

					else
					{
						throw new Exception("no instruction found");
					}

				}

							}
		}
		catch( Exception $e )
		{
			if($e->getMessage() == "no instruction found")
			{
				$message = "please write an instruction";
				echo $message;
			}
		}

		if(isset($_GET["delete"])){
			session_destroy();

			header("application.php");
	
		}

		if(isset($_GET["makeDone"]))
		{
			$_SESSION["allDoneInstructions"][] = $_SESSION["alInstructions"][$_GET["makeDone"]];

			unset($_SESSION["alInstructions"][$_GET["makeDone"]]);
		}

		if(isset($_GET["makeUnDone"]))
		{
			$_SESSION["alInstructions"][] = $_SESSION["allDoneInstructions"][$_GET["makeUnDone"]];

			unset($_SESSION["allDoneInstructions"][$_GET["makeUnDone"]]);
		}

		if(isset($_GET["deleteDone"]))
		{
			unset($_SESSION["alInstructions"][$_GET["deleteDone"]]);
		}

		if(isset($_GET["deleteUnDone"]))
		{
			unset($_SESSION["allDoneInstructions"][$_GET["deleteUnDone"]]);
		}
?>

<!doctype html>

<html>

	<head>
		<title>TOTDO lijst</title>
	</head>
	<body>
		<h1>TODO</h1>

			<?php if(isset($_SESSION["alInstructions"])):?>

				<?php if($_SESSION["alInstructions"] != null):?>

					<?php foreach ($_SESSION["alInstructions"] as $key => $value):?>
						<a href="application.php?deleteDone=<?=$key?>">delete</a>
						<?=$value?>
						<a href="application.php?makeDone=<?=$key?>">make done</a>
						<p>
					<?php endforeach ?>
				<?php else:?>
				<p>Schouderklopje, alles is gedaan!</p>
				<?php endif?>	

			<?php else:?>

				<p>Je hebt nog geen TODO's toegevoegd. Zo weinig werk of meesterplanner?</p>

			<?php endif?>




		<h1>DONE</h1>

		<?php if(isset($_SESSION["allDoneInstructions"])):?>

		<?php foreach ($_SESSION["allDoneInstructions"] as $key => $value):?>

		<a href="application.php?deleteUnDone=<?=$key?>">delete</a>
		<?=$value?>
		<a href="application.php?makeUnDone=<?=$key?>">make undone</a>
		<p>

		<?php endforeach?>
		<?php endif?>

		<h2>write your own todo instruction</h2>
	

		<form action="application.php", method="POST">

			<input type="text" name="instruction">
			<input type="submit" name="validate"> 

		</form>

		<a href="application.php?delete">delete sessions</a>

	</body>

</html>