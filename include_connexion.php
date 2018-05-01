<?php
try
{
	 $bdd = new PDO('mysql:host=localhost;dbname=lmouutej_imagedutemps;charset=utf8', 'lmouutej_noel', 'C=z={cN]BVB8');
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
?>