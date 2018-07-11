var dim;
var h = window.innerHeight;
var w = window.innerWidth;
// on load
function setup() {
	//confirm("JS running");
	layout();
}
// layout screen (basic data, css, etc)
function layout() {
	//var h = window.innerHeight;
	//var w = window.innerWidth;
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
	//save_var("draw_dim", draw_dim);
	circleDraw();
	//var run = setInterval(calc, 10); 
}

// clear and format visualization 
function circleDraw() {
	//confirm("circleDraw() started");
	//var dim = parseInt(get("draw_dim"));
	var canvas = document.getElementById("draw");
	var back = canvas.getContext("2d");
	back.clearRect(0, 0, canvas.width, canvas.height);
	// draw quarter circle
	confirm("circleDraw() middle");
	for (var x = 0; x < dim; x++) {
		var y = Math.pow((Math.pow(dim,2) - Math.pow(x,2)),0.5);
		draw(x, 0, 1, y, "#ffffff"); //"#dddddd");
		draw(x, y, 1, dim-y, "#000000");
	}
	confirm("circleDraw() end");
	return false;
}
// draw colored recatangle
function draw(x, y, w, h, color) {
	//var dim = parseInt(get("draw_dim"));
	var canvas = document.getElementById("draw");
	var back = canvas.getContext("2d");
	back.fillStyle = color;
	back.fillRect(x,y,w,h);
	return false;
}
/*
// repeated run (calculate, draw, etc)
function calc() {
	if (get("run_state") == "t") {
		var dim = parseFloat(get("draw_dim"));
		var n = parseFloat(get("n_points"));
		var pi = parseFloat(get("pi"));
		var t = parseFloat(get("true_num"));
		// create random x, y
		var x = Math.floor(Math.random() * dim);
		var y = Math.floor(Math.random() * dim);
		// IF distance to upper right is less than circle radius
		if (Math.pow((Math.pow(x,2) + Math.pow(y,2)), 0.5) < dim) {
			// True / Num *4
			var nPi = ((t + 1.0)/(n + 1.0))*4.0;
			save_var("true_num", t+1);
			save_var("pi", nPi);
			draw(x-1, y-1, 3, 3, "#ff0000"); //"#009900"); //"#6666ff");
			//point(x, y, "#009900");
		} else {
			draw(x-1, y-1, 3, 3, "#00ff00");  //"#ff0000");
			//point(x, y, "#ff0000");
		}
		save_var("x", x);
		save_var("y", y);
		save_var("n_points", n+1.0);
		return false;
	}
}

// draw 1x1 points
function point(x, y, color) {
	draw(x, y, 1, 1, color);
	return false;
}
// change betweening running and stopped
function runState() {
	var state = get("run_state");
	if (state == "t") {
		save_var("run_state", "f");
		save_var("run_button", "RUN");
	} else {
		save_var("run_state", "t");
		save_var("run_button", "STOP");
	}
}
// Reset to start conditions (clear visualization and numbers)
function reset() {
	save_var("pi", "0.0000");
	save_var("n_points", "0");
	save_var("run_state", "f");
	save_var("true_num", "0");
	save_var("run_button", "RUN");
	circleDraw();
}
//*/