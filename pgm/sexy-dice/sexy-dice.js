var text1 = new Array(
	"kiss",
	"rub",
	"grab",
	"poke",
	"hug",
	"suck",
	"nibble on",
	"spank",
	"lick",
	"touch",
	"blow on",
	"caress",
	"touch"
);
var text2 = new Array(
	"my crotch",
	"my ass",
	"my face",
	"my toes",
	"my chest", 
	"my neck",
	"my navel",
	"my hand",
	"my ears",
	"my thighs",
	"my lips",
	"my nipples"
);
function setup() {
	//alert("javascript running");
	return false;
}
function roll() {
	//alert("roll");
	htmlPrint("d1", text1[randInt(text1.length-1)]);
	htmlPrint("d2", text2[randInt(text2.length-1)]);
	return false;
}
function randInt(max) {
	var fin = Math.floor((Math.random() * max) + 1); 
	return fin;
} //*/
function htmlPrint(loc, text) {
  document.getElementById(loc).innerHTML = text;
  return false;
}