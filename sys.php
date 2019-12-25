<?php
	include_once "auth.php";

	if ($sys['user']['auth_level'] > 8) {
		echo "<!DOCTYPE html><head>";
		echo "<title>System</title>";
		echo "<link rel='icon' href='/files/img/sys_favicon.png'>";
		echo "<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>";
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
		echo "<script src='/files/js/general.js'></script>";
		echo "</head>\n<body>";
		//Print Content
		echo "user: ".$sys['user']['username']." (<a href='".$sys['link']['logout_url']."'>logout</a>)";
		echo "<h1>System</h1>";
		echo "<p>";
		echo "<a href='/sys/links'>Shortcut Links</a> <br/>";
		echo "<br/>";
		echo "<a href='/sys/php-errors'>PHP Errors</a> <br/>";
		echo "<a href='/sys/php-docs'>PHP Docs</a> <br/>";
		echo "<a href='/sys/php-list'>PHP List</a> <br/>";
		echo "<br/>";
		echo "<a href='/sys/hash'>Hash</a> <br/>";
		echo "<a href='/sys/page-size'>Page Size</a> <br/>";
		echo "<a href='/sys/test'>Test</a> <br/>";
		echo "<a href='/sys/test-favicon'>Favicon Tester</a> <br/>";
		//echo "<a href='/sys/test/color'>Color Tester</a> <br/>";
		echo "</p>";
		insertHTML("sys_footer");
		echo "</body></html>";
	} else {
		include "auth_error.php";
	}
?>
