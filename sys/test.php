<?php
	include_once "auth.php";
	if ($sys['user']['auth_level'] < 9) {
		include "auth_error.php";
		exit;
	}

	$n = "<br/>";
?>

<!DOCTYPE html><html>
	<head>
		<title>Test</title>
		<meta charset='UTF-8'>
		<meta name='description' content='Test page.'/>
		<meta name='author' content='Penn Bauman'>
		<meta name='robots' content='noindex, nofollow'/>
		<link rel='icon' href='/files/img/sys_favicon.png'>
		<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>
		<script src='/files/js/general.js'></script>
	</head>
	<body>
		<?php
			echo "user: ".$sys['user']['username']." (<a href='".$sys['link']['logout_url']."'>logout</a>)";
		?>

		<h1>Test</h1>
		<p>
			Normal</br>
			<b>Bold</b><br/>
			<i>Italic</i>
		</p>

		<?php
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
			//$testString = "/yes/no/";
			echo "<br/>";
			print_r($_SERVER);
			echo "<br/>";
			echo "<br/>";
			echo $sys['home_path'];
			echo "</p>";

			
			echo "<p>";
			echo "<a href='/break/'>Broken Link</a>";
			echo "</p>";
			insertHTML("sys_footer");
		?>
	</body>
</html>
