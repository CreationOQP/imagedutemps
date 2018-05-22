<?php

Class TypeManager{
	
			
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
	
	public function updateType($bdd, $typDiaId, $typDiaNom, $typDiaDescription, $typDiaCommentaire) {
		$requete = $bdd->prepare('SELECT typdia_nom, typdia_description, typdia_commentaire FROM Type_diapo WHERE typdia_id = ?');
		$requete->execute(array($typDiaId));
		$donnee = $requete->fetch();
		
		if (empty($typDiaNom)) {
			$typDiaNom = $donnee['typdia_nom'];
		}
		if (empty($typDiaDescription)) {
			$typDiaDescription = $donnee['typdia_description'];
		}
		if (empty($typDiaCommentaire)) {
			$typDiaCommentaire = $donnee['typdia_commentaire'];
		}
		$requete->closeCursor();
		
		$requeteModification = $bdd->prepare('UPDATE Type_diapo SET typdia_nom = :nom, typdia_description = :description, typdia_commentaire = :commentaire WHERE typdia_id = :id');
		$requeteModification->execute(array(
										'nom' => $typDiaNom,
										'description' => $typDiaDescription,
										'commentaire' => $typDiaCommentaire,
										'id' => $typDiaId));
		$requeteModification->closeCursor();
		$_SESSION['message'] = "Le type de diapo ".$typDiaNom." a été modifié.";
		header('Location:../backEnd/modificationType.php');
		exit();
	}
	
	public function deletteType($bdd, $typDiaNom) {
		$requeteSuppression = $bdd->prepare('DELETE FROM Type_diapo WHERE typdia_nom = ?');
		$requeteSuppression->execute(array($typDiaNom));
		$requeteSuppression->closeCursor();
		$_SESSION['message'] = "Le type ".$typDiaNom." a été supprimé.";
		header('Location:../backEnd/suppressionType.php');
		exit();
	}
	
	public function allType($bdd) {
		$requette = $bdd->prepare('SELECT typdia_nom, typdia_description, typdia_commentaire FROM Type_diapo');
		$requette->execute();
		$donnee = $requete->fetch();
	}
}
?>

