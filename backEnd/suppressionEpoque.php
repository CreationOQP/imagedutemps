<?php
session_start();
$_SESSION['langue'] = 'fr';
include "../include/langageInclude.php";
include "../include/droitUtilisation.php";
include "../class/connectionBDDLocal.php";
/* include "../class/connectionBDD.php"; */
$bdd = ConnectionBDD::getLiaison();
$page = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
$_SESSION['disturb']= $page;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Suppression époque</title>
	<link rel="stylesheet" type="text/css" href="../style/style_backEnd.css" />
	<script src="script.js"></script>
</head>

<body>
	<header>
		<h1><?php echo _SUPPRESSIONEPOQUE; ?></h1>
		<h3><?php echo $_SESSION['message']; ?></h3>
		<nav>
			<?php include "../include/menuElement.php"; ?>
		</nav>		
	</header>
	
	<section ID="suppressionEpoque" class="suppression">
		<div id="listeSuppressionEpoque" class="liste">
			<table>
				<thead class="colonne_entete">
					<tr>
						<th class="listeLabel" class="listeLabelEpoque">Année</th>
						<th class="listeLabel" class="listeLabelEpoque">No Diapo</th>
					</tr>
				</thead>
				<tbody id="ligneContenuEpoque" class="ligneContenu">
						 <?php /* $liste = (new EpoqueManager())->allEpoque($bdd); */?> 
						<?php $requete = $bdd->prepare('SELECT dia_epo_annee, dia_id FROM Diapositive ORDER BY dia_epo_annee ASC');
						$requete->execute();
						WHILE ($donnee = $requete->fetch()) { ?>
					<tr>
						<td class="listeChamp" class="listeChampEpoque">
							<?php echo $donnee['dia_epo_annee']; ?>
						</td>
						<td class="listeChamp" class="listeChampEpoque">
							<?php echo $donnee['dia_id']; ?>
						</td>
					</tr>
						<?php }
						$requete->closeCursor();
						?>
				</tbody>
			</table>
		</div>
	
		<div id="modificationEpoque">
			<form action="../post/suppressionPost.php" method="post">
				<fieldset>
					<legend>Sélectionnez l'époque à supprimer dans la liste ci-dessous</legend>
						<p>Pour supprimer une époque, l'époque sélecctionnez ne doit avoir aucun enregistrements commun dans la liste ci-dessus. En clair l'époque ne doit pas apparaître dans la liste.</p>
						<p><label for="epo_nom" id="labelNomEpoque" class="label">Année à supprimer</label>
						<select id="epo_nom" name="epo_nom" class="champ">
						<?php
							$requeteSuppression = $bdd->prepare('SELECT epo_annee FROM Epoque WHERE epo_annee NOT IN (SELECT dia_epo_annee FROM Diapositive)');
							$requeteSuppression->execute();
							WHILE ($donneeSuppression = $requeteSuppression->fetch()) {
							echo '<option>'.$donneeSuppression['epo_annee'].'</option>'; } ?> 
						</select>
						</p>

						<input type="hidden" name="compteur" id="compteur" value="<?php echo $page; ?>" />
						<p><input type="submit" name="bouton_epoque" value="Supprimer" id="boutonEpoque" class="bouton" /></p>
						
				</fieldset>
			</form>
		</div>
	
	
	</section>
	
	<footer>
	</footer>
</body>
</html>