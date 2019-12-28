function modeSwitch(type) {
	if (type == "text") {
		$("#text_mode_button").css("outline", "none");
		$("#calc_mode_button").css("outline", "0.5rem solid black");
		$("#text_mode_box").css("display", "inline-block");
		$("#calc_mode_box").css("display", "none");
	} else if (type == "calc") {
		$("#text_mode_button").css("outline", "0.5rem solid black");
		$("#calc_mode_button").css("outline", "none");
		$("#text_mode_box").css("display", "none");
		$("#calc_mode_box").css("display", "inline-block");
	}
}
$(document).ready(function() { 
	//modeSwitch("calc");
});

function rollDice() {
	var text = document.getElementById("input_form");
	text = text.elements[0].value;
	if (text == "") {
		htmlPrint("rolled", "Dice");
		htmlPrint("result", "<i>Result</i>");
		return false;
	}
	text = xSpace(text);
	text = text.toLowerCase();
	if (text.indexOf("d") >= 0) {
		var dSplit = text.split("d");
		if (dSplit[0].length > 0) {
			var numDice = dSplit[0];
		} else {
			var numDice = 1;
		}
		text = dSplit[1];
		if (text.indexOf("+") >= 0) {
			var addType = "+";
			var pSplit = text.split("+");
			var sizeDice = pSplit[0];
			var addValue = pSplit[1];
		} else if (text.indexOf("-") >= 0) {
			var addType = "-";
			var pSplit = text.split("-");
			var sizeDice = pSplit[0];
			var addValue = pSplit[1];
		} else {
			var addType = "+";
			var pSplit = text
			var sizeDice = pSplit;
			var addValue = "0";
		}
		if (addValue > 0) {
			var htmlPrintRoll = numDice + "d" + sizeDice + " " + addType + " " + addValue;
		} else {
			var htmlPrintRoll = numDice + "d" + sizeDice;
		}
		var result = valueCalc(numDice, sizeDice, addType, addValue);
	} else if (text.indexOf("+") == 0 || text.indexOf("-") == 0) {
		if (text.indexOf("v") >= 0) {
			if (text.indexOf("+") == 0) {
				var addType = "+";
				text = text.split("+");
			} else if (text.indexOf("-") == 0) {
				var addType = "-";
				text = text.split("-");
			}
			text = text[1];
			var numDice = 1;
			var sizeDice = 20;
			text = text.split("v");
			var addValue = text[0];
			text = text[1];
			
			for (var q = 0; q < text.length; q++) {
				if (!isNaN(text.substr(q,text.length-1))) { 
					if (text.charAt(q) != ".") {
						break;
					}
				}
			}
			
			text = text.substr(q,text.length-1)
			
			var goal = text;
			var htmlPrintRoll = addType + addValue + " vs. " + goal;

			var result = valueCalc(numDice, sizeDice, addType, addValue);

			if (result < goal) {
				result = "<i style='font-size:32px'>Failure</i>";
			} else {
				result = "<i style='font-size:32px'>Success</i>";
			}
		} else {
			if (text.indexOf("+") == 0) {
				var addType = "+";
				text = text.split("+");
			} else if (text.indexOf("-") == 0) {
				var addType = "-";
				text = text.split("-");
			}
			text = text[1];
			var numDice = 1;
			var sizeDice = 20;
			var addValue = text;
			var htmlPrintRoll = addType + addValue;
			var result = valueCalc(numDice, sizeDice, addType, addValue);
		} 
	} else {
		htmlPrintRoll = "ERROR";
		result = "error";
	}
	htmlPrint("rolled", htmlPrintRoll);
	htmlPrint("result", result);
	return false;
}

function htmlPrint(loc, text) {
	document.getElementById(loc).innerHTML = text;
	return false;
}

function xSpace(str) {
	strList = str.split(" ");
	var text = "";
	for (var q = 0; q < strList.length; q ++) {
		text += strList[q]
	}
	return(text);
}

function valueCalc(num, size, type, add) {
	num = parseInt(num)
	size = parseInt(size)
	add = parseInt(add)

	var total = 0;
	for (var q = 0; q < num; q++) {
		total += Math.floor((Math.random() * size) + 1);	
	}
	if (type == "+") {
		total += add;
	} else if (type == "-") {
		total -= add;
	}
	return(total);
}