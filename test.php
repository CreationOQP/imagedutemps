<?php
/* $password1 = 'aaDD34';
$password = password_hash($password1, PASSWORD_DEFAULT);
echo 'mot de passe : '.$password1.'<br />';
echo 'mot de passe hascher : '.$password.'<br />';
echo 'case à cocher : '.$_POST['reglement'].'<br />'; */

session_start();
include "class/connectionBDD.php";
$bdd = ConnectionBDD::getLiaison();

$requeteMail = $bdd->prepare('SELECT CONCAT(utm_nom,\'@\', dns_nom) AS adresse FROM Utilisateur_mail JOIN Dns_mail ON dns_id = utm_dns_id');
$requeteMail->execute();
$donne = $requeteMail->fetchAll();
echo 'Adresse mail :'.$donne['adresse'].'<br />';





?>