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

	$header = include 'vieuw/header-partial.html';

	if(isset($_GET["leesMeer"]))
	{
		$key = $_GET["leesMeer"];
		$body = include 'vieuw/1artikel-partial.html';
	}
	else
	{
		$body = include 'vieuw/body-partial.html';
	}
	
	$footer = include 'vieuw/footer-partial.html';

	echo $header;
	echo $body;
	echo $footer;
?>

