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
	}
		
		$taille = filesize($_FILES['uploadFichier']['tmp_name']);
		$extension = strrchr($_FILES['uploadFichier']['name'], '.');
		$file = $_FILES['uploadFichier']['name'];
		$fileTaille = $_FILES['uploadFichier']['tmp_name'];
		
		// Dimension de la largeur et de la hauteur de l'image
		list($width, $height) = getimagesize($fileTaille);
		// Format d'affichage
		if ($width >= $height) {
			$format = 'H';
		} else {
			$format = 'V';
		}
		
		$requete = $bdd->prepare('SELECT dia_id FROM Diapositive ORDER BY dia_id DESC LIMIT 1');
		$requete->execute();
		$donnee = $requete->fetch();
		$idDiapo = $donnee['dia_id'] + 1;
		$requete->closeCursor();
		
		// fichier photo
		extract($_POST);
		$diapo_legende = htmlspecialchars($legende_diapo, ENT_QUOTES);
		$diapo_commentaire = htmlspecialchars($commentaire_diapo, ENT_QUOTES);
		$dossier = '../diapo/';
		echo 'Extension fichier :'.$extension.'<br />';
		echo 'Publication : '.$publication.'<br />';
		echo 'date originale : '.$date_diapo.'<br />';
		echo 'Légende : '.$diapo_legende.'<br />';
		echo 'format : '.$format.'<br />';
		echo 'date enregistrement : '.$date_enregistrement.'<br />';
		echo 'Epoque : '.$epoque.'<br />';
		echo 'Thème : '.$theme.'<br />';
		echo 'Lieu : '.$lieu_id.'<br />';
		echo 'type : '.$type.'<br />';
		echo "commentaire : ".$diapo_commentaire.'<br />';
		echo 'Nom fichier : '.$file.'<br />';
		echo 'Taille : '.$taille.'<br />';
		echo 'Format : '.$extension.'<br />';
		echo 'Dossier : '.$dossier.'<br />';
		echo 'Chemin : '.$dossier.$idDiapo.$extension.'<br />';
		echo 'Taille H : '.$width.'<br />';
		echo 'Taille V : '.$height.'<br />';
		/* echo 'Chemin : '.$dossier.$idDiapo.'.'.$formatFichier; */
		
			/* https://openclassrooms.com/courses/gd-redimensionner-une-image-sans-la-deformer */
?>