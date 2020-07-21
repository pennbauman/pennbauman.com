<?php
/* Markdown Body Generator for General Site
	markdown file is determined by page code
*/
	include_once "std_md.php";
	$Parsedown = new Parsedown();

	insertHTML("header");
	echo "\n<div id='content' class='std-content'>";
	echo $Parsedown->text($page_text);
	echo "</div>\n";
	insertHTML("footer");
?>
