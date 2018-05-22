<?php
session_start();
$_SESSION['langue'] = 'fr';
include "langageInclude.php";

?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<title>BackEnd</title>
	<link rel="stylesheet" type="text/css" href="style_backEnd.css" />
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
	</section>
</body>
</html>