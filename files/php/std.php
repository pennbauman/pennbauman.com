<?php
	if (array_key_exists('sys', get_defined_vars())) {
		error_log("std.php double included");
	} else {
		$sys = array();
		$sys['include'] = array();
		$sys['include']['insert'] = false;

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
		$sys['file_path'] = getcwd();
		$sys['file_path_short'] = substr($_SERVER['PHP_SELF'], 0, -4);
		$filePathArray = explode("/", $sys['file_path_short']);
		$sys['path_code'] = "";
		for ($i = 1; $i < count($filePathArray); $i++) {
			$sys['path_code'] .= $filePathArray[$i];
			if ($i < count($filePathArray) - 1) {
				$sys['path_code'] .= "_";
			}
		}
		if ($sys['path_code'] != "") {
			$sys['return_link'] = "?r=".$sys['path_code'];
		} else {
			$sys['return_link'] = "";
		}

		if (explode("/", getcwd())[3] == "public_html") {
			$sys['login_url'] = "/account/login?rpath=".$sys['path_code'];
			$sys['logout_url'] = "/account/logout.php?rpath=".$sys['path_code'];
		} else {
			$site = explode(".", $_SERVER['HTTP_HOST'])[0];
			//error_log($site);
			$sys['login_url'] = "https://pennbauman.com/account/login?rsite=".$site."&rpath=".$sys['path_code'];
			$sys['logout_url'] = "https://pennbauman.com/account/logout.php?rsite=".$site."&rpath=".$sys['path_code'];
		}
		
		// Get Site Data
		/*
		$siteFolders = [
			"dnd-site" => "dnd",
			"dnd-dev" => "dnd",
			"public_html" => "pennbauman",
			"pennbauman-dev" => "pennbauman",
		];
		$siteNames = [
			"dnd-site" => "Penn's D&amp;D",
			"dnd-dev" => "Penn's D&amp;D",
			"public_html" => "Penn Bauman",
			"pennbauman-dev" => "Penn Bauman",
		];
		$sys['current_site'] = explode("/", $sys['file_path'])[3];
		$sys['current_site_name'] = $siteNames[$sys['current_site']];
		$sys['current_site'] = $siteFolders[$sys['current_site']];
		//*/

		/*
		function boolToStr($bool) {
			if ($bool == true) {
				return "true";
			} else if ($bool == false) {
				return "false";
			} else {
				return "other";
			}
		}

		/*
		function URLVar($varName) {
			if (isset($_GET[$varName])) {
				$fin = $_GET[$varName];
			} else {
				$fin = NULL;
			}
			return $fin;
		}
		$url = URLVar("a");
		//*/
		
		/*
		function teleNumFormat($number) {
			for ($q = 0; $q < strlen($number); $q++) {
				if (substr($number, $q, 1) == "-" || substr($number, $q, 1) == " ") {
					$number = substr($number, 0, $q).substr($number, $q+1, strlen($number)-$q-1);
					$q--;
				}
			}
			return $number;
		} //*/
	}
?>
