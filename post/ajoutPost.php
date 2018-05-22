<?php
session_start();

include "../class/connectionBDD.php";
$bdd = ConnectionBDD::getLiaison();

//  Thème
	if (isset($_POST['bouton_theme'])) {
		$nom = htmlspecialchars($_POST['nom_theme'], ENT_QUOTES);
		$description = htmlspecialchars($_POST['description_theme'], ENT_QUOTES);
		$commentaire = htmlspecialchars($_POST['commentaire_theme'], ENT_QUOTES);
		include '../class/themeManager.php';
		// Instantation de la classe
		$rajout = (new ThemeManager())->addTheme($bdd, $nom, $description, $commentaire);
		/* la syntaxe ci-dessus est équivalente à ci-dessous
		$rajout = (new Ajout())->addTheme($bdd, $nom, $description, $commentaire);
		$rajout->addTheme($bdd, $nom, $description, $commentaire); */
	}

// Lieu	
	if (isset($_POST['bouton_lieu'])) {
		$nom = htmlspecialchars($_POST['nom_lieu'], ENT_QUOTES);
		$description = htmlspecialchars($_POST['description_lieu'], ENT_QUOTES);
		$commentaire = htmlspecialchars($_POST['commentaire_lieu'], ENT_QUOTES);
		include '../class/lieuManager.php';
		// Instantation de la classe
		$rajout = (new LieuManager())->addLieu($bdd, $nom, $description, $commentaire);
	}
	
// Type
	if (isset($_POST['bouton_type'])) {
		$typDiaNom = htmlspecialChars($_POST['nom_type'], ENT_QUOTES);
		$typDiaDescription = htmlspecialChars($_POST['description_type'], ENT_QUOTES);
		$typDiaCommentaire = htmlspecialChars($_POST['commentaire_type'], ENT_QUOTES);
		include '../class/typeManager.php';
		// Instantation de la classe
		$rajout = (new TypeManager())->addType($bdd, $typDiaNom, $typDiaDescription, $typDiaCommentaire);
	}
	
// Epoque
	if (isset($_POST['bouton_epoque'])) {
		$epoAnnee = htmlspecialChars($_POST['nom_epoque'], ENT_QUOTES);
		$epoDescription = htmlspecialChars($_POST['description_epoque'], ENT_QUOTES);
		$epoCommentaire = htmlspecialChars($_POST['commentaire_epoque'], ENT_QUOTES);
		include '../class/epoqueManager.php';
		// Instantation de la classe
		$rajout = (new EpoqueManager())->addEpoque($bdd, $epoAnnee, $epoDescription, $epoCommentaire);
	}

// Diapo
	if (isset($_POST['bouton_diapo'])) {		
		
		if (!isset($_FILES['uploadFichier'])) {
			$_SESSION['message'] = 'Sélectionner un fichier';
			header('Location:../backEnd/ajoutElement.php');
			exit();
		}
		extract($_POST);
		$diapo_legende = htmlspecialchars($legende_diapo, ENT_QUOTES);
		$diapo_commentaire = htmlspecialchars($commentaire_diapo, ENT_QUOTES);
		
		include '../class/diapoManager.php';
		$file = $_FILES['uploadFichier']['tmp_name'];
		$ajout = new DiapoManager($bdd, $epoque, $theme, $lieu, $type, $file, $publication, $date_diapo, $diapo_legende, $diapo_commentaire);
		$ajout->verificationFormulaire($epoque, $theme, $lieu, $type);
		
		$ajout->EnregistrementBDD($bdd, $file, $publication, $date_diapo, $diapo_legende, $diapo_commentaire, $epoque,  $theme, $lieu, $type);
		
		$ajout->CreateMiniature($bdd);
	}

?>