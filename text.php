<?php
	include "/home/valypfnd/php/std.php";
	include "/home/valypfnd/php/auth.php";
	include "/home/valypfnd/php/account.php";
	include "/home/valypfnd/php/file_path.php";

	if (isset($_GET["t"])) {
		$txtFile = $_GET["t"];
		$setFile = true;

		$query = "SELECT auth_level, password, body FROM text_files WHERE code='$txtFile'";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) > 0) {
			foreach ($result as $f) {
				if ($f["password"] == $password) {
					$auth = $user["auth_level"];
				}
			}
		}

		$query = $pdo->prepare("SELECT auth_level, password, body FROM text_files WHERE code=:code");
		$query->execute(["code" => $txtFile]);
		if ($query->rowCount() > 0) {
			$result = $query->fetch();
		} else {
			$result = false;
		}
	} else {
		$setFile = false;
	}
?>
<DOCTYPE!html><html>
	<head>
		<?php
			if ($setFile) {
				echo "<title>$txtFile.txt</title>";
			} else {
				echo "<title>Text</title>";
			}
		?>
		<link rel='icon' href='/files/img/favicon.png'>
		<link rel='stylesheet' type='text/css' href='files/css/backend.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
		<script src='/files/js/general.js'></script>
		<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'>
	</head>
	<body>
		<?php
			if ($setFile) {
				echo "<h1>$txtFile</h1>";
				if ($result == false) {
					echo "doesn't exist";
				} else {
					echo $result["body"];
				}
			} else {
				echo "<h1>Unset File</h1>";
			}
		?>
	</body>
</html>
