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
	<title>Modification lieu</title>
	<link rel="stylesheet" type="text/css" href="../style/style_backEnd.css" />
	<script src="script.js"></script>
</head>

<body>
	<header>
		<h1><?php echo _MODIFICATIONLIEU; ?></h1>
		<h3><?php echo $_SESSION['message']; ?></h3>
		<nav>
			<?php include "../include/menuElement.php"; ?>
		</nav>		
	</header>
	
	<section id="modification_lieu" class="modification">
		<div id="liste_modification_lieu" class="liste">
			<table>
				<thead class="colonne_entete">
					<tr>
						<th class="liste_label" class="liste_label_lieu">No</th>
						<th class="liste_label" class="liste_label_lieu">Nom</th>
						<th class="liste_label" class="liste_label_lieu">Description</th>
						<th class="liste_label" class="liste_label_lieu">Commentaire</th>
					</tr>
				</thead>
				<tbody id="ligne_contenu_lieu" class="ligne_contenu" >
							<?php $requete = $bdd->prepare('SELECT lie_id, lie_nom, lie_description, lie_commentaire FROM Lieu');
							$requete->execute();
							WHILE ($donnee = $requete->fetch()) { ?>
					<tr>
						<td class="liste_champ" class="liste_champ_lieu">
							<?php echo $donnee['lie_id']; ?>							
						</td>
						<td class="liste_champ" class="liste_champ_lieu">
							<?php echo $donnee['lie_nom']; ?>							
						</td>
						<td class="liste_champ" class="liste_champ_lieu">
							<?php echo $donnee['lie_description']; ?>							
						</td>
						<td class="liste_champ" class="liste_champ_lieu">
							<?php echo $donnee['lie_commentaire']; ?>							
						</td>
					</tr>
							<?php }
							$requete->closeCursor();
							?>
				</tbody>
			</table>
		</div>
		
		<div id="modification_lieu">
			<form action="../post/modificationPost.php" method="post">
				<fieldset>
					<legend>Sélectionnez le lieu à modifier dans la liste ci-dessus</legend>
						<p>Sélectionner le No du lieu avec la liste déroulante, puis modifier les champs nécessaire. Laissez le champ vide si aucune modification</p>
						
						<p><label for="id_lieu" id="Label_nom_lieu" class="label">No du lieu</label>
						<select name="id_lieu" id="liste_lieu" class="champ">
						<?php
							$requeteLieu = $bdd->prepare('SELECT lie_id FROM Lieu');
							$requeteLieu->execute();
							WHILE ($donneeLieu = $requeteLieu->fetch()) { 
							echo '<option value="'.$donneeLieu['lie_id'].'">'.$donneeLieu['lie_id'].'</option>'; }
						?>					
					</select>
						</p>
						
						<p><label for="nom_lieu" id="label_nom_lieu" class="label">Nom</label>
						<input type="text" name="nom_lieu" id="champ_nom_lieu"class="champ" /></p>
						
						<p><label for="description_lieu" id="label_description_lieu" class="label">Description</label></p>
						<p><textarea name="description_lieu" id="champ_descritpion_lieu" class="champ" rows="4" cols="30"></textarea></p>
						
						<p><label for="commentaire_lieu" id="label_commentaire_lieu" class="label">Commentaire</label></p>
						<p><textarea name="commentaire_lieu" id="champ_commentaire_lieu" class="champ" rows="4" cols="30"></textarea></p>
						
						<p><input type="submit" name="bouton_lieu" value="Modifier" id="boutonlieu" class="bouton" />
							
				</fieldset>
			</form>
		</div>
	</section>
</body>
</html>
	