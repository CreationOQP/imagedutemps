<?php
if ($_SESSION['langue'] == 'fr') {
	include "../langue/fr.php";
} else if ($_SESSION['langue'] == 'en') {
	include "../langue/en.php";
} else {
	echo "abc";
}
?>
