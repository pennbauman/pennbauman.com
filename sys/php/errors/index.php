<?php
	include "/home/valypfnd/php/std.php";
	include "/home/valypfnd/php/auth.php";
	include "/home/valypfnd/php/file_path.php";

	if (!empty($_POST)) {
		$location = "/home/valypfnd/".$_POST["folder"]."/error_log";
	} else {
		$location = "";
	}

	if ($auth > 9) {
		// Print Head
		echo "<!DOCTYPE html><head>";
		echo "<title>PHP Errors</title>";
		echo "<link rel='icon' href='/files/images/files_favicon.png'>";
		echo "<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>";
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
		echo "<script src='/files/js/general.js'></script>";
		// Print Body
		echo "</head>\n<body>";
		//Print Content
		echo "user: ".$username." (<a href='/account/logout.php".$returnLink."'>logout</a>)";
		echo "<h1>PHP Errors</h1>";
		echo "<form action='/sys/php/errors/' method='post'>";
		echo "<b>Error Folder:</b> <br/> ";
		echo "/home/valypfnd/<input type='text' name='folder' value=''>/error_log <br><br/>";
		echo "<input type='submit' value='Enter'>";
		echo "</form>";
		if ($location != "") {
			echo "<p><h4>Errors: ".$location."</h4><br/>";
			$errors = file_get_contents($location);
			$errors = explode("\n", $errors);
			$i = count($errors);
			while ($i >= 0 ) {
				if ($errors[$i] != "") {
					echo $errors[$i]."<br/><br/>\n";
				}
				$i--;
			} //*/
			echo "</p>";
		}
		echo "<a href='/'>Home</a> - <a href='/sys/'>System</a>";
		echo "</body></html>";
	} else {
		include "/home/valypfnd/php/auth_error.php";
	}
?>