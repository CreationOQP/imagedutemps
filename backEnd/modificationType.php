<?php
session_start();
$_SESSION['langue'] = 'fr';
include "../include/langageInclude.php";
include "../include/droitUtilisation.php";
include "../class/connectionBDD.php";
$bdd = ConnectionBDD::getLiaison();
$page = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
$_SESSION['disturb']= $page;
?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Modification type</title>
	<link rel="stylesheet" type="text/css" href="../style/style_backEnd.css" />
	<script src="script.js"></script>
</head>

<body>
	<header>
		<h1><?php echo _MODIFICATIONTYPE; ?></h1>
		<h3><?php echo $_SESSION['message']; ?></h3>
		<nav>
			<?php include "../include/menuElement.php"; ?>
		</nav>		
	</header>
	
	<section id="modification_type" class="modification">
		<div id="liste_modification_type" class="liste">
			<table>
				<thead class="colonne_entete">
					<tr>
						<th class="liste_label" class="liste_label_type">No</th>
						<th class="liste_label" class="liste_label_type">Nom</th>
						<th class="liste_label" class="liste_label_type">Description</th>
						<th class="liste_label" class="liste_label_type">Commentaire</th>
					</tr>
				</thead>
				<tbody id="ligne_contenu_type" class="ligne_contenu" >
							<?php $requete = $bdd->prepare('SELECT typdia_id, typdia_nom, typdia_description, typdia_commentaire FROM Type_diapo');
							$requete->execute();
							WHILE ($donnee = $requete->fetch()) { ?>
					<tr>
						<td class="liste_champ" class="liste_champ_type">
							<?php echo $donnee['typdia_id']; ?>							
						</td>
						<td class="liste_champ" class="liste_champ_type">
							<?php echo $donnee['typdia_nom']; ?>							
						</td>
						<td class="liste_champ" class="liste_champ_type">
							<?php echo $donnee['typdia_description']; ?>							
						</td>
						<td class="liste_champ" class="liste_champ_type">
							<?php echo $donnee['typdia_commentaire']; ?>							
						</td>
					</tr>
							<?php }  
								$requete->closeCursor();
							?>
				</tbody>
			</table>
		</div>
		
		<div id="modification_type">
			<form action="../post/modificationPost.php" method="post">
				<fieldset>
					<legend>Sélectionnez le thème à modifier dans la liste ci-dessus</legend>
						<p>Sélectionner le No du thème avec la liste déroulante, puis modifier les champs nécessaire. Laissez un champ vide si aucune modification</p>
						
						<p><label for="id_theme" id="LabelNomTheme" class="label">No du type</label>
						<select name="id_type" id="liste_type" class="champ">
						<?php
							$reponseType = $bdd->prepare('SELECT typdia_id FROM Type_diapo');
							$reponseType->execute();
							WHILE ($donneeType = $reponseType->fetch()) { 
							echo '<option value="'.$donneeType['typdia_id'].'">'.$donneeType['typdia_id'].'</option>'; }
						?>
					</select></p>
						
						<p><label for="nom_type" id="label_nom_type" class="label">Nom</label>
						<input type="text" name="nom_type" id="champ_nom_type"class="champ" /></p>
						
						<p><label for="description_type" id="label_description_type" class="label">Description</label></p>
						<p><textarea name="description_type" id="champ_descritpion_type" class="champ" rows="4" cols="30"></textarea></p>
						
						<p><label for="commentaire_type" id="label_commentaire_type" class="label">Commentaire</label></p>
						<p><textarea name="commentaire_type" id="champ_commentaire_type" class="champ" rows="4" cols="30"></textarea></p>
						
						<input type="hidden" name="compteur" id="compteur" value="<?php echo $page; ?>" />
						<p><input type="submit" name="bouton_type" value="Modifier" id="boutonType" class="bouton" />
							
				</fieldset>
			</form>
		</div>
	</section>
</body>
</html>
	