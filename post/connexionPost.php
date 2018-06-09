<?php
session_start();

include "../class/exception.php";
include "../class/connectionBDD.php";
$bdd = ConnectionBDD::getLiaison();
/* include "../include/depart.php"; */


function xss($dirtyChamp) {
	if (empty($dirtyChamp)) {
		throw new NoelException('Aucune valeur [1]');
	}
	$cleanChamp = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($dirtyChamp));
	return $cleanChamp;
}

	if (isset($_POST['connexion'])) {
		sleep(1);
// Pseudo
		if (isset($_POST['pub_pseudo_I']) && !empty($_POST['pub_pseudo_I'])) {
			try {
				$pubPseudo = xss($_POST['pub_pseudo_I']);
			}
			catch (NoelException $e) { echo $e;}
			
			$requetePseudo = $bdd->prepare('SELECT pub_pseudo FROM Publics WHERE pub_pseudo = ?');
			$requetePseudo->execute(array($pubPseudo));
			if ($requetePseudo->rowCount() != 1) {
				$_SESSION['message'] = 'Formulaire non conforme 9 ';
				header('Location:../connexion.php');
				exit();
			}
		}
// Password		
		if (isset($_POST['pwd_mot']) && !empty($_POST['pwd_mot'])) {
			try {
				$pwdMot = xss($_POST['pwd_mot']);
			}
			catch (NoelException $e) { echo $e;}
			
			$requetePwd = $bdd->prepare('SELECT pub_pseudo, pwd_mot FROM Publics JOIN Password ON pwd_pub_id = pub_id WHERE pub_pseudo = ? ORDER BY pwd_date DESC LIMIT 1');
			$requetePwd->execute(array($pubPseudo));
			$donneePwd = $requetePwd->fetch();
			$pseudo = $donneePwd['pub_pseudo'];
			$mot = $donneePwd['pwd_mot'];
			$requetePwd->closeCursor();
			
			if (password_verify($pwdMot, $mot)) {
				
			
				/* Ce cod ne fonctionne pas, je ne comprends pas pourquoi.... (je n'ai plus de cheveux sur ma tête...)
				include "../class/connexionManager.php";
				$user = new ConnexionManager($bdd, $pubPseudo, $pubNom, $pubPrenom, $pwdMot, $dnsNom, $utmNom, $pubEtcId, $pubDenId);
				$user->vent();
				$user->UserConnexion($bdd, $pubPseudo); */
				$requeteEvolution = $bdd->prepare('SELECT pub_prenom, evo_qua_id FROM Publics JOIN Evolution ON evo_pub_id = pub_id WHERE pub_pseudo = ? ORDER BY evo_date DESC LIMIT 1');
				$requeteEvolution->execute(array($pubPseudo));
				$donneEvolution = $requeteEvolution->fetch();
				$qualite = $donneEvolution['evo_qua_id'];
				$prenom = $donneEvolution['pub_prenom'];
				$requeteEvolution->closeCursor();
				$_SESSION['userPrenom'] = $prenom;
				$_SESSION['userPseudo'] = $pubPseudo;
				$_SESSION['userQualite'] = $qualite;
				$_SESSION['message'] = 'Bonjour '.$_SESSION['userPrenom'].', comment allez-vous ?';
			
				if ($qualite < 4) {
					header('Location:../forum.php');
					exit();
				} elseif ($qualite == 4) {
					header('Location:../back_end/accueil_back_end.php');
					exit();
				} elseif ($qualite == 5) {
					header('Location:../back_end/accueil_back_end.php');
					exit();
				} else {
					header('Location:HTTP://www.youtube.com/watch?v=KRf-A9sbu04');
					exit();
				}
				
				
			} else {
				
				$_SESSION['message'] = 'Formulaire non conforme 10 ';
				header('Location:../connexion.php');
				exit();
			}
		}
	}
	
	if (isset($_POST['inscription'])) {
		sleep(1);
// Etat civil	
		if (isset($_POST['etc_nom']) && !empty($_POST['etc_nom'])) {
			try {
				$pubEtcId = xss($_POST['etc_nom']);
			}
			catch (NoelException $e) { echo $e;}
		}

// prenom		
		if (isset($_POST['pub_prenom']) && !empty($_POST['pub_prenom'])) {
			try {
				$pubPrenom = xss($_POST['pub_prenom']);
			}
			catch (NoelException $e) { echo $e;}
		} else {
			$pubPrenom = '-';
		}
// Nom		
		if (isset($_POST['pub_nom']) && !empty($_POST['pub_nom'])) {
			try {
				$pubNom = xss($_POST['pub_nom']);
			}
			catch (NoelException $e) { echo $e;}
			
		} else {
			$_SESSION['message'] = 'Formulaire non conforme 1 ';
				header('Location:../connexion.php');
				exit();
		}
// Dénomination	
		if (isset($_POST['den_nom']) && !empty($_POST['den_nom'])) {
			try {
				$pubDenId = xss($_POST['den_nom']);
			}
			catch (NoelException $e) { echo $e;}
		}
// pseudo		
		if (isset($_POST['pub_pseudo_NI']) && !empty($_POST['pub_pseudo_NI'])) {
			try {
				$pubPseudo = xss($_POST['pub_pseudo_NI']);
			}
			catch (NoelException $e) { echo $e;}
			
			$requetePseudo = $bdd->prepare('SELECT pub_pseudo FROM Publics WHERE pub_pseudo = ?');
			$requetePseudo->execute(array($pubPseudo));
			if ($requetePseudo->rowCount() != 0) {
				$requetePseudo->closeCursor();
				$_SESSION['message'] = 'Formulaire non conforme 2 ';
				header('Location:../connexion.php');
				exit();
			}	
		} else {
			$_SESSION['message'] = 'Formulaire non conforme 3';
				header('Location:../connexion.php');
				exit();
		}
// Email		
		if (isset($_POST['email']) && !empty($_POST['email'])) {
			try {
				$email = xss($_POST['email']);
			}
			catch (NoelException $e) { echo $e;}
			
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$_SESSION['message'] = 'Formulaire non conforme 4';
				header('Location:../connexion.php');
				exit();
			} else {
				list($utmNom, $dnsNom) = explode("@",$email);
				$requeteMail = $bdd->prepare('SELECT CONCAT(utm_nom, \'@\', dns_nom) AS adresse FROM Utilisateur_mail JOIN dns_mail ON dns_id = utm_dns_id WHERE CONCAT(utm_nom, \'@\', dns_nom) = ?');
				$requeteMail->execute(array($email));
				if ($requeteMail->rowCount() != 0) {
					$_SESSION['message'] = 'Formulaire non conforme 5';
					header('Location:../connexion.php');
					exit();
				}
			}
		}	
			
