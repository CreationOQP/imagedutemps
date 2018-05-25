<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>L'image du temps</title>
	<link rel="stylesheet" type="text/css" href="style/reset.css" />
	<link rel="stylesheet" type="text/css" href="style/style.css" />
	<meta name="Description" content="Les image du temps passé confrontées au temps présent." />
	<meta name="Keywords" content="image, hier, aujourd'hui, diaporama" />
	<script type="text/javascript" src="script/scriptJS.js"></script>
</head>
<body>
	<section>
		<header>
	
		</header>
		
		<section id="inscrit">
			<form action="/post/connexion.php" method="post">
				<fieldset>
					<legend class="legende">Inscrit</legend>
					<p><input type="text" name="pub_nom" id="pub_nom" class="champ" placeholder="Votre nom" autofocus required /></p>
					<p><input type="password" name="pwd_mot" id="pwd_mot" /></p>
					<p><input type="submit" name="connexion" value="Se connecter"  class="bouton" />					
				</fieldset>
			</form>
		</section>
		
		<p><a href=""><input type="submit" name="fermer" value="Fermer la fenêtre" class="bouton" />
		
		<section id="nonInscrit">
			<form action="/post/connexion.php" method="post">
				<fieldset>
					<legend class="legende">Non inscrit</legend>
					<p><input type="text" name="pub_nom" id="pub_nom" class="champ" placeholder="Inscrivez votre nom" required /></p>
					<p><input type="text" name="pub_pseudo" id="pub_pseudo" class="champ" placeholder="Inscrivez votre pseudo" required /></p>
					<p><input type="email" name="adresse" id="adresse" class="champ" placeholder="Votre adresse Email" required /></p>
					<p><input type="password" name="password1" id="password1" class="champ" placeholder="Mot de passe" required />
					<p><label for="password2" name="password2" id="password2" class="etiquette">Répétez le mot de passe</label>
					<p><input type="password" name="password2" id="password2" class="champ" placeholder="Mot de passe" required />
					<p>Je reconnais avoir pris connaissance du réglement intérieur en cochant la case ci-dessous.</p>
					<p><input type="checkbox" name="reglement" id="reglement" class="case" required/>
					<p><input type="submit" name="inscription" value="S'inscrire"  class="bouton" />
				</fieldset>
			</form>
		</section>
		
		<footer>
		
		</footer>
	</section>

</body>
</html>