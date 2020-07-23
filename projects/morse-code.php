<!DOCTYPE html><html lang='en-US'>
	<head>
		<title>Morse Code - Penn Bauman</title>
		<meta charset='UTF-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<meta name='description' content='Simple morse code typer.'/>
		<meta name='author' content='Penn Bauman'>
		<meta name='robots' content='noindex, nofollow'/>
		<link rel='icon' href='/files/img/morse_favicon.png'>
		<link rel='stylesheet' href='/files/css/morse-code.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
		<script src='/files/js/morse-code.js'></script>
	</head>
	<body>
		<div id="back">
			<a href="/projects/">Back</a>
			x
			<a href="/">Home</a>
		</div>
		<div id="clear">
			<a onclick="htmlPrint('main', ''); htmlPrint('bottom', ''); return false;">Clear</a>
		</div>
		<div id="header">
			<h1>MORSE CODE</h1>
			<i>-- --- .-. ... . / -.-. --- -.. .</i>
		</div>
		<div id="main"> </div>
		<div id="bottom"> </div>
	</body>
</html>
