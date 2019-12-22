<?php
	include $_SERVER['DOCUMENT_ROOT']."/files/php/Parsedown.php";

	function insertMD($file) {
		$Parsedown = new Parsedown();
		//$text = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/files/md/".$file.".md");
		echo $Parsedown->text(file_get_contents($_SERVER["DOCUMENT_ROOT"]."/files/md/".$file.".md"));
		//echo $Parsedown->text($file);
	} //*/

	function insertHTML($file) {
		echo file_get_contents($_SERVER["DOCUMENT_ROOT"]."/files/html/".$file.".html");
	} //*/
?>
