<?php
// Eviter les injections de code
$prenom = htmlspecialchars($_POST['prenom'], ENT_QUOTES);
$nom = htmlspecialchars($_POST['nom'], ENT_QUOTES);
$association = htmlspecialchars($_POST['association'], ENT_QUOTES);
$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
$texte = htmlspecialchars($_POST['texte']);
$dateMessage = date("Y-m-d H:i:s");

// Test de fonctionnement
echo "Prénom : ".$prenom."<br />
Nom : ".$nom."<br />
Association : ".$association."<br />
Email : ".$email."<br />
Texte : ".$texte."<br />
Date : ".$dateMessage;

// Connexion à la base de donnée
include("include_connexion.php");
// Lancement de l'exception
try {
		// Enregistrement dans la BDD
			$requete = $bdd->prepare('INSERT INTO MessageContact (mco_prenom, mco_nom, mco_association, mco_email, mco_sujet, mco_date) VALUES (:prenom, :nom, :association, :email, :sujet, :dateMessage)');
} catch (Exception $e) { die('Préparation de la requète : '.$e->getMessage() );}
		// On exécute la requète en identifiant les marqueurs
			$requete->execute(array(
									'prenom' => $prenom,
									'nom' => $nom,
									'association' => $association,
									'email' => $email,
									'sujet' => $texte,
									'dateMessage' => $dateMessage));

		// On ferme la requète
			$requete->closeCursor();

// envoi d'email pour me prévenir
$sujet = "Message du site imagedutemps.org";
$message = 'Message du : '.$dateMessage.
			'de : '.$prenom.' '.$nom.
			'association : '.$association.
			'texte : '.$texte.
			'Email de réponse : '.$email;
$destinataire = "creationoqp@yahoo.fr";
$headers = "content-type: text/plain; charset=\"iso-8859-1\"";
if (mail($destinataire,$sujet,$message,$headers)) {
	echo "L'email est envoyé";
} else {
	echo "L'email n'est pas envoyé";
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>L'image du temps</title>
	<meta name="description" content="Formulaire de contact pour correspondre avec l'administrateur du site imagedutemps.org" />
	<meta name="keywords" content="contact, correspondance" />
	<link rel="stylesheet" type="text/css" href="reset.css" />
	<link rel="stylesheet" type="text/css" href="styleContact.css" /> 
	<script type="text/javascript" src="scriptJS.js"></script>
</head>

<body>
<p>Votre message est envoyé</P>
</body>
</html>