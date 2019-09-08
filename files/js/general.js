$(document).ready(function() { 
	$(':root').css("font-size", Math.max(screen.height, window.innerHeight)*0.01);
});
//$('textarea').on('paste input', function () {
    //if ($(this).outerHeight() > this.scrollHeight){
        //$(this).height(1)
    //}
    //while ($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))){
        //$(this).height($(this).height() + 1)
    //}
//});
//$('#textMeetingAgenda').css('overflow', 'hidden').autogrow();
$('textarea').oninput = function() {
	$('textarea').style.height = ""; /* Reset the height*/
	$('textarea').style.height = Math.min(textarea.scrollHeight, heightLimit) + "px";
};
