<?php
	// LOAD: include $_SERVER["DOCUMENT_ROOT"]."/files/php/file_path.php";
	$filePath = getcwd();
	$filePathShort = substr($filePath, 30);
	$filePathArray = explode("/", $filePathShort);
	$returnLink = "?r=";
	$i = 1;
	while ($i < count($filePathArray)) {
		$returnLink = $returnLink.$filePathArray[$i];
		if ($i < count($filePathArray) - 1) {
			$returnLink = $returnLink."_";
		}
		$i++;
	}
	if ($returnLink == "?r=") {
		$returnLink == "";
	}
?>