<?php
session_start();
// Vérification des droits d'utilisation
if ($_SESSION['qualite'] != 'redacteur' || 'administrateur') {
	header('Location:index.html');
	exit;
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Ajout diapo/title>
	<link rel="stylesheet" type="text/css" href="style/back_endStyle.css" />
	<script src="script.js"></script>
</head>

<body>
	<header>
		<h1>ajout photo</h1>
	</header>

	<section>
		<div id="nouveaute">
			<div id="theme">
				<form method="post" action="ajout_theme_post.php">
					<fieldset>
						<legend>Ajout thème</legend>
						<p><input type="text" name="nom_theme" id="nom_theme" class="champ" placeholder="Nouveau thème" /></p>
						<p><label for="description_theme" id="label_description_theme">Description</label></p>
						<p><textarea name="description_theme" id="description_theme" class="champ" rows="10" cols="10" ></textarea></p>
						<p><label for="commentaire_theme" id="label_commentaire_theme">Commentaire</label></p>
						<p><textarea name="commentaire_theme" id="commentaire_theme" class="champ" rows="10" cols="10" ></textarea></p>
						<p><input type="submit" name="bouton_theme" value="Ajouter" id="bouton_theme" class="bouton" />
					</fieldset>
				</form>
			</div>
			<div id="lieu">
				<form method="post" action="ajout_lieu_post.php">
					<fieldset>
						<legend>Ajout lieu</legend>
						<p><input type="text" name="nom_lieu" id="nom_lieu" class="champ" placeholder="Nouveau lieu" /></p>
						<p><label for="description_lieu" id="label_description_lieu">Description</label></p>
						<p><textarea name="description_lieu" id="description_lieu" class="champ" rows="10" cols="10" ></textarea></p>
						<p><label for="commentaire_lieu" id="label_commentaire_lieu">Commentaire</label></p>
						<p><textarea name="commentaire_lieu" id="commentaire_lieu" class="champ" rows="10" cols="10" ></textarea></p>
						<p><input type="submit" name="bouton_lieu" value="Ajouter" id="bouton_lieu" class="bouton" />
					</fieldset>
				</form>
			</div>
			<div id="type">
				<form method="post" action="ajout_type_post.php">
					<fieldset>
						<legend>Ajout type</legend>
						<p><input type="text" name="nom_type" id="nom_type" class="champ" placeholder="Nouveau type" /></p>
						<p><label for="description_type" id="label_description_type">Description</label></p>
						<p><textarea name="description_type" id="description_type" class="champ" rows="10" cols="10" ></textarea></p>
						<p><label for="commentaire_type" id="label_commentaire_type">Commentaire</label></p>
						<p><textarea name="commentaire_type" id="commentaire_type" class="champ" rows="10" cols="10" ></textarea></p>
						<p><input type="submit" name="bouton_type" value="Ajouter" id="bouton_type" class="bouton" />
					</fieldset>
				</form>
			</div>
			<div id="donateur">
				<a href="donateur.php">Nouveau donateur</a>
			</div>
		</div>
		
		<div id="ajout_photo">
			<p>ATTENTION !, avant d'ajouter une photo il faut :
				<Ol>
					<li>Avoir obtenue l'autorisation de publication de la part du donateur</li>
					<li>Certains scanners ne reconnaissent pas le document à scanner. Il scanne toute la surface disponible (feuille A4), même si c'est au format carte postale.<br />
					Il est nécessaire d'utiliser un logiciel de retouche d'image pour sélectionner uniquement la partie à afficher.</li>
				</ol>
			</p>
			<p>L'application va
			<form method="post" action="ajout_diapo_post">
				<fieldset>
					<legend>Ajout diapo</legend>
					
				</fieldset>
			</form>
		
		</div>
		
		
		
		
		
		
	</section>
</body>
		