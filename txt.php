<?php
	include "/home/valypfnd/php/std.php";
	include "/home/valypfnd/php/auth.php";
	include "/home/valypfnd/php/account.php";
	include "/home/valypfnd/php/file_path.php";

	if (isset($_GET["f"])) {
		$txtFile = $_GET["f"];
		$txtFound = true;

		$query = $pdo->prepare("SELECT auth_level, password, body FROM text_files WHERE code=:code");
		$query->execute(["code" => $txtFile]);
		if ($query->rowCount() > 0) {
			$result = $query->fetch();
			if ($auth < $result["auth_level"]) {
				header("Location: /txt");
				exit();
			}
			if ($result["password"] == "") {
				$txtAuth = true;
			} else {
				$txtAuth = false;
			}
		} else {
			header("Location: /txt");
			exit();
		}
	} else {
		header("Location: /txt");
		exit();
	}
?>
<DOCTYPE!html><html>
	<head>
		<?php
			echo "<title>$txtFile.txt</title>";
		?>
		<link rel='icon' href='/files/img/favicon.png'>
		<link rel='stylesheet' type='text/css' href='files/css/backend.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
		<script src='/files/js/general.js'></script>
		<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'>
	</head>
	<body>
		<?php
			echo "<h1>$txtFile.txt</h1>";
			if ($txtAuth) {
				echo "<form class='wide' id='txt' action='".$_SERVER['REQUEST_URI']."' method='post'>";
				echo "<textarea onkeyup='textareaSize(); return false;' onChange='textareaSize(); return false;' id='textarea' name='body' class='autoExpand' form='txt'>".$result["body"]."</textarea><br/><br/>";
				echo "<input type='hidden' name='password' value='$password'>";
				echo "<input type='submit' value='Save and Enter'></form>";
			} else {
				echo "unauthorized";
			}
		?>
	</body>
</html>
