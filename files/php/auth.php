<?php 
	// LOAD: include $_SERVER["DOCUMENT_ROOT"]."/files/php/auth.php";
	/* Authorization Levels
		00: Not Logged In
		01: Unconfirmed User
		02: Confirmed user
		03: Special User
		
		08: Admiin
		09: Coder
		10: Super - penn only
	*/
	// Authorize
	$auth = 0;
	if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
		$username = $_COOKIE["username"];
		$password = $_COOKIE["password"];
	}
	if (!empty($username)) {
		if ($username == "penn" && $password == "ee0f07df945289af134d9da1bb7ab8ba") {
			$auth = 10;
		}
		/*
		$columns = "SELECT phoneNumber, password FROM users";
		$data = $conn->query($columns);

		if ($data->num_rows > 0) {
			while($row = $data->fetch_assoc()) {
		        if ($row["phoneNumber"] == $username && $row["password"] == $password) {
		       		$auth = true; 
		       		setcookie("username", $username, time() + (60 * 30), "/");
					setcookie("password", $password, time() + (60 * 30), "/");
		       	} //*
		   	} //*
		} //*/
		if ($auth > 0) {
			setcookie("username", $username, time() + (4*60*60), "/");
			setcookie("password", $password, time() + (4*60*60), "/");
		}
	}
?>