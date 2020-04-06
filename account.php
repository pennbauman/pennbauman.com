<?php
	include_once "auth.php";
	
	if ($sys['user']['auth_level'] == 0) {
		header("Location: ".$sys['link']['login_url']);
		exit;
	}
?>
<!DOCTYPE html><html>
	<head>
		<title>Account - Penn Bauman</title>
		<meta charset="UTF-8">
		<link rel='icon' href='/files/img/favicon.png'>
		<link rel='stylesheet' type='text/css' href='/files/css/general.css'>
		<script src='/files/general.js'></script>
	</head>
	<body>
		<?php insertHTML("header") ?>
		<div id="content" class="std-content">
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
