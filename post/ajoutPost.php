<?php
session_start();

include "../class/connectionBDD.php";
$bdd = ConnectionBDD::getLiaison();

//  Thème
	if (isset($_POST['bouton_theme'])) {
		$theNom = htmlspecialchars($_POST['nom_theme'], ENT_QUOTES);
		$theDescription = htmlspecialchars($_POST['description_theme'], ENT_QUOTES);
		$theCommentaire = htmlspecialchars($_POST['commentaire_theme'], ENT_QUOTES);
		include '../class/themeManager.php';
		$ajout = new ThemeManager($bdd, $theNom, $theDescription, $theCommentaire, $theId);
		$ajout->addTheme($bdd, $theNom, $theDescription, $theCommentaire);
	}

// Lieu	
	if (isset($_POST['bouton_lieu'])) {
		$lieNom = htmlspecialchars($_POST['nom_lieu'], ENT_QUOTES);
		$lieDescription = htmlspecialchars($_POST['description_lieu'], ENT_QUOTES);
		$lieCommentaire = htmlspecialchars($_POST['commentaire_lieu'], ENT_QUOTES);
		include '../class/lieuManager.php';
		$ajout = new lieuManager($bdd, $lieNom, $lieDescription, $lieCommentaire, $lieId);
		$ajout->addLieu($bdd, $lieNom, $lieDescription, $lieCommentaire);
	}
	
// Type
	if (isset($_POST['bouton_type'])) {
		$typDiaNom = htmlspecialChars($_POST['nom_type'], ENT_QUOTES);
		$typDiaDescription = htmlspecialChars($_POST['description_type'], ENT_QUOTES);
		$typDiaCommentaire = htmlspecialChars($_POST['commentaire_type'], ENT_QUOTES);
		include '../class/typeManager.php';
		$ajout = new TypeManager($bdd, $typDiaNom, $typDiaDescription, $typDiaCommentaire, $typDiaId);
		$ajout->addType($bdd, $typDiaNom, $typDiaDescription, $typDiaCommentaire);
	}
	
// Epoque
	if (isset($_POST['bouton_epoque'])) {
		$epoAnnee = htmlspecialChars($_POST['nom_epoque'], ENT_QUOTES);
		$epoDescription = htmlspecialChars($_POST['description_epoque'], ENT_QUOTES);
		$epoCommentaire = htmlspecialChars($_POST['commentaire_epoque'], ENT_QUOTES);
		include '../class/epoqueManager.php';
		// Instantation de la classe
		$ajout = new EpoqueManager($bdd, $epoAnnee, $epoDescription, $epoCommentaire);
		$ajout->addEpoque($bdd, $epoAnnee, $epoDescription, $epoCommentaire);
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

// Puyblic
	if (isset($_POST['bouton_public'])) {
		extract($_POST);
		include '../class/publicManager.php';
		$ajout = new PublicManager($bdd, $nouveau_etc_nom, $etc_nom, $nouveau_sta_nom, $sta_nom, $commentaire_statut, $nouveau_den_nom, $den_nom, $den_description, $den_commentaire, $pub_nom, $pub_prenom, $pub_pseudo, $nouvelle_qua_nom, $qua_nom, $qua_description, $qua_commentaire, $nouveau_pay_code, $nouveau_pay_nom, $pay_nom, $pay_description, $pay_commentaire, $nouveau_cp_code, $cp_code, $nouvelle_vil_nom, $vil_nom);
		
		$ajout->verification($nouveau_etc_nom, $etc_nom, $nouveau_sta_nom, $sta_nom, $nouveau_den_nom, $den_nom, $nouvelle_qua_nom, $qua_nom, $nouveau_pay_nom, $pay_nom, $nouveau_cp_code, $cp_code, $nouvelle_vil_nom, $vil_nom);
		$ajout->etatCivil($bdd, $nouveau_etc_nom, $etc_nom);
		$ajout->statutJuridique($bdd, $nouveau_sta_nom, $sta_nom, $commentaire_statut);
		$ajout->denomination($bdd, $nouveau_den_nom, $den_nom, $den_description, $den_commentaire);
		$ajout->enregistrementPublic($bdd, $pub_nom, $pub_prenom, $pub_pseudo);
		$ajout->qualite($bdd, $nouvelle_qua_nom, $qua_nom, $qua_description, $qua_commentaire);
		$ajout->pays($bdd, $nouveau_pay_code, $nouveau_pay_nom, $pay_nom, $pay_description, $pay_commentaire);
		$ajout->codePostal($bdd, $nouveau_cp_code, $cp_code);
		$ajout->ville($bdd, $nouvelle_vil_nom, $vil_nom);
		
		/* $ajout = new PublicManager($bdd, $etc_nom, $sta_nom, $qua_nom, $cp_code, $vil_nom, $pay_nom, $type_telephone, $nouveau_etc_nom, $nouveau_sta_nom, $nouvelle_qua_nom, $nouveau_cp_code, $nouvelle_vil_nom, $nouveau_pay_nom, $nouveau_type_telephone, $pub_nom, $pub_prenom, $pub_pseudo, $nouveau_den_nom, $den_nom, $nouveau_pay_code, $adr_lieu, $adr_voirie, $adr_mention, $adresse_email, $numero_telephone);
		
		$ajout->vérification($etc_nom, $sta_nom, $qua_nom, $cp_code, $vil_nom, $pay_nom, $type_telephone, $nouveau_etc_nom, $nouveau_sta_nom, $nouvelle_qua_nom, $nouveau_cp_code, $nouvelle_vil_nom, $nouveau_pay_nom, $nouveau_type_telephone);
		
		$ajout->statutJuridique($nouveau_sta_nom, $sta_nom);
		
		$ajout->denomination($nouveau_den_nom, $den_nom);
		
		$ajout->etatCivil($bdd, $etc_nom);
		
		$ajout->enregistrementPublic($bdd, $pub_nom, $pub_prenom, $pub_pseudo);
		
		$ajout->qualite($nouvelle_qua_nom, $qua_nom);
		
		$ajout->pays($nouveau_pay_code, $nouveau_pay_nom, $pay_nom);
		
		$ajout->codePostal($nouveau_cp_code, $cp_code);
		
		$ajout->ville($nouvelle_vil_nom, $vil_nom);
		
		$ajout->adresse($adr_lieu, $adr_voirie, $adr_mention);
		
		$ajout->email($adresse_email);
		
		$ajout->typeTelephone($nouveau_type_telephone, $type_telephone);
		
		$ajout->telephone($numero_telephone); */
		
		header('Location:../backEnd/ajoutPublic.php');
		exit();
	}
	
	
?>