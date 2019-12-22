<?php
	include "./Parsedown.php";

	$Parsedown = new ParsedownFilter();
	
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
