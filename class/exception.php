<?php
	class NoelException extends Exception {
		// inutile de déclarer l'attribut puisqu'il est déclaré dans le parent
		
		public function __construct($message, $code=0) {
			parent::__construct($message, $code);
		}
		
		public function __toString() {
			return $this->message;
		}
	}


?>