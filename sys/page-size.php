<!DOCTYPE html>
	<head>
		<title>Page Size</title>
		<meta charset='UTF-8'>
		<meta name='description' content="Page size viewer."/>
		<meta name='author' content='Penn Bauman'>
		<meta name='robots' content='noindex, nofollow'/>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<link rel='icon' href='/files/img/sys_favicon.png'>
		<link rel='stylesheet' href='/files/css/backend.css'>
		<script type="text/javascript">
			function pageSize() {
				document.getElementById("w").innerHTML = window.innerWidth;
				document.getElementById("h").innerHTML = window.innerHeight;
			}
			window.onresize = pageSize;
		</script>
	</head>
	<body onload="pageSize()">
		<h1>Page Size</h1>
		<h5>Width: <span id="w"></span>px</h5>
		<h5>Height: <span id="h"></span>px</h5>
		<?php insertHTML("sys_footer"); ?>
		<!--button onclick="pageSize();return false;">Recheck</button-->
	</body>
</html>
