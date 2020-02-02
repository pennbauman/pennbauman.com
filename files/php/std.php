<?php
/* General Code and Variable Setup for All Pages

Variables:
	$sys
		home_path = server home directory
		auth_file = file to get passwords for MySQL database
		file_path_short = path to page without .php
		path_code = code to indicate page, with '_' repalacing '/'
		links
			login_url = url for login page
			logout_url = url for logout page
			return_url = url to get back to previous pages (used by login and logout)

Fucntions:
	insertMD(file) = insert markdown from /files/md/file.md
	insertHTML(file) = insert html from /files/html/file.html

*/
	// System Info Variable Decleration
	$sys = array();
	$sys['home_path'] = explode("/", $_SERVER["DOCUMENT_ROOT"]);
	$sys['home_path'] = "/".$sys['home_path'][1]."/"$sys['home_path'][2];

	// Database query setup
	$sys['auth_file'] = explode("\n", file_get_contents("/home/valypfnd/php/.auth"));
	//echo "Database: $authFile[0] $authFile[1] $authFile[2]";
	$pdo_options = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
	];
	try {
		$pdo = new PDO("mysql:host=localhost;dbname=".$sys['auth_file'][2]."pennbauman;charset=utf8mb4", $sys['auth_file'][0], $sys['auth_file'][1], $pdo_options);
	} catch (\PDOException $e) {
		throw new \PDOException($e->getMessage(), (int)$e->getCode());
		error_log("pdo failed");
	}

	// File Path Data
	$sys['file_path_short'] = substr($_SERVER['PHP_SELF'], 0, -4);
	$filePathArray = explode("/", $sys['file_path_short']);
	$sys['path_code'] = "";
	for ($i = 1; $i < count($filePathArray); $i++) {
		$sys['path_code'] .= $filePathArray[$i];
		if ($i < count($filePathArray) - 1) {
			$sys['path_code'] .= "_";
		}
	}

	// Links
	$sys['links'] = array();
	if (explode("/", getcwd())[3] == "public_html") {
		$sys['link']['login_url'] = "/account/login?rpath=".$sys['path_code'];
		$sys['link']['logout_url'] = "/account/logout.php?rpath=".$sys['path_code'];
	} else {
		$site = explode(".", $_SERVER['HTTP_HOST'])[0];
		//error_log($site);
		$sys['link']['login_url'] = "https://pennbauman.com/account/login?rsite=".$site."&rpath=".$sys['path_code'];
		$sys['link']['logout_url'] = "https://pennbauman.com/account/logout.php?rsite=".$site."&rpath=".$sys['path_code'];
	}
	if (isset($_GET['rsite'])) {
		$sys['link']['return_url'] = "http://".$_GET['rsite'].".pennbauman.com/";
	} else {
		$sys['link']['return_url'] = "/";
	}
	if (isset($_GET['rpath'])) {
		$pathArray = explode("_", $_GET['rpath']);
		$sys['link']['return_url'] .= $pathArray[0];
		for ($i = 1; $i < count($pathArray); $i++) {
			$sys['link']['return_url'] .= "/".$pathArray[$i];
		}
	}

	// Insert functions
	include $_SERVER['DOCUMENT_ROOT']."/files/php/Parsedown.php";

	function insertMD($file) {
		$Parsedown = new Parsedown();
		echo $Parsedown->text(file_get_contents($_SERVER["DOCUMENT_ROOT"]."/files/md/".$file.".md"));
	}
	function insertHTML($file) {
		echo file_get_contents($_SERVER["DOCUMENT_ROOT"]."/files/html/".$file.".html");
	}
?>
