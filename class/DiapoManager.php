<?php

Class DiapoManager {
	
	private $bdd;
	private $epoque;
	private $theme;
	private $lieu;
	private $type;
	private $file;
	private $publication;
	private $date_diapo;
	private $diapo_legende;
	private $diapo_commentaire;
		
	public function __construct($bdd, $epoque, $theme, $lieu, $type, $file, $publication, $date_diapo, $diapo_legende, $diapo_commentaire) {
		$this->bdd = $bdd;
		$this->epoque =$epoque ;
		$this->theme = $theme;
		$this->lieu = $lieu;
		$this->type = $type;
		$this->file = $file;
		$this->publication = $publication;
		$this->date_diapo = $date_diapo;
		$this->diapo_legende  = $diapo_legende;
		$this->diapo_commentaire = $diapo_commentaire;
	}
	
	// Vérification
	public function verificationFormulaire($epoque, $theme, $lieu, $type) {
		if ($epoque == 'À choisir' || $theme == 'À choisir' || $lieu == 'À choisir' || $type == 'À choisir') {
			$_SESSION['message'] = 'Votre formulaire est partie en live... A refaire';
			header('Location:../backEnd/ajoutElement.php');
			exit();
		}
		
		$extensionUpload = strrchr($_FILES['uploadFichier']['name'], '.');
		$extensionValide = array('.png', '.jpg', '.jpeg');
		if (!in_array($extensionUpload, $extensionValide)) {
			$_SESSION['message'] = 'Votre extension est partie en live... A refaire';
			header('Location:../backEnd/ajoutElement.php');
			exit();
		} 
		/* else {
			$_SESSION['message'] = 'Test Ok, extension : '.$extensionUpload;
			header('Location:../backEnd/ajoutElement.php');
		} */
	}
	
	public function EnregistrementBDD($bdd, $file, $publication, $date_diapo, $diapo_legende, $diapo_commentaire, $epoque,  $theme, $lieu, $type) {
		// Récupération du nom de fichier
		$requete = $bdd->prepare('SELECT dia_id FROM Diapositive ORDER BY dia_id DESC LIMIT 1');
		$requete->execute();
		$donnee = $requete->fetch();
		$idDiapo = $donnee['dia_id'] + 1;
		$requete->closeCursor();
		// Récupération de l'extension
		$extensionUpload = strrchr($_FILES['uploadFichier']['name'], '.');
		// Dossier de stockage
		$dossier = '../diapo/';
		// Récupération du format d'affichage du fichier
		list($width, $height) = getimagesize($file);
		if ($width >= $height) {
			$format = 'H';
		} else {
			$format = 'V';
		}
		// Date du jour
		$dateJour = date('Y-m-d');
		// public pour le test
		$public = 1;
		
		if (move_uploaded_file($_FILES['uploadFichier']['tmp_name'], $dossier.$idDiapo.$extensionUpload)) {
			$requeteEnregistrement = $bdd->prepare('INSERT INTO Diapositive(dia_id, dia_publication, dia_date, dia_legend, dia_format, dia_commentaire, dia_enregistrement, dia_epo_annee, dia_the_id, dia_lie_id, dia_typdia_id, dia_pub_id)
								VALUES (:id, :publication, :dateDia, :legend, :format, :commentaire, :enregistrement, :epoque, :theme, :lieu, :type, :donateur)');
			$requeteEnregistrement->execute(array(
										'id' => $idDiapo,
										'publication' => $publication,
										'dateDia' => $date_diapo,
										'legend' => $diapo_legende,
										'format' => $format,
										'commentaire' => $diapo_commentaire,
										'enregistrement' => $dateJour,
										'epoque' => $epoque,
										'theme' => $theme,
										'lieu' => $lieu,
										'type' => $type,
										'donateur' => $public));		// public à modifier
			$requeteEnregistrement->closeCursor();
			/* $_SESSION['message'] = 'Le téléchargement 100% réussi';
			header('Location:../backEnd/ajoutElement.php');
			exit(); */
		} else {
			$_SESSION['message'] = 'Le téléchargement est un échec';
			header('Location:../backEnd/ajoutElement.php');
			exit();
		}
	}

/* https://www.aidoweb.com/tutoriaux/redimensionner-image-php-738http://www.tayo.fr/tutoriauxv2.php?f=redimensionner-une-image-phpt */
	public function CreateMiniature($bdd) {
		$requete = $bdd->prepare('SELECT dia_id FROM Diapositive ORDER BY dia_id DESC LIMIT 1');
		$requete->execute();
		$donnee = $requete->fetch();
		$idDiapo = $donnee['dia_id'];
		$requete->closeCursor();
		
		$file = '../diapo/'.$idDiapo.'.png';
		$size = getimagesize($file);
		list($largeur, $hauteur) = getimagesize($file);
		// calcul nouvelle taille
		if ($size[0] >= $size[1]) {
			$newLargeur = 150;
			$newHauteur = $newLargeur/($size[0]/$size[1]);
		} else {
			$newHauteur = 150;
			$newLargeur = $newHauteur/($size[1]/$size[0]);
		}
		
		if ($extensionUpload = strrchr($_FILES['uploadFichier']['name'], '.') == '.jpeg') {
			$imageOriginale = imagecreatefromjpeg($file);
			$imageMiniature = imagecreatetruecolor($newLargeur, $newHauteur);
			imagecopyresampled($imageminiature, $imageOriginale, 0,0,0,0, $newLargeur, $newHauteur, $size[0], $size[1]);
			imagejpeg($imageMiniature, '../diapoMiniature/'.$idDiapo.'.jpg');
			$_SESSION['message'] = "L'image et sa miniature sont installées";
			header('Location:../backEnd/ajoutElement.php');
			exit();
		}else {
			$imageOriginale = imagecreatefrompng($file);
			$imageMiniature = imagecreatetruecolor($newLargeur, $newHauteur);
			imagecopyresampled($imageminiature, $imageOriginale, 0,0,0,0, $newLargeur, $newHauteur, $size[0], $size[1]);
			imagepng($imageMiniature, '../diapoMiniature/'.$idDiapo.'.png');
			$_SESSION['message'] = "L'image et sa miniature sont installées";
			header('Location:../backEnd/ajoutElement.php');
			exit();
		}
	}
}
	
?>		
		
	