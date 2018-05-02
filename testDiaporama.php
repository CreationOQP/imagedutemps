<?php
// 1 création du tableau php
	$tableau = array(
		array(1, 2, 3, 4, 5),
		array(6, 7, 854, 9, 10),
		array(11, 12, 13, 14, 15),
		array(16, 170, 18, 19, 20),
		array(21, 22, 23, 24, 2045)
	);
	$longueur = count($tableau);
	/* var_dump($longueur);
	var_dump($tableau); */
	
	$stringTableauTest = serialize($tableau);
	$stringTableauPHP = serialize($tableau);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>serialize - match</title>
	<link rel="stylesheet" type="text/css" href="testDiaporamaStyle.css" />
	<script src="testDiaporamaScript.js"></script>
</head>
<body onload="recuperationString(),
				affectationString(),
				nombreOccurence(),
				patternOccurence(),
				cheminFichier(),
				ajoutPhoto()">
	<section>
		<h1>Transfert des valeurs d'une BDD de PHP à JavaScript : serialize - match</h1>
<!-- 1 -->	<ol>
				<li>Création du tableau multidimensionnel (5 colonnes) en php</li>
<!-- 2 -->		<li>Affichage du tableau</li>
				<table>
					<tr>
						<th>Colonne 1</th>
						<th>Colonne 2</th>
						<th>Colonne 3</th>
						<th>Colonne 4</th>
						<th>Colonne 5</th>
					</tr>
						<?php for ($i=0; $i<$longueur;$i++) { ?>
						<tr>
							<?php for ($j=0; $j<5; $j++) { ?>
							<td><?php echo $tableau[$i][$j]; ?></td>
							<?php } ?>
						</tr>
						<?php } ?>					
				</table><br />
				
				<li>Linéairalisation du tableau en PHP<br />
				Utilisation de la fonction serialize : <code>&lt;?php $stringTableauTest = serialize($tableau); ?&gt;</code>
					<ul>
						<li>Affichage de la variable $stringTableauTest : <code>&lt;?php echo $stringTableauTest; ?&gt;</code><br />
						<span class="boite_de_pandore"><?php echo $stringTableauTest; ?></span>
						</li>
					</ul>
				</li><br />
				
				<li>Chargement de la variable dans la page web avec un display:none; pour éviter qu'elle s'affiche à l'écran : <code>&lt;li style "display:none;" id="php"&gt;&lt;?php echo $stringTableauPHP;?&gt;&lt;/li&gt;</code></li>
				<li id="php"><?php echo $stringTableauPHP; ?></li><br />
				
				<li>Récupération et affichage de la variable en javascript : <code>var tableauJS = document.getElementById("php").innerHTML;</code><br />
				Affichage de la variable StringTableauJavascript : <br />
				<span id="javascript" class="boite_de_pandore"></span><br />
				<span class="lire">L'intégralité de la requête sur le serveur est récupéré sur le poste client en string (ou en monokini pour celui qui code sur la plage...).</span><br /></li><br />
				
				<li>Désérialization de la chaîne en JavaScript pour la transformer en tableau
					<ul>
						<li>en 1<sup>er</sup> pour trouver le nombre d'occurence <code>stringOccurence = stringTableauJavascript.match(/i:[0-9]*;i:[0-9]*;/g); - nombre = stringOccurence.length; - occurence.innerHTML = nombre;</code><br />
						Nombre occurence : <span class="rouge" id="occurence"></span>. (diviser par le Nbre de colonne, cela me servira pour une boucle).</li>
						
						<li>en 2<sup>ème</sup> pour récupérer en string une occurence <code>stringOccurence = stringTableauJavascript.match(/i:[0-9]*;i:[0-9]*;/g); - patternA = stringOccurence[0].match(/;i:[0-9]*/g) + ""; - patternAA = patternA.substring(3);</code><br />
						Occurence 0 : <span class="rouge" id="occurenceA"></span> - 
						Occurence 1 : <span class="rouge" id="occurenceB"></span> - 
						Occurence 2 : <span class="rouge" id="occurenceC"></span> - 
						Occurence 3 : <span class="rouge" id="occurenceD"></span> - 
						Occurence 4 : <span class="rouge" id="occurenceE"></span> - 
						Occurence 5 : <span class="rouge" id="occurenceF"></span> - 
						Occurence 6 : <span class="rouge" id="occurenceG"></span> - 
						Occurence 7 : <span class="rouge" id="occurenceH"></span> - 
						Occurence 8 : <span class="rouge" id="occurenceI"></span> - 
						Occurence 9 : <span class="rouge" id="occurenceJ"></span> - 
						Occurence 10 : <span class="rouge" id="occurenceK"></span> - 
						Occurence 11 : <span class="rouge" id="occurenceL"></span> - 
						Occurence 12 : <span class="rouge" id="occurenceM"></span> - 
						Occurence 13 : <span class="rouge" id="occurenceN"></span> - 
						Occurence 14 : <span class="rouge" id="occurenceO"></span> - 
						Occurence 15 : <span class="rouge" id="occurenceP"></span> - 
						Occurence 16 : <span class="rouge" id="occurenceQ"></span> - 
						Occurence 17 : <span class="rouge" id="occurenceR"></span> - 
						Occurence 18 : <span class="rouge" id="occurenceS"></span> - 
						Occurence 19 : <span class="rouge" id="occurenceT"></span> - 
						Occurence 20 : <span class="rouge" id="occurenceU"></span> - 
						Occurence 21 : <span class="rouge" id="occurenceV"></span> - 
						Occurence 22 : <span class="rouge" id="occurenceW"></span> - 
						Occurence 23 : <span class="rouge" id="occurenceX"></span> - 
						Occurence 24 : <span class="rouge" id="occurenceY"></span> - 
						</li><br />
					</ul>
				</li>
				<li>Concaténation de la chaîne string en chemin pour la photo <code>cheminA = patternUU; - cheminAA = "diapo/"+cheminA+".png"; - chemin.innerHTML = cheminAA;</code><br />
				Chemin : <span class="rouge" id="chemin"></span></li><br />
				
				<li>Affichage de la photo <code>document.getElementById("photo").src=cheminAA;</code><br />
				<img id="photo" src=""/></li>
				
				<li>Fichiers utilisés à télécharger
					<ul>
						<li><a href="http://imagedutemps.org/testDiaporama.php">PHP</a></li>
						<li><a href="http://imagedutemps.org/testDiaporamaStyle.css">CSS</a></li>
						<li><a href="http://imagedutemps.org/testDiaporamaScript.js">JAVASCRIPT</a></li>
					</ul>
				</li>
				
			</ol>
	</section>
	
</body>
</html>