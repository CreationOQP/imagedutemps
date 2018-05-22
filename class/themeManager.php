<?php

Class ThemeManager{
	
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
	
	public function updateTheme($bdd, $theId, $theNom, $theDescription, $theCommentaire) {
		$requete = $bdd->prepare('SELECT the_nom, the_description, the_commentaire FROM Theme WHERE the_id = ?');
		$requete->execute(array($theId));
		$donnee = $requete->fetch();
		
		if (empty($theNom)) {
			$theNom = $donnee['the_nom'];
		}
		if (empty($theDescription)) {
			$theDescription = $donnee['the_description'];
		}
		if (empty($theCommentaire)) {
			$theCommentaire = $donnee['the_commentaire'];
		}
		$requete->closeCursor();
		
		$requeteModification = $bdd->prepare('UPDATE Theme SET the_nom = :nom, the_description = :description, the_commentaire = :commentaire WHERE the_id = :id');
		$requeteModification->execute(array(
										'nom' => $theNom,
										'description' => $theDescription,
										'commentaire' => $theCommentaire,
										'id' => $theId));
		$requeteModification->closeCursor();
		$_SESSION['message'] = "Le thème ".$theNom." a été modifié.";
		header('Location:../backEnd/modificationTheme.php');
		exit();
		
	}
	
	public function deletteTheme($bdd, $theNom) {
		$requeteSuppression = $bdd->prepare('DELETE FROM Theme WHERE the_nom = ?');
		$requeteSuppression->execute(array($theNom));
		$requeteSuppression->closeCursor();
		$_SESSION['message'] = "le thème ".$theNom." a été supprimé.";
		header('Location:../backEnd/suppressionTheme.php');
		exit();
	}
	
	public function allTheme($bdd) {
		$requette = $bdd->prepare('SELECT the_id, the_nom, the_description, the_commentaire FROM Theme');
		$requette->execute();
		$donnee = $requete->fetch();
	}
	
}
?>

