<?php
class ConnectionBDD
{
    static $bdd;
	
	public function __construct($bdd) {
		$this->bdd = $bdd;
	}
    
    public static function getLiaison() {
        if (!isset(self::$bdd))
           /*  self::$_liaison = new PDO('mysql:host=localhost;dbname=lmouutej_imagedutemps;charset=utf8', 'lmouutej_noel', 'C=z={cN]BVB8'); */
            self::$bdd = new PDO('mysql:host=localhost;dbname=imagedutemps;charset=utf8', 'root', '');
            
            return self::$bdd;
	}
}

/* $modification = (new ThemeManager())->updatetheme($bdd, $theId, $theNom, $theDescription, $theCommentaire); */

?>