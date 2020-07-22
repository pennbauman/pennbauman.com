<?php
	$prev_username = "";
	$error = "";
	if (!empty($_POST)) {
		$sys['user']['username'] = $_POST["username"];
		$sys['user']['password'] = hash("sha512", $_POST["password"]);
		//$password = hash("sha512", $password);
		$prev_username = $sys['user']['username'];
		$error = "<h4 class='error'>Incorrect login.</h4> <br/><br/>";
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
		<title>Login - Penn Bauman</title>
		<meta charset='UTF-8'>
		<meta name='description' content="pennbauman.com login page."/>
		<meta name='author' content='Penn Bauman'>
		<meta name='robots' content='noindex, nofollow'/>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<link rel='canonical' href='https://pennbauman.com/account/login'/>
		<link rel='icon' href='/files/img/favicon.png'>
		<link rel='stylesheet' href='/files/css/backend.css'>
	</head>
	<body class='centered'>
		<h1>Login</h1>
		<?php
			echo "<form action='".$_SERVER['REQUEST_URI']."' method='post'>";
			echo "<b>Username:</b> <br/> <input autofocus type='text' name='username' value='".$prev_username."'><br><br/>";
			echo "<b>Password:</b> <br/> <input type='password' name='password'> <br/><br/>";
			echo $error;
			echo "<input type='submit' value='Login'>";
			echo "</form>";
		?>
	</body>
</html>
