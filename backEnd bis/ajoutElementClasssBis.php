<?php

Class Ajout{
	
	private $theNom;
	private $theDescription;
	private $theCommentaire;
	public function addTheme($bdd, $theNom, $theDescription, $theCommentaire) {
		// Vérification si le theme existe déjà
		$requete = $bdd->prepare('SELECT the_nom FROM Theme WHERE the_nom = ?');
		$requete->execute(array($theNom));
		if ($requete->rowCount() != 0) {
			$_SESSION['message'] = 'Le thème existe déjà';
			$requete->closeCursor();
			header('Location:../backEnd/ajoutElement.php');
			exit();
		} else {
			$requete->closeCursor();
			$requeteAjout = $bdd->prepare('INSERT INTO Theme(the_nom, the_description, the_commentaire)
									VALUES (:nom, :description, :commentaire)');
			$requeteAjout->execute(array(
							'nom' => $theNom,
							'description' => $theDescription,
							'commentaire' => $theCommentaire));
			$requeteAjout->closeCursor();
			$_SESSION['message'] = 'Le thème '.$theNom.' est bien enregistré';
			header('Location:../backEnd/ajoutElement.php');
			exit();
		}
	}
	
	private $lieNom;
	private $lieDescription;
	private $lieCommentaire;
	public function addLieu($bdd, $lieNom, $lieDescription, $lieCommentaire) {
		// Vérification si le lieu existe déjà
		$requete = $bdd->prepare('SELECT lie_nom FROM Lieu WHERE lie_nom = ?');
		$requete->execute(array($lieNom));
		if ($requete->rowCount() != 0) {
			$_SESSION['message'] = 'Le lieu existe déjà';
			$requete->closeCursor();
			header('Location:../backEnd/ajoutElement.php');
			exit();
		} else {
			$requete->closeCursor();
			$requeteAjout = $bdd->prepare('INSERT INTO Lieu(lie_nom, lie_description, lie_commentaire)
								VALUES (:nom, :description, :commentaire)');
			$requeteAjout->execute(array(
							'nom'=> $lieNom,
							'description'=> $lieDescription,
							'commentaire'=> $lieCommentaire));
			$requeteAjout->closeCursor();
			$_SESSION['message'] = 'Le lieu '.$lieNom.' est bien enregistré.';
			header('Location:../backEnd/ajoutElement.php');
			exit();
		}
	}
		
	private $typDiaNom;
	private $typDiaDescription;
	private $typDiaCommentaire;
	public function addType($bdd, $typDiaNom, $typDiaDescription, $typDiaCommentaire) {
		// Vérification si le type existe déjà
		$requete = $bdd->prepare('SELECT typdia_nom FROM Type_diapo WHERE typdia_nom = ?');
		$requete->execute(array($typDiaNom));
		if ($requete->rowCount() != 0) {
			$_SESSION['message'] = 'Le type de diapo existe déjà';
			$requete->closeCursor();
			header('Location:../backEnd/ajoutElement.php');
			exit();
		} else {
			$requete->closeCursor();
			$requeteAjout = $bdd->prepare('INSERT INTO Type_diapo(typdia_nom, typdia_description, typdia_commentaire)
								VALUES (:nom, :description, :commentaire)');
			$requeteAjout->execute(array(
							'nom'=> $typDiaNom,
							'description'=> $typDiaDescription,
							'commentaire'=> $typDiaCommentaire));
			$requeteAjout->closeCursor();
			$_SESSION['message'] = 'Le type '.$typDiaNom.' est bien enregistré.';
			header('Location:../backEnd/ajoutElement.php');
			exit();
		}
	}
	
	private $epoAnnee;
	private $epoDescription;
	private $epoCommentaire;
	public function addEpoque($bdd, $epoAnnee, $epoDescription, $epoCommentaire) {
		// Vérification si l'epoque existe déjà
		$requete = $bdd->prepare('SELECT epo_annee FROM Epoque WHERE epo_annee = ?');
		$requete->execute(array($epoAnnee));
		if ($requete->rowCount() != 0) {
			$_SESSION['message'] = "L'époque existe déjà !";
			$requete->closeCursor();
			header('Location:../backEnd/ajoutElement.php');
			exit();
		} else {
			$requete->closeCursor();
			$requeteAjout = $bdd->prepare('INSERT INTO Epoque(epo_annee, epo_description, epo_commentaire)
								VALUES (:epoque, :description, :commentaire)');
			$requeteAjout->execute(array(
									'epoque' => $epoAnnee,
									'description' => $epoDescription,
									'commentaire' => $epoCommentaire));
			$requeteAjout->closeCursor();
			$_SESSION['message'] = "L'époque ".$epoAnnee." est enregistrée.";
			header('Location:../backEnd/ajoutElement.php');
			exit();
		}
	}	
}
?>