// password
		if (isset($_POST['password1']) && !empty($_POST['password1'])) {
			if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6}$#',$_POST['password1'])) {
				try {
					$mot = xss($_POST['password1']);
				}
				catch (NoelException $e) { echo $e;}
			
				$pwdMot =  password_hash($mot, PASSWORD_DEFAULT);
			} else {
				$_SESSION['message'] = 'Formulaire non conforme 6 ';
				header('Location:../connexion.php');
				exit();
			}
			$requetePassword = $bdd->prepare('SELECT pwd_mot FROM Password WHERE PWD_mot = ?');
			$requetePassword->execute(array($pwdMot));
			if ($requetePassword->rowCount() != 0) {
				$requetePassword->closeCursor();
				$_SESSION['message'] = 'Formulaire non conforme 7 ';
				header('Location:../connexion.php');
				exit();
			}
		}
		
		if (isset($_POST['password2']) && !empty($_POST['password2'])) {
			try {
				$pwdMot2 = xss($_POST['password2']);
			}
			catch (NoelException $e) { echo $e;}
			
			if ($mot != $pwdMot2) {
				$_SESSION['message'] = 'Formulaire non conforme 8 ';
				header('Location:../connexion.php');
				exit();
			}
		}

// Reglement
		if (isset($_POST['reglement']) && !empty($_POST['reglement'])) {
			try {
				$reglement = xss($_POST['reglement']);
			}
			catch (NoelException $e) { echo $e;}
			
			if ($reglement != 'on') {
				$_SESSION['message'] = 'Formulaire non conforme 9 ';
				header('Location:../connexion.php');
				exit();
			} else {
				include "../class/connexionManager.php";
				$user = new ConnexionManager($bdd, $pubPseudo, $pubNom, $pubPrenom, $pwdMot, $dnsNom, $utmNom, $pubEtcId, $pubDenId);
				$user->vent();
				$user->addUtilisateur($bdd, $pubNom, $pubPrenom, $pubPseudo, $pubEtcId, $pubDenId, $pwdMot, $dnsNom, $utmNom);
			}
		}			
	}
	
	if(!isset($_POST['connexion']) && !isset($_POST['inscription'])) {
		$_SESSION['message'] = 'Ligne 217 connexion post';
		header('Location:../public.php');
		exit();
	}
?>