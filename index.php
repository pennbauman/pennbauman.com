<?php 
	include $_SERVER["DOCUMENT_ROOT"]."/files/php/std.php";
	include $_SERVER["DOCUMENT_ROOT"]."/files/php/auth.php";
	include $_SERVER["DOCUMENT_ROOT"]."/files/php/file_path.php";
	$link = URLVar("l");
	if ($link == "dnd5ebooks") {
		header("Location: https://drive.google.com/drive/folders/1hVgL3hpDhLY2H0Fh4rHtmMPN1TO9Ex81");
	}
?>
<html> 
	<head>
		<title>Penn Bauman</title>
		<link rel='icon' href='/files/images/favicon.png'>
		<link rel='stylesheet' type='text/css' href='/files/general.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='/files/general.js'></script>
	</head>
	<body>
		<h1>Penn Bauman</h1>
		<img src="/files/images/bella_wag.gif"/>
	</body>
</html>