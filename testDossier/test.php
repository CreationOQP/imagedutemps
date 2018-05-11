<?php
	$test = "Il faut beau";
	$test1 = "il pleut";
	$test3 = $test. " et ". $test1;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>test</title>
	<link rel="stylesheet" type="text/css" href="style/reset.css" />
	<link rel="stylesheet" type="text/css" href="style/style.css" />
	<meta name="Description" content="Les image du temps passé confrontées au temps présent." />
	<meta name="Keywords" content="image, hier, aujourd'hui, diaporama" />
	<script type="text/javascript" src="script/scriptJS.js"></script>
</head>
<body>
	<p><?php echo $test; ?></p>
	<p><?php echo $test1; ?></p>
	<p><?php echo $test3; ?></p>
	
</body>
</html>