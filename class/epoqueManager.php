<?php

Class EpoqueManager{
	
	
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
	
	public function updateEpoque($bdd, $epoAnnee, $epoDescription, $epoCommentaire) {
		$requete = $bdd->prepare('SELECT epo_annee, epo_description, epo_commentaire FROM Epoque WHERE epo_annee = ?');
		$requete->execute(array($epoAnnee));
		$donnee = $requete->fetch();
		
		if (empty($epoDescription)) {
			$epoDescription = $donnee['epo_description'];
		}
		if (empty($epoCommentaire)) {
			$epoCommentaire = $donnee['epo_commentaire'];
		}
		$requete->closeCursor();
		
		$requeteModification = $bdd->prepare('UPDATE Epoque SET epo_description = :description, epo_commentaire = :commentaire WHERE epo_annee = :annee');
		$requeteModification->execute(array(
											'description' => $epoDescription,
											'commentaire' => $epoCommentaire,
											'annee' => $epoAnnee));
		$requeteModification->closeCursor();
		$_SESSION['message'] = "L'époque ".$epoAnnee." a été modifié";
		header('Location:../backEnd/modificationEpoque.php');
		exit();
	}
	
	public function deletteEpoque($bdd, $epoAnnee) {
		$requeteSuppression = $bdd->prepare('DELETE FROM Epoque WHERE epo_annee = ?');
		$requeteSuppression->execute(array($epoAnnee));
		$requeteSuppression->closeCursor();
		$_SESSION['message'] = "L'époque ".$epoAnnee." est supprimée.";
		header('Location:../backEnd/suppressionEpoque.php');
		exit();
	}
	
	public function allEpoque($bdd) {
		$requete = $bdd->prepare('SELECT epo_annee, epo_description, epo_commentaire FROM Epoque');
		$requete->execute();
		WHILE ($donnee = $requete->fetch());
	}
	
}
?>

