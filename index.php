<?php
	if (isset($_GET['l'])) {
		$query = $pdo->prepare("SELECT url FROM shortcut_links WHERE code=:code");
		$query->execute(["code" => $_GET['l']]);
		if ($query->rowCount() > 0) {
			$result = $query->fetch();
			header("Location: ".$result['url']);
		}
	}
?>
<!DOCTYPE html><html>
	<head>
		<title>Penn Bauman</title>
		<meta charset="UTF-8">
		<link rel='icon' href='/files/img/favicon.png'>
		<!--link rel='stylesheet' type='text/css' href='/files/css/general.css'-->
		<link rel='stylesheet' type='text/css' href='/files/font/DejaVu_Font.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='/files/js/general.js'></script>
		<style>
			@import url('/files/font/DejaVu_Font.css');
				/* Prevent Firefox selected button/link outline */
				:focus {outline:none;}
			::-moz-focus-inner {border:0;}
			/* Prevent iOS input styling */
			input.text, input[type="text"], input[type="button"], input[type="submit"], .input-checkbox {
				-webkit-appearance: none;
				border-radius: 0;
			}
			:root {
				font-size:1vh;
			}
			body {
				margin:0;
				padding:0;

				background-color:#141a1b;
				background-image:url("/files/img/background.jpg");
				background-position: center;
				background-size: cover;
				background-repeat: no-repeat;
				background-attachment: fixed;

				text-align:center;
				font-family:DejaVu_Sans_Mono, Monospace;
				color:#EEEEEE;
			}
			#content {
				position:fixed;
				top:15rem;
				left:5%;
				width:90%;
				font-family:Monospace;
			}
			img {
				width:20rem;
				image-rendering: crisp-edges;
				image-rendering: -moz-crisp-edges;
				image-rendering: -o-crisp-edges;
				image-rendering: -webkit-optimize-contrast;
				-ms-interpolation-mode: nearest-neighbor;
			}
			h1 {
				font-size:5.4rem;
				margin-bottom:0;
			}
			h2 {
				font-size:4.0rem;
				margin-bottom:0;
			}
			h3 {
				font-size:2.5rem;
				font-weight:normal;
				text-decoration:underline;
			}
			p {
				font-size:2.6rem;
				line-height:3.0rem;
			}
			a {
				color:inherit;
				text-decoration:none;
			}
			i {
				font-size:2.0rem;
				font-style:italic;
			}
		</style>
	</head>
	<body>
		<div id="content">
			<img src="https://pennbauman.com/files/img/jellyboi_outline_x16.png">
			<h1>Penn Bauman</h1>
			<i><a href="mailto:pennbauman@protonmail.com">pennbauman@protonmail.com</a></i>

			<p>UVA CS Class of 2022</p>

			<h3><a href="/about">About</a></h3>
			<h3><a href="http://github.com/pennbauman">GitHub</a></h3>
			<h3><a href="/resume">Resume</a></h3>
		</div>
	</body>
</html>
