<?php
session_start();
$_SESSION['langue'] = 'fr';
include "../include/langageInclude.php";
include "../class/connectionBDD.php";
/* $connect = new connectionBDD('localhost', 'lmouutej_imagedutemps', 'utf8', 'lmouutej_noel', 'C=z={cN]BVB8'); */
$connect = new connectionBDD();
$bdd = $connect->getLiaison();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Ajout diapo</title>
	<link rel="stylesheet" type="text/css" href="../style/style_backEnd.css" />
	<script src="script.js"></script>
</head>

<body>
	<header>
		<h1>ajout photo</h1>
		<h3><?php echo $_SESSION['message']; ?></h3>
	</header>

	<section>
		<div id="nouveaute">
			<div id="theme">
				<form method="post" action="../post/ajoutElementPost.php">
					<fieldset>
						<legend><?php echo _AJOUTHEME; ?></legend>
						<p><input type="text" name="nom_theme" id="nom_theme" class="champ" placeholder="<?php echo _NOUVEAUTHEME; ?>" /></p>
						<p><label for="description_theme" id="label_description_theme"><?php echo _DESCRIPTION; ?></label></p>
						<p><textarea name="description_theme" id="description_theme" class="champ" rows="3" cols="20" ></textarea></p>
						<p><label for="commentaire_theme" id="label_commentaire_theme"><?php echo _COMMENTAIRE; ?></label></p>
						<p><textarea name="commentaire_theme" id="commentaire_theme" class="champ" rows="3" cols="20" ></textarea></p>
						<p><input type="submit" name="bouton_theme" value="<?php echo _AJOUTER; ?>" id="bouton_theme" class="bouton" />
					</fieldset>
				</form>
			</div>
			<div id="lieu">
				<form method="post" action="../post/ajoutElementPost.php">
					<fieldset>
						<legend><?php echo _AJOUTLIEU; ?></legend>
						<p><input type="text" name="nom_lieu" id="nom_lieu" class="champ" placeholder="<?php echo _NOUVEAULIEU; ?>" /></p>
						<p><label for="description_lieu" id="label_description_lieu"><?php echo _DESCRIPTION; ?></label></p>
						<p><textarea name="description_lieu" id="description_lieu" class="champ" rows="3" cols="20" ></textarea></p>
						<p><label for="commentaire_lieu" id="label_commentaire_lieu"><?php echo _COMMENTAIRE; ?></label></p>
						<p><textarea name="commentaire_lieu" id="commentaire_lieu" class="champ" rows="3" cols="20" ></textarea></p>
						<p><input type="submit" name="bouton_lieu" value="<?php echo _AJOUTER; ?>" id="bouton_lieu" class="bouton" />
					</fieldset>
				</form>
			</div>
			<div id="type">
				<form method="post" action="../post/ajoutElementPost.php">
					<fieldset>
						<legend><?php echo _AJOUTYPE; ?></legend>
						<p><input type="text" name="nom_type" id="nom_type" class="champ" placeholder="<?php echo _NOUVEAUTYPE; ?>" /></p>
						<p><label for="description_type" id="label_description_type"><?php echo _DESCRIPTION; ?></label></p>
						<p><textarea name="description_type" id="description_type" class="champ" rows="3" cols="20" ></textarea></p>
						<p><label for="commentaire_type" id="label_commentaire_type"><?php echo _COMMENTAIRE; ?></label></p>
						<p><textarea name="commentaire_type" id="commentaire_type" class="champ" rows="3" cols="20" ></textarea></p>
						<p><input type="submit" name="bouton_type" value="<?php echo _AJOUTER; ?>" id="bouton_type" class="bouton" />
					</fieldset>
				</form>
			</div>
			<div id="epoque">
				<form method="post" action="../post/ajoutElementPost.php">
					<fieldset>
						<legend><?php echo _AJOUTEPOQUE; ?></legend>
						<p><input type="text" name="nom_epoque" id="nom_epoque" class="champ" placeholder="<?php echo _NOUVELLEPOQUE; ?>" /></p>
						<p><label for="description_epoque" id="label_epoque_type"><?php echo _DESCRIPTION; ?></label></p>
						<p><textarea name="description_epoque" id="description_epoque" class="champ" rows="3" cols="20" ></textarea></p>
						<p><label for="commentaire_epoque" id="label_commentaire_epoque"><?php echo _COMMENTAIRE; ?></label></p>
						<p><textarea name="commentaire_epoque" id="commentaire_epoque" class="champ" rows="3" cols="20" ></textarea></p>
						<p><input type="submit" name="bouton_epoque" value="<?php echo _AJOUTER; ?>" id="bouton_epoque" class="bouton" />
					</fieldset>
				</form>
			</div>
			<div id="donateur">
				<a href="donateur.php"><?php echo _NOUVEAUDONATEUR; ?></a>
			</div>
		</div>
		
		<div id="ajout_photo">
			<p><?php echo _ATTENTION; ?>
				<Ol>
					<li><?php echo _AVOIROBTENUE; ?></li>
					<li><?php echo _CERTAINSCANNER; ?></li>
					<li><?php echo _LORSQUELA; ?></li>
				</ol>
			</p>
			<p><?php echo _APPLICATIONVA; ?></p>
			<form method="post" action="../post/ajoutElement.php">
				<fieldset>
					<legend><?php echo _AJOUTDIAPO; ?></legend>
					<p title="<?php echo _SELECTIONNEZVOTRE; ?>"><label for="uploadFichier" id="uploadLabel" class="etiquette"><?php echo _VOTREFICHIER; ?></label><input type="file" name="uploadFichier" id="uploadFichier" class="champ" />
						<input type="hidden" name="MAX_FILE_SIZE" value="100000" /></p>
					<p title="<?php echo _POSSEDEZVOUS; ?>"><?php echo _AUTORISATIONPUBLICATION; ?><br />
					<label for="ouiPublication">Oui</label><input type="radio" id="ouiPublication" name="autorisation" value="Oui" />
					<label for="nonPublication">Non</label><input type="radio" id="NonPublication" name="autorisation" value="Non" />
					</p>
					
					<p title="<?php echo _DATEORIGINALE; ?>"><label for="date_diapo" id="date_diapo_label" class="etiquette"><?php echo _DATEORIGINE; ?></label>
					<input type="date" name="date_diapo" id="date_diapo" class="champ" /></p>
					
					<p title="<?php echo _LEGENDETRES; ?>"><label for="legende_diapo" id="legende_diapo" class="etiquette"><?php echo _COURTELEGENDE; ?> </label>
					<input type="text" name="legende_diapo" maxlength="100" id="legende_diapo" class="champ" placeholder="<?php echo _COURTELEGENDE; ?>" /></p>
					
					<p title="<?php echo _SILEBORD; ?>"><?php echo _FORMATDIAPO; ?><br />
					<label for="formatV" ><?php echo _VERTICAL; ?></label><input type="radio" name="format" id="formatV" value="V" />
					<label for="formatH" ><?php echo _HORIZONTAL; ?></label><input type="radio" name="format" id="formatH" value="H" /></p>
					
					<p title="<?php echo _DATENREGISTREMENTDE; ?>">
					<label for="date_enregistrement" id="date_enregistrement_label" class="etiquette"><?php echo _DATENREGISTREMENT; ?></label>
					<input type="date" name="date_enregistrment" id="date_enregistrement" class="champ" /></p>
					
					<p title="<?php echo _CHOISISSEZVALEUR; ?>"><label for="liste_annee" id="liste_annee_label" class="etiquette"><?php echo _EPOQUE; ?></label>
					<select id="liste_annee" class="champ">
						<?php
							$reponseEpoque = $bdd->prepare('SELECT epo_annee FROM Epoque');
							$reponseEpoque->execute();
							WHILE ($donneeEpoque = $reponseEpoque->fetch()) { 
							echo '<option value="'.$donneeEpoque['epo_annee'].'">'.$donneeEpoque['epo_annee'].'</option>'; }
						?>
					</select></p>
					
					<p title="<?php echo _CHOISISSEZVALEUR; ?>"><label for="liste_theme" id="liste_theme_label" class="etiquette"><?php echo _THEME; ?></label>
					<select id="liste_theme" class="champ">
						<?php
							$reponseTheme = $bdd->prepare('SELECT the_id, the_nom FROM Theme');
							$reponseTheme->execute();
							WHILE ($donneeTheme = $reponseTheme->fetch()) { 
							echo '<option value="'.$donneeTheme['the_id'].'">'.$donneeTheme['the_nom'].'</option>'; }
						?>
					</select></p>
					
					<p title="<?php echo _CHOISISSEZVALEUR; ?>"><label for="liste_lieu" id="liste_lieu_label" class="etiquette"><?php echo _LIEU; ?></label>
					<select id="liste_lieu" class="champ">
						<?php
							$reponseLieu = $bdd->prepare('SELECT lie_id, lie_nom FROM Lieu');
							$reponseLieu->execute();
							WHILE ($donneeLieu = $reponseLieu->fetch()) { 
							echo '<option value="'.$donneeLieu['lie_id'].'">'.$donneeLieu['lie_nom'].'</option>'; }
						?>					
					</select></p>
					
					<p title="<?php echo _CHOISISSEZVALEUR; ?>"><label for="liste_type" id="liste_type_label" class="etiquette"><?php echo _TYPE; ?></label>
					<select id="liste_type" class="champ">
						<?php
							$reponseType = $bdd->prepare('SELECT typdia_id, typdia_nom FROM Type_diapo');
							$reponseType->execute();
							WHILE ($donneeType = $reponseType->fetch()) { 
							echo '<option value="'.$donneeType['typdia_id'].'">'.$donneeType['typdia_nom'].'</option>'; }
						?>
					</select></p>
					
					<p><button type="submit" name="bouton_diapo" id="bouton_diapo" class="bouton"><?php echo _AJOUTER; ?></button>
					<button type="reset" name="bouton_diapo_reset" id="bouton_diapo_resest" class="bouton"><?php echo _EFFACER; ?></button></p>
				</fieldset>
			</form>
		</div>
	</section>
</body>
		