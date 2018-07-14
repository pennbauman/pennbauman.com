<?php
	include "/home/valypfnd/php/std.php";
	include "/home/valypfnd/php/auth.php";
	include "/home/valypfnd/php/file_path.php";
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
		echo "<a href='/sys/test/favicon/'>Favicon Tester</a> <br/>";
		echo "<a href='/sys/test/color/'>Color Tester</a> <br/>";
		echo "<a href='/sys/php/'>PHP</a> <br/>";
		echo "<a href='/sys/php/errors/'>PHP Errors</a> <br/>";
		echo "</p>";
		echo '<br/><a href="/">Home</a>';
		echo "</body></html>";
	} else {
		//echo "<a href='/account/login/".$returnLink."'>Login</a>";
		include "/home/valypfnd/php/auth_error.php";
	}
?>