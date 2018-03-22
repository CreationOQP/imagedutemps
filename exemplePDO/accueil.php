<?php
session_start();
$email = $_SESSION['email'];
include("include_connexion.php");
$requete = $bdd->prepare('SELECT uti_prenom AS prenom FROM Utilisateur WHERE uti_email = ?');
$requete->execute(array($email));
$donnee = $requete->fetch();
$requete->closeCursor();
$prenom = $donnee['prenom'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Accueil Noël</title>
	<link rel="stylesheet" type="text/css" href="reset.css" />
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script src="scriptjs.js"></script>
</head>
<body>
	<h1>votre inscription</h1>
	<p id="message"><?php echo $prenom." ".$_SESSION['message'];?></p>
</body>
</html>