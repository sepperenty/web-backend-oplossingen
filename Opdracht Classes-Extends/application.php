<?php

function __autoload($className){
	include("classes/" . $className . ".php");
}
/*
__autoload("Animal");
__autoload("Lion");*/

$lion = new Animal("johan", "man", 10);
$cat = new Animal("bert", "vrouw", 50);
$dog = new Animal("Gerrit", "man", 24);
$simba = new Lion("lion", "Simba", "vrouw", 12);
$scar = new Lion("mountain lion", "scar", "man", 150);
$zeke = new Zebra("Leke", "man", 57421, "zebra");
$Brian = new Zebra("Bian", "vrouw", 5742, "zebra");

$lion->changeHealth(20);

?>

<!doctype html>
<html>
	<head>
		<title>Opdracht classes-extends</title>

	</head>

<body>

	<h1>Instanties van de classe Animal</h1>

	<p><?=$lion->getName()?> is van het geslacht <?=$lion->getGender()?> en heeft <?=$lion->getHealth()?> levenspunten (de special move is <?=$lion->doSpecialMove()?>)
		<p><?=$cat->getName()?> is van het geslacht <?=$cat->getGender()?> en heeft <?=$cat->getHealth()?> levenspunten (de special move is <?=$cat->doSpecialMove()?>)
	<p><?=$dog->getName()?> is van het geslacht <?=$dog->getGender()?> en heeft <?=$dog->getHealth()?> levenspunten (de special move is <?=$dog->doSpecialMove()?>)

	<h1>Instanties van de Lion class</h1>

	<p>De spcial move van <?=$simba->getName()?> is (soort: <?=$simba->getSpecies()?>) <?=$simba->doSpecialMove()?></p>
	<p>De spcial move van <?=$scar->getName()?> is (soort: <?=$scar->getSpecies()?>) <?=$scar->doSpecialMove()?></p>

	<h1>Instanteis van de Zebra class</h1>

	<p>De spcial move van <?=$zeke->getName()?> is (soort: <?=$zeke->getSpecies()?>) <?=$zeke->doSpecialMove()?></p>
	<p>De spcial move van <?=$Brian->getName()?> is (soort: <?=$Brian->getSpecies()?>) <?=$Brian->doSpecialMove()?></p>





</body>


</html>