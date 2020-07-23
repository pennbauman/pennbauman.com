<?php
	include_once "auth.php";
	
	if ($sys['user']['auth_level'] == 0) {
		header("Location: ".$sys['link']['login_url']);
		exit;
	}
?>
<!DOCTYPE html><html lang='en-US'>
	<head>
		<title>Account - Penn Bauman</title>
		<meta charset='UTF-8'>
		<meta name='description' content='pennbauman.com main account page.'/>
		<meta name='author' content='Penn Bauman'>
		<meta name='robots' content='noindex, nofollow'/>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<link rel='icon' href='/files/img/favicon.png'>
		<link rel='stylesheet' href='/files/css/general.css'>
	</head>
	<body>
		<?php insertHTML("header") ?>
		<div id="content">
			<?php
				echo "<h1>Hello, ".$sys['user']['display_name']."</h1>";
				echo "<p><b>Username: </b>".$sys['user']['username']."<br/>";
				echo "<b>Email: </b>".$sys['user']['email']."<br/>";
				echo "<b>Authorization Level: </b>".$sys['user']['auth_level']."<br/>";
				echo "<br/></p><p class='u-centered'>";
				echo "<a href='".$sys['link']['logout_url']."'>logout</a><br/>";
				echo "</p>";
			?>
		</div>
		<?php insertHTML("footer") ?>
	</body>
</html>
