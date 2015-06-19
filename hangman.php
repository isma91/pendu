#!/usr/bin/php
<?php

function readInput ($str = "") { /*stock dans un string ce qu'on ecrit */
echo $str;
$handle = fopen ("php://stdin","r");
$line = fgets($handle);
fclose($handle);
return trim($line);
}

exec('reset');
echo "Hello! Welcome to \"PHP  Hangman\"!\n";
echo "Type a word : ";
$secret = readInput(); /*on recupert le mot stocker dans le return*/
exec('reset');
echo "Game Start!\n";
echo "Guess the word : ";
$underScore = "_";
for ($i=0; $i < strlen($secret); $i++) { 
	echo "$underScore"; /*on cache chaque lettre*/
}
$motSecret = str_split($secret);
$tabProvisoire = str_split($secret);
for ($z=0; $z < count($motSecret); $z++) { 
	$tabProvisoire[$z] = $underScore;
}
$erreur = 0;
for ($compteur=1; $compteur <= 10; $compteur++) { 
	echo "\n";
	echo "Give a letter : ";
	$lettre = readInput();
	$try = array();
	$try[] = $lettre;
	$essaie=1;
	for ($j=0; $j < count($motSecret); $j++) { 
		if ($lettre == $motSecret[$j]) {
			$tabProvisoire[$j] = $lettre;
		}
		else
		{
			//$erreur=$erreur+1;
		}
	}
	$affiche = implode($tabProvisoire);
	echo "Guess the word : $affiche		Essaie: $compteur on 10\n";
	exec('clear');
}
if ($affiche == $Secret) {
	echo "YOU WIN !!!!!\n";
}
if ($compteur == 10) {
	exec('reset');
	echo ",==========Y===
   ||  /      |
   || /       |
   ||/        O
   ||        /|\
   ||         |
   ||        / \
  /||
 //||
============";
	echo "\n";
}
?>