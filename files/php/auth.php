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
		//Tk5#4!6^NqBsf^1u#^@S
		if ($username == "sudo" && $password == "6db456466c3a6a0baf785c568f44250a") {
			$auth = 10;
		}
		$coder = [
			"penn" => "06a2a6feb56b46840b4c670f4f34c546",
		];
		if ($coder[$username] == $password) {
			$auth = 9;
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