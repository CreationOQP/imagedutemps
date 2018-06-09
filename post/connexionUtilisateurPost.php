<?php
session_start();
include "../class/connectionBDD.php";
$bdd = ConnectionBDD::getLiaison();


	if(isset($_POST['connexion'])) {
		if (!isset($_POST['pub_pseudo']) || empty($_PSOT['pub_pseudo']) || !isset($_POST['pwd_mot']) || empty($_PSOT['pwd_mot'])) {
			$_SESSION['message'] = 'Vous n\'oubliez pas quelque chose !!!';
			header('Location:../connexion.php');
			exit();
		}
		
		if (isset($_POST['pub_pseudo']) && !empty($_PSOT['pub_pseudo'])) {
			$pubPseudo = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['pub_pseudo']));
			$requeteCompte = $bdd->prepare('SELECT pub_id, pub_pseudo FROM Publics WHERE pub_pseudo = ?');
			$requeteCompte->execute(array($pubPseudo));
			$donneeCompte = $requeteCompte->fetch();
			$idPub = $donneeCompte['pub_id'];
			
			if ($requeteCompte->rowCount() != 1) {
				$requeteCompte->closeCursor();
				$_SESSION['message'] = 'Retaper votre pseudo !!!';
				header('Location:../connexion.php');
				exit();
			}
		}
		
		if (isset($_POST['pwd_mot']) && !empty($_PSOT['pwd_mot'])) {
			$password = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['pwd_mot']));
			$pwdMot = password_hash($password, PASSWORD_DEFAULT);
					
			$requetePassword = $bdd->prepare('SELECT pwd_mot FROM Password WHERE pwd_pub_id = ? ORDER BY pwd_date DESC LIMIT 1');
			$requetePassword->execute(array($idPub));
			$donneePassword = $requetePassword->fletch();
			$pwdMotBdd = $donneePassword['pwd_mot'];
			$requetePassword->closeCursor();
			
			if ($pwdMot == $pwdMotBdd) {
				include "../class/connexionManager.php";
				$userConnection = new ConnexionManager($bdd, $pubEtcId, $pubPrenom, $pubNom, $pubDenId, $pubPseudo, $utmNom, $dnsNom, $pwdMot, $_COOKIE['vol'], $_SESSION['migration'], $idPub);
				
				$userConnection->connexionUser($bdd, $pubPseudo, $idPub);
				
				$userConnection->vent();

			// redirection
				$_SESSION['message'] = 'Bonjour '.$pubPrenom.' nous sommes heureux de vous compter parmi nos membres ...';
				header('Location:../back_end/accueil_back_end.php');
				exit();
				
			} else {
				$_SESSION['message'] = 'Retaper votre mot de passe !!!';
				header('Location:../connexion.php');
				exit();
			}
		}		
	}
	
	if(isset($_POST['inscription'])) {

// Etat civil	
		if (isset($_POST['etc_nom']) && !empty($_POST['etc_nom'])) {
			$pubEtcId = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['etc_nom']));
		}

// prenom		
		if (isset($_POST['pub_prenom']) && !empty($_POST['pub_prenom'])) {
			$pubPrenom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['pub_prenom']));
		}

// Nom		
		if (isset($_POST['pub_nom']) && !empty($_POST['pub_nom'])) {
			$pubNom = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['pub_nom']));
		} else {
			$_SESSION['message'] = '1 le nom n\'est pas remplie ';
				header('Location:../connexion.php');
				exit();
		}
// Dénomination	
		if (isset($_POST['den_nom']) && !empty($_POST['den_nom'])) {
			$pubDenId = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['den_nom']));
		}

// pseudo		
		if (isset($_POST['pub_pseudo']) && !empty($_POST['pub_pseudo'])) {
			$pubPseudo = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['pub_pseudo']));
			$requetePseudo = $bdd->prepare('SELECT pub_pseudo FROM Publics WHERE pub_pseudo = ?');
			$requetePseudo->execute(array($pubPseudo));
			if ($requetePseudo->rowCount() != 0) {
				$requetePseudo->closeCursor();
				$_SESSION['message'] = 'Pseudo existe déjà ...2 ';
				header('Location:../connexion.php');
				exit();
			}
		} else {
			$_SESSION['message'] = '3 le pseudo n\'est pas remplie';
				header('Location:../connexion.php');
				exit();
		}

