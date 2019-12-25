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
		<link rel='icon' href='/files/img/favicon.png'>
		<link rel='stylesheet' type='text/css' href='/files/css/general.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='/files/js/general.js'></script>
	</head>
	<body>
		<?php insertHTML("header_navbar") ?>
		<div id="content">
			<h1>Penn Bauman</h1>
			<p style="display:none">
				<a href="/broken/">Broken Internal Link</a>
				<a href="https://github.com/pennjamin">Broken External Link</a>
				<a href="http://agjashguhagur.org">Unregistered Domain</a>
			</p>

			<h3>Programs &amp; Projects</h3>
			<p>
				Most of my projects can be found on my <a href="http://github.com/pennbauman">GitHub</a>, including serveral simple linux command line tools and the code for this site. I have also done a few simple web projects which can be found on the <a href="/projects">projects page</a>.
			</p>

			<h3>About Me</h3>
			<p>
				I'm originally from Arlington, Virginia but currently attend the University of Virginia. I love hiking and camping, as well as writing code and reading.
			</p>
			<h3>These are my pets!</h3>
			<img src="/files/img/bella_wonderwoman.jpg" style="width:80%;margin:0 10%">
			<br/>
			<img src="/files/img/inky_shiro_basket.jpg" style="width:80%;margin:0 10%">
		</div>
		<?php insertHTML("footer") ?>
	</body>
</html>
