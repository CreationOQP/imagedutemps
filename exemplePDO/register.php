<?php
session_start();
//pour éviter les injections de code
$nom = htmlspecialchars($_POST['nom'], ENT_QUOTES);
$prenom = htmlspecialchars($_POST['prenom'], ENT_QUOTES);
$fonction = htmlspecialchars($_POST['fonction'], ENT_QUOTES);
$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
$dates = htmlspecialchars($_POST['date_naissance'], ENT_QUOTES);
$password = htmlspecialchars($_POST['password'], ENT_QUOTES);

// Haschage du mot de page
$hache = password_hash($password, PASSWORD_DEFAULT);

// Vérification du mot de passe
// Connexion à la base de donnée
include("include_connexion.php");
// On prépare la requète avec un marqueur '?'
$requete = $bdd->prepare('SELECT COUNT(uti_nom) AS compte FROM Utilisateur WHERE uti_email = ?');
// On exécute la requète en identifiant le marqueur
$requete->execute(array($email));
// le fetch récupère la donnée dans un tableau
$donne = $requete->fetch();
// Fermeture de la requète
$requete->closeCursor();
// résultat dans une variable. Compte étant le nom de l'alias de la requète
$resultat = $donne['compte'];

// Condition selon le résultat
if ($resultat == 0) {
	$requete = $bdd->prepare('INSERT INTO utilisateur (uti_nom, uti_prenom, uti_fonction, uti_email, uti_date, uti_mot_de_passe) VALUES (:nom, :prenom, :fonction, :email, :dates, :mot_de_passe)');
	$requete->execute(array(
				'nom' => $nom,
				'prenom' => $prenom,
				'fonction' => $fonction,
				'email' => $email,
				'dates' => $dates,
				'mot_de_passe' => $hache));
	$requete->closeCursor();
	$_SESSION['message'] = "votre inscription est officielle, nous vous en remercions.";
	$_SESSION['email'] = $email;
	// On redirige la personne vers la page accueil du site
	header('location:accueil.php');
	exit();
} else {
	$_SESSION['message'] = "Cette adresse mail est déjà utilisé, veuillez en indiquée une autre";
	header('location:inscription.php');
	exit();
}
// design pattern singleton
class PDOConnection
{
    static $_instance;
    public static function getInstance() {
        if (!isset(self::$_instance))
            self::$_instance = new PDO('mysql:host=localhost;dbname=ateliernfa021', 'root', '');
            return self::$_instance;
    }
}


?>

