<?php
	//include $_SERVER['DOCUMENT_ROOT']."/files/php/insert.php";
	if ($sys['include']['insert'] == true) {
		error_log("insert.php double included");
	} else {
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
		$sys['include']['insert'] = true;
	}
?>
