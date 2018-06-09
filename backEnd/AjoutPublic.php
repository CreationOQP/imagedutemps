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
	<title>Ajout public</title>
	<link rel="stylesheet" type="text/css" href="../style/style_backEnd.css" />
	<script src="script.js"></script>
</head>

<body>
	<header>
		<h1>Enregistrement personne</h1>
		<h3><?php echo $_SESSION['message']; ?></h3>
	</header>

	<section>
		<form action="../post/ajoutPost.php" method="post">
			<fieldset>
				<legend>Enregistrement</legend>
	<!-- etat civil`-->			
				<p><label for="etc_nom" id="label_etc_nom" class="etiquette">État civil</label>
				<select name="etc_nom" id="etc_nom" class="champ">
					<option>À choisir</option>
					<?php
						$requeteEtc = $bdd->prepare('SELECT etc_id, etc_nom FROM Etat_civil ORDER BY etc_nom ASC');
						$requeteEtc->execute();
						WHILE ($donneeEtc = $requeteEtc->fetch()) {
						echo '<option value="'.$donneeEtc['etc_id'].'">'.$donneeEtc['etc_nom'].'</option>'; }
						$requeteEtc->closeCursor();
					?>				
				</select></p>
				<fieldset id="etc_nouveau" class="nouveau">
				<legend>Nouvel état civil</legend>
					<p><label for="nouveau_etc_nom" id="label_nouveau_etc_nom" class="etiquette" class="nouvelle_etiquette">Nom</label>
					<input type="text" name="nouveau_etc_nom" id="nouveau_etc_nom" class="champ" class="nouveau_champ" />
				</fieldset>
				
	<!-- statut juridique -->			
				<p><label for="sta_nom" id="label_sta_nom" class="etiquette">Statut juridique</label>
				<select name="sta_nom" id="sta_nom" class="champ">
					<option>À choisir</option>
					<?php
						$requeteSta = $bdd->prepare('SELECT sta_id, sta_nom FROM Statut');
						$requeteSta->execute();
						WHILE ($donneeSta = $requeteSta->fetch()) {
						echo '<option value="'.$donneeSta['sta_id'].'">'.$donneeSta['sta_nom'].'</option>'; }
						$requeteEtc->closeCursor();
					?>
				</select></p>
				
				<fieldset id="sta_nouveau" class="nouveau">
				<legend>Nouveau statut</legend>
					<p><label for="nouveau_sta_nom" id="label_sta_nom" class="etiquette" class="nouvelle_etiquette">Nouveau statut juridique</label>
					<input type="text" name="nouveau_sta_nom" id="nouveau_sta_nom" class="champ" class="nouveau_champ" />
					<p><label id="commentaire_label" class="label">Commentaire</label><br />
					<textarea name="sta_commentaire" id="sta_commentaire" class="champ" rows="3" cols="20"></textarea></p>
				</fieldset>
				
	<!-- Dénomination -->
				<p><label for="den_nom" id="label_dem_nom" class="etiquette">Dénomination</label>
				<select name="den_nom" id="den_nom" class="champ">
					<option>À choisir</option>
					<?php
						$requeteDen = $bdd->prepare('SELECT den_id, den_nom FROM Denomination ORDER BY den_nom ASC');
						$requeteDen->execute();
						WHILE ($donneeDen = $requeteDen->fetch()) {
						echo '<option value="'.$donneeDen['den_id'].'">'.$donneeDen['den_nom'].'</option>';	}
						$requeteDen->closeCursor();
					?>
				</select></p>
				
				<fieldset id="den_nouveau" class="nouveau">
				<legend>Nouvelle dénomination</legend>
					<p><label for="nouveau_den_nom" id="label_den_nom" class="etiquette" class="nouvelle_etiquette">Nouvelle dénomination</label>
					<input type="text" name="nouveau_den_nom" id="nouveau_den_nom" class="champ" class="nouveau_champ" />
					<p><label id="description_label" class="label">Description</label><br />
					<textarea name="den_description" id="den_description" class="champ" rows="3" cols="20"></textarea></p>
					<p><label id="commentaire_label" class="label">Commentaire</label><br />
					<textarea name="den_commentaire" id="den_commentaire" class="champ" rows="3" cols="20"></textarea></p>
				</fieldset>
				
	<!-- nom -->			
				<p><label for="pub_nom" id="label_pub_nom" class="etiquette">Nom</label>
				<input type="text" name="pub_nom" id="pub_nom" label="champ" /></p>
				
	<!-- prénom -->
				<p><label for="pub_prenom" id="pub_prenom" class="etiquette">Prénom</label>
				<input type="text" name="pub_prenom" id="pub_prenom" class="champ" />
				
	<!-- Pseudo -->
				<p><label for="pub_pseudo" id="label_pub_pseudo" class="etiquette">Pseudo</label>
				<input type="text" name="pub_pseudo" id="pub_pseudo" class="champ" />
				
	<!-- Qualité -->
				<p><label for="qua_nom" id="label_qua_nom" class="etiquette">Qualité</label>
				<select name="qua_nom" id="qua_nom" class="champ">
					<option>À choisir</option>
					<?php
						$requeteQualite = $bdd->prepare('SELECT qua_id, qua_nom FROM Qualite');
						$requeteQualite->execute();
						WHILE ($donneeQualite = $requeteQualite->fetch()) {
						echo '<option value="'.$donneeQualite['qua_id'].'">'.$donneeQualite['qua_nom'].'</option>';
						}
						$requeteEtc->closeCursor();
					?>
				</select></p>
				
				<fieldset id="qua_nouveau" class="nouveau">
				<legend>Nouvelle qualité</legend>
					<p><label for="nouvelle_qua_nom" id="label_nouvelle_qua_nom" class="etiquette" class="nouvelle_etiquette">Nouvelle qualité</label>
					<input type="text" name="nouvelle_qua_nom" id="nouvelle_qua_nom" class="champ" class="nouveau_champ" /></p>
					<p><label id="description_label" class="label">Description</label><br />
					<textarea name="qua_description" id="qua_description" class="champ" rows="3" cols="20"></textarea></p>
					<p><label id="commentaire_label" class="label">Commentaire</label><br />
					<textarea name="qua_commentaire" id="qua_commentaire" class="champ" rows="3" cols="20"></textarea></p>
				</fieldset>
	<!-- Voirie -->
				<p><label for="adr_voirie" id="label_adr_voirie" class="etiquette">No et rue</label>
				<input type="text" name="adr_voirie" id="adr_voirie" class="champ" /></p>
				
	<!-- lieu-dit -->
				<p><label for="adr_lieu" id="label_adr_lieu" class="etiquette">Lieu-dit, complément</label>
				<input type="text" name="adr_lieu" id="adr_lieu" class="champ" /></p>
				
	<!-- mention postale -->
				<p><label for="adr_mention" id="label_adr_mention" class="etiquette">Mention postale</label>
				<input type="text" name="adr_mention" id="adr_mention" class="champ"/></p>
				
	<!-- Email -->
				<p><label for="adresse_email" id="label_adresse_email" class="etiquette">Adresse électronique</label>
				<input type="email" name="adresse_email" id="adresse_email" class="champ" />
				
	
				
	<!-- Code postale -->
				<p><label for="cp_code" id="cp_code" class="etiquette">Code postale</label>
				<select name="cp_code" id="cp_code" class="champ">
					<option>À choisir</option>
					<?php
						$requeteCP = $bdd->prepare('SELECT cp_id, cp_code FROM Code_postal');
						$requeteCP->execute();
						WHILE ($donneeCP = $requeteCP->fetch()) {
						echo '<option value="'.$donneeCP['cp_id'].'">'.$donneeCP['cp_code'].'</option>';
						}
						$requeteCP->closeCursor();
					?>
				</select></p>
				
				<fieldset id="cp_nouveau" class="nouveau">
					<p><label for="nouveau_cp_code" id="label_nouveau_cp_code" class="etiquette" class="nouvelle_etiquette">Nouveau code postale</label>
					<input name="nouveau_cp_code" id="nouveau_cp_code" class="champ" class="nouveau_champ" /></p>
				</fieldset>
				
	<!-- Ville -->
				<p><label for="vil_nom" id="vil_nom" class="etiquette">Ville</label>
				<select name="vil_nom" id="vil_nom" class="champ">
					<option>À choisir</option>
					<?php
						$requeteVille = $bdd->prepare('SELECT vil_id, vil_nom FROM Ville');
						$requeteVille->execute();
						WHILE ($donneeVille = $requeteVille->fetch()) {
							echo '<option value="'.$donnee['vil_id'].'">'.$donneeVille['vil_nom'].'</option>';
						}
						$requeteVille->closeCursor();
					?>
				</select>
				
				<fieldset id="vil_nouveau" class="nouveau">
					<p><label for="nouvelle_vil_nom" id="label_nouvelle_vil_nom" class="etiquette"class="nouvelle_etiquette">Nouvelle ville</label>
					<input type="text" name="nouvelle_vil_nom" id="nouvelle_vil_nom" class="champ"class="nouveau_champ" /></p>
				</fieldset>
				
	<!-- Pays -->
				<p><label for="pay_nom" id="pay_nom" class="etiquette">Pays</label>
				<select name="pay_nom" id="pay_nom" class="champ">
					<option>À choisir</option>
					<?php
						$requetePays = $bdd->prepare('SELECT pay_code, pay_nom FROM Pays');
						$requetePays->execute();
						WHILE ($donneePays = $requetePays->fetch()) {
						echo '<option value="'.$donneePays['pay_code'].'">'.$donneePays['pay_nom'].'</option>';
						}
						$requetePays->closeCursor();
					?>
				</select></p>
				
				<fieldset id="pay_nouveau" class="nouveau">
					<legend>nouveau pays</legend>
					<p><label for="nouveau_pay_nom" id="nouveau_pay_nom" class="etiquette" class="nouvelle_etiquette">Nouveau pays</label>
					<input type="text" name="nouveau_pay_nom" id="nouveau_pay_nom" class="champ" class="nouveau_champ" /></p>
					<p><label for="nouveau_pay_code" id="nouveau_pay_code" class="etiquette" class="nouvelle_etiquette">Code du nouveau pays</label>
					<input type="text" name="nouveau_pay_code" id="nouveau_pay_code" class="champ" class="nouveau_champ" /></p>
					<p><label id="description_label" class="label">Description</label><br />
					<textarea name="pay_description" id="pay_description" class="champ" rows="3" cols="20"></textarea></p>
					<p><label id="commentaire_label" class="label">Commentaire</label><br />
					<textarea name="pay_commentaire" id="pay_commentaire" class="champ" rows="3" cols="20"></textarea></p>
				</fieldset>
				
	<!-- Téléphone -->			
				<p><label for="numero_telephone" id="label_numero_telephone" class="etiquette">Téléphone</label>
				<input type="text" name="numero_telephone" id="numero_telephone" class="champ" />
				
				<p><label for="type_telephone" id="label_type_telephone" class="etiquette">Type téléphone</label>
				<select name="type_telephone" id="champ_type_telephone" class="champ">
					<option>À choisir</option>
					<?php
						$requeteTelephone = $bdd->prepare('SELECT typtel_id, typtel_nom FROM Type_telephone ORDER BY typtel_nom ASC');
						$requeteTelephone->execute();
						WHILE ($donneeTelephone = $requeteTelephone->fetch()) {
						echo '<option value="'.$donneeTelephone['typtel_id'].'">'.$donneeTelephone['typtel_nom'].'</option>';
						}
						$requetePays->closeCursor();
					?>				
				</select></p>
				
				<p><label for="nouveau_type_telephone" id="label_nouveau_type_telephone" class="label" class="nouvelle_etiquette">Nouveau type de téleéphone</label>
				<input type="text" name="nouveau_type_telephone" id="nouveau_type_telephone" class="champ" class="nouveau_champ"/></p>
				
				<input type="hidden" name="compteur" id="compteur" value="<?php echo $page; ?>" />
				<p><input type="submit" name="bouton_public" id="bouton_public" value="Enregistrer" class="bouton" />
				<input type="reset" id="reset_public" class="bouton" /></p>
				
			</fieldset>
		</form>
	
	</section>
</body>
</html>