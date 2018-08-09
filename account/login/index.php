<?php
	include "/home/valypfnd/php/std.php";
	include "/home/valypfnd/php/auth.php";
	include "/home/valypfnd/php/subsite_path.php";

	if ($auth > 0) {
		header("Location: ".$subsiteReturn);
	}
	$prev_username = "";
	$error = "";
	if (!empty($_POST)) {
		$username = $_POST["username"];
		$password = $_POST["password"];
		$password = hash("md5", $password);

		include "/home/valypfnd/php/auth.php";
		if ($auth > 0) {
			header("Location: ".$returnPath);
		} else {
			$prev_username = $username; 
			$error = "Incorrect login.";
		}
	}
?>
<html>
	<head>
		<title>Login</title>
		<!--link rel='icon' href='/files/images/sys_favicon.png'-->
		<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='/files/js/general.js'></script>
	</head>
	<body onload="format()">
		<?php
			//$urlEnd = "";
			//include $_SERVER["DOCUMENT_ROOT"]."/files/header.php";
		?>
		<div class = "bottomHalf">
			<div class = "tabpage" id = "home">
				<h1>Login</h1>
				<?php
					//echo "<a href='".$returnPath."'>Return</a>";
					echo "<form action='/account/login/".$URLEnd."' method='post'>";
					echo "<b>Username:</b> <br/> <input type='text' name='username' value='".$prev_username."'><br><br/>";
					echo "<b>Password:</b> <br/> <input type='password' name='password'> <br/><br/>";
					echo "<h4>".$error."</h4> <br/><br/>";
					echo "<input type='submit' value='Login'>";
					echo "</form>";
				?>
			</div>
		</div>
	</body>
</html>