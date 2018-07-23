<?php 
	include "/home/valypfnd/php/std.php";
	include "/home/valypfnd/php/auth.php";
	include "/home/valypfnd/php/file_path.php";
	include "/home/valypfnd/php/get_site.php";

	// 301 Redirect from app.greenamerica.org/something to greenamerica.org/something-else
	if (($_SERVER['HTTP_HOST'] == "app.greenamerica.org") && (php_sapi_name() != "cli")) {
		// Redirects for specific URLs
		$appGAFolders = [
			"/fossil-free/index.cfm" =>	"/divest-reinvest/",
			"/world-of-hurt/index.cfm" =>"/magazine/world-hurt",
			"/food-print/index.cfm" => "/magazine/dont-have-cow",
			"/climate-justice/index.cfm" => "/magazine/climate-justice-all",
			"/climate-justice/2016/02/05/discussion-guide.html" => "/climate-justice-all/discussion-guide-climate-justice",
			"/climate-justice/2016/01/02/latino-voices.html" => "/climate-justice-all/power-latino-voices-climate",
			"/climate-justice//2015/12/31/climate-justice-for-all.html" => "/magazine/climate-justice-all",
			"/climate-justice/2016/01/03/mohamed-nasheed.html" => "/climate-justice-all/mohamed-nasheed-climate-champion-worlds-most-vulnerable",
			"/climate-justice/2016/03/01/resources.html" => "/magazine/climate-justice-all",
		];
		if (array_key_exist($_SERVER['REQUEST_URI'], $appGAFolders)) {
			header('HTTP/1.0 301 Moved Permanently');
			header('Location: https://greenamerica.org'.$appGAFolders[$_SERVER["REQUEST_URI"]]);
			exit();
		}
		// Redirects for all parts of subdirectory
		$URLPath = explode("/", $_SERVER['REQUEST_URI']);
		$URLPath = $URLPath[1];
		$appGAFoldersSubs = [
			"fossil-free" => "/fight-dirty-energy-grow-clean-energy/divest-reinvest/find-fossil-free-financial-products-services",
			"world-of-hurt" => "/world-hurt/8-things-you-didnt-know-were-made-sweatshop-labor",
		];
		if (array_key_exist($URLPath, $appGAFoldersSubs)) {
			header('HTTP/1.0 301 Moved Permanently');
			header('Location: https://greenamerica.org'.$appGAFolders[$URLPath]);
		}
	}

	if ($auth > 8) {
		echo "<!DOCTYPE html><head>";
		echo "<title>Test</title>";
		echo "<link rel='icon' href='/files/images/sys_favicon.png'>";
		echo "<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>";
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
		echo "<script src='/files/js/general.js'></script>";
		echo "</head>\n<body>";
		
		echo "user: ".$username." (<a href='/account/logout.php".$returnLink."'>logout</a>)";
		echo "<h1>Test</h1>";

		echo "<p>";
		echo $_SERVER["DOCUMENT_ROOT"];
		echo "<br/>";
		echo $currentSite;
		echo "<br/><br/>";

		echo $_SERVER['HTTP_HOST'];
		echo "<br/>";
		echo $_SERVER['REQUEST_URI'];
		echo "</p>";
		
		echo '<br/><br/><br/><a href="/">Home</a> - <a href="/sys/">System</a>';
		echo "</body></html>";
	} else {
		include "/home/valypfnd/php/auth_error.php";
	}
?>