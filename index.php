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
				min-height:100vh;

				background-color:#141a1b;
				background-image:url("/files/img/background.jpg");
				background-position: center;
				background-size: cover;
				background-repeat: no-repeat;
				background-attachment: fixed;

				display:grid;
				grid-template-areas:
					"content"
					"footer";
				grid-gap:0;
				grid-template-columns:100%;
				grid-template-rows:auto min-content;

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
			#content img {
				width:20rem;
				image-rendering: crisp-edges;
				image-rendering: -moz-crisp-edges;
				image-rendering: -o-crisp-edges;
				image-rendering: -webkit-optimize-contrast;
				-ms-interpolation-mode: nearest-neighbor;
			}
			#content h1 {
				font-size:5.4rem;
				margin-bottom:0;
			}
			#content h2 {
				font-size:4.0rem;
				margin-bottom:0;
			}
			#content h3 {
				font-size:2.5rem;
				font-weight:normal;
				text-decoration:underline;
			}
			#content p {
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

			#footer {
				grid-area:footer;
				display:block;
				z-index:2;

				width:100%;
				height:2rem;
				padding:1rem 0 1.5rem;

				text-align:center;

				color:$color-light;

				p {
					margin:0;
				}

				padding:1rem 0 1rem;
				line-height:1.5rem;
				font-size:1.5rem;
				padding:1rem 0 1.5rem;
			}
		</style>
	</head>
	<body>
		<div id="content">
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
		<?php insertHTML("footer") ?>
	</body>
</html>
