//includeJs("/files/js/autoresize_jquery.js");
$('#textarea').autoResize();
$(".autoExpand").keyup(function(e) {
    while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
        $(this).height($(this).height()+1);
    };
});
