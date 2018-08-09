<?php
	include "/home/valypfnd/php/std.php";
	include "/home/valypfnd/php/auth.php";
	include "/home/valypfnd/php/subsite_return.php";
	
	setcookie('pb_username', '', time() - 3600, '/', "pennbauman.com");
	setcookie('pb_password', '', time() - 3600, '/', "pennbauman.com");

	error_log("Location: ".$subsiteReturn, 0);
	header("Location: ".$subsiteReturn);
?>