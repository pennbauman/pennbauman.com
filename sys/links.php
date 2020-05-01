<?php
	include_once "auth.php";

	if ($sys['user']['auth_level'] > 8) {
		if (!empty($_POST)) {
			$code = $_POST["code"];
			$link = $_POST["link"];
			$query = $pdo->prepare("INSERT INTO shortcut_links (code, url) VALUES (?, ?)");
			$query->execute([$code, $link]);
		}
		echo "<!DOCTYPE html><head>";
		echo "<title>Shortcut Links</title>";
		echo "<meta charset='UTF-8'>";
		echo "<meta name='description' content='Links editor.'/>";
		echo "<meta name='author' content='Penn Bauman'>";
		echo "<meta name='robots' content='noindex, nofollow'/>";
		echo "<link rel='icon' href='/files/img/sys_favicon.png'>";
		echo "<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>";
		echo "<script src='/files/js/general.js'></script>";
		echo "</head>\n<body>";
		//Print Content
		echo "user: ".$sys['user']['username']." (<a href='".$sys['link']['logout_url']."'>logout</a>)";
		echo "<h1>Shortcut Links</h1>";

		echo "<p>";
		$query = $pdo->prepare("SELECT * FROM shortcut_links");
		$query->execute();
		if ($query->rowCount() > 0) {
			foreach ($query as $result) {
				echo $result['code']." -> ".$result['url']."<br/>";
			}
		}
		echo "</p>";

		echo "<form action='/sys/links' method='post'>";
		echo "<b>Code:</b> <br/> <input type='text' name='code'><br/><br/>";
		echo "<b>Link:</b> <br/> <input type='text' name='link'><br/><br/>";
		echo "<input type='submit' value='Enter'></form>";

		insertHTML("sys_footer");
		echo "</body></html>";
	} else {
		include "auth_error.php";
	}
?>
