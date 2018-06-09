<?php
session_start();

if (!isset($_SESSION['message'])) {
	$_SESSION['message'] = 'Les jolies colonies de vacances...';
}
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
	<p>include fichiers</p>
		<?php 
			if ($_SESSION['userQualite'] == 4 ) {
				include "../include/menuRedacteur.php";
			} else if ($_SESSION['userQualite'] == 5 ) {
				include "../include/menuAdmin.php";
			} else {
				header('Location:../index.php');
			}
		?>
	</section>
	<footer>
		<h3><?php echo $_SESSION['message'].'<br />';?></h3>
		<h3><?php echo 'qualite : '.$_SESSION['userQualite'].'<br />'; ?></h3>
	</footer>
</body>
</html>