<?php
	$prev_username = "";
	$error = "";
	if (!empty($_POST)) {
		$sys['user']['username'] = $_POST["username"];
		$sys['user']['password'] = hash("sha512", $_POST["password"]);
		//$password = hash("sha512", $password);
		$prev_username = $sys['user']['username'];
		$error = "Incorrect login.";
	}
	include_once "auth.php";

	if ($sys['user']['auth_level'] > 0) {
		header("Location: ".$sys['link']['return_url']);
	}
?>
<html>
	<head>
		<title>Login</title>
		<link rel='icon' href='/files/img/sys_favicon.png'>
		<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='/files/js/general.js'></script>
	</head>
	<body onload="format()">
		<?php
			//include $_SERVER["DOCUMENT_ROOT"]."/files/header.php";
		?>
		<div class = "bottomHalf">
			<div class = "tabpage" id = "home">
				<h1>Login</h1>
				<?php
					echo "<form action='".$_SERVER['REQUEST_URI']."' method='post'>";
					echo "<b>Username:</b> <br/> <input autofocus type='text' name='username' value='".$prev_username."'><br><br/>";
					echo "<b>Password:</b> <br/> <input type='password' name='password'> <br/><br/>";
					echo "<h4 class='error'>".$error."</h4> <br/><br/>";
					echo "<input type='submit' value='Login'>";
					echo "</form>";
				?>
			</div>
		</div>
	</body>
</html>
