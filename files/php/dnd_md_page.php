<?php
/* Markdown Based Page for D&D Subsite
	markdown file is determined by page code
*/
	$Parsedown = new Parsedown();

	// Prepare page.md
	$page = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/files/md/".$sys['path_code'].".md");
	$page = explode("\n", $page);
	$page_text = "";
	$page_meta = array();
	$inMeta = false;
	for ($i = 0; $i < count($page); $i++) {
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
	echo "<!DOCTYPE html><html lang='en-US'><head>";
	echo "<title>".$page_meta['title']." - Penn's D&amp;D</title>";
	echo '<meta charset="UTF-8">';
	echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
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
	echo "<link rel='stylesheet' href='/files/css/dnd.css'>";
	// Body
	echo "</head>\n<body>";
	insertHTML("dnd_header");
	echo "\n<div id='content' class='dnd-content'>";
	echo $Parsedown->text($page_text);
	echo "</div>\n";
	insertHTML("dnd_footer");
	echo "</body></html>";
?>
