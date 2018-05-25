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
		$modification = new ThemeManager($bdd, $theNom, $theDescription, $theCommentaire, $theId);
		$modification->updateTheme($bdd, $theId, $theNom, $theDescription, $theCommentaire);
	}
	
	if (isset($_POST['bouton_lieu'])) {
		$lieId = $_POST['id_lieu'];
		$lieNom = htmlspecialchars($_POST['nom_lieu'], ENT_QUOTES);
		$lieDescription = htmlspecialchars($_POST['description_lieu'], ENT_QUOTES);
		$lieCommentaire = htmlspecialchars($_POST['commentaire_lieu'], ENT_QUOTES);
		include '../class/LieuManager.php';
		$modification = new LieuManager($bdd, $lieNom, $lieDescription, $lieCommentaire, $lieId);
		$modification->updateLieu($bdd, $lieId, $lieNom, $lieDescription, $lieCommentaire);
	}
	
	if (isset($_POST['bouton_type'])) {
		$typDiaId = $_POST['id_type'];
		$typDiaNom = htmlspecialChars($_POST['nom_type'], ENT_QUOTES);
		$typDiaDescription = htmlspecialChars($_POST['description_type'], ENT_QUOTES);
		$typDiaCommentaire = htmlspecialChars($_POST['commentaire_type'], ENT_QUOTES);
		include '../class/typeManager.php';
		$modification = new TypeManager($bdd, $typDiaNom, $typDiaDescription, $typDiaCommentaire, $typDiaId);
		$modification->updateType($bdd, $typDiaId, $typDiaNom, $typDiaDescription, $typDiaCommentaire);
	}
	
	if (isset($_POST['bouton_epoque'])) {
		$epoAnnee = htmlspecialChars($_POST['nom_epoque'], ENT_QUOTES);
		$epoDescription = htmlspecialChars($_POST['description_epoque'], ENT_QUOTES);
		$epoCommentaire = htmlspecialChars($_POST['commentaire_epoque'], ENT_QUOTES);
		include '../class/epoqueManager.php';
		$modification = new EpoqueManager($bdd, $epoAnnee, $epoDescription, $epoCommentaire);
		$modification->updateEpoque($bdd, $epoAnnee, $epoDescription, $epoCommentaire);
	}
?>