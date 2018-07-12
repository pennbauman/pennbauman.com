<?php
	// LOAD: include $_SERVER["DOCUMENT_ROOT"]."/files/php/std_dir_page.php";
	// Page for /files/php/std_dir_index.php
	include $_SERVER["DOCUMENT_ROOT"]."/files/php/std.php";
	include $_SERVER["DOCUMENT_ROOT"]."/files/php/auth.php";
	include $_SERVER["DOCUMENT_ROOT"]."/files/php/file_path.php";
	
	if ($auth > 8) {
		// Print Head
		echo "<!DOCTYPE html><head>";
		echo "<title>".$filePathShort."/"."</title>";
		echo "<link rel='icon' href='/files/images/files_favicon.png'>";
		echo "<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>";
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
		echo "<script src='/files/js/general.js'></script>";
		// Print Body
		echo "</head>\n<body>";
		//Print Content
		echo "user: ".$username." (<a href='/account/logout.php".$returnLink."'>logout</a>)";
		echo "<h1>".$filePathShort."/"."</h1>";

		$files = scandir($filePath);
		echo "<p><a href='";
		$i = 0;
		while ($i < count($filePathArray) - 1) {
			echo $filePathArray[$i]."/";
			$i++;
		}
		echo "'> parent directory</a></p><p><h4>content</h4></br>";
		$i = 0;
		while ($i < count($files)) {
			if ($files[$i] != "." && $files[$i] != "..") {
				echo "<a href='".$filePathShort."/".$files[$i]."'>".$files[$i]."</a><br/>\n";
			}
			$i++;
		}
		echo "</p>";
		
		echo "</body></html>";
	} else {
		//echo "<a href='/account/login/".$returnLink."'>Login</a>";
		include $_SERVER["DOCUMENT_ROOT"]."/files/php/auth_error.php";
	}
?>