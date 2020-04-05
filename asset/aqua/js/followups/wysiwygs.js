if($(".wysiwyg").length > 0){
    editor = $(".wysiwyg").cleditor({width:"100%", height:"100%"})[0].focus();                
}                                          
$(window).resize(function() {
    if($(".wysiwyg").length > 0) editor.refresh();
});
