<?php
	// LOAD: include $_SERVER["DOCUMENT_ROOT"]."/files/php/return_path.php";
	$URLVarR = URLVar("r");
	if ($URLVarR == NULL) {
		$URLEnd = "";
	} else {
		$URLEnd = "?r=".$URLVarR;
	}
	$URLVarR = explode("_", $URLVarR);
	$returnPath = "/";
	$i = 0;
	while ($i < count($URLVarR)) {
		$returnPath = $returnPath.$URLVarR[$i]."/";
		$i++;
	}
?>