<?php
	include $_SERVER["DOCUMENT_ROOT"]."/files/php/std.php";
	include $_SERVER["DOCUMENT_ROOT"]."/files/php/auth.php";
	include $_SERVER["DOCUMENT_ROOT"]."/files/php/file_path.php";

	$file = file_get_contents("links.txt");
	if (!empty($_POST)) {
		$code = $_POST["code"];
		$link = $_POST["link"];
		//echo $code.", ".$link;
		$file .= "\n".$code."~".$link;
		file_put_contents("links.txt", $file);
	}
	if ($auth > 8) {
		echo "<!DOCTYPE html><head>";
		echo "<title>Links</title>";
		echo "<link rel='icon' href='/files/images/sys_favicon.png'>";
		echo "<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>";
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
		echo "<script src='/files/js/general.js'></script>";
		// Print Body
		echo "</head>\n<body>";
		//Print Content
		echo "user: ".$username." (<a href='/account/logout.php".$returnLink."'>logout</a>)";
		echo "<h1>Links</h1>";

		echo "<h6>Links.txt</h6> <br/>";
		echo "<pre>".$file."</pre>";

		echo "<form action='/links.php' method='post'>";
		echo "<b>Code:</b> <br/> <input type='text' name='code'><br/><br/>";
		echo "<b>Link:</b> <br/> <input type='text' name='link'><br/><br/>";
		echo "<input type='submit' value='Enter'></form>";

		echo '<br/><a href="/">Home</a> - <a href="/sys/">System</a>';
		echo "</body></html>";
	} else {
		include $_SERVER["DOCUMENT_ROOT"]."/files/php/auth_error.php";
	}
?>