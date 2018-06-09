<?php
session_start();

/* include "../class/connectionBDD.php"; */
include "../class/connectionBDDLocal.php";
$bdd = ConnectionBDD::getLiaison();

If (!isset($_SESSION['disturb']) || !isset($_POST['compteur']) || empty($_SESSION['disturb']) || empty($_POST['compteur']) || ($_SESSION['disturb'] != $_POST['compteur'])) {
				$_SESSION['message'] = 'Ne soyez pas relou, n\'insistez pas !!!';
				header('Location:../index.php');
				exit();
			}
/* if ($_SERVER['HTTP_REFERER'] != 'http://www.imagedutemps.org/back_end/ajoutelement.php') {
	$_SESSION['message'] = 'Ne soyez pas relou, n\'insistez pas !!!';
				header('Location:../index.php');
				exit();
} */
/* if ($_SERVER['HTTP_REFERER'] != 'localhost/imagedutempslocal/back_end/ajoutelement.php') {
	$_SESSION['message'] = 'Ne soyez pas relou, n\'insistez pas !!!';
				header('Location:../index.php');
				exit();
} */


	if (isset($_POST['bouton_theme'])) {
		$theNom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['the_nom']));
		include '../class/themeManager.php';
		$suppression = new ThemeManager($bdd, $theNom, $theDescription, $theCommentaire, $theId);
		$suppression->deletteTheme($bdd, $theNom);
	}
	
	if (isset($_POST['bouton_lieu'])) {
		$lieNom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['lie_nom']));
		include '../class/lieuManager.php';
		$suppression = new LieuManager($bdd, $lieNom, $lieDescription, $lieCommentaire, $lieId);
		$suppression->deletteLieu($bdd, $lieNom);
	}
	
	if (isset($_POST['bouton_type'])) {
		$typNom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['typ_nom']));
		include '../class/typeManager.php';
		$suppression = new TypeManager($bdd, $typDiaNom, $typDiaDescription, $typDiaCommentaire, $typDiaId);
		$suppression->deletteType($bdd, $typDiaNom));
	}
	
	if (isset($_POST['bouton_epoque'])) {
		$epoAnnee = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['epo_nom']));
		include '../class/epoqueManager.php';
		$suppression = new EpoqueManager($bdd, $epoAnnee, $epoDescription, $epoCommentaire);
		$suppression->deletteEpoque($bdd, $epoAnnee);
	}
?>