<?php
	include_once "auth.php";

	$txtFile = "";
	$txtFound = false;
	$txtAuth = false;
	$txtPass = "";
	$passError = "";
	if (isset($_GET["f"])) {
		$txtFile = $_GET["f"];

		$query = $pdo->prepare("SELECT auth_level, password, body FROM text_files WHERE code=:code");
		$query->execute(["code" => $txtFile]);
		if ($query->rowCount() > 0) {
			$result = $query->fetch();
			if ($sys['user']['auth_level'] < $result["auth_level"]) {
				header("Location: /txt");
				exit();
			}
			if ($result["password"] == "") {
				$txtAuth = true;
			} else {
				if (isset($_POST["password"])) {
					$txtPass = hash("sha512", $_POST["password"]);
				}
				if (isset($_POST["pass_hash"])) {
					$txtPass = $_POST["pass_hash"];
				}
				if (isset($_GET["pass"])) {
					$txtPass = $_GET["pass"];
				}
				if ($txtPass == $result["password"]) {
					$txtAuth = true;
				} else {
					//echo $_POST["password"]." '$txtPass' '".$result["password"]."'";
					if ($txtPass != "") {
						$passError = "Invalid password.";
					}
				}
			}
			$txtBody = $result["body"];
			$txtFound = true;
		} else {
			header("Location: /txt");
			exit();
		}

		if (isset($_GET["js"]) && $txtAuth) {
			if ($_GET["js"] == "set") {
				$txtBody = $_GET["body"];
				$write = $pdo->prepare("UPDATE text_files SET body=:body WHERE code=:code");
				$write->execute(["code" => $txtFile, "body" => $txtBody]);
				error_log("js.set: $txtBody");

				echo "js.set";
				exit();
			}
		}

		if ($txtAuth && isset($_POST["body"])) {
			$txtBody = $_POST["body"];
			$write = $pdo->prepare("UPDATE text_files SET body=:body WHERE code=:code");
			$write->execute(["code" => $txtFile, "body" => $txtBody]);

			file_put_contents($sys['home_path']."/data/".$txtFile."_".date("YmdHis").".txt", $txtBody);
		}
	}
?>
<!DOCTYPE html><html>
	<head>
		<?php
			if ($txtFound) {
				echo "<title>$txtFile.txt - Penn Bauman</title>";
			} else {
				echo "<title>TXT - Penn Bauman</title>";
			}
		?>
		<meta charset="UTF-8">
		<link rel='icon' href='/files/img/favicon.png'>
		<link rel='stylesheet' type='text/css' href='files/css/backend.css'>
		<script src='/files/js/general.js'></script>
		<script src='/files/js/txt.js'></script>
		<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'>
	</head>
		<?php
			echo "<body onload=\"txtReady('$txtFile', '$txtPass')\">";
			if ($txtFound) {
				echo "<h1>$txtFile.txt</h1>";
				if ($txtAuth) {
					echo "<form class='wide' id='txt' action='".$_SERVER['REQUEST_URI']."' method='post'>";
					echo "<textarea autofocus onload='textareaSize(); return false;' onkeyup='textareaSize(); return false;' onChange='textareaSize(); return false;' id='textarea' name='body' class='autoExpand' form='txt'>$txtBody</textarea><br/><br/>";
					echo "<input type='hidden' name='pass_hash' value='$txtPass'>";
					echo "<input type='submit' value='Save and Enter'></form>";

					//echo "<button onClick=\"txtUpdate(true);\">UPDATE</button>";
				} else {
					echo "<form class='wide' action='".$_SERVER['REQUEST_URI']."' method='post'>";
					echo "<h4>Password:</h4><br/> <input autofocus type='password' name='password'> <br/>";
					echo "<h6 class='error'>".$passError."</h6> <br/><br/>";
					echo "<input type='submit' value='Login'>";
					echo "</form>";
				}
			} else {
				echo "<h1>TXT</h1>";
				$query = $pdo->prepare("SELECT auth_level, code FROM text_files");
				$query->execute();
				foreach ($query as $row) {
					if ($row["auth_level"] <= $sys['user']['auth_level']) {
						echo "<h4><a href='/txt?f=".$row["code"]."'>".$row["code"].".txt</a></h4><br/>";
					}
				}
			}
		?>
	</body>
</html>
