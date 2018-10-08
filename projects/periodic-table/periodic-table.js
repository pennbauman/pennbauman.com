function htmlPrint(loc, text) {
	document.getElementById(loc).innerHTML = text;
	return false;
}
// Display new element details
function element(symbol) {
	var fin = "<div><p><span id=\"a_num\">" + elements[symbol][0] + "</span> | ";
	fin += "<span id=\"a_m\">" + elements[symbol][2];
	if (elements[symbol][2] == "unknown") {
		fin += "</span><br/>";
	} else {
		fin += " amu</span><br/>";
	}
	fin += "<span id=\"a_sym\"> " + symbol + "</span><br/>";
	fin += "<span id=\"a_name\">" + elements[symbol][1] + "</span><br/>";
	fin += "<span id=\"a_m\">" + elements[symbol][3] + "<br/>";
	//ELECTRON CONFIGURATION
	var num = elements[symbol][0];
	if (num <= 2) {
		var ec = "";
		var line = 1;
	} else if (num <= 10) {
		var ec = "[He]";
		var line = 2;
		num -= 2;
	} else if (num <= 18) {
		var ec = "[Ne]";
		var line = 3;
		num -= 10;
	} else if (num <= 36) {
		var ec = "[Ar]";
		var line = 4;
		num -= 18;
	} else if (num <= 54) {
		var ec = "[Kr]";
		var line = 5;
		num -= 36;
	} else if (num <= 86) {
		var ec = "[Xe]";
		var line = 6;
		num -= 54;
	} else if (num <= 118) {
		var ec = "[Rn]";
		var line = 7;
		num -= 86;
	}
	var shell = 1;
	while (num > 0) {
		ec += " ";
		if (shell == 1) {
			if (num == 1) {
				ec += line + "s<sup>1</sup>";
				num = 0;
			} else {
				ec += line + "s<sup>2</sup>";
				num -= 2;
			}
			shell++;
		} else if (shell == 2) {
			if (line <= 3) {
				ec += line + "p<sup>" + num + "</sup>";
				num -= num;
			} else if (line <= 5) {
				if (num <= 10) {
					ec += (line-1) + "d<sup>" + num + "</sup>";
					num -= num;
				} else {
					ec += (line-1) + "d<sup>10</sup>";
					num -= 10;
				}
			} else {
				if (num <= 14) {
					ec += (line-2) + "f<sup>" + num + "</sup>";
					num -= num;
				} else {
					ec += (line-2) + "f<sup>14</sup>";
					num -= 14;
				}
			}
			shell++;
		} else if (shell == 3) {
			if (line <= 5) {
				ec += line + "p<sup>" + num + "</sup>";
				num -= num;
			} else {
				if (num <= 10) {
					ec += (line-1) + "d<sup>" + num + "</sup>";
					num -= num;
				} else {
					ec += (line-1) + "d<sup>10</sup>";
					num -= 10;
				}
			}
		} else {
			ec += line + "p<sup>" + num + "</sup>";
			num -= num;
		}
	}
	fin += ec + "</span><br/>";
	fin += "</p></div>"
	htmlPrint("big", fin);
	return false;
}
// Reset display block to default dumb info
function reset() {
	htmlPrint("big", "<div><p><span id=\"a_num\">Number</span> | <span id=\"a_m\">Mass</span><br/><span id=\"a_sym\">Sym</span> <br/><span id=\"a_name\">Name</span><br/><span id=\"a_m\">Type<br/>Electron Configuration</span></p></div>");
	return false;
} //*/
$(document).ready(function () {
	$('.elem_row').find('.std_block').not(':first-child').on('mouseenter mouseleave', function () {
		if ($(this).attr("id") == "Sym") {
			reset();
		} else {
			for (var i = 1; i < 8; i++) {
				if ($(this).hasClass("row"+i)) {
					$(".row"+i+"_left").toggleClass("num_hl");
				}
			}
			for (var i = 1; i < 19; i++) {
				if ($(this).hasClass("col"+i)) {
					$(".col"+i+"_top").toggleClass("num_hl");
				}
			}

			element($(this).attr("id"));
			$(this).toggleClass("outline");
		}
	});
});
