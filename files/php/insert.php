<?php
	include "./Parsedown.php";
	include "./ParsedownFilter.php";

	$Parsedown = new ParsedownFilter('parse_filter');
	
	function insertMD($file) {
		$text = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/files/md/".$file.".md");
		echo $Parsedown->text($text);
	} //*/

	/*
	function insertHTML($file) {
		$text = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/files/html/".$file.".html");
		echo $text;
	} //*/
?>
