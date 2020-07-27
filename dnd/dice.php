<!DOCTYPE html><html>
	<head>
		<title>Dice Roller - Penn's D&amp;D</title>
		<meta charset='UTF-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<meta name='description' content='D&D format digital dice roller.'/>
		<meta name='author' content='Penn Bauman'>
		<meta name='robots' content='noindex, nofollow'/>
		<link rel='icon' href='/files/img/favicon.png'>
		<link rel='stylesheet' href='/files/css/dnd.css'>
		<script src='/files/js/dice.js'></script>
	</head>
	<body onload="return false;">
		<?php insertHTML("dnd_header") ?>
		<div id="content" class='dice'>
			<h1>D&amp;D Dice<span class="hideable"> Roller</span></h1>
			<div id="main_box">
				<div id="text_mode_output">
					<div id="result_top">
						<b id="rolled">Dice</b>
					</div>
					<div id="result_bottom">
						<i id="result">Result</i>
					</div>
				</div>
				<div id="text_mode_input">
					<form id="input_form">
						<p>Enter Dice to Be Rolled</p>
						<input type="text" name="dice-text" id="text_input"/>
						<input type="submit" onClick="rollDice();return false;" style="display:none">
						<a id="submit_button" onclick="rollDice();return false;"> Roll </a>
					</form>
				</div>
			</div>
			<!--tr>
				<th id="text_mode_button" onclick="modeSwitch('text');return false;">
					Text Box
				</th>
				<th id="calc_mode_button" onclick="modeSwitch('calc');return false;">
					Calculator
				</th>
			</tr-->
		</div>
		<?php insertHTML("dnd_footer") ?>
	</body>
</html>
