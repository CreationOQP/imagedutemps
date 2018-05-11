<?php
	function vérificationCookie() {
		echo "le cookie est vérifier"
	}
?>








<?php
	function vérificationCookie() {
		$affichage = "visibility";
		if (isset($_COOKIE["accpetation"])) {
			$affichage = "none";
		} else {
			$affichage ="visibility";
		}
	}
	
	function affichageCookie() {
		echo '<p>Il fait beau</>'.?>
				<form id="cookie" method="post" action="postCreationCookie.php" style="display: <?php echo $affichage;?>;">
					<p >En poursuivant votre visite vous acceptez les règles d'utilisation du site "imagedutemps.org", principalement la non copie des documents présentés, ainsi que l'usage des cookies pour mémoire.
					<input type="submit" name="acceptation" value="J'ACCEPTE" />
					<input type="hidden" name="accepte" value="acceptation" /></p>
				</form>
			<?php ;
	}
?>


include 'test_bis.php';
	vérificationCookie();