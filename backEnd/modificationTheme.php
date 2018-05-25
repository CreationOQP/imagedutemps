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
	<title>Modification thème</title>
	<link rel="stylesheet" type="text/css" href="../style/style_backEnd.css" />
	<script src="script.js"></script>
</head>

<body>
	<header>
		<h1><?php echo _MODIFICATIONTHEME; ?></h1>
		<h3><?php echo $_SESSION['message']; ?></h3>
		<nav>
			<?php include "../include/menuElement.php"; ?>
		</nav>		
	</header>
	
	<section id="modification_theme" class="modification">
		<div id="liste_modification_theme" class="liste">
			<table>
				<thead class="colonne_entete">
					<tr>
						<th class="liste_label" class="liste_label_theme">No</th>
						<th class="liste_label" class="liste_label_theme">Nom</th>
						<th class="liste_label" class="liste_label_theme">Description</th>
						<th class="liste_label" class="liste_label_theme">Commentaire</th>
					</tr>
				</thead>
				<tbody id="ligne_contenu_theme" class="ligne_contenu" >
							<?php $requete = $bdd->prepare('SELECT the_id, the_nom, the_description, the_commentaire FROM Theme');
							$requete->execute();
							WHILE ($donnee = $requete->fetch()) { ?>
					<tr>
						<td class="liste_champ" class="liste_champ_theme">
							<?php echo $donnee['the_id']; ?>							
						</td>
						<td class="liste_champ" class="liste_champ_theme">
							<?php echo $donnee['the_nom']; ?>							
						</td>
						<td class="liste_champ" class="liste_champ_theme">
							<?php echo $donnee['the_description']; ?>							
						</td>
						<td class="liste_champ" class="liste_champ_theme">
							<?php echo $donnee['the_commentaire']; ?>							
						</td>
					</tr>
							<?php }  
								$requete->closeCursor();
							?>
				</tbody>
			</table>
		</div>
		
		<div id="modification_theme">
			<form action="../post/modificationPost.php" method="post">
				<fieldset>
					<legend>Sélectionnez le thème à modifier dans la liste ci-dessus</legend>
						<p>Sélectionner le No du thème avec la liste déroulante, puis modifier les champs nécessaire. Laissez le champ vide si aucune modification</p>
						
						<p><label for="id_theme" id="Label_id_theme" class="label">No du thème</label>
						<select name="id_theme" id="liste_theme" class="champ">
						<?php
							$requeteTheme = $bdd->prepare('SELECT the_id FROM Theme');
							$requeteTheme->execute();
							WHILE ($donneeTheme = $requeteTheme->fetch()) { 
							echo '<option value="'.$donneeTheme['the_id'].'">'.$donneeTheme['the_id'].'</option>'; }
						?>
					</select></p>
						
						<p><label for="nom_theme" id="label_nom_theme" class="label">Nom</label>
						<input type="text" name="nom_theme" id="champ_nom_theme"class="champ" /></p>
						
						<p><label for="description_theme" id="label_description_theme" class="label">Description</label></p>
						<p><textarea name="description_theme" id="champ_descritpion_theme" class="champ" rows="4" cols="30"></textarea></p>
						
						<p><label for="commentaire_theme" id="label_commentaire_theme" class="label">Commentaire</label></p>
						<p><textarea name="commentaire_theme" id="champ_commentaire_theme" class="champ" rows="4" cols="30"></textarea></p>
						
						<p><input type="submit" name="bouton_theme" value="Modifier" id="boutontheme" class="bouton" /></p>
							
				</fieldset>
			</form>
		</div>
	</section>
</body>
</html>
	