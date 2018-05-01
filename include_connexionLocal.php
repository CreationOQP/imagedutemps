<?php
try
{
	 $bdd = new PDO('mysql:host=localhost;dbname=imagedutemps;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
?>