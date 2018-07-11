<?php 
	include $_SERVER["DOCUMENT_ROOT"]."/files/php/std.php";
	include $_SERVER["DOCUMENT_ROOT"]."/files/php/auth.php";
	include $_SERVER["DOCUMENT_ROOT"]."/files/php/return_path.php";

	setcookie("username", "", time() - 100, "/");
	setcookie("password", "", time() - 100, "/");

	header("Location: ".$returnPath."");
?>