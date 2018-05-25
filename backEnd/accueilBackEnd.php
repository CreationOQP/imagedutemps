<?php
session_start();
$_SESSION['langue'] = 'fr';
$_SESSION['autorisation'] = 'administrateur';
include "../include/langageInclude.php";
include "../include/droitUtilisation.php";
?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<title>BackEnd</title>
	<link rel="stylesheet" type="text/css" href="../style/style_backEnd.css" />
	<script src="script.js"></script>
</head>

<body>
	<header>
		<h1>Accueil BackEnd</h1>
	</header>

	<section>
		<?php
			$_SESSION['utilisateur'] = 'Noël';
			$_SESSION['message'] = 'Bonjour '.$_SESSION['utilisateur'].', il fait beau !';
		?>
		<p><a href="ajoutElement.php" >Ajout élément</a></p>
		<p><a href="ajoutPublic.php">Ajout de personne</a></p>
		<p><a href="modificationEpoque.php">Modification époque</a></p>
		<p><a href="modificationLieu.php">Modification lieu</a></p>
		<p><a href="modificationTheme.php">Modification theme</a></p>
		<p><a href="modificationType.php">Modification type</a></p>
		<p><a href="suppressionEpoque.php">Suppression époque</a></p>
		<p><a href="suppressionLieu.php">Suppression lieu</a></p>
		<p><a href="suppressionTheme.php">Suppression Thème</a></p>
		<p><a href="suppressionType.php">Suppression Type</a></p>
	</section>
</body>
</html>