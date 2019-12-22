<?php
	// LOAD: include "/home/valypfnd/php/std_md_page.php";
	// Page for /php/std_md_index.php
	include "/home/valypfnd/php/std.php";
	include "/home/valypfnd/php/file_path.php";
	include "/home/valypfnd/php/get_site.php";

	include $_SERVER['DOCUMENT_ROOT']."/files/php/insert.php"

	// Prepare page.md
	$page = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/files/md/".$pathCode.".md");
	$page = explode("\n", $page);
	$i = 9;
	$page_text = "";
	while ($i < count($page)) {
		$page_text = $page_text.$page[$i]."\n";
		$i++;
	}
	// Print Head
	echo "<!DOCTYPE html><head>";
	echo "<title>".$page[0]." - ".$currentSiteName."</title>";
	echo "<link rel='icon' href='/files/img/favicon.png'>";
	echo "<link rel='stylesheet' type='text/css' href='/files/css/general.css'>";
	echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
	echo "<script src='/files/js/general.js'></script>";
	// Print Body
	echo "</head>\n<body>";
	insertHTML("header_navbar");
	echo "\n<div id='content'>";
	//Print COntent
	//echo "pathCode: $pathCode";
	insertMD($_SERVER["DOCUMENT_ROOT"]."/files/md/$pathCode.md");

	echo "</div>\n";
	insertHTML("footer");
	echo "</body></html>";
?>
