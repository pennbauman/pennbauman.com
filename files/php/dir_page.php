<?php
/* Page to Display Directory Contents
*/
	include_once "auth.php";
	if ($sys['user']['auth_level'] < 9) {
		if ($sys['user']['auth_level'] == 0) {
			header("Location: ".$sys['link']['login_url']);
		}
		include "auth_error.php";
		exit;
	}
?>
<!DOCTYPE html><html>
	<head>
		<?php
			echo "<title>".substr($sys['file_path_short'], 0, -3)."</title>";
		?>
		<meta charset='UTF-8'>
		<meta name='robots' content='noindex, nofollow'/>
		<link rel='icon' href='/files/img/files_favicon.png'>
		<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>
		<script src='/files/js/general.js'></script>
	</head>
	<body>
		<?php
			echo "user: ".$sys['user']['username']." (<a href='".$sys['link']['logout_url']."'>logout</a>)";
			echo "<h1>".substr($sys['file_path_short'], 0, -3)."</h1>";

			echo "<p><a href='";
			$path = explode("/", substr($_SERVER['PHP_SELF'], 0, -8));
			for ($i = 0; $i < count($path) - 1; $i++) {
				echo $filePathArray[$i]."/";
			}
			echo "dir'>parent directory</a></p><p><h4>content</h4></br>";
			$files = scandir(getcwd());
			for ($i = 0; $i < count($files); $i++) {
				if (!preg_match("/^(\..*|dir.php|error_log)$/i", $files[$i])) {
					echo "<a href='".substr($_SERVER['PHP_SELF'], 0, -8).$filePathShort."/".$files[$i];
					if (is_dir($files[$i])) {
						echo "/dir'>".$files[$i]."/</a><br/>\n";
					} else {
						echo "'>".$files[$i]."</a><br/>\n";
					}
				}
			}
			echo "</p>";
			insertHTML("sys_footer");
		?>
	</body>
</html>
