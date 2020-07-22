<?php
	include_once "auth.php";
	if ($sys['user']['auth_level'] < 9) {
		if ($sys['user']['auth_level'] == 0) {
			header("Location: ".$sys['link']['login_url']);
		}
		include "auth_error.php";
		exit;
	}

	if (!empty($_POST)) {
		$autofill = $_POST["folder"];
		$location = $sys['home_path']."/".$_POST["folder"]."/error_log";
	} else {
		$location = "";
		$autofill = "";
	}
?>
<!DOCTYPE html><html>
	<head>
		<title>PHP Errors</title>
		<meta charset='UTF-8'>
		<meta name='description' content='PHP error log view page.'/>
		<meta name='author' content='Penn Bauman'>
		<meta name='robots' content='noindex, nofollow'/>
		<link rel='icon' href='/files/img/files_favicon.png'>
		<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>
		<script src='/files/js/general.js'></script>
	</head>
	<body>
		<?php
			echo "user: ".$sys['user']['username']." (<a href='".$sys['link']['logout_url']."'>logout</a>)";
			echo "<h1>PHP Errors</h1>";
			echo "<form action='/sys/php-errors' method='post'>";
			echo $sys['home_path']."/<input autofocus type='text' name='folder' value='".$autofill."' autofocus>/error_log <br><br/>";
			echo "<p>pennbauman.com -> public_html<br/>";
			echo "dev.pennbauman.com -> pennbauman-dev<br/>";
			//echo "dnd.pennbauman.com -> dnd-site<br/>";
			//echo "dev-dnd.pennbauman.com -> dnd-dev<br/>";
			echo "</p>";
			echo "<input type='submit' value='Enter'>";
			echo "</form><br/><br/>";
			if ($autofill == "") {
				echo "<p><h4 class='error'>No Location Entered</h4><br/><br/></p>";
			} elseif (file_exists($location)) {
				echo "<p><h4>".$location."</h4><br/>";
				$errors = file_get_contents($location);
				$errors = explode("\n", $errors);
				$i = count($errors);
				while ($i >= 0 ) {
					if ($errors[$i] != "") {
						echo $errors[$i]."<br/><br/>\n";
					}
					$i--;
				} //*/
				echo "</p>";
			} else {
				echo "<p><h4 class='error'>No Such File Exists ($location)</h4><br/><br/></p>";
			}
			insertHTML("sys_footer");
		?>
	</body>
</html>
