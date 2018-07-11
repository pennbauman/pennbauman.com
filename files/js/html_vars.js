// Get Variables
function get(id) { return document.getElementById(id).innerHTML; }
function get_var(id) { return get(id); }

// Get Non-String Variables
function get_int(id) {
	var fin = parseInt(get(id));
	return fin;
}
function get_dub(id) {
	var fin = double(get(id));
	return fin;
}

// Save Variables
function save_var(loc, text) {
	document.getElementById(loc).innerHTML = text;
	return false;
}
function print(loc, text) {
	save_var(loc, text);
	return false;
}