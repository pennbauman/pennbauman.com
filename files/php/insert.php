<?php
	include $_SERVER['DOCUMENT_ROOT']."/files/php/Parsedown.php";

	function insertMD($file) {
		$Parsedown = new Parsedown();
		echo $Parsedown->text(file_get_contents($_SERVER["DOCUMENT_ROOT"]."/files/md/".$file.".md"));
	}

	function insertHTML($file) {
		echo file_get_contents($_SERVER["DOCUMENT_ROOT"]."/files/html/".$file.".html");
	} //*/

	function insertUser() {
		if ($sys['user']['auth_level'] > 0) {
			echo "user: ".$sys['user']['username']." (<a href='".$sys['link']['logout_url']."'>logout</a>)";
		} else {
			echo "user: <a href='".$sys['link']['login_url']."'>login</a>";
		}
	}
?>
