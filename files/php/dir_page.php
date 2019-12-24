<?php
	//include "/home/valypfnd/php/std.php";
	//include "/home/valypfnd/php/auth.php";
	//include "/home/valypfnd/php/login_url.php";
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
		//Print Content
		echo "user: ".$sys['username']." (<a href='".$sys['logout_url']."'>logout</a>)";
		echo "<h1>".substr($sys['file_path_short'], 0, -3)."</h1>";

		echo "<p><a href='";
		$filePathArray = explode("/", $sys['file_path_short']);
		for ($i = 0; $i < count($filePathArray) - 1; $i++) {
			echo $filePathArray[$i]."/";
		}
		echo "'>parent directory</a></p><p><h4>content</h4></br>";
		$files = scandir(getcwd());
		for ($i = 0; $i < count($files); $i++) {
			if ($files[$i] != "."
				&& $files[$i] != ".."
				&& $files[$i] != "dir.php"
				&& $files[$i] != "error_log") {
				if (is_dir($files[$i])) {
					echo "<a href='".getcwd()."/".$filePathShort."/".$files[$i]."/dir'>".$files[$i]."/</a><br/>\n";
				} else {
					echo "<a href='".getcwd()."/".$filePathShort."/".$files[$i]."'>".$files[$i]."</a><br/>\n";
				}
			}
		}
		echo "</p>";
		
		echo "</body></html>";
	} else {
		include "auth_error.php";
	}
?>
