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
	<title>Modification époque</title>
	<link rel="stylesheet" type="text/css" href="../style/style_backEnd.css" />
	<script src="script.js"></script>
</head>

<body>
	<header>
		<h1><?php echo _MODIFICATIONEPOQUE; ?></h1>
		<h3><?php echo $_SESSION['message']; ?></h3>
		<nav>
			<?php include "../include/menuElement.php"; ?>
		</nav>		
	</header>
	
	<section ID="modification_epoque" class="modification">
		<div id="liste_modification_epoque" class="liste">
			<table>
				<thead class="colonne_entete">
					<tr>
						<th class="liste_label" class="liste_label_epoque">Année</th>
						<th class="liste_label" class="liste_label_epoque">Description</th>
						<th class="liste_label" class="liste_abel_epoque">Commentaire</th>
					</tr>
				</thead>
				<tbody id="ligne_contenu_epoque" class="ligne_contenu">
						 <?php /* $liste = (new EpoqueManager())->allEpoque($bdd); */?> 
						<?php $requete = $bdd->prepare('SELECT epo_annee, epo_description, epo_commentaire FROM Epoque');
						$requete->execute();
						WHILE ($donnee = $requete->fetch()) { ?>
					<tr>
						<td class="liste_champ" class="liste_champ_epoque">
							<?php echo $donnee['epo_annee']; ?>
						</td>
						<td class="liste_champ" class="liste_champ_epoque">
							<?php echo $donnee['epo_description']; ?>
						</td>
						<td class="liste_champ" class="liste_champ_epoque">
							<?php echo $donnee['epo_commentaire']; ?>
						</td>
					</tr>
						<?php }
						$requete->closeCursor();
						?>
				</tbody>
			</table>
		</div>
	
		<div id="modification_epoque">
			<form action="../post/modificationPost.php" method="post">
				<fieldset>
					<legend>Sélectionnez l'époque à modifier dans la liste ci-dessus</legend>
						<p>Remplissez le champ "année à modifier, avec le No d'année à mdodifier de la liste ci-dessus.<br/>
						Modifiez uniquement le champ désiré, laisser l'autre vide. Ou modifiez le 2 si nécessaire."
						<p><label for="nom_epoque" id="labelNomEpoque" class="label">Année à modifier</label>
						<select name="nom_epoque" id="liste_annee" class="champ">
						<?php
							$reponseEpoque = $bdd->prepare('SELECT epo_annee FROM Epoque');
							$reponseEpoque->execute();
							WHILE ($donneeEpoque = $reponseEpoque->fetch()) { 
							echo '<option value="'.$donneeEpoque['epo_annee'].'">'.$donneeEpoque['epo_annee'].'</option>'; }
						?>
					</select>
						
						<p><label for="description_epoque" id="label_description_epoque" class="label">Description</label></p>
						<p><textarea name="description_epoque" id="champ_description_epoque" class="champ" rows="4" cols="30"></textarea></p>
						
						<p><label for="commentaire_epoque" id="label_commentaire_epoque" class="label">Commentaire</label></p>
						<p><textarea name="commentaire_epoque" id="champ_commentaire_epoque" class="champ" rows="4" cols="30"></textarea></p>
						
						<input type="hidden" name="compteur" id="compteur" value="<?php echo $page; ?>" />
						<p><input type="submit" name="bouton_epoque" value="Modifier" id="bouton_epoque" class="bouton" />
						
				</fieldset>
			</form>
		</div>
	
	
	</section>
	
	<footer>
	</footer>
</body>
</html>