<?php
	// LOAD: include $_SERVER["DOCUMENT_ROOT"]."/files/php/std_md_page.php";
	// Page for /files/php/std_md_index.php
	include $_SERVER["DOCUMENT_ROOT"]."/files/Parsedown/Parsedown.php";
	$Parsedown = new Parsedown();
	// Prepare page.md
	$page = file_get_contents("page.md");
	$page = explode("\n", $page);
	$i = 9;
	$page_text = "";
	while ($i < count($page)) {
		$page_text = $page_text.$page[$i]."\n";
		$i++;
	}
	// Print Head
	echo "<!DOCTYPE html><head>";
	echo "<title>".$page[0]." | Penn's D&amp;D</title>";
	echo "<link rel='icon' href='/files/images/favicon.png'>";
	echo "<link rel='stylesheet' type='text/css' href='/files/css/hub.css'>";
	echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
	echo "<script src='/files/js/general.js'></script>";
	// Print Body
	echo "</head>\n<body>";
	include $_SERVER["DOCUMENT_ROOT"]."/files/php/std_header_navbar.php";
	echo "\n<div id='content'>";
	//Print COntent
	echo $Parsedown->text($page_text);

	echo "</div>\n";
	include $_SERVER["DOCUMENT_ROOT"]."/files/php/std_footer.php";
	echo "</body></html>";
?>