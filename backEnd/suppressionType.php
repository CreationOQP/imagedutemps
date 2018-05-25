<?php
session_start();
$_SESSION['langue'] = 'fr';
include "../include/langageInclude.php";
include "../include/droitUtilisation.php";
include "../class/connectionBDD.php";
$bdd = ConnectionBDD::getLiaison();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Suppression type</title>
	<link rel="stylesheet" type="text/css" href="../style/style_backEnd.css" />
	<script src="script.js"></script>
</head>

<body>
	<header>
		<h1><?php echo _SUPPRESSIONTYPE; ?></h1>
		<h3><?php echo $_SESSION['message']; ?></h3>
		<nav>
			<?php include "../include/menuElement.php"; ?>
		</nav>		
	</header>
	
	<section ID="suppressionType" class="suppression">
		<div id="listeSuppressionType" class="liste">
			<table>
				<thead class="colonne_entete">
					<tr>
						<th class="listeLabel" class="listeLabelType">No type</th>
						<th class="listeLabel" class="listeLabelType">Nom type</th>
						<th class="listeLabel" class="listeLabelType">Diapo No</th>
					</tr>
				</thead>
				<tbody id="ligneContenuType" class="ligneContenu">
						<?php $requete = $bdd->prepare('SELECT dia_typdia_id, typdia_nom, dia_id FROM Diapositive JOIN Type_diapo ON typdia_id = dia_typdia_id ');
						$requete->execute();
						WHILE ($donnee = $requete->fetch()) { ?>
					<tr>
					<td class="listeChamp" class="listeChampType">
							<?php echo $donnee['dia_typdia_id']; ?>
						</td>
						<td class="listeChamp" class="listeChampType">
							<?php echo $donnee['typdia_nom']; ?>
						</td>
						
						<td class="listeChamp" class="listeChampType">
							<?php echo $donnee['dia_id']; ?>
						</td>
					</tr>
						<?php }
						$requete->closeCursor();
						?>
				</tbody>
			</table>
		</div>
		
		<div id="suppressionType">
			<form action="../post/suppressionPost.php" method="post">
				<fieldset>
					<legend>Sélectionnez le type à supprimer dans la liste ci-dessous</legend>
					<p>Pour supprimer un type, le type sélectionné ne doit avoir aucun enregistrements commun dans la liste ci-dessus. En claire le type sélectionné ne doit pas se trouver dans la liste.</p>
					
					
					<p><label for="nom_type" id="label_nom_type" class="label">Type à supprimer</label>
					<select name="nom_type" id="liste_type" class="champ">
						<?php
							$requeteSuppression = $bdd->prepare('SELECT typdia_nom FROM Type_diapo WHERE typdia_id NOT IN (SELECT dia_typdia_id FROM Diapositive)');
							$requeteSuppression->execute();
							WHILE ($donneeSuppression = $requeteSuppression->fetch()) {
								echo '<option>'.$donneeSuppression['typdia_nom'].'</option>'; } ?>
					</select></p>
					<p><input type="submit" name="bouton_type" value="Supprimer" id="bouton_type" class="bouton" /></p>
					
					
				</fieldset>
			</form>
		</div>
		
	</section>
</body>
</html>