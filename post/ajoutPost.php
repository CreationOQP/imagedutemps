<?php
session_start();

include "../class/connectionBDD.php";
$bdd = ConnectionBDD::getLiaison();

If (!isset($_SESSION['disturb']) || !isset($_POST['compteur']) || empty($_SESSION['disturb']) || empty($_POST['compteur']) || ($_SESSION['disturb'] != $_POST['compteur'])) {
				$_SESSION['message'] = 'Ne soyez pas relou, n\'insistez pas 1 !!!';
				header('Location:../back_end/accueil_back_end.php');
				exit();
			}

//  Thème
	if (isset($_POST['bouton_theme'])) {
		$theNom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['nom_theme']));
		$theDescription = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['description_theme'], ENT_QUOTES));
		$theCommentaire = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['commentaire_theme'], ENT_QUOTES));
		include '../class/themeManager.php';
		$ajout = new ThemeManager($bdd, $theNom, $theDescription, $theCommentaire, $theId);
		$ajout->addTheme($bdd, $theNom, $theDescription, $theCommentaire);
	}

// Lieu	
	if (isset($_POST['bouton_lieu'])) {
		$lieNom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['nom_lieu']));
		$lieDescription = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['description_lieu'], ENT_QUOTES));
		$lieCommentaire = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['commentaire_lieu'], ENT_QUOTES));
		include '../class/lieuManager.php';
		$ajout = new lieuManager($bdd, $lieNom, $lieDescription, $lieCommentaire, $lieId);
		$ajout->addLieu($bdd, $lieNom, $lieDescription, $lieCommentaire);
	}
	
// Type
	if (isset($_POST['bouton_type'])) {
		$typDiaNom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialChars($_POST['nom_type']));
		$typDiaDescription = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialChars($_POST['description_type'], ENT_QUOTES));
		$typDiaCommentaire = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialChars($_POST['commentaire_type'], ENT_QUOTES));
		include '../class/typeManager.php';
		$ajout = new TypeManager($bdd, $typDiaNom, $typDiaDescription, $typDiaCommentaire, $typDiaId);
		$ajout->addType($bdd, $typDiaNom, $typDiaDescription, $typDiaCommentaire);
	}
	
// Epoque
	if (isset($_POST['bouton_epoque'])) {
		$epoAnnee = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialChars($_POST['nom_epoque']));
		$epoDescription = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialChars($_POST['description_epoque'], ENT_QUOTES));
		$epoCommentaire = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialChars($_POST['commentaire_epoque'], ENT_QUOTES));
		include '../class/epoqueManager.php';
		// Instantation de la classe
		$ajout = new EpoqueManager($bdd, $epoAnnee, $epoDescription, $epoCommentaire);
		$ajout->addEpoque($bdd, $epoAnnee, $epoDescription, $epoCommentaire);
	}

// Diapo
	if (isset($_POST['bouton_diapo'])) {		
		
		if (!isset($_FILES['uploadFichier'])) {
			$_SESSION['message'] = 'Sélectionner un fichier';
			header('Location:../back_end/ajoutElement.php');
			exit();
		}
		$public = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['public']));
		$publication = htmlspecialchars($_POST['publication']);
		$date_diapo = htmlspecialchars($_POST['date_diapo']);
		$legende_diapo = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['legende_diapo']));
		$epoque = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['epoque']));
		$theme = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['theme']));
		$lieu = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['lieu']));
		$type = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['type']));
		$diapo_commentaire = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($commentaire_diapo, ENT_QUOTES));
		
		include '../class/diapoManager.php';
		$file = $_FILES['uploadFichier']['tmp_name'];
		$ajout = new DiapoManager($bdd, $epoque, $theme, $lieu, $type, $file, $publication, $date_diapo, $diapo_legende, $diapo_commentaire);
		$ajout->verificationFormulaire($epoque, $theme, $lieu, $type);
		
		$ajout->EnregistrementBDD($bdd, $file, $publication, $date_diapo, $diapo_legende, $diapo_commentaire, $epoque,  $theme, $lieu, $type);
		
		$ajout->CreateMiniature($bdd);
	}

// Public
	if (isset($_POST['bouton_public'])) {
		
		$etcNom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['etc_nom']));
		$nouveauEtcNom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['nouveau_etc_nom']));
		$staNom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['sta_nom']));
		$nouveauStaNom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['nouveau_sta_nom']));
		$staCommentaire = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['sta_ommentaire'], ENT_QUOTES));
		$denNom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['den_nom']));
		$nouveau_den_nom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['nouveau_den_nom']));
		$denDescription = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['den_description'], ENT_QUOTES));
		$denCommentaire = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['den_commentaire'], ENT_QUOTES));
		$pubNom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['pub_nom']));
		$pubPrenom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['pub_prenom']));
		$pubPseudo = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['pub_pseudo']));
		$quaNom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['qua_nom']));
		$nouvelleQuaNom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['nouvelle_qua_nom']));
		$quaDescription = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['qua_description'], ENT_QUOTES));
		$quaCommentaire = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['qua_commentaire'], ENT_QUOTES));
		$adrVoirie = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['adr_voirie']));
		$adrLieu = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['adr_lieu']));
		$adrMention = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['adr_mention']));
		$adresseEmail = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['adresse_email']));
		$cpCode = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['cp_code']));
		$nouveauCpCode = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['nouveau_cp_code']));
		$vilNom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['vil_nom']));
		$nouvelleVilNom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['nouvelle_vil_nom']));
		$payNom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['pay_nom']));
		$nouveauPayNom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['nouveau_pay_nom']));
		$payDescription = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['pay_description'], ENT_QUOTES));
		$payCommentaire = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['pay_commentaire'], ENT_QUOTES));
		$numeroTelephone = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['numero_telephone']));
		$typeTelephone = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['type_telephone']));
		$nouveauTypeTelephone = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['nouveau_type_telephone']));
		$boutonPublic = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['bouton_public']));
		
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
		
		header('Location:../back_end/ajoutPublic.php');
		exit();
	}
	
	
?>