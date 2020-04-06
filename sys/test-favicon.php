<?php
	if (isset($_POST['url'])) {
		$favicon = $_POST["url"];
	} else {
		$favicon = "/files/img/sys_favicon.png";
	}
?>
<!DOCTYPE html><html>
	<head>
		<title>Favicon Tester</title>
		<meta charset="UTF-8">
		<link rel='icon' href='/files/img/sys_favicon.png' id='favicon'>
		<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>
		<script src='/files/js/general.js'></script>
		<script>
			function setFavicon() {
				//console.log(document.getElementById("favicon").href);
				//console.log(document.getElementById("url").value);
				document.getElementById("favicon").href = document.getElementById("url").value;
				document.getElementById("url_display").innerText = document.getElementById("url").value;
				return false;
			}

		</script>
	</head>
	<body>
		<h1>Favicon Tester</h1>
		<p><b id="url_display">/files/img/sys_favicon.png</b></p>
		<form action='#' onsubmit="setFavicon(); return false">
			<b>Favicon URL:</b> <br/> 
			<input autofocus type='text' name='url' id='url' value='/files/img/'> <br><br/>
			<input type='submit' value='Enter'>
		</form>
		<?php insertHTML("sys_footer"); ?>
	</body>
</html>
