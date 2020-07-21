<?php
/* Markdown Based Page for General Site
	markdown file is determined by page code
*/
	include_once "std_md.php";

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
	echo "<meta property='og:title' content='".$page_meta['title']." - Penn Bauman'/>";
	echo "<meta property='og:image' content='https://pennbauman.com/files/img/jellyboi_x512.png'/>";
	if (isset($page_meta['description'])) {
		echo "<meta property='og:description' content='".$page_meta['description']."'/>";
	} else {
		echo "<meta property='og:description' content=''/>";
	}
	echo "<link rel='icon' href='/files/img/favicon.png'>";
	echo "<link rel='stylesheet' type='text/css' href='/files/css/general.css'>";
	echo "<script src='/files/js/general.js'></script>";
	// Body
	echo "</head>\n<body>";

	include "std_md_body.php";

	echo "</body></html>";
?>
