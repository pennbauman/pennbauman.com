<!DOCTYPE html><html>
	<head> 
		<title>Hash</title>
		<meta charset='UTF-8'>
		<meta name='description' content="MD5, SHA-256, SHA-512 hasher."/>
		<meta name='author' content='Penn Bauman'>
		<meta name='robots' content='noindex, nofollow'/>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<link rel='icon' href='/files/img/sys_favicon.png'>
		<link rel='stylesheet' href='/files/css/backend.css'>
	</head>
	<body>
		<h1>Hash</h1>
		<?php
			if (!empty($_POST)) {
				echo "<p style='overflow-wrap: break-word;'>";
				echo "<h4>Input: '".$_POST["text"]."'</h4> <br/>";
				sleep(2);
				echo "<b>MD5:</b><br/> <b class='error'>".hash("md5", $_POST["text"])."</b><br/>";
				sleep(2);
				echo "<b>SHA-256:</b><br/> <b class='error'>".hash("sha256", $_POST["text"])."</b><br/>";
				sleep(2);
				echo "<b>SHA-512:</b><br/> <b class='error'>".hash("sha512", $_POST["text"])."</b><br/>";
				echo "<br/></p>";
			} else {
				echo "<p>";
				echo "<h4>Input: ''</h4> <br/>";
				echo "<b>MD5:</b><br/>";
				echo "<b>SHA-256:</b><br/>";
				echo "<b>SHA-512:</b><br/>";
				echo "<br/></p>";
			}
		?>
		<form action='/sys/hash' method='post'>
			<b>Input: </b><br/>
			<input autofocus type='text' name='text'> <br><br/>
			<input type='submit' value='Hash'>
		</form>
		<?php insertHTML("sys_footer"); ?>
	</body>
</html>
