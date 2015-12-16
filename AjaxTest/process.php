<?php

session_start();
	
	/*if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
					
*/
$winnendeNummers = array(5,18,29,78,99);



		
			if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
			{

				$ajaxMessage = array();

				if(isset($_POST["nummer"]))
				{
					$ajaxMessage["type"] = "gegeven";

					$nummer = $_POST["nummer"];

					$gewonnen = false;

					if(in_array($nummer, $winnendeNummers))
					{
						$gewonnen = true;
					}

					if($gewonnen)
					{
						$ajaxMessage["message"] = "gewonnen";
					}

				
				}

				else
				{
					$ajaxMessage["type"] = "Niet Gegeven";
					$ajaxMessage["message"] = "Geen nummer in gegeven";					

				}
				$jsonData = json_encode($ajaxMessage);

				echo $jsonData;

			}

			else
			{
				$_SESSION["message"] = "failed";
				header("location; form.php");

			}
		

?>