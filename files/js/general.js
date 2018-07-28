var script = document.createElement('script');
script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js';
document.getElementsByTagName('head')[0].appendChild(script); 

$(document).ready(function() { 
	$(':root').css("font-size", Math.max(screen.height, window.innerHeight)*0.01);
});