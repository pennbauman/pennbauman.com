<?php
	include "/home/valypfnd/php/std.php";
?>
<!DOCTYPE html><html>
	<head>
		<title>Dice Roller - Penn's D&amp;D</title>
		<link rel='icon' href='/files/img/favicon.png'>
		<link rel='stylesheet' type='text/css' href='/files/css/hub.css'>
		<link rel='stylesheet' type='text/css' href='/files/css/dice.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<!--script src='/files/js/general.js'></script-->
		<script src='/files/js/dice.js'></script>
	</head>
	<body onload="return false;">
		<?php insertHTML("header_navbar"); ?>
		<div id="content">
			<h1>D&amp;D Dice Roller</h1>
			<table><tbody>
				<!--tr>
					<th id="text_mode_button" onclick="modeSwitch('text');return false;">
						Text Box
					</th>
					<th id="calc_mode_button" onclick="modeSwitch('calc');return false;">
						Calculator
					</th>
				</tr-->
				<tr>
					<td id="text_mode_box" colspan="2">
						
						<div id="text_mode_output">
							<div id="result_top"><b id="rolled">Dice</b></div>
							<div id="result_bottom"><b id="result">
									<!--span style='color:black'>X</span-->
								<i>Result</i>
							</b></div>
						</div>
						<div id="text_mode_input">
							<form id="input_form">
								<div id="form_top"><p id="form_directions">Enter Dice to Be Rolled</p></div>
								<div id="text_input_box"><input type="text" name="dice-text" id="text_input"> </div><br/>
								<input type="submit" onClick="rollDice();return false;" style="display:none">
								<div id="text_submit_box"><a id="submit_button" onclick="rollDice();return false;"> Roll </a></div>
							</form>
						</div> 
					</td>
					<!--td id="calc_mode_box" colspan="2">
						<div id="calc_mode_message">Coming Soon!</div>
					</td--	>
				</tr>
			</tbody></table>
		</div>
		<?php insertHTML("footer"); ?>
	</body>
</html>
