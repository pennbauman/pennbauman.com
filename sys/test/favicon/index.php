<?php 
	if (!empty($_POST)) {
		$favicon = $_POST["url"];
	} else {
		$favicon = "x";
	}
?>
<!DOCTYPE html>
	<head>
		<title>Favicon Test</title>
		<?php
			echo "<link rel='icon' href='";
			echo $favicon;
			echo "'>\n";
		?>
		<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='/files/js/general.js'></script>
	</head>
	<body>
		<form action='/sys/test/favicon/' method='post'>
			<b>Favicon URL:</b> <br/> 
			<input type='text' name='url' value='/files/images/'> <br><br/>
			<input type='submit' value='Enter'>
		</form>
	</body>
</html>