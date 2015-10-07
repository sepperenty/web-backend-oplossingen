<?php
		
		$artikkels = array();

		//$artikkels[0] = array("titel" => "Mensen vormen vredesteken in Central Park
//","datum" => "09 oktober 2015", "inhoud" => "Zo’n 2.000 mensen hebben dinsdag in Central Park in New York het vredesteken gevormd. Het initiatief ging //uit van Yoko Ono, de weduwe van de vermoorde Beatle John Lennon, die deze week 75 jaar zou geworden zijn.", "afbeelding"=>"<img src='img/vredesTeken.jpg'>//","afbeeldingBeschrijving"=>"In deze foto zie je central park met een vredessteken");

		$artikkels[0] = array();
			$artikkels[0]["titel"] = "Mensen vormen vredesteken in Central Park";
			$artikkels[0]["datum"] = "09 oktober 2015";
			$artikkels[0]["inhoud"] = "<p>Zo’n 2.000 mensen hebben dinsdag in Central Park in New York het vredesteken gevormd. Het initiatief ging uit van Yoko Ono, de weduwe van de vermoorde Beatle John Lennon, die deze week 75 jaar zou geworden zijn. Er kwamen alle soorten mensen opdagen, oud en jong, inclusief kinderen. Er werd van de gelegenheid gebruikgemaakt om de oorlog in Syrië te veroordelen.</p> Mensen droegen bordjes met ‘Make love, not war’. Er was ook muziek te horen van Lennon, onder meer ‘Give Peace a Chance’.

Yoko Ono wilde met het initiatief een nieuw record neerzetten, van grootste menselijke ketting ooit, maar daar slaagde ze niet in. Daarvoor zou ze 5.000 mensen op de been hebben moeten brengen, luidt het bij het Guinness World Records. ‘Dit is het beste verjaardagscadeau ooit’, speechte de Beatles-weduwe.

John Lennon werd op 9 oktober 1940 geboren in Liverpool. Hij was een bekend pacifist, maar werd op 8 december 1980 vermoord voor de deur van zijn appartement aan Central Park.";
			$artikkels[0]["afbeelding"] = "<img src='img/vredesTeken.jpg'>";
			$artikkels[0]["afbeeldingBeschrijving"] = "Op deze foto zie je central park met een vredessteken";

		$artikkels[1] = array();
			$artikkels[1]["titel"] = "Schietpartij Sydney: vier mannen gearresteerd";
			$artikkels[1]["datum"] = "7 oktober 2015";
			$artikkels[1]["inhoud"] = "<p>In Sydney zijn vier mensen aangehouden in verband met de dodelijke schietpartij vrijdag aan een politiekantoor. Die daad was het werk van een 15-jarige geradicaliseerde moslim Zo’n 200 agenten van de Australische politie hebben huiszoekingen uitgevoerd op vier plaatsen in het westen van Sydney, op zoek naar medeplichtigen van de schietpartij. Na de huiszoekingen zijn minstens vier mensen aangehouden, tussen 16 en 22 jaar.</p>

Vrijdag werd een medewerker van de politie in Parramatta, ten westen van Sydney, op straat in het hoofd geschoten. De dader werd daarop neergeschoten door agenten. Volgens de premier ging het om een terroristische daad.

De politie gelooft niet dat de schutter alleen handelde en zegt dat sommige van de gearresteerde verdachten gekend waren door de politie.

Intussen is een onderzoek gestart naar de motieven van de 15-jarige schutter. Hij wordt omschreven als een rustige jongen die op school en in de moskee aangesloten was bij islamitische gebedsgroepen. Dinsdag pakten de speurders al een klasgenoot op van de schutter, die op Facebook zijn sympathie had betuigd en zou opgeroepen hebben om nog meer aanslagen op agenten te plegen.

Volgens Australische media is woensdag nog een andere schoolgenoot van de dader opgepakt. Een van de mannen zou ook gelinkt worden aan terreurbeweging Islamitische Staat (IS)..";
			$artikkels[1]["afbeelding"] = "<img src='img/schietPartij.jpg'>";
			$artikkels[1]["afbeeldingBeschrijving"] = "Op deze foto zie je 1 van de daders die gearresteerd wordt";

		$artikkels[2] = array();
			$artikkels[2]["titel"] = "Natuurgebied Zwin wordt afgesloten met zanddam";
			$artikkels[2]["datum"] = "8 oktober 2015";
			$artikkels[2]["inhoud"] = "<p>Voor de kust van Zeebrugge is dinsdagochtend een gastanker in aanvaring gekomen met een vrachtschip. Het schip is gestrand op een zandbank, de twaalf opvarenden zijn allemaal gered. Er waren geen gevaarlijke stoffen aan boord van het schip, maar er lekt wel olie. Ondanks de vaststelling dat de olie niet naar de Belgische kust drijft, wordt natuurgebied het Zwin in Knokke-Heist afgesloten om schade te voorkomen. Er is vannacht een zanddam gebouwd.";
			$artikkels[2]["afbeelding"] = "<img src='img/zandDam.jpg'></p>";
			$artikkels[2]["afbeeldingBeschrijving"] = "Dit is een foto van de zandbank";
