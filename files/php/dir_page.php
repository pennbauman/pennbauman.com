<?php
	include_once "auth.php";
	
	if ($sys['user']['auth_level'] > 8) {
		// Print Head
		echo "<!DOCTYPE html><head>";
		echo "<title>".substr($sys['file_path_short'], 0, -3)."</title>";
		echo "<link rel='icon' href='/files/img/files_favicon.png'>";
		echo "<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>";
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
		echo "<script src='/files/js/general.js'></script>";
		// Print Body
		echo "</head>\n<body>";
		echo "user: ".$sys['user']['username']." (<a href='".$sys['link']['logout_url']."'>logout</a>)";
		echo "<h1>".substr($sys['file_path_short'], 0, -3)."</h1>";

		echo "<p><a href='";
		$path = explode("/", substr($_SERVER['PHP_SELF'], 0, -8));
		for ($i = 0; $i < count($path) - 1; $i++) {
			echo $filePathArray[$i]."/";
		}
		echo "dir'>parent directory</a></p><p><h4>content</h4></br>";
		$files = scandir(getcwd());
		for ($i = 0; $i < count($files); $i++) {
			/*
			if ($files[$i] != "."
				&& $files[$i] != ".."
				&& substr($files[$i], 0, 1) != "."
				&& $files[$i] != "dir.php"
				&& $files[$i] != "error_log") {
			//*/
			if (!preg_match("/^(\..*|dir.php|error_log)$/i", $files[$i])) {

				echo "<a href='".substr($_SERVER['PHP_SELF'], 0, -8).$filePathShort."/".$files[$i];
				if (is_dir($files[$i])) {
					echo "/dir'>".$files[$i]."/</a><br/>\n";
				} else {
					echo "'>".$files[$i]."</a><br/>\n";
				}
			}
		}
		echo "</p>";
		insertHTML("sys_footer");
		echo "</body></html>";
	} else {
		include "auth_error.php";
	}
?>
