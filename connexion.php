<?php
	session_start();
include "/class/connectionBDD.php";
$bdd = ConnectionBDD::getLiaison();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>L'image du temps</title>
	<link rel="stylesheet" type="text/css" href="style/reset.css" />
	<link rel="stylesheet" type="text/css" href="style/styleContact.css" />
	<meta name="Description" content="Les image du temps passé confrontées au temps présent." />
	<meta name="Keywords" content="image, hier, aujourd'hui, diaporama" />
	<script type="text/javascript" src="script/scriptJS.js"></script>
</head>
<body>
	<section>
		<header>
	
		</header>
		
		<table>
			<tr>
				<td>
					<section id="inscrit">
						<form action="../post/connexionUtilisateurPost.php" method="post">
							<fieldset>
								<legend class="legende">Inscrit</legend>
								<p><input type="text" name="pub_pseudo" id="pub_pseudo" class="champ" placeholder="Votre pseudo" autofocus required /></p>
								<p><input type="password" name="pwd_mot" id="pwd_mot" /></p>
								<p><input type="submit" name="connexion" value="Se connecter"  class="bouton" />					
							</fieldset>
						</form>
					</section>
				</td>
				<td>
					<p id="retourIndex"><a href="index.php" ><input type="submit" name="fermer" value="Fermer la fenêtre" class="bouton" /></a></p>
				</td>
				<td>
					<section id="nonInscrit">
					<form action="post/connexionUtilisateurPost.php" method="post">
					<!--	<form action="/post/connexionUtilisateurPost.php" method="post"> -->
							<fieldset>
								<legend class="legende">Non inscrit</legend>
								
								<p><Select name="etc_nom" id="etc_nom" class="champ">
									<option>À choisir</option>
									<?php
										$reponseEtc = $bdd->prepare('SELECT etc_id, etc_nom FROM Etat_civil');
										$reponseEtc->execute();
										WHILE ($donneeEtc = $reponseEtc->fetch()) { 
										echo '<option value="'.$donneeEtc['etc_id'].'">'.$donneeEtc['etc_nom'].'</option>'; }
									?>
								</select></p>
								
								<p><input type="text" name="pub_prenom" id="pub_prenom" class="champ" 
								placeholder="Inscrivez votre prénom" /></p>
								
								<p><input type="text" name="pub_nom" id="pub_nom" class="champ" 
								placeholder="Inscrivez votre nom" required /></p>
								
								<p><Select name="den_nom" id="den_nom" class="champ">
									<option>À choisir</option>
									<?php
										$requeteDen = $bdd->prepare('SELECT den_id, den_nom FROM Denomination ORDER BY den_nom ASC');
										$requeteDen->execute();
										WHILE ($donneeDen = $requeteDen->fetch()) {
										echo '<option value="'.$donneeDen['den_id'].'">'.$donneeDen['den_nom'].'</option>'; }
									?>
								</select></p> 
								
								<p><input type="text" name="pub_pseudo" id="pub_pseudo" class="champ" placeholder="Inscrivez votre pseudo" required /></p>
								
								<p><input type="email" name="adresse" id="adresse" class="champ" placeholder="Votre adresse Email" required /></p>
								
								<p>Votre mot de passe doit comporter 6 caractères avec majuscules, minuscules et chiffre</p>
								<p><input type="password" name="password1" id="password1" class="champ" placeholder="Mot de passe de 6 caractères, avec majuscules, minuscules et chiffres" pattern=".{6}" required /></p>
								
								<p>Répétez le mot de passe</p>
								<p><input type="password" name="password2" id="password2" class="champ" placeholder="Mot de passe" required /></p>
								
								<p>Je reconnais avoir pris connaissance du réglement intérieur en cochant la case ci-dessous.</p>
								<p><input type="checkbox" name="reglement" id="reglement" class="case" /></p>
								
								<p><input type="submit" name="inscription" value="S'inscrire"  class="bouton" /></p>
							</fieldset>
						</form>
					</section>
				</td>
			</tr>
		</table>
		<footer>
		<?php echo $_SESSION['message']; ?>
		</footer>
	</section>

</body>
</html>