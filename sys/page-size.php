<!DOCTYPE html>
	<head>
		<title>Page Size</title>
		<link rel='icon' href='/files/images/sys_favicon.png'>
		<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script type="text/javascript">
			function pageSize() {
				document.getElementById("w").innerHTML = window.innerWidth;
				document.getElementById("h").innerHTML = window.innerHeight;
			}
			$(window).resize(function() {
				pageSize();
			});
		</script>
	</head>
	<body onload="pageSize()">
		<h1>Page Size</h1>
		<h3>Width: <span id="w"></span>px</h3>
		<h3>Height: <span id="h"></span>px</h3>
		<br/><a href="/">Home</a> - <a href="/sys/">System</a>
		<!--button onclick="pageSize();return false;">Recheck</button-->
	</body>
</html>