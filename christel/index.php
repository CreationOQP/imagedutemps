﻿<?php
	$affichage = "visibility";
	if (isset($_COOKIE["acceptation"])) {
		$affichage = "none";
	}
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
	<form id="cookie" method="post" action="postCreationCookie.php" style="display: <?php echo $affichage;?>;">
		<p >En poursuivant votre visite vous acceptez les règles d'utilisation du site "imagedutemps.org", principalement la non copie des documents présentés, ainsi que l'usage des cookies pour mémoire.
		<input type="submit" name="acceptation" value="J'ACCEPTE" />
		<input type="hidden" name="accepte" value="acceptation" /></p>
	</form>
	<div id="modalAccueilFr"> <!-- Cadre de la fenêtre modal -->
		<div id="modalAccueilMenu"> <!-- Cadre de la fenêtre modal pour le menu pour faire une animation sur le menu -->
			<h1><a href="index.html">Image du temps - Bienvenue</a></h1>
			<ul>
				<li><a href="">Liste déroulante ville</a></li>
				<li><a href="contact.html" title="Pour correspondre avec l'administrateur">Contacts</a></li>
				<li><a href="aPropos.html"><img src="image/logo.png" alt="France" id="logo" title="A propos"class="menu" /></a></li>
			</ul>
			<ul><li id="modalFermer"><a href="#fermer"  title="Retour accueil" >Fermer fenêtre</a></li></ul>
		</div>
	</div>
	<nav >
		<ul>
			<li><a href="#modalAccueilFr"><img src="image/flagFR.png" alt="France" id="fr" class="menu" /></a></li>
			<li><img src="image/flagUK.png" alt="France" id="uk" class="menu" /></li>
		</ul>
	</nav>
	
	<section>
		<header>
			<img src="image/titre.png" alt="titre" id="titre" />
			
		</header>
		
		<figure>
			<img src="image/debardeur.png" alt="Débardeur en 1950" id="a1900" class="photo" />
			<figcaption>1950</figcaption>
		</figure>
		
		<footer>
			<img src="image/legende.png" alt="titre" id="légende" />
		</footer>
	</section>
	
	
</body>
</html>
