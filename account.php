<?php
	include_once "auth.php";
	include_once "insert.php";
?>
<!DOCTYPE html><html>
	<head>
		<title>Account - Penn Bauman</title>
		<link rel='icon' href='/files/img/favicon.png'>
		<link rel='stylesheet' type='text/css' href='/files/css/general.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='/files/general.js'></script>
	</head>
	<body>
		<?php insertHTML("header_navbar") ?>
		<div id="content">
			<?php 
				insertUser();
				if ($sys['user']['auth_level'] > 0) {
					echo "<h2>Account</h2>";
					echo "<p><b>Username: </b>".$sys['user']['username']."<br/>";
					echo "<b>Name: </b>".$sys['user']['display_name']."<br/>";
					echo "<b>Email: </b>".$sys['user']['email']."<br/>";
				} else {
					echo "<h2>Account</h2>";
					echo "<p>Not logged in</p>";
				}
				
			?>
		</div>
		<?php insertHTML("footer") ?>
	</body>
</html>
