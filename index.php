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
		<link rel='stylesheet' type='text/css' href='/files/css/general.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='/files/js/general.js'></script>
		<style>
			:root {
				font-size:1vh;
			}
			body {
				background-color:#141a1b;
				background-image:url("/files/img/background.jpg");
				background-position: center;
				background-size: cover;
				background-repeat: no-repeat;
				background-attachment: fixed;
				margin:0;
				padding:0;
			}
			#text {
				position:fixed;
				top:15rem;
				left:5%;
				width:90%;
				text-align:center;
				color:#141a1b;
				color:#EEEEEE;
				font-family:Monospace;
			}
			#text img {
				width:20rem;
				image-rendering: crisp-edges;
				image-rendering: -moz-crisp-edges;
				image-rendering: -o-crisp-edges;
				image-rendering: -webkit-optimize-contrast;
				-ms-interpolation-mode: nearest-neighbor;
			}
			#text h1 {
				font-size:5.4rem;
				margin-bottom:0;
			}
			#text h2 {
				font-size:4.0rem;
				margin-bottom:0;
			}
			#text h3 {
				font-size:2.5rem;
				font-weight:normal;
				text-decoration:underline;
			}
			#text p {
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
		<div id="header"></div>
		<div id="navbar text">
			<img src="https://pennbauman.com/files/img/jellyboi_outline_x16.png">
			<h1>Penn Bauman</h1>
			<i><a href="mailto:pennbauman@protonmail.com">pennbauman@protonmail.com</a></i>

			<p>UVA CS Class of 2022</p>

			<!--<h3><a href="http://pennbauman.com/about">About</a></h3>-->
			<h3><a href="about.html">About</a></h3>
			<h3><a href="http://github.com/pennbauman">GitHub</a></h3>
			<!--<h3><a href="http://pennbauman.com/resume">Resume</a></h3>-->
			<h3><a href="resume.html">Resume</a></h3>

			<!--
			<p>UVA CS Class of 2022<br/>
				<a href="http://pennbauman.com/resume">Resume</a></p>
			<h2>Projects</h2>
			<p><a href="http://github.com/pennbauman">GitHub</a><br/>
				<a href="http://pennbauman.com/projects">Web Based</a><br/>
			</p>
			-->
		</div>
		<div id="content"></div>
		<?php insertHTML("footer") ?>
	</body>
</html>
