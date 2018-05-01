<?php
// 1 - Connexion à la base de donnée
// 2 - Sélection des données dans la BDD
// 3 - Création d'un tableau pour récupérer les données
// 4 - Vérification si le diaporama est automatique ou via le formulaire

session_start ();
$_SESSION['compteur'] = $_SESSION['compteur'] + 1;

$numeroDiapo = 0;
$diapoDemande = 0;
include("include_connexionLocal.php");

$requete = $bdd->prepare('SELECT sce_dia_id, sce_homologue_id, sce_ordre, sce_rang FROM Scenario');
$requete->execute(array());
// PDO::FETCH_ASSOC permet de garder les données dans le tableau
while($donnee = $requete->fetch(PDO::FETCH_ASSOC)) {
	$tableauDiaporama[] = array($donnee['sce_dia_id'], $donnee['sce_homologue_id'], $donnee['sce_ordre'], $donnee['sce_ordre'], $donnee['sce_rang']);	
}

$nombreLigne = count($tableauDiaporama);
$message ="";
// Si le formulaire est activé alors on affiche la photo demandé
if (isset($_POST['afficher'])) {
	If (empty($_POST['numero'])) {
		$message = "Vous devez indiquer un No de diapo";
		} else {
			$numeroDiapo = $_POST['numero'] - 1;
			$diapoDemande = $_POST['numero'];
			$_session['compteur'] = $numeroDiapo;
		}
	} else {
		$numeroDiapo = $_SESSION['compteur'] - 1;
	}

if ($_SESSION['compteur']==$nombreLigne) {
	$_SESSION['compteur'] = 0;
}
$stringTableau = serialize($tableauDiaporama);
// sérialisation des données
/* Il y a quand même une méthode pour faire ça. Il faut sérialiser les données en PHP et les inclure dans le JavaScript que tu enverra, il faudra ensuite en javascript désérialiser les données pour les mettre dans une tbaleau JavaScript.
https://forum.phpfrance.com/javascript-ajax/remplir-tableau-javascript-depuis-une-bse-donnees-aver-t8978.html */


/* var_dump($tableauDiaporama);
var_dump($nombreLigne);
var_dump($_SESSION['compteur']);
var_dump($numeroDiapo); */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>diaporama test</title>
	<script>
		function myFunction() {
		var tableau = document.getElementById("php").innerHTML;
		javascript.innerHTML=tableau;
		var scenario = new Array();
		scenario = unserialize(tableau);
		alert(scenarion);
		}
	</script>
</head>
<body onload="myFunction()">
	<section>
		<ol>
			<li>Connexion à la BDD et récupération des adresses des images<br />
		<img src="diapo/<?php echo $tableauDiaporama[$numeroDiapo][0];?>.png" />
		<img src="diapo/<?php echo $tableauDiaporama[$numeroDiapo][1];?>.png" /><br />
		A chaque rafraichissement (automatique ou manuel (touche F5)) de la page, les images défilent avec un effet désagréable</li><br />
			<li>Sérialisation du tableau PHP : $stringTableau = serialize($tableauDiaporama)<br />
			<?php echo $stringTableau;?></li><br />
			<li>J'affiche la variable PHP avec un display:none; : <code>&lt;li style "display:none;" id="php"&gt;&lt;?php echo $stringTableau;?&gt;&lt;/li&gt;</code> pour la récupérer en JavaScript <code>var tableau = document.getElementById("php").innerHTML;</code></li>
			<li style="display:none;" id="php"><?php echo $stringTableau;?></li><br />
			
			<li>récupération et affichage de la variable en javascript :<br />
			<span id="javascript"></span><br />
			L'intégralité des données de la requête envoyés par le serveur est récupéré sur le poste client</li><br />
			
			<li>Je désérialise la chaîne de caratères pour reproduire le tableau en Javascript</li><br />
			<li>Le tableau est maintenat sur le poste client et une double boucle peut le lire avec tous les avantages de manipulation en javascript et la réalisation du diaporama digne de ce nom.</li>
		
			

		
		
	</section>	
</body>