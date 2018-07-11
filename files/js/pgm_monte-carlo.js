var dim;
var h = window.innerHeight;
var w = window.innerWidth;
var n = 0;
var pi = 0.0;
var t = 0;
var state = false;

function htmlPrint(loc, text) {
	document.getElementById(loc).innerHTML = text;
	return false;
}
// On load
function setup() {
	confirm("JS running");
	layout();
}
// Layout screen (basic data, css, etc)
function layout() {
	if (h > w) {
		//confirm("mobile");
		document.getElementById("draw").width = w;
		document.getElementById("draw").height = w;
		dim = w;
	} else {
		document.getElementById("draw").width = h;
		document.getElementById("draw").height = h;
		dim = h;
	}
	circleDraw();
	var run = setInterval(calc, 10); 
}
// Clear and format visualization 
function circleDraw() {
	var canvas = document.getElementById("draw");
	var back = canvas.getContext("2d");
	back.clearRect(0, 0, canvas.width, canvas.height);
	// Draw quarter circle
	for (var x = 0; x < dim; x++) {
		var y = Math.pow((Math.pow(dim,2) - Math.pow(x,2)),0.5);
		draw(x, 0, 1, y, "#ffffff"); 
		draw(x, y, 1, dim-y, "#000000");
	}
	return false;
}
// Draw colored recatangle
function draw(x, y, w, h, color) {
	var canvas = document.getElementById("draw");
	var back = canvas.getContext("2d");
	back.fillStyle = color;
	back.fillRect(x,y,w,h);
	return false;
}
// Repeated run (calculate, draw, etc)
function calc() {
	if (state) {
		// create random x, y
		var x = Math.floor(Math.random() * dim);
		var y = Math.floor(Math.random() * dim);
		// IF distance to upper right is less than circle radius
		if (Math.pow((Math.pow(x,2) + Math.pow(y,2)), 0.5) < dim) {
			// (True/Num)*4
			pi = ((t + 1.0)/(n + 1.0))*4.0;
			t++;
			htmlPrint("pi", pi);
			draw(x-1, y-1, 3, 3, "#ff0000");
		} else {
			draw(x-1, y-1, 3, 3, "#00ff00");
		}
		n++;
		htmlPrint("n_points", n);
		return false;
	}
}
// Change betweening running and stopped
function runState() {
	if (state) {
		state = false;
		htmlPrint("run_button", "RUN");
	} else {
		state = true;
		htmlPrint("run_button", "STOP");
	}
}
// Reset to start conditions (clear visualization and numbers)
function reset() {
	htmlPrint("pi", "0.0000");
	pi = 0.0;
	htmlPrint("n_points", "0");
	n = 0;
	stat = false;\
	t = 0;
	htmlPrint("run_button", "RUN");
	circleDraw();
}