<?php
	

	function __autoload($filename)
	{
		include "classes/".$filename . ".php";
	}


	$pagina = new HTMLbuilder("header-partial.php", "body-partial.php", "footer-partial.php");

	

?>