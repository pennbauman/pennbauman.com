<?php
	setcookie('pb_username', '', time() - 3600, '/', ".pennbauman.com");
	setcookie('pb_password', '', time() - 3600, '/', ".pennbauman.com");

	header("Location: ".$sys['link']['return_url']);
?>
