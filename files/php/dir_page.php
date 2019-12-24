<?php
	//include "/home/valypfnd/php/std.php";
	//include "/home/valypfnd/php/auth.php";
	//include "/home/valypfnd/php/login_url.php";
	include_once "auth.php";
	
	if ($sys['user']['auth_level'] > 8) {
		// Print Head
		echo "<!DOCTYPE html><head>";
		echo "<title>".$sys['file_path_short']."/"."</title>";
		echo "<link rel='icon' href='/files/img/files_favicon.png'>";
		echo "<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>";
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
		echo "<script src='/files/js/general.js'></script>";
		// Print Body
		echo "</head>\n<body>";
		//Print Content
		echo "user: ".$sys['username']." (<a href='".$sys['logout_url']."'>logout</a>)";
		echo "<h1>".$sys['file_path_short']."/"."</h1>";

		echo "<p><a href='";
		$filePathArray = explode("/", $sys['file_path_short']);
		for ($i = 0; $i < count($filePathArray) - 1; $i++) {
			echo $filePathArray[$i]."/";
		}
		echo "'>parent directory</a></p><p><h4>content</h4></br>";
		$files = scandir($sys['file_path']);
		for ($i = 0; $i < count($files); $i++) {
			if ($files[$i] != "." && $files[$i] != "..") {
				if (is_dir($files[$i])) {
					echo "<a href='".$filePathShort."/".$files[$i]."/dir'>".$files[$i]."/</a><br/>\n";
				} else {
					echo "<a href='".$filePathShort."/".$files[$i]."'>".$files[$i]."</a><br/>\n";
				}
			}
		}
		echo "</p>";
		
		echo "</body></html>";
	} else {
		include "auth_error.php";
	}
?>
