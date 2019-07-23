<!DOCTYPE html>
	<head>
		<title>Virtual Sexy Dice</title>
		<link rel="shortcut icon" href="/files/img/sexy_dice_favicon.png">
		<link rel='stylesheet' type='text/css' href='/files/css/sexy-dice.css'>
		<script src='/files/js/sexy-dice.js'></script>
	</head>
	<body onload="setup(); return false;">
		<div id="back">
	    	<a class="hl" href="/projects">Back</a>
	    </div>
	    <div id="home">
	    	<a class="hl" href="/">Home</a>
	    </div>
	    <h1>Virtual Sexy Dice</h1>
		<div class="dice">
			<div class="center" id="d1">
				<span style="color:white">X</span>
			</div>
		</div>
		<div class="dice" id="right">
			<div class="center" id="d2">
				<span style="color:white">X</span>
			</div>
		</div>
		<div onClick="roll();return false;" id="button">ROLL</div>
	</body>
</html>
