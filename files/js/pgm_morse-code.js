var morse = {
	//letters
	97:".-", //a
	98:"-...", //b
	99:"-.-.", //c
	100:"-..", //d
	101:".", //e
	102:"..-.", //f
	103:"--.", //g
	104:"....", //h
	105:"..", //i
	106:".---", //j
	107:"-.-", //k
	108:".-..", //l
	109:"--", //m
	110:"-.", //n
	111:"---", //o
	112:".--.", //p
	113:"--.-", //q
	114:".-.", //r
	115:"...", //s
	116:"-", //t
	117:".-", //u
	118:"...-", //v
	119:".--", //w
	120:"-..-", //x
	121:"-.--", //y
	122:"--..", //z
	//numbers
	48:"-----", //0
	49:".----", //1
	50:"..---", //2
	51:"...--", //3
	52:"....-", //4
	53:".....", //5
	54:"-....", //6
	55:"--...", //7
	56:"---..", //8
	57:"----.", //9
	//other
	59:"---...", //;
	61:"-...-", //=
	44:"--..--", //,
	45:"-....-", //-
	46:".-.-.-", //.
	47:"-..-.", ///
	91:"-.--.-", //[
	93:"-.--.-", //]
	32:"/", //" "
}
var letters = {
	//numbers
	48:"0",
	49:"1",
	50:"2",
	51:"3",
	52:"4",
	53:"5",
	54:"6",
	55:"7",
	56:"8",
	57:"9",
	//letters
	97:"a",
	98:"b",
	99:"c",
	100:"d",
	101:"e",
	102:"f",
	103:"g",
	104:"h",
	105:"i",
	106:"j",
	107:"k",
	108:"l",
	109:"m",
	110:"n",
	111:"o",
	112:"p",
	113:"q",
	114:"r",
	115:"s",
	116:"t",
	117:"u",
	118:"v",
	119:"w",
	120:"x",
	121:"y",
	122:"z",
	//other
	32:" ",
	44:",",
	45:"-",
	46:".",
	47:"/",
	59:";",
	61:"=",
	91:"[",
	93:"]",
}
$(document).on("keypress", function(e) {
	e = e.which;
	//addText("main", e);
	if (e == 8) { // Backspace
		confirm("Backspace");
		var morseText = document.getElementById("main").innerHTML;
		for (var i = morseText.length - 1; i > 0; i--) {
			/*if (morseText.substring(i-1, i) == " ") {
				morseText.substring(0, i);
				break;
			} //*/
		}
		var engText = document.getElementById("bottom").innerHTML;
		engText = engText.substring(0, engText.length - 1);
		htmlPrint("bottom", engText);
	} else if (morse[e] != undefined) {
		addText("main", morse[e] + " ");
		addText("bottom", letters[e]);
	}
});
function addText(loc, text) {
	var oddText = document.getElementById(loc).innerHTML;
	document.getElementById(loc).innerHTML = oddText + text;
}
function htmlPrint(loc, text) {
	document.getElementById(loc).innerHTML = text;
	return false;
}