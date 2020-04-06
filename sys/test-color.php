<!DOCTYPE html><html>
	<head>
		<title>Color Tester</title>
		<meta charset="UTF-8">
		<link rel='icon' href='/files/img/sys_favicon.png'>
		<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>
		<script src='/files/js/general.js'></script>
		<style type='text/css'>
			#content_box {
				position:fixed;
				top:0;
				left:0;
				width:85%;
				padding:2rem 7.5%;
			}
		</style>
		<script>
			function colorPage() {
				if (document.body.style.backgroundColor == "") {
					document.getElementById("content_box").style.backgroundColor = window.getComputedStyle(document.body).backgroundColor;
				}
				document.body.style.backgroundColor = document.getElementById("color_code").value;
				return false;
			}
		</script>
	</head>
	<body>
		<div id='content_box'>
			<h1>Color Tester</h1>
			<form action="#" onsubmit="colorPage();return false">
				Hex Color: <br/>
				<input autofocus id="color_code" type="text" name="color" value="#">
				<br/><br/>
				<input type="submit" value="Enter">
			</form>
			<?php insertHTML("sys_footer"); ?>
		</div>
	</body>
</html>
