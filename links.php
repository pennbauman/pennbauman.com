<?php
	//include "/home/valypfnd/php/std.php";
	//include "/home/valypfnd/php/auth.php";
	//include "/home/valypfnd/php/login_url.php";
	include_once "auth.php";

	$file = file_get_contents("links.txt");
	if (!empty($_POST)) {
		$code = $_POST["code"];
		$link = $_POST["link"];
		//echo $code.", ".$link;
		$file .= "\n".$code."~".$link;
		file_put_contents("links.txt", $file);
	}
	if ($sys['user']['auth_level'] > 8) {
		echo "<!DOCTYPE html><head>";
		echo "<title>Links</title>";
		echo "<link rel='icon' href='/files/img/sys_favicon.png'>";
		echo "<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>";
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
		echo "<script src='/files/js/general.js'></script>";
		// Print Body
		echo "</head>\n<body>";
		//Print Content
		echo "user: ".$sys['username']." (<a href='".$sys['logout_url']."'>logout</a>)";
		echo "<h1>Links</h1>";

		$query = $pdo->prepare("SELECT * FROM shortcut_links");
		$query->execute();
		if ($query->rowCount() > 0) {
			//$result = $query->fetch();
			foreach ($query as $result) {
				echo $results['code'];
				echo "~";
				echo $results['url'];
			}
		}

		echo "<form action='/links.php' method='post'>";
		echo "<b>Code:</b> <br/> <input type='text' name='code'><br/><br/>";
		echo "<b>Link:</b> <br/> <input type='text' name='link'><br/><br/>";
		echo "<input type='submit' value='Enter'></form>";

		echo '<br/><a href="/">Home</a> - <a href="/sys/">System</a>';
		echo "</body></html>";
	} else {
		include "/home/valypfnd/php/auth_error.php";
	}
?>
