function includeJs(jsFilePath) {
    var js = document.createElement("script");

    js.type = "text/javascript";
    js.src = jsFilePath;

    document.body.appendChild(js);
}
//includeJs("https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js");
$(document).ready(function() { 
	$(':root').css("font-size", Math.max(screen.height, window.innerHeight)*0.01);
});

function textareaSize() {
	$("textarea").each(function(){
		this.style.height = "0";
		this.style.height = "calc(2rem + " + this.scrollHeight + "px)";
		console.log(this.scrollHeight);
	});
	console.log("resize");
	return false;
}
