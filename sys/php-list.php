<?php
	//include "/home/valypfnd/php/std.php";
	include "/home/valypfnd/php/auth.php";
	//include "/home/valypfnd/php/login_url.php";
	
	if ($auth > 9) {
		echo "<!DOCTYPE html><head>";
		/echo "<title>PHP List</title>";
		echo "<link rel='icon' href='/files/img/files_favicon.png'>";
		echo "<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>";
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
		echo "<script src='/files/js/general.js'></script>";
		echo "</head>\n<body>";
		//Print Content
		echo "user: ".$username." (<a href='".$logoutURL."'>logout</a>)";
		echo "<h1>PHP List</h1>";
		$files = scandir("/home/valypfnd/php/");
		$i = 0;
		while ($i < count($files)) {
			if ($files[$i] != "." && $files[$i] != "..") {
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
