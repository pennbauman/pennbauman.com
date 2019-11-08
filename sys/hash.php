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
				echo "<h4>".$_POST["text"]."</h4> <br/>";
				echo "<h6>MD5: <span class='error'>".hash("md5", $_POST["text"])."</span></h6><br/>";
				echo "<h6>SHA-256: <span class='error'>".hash("sha256", $_POST["text"])."</span></h6><br/>";
				echo "<h6>SHA-512: <span class='error'>".hash("sha512", $_POST["text"])."</span></h6><br/>";
			}
		?> 
		<form action='/sys/hash' method='post'>
			Text: <br/> 
			<input type='text' name='text'><br><br/>
			<input type='submit' value='Hash'>
		</form>
		<br/><a href="/">Home</a> - <a href="/sys/">System</a>
	</body>
</html>
