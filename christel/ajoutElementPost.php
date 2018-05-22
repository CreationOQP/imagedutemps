<?php
session_start();

include "../class/connectionBDD.php";
/* $connect = new connectionBDD('localhost', 'lmouutej_imagedutemps', 'utf8', 'lmouutej_noel', 'C=z={cN]BVB8'); */
$connect = new connectionBDD();
$bdd = $connect->getLiaison();

include 'ajoutElementClass.php';

	if (isset($_POST['bouton_theme'])) {
		$nom = htmlspecialchars($_POST['nom_theme'], ENT_QUOTES);
		$description = htmlspecialchars($_POST['description_theme'], ENT_QUOTES);
		$commentaire = htmlspecialchars($_POST['commentaire_theme'], ENT_QUOTES);
		// Instantation de la classe
		$rajout = (new Ajout())->addTheme($bdd, $nom, $description, $commentaire);
		/* la syntaxe ci-dessus est équivalente à ci-dessous
		$rajout = (new Ajout())->addTheme($bdd, $nom, $description, $commentaire);
		$rajout->addTheme($bdd, $nom, $description, $commentaire); */
	}
	
	if (isset($_POST['bouton_lieu'])) {
		$nom = htmlspecialchars($_POST['nom_lieu'], ENT_QUOTES);
		$description = htmlspecialchars($_POST['description_lieu'], ENT_QUOTES);
		$commentaire = htmlspecialchars($_POST['commentaire_lieu'], ENT_QUOTES);
		// Instantation de la classe
		$rajout = (new Ajout())->addLieu($bdd, $nom, $description, $commentaire);
	}
	
	if (isset($_POST['bouton_type'])) {
		$typDiaNom = htmlspecialChars($_POST['nom_type'], ENT_QUOTES);
		$typDiaDescription = htmlspecialChars($_POST['description_type'], ENT_QUOTES);
		$typDiaCommentaire = htmlspecialChars($_POST['commentaire_type'], ENT_QUOTES);
		// Instantation de la classe
		$rajout = (new Ajout())->addType($bdd, $typDiaNom, $typDiaDescription, $typDiaCommentaire);
	}
	
	if (isset($_POST['bouton_epoque'])) {
		$epoAnnee = htmlspecialChars($_POST['nom_epoque'], ENT_QUOTES);
		$epoDescription = htmlspecialChars($_POST['description_epoque'], ENT_QUOTES);
		$epoCommentaire = htmlspecialChars($_POST['commentaire_epoque'], ENT_QUOTES);
		// Instantation de la classe
		$rajout = (new Ajout())->addEpoque($bdd, $epoAnnee, $epoDescription, $epoCommentaire);
	}
?>