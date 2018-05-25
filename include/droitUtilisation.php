<?php
	if ($_SESSION['autorisation'] == '' || $_SESSION['autorisation'] == 'membre') {
		$_SESSION['message'] = 'Vous devez être connecté pour accéder à cette page 1';
		header('Location:../index.php');
		exit();
	} elseif ($_SESSION['autorisation'] == "redacteur" || $_SESSION['autorisation'] == 'administrateur') {
		if ($_SESSION['autorisation'] == "redacteur") {
			$display = 'none';
		} else {
			$display = 'block';
		}
	} else {	
	$_SESSION['message'] = 'Vous devez être connecté pour accéder à cette page 2';
		header('Location:../index.php');
		exit();
	}
?>