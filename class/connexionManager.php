<?php
	class ConnexionManager {
		
		private $pubPseudo;
		private $pubNom;
		private $pubPrenom;
		private $pwdMot;
		private $dnsNom;
		private $utmNom;
		private $pubEtcId;
		private $pubDenId;
		
		public function __construct($bdd, $pubPseudo, $pubNom, $pubPrenom, $pwdMot, $dnsNom, $utmNom, $pubEtcId, $pubDenId) {
			$this->bdd = $bdd;
			$this->pubPseudo = $pubPseudo;
			$this->pubNom = $pubNom;
			$this->pubPrenom = $pubPrenom;
			$this->pwdMot = $pwdMot;
			$this->dnsNom = $dnsNom;
			$this->utmNom = $utmNom;
			$this->pubEtcId = $pubEtcId;
			$this->pubDenId = $pubDenId;
		}
		
		public function vent() { // À mettre en place
			$duree = 60*20; // 20 minutes
			$pie = session_id().microtime().rand(0,99999999);
			$pie = hash('sha256', $pie);
			setcookie('vol', $pie, time()+ $duree, null, null, false, true);
			$_SESSION['migration'] = $pie;
		}
		
		public function UserConnexion ($bdd, $pubPseudo) {
			$requeteEvolution = $bdd->prepare('SELECT pub_prenom, evo_qua_id FROM Publics JOIN Evolution ON evo_pub_id = pub_id WHERE pub_pseudo = ? ORDER BY evo_date DESC LIMIT 1');
			$requeteEvolution->execute(array($pubPseudo));
			$donneEvolution = $requeteEvolution->fetch();
			$qualite = $donneEvolution['evo_qua_id'];
			$prenom = $donneEvolution['pub_prenom'];
			$requeteEvolution->closeCursor();
			$_SESSION['userPrenom'] = $prenom;
			$_SESSION['userPseudo'] = $pubPseudo;
			$_SESSION['userQualite'] = $qualite;
			$_SESSION['message'] = 'Bonjour '.$_SESSION['userPrenom'].', comment vous allez bien ?';
			
			if ($qualite < 4) {
				header('Location:../forum.php');
				exit();
			} elseif ($qualite == 4 || $qualite == 5) {
				header('Location:../backEnd/accueilBackEnd.php.php');
				exit();
			} else {
				header('Location:HTTP://www.youtube.com/watch?v=KRf-A9sbu04');
				exit();
			}
				
		}
		
		public function addUtilisateur($bdd, $pubNom, $pubPrenom, $pubPseudo, $pubEtcId, $pubDenId, $pwdMot, $dnsNom, $utmNom) {
			$dateJour = date('Y-m-d');
// Table Publics
			$requetePublics = $bdd->prepare('INSERT INTO Publics(pub_nom, pub_prenom, pub_date, pub_pseudo, pub_etc_id, pub_den_id) VALUES (:nom, :prenom, :jourDate, :pseudo, :etc, :den)');
			$requetePublics->execute(array(
									'nom' => $pubNom,
									'prenom' => $pubPrenom,
									'jourDate' => $dateJour,
									'pseudo' => $pubPseudo,
									'etc' => $pubEtcId,
									'den' => $pubDenId));
			$requetePublics->closeCursor();
			$requetePublicId = $bdd->prepare('SELECT pub_id FROM Publics WHERE pub_pseudo = ?');
			$requetePublicId->execute(array($pubPseudo));
			$donneePublicId = $requetePublicId->fetch();
			$idPublics = $donneePublicId['pub_id'];
			$requetePublicId->closeCursor();
// Table Password
			$requetePassword = $bdd->prepare('INSERT INTO Password(pwd_mot, pwd_pub_id, pwd_date) VALUES (:mot, :pub, :jourDate)');
			$requetePassword->execute(array(
									'mot' => $pwdMot,
									'pub' => $idPublics,
									'jourDate' => $dateJour));
			$requetePassword->closeCursor();
// Email dns
			$requeteDnsNom = $bdd->prepare('SELECT dns_nom FROM Dns_mail WHERE DNS_nom = ?');
			$requeteDnsNom->execute(array($dnsNom));
			if ($requeteDnsNom->rowCount() != 1) {
				$requeteDnsNom->closeCursor();
				$requeteDns = $bdd->prepare('INSERT INTO Dns_mail(dns_nom) VALUES (?)');
				$requeteDns->execute(array($dnsNom));
				$requeteDns->closeCursor();
			
				$requeteDnsId = $bdd->prepare('SELECT dns_id FROM Dns_mail WHERE dns_nom = ?');
				$requeteDnsId->execute(array($dnsNom));
				$donneeDnsId = $requeteDnsId->fetch();
				$idDns = $donneeDnsId['dns_id'];
				$requeteDnsId->closeCursor();
			} else {
				$requeteDnsId = $bdd->prepare('SELECT dns_id FROM Dns_mail WHERE dns_nom = ?');
				$requeteDnsId->execute(array($dnsNom));
				$donneeDnsId = $requeteDnsId->fetch();
				$idDns = $donneeDnsId['dns_id'];
				$requeteDnsId->closeCursor();
			}
// Email utilisateur			
			$requeteUtilisateurMail = $bdd->prepare('INSERT INTO Utilisateur_mail(utm_nom, utm_dns_id, utm_pub_id) VALUES (:nom, :dns, :pub)');
			$requeteUtilisateurMail->execute(array(
										'nom' => $utmNom,
										'dns' => $idDns,
										'pub' => $idPublics));
			$requeteUtilisateurMail->closeCursor();
// Qualite
			$requeteQualite = $bdd->prepare('INSERT INTO Evolution(evo_pub_id, evo_qua_id, evo_date, evo_commentaire) VALUES(:pub, :qua, :jourDate, :commentaire)');
			$requeteQualite->execute(array(
									'pub' => $idPublics,
									'qua' => 3,
									'jourDate' => $dateJour,
									'commentaire' => 'Evolution inscription'));
			$requeteQualite->closeCursor();
			if ($pubPrenom != '-') {
				$_SESSION['message'] = 'Bonjour '.$pubPrenom.', comment allez-vous ?';
				$_SESSION['userPrenom'] = $pubPrenom;
			} else {
				$_SESSION['message'] = 'Bonjour '.$pubPseudo.', comment allez-vous ?';
				$_SESSION['userPrenom'] = $pubPrenom;
			}
			$_SESSION['userPseudo'] = $pubPseudo;
			$_SESSION['userQualite'] = 3;
			$_SESSION['date'] = $dateJour;
			
			header('Location:../forum.php');
			exit();
			
		}
	}
?>