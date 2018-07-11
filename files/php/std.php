<?php 
	// LOAD: include $_SERVER["DOCUMENT_ROOT"]."/files/php/std.php";

	//$conn = new mysqli("localhost", "valypfnd_admin", "2101143259", "valypfnd_assassins_users");
	
	function boolToStr($bool) {
		if ($bool == true) {
			return "true";
		} else if ($bool == false) {
			return "false";
		} else {
			return "other";
		}
	}

	function URLVar($varName) {
		if (isset($_GET[$varName])) {
		$fin = $_GET[$varName];
	} else {
		$fin = NULL;
	}
	return $fin;
	}
	$url = URLVar("a");
	
	//$n = "<br/> \n";
?>