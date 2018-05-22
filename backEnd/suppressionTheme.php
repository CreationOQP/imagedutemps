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
	<title>Suppression thème</title>
	<link rel="stylesheet" type="text/css" href="../style/style_backEnd.css" />
	<script src="script.js"></script>
</head>

<body>
	<header>
		<h1><?php echo _SUPPRESSIONTHEME; ?></h1>
		<h3><?php echo $_SESSION['message']; ?></h3>
		<nav>
			<?php include "../include/menuElement.php"; ?>
		</nav>		
	</header>
	
	<section ID="suppressionTheme" class="suppression">
		<div id="listeSuppressionTheme" class="liste">
			<table>
				<thead class="colonne_entete">
					<tr>
						<th class="listeLabel" class="listeLabelTheme">No thème</th>
						<th class="listeLabel" class="listeLabelTheme">Nom thème</th>
						<th class="listeLabel" class="listeLabelTheme">Diapo No</th>
					</tr>
				</thead>
				<tbody id="ligneContenuTheme" class="ligneContenu">
						<?php $requete = $bdd->prepare('SELECT dia_the_id, dia_id, the_nom FROM Diapositive JOIN Theme ON the_id = dia_the_id ORDER BY dia_the_id ASC');
						$requete->execute();
						WHILE ($donnee = $requete->fetch()) { ?>
					<tr>
						<td class="listeChamp" class="listeChampTheme">
							<?php echo $donnee['dia_the_id']; ?>
						</td>
						<td class="listeChamp" class="listeChampTheme">
							<?php echo $donnee['the_nom']; ?>
						</td>
						<td class="listeChamp" class="listeChampTheme">
							<?php echo $donnee['dia_id']; ?>
						</td>
					</tr>
						<?php }
						$requete->closeCursor();
						?>
				</tbody>
			</table>
		</div>
		
		<div id="suppressionTheme">
			<form action="../post/suppressionPost.php" method="post">
				<fieldset>
					<legend>Sélectionnez le thème à supprimer dans la liste ci-dessous</legend>
					<p>Pour supprimer un thème, le thème sélectionné ne doit avoir aucun enregistrements commun dans la liste ci-dessus. En claire le thème sélectionné ne doit pas se trouver dans la liste.</p>
					
					
					<p><label for="nom_theme" id="label_nom_theme" class="label">Thème à supprimer</label>
					<select name="nom_theme" id="liste_theme" class="champ">
						<?php
							$requeteSuppression = $bdd->prepare('SELECT the_nom FROM Theme WHERE the_id NOT IN (SELECT dia_the_id FROM Diapositive)');
							$requeteSuppression->execute();
							WHILE ($donneeSuppression = $requeteSuppression->fetch()) {
								echo '<option>'.$donneeSuppression['the_nom'].'</option>'; } ?>
					</select></p>
					<p><input type="submit" name="bouton_theme" value="Supprimer" id="bouton_theme" class="bouton" /></p>
					
					
				</fieldset>
			</form>
		</div>
	</section>
</body>
</html>