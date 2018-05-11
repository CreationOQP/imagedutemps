<?php
	$duree = 365*24*60*60;
	setcookie('acceptation', $_POST['accepte'], time()+$duree, null, null, false, true);
	header("Location: http://www.imagedutemps.org/index.php");
	exit();
?>