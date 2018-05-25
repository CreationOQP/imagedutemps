<?php
session_start();

include "../class/connectionBDD.php";
$bdd = ConnectionBDD::getLiaison();


	if (isset($_POST['bouton_theme'])) {
		$theNom = $_POST['nom_theme'];
		include '../class/themeManager.php';
		$suppression = new ThemeManager($bdd, $theNom, $theDescription, $theCommentaire, $theId);
		$suppression->deletteTheme($bdd, $theNom);
	}
	
	if (isset($_POST['bouton_lieu'])) {
		$lieNom = $_POST['nom_lieu'];
		include '../class/lieuManager.php';
		$suppression = new LieuManager($bdd, $lieNom, $lieDescription, $lieCommentaire, $lieId);
		$suppression->deletteLieu($bdd, $lieNom);
	}
	
	if (isset($_POST['bouton_type'])) {
		$typDiaNom = $_POST['nom_type'];
		include '../class/typeManager.php';
		$suppression = new TypeManager($bdd, $typDiaNom, $typDiaDescription, $typDiaCommentaire, $typDiaId);
		$suppression->deletteType($bdd, $typDiaNom);
	}
	
	if (isset($_POST['bouton_epoque'])) {
		$epoAnnee = $_POST['nom_epoque'];
		include '../class/epoqueManager.php';
		$suppression = new EpoqueManager($bdd, $epoAnnee, $epoDescription, $epoCommentaire);
		$suppression->deletteEpoque($bdd, $epoAnnee);
	}
?>