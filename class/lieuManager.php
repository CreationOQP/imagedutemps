<?php

Class LieuManager{
	
	private $lieNom;
	private $lieDescription;
	private $lieCommentaire;
	private $lieId;
	
	public function __construct($bdd, $lieNom, $lieDescription, $lieCommentaire, $lieId) {
		$this->bdd = $bdd;
		$this->lieNom = $lieNom;
		$this->lieDescription = $lieDescription;
		$this->lieCommentaire = $lieCommentaire;
		$this->lieId = $lieId;
	}
	
	public function addLieu($bdd, $lieNom, $lieDescription, $lieCommentaire) {
		// Vérification si le lieu existe déjà
		$requete = $bdd->prepare('SELECT lie_nom FROM Lieu WHERE lie_nom = ?');
		$requete->execute(array($lieNom));
		if ($requete->rowCount() != 0) {
			$_SESSION['message'] = 'Le lieu existe déjà';
			$requete->closeCursor();
			header('Location:../back_end/ajoutElement.php');
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
			header('Location:../back_end/ajoutElement.php');
			exit();
		}
	}
	
	public function updateLieu($bdd, $lieId, $lieNom, $lieDescription, $lieCommentaire) {
		$requete = $bdd->prepare('SELECT lie_id, lie_nom, lie_description, lie_commentaire FROM Lieu Where lie_id = ?');
		$requete->execute(array($lieId));
		$donnee = $requete->fetch();
		
		if (empty($lieNom)) {
			$lieNom = $donnee['lie_nom'];
		}
		if (empty($lieDescription)) {
			$lieDescription = $donnee['lie_description'];
		}
		if (empty($lieCommentaire)) {
			$lieCommentaire = $donnee['lie_commentaire'];
		}
		$requete->closeCursor();
		
		$requeteModification = $bdd->prepare('UPDATE Lieu SET lie_nom = :nom, lie_description = :description, lie_commentaire = :commentaire WHERE lie_id = :id');
		$requeteModification->execute(array(
										'nom' => $lieNom,
										'description' => $lieDescription,
										'commentaire' => $lieCommentaire,
										'id' => $lieId));
		$requeteModification->closeCursor();
		$_SESSION['message'] = "le lieu ".$lieNom." a été modifié.";
		header('Location:../back_end/modificationLieu.php');
		exit();
		
	}	
	
	public function deletteLieu($bdd, $lieNom) {
		$requete = $bdd->prepare('SELECT lie_id FROM Lieu WHERE lie_nom = ?');
		$requete->execute(array($lieNom));
		$donnee = $requete->fletch();
		$requete->closeCursor();
		
		if ($donne['lie_id'] == 1) {
			$_SESSION['message'] = "ce lieu ne peut-être supprimé.";
			header('Location:../back_end/suppressionLieu.php');
			exit();
		} else {
			$requeteSuppression = $bdd->prepare('DELETE FROM Lieu WHERE lie_nom = ?');
			$requeteSuppression->execute(array($lieNom));
			$requeteSuppression->closeCursor();
			$_SESSION['message'] = "Le lieu ".$lieNom." a été supprimé.";
			header('Location:../back_end/suppressionLieu.php');
			exit();
		}
	}
	
	public function allLieu($bdd) {
		$requete = $bdd->prepare('SELECT lie_id, lie_nom, lie_description, lie_commentaire FROM Lieu');
		$requete->execute();
		$donnee = $requete->fetch();
	}

}
?>