// adresse		
		if (isset($_POST['adresse']) && !empty($_POST['adresse'])) {
			$adresse = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['adresse']));
			$testEmali = filter_val($adresse, FILTER_VALIDATE_EMAIL);
			if ($adresse == $testEmail) {
				list($utmNom, $dnsNom) = explode("@",$adresse);
			} else {
				$_SESSION['message'] = '4 adresse mail non valide ';
				header('Location:../connexion.php');
				exit();
			}
			$requeteMail = $bdd->prepare('SELECT utm_nom, dns_nom FROM Utilisateur_mail
											JOIN Dns_mail ON dns_id = utn_dns_id
											WHERE utm_nom = ?');
			$requeteMail->execute(array($utmNom));
			$donneMail = $requeteMail->fetch();
			$resultat = $requeteMail->rowCount();
			$compteTour = 0;
			$Compteur = 0;
			$mail = $utmNom.'@'.$dnsNom;
			WHILE ($compteur == 0 || $compteTour != $resultat) {
				if ($mail == $donneMail['utmNom'].'@'.$donneMail['dns_nom']) {
					$compteur++;
					$compteTour++;
				}
			}
			if ($compteur != 0) {
				$requeteMail->closeCursor();
				$_SESSION['message'] = 'adresse mail existe déjà ...5';
				header('Location:../connexion.php');
				exit();
			}
		} else {
			$_SESSION['message'] = '6 adresse mail non remplie ';
			header('Location:../connexion.php');
			exit();
		}

// password1		
		if (isset($_POST['password1']) && !empty($_POST['password1'])) {
			if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6}$#',$_POST['password1'])) {
				$pwdMot = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['password1']));
			} else {
				$_SESSION['message'] = '7 password non valide ';
				header('Location:../connexion.php');
				exit();
			}
			// haschage avec conservation des valeurs par défault pour le sel et le cost
			$pwdMot = password_hash($password1, PASSWORD_DEFAULT);
			
			$requetePassword = $bdd->prepare('SELECT pwd_mot FROM Password WHERE pwd_mot = ?');
			$requetePassword->execute(array($pwdMot));
			if ($requetePassword->rowCount() != 0) {
				$requetePassword->closeCursor();
				$_SESSION['message'] = 'Mot de passe existe déjà  8 ';
				header('Location:../connexion.php');
				exit();
			}
		} else {
			$_SESSION['message'] = '9 password non remplie ';
			header('Location:../connexion.php');
			exit();
		}

// password2		
		if (isset($_POST['password2']) && !empty($_POST['password2'])) {
			$password2 = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['password2']));
			if ($password1 != $password2) {
				$_SESSION['message'] = '10 mot de passe non identique ';
				header('Location:../connexion.php');
				exit();
			}
		} else {
			$_SESSION['message'] = '11 mot de passe 2 non remplie ';
			header('Location:../connexion.php');
			exit();
		}

// reglement		
		if (isset($_POST['reglement']) && !empty($_POST['reglement'])) {
			$reglement = str_replace(array("\n","\r",PHP_EOL),'',htmlspecialchars($_POST['reglement']));
			if ($reglement != 'on') {
				$_SESSION['message'] = '9 Réglement non valide ';
				header('Location:../connexion.php');
				exit();
			}
		} else {
			$_SESSION['message'] = '12 réglement non remplie ';
			header('Location:../connexion.php');
			exit();
		}
// appel de la classe
		include "../class/connexionManager.php";
		$ajoutUtilisateur = new ConnexionManager($bdd, $pubEtcId, $pubPrenom, $pubNom, $pubDenId, $pubPseudo, $utmNom, $dnsNom, $pwdMot);
		$ajoutUtilisateur->inscription($bdd, $pubEtcId, $pubPrenom, $pubNom, $pubDenId, $pubPseudo, $utmNom, $dnsNom, $pwdMot);
		$ajoutUtilisateur->vent();

// redirection
		$_SESSION['message'] = 'Bonjour '.$pubPrenom.' nous sommes heureux de vous compter parmi nos membres ...';
		header('Location:../back_end/accueil_back_end.php');
		exit();
		
	} else {
		$_SESSION['message'] = '13 formulaire non remplie ';
		header('Location:../connexion.php');
		exit();	
	}
	
	if (!isset($_POST['inscription']) && !isset($_POST['connection'])) {
		header('Location:../index.php');
		exit();
	}
?>