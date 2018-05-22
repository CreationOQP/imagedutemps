<?php
session_start();
$_SESSION['langue'] = 'fr';
include "../include/langageInclude.php";
include "../class/connectionBDD.php";
$bdd = ConnectionBDD::getLiaison();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Suppression lieu</title>
	<link rel="stylesheet" type="text/css" href="../style/style_backEnd.css" />
	<script src="script.js"></script>
</head>

<body>
	<header>
		<h1><?php echo _SUPPRESSIONLIEU; ?></h1>
		<h3><?php echo $_SESSION['message']; ?></h3>
		<nav>
			<?php include "../include/menuElement.php"; ?>
		</nav>		
	</header>
	
	<section ID="suppressionLieu" class="suppression">
		<div id="listeSuppressionLieu" class="liste">
			<table>
				<thead class="colonne_entete">
					<tr>
						<th class="listeLabel" class="listeLabelLieu">No lieu</th>
						<th class="listeLabel" class="listeLabelLieu">Nom lieu</th>
						<th class="listeLabel" class="listeLabelLieu">Diapo No</th>
					</tr>
				</thead>
				<tbody id="ligneContenuLieu" class="ligneContenu">
						<?php $requete = $bdd->prepare('SELECT dia_lie_id, dia_id, lie_nom FROM Diapositive JOIN Lieu ON lie_id = dia_lie_id ORDER BY dia_lie_id ASC');
						$requete->execute();
						WHILE ($donnee = $requete->fetch()) { ?>
					<tr>
						<td class="listeChamp" class="listeChampLieu">
							<?php echo $donnee['dia_lie_id']; ?>
						</td>
						<td class="listeChamp" class="listeChampLieu">
							<?php echo $donnee['lie_nom']; ?>
						</td>
						<td class="listeChamp" class="listeChampLieu">
							<?php echo $donnee['dia_id']; ?>
						</td>
					</tr>
						<?php }
						$requete->closeCursor();
						?>
				</tbody>
			</table>
		</div>
		
		<div id="suppresionLieu">
			<form action="../post/suppressionPost.php" method="post">
				<fieldset>
					<legend>Sélectionnez le lieu à supprimer dans la liste ci-dessous</legend>
					<p>Pour supprimer un lieu, le lieu sélectionnez ne doit avoir aucun enregistrements commun dans la liste ci-dessus. En clair le lieu ne doit pas apparaitre dans la liste.</p>
					<p><label for="nom_lieu" id="label_nom_lieu" class="label">Lieu à supprimer</label>
					<select name="nom_lieu" id="liste_lieu" class="champ">
						<?php
							$requeteSuppression = $bdd->prepare('SELECT lie_nom FROM Lieu WHERE lie_id NOT IN (SELECT dia_lie_id FROM Diapositive)');
							$requeteSuppression->execute();
							WHILE ($donneeSuppression = $requeteSuppression->fetch()) {
								echo '<option>'.$donneeSuppression['lie_nom'].'</option>'; } ?>
					</select></p>
					<p><input type="submit" name="bouton_lieu" value="Supprimer" id="bouton_lieu"class="bouton" /></p>
				</fieldset>
			</form>
		</div>
	
	</section>
</body>
</html>