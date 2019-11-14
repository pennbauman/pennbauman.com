<?php
	include "/home/valypfnd/php/std.php";
	include "/home/valypfnd/php/auth.php";
	include "/home/valypfnd/php/login_url.php";

	if (!empty($_POST)) {
		$autofill = $_POST["folder"];
		$location = "/home/valypfnd/".$_POST["folder"]."/error_log";
	} else {
		$location = "";
		$autofill = "";
	}

	if ($auth > 9) {
		// Print Head
		echo "<!DOCTYPE html><head>";
		echo "<title>PHP Errors</title>";
		echo "<link rel='icon' href='/files/img/files_favicon.png'>";
		echo "<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>";
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
		echo "<script src='/files/js/general.js'></script>";
		// Print Body
		echo "</head>\n<body>";
		//Print Content
		echo "user: ".$username." (<a href='".$logoutURL."'>logout</a>)";
		echo "<h1>PHP Errors</h1>";
		echo "<form action='/sys/php/errors/' method='post'>";
		echo "/home/valypfnd/<input autofocus type='text' name='folder' value='".$autofill."' autofocus>/error_log <br><br/>";
		echo "<input type='submit' value='Enter'>";
		echo "</form><br/><br/>";
		if ($autofill == "") {
			echo "<p><h4 class='error'>Please Enter a Location</h4><br/><br/></p>";
		} elseif (file_exists($location)) {
			echo "<p><h4>".$location."</h4><br/>";
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
		} else {
			echo "<p><h4 class='error'>No Such File Exists</h4><br/><br/></p>";
		}
		echo "<a href='/'>Home</a> - <a href='/sys/'>System</a>";
		echo "</body></html>";
	} else {
		include "/home/valypfnd/php/auth_error.php";
	}
?>
