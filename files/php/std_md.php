<?php
/* Prepare markdown files for page
	markdown file is determined by page code
*/
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
	}
?>
