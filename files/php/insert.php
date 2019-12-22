<?php
	include "./Parsedown.php";
	include "./MetaParsedown.php";

	$Parsedown = new MetaParsedown();
	
	function insertMD($file) {
		//$text = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/files/md/".$file.".md");
		echo $Parsedown->text(file_get_contents($_SERVER["DOCUMENT_ROOT"]."/files/md/".$file.".md"));
	} //*/

	function insertMDmeta($file, $tag) {
		//$text = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/files/md/".$file.".md");
		$insertMD_meta = $Parsedown->meta(file_get_contents($_SERVER["DOCUMENT_ROOT"]."/files/md/".$file.".md"));
		return $insertMD_meta[$tag];
	}

	/*
	function insertHTML($file) {
		$text = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/files/html/".$file.".html");
		echo $text;
	} //*/
?>
