<?php
	include_once "insert.php";
	include_once "auth.php";
	
	if ($sys['user']['auth_level'] > 9) {
		echo "<!DOCTYPE html><head>";
		echo "<title>PHP List</title>";
		echo "<link rel='icon' href='/files/img/files_favicon.png'>";
		echo "<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>";
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
		echo "<script src='/files/js/general.js'></script>";
		echo "</head>\n<body>";
		//Print Content
		echo "user: ".$sys['user']['username']." (<a href='".$sys['link']['logout_url']."'>logout</a>)";
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
		insertHTML("sys_footer");
		echo "</body></html>";
	} else {
		include "auth_error.php";
	}
?>
