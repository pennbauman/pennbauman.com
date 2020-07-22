<?php
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
		<title>System</title>
		<meta charset='UTF-8'>
		<meta name='description' content=''/>
		<meta name='author' content='Penn Bauman'>
		<meta name='robots' content='noindex, nofollow'/>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<link rel='icon' href='/files/img/sys_favicon.png'>
		<link rel='stylesheet' href='/files/css/backend.css'>
	</head>
	<body>
		<?php
			echo "user: ".$sys['user']['username']." (<a href='".$sys['link']['logout_url']."'>logout</a>)";
		?>
		<h1>System</h1>
		<p>
			<a href='/sys/links'>Shortcut Links</a> <br/>
			<br/>
			<a href='/sys/php-errors'>PHP Errors</a> <br/>
			<br/>
			<a href='/sys/test'>Test</a> <br/>
			<a href='/sys/hash'>Hash</a> <br/>
			<a href='/sys/test-favicon'>Favicon Tester</a> <br/>
			<a href='/sys/test-color'>Color Tester</a> <br/>
			<a href='/sys/page-size'>Page Size</a> <br/>
		</p>
		<?php insertHTML("sys_footer"); ?>
	</body>
</html>
