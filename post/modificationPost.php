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
		$theId = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['id_theme']));
		$theNom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['nom_theme']));
		$theDescription = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['description_theme'], ENT_QUOTES));
		$theCommentaire = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['commentaire_theme'], ENT_QUOTES));
		include '../class/themeManager.php';
		$modification = new ThemeManager($bdd, $theNom, $theDescription, $theCommentaire, $theId);
		$modification->updateTheme($bdd, $theId, $theNom, $theDescription, $theCommentaire);
	}
	
	if (isset($_POST['bouton_lieu'])) {
		$lieId = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['id_lieu']));
		$lieNom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['nom_lieu']));
		$lieDescription = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['description_lieu'], ENT_QUOTES));
		$lieCommentaire = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['commentaire_lieu'], ENT_QUOTES));
		include '../class/LieuManager.php';
		$modification = new LieuManager($bdd, $lieNom, $lieDescription, $lieCommentaire, $lieId);
		$modification->updateLieu($bdd, $lieId, $lieNom, $lieDescription, $lieCommentaire);
	}
	
	if (isset($_POST['bouton_type'])) {
		$typDiaId = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['id_type']));
		$typDiaNom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialChars($_POST['nom_type']));
		$typDiaDescription = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialChars($_POST['description_type'], ENT_QUOTES));
		$typDiaCommentaire = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialChars($_POST['commentaire_type'], ENT_QUOTES));
		include '../class/typeManager.php';
		$modification = new TypeManager($bdd, $typDiaNom, $typDiaDescription, $typDiaCommentaire, $typDiaId);
		$modification->updateType($bdd, $typDiaId, $typDiaNom, $typDiaDescription, $typDiaCommentaire);
	}
	
	if (isset($_POST['bouton_epoque'])) {
		$epoAnnee = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialChars($_POST['nom_epoque']));
		$epoDescription = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialChars($_POST['description_epoque'], ENT_QUOTES));
		$epoCommentaire = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialChars($_POST['commentaire_epoque'], ENT_QUOTES));
		include '../class/epoqueManager.php';
		$modification = new EpoqueManager($bdd, $epoAnnee, $epoDescription, $epoCommentaire);
		$modification->updateEpoque($bdd, $epoAnnee, $epoDescription, $epoCommentaire);
	}
?>