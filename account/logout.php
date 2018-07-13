<?php 
	include "/home/valypfnd/php/std.php";
	include "/home/valypfnd/php/auth.php";
	include "/home/valypfnd/php/return_path.php";

	setcookie("username", "", time() - 100, "/");
	setcookie("password", "", time() - 100, "/");

	header("Location: ".$returnPath."");
?>