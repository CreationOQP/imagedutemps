<?php
/* If (!isset($_SESSION['disturb']) || !isset($_POST['compteur']) || empty($_SESSION['disturb']) || empty($_POST['compteur']) || ($_SESSION['disturb'] != $_POST['compteur'])) {
	$_SESSION['message'] = 'Ne soyez pas relou, n\'insistez pas !!!2 ';
	$_SESSION = array();
	session_destroy();
	header('Location:../test.php');
	exit();
} else {
	$page = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
	$_SESSION['disturb']= $page;
	$_SESSION['ouf'] = $page;
} */
?>