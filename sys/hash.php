<html>
	<head> 
		<title>Hash</title>
		<link rel="shortcut icon" href="/files/img/sys_favicon.png"> 
		<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='/files/js/general.js'></script>
		<script>
			function hashText() {
				//console.log(await crypto.subtle.digest("sha1", document.getElementById.("hash_text").value));
				console.log(document.getElementById.("hash_text").value);
				return false;
			}
		</script>
	</head>
	<body onload="document.body.style.fontSize = window.innerHeight*0.02; return false;">
		<h1>Hash</h1>
		<?php
			if (!empty($_POST)) {
				//echo "<span style='overflow-wrap: break-word;'>";
				//echo "<h4>Text: '".$_POST["text"]."'</h4> <br/>";
				//echo "<b>MD5:</b><br/> <b class='error'>".hash("md5", $_POST["text"])."</b><br/>";
				//echo "<b>SHA-256:</b><br/> <b class='error'>".hash("sha256", $_POST["text"])."</b><br/>";
				//echo "<b>SHA-512:</b><br/> <b class='error'>".hash("sha512", $_POST["text"])."</b><br/>";
				//echo "</span><br/>";
			}
		?>
		<form action='#' onsubmit="hashText(); return false">
			Text: <br/> 
			<input autofocus type='text' name='text'><br><br/>
			<input type='submit' value='Hash'>
		</form>
		<?php insertHTML("sys_footer"); ?>
	</body>
</html>
