<?php
/* Markdown Based Page for General Site
	markdown file is determined by page code
*/
	$Parsedown = new Parsedown();

	// Prepare page.md
	$page = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/files/md/".$sys['path_code'].".md");
	$page = explode("\n", $page);
	$page_text = "";
	$page_meta = array();
	$inMeta = false;	for ($i = 0; $i < count($page); $i++) {
		if (($i == 0) && preg_match("/^[-]+$/", $page[$i])) {
			$inMeta = true;
		} else if ($inMeta && preg_match("/^[-]+$/", $page[$i])) {
			$inMeta = false;
		} else if ($inMeta) {
			$line_split = explode(":", $page[$i]);
			$page_meta[$line_split[0]] = $line_split[1];
		} else {
			$page_text = $page_text.$page[$i]."\n";
		}
	} //*/

	// Head
	echo "<!DOCTYPE html><head>";
	echo "<title>".$page_meta['title']." - Penn Bauman</title>";
	echo '<meta charset="UTF-8">';
	if (isset($page_meta['description'])) {
		echo "<meta name='description' content=\"".$page_meta['description']."\"/>";
	}
	echo "<meta name='author' content='Penn Bauman'>";
	if (isset($page_meta['robots'])) {
		echo "<meta name='robots' content='".$page_meta['robots']."'/>";
	} else {
		echo "<meta name='robots' content='noindex'/>";
	}
	echo "<link rel='icon' href='/files/img/favicon.png'>";
	echo "<link rel='stylesheet' type='text/css' href='/files/css/general.css'>";
	echo "<script src='/files/js/general.js'></script>";
	// Body
	echo "</head>\n<body>";
	insertHTML("header");
	echo "\n<div id='content' class='std-content'>";
	echo $Parsedown->text($page_text);
	echo "</div>\n";
	insertHTML("footer");
	echo "</body></html>";
?>
