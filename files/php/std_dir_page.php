<?php
	include $_SERVER["DOCUMENT_ROOT"]."/files/php/std.php";
	include $_SERVER["DOCUMENT_ROOT"]."/files/php/auth.php";
	include $_SERVER["DOCUMENT_ROOT"]."/files/php/file_path.php";
	/*$page = file_get_contents("page.md");
	$page = explode("\n", $page);
	$i = 9;
	$page_text = "";
	while ($i < count($page)) {
		$page_text = $page_text.$page[$i]."\n";
		$i++;
	} //*/
	/*function arrayPrint($array, $spacer) {
		$i = 0;
		$fin = "";
		while ($i < count($array)) {
			$fin = $fin.$array[$i].$spacer;
			$i++;
		}
		return $fin;
	} //*/
	//$filePath = $filePath;
	// Print Head
	if ($auth > 8) {
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
		//echo arrayPrint($files, "<br/>\n");
		
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