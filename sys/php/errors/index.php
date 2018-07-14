<?php
	include "/home/valypfnd/php/std.php";
	include "/home/valypfnd/php/auth.php";
	include "/home/valypfnd/php/file_path.php";

	if ($auth > 9) {
		// Print Head
		echo "<!DOCTYPE html><head>";
		echo "<title>/php/documentation/</title>";
		echo "<link rel='icon' href='/files/images/files_favicon.png'>";
		echo "<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>";
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
		echo "<script src='/files/js/general.js'></script>";
		// Print Body
		echo "</head>\n<body>";
		//Print Content
		echo "user: ".$username." (<a href='/account/logout.php".$returnLink."'>logout</a>)";
		echo "<h1>/php/documentation/</h1>";
		echo "<p><a href='/sys/php/'>php</a></p>";
		$location = "/home/valypfnd/";
		$files = [
			"main.txt",
			"pennbauman.txt",
			"dnd.txt",
		];
		$errors = file_get_contents($location."public_html/error_log");
		$errors = explode("\n", $errors);
		$i = 0;
		while ($i < count($errors)) {
			echo $errors[$i]."<br/><span class='gap'><br/></span>\n";
			$i++;
		} //*/
		echo "</p>";
		echo "<br/><a href='/'>Home</a> - <a href='/sys/'>System</a>";
		echo "</body></html>";
	} else {
		include "/home/valypfnd/php/auth_error.php";
	}
?>