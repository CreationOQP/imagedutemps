<?php
session_start();

include "../class/connectionBDD.php";
$bdd = ConnectionBDD::getLiaison();

	if (isset($_POST['bouton_theme'])) {
		$theId = $_POST['id_theme'];
		$theNom = htmlspecialchars($_POST['nom_theme'], ENT_QUOTES);
		$theDescription = htmlspecialchars($_POST['description_theme'], ENT_QUOTES);
		$theCommentaire = htmlspecialchars($_POST['commentaire_theme'], ENT_QUOTES);
		include '../class/themeManager.php';
		// Instantation de la classe
		$modification = (new ThemeManager())->updatetheme($bdd, $theId, $theNom, $theDescription, $theCommentaire);
		/* la syntaxe ci-dessus est équivalente à ci-dessous
		$modification = (new Ajout())->addTheme($bdd, $nom, $description, $commentaire);
		$modification->updateTheme($bdd, $nom, $description, $commentaire); */
	}
	
	if (isset($_POST['bouton_lieu'])) {
		$lieId = $_POST['id_lieu'];
		$lieNom = htmlspecialchars($_POST['nom_lieu'], ENT_QUOTES);
		$lieDescription = htmlspecialchars($_POST['description_lieu'], ENT_QUOTES);
		$lieCommentaire = htmlspecialchars($_POST['commentaire_lieu'], ENT_QUOTES);
		include '../class/LieuManager.php';
		// Instantation de la classe
		$modification = (new LieuManager())->updateLieu($bdd, $lieId, $lieNom, $lieDescription, $lieCommentaire);
		
	}
	
	if (isset($_POST['bouton_type'])) {
		$typDiaId = $_POST['id_type'];
		$typDiaNom = htmlspecialChars($_POST['nom_type'], ENT_QUOTES);
		$typDiaDescription = htmlspecialChars($_POST['description_type'], ENT_QUOTES);
		$typDiaCommentaire = htmlspecialChars($_POST['commentaire_type'], ENT_QUOTES);
		include '../class/typeManager.php';
		// Instantation de la classe
		$modification = (new TypeManager())->updateType($bdd, $typDiaId, $typDiaNom, $typDiaDescription, $typDiaCommentaire);
	}
	
	if (isset($_POST['bouton_epoque'])) {
		$epoAnnee = htmlspecialChars($_POST['nom_epoque'], ENT_QUOTES);
		$epoDescription = htmlspecialChars($_POST['description_epoque'], ENT_QUOTES);
		$epoCommentaire = htmlspecialChars($_POST['commentaire_epoque'], ENT_QUOTES);
		include '../class/epoqueManager.php';
		// Instantation de la classe
		$modification = (new EpoqueManager())->updateEpoque($bdd, $epoAnnee, $epoDescription, $epoCommentaire);
	}
?>