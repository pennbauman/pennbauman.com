<?php
	include_once "auth.php";

	if (!empty($_POST)) {
		$autofill = $_POST["folder"];
		$location = $sys['home_path']."/".$_POST["folder"]."/error_log";
	} else {
		$location = "";
		$autofill = "";
	}

	if ($sys['user']['auth_level'] > 9) {
		// Print Head
		echo "<!DOCTYPE html><head>";
		echo "<title>PHP Errors</title>";
		echo '<meta charset="UTF-8">';
		echo "<link rel='icon' href='/files/img/files_favicon.png'>";
		echo "<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>";
		echo "<script src='/files/js/general.js'></script>";
		echo "</head>\n<body>";
		//Print Content
		echo "user: ".$sys['user']['username']." (<a href='".$sys['link']['logout_url']."'>logout</a>)";
		echo "<h1>PHP Errors</h1>";
		echo "<form action='/sys/php-errors' method='post'>";
		echo $sys['home_path']."/<input autofocus type='text' name='folder' value='".$autofill."' autofocus>/error_log <br><br/>";
		echo "<p>pennbauman.com -> public_html<br/>";
		echo "dev.pennbauman.com -> pennbauman-dev<br/>";
		//echo "dnd.pennbauman.com -> dnd-site<br/>";
		//echo "dev-dnd.pennbauman.com -> dnd-dev<br/>";
		echo "</p>";
		echo "<input type='submit' value='Enter'>";
		echo "</form><br/><br/>";
		if ($autofill == "") {
			echo "<p><h4 class='error'>No Location Entered</h4><br/><br/></p>";
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
			echo "<p><h4 class='error'>No Such File Exists ($location)</h4><br/><br/></p>";
		}
		insertHTML("sys_footer");
		echo "</body></html>";
	} else {
		include "auth_error.php";
	}
?>
