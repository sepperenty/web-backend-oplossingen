<?php 
	
	if(isset($_GET["query-content"]))
	{
		if($_GET["query-content"] == "")
		{
			header("location: http://oplossingen-web-backend.local/opdracht-mod_rewrite-blog/deel1.2/artikels/");
		}

		else
		{
			header("location: http://oplossingen-web-backend.local/opdracht-mod_rewrite-blog/deel1.2/artikels/zoeken/content/".$_GET["query-content"]."/");
		}
	}


	elseif (isset($_GET["query-date"])) 
	{
		if($_GET["query-date"] == "")
		{
			header("location: http://oplossingen-web-backend.local/opdracht-mod_rewrite-blog/deel1.2/artikels/");
		}
		else
			
		{

			header("location: http://oplossingen-web-backend.local/opdracht-mod_rewrite-blog/deel1.2/artikels/zoeken/date/".$_GET["query-date"]."/");
		}
	}


	else
	{
		header("location: http://oplossingen-web-backend.local/opdracht-mod_rewrite-blog/deel1.2/artikels/");
	}
 ?>