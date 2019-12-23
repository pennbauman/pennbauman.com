<?php
	/* Authorization Levels
		00: Not Logged In
		01: Unconfirmed User
		02: Confirmed user
		03: Special User
		
		08: Admiin
		09: Coder
		10: Super
	*/
	// Authorize
	$ysy['user'] = array();
	$sys['user']['auth_level'] = 0;
	if(isset($_COOKIE["pb_username"]) && isset($_COOKIE["pb_password"])) {
		$sys['user']['username'] = $_COOKIE["pb_username"];
		$sys['user']['password'] = $_COOKIE["pb_password"];
	}
	if (!empty($sys['user']['username'])) {
		// Query Database
		$query = $pdo->prepare("SELECT password, auth_level FROM users WHERE username=:user");
		$query->execute(["user" => $sys['user']['username']]);
		if ($query->rowCount() > 0) {
			$result = $query->fetch();
			if ($result["password"] == $sys['user']['password']) {
				$sys['user']['auth_level'] = $result["auth_level"];
			}
		}

		if ($sys['user']['auth_level'] > 0) {
			setcookie("pb_username", $sys['user']['username'], time() + (4*60*60), "/", ".pennbauman.com", false);
			setcookie("pb_password", $sys['user']['password'], time() + (4*60*60), "/", ".pennbauman.com", false);
		} else {
			setcookie("pb_username", "x", time() - 30, "/", ".pennbauman.com", false);
			setcookie("pb_password", "x", time() - 30, "/", ".pennbauman.com", false);
		}
	}

	if ($sys['user']['auth_level'] > 0) {
		$query = $pdo->prepare("SELECT * FROM users WHERE username=:user");
		$query->execute(["user" => $sys['user']['username']]);
		if ($query->rowCount() > 0) {
			$result = $query->fetch();
			$sys['user']['display_name'] = $result['display_name'];
			$sys['user']['email'] = $result['email'];
			$sys['user']['phone_num'] = $result['phone_num'];
		}
	}
?>
