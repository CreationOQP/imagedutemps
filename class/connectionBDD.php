<?php
/* class ConnectionBDD
{
    static $liaison;
    
    public static function getLiaison() {
        if (!isset(self::$liaison))
            self::$liaison = new PDO('mysql:host=localhost;dbname=lmouutej_imagedutemps;charset=utf8', 'lmouutej_noel', 'C=z={cN]BVB8');
            
            return self::$liaison;
	}
} */

class ConnectionBDD
{
    static $liaison;
    
    public static function getLiaison() {
        if (!isset(self::$liaison)) {
            self::$liaison = new PDO('mysql:host=localhost;dbname=imagedutemps;charset=utf8', 'root', '');  
            return self::$liaison;
		}
	}
}
?>