<?php 
	include "/home/valypfnd/php/std.php";
	include "/home/valypfnd/php/auth.php";
	include "/home/valypfnd/php/file_path.php";

	$linkCode = URLVar("l");
	if ($linkCode != NULL) {
		$links = file_get_contents("links.txt");
		$links = explode("\n", $links);
		for ($i = 0; $i < count($links); $i++) {
			$links[$i] = explode("~", $links[$i]);
			if ($links[$i][0] == $linkCode) { 
				header("Location: ".$links[$i][1]);
				break;
			}
		}
	}
?>
<html>
	<head>
		<title>Penn Bauman</title>
		<link rel='icon' href='/files/images/favicon.png'>
		<link rel='stylesheet' type='text/css' href='/files/css/general.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='/files/js/general.js'></script>
	</head>
	<body>
		<?php
			include "/home/valypfnd/php/pennbauman/std_header_navbar.php";
		?>
		<div id="content">
			<h1>Penn Bauman</h1>
			<p>

			</p>

			<h3>Programs &amp; Projects</h3>
			<p>
				Most of my projects can be found on my <a href="http://github.com/pennbauman">GitHub</a>, including serveral simple linux command line tools and the code for this site. I have also done a few web projects which can be found on the <a href="/projects/">projects page</a>
			</p>

			<h3>About Me</h3>
			<p>

			</p>

			<?php 
				//include "/home/valypfnd/php/lorem_ipsum.php";
			?>
		</div>
		<?php
			include "/home/valypfnd/php/pennbauman/std_footer.php";
		?>
	</body>
</html>