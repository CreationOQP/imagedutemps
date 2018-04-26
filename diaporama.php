<?php
session_start ();
$_SESSION['compteur'] = $_SESSION['compteur'] + 1;
// Connexion BDD
include("include_connexion.php");
// Récurpération des données de la BDD pour les mettre dans un tableau
$req = $bdd->prepare('SELECT sce_dia_id, sce_homologue_id, sce_ordre, sce_rang FROM scenario');
$req->execute(array());
while($donnee = $req->fetch(PDO::FETCH_ASSOC)) {	// PDO::FETCH_ASSOC permet de garder les données dans le tableau
// Création du tableau
$tableauDiaporama[] = array($donnee['sce_dia_id'], $donnee['sce_homologue_id'], $donnee['sce_ordre'], $donnee['sce_rang']);
}
// var_dump($tableauDiaporama);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>diaporama test</title>
	<style>
		table, th, td { border : 1px solid blue;}
		table { border-collapse : collapse;}
	</style>
</head>
<body>
	<section>
	<p>Nombre de ligne du tableau : 
		<?php $nombreLigne = count($tableauDiaporama);
		echo $nombreLigne; ?></p>
	<p>Affichage de la diapo 3 :<br /> <img src="diapo/<?php echo $tableauDiaporama[4][0];?>.png" />
		<img src="diapo/<?php echo $tableauDiaporama[4][1];?>.png" /></p>
	<p>Variable session : 
	<?php echo $_SESSION['compteur'];	
	?></p>
	
<p>Affichage d'une photo choisie : </p>
<form action="diaporama.php" method="post">
		<label>No de la photo - </label><input type="text" name="numero" value=5  autofocus />
		<button type="submit">Envoyer</button><br />
		<img src="diapo/<?php echo $tableauDiaporama[$_POST["numero"]-1][0];?>.png" />
		<img src="diapo/<?php echo $tableauDiaporama[$_POST["numero"]-1][1];?>.png" />
		</form>
		
	<p>Affichage de la photo suivante</p>
		<img src="diapo/<?php echo $tableauDiaporama[$_SESSION['compteur']-1][0];?>.png" />
		<img src="diapo/<?php echo $tableauDiaporama[$_SESSION['compteur']-1][1];?>.png" />
	
</section>
</body>
</html>