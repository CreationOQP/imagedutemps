<?php
session_start();

include "../class/connectionBDD.php";
$bdd = ConnectionBDD::getLiaison();


	if (isset($_POST['bouton_theme'])) {
		$theNom = $_POST['nom_theme'];
		include '../class/themeManager.php';
		// Instantation de la classe
		$suppression = (new themeManager())->deletteTheme($bdd, $theNom);
		/* la syntaxe ci-dessus est équivalente à ci-dessous
		$rajout = (new Ajout())->addTheme($bdd, $nom, $description, $commentaire);
		$rajout->addTheme($bdd, $nom, $description, $commentaire); */
	}
	
	if (isset($_POST['bouton_lieu'])) {
		$lieNom = $_POST['nom_lieu'];
		include '../class/lieuManager.php';
		// Instantation de la classe
		$suppression = (new lieuManager())->deletteLieu($bdd, $lieNom);
	}
	
	if (isset($_POST['bouton_type'])) {
		$typDiaNom = $_POST['nom_type'];
		include '../class/typeManager.php';
		// Instantation de la classe
		$suppression = (new typeManager())->deletteType($bdd, $typDiaNom);
	}
	
	if (isset($_POST['bouton_epoque'])) {
		/* $epoAnnee = htmlspecialChars($_POST['nom_epoque'], ENT_QUOTES); */
		$epoAnnee = $_POST['nom_epoque'];
		include '../class/epoqueManager.php';
		// Instantation de la classe
		$suppression = (new EpoqueManager())->deletteEpoque($bdd, $epoAnnee);
	}
?>