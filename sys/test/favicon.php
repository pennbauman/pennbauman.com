<?php 
	if (!empty($_POST)) {
		$favicon = $_POST["url"];
	} else {
		$favicon = "/files/img/sys_favicon.png";
	}
?>
<!DOCTYPE html>
	<head>
		<title>Favicon Tester</title>
		<?php
			echo "<link rel='icon' href='";
			echo $favicon;
			echo "'>\n";
		?>
		<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='/files/js/general.js'></script>
		<script>
			function setFavicon() {
				$("#favicon").attr("href", document.getElementById("url").value);
				return false;
			}

		</script>
	</head>
	<body>
		<h1>Favicon Tester</h1>
		<form onsubmit="setFavicon();">
			<b>Favicon URL:</b> <br/> 
			<input autofocus type='text' name='url' value='/files/img/'> <br><br/>
			<input type='submit' value='Enter'>
		</form>
		<br/><a href="/">Home</a> - <a href="/sys/">System</a>
	</body>
</html>
