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
		if ($sys['link']['return_url'] == "/") {
			header("Location: /account");
		} else {
			header("Location: ".$sys['link']['return_url']);
		}
		exit;
	}
?>
<!DOCTYPE html><html>
	<head>
		<title>Login</title>
		<link rel='icon' href='/files/img/sys_favicon.png'>
		<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>
		<script src='/files/js/general.js'></script>
	</head>
	<body>
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
	<script>
		//$(':root').css("font-size", Math.max(screen.height, window.innerHeight)*0.01);
		//console.log(screen.height);
		//console.log(window.innerHeight);
		//var s = Math.max(screen.height, window.innerHeight)*0.01;
		//console.log(s);
		//s = String(s)
		//document.documentElement.style.setProperty("font-size", s);
		//document.documentElement.style.fontSize = s + "px";
		//document.documentElement.style.setProperty("font-size", "10px");
		//console.log("x");
	</script>
	</body>
</html>
