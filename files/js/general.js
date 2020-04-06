function includeJs(jsFilePath) {
    var js = document.createElement("script");

    js.type = "text/javascript";
    js.src = jsFilePath;

    document.body.appendChild(js);
}

function docReady(fn) {
    // see if DOM is already available
    if (document.readyState === "complete" || document.readyState === "interactive") {
        // call on next available tick
        setTimeout(fn, 1);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}

docReady(function() {
	var s = Math.max(screen.height, window.innerHeight)*0.01;
	document.documentElement.style.fontSize = s + "px";
	if (typeof textareaSize == "function")
		textareaSize();
	console.log(s);
})
