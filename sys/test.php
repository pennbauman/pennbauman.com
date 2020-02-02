<?php
	include_once "auth.php";

	$n = "<br/>";

	if ($sys['user']['auth_level'] > 8) {
		echo "<!DOCTYPE html><head>";
		echo "<title>Test</title>";
		echo "<link rel='icon' href='/files/img/sys_favicon.png'>";
		echo "<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>";
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
		echo "<script src='/files/js/general.js'></script>";
		echo "</head>\n<body>";
		
		echo "user: ".$sys['user']['username']." (<a href='".$sys['link']['logout_url']."'>logout</a>)";
		echo "<h1>Test</h1>";
	
		echo "<p>";
		echo "<p>Normal</br>
			<b>Bold</b><br/>
			<i>Italic</i></p>";
		echo "\$HOME = $HOME$n";
		echo "\$home = $home$n";
		echo "\$_SERVER['HOME'] = ".$_SERVER['HOME'].$n;
		echo "\$_ENV['HOME'] = ".$_ENV['HOME'].$n;
		echo "getenv(\"HOME\") = ".getenv("HOME").$n;
		echo '$_SERVER["DOCUMENT_ROOT"] = '.$_SERVER["DOCUMENT_ROOT"].$n;
		echo "\$currentSite = ".$currentSite.$n;
		echo "\$currentSiteName = ".$currentSiteName.$n;
		echo "\$filePath = ".$filePath.$n.$n;

		echo "\$_SERVER['HTTP_HOST'] = ".$_SERVER['HTTP_HOST'].$n;
		echo "\$_SERVER['REQUEST_URI'] = ".$_SERVER['REQUEST_URI'].$n;
		$testString = "/yes/no/";
		$testArray = explode("/", $_SERVER['REQUEST_URI']);
		for ($i = 0; $i < count($testArray); $i++) {
			echo "[".$i."] => ".$testArray[$i].$n;
		}
		echo $n;
		echo "\$_SERVER = ".$_SERVER.$n;
		//$testString = "/yes/no/";
		$testArray = $_SERVER;
		for ($i = 0; $i < count($testArray); $i++) {
			echo "[".$i."] => ".$testArray[$i].$n;
		}
		echo "<br/>";
		print_r($_SERVER);
		echo "<br/>";
		echo getenv("HOME");
		echo "</p>";

		
		echo "<p>";
		echo "<a href='/break/'>Broken Link</a>";
		echo "</p>";
		insertHTML("sys_footer");
		echo "</body></html>";
	} else {
		include "auth_error.php";
	}
?>
