<html>
	<head> 
		<title>Hash</title>
		<link rel="shortcut icon" href="/files/img/sys_favicon.png"> 
		<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='/files/js/general.js'></script>
	</head>
	<body onload="document.body.style.fontSize = window.innerHeight*0.02; return false;">
		<h1>Hash</h1>
		<?php
			if (!empty($_POST)) {
				echo "<b>".$_POST["text"]."</b> <br/>";
				echo "<h6 class='error'>".hash("md5", $_POST["text"])."</h6><br/><br/>";
			}
		?> 
		<form action='/sys/hash' method='get'>
			Text: <br/> 
			<input type='text' name='text'><br><br/>
			<input type='submit' value='Hash'>
		</form>
		<br/><a href="/">Home</a> - <a href="/sys/">System</a>
	</body>
</html>
