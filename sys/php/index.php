<?php
	// LOAD: include "/home/valypfnd/php/std_dir_page.php";
	// Page for /php/std_dir_index.php
	include "/home/valypfnd/php/std.php";
	include "/home/valypfnd/php/auth.php";
	//include "/home/valypfnd/php/file_path.php";
	
	if ($auth > 8) {
		// Print Head
		echo "<!DOCTYPE html><head>";
		echo "<title>/php/</title>";
		echo "<link rel='icon' href='/files/images/files_favicon.png'>";
		echo "<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>";
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
		echo "<script src='/files/js/general.js'></script>";
		// Print Body
		echo "</head>\n<body>";
		//Print Content
		echo "user: ".$username." (<a href='/account/logout.php".$returnLink."'>logout</a>)";
		echo "<h1>/php/</h1>";
		echo "<p><a href='/sys/php/documentation/'>documentation</a></p>";
		$files = scandir("/home/valypfnd/php/");
		echo "<p><h4>content</h4></br>";
		$i = 0;
		while ($i < count($files)) {
			if ($files[$i] != "." && $files[$i] != "..") {
				//echo "<a href='".$filePathShort."/".$files[$i]."'>".$files[$i]."</a><br/>\n";
				echo $files[$i]."<br/>\n";
				if (strpos($files[$i], ".") == false && $files[$i] != ".git") {
					$moreFiles = scandir("/home/valypfnd/php/".$files[$i]."/");
					echo "<ul>";
					$q = 0;
					while ($q < count($moreFiles)) {
						if ($moreFiles[$q] != "." && $moreFiles[$q] != "..") {
							echo "<li>".$moreFiles[$q]."</li>\n";
						}
						$q++;
					}
					echo "</ul>";
				}
			}
			$i++;
		}
		echo "</p>";
		echo "<br/><a href='/'>Home</a> - <a href='/sys/'>System</a>";
		echo "</body></html>";
	} else {
		include "/home/valypfnd/php/auth_error.php";
	}
?>