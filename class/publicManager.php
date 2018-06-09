<?php

Class PublicManager {

/* 	private $bdd;
	private $etc_nom;
	private $sta_nom;
	private $qua_nom;
	private $cp_code;
	private $vil_nom;
	private $pay_nom;
	private $type_telephone;
	private $nouveau_etc_nom;
	private $nouveau_sta_nom;
	private $nouvelle_qua_nom;
	private $nouveau_cp_code;
	private $nouvelle_vil_nom;
	private $nouveau_pay_nom;
	private $nouveau_type_telephone;
	private $pub_nom;
	private $pub_prenom;
	private $pub_pseudo;
	private $nouveau_den_nom;
	private $den_nom;
	private $nouveau_pay_code;
	private $adr_lieu;
	private $adr_voirie;
	private $adr_mention;
	private $adresse_email;
	private $numero_telephone;
	
	public function __construct($bdd, $etc_nom, $sta_nom, $qua_nom, $cp_code, $vil_nom, $pay_nom, $type_telephone, $nouveau_etc_nom, $nouveau_sta_nom, $nouvelle_qua_nom, $nouveau_cp_code, $nouvelle_vil_nom, $nouveau_pay_nom, $nouveau_type_telephone, $pub_nom, $pub_prenom, $pub_pseudo, $nouveau_den_nom, $den_nom, $nouveau_pay_code, $adr_lieu, $adr_voirie, $adr_mention, $adresse_email, $numero_telephone)
	{
		$this->etc_nom = $etc_nom;
		$this->sta_nom = $sta_nom;
		$this->qua_nom = $qua_nom;
		$this->cp_code = $cp_code;
		$this->vil_nom = $vil_nom;
		$this->pay_nom = $pay_nom;
		$this->type_telephone = $type_telephone;
		$this->nouveau_etc_nom = $nouveau_etc_nom;
		$this->nouveau_sta_nom = $nouveau_sta_nom;
		$this->nouveau_qua_nom = $nouvelle_qua_nom;
		$this->nouveau_cp_code = $nouveau_cp_code;
		$this->nouvelle_vil_nom = $nouvelle_vil_nom;
		$this->nouveau_pay_nom = $nouveau_pay_nom;
		$this->nouveau_type_telephone = $nouveau_type_telephone;
		$this->pub_nom = $pub_nom;
		$this->pub_prenom = $pub_prenom;
		$this->pub_pseudo = $pub_pseudo;
		$this->nouveau_den_nom = $nouveau_den_nom;
		$this->den_nom = $den_nom;
		$this->nouveau_pay_code = $nouveau_pay_code;
		$this->adr_lieu = $adr_lieu;
		$this->adr_voirie = $adr_voirie;
		$this->adr_mention = $adr_mention;
		$this->adresse_email = $adresse_email;
		$this->numero_telephone = $numero_telephone;
	} */
	
	/* || (!empty($nouveau_sta_nom) && $sta_nom != 'À choisir')
			|| (!empty($nouvelle_qua_nom) && $qua_nom != 'À choisir')
			|| (!empty($nouveau_cp_code) && $cp_code != 'À choisir')
			|| (!empty($nouvelle_vil_nom) && $vil_nom != 'À choisir')
			|| (!empty($nouveau_pay_nom) && $pay_nom != 'À choisir')
			|| (!empty($nouveau_type_telephone) && $type_telephone != 'À choisir') 
			
			public function vérification($etc_nom, $sta_nom, $qua_nom, $cp_code, $vil_nom, $pay_nom, $type_telephone, $nouveau_etc_nom, $nouveau_sta_nom, $nouveau_qua_nom, $nouveau_cp_code, $nouvelle_vil_nom, $nouveau_pay_nom, $nouveau_type_telephone)
			
			*/
	
	private $bdd;
	private $etc_nom;
	private $nouveau_etc_nom;
	private $nouveau_sta_nom;
	private $sta_nom;
	private $commentaire_statut;
	private $nouveau_den_nom;
	private $den_nom;
	private $den_description;
	private $den_commentaire;
	private $pub_nom;
	private $pub_prenom;
	private $pub_pseudo;
	private $nouvelle_qua_nom;
	private $qua_nom;
	private $qua_description;
	private $qua_commentaire;
	private $nouveau_pay_code;
	private $nouveau_pay_nom;
	private $pay_nom;
	private $pay_description;
	private $pay_commentaire;
	private $nouveau_cp_code;
	private $cp_code;
	private $nouvelle_vil_nom;
	private $vil_nom;
	
	private $idSta = '';
	private $idEtc = '';
	private $idDen = '';
	private $idPublic = '';
	private $idQua = '';
	private $codePay = '';
	private $idCP = '';
	private $idVil = '';
	
	public function __construct($bdd, $nouveau_etc_nom, $etc_nom, $nouveau_sta_nom, $sta_nom, $commentaire_statut, $nouveau_den_nom, $den_nom, $den_description, $den_commentaire, $pub_nom, $pub_prenom, $pub_pseudo, $nouvelle_qua_nom, $qua_nom, $qua_description, $qua_commentaire, $nouveau_pay_code, $nouveau_pay_nom, $pay_nom, $pay_description, $pay_commentaire, $nouveau_cp_code, $cp_code, $nouvelle_vil_nom, $vil_nom) {
		$this->bdd = $bdd;
		$this->etc_nom = $etc_nom;
		$this->nouveau_etc_nom = $nouveau_etc_nom;
		$this->nouveau_sta_nom = $nouveau_sta_nom;
		$this->sta_nom = $sta_nom;
		$this->commentaire_statut = $commentaire_statut;
		$this->nouveau_den_nom = $nouveau_den_nom;
		$this->den_nom = $den_nom;
		$this->den_description = $den_description;
		$this->den_commentaire = $den_commentaire;
		$this->pub_nom = $pub_nom;
		$this->pub_prenom = $pub_prenom;
		$this->pub_pseudo = $pub_pseudo;
		$this->nouvelle_qua_nom = $nouvelle_qua_nom;
		$this->qua_nom = $qua_nom;
		$this->qua_description = $qua_description;
		$this->qua_commentaire = $qua_commentaire;
		$this->nouveau_pay_code = $nouveau_pay_code;
		$this->nouveau_pay_nom = $nouveau_pay_nom;
		$this->pay_nom = $pay_nom;
		$this->pay_description = $pay_description;
		$this->pay_commentaire = $pay_commentaire;
		$this->nouveau_cp_code = $nouveau_cp_code;
		$this->cp_code = $cp_code;
		$this->nouvelle_vil_nom = $nouvelle_vil_nom;
		$this->vil_nom = $vil_nom;
	}
	
	public function verification($nouveau_etc_nom, $etc_nom, $nouveau_sta_nom, $sta_nom, $nouveau_den_nom, $den_nom, $nouvelle_qua_nom, $qua_nom, $nouveau_pay_nom, $pay_nom, $nouveau_cp_code, $cp_code, $nouvelle_vil_nom, $vil_nom) {
		if( !empty($nouveau_etc_nom) && $etc_nom != 'À choisir'
			|| !empty($nouveau_sta_nom) && $sta_nom != 'À choisir'
			|| !empty($nouveau_den_nom) && $den_nom != 'À choisir'
			|| !empty($nouvelle_qua_nom) && $qua_nom != 'À choisir'
			|| !empty($nouveau_pay_nom) && $pay_nom != 'À choisir'
			|| !empty($nouveau_cp_code) && $cp_code != 'À choisir'
			|| !empty($nouvelle_vil_nom) && $vil_nom != 'À choisir'
		) {
			$_SESSION['message'] = "Le caractère de la personne est légèrement tronqué, même si cela correspond dans la vie il n'est pas utile de le préciser sur le site";
			header('Location:../back_end/ajoutPublic.php');
			exit();
			}
	}
	
	public function etatCivil($bdd, $nouveau_etc_nom, $etc_nom) {	// Si l'état civil est nouveau on l'enregistre
		if (!empty($nouveau_etc_nom)) {
			$requeteAjout = $bdd->prepare('INSERT INTO Etat_civil(etc_nom) VALUES (:nom)');
			$requeteAjout->execute(array('nom' => htmlspecialchars($nouveau_etc_nom, ENT_QUOTES)));
			$requeteAjout->closeCursor();
			$requeteEtc = $bdd->prepare('SELECT etc_id FROM Etat_civil ORDER BY etc_id DESC LIMIT 1');
			$requeteEtc->execute();
			$donneeEtc = $requeteEtc->fetch();
			$this->idEtc = $donneeEtc['etc_id'];
			$requeteEtc->closeCursor();
			$_SESSION['message'] = 'État civil enregistrer';
		} else { // sinon on récupère l'ID etc du formulaire
			$this->idEtc = $etc_nom;
			$_SESSION['message'] = 'État civil Ok';
		}
	}
	
	public function statutJuridique($bdd, $nouveau_sta_nom, $sta_nom, $commentaire_statut) {
		if(!empty($nouveau_sta_nom)) {	// Si le statut est nouveau, on l'enregistre
			$requeteStaNom = $bdd->prepare('INSERT INTO Statut(sta_nom, sta_commentaire) VALUES (:nom, :commentaire)');
			$requeteStaNom->execute(array(
									'nom' => htmlspecialchars($nouveau_sta_nom, ENT_QUOTES),
									'commentaire' => htmlspecialchars($commentaire_statut, ENT_QUOTES)));
			$requeteStaNom->closeCursor();
			$requeteSta = $bdd->prepare('SELECT sta_id FROM Statut ORDER BY sta_id DESC LIMIT 1');
			$requeteSta->execute();
			$donneeSta = $requeteSta->fetch();
			$this->idSta = $donneeSta['sta_id'];
			$requeteSta->closeCursor();
		} else {
			$this->idSta = $sta_nom;
		}
	}
	
	public function denomination($bdd, $nouveau_den_nom, $den_nom, $den_description, $den_commentaire) {
		if(!empty($nouveau_den_nom)) {	// Si le statut est nouveau, on l'enregistre
			
			$requeteDenNom = $bdd->prepare('INSERT INTO Denomination(den_nom, den_description, den_commentaire, den_sta_id) VALUES (:nom, :description, :commentaire, :statut)');
			$requeteDenNom->execute(array(
									'nom' => htmlspecialchars($nouveau_den_nom, ENT_QUOTES),
									'description' => htmlspecialchars($den_description, ENT_QUOTES),
									'commentaire' => htmlspecialchars($den_commentaire, ENT_QUOTES),
									'statut' => $this->idSta));
			$requeteDenNom->closeCursor();
			$requeteDen = $bdd->prepare('SELECT den_id FROM Denomination ORDER BY den_id DESC LIMIT 1');
			$requeteDen->execute();
			$donneeDen = $requeteDen->fetch();
			$this->idDen = $donneeDen['den_id'];
			$requeteDen->closeCursor();			
		} else {
			$this->idDen = $den_nom;
		}
	}
	
	public function enregistrementPublic($bdd, $pub_nom, $pub_prenom, $pub_pseudo) {
		$dateJour = date('Y-m-d');
		$requetePublic = $bdd->prepare('INSERT INTO Publics(pub_nom, pub_prenom, pub_date, pub_pseudo, pub_etc_id, pub_den_id)
		VALUES (:nom, :prenom, :dateJour, :pseudo, :etc, :den)');
		$requetePublic->execute(ARRAY(
								'nom' => htmlspecialchars($pub_nom, ENT_QUOTES),
								'prenom' => htmlspecialchars($pub_prenom, ENT_QUOTES),
								'dateJour' => $dateJour,
								'pseudo' => htmlspecialchars($pub_pseudo, ENT_QUOTES),
								'etc' => $this->idEtc,
								'den' => $this->idDen));
		$requetePublic->closeCursor();
		// Récupération du dernier I du public pour le transmettre aux autres fonctions
		$requeteID = $bdd->prepare('SELECT pub_id FROM Publics ORDER BY pub_id DESC LIMIT 1');
		$requeteID->execute();
		$donneeID = $requeteID->fetch();
		$this->idPublic = $donneeID['pub_id'];
		$requeteID->closeCursor();
	}
	
	public function qualite($bdd, $nouvelle_qua_nom, $qua_nom, $qua_description, $qua_commentaire) {
		$dateJour = date('Y-m-d');
		if (!empty($nouvelle_qua_nom)) {
			$requeteQuaNom = $bdd->prepare('INSERT INTO Qualite(qua_nom, qua_description, qua_commentaire) VALUES (:nom, :description, :commentaire)');
			$requeteQuaNom->execute(array(
									'nom' => htmlspecialchars($nouvelle_qua_nom, ENT_QUOTES),
									'description' => htmlspecialchars($qua_description, ENT_QUOTES),
									'commentaire' => htmlspecialchars($qua_commentaire, ENT_QUOTES)));
			$requeteQuaNom->closeCursor();
			$requeteQua = $bdd->prepare('SELECT qua_id FROM Qualite ORDER BY qua_id DESC LIMIT 1');
			$requeteQua->execute();
			$donneeQua = $requeteQua->fetch();
			$this->idQua = $donneeQua['qua_id'];
			$requeteQua->closeCursor();
		} else { // sinon on récupère l'ID qua du formulaire
			$this->idQua = $qua_nom;
		}
		$requeteEvo = $bdd->prepare('INSERT INTO Evolution(evo_pub_id, evo_qua_id, evo_date) VALUES (
									:pub, :qua, :datejour)');
		$requeteEvo->execute(array( 
								'pub' => $this->idPublic,
								'qua' => $this->idQua,
								'datejour' => $dateJour));
		$requeteEvo->closeCursor();
	}
	
	public function pays($bdd, $nouveau_pay_code, $nouveau_pay_nom, $pay_nom, $pay_description, $pay_commentaire) {
		if (!empty($nouveau_pay_nom)) {
			$requetePayNom = $bdd->prepare('INSERT INTO Pays(pay_code, pay_nom, pay_description, pay_commentaire) VALUES (:code, :nom, :description, :commentaire)');
			$requetePayNom->execute(array(
							'code' =>htmlspecialchars($nouveau_pay_code, ENT_QUOTES),
							'nom' =>htmlspecialchars($nouveau_pay_nom, ENT_QUOTES),
							'description' =>htmlspecialchars($pay_description, ENT_QUOTES),
							'commentaire' =>htmlspecialchars($pay_commentaire, ENT_QUOTES)));
			$this->codePay = $donneepay['pay_code'];
			$requetePayNom->closeCursor();
		} else { // sinon on récupère l'ID pay du formulaire
			$requetePay = $bdd->prepare('SELECT pay_code FROM Pays WHERE pay_nom = $pay_nom');
			$requetePay->execute();
			$donneePay = $requetePay->fetch();
			$this->codePay = $donnee['pay_code'];
			$requetePay->closeCursor();
		}
	}
	
	public function codePostal($bdd, $nouveau_cp_code, $cp_code) {
		if (!empty($nouveau_cp_code)) {
			$requeteCP = $bdd->prepare('INSERT INTO Code_postal(cp_code) VALUES (?)');
			$requeteCP->execute(array(htmlspecialchars($nouveau_cp_code, ENT_QUOTES)));
			$requeteCP->closeCursor();
			$requetePC = $bdd->prepare('SELECT cp_id FROM Code_postal ORDER BY cp_id DESC LIMIT 1');
			$requetePC->execute();
			$donneePC = $requetePC->fetch();
			$this->idCP = $donnee['cp_id'];
			$requetePC->closeCursor();
		} else {
			$this->idCP = $cp_code;
		}
	}
	
 	public function ville($bdd, $nouvelle_vil_nom, $vil_nom) {
		if (!empty($nouvelle_vil_nom)) {
			$requeteVilNom = $bdd->prepare('INSERT INTO Ville(vil_nom, vil_cp_id, vil_pay_code) VALUES (:nom, :cp, :pays)');
			$requeteVilNom->execute(array(
								'nom' => htmlspecialchars($nouvelle_vil_nom, ENT_QUOTES),
								'cp' => $this->idPC,
								'pays' => $this->codePay));
			$requeteVilNom->closeCursor();
			$requeteVille = $bdd->prepare('SELECT vil_id FROM Ville ORDER BY vil_id DESC LIMIT 1');
			$requeteVille->execute();
			$donneeVille = $requeteVille->fetch();
			$this->idVil = $donneeVille['vil_id'];
			$requeteVille->closeCursor();
		} else {
			$this->idVil = $vil_nom;
		}
	}
	
	/* public function adresse($adr_lieu, $adr_voirie, $adr_mention) {
		$requeteAdresse = $bdd->prepare('INSERT INTO Adresse(adr_lieu, adr_voirie, adr_mention, adr_vil_id, adr_pub_id) VALUES (:lieu, :voirie, :mention, :ville, :pub)');
		$requeteAdresse->execute(array(
							'lieu' => htmlspecialchars($adr_lieu, ENT_QUOTES),
							'voirie' => htmlspecialchars($adr_voirie, ENT_QUOTES),
							'mention' => htmlspecialchars($adr_mention, ENT_QUOTES),
							'ville' => $idVille,
							'pub' => $idPublic));
		$requeteAdresse->closeCursor();
	} */
	
	/* public function email($adresse_email) {
		list($utilisateur, $dns) = explode("@", htmlspecialchars($adresse_email, ENT_QUOTES));
		$requeteDns = $bdd->prepare('SELECT dns_nom FROM Dns_mail WHERE dns_nom = ?');
		$requeteDns->execute(array($dns));
		if ($requeteDns->rowCount() == 0 ) {
			$requete = $bdd->prepare('INSERT INTO Dns_mail(dns_nom) VALUES (?)');
			$requete->execute(array($dns));
			$requete->closeCursor();
			$requeteIdDns = $bdd->prepare('SELECT dns_id FROM Dns_mail ORDER BY dns_id ASC LIMIT 1');
			$requeteIdDns->execute();
			$donneeIdDns = $requeteIdDns->fetch();
			$idDns = $donneeIdDns['dns_id'];
			$requeteIdDns->closeCursor();
		} else {
			$idDns = $dns;
		}
	
		$requeteMail = $bdd->prepare('INSERT INTO Utilisateur(utm_nom, utm_dns_id, utm_pub_id) VALUES (:nom, :dns, :pub)');
		$requeteMail->execute(array(
							'nom' => $utilisateur,
							'dns' => $idDns,
							'pub' => $idPublic));
		$requeteMail->closeCursor();
	} */
	
	/* public function typeTelephone($nouveau_type_telephone, $type_telephone) {
		if (!empty($nouveau_type_telephone)) {
			$requetetyp_tel = $bdd->prepare('INSERT INTO Type_telephone(typtel_nom) VALUES (?)');
			$requetetyp_tel->execute(array(htmlspecialchars($nouveau_type_telephone, ENT_QUOTES)));
			$requetetyp_tel->closeCursor();
			$requeteTyp = $bdd->prepare('SELECT typtel_id FROM Type_telephone ORDER BY typtel_id DESC LIMIT 1');
			$requeteTyp->execute();
			$donneeTyp = $requetetyp->fetch();
			global $idTyp; $idTyp = $donneeTyp['typtel_id'];
			$requeteTyp->closeCursor();
		} else { // sinon on récupère l'ID typTel du formulaire
			global $idTyp; $idTyp = $type_telephone;
		}
	} */
	
	/* public function telephone($numero_telephone) {
		if (!empty($numero_telephone)) {
			$requeteTelephone = $bdd->prepare('INSERT INTO Telephone(tel_numero, tel_typtel_id) VALUES (:numero, :type)');
			$requeteTelephone->execute(array(
							'numero' => htmlspecialchars($numero_telephone, ENT_QUOTES),
							'type' => $idTyp));
			$requeteTelephone->closeCursor();
			$requeteIdTelephone = $bdd->prepare('SELECT tel_id FROM Telephone ORDER BY tel_id DESC LIMIT 1');
			$requeteIdTelephone->execute();
			$donneeIdTelephone = $requeteIdTelephone->fetch();
			$idTelephone = $donnee['tel_id'];
			$requeteIdTelephone->closeCursor();
			$requeteContact = $bdd->prepare('INSERT INTO Contact(con_tel_id, con_pub_id) VALUES (:telephone, :public)');
			$requeteContact->execute(array(
									'telephone' => $idTelephone,
									'public' => $idPublic));
			$requeteContact->closeCursor();
		}
	} */
	
	
}
?>

