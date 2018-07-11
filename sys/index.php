<?php
	include $_SERVER["DOCUMENT_ROOT"]."/files/php/std.php";
	include $_SERVER["DOCUMENT_ROOT"]."/files/php/auth.php";
	include $_SERVER["DOCUMENT_ROOT"]."/files/php/file_path.php";
	if ($auth > 8) {
		echo "<!DOCTYPE html><head>";
		echo "<title>System</title>";
		echo "<link rel='icon' href='/files/images/sys_favicon.png'>";
		echo "<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>";
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
		echo "<script src='/files/js/general.js'></script>";
		// Print Body
		echo "</head>\n<body>";
		//Print Content
		echo "user: ".$username." (<a href='/account/logout.php".$returnLink."'>logout</a>)";
		echo "<h1>System</h1>";
		echo "<p>";
		echo "<a href='/sys/hash/'>Hash</a> <br/>";
		echo "<a href='/sys/page-size/'>Page Size</a> <br/>";
		echo "<a href='/sys/test/'>Test</a> <br/>";
		echo "<a href='/sys/test/favicon'>Favicon Test</a> <br/>";
		echo "</body></html>";
	} else {
		//echo "<a href='/account/login/".$returnLink."'>Login</a>";
		include $_SERVER["DOCUMENT_ROOT"]."/files/php/auth_error.php";
	}
?>