//""

	




		//$artikkels[1] = array("Schietpartij Sydney: vier mannen gearresteerd
//", "In Sydney zijn vier mensen aangehouden in verband met de dodelijke schietpartij vrijdag aan een politiekantoor. Die daad was het werk van een 15-jarige geradicaliseerde moslim.", "<img src='img/schietPartij.jpg'>", "In deze foto zie je 1 van de daders die gearresteerd wordt");

//		$artikkels[2] = array("Natuurgebied Zwin wordt afgesloten met zanddam
//", "Voor de kust van Zeebrugge is dinsdagochtend een gastanker in aanvaring gekomen met een vrachtschip. Het schip is gestrand op een zandbank, de twaalf opvarenden zijn allemaal gered. Er waren geen gevaarlijke stoffen aan boord van het schip, maar er lekt wel olie. Ondanks de vaststelling dat de olie niet naar de Belgische kust drijft, wordt natuurgebied het Zwin in Knokke-Heist afgesloten om schade te voorkomen. Er is vannacht een zanddam gebouwd.
//", "<img src='img/zandDam.jpg'>", "Dit is een foto van de zandbank");
$eenArtikel = false;
$geenArtikel = false;


if(isset($_GET["id"]))
{

	$key = $_GET["id"];

		// Controleren of de opgevraagde key (=id) bestaat in de array $artikels
		if ( array_key_exists( $key , $artikkels ) )
		{
			$artikkels 	=	array( $artikkels[$key] );
			$eenArtikel	=	true;
		}
		else
		{
			$geenArtikel	=	true;
		}		
		
}

if(isset($_GET["btnZoek"]))
{
	if(isset($_GET["txtZoek"]))
	{
		//echo $_GET["txtZoek"];
		$teZoeken = $_GET["txtZoek"];
		$newArray = array();

		foreach ($artikkels as $key => $value) 

		{
			$arr = explode(" ", $value["inhoud"]);

			if(in_array($teZoeken, $arr))
			{
				echo " het woord is gevonden in artikel " . $key;
				
				$newArray[] = $artikkels[$key];
				
			}

		}

		$artikkels = $newArray;
	}
	
}
else
{
	echo "niets gevonden";
}




?>






<!doctype html>

<html>

	<head>

		<?php if($eenArtikel):?>
			<title>
					<?php 
						
						$title = $artikkels[0]["titel"];
							echo $title;

					?>
			</title>
		<?php else:?>
					<title>Opdracht get deel 1</title>
		<?php endif?>

		<style>

		.artikkel {
			width: 32%;
			float: left;
			padding: 10px;
			min-width: 200px;

			}
		.inhoud{
			
			background-color: #EEE	;
			padding: 20px;
			font-family: sans-serif;
			color: #454545;
			height: 600px;
				}

		.title{
			height: 50px;
		}

		.text{
			height:20px;
		}
		a{
			height: 30px;
		}

		.artikkel img{
			max-width: 100%;
			margin-top: 10px;	

				}

		.artikkels{
			width: 85%;
			margin-left: auto;
			margin-right: auto;
			overflow: auto;

			
		}


		</style>
	</head>
	<body>

		<h1>Opdracht get deel 1</h1>

		

   		 <form action="deel1.php" method="get">
			<input type="text" name="txtZoek">
			<input type="submit" name="btnZoek">
		</form>


		<div class="artikkels">

				<?php foreach ($artikkels as $key => $value):?>
								
									
										<?php if(!$eenArtikel):?>
										<div class="artikkel">
										<div class="inhoud">
													<h3 class="title">
													<?php echo $value["titel"]; ?>
													</h3>
													<p class="date">
													<?php echo $value["datum"]; ?>
													</p>
													<p class="text">
													<?php 
														echo $rest = substr( $value["inhoud"], 0, 50) ;?>...
													</p>

													<a href="deel1.php?id=<?=$key?>"> Lees Meer</a>

													<?php echo $value["afbeelding"]; ?>
													<p class="beschrijving">
													<?php echo $value["afbeeldingBeschrijving"]; ?>
													</p>
											</div>
											</div>
										<?php elseif($eenArtikel):?>

													<h3 class="title">
													<?php echo $value["titel"]; ?>
													</h3>
													<p class="date">
													<?php echo $value["datum"]; ?>
													</p>
													<p >
													<?php 
														echo $value["inhoud"];?>
													</p>

													

													<?php echo $value["afbeelding"]; ?>
													<p class="beschrijving">
													<?php echo $value["afbeeldingBeschrijving"]; ?>
													</p>


											<?php endif?>

											
													
								

				<?php endforeach ?>
		</div>
			

		<p></p>

	</body>


</html